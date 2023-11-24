<?php
    $title = 'login';
    include('inc/header.php');
?>

<!-- get방식(웹주소창에 입력한 값이 보임) -->
<!-- <form action="request.php" method="get">
    <p>
        <label for="username">Name</label>
        <input type="text" name="userName1" id="userName2">
    </p>
    <p>
        <label for="useremail">Email</label>
        <input type="email" name="userEmail" id="userEmail">
    </p> 
    <p>
        <input type="submit" value="로그인">
    </p> 
</form> -->

<!-- post방식(웹주소창에 입력한 값이 안보임) -->
<form action="request.php" method="post">
    <p>
        <label for="username">Name</label>
        <input type="text" name="userName" id="userName">
    </p>
    <p>
        <label for="useremail">Email</label>
        <input type="email" name="userEmail" id="userEmail">
    </p> 
    <p>
        <input type="submit" value="로그인">
    </p> 
</form>

<?php
    include('inc/footer.php');
?>