<?php
$g_title = '네카라쿠배';
$js_array = [ 'js/home.js' ];

$menu_code = 'home';

include 'inc/common.php';
include 'inc/dbconfig.php';

// 게시판 목록
include 'inc/boardmanage.php';
$boardm = new BoardManage($db);
$boardArr = $boardm->list();

include 'inc/header.php';

?>

<script>
  function setCookie(name, value, exp) {
    let data = new Date()
    data.setTime(data.getTime() + exp * 24 * 60 * 60 * 1000)
    document.cookie = name + '=' + value + ';expires=' + data.toUTCString() + ';path=/';
  } 

  const closes = document.querySelectorAll(".close")
  closes.forEach((box) => {
    box.addEventListener("click", () => {
      box.parentNode.parentNode.style.display = 'none'
    })
  })

  const chk_closes = document.querySelectorAll('.chk_close')
  chk_closes.forEach((box) => {
    box.addEventListener("click", () => {
      let term = 0
      switch(box.value) {
        case 'day' : term = 1; break;
        case 'week' : term = 7; break;
        case 'month' : term = 30; break;
      }
      setCookie('pop' + box.dataset.idx, '1', term)
      box.parentNode.parentNode.style.display = 'none'
    })
  })
</script>

<main class="w-90 mx-auto border rounded-5 p-5 d-flex gap-5" style="height:calc(100vh-257px)">
<div class="w-5">
    <img src="images/logo.svg" width=100px alt="">
    <img src="images/logo.svg" width=100px alt="">
</div>
<div>
    <h1 class="text-center">안녕하세요!<br><br></h1>
    <h2 class="text-center">포도마을에 방문해주셔서 감사합니다.<br><br></h2>
    <h3 class="text-center">앞으로 제가 유익한 정보를 제공하는 웹사이트를 제작할 예정입니다.<br><br></h3>
    <h2 class="text-center">이 곳이 여러분의 앞날에 도움이 되도록 노력하겠습니다.<br><br></h2>
    <h2 class="text-center">많은 관심과 응원 바랍니다.<br><br></h2>
</div>
<div class="w-5">
    <img src="images/logo.svg" width=100px alt="">
    <img src="images/logo.svg" width=100px alt="">
</div>

</main>
<?php include 'inc/footer.php'; ?>