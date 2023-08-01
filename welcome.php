<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
  <header class="navbar">
    <div class="container">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="submit.html">Submit</a></li>
        <li><a href="reset-password.php">Reset Password</a></li>
        <li><a href="logout.php" class="active">Logout</a></li>
      </ul>
    </div>
  </header>

  <div class="container">
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <table>
      <thead>
        <tr>
          <th>Submitter</th>
          <th>Link to Game</th>
          <th>Name of Game</th>
          <th>Description</th>
          <th>Tags</th>
          <th>Game Icon URL</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $host = 'localhost';
          $username = 'web';
          $password = 'web';
          $dbname = 'web';

          $conn = mysqli_connect($host, $username, $password, $dbname);

          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "SELECT * FROM games_in_holding";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['submitter'] . "</td>";
              echo "<td>" . $row['link_to_game'] . "</td>";
              echo "<td>" . $row['name_of_game'] . "</td>";
              echo "<td>" . $row['description'] . "</td>";
              echo "<td>" . $row['tags'] . "</td>";
              echo "<td>" . $row['game_icon_url'] . "</td>";
              var_dump($row['ID']); // Add this line
              echo "<td><a href=\"delete_game.php?id=" . $row['ID'] . "\">Delete</a></td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan=\"7\">No games found.</td></tr>";
          }

          mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
