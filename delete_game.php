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

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM games_in_holding WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Check if any rows were affected
    if ($stmt->affected_rows > 0) {
        echo "Game deleted successfully.";
    } else {
        echo "Failed to delete game.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
