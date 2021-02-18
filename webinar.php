<?php
require_once ('connection.php');
if(isset($_GET['webinar_id'])) {
     
	$webinar_id= $_GET['webinar_id'];
	

	$results1 = mysqli_query($db,"SELECT * FROM sme_webinar WHERE webinar_id = '{$webinar_id}'") or die(mysqli_error($db));
	$row_cnt1=mysqli_num_rows($results1);
	
	if($row_cnt1==1){
		$row1=mysqli_fetch_array($results1);
		$sme_email=$row1['sme_email'];
		$webinar_topic=$row1['webinar_topic'];
		$webinar_desc=$row1['webinar_desc'];
		$who_attend=$row1['who_attend'];
		$key_takeaways=$row1['key_takeaways'];
		$webinar_fees=$row1['webinar_fees'];
		$webinar_date=$row1['webinar_date'];
		$webinar_from_time=$row1['webinar_from_time'];
		$webinar_to_time=$row1['webinar_to_time'];
		$course_image=$row1['course_image'];
		$webinar_venue=$row1['webinar_venue'];
	}


	//SELECT sme_webinar.webinar_id, sme_webinar.webinar_topic, sme_webinar.webinar_desc, sme_webinar.who_attend, sme_webinar.key_takeaways, sme_webinar.webinar_fees, sme_webinar.webinar_date, sme_webinar.webinar_from_time, sme_webinar.webinar_to_time, sme_webinar.course_image,  sme_profile.name, sme_profile.phone, sme_profile.email, sme_profile.pincode, sme_profile.postal_addr, sme_profile.categoryname, sme_profile.experience, sme_profile.skillset, sme_profile.sme_cert, sme_profile.sme_language, sme_profile.webinars, sme_profile.sme_fees, sme_profile.mode_of_cons, sme_profile.photo_loc, sme_profile.resume_loc, sme_profile.sme_designation, sme_profile.review_rating FROM sme_webinar inner join sme_profile on sme_webinar.sme_email=sme_profile.email"
	$results = mysqli_query($db,"SELECT * FROM sme_profile WHERE email = '{$sme_email}'") or die(mysqli_error($db));
	$row_cnt=mysqli_num_rows($results);
	
	if($row_cnt==1){
		$row=mysqli_fetch_array($results);
		$name=$row['name'];
		$phone=$row['phone'];
		$email=$row['email'];
		$pincode=$row['pincode'];
		$postal_addr=$row['postal_addr'];
		$categoryname=$row['categoryname'];
		$experience=$row['experience'];
		$about_sme=$row['about_sme'];
		$skillset=$row['skillset'];
		$sme_cert=$row['sme_cert'];
		$sme_language=$row['sme_language'];
		$webinars=$row['webinars'];
		$sme_fees=$row['sme_fees'];
		$mode_of_cons=$row['mode_of_cons'];
		$photo_loc=$row['photo_loc'];
		$resume_loc=$row['resume_loc'];
		$sme_designation=$row['sme_designation'];
		$review_rating=$row['review_rating'];
		
	}
	
	
	
	
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
      <style>
      </style>
   </head>
   <body data-spy="scroll" data-target=".navbar" data-offset="50">
      <section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="images/webinar_cover.png">
         <div class="overlay-bg overlay"></div>
         <h1 class="template-name">AFFABLE</h1>
         <div class="container">
            <div class="row fullscreen">
               <div class="banner-content col-lg-6" style="margin-top: 120px;">
                  <h1><?php echo $webinar_topic;?></h1>
                  <p><?php echo $webinar_desc;?></p>
                  <!-- <a href="#" class="primary-btn">View project</a> -->
                  <h3>SPEAKER: <?php echo $name;?></h3>
                  <p><?php echo $sme_designation;?></p>
               </div>
            </div>
         </div>
      </section>
     
      <!-- <section class="brands-area">
         <div class="container no-padding">
            <div class="row">
               <div class="col-sm-6" style="margin: auto; padding: 20px; text-align: left; padding-right: 230px;">
                  <h1 style="color: #F3834B; border-bottom: 4px solid #38489E; padding-bottom: 20px;">KEY TAKEAWAYS</h1>
               </div>
               <div class="col-sm-6">
                  <div class="row" style="margin-bottom: 20px;">
                     <div class="col-sm-4"><img src="images/personal_commissions.jpg" style="width: 100%; height: 100%;"></div>
                     <div class="col-sm-8" style="margin: auto; padding: 10px;">
                        <h5 style="color: #F3834B; margin-bottom: 10px;">PERSONAL COMMISSIONS</h5>
                        <h6 style="line-height: 1.2em;">Great for requesting standalone prices</h6>
                        <h6>Currently open!</h6>
                     </div>
                  </div>
                  <div class="row" style="margin-bottom: 20px;">
                     <div class="col-sm-4"><img src="images/brand_commission.png" style="width: 100%;"></div>
                     <div class="col-sm-8" style="margin: auto; padding: 10px;">
                        <h5 style="color: #F3834B; margin-bottom: 10px;">PERSONAL COMMISSIONS</h5>
                        <h6 style="line-height: 1.2em;">Great for requesting standalone prices</h6>
                        <h6>Currently open!</h6>
                     </div>
                  </div>
                  <div class="row" style="margin-bottom: 20px;">
                     <div class="col-sm-4"><img src="images/prmaterials.png" style="width: 100%;"></div>
                     <div class="col-sm-8" style="margin: auto; padding: 10px;">
                        <h5 style="color: #F3834B; margin-bottom: 10px;">PERSONAL COMMISSIONS</h5>
                        <h6 style="line-height: 1.2em;">Great for requesting standalone prices</h6>
                        <h6>Currently open!</h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</section>
		 
		 
		 
     <section>
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-9" style="padding-right: 0px;">
                  <img src="images/webinar_cover2.jpg" style="width: 100%; height: 50vh;">
               </div>
               <div class="col-sm-3" style="background-color: #38489E;">
                  <h2 style="color: white; margin: auto; padding: 10px; border-bottom: 4px solid white; margin-bottom: 50px; margin-top: 20px;">WEBINAR DETAILS</h2>
                  <h5 style="color: white; margin-bottom: 10px;">VENUE: Zoom call</h5>
                  <h5 style="color: white; margin-bottom: 10px;">DATE: 25/08/2020</h5>
                  <h5 style="color: white; margin-bottom: 10px;">EMAIL ID: remabimal0801@gmail.com</h5>
                  <h5 style="color: white; margin-bottom: 10px;">STARTS FROM 10:00</h5>
                  <h5 style="color: white; margin-bottom: 10px;">ENDS AT 15:00</h5>
               </div>
            </div>
         </div>
         </section> -->
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="grp_box" style="padding: 40px;
                     background: #f5f5f5;
                     margin-bottom: 30px;
                     height: 550px;
                     -webkit-transition: all ease-in-out 0.5s;
                     -o-transition: all ease-in-out 0.5s;
                     transition: all ease-in-out 0.5s;">
                     <h4 style="margin-bottom: 15px;
                        font-size: 26px; font-family: 'Georgia'; color: black;">About the SME</h4>
                     <p style="font-size: 16px; margin-bottom: 1rem;">
					

					<?php echo $about_sme;?>
                    


					</p>
                    
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="grp_box" style="padding: 20px;
                     background: #f5f5f5;
                     margin-bottom: 30px;
                     height: 550px;
                     -webkit-transition: all ease-in-out 0.5s;
                     -o-transition: all ease-in-out 0.5s;
                     transition: all ease-in-out 0.5s; text-align: center;">
					 <?php echo '<img src="'.$photo_loc.'" style="max-width: 100%;" >'?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="grp_box" style="padding: 40px;
                     background: #f5f5f5;
                     margin-bottom: 30px;
                     height: 455px;
                     -webkit-transition: all ease-in-out 0.5s;
                     -o-transition: all ease-in-out 0.5s;
                     transition: all ease-in-out 0.5s; text-align: center;">
                     <img src="images/target_audience.jpg" style="width: 100%;">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="grp_box" style="padding: 40px;
                     background: #f5f5f5;
                     margin-bottom: 30px;
                     height: 455px;
                     -webkit-transition: all ease-in-out 0.5s;
                     -o-transition: all ease-in-out 0.5s;
                     transition: all ease-in-out 0.5s;">
                     <h4 style="margin-bottom: 15px;
                        font-size: 26px; font-family: 'Georgia'; color: black;">Target Audience</h4>
                     <p style="font-size: 16px; margin-bottom: 1rem;">
                       
					   
					   <?php echo $who_attend;?>
					   
                     </p>
                    
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="grp_box" style="padding: 40px;
                     background: #f5f5f5;
                     margin-bottom: 30px;
                     height: 455px;
                     -webkit-transition: all ease-in-out 0.5s;
                     -o-transition: all ease-in-out 0.5s;
                     transition: all ease-in-out 0.5s;">
                     <h4 style="margin-bottom: 15px;
                        font-size: 26px; font-family: 'Georgia'; color: black;">Key Takeaways</h4>
                     <p style="font-size: 16px; margin-bottom: 1rem;">
                       
					   
					   <?php echo $key_takeaways;?>
					   
                     </p>
                    
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="grp_box" style="padding: 40px;
                     background: #f5f5f5;
                     margin-bottom: 30px;
                     height: 455px;
                     -webkit-transition: all ease-in-out 0.5s;
                     -o-transition: all ease-in-out 0.5s;
                     transition: all ease-in-out 0.5s; text-align: center;">
                     <img src="images/key_takeaways.jpg" style="width: 100%;">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="container-fluid" style="background-color: #f4f4f4;">
            <div class="grp_box" style="padding: 40px;
               background: #f5f5f5;
               margin-bottom: 30px;
               height: 650px;
               -webkit-transition: all ease-in-out 0.5s;
               -o-transition: all ease-in-out 0.5s;
               transition: all ease-in-out 0.5s; text-align: center;">
               <h4 style="margin-bottom: 15px;
                  font-size: 26px; font-family: 'Georgia'; color: black;">The best hire the brightest</h4>
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
	  
	  
	  
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="grp_box" style="padding: 40px;
                     background: #f5f5f5;
                     margin-bottom: 30px;
                     height: 500px;
                     -webkit-transition: all ease-in-out 0.5s;
                     -o-transition: all ease-in-out 0.5s;
                     transition: all ease-in-out 0.5s;">
                     <h4 style="margin-bottom: 15px;
                        font-size: 26px; font-family: 'Georgia'; color: black;"><?php echo $webinar_topic;?></h4>
                        <br>
                     <p style="font-size: 20px; margin-bottom: 1rem;">DATE: <?php echo $webinar_date;?></p>
                     <p style="font-size: 20px; margin-bottom: 1rem;">TIME: <?php echo $webinar_from_time;?> - <?php echo $webinar_to_time;?></p>
                     <br>
                     <p style="font-size: 20px; margin-bottom: 1rem;">FEES: <?php echo $webinar_fees;?> INR</p>
                     <p style="font-size: 20px; margin-bottom: 1rem;">CONTACT DETAILS: +91<?php echo $phone;?></p>
                     <br>
                     <p style="font-size: 20px; margin-bottom: 1rem;">VENUE: <?php echo $webinar_venue;?></p>
                     <br>
                     <a href="#"><button class="btn" style="background-color: black; color: white; padding: 8px;">REGISTER HERE</button></a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="grp_box" style="padding: 20px;
                     background: #f5f5f5;
                     margin-bottom: 30px;
                     height: 500px;
                     -webkit-transition: all ease-in-out 0.5s;
                     -o-transition: all ease-in-out 0.5s;
                     transition: all ease-in-out 0.5s; text-align: center;">
                     <?php echo '<img src="'.$course_image.'" style="max-width: 100%;" >'?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <br>
	  
      
      <!-- Start footer -->
      <footer style="background-color: #f2f2f2; padding: 20px;">
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
   </body>
</html>









