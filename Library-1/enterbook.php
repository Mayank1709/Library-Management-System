<html>
<body bgcolor="87ceeb">
<center><h2>Insert book in Cental Library</h2></center>
<!--Once the form is submitted the details are forwared to InsertBooks.php -->
<form action="InsertBooks.php" method="post">
<table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<td> Enter Name :</td>
<td> <input type="text" name="name" size="48"> </td>
</tr>
<tr>
<td> Enter Price :</td>
<td> <input type="text" name="price" size="48"> </td>
</tr>
<tr>
<td> Enter Issue :</td>
<td> <input type="text" name="issue" size="48"> </td>
</tr>

<td></td>
<td>
<input type="submit" value="submit">
<input type="reset" value="Reset">
</td>
</tr>
</table>
</form>
</body>
</html>