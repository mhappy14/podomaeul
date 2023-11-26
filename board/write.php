<?php
    $title = '게시판';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

    <h1>글 쓰기</h1>
    <form action="insert.php" method="post">
        <p>
            <label for="name">이름:</label>
            <input type="text" id="name" name="name">
        </p>
        <p>
            <label for="message">메시지:</label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </p>
        <input type="submit" value="글쓰기">
    </form>


<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>