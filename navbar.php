<?php
/**
* Created by PhpStorm.
* User: samuel wendolin
* Date: 24-Nov-18
* Time: 11:59 PM
*/

echo '


<div class="container-fluid" style="margin-bottom:70px;" >
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xs-12">
            <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation" >
                <div class="navbar-header">
                    <a class="navbar-brand"  >ProView</a>
                </div>
                <button class="navbar-toggle btn btn-primary" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav">
                        <li class="active" ><a href="index.php?home" style="margin-right:185px"><span class="glyphicon glyphicon-home"></span> Home</a>
                        </li>&nbsp;&nbsp;
                        <li >
                            <form class="navbar-form" role="search">
                                <input class="form-control focus" type="text" id="txt_search" placeholder="Search..."></input>
                                <button class="btn btn-info" type="submit" id="btn_search" ><span class="glyphicon glyphicon-search"></span></button>
                            </form>
                        </li>
                        <li class="active"><a href="signin.php" target="_blank"><span class="glyphicon glyphicon-log-in"></span> LogIn</a></li>
                        <li class="active pull-right"><a href="signup.php" target="_blank"><span class="glyphicon glyphicon-log-out"></span> SignUp</a></li>
                        
                    </ul>
    
                </div>
            </nav>
        </div>
    
    </div>
        
    </div><!-- END OF NAVIGATION BAR -->

<hr/>';
?>