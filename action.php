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
include 'admin/admin_action.php';


global $img,$title,$price,$description,$uploadResult,$secureUrl,$width,$height,$publicId,$sign,$format,$resType,$url,$content,$implication,$review,$fillResult;
function upload_image($conn,$img,$name,$price,$content,$implications){
    $pub_id=substr($img,0,5);
    $uploadResult = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__).'/img/'.$img),
        array("folder" => "web/", "public_id" => "khophi_".$pub_id, "overwrite" => TRUE,
            "resource_type" => "image",
            "transformation"=>array(
                array("width"=>300, "height"=>300, "crop"=>"scale"),
                array("width"=>300, "height"=>300, "crop"=>"scale")
            )
        )
        );
    $secureUrl = $uploadResult['secure_url'];
    $width = $uploadResult['width'];
    $height = $uploadResult['height'];
    $publicId = $uploadResult['public_id'];
    $sign = $uploadResult['signature'];
    $format = $uploadResult['format'];
    $resType = $uploadResult['resource_type'];
    $url = $uploadResult['url'];

    $result=FillImageAndProduct($conn,$name,$height,$width,$sign,$format,$resType,$secureUrl,$url,$publicId,$price,$content,$implications);
    if($result==true){
       return true;
    }else{
       return false;
    }

}



function show_video($img,$title,$description){
    echo "
				<div class='col-md-3'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$title</div>
							<div class='panel-body'>
								<video controls='controls' loop  autoplay='autoplay'>
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
    $sql = "SELECT * FROM products;";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    $pageNo = ceil($count/18);
    for($i=1; $i<=$pageNo; $i++){
        echo "
			<li ><a href='?page=$i' id='page' page='$i'>$i</a></li>
		";
    }
}

if(isset($_POST['product'])){
    $limit=16;
    if(isset($_POST['setPage'])){
        $pageno = $_POST["pageNumber"];
        $start = ($pageno*$limit)-$limit;
    }else{
        $start=0;
    }

    $product_query="SELECT * FROM products LIMIT $start,$limit ;";
    $run_query=mysqli_query($conn,$product_query);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
        while($row=mysqli_fetch_assoc($run_query)){
            $img=$row["ImgUrl"];
            $content=$row["Content"];
            $effect=$row["Implication"];
            $price=$row["Price"];
            $review=$row["Reviews"];
            $name=$row["Name"];
            $pId=$row["Id"];

            show_tabs($img,$content,$effect,$price,$review,$name,$pId);
        }
echo ' <hr>';
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
    $query=" SELECT * from products where Keyword LIKE '%$keyword%'";
    $run_query=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($run_query)){
        $img=$row["ImgUrl"];
        $content=$row["Content"];
        $effect=$row["Implication"];
        $price=$row["Price"];
        $review=$row["Reviews"];
        $name=$row["Name"];
        $pId=$row["Id"];

        show_tabs($img,$content,$effect,$price,$review,$name,$pId);
    }
}

if( isset($_POST['send_review'])){
    $pId = $_POST["proId"];
    $msg=$_POST["message"];

    $query=" SELECT Reviews from products where Id=$pId";
    $run_query=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($run_query)){
        $rev=$row["Reviews"];
        $sql="UPDATE products set Reviews=concat(' $msg <br>',Reviews) where Id='$pId';";
        $run_slq = mysqli_query($conn,$sql);
        if($run_slq){
            echo " 
			<div class='alert alert-success alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b>Thank you..!!!<br> Your Review Has been successfully send.</br> <br>
				
			</div>
			";
        }else{
            echo " 
			<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
				<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b>Ooops an error occurred sending your review. The technical team have received a notification. The sought it out soon.</br> <br>
				
			</div>
			";
        }
    }
}