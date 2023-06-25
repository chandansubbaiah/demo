<?php
$username="$_POST" ['username'];
$email="$_POST" ['email'];
$message="$_POST" ['message'];

if(!empty($username) || (!empty($email) || (!empty($message)) {
	$host="sql7.freesqldatabase.com";
	$dbusername="sql7628404";
	$dbpasssword="di18frMYxZ";
	$dbname="sql7628404";
	
	$conn=new mysqli($host,$dbusername,$dbpasssword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
		} else {
			$SELECT="select email from useremails where email=? limit 1";
			$INSERT="insert into useremail(username,email,message) values(?,?,?)";
			
			
			$stmt=$conn->prepare($SELECT);
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			rnum=$stmt->num rows;
			if($rnum==0){
				$stmt->close();
				$stmt=$con->prepare($INSERT);
				$stmt->bind_param("sss",$username,$email,$message);
				$stmt->execute();
				echo "new record inserted successfully";
			} else {
				echo "email already taken try with a diffrent email";
			}
			$stmt-.close();
			$conn->close();	
		}	
}		
else {
	echo "all fields are  required";
	die();
}
?>