<?php
    session_start();
    $js_array = ['js/login.js'];
    $menu_code = 'login';
    $title = '로그인';
    include 'inc/header.php'
?>

<main class="w-75 mx-auto border rounded-5 p-5 d-flex gap-5" style="height:calc(100vh-257px)">

<form method="post" class="w-50 mt-5 m-auto" action="">
    <img src="./images/logo.svg" width="72" alt="">
    <h1 class="h3 bm-3">로그인</h1>
        <div class="form-floating mt-2">
            <input type="text" class="form-control" id="f_id" placeholder="아이디 입력">
            <label for="f_id">아이디</label>
        </div>
        <div class="form-floating mt-2">
            <input type="password" class="form-control" id="f_pw" placeholder="비밀번호 입력">
            <label for="f_pw">비밀번호</label>
        </div>
        <div class="py-4 h6"><a href="stipulation.php">회원이 아니신가요?</a></div>
        <button class="w-100 mt-1 btn btn-lg btn-primary" id="btn_login" type="button">확인</button>
</form>

</main>

<?php 
    include 'inc/footer.php'; 
?>