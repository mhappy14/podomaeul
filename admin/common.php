<?php
    session_start();
    $ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != '') ? $_SESSION['ses_id'] : '';
    $ses_level = (isset($_SESSION['ses_level']) && $_SESSION['ses_level'] != '') ? $_SESSION['ses_level'] : '';

    if($ses_id == '' || $ses_level != 10) {
        die("
        <script>
            alert('관리자 외 접근불가');
            sefl.location.href='../';
        </script>");
    }