<?php
/*
$db = new PDO('sqlite:sqlite.db');
$result = $db->query('SELECT * FROM '.$tbname.'');
foreach ($result as $row) {
    echo 'Example content: ' . $row['column1'];
}
*/


try {
    // $pdo = new PDO('sqlite:/db/sqlite.db');
    $db = new PDO('sqlite:sqlite.db');


    // $row_count = sqlite_num_rows($result);
    // print_r($row_count);
    
    // $rows = $result->fetchAll();
    // $row_count = count($rows);
    // print($row_count);
    
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
} 

catch(Exception $e) {
    echo "Unable to connect to SQLite: ".$e->getMessage();
    // die();
}
?>