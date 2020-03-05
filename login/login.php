<!doctype html>
<html>

<head>
    <title>Login</title>
    <style>
        body {

            margin-top: 100px;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 80px;
            background-color: aquamarine;
            color: palevioletred;
            font-family: verdana;
            font-size: 40px;
        }

        h1 {
            color: red;
            font-family: verdana;
            font-size: 40px;
        }

        h3 {
            color: red;
            font-family: verdana;
            font-size: 40px;
        }
    </style>
</head>

<body>
    <center>
        <h1>CREATE REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1>
    </center>

    <center><p><a href="register.php">Register</a> | <a href="login.php">Login</a></p></center>
    	
    <center><h3>Login Form</h3></center>

    <form action="" method="POST">
        <center>Username: <input type="text" name="user"></centre><br />
        <center>Password: <input type="password" name="pass"></centre><br />
        <center><h1><input type="submit" value="Login" name="submit" /></h1></center>
    </form>
    <?php
    if (isset($_POST["submit"])) 
{
       

        if (!empty($_POST['user']) && !empty($_POST['pass'])) {
            $userName = $_POST['user'];
            $pass1 = $_POST['pass'];

            //define every thing
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'loginpage';

            //connect to the server select database
            $con = mysqli_connect($host, $user, $pass, $db);
            $query = mysqli_query($con, "SELECT * FROM login WHERE username='" . $userName . "' AND password='" . $pass1 . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {

                if ($user == $user && $pass == $pass) {
                    session_start();
                    $_SESSION['sess_user'] = $user;

                    /* Redirect browser */
                    header("Location: home.php");
                }
            } else {
                echo "Invalid username or password!";
            }
        } else {
            echo "All fields are required!";
        }
}
    ?>

</body>

</html>
