<?php
	SESSION_START();
	include("php/config.php");
	if(!isset($_SESSION['valid'])){
		header("Location: index.php");
	}
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
	<div class="right-links">

		<?php
		$id = $_SESSION["id"];
        $result = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");
		$row = mysqli_fetch_assoc($result);
		print_r($row);
			$res_Uname = $result['Username'];
			$res_Email = $result['Email'];
			$res_Age = $result['Age'];
			$res_id = $result['Id'];
		
		
		echo "<a href='edit.php?Id=$res_id'><Change Profile</a>";
		?>


		<a href="edit.php">프로필수정</a>
		<a href="logout.php"><button class="btn">Logout</button></a>
	</div>
</div>

<main>
	<div class="main-box top"> <!-- 단축키 div.main-box.top>  -->
		<div class="top">
			<div class="box">
				<p>Hello <b><?php echo $res_Uname ?></b></p>
			</div>
			<div class="box">
				<p>Your email is <b><?php echo $res_Email ?></b></p>
			</div>
		</div>
		<div class="bottom">
			<div class="box">
				<p>And you are <b><?php echo $res_Age ?></b>.</p>
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



