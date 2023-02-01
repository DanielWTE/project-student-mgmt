<?php
session_start();
require '/var/www/web/config.php';
require '/var/www/web/vendor/autoload.php';

if(!isset($_SESSION['userid'])) {
    header("Location: /auth/login"); 
    die();
}
$id = $_SESSION['userid'];
$name = $_SESSION['name'];
$username = $_SESSION['username'];
$role = $_SESSION['role'];
$email = $_SESSION['email'];
?>