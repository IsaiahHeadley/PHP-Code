<html>
  <head>
    <title>PHP login page</title>
  </head>
  <body>
    <?php echo '<p>LOG IN</p>'; ?> 
  </body>
</html><?php


if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$conn = mysql_connect('server-address.or.IP-address', 'username', 'password', 'optionalDatabaseName');
	$conn = mysqli_connect('localhost', 'microblog', '7RH15qeE9oh2RCFh', 'microblog');//7RH15qeE9oh2RCFh');


	$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'");
	
    if (mysqli_num_rows($result) ){
        
        $user = mysqli_fetch_assoc($result);
        
        setcookie('username', $user['username'], time() + 3600);
        setcookie('user_id', $user['id'], time() + 3600);
        
       
    }
    

	
}
if(isset($_COOKIE['user_id'])){
     header("Location: //");
    
}
?>
<html>
<head>
	<title>Microblog | Login</title>
	<style></style>
</head>
<body>
    <!-- This form sends user data to POST array-->
<form action="login.php" method="post">
	<div>
        <!-- This input is being posted to the POST array-->
		<input type="text" name="username" placeholder="Username" /> 
	</div>
	<div>
		<input type="password" name="password" placeholder="Password" />
	</div>
	<div>
        <!-- This button submits the user data to the POST array-->
		<input type="submit" value="Log In"/>
	</div>

</form>

</body>
</html>