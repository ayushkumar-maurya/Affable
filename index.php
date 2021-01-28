<!DOCTYPE html>
<html lang="zxx" class="no-js">
   <head>
      <!-- Mobile Specific Meta -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta charset="UTF-8">
      <!-- Site Title -->
      <title>AFFABLE || HOME</title>
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
                     <li><a class="active" href="#section1">Who are we</a></li>
                     <li><a href="#section2">How it works</a></li>
                     <li><a href="#section3">SME Community</a></li>
                     <li><a href="#section4">FAQ</a></li>
                     <li><a href="#section5">Write to us</a></li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Sign In
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#signInUser" onclick="hideuserOTPsection();">Sign In as user</a>
                           <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#signInSME" onclick="hidesmeOTPsection();">Sign In as SME</a>
                        </div>
                     </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Register
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#registerUser">Register as user</a>
                           <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#registerSME">Register as SME</a>
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
						   <div class="alert success" role="alert" id="reg-message" style="display: none;">
						   </div>
                           <!-- <div class="inputfield terms">
                              <p>By joining I agree to the terms and conditions of Affable</p>
                              </div> -->
                        </div>
                     </form>
                  </div>
                  <footer class="modal_content_footer">
                     <div class="modal_content_footer_body">
                        <p>Already a member?<span><button class="link_button">Sign In</button></span></p>
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
								document.getElementById("reg-message").innerHTML = "Verification mail has been sent to its registered email id";
								document.getElementById('reg-message').setAttribute('class', 'alert alert-success');
								$.ajax({
									url: "user_registration_entry.php",
									method: "POST",
									data: {name:name, email:email, phone:phone, password:password}
								});
							}
							else {
								document.getElementById("reg-message").innerHTML = error;
								document.getElementById('reg-message').setAttribute('class', 'alert alert-danger');
							}
							document.getElementById("reg-message").style.display = "block";
						}
					});
				});
			});
		</script>

      <!--end modal for user registration --->
      <!-- modal for SME registration --->
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
                              <input type="text" class="input" placeholder="Enter your name" name="username" required="">
                           </div>
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your Email" name="email" required="">
                           </div>
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your Mobile number" name="mobile">
                           </div>
                           <div class="inputfield">
                              <input type="password" class="input" placeholder="Create your password" name="password" required="">
                           </div>
                           <div class="inputfield">
                              <input type="password" class="input" placeholder="Confirm your password" name="cpassword" required="">
                           </div>
                           <div class="inputfield">
                              <input type="submit" value="Register as SME" class="btn" name="submit">
                           </div>
                           <!-- <div class="inputfield terms">
                              <p>By joining I agree to the terms and conditions of Affable</p>
                              </div> -->
                        </div>
                     </form>
                  </div>
                  <footer class="modal_content_footer">
                     <div class="modal_content_footer_body">
                        <p>Already a member?<span><button class="link_button">Sign In</button></span></p>
                     </div>
                  </footer>
               </div>
            </div>
         </div>
      </div>
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
                        <p>New member?<span><button class="link_button">Register</button></span></p>
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
                  <h2 class="modal_title">Recover Password</h2>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="form">
                        <div class="inputfield">
                           <input type="text" class="input" placeholder="Enter your email id to get new password" name="mobile">
                        </div>
                        <div class="inputfield">
                           <input value="SUMBIT" class="btn" name="submit" type="button">
                        </div>
                     </div>
                  </form>
                  <div class="inputfield terms forgot_password_link" style="margin-top: 7px; margin-bottom: -10px;">
                     <p>Check your registered email id to get new password and return to login</p>
                  </div>
               </div>
            </div>
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
							window.location.replace("index.php");
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
                     <form>
                        <div class="form">
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your Email" name="email" required="">
                           </div>
                           <div class="inputfield">
                              <input type="password" class="input" placeholder="Enter your password" name="password">
                           </div>
                           <div class="inputfield terms forgot_password_link" style="margin-bottom: -10px;">
                              <p onclick="forgotPasswordsme();">Forgot password</p>
                           </div>
                           <div class="inputfield">
                              <input type="submit" value="LOGIN AS SME" class="btn" name="submit">
                           </div>
                        </div>
                     </form>
                     <div class="form_separator">
                        <span>OR</span>
                     </div>
                     <form>
                        <div class="form">
                           <div class="inputfield">
                              <input type="text" class="input" placeholder="Enter your email id to signin with OTP" name="mobile">
                           </div>
                           <div class="inputfield">
                              <input value="GET OTP TO MOBILE NUMBER" class="btn" name="submit" type="button" onclick="otpboxSME();">
                           </div>
                        </div>
                     </form>
                  </div>
                  <footer class="modal_content_footer">
                     <div class="modal_content_footer_body">
                        <p>New member?<span><button class="link_button">Register</button></span></p>
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
                  <h2 class="modal_title">Recover Password</h2>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="form">
                        <div class="inputfield">
                           <input type="text" class="input" placeholder="Enter your email id to get new password" name="mobile">
                        </div>
                        <div class="inputfield">
                           <input value="SUMBIT" class="btn" name="submit" type="button">
                        </div>
                     </div>
                  </form>
                  <div class="inputfield terms forgot_password_link" style="margin-top: 7px; margin-bottom: -10px;">
                     <p>Check your registered email id to get new password and return to login</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
                  <img class="img-fluid" src="images/about.png" alt="">
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
                     <img src="images/how_it_works_1.jpg">
                     <h4>Register first</h4>
                     <p>Register with us with your details, post the gist of your question</p>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="feature-item">
                     <img src="images/how_it_works_2.jpg">
                     <h4>Initiate payment</h4>
                     <p>Pay the consultation fee as mentioned</p>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="feature-item">
                     <img src="images/how_it_works_3.jpg">
                     <h4>Avail consultation</h4>
                     <p>We will connect SME that matches your question</p>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="feature-item">
                     <img src="images/how_it_works_4.jpg">
                     <h4>Share feedback</h4>
                     <p>You can chat , email or talk to SME</p>
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
                        <img src="images/service.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/service1.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/service2.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/service3.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/service4.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/service5.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/service6.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/service7.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/service8.jpg">
                     </div>
                     <div class="info">
                     </div>
                  </div>
                  <div class="single-item">
                     <div class="img">
                        <img src="images/service9.jpg">
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
                  <div class="label">How is the weather in Oblast, Russia ?</div>
                  <div class="content">
                     <p>We connect you to Subject Matter Experts from various areas of expertise who will answer your questions and help you in taking right decisions in all your phases of life.</p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">How can I apply for a scholarship in Kemerovo state medical university?</div>
                  <div class="content">
                     <p></p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">Does the Kemerovo State Medical University provide post graduate courses?</div>
                  <div class="content">
                     <p></p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">What is Kemerovo State Medical University fee structure?</div>
                  <div class="content">
                     <p></p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">What is Kemerovo state medical college admission procedure?</div>
                  <div class="content">
                     <p></p>
                  </div>
               </div>
               <div class="contentBx">
                  <div class="label">What is Kemerovo state medical university ranking ?</div>
                  <div class="content">
                     <p></p>
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
                  <img src="images/write_to_us.jpg" style="max-width: 100%;">
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
					 <div class="alert alert-success" id="notify" role="alert" style="display: none;">
					 </div>
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
      <script src="js/pageHandler.js"></script>
      <!-- For carousel --->
      <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/easytimer@1.1.1/src/easytimer.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- For accordion in FAQ section --->
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
