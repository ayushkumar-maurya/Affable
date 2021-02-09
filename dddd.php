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
   </head>
   <body onload="sme_dashboard();" data-spy="scroll" data-target=".navbar" data-offset="50">
      <!-- <div class="alert hide" id="alert1">
         <span class="fas fa-exclamation-circle"></span>
         <span class="msg">Please share your thoughts before accepting!</span>
         <div class="close-btn">
           <span class="fas fa-times"></span>
         </div>
         </div>
         
         <div class="alert hide" id="alert2">
         <span class="fas fa-exclamation-circle"></span>
         <span class="msg">Please enter a future date!</span>
         <div class="close-btn">
           <span class="fas fa-times"></span>
         </div>
         </div> -->
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
                     <li><a class="active" href="#section1" onclick="viewSections();">CLIENT REQUESTS</a></li>
                     <li><a href="#section2">CONSULTATIONS</a></li>
                     <li><a href="#section3">TESTIMONIALS</a></li>
                     <li><a href="#section4">WEBINARS</a></li>
                     <li class="notifications_humberger"><a href="#section3">NOTIFICATIONS</a></li>
                     <li class="dropdown profile_humberger">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        ACCOUNT</i>
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#">View Profile</a>
                           <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#passwordChangeSME">Change Password</a>
                           <a class="dropdown-item" href="#">Logout</a>
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
                           <a class="dropdown-item" href="#">Logout</a>
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
                  <button class="btn" data-toggle="modal" data-target="#postQuestion">POST A REQUEST</button>
               </div>
               <div class="col-sm-9">
                  <div class="row">
                     <div class="col-12 col-sm-6 client_request">
                        <h1>Client Requests</h1>
                        <button class="accordion">CLIENT REQUEST 1</button>
                        <div class="panel">
                           <div class="profile_section">
                              <div class="form">
                                 <form>
                                    <div class="inputfield terms">
                                       <label>From: </label>
                                       <label style="width: 100%;">Pratiti Bera</label>
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
                                       <label for="Tooltips" class="error thoughts"></label>
                                       <label>Your thoughts on the matter</label>
                                       <textarea class="textarea" required="" id="SMEthoughts"></textarea>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-2"></div>
                                       <div class="col-sm-4">
                                          <div class="inputfield">
                                             <input type="button" value="ACCEPT" class="btn" onclick="thoughtChecker();">
                                          </div>
                                       </div>
                                       <div class="col-sm-4">
                                          <div class="inputfield">
                                             <input type="button" value="DECLINE" class="btn" data-toggle="modal" data-target="#declineRequest" style="background-color: #F3834B">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"></div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <button class="accordion">CLIENT REQUEST 2</button>
                        <div class="panel"></div>
                        <button class="accordion">CLIENT REQUEST 3</button>
                        <div class="panel"></div>
                        <button class="accordion">CLIENT REQUEST 4</button>
                        <div class="panel"></div>
                        <button class="accordion">CLIENT REQUEST 5</button>
                        <div class="panel"></div>
                     </div>
                     <div class="col-sm-6" style="padding: 50px;">
                        <br>
                        <img class="img-fluid" src="images/write_to_us.jpg" alt="">
                        <!-- <video controls class="img-fluid" loop autoplay muted>
                           <source src="images/test_video.mp4" type="video/mp4">
                           </video> -->
                     </div>
                     <div class="col-sm-6" style="padding: 50px;">
                        <br>
                        <img class="img-fluid" src="images/write_to_us.jpg" alt="">
                        <!-- <video controls class="img-fluid" loop autoplay muted>
                           <source src="images/test_video.mp4" type="video/mp4">
                           </video> -->
                     </div>
                     <div class="col-12 col-sm-6 client_request">
                        <h1>consultations</h1>
                        <button class="accordion">Consultation ID 1</button>
                     <div class="panel">
                        <div class="profile_section">
                           <div class="form">
                              <form>
                                 <div class="inputfield terms">
                                    <label>Consultation ID: </label>
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
                                    <label>Client</label>
                                    <label style="width: 100%;">Pratiti Bera</label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Mode</label>
                                    <label style="width: 100%;">Call</label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Date</label>
                                    <label style="width: 100%;" id="consultation_1">2021-02-06</label>
                                 </div>
                                 <div class="inputfield">
                                    <label>Time</label>
                                    <label style="width: 100%;" id="consultation_time_1">20:30</label>
                                 </div>
                                 <div class="row">
                                       <div class="col-sm-2"></div>
                                       <div class="col-sm-4">
                                          <div class="inputfield">
                                             <input type="submit" value="Connect" class="btn" disabled="">
                                          </div>
                                       </div>
                                       <div class="col-sm-4">
                                          <div class="inputfield">
                                             <input type="button" value="Cancel" class="btn" id="cancelConsultation_1" onclick="cancelConsultation(this.id);">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"></div>
                                    </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <button class="accordion">Consultation ID 2</button>
                     <div class="panel"></div>
                     <button class="accordion">Consultation ID 3</button>
                     <div class="panel"></div>
                     <button class="accordion">Consultation ID 4</button>
                     <div class="panel"></div>
                     <button class="accordion">Consultation ID 5</button>
                     <div class="panel"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <br>
      <!--Profile section of SME--->
      <div class="container" id="sme_profile">
         <div class="profile_section">
            <div class="title">YOUR PROFILE<span type="button" data-toggle="modal" data-target="#edit_profile"><i class="fas fa-pen" style="margin-left: 10px;"></i></span></div>
            <div class="form">
               <form>
                  <div class="row">
                     <div class="col-sm-2">
                        <img src="images/profile_photo.jpeg" style="max-width: 100%;">
                     </div>
                     <div class="col-sm-5">
                        <div class="inputfield">
                           <label>Full name</label>
                           <label>Pratiti Bera</label>
                           <!-- <p style="text-align: left;">remabimal0801@gmail.com</p> -->
                        </div>
                        <div class="inputfield">
                           <label>Phone Number</label>
                           <label>9382526040</label>
                           <!-- <p style="text-align: left;">remabimal0801@gmail.com</p> -->
                        </div>
                        <div class="inputfield">
                           <label>Email Address</label>
                           <label>remabimal0801@gmail.com</label>
                           <!-- <p style="text-align: left;">remabimal0801@gmail.com</p> -->
                        </div>
                        <div class="inputfield">
                           <label>Pincode</label>
                           <label>721301</label>
                        </div>
                        <div class="inputfield">
                           <label>Postal Address</label>
                           <label>Mirpur, near H.P. Gas Godown, Kharagpur, Paschim Medinipur</label>
                        </div>
                        <div class="inputfield">
                           <label>Consultation Fees per hour</label>
                           <label>500</label>
                        </div>
                        <div class="inputfield">
                           <label>Upload profile photo</label>
                           <a href="#"><label>View Profile photo</label></a>
                        </div>
                        <div class="inputfield">
                           <label>Upload resume</label>
                           <a href="#"><label>View resume</label></a>
                        </div>
                     </div>
                     <div class="col-sm-5" style="border-left: 1px solid #38489E;">
                        <div class="inputfield">
                           <label>Category</label>
                           <label>Category B</label>
                        </div>
                        <div class="inputfield">
                           <label>Experience in years</label>
                           <label>7</label>
                        </div>
                        <div class="inputfield">
                           <label>Skillset</label>
                           <label>Excellent in Frontend Web development using HTML, CSS and JavaScript</label>
                        </div>
                        <div class="inputfield">
                           <label>Certifications and recognitions</label>
                           <label>Graduate from B.P. Poddar Institute of Management and Technology</label>
                        </div>
                        <div class="inputfield">
                           <label>Mode of cunsultation</label>
                           <label>Chat, Email</label>
                        </div>
                        <div class="inputfield">
                           <label>Languages known</label>
                           <label>English, Hindi, Bengali</label>
                        </div>
                        <div class="inputfield">
                           <label>Willingness for webinars</label>
                           <label>No</label>
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
                        <form>
                           <div class="row">
                              <div class="col-sm-3">
                                 <img src="images/profile_photo.jpeg" style="max-width: 100%;">
                              </div>
                              <div class="col-sm-9">
                                 <div class="inputfield">
                                    <label>Full name</label>
                                    <label>Pratiti Bera</label>
                                    <!-- <p style="text-align: left;">remabimal0801@gmail.com</p> -->
                                 </div>
                                 <div class="inputfield">
                                    <label>Phone Number</label>
                                    <label>9382526040</label>
                                    <!-- <p style="text-align: left;">remabimal0801@gmail.com</p> -->
                                 </div>
                                 <div class="inputfield">
                                    <label>Email Address</label>
                                    <label>remabimal0801@gmail.com</label>
                                    <!-- <p style="text-align: left;">remabimal0801@gmail.com</p> -->
                                 </div>
                                 <div class="inputfield">
                                    <label>Pincode</label>
                                    <input type="text" class="input" required="" placeholder="721301">
                                 </div>
                                 <div class="inputfield">
                                    <label>Postal Address</label>
                                    <textarea class="textarea" placeholder="Mirpur, near H.P. Gas Godown, Kharagpur, Paschim Medinipur"></textarea>
                                 </div>
                              </div>
                           </div>
                           <br>
                           <div class="inputfield">
                              <label>Category</label>
                              <div class="custom_select">
                                 <select required="">
                                    <option value="">Category B</option>
                                    <option value="male">Category A</option>
                                    <option value="female">Category B</option>
                                    <option value="female">Category C</option>
                                 </select>
                              </div>
                           </div>
                           <div class="inputfield">
                              <label>Experience in years</label>
                              <input type="text" class="input" placeholder="7">
                           </div>
                           <div class="inputfield">
                              <label>Skillset</label>
                              <textarea class="textarea" required="" placeholder="Excellent in Frontend Web development using HTML, CSS and JavaScript"></textarea>
                           </div>
                           <div class="inputfield">
                              <label>Certifications and recognitions</label>
                              <textarea class="textarea" required="" placeholder="Graduate from B.P. Poddar Institute of Management and Technology"></textarea>
                           </div>
                           <div class="inputfield">
                              <label>Languages known</label>
                              <input type="text" class="input" required="" placeholder="English, Hindi, Bengali">
                           </div>
                           <div class="inputfield terms">
                              <label>Willingness for webinars</label>
                              <label class="check">
                              <input type="checkbox">
                              <span class="checkmark"></span>
                              </label>
                              <p>Yes</p>
                              <label class="check">
                              <input type="checkbox" checked="">
                              <span class="checkmark"></span>
                              </label>
                              <p>No</p>
                           </div>
                           <div class="inputfield">
                              <label>Consultation Fees per hour</label>
                              <input type="text" class="input" required="">
                           </div>
                           <div class="inputfield terms">
                              <label>Mode of consultation</label>
                              <label class="check">
                              <input type="checkbox" checked="">
                              <span class="checkmark"></span>
                              </label>
                              <p>Chat</p>
                              <label class="check">
                              <input type="checkbox" checked="">
                              <span class="checkmark"></span>
                              </label>
                              <p>Email</p>
                              <label class="check">
                              <input type="checkbox">
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
                              <input class="input" type="file" id="myFile" name="filename" required="">
                           </div>
                           <div class="inputfield">
                              <label>Upload profile photo</label>
                              <input class="input" type="file" id="myFile" name="filename">
                           </div>
                           <div class="row">
                              <div class="col-sm-3 col-lg-4"></div>
                              <div class="col-sm-6 col-lg-4">
                                 <div class="inputfield">
                                    <input type="submit" value="UPLOAD CHANGES" class="btn">
                                 </div>
                              </div>
                              <div class="col-sm-3 col-lg-4"></div>
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
                                    <input type="checkbox" onclick="onlyOne(this);" name="consultation_mode" value="chat" id="chat">
                                    <span class="checkmark"></span>
                                    </label>
                                    <p>chat</p>
                                    <label class="check">
                                    <input type="checkbox" onclick="onlyOne(this);" name="consultation_mode" value="email" id="email">
                                    <span class="checkmark"></span>
                                    </label>
                                    <p>email</p>
                                    <label class="check">
                                    <input type="checkbox" onclick="onlyOne(this);" name="consultation_mode" value="call" id="call">
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
                                       <input type="date" class="input" required="" id="date1" onblur="dateChecker(this);">
                                    </div>
                                    <label>start time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input" required="" id="startone">
                                    </div>
                                    <label for="Tooltips" class="error" id="idone"></label>
                                    <label>end time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input" required="" id="one" onblur="timeChecker(this);">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="subtitle">SLOT 2</div>
                                    <label for="Tooltips" class="error" id="iddate2"></label>
                                    <label>select date</label>
                                    <div class="inputfield">
                                       <input type="date" class="input" required="" id="date2" onblur="dateChecker(this);">
                                    </div>
                                    <label>start time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input" required="" id="starttwo">
                                    </div>
                                    <label for="Tooltips" class="error" id="idtwo"></label>
                                    <label>end time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input" required="" id="two" onblur="timeChecker(this);">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="subtitle">SLOT 3</div>
                                    <label for="Tooltips" class="error" id="iddate3"></label>
                                    <label>select date</label>
                                    <div class="inputfield">
                                       <input type="date" class="input" required="" id="date3" onblur="dateChecker(this);">
                                    </div>
                                    <label>start time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input" required="" id="startthree">
                                    </div>
                                    <label for="Tooltips" class="error" id="idthree"></label>
                                    <label>end time</label>
                                    <div class="inputfield">
                                       <input type="time" class="input" required="" id="three" onblur="timeChecker(this);">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <br>
                           <!-- <div class="row">
                              <div class="col-sm-3 col-lg-4"></div>
                              <div class="col-sm-6 col-lg-4" style="text-align: center;">
                                 <div class="inputfield terms appointment">
                                    <label class="check">
                                    <input type="checkbox" onclick="finalValidation();" id="finalValidate">
                                    <span class="checkmark"></span>
                                    </label>
                                    <p>I confirm the above details</p>
                                 </div>
                              </div>
                              <div class="col-sm-3 col-lg-4"></div>
                              </div> -->
                           <div class="row">
                              <div class="col-sm-4 col-lg-5"></div>
                              <div class="col-sm-4 col-lg-2">
                                 <div class="inputfield">
                                    <input type="button" value="SAVE" class="btn" onclick="finalValidation();">
                                 </div>
                              </div>
                              <div class="col-sm-4 col-lg-5"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!--end modal for client request accept --->
      <!-- modal for request decline confirmation --->
      <div class="modal fade" id="declineRequest" role="dialog">
         <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-body" style="text-align: center;">
                  <p style="color: #38489E; font-size: 18px; font-weight: bold;">Are you sure you want to decline the client request?</p>
                  <button class="btn" style="background-color: #F3834B;">CONFIRM</button>
               </div>
            </div>
         </div>
      </div>
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
                              <input type="checkbox" checked="">
                              <span class="checkmark"></span>
                              </label>
                              <p>Got busy with something else</p>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                              <input type="checkbox">
                              <span class="checkmark"></span>
                              </label>
                              <p>Clashing with another consultation</p>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                              <input type="checkbox">
                              <span class="checkmark"></span>
                              </label>
                              <p>Personal constraint</p>
                           </div>
                           <div class="inputfield terms">
                              <label class="check">
                              <input type="checkbox">
                              <span class="checkmark"></span>
                              </label>
                              <p>Not listed</p>
                           </div>
                           <div class="row">
                              <div class="col-sm-4"></div>
                              <div class="col-sm-4">
                                 <div class="inputfield">
                                    <input type="submit" value="Submit" class="btn">
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
      <!--end modal for cancel consultation --->
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
      <script src="js/jquery-2.2.4.min.js"></script>
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