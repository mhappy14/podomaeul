<?php
    $title = '검색 결과';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

    <h1>게시판</h1>
    <h2>삭제 결과</h2>
    <ul>
    <?php
    
    $mysqli = mysqli_connect("localhost","root","1234","podo");

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    } else{
        echo "Connect to MySQL!";
    }

    $user_delnum = $_POST['delnum'];
    $sqlDEL = "DELETE FROM board WHERE number = $user_delnum"; //board테이블 조회
    mysqli_query($mysqli, $sqlDEL);
    $sql = "SELECT * FROM board";
    $result = mysqli_query($mysqli, $sql);
    $list = '';
    while($row = mysqli_fetch_array($result)){
        $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a>&nbsp;&nbsp;{$row['message']}</li>";
    }
    echo $list;
    
    mysqli_close($mysqli);
    ?>
    </ul>
    <p>
    <?php
        echo $user_delnum.'번째 게시글이 삭제되었습니다.';
    ?>
    </p>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>