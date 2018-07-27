<html>
<body bgcolor="87ceeb">
<center><h2>Central Library</h2></center>
<br>
<?php
include("DBConnection.php");
$search = $_REQUEST["search"];
$query = "select BookID,Name,Price,Issue from detail where Name like '%$search%'"; //search with a book name in the table book_info
$result = mysqli_query($db,$query);
if(mysqli_num_rows($result)>0)if(mysqli_num_rows($result)>0)
{
?>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<th> BookID </th>
<th> Name </th>
<th> Price </th>
<th> Issue </th>

</tr>
<?php while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $row["BookID"];?> </td>
<td><?php echo $row["Name"];?> </td>
<td><?php echo $row["Price"];?> </td>
<td><?php echo $row["Issue"];?> </td>
</tr>
<?php
}
}
else
echo "<center>No books found in the library by the name $search </center>" ;
?>
</table>
<a href="login.html"> To issue book login here </a>
</body>
</html>