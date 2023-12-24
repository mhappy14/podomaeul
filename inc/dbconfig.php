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

//폴더경로 설정   C:/xampp/podomaeul
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] .'/project/podomaeul');
define('ADMIN_DIR'    , DOCUMENT_ROOT .'/admin'  );
define('DATA_DIR'     , DOCUMENT_ROOT .'/data'   );
define('PROFILE_DIR'  , DATA_DIR      .'/profile');
define('BOARD_DIR'    , DATA_DIR      .'/board'  ); // 파일이 저장될 절대 경로 
define('BOARD_WEB_DIR', 'data/board'             ); // 웹에서 확인하는 경로
define('POPUP_DIR'    , DATA_DIR      .'/popup'  ); // 파일이 저장될 절대 경로 
define('POPUP_WEB_DIR', 'data/popup'             ); // 웹에서 확인하는 경로

?>