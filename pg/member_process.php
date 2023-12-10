<?php

include '../inc/dbconfig.php';
include '../inc/member.php';

$mem = new Member($db);

$id    = (isset($_POST['id']) && $_POST['id'] !='') ? $_POST['id'] : '';
$email = (isset($_POST['email']) && $_POST['email'] !='') ? $_POST['email'] : '';
$mode = (isset($_POST['mode']) && $_POST['mode'] !='') ? $_POST['mode'] : '';

//아이디 중복확인
if ($mode == 'id_chk') {
    if($id == '') {
        die(json_encode(['result' => 'empty_id']));
    }

    if($mem -> id_exists($id)) {
        die(json_encode(['result' => 'fail']));
    } else {
        die(json_encode(['result' => 'success']));
    }
//이메일 중복확인
} else if ($mode == 'email_chk') {
    if($email == '') {
        die(json_encode(['result' => 'empty_email']));
    }
    if($mem -> email_exists($email)) {
        die(json_encode(['result' => 'fail']));
    } else {
        die(json_encode(['result' => 'success']));
    }
} else if ($mode == 'input') {

}