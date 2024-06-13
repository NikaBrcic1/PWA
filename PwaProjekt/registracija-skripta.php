<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vijesti_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO korisnik (username, password, ime, prezime, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $ime, $prezime, $email);

    if ($stmt->execute()) {
        echo "Registracija uspješna. <a href='login.php'>Prijavite se</a>";
    } else {
        echo "Greška: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>