<?php
    $title = '게시판';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

    <h1>게시판</h1>
    <h2>글 목록</h2>
    <ul>
    <?php
    
    $mysqli = mysqli_connect("localhost","root","1234","podo");

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    } else{
        echo "Connect to MySQL!";
    }

    $sql = "SELECT * FROM board"; //board테이블 조회
    $result = mysqli_query($mysqli, $sql);
    $list = '';
    // echo / print () : 값을 그대로 출력
    // print_r () : 배열, 객체 모양을 그대로 출력
    // var_dump : print_r 보다 상세하게 출력
    while($row = mysqli_fetch_array($result)){
        $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a>&nbsp;&nbsp;{$row['message']}</li>";
    }
    echo $list;
    ?>
    </ul>
    <hr>
        <p><a href="write.php">글쓰기</a></p>
    <hr>
    <h2>글 검색</h2>
    <form action="search.php" method="post">
      <h3>검색할 키워드를 입력하세요</h3>    
        <p>
            <label for="search">키워드:</label>
            <input type="text" id="search" name="skey">
        </p>
        <input type="submit" value="검색">
    </form>
    <hr>
    <h2>글 삭제</h2>
    <form action="delete.php" method="post">
      <h3>삭제할 메시지 번호를 입력하세요</h3>    
        <p>
            <label for="msgdel">번호:</label>
            <input type="text" id="msgdel" name="delnum">
        </p>
        <input type="submit" value="삭제">
    </form>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>