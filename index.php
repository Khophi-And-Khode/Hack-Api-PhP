<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location: user.php");
}

include 'action.php';

?>

<!DOCTYPE html>
<html>
<?php
include 'header.php';
?>
<body>

   <?php
   include 'navbar.php';
   ?>

<!--TODO: Slides here-->
<!--Image Display starts here-->
    <div class="container-fluid" >
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><h6><b>Trending Products</b></h6></div>
                <div class="panel-body ">
                    <div id="get_product" >
                    </div>
                </div>
            </div>

        </div>
        <?php
        include 'paging.php';
        ?>
        <hr/>
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><h6><b>Trending Videos</b></h6></div>
                <div class="panel-body ">
                    <div id="get_product" >
                    </div>
                </div>
            </div>

        </div>
        <?php
        include 'paging.php';
        ?>
    </div>

<?php
include 'footer.php';
?>
</body>
</html>
