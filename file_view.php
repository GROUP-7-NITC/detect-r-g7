<?php
      include'connect.php';
		$conn=new Reviewer();
	  $man=$_GET['id'];
	 $files=$conn->viewreport($man);
	//echo $file_name;
       $files = 'glogin/uploads'.'/'.$files;
      //echo $files;
      $filename = $files;
     //echo $filename;
  
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($files);
 
?>