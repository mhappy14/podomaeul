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
		<a href="edit.php">프로필수정</a>
		<a href="logout.php"><button class="btn">Logout</button></a>
	</div>
</div>
<div class="container">
	<div class="box form-box">
		<header>Change Profile</header>
		<form action="" method="post">
			<div class="field input">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" autocomplete="off" required>
			</div>
			<div class="field input">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" autocomplete="off" required>
			</div>
			<div class="field input">
				<label for="age">Age</label>
				<input type="number" name="age" id="age" autocomplete="off" required>
			</div>
			<div class="field">
				<input type="submit" class="btn" name="submit" value="Update" required>
			</div>
		</form>
	</div>
</div>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>