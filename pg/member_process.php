<?php

include '../inc/dbconfig.php';
include '../inc/member.php';

$mem = new Member($db);

$id    = (isset($_POST['id']) && $_POST['id'] !='') ? $_POST['id'] : '';
$password = (isset($_POST['password']) && $_POST['password'] !='') ? $_POST['password'] : '';
$name = (isset($_POST['name']) && $_POST['name'] !='') ? $_POST['name'] : '';
$email = (isset($_POST['email']) && $_POST['email'] !='') ? $_POST['email'] : '';
$zipcode = (isset($_POST['zipcode']) && $_POST['zipcode'] !='') ? $_POST['zipcode'] : '';
$addr1 = (isset($_POST['addr1']) && $_POST['addr1'] !='') ? $_POST['addr1'] : '';
$addr2 = (isset($_POST['addr2']) && $_POST['addr2'] !='') ? $_POST['addr2'] : '';
$photo = (isset($_POST['photo']) && $_POST['photo'] !='') ? $_POST['photo'] : '';
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
    //프로필 이미지 업로드
    $tmparr = explode('.', $_FILES['photo']['name']);
    $ext = end($tmparr);
    $photo = $id.'.'.$ext;
    copy($_FILES['photo']['tmp_name'],"../data/profile/". $photo); // ../ →부모폴더, ./ →현재 폴더
    $arr = [
        'id' => $id,
        'password' => $password,
        'name' => $name,
        'email' => $email,
        'zipcode' => $zipcode,
        'addr1' => $addr1,
        'addr2' => $addr2,
        'photo' => $photo
    ];

    $mem -> input($arr);
}