<?php 
    $js_array = ['js/member_input.js'];
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
<main class="w-80 mx-auto">
    <h4 class="text-center">안녕하세요!<br><br>앞으로 제가 유익한 정보를 제공하는 웹사이트를 제작해보겠습니다.<br><br>많은 관심과 이용을 부탁드리겠습니다.</h4>
</main>
<?php include 'inc/footer.php'; ?>