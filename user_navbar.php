<?php
/**
 * Created by PhpStorm.
 * User: samue
 * Date: 25-Nov-18
 * Time: 3:53 AM
 */

echo '
<div class="container-fluid" style="margin-bottom:70px;" >
			<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation" >
				<div class="navbar-header">
					<a class="navbar-brand" style="margin-right:50px" >Khophi & Khode Health Arena</a>
				</div>
				<button class="navbar-toggle btn btn-primary" data-toggle="collapse" data-target=".navHeaderCollapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav">
						<li class="active" ><a href="index.php?home"><span class="glyphicon glyphicon-home"></span> Home</a></li>&nbsp;&nbsp;
						
						<li>
							<form class="navbar-form" role="search">
								<input class="form-control" type="text" id="txt_search" placeholder="Search..."></input>
								<button class="btn btn-info" type="submit" id="btn_search" ><span class="glyphicon glyphicon-search"></span></button>
							</form>
						</li>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<li class="active navbar-right pull-right">
							<a href="#" class="dropdown-toggle" id="drop" data-toggle="dropdown">  Hello, <br>  '. $_SESSION["name"].'  <span class="caret"></span></a>
							
								<ul class="dropdown-menu" aria-labelledby="drop">
									<li class="divider"></li>
									<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>
									<li class="divider"></li>
									<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
								</ul>
							
						</li>
						&nbsp;&nbsp;&nbsp;&nbsp;


					</ul>
					
				</div>
			</nav>
		</div><!-- END OF NAVIGATION BAR -->
<hr/>
';