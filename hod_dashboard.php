<?php
session_start();
if(!$_SESSION['username']){
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- upload file css -->

<!-- Custom Theme files -->
<link href="css/file_uploadstyle.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min_fu.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HOD Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
       
        <!-- Navigation -->
    <nav class="navbar  navbar-fixed-top" role="navigation" style="background-color: #06425C">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                        <li>
                           <a href="log_out.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
            </ul>
			
			
    </div>
		
			
	<!-- JavaScript Includes -->
		<script src="js/jquery.knob_fu.js"></script>
	<!-- JavaScript Includes -->

	<!-- jQuery File Upload Dependencies -->
		<script src="js/jquery.ui.widget_fu.js"></script>
		<script src="js/jquery.iframe-transport_fu.js"></script>
		<script src="js/jquery.fileupload_fu.js"></script>
	<!-- jQuery File Upload Dependencies -->
		
	<!-- Main JavaScript file -->
		<script src="js/script_fu.js"></script>
	<!-- Main JavaScript file -->
	
 
  
					<div class="container">
						<h1><center><?php echo $_GET['user'];?></center></h1>
						<h2>Welcome to HOD dashboard</h2>
              
			  
						<?php
							include'connect.php';
							$conn=new Database();
								$user=$_GET['user'];
								//$tid=$_GET['tracking_id'];
								$sql="SELECT distinct r.tracking_id,r.file_name,s.guide_name,r.r_name,r.date_of_review,c.comments,c.location,c.notes from report r,comment c,submit_report s 
								WHERE s.tracking_id=r.tracking_id AND s.tracking_id=c.tracking_id AND s.status='forwarded'";
						         $result=$conn->insert($sql); 
							if($result->num_rows>0)
							{	 
									 ?>	
									
										<table class="table table-hover">
										<head>
											<tr>
											     <th>T_Id</th>
												<th>File_name</th>
												<th>Guide Name</th>
												<th>Report_name</th>
												<th>Date_of_review</th>
												<th>Comments</th>
												<th>Location</th>
												 <th>Notes</th>
												 <th>View Files</th>
											</tr>
										</head>
									
										<body>
								   <?php
                      	      while($rows=$result->fetch_assoc())
								{             
							                 
											echo"<tr>
											<td>".$rows['tracking_id']."</td>
											 <td>".$rows['file_name']."</td>
											<td>".$rows['guide_name']."</td>
											<td>".$rows['r_name']."</td>
											<td>".$rows['date_of_review']."</td>
											<td>".$rows['comments']."</td>
											<td>".$rows['location']."</td>
											<td>".$rows['notes']."</td>"
											?>
											<td><a href="hod_fileview.php?id=<?php echo $rows['tracking_id'];?>">view file</a></td>
											</tr>
											<?php
                                }
							}
							?>
							</body>
						</table>
						  
					</div>




    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>