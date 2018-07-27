<html>
<body bgcolor="87ceeb">
<center><h2>Central Library</h2></center>
<br>
<?php
include("DBConnection.php");

$name=$_POST["name"];
$price=$_POST["price"];
$issue=$_POST["issue"];
$query = "insert into detail(Name,Price,Issue) values('$name','$price','$issue')"; //Insert query to add book details into the book_info table
$result = mysqli_query($db,$query);
?>
<h3> Book information is inserted successfully </h3>
<a href="new.html"> Return to homepage </a>
</body>
</html>