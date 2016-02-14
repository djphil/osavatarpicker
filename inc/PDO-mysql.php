<?php
try {
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.'', $dbuser, $dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
    $message = '
        <pre>
            Unable to connect to mysql ...
            Error code: '.$e->getCode().'
            Error file: '.$e->getFile().'
            Error line: '.$e->getLine().'
            Error data: '.$e->getMessage().'
        </pre>
    ';
    die($message);
    // echo '<pre>';
    // echo "Unable to connect to mysql ...\n";
    // echo 'Error code : '.$e->getCode().'<br />';
    // echo 'Error file : '.$e->getFile().'<br />';
    // echo 'Error line : '.$e->getLine().'<br />';
    // echo 'Error data : '.$e->getMessage();
    // echo '</pre>';
    // exit();
    // die();
}
// $pdo->query('SELECT * FROM $tbname WHERE id = $id ');
// $pdo->query('INSERT INTO $tbname SET id = $id, name = $name');
// $pdo->query('UPDATE $tbname SET total_visitors = total_visitors + 1');
?>