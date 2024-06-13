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


<!DOCTYPE html>
<html>
<head>
    <title>Registracija</title>
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
    <div class="brisanje"><h2>Registracija</h2></div>
    <form action="registracija_skripta.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" required><br><br>
        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <button type="submit">Registriraj se</button>
    </form>
    <footer class="tamni">
        <div class="levo">
            <img src="img/Franceinfob.png" style="width:120px; margin-top:10px; margin-bottom:10px;"/>
        </div>
    </footer>
</body>
</html>
