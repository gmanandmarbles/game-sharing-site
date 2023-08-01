<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Game List</title>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <style>
    /* Additional styles for game list page */
    .game img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }
  </style>
</head>
<body>
  <h1>Game List</h1>

  <?php
  $host = 'localhost';
  $username = 'web';
  $password = 'web';
  $dbname = 'web';

  // Create connection
  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve games from table (ordered by DateAdded in descending order)
  $sql = "SELECT * FROM your_table_name ORDER BY DateAdded DESC";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Output games in a grid layout
    echo "<div class='game-list'>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='game' onclick='location.href=\"play_game.php?id={$row['ID']}\"'>";
      echo "<img src='{$row['thumbnail_url']}' alt='Game Thumbnail'>";
      echo "<p>{$row['description']}</p>";
      echo "</div>";
    }
    echo "</div>";
  } else {
    echo "No games found.";
  }

  // Close connection
  mysqli_close($conn);
  ?>

</body>
</html>
