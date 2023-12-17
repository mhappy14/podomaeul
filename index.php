<?php 
    session_start();
    $ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != '') ? $_SESSION['ses_id'] : '';
    $ses_level = (isset($_SESSION['ses_level']) && $_SESSION['ses_level'] != '') ? $_SESSION['ses_level'] : '';
    $js_array = ['js/home.js'];
    $menu_code = 'index';
    include 'inc/header.php';
?>
<?php
if(!isset($_POST['chk']) or $_POST['chk'] !=1) {
    // die("<script>
    // alert('약관 동의가 필요합니다.')
//     // self.location.href='.stipulation.php'
// </script>");
}
?>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

<main class="w-90 mx-auto border rounded-5 p-5 d-flex gap-5" style="height:calc(100vh-257px)">
<div class="w-5">
    <img src="images/logo.svg" width=100px alt="">
    <img src="images/logo.svg" width=100px alt="">
    <img src="images/logo.svg" width=100px alt="">
</div>
<div>
    <h1 class="text-center">안녕하세요!<br><br></h1>
    <h2 class="text-center">포도마을에 방문해주셔서 감사합니다.<br><br></h2>
    <h3 class="text-center">앞으로 제가 유익한 정보를 제공하는 웹사이트를 제작할 예정입니다.<br><br></h3>
    <h2 class="text-center">포도마을이 여러분의 앞날에 도움이 되도록 노력하겠습니다.<br><br></h2>
    <h2 class="text-center">많은 관심과 응원 바랍니다.<br><br></h2>
</div>
<div class="w-5">
    <img src="images/logo.svg" width=100px alt="">
    <img src="images/logo.svg" width=100px alt="">
    <img src="images/logo.svg" width=100px alt="">
</div>

</main>
<?php include 'inc/footer.php'; ?>