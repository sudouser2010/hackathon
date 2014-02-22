<?php

$mydb = connectToDb();

$sql= "SELECT * FROM violations";
	
	$result = mysql_query($sql);
	
	while ($data= mysql_fetch_assoc($result)){
		$complaints[] = array(
			"complaintID" => $data["complaintID"],
			"user_firstname" => $data["user_firstname"],
			"user_email" => $data["user_email"],
			"user_phone" => $data["user_phone"],
			"violation_type" => $data["violation_type"],
			"latitude" => $data["latitude"],
			"longitude" => $data["longitude"],
			"description" => $data["description"],
			"photo_count" => $data["photo_count"],
			"user_lastname" => $data["user_lastname"],
			"location" => $data["location"],
			"status" => $data["status"]);
	}	
	$json = array(
		"complaints" => $complaints);
	echo json_encode($json); 	



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