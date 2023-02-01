<?php
session_start();
require '/var/www/web/config.php';
require '/var/www/web/vendor/autoload.php';

if(isset($_POST)){
    $name = $_POST['name'];
    $username = $str = strtolower(str_replace(' ','.',$name));
    $role = $_POST['role'];
    $subjects = $_POST['subjects'];
    $room = $_POST['room'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $mongoClient = new MongoDB\Client($mongoDBConnection);
    $mongoDB = $mongoClient->$mongoDBDatabase;

        if($password != $password2) {
            echo 'Beide Passwörter müssen gleich sein!';
            $error = true;
        }

        if(!$error) { 
            $user = $mongoDB->teacher->findOne(['username' => $username]);
            
            if($user !== null) {
                echo 'Dieser Nutzername exisitert bereits!';
                $error = true;
            }    
        }

        if(!$error) {    
            $passwort_hash = password_hash($password, PASSWORD_DEFAULT);
            $date = date('Y-m-d H:i:s');

            $checkStmt = $mongoDB->teacher->findOne(['id' => ['$exists' => true]], ['sort' => ['id' => -1]]);
            $id = $checkStmt->id + 1;
            
            $user = [
                "id" => (int)$id,
                "name" => $name,
                "username" => $username,
                "role" => $role,
                "subjects" => $subjects,
                "room" => (int)$room,
                "birthdate" => $birthdate,
                "email" => $email,
                "password" => $passwort_hash,
                "created" => new MongoDB\BSON\UTCDateTime(strtotime($date)*1000)
            ];
            $mongoDB->teacher->insertOne($user);
            echo "success";
        }
    }

?>