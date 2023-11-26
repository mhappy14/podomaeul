<?php
    $title = '게시판';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

    <?php

    $mysqli = mysqli_connect("localhost","root","1234","podo");

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    } else{
        echo "Connect to MySQL!";
    }

    $view_num = $_GET['number'];
    $sql = "SELECT * FROM board WHERE number = $view_num"; //board테이블 조회
    $result = mysqli_query($mysqli, $sql);

    if($row = mysqli_fetch_array($result)){

    ?>
    <h3>글번호: <?= $row['number'] ?> / 글쓴이: <?= $row['name'] ?></h3>
    <div>
      <?= $row['message'] ?>
    </div>
    <?php    }    ?>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>