<?php
/**
 * Created by PhpStorm.
 * User: samue
 * Date: 28-Nov-18
 * Time: 4:53 PM
 */


global $img,$title,$price,$description,$uploadResult,$secureUrl,$width,$height,$publicId,$sign,$format,$resType,$url,$content,$implication,$review,$name,$conn;

function FillImageInfo($conn,$name,$height,$width,$sign,$format,$resType,$secureUrl,$url,$publicId){

    $query = "INSERT INTO `ImageData`(`Name`, `Height`, `Width`, `Signature`, `PublicId`, `Url`, `SecureUrl`, `Format`, `ResourceType`) VALUES('$name','$height','$width','$sign','$publicId','$url','$secureUrl','$format','$resType');";

    mysqli_query($conn,$query);

}

function FillImageAndProduct($conn,$name,$height,$width,$sign,$format,$resType,$secureUrl,$url,$publicId,$price,$content,$implication){
    $keyword=$name.'-'.$price.'-'.$content.'-'.$implication.'-'.$publicId;
    $review="No reviews yet";
    FillImageInfo($conn,$name,$height,$width,$sign,$format,$resType,$secureUrl,$url,$publicId);
    $query = "INSERT INTO products(`Name`,`Price`, `ImgUrl`, `Content`, `Implication`, `Reviews`, `PublicId`, `Keyword`) VALUES ('$name','$price','$secureUrl','$content','$implication','$review','$publicId','$keyword');";
    $result= mysqli_query($conn,$query);
    if($result){
        return true;
    }else{
        return false;
    }
}