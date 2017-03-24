<?php
session_start();
//if(!isset($_SESSION['google_data'])):header("Location:index.php");endif;
$m=$_SESSION['email'];
//$_SESSION['email']=$m;
$first=$_SESSION['fname'];
$last=$_SESSION['lname'];
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

    <title>Student uploaded reports Dashboard</title>

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
        <nav class="navbar  navbar-fixed-top" role="navigation" style="background-color: #00ffbf">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="account.php" style="color: #000">Home</a>
            </div>
            
		</nav>	
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
	
 
  
					<div class="container" >
						<h1><center><?php echo $first;?>&nbsp
                             						<?php echo $last;?></center></h1>
						<h2><center>LIST OF UPLOADED FILES</center></h2>
              
			  
						<?php
							include'connect.php';
							$conn=new Student();
                                                        $re=$conn->list_of_reviewed_reports($m);
								//$sql="SELECT //r.r_name,r.file_size,r.file_type,r.file_name,s.date_of_upload,s.tracking_id,s.status,s.guide_name from report as //r,submit_report as s
								//WHERE r.tracking_id=s.tracking_id AND //s.student_email='$m' ";
								//$result=$conn->insert($sql); 		
								 //if($result->num_rows>0)
							        //{
                                                                if($re)
                                                                  {
                                                                ?>
                                        <table class="table table-hover">
											<tr>
											    <th>Report_name</th>
												<th>File_size</th>
												<th>File_type</th>
												<th>File_name</th>
											    <th>Date_of_upload</th>
												<th>Tracking ID</th>
												<th>Status</th>
												<th>Faculty</th>
												
											</tr>
                                                                       <?php
                                                                         foreach($re as $r)
                                                                         {
                      	             //while($row=$result->fetch_assoc())
								  
											echo"<tr><td>".$r['r_name']."</td>
											<td>".$r['file_size']."</td>
											<td>".$r['file_type']."</td>
											<td>".$r['file_name']."</td>
											<td>".$r['date_of_upload']."</td>
											<td>".$r['tracking_id']."</td><td>".$r['status']."</td><td>".$r['guide_name']."</td></tr>";
											
                                     }
                                       ?>
</table>
<?php
							     }
								 else{
								
								echo "<h4>No Record Found</h4>";
							    }
							?>
						
						  
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