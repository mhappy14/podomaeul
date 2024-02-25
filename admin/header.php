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
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img src="../images/logo.svg" class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">포도마을</span>
      </a>

      <ul class="nav nav-pills gap-3">
          <li class="nav-item"><a href="index.php" class="nav-link <?= ($menu_code == 'home') ? 'active': ''; ?>" aria-current="page">Home</a></li>
          <li class="nav-item"><a href="member.php" class="nav-link <?= ($menu_code == 'member') ? 'active': ''; ?>">회원관리</a></li>
          <li class="nav-item"><a href="board.php" class="nav-link <?= ($menu_code == 'board') ? 'active': ''; ?>">게시판관리</a></li>
          <li class="nav-item"><a href="../pg/logout.php" class="nav-link <?= ($menu_code == 'logout') ? 'active': ''; ?>">로그아웃</a></li>
       
      </ul>
    </header>