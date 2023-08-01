#!/bin/bash

grant_directory_access() {
    if [[ $EUID -ne 0 ]]; then
        echo "This script must be run as root."
        return
    fi

    read -p "Enter the directory path: " directory
    read -p "Enter the username: " username

    # Check if the directory exists
    if [ ! -d "$directory" ]; then
        echo "Directory does not exist."
        return
    fi

    # Grant full access to the directory for the specified user
    if chown -R "$username:$username" "$directory" && chmod -R 700 "$directory"; then
        echo "Access granted successfully."
    else
        echo "An error occurred."
    fi
}

# Call the function
grant_directory_access
