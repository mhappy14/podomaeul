<?php
    $title = '로그인';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

<div class="nav"> <!-- 단축키 div.nav>  -->
	<div class="logo">
		<p><a href="home.php">포도마을</a></p>
	</div>
	<div class="menu">
		<div class="menu1">
			<p><a href="home.php">자격증공부</a></p>
		</div>
		<div class="menu1">
			<p><a href="home.php">영어공부</a></p>
		</div>
		<div class="menu1">
			<p><a href="home.php">웹개발</a></p>
		</div>
	</div>
	<div class="right-links">
		<a href="edit.php">프로필수정</a>
		<a href="logout.php"><button class="btn">Logout</button></a>
	</div>
</div>

<main>
	<div class="main-box top"> <!-- 단축키 div.main-box.top>  -->
		<div class="top">
			<div class="box">
				<p>안녕하세요<br><br></p>
				<p>저는 포도마을에 사는 주민입니다.<br><br></p>
				<p>앞으로 제가 유익한 정보를 제공하는 웹사이트를 제작해보겠습니다.<br><br></p>
				<p>감사합니다~!</p>
			</div>
		</div>
 	</div>
</main>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>


<!-- 함수는 (), 변수는 [], 실행은 {} -->

<!-- 예시 -->
<!-- isset() -->
<!-- mysqli_real_escape_string() -->
<!-- if(){} -->
<!-- $_POST[] -->



