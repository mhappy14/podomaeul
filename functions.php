<?php
    function output($value){
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

    function authenticate_user($email, $password){
        if($email == USER_NAME && $password == PASSWORD){
            return true;
        }
    }

    function redirect($url){
        header("Location:$url");  //"" : 변수의 값을 출력, '' : 변수의 이름을 출력
    }
    
    function user_is_authenticated(){
        return isset($_SESSION['email']);
    }
    
    function ensure_user_is_authenticated(){
        if(!user_is_authenticated()){
            redirect('login.php');
            die();
        }
    }

?>


