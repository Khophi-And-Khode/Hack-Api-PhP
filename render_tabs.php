<?php
/**
 * Created by PhpStorm.
 * User: samue
 * Date: 26-Nov-18
 * Time: 1:23 AM
 */

global $img,$title,$price,$description;
function show_tabs($img,$title,$description,$price)
{
    cloudinary_url($img);
    echo "
    <div id='tabs-wrapper'>
        <ul>
            <li id='tab-info' class='k-state-active'> <b>Info</b></li>
            <li id='tab-const' class='tabs tabs-right'> <b>Constituent</b> </li>
            <li id='tab-effect' class='tabs tabs-right'> <b>Effects & Benefits</b></li>
            <li id='tab-review' class='tabs tabs-right'><b> Reviews</b></li>
        </ul>
        <div class='tabs-body'>
            <div id='info'>
                <img class='img img-responsive' src='$img' alt='Image'/>
             </div>
        </div>
        <div class='tabs-body'>
            <div id='const'> $description </div>
        </div>
        <div class='tabs-body'>
            <div id='effect'>$title</div>
        </div>
        <div class='tabs-body'>
            <div id='review'>$price</div>
        </div>
    </div>
   ";


}