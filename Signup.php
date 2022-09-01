<?php require("register.class.php") ?>
<?php
	if(isset($_POST['submit'])){
		$user = new RegisterUser($_POST['name'], $_POST['password'], $_POST['email']);
	}
?>

<?php
include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email'AND  password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'Email already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 200000000000000000000000000000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO user_form (name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:index.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="bg-img">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section" style="color: black;">Signup</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
					  <h3 class="mb-4 text-center">Don't have an account?</h3>
					  <form  id="signup_page" action="#" class="signin-form signup-now" method="post">
					  <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
						  <div class="form-group">
							  <input type="text" name="name"class="form-control" placeholder="Username" required>
						  </div>
						  <div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email" required>
						</div>
						
					<div class="form-group">
					  <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
					  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					</div>
					<div class="form-group">
						<input id="password-field" name="cpassword" type="password" class="form-control" placeholder="Re-Type Password" required>
						<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					  </div>
	
					<div class="form-group">
						<button type="submit" name="submit" value="signup-now" class="form-control btn btn-primary submit px-3">Sign In</button>
					</div>
					<div id="error"></div>
					</div>
					<p style="left: 50%; color:black;">Already have an account?</p>
					<div class="w-50 text-md-right">
						<br>
						<a class="btn btn-white btn-animate" href="index.php" style="color: black">Sign In</a>
					</div>
					<div class="form-group">
						<div id="message" class="col-sm-offset-3 col-sm-6 m-t-15"></div>
					</div>
				  </form>
				  </div>
					</div>
				</div>
			</div>
	
			<!-- Site footer -->
		</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/signup.js"></script>

	</body>
</html>

