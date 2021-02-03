<?php
	
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	//$conn = mysql_connect('server-address.or.IP-address', 'username', 'password', 'optionalDatabaseName');
	$conn = mysqli_connect('localhost', 'microblog', '**********', 'microblog');
    $exists = mysqli_query($conn,"SELECT `id`, `username`, `email` FROM `users` WHERE `username`= '$username' OR `email`= '$email'");
    $num_accounts = mysqli_num_rows($exists);
    print_r($_POST);
    if($num_accounts==0){
           

        $result = mysqli_query($conn, "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')");
    }
}
?>
<html>
<head>
	<title>Microblog | Register</title>
	<style></style>
</head>
<body>
<form action="register.php" method="post">
    <?php
    if (isset ($num_accounts) && $num_accounts>=1){
        echo "Account already created with username or email";
    }
    ?>
    
	<div>
		<input type="text" name="username" placeholder="Username" />
	</div>
	<div>
		<input type="email" name="email" placeholder="Email" />

		<!--
			
			html tag attributes: id, class, style
			input tag attributes: type, name, placeholder, value
		-->
	</div>
	<div>
		<input type="password" name="password" placeholder="Password" />
	</div>
	<div>
		<input type="submit" value="Register"/>
	</div>

</form>

</body>
</html>