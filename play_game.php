<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Play Game</title>
  <link rel="stylesheet" href="mystyle.css">
  <style>
    /* Style the iframe container */
    .iframe-container {
      position: relative;
      overflow: hidden;
      width: 100%;
      padding-top: 56.25%; /* Maintain a 16:9 aspect ratio (9 / 16 = 0.5625) */
    }

    /* Style the iframe */
    .iframe-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: none;
    }
  </style>
  <script>
    function resizeIframe(obj) {
      obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
    }
  </script>
</head>
<body>
  <h1>Play Game</h1>

  <?php
  $host = '127.0.0.1';
  $username = 'web';
  $password = 'web';
  $dbname = 'web';

  // Get game ID from query parameter
  $game_id = $_GET['id'];

  // Create connection
  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve game from table
  $sql = "SELECT * FROM your_table_name WHERE ID = $game_id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Output game information
    $row = mysqli_fetch_assoc($result);
    echo "<div class='iframe-container'><iframe src='{$row['link_to_game']}' onload='resizeIframe(this)'></iframe></div>";
  } else {
    echo "Game not found.";
  }

  // Close connection
  mysqli_close($conn);
  ?>
</body>
</html>
