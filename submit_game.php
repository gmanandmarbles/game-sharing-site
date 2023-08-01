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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $tags = $_POST['tags'];
  $thumbnail = $_POST['thumbnail'];
  $gameUrl = $_POST['game_url'];

  // Prepare and execute the SQL query
  $sql = "INSERT INTO your_table_name (Submitter, link_to_game, description, tags, thumbnail_url, Date_Added) VALUES (?, ?, ?, ?, ?, NOW())";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $title, $gameUrl, $description, $tags, $thumbnail);

  if ($stmt->execute()) {
    $lastInsertId = $stmt->insert_id;
    echo "Game submitted successfully! The game ID is: " . $lastInsertId;
  } else {
    echo "Failed to submit game. Error: " . $stmt->error;
  }

  // Close statement
  $stmt->close();
}

// Close connection
$conn->close();
?>
