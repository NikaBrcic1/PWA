<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vijesti_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$contentReal = $_POST['contentReal'];
$aboutReal = $_POST['aboutReal'];
$contentReal2 = $_POST['contentReal2'];
$category = $_POST['category'];
$archive = isset($_POST['archive']) ? 1 : 0;

$pphoto = $_FILES['pphoto']['name'];
$target_dir = "img/";
$target_file = $target_dir . basename($pphoto);
move_uploaded_file($_FILES['pphoto']['tmp_name'], $target_file);

$sql = "INSERT INTO articles (title, about, content, pphoto, category, archive, contentReal, aboutReal, contentReal2)
VALUES ('$title', '$about', '$content', '$target_file', '$category', '$archive', '$contentReal', '$aboutReal', '$contentReal2')";

if ($conn->query($sql) === TRUE) {
    header("Location: pocetna.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
