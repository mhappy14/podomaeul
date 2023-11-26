<?php

$mysqli = mysqli_connect("localhost","root","1234","podo");

if ($mysqli -> connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
} else{
    echo "Connect to MySQL!";
}

$view_num = $_GET['number']; //사용자가 넘겨준 번호를 저장
$sql = "SELECT * FROM board WHERE number = $view_num"; //해당번호의 board 테이블의 모든 정보를 조회해서
$result = mysqli_query($mysqli, $sql); //조회한 결과를 $result에 담고 아래의 각 위치에 넣어줌

?>

<?php
    $title = '게시판';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

    <h1>글 수정</h1>
    <?php

        if($row = mysqli_fetch_array($result)){

    ?>
    <form action="insert.php" method="post">
        <p>
            <label for="name">이름:</label>
            <input type="text" id="name" name="name" value="<?= $row['number'] ?>">
        </p>
        <p>
            <label for="message">메시지:</label>
            <textarea name="message" id="message" cols="30" rows="10"><?= $row['message'] ?></textarea>
        </p>
        <input type="submit" value="글쓰기">
    </form>
    <?php    }
        mysqli_close($mysqli);
    ?>


<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>