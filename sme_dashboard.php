<?php
require_once ('connection.php');
//session_start();
if(isset($_SESSION['email'])){
	$email=$_SESSION['email'];
	$results = mysqli_query($db,"SELECT sme_code, name, about_sme, phone, email, pincode, postal_addr, categoryname, experience, skillset, sme_cert, sme_language, webinars, sme_fees, mode_of_cons, photo_loc, resume_loc, review_rating, sme_designation FROM sme_profile WHERE email = '{$email}'") or die(mysqli_error($db));
	$row_cnt=mysqli_num_rows($results);
	
	if($row_cnt==1){
		$row=mysqli_fetch_array($results);
		$sme_code = $row['sme_code'];
		$name=$row['name'];
		$phone=$row['phone'];
		$email=$row['email'];
		$pincode=$row['pincode'];
		$postal_addr=$row['postal_addr'];
		$categoryname=$row['categoryname'];
		$experience=$row['experience'];
		$skillset=$row['skillset'];
		$sme_cert=$row['sme_cert'];
		$sme_language=$row['sme_language'];
		$webinars=$row['webinars'];
		$sme_fees=$row['sme_fees'];
		$about_sme=$row['about_sme'];
		$mode_of_cons=$row['mode_of_cons'];
		$photo_loc=$row['photo_loc'];
		$resume_loc=$row['resume_loc'];
		$review_rating=$row['review_rating'];
		$sme_designation=$row['sme_designation'];
		
	}
	$_SESSION['user'] = $sme_code;
}
else{
	header("Location:index.php?smeSignIn=1");
}

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
      <!-- Mobile Specific Meta -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta charset="UTF-8">
      <!-- Site Title -->
      <title>AFFABLE || SME DASHBOARD</title>
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
		a.user1Attach {
			color: #87898f;
			font-weight: bold;
			text-decoration: underline;
		}
		a.user2Attach {
			color: #fff;
			font-weight: bold;
			text-decoration: underline;
		}
		span.date-time {
			font-size: 0.8rem;
		}
	  </style>
