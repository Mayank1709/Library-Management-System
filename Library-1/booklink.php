
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
					<li class="active"><a href="#"><i class="fa fa-bullseye"></i> Issue Status</a></li>
					<li><a href="return.php"><i class="fa fa-list-ol"></i>Return and Fine</a></li>
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
                    <h1>ISSUE STATUS <small></small></h1>
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
							$UserID=$_SESSION['var'];
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
								$NewDate=date('Y-m-d', strtotime("+2 days"));
                                $query2= "INSERT into issue(BookID, CustID, IssueDate, DueDate) values('$bookid','$ID','$today', '$NewDate')";
								$result2=mysqli_query($connection,$query2);
								
							}
						    else
								echo "No issue.";
							$query3 = "SELECT * FROM issue WHERE CustID='$UserID'"; //You don't need a ; like you do in SQL
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


            
<!--
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Requested Books Availabe.</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-chart3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Requested Books Availabe.</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-chart3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  -->
</body>
</html>
