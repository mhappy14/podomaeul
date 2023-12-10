<?php 
    $js_array = ['js/member_input.js'];
    $title = '포도마을';
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

<main class="w-80 mx-auto">
    <h1 class="text-center">안녕하세요!<br><br></h1>
    <h1 class="text-center">포도마을에 방문해주셔서 감사합니다.<br><br></h1>
    <h1 class="text-center">저는 포도마을 경비원입니다.<br><br></h1>
    <h3 class="text-center">앞으로 제가 유익한 정보를 제공하는 웹사이트를 제작할 예정입니다.<br><br></h3>
    <h1 class="text-center">많은 관심과 응원 바랍니다.<br><br></h1>
</main>
<?php include 'inc/footer.php'; ?>