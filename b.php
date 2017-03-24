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
body
{
background-image:url((../images/emailicon.png)no-repeat;
color: #fff;    
background-color: #324851;
}
p12{
padding-left:10%;
}
g
{
padding-left:10%;
}
textarea
{
    color: #000; background-color: #D3D3D3; float: left; margin-left: 10%; width: 80%;  margin-bottom: 10%;
}

</style>
</head>
<body >

<p2><b><center>GIVE YOUR COMMENTS</center></b></p2>  <a href="faculty_dashboard.php?user=<?php echo $user;?>" target="_top">BACK</a>


<div class="pad" >
     <table>
    <form action=b.php?id=<?php echo $id;?> method="POST">
     
    <tr><td><p12>Page & Line :</p12><g><textarea name="Message1" rows="5" placeholder="Page $ Line" required="*required" ></textarea></g>
     </td></tr>
    <tr><td><div class="comments">
    <p12>Comments :</p12><br><g><textarea name="Message2" rows="5" placeholder="Comments" required="*required" ></textarea></g> </div>
     </td></tr>
     <tr><td>
     <div class="Notes">
    <p12>Notes :</p12><br><g><textarea name="Message3" rows="5" placeholder="Notes" required="*required" ></textarea></g>   </div>
    </td></tr>
    <tr><td>
     <input type ="submit"  value="SUBMIT" name="submit" style="color: #000; bold; ">
  </td><td>  
 </form>
<form action=b.php?id=<?php echo $id;?> method="POST">
<input type ="submit"  value="FORWARD" name="submit1" style="color: #000; bold; margin-left: 30px">
   </form>
   </td></tr>
   </table>
    
     </div>
</body>
</html>
<?php
    include'connect.php';
    $conn2=new comments();
    $conn1=new report();
    $conn=new Database();
    $id=$_GET['id'];
  if(isset($_POST['submit']))
  {
      $page=$_POST['Message1'];
      $comm=$_POST['Message2'];
      $note=$_POST['Message3'];
          $conn2->make_comments($id,$page,$comm,$note);
     // $sql="insert into comment(tracking_id,location,comments,notes)values('$id','$page','$comm','$note')";
      //if($conn->insert($sql))
      //{ 
                   $demo=date("Y/m/d");
           $sql1="update  report set  date_of_review='$demo' where tracking_id='$id'";
           if($conn->insert($sql1))
           {
                          $status='Reviewed';
                          $conn1->change_status($status,$id);
                  //$sql2="update submit_report set status='Reviewed' where tracking_id='$id'";
                 // if($conn->insert($sql2))
                    //{
                           ?>
        <script>
        alert('sent to student');
        //window.location.href='b.php?success';
        </script>
        <?php
         }
        // }
      //}
      else
      {
          ?>
        <script>
        alert('Error while sending');
      //window.location.href='b.php?fail';
        </script>
        <?php
      }
          
      
      
  }
  if(isset($_POST['submit1']))
      
  {
      $demo=date("Y/m/d");
         $sql2="update  report set  date_of_review='$demo' where tracking_id='$id'";
             $sql1="update submit_report set  status='forwarded' where tracking_id='$id'";
             $sql13="select comments from comment where tracking_id='$id'";
              $out=$conn->insert($sql13);
               if($out->num_rows>0)
                 {//statment;
                 }
                else{

                $sql12="insert into comment(tracking_id)values('$id')";
                  if($conn->insert($sql12)) {}

                 }
         if($conn->insert($sql1))
         {
          ?>
        <script>
        alert('Forwarded to HOD');
    <?php
    $email="sakshirohilla22@gmail.com";
     $title="";
      $message="Hii Sir,>You have one Report to View";
      mail($email, $title, $message);
   ?>
        //window.location.href='b.php?success';
        </script>
        <?php
         }
  }