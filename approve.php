<?php
 $id=$_GET['id'];
session_start();
$user=$_SESSION['username'];
?>
<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style>
body{
	background-color:grey;
}

</style>
</head>
<body>

<p2><b><center>GIVE YOUR REMARKS</center></b></p2>


<div class="pad" >
   <form action="approve.php?id=<?php echo $id;?>" method="post">
	<table>
         <center>
	<tr><td><label for="remark">REMARKS :</label></td></tr><a href="hod_dashboard.php?user=<?php echo $user;?>" target="_top">BACK</a>
	<tr><td><textarea class="form-control" rows="5" name="remerks" required="* required"></textarea></td></tr>
        <td>  <br></td>
	<tr><td><input type ="submit" value="Approve" name="submit"></td>
	</center>
	</table>
	</form>
	
	</div>
</body>
</html>
<?php
include'connect.php';
$conn= new Database();
if(isset($_POST['submit']))
{
	$remark=$_POST['remerks'];
	$sql="update comment set remarks='$remark' where tracking_id='$id'";
	$sql1="update submit_report set status='approved' where tracking_id='$id'";
	 if($conn->insert($sql) && $conn->insert($sql1))
	 {
	 	       
                             ?>
				<script>
				alert('successfully Remarked');
                            
     			 //window.location.href='resubmit_report.php?success';
        		</script>
				<?php
                          $sql2="select student_email from submit_report where tracking_id='$id'";
                          $result=$conn->insert($sql2);
                          if($result->num_rows>0)
                                {
                           while($rows=$result->fetch_assoc())
                               {
                                $email=$rows['student_email'];
                                  }
                                   }
     $title="";
      $message="Your report has been approved";
      mail($email, $title, $message);
 
	 }
	 else
	 {
	 	       ?>
				<script>
				alert('Error while Remarking');
     			// window.location.href='resubmit_report.php?success';
        		</script>
				<?php
	 }


}