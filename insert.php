<?php
$fname = "user_firstname";
$lname = "user_lastname";
$email = "user_email";
$phone = "user_phone";
$violation_type = "violation_type";
$location = "location";
$latitude = "latitude";
$longitude ="longitude";
$description = "description";


$mydb = connectToDb();
if($_REQUEST) {
	$r_first_name = $_REQUEST[$fname];
	$r_last_name = $_REQUEST[$lname];
	$r_email = $_REQUEST[$email];
	$r_phone = $_REQUEST[$phone];
	$r_violation_type = $_REQUEST[$violation_type];
	$r_location =$_REQUEST[$location];
	$r_latitude = $_REQUEST[$latitude];
	$r_longitude = $_REQUEST[$longitude];
	$r_description = $_REQUEST[$description];
	$r_photo_count = sizeof($_FILES);
	
	//$r_photos move_uploaded_file( $_FILES['photo']['tmp_name'], "/var/www/image.jpg" );
	$rp = array("fname" => $r_first_name,
								"lname" => $r_last_name,
								"email" => $r_email,
								"phone" => $r_phone,
								"violation_type" => $r_violation_type,
								"location" => $r_location,
								"latitude" => $r_latitude,
								"longitude" => $r_longitude,
								"description" =>$r_description,
								"photo_count" => $r_photo_count);
	$complaintId = insertIntoDb($rp);
	
	$imgCount = 1;
	foreach($_FILES as $image)
	{
		move_uploaded_file($image["tmp_name"],
			"images/" . $complaintId."_".$imgCount++.$image["type"]);
	}
	
	$complaintID = array("complaintID" => $complaintId);
	
	json_encode($complaintID);
	
	
	$to = 'daesgu90@gmail.com';
	$sub = 'new complaint';
	$msg = $rp["violation_type"]. "\n".
			$rp["latitude"]. "\n".
			$rp["longitude"]. "\n".
			$rp["photo_count"].
			'Complaint # '.$complaintId . "\n".
			'Location:'. $rp["location"]. "\n".
			'Description:'.$rp["description"].	 "\n".
			'Contact Informaion'.  "\n".
			'Name:'.$rp["fname"]. ' '.$rp["lname"]. "\n".
			'Phone:'.$rp["phone"]. "\n".
			'Email:'.$rp["email"];
			
	$header= 'From: admin@davides.me' ."\r\n" .
				 'X-Mailer: PHP/' . phpversion();
	mail($to,$sub,$msg,$header);
}



function insertIntoDb($rp){
	$sql = "INSERT INTO violations(user_firstname,
									user_lastname,
									user_email,
									user_phone,
									violation_type,
									latitude,
									longitude,
									location,
									description,
									photo_count)
									 VALUES('".$rp["fname"].		"','".
											$rp["lname"].		"','".
											$rp["email"].		"','".
											$rp["phone"].		"','".
											$rp["violation_type"].	"','".
											$rp["latitude"].	"','".
											$rp["longitude"].	"','".
											$rp["location"].	"','".
											$rp["description"].	"','".
											$rp["photo_count"]. "')";
	
	mysql_query($sql) or die(mysql_error()." insert failed");;
	return 	mysql_insert_id();	
}

function connectToDb(){
	$mydb = mysql_connect('localhost','davides_admin','Admin1');
	if (!$mydb) {
		die ("Could not connect to database-->".mysql_error());	
	}
	
	if (!mysql_select_db('davides_codeviolation_db')) {
		die ("Could not select database-->".mysql_error());
	}
	return $mydb;
}

mysql_close($mydb);
exit();
?>