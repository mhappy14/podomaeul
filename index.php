<?php
	SESSION_START();
	include("php/config.php");
    $title = '로그인';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

<div class="container">
	<div class="box form-box">
		<?php
			if(isset($_POST['submit'])){
				$email = mysqli_real_escape_string($con,$_POST['email']);
				$password = mysqli_real_escape_string($con,$_POST['password']);
				$result = mysqli_query($con,"SELECT * FROM users WHERE Email = '$email' AND Password='$password'") or die("Select Error");
				$row = mysqli_fetch_assoc($result);
				if(is_array($row) && !empty($row)){
					$_SESSION['valid'] = $row['Email'];
					$_SESSION['username'] = $row['Username'];
					$_SESSION['age'] = $row['Age'];
					$_SESSION['id'] = $row['Id'];
				} else{
					echo "<div class='message'>
							<p>Wrong Username of Password</p>
						</div> <br>";
					echo "<a href='index.php'><button class='btn'>Go Back</button>";
				}
				if(isset($_SESSION['valid'])){
					header("Location: home.php");
				}
			} else{
		?>
		<header>Login</header>
		<form action="" method="post">
			<div class="field input">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" autocomplete="off" required>
			</div>
			<div class="field input">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" autocomplete="off" required>
			</div>
			<div class="field">
				<input type="submit" class="btn" name="submit" value="Login" required>
			</div>
			<div class="link">
				Don't Have account? <a href="register.php">Sign Up Now</a>
			</div>
		</form>
	</div>
	<?php } ?>
</div>



<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>