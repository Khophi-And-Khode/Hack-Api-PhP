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
        <div class='col-md-3 col-xs-3 col-sm-3 col-lg-3 col-xl-3'>
            <div class='panel panel-info'>
                <ul class='nav nav-tabs'>
                    <li class='nav-item'> 
                        <a href='#info' class='nav-link active btn-primary' fade in role='tab' data-toggle='tab'>Info
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href='#cont' class='nav-link btn-info' fade role='tab' data-toggle='tab'>Content
                        </a>
                     </li>
                    <li class='nav-item'>
                        <a href='#effect' class='nav-link btn' fade role='tab' data-toggle='tab'>Effects
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href='#review' class='nav-link btn btn-info' fade role='tab' data-toggle='tab'>Reviews
                        </a>
                    </li>
                </ul>
                <div class='tab-content panel-body'>
                    <div id='info' role='tabpanel' class='tab-pane active'>
                        <img class='img img-responsive' src='$img' alt='Image'/>
                        Sold @ Ghc $price
                     </div>
                    <div id='cont' role='tabpanel' class='tab-pane'> $description this is just a place holder</div>
                    <div id='effect' role='tabpanel' class='tab-pane'>$title</div>
                    <div id='review' role='tabpanel' class='tab-pane'>Sold @ Ghc $price</div>
                </div>           
            
            </div>
        </div>
   ";


}