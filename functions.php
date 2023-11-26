<?php
    function output($value){
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

    function authenticate_user($email, $password){
        if($email = USER_NAME && $password = PASSWORD){
            return true;
        }
    }

?>