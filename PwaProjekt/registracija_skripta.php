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

        session_start();
        $_SESSION['message'] = "Registracija uspješna.";
        header("Location: pocetna.php");
        exit(); 
    } else {
        echo "Greška: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registracija</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Forma za registraciju</h2>
    <form method="post" action="">
        <label for="username">Korisničko ime:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Lozinka:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <label for="ime">Ime:</label><br>
        <input type="text" id="ime" name="ime"><br><br>
        <label for="prezime">Prezime:</label><br>
        <input type="text" id="prezime" name="prezime"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="Registriraj se">
    </form>
</body>
</html>
