<?php
    if(!isset($title)){
        $title='';
    }
?>
<!-- 함수도 이와같이 따로 파일을 작성하여 불러오는 방식으로 사용가능 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= (isset($title) && $title != '') ? $title : '포도마을'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../css/mhcss.css">
  <?php
    if(isset($js_array)){
      foreach ($js_array AS $var) {
        echo '<script src="'.$var.'?v='.date('YmdHis').'"></script>'.PHP_EOL;
      }
    }
  ?>
</head>
<body>
  <div class="container">
    <header><!--  style="background-color: #8523a1;" -->
      <div class="d-flex flex-wrap justify-content-center py-2 mb-2 border-bottom">
        <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <img src="../images/logo.svg" class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-6">포도마을</span>
        </a>
        <ul class="nav nav-pills gap-3">
          <?php if(isset($ses_id) && $ses_id != '') {
            //로그인 상태
          ?>
          <li><a href="index.php" class="nav-link text-black-50 fs-6 <?= ($menu_code == 'home') ? 'fw-bold': ''; ?>">Home</a></li>
          <li><a href="intro.php" class="nav-link text-black-50 fs-6 <?= ($menu_code == 'intro') ? 'fw-bold': ''; ?>">소개</a></li>
          <?php if($ses_level == 10) {
          ?>  
          <li><a href="../admin/" class="nav-link text-black-50 fs-6 <?= ($menu_code == 'member') ? 'fw-bold': ''; ?>">Admin</a></li>
          <?php
          } else { ?>
          <li class="license">
            <a href="board.php" class="license nav-link text-black-50 fs-6 <?= ($menu_code == 'board') ? 'fw-bold': ''; ?>">자격증</a>
            <div class="dropdownlicense">
              <a href="board.php">조경기술사</a>
              <a href="#">자연환경관리기술사</a>
            </div>
          </li>
          <li><a href="law.php" class="nav-link text-black-50 fs-6 <?= ($menu_code == 'law') ? 'fw-bold': ''; ?>">법·규정</a></li>
          <li><a href="../mypage.php" class="nav-link text-black-50 fs-6 <?= ($menu_code == 'mypage') ? 'fw-bold': ''; ?>">My Page</a></li>
          <?php } ?>
          <li><a href="./pg/logout.php" class="nav-link text-black-50 fs-6 <?= ($menu_code == 'login') ? 'fw-bold': ''; ?>">로그아웃</a></li>
        </ul>
      </div>
<?php
} else {
  // 로그인 안된 상태
?>
        <li class="nav-item"><a href="index.php" class="nav-link <?= ($menu_code == 'home') ? 'fw-bold': ''; ?>">Home</a></li>
        <li class="nav-item"><a href="intro.php" class="nav-link <?= ($menu_code == 'intro') ? 'fw-bold': ''; ?>">소개</a></li>
        <li class="nav-item"><a href="board.php" class="nav-link <?= ($menu_code == 'board') ? 'fw-bold': ''; ?>">자격증</a></li>
        <li class="nav-item"><a href="law.php" class="nav-link <?= ($menu_code == 'law') ? 'fw-bold': ''; ?>">법·규정</a></li>
        <li class="nav-item"><a href="login.php" class="nav-link <?= ($menu_code == 'login') ? 'fw-bold': ''; ?>">로그인</a></li>
      </ul>
    </header>
<?php
}
?>
  <?php
    if($menu_code == 'board') {
      echo '<div class="py-1 mb-4 border-bottom"><ul class="nav"><li><a class="nav-link fw-bold text-danger">과목</a></li>';
      foreach($boardArr AS $row) {
          echo '<li class="d-flex flex-wrap nav-pills gap-3 justify-content-center"><a href="board.php?bcode='.$row['bcode'].'" class="nav-link';
          if(isset($_GET['bcode']) && $_GET['bcode'] == $row['bcode']) {
              echo ' fw-bold';
          }
          echo '">'.$row['name'].'</a></li>';
      }
      echo '</ul></div>';
    }
  ?>
</header>