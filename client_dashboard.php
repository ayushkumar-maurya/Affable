<?php
	include "connection.php";
	if(!isset($_SESSION['email']))
		header("Location: index.php");

	if(isset($_SESSION['questionid']))
		unset($_SESSION['questionid']);
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
	  <script src="chat_app_scripts.js"></script>
      <style>
         ::placeholder {
			color: #38489E;
         opacity: 1; /* Firefox */
         }
         :-ms-input-placeholder { /* Internet Explorer 10-11 */
         color: #38489E;
         }
         ::-ms-input-placeholder { /* Microsoft Edge */
         color: #38489E;
         } 
      </style>
	  <style>
		.date-time {
			font-size: 0.8rem;
			color: #343a40;
		}
	  </style>
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
				  	 <li>Email: <?= $_SESSION['email'] ?></li>
					 <li><a href="#">CONSULTATIONS</a></li>
					 <!-- <li><a href="#" data-toggle="modal" data-target="#postQuestion">POST YOUR REQUEST</a></li> -->
                     <li><a href="#section2">FAQS</a></li>
                     <li><a href="#section4">MESSAGES</a></li>
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
      <br><br><br>
      <section class="section-gap" id="section4">
         <div class="container-fluid">
            <div class="row">
			<div class="col-sm-3 post_request" style="/* box-shadow: -5px -4px 3px 0px rgba(255, 255, 255, 0.425),
                  5px 4px 3px 0px rgba(88, 88, 88, 0.425); */ padding: 0px; background-color: #fff;">
                  <div>
                     <h1>Request for a SME</h1>
                     <h5>Send the topic and question to consult our SME</h5>
                     <img src="images/how_it_works_4.jpg">
                  </div>
                  <button class="btn" data-toggle="modal" data-target="#postQuestion">POST A REQUEST</button>
               </div>
               <div class="col-sm-9">
                  <div class="row">
					<div class="col-sm-6 client_request">
					<h1>requests</h1>
					
					<?php						
						// Retrieving user requests from table
						$stmt1 = $conn->prepare("SELECT questionid, category, topic, question, status FROM userquestion WHERE email = :email");
						$stmt1->execute(array(":email" => $_SESSION['email']));

						while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
							$request = $row1;
							$questionid = $request['questionid'];
							
							// Retrieving sme answer from table
							$stmt2 = $conn->prepare("SELECT answered_by, answer FROM sme_answer WHERE questionId = :questionId");
							$stmt2->execute(array(":questionId" => $questionid));
							if($stmt2->rowCount() == 0) {
								$seen_by = "";
								$answer = "";
							}
							else {
								$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
								$answer = $row2['answer'];

								// Retrieving sme name from table
								$stmt3 = $conn->prepare("SELECT name FROM sme_profile WHERE email = :email");
								$stmt3->execute(array(":email" => $row2['answered_by']));
								$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
								$seen_by = $row3['name'];
							}
							
							// Retrieving consultancy status from table
							$stmt4 = $conn->prepare("SELECT status FROM consultation WHERE questionId = :questionId");
							$stmt4->execute(array(":questionId" => $questionid));
							if($stmt4->rowCount() == 0)
								$status = "Pending";
							else {
								$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
								$status = $row4['status'];
							}

							// Retrieving mode of consultation from table
							$stmt5 = $conn->prepare("SELECT mode_of_cons FROM consultation_slots WHERE questionid = :questionid");
							$stmt5->execute(array(":questionid" => $questionid));
							$row5 = $stmt5->fetch(PDO::FETCH_ASSOC);
							if($stmt5->rowCount() == 0 || strcasecmp($row5['mode_of_cons'], "email") == 0)
								$show_slots = 0;
							else
								$show_slots = 1;
					?>

                        <button class="accordion"><?= htmlentities($request['topic']) ?></button>
                        <div class="panel">
                           <div class="profile_section">
                              <div class="form">
                                 <form>
                                    <div class="inputfield terms">
                                       <label>Request ID: </label>
                                       <label style="width: 100%;"><?= $request['questionid'] ?></label>
                                    </div>
                                    <div class="inputfield terms">
                                       <label>Category: </label>
                                       <label style="width: 100%;"><?= htmlentities($request['category']) ?></label>
                                    </div>
                                    <div class="inputfield">
                                       <label>Question</label>
                                       <label style="width: 100%;"><?= htmlentities($request['question']) ?></label>
                                    </div>
                                    <div class="inputfield">
                                       <label>Seen by</label>
                                       <label style="width: 100%;"><?= htmlentities($seen_by) ?></label>
                                    </div>
                                    <div class="inputfield">
                                       <label>Status</label>
                                       <label style="width: 100%;"><?= htmlentities($request['status']) ?></label>
                                    </div>
                                    <div class="inputfield">
                                       <label>SME's reply</label>
                                       <label style="width: 100%;"><?= htmlentities($answer) ?></label>
                                    </div>
                                    <div class="inputfield">
                                       <label>Consultation status</label>
                                       <label style="width: 100%;"><?= htmlentities($status) ?></label>
                                    </div>
									<?php if($show_slots == 1) { ?>
									<div class="inputfield">
                                    <input type="button" onclick="retrieve_slots('<?= $questionid ?>')" value="Confirm consultation" class="btn" data-toggle="modal" data-target="#chooseSlot">
                                 </div>
								 <?php } ?>
                                 </form>
                              </div>
							</div>
                        </div>
					<?php } ?>
					</div>

					<script>
						function retrieve_slots(questionid) {
							$.ajax({
								url: "final_confirmed_slot.php",
								method: "POST",
								data: {do:"retreive_slots", questionid: questionid},
								success: function(data) {
									var data = JSON.parse(data);

									document.getElementById("sme-code").innerHTML = "Proposed slots by SME: " + data['sme_code'];
									document.getElementById("user-question").innerHTML = data['question'];

									document.getElementById("slot1_date").setAttribute("value", data['slot1_date']);
									document.getElementById("slot1_from_time").setAttribute("value", data['slot1_from_time']);
									document.getElementById("slot1_to_time").setAttribute("value", data['slot1_to_time']);
									document.getElementById("slot2_date").setAttribute("value", data['slot2_date']);
									document.getElementById("slot2_from_time").setAttribute("value", data['slot2_from_time']);
									document.getElementById("slot2_to_time").setAttribute("value", data['slot2_to_time']);
									document.getElementById("slot3_date").setAttribute("value", data['slot3_date']);
									document.getElementById("slot3_from_time").setAttribute("value", data['slot3_from_time']);
									document.getElementById("slot3_to_time").setAttribute("value", data['slot3_to_time']);


								}
							});
						}
					</script>

					 <div class="col-sm-6 client_request">
                     <h1>consultations</h1>

					<?php						
						// Retrieving consultaions from table
						$stmt1 = $conn->prepare("SELECT consultationId, smeEmailId, questionId, mode, date, fromTime FROM consultation WHERE clientEmailId = :email AND status <> 'Cancelled'");
						$stmt1->execute(array(":email" => $_SESSION['email']));

						$consultation_count = 1;
						while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
							$consultation = $row1;
							$questionId = $consultation['questionId'];
							$smeEmailId = $consultation['smeEmailId'];
							
							// Retrieving user question from table
							$stmt2 = $conn->prepare("SELECT category, question FROM userquestion WHERE questionId = :questionId");
							$stmt2->execute(array(":questionId" => $questionId));
							$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
							$category = $row2['category'];
							$question = $row2['question'];

							// Retrieving sme name from table
							$stmt3 = $conn->prepare("SELECT name, sme_code FROM sme_profile WHERE email = :email");
							$stmt3->execute(array(":email" => $smeEmailId));
							$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
							$sme = $row3['name'];
							$sme_code = $row3['sme_code'];
					?>		

                     <button class="accordion">Consultation ID <?= $consultation_count ?></button>
                     <div class="panel">
                        <div class="profile_section">
                           <div class="form">
                              <form>
                                 <div class="inputfield terms">
                                    <label>Consultation ID: </label>
                                    <label style="width: 100%;"><?= $consultation['consultationId'] ?></label>
                                 </div>
                                 <div class="inputfield terms">
                                    <label>Category: </label>
                                    <label style="width: 100%;"><?= htmlentities($category) ?></label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Question</label>
                                    <label style="width: 100%;"><?= htmlentities($question) ?></label>
                                 </div>
                                 <div class="inputfield">
                                    <label>SME</label>
                                    <label style="width: 100%;"><?= htmlentities($sme) ?></label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Mode</label>
                                    <label style="width: 100%;"><?= htmlentities($consultation['mode']) ?></label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Date</label>
                                    <label style="width: 100%;"><?= htmlentities($consultation['date']) ?></label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Time</label>
                                    <label style="width: 100%;"><?= htmlentities($consultation['fromTime']) ?></label>
                                 </div>
								
                                 <div class="inputfield">
                                     <input type="button" value="Click to connect" class="btn" data-toggle="modal" data-target="#connectToChat" data-backdrop="static" data-keyboard="false" onclick="chat('<?= $smeEmailId ?>', '<?= $sme_code ?>', '<?= $questionId ?>');">
                                 </div>
							
                              </form>
                           </div>
                        </div>
                     </div>
					<?php 
							$consultation_count++;
						}
					?>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  
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
              <!--  <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div> -->
               <div class="modal-body">
			   <div class="profile_section" style="padding: 10px;">
                     <div class="title">POST YOUR REQUEST</div>
                     <div class="form">
                        <form>
                           <div class="inputfield">
                              <label></label>
                              <label><?= $_SESSION['email'] ?></label>
                           </div>
                           <div class="inputfield">
                              <label></label>
                              <div class="custom_select">
                                 <select class="ques" id="category" required="">
								 <option value="">select category</option>
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
                              <label></label>
                              <input type="text" class="input ques" id="topic" required="" placeholder="topic">
                           </div>
                           <div class="inputfield">
                              <label></label>
                              <textarea class="textarea ques" id="question" required="" placeholder="type your question"></textarea>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                              <input type="checkbox" onchange="document.getElementById('post-question').disabled = !this.checked;" required="">
                              <span class="checkmark"></span>
                              </label>
                              <p style="margin-top: -2px;">I confirm to consult your SME</p>
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
						   <br><div class="alert alert-danger" role="alert" id="ques-status" style="display: none;"></div>
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
				var error = 0;

				if(category.length == 0)
					error = "Please select category.";
				else if(topic.length == 0)
					error = "Please fill out Topic field.";
				else if(question.length == 0)
					error = "Please fill out question field.";	
				
				if(error != 0) {
					document.getElementById("ques-status").innerHTML = error;
					document.getElementById("ques-status").style.display = "block";
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
								window.location.replace("client_dashboard.php");
								alert("Your question has been sent to our SME for review.");
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
	   <!-- modal for choose slot --->
	   <div class="modal fade" id="chooseSlot" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body">
                  <div class="profile_section choose_slot">
                     <div class="title" id="sme-code"></div>
                     <div class="subtitle" id="user-question"></div>
                     <div class="form">
                        <form>
                           <div class="inputfield terms">
                              <label class="check">
                              <!-- <input type="checkbox" onclick="onlyOneDate(this);" name="date_choice" value="date1" id="date1"> -->
                              <!-- <span class="checkmark"></span> -->
                              </label>
                              <p style="margin-right: 10px; margin-left: 50px;">Date</p>
                              <p style="margin-right: 35px; margin-left: 50px;">Start</p>
                              <p style="margin-left: 25px;">End</p>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                              <input type="checkbox" onclick="onlyOneDate(this);" name="date_choice" value="date1" id="date1">
                              <span class="checkmark"></span>
                              </label>
                              <p><input type="button" value="" class="btn" id="slot1_date"></p>
                              <p><input type="button" value="" class="btn" id="slot1_from_time"></p>
                              <p><input type="button" value="" class="btn" id="slot1_to_time"></p>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                              <input type="checkbox" onclick="onlyOneDate(this);" name="date_choice" value="date2" id="date2">
                              <span class="checkmark"></span>
                              </label>
                              <p><input type="button" value="" class="btn" id="slot2_date"></p>
                              <p><input type="button" value="" class="btn" id="slot2_from_time"></p>
                              <p><input type="button" value="" class="btn" id="slot2_to_time"></p>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                              <input type="checkbox" onclick="onlyOneDate(this);" name="date_choice" value="date3" id="date3">
                              <span class="checkmark"></span>
                              </label>
                              <p><input type="button" value="" class="btn" id="slot3_date"></p>
                              <p><input type="button" value="" class="btn" id="slot3_from_time"></p>
                              <p><input type="button" value="" class="btn" id="slot3_to_time"></p>
                           </div>

                           <div class="row">
                              <div class="col-sm-4"></div>
                              <div class="col-sm-4">
                                 <div class="inputfield">
                                    <input type="button" onclick="enter_slot()" value="Submit" class="btn">
                                 </div>
                              </div>
                              <div class="col-sm-4"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  <script>
		function enter_slot() {
			var slot = 0;
			for(var i=1; i<=3; i++)
				if(document.getElementById("date".concat(i)).checked)
					slot = i;

			if(slot != 0) {
				$.ajax({
					url: "final_confirmed_slot.php",
					method: "POST",
					data: {do:"enter_slot", slot:slot},
					success: function(sme_email) {
						window.location.replace("client_dashboard.php");
						alert("Consultation confirmed.");
						$.ajax({
							url: "final_confirmed_slot.php",
							method: "POST",
							data: {do:"mail", sme_email:sme_email}
						});
					}
				});
			}
		}
	  </script>
      <!--end modal for choose slot --->
      <!-- modal for chat connect --->
      <div class="modal fade" id="connectToChat" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body" style="padding: 0px;">
			   <div class="chat_modal container-fluid">
                     <div class="row header_row">
                        <div class="col-3 col-sm-3">
                           <img src="images/img1.jpg">
                        </div>
                        <div class="col-8 col-sm-8">
                           <h4><span id="chatModalLabel"></span>
                              <button class="btn" type="button" onclick="disconnectChat();">Disconnect</button>
                           </h4>
                        </div>
                        <div class="col-1 col-sm-1" style="padding: 15px;">
                           <div class="dropdown">
                              <span class="fas fa-ellipsis-v"></span>
                              <div class="dropdown-content">
                                 <a href="#">Export chat</a>
                                 <a href="#">Clear chat</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="chat_body" id="chats"></div>
                     <div class="row footer_row">
                        <div class="col-9 col-sm-9" style="padding: 0px;">
                           <textarea placeholder="Write a message" id="msg" onkeydown="return (event.keyCode!=13);"></textarea>
                        </div>
                        <div class="col-3 col-sm-3">
                           <label for="upload-photo"><i class="fas fa-paperclip"></i></label>
                           <input type="file" name="photo" id="upload-photo"/>
                           <a href="#" id="send-msg"><i class="fas fa-paper-plane"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--end modal for chat connect --->
	  <!-- modal for disconnect chat --->
      <div class="modal fade" id="disconnectChatModal" role="dialog">
		<div class="modal-dialog modal-sm">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body" style="text-align: center;">
					<p style="color: #38489E; font-size: 18px; font-weight: bold;">Are you sure you want to disconnect?</p>
					<button class="btn" onclick="closeChat();" style="background-color: #F3834B;">Disconnect</button>
				</div>
			</div>
		</div>
      </div>
      <!-- Start footer -->
	  <br><br>
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
      <script src="pageHandler.js"></script>
	  <script src="check.js"></script>
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