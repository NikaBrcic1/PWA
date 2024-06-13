<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vijesti_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, content, pphoto, category FROM articles";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Početna stranica</title>
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
        </nav>
    </header>
    <h3 class="sirina">ELECTIONS EUROPEENNES 2019</h3>
    <section id="one">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["category"] == "elections") {
                    echo '<article class="prvi">';
                    if (!empty($row["pphoto"])) {
                        echo '<a href="clanak.php?id=' . $row["id"] . '">';
                        echo '<img src="' . htmlspecialchars($row["pphoto"]) . '" alt="Slika članka"/>';
                        echo '</a>';
                    }
                    echo '<p>' . htmlspecialchars($row["content"]) . '</p>';
                    echo '</article>';
                }
            }
        } else {
            echo "No articles found.";
        }
        ?>
    </section>
    <h3 class="sirina">LES JT</h3>
    <section id="two">
        <?php
        $result->data_seek(0);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["category"] == "letjs") {
                    echo '<article class="drugi">';
                    if (!empty($row["pphoto"])) {
                        echo '<a href="clanak.php?id=' . $row["id"] . '">';
                        echo '<img src="' . htmlspecialchars($row["pphoto"]) . '" alt="Slika članka"/>';
                        echo '</a>';
                    }
                    echo '<p>' . htmlspecialchars($row["content"]) . '</p>';
                    echo '</article>';
                }
            }
        } else {
            echo "No articles found.";
        }

        $conn->close();
        ?>
    </section>
    <footer class="tamni">
        <div class="levo">
            <img src="img/Franceinfob.png" style="width:120px; margin-top:10px; margin-bottom:10px;"/>
        </div>
    </footer>
</body>
</html>
