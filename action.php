<?php
/**
 * Created by PhpStorm.
 * User: samuel Wendolin
 * Date: 22-Nov-18
 * Time: 12:40 PM
 */

require 'autoload.php';
require 'src/Helpers.php';
include 'settings.php';
include 'db.php';


function do_upload(){
    \Cloudinary\Uploader::upload('img/logo.jpg');
}

global $img,$title,$price,$description;
function show_image($img,$title,$description,$price){
    cloudinary_url($img);
    echo "
				<div class='col-md-3'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$title</div>
							<div class='panel-body'>
								<img class='img img-responsive' src='$img' alt='Image' style='height:100px; width:80px'/>
							</div>
							<div class='panel-body desc'>
								$description
							</div>
							
						<div class='panel-footer'>GHc $price
							<!--<button id='product' name='addCart' pid=1 class='btn btn-danger btn-xs' style='float: right' >AddToCart</button>-->
						</div>		
					</div>
				</div>
			";
    echo '</div>';
}

if(isset($_POST['page'])){
    $sql = "SELECT * FROM imagedata";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    $pageNo = ceil($count/28);
    for($i=1; $i<=$pageNo; $i++){
        echo "
			<li ><a href='?page=$i' id='page' page='$i'>$i</a></li>
		";
    }
}

if(isset($_POST['product'])){
    $limit=21;
    if(isset($_POST['setPage'])){
        $pageno = $_POST["pageNumber"];
        $start = ($pageno*$limit)-$limit;
    }else{
        $start=0;
    }

    $product_query="SELECT * FROM imagedata LIMIT $start,$limit ";
    $run_query=mysqli_query($conn,$product_query);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
        while($row=mysqli_fetch_row($run_query)){
            $title ="Coca Cola";
            $description ="Coca Cola Zero sugar";
            $price =10;
            $imageUrl ="https://res.cloudinary.com/wendolin/image/upload/v1542843490/web/table.jpg";
            show_image($imageUrl,$title,$description,$price);
        }

    }

}
