<?php

$servername = 'localhost';
$dbuser = 'root';
$dbpassword = '1234';
$dbname = 'podo';

try {
    $db = new PDO("mysql:host={$servername};dbname={$dbname}",$dbuser, $dbpassword);

    $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "DB연결!";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>