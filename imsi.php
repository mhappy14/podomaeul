<?php
    include 'inc/dbconfig.php';
    include 'inc/member.php';

    $id = 'aa';
    $mem = new Member($con);
    
    if ($mem-> id_exists($id)) {
        echo "아이디 중복";
    } else {
        echo "사용이 가능한 아이디입니다.";
    }