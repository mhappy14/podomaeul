<?php
    session_start();
    $title = 'login';
    include $_SERVER['DOCUMENT_ROOT']."/inc/config.php"; //config파일을 불러와서 지정한 id,pw를 조회
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/functions.php"; //line 4를 통해 지정된 id,pw과 일치하는지 확인할 수 있는 함수(line 15)를 불러옴

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     //echo $_POST['email'];
    //     output($_POST);
    // }
    if(isset($_POST['login'])){
        $password = $_POST['password']; //POST타입으로 넘어온 값(password)을 $password로 저장
        //현재 파일에 id,pw를 세팅해놓고 config파일에 지정해놓은 값과 비교해서 맞으면 로그인하는 방식
        if(authenticate_user($email, $password)){
            $_SESSION['email'] = $email; //세션에 이메일이란 변수를 만들고 거기에 사용자가 입력한 이메일을 저장, 만약 config.php에 저장해놓은 id,pw와 일치한다면
            redirect('admin.php'); //admin.php로 이동
        } else { //비밀번호가 틀리다면 아래 명령 실행
            $status = 'wrong password'; 
        }
    }
?>

<form action="" method="post">
    <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </p> 
    <p>
        <input type="submit" name="login" value="로그인">
    </p> 
</form>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";
?>