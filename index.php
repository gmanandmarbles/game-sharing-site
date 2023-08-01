<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game List</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <style>
        .game img {
            max-width: 200px;
            max-height: 200px;
            object-fit: contain;
        }
        .top-bar {
            background-color: #F47920;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .top-bar h1 {
            margin: 0;
        }
        .top-bar a {
            color: white;
            text-decoration: none;
            margin-left: 10px;
        }
        .top-bar .submit-button {
            background-color: white;
            color: #F47920;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Game List</h1>
        <div>
            <a href="?type=unity">Unity Games</a>
            <a href="?type=roblox">Roblox Games</a>
            <a href="?type=gdp">GDP Games</a>
            <a href="?type=makecode">Makecode Games</a>
            <a href="?type=scratch">Scratch Games</a>
            <a href="?type=web">Web Games</a>
        </div>
        <button class="submit-button" onclick="location.href='submissionform.html'">Submit Games</button>
        <button class="submit-button" onclick="location.href='login.php'">Login</button>
    </div>

    <?php
    $host = 'localhost';
    $username = 'web';
    $password = 'web';
    $dbname = 'web';

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $filter = isset($_GET['type']) ? $_GET['type'] : '';

    $sql = "SELECT * FROM your_table_name";
    if (!empty($filter)) {
        $filter = mysqli_real_escape_string($conn, $filter);
        $sql .= " WHERE tags LIKE '%$filter%'";
    }
    $sql .= " ORDER BY RAND()";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
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
    ?>
</body>
</html>
