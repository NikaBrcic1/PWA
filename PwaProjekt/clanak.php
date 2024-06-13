<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vijesti_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Article not found.");
    }
} else {
    die("Invalid article ID.");
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($row["title"]); ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="sirinaimg">
            <img src="img/Franceinfo.png" style="width:120px; margin-top:25px;"/>
        </div>
        <nav>
            <a href="pocetna.php">home</a>
            <a href="#">elections</a>
            <a href="#">les jt</a>
            <a href="unos.html">Unos clanaka</a>
            <a href="administracija.php">administracija</a>
            <a href="login.php">Login</a>
        </nav>
    </header>
    <div id="main">
        <h1 class="sirina"><?php echo htmlspecialchars($row["title"]); ?></h1>
        <p class="snaslov"><?php echo htmlspecialchars($row["about"]); ?></p>
        <img src="<?php echo htmlspecialchars($row["pphoto"]); ?>" alt="Slika članka"/>
        <p><?php echo htmlspecialchars($row["contentReal"]); ?></p>
        <h4><?php echo htmlspecialchars($row["aboutReal"]); ?></h4>
        <p><?php echo nl2br(htmlspecialchars($row["contentReal2"])); ?></p>
    </div>
    <footer class="tamni">
        <div class="levo">
            <img src="img/Franceinfob.png" style="width:120px; margin-top:10px; margin-bottom:10px;"/>
        </div>
    </footer>
</body>
</html>
