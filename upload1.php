<?php
session_start();
//if(!isset($_SESSION['google_data'])):header("Location:index.php");endif;
$m=$_SESSION['email'];
//$first=$_SESSION['fname'];
//$last=$_SESSION['lname'];
?>
<?php
   
 include'connect.php';
$conn=new Report();
$conn1=new Student();
$conn2=new Database();
if(isset($_POST['submit']))
{    
    $title=$_POST['title'];
   $describe=$_POST['describe'];
   $guide=$_POST['guide'];
     
  $file =$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
  $file_size = $_FILES['file']['size'];
  $file_type = $_FILES['file']['type'];
  $folder="uploads/";
   
  // new file size in KB
  $new_size = $file_size/1024;  
  // new file size in KB
  
  // make file name in lower case
  //$new_file_name = strtolower($file);
       //$final_file=str_replace(' ','-',$new_file_name);
   if($new_size<=3072 )
   {
   
   
   if($file_type=='application/pdf')
  {
  
   if(move_uploaded_file($file_loc,$folder.$file))
  {
    $conn1->upload($title,$describe,$new_size,$file_type,$file);
    $status='submitted';
                $demo=date("Y/m/d");
    $re1=$conn->generate_id($title,$describe,$file);
    $conn1->submit($demo,$m,$re1,$status,$guide);
               // $conn->change_status($status,$re1);
               $sql1 = "select email from guide where guide_name ='$guide' ";
               $result1 = $conn2->insert($sql1);
               while($rows = $result1->fetch_assoc())
               {
                    $myemail = $rows['email'];
               }
       
               $message = "Hi guide!You have a new notification.One report has been submitted for review.";
           $conn2->notification($myemail,$title,$message);
       /* If e-mail is not valid show error message */
       /* Let's prepare the message for the e-mail */
       //$message = "Hi $first $last you have found a new notification";
      /* Send the message using mail() function */
     $message = "Your report has been successfully submitted.";
//$title= "hello";
      //$conn2->notification($m,$title,$message);
$conn2->notification($m,$title,$message);
$title= "hello";
      //mail("$myemail", $title, $message);
      ?>
    <script>
    alert('successfully uploaded');
     window.location.href='account.php?success';
        </script>
    <?php
       
  }
  else
  {
    ?>
    <script>
    alert('error while uploading file');
        window.location.href='account.php?fail';
        </script>
    <?php
  }
}
 else
 { ?>
   <script>
    alert('Only pdf file will upload');
        window.location.href='account.php?fail';
        </script>
    <?php
 }

}
  else
  {
      ?>
    <script>
    alert('File size should be less than 3M');
      window.location.href='account.php?fail';
        </script>
    <?php
    }
  
    
      
}
?>
