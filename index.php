<!-- 
 -->
<?php require'database.php' ?>
<?php
session_start();
if(isset($_SESSION['user_id'])){
	header("Location: studentHome.php");
}
if(isset($_POST['signin'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$res=mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
  $row = mysqli_fetch_array($res);
  $count = mysqli_num_rows($res);
    if($count == 1 && $row['password']==MD5($password)){
    	  session_start();
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: studentHome.php");
	}else{
        $errMSG = "Incorrect Credentials, Try again...";
    }
}
if(isset($_POST['signup'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $conf_password = mysqli_real_escape_string($conn,$_POST['conf_password']);
        $res=mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
        $count = mysqli_num_rows($res);
        if($count==1){
            $errMSG = "email already exist";
        }
        elseif($password==$conf_password){
        $query = "INSERT INTO users(username, email, password) VALUES('$username','$email',MD5('$password'))";
                if(mysqli_query($conn, $query)){
                    $errMSG = "Registered Successfully!";
                } else {
                    echo 'ERROR: '. mysqli_error($conn);
                }
        }
        else{
            $errMSG = "passwords doesn't match";
        }
    }
?>


<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="Colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>LOGIN-pruthvish</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,500,600" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<!--link rel="stylesheet" href="login/css/linearicons.css"-->
		<!--link rel="stylesheet" href="login/css/owl.carousel.css"-->
		<link rel="stylesheet" href="login/css/font-awesome.min.css">
		<link rel="stylesheet" href="login/css/nice-select.css">
		<link rel="stylesheet" href="login/css/magnific-popup.css">
		<link rel="stylesheet" href="login/css/bootstrap.css">
		<link rel="stylesheet" href="login/css/main.css">
	</head>
	<body>

		<div class="container">
				<div class="row"> <br><br><br><br><br><br><br></div>

			<section class="contact-area pt-100 pb-100 relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-center text-center">
						<div class="single-contact col-lg-6 col-md-8">
							<h2 class="text-white">LOGIN <span>to PESU </span></h2>
							<p class="text-white">
								All the best
							</p>
						</div>
					</div>

					<form name="loginForm" id="loginForm" action="index.php" method="post" class="contact-form">
						<div class="row justify-content-center">
									
							<div class="col-lg-5">
								<input name="username" placeholder="Enter user name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter username'" class="common-input mt-20" required=""  id="inputEmail">
							</div>
							<div class="col-lg-5">
									<input name="password" placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter password'" class="common-input mt-20" required="" type="password" id="inputPassword">
							</div>
							

							<div class="col-lg-10 d-flex justify-content-end">
							<button class="primary-btn white-bg d-inline-flex align-items-center mt-20" type="submit" id="submit"  name="signin"><span class="text-black mr-10" id="loginBtn">LOGIN NOW</span><span class="text-black lnr lnr-arrow-right"></span></button><div>&nbsp&nbsp</div>
							
							<button class="primary-btn white-bg d-inline-flex align-items-center mt-20"  id="submit1"><span class="text-black mr-10" id="loginBtn"><a href = "./signup.php">sign up</a></span><span class="text-black lnr lnr-arrow-right"></span></button>
							<!--  <div class="form-group"><input class="form-control" type="submit" name="signin" value="Sign In"></div><br>
						 --></div><br><center><span><?php if(isset($errMSG)){echo $errMSG;}?></span></center>
						<div class="col-lg-5 col-sm-2"><div id="invalid" style="color: red; text-align: center;"></div></div>

						</div></form></div></section></div>
					</div>
					<a style="position:fixed;bottom:0;left:0;" class="btn btn-primary btn-block" href="admin.php">Go To teacher Section</a>



		<script src="login/js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="login/js/vendor/bootstrap.min.js"></script>
		<script src="login/js/jquery.ajaxchimp.min.js"></script>
		<script src="login/js/owl.carousel.min.js"></script>
		<script src="login/js/jquery.nice-select.min.js"></script>
		<script src="login/js/parallax.min.js"></script>
		<script src="login/js/jquery.magnific-popup.min.js"></script>
		<!--script src="login/js/main.js"></script-->
		<!--script src="login.js"></script-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="js/login.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	</body>
</html>

