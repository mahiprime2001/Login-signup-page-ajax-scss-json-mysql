

<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:user_profile.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta id="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
       
	</style>

	</head>
	<body class="bg-img" >
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style="color: black;">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center" style="color: black;">Have an account?</h3>
		      	<form class="signin-form login-now" method="POST" enctype="multipart/form-data">
                   
                    <?php 
                    if(isset($message)){
                        foreach($message as $message){
                            echo '<div class="message"'.$message.'</div>';
                        }
                    }
                    ?>
                    <div class="form-group">
		      			<input type="email" class="form-control" name="email" placeholder="EMAIL" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
				  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="submit" class="form-control btn btn-primary submit px-3" value="login-now">Sign In</button>
	            </div>
				<div class="error">	
				</div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="forgot.php" style="color: rgb(0, 0, 0)">Forgot Password</a>
								</div>
	            </div>
				<p style="left: 50%; color:black;">don't have an account?</p>
				<div>
					<div class="w-50 text-md-right">
						<a  class="btn btn-white btn-animate" href="Signup.php" style="color: rgb(0, 0, 0);">Signup</a>
					</div>
				</div>
            </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script>

  </script>

	</body>
</html>

