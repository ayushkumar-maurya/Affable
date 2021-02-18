<?php
include "connection.php";
	

if(isset($_SESSION['email'])){
	$email=$_SESSION['email'];	

	$name=trim($_POST['name']);
	$email=trim($_POST['email']);
	$phone=trim($_POST['phone']);
	$pincode=trim($_POST['pincode']);
	$postal_addr=trim($_POST['postal_addr']);
	$categoryname=trim($_POST['categoryname']);
	$about_sme=trim($_POST['about_sme']);
	$experience=trim($_POST['experience']);
	$skillset=trim($_POST['skillset']);
	$sme_cert=trim($_POST['sme_cert']);
	$sme_language=trim($_POST['sme_language']);
	$webinars=trim($_POST['webinars']);
	$sme_fees=trim($_POST['sme_fees']);
	$review_rating=trim($_POST['review_rating']); 
	$sme_designation=trim($_POST['sme_designation']);
	$mode_of_cons = $_POST['MOC'] ;
	$chk="";  
    foreach($mode_of_cons as $chk1)  
       {  
          $chk.= $chk1.",";  
       }  
	

	//FOR STORING PATH IMAGE
	
	/* $photo_loc=trim($_POST['photo_loc']);
	$targetPhotoDir = "Data/photo_loc/";
	$photoName = basename($_FILES["photo_loc"]["name"]);
	$targetPhotoPath = $targetPhotoDir . $photoName;
	$PhotoType = pathinfo($targetPhotoPath,PATHINFO_EXTENSION);
	$allowPhotoTypes = array('jpg','png','jpeg');
	if(in_array($PhotoType, $allowPhotoTypes))
		move_uploaded_file($_FILES["photo_loc"]["tmp_name"], $targetPhotoPath); */
	
	
	/* //FOR STORING BLOB IMAGE
	$imageName=$_FILES["photo_loc"]["name"];
	$imageType=$_FILES["photo_loc"]["type"];
	$imageTempLoc=$_FILES["photo_loc"]["tmp_name"];
	$imageSize=$_FILES["photo_loc"]["size"];
	$PhotoType = pathinfo($imageName,PATHINFO_EXTENSION);
	$allowPhotoTypes = array('jpg','png','jpeg','jfif');
	if(in_array($PhotoType, $allowPhotoTypes))
		$image=base64_encode(file_get_contents($imageTempLoc)); */
		
		
		
	$resume_loc= $_FILES['resume_loc'];
	$targetResumeDir = "/sme_resume/";
	$ResumeName = basename($_FILES["resume_loc"]["name"]);
	$targetResumePath = $targetResumeDir . $ResumeName;
	$ResumeType = pathinfo($targetResumePath,PATHINFO_EXTENSION);
	$allowResumeTypes = array('pdf','doc','docx');
	if(in_array($ResumeType, $allowResumeTypes))
		move_uploaded_file($_FILES["resume_loc"]["tmp_name"], $targetResumePath);
	
	
	
	
	$fileinfo = pathinfo($_FILES['photo_loc']['name']);
 
	 //getting the file extension 
	 $extension = $fileinfo['extension'];




if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != ""))
 	{
     echo '<script>
				alert("Unknown Image Format.");
				window.location.replace("sme_dashboard.php");
		</script>';
    }

   else{

    
        $uploadedfile = $_FILES['photo_loc']['tmp_name'];
        $src = imagecreatefromjpeg($uploadedfile);
        list($width,$height)=getimagesize($uploadedfile);
        
        //set new width
        $newwidth1=350;
        $newheight1=($height/$width)*$newwidth1;
        $tmp1=imagecreatetruecolor($newwidth1,$newheight1);
                
        imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

        //new random name        
        $temp = explode(".", $_FILES["photo_loc"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
                
        $filename1 = "images/profile_img/". $newfilename;
                    
        imagejpeg($tmp1,$filename1,100);
        
        imagedestroy($src);
        imagedestroy($tmp1);
        //insert in database
        $sql='UPDATE sme_profile set name="'.$name.'",  phone="'.$phone.'", about_sme="'.$about_sme.'", postal_addr="'.$postal_addr.'", pincode="'.$pincode.'", categoryname="'.$categoryname.'", sme_designation="'.$sme_designation.'", experience="'.$experience.'", skillset="'.$skillset.'", sme_cert="'.$sme_cert.'", sme_language="'.$sme_language.'", webinars="'.$webinars.'", sme_fees="'.$sme_fees.'", mode_of_cons="'.$chk.'", photo_loc="'.$filename1.'", resume_loc="'.$ResumeName.'" WHERE email ="'.$email.'"';              
		$result=mysqli_query($db, $sql) or die(mysqli_error($db));

        echo '<script>
				alert("Your Profile has been updated Successfully! .");
				window.location.replace("sme_dashboard.php");
			</script>';
		
		

	}	


}
else{
	header("Location:index.php");
	exit;
} 


?>