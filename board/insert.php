<?php
    $title = '게시판';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

    <?php
    // $mysqli = mysqli_connect("localhost", "root", "1234", "podo"); //mysql 접속방법

    // // Check connection
    // if (!$mysqli) {
    // echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // exit();
    // } else{
    //     echo "데이터베이스에 접속했습니다.";
    // }

    $mysqli = mysqli_connect("localhost","root","1234","podo");

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    } else{
        echo "Connect to MySQL!";
    }

    $user_name = $_POST['name'];
    $user_message = $_POST['message'];
    ?>
    <hr>
    <?php
    echo "$user_name" . "$user_message";
    ?>
    <hr>
    <?php
   
    $sql = "INSERT INTO board (name, message) VALUES ('$user_name', '$user_message')"; //유튭방법
    $result = mysqli_query($mysqli, $sql);
    if($result === false){
        echo '저장실패';
        error_log(mysqli_error($mysqli));
    } else{
        echo '저장성공';
    }

    // $mysqli -> query("INSERT INTO board (name, message) VALUES ($user_name, $user_message)"); //w3방법
    // echo "New record has id: " . $mysqli -> insert_id;

    mysqli_close($mysqli);
    print "<hr/><a href='index.php'>메인화면으로 이동하기</a>";
    ?>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>