<?php 
class Database{        //class database contains basic functionalities
    
    protected $db_name = 'id1104853_pankaj';
    protected $db_user = 'id1104853_roy';
    protected $db_pass = '12071994';
    protected $db_host = 'localhost';
    public $link;
    
    // Open a connect to the database.
    // Make sure this is called on every page that needs to use the database.
    public function __construct()          //base class function to connect 
    {
        $this->connect();
    }
    public function connect() {                                    //connection function for database connection
    
        $this->link = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name ); 
    }
    public function insert($query)                                //insert function for inserting query
    {
        return $this->link->query($query);
    }
    public function authenticate_user($user_name,$pass,$tbl_name)     //function to authenticate user 
    {
        $array=array();
        $sql="select * from ".$tbl_name." where username='$user_name' and password='$pass'";
        $result=mysqli_query($this->link,$sql);
        while($row=$result->fetch_assoc())
        {
            $array[]=$row;
        }
        return $array;
    }
       public function import_data($m)     //function to import email from user table (from google authentication)
       {
       $array=array();
       $sql="SELECT fname,lname FROM users WHERE email='$m' ";
       $result=mysqli_query($this->link,$sql);
        while($row=$result->fetch_assoc())
        {
            $array[]=$row;
        }
        return $array;
      }
      public function notification($email,$title,$message)    //function to send email to respective user********** made by diwakar
      {
       /* If e-mail is not valid show error message */
       /* Let's prepare the message for the e-mail */
      /* Send the message using mail() function */
      mail($email, $title, $message);
      } 
}                                                                   //<-------------
class Report extends Database{                   //class report
    public function __construct(){
      parent::__construct();
    }     
    
    public function generate_id($title,$describe,$file)     //to generate unique id for report
    {
        $sql="select tracking_id from report where r_name='$title' and category='$describe' and file_name='$file' ";
         $result=mysqli_query($this->link,$sql);
         
        while($row=$result->fetch_assoc())
        {
            $id=$row['tracking_id'];
            //$id=$row;
           //echo"$id";
        }
        return $id;
    }
   public function change_status($status,$id){        //function to change status of report 
   $sql="update submit_report set status=".$status." where tracking_id='$id'";
  $result=mysqli_query($this->link,$sql);
}
    
        
}
class Comments extends Database{      //class comments
 public function __construct(){
      parent::__construct();
    }   
  public function make_comments($id,$page,$comm,$note){    //function to make comments to user
     $sql="insert into comment(tracking_id,location,comments,notes)values('$id','$page','$comm','$note')";
     $result=mysqli_query($this->link,$sql);
  }
}
class Student extends Database{       //class student 
    public function __construct(){
      parent::__construct();
    }     
    public function selectguide($tbl_name)    //function to select guide
    {
        $array= array();
        $sql="select guide_name from ".$tbl_name." ";
        $result = mysqli_query($this->link,$sql);
        
        while($row = $result->fetch_assoc())
        {
            $array[]=$row;
        }
        return $array; 
    }
    public function upload($title,$describe,$new_size,$file_type,$file)   //function to upload file
    {
        $sql="insert into report(r_name,category,file_size,file_type,file_name)
        values('$title','$describe','$new_size','$file_type','$file')";
        $result = mysqli_query($this->link,$sql);
    }
    public function submit($demo,$m,$re1,$status,$guide)      //function to submit file
    {
        $sql="insert into submit_report(date_of_upload,student_email,tracking_id,status,guide_name)
        values('$demo','$m','$re1','$status','$guide')";
        $result = mysqli_query($this->link,$sql);
    }
        public function list_of_reviewed_reports($m)
        {
                $array=array();
        $sql="select r.r_name,r.file_size,r.file_type,r.file_name,s.date_of_upload,s.tracking_id,s.status,s.guide_name from report as r,submit_report as s WHERE r.tracking_id=s.tracking_id AND s.student_email='$m' ";
          $result=mysqli_query($this->link,$sql);
        while($row=$result->fetch_assoc())
        {
            $array[]=$row;
        }
        return $array;     
        }
       public function viewcomments($id)
       {
          $array=array();
          $sql="select location,remarks,notes,comments from comment where tracking_id='$id' ";
          $result=mysqli_query($this->link,$sql);
           while($row=$result->fetch_assoc())
        {
            $array[]=$row;
        }
        return $array;     
        }  
       public function edit($title,$describe,$new_size,$file_type,$file,$t_id)
       {
           $sql="update report set r_name='$title',category='$describe',file_size='$new_size',file_type='$file_type',file_name='$file' where tracking_id='$t_id'"; 
       $result=mysqli_query($this->link,$sql);     
        }  
    public function update($demo,$status,$t_id)
    {
      $sql="update submit_report set date_of_upload='$demo',status='$status' where tracking_id='$t_id'";
      $result=mysqli_query($this->link,$sql);
    } 
}
class Reviewer extends Database{      //class reviewer extends class database
    public function __construct(){
      parent::__construct();
    }     
    public function selectreport($var)   //function to select report forwarded to specific reviewer
    {
        $array=array();
        $sql="select r.file_name,r.file_type,r.file_size,r.tracking_id,r.r_name,s.date_of_upload,s.status from report r,submit_report s,guide g 
                                WHERE g.guide_name=s.guide_name AND s.tracking_id=r.tracking_id AND username='$var'";
        //$result=$conn->insert($sql); 
        $result = mysqli_query($this->link,$sql);
        
        while($row = $result->fetch_assoc())
        {
            $array[]=$row;
        }
        return $array; 
        
    }
    public function viewreport($man)    //function to view report
    {
        //$array=array();
        $sql1="SELECT file_name FROM report WHERE tracking_id='$man' ";
        $result= mysqli_query($this->link,$sql1);
        
        while($row=$result->fetch_assoc())
        {
            $f=$row['file_name'];   
        }
        
        
        return $f;
    }
}
?>
