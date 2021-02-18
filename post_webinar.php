<?php
	include "connection.php";
	
if(isset($_SESSION['email'])){
	$errorMsg = "";
	
	$email=$_SESSION['email'];	
	$webinar_topic=$_POST['webinar_topic'];
	$webinar_desc=$_POST['webinar_desc']; 
	$who_attend= $_POST['who_attend']; 
	$key_takeaways=$_POST['key_takeaways'];
	$webinar_fees=$_POST['webinar_fees']; 
	$webinar_venue=$_POST['webinar_venue'];
	$webinar_date=$_POST['date']; 
	$webinar_from_time=$_POST['startone1']; 
	$webinar_to_time=$_POST['one1'];
	

/* 	//FOR STORING PATH IMAGE

	$course_image=trim($_POST['course_image']);
	$targetPhotoDir = "Data/course_image/";
	$photoName = basename($_FILES["course_image"]["name"]);
	$targetPhotoPath = $targetPhotoDir . $photoName;
	$PhotoType = pathinfo($targetPhotoPath,PATHINFO_EXTENSION);
	$allowPhotoTypes = array('jpg','png','jpeg');
	if(in_array($PhotoType, $allowPhotoTypes))
		move_uploaded_file($_FILES["course_image"]["tmp_name"], $targetPhotoPath);   */
	
	
	

	
	$fileinfo = pathinfo($_FILES['course_image']['name']);
 
	 //getting the file extension 
	 $extension = $fileinfo['extension'];




if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
 	{
     echo '<script>
				alert("Unknown Image Format.");
				window.location.replace("sme_dashboard.php");
		</script>';
    }

   else{

    
        $uploadedfile = $_FILES['course_image']['tmp_name'];
        $src = imagecreatefromjpeg($uploadedfile);
        list($width,$height)=getimagesize($uploadedfile);
        
        //set new width
        $newwidth1=350;
        $newheight1=($height/$width)*$newwidth1;
        $tmp1=imagecreatetruecolor($newwidth1,$newheight1);
                
        imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

        //new random name        
        $temp = explode(".", $_FILES["course_image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
                
        $filename1 = "images/course_img/". $newfilename;
                    
        imagejpeg($tmp1,$filename1,100);
        
        imagedestroy($src);
        imagedestroy($tmp1);
        //insert in database
        $sql="INSERT INTO sme_webinar(webinar_topic, webinar_venue, course_image, webinar_desc, who_attend, key_takeaways, webinar_fees, webinar_date, webinar_from_time, webinar_to_time, sme_email) VALUES('$webinar_topic', '$webinar_venue', '$filename1', '$webinar_desc', '$who_attend', '$key_takeaways', '$webinar_fees', '$webinar_date', '$webinar_from_time', '$webinar_to_time', '$email')";              
		$result=mysqli_query($db, $sql) or die(mysqli_error($db));

        echo '<script>
				alert("Your Webinar has been Posted Successfully! .");
				window.location.replace("sme_dashboard.php");
			</script>';
		
		

	}	

}

else{
	header("Location:index.php");
	exit;
} 
	
?>
