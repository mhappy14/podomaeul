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
					mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occured");
				
					echo "<div class='message'>
							<p>Registration Seccessfully!</p>
						</div> <br>";
					echo "<a href='index.php'><button class='btn'>Login Now</button>";
				} 
			} else {
		?>

		<header>Sign Up</header>
		<form action="register_server.php" method="post">
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
			<div class="field input">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" autocomplete="off" required>
			</div>
			<div class="field input">
				<label for="passwordc">Password Confirmation</label>
				<input type="passwordc" name="passwordc" id="passwordc" autocomplete="off" required>
			</div>
			<div class="field">
				<input type="submit" class="btn" name="submit" value="Register" required>
			</div>
			<div class="link">
				Already a member? <a href="index.php">Sign In</a>
			</div>
		</form>
	</div>
	<?php } ?>
</div>



<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"
?>