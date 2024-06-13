<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vijesti_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    

    $sql_delete = "DELETE FROM articles WHERE id = $delete_id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "<div class='brisanje'>Article deleted successfully.</div>";
    } else {
        echo "<div class='brisanje'>Error deleting article: </div>" . $conn->error;
    }
}

$sql_select = "SELECT id, title FROM articles";
$result = $conn->query($sql_select);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administracija</title>
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
    <div id="main">
        <h1 class="sirina">Administracija članaka - brisanje</h1>
        <section id="delete-section">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="clanak">';
                        echo '<span>' . htmlspecialchars($row["title"]) . '</span>';
                        echo '<br/><br/><a href="administracija.php?delete=' . $row["id"] . '" class="delete-link">Obriši</a>';
                        echo '</div>';
                    }
                } else {
                    echo "Nema članaka za brisanje.";
                }
                ?>
        </section>
    </div>
    <footer class="tamni">
        <div class="levo">
            <img src="img/Franceinfob.png" style="width:120px; margin-top:10px; margin-bottom:10px;"/>
        </div>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
