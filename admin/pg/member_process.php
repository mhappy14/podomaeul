<?php
include '../common.php';  //관리자만 접속이 가능하도록
include '../../inc/dbconfig.php';
include '../../inc/member.php';

$mem = new Member($db);

$idx    = (isset($_POST['idx']) && $_POST['idx'] !='') ? $_POST['idx'] : '';
$id    = (isset($_POST['id']) && $_POST['id'] !='') ? $_POST['id'] : '';
$password = (isset($_POST['password']) && $_POST['password'] !='') ? $_POST['password'] : '';
$name = (isset($_POST['name']) && $_POST['name'] !='') ? $_POST['name'] : '';
$email = (isset($_POST['email']) && $_POST['email'] !='') ? $_POST['email'] : '';
$zipcode = (isset($_POST['zipcode']) && $_POST['zipcode'] !='') ? $_POST['zipcode'] : '';
$addr1 = (isset($_POST['addr1']) && $_POST['addr1'] !='') ? $_POST['addr1'] : '';
$addr2 = (isset($_POST['addr2']) && $_POST['addr2'] !='') ? $_POST['addr2'] : '';
$old_photo = (isset($_POST['old_photo']) && $_POST['old_photo'] !='') ? $_POST['old_photo'] : '';
$level = (isset($_POST['level']) && $_POST['level'] !='') ? $_POST['level'] : '';

//프로필 이미지 업로드
if(isset($_FILES['photo']) && $_FILES['photo']['name'] != '') {  //새로운 이미지를 등록한 경우
    $new_photo = $_FILES['photo'];
    $old_photo = $mem->profile_upload($id, $new_photo, $old_photo);
}

$arr = [
    'idx' => $idx,
    'id' => $id,
    'password' => $password,
    'name' => $name,
    'email' => $email,
    'zipcode' => $zipcode,
    'addr1' => $addr1,
    'addr2' => $addr2,
    'photo' => $old_photo,  //새로운 사진으로 바꿔진 이미지를 어레이에 입력
    'level' => $level
];

$mem -> edit($arr);

echo "
<script>
    alert('수정 완료');
    self.location.href='../index.php'
</script>
";