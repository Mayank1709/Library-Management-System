<?php 
include('register.html');
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="member";

$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Contact=$_POST['Contact'];
$Password=$_POST['Password'];

$conn= new mysqli($servername, $dbusername, $dbpassword, $dbname);

if($conn->connect_error){
	die("Connection failed:" . $conn->connect_error);
}

$sql="INSERT INTO user (Name,Email,Contact,Password) VALUES('$Name','$Email','$Contact','$Password')";

if($conn->query($sql) === TRUE) {
	echo "Thnks!";
}
else {
	"Error:".$sql.$conn->error;
}
$conn->close();
?>

