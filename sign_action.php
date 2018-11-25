<?php
include "db.php";

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$c_password=$_POST['c_password'];
$mobile=$_POST['mobile'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];

$name="/^[A-Z][a-zA-Z ]+$/";
$emailValidation="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number="/^[0-9]+$/";

if(empty($username) || empty($email) || empty($password) || empty($c_password)|| empty($mobile) || empty($address1)){
	echo "
		<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
			<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<b> Please Fill In All The Required * Fields...!</b>
		</div>
	";
	exit();
}else{
	if(!preg_match($name,$username)){
	echo "
		<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
			<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<b> $username is not valid. Name must start with Upper case letter. Please try again...!</b>
		</div>
	";
	exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b> $email is not a valid mail. Please try again...!</b>
			</div>
		";
		exit();
	}
	if(strlen($password) < 10){
		echo "
			<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b> $password is weak. <br> Password must be at least 10 Characters</b>
			</div>
		";
		exit();
	}

	if($password !== $c_password ){
		echo "
			<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b> Password did not match. Please try again...!</b>
			</div>
		";
		exit();
	}

	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b> $mobile is not a valid phone number. Please try again...!</b>
			</div>		
		";
		exit();
	}

	if(strlen($mobile) < 10){
		echo "
			<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b> $mobile is not a valid phone number. Please try again...!</b>
			</div>
		";
		exit();
	}
	if(empty($address1)){
		echo "
			<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b> Please provide your address...!</b>
			</div>
		";
		exit();
	}
	
	//Check for existing email in the database
	
	$sql="select user_id from users where email='$email' LIMIT 1";
	
	$check_query=mysqli_query($conn,$sql);
	$count_email=mysqli_num_rows($check_query);
	if($count_email > 0){
		echo " 
			<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b> $email is already available. Please try another one...! </b>
			</div>
		";
		exit();
	}else{
		$password=md5($password);
		$sql="insert into users(username,email,password,mobile,address_1,address_2)
		values('$username','$email','$password','$mobile','$address1','$address2')";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo " 
			<div class='alert alert-success alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b> You have successfully registered...!</b> <br>
				Click here to <a href='signin.php' class='btn btn-danger btn-xs'>LogIn</a>
			</div>
			";

			exit();
			
			
		}
		
	}
	
}






?>