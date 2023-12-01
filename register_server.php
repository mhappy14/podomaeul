<?php
	include("php/config.php");
    
    if(isset($_POST['UserID']) && isset($_POST['UserNick']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['Passwordc'])){
        //  보안(시큐어코딩=보안코딩)
        $UserID = mysqli_real_escape_string($con, $_POST['UserID']);
        $UserNick = mysqli_real_escape_string($con, $_POST['UserNick']);
        $Email = mysqli_real_escape_string($con, $_POST['Email']);
        $Password = mysqli_real_escape_string($con, $_POST['Password']);
        $Passwordc = mysqli_real_escape_string($con, $_POST['Passwordc']);
        //입력정보 get
        $UserInfo = "UserID=".$UserID;
        // // 에러 체크
        if (empty($UserID)) {
            header("location: register.php?error=아이디를 입력하세요&$UserInfo");
            exit();
        } else if (empty($UserNick)){
            header("location: register.php?error=닉네임을 입력하세요&$UserInfo");
            exit();
        } else if (empty($Email)){
            header("location: register.php?error=이메일을 입력하세요&$UserInfo");
            exit();
        } else if (empty($Password)){
            header("location: register.php?error=비밀번호를 입력하세요&$UserInfo");
            exit();
        } else if (empty($Passwordc)){
            header("location: register.php?error=확인할 비밀번호를 입력하세요&$UserInfo");
            exit();
        } else if ($Password !== $Passwordc){
            header("location: register.php?error=비밀번호가 일치하지 않아요");
            exit();
        } else {
            //암호화
            $Password = password_hash($Password, PASSWORD_DEFAULT);
            //중복체크
            $sql_same = "SELECT * FROM users WHERE UserID = '$UserID' and UserNick = '$UserNick'";
            $order = mysqli_query($con, $sql_same);
            if(mysqli_num_rows($order) > 0){
                header("location: register.php?error=아이디 또는 닉네임이 이미 존재합니다&$UserInfo");
                exit();
            } else {
                $sql_save = "INSERT INTO users(UserID, UserNick, Email, Password) values('$UserID','$UserNick','$Email','$Password')";
                $result = mysqli_query($con, $sql_save);
                if($result){
                    header("location: register.php?error=가입을 성공하였습니다");
                    exit();
                } else {
                    header("location: register.php?error=가입을 실패하였습니다&$UserInfo");
                    exit();
                }
            }
        }
    } else {
        header("location: register.php?error=알수없는 오류 발생&$UserInfo");
        exit();
    }
            // //암호화
            // md5();
            // password_hash();
?>