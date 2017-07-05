<?php
session_start();
require_once('config.php');

if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = md5($_POST['password']);

  // MySQL Scripts
	$sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);

	// Validation
		if($count == 1){
		$_SESSION['username'] = $username;
	}else{
		$fmsg = "Invalid Username/Password";
	}
}
if(isset($_SESSION['username'])){
	$smsg = "User already logged in";
	echo "<script> window.location.assign('welcome.php'); </script>";
	exit();
}
?>

<!-- HTML Starts -->
<!DOCTYPE html>
<html>
	<head>
		<!--  Meta Tag -->
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Ömer Mindivanli AB</title>
	  <base target="_self">
	  <meta name="description" content="" />
	  <meta name="google" value="notranslate">

		<!-- Google Font API's -->
	  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

		<!-- Bootstrap References for CSS  -->
	  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />

		<!-- MY CSS -->
    <link href="font.css" rel="stylesheet">
	  <style type="text/css"></style>
  </head>

  <body>
  <div class="container py-4">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center mb-4">Ömer Mindivanli AB</h2>

        <hr class="mb-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formLogin"></span>

                   <div class="card card-outline-secondary">
                       <div class="card-header">
                           <h3 class="mb-0">Login</h3>
                       </div>
                       <div class="card-block">

                           <form class="form" method="POST" role="form" autocomplete="off">
                               <div class="form-group">
                                   <input type="text" class= "form-control" name="username" id="name" placeholder="Username" required="">
                                   <label for="inputPassword" class="sr-only">Password</label>
                               </div>

                               <div class="form-group">
                                  <label for="inputPassword" class="sr-only">Password</label>
                                   <input placeholder="Password" type="password" class="form-control" name="password" id="inputPassword" required="" autocomplete="new-password">
                               </div>

                               <div class="form-check small">
                                   <label class="form-check-label">
                                       <input type="checkbox" class="form-check-input"> <span>Remember me on this computer</span>
                                   </label>
                               </div>
                               <button type="submit" class="btn btn-success btn-lg float-right">Login</button>
                           </form>
                       </div>
                   </div>
                   <!-- Login -->
		<div class="container">
			<h1></h1>
	  </div>

		<!-- Footer  -->
		<div class="mastfoot">
	    <div class="inner">
	        <p class="float-right"><a href="register.php"> Back Register</a></p>
	        <p>&copy; 2017 Ömer Mindivanli AB &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </div>

		<!-- jQuery library -->
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"></script>
	  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

	</body>
</html>
