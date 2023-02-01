<?php
require '/var/www/web/config.php';
require '/var/www/web/vendor/autoload.php';

if(isset($_POST)){
    $username = $_POST['username'];

    $mongoClient = new MongoDB\Client($mongoDBConnection);
    $mongoDB = $mongoClient->$mongoDBDatabase;
 
    $user = $mongoDB->teacher->findOne(['username' => $username]);
    
    $username = $user->username;
    $name = $user->name;
    $role = $user->role;
    $subjects = $user->subjects;
    $room = $user->room;
    $birthdate = $user->birthdate;
    $email = $user->email;

    echo json_encode(array(
        'username' => $username,
        'name' => $name,
        'role' => $role,
        'subjects' => $subjects,
        'room' => $room,
        'birthdate' => $birthdate,
        'email' => $email
    ));
    }

?>