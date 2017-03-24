<!DOCTYPE HTML>
<html>
<head>
<title>Detect -R Online Report Tracking System</title>
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<link href='css/animate.css' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header start here-->
<div class="header">
		<div class="header-main">
		       <h1>Welcome to Detect-R</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
						
					 <form action="index.php" method="post">
						<input type="text"  value="User name" name="name" onfocus="this.value = '';" onblur="if (this.value == '') patten="[A-Za-z0-9]"{this.value = 'User name';}"/>
					<input type="password"  value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
						<div class="remember">
			             <span class="checkbox1">
							   <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Remember me</label>
						 </span>
						 <div class="forgot">
						 	
						 </div>
						<div class="clear"> </div>
					  </div>
					   <div style="text-align: center;">
					   	<button style="width: 300px;" class="btn btn-lg btn-primary" type="submit" value="Login" name="submit"><span class="fa fa-sign-in"></span> &nbsp;&nbsp;Login</button>
					   </div>
						
					</form>	
					<?php
					include'connect.php';
				        $conn=new Database();
					if(isset($_POST['submit']))
					{
							$user_name=$_POST['name'];
							$pass=$_POST['password'];
                                                     session_start();
					                $_SESSION['username']=$user_name ;
                                                       
							$re=$conn->authenticate_user($user_name,$pass,'guide');
                                                        $re1=$conn->authenticate_user($user_name,$pass,'hod');
                            if($re)
                            {                    
						
                                 foreach($re as $r)
                                {								
									?>
										<script>
										alert('login successful');
										window.location.href="faculty_dashboard.php?user=<?php echo $_SESSION['username'];?>";
										</script>
									
									<?php
								
								}	
							}	
                                       elseif($re1)
                            {
                                                  
                                 foreach($re1 as $r)
                                {								
									?>
										<script>
										alert('login successful');
										window.location.href="hod_dashboard.php?user=<?php echo $_SESSION['username'];?>";
										</script>
									
									<?php	
							
							     }
								
								}							
							   else
									echo"<script> alert('incorrect username and password');</script>";
					}
					
					?>
					<div class="header-left-top">
						<div class="sign-up"> <h2>or</h2> </div>
					
					</div>
					<div class="header-social wthree">
							<?php
								//error_reporting(E_ALL);
								include_once("glogin/config.php");
								include_once("glogin/includes/functions.php");

								if(isset($_REQUEST['code'])){
									$gClient->authenticate();
									$_SESSION['token'] = $gClient->getAccessToken();
									header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
								}

								if (isset($_SESSION['token'])) {
									$gClient->setAccessToken($_SESSION['token']);
								}

								if ($gClient->getAccessToken()) {
									echo "<script>alert('i got access token ');</script>";
									$userProfile = $google_oauthV2->userinfo->get();
									//DB Insert
									$gUser = new Users();
									$gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
									$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
										header("location: glogin/account.php");
									$_SESSION['token'] = $gClient->getAccessToken();
								} else {
									$authUrl = $gClient->createAuthUrl();
								}

								if(isset($authUrl)) {
									echo '<a class="btn btn-danger btn-lg" href="'.$authUrl.'"><span class="fa fa-google"></span> &nbsp;&nbsp; Google login</a>';
								} else {
									echo '<a href="logout.php?logout">Logout</a>';
								}

								?>
					
						</div>
						
				</div>
				</div>
			  
			</div>
		</div>
</div>
<!--header end here-->
<div class="copyright">
	<p>© 2017 </p>
</div>
<!--footer end here-->
</body>
</html>