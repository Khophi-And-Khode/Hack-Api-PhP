<?php
/**
 * Created by PhpStorm.
 * User: samue
 * Date: 28-Nov-18
 * Time: 9:04 PM
 */

session_start();
include "db.php";
include "action.php";

$name=$_POST['name'];
$price=$_POST['price'];
$content=$_POST['content'];
$implications=$_POST['implication'];



if(empty($name) || empty($price) || empty($content) || empty($implications)){
    echo "
		<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
			<button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<b> Please Fill In All The Required * Fields...!</b>
		</div>
	";
    exit();
}else{

    //TODO: SYDNEY PLS CHECK HERE FOR ME
    $image=$_FILES["image_file"]["name"];
    echo $image;
    $result=false;
    $result = upload_image($conn,$image,$name,$price,$content,$implications);
    if($result==true){
        echo "<div class='alert alert-success alert-dismissable' style='position: fixed;z-index:10'>
            <button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <b> Data successfully saved...!</b> <br>
        </div>
        
        ";
    }else{
        echo "<div class='alert alert-danger alert-dismissable' style='position: fixed;z-index:10'>
            <button class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <b> Data not saved...!</b> <br>
        </div>
        
        ";
    }

}