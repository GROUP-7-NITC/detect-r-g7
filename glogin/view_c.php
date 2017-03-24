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

    <title>Reviewed Reports</title>

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
                <a class="navbar-brand" href="account.php">Home</a>
            </div>
            <!-- Top Menu Items -->
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
            <h2><center>LIST OF REVIEWED REPORTS</center></h2>
              
        
            <?php
              include'connect.php';
              $conn=new Student();
                        $re=$conn->list_of_reviewed_reports($m);
                           if($re)
                          { 
            ?>  
                  
                    <table class="table table-hover">
                    <head>
                      <tr>
                          <th>Tracking ID</th><th>Report_name</th>
                        <th>File_name</th>
                        <th>View comments</th>
                      </tr>
                    </head>
                  
                    <body>
                   <?php
                  foreach ($re as $r)
                                          {
                                          echo"<tr><td>".$r['tracking_id']."</td><td>".$r['r_name']."</td><td>".$r['file_name']."</td>";
                            ?>
                                            <td><a href="v.php?id=<?php echo $r['tracking_id'];?>">comments</a></td></tr>
                      <?php
                  }
                  ?>                  
              </body>
            </table>
<?php
}
else
echo"<h4>No record found</h4>";
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