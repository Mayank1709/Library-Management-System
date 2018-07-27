<?php
						    session_start();
							$ID=$_SESSION['var'];
							$connection = mysqli_connect('localhost', 'root', '','book'); //The Blank string is the password
                            
							$bookid=$_POST['BookID'];
							$status='No';
							$query = "SELECT * FROM detail where BookID='$bookid' and Issue='$status' "; //You don't need a ; like you do in SQL
							$result = mysqli_query($connection,$query);
							$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

							$count=mysqli_num_rows($result);
							
							if($count===1)
							{
								$query1 = "UPDATE detail SET Issue='Yes' where BookID='$bookid'";
								$result1= mysqli_query($connection,$query1);
								
								$today = date('Y-m-d');
								$NewDate=date('Y-m-d', strtotime("+7 days"));
                                $query2= "INSERT into issue(BookID, CustID, IssueDate, DueDate) values('$bookid','$ID','$today', '$NewDate')";
								$result2=mysqli_query($connection,$query2);
								
							}
						    else
								echo "No issue.";
							$query3 = "SELECT * FROM issue WHERE CustID='$ID'"; //You don't need a ; like you do in SQL
								$result3 = mysqli_query($connection,$query3);
								echo "<div>";
								echo "<table>"; // start a table tag in the HTML
								echo "<tr><th>Book ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th></th><th>Issue Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th></th><th>Due Date</th></tr>";
								while($row = mysqli_fetch_array($result3)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['BookID'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". "</td><td></td><td>" . $row['IssueDate'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".  "</td><td></td><td>" . $row['DueDate']."</td></tr>";  //$row['index'] the index here is a field name
						        }
								echo "</table>"; //Close the table in HTML
							    echo "</div>";
								
						    mysqli_close($connection);
							
						?>