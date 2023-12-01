<?php
    $title = '회원가입';
    // include('inc/header.php');
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"
?>

<div class="container">
	<div class="box form-box">

		<?php 
			include("php/config.php");
			if(isset($_POST['submit'])){
				$username = $_POST['username'];
				$email = $_POST['email'];
				$age = $_POST['age'];
				$password = $_POST['password'];

			$verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

				if(mysqli_num_rows($verify_query) !=0){
					echo "<div class='message'>
							<p>THIS email is used, Try another One Please</p>
						</div> <br>";
					echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
				} else {
					mysqli_query($con,"INSERT INTO users(UserID,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occured");
				
					echo "<div class='message'>
							<p>Registration Seccessfully!</p>
						</div> <br>";
					echo "<a href='index.php'><button class='btn'>Login Now</button>";
				} 
			} else {
		?>

		<header>Sign Up</header>
		<form action="register_server.php" method="post">

			<!-- 에러메시지 -->
			<?php if(isset($_GET['error'])){ ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>

			<!-- 성공메시지 -->
			<?php if(isset($_GET['success'])){ ?>
			<p class="success"><?php echo $_GET['success']; ?></p>
			<?php } ?>

			<div class="field input">
				<label for="UserID">UserID</label>
				<input type="text" name="UserID" id="UserID" autocomplete="off" required>
			</div>
			<div class="field input">
				<label for="UserNick">UserNick</label>
				<input type="text" name="UserNick" id="UserNick" autocomplete="off" required>
			</div>
			<div class="field input">
				<label for="Email">Email</label>
				<input type="text" name="Email" id="Email" autocomplete="off" required>
			</div>
			<div class="field input">
				<label for="Password">Password</label>
				<input type="Password" name="Password" id="Password" autocomplete="off" required>
			</div>
			<div class="field input">
				<label for="Passwordc">Passwordc</label>
				<input type="Passwordc" name="Passwordc" id="Passwordc" autocomplete="off" required>
			</div>
			<div class="field">
				<input type="submit" class="btn" name="submit" value="Register" required>
			</div>
			<div class="link">
				Already a member? <a href="login.php">Sign In</a>
			</div>
		</form>
	</div>
	<?php } ?>
</div>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>