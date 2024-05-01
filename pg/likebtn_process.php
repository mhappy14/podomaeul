<?php
include '../inc/common.php';
include '../inc/dbconfig.php';
include '../inc/member.php';
include '../inc/likebtn.php';

if($ses_id == '') {
    $arr = ["result" => "not login"];
    die(json_encode($arr));
}

$mode    = (isset($_POST['mode'   ]) && $_POST['mode'   ] != '') ? $_POST['mode'   ] : '';
$idx     = (isset($_POST['idx'    ]) && $_POST['idx'    ] != '') ? $_POST['idx'    ] : '';
$pidx    = (isset($_POST['pidx'   ]) && $_POST['pidx'   ] != '') ? $_POST['pidx'   ] : '';

if($mode == '') {
    $arr = ["result" => "empty mode"];
    die(json_encode($arr));
}

$likebtn = new Likebtn($db);

// 좋아요 처리
if($mode == 'likeup') {

    $arr = [ "pidx" => $pidx, "id" => $ses_id];
    
    $likebtn->likeup($arr);

    $arr = ["result" => "success"];
    die(json_encode($arr));
} else if ($mode == 'likedn') {

    $likebtn->likedn($pidx, $idx);

    $arr = ["result" => "success"];
    die(json_encode($arr));
}
