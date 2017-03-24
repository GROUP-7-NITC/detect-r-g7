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

    <title>Comments</title>

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
    <nav class="navbar  navbar-fixed-top" role="navigation" style="background-color:#06425C">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="view_c.php">Back</a>
            </div>
            
			
			
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
						<h2><center>VIEW COMMENTS</center></h2>
              
			  
						<?php
						    $id=$_GET['id'];
							include'connect.php';
							$conn=new Student();
			            			$re=$conn->viewcomments($id);
                                                        if($re)
                                                        {  
						?>	
									
										<table class="table table-hover">
										<head>
											<tr>
											    <th>Location</th>
												<th>Comments</th>
												<th>Remarks</th>
												<th>Notes</th>
											</tr>
										</head>
									
										<body>
								   <?php
									foreach ($re as $r)
					                                {
						                              echo"<tr><td>".$r['location']."</td><td>".$r['comments']."</td><td>".$r['remarks']."</td><td>".$r['notes']."</td>";
													}
                                         echo "</table>"; 
 }
                                                else
                                                  echo "NO COMMENTS";  	?>			
							</body>
						  
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