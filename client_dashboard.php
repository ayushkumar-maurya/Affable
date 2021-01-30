<?php include "connection.php"; ?>

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
                     <li><a href="#" data-toggle="modal" data-target="#postQuestion">POST YOUR REQUEST</a></li>
                     <li><a href="#section2">FAQS</a></li>
                     <li><a href="#section3">YOUR REQUESTS</a></li>
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
                           <a class="dropdown-item" href="#">Logout</a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <!-- End Header Area -->
      <br>
      <!-- Start About Area -->
      <section class="about-area section-gap" id="section1">
         <div class="container">
            <div class="row align-items-center justify-content-center">
               <div class="col-lg-6 col-md-12 about-right">
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
               <div class="col-lg-6 col-md-12 about-left">
                  <!-- <img class="img-fluid" src="images/about.png" alt=""> -->
                  <video controls class="img-fluid" loop autoplay muted>
                     <source src="images/test_video.mp4" type="video/mp4">
                  </video>
               </div>
            </div>
         </div>
      </section>
      <!-- End About Area -->
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
                              <input type="Password" class="input" required="">
                           </div>
                           <div class="inputfield">
                              <label>New Password</label>
                              <input type="Password" class="input" required="">
                           </div>
                           <div class="inputfield">
                              <label>Confirm Password</label>
                              <input type="Password" class="input" required="">
                           </div>
                           <div class="row">
                              <div class="col-sm-3"></div>
                              <div class="col-sm-6">
                                 <div class="inputfield">
                                    <input type="submit" value="SAVE PASSWORD" class="btn">
                                 </div>
                              </div>
                              <div class="col-sm-3"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
                                 <select id="category" required="">
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
                              <input type="text" class="input" id="topic" required="">
                           </div>
                           <div class="inputfield">
                              <label>Type your question</label>
                              <textarea class="textarea" id="question" required=""></textarea>
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