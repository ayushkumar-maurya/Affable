
<!DOCTYPE html>
<html lang="zxx" class="no-js">
   <head>
      <!-- Mobile Specific Meta -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta charset="UTF-8">
      <!-- Site Title -->
      <title>SME4U || HOME</title>
      <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:400,500" rel="stylesheet">
      <!--fontawesome-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap.css">
      <!-- Owl carousel --->
      <link rel="stylesheet" href="css/owl.carousel.css">
      <!--Flickity carousel --->
      <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
      <!--Page css -->
	  <link rel="stylesheet" href="css/style.css">
	  <!--jQuery Script-->
	  <script src="js/jquery-2.2.4.min.js"></script>
	</head>
   <body data-spy="scroll" data-target=".navbar" data-offset="50">
      <!-- Start Header Area -->
      <header class="default-header">
         <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
               <a class="navbar-brand" href="index.html">
                  <!-- <img src="img/logo.png" alt=""> -->
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="fa fa-bars"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                     <li type="button" data-toggle="collapse" data-target="#navbarSupportedContent"><a class="active" href="#section1">Who are we</a></li>
                     <li type="button" data-toggle="collapse" data-target="#navbarSupportedContent"><a href="#section2">How it works</a></li>
                     <li type="button" data-toggle="collapse" data-target="#navbarSupportedContent"><a href="#section3">SME Community</a></li>
                     <li type="button" data-toggle="collapse" data-target="#navbarSupportedContent"><a href="#section4">FAQ</a></li>
                     <li type="button" data-toggle="collapse" data-target="#navbarSupportedContent"><a href="#section5">Write to us</a></li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Sign In
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#" type="button" id="userSignIn" data-toggle="modal" data-target="#signInUser" onclick="hideuserOTPsection();">Sign In as user</a>
                           <a class="dropdown-item" href="#" type="button" id="smeSignIn" data-toggle="modal" data-target="#signInSME" onclick="hidesmeOTPsection();">Sign In as SME</a>
                        </div>
                     </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Register
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#" type="button"  id="userRegister" data-toggle="modal" data-target="#registerUser">Register as user</a>
                           <a class="dropdown-item" href="#" type="button" id="smeRegister" data-toggle="modal" data-target="#registerSME">Register as SME</a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <!-- End Header Area -->
      <!-- modal for user registration --->
      <div class="modal fade" id="registerUser" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <!-- <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal_title">Join Affable</h2>
                  </div> -->
               <div class="modal-body">
                  <div class="signup_section">
                     <button type="button" class="facebook_button">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <p>Continue with Facebook</p>
                     </button>
                     <button type="button" class="google_button">
                        <span><i class="fab fa-google"></i></span>
                        <p>Continue with Google</p>
                     </button>
                     <div class="form_separator">
                        <span>OR</span>
                     </div>
                     <form action="" method="">
                        <div class="form">
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your name" id="reg-name" name="reg-name" required="">
                           </div>
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your Email" id="reg-email" name="reg-email" required="">
                           </div>
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your Mobile number" id="reg-phone" name="reg-phone">
                           </div>
                           <div class="inputfield">
                              <input type="password" class="input" placeholder="Create your password" id="reg-password" name="reg-password" required="">
                           </div>
                           <div class="inputfield">
                              <input type="password" class="input" placeholder="Confirm your password" id="reg-cpassword" name="reg-cpassword" required="">
                           </div>
                           <div class="inputfield">
                              <input type="button" value="Register as user" class="btn" id="register" name="register">
						   </div>
						   <div class="alert alert-danger" role="alert" id="reg-error" style="display: none;">
						   </div>
						    <div class="alert alert-success" role="alert" id="email-sent-msg-user" style="display: none;">
							<p>Verification mail has been sent to your registered email id</p>
						   </div>
						 
							
                           <!-- <div class="inputfield terms">
                              <p>By joining I agree to the terms and conditions of Affable</p>
                              </div> -->
                        </div>
                     </form>
                  </div>
                  <footer class="modal_content_footer">
                     <div class="modal_content_footer_body">
                        <p>Already a member?<span><button class="link_button" onclick="location.href='index.php?userSignIn=1';">Sign In</button></span></p>
                     </div>
                  </footer>
               </div>
            </div>
         </div>
	  </div>
	  	<script>
			$(document).ready(function() {
				$('#register').click(function() {
					var name = $('#reg-name').val();
					var email = $('#reg-email').val();
					var phone = $('#reg-phone').val();
					var password = $('#reg-password').val();
					var cpassword = $('#reg-cpassword').val();
					$.ajax({
						url: "user_registration_validation.php",
						method: "POST",
						data: {name:name, email:email, phone:phone, password:password, cpassword:cpassword},
						success: function(error) {
							if(error == 0) {
								
								//window.location.replace("/Affable");
								$.ajax({
									url: "user_registration_entry.php",
									method: "POST",
									data: {name:name, email:email, phone:phone, password:password}
									
								});
								$('#reg-error').hide();
								$('#email-sent-msg-user').show();
							}
							else {
								document.getElementById("reg-error").innerHTML = error;
								document.getElementById("reg-error").style.display = "block";
							}
						}
					});
				});
			});
		</script>

      <!--end modal for user registration --->
	       <div class="modal fade" id="registerSME" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <!-- <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal_title">Join Affable</h2>
                  </div> -->
               <div class="modal-body">
                  <div class="signup_section">
                     <button type="button" class="facebook_button">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <p>Continue with Facebook</p>
                     </button>
                     <button type="button" class="google_button">
                        <span><i class="fab fa-google"></i></span>
                        <p>Continue with Google</p>
                     </button>
                     <div class="form_separator">
                        <span>OR</span>
                     </div>
                     <form action="" method="">
                        <div class="form">
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your name" id="sme-reg-name" name="sme-reg-name" required="">
                           </div>
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your Email" id="sme-reg-email" name="sme-reg-email" required="">
                           </div>
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your Mobile number" id="sme-reg-phone" name="sme-reg-phone">
                           </div>
                           <div class="inputfield">
                              <input type="password" class="input" placeholder="Create your password" id="sme-reg-password" name="sme-reg-password" required="">
                           </div>
                           <div class="inputfield">
                              <input type="password" class="input" placeholder="Confirm your password" id="sme-reg-cpassword" name="sme-reg-cpassword" required="">
                           </div>
                           <div class="inputfield">
                              <input type="button" value="Register as SME" class="btn" id="reg_sme" name="reg_sme">
						   </div>
						   <div class="alert alert-danger" role="alert" id="reg-error-sme" style="display: none;">
						   </div>
						   <div class="alert alert-success" role="alert" id="email-sent-msg-sme" style="display: none;">
							<p>Verification mail has been sent to your registered email id</p>
						   </div>
                           <!-- <div class="inputfield terms">
                              <p>By joining I agree to the terms and conditions of Affable</p>
                              </div> -->
                        </div>
                     </form>
                  </div>
                  <footer class="modal_content_footer">
                     <div class="modal_content_footer_body">
                        <p>Already a member?<span><button class="link_button" onclick="location.href='index.php?smeSignIn=1';">Sign In</button></span></p>
                     </div>
                  </footer>
               </div>
            </div>
         </div>
	  </div>
	  	<script>
			$(document).ready(function() {
				$('#reg_sme').click(function() {
					var name = $('#sme-reg-name').val();
					var email = $('#sme-reg-email').val();
					var phone = $('#sme-reg-phone').val();
					var password = $('#sme-reg-password').val();
					var cpassword = $('#sme-reg-cpassword').val();
					$.ajax({
						url: "sme_registration_validation.php",
						method: "POST",
						data: {name:name, email:email, phone:phone, password:password, cpassword:cpassword},
						success: function(error) {
							if(error == 0) {
								//window.location.replace("/Affable");
								$.ajax({
									url: "sme_registration_entry.php",
									method: "POST",
									data: {name:name, email:email, phone:phone, password:password}
								});
								$('#reg-error-sme').hide();
								$('#email-sent-msg-sme').show();
							}
							else {
								document.getElementById("reg-error-sme").innerHTML = error;
								document.getElementById("reg-error-sme").style.display = "block";
							}
						}
					});
				});
			});
		</script> 
		<!-- modal for SME registration --->
	  

	  
      <!-- end modal for SME registration --->
      <!-- modal for user login --->
      <div class="modal fade" id="signInUser" role="dialog">
         <div class="modal-dialog" id="otp_modal_dialogue_user">
            <!-- Modal content-->
            <div class="modal-content" id="signIn_modal_content_user">
               <!--  <div class="modal-header">
                  <h2 class="modal_title">SignIn</h2>
                  </div> -->
               <div class="modal-body signin_modal_body">
                  <div class="signup_section">
                     <button type="button" class="facebook_button">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <p>Continue with Facebook</p>
                     </button>
                     <button type="button" class="google_button">
                        <span><i class="fab fa-google"></i></span>
                        <p>Continue with Google</p>
                     </button>
                     <div class="form_separator">
                        <span>OR</span>
                     </div>
                     <form method="">
                        <div class="form">
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your Email" id="signin-email" name="signin-email" required="">
                           </div>
                           <div class="inputfield">
                              <input type="password" class="input" placeholder="Enter your password" id="signin-password" name="signin-password" required="">
                           </div>
                           <div class="inputfield terms forgot_password_link" style="margin-bottom: -10px;">
                              <p onclick="forgotPassworduser();">Forgot password</p>
                           </div>
                           <div class="inputfield">
                              <input type="button" value="LOGIN AS USER" class="btn" id="signin" name="signin">
						   </div>
						   <div class="alert alert-danger" role="alert" id="signin-error" style="display: none;">
						   </div>
                        </div>
                     </form>
                     <div class="form_separator">
                        <span>OR</span>
                     </div>
                     <form>
                        <div class="form">
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your email id to signin with OTP" name="email">
                           </div>
                           <div class="inputfield">
                              <input value="GET OTP TO MOBILE NUMBER" class="btn" name="submit" type="button" onclick="otpboxUSER();">
                           </div>
                        </div>
                     </form>
                  </div>
                  <footer class="modal_content_footer">
                     <div class="modal_content_footer_body">
                        <p>New member?<span><button class="link_button" onclick="location.href='index.php?userRegister=1';">Register</button></span></p>
                     </div>
                  </footer>
               </div>
            </div>
            
			
			<div class="modal-content otp_modal_content" id="otp_modal_content_user">
               <div class="modal-header">
                  <h2 class="modal_title"></h2>
               </div>
               <div class="modal-body">
                  <div class="otpbox">
                     <img src="images/OTP.png" height="200" width="275">
                     <div id="veri">
                        <h3 class="otphead">VERIFY WITH OTP</h3>
                     </div>
                     <div class="inputfield terms otp_message">
                        <p>Enter OTP sent to your mobile</p>
                     </div>
                     <form onsubmit="return false">
                        <div class="form-group fetch_results">
                           <input  class="digit text-center " type="text" id="otp_val1" maxLength="1" size="1" pattern="[0-9]{1}" onfocus="this.value=''" onkeyup="clickEvent(this,'otp_val2')" >
                           <input  class="digit text-center" type="text" id="otp_val2" maxLength="1" size="1" pattern="[0-9]{1}" onfocus="this.value=''" onkeyup="clickEvent(this,'otp_val3')">
                           <input class="digit text-center" type="text" id="otp_val3" maxLength="1" size="1" pattern="[0-9]{1}" onfocus="this.value=''" onkeyup="clickEvent(this,'otp_val4')">
                           <input  class="digit text-center" type="text" id="otp_val4" maxLength="1" size="1" pattern="[0-9]{1}" onfocus="this.value=''">
                        </div>
                     </form>
                     <button class="btn otpverify_button">VERIFY</button>
                  </div>
               </div>
            </div>
			
			
			
			
			<div class="modal-content otp_modal_content" id="forgot_password_modal_content_user">
               <div class="modal-header">
                  <h2 class="modal_title">Reset Password</h2>
               </div>
               <div class="modal-body">
                  <form method="">
                     <div class="form">
                        <div class="inputfield">
                           <input type="text" class="input" placeholder="Enter your email id to get new password" id="reset-email-user"  name="reset-email-user">
                        </div>
                        <div class="inputfield">
                           <input value="Submit" class="btn" id="sendmail-user" name="sendmail-user" type="button">
                        </div>
						<div class="alert alert-danger" role="alert" id="reset-email-error-user" style="display: none;">
						</div>
						
						<center><progress max="100"  id="loader-user" style="height:20px; width: 200px; display: none;"></progress>
						</center>
						<div class="alert alert-success" role="alert" id="reset-msg-user" style="display: none;">
							<p>Your Password Reset Link is Sent to your Registered email ID</p>
						</div>
						
						
                     </div>
                  </form>
			</div>
            </div>
			
			<script>
				$(document).ready(function() {
					$('#sendmail-user').click(function() {
						var email = $('#reset-email-user').val();
						
						$('#loader-user').show();
						
						$.ajax({
							url: "user_forgot_password.php",
							method: "POST",
							data: {email:email},
							success: function(error) {
								$('#loader-user').hide();
								if(error == 0)
									//window.location.replace("/Affable");
									$('#reset-msg-user').show();

								else {
									document.getElementById("reset-email-error-user").innerHTML = error;
									document.getElementById("reset-email-error-user").style.display = "block";
									
								}
							}
							
						});
					});
				});
			</script>
	
	
	</div>
	  </div>
	  <script>
		$(document).ready(function() {
			$('#signin').click(function() {
				var email = $('#signin-email').val();
				var password = $('#signin-password').val();
				$.ajax({
					url: "user_signin_validation.php",
					method: "POST",
					data: {email:email, password:password},
					success: function(error) {
						if(error == 0)
							window.location.replace("client_dashboard.php");
						else {
							document.getElementById("signin-error").innerHTML = error;
							document.getElementById("signin-error").style.display = "block";
						}
					}
				});
			});
		});
	  </script>

	  
	  
      <!-- end modal for user login --->
      <!-- modal for SME login --->
      <div class="modal fade" id="signInSME" role="dialog">
         <div class="modal-dialog" id="otp_modal_dialogue_sme">
            <!-- Modal content-->
            <div class="modal-content" id="signIn_modal_content_sme">
               <!--  <div class="modal-header">
                  <h2 class="modal_title">SignIn</h2>
                  </div> -->
               <div class="modal-body signin_modal_body">
                  <div class="signup_section">
                     <button type="button" class="facebook_button">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <p>Continue with Facebook</p>
                     </button>
                     <button type="button" class="google_button">
                        <span><i class="fab fa-google"></i></span>
                        <p>Continue with Google</p>
                     </button>
                     <div class="form_separator">
                        <span>OR</span>
                     </div>
                     <form method="">
                        <div class="form">
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your Email" id="sme-email" name="sme-email" required="">
                           </div>
                           <div class="inputfield">
                              <input type="password" class="input" placeholder="Enter your password" id="sme-password" name="sme-password" required="">
                           </div>
                           <div class="inputfield terms forgot_password_link" style="margin-bottom: -10px;">
                              <p onclick="forgotPasswordsme();">Forgot password</p>
                           </div>
                           <div class="inputfield">
                              <input type="button" value="LOGIN AS SME" class="btn" id="login_sme" name="login_sme">
						   </div>
						   <div class="alert alert-danger" role="alert" id="signin-error-sme" style="display: none;">
						   </div>
                        </div>
                     </form>
                     <div class="form_separator">
                        <span>OR</span>
                     </div>
                     <form>
                        <div class="form">
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your email id to signin with OTP" name="email">
                           </div>
                           <div class="inputfield">
                              <input value="GET OTP TO MOBILE NUMBER" class="btn" name="submit" type="button" onclick="otpboxSME();">
                           </div>
                        </div>
                     </form>
                  </div>
                  <footer class="modal_content_footer">
                     <div class="modal_content_footer_body">
                        <p>New member?<span><button class="link_button" onclick="location.href='index.php?smeRegister=1';">Register</button></span></p>
                     </div>
                  </footer>
               </div>
            </div>
            <div class="modal-content otp_modal_content" id="otp_modal_content_sme">
               <div class="modal-header">
                  <h2 class="modal_title"></h2>
               </div>
               <div class="modal-body">
                  <div class="otpbox">
                     <img src="images/OTP.png" height="200" width="275">
                     <div id="veri">
                        <h3 class="otphead">VERIFY WITH OTP</h3>
                     </div>
                     <div class="inputfield terms otp_message">
                        <p>Enter OTP sent to your mobile</p>
                     </div>
                     <form onsubmit="return false">
                        <div class="form-group fetch_results">
                           <input  class="digit text-center " type="text" id="otp_val1" maxLength="1" size="1" pattern="[0-9]{1}" onfocus="this.value=''" onkeyup="clickEvent(this,'otp_val2')" >
                           <input  class="digit text-center" type="text" id="otp_val2" maxLength="1" size="1" pattern="[0-9]{1}" onfocus="this.value=''" onkeyup="clickEvent(this,'otp_val3')">
                           <input class="digit text-center" type="text" id="otp_val3" maxLength="1" size="1" pattern="[0-9]{1}" onfocus="this.value=''" onkeyup="clickEvent(this,'otp_val4')">
                           <input  class="digit text-center" type="text" id="otp_val4" maxLength="1" size="1" pattern="[0-9]{1}" onfocus="this.value=''">
                        </div>
                     </form>
                     <button class="btn otpverify_button">VERIFY</button>
                  </div>
               </div>
            </div>
           



			<div class="modal-content otp_modal_content" id="forgot_password_modal_content_sme">
               <div class="modal-header">
                  <h2 class="modal_title">Reset Password</h2>
               </div>
               <div class="modal-body">
                  <form method="">
                     <div class="form">
                        <div class="inputfield">
                           <input type="text" class="input" placeholder="Enter your email id to get new password" id="reset-email-sme"  name="reset-email-sme">
                        </div>
                        <div class="inputfield">
                           <input value="Submit" class="btn" id="sendmail-sme" name="sendmail-sme" type="button">
                        </div>
						<div class="alert alert-danger" role="alert" id="reset-email-error-sme" style="display: none;">
						</div>
						<center><progress max="100"  id="loader-sme" style="height:20px; width: 200px; display: none;"></progress>
						</center>
						<div class="alert alert-success" role="alert" id="reset-msg-sme" style="display: none;">
							<p>Your Password Reset Link is Sent to your Registered email ID</p>
						</div>
					</div>
                  </form>
			</div>
            </div>
			
			<script>
				$(document).ready(function() {
					$('#sendmail-sme').click(function() {
						var email = $('#reset-email-sme').val();
						$('#loader-sme').show();
						
						$.ajax({
							url: "sme_forgot_password.php",
							method: "POST",
							data: {email:email},
							success: function(error) {
								$('#loader-sme').hide();
								if(error == 0)
									//window.location.replace("/Affable");
									$('#reset-msg-sme').show();
								else {
									document.getElementById("reset-email-error-sme").innerHTML = error;
									document.getElementById("reset-email-error-sme").style.display = "block";
									
								}
							}
						});
					});
				});
			</script>
			
			
			
			
			
         </div>
	  </div>
	  <script>
		$(document).ready(function() {
			$('#login_sme').click(function() {
				var email = $('#sme-email').val();
				var password = $('#sme-password').val();
				$.ajax({
					url: "sme_signin_validation.php",
					method: "POST",
					data: {email:email, password:password},
					success: function(error) {
						if(error == 0)
							window.location.replace("sme_dashboard.php");
						else {
							document.getElementById("signin-error-sme").innerHTML = error;
							document.getElementById("signin-error-sme").style.display = "block";
						}
					}
				});
			});
		});
	  </script>
      <!-- end modal for SME login --->
      <!-- start banner Area -->
      <section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="images/header-bg.jpg">
         <div class="overlay-bg overlay"></div>
         <h1 class="template-name">AFFABLE</h1>
         <div class="container">
            <div class="row fullscreen">
               <div class="banner-content col-lg-12">
                  <p>Building for society</p>
                  <h1>
                     Get services from SME <br>
                     based on your requirement
                  </h1>
                  <!-- <a href="#" class="primary-btn">View project</a> -->
               </div>
            </div>
         </div>
      </section>
      <!-- End banner Area -->
      <!-- Start brands Area -->
      <section class="brands-area">
         <div class="container no-padding">
            <div class="brand-wrap section-gap">
               <div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
                  <div class="col single-brand">
                     <a href="#"><img class="mx-auto" src="images/brands/b1.png" alt=""></a>
                  </div>
                  <div class="col single-brand">
                     <a href="#"><img class="mx-auto" src="images/brands/b2.png" alt=""></a>
                  </div>
                  <div class="col single-brand">
                     <a href="#"><img class="mx-auto" src="images/brands/b3.png" alt=""></a>
                  </div>
                  <div class="col single-brand">
                     <a href="#"><img class="mx-auto" src="images/brands/b4.png" alt=""></a>
                  </div>
                  <div class="col single-brand">
                     <a href="#"><img class="mx-auto" src="images/brands/b5.png" alt=""></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End brands Area -->
      <!-- Start About Area -->
      <section class="about-area section-gap" id="section1">
         <div class="container">
            <div class="row align-items-center justify-content-center">
               <div class="col-lg-7 col-md-12 about-left">
                  <img class="img-fluid" src="images/newimages/connect1.jpg" alt="">
               </div>
               <div class="col-lg-5 col-md-12 about-right">
                  <div class="section-title text-left">
                     <h2>Who are we?</h2>
                     <h4>We are here to make it easier for you</h4>
                     <!-- <h2>We are here <br /> to make it easier for you</h2> -->
                  </div>
                  <div>
                     <p>
                        We connect you to Subject Matter Experts from various areas of expertise who will answer your questions and help you in taking right decisions in all your phases of life.
                     </p>
                  </div>
                  <a href="#" class="primary-btn">Read More</a>
               </div>
            </div>
         </div>
      </section>
      <!-- End About Area -->
      <!-- Start how we work Area -->
      <section class="features-area section-gap-top" id="section2">
         <div class="container">
            <h1 style="color: #38489E; font-weight: bold; text-align: center; margin-bottom: 50px;">How it works</h1>
            <div class="row feature_inner">
               <div class="col-lg-3 col-md-6">
                  <div class="feature-item">
                     <img src="images/newimages/joinus.jpg">
                     <h4>Register first</h4>
                     <p>Register with us with your details first time, post your request for consultation</p>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="feature-item">
                     <img src="images/how_it_works_2.jpg">
                     <h4> SME provides consultation slots</h4>
                     <p>Client confirms convenient slot</p>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="feature-item">
                     <img src="images/how_it_works_3.jpg">
                     <h4>Avail consultation</h4>
                     <p>Make payment and proceed with consultation</p>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="feature-item">
                     <img src="images/how_it_works_4.jpg">
                     <h4>Share feedback</h4>
                     <p>help us in serving better</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End how we work Area -->
      <!-- Start SME section -->
      <section id="section3">
         <div class="container-fluid">
            <div class="popular">
               <h1>SME Community</h1>
               <div class="popular-carousel" data-flickity='{ "autoPlay": true, "prevNextButtons": false, "wrapAround": true, "pageDots": false }' data-wow-delay="0.2s">
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/realestate1.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/realestate2.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/health1.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/health2.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/entre1.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/entre2.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/it1.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/newimage1.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/bridge.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/newimages/newimage3.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end SME section -->
      <!-- Start FAQ section -->
      <section id="section4">
         <div class="container faqs">
            <h1>Frequently Asked Questions</h1>
            <div class="accordion">
               <div class="contentBx">
                  <div class="label">What is this portal all about?</div>
                  <div class="content">
                     <p>This is a Portal that maintains profiles of SMEs (Subject Matter Experts) from different areas who are willing to answer questions from clients through chatting, email or call that helps clients to take wise decisions in different phases of their lives.</p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">Who can be a SME or what is the criteria to become a SME?</div>
                  <div class="content">
                     <p>We have certain categories or areas for which for which any professional who claims to be a SME can register and create a profile. </p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">What are the benefits for SME? 
                  </div>
                  <div class="content">
                     <p>
                         SME gets an opportunity to earn through consultation
                         
                     </p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">What are the benefits for client or user?</div>
                  <div class="content">
                     <p>
                         Our SMEs answer your questions with a consultation and help you in taking rational and wise decisions
                         
                     </p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">What will be the mode of Consultation?</div>
                  <div class="content">
                     <p>
                         Online chatting or call or through email
                     </p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">Will there be a review consultation?</div>
                  <div class="content">
                     <p>
                         Yes we provide that option as well.
                         
                     </p>
                  </div>
               </div>
                <div class="contentBx">
                  <div class="label">What if we are not satisfied with the answers provided by SME?</div>
                  <div class="content">
                     <p>
                        There will be an online survey conducted after every consultation where you can express your views based on which necessary action will be taken, in genuine conditions consultation fees will be refunded.
                         
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end FAQ section -->
      <!-- Start write to us section -->
      <section class="contact_area section-gap" id="section5">
         <h1>Write to us</h1>
         <div class="container">
            <div
               id="mapBox"
               class="mapBox"
               data-lat="40.701083"
               data-lon="-74.1522848"
               data-zoom="13"
               data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
               data-mlat="40.701083"
               data-mlon="-74.1522848"
               ></div>
            <div class="row">
               <div class="col-lg-4">
                  <img src="images/newimages/writetous.jpg" style="max-width: 100%;">
               </div>
               <div class="col-lg-5">
                  <form class="contact_form" id="contactForm" novalidate="novalidate">
                     <div class="form-group">
                        <input type="text" class="form-control" id="writetous-name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" required=""/>
                     </div>
                     <div class="form-group">
                        <input type="email" class="form-control" id="writetous-email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required=""/>
                     </div>
                     <div class="form-group">
                        <textarea
                           class="form-control"
                           name="message"
                           id="writetous-message"
                           rows="1"
                           placeholder="Enter Message"
                           onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Enter Message'"
                           required=""
                           ></textarea>
                     </div>
					 <center><progress max="100" id="progress" style="display: none;"></progress></center>
					 <div class="alert alert-success" id="notify" role="alert" style="display: none;"></div>
                     <div>
                        <button type="button" value="submit" class="btn primary-btn" id="send-message" name="submit" style="color: #38489E;">
                        Send Message
                        </button>
                     </div>
                  </form>
               </div>
               <div class="col-lg-3">
                  <div class="contact_info">
                     <div class="info_item">
                        <i class="fas fa-home"></i>
                        <h6>Bangalore, India</h6>
                        <p>Santa monica bullevard</p>
                     </div>
                     <div class="info_item">
                        <i class="fa fa-phone"></i>
                        <h6><a href="#">00 (440) 9865 562</a></h6>
                        <p>Mon to Fri 9am to 6 pm</p>
                     </div>
                     <div class="info_item">
                        <i class="fa fa-envelope"></i>
                        <h6><a href="#">support@affabletech.com</a></h6>
                        <p>Send us your query anytime!</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  <script>
		$(document).ready(function() {
			$('#send-message').click(function() {
				document.getElementById("notify").style.display = "none";
				document.getElementById("progress").style.display = "block";
				var name = $('#writetous-name').val();
				var email = $('#writetous-email').val();
				var message = $('#writetous-message').val();
				$.ajax({
					url: "writetous.php",
					method: "POST",
					data: {name:name, email:email, message:message},
					success: function(status) {
						if(status == 1) {
							document.getElementById("notify").innerHTML = "Message has been sent.";
							document.getElementById("progress").style.display = "none";
							document.getElementById("notify").style.display = "block";
						}							
					}
				});
			});
		});
	  </script>
      <!-- end write to us section -->
      <!-- Start footer -->
      <footer style="background-color: #f2f2f2">
         <!-- <div class="container-fluid breadcrumbs">
            <div class="row">
               <div class="col-6 col-md-3">
                  <h5><b>CATEGORIES</b></h5>
                  <p>Grapghics & Design</p>
                  <p>Digital Marketing</p>
                  <p>Writing & Translation</p>
                  <p>Video & Animation</p>
                  <p>Music & Audio</p>
                  <p>Programming & Tech</p>
                  <p>Business</p>
                  <p>Lifestyle</p>
                  <p>Sitemap</p>
               </div>
               <div class="col-6 col-md-2">
                  <h5><b>ABOUT</b></h5>
                  <p>Careers</p>
                  <p>Press & News</p>
                  <p>Partnerships</p>
                  <p>Privacy Policy</p>
                  <p>Terms of service</p>
                  <p>Intellectual property</p>
                  <p>Investor Relations</p>
               </div>
               <div class="col-6 col-md-2">
                  <h5><b>SUPPORT</b></h5>
                  <p>Help & Support</p>
                  <p>Trust & Safety</p>
                  <p>Selling on Affable</p>
                  <p>Buying on Affable</p>
               </div>
               <div class="col-6 col-md-2">
                  <h5><b>COMMUNITY</b></h5>
                  <p>Events</p>
                  <p>Blog</p>
                  <p>Forum</p>
                  <p>Community Standards</p>
                  <p>Podcasts</p>
                  <p>Affilates</p>
                  <p>Invite a friend</p>
                  <p>Become a seller</p>
                  <p>Affable Elevate</p>
               </div>
               <div class="col-6 col-md-3">
                  <h5><b>MORE FROM AFFABLE</b></h5>
                  <p>Affable Business</p>
                  <p>Affable Pro</p>
                  <p>Affable Studios</p>
                  <p>Affable Logo Maker</p>
                  <p>Affable Guides</p>
                  <p>Get Inspired</p>
                  <p>Clear Voice</p>
               </div>
            </div>
            </div> -->
         <div class="container">
            <div class="row">
               <div class="col-md-2">
                  <h2><i><b>AFFABLE</b></i></h2>
               </div>
               <div class="col-md-5">
                  <span style="color: #38489E;">Copyright © 2019, All Right Reserved Affable</span>
               </div>
               <div class="col-md-2"></div>
               <div class="col-md-3 social_icons">
                  <i class="fab fa-twitter"></i>
                  <i class="fab fa-facebook"></i>
                  <i class="fab fa-linkedin"></i>
                  <i class="fab fa-pinterest"></i>
                  <i class="fab fa-instagram"></i>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!--- Scripts section --->
      <!-- sticky nav -->
      <script src="js/parallax.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/isotope.pkgd.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/jquery.sticky.js"></script>
      <script src="js/main.js"></script>
      <script src="pageHandler.js"></script>
	  <script src="check.js"></script>
      <!-- For carousel --->
      <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/easytimer@1.1.1/src/easytimer.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- For accordion in FAQ section --->
       <script>
	  	if(<?= isset($_GET['userSignIn']); ?>)
			document.getElementById('userSignIn').click();
	  </script>
	  
	  <script>
	  	if(<?= isset($_GET['smeSignIn']); ?>)
			document.getElementById('smeSignIn').click();
	  </script>
	  
	  	  <script>
	  	if(<?= isset($_GET['userRegister']); ?>)
			document.getElementById('userRegister').click();
	  </script>
	  
	  	  <script>
	  	if(<?= isset($_GET['smeRegister']); ?>)
			document.getElementById('smeRegister').click();
	  </script>
	  
	  <script>
         const accordion = document.getElementsByClassName('contentBx');
         
         for(i=0; i< accordion.length; i++ ){
         
           accordion[i].addEventListener('click', function(){
         
             this.classList.toggle('active')
         
           })
         
         }
      </script>
      <script>
         function clickEvent(first,last){
             if(first.value.length){
                 document.getElementById(last).focus();
             }
         }
      </script>
   </body>
</html>
