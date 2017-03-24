<?php
session_start();
if(!isset($_SESSION['google_data'])):header("Location:index.php");endif;
$m=$_SESSION['google_data']['email'];
$_SESSION['email']=$m;
include'connect.php';
$conn=new Database();
$re=$conn->import_data($m);
       foreach($re as $r){
                $f=$r['fname'];
		$l=$r['lname'];
   }
$_SESSION['fname']=$f;
$_SESSION['lname']=$l;
?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/font-awesome-animation.min.css">
<!-- upload file css -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/file_uploadstyle.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min_fu.js"></script>
<script type="text/javascript" src=""></script>
<link rel="stylesheet" type="text/css" href="">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Dashboard</title>

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

    <style type="text/css">
        .myfont{
            font-family: Comic Sans MS, cursive, sans-serif;
            font-weight: 800;
        }
        .navbar-btn a:hover{
        color:white;
        test-decoration:none;
        }   
.fa-pulse {
	display: inline-block;
	-moz-animation: pulse 2s infinite linear;
	-o-animation: pulse 2s infinite linear;
	-webkit-animation: pulse 2s infinite linear;
	animation: pulse 2s infinite linear;
}

@-webkit-keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
}
@-moz-keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
}
@-o-keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
}
@-ms-keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
}
@keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
} 
.fa-bounce {
    display: inline-block;
    position: relative;
    -moz-animation: bounce 1s infinite linear;
    -o-animation: bounce 1s infinite linear;
    -webkit-animation: bounce 1s infinite linear;
    animation: bounce 1s infinite linear;
}

@-webkit-keyframes bounce {
    0% { top: 0; }
    50% { top: -0.2em; }
    70% { top: -0.3em; }
    100% { top: 0; }
}
@-moz-keyframes bounce {
    0% { top: 0; }
    50% { top: -0.2em; }
    70% { top: -0.3em; }
    100% { top: 0; }
}
@-o-keyframes bounce {
    0% { top: 0; }
    50% { top: -0.2em; }
    70% { top: -0.3em; }
    100% { top: 0; }
}
@-ms-keyframes bounce {
    0% { top: 0; }
    50% { top: -0.2em; }
    70% { top: -0.3em; }
    100% { top: 0; }
}
@keyframes bounce {
    0% { top: 0; }
    50% { top: -0.2em; }
    70% { top: -0.3em; }
    100% { top: 0; }
}

   </style>
</head>

<body>

    <div id="wrapper">
       
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Home</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
			
			<ul class="nav navbar-nav">
            <li>
              <a href="uploded_check.php" style="color:#999;text-decoration:none;font-size:18px;color:white"><b><i class="fa fa-repeat fa-check-square fa-bounce fa-lg"> </i>&nbsp; Check Status </b></a>
           </li>
<li>
<a href="resubmit_report.php" style="color:#999;text-decoration:none;font-size:18px;color:white"><b><i class="fa fa-repeat fa-spin fa-lg"> </i>&nbsp; Resubmit Report</b></a>
</li>
<li>
<a href="view_c.php" style="color:#999;text-decoration:none;font-size:18px;color:white"><b><i class="fa fa-eye fa-pulse fa-lg"> </i>&nbsp; Reviewed Report</b></a>
</li>

			</ul>
                        <li>
                            <a href="logout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
            </ul>
			
        </div>	
<center>		
<h56><h1 style="padding: 10px 30px 0px 30px;" class="myfont"><i class="fa fa-upload fa-lg"></i> &nbsp;PLEASE UPLOAD YOUR FILE</h1>


</h56>

<div class="upload" style="padding:0px !important;border-radius: 5px !important;">
			<div   style="padding: 5px 30px 30px 30px;color: white;font-weight: 700; ">
                <span class="myfont"> <i class="fa fa-file-text fa-2x" style="padding-top: 10px"></i> Select File</span>         
            </div>
		<div class="login-form">
			<form method="post" action="upload1.php" enctype="multipart/form-data">
				<div>
					<span>Title</span>
						<input class="myfont" style="border-radius: 3px;font-size: 18px;" type="text" name="title" class="title" placeholder="Eg: Title of file"  />
				</div>
				<div>
					<span>Description</span>
						<input style="border-radius: 3px;font-size: 18px;" type="text" name="describe" class="describe" placeholder="Eg: Description of the file" />
				</div>
				<div class="select">
				<span style="padding-bottom: 20px;padding-top: 20px;">Select Guide</span>
				<select style="background: #f5f5f5;height: 40px;width: 240px;font-size: 16px;padding-left: 20px;border-radius: 5px;" name="guide">
				     <option value="">Select Guide here ... </option>
                                      <?php
                                       $conn=new Student();
					 $re=$conn->selectguide('guide');
					 foreach ($re as $r)
					 {
						 ?>
						 <option><?php echo $r['guide_name'];?></option>
						 <?php
					 }
					 ?>
                </select>
  
				</div>
			

			<div id="upload" >
				<div id="drop">
				
				<input type="file" name="file" />
				<a class="btn btn-default btn-lg" style="width: 240px !important;text-align:center;">Browse</a>
			</div>

				<input class="btn btn-danger" type="submit" method="post"  name="submit" >
				<ul>
				<!-- The file uploads will be shown here -->
				</ul>

			</div>
			</form>
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
	
</div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</center>
</body>

</html>