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
include 'user_navbar.php';
?>

        <!--TODO: Slides here-->
        <!--Image Display starts here-->
        <div class="container-fluid" >
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading"><h6><b>PRODUCTS</b></h6></div>
                    <div class="panel-body ">
                        <div id="get_product" >
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php
        include 'paging.php';
        include 'footer.php';
        ?>
</body>
</html>