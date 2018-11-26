<?php
include "db.php";

session_start();

if(isset($_POST["userLogin"])){
		$username=mysqli_real_escape_string($conn,$_POST["userName"]);
		$password=md5($_POST["userPassword"]);
		$login_query="select * from users where username='$username' AND password='$password'";
		$run_query=mysqli_query($conn,$login_query);
		$count=mysqli_num_rows($run_query);
		if($count == 1){
			$row = mysqli_fetch_array($run_query);
			$_SESSION["uid"]=$row["user_id"];
			$_SESSION["name"]=$row["username"];
				echo "hello";
		}else{
			echo "
				<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
					<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b> Username or Password is incorrect. Try again...!</b>
				</div>
			";
		}
	
}


?>