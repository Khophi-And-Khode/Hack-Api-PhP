<!DOCTYPE html>

<html>
	<?php
    include 'header.php';
	?>
<body class="panel panel-warning " style="margin-top: 100px;margin-bottom: -50px">
<?php
include 'navbar.php';
?>

	
	<div class="container-fluid panel-heading">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-8" id="login_msg">
				<!--
				<div class="alert alert-danger alert-dismissable" style="position: fixed;z-index:10">
					<button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				</div>
				-->
			</div>
			<div class="col-md-4"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>		
			<div class="col-md-4 panel panel-primary"  align="center">
					<div class="panel-heading "><h3>LogIn Here</h3></div>
					<div class="panel-heading">
						
							<form class="form-group" method="POST" id="signin">
								<label for="username" class="label-primary"><h4><span class="glyphicon glyphicon-user"></span> Username</h4></label>
								<input class="form-control" type="text" id="username" name="username" autocomplete="off" placeholder="username" style="width: 300px" required></input>
								<hr>
								<label for="password" class="label-primary"><h4><span class="glyphicon glyphicon-lock"></span> Password</h4></label>
								<input class="form-control" type="password" id="password" name="password" autocomplete="off" placeholder="password" style="width: 300px" required></input>
								<hr>
								<button type="submit" class="btn btn-primary pull-right" id="signin_btn" name="signin_btn">LogIn</button>
								<button type="submit" class="btn btn-warning pull-left"><span class="glyphicon glyphicon-info-sign"></span>Forgotten Password</button>
							</form>

					</div>

					<div class="panel-footer "><br> 
						<p class="text text-danger"> If you are New here , kindly create an account. </p>
						<a href="signup.php" target="_parent" class="btn btn-xs active"><h4>Create Account</h4></a>
                        <button class="btn btn-primary" style="width: 100px;height: 50px; ">
                            <fb:login-button
                                    scope="public_profile,email"
                                    onlogin="checkLoginState();">
                            </fb:login-button>
                        </button>
					</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
		</div>

</div>
<?php
include 'footer.php';
?>
<!-- end of footer -->

</body>
</html>