<?php
session_start();
require '/var/www/web/config.php';
require '/var/www/web/vendor/autoload.php';

if(isset($_GET['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mongoClient = new MongoDB\Client($mongoDBConnection);
    $mongoDB = $mongoClient->$mongoDBDatabase;
    $user = $mongoDB->users->findOne(array('username' => $username));

    if ($user !== null && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];
        header("Location: /index"); 
        die();
    } else {
        $errorMessage = "Falsche Zugangsdaten<br>";
        echo $errorMessage;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Educdia - Login</title>
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/auth.css">
</head>
    <body>
        <div>
            <h1 style="text-align: center;">Educdia Login</h1>
            <form action="?login=1" method="post">
                <input type="text" id="username" name="username" placeholder="Nutzername" required>
                <input type="password" id="password" name="password" placeholder="Passwort" required>
                <button type="submit">Login</button>
            </form> 
        </div>
    </body>
</html>