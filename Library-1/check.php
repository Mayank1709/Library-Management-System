
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">User Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="dashboard.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
					
                    <li><a href="signup.html"><i class="fa fa-list-ol"></i> Newsletter SignUp</a></li>
                    <li><a href="register1.html" class="fa fa-list-ol"></i> Settings</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    
                    <li class="dropdown user-dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" name="Name"></i> <b class="caret"></b></a>
                       <ul class="dropdown-menu">
                           <li><a href="dashboard.php"><i class="fa fa-user"></i> Profile</a></li>
                           <li><a href="register1.html"><i class="fa fa-gear"></i> Settings</a></li>
                           <li class="divider"></li>
                           <li><a href="new.html"><i class="fa fa-power-off"></i> Log Out</a></li>
                       </ul>
                   </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>RETURN AND FINE <small></small></h1>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Issued Books.</h3>
                        </div>
						
						<?php
						    session_start();
							$ID=$_SESSION['var'];
							$connection = mysqli_connect('localhost', 'root', '','book'); //The Blank string is the password
                           
						    
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
                        
                    </div>
                </div>
                
            </div>
			
			    <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Return Panel</h3>
                        </div>
							<?php
							
							$connection = mysqli_connect('localhost', 'root', '','book'); //The Blank string is the password
                            
							$bookid=$_POST['BookID'];
							$query = "SELECT * FROM issue where BookID='$bookid'"; //You don't need a ; like you do in SQL
							$result = $connection->query($query);
							$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                            $count = mysqli_num_rows($result);
							
							if($count===1)
							{
								$query1 = "UPDATE detail SET Issue='No' where BookID='$bookid'";
								$result1= $connection->query($query1);
								$query3 = "SELECT DueDate FROM issue where BookID='$bookid'";
								$result3 = $connection->query($query3);
								while($row = $result3->fetch_assoc()) {
									$ans1=$row["DueDate"];
								}
								$query4 = "DELETE from issue WHERE BookID='$bookid'";
								$result4 = $connection->query($query4);
								$today = date('Y-m-d');
								$query2 = "INSERT into issuefine(BookID, DueDate, ReturnDate) values('$bookid','$ans1','$today')";
								$result2= mysqli_query($connection,$query2);
								
                                $finish = strtotime("$today"); // or your date as well
                                $start = strtotime("$ans1");
                                $datediff = $finish - $start;
								if($datediff>0)
								{
									
							    $days = floor($datediff / (60 * 60 * 24));			
                                echo "Fine is:" . $days * 10;
								}
								else
									echo "Return Complete. No fine.";
								
							}
							
							else
								echo "No issue.";
							
							mysqli_close($connection);
							?>
								
                        
                    </div>
                </div>


				
                
            </div>
        </div>
    </div>

</body>
</html>
