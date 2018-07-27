
<?php
session_start();
include('login.html');
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="member";

$conn= new mysqli($servername, $dbusername, $dbpassword, $dbname);
$ID=$_POST['ID'];
$Password=$_POST['Password'];
$errors=array();
if(empty($ID) === TRUE || empty($Password) === TRUE)
{	$errors[]='Enter username and password';

}

$_SESSION['var']= $ID;

$sql = "SELECT ID FROM user WHERE ID = '$ID' and Password = '$Password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
		
        header('Location:dashboard.php');
	  
      }
	  else {
         $error = "Your Login Name or Password is invalid";
		 echo $error;
      }
   
?>
