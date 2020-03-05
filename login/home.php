<!DOCTYPE html>
<html>
<head>
	<title>Send SMS from PHP using textlocal</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
<style>
body{
            margin-top: 100px;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 80px;
            background-color:powderblue;
	    color: palevioletred;
            font-family: verdana;
            font-size: 20px;
	}
	.button{
		
	    padding: 10px 190px;
            color: blue;
            font-family: verdana;
            font-size: 20px;
	    background-color:yellow;
        }
	input[type=text], input[type=text]{
  	   width: 100%;
           padding: 12px 20px;
           margin: 8px 0;
           display: inline-block;
           border: 1px solid #ccc;
           box-sizing: border-box;
        }		

</style>


</head>
<body>
<div class="container">
<center><h1 class="text-center">Otp verification through mobile..</h1></center>
<hr>
	<div class="row">
	<div class="col-md-9 col-md-offset-2">
		<?php
			if(isset($_POST['sendopt'])) {
				require('textlocal.class.php');
				require('Api.php');
				$textlocal = new Textlocal(false, false, API_KEY);
                // You can access MOBILE from credential.php
				// $numbers = array(MOBILE);
                // Access enter mobile number in input box
                $numbers = array($_POST['mobile']);
				$sender = 'TXTLCL';
				$otp = mt_rand(10000, 99999);
				$message = "Hello " . $_POST['uname'] . " This is your OTP: " . $otp;
				try {
				    $result = $textlocal->sendSms($numbers, $message, $sender);
				    setcookie('otp', $otp);
				    echo "OTP successfully send..";
				} catch (Exception $e) {
				    die('Error: ' . $e->getMessage());
				}
			}
			if(isset($_POST['verifyotp'])) { 
				$otp = $_POST['otp'];
				if($_COOKIE['otp'] == $otp) {
					echo "Congratulation, Your mobile is verified.";
					
					/*redirect browser*/
					header("location:member.php");
					
				} else {
					echo "Please enter correct otp.";
				}
			}
		?>
	</div>
        <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
        <div class="row">
        <div class="col-sm-9 form-group">
        <label for="uname"><b>Name</b></label>
       <input type="text" class="form-control" id="uname" name="uname" value="" maxlength="10" placeholder="Enter your name" required=""><br />
         </div>
         </div>
         <div class="row">
         <div class="col-sm-9 form-group">
         <label for="mobile"><b>Mobile</b></label>
         <input type="text" class="form-control" id="mobile" name="mobile" value="" maxlength="10" placeholder="Enter valid mobile number" required=""><br />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <center><p><button type="submit" name="sendopt" class="btn btn-lg btn-success btn-block">Send OTP</button></p></center>
                </div>
            </div>
            </form>
            <form method="POST" action="">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="otp"><b>OTP</b></label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" maxlength="5" required=""></br>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <center><p><button type="submit" name="verifyotp" class="btn btn-lg btn-info btn-block">Verify</button></p></center>
                </div>
            </div>
        </form>
	</div>
</div>
</body>
</html>
