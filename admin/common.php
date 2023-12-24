<?php  //관리자만 접속이 가능하도록 설정
session_start();

$ses_id    = (isset($_SESSION['ses_id'   ]) && $_SESSION['ses_id'   ] != '' ) ? $_SESSION['ses_id'   ] : '';
$ses_level = (isset($_SESSION['ses_level']) && $_SESSION['ses_level'] != '' ) ? $_SESSION['ses_level'] : '';

if($ses_id == '' || $ses_level != 10) {
    die("
    <script>
        alert('접속 불가(관리자 전용)');
        self.location.href='../';
    </script>");
}