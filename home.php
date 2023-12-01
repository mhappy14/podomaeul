<?php
	SESSION_START();
	include("php/config.php");
?>

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
				<p>Hello <b><?php echo $_SESSION['UserNick']; ?></b></p>
			</div>
			<div class="box">
				<p>Your email is <b><?php echo 'ㅇㅇㅇ입니다' ?></b></p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo 'ㅇㅇ살입니다' ?></b>.</p>
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



