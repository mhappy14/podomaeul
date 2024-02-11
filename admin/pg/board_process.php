<?php

include '../../inc/common.php';
include '../../inc/dbconfig.php';
include '../../inc/boardmanage.php'; // 게시판 관리 class

$board_title = (isset($_POST['board_title']) && $_POST['board_title'] != '') ? $_POST['board_title'] : '';
$board_type  = (isset($_POST['board_type' ]) && $_POST['board_type' ] != '') ? $_POST['board_type' ] : '';
$mode        = (isset($_POST['mode'       ]) && $_POST['mode'       ] != '') ? $_POST['mode'       ] : '';
$idx         = (isset($_POST['idx'        ]) && $_POST['idx'        ] != '') ? $_POST['idx'        ] : '';

if($mode == '') {                       // 모드값이 비어있을 경우
    $arr = ["result" => "mode_empty"];  // result를 mode_empty로 반환하여 board.js에 알람전송
    die(json_encode($arr));             // {"result" : "mode_empty"}
}

$board = new BoardManage($db);

// 게시판 생성
if ($mode == 'input') {
    // 게시판 제목이 비어있을 경우
    if ($board_title == '') {
        $arr = ["result" => "title_empty"];
        die(json_encode($arr)); 
    }

    //게시판 타입이 비어있을 경우
    if($board_type == '') {
        $arr = ["result" => "btype_empty"];
        die(json_encode($arr)); 
    }

    // 게시판 코드 생성
    $bcode = $board->bcode_create();

    // 게시판 생성
    $arr = [ 
        "name" => $board_title,
        "btype" => $board_type,
        "bcode" => $bcode
    ];
    $board->create($arr);
    $arr = ["result" => "success"];
    die(json_encode($arr)); 

} else if ($mode == 'delete') {     // 게시판 삭제
    $board->delete($idx);     //delete는 ../../inc/board.php에서 정의하고 있음
    $arr = ["result" => "success"];
    die(json_encode($arr));   

} else if ($mode == 'edit') {     // 게시판 수정
    if($idx == '') {
        $arr = ["result" => "empty_idx"];
        die(json_encode($arr));       
    }
    if($board_title == '') {
        $arr = ["result" => "title_empty"];
        die(json_encode($arr));       
    }
    if($board_type == '') {
        $arr = ["result" => "btype_empty"];
        die(json_encode($arr)); 
    }
    
    $arr = [                      // 게시판 수정
        "name" => $board_title,
        "btype" => $board_type,
        "idx" => $idx
    ];

    $board->update($arr);

    $arr = ["result" => "edit_success"];
    die(json_encode($arr));   
} else if ($mode == 'getInfo') {
    if($idx == '') {
        $arr = ["result" => "empty_idx"];
        die(json_encode($arr));       
    }

    $row = $board->getInfo($idx);

    $arr = ["result" => "success", "list" => $row]; // 2차원 배열
    die(json_encode($arr));
}