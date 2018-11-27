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
include 'render_tabs.php';


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
								<img class='img img-responsive' src='$img' alt='Image'/>
							</div>
							<div class='panel-body desc'>
								$description
							</div>
							
						<div class='panel-footer'>GHc $price
						</div>		
					</div>
				</div>
			";
    echo '</div>';
}

function show_video($img,$title,$description){
    cloudinary_url($img);
    echo "
				<div class='col-md-3'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$title</div>
							<div class='panel-body'>
								<video controls loop  >
								    <source src='$img' type='video/mp4'>								
								
                                </video>
							</div>
							<div class='panel-body desc'>
								$description
							</div>
							
						<div class='panel-footer'>
						</div>		
					</div>
				</div>
			";
    echo '</div>';
}

if(isset($_POST['page'])){
    $sql = "SELECT * FROM imagedata;";
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

    $product_query="SELECT * FROM imagedata LIMIT $start,$limit ;";
    $run_query=mysqli_query($conn,$product_query);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
        while($row=mysqli_fetch_assoc($run_query)){
            $title ="Coca Cola";
            $description ="Coca Cola Zero sugar";
            $price =10;
            $imageUrl ="https://res.cloudinary.com/wendolin/image/upload/v1542843490/web/table.jpg";
            //show_image($imageUrl,$title,$description,$price);
            show_tabs($imageUrl,$title,$description,$price);
        }

    }

}
if(isset($_POST['videos'])) {


    $product_query = "SELECT * FROM videodata;";
    $run_query = mysqli_query($conn, $product_query);
    $count = mysqli_num_rows($run_query);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($run_query)){
            $imageUrl = $row["SecureUrl"];
            $title = $row["Name"];
            $description = $row["Name"];
            show_video($imageUrl, $title, $description);
    }

}

}

if( isset($_POST['search'])){
    $keyword = $_POST["keyword"];
    //$query=" SELECT * FROM products where product_keywords LIKE '%$keyword%'";
    $query=" SELECT * from imagedata where name LIKE '%$keyword%'";
    $run_query=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($run_query)){
        $title ="Coca Cola";
        $description ="Coca Cola Zero sugar";
        $price =10;
        $imageUrl ="https://res.cloudinary.com/wendolin/image/upload/v1542843490/web/table.jpg";
        show_image($imageUrl,$title,$description,$price);
        //show_tabs($imageUrl,$title,$description,$price);
    }
}
