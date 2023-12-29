<?php
$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$pw = (isset($_POST['pw']) && $_POST['pw'] != '') ? $_POST['pw'] : '';

if($id == '') {
    $arr = ['result' => 'empty_id'];
    die(json_encode($arr)); // ['result' => 'empty_id'] 이 부분을 {'result' => 'empty_id'}로 인코딩 해줌
}

if($pw == '') {
    $arr = ['result' => 'empty_pw'];
    die(json_encode($arr)); // ['result' => 'empty_id'] 이 부분을 {'result' => 'empty_id'}로 인코딩 해줌
}

include '../inc/dbconfig.php';
include '../inc/member.php';

$mem = new Member($db);

if ($mem->login($id, $pw)) {
    $arr = ['result' => 'login_success'];
    $memArr = $mem->getInfo($id);
    session_start();
    $_SESSION['ses_id'] = $id;
    $_SESSION['ses_level'] = $memArr['level'];
}else {
    $arr = ['result' => 'login_fail'];
}
die(json_encode($arr));
?>