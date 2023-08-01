<?php
$host = 'localhost';
$username = 'web';
$password = 'web';
$dbname = 'web';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitter = $_POST["submitter"];
    $link_to_game = $_POST["link_to_game"];
    $name_of_game = $_POST["name_of_game"];
    $description = $_POST["description"];
    $tags = $_POST["tags"];
    $game_icon_url = $_POST["game_icon_url"];

    // Prepare the SQL statement
    $sql = "INSERT INTO games_in_holding (submitter, link_to_game, name_of_game, description, tags, game_icon_url) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind the parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $submitter, $link_to_game, $name_of_game, $description, $tags, $game_icon_url);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Game submitted successfully.";
    } else {
        echo "Error submitting the game.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
