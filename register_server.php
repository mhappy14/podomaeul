<?php
	include("php/config.php");
    
    if(isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['Password'])){
    //  보안(시큐어코딩, 보안코딩)
    $user_username = mysqli_real_escape_string($con, $_POST['Username']);
    $user_email = mysqli_real_escape_string($con, $_POST['Email']);
    $user_password = mysqli_real_escape_string($con, $_POST['Password']);
    $user_passwordc = mysqli_real_escape_string($con, $_POST['Passwordc']);
    
    // 에러 체크
    if($user_password !== $user_passwordc){
        echo"<script>
        alert('Password inconsistency');
        </script>";
    } else {
        //암호화
        md5();
        password_hash();




        //아이디 또는 닉네임 중복확인
    }







    }else{

    }








echo 'aaaa';
echo "$user_username";



?>