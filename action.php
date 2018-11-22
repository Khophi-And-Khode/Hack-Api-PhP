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


echo 'Hello Welcome';
function do_upload(){
    \Cloudinary\Uploader::upload('img/logo.jpg');
}


function show_image(){
    $img="https://res.cloudinary.com/wendolin/image/upload/v1542843490/web/table.jpg";


    cloudinary_url($img);
    echo '<div><a target="_blank" href="'.$img.'">
        <img src='.$img.'>
    </a>';
    echo '</div>';
}

