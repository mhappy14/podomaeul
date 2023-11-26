<?php
    $title = '검색 결과';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

    <h1>게시판</h1>
    <h2>검색 결과</h2>
    <ul>
    <?php
    
    $mysqli = mysqli_connect("localhost","root","1234","podo");

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    } else{
        echo "Connect to MySQL!";
    }

    $user_skey = $_POST['skey'];
    $sql = "SELECT * FROM board WHERE message LIKE '%$user_skey%'"; //board테이블 조회
    $result = mysqli_query($mysqli, $sql);
    $list = '';
    while($row = mysqli_fetch_array($result)){
        $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a>&nbsp;&nbsp;{$row['message']}</li>";
    }
    echo $list;
    
    mysqli_close($mysqli);
    ?>
    </ul>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>