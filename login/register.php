<!doctype html>
<html>
<head>
<title>Registeration form</title>
    <style> 
        body{
            
    margin-top: 100px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 80px;
    background-color: sandyBrown;
    color: palevioletred;
    font-family: verdana;
    font-size: 40px
    
        }
            h1 {
    color: indigo;
    font-family: verdana;
    font-size: 40px;
}
         h2 {
    color: indigo;
    font-family: verdana;
    font-size: 40px;
}
            
        
    </style>
</head>
<body>
   
    <center><h1>CREATE REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1></center>
   
<center><p><a href="register.php">Register</a> | <a href="login.php">Login</a></p><center>
    <center><h2>Registration Form</h2></center>
<form action="" method="POST">
    <legend>
    <fieldset>
        
Username: <input type="text" name="user"><br />
Password: <input type="password" name="pass"><br />	
<h1><input type="submit" value="Register" name="submit" /></h1>
            
        </fieldset>
        </legend>

</form>
    
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$userName=$_POST['user'];
	$pass1=$_POST['pass']	;

//define every thing
$host ='localhost';
$user ='root';
$pass ='';
$db = 'loginpage';

 //connect to the server select database
 $con = mysqli_connect($host,$user,$pass,$db);

	
	$query=mysqli_query($con,"SELECT * FROM login WHERE username='".$userName."'");
	$numrows=mysqli_num_rows($query);
	if($numrows==0)
	{
		$sql="INSERT INTO login(username,password) VALUES('$userName','$pass1')";

		$result=mysqli_query($con,$sql);


	if($result)
	  {
		echo "Account Successfully Created";
	  }
	else 
	  {
		echo "Failure!";
	  }

	} else {
	echo "That username already exists! Please try again with another.";
	}

} else {
	echo "All fields are required!";
}
}
?>

</body>
</html>
