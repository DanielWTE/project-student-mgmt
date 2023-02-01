<?php
require '/var/www/web/config.php';
require '/var/www/web/vendor/autoload.php';
$mongoClient = new MongoDB\Client($mongoDBConnection);
$mongoDB = $mongoClient->$mongoDBDatabase;


    if(!isset($_GET['searchTerm'])){ 
        $json = [];
    }else{
        $search = $_GET['searchTerm'];
        $results = $mongoDB->teacher->find(['username' => new MongoDB\BSON\Regex($search, 'i')])
        ->toArray();
    
        $json = [];
        foreach ($results as $result) {
        $json[] = ['id' => $result->id, 'text' => $result->username];
        }
    }

    echo json_encode($json);
?>