#!/bin/bash

# MySQL database credentials
DB_HOST="localhost"
DB_USER="web"
DB_PASS="web"
DB_NAME="web"

# Directory where user directories will be created
BASE_DIR="users"

# Query to select new users
QUERY="SELECT id, username, created_at FROM users WHERE directory_created = 0"

# Execute the query
RESULT=$(mysql -u "$DB_USER" -p"$DB_PASS" -h "$DB_HOST" -D "$DB_NAME" -N -e "$QUERY")

# Loop through the result and create directories
while IFS=$'\t' read -r user_id username created_at; do
    directory="$BASE_DIR/$user_id"
    backup_directory="$directory/backup"

    # Check if the directory already exists
    if [ -d "$directory" ]; then
        echo "Directory already exists for user: $username"
        # Move existing files to backup directory
        mkdir -p "$backup_directory"
        mv "$directory"/* "$backup_directory"
        echo "Existing files moved to backup directory for user: $username"
    else
        # Create the directory
        mkdir -p "$directory"
        if [ $? -eq 0 ]; then
            echo "Directory created for user: $username"
        else
            echo "Failed to create directory for user: $username"
            continue
        fi
    fi

    # Calculate account age
    current_date=$(date +%Y-%m-%d)
    account_age=$(($(($(date -d "$current_date" +%s) - $(date -d "$created_at" +%s))) / 86400))

    # Construct the JSON data
    JSON_DATA=$(printf '{"id": "%s", "username": "%s", "dateCreated": "%s", "accountAge": "%d"}' "$user_id" "$username" "$created_at" "$account_age")

    # Write JSON data to user.json file
    echo "$JSON_DATA" >"$directory/user.json"
    echo "User data backed up for user: $username"

    # Update the directory_created flag in the database
    mysql -u "$DB_USER" -p"$DB_PASS" -h "$DB_HOST" -D "$DB_NAME" -e "UPDATE users SET directory_created = 1 WHERE id = $user_id"
    echo "Directory creation flag updated for user: $username"
done
