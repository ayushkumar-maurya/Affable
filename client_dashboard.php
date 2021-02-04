<?php
	include "connection.php";
	if(!isset($_SESSION['email']))
		header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
   <head>
      <!-- Mobile Specific Meta -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta charset="UTF-8">
      <!-- Site Title -->
	  <title>AFFABLE || CLIENT</title>
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
      <header class="default-header" style="background-color: #38489E;">
         <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container sme_dashboard">
               <a class="navbar-brand" href="index.html">
                  <!-- <img src="images/logo.png" alt="" style="max-width: 50%;"> -->
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="fa fa-bars"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                  <ul class="navbar-nav sme_dashboard_navbar">
				  	 <li><a href="#">CONSULTATIONS</a></li>
					 <li><a href="#" data-toggle="modal" data-target="#postQuestion">POST YOUR REQUEST</a></li>
                     <li><a href="#section2">FAQS</a></li>
                     <li><a href="#section4">YOUR REQUESTS</a></li>
                     <li class="notifications_humberger"><a href="#section3">NOTIFICATIONS</a></li>
                     <li class="dropdown profile_humberger">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        ACCOUNT</i>
                        </a>
                        <div class="dropdown-menu">
                           <!-- <a class="dropdown-item" href="#">View Profile</a> -->
                           <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#passwordChangeUser">Change Password</a>
                           <a class="dropdown-item" href="#">Logout</a>
                        </div>
                     </li>
                     <li class="notifications"><a href="#"><i class="fas fa-bell fa-2x"></i></a></li>
                     <li class="dropdown profile">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <i class="fas fa-user-circle fa-2x"></i>
                        </a>
                        <div class="dropdown-menu">
                           <!-- <a class="dropdown-item" href="#">View Profile</a> -->
                           <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#passwordChangeUser">Change Password</a>
                           <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <!-- End Header Area -->
	  <!-- Start client request section -->
      <br>
      <section class="section-gap" id="section4">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12 col-lg-6 col-sm-12 client_request">
                  <h1>Your Requests</h1>
                  <button class="accordion">REQUEST ID 1</button>
                  <div class="panel">
                     <div class="profile_section">
                        <div class="form">
                           <form>
                              <div class="inputfield terms">
                                 <label>Request ID: </label>
                                 <label style="width: 100%;">1150012</label>
                              </div>
                              <div class="inputfield terms">
                                 <label>Category: </label>
                                 <label style="width: 100%;">Real Estate</label>
                              </div>
                              <div class="inputfield">
                                 <label>Question</label>
                                 <label style="width: 100%;">How can I apply for a scholarship in Kemerovo state medical university?</label>
                              </div>
                              <div class="inputfield">
                                 <label>Seen by</label>
                                 <label style="width: 100%;">Pratiti Bera</label>
                              </div>
                              <div class="inputfield">
                                 <label>Status</label>
                                 <label style="width: 100%;">Accepted</label>
                              </div>
                              <div class="inputfield">
                                 <label>SME's reply</label>
                                 <label style="width: 100%;">Paragraphs are usually represented in visual media as blocks of text separated from adjacent blocks by blank lines and/or first-line indentation, but HTML paragraphs can be any structural grouping of related content, such as images or form fields.</label>
                              </div>
                              <div class="inputfield">
                                 <label>Consultation status</label>
                                 <label style="width: 100%;">Pending</label>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <button class="accordion">REQUEST ID 2</button>
                  <div class="panel"></div>
                  <button class="accordion">REQUEST ID 3</button>
                  <div class="panel"></div>
                  <button class="accordion">REQUEST ID 4</button>
                  <div class="panel"></div>
                  <button class="accordion">REQUEST ID 5</button>
                  <div class="panel"></div>
               </div>
               <div class="col-12 col-lg-6 col-sm-12" style="padding: 50px;">
                  <br>
                  <img class="img-fluid" src="images/write_to_us.jpg" alt="">
                  <!-- <video controls class="img-fluid" loop autoplay muted>
                     <source src="images/test_video.mp4" type="video/mp4">
                     </video> -->
               </div>
            </div>
         </div>
      </section>
      <br>
      <!-- end client request section -->
      <!-- modal for user change password --->
      <div class="modal fade" id="passwordChangeUser" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body">
                  <div class="profile_section">
                     <div class="title">CHANGE PASSWORD</div>
                     <div class="form">
                        <form>
                           <div class="inputfield">
                              <label>Current Password</label>
                              <input type="Password" class="input pwd" id="old-password" required="">
                           </div>
                           <div class="inputfield">
                              <label>New Password</label>
                              <input type="Password" class="input pwd" id="new-password" required="">
                           </div>
                           <div class="inputfield">
                              <label>Confirm Password</label>
                              <input type="Password" class="input pwd" id="cpassword" required="">
                           </div>
                           <div class="row">
                              <div class="col-sm-3"></div>
                              <div class="col-sm-6">
                                 <div class="inputfield">
                                    <input type="button" value="SAVE PASSWORD" id="update-password" class="btn">
                                 </div>
                              </div>
                              <div class="col-sm-3"></div>
						   </div>
						   <br><div class="alert alert-success" role="alert" id="status" style="display: none;"></div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
	  </div>
	  <script>
		$(document).ready(function() {
			$('#update-password').click(function() {
				var oldPassword = $('#old-password').val();
				var newPassword = $('#new-password').val();
				var cpassword = $('#cpassword').val();
				var status = document.getElementById("status");
				var error = 0;
				
				if(oldPassword.length == 0)
					error = "Please fill out old password field";
				else if(newPassword.length == 0)
					error = "Please fill out new password field";
				else if(newPassword != cpassword)
					error = "Passwords do not match";	
				
				if(error != 0) {
					status.innerHTML = error;
					status.setAttribute("class", "alert alert-danger");
					status.style.display = "block";
				}
				
				else {
					$.ajax({
						url: "update_user_password.php",
						method: "POST",
						data: {oldPassword: oldPassword, newPassword: newPassword},
						success: function(error) {
							if(error != 0) {
								status.innerHTML = error;
								status.setAttribute("class", "alert alert-danger");
							}
							else {
								for(var i=0; i<3; i++)
									document.getElementsByClassName("pwd")[i].value="";
								status.innerHTML = "Password updated successfully.";
								status.setAttribute("class", "alert alert-success");
							}
							status.style.display = "block";
						}
					});
				}
			});
		});
	  </script>
      <!--end modal for user change password --->
      <!-- modal for post question --->
      <div class="modal fade" id="postQuestion" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body">
                  <div class="profile_section">
                     <div class="title">POST YOUR QUESTION</div>
                     <div class="form">
                        <form>
                           <div class="inputfield">
                              <label>Email Address</label>
                              <label><?= $_SESSION['email'] ?></label>
                           </div>
                           <div class="inputfield">
                              <label>Category</label>
                              <div class="custom_select">
                                 <select class="ques" id="category" required="">
								 <option value="">Select category</option>
								 <?php
									$stmt = $conn->prepare("SELECT categoryName FROM category ORDER BY categoryName");
									$stmt->execute();
									while($row = $stmt->fetch(PDO::FETCH_ASSOC))
										echo "<option>".htmlentities($row['categoryName'])."</option>";
								 ?>
                                 </select>
                              </div>
                           </div>
                           <div class="inputfield">
                              <label>Topic</label>
                              <input type="text" class="input ques" id="topic" required="">
                           </div>
                           <div class="inputfield">
                              <label>Type your question</label>
                              <textarea class="textarea ques" id="question" required=""></textarea>
                           </div>
                           <div class="inputfield">
                              <label class="check">
                              <input type="checkbox" onchange="document.getElementById('post-question').disabled = !this.checked;" required="">
                              <span class="checkmark"></span>
                              </label>
                              <p>I confirm to consult your SME</p>
                           </div>
                           <div class="row">
                              <div class="col-sm-3"></div>
                              <div class="col-sm-6">
                                 <div class="inputfield">
                                    <input type="button" value="POST QUESTION" id="post-question" class="btn" disabled="">
                                 </div>
                              </div>
                              <div class="col-sm-3"></div>
                           </div>
						   <br><div class="alert alert-success" role="alert" id="ques-status" style="display: none;"></div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
  	  <script>
		$(document).ready(function() {
			$('#post-question').click(function() {				
				var category = document.getElementById("category").value;
				var topic = document.getElementById("topic").value.trim();
				var question = document.getElementById("question").value.trim();
				var quesStatus = document.getElementById("ques-status");
				var error = 0;

				if(category.length == 0)
					error = "Please select category.";
				else if(topic.length == 0)
					error = "Please fill out Topic field.";
				else if(question.length == 0)
					error = "Please fill out question field.";	
				
				if(error != 0) {
					quesStatus.innerHTML = error;
					quesStatus.setAttribute("class", "alert alert-danger");
					quesStatus.style.display = "block";
				}
				
				else {
					$.ajax({
						url: "userQuestion.php",
						method: "POST",
						data: {do:"entry", category:category, topic: topic, question: question},
						success: function(status) {
							if(status == 1) {
								for(var i=0; i<3; i++)
									document.getElementsByClassName("ques")[i].value="";
								quesStatus.innerHTML = "Your question has been sent to our SME for review.";
								quesStatus.setAttribute("class", "alert alert-success");
								quesStatus.style.display = "block";
								$.ajax({
									url: "userQuestion.php",
									method: "POST",
									data: {do:"mail"}
								});
							}
						}
					});
				}
			});
		});
	  </script>
      <!--end modal for post question --->
      <!-- Start footer -->
      <footer style="background-color: #f2f2f2">
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
         var acc = document.getElementsByClassName("accordion");
         var i;

         for (i = 0; i < acc.length; i++) {
           acc[i].addEventListener("click", function() {
             this.classList.toggle("active");
             var panel = this.nextElementSibling;
             if (panel.style.display === "block") {
               panel.style.display = "none";
             } else {
               panel.style.display = "block";
             }
           });
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