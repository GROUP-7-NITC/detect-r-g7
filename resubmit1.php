<?php
session_start();
//if(!isset($_SESSION['google_data'])):header("Location:index.php");endif;
$m=$_SESSION['email'];
$first=$_SESSION['fname'];
$last=$_SESSION['lname'];
include'connect.php';
$conn= new Database();
$conn1=new Student();
if(isset($_POST['submit']))
{ 
      
	$t_id=$_POST['id'];
  $sql12="select status from submit_report where tracking_id='$t_id' ";
   $result=$conn->insert($sql12);
              if($result->num_rows>0)
               {		while($rows=$result->fetch_assoc())
           			   {
           			    $status=$rows['status'];
            			   }
               }
 if($status=='forwarded')
  {
       ?>
		<script>
		alert('Your file has been already forwarded');
        window.location.href='resubmit_report.php?fail';
        </script>
		<?php
  }
elseif($status=='approved')
{
 ?>
		<script>
		alert('Your file has been already approved');
        window.location.href='resubmit_report.php?fail';
        </script>
		<?php
}
  else
  {
	$sql="SELECT comments from comment WHERE tracking_id='$t_id'";
	$results=$conn->insert($sql);	
	if($results->num_rows>0)
	{ 
			$title=$_POST['title'];
			 $describe=$_POST['describe'];
			 ///$guide=$_POST['guide'];
         /*$guide_search="select guide_name from submit_report where tracking_id='$t_id'";
           $result=$conn->insert($guide_search);
              if($result->num_rows>0)
               {		while($rows=$result->fetch_assoc())
           			   {
           			    $guide=$rows['guide_name'];
            			}
               }
           */    

			$file =$_FILES['file']['name'];
		    $file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			$folder="uploads/";
			 
			$new_size = $file_size/1024;  
		
			
			if(move_uploaded_file($file_loc,$folder.$file))
		      {
                       $conn1->edit($title,$describe,$new_size,$file_type,$file,$t_id);
                // $sql="update report set //r_name='$title',category='$describe',file_size='$new_size',file_type='$file_type',file_name='$file' where //tracking_id='$t_id'"; 
                 $demo=date("Y/m/d");
                 $conn1->update($demo,'submitted',$t_id);
                 $sql2="select guide_name from submit_report where tracking_id='$t_id' ";
                $result1 = $conn->insert($sql2);
               while($rows = $result1->fetch_assoc())
               {
                    $guide = $rows['guide_name'];                                        // made by diwakar------->
               }
                 $sql1 = "select email from guide where guide_name ='$guide' ";
               $result1 = $conn->insert($sql1);
               while($rows = $result1->fetch_assoc())
               {
                    $myemail = $rows['email'];
               }
               $message = "Hi guide!You have a new notification.One report has been submitted for review.";
               $conn->notification($myemail,$title,$message);
               //$message="You have a new notification.Your report has been successfully submitted.";
               //$conn->notification($m,$title,$message);


                 //$sql1="update submit_report set date_of_upload='$demo',status='submitted' where tracking_id='$t_id'";
                
                 //$conn->notification('guide',$guide,$title);
                
                //if($conn->insert($sql))
                  // {                                                                                     //<-------------
                   			?>
							<script>
							alert('successfully submited');
     						 window.location.href='resubmit_report.php?success';
        					</script>
							<?php

                   //}


		      }
		      else
		      { ?>
				<script>
				alert('Error while uploading');
        		window.location.href='resubmit_report.php?fail';
        		</script>
				<?php
				}
     
    }

    else
	{
      ?>
		<script>
		alert(' Your file has not been reviewed ');
        window.location.href='resubmit_report.php?fail';
        </script>
		<?php
	}
                   		
	
   }
	
 

}

?>
