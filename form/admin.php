<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT']."/form/config.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/functions.php";

    ensure_user_is_authenticated(); //관리자가 아니면 login.php로 이동하고 아래 명령어 실행

    echo $_SESSION['email'];  //login.php(line16)에서 세션에 저장된 값을 출력
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";
    
?>

<a href = '/form/logout.php'>logout</a>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>