</head>
   <body onload="sme_dashboard();" data-spy="scroll" data-target=".navbar" data-offset="50">

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
					 <li><a class="active" href="#section1" onclick="viewSections();">CLIENT REQUESTS</a></li>
                     <li><a href="#section1">CONSULTATIONS</a></li>
                     <li><a href="#section2">TESTIMONIALS</a></li>
					 
					 
					 
					 <div class="bs-example">
						<div class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> MY WEBINARS</a>
							<div class="dropdown-menu">
								<table>
								<?php 
								$query = "SELECT * FROM sme_webinar WHERE sme_email = '{$email}'";
								 $select_webinar = mysqli_query($db, $query);
								 $rowcount=mysqli_num_rows($select_webinar);
									
								if($rowcount==0)
								{
								 echo "No Webinars Posted";
								}
								 else{
									 
									while($row9 = mysqli_fetch_assoc($select_webinar))
									{
										$webinar_id = $row9['webinar_id'];
										$webinar_topic = $row9['webinar_topic'];
										$webinar_desc=$row9['webinar_desc'];
										$who_attend=$row9['who_attend'];
										$key_takeaways=$row9['key_takeaways'];
										$webinar_fees=$row9['webinar_fees'];
										$webinar_date=$row9['webinar_date'];
										$webinar_from_time=$row9['webinar_from_time'];
										$webinar_to_time=$row9['webinar_to_time'];
										$course_image=$row9['course_image'];
										$webinar_venue=$row9['webinar_venue'];
										
									?>
										<tr>		
										<td><a class="dropdown-item" href="webinar.php?webinar_id= <?php echo $webinar_id ?>" target="_blank"><?php echo $webinar_topic ?></a></td>
										<td><a class="dropdown-item" data-toggle="modal" data-target="#editWebinar" onclick="getWebinar('<?= $webinar_id ?>');">EDIT</a></td>
										<td><a class="dropdown-item" onclick="deletewebinar('<?= $webinar_id ?>');">DELETE</a></td>

										<input id="webinar_id" value="<?php echo $webinar_id; ?>" style="display: none;">
										<input id="webinar_topic_<?php echo $webinar_id; ?>" value="<?php echo $webinar_topic; ?>" style="display: none;">
										<input id="webinar_desc_<?php echo $webinar_id; ?>" value="<?php echo $webinar_desc; ?>" style="display: none;">
										<input id="who_attend_<?php echo $webinar_id; ?>" value="<?php echo $who_attend; ?>" style="display: none;">
										<input id="key_takeaways_<?php echo $webinar_id; ?>" value="<?php echo $key_takeaways; ?>" style="display: none;">
										<input id="webinar_fees_<?php echo $webinar_id; ?>" value="<?php echo $webinar_fees; ?>" style="display: none;">
										<input id="webinar_date_<?php echo $webinar_id; ?>" value="<?php echo $webinar_date; ?>" style="display: none;">
										<input id="webinar_from_time_<?php echo $webinar_id; ?>" value="<?php echo $webinar_from_time; ?>" style="display: none;">
										<input id="webinar_to_time_<?php echo $webinar_id; ?>" value="<?php echo $webinar_to_time; ?>" style="display: none;">
										<input id="webinar_venue_<?php echo $webinar_id; ?>" value="<?php echo $webinar_venue; ?>" style="display: none;">
										<input id="course_image_<?php echo $webinar_id; ?>" value="<?php echo $course_image; ?>" style="display: none;">
										
										
										</tr>
										
									<?php }} ?>
							</table>		
							</div>
						</div>
					</div>
					
					 
					 
					 
                    
                     <li class="notifications_humberger"><a href="#section3">NOTIFICATIONS</a></li>
                     <li class="dropdown profile_humberger">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        ACCOUNT</i>
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#">View Profile</a>
                           <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#passwordChangeSME">Change Password</a>
                           <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                     </li>
                     <li class="notifications"><a href="#"><i class="fas fa-bell fa-2x"></i></a></li>
                     <li class="dropdown profile">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <i class="fas fa-user-circle fa-2x"></i>
                        </a>
                        <div class="dropdown-menu" style="background-color: #f7f7f7;">
                           <div class="dropdown-item" href="#" onclick="viewSMEprofile();">View Profile</div>
                           <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#passwordChangeSME">Change Password</a>
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
      <section class="section-gap" id="section1">
         <div class="container-fluid">
		 <div class="row">
               <div class="col-sm-3 post_request" style="/* box-shadow: -5px -4px 3px 0px rgba(255, 255, 255, 0.425),
                  5px 4px 3px 0px rgba(88, 88, 88, 0.425); */ padding: 0px; background-color: #fff;">
                  <div>
                     <h1>Book a webinar</h1>
                     <h5>Send the topic and question to consult our SME</h5>
                     <img src="images/how_it_works_4.jpg">
                  </div>
                  <button class="btn" data-toggle="modal" data-target="#postWebinar">POST A WEBINAR</button>
               </div>
               <div class="col-sm-9">
            <div class="row">
               <div class="col-12 col-lg-6 col-sm-12 client_request">
              <h1>client requests</h1>
	  
				<?php
					// Retrieving sme category from table
					$stmt1 = $conn->prepare("SELECT categoryname FROM sme_profile WHERE email = :email");
					$stmt1->execute(array(":email" => $_SESSION['email']));
					$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
					$categoryname = $row1['categoryname'];
					
					if (empty($categoryname)){ ?>
					
					<div class="alert alert-danger" role="alert">
					<p><center>Please Update your Profile to start receiving Client requests</center></p>
					</div>
					<?php
					}
					

					// Retrieving user requests from table
					$stmt2 = $conn->prepare("SELECT questionid, topic, question, email, status FROM userquestion WHERE category = :categoryname");
					$stmt2->execute(array(":categoryname" => $categoryname));
					
					while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						$request = $row2;
						$questionid = $request['questionid'];
						
						
						// Checking whether another SME has answered the client question
						$stmt4 = $conn->prepare("SELECT count(*) AS cnt FROM sme_answer WHERE questionid = :questionid AND answered_by <> :email");
						$stmt4->execute(array(
							":questionid" => $questionid,
							":email" => $_SESSION['email']
						));
						$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
						if($row4['cnt'] == 1)
							continue;

						/* // Checking whether SME has declined request
						$stmt5 = $conn->prepare("SELECT count(*) AS dcnt FROM declined_requests WHERE questionid = :questionid AND sme_email = :email");
						$stmt5->execute(array(
							":questionid" => $questionid,
							":email" => $_SESSION['email']
						));
						$row5 = $stmt5->fetch(PDO::FETCH_ASSOC);
						if($row5['dcnt'] == 1)
							continue; */

						// Retrieving client name from table
						$stmt3 = $conn->prepare("SELECT name FROM user WHERE email = :email");
						$stmt3->execute(array(":email" => $request['email']));
						$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
						$from = $row3['name'];
				?>
				
				<button class="accordion"><?= htmlentities($request['topic']) ?></button>
				
                  <div class="panel">
                     <div class="profile_section">
                        <div class="form">
                           <form>
								<div class="inputfield terms">
                                 <label>ID: </label>
                                 <label style="width: 100%;"><?= $questionid ?></label>
								 
                              </div>
                              <div class="inputfield terms">
                                 <label>From: </label>
                                 <label style="width: 100%;"><?= htmlentities($from) ?></label>
                              </div>
                              <div class="inputfield terms">
                                 <label>Category: </label>
                                 <label style="width: 100%;"><?= htmlentities($categoryname) ?></label>
								 
                              </div>
                              <div class="inputfield">
                                 <label>Question</label>
                                 <label style="width: 100%;"><?= htmlentities($request['question']) ?></label>
                              </div>
							   <?php
								if($request['status'] != 'Accepted' && $request['status'] != 'Consultation confirmed') {
							  ?>
							  
                              <div class="inputfield">
                                 <label for="Tooltips" class="error thoughts" id="error_<?= $questionid ?>"></label>
                                 <label>Your thoughts on the matter</label>
                                 <textarea class="textarea" required="" id="SMEthoughts_<?= $questionid ?>"></textarea>

								<input id="topic_<?= $questionid ?>" value="<?= htmlentities($request['topic']) ?>" style="display: none;">
								<input id="question_<?= $questionid ?>" value="<?= htmlentities($request['question']) ?>" style="display: none;">
                              	<input id="user_<?= $questionid ?>" value="<?= htmlentities($request['email']) ?>" style="display: none;">
								<input id="sme_name" value="<?php echo $name;?>" style="display: none;">
								<input id="sme_email" value="<?php echo $email;?>" style="display: none;">
								<input id="Qid" value="<?php echo $questionid;?>" style="display: none;">
								
							 </div>
							  

                              <div class="row">
                                 <div class="col-sm-2"></div>
                                 <div class="col-sm-4">
                                    <div class="inputfield">
										<input type="button" value="ACCEPT" class="btn" onclick="thoughtChecker('<?= $questionid ?>');">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
								 <!--
								 	<div class="inputfield">
										<input type="button" value="DECLINE" class="btn" onclick="decline_req('<?= $questionid ?>');" style="background-color: #F3834B">
									</div>
									-->
                                 </div>
                                 <div class="col-sm-2"></div>
                              </div>
							  
							  <?php } ?>
                           </form>
                        </div>
                     </div>
                  </div> 
				  
				<?php } ?>
               </div>
			   
			   
			   
			   <script>
					function getWebinar(webinarid) {
						document.getElementById('webinar_id1').value = document.getElementById('webinar_id').value;
						document.getElementById('webinar_topic1').value = document.getElementById('webinar_topic_'.concat(webinarid)).value;
						document.getElementById('webinar_desc1').value = document.getElementById('webinar_desc_'.concat(webinarid)).value;
						document.getElementById('who_attend1').value = document.getElementById('who_attend_'.concat(webinarid)).value;
						document.getElementById('key_takeaways1').value = document.getElementById('key_takeaways_'.concat(webinarid)).value;
						document.getElementById('webinar_fees1').value = document.getElementById('webinar_fees_'.concat(webinarid)).value;
						document.getElementById('date11').value = document.getElementById('webinar_date_'.concat(webinarid)).value;
						document.getElementById('startone11').value = document.getElementById('webinar_from_time_'.concat(webinarid)).value;
						document.getElementById('one11').value = document.getElementById('webinar_to_time_'.concat(webinarid)).value;
						document.getElementById('webinar_venue1').value = document.getElementById('webinar_venue_'.concat(webinarid)).value;
						document.getElementById('course_image1').value = document.getElementById('course_image_'.concat(webinarid)).value;
						document.getElementById('del_web_name').innerHTML = document.getElementById('webinar_topic_'.concat(webinarid)).value;
					}
					
				
			   
					function deletewebinar(webinarid) {
						document.getElementById('del_web_name').innerHTML = document.getElementById('webinar_topic_'.concat(webinarid)).value;
						document.getElementById("del_web").setAttribute("onclick", "confirm_delete_webinar('" + webinarid + "');");
						$('#deletewebinar').modal('show');
					} 
			   
			   
			   
			   
			   
			   
		
					function thoughtChecker(questionid) {
						var smethoughts = document.getElementById('SMEthoughts_'.concat(questionid));
						//document.getElementById('label_user').innerHTML = document.getElementById('user_'.concat(questionid)).value;
						document.getElementById('label_topic').innerHTML = document.getElementById('topic_'.concat(questionid)).value;
						document.getElementById('label_question').innerHTML = document.getElementById('question_'.concat(questionid)).value;
						
						if (smethoughts.value != '') {
							document.getElementById('appointment').style.display = "none";
							for(var i=0; i<3; i++)
								document.getElementsByClassName("selectmode")[i].checked = false;
							for(var i=0; i<9; i++)
								document.getElementsByClassName("sel_dt_tm")[i].value = "";

							document.getElementById("saveBtn").setAttribute("onclick", "finalValidation(); save_slots('" + questionid + "');");
							$('#acceptClientRequest').modal('show');
						}
						
						else {
							$('#error_'.concat(questionid)).text('Please give your thoughts...!');
							$('#error_'.concat(questionid)).fadeIn('slow');
							setTimeout(function () {
								$('#error_'.concat(questionid)).fadeOut('slow');
							}, 3000);
						}
					}
					
					/* function decline_req(questionid) {
						document.getElementById("confirmBtn").setAttribute("onclick", "decline_confirm('" + questionid + "');");
						$('#declineRequest').modal('show');
					} */
					
					
				</script>
				
					
                     <div class="col-12 col-sm-6 client_request">
                        <h1>consultations</h1>

						<?php						
							// Retrieving consultaions from table
							$stmt1 = $conn->prepare("SELECT consultationId, clientEmailId, questionId, mode, date, fromTime FROM consultation WHERE smeEmailId = :email AND status <> 'Cancelled'");
							$stmt1->execute(array(":email" => $_SESSION['email']));

							$consultation_count = 1;
							while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
								$consultation = $row1;
								$questionId = $consultation['questionId'];
								$clientEmailId = $consultation['clientEmailId'];
								
								// Retrieving user question from table
								$stmt2 = $conn->prepare("SELECT category, question FROM userquestion WHERE questionId = :questionId");
								$stmt2->execute(array(":questionId" => $questionId));
								$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
								$category = $row2['category'];
								$question = $row2['question'];

								// Retrieving client name from table
								$stmt3 = $conn->prepare("SELECT name FROM user WHERE email = :email");
								$stmt3->execute(array(":email" => $clientEmailId));
								$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
								$client = $row3['name'];
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
                                    <label>Client</label>
                                    <label style="width: 100%;"><?= htmlentities($client) ?></label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Mode</label>
                                    <label style="width: 100%;"><?= htmlentities($consultation['mode']) ?></label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Date</label>
                                    <label style="width: 100%;" id="consultation_1"><?= htmlentities($consultation['date']) ?></label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Time</label>
                                    <label style="width: 100%;" id="consultation_time_1"><?= htmlentities($consultation['fromTime']) ?></label>
                                 </div>
								
                                 <div class="row">
                                       <div class="col-sm-2"></div>
                                       <div class="col-sm-4">
                                          <div class="inputfield">
                                             <input type="button" value="Connect" class="btn" data-toggle="modal" data-target="#connectToChat" data-backdrop="static" data-keyboard="false" onclick="chat('<?= $clientEmailId ?>', '<?= htmlentities($client) ?>', '<?= $questionId ?>');">
                                          </div>
                                       </div>
                                       <div class="col-sm-4">
                                          <div class="inputfield">
                                              <input type="button" value="Cancel" class="btn" id="cancelConsultation_1" onclick="question_id('<?= $questionId ?>'); cancelConsultation(this.id);">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"></div>
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
         </div>
      </section>
	  
	
	   <section id="section2">
         <div class="container-fluid" style="background-color: #f4f4f4;">
            <div class="grp_box" style="padding: 40px;
               background: #f5f5f5;
               margin-bottom: 30px;
               height: 650px;
               -webkit-transition: all ease-in-out 0.5s;
               -o-transition: all ease-in-out 0.5s;
               transition: all ease-in-out 0.5s; text-align: center;">
               <h4 style="margin-bottom: 15px;
                  font-size: 26px; font-family: 'Georgia'; color: black;">The best hire the brightest
                  <span type="button" data-toggle="modal" data-target="#edit_profile"><i class="fas fa-pen" style="margin-left: 10px;"></i></span>
               </h4>
               <h5 style="margin-bottom: 65px;
                  font-size: 16px; font-family: 'Georgia'; color: grey;">Over 3,000 customers rely on the resumator to hire the best candidates every year</h5>
               <div class="container">
                  <div class="row">
                     <div class="col-md-4">
                        <img src="images/img1.jpg" style="width: 50%; border-radius: 50%;">
                        <h4 style="margin-bottom: 15px; margin-top: 1.5rem;
                           font-size: 20px; font-family: 'Georgia'; color: black;">Sanjay Agarwal</h4>
                        <h4 style="margin-bottom: 15px; margin-top: 1.5rem;
                           font-size: 12px; font-family: 'Georgia'; color: black;">Management Head</h4>
                        <p style="font-size: 16px; margin-bottom: 1rem; margin-top: 1.5rem;">A Passionate Java Full Stack Trainer
                           with 25+ years of experience with a
                           demonstrated history of training
                           working professionals in IT sector.
                           An Enthusiastic Entrepreneur
                           having zeal to explore more
                           opportunities in learning and
                           development.
                        </p>
                     </div>
                     <div class="col-md-4">
                        <img src="images/img2.jpg" style="width: 50%; border-radius: 50%;">
                        <h4 style="margin-bottom: 15px; margin-top: 1.5rem;
                           font-size: 20px; font-family: 'Georgia'; color: black;">Sanjay Agarwal</h4>
                        <h4 style="margin-bottom: 15px; margin-top: 1.5rem;
                           font-size: 12px; font-family: 'Georgia'; color: black;">Marketing Head</h4>
                        <p style="font-size: 16px; margin-bottom: 1rem; margin-top: 1.5rem;">A Passionate Java Full Stack Trainer
                           with 25+ years of experience with a
                           demonstrated history of training
                           working professionals in IT sector.
                           An Enthusiastic Entrepreneur
                           having zeal to explore more
                           opportunities in learning and
                           development.
                        </p>
                     </div>
                     <div class="col-md-4">
                        <img src="images/img3.jpg" style="width: 50%; border-radius: 50%;">
                        <h4 style="margin-bottom: 15px; margin-top: 1.5rem;
                           font-size: 20px; font-family: 'Georgia'; color: black;">Sanjay Agarwal</h4>
                        <h4 style="margin-bottom: 15px; margin-top: 1.5rem;
                           font-size: 12px; font-family: 'Georgia'; color: black;">Development Head</h4>
                        <p style="font-size: 16px; margin-bottom: 1rem; margin-top: 1.5rem;">A Passionate Java Full Stack Trainer
                           with 25+ years of experience with a
                           demonstrated history of training
                           working professionals in IT sector.
                           An Enthusiastic Entrepreneur
                           having zeal to explore more
                           opportunities in learning and
                           development.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Start FAQ section -->
      <section>
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
	  <script>
	  	function question_id(questionid) {
			document.getElementById("cancelConst").setAttribute("onclick", "cancel_consultations('" + questionid + "');");
		}
	  </script>
      <!-- end client request section -->
<!--Profile section of SME--->
      <div class="container" id="sme_profile">
         <div class="profile_section">
            <div class="title">YOUR PROFILE<span type="button" data-toggle="modal" data-target="#edit_profile"><i class="fas fa-pen" style="margin-left: 10px;"></i></span></div>
            <div class="form" >
               <form method="POST" action="sme_dashboard.php?email=<?php echo $email?>">
                  <div class="row">
                     <div class="col-sm-2">
						
						<?php echo '<img src="'.$photo_loc.'" style="max-width: 100%;" >'?>

                     </div>
                     <div class="col-sm-5">

                        <div class="inputfield">
						<label>Name</label>
                          <label><?php echo $name;?></label>
						</div>
						
                        <div class="inputfield">
						<label>Phone Number</label>
                           <label><?php echo $phone;?></label>
						</div>
						
						
                        <div class="inputfield">
						<label>Email Address</label>
                           <label><?php echo $email;?></label>
						</div>
						
				
                        <div class="inputfield">
						<label>Pincode</label>
                          <label><?php echo $pincode;?></label>
						</div>
						
						
                        <div class="inputfield">
						<label>Postal Address</label>
                           <label><?php echo $postal_addr;?></label>
						</div>
						
						<div class="inputfield">
						<label>Designation</label>
                           <label><?php echo $sme_designation;?></label>
						</div>
						
						
                        <div class="inputfield">
						<label>Category</label>
                           <label><?php echo $categoryname;?></label>
						</div>
						
						
                        <div class="inputfield">
						<label>Experience in years</label>
                           <label><?php echo $experience;?></label>
						</div>
						
						 <div class="inputfield">
						<label>About me</label>
                           <label><?php echo $about_sme;?></label>
						</div>
											
  
                     </div>
					 
					  <div class="col-sm-5" style="border-left: 1px solid #38489E;">
					  
					  
					    <div class="inputfield">
						<label>Skillset</label>
                           <label><?php echo $skillset;?></label>
						</div>
						
					    
                        <div class="inputfield">
						<label>Certifications and recognitions</label>
                           <label><?php echo $sme_cert;?></label>
						</div>
						
						
                        <div class="inputfield">
						<label>Languages known</label>
                           <label><?php echo $sme_language;?></label>
						</div>
						
						
                        <div class="inputfield">
						<label>Willingness for webinars</label>
                           <label><?php echo $webinars;?></label>
						</div>
						
						
                        <div class="inputfield">
						<label>Consultation Fees per hour</label>
                           <label><?php echo $sme_fees;?></label>
						</div>
						
						
                        <div class="inputfield">
						<label>Mode of cunsultation</label>
                           <label><?php echo $mode_of_cons;?></label>
						</div>
						

                        <div class="inputfield">
						<label>Upload resume</label>
                           <label><?php echo $resume_loc;?></label>
						</div>
						
						 <div class="inputfield">
						<label>Review Rating</label>
                           <label><?php echo $review_rating;?></label>
						</div>
						
						
                     </div>
					</div>
                  </div>
                  <br>
                  <!-- <div class="row">
                     <div class="col-sm-4"></div>
                     <div class="col-sm-4">
                        <div class="inputfield">
                           <input value="EDIT PROFILE" class="btn" type="button" data-toggle="modal" data-target="#edit_profile">
                        </div>
                     </div>
                     <div class="col-sm-4"></div>
                  </div> -->
               </form>
            </div>
         </div>
      <!--Profile section of SME end--->
	  
	  

      <!-- modal for SME profile edit --->
      <div class="modal fade" id="edit_profile" role="dialog">
         <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body">
                  <div class="profile_section edit_profile">
                     <div class="title">EDIT YOUR PROFILE</div>
                     <div class="form">
                        
						<!--<form method="post" action="edit_sme_profile.php>-->
						<form method="POST" action="edit_sme_profile.php" enctype="multipart/form-data"> 
                          



						  <div class="row">
						  <div class="col-sm-3">
							 <?php echo '<img src="'.$photo_loc.'" style="max-width: 100%;" >'?>
						  </div>
                        
							<div class="col-sm-9">
							  
							  
                       <div class="inputfield">
						<label>Name</label>
                          <input type="input" class="input" id="name" name="name" value="<?php echo $name;?>"  >
						</div>
						
                        <div class="inputfield">
						<label>Phone Number</label>
                          <input type="input" class="input"  id="phone" name="phone" value="<?php echo $phone;?>" >
						</div>
						
						
                        <div class="inputfield">
						<label>Email Address</label>
                          <input type="input" class="input"   id="email" name="email" value="<?php echo $email;?>" readonly >
						</div>
						
						
                           <div class="inputfield">
                              <label>Pincode</label>
                              <input type="input" class="input"  id="pincode" name="pincode"  placeholder="721301" value="<?php echo $pincode;?>">
                           </div>
						   
						   
                           <div class="inputfield">
                              <label>Postal Address</label>
                              <input type="input" class="input"  id="postal_addr" name="postal_addr"  placeholder="Mirpur, near H.P. Gas Godown, Kharagpur, Paschim Medinipur" value="<?php echo $postal_addr;?>">
                           </div>
						   
						   
						   
						   
                              </div>
                           </div><br>
						   
						   <div class="inputfield">
                              <label>Designation</label>
                              <input type="input" class="input"  id="sme_designation" name="sme_designation"  placeholder="Director of Tech Solutions Pvt. Ltd." value="<?php echo $sme_designation;?>">
                           </div>
						   
                           <div class="inputfield">
                              <label>Category</label>
                              <div class="custom_select">
                                 <select name="categoryname" class="input" required="">
                                    <option class="input" value="Entrepreneurship">Entrepreneurship</option>
                                    <option class="input" value="Health and Fitness">Health and Fitness</option>
                                    <option class="input" value="IT">IT</option>
									<option class="input" value="RealEstate">RealEstate</option>
                                    <option class="input" value="Others">Others</option>
                                 </select>
                              </div>                           
							  </div>
						   
						   
                           <div class="inputfield">
                              <label>Experience in years</label>
                              <input type="input" class="input"  id="experience" name="experience" placeholder="7" value="<?php echo $experience;?>">
                           </div>
						   
						   
                           <div class="inputfield">
                              <label>Skillset</label>
							  <textarea type="input" name="skillset" id="skillset" class="input" placeholder="Excellent in Frontend Web development using HTML, CSS and JavaScript"><?php echo $skillset;?></textarea>
                           </div>
						   
						   
                           <div class="inputfield">
                              <label>Certifications and recognitions</label>
							  <textarea type="input" name="sme_cert" id="sme_cert" class="input" placeholder="Graduate from B.P. Poddar Institute of Management and Technology"><?php echo $sme_cert;?></textarea>
                           </div>
						   
						    <div class="inputfield">
                              <label>About me</label> 
							<textarea type="input" name="about_sme" id="about_sme" class="input" placeholder="write about yourself..."><?php echo $about_sme;?></textarea>
						   </div>
						   
						   
                           <div class="inputfield">
                              <label>Languages known</label>
                              <input type="input" class="input"   id="sme_language" name="sme_language"  placeholder="English, Hindi, Bengali" value="<?php echo $sme_language;?>">
                           </div>
						   
						   
                           <div class="inputfield">
                              <label>Willingness for webinars</label>
							  
							  <label class="check">
                              <input type="radio" name="webinars" value="Yes" checked="">
							  </label>
							  <p>Yes</p>
                             
                             
							 <label class="check">
                              <input type="radio" name="webinars" value="No">
                              </label>
                              <p>No</p>
                             
							 </div>
							 
						   
						   
                           <div class="inputfield">
                              <label>Consultation Fees per hour</label>
                              <input type="input" class="input"  id="sme_fees" name="sme_fees" value="<?php echo $sme_fees;?>">
                           </div>
						   
						   
                           <div class="inputfield">
                              <label>Mode of Consultation</label>
							  
                              <label class="check">
                              <input type="checkbox" name="MOC[ ]" value="Chat" checked="">
                              <span class="checkmark"></span>
                              </label>
                              <p>Chat</p>
							  
							  
                              <label class="check">
                              <input type="checkbox" name="MOC[ ]" value="Email" checked="">
                              <span class="checkmark"></span>
                              </label>
                              <p>Email</p>
							  
							  
                              <label class="check">
                              <input type="checkbox" name="MOC[ ]" value="Call">
                              <span class="checkmark"></span>
                              </label>
                              <p>Call</p>  
							  
						  </div>
						   
						   
                           <!-- <div class="inputfield">
                              <label>Upload profile photo</label>
                              <input class="input" type="file" id="myFile" name="filename" required="">
                           </div> -->
                           <div class="inputfield">
                              <label>Upload resume</label>
                              <input type="file"  id="resume_loc" name="resume_loc" value="<?php echo $resume_loc;?>">
                           </div>
						   
						   
                           <div class="inputfield">
                              <label>Upload profile photo</label>
                              <input type="file" required="" id="photo_loc" name="photo_loc" value="<?php echo $photo_loc;?>">
							  
							  <a class="trigger_popup_fricc">Profile photo template</a>
								<div class="hover_bkgr_fricc">
								<span class="helper"></span>
								<div>
									<div class="popupCloseButton">&times;</div>
									<p>Upload your Profile photo like this portrait dimension, to get best fit on webinar page.</p>
									<img src="images/profile_photo.jpeg" style="max-width: 100%;" >
								</div>
								</div>
							  
                           </div>
						   
						   
						    <div class="inputfield">
                              <label>Review Rating</label>
                              <input type="input" class="input" id="review_rating" name="review_rating" value="<?php echo $review_rating;?>" readonly>
                           </div>
						   
						   
                           <div class="row">
                              <div class="col-sm-4"></div>
                              <div class="col-sm-4">
							  
							  
                                 <div class="inputfield">
                                    <input type="submit" id="sme_update" name="sme_update" value="UPLOAD CHANGES" class="btn">
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

 <!--end modal for SME profile edit --->

      <!-- modal for SME password change --->
      <div class="modal fade" id="passwordChangeSME" role="dialog">
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
						url: "update_sme_password.php",
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
	  
	  
      <!--end modal for SME password change --->
      <!-- modal for client request accept --->
      <div class="modal fade" id="acceptClientRequest" role="dialog">
         <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body">
                  <div class="profile_section">
                     <div class="title">CHOOSE CONSULTATION MODE</div>
                     <div class="form">
                        <form>
                           <div class="row">
                              <div class="col-lg-2 col-xl-4"></div>
                              <div class="col-12 col-sm-12 col-lg-10 col-xl-4">
                                 <div class="inputfield terms appointment">
                                    <label class="label">select mode</label>
                                    <label class="check">
                                    <input type="checkbox" onclick="onlyOne1(this);" class="selectmode" name="consultation_mode" value="chat" id="chat">
                                    <span class="checkmark"></span>
                                    </label>
                                    <p>chat</p>
                                    <label class="check">
                                    <input type="checkbox" onclick="onlyOne1(this);" class="selectmode" name="consultation_mode" value="email" id="mail email">
                                    <span class="checkmark"></span>
                                    </label>
                                    <p>email</p>
                                    <label class="check">
                                    <input type="checkbox" onclick="onlyOne1(this);" class="selectmode" name="consultation_mode" value="call" id="call">
                                    <span class="checkmark"></span>
                                    </label>
                                    <p>call</p>
                                 </div>
                              </div>
                              <div class="col-lg-2 col-xl-4"></div>
                           </div>
                           <div id="appointment">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <div class="subtitle">SLOT 1</div>
                                    <label for="Tooltips" class="error" id="iddate1"></label>
                                    <label>select date</label>
                                    <div class="inputfield">
                                       <input type="date" class="input sel_dt_tm" required="" id="date1" onblur="dateChecker(this);">
                                    </div>
                                    <label>start time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input sel_dt_tm" required="" id="startone">
                                    </div>
                                    <label for="Tooltips" class="error" id="idone"></label>
                                    <label>end time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input sel_dt_tm" required="" id="one" onblur="timeChecker(this);">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="subtitle">SLOT 2</div>
                                    <label for="Tooltips" class="error" id="iddate2"></label>
                                    <label>select date</label>
                                    <div class="inputfield">
                                       <input type="date" class="input sel_dt_tm" required="" id="date2" onblur="dateChecker(this);">
                                    </div>
                                    <label>start time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input sel_dt_tm" required="" id="starttwo">
                                    </div>
                                    <label for="Tooltips" class="error" id="idtwo"></label>
                                    <label>end time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input sel_dt_tm" required="" id="two" onblur="timeChecker(this);">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="subtitle">SLOT 3</div>
                                    <label for="Tooltips" class="error" id="iddate3"></label>
                                    <label>select date</label>
                                    <div class="inputfield">
                                       <input type="date" class="input sel_dt_tm" required="" id="date3" onblur="dateChecker(this);">
                                    </div>
                                    <label>start time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input sel_dt_tm" required="" id="startthree">
                                    </div>
                                    <label for="Tooltips" class="error" id="idthree"></label>
                                    <label>end time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input sel_dt_tm" required="" id="three" onblur="timeChecker(this);">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <br>
                     
						
					 
					 
					    <!--Email reply starts --->
                        <div id="emailResponse">
							<!--  <label>From :&nbsp;</label><label id="label_user"></label><br>-->
							  <label>Topic :&nbsp;</label><label id="label_topic"></label><br>
							  <label>Question :&nbsp;</label><label id="label_question"></label><br>
                              
                              <textarea class="textarea" required="" id="sme_thoughts" style="width: 100%;outline: none;border: 1px solid #d5dbd9;font-size: 15px;padding: 8px 10px;border-radius: 3px;transition: all 0.3s ease; height: 120px; resize: none;" placeholder="Your thoughts..."></textarea>
							 <input type="file" name="file" id="file">
							<br>
							<!--<div class="text-center">
                            <button class="btn" id="email_client" style="padding: 8px 10px;font-size: 15px; border: 0px;background: #F3834B;color: #fff;cursor: pointer;border-radius: 3px;outline: none;">EMAIL CLIENT</button>
							</div>-->
						</div>
						<br>
						
                           <!-- email reply ends ---->
					 
							<div class="row" id="savebutton">
                              <div class="col-sm-4 col-lg-5"></div>
                              <div class="col-sm-4 col-lg-2">
                                 <div class="inputfield">
                                    <input type="button" id="saveBtn" value="SUBMIT" class="btn" onclick="finalValidation();">
                                 </div>
                              </div>
                              <div class="col-sm-4 col-lg-5"></div>
                           </div>
						   
						<script>
						function onlyOne1(checkbox) {
						mode_id = checkbox.id;
						var checkboxes = document.getElementsByName('consultation_mode')
						checkboxes.forEach((item) => {
							if (item !== checkbox) item.checked = false
						})

						if (mode_id == 'chat' || mode_id == 'call') {
							document.getElementById('savebutton').style.visibility = "visible";
							if (document.getElementById(mode_id).checked) {
								document.getElementById('appointment').style.display = "block";
								document.getElementById('emailResponse').style.display = "none";

							} else {
								document.getElementById('appointment').style.display = "none";
								document.getElementById('emailResponse').style.display = "none";
								
							}
						} else {
							if (document.getElementById(mode_id).checked){
								document.getElementById('appointment').style.display = "none";
							document.getElementById('emailResponse').style.display = "block";
							document.getElementById('savebutton').style.visibility = "visible";

							}
							else{
								document.getElementById('appointment').style.display = "none";
							document.getElementById('emailResponse').style.display = "block";
							document.getElementById('savebutton').style.visibility = "visible";
							}
						}
					}
					</script>
						   
						   
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
	  <script>
		function save_slots(questionid) {
			var answer = document.getElementById("SMEthoughts_".concat(questionid)).value;
			var selectmode = document.getElementsByClassName("selectmode");
			var mode_of_cons = "";
			for(var i=0; i<3; i++) 
				if(selectmode[i].checked)
					mode_of_cons = selectmode[i].value;


			if(mode_of_cons == 'email') {
				$.ajax({
					url: "consultation_slots.php",
					method: "POST",
					data: {do:"accept_request", questionid:questionid, answer:answer, mode_of_cons: mode_of_cons},
					success: function(client_email) {
						
						var client_email = client_email.trim();
						var fd = new FormData();
						var files = $('#file')[0].files[0];
						var sme_thoughts = document.getElementById("sme_thoughts").value;
						var topic = document.getElementById('topic_'.concat(questionid)).value;
						var question = document.getElementById('question_'.concat(questionid)).value;
						var sme_name = document.getElementById('sme_name').value;
						var sme_email = document.getElementById('sme_email').value;
						var Qid = document.getElementById('Qid').value;
						
						fd.append('file',files);
						fd.append('sme_thoughts',sme_thoughts);
						fd.append('client_email',client_email);
						fd.append('question',question);
						fd.append('topic',topic);
						fd.append('sme_name',sme_name);
						fd.append('sme_email',sme_email);
						fd.append('Qid',Qid);
						
						window.location.replace("sme_dashboard.php");
						$.ajax({
								url: 'email_response.php',
								type: 'post',
								data: fd,
								contentType: false,
								processData: false
								
						});
						alert("Email Sent");
					}
				});
			}

			else if(mode_of_cons != '') {
				var empty = 0;
				for(var i=0; i<9; i++)
					if(document.getElementsByClassName("sel_dt_tm")[i].value == "") {
						empty = 1;
						break;
					}
				if(empty == 0) {

					var date1 = document.getElementById("date1").value;
					var ftime1 = document.getElementById("startone").value;
					var ttime1 = document.getElementById("one").value;
					var date2 = document.getElementById("date2").value;
					var ftime2 = document.getElementById("starttwo").value;
					var ttime2 = document.getElementById("two").value;
					var date3 = document.getElementById("date3").value;
					var ftime3 = document.getElementById("startthree").value;
					var ttime3 = document.getElementById("three").value;

					$.ajax({
						url: "consultation_slots.php",
						method: "POST",
						data: {do:"accept_request", questionid:questionid, answer:answer, mode_of_cons: mode_of_cons,
							date1:date1,
							ftime1:ftime1,
							ttime1:ttime1,
							date2:date2,
							ftime2:ftime2,
							ttime2:ttime2,
							date3:date3,
							ftime3:ftime3,
							ttime3:ttime3
						},
						success: function(client_email) {
							var client_email = client_email.trim();
							window.location.replace("sme_dashboard.php");
							alert("Request accepted.");
							$.ajax({
								url: "consultation_slots.php",
								method: "POST",
								data: {do:"mail", client_email:client_email}
							});
						}
					});
				}
			}
		}
	  </script>
      <!--end modal for client request accept --->
      <!-- modal for request decline confirmation --->
      <div class="modal fade" id="declineRequest" role="dialog">
         <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body" style="text-align: center;">
                  <p style="color: #38489E; font-size: 18px; font-weight: bold;">Are you sure you want to decline the client request?</p>
                  <button class="btn" id="confirmBtn" style="background-color: #F3834B;">CONFIRM</button>
               </div>
            </div>
         </div>
      </div>
	  
	  
	  
	   <div class="modal fade" id="deletewebinar" role="dialog">
         <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body" style="text-align: center;">
                  <a style="color: #38489E; font-size: 18px; font-weight: bold;" >Are you sure you want to delete a webinar -&nbsp;</a><a style="color: #38489E; font-size: 18px; font-weight: bold;" id="del_web_name"></a><br><br>
                  <button class="btn" id="del_web" style="background-color: #F3834B;">CONFIRM</button>
               </div>
            </div>
         </div>
      </div>
	  
	  
	  <!-- <script>
		function decline_confirm(questionid) {
			$.ajax({
				url: "consultation_slots.php",
				method: "POST",
				data: {do:"decline_request", questionid: questionid},
				success: function(status) {
					if(status.trim() == "1") {
						window.location.replace("sme_dashboard.php");
						alert("Request declined.");
					}
				}
			});
		}
	  </script> -->
	  
	  <script>
		function confirm_delete_webinar(webinarid) {
			$.ajax({
				url: "delete_webinar.php",
				method: "POST",
				data: {webinarid: webinarid},
				success: function(status) {
					if(status.trim() == "1") {
						window.location.replace("sme_dashboard.php");
						alert("Webinar Deleted.");
					}
				}
			});
		}
	  </script>
      <!--end modal for request decline confirmation --->
	  
	  
	  <!-- modal for cancel consultation --->
      <div class="modal fade" id="cancelConsultation" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body">
                  <div class="profile_section cancel_consultation">
                     <div class="title">CANCEL CONSULTATION</div>
                     <div class="form">
                        <form>
                           <div class="inputfield terms">
                              <label class="check">
                                <input type="checkbox" onclick="onlyOneReason(this)" class="cancelReason" id="cancelReason1" checked="">
                              <span class="checkmark"></span>
                              </label>
                               <p id="reason1">Got busy with something else</p>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                               <input type="checkbox" onclick="onlyOneReason(this)" class="cancelReason" id="cancelReason2">
                              <span class="checkmark"></span>
                              </label>
                               <p id="reason2">Clashing with another consultation</p>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                              <input type="checkbox" onclick="onlyOneReason(this)" class="cancelReason" id="cancelReason3">
                              <span class="checkmark"></span>
                              </label>
                              <p id="reason3">Personal constraint</p>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                              <input type="checkbox" onclick="onlyOneReason(this)" class="cancelReason" id="cancelReason4">
                              <span class="checkmark"></span>
                              </label>
                              <p id="reason4">Not listed</p>
                           </div>
                           <div class="row">
                              <div class="col-sm-4"></div>
                              <div class="col-sm-4">
                                 <div class="inputfield">
                                    <input type="button" value="Submit" id="cancelConst" class="btn">
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
		function onlyOneReason(reasonid) {
			for(var i=0; i<4; i++)
				document.getElementsByClassName("cancelReason")[i].checked = false;
			document.getElementById(reasonid.id).checked = true;
		}

	  	function cancel_consultations(questionid) {
			var reason = "";
			for(var i=0; i<4; i++)
				if(document.getElementsByClassName("cancelReason")[i].checked) {
					reason = document.getElementById("reason".concat(i+1)).innerHTML;
					break
				}

			$.ajax({
				url: "cancel_consultations.php",
				method: "POST",
				data: {do:"entry", questionid: questionid, reason: reason},
				success: function(status) {
					window.location.replace("sme_dashboard.php");
					if(status.trim() == "1") {
						alert("The consultation has been cancelled.");
						$.ajax({
							url: "cancel_consultations.php",
							method: "POST",
							data: {do:"mail", questionid: questionid, reason: reason}
						});
					}
				}
			});
		}
	  </script>
      <!--end modal for cancel consultation --->
	  
	  
	  
	  
	  
	  <!-- modal for post webinar--->
      <div class="modal fade" id="postWebinar" role="dialog">
         <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body">
                  <div class="profile_section">
                     <div class="title">POST A WEBINAR</div>
                     <div class="form">
                        <form method="POST" action="post_webinar.php" enctype="multipart/form-data" >
							
                           <div class="inputfield">
                              <label>Webinar topic</label>
                              <input type="text" name="webinar_topic" id="webinar_topic" class="input" required="">
                           </div>
                           <div class="inputfield">
                              <label>Description(Within 200 words)</label>
                              <textarea type="text" name="webinar_desc" id="webinar_desc" class="textarea" required="" placeholder="Objective of the course"></textarea>
                           </div>
                           <div class="inputfield">
                              <label>Who can attend?</label>
                              <textarea type="text" name="who_attend" id="who_attend" class="textarea" required="" placeholder="Target audience"></textarea>
                           </div>
                           <div class="inputfield">
                              <label>Key takeaways (Within 100 words)</label>
                              <textarea type="text" name="key_takeaways" id="key_takeaways" class="textarea" required=""></textarea>
                           </div>
                           <div class="inputfield">
                              <label>Fees</label>
                              <input type="text" name="webinar_fees" id="webinar_fees" class="input" required="">
                           </div>
						   
						   <div class="inputfield">
                              <label>Webinar Venue</label>
                              <input type="text" name="webinar_venue" id="webinar_venue" class="input" placeholder="Zoom call, Google meet, etc." required="">
                           </div>
						   
						   <div class="inputfield">
                              <label>Course Image</label>
                              <input type="file" required="" name="course_image" id="course_image" >
							  
							    <a class="trigger_popup_fricc">Course image template</a>
								<div class="hover_bkgr_fricc">
								<span class="helper"></span>
								<div>
									<div class="popupCloseButton">&times;</div>
									<p>Upload your Course image poster like this portrait dimension, to get best fit on webinar page.</p>
									<img src="images/service1.jpg" style="max-width: 100%;" >
								</div>
								</div>
							  
							  
                           </div>
						   
						   
						   
						   
						   
						   <style>/* Popup box BEGIN */
							.hover_bkgr_fricc{
								
								cursor:pointer;
								display:none;
								height:100%;
								position:fixed;
								text-align:center;
								top:0;
								width:100%;
								z-index:10000;
							}
							.hover_bkgr_fricc .helper{
								display:inline-block;
								height:100%;
								vertical-align:middle;
							}
							.hover_bkgr_fricc > div {
								background-color: #fff;
								box-shadow: 10px 10px 60px #555;
								display: inline-block;
								height: auto;
								max-width: 550px;
								min-height: 100px;
								vertical-align: middle;
								width: 40%;
								position: relative;
								border-radius: 8px;
								padding: 15px 5%;
							}
							.popupCloseButton {
								background-color: #fff;
								border: 3px solid #999;
								border-radius: 50px;
								cursor: pointer;
								display: inline-block;
								font-family: arial;
								font-weight: bold;
								position: absolute;
								top: -20px;
								right: -20px;
								font-size: 25px;
								line-height: 30px;
								width: 30px;
								height: 30px;
								text-align: center;
							}
							.popupCloseButton:hover {
								background-color: #ccc;
							}
							.trigger_popup_fricc {
								cursor: pointer;
								font-size: 20px;
								margin: 20px;
								display: inline-block;
								font-weight: bold;
							}
							/* Popup box BEGIN */</style>
						   
						   <script>
						   $(window).load(function () {
							$(".trigger_popup_fricc").click(function(){
							   $('.hover_bkgr_fricc').show();
							});
							$('.hover_bkgr_fricc').click(function(){
								$('.hover_bkgr_fricc').hide();
							});
							$('.popupCloseButton').click(function(){
								$('.hover_bkgr_fricc').hide();
							});
						});
						   </script>
						  
						  
						  
                           <div class="inputfield">
						    <label for="Tooltips" class="error" id="iddate"></label>
                              <label>Date</label>
                              <input type="date" id="date" name="date" class="input" required="" onblur="dateChecker(this);">
                           </div>

                           <div class="inputfield">
                              <label>Start time</label>
                              <input type="time"  id="startone1" name="startone1" class="input" required="" onblur="timeChecker(this);">
                           </div>
						   <label for="Tooltips" class="error" id="idone1"></label>
                           <div class="inputfield">
                              <label>End time</label>
                              <input type="time" id="one1" name="one1" class="input" required="" onblur="timeChecker(this);">
                           </div>
                           <div class="row">
                              <div class="col-sm-3"></div>
                              <div class="col-sm-6">
                                 <div class="inputfield">
                                    <input type="submit" name="post_webinar" id="post_webinar" value="POST WEBINAR" class="btn">
                                 </div>
							<div class="alert alert-danger" role="alert" id="post-webinar-error" style="display: none;">
						   </div>
						    <div class="alert alert-success" role="alert" id="email-sent-msg-user" style="display: none;">
							<p>Your Webinar has been Posted</p>
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
	  

      <!--end modal for post webinar --->
	  
	  
	  
	  
	  
	  	<!-- modal for EDIT webinar--->
      <div class="modal fade" id="editWebinar" role="dialog">
         <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body">
                  <div class="profile_section">
                     <div class="title">Edit Your WEBINAR</div>
                     <div class="form">
                        <form method="POST" action="edit_webinar.php" enctype="multipart/form-data" >
							
                           <div class="inputfield">
                              <label>Webinar topic</label>
							  
                              <input type="text" name="webinar_topic1" id="webinar_topic1" class="input" required="">
                           </div>
                           <div class="inputfield">
                              <label>Description(Within 200 words)</label>
                              <textarea type="text" name="webinar_desc1" id="webinar_desc1" class="textarea" required="" placeholder="Objective of the course"></textarea>
                           </div>
                           <div class="inputfield">
                              <label>Who can attend?</label>
                              <textarea type="text" name="who_attend1" id="who_attend1" class="textarea" required="" placeholder="Target audience"></textarea>
                           </div>
                           <div class="inputfield">
                              <label>Key takeaways (Within 100 words)</label>
                              <textarea type="text" name="key_takeaways1" id="key_takeaways1" class="textarea" required=""></textarea>
                           </div>
                           <div class="inputfield">
                              <label>Fees</label>
                              <input type="text" name="webinar_fees1" id="webinar_fees1" class="input" required="">
                           </div>
						   
						   <div class="inputfield">
                              <label>Webinar Venue</label>
                              <input type="text" name="webinar_venue1" id="webinar_venue1" class="input"  required="">
                           </div>
						   
						   <div class="inputfield">
                              <label>Course Image</label>
                              <input type="file" required="" name="course_image1" id="course_image1" >
							  
							    <a class="trigger_popup_fricc">Course image template</a>
								<div class="hover_bkgr_fricc">
								<span class="helper"></span>
								<div>
									<div class="popupCloseButton">&times;</div>
									<p>Upload your Course image poster like this portrait dimension, to get best fit on webinar page.</p>
									<img src="images/service1.jpg" style="max-width: 100%;" >
								</div>
								</div>
							  
							  
                           </div>
						  
                           <div class="inputfield">
						    <label for="Tooltips" class="error" id="iddate11"></label>
                              <label>Date</label>
                              <input type="date" id="date11" name="date11" class="input" required="" onblur="dateChecker(this);">
                           </div>

                           <div class="inputfield">
                              <label>Start time</label>
                              <input type="time"  id="startone11" name="startone11" class="input" required="" onblur="timeChecker(this);">
                           </div>
						   <label for="Tooltips" class="error" id="idone11"></label>
                           <div class="inputfield">
                              <label>End time</label>
                              <input type="time" id="one11" name="one11" class="input" required="" onblur="timeChecker(this);">
                           </div>
						   
						   <input id="webinar_id1" name="webinar_id1" style="display: none;">

						   
						   
                           <div class="row">
                              <div class="col-sm-3"></div>
                              <div class="col-sm-6">
                                 <div class="inputfield">
                                    <input type="submit" name="edit_webinar" id="edit_webinar" value="UPDATE WEBINAR" class="btn">
                                 </div>
							<div class="alert alert-danger" role="alert" id="post-webinar-error" style="display: none;">
						   </div>
						    <div class="alert alert-success" role="alert" id="email-sent-msg-user" style="display: none;">
							<p>Your Webinar has been Posted</p>
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
	  

      <!--end modal for EDIT webinar --->
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
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
                                 <a href="#" id="export-chat">Export chat</a>
                                 <a href="#" id="clr-msgs">Clear chat</a>
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
                           <label for="attachedFile"><i class="fas fa-paperclip"></i></label>
                           <input type="file" name="attachedFile" id="attachedFile"/>
                           <a href="#" id="send-msg"><i class="fas fa-paper-plane"></i></a>
                        </div>
                     </div>
					 <a href="" id="exportLink" style="display: none;" download></a>
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
	  <!-- modal for clear chat --->
      <div class="modal fade" id="clrChatsModal" role="dialog">
		<div class="modal-dialog modal-sm">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body" style="text-align: center;">
					<p style="color: #38489E; font-size: 18px; font-weight: bold;">Are you sure you want to clear chats?</p>
					<button class="btn" id="confirm-clr-msgs" style="background-color: #F3834B;">Clear</button>
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
      <script src="js/jquery-2.2.4.min.js"></script>
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