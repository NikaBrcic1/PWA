
<?php
session_start();
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
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, ime, admin FROM korisnik WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password, $ime, $admin);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['ime'] = $ime;
        $_SESSION['admin'] = $admin;

        if ($admin) {
            header("Location: administracija.php");
        } else {
            echo "<link rel='stylesheet' type='text/css' href='style.css'> <div class='brisanje'>Dobrodošli, " . htmlspecialchars($ime) . ". Nemate administratorska prava. <a href='pocetna.php'>Odlazak na glavnu stranicu.</a></div>";
        }
    } else {
        echo "<link rel='stylesheet' type='text/css' href='style.css'> <div class='brisanje'>Neispravno korisničko ime ili lozinka. <a href='registracija.php'>Registrirajte se</a></div>";
    }

    $stmt->close();
}

$conn->close();
?>