
<?php 
if(!isset($_SESSION))
	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Library System Sign in/up </title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<!--script-->
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
				
</script>	

<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-35751449-15', 'auto');ga('send', 'pageview');</script>
</head>
<body>
	<div class="head">
		<div class="logo">
			<div class="logo-top">
				<h1>Wellcome To our simple Library System  </h1>
				<h1>Please sign in/up</h1>
			</div>
			
		</div>		
		<div class="login">
			<div class="sap_tabs">
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list">
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Login</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><label>/</label><span>Sign up</span></li>
						<div class="clearfix"></div>
					</ul>				  	 
					<div class="resp-tabs-container">
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
							<div class="login-top">
								<form method="post">
									<input type="text" class="email" placeholder="Email" required="" name="emailIn"/>
									<input type="password" class="password" placeholder="Password" required="" name="passwordIn"/>		
								    <div class="login-bottom login-bottom1">
									<div class="submit">
										<input type="submit" value="LOGIN" name="login"/>
									</div>
									
									<div class="clear"></div>
								</div>	
								</form>
								
							</div>
						</div>
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="login-top">
								<form method ="post">
									<input type="text" class="name active" placeholder="Your Name" required="" name="nameUp"/>
									<input type="text" class="email" placeholder="Email" required="" name="emailUp"/>
									<input type="password" class="password" placeholder="Password" required="" name = "passwordUp"/>		
								<div class="login-bottom">
									<div class="submit">
										<input type="submit" value="SIGN UP" name="signUP"/>
									</div>
									
									<div class="clear"></div>
								</div>
								</form>
									
							</div>
							
						</div>							
					</div>	
				</div>
			</div>	
		</div>	
		<div class="clear"></div>
	</div>	
	
	
	<div class="footer">
		
	</div>
</body>
</html>

<?php 
if(isset($_POST['signUP']))
{

	include('registerClass.php');
	$r = new Register();

	if($r){ //true if $r is not null
		$temp= $r->register();
		if($temp==true){
		$_SESSION['name'] = $_POST['nameUp'];
		$_SESSION['email'] = $_POST['emailUp'];
		header("Location: index.php");
		die();
	}
	}
}
if(isset($_POST['login'])){

	$email = $_POST['emailIn'];
	$password = md5($_POST['passwordIn']);

	if(validateLogin($email,$password)){
		header("Location: index.php");
		die();
	}
	else{
		echo 'invalid email/password';
	}

}

function validateLogin($email,$password){
	$db = new mysqli('localhost','root','','library');
	$result = $db->query("SELECT * FROM users WHERE email = '{$email}' && password = '{$password}'");
	if($result->num_rows){
		$result = $result->fetch_object();
	//	$_SESSION['id'] = $result->id;
		$_SESSION['name'] = $result->name;
		$_SESSION['email'] = $result->email;
		return true;
	}
	return false;
}

 ?>