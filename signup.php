<!DOCTYPE html>

<html>
<?php
include 'header.php';
?>
<body class="panel panel-primary ">
<?php
include 'navbar.php';
?>
	<div class="container-fluid panel-heading" style="margin:50px;">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="get_msg">
				<!--
				<div class="alert alert-danger alert-dismissable" style="position: fixed;z-index:10">
					dddd <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				
				</div>
				-->
			</div>
			<div class="col-md-2"></div>
			
		</div>
		<div class="row">
			<div class="col-md-4"></div>		
			<div class="col-md-4 panel panel-primary"  >
				<div class="panel-heading " style="text-align: center"><h3> Create An Account </h3></div>
				<div class="panel-body">
					<form class="form-group" id="signup" method="POST">
						<label for="username" class="label-info"><h4><span class="glyphicon glyphicon-user"></span> Username *&nbsp;</h4></label>
						<input class="form-control" type="text" id="username" name="username" autocomplete="off" required></input>
						<hr>
						<label for="email" class="label-info"><h4><span class="glyphicon glyphicon-envelope"></span> E-mail *&nbsp;</h4></label>
						<input class="form-control" type="email" id="email" name="email" autocomplete="off" placeholder="example@gmail.com" required></input>
						<hr>
						<label for="password" class="label-info"><h4><span class="glyphicon glyphicon-lock"></span> Password *&nbsp;</h4></label>
						<input class="form-control" type="password" id="password" name="password" autocomplete="off" required></input>
						<hr>
						<label for="c_password" class="label-info"><h4><span class="glyphicon glyphicon-lock"></span>Confirm Password *&nbsp;</h4></label>
						<input class="form-control" type="password" id="c_password" name="c_password" autocomplete="off" required></input>
						<hr>
						<label for="mobile" class="label-info"><h4><span class="glyphicon glyphicon-phone"></span> Mobile *&nbsp;</h4></label>
						<input class="form-control" type="text" id="mobile" name="mobile" autocomplete="off" required></input>
						<hr>
						<label for="address1" class="label-info"><h4><span class="glyphicon glyphicon-map-marker"></span> Address 1 *&nbsp;</h4></label>
						<input class="form-control" type="text" id="address1" name="address1" autocomplete="off" placeholder="Example: Airport,Accra." required></input>
						<hr>
						<label for="address2" class="label-info"><h4><span class="glyphicon glyphicon-map-marker"></span> Address 2 (optional)&nbsp;</h4></label>
						<input class="form-control" type="text" id="address2" name="address2" autocomplete="off" ></input>
						<hr>
						<p class="text text-danger"> * Means Required Fields</p>
						
						<button type="submit" class="btn btn-danger pull-right" id="signup_btn" name="signup_btn">Register</button>
					</form>
				</div>
			<p class="text text-info"> If you've already Register,please click on Login here</p>
			<div class="panel-footer "><a href="signin.php" target="_self" class="btn btn-xs btn-warning active"><h4>LogIn Here</h4></a></div>
			</div>
			<div class="col-md-4"></div>
		</div>

	</div>
<?php
include 'footer.php';
?>
<!-- end of footer -->
</body>

</html>