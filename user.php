<?php 
session_start();

if(!isset($_SESSION["uid"])){
	header("location: index.php");
}
?>

<!DOCTYPE html>

<html>
	<?php
   include 'header.php';
    ?>
<body >
<?php
$name=$_SESSION["name"];
if($name =="admin" || $name =="Admin" || $name =="Administrator" || $name =="administrator"){
    include 'admin_navbar.php';
}else{
    include 'user_navbar.php';
}

?>

        <!--TODO: Slides here-->
        <!--Image Display starts here-->
<div class="container-fluid" >
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8" id="review_msg">

            </div>
            <div class="col-md-4"></div>
        </div>
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
                <div id="get_vid" >

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