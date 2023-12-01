<?php
	SESSION_START();
	include("php/config.php");
    
    if(isset($_POST['UserID'])&& isset($_POST['Password'])){
        //  보안(시큐어코딩=보안코딩)
        $UserID = mysqli_real_escape_string($con, $_POST['UserID']);
        $Password = mysqli_real_escape_string($con, $_POST['Password']);
        // // 에러 체크
        if (empty($UserID)) {
            header("location: login.php?error=아이디를 입력하세요");
            exit();
        } else if (empty($Password)){
            header("location: login.php?error=비밀번호를 입력하세요");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE UserID = '$UserID'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                $hash = $row['Password'];

                if(password_verify($Password, $hash)){
                    $_SESSION['UserID'] = $row['UserID'];
                    $_SESSION['UserNick'] = $row['UserNick'];
                    $_SESSION['UserEmail'] = $row['UserEmail'];
                    $_SESSION['ID'] = $row['ID'];
                    header("location: home.php");
                    exit();
                } else {
                    header("location: login.php?error=로그인에 실패하였습니다");
                    exit();
                }
            } else {
                header("location: login.php?error=없는 아이디입니다");
                exit();
            }
        }
    } else {
        header("location: login.php?error=알수없는 오류 발생");
        exit();
    }
            // //암호화
            // md5();
            // password_hash();
?>