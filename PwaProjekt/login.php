<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
    <div class="brisanje"><h2>Login</h2><h4>admin user:nika</h4><p>pass:123</p></div>
    <form action="login_skripta.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Prijavi se</button>
    </form>
    <div class="brisanje"><p>Nemate račun? <a href="registracija.php">Registrirajte se</a></p></div>
    <footer class="tamni">
        <div class="levo">
            <img src="img/Franceinfob.png" style="width:120px; margin-top:10px; margin-bottom:10px;"/>
        </div>
    </footer>
</body>
</html>
