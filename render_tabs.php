<?php
/**
 * Created by PhpStorm.
 * User: samue
 * Date: 26-Nov-18
 * Time: 1:23 AM
 */



global $img,$content,$price,$effect,$review,$name,$rand;

function show_tabs($img,$content,$effect,$price,$review,$name)
{
    $rand=random_int(3,99999999);
    cloudinary_url($img);
    $id_info=$rand;
    $id_cont=$rand;
    $id_effect=$rand;
    $id_review=$rand;
    echo "
        <div class='col-xs-12 col-sm-5 col-md-3 col-lg-3 col-xl-3'>
            <div class='panel panel-info'>
                <ul class='nav nav-tabs'>
                    <li class='nav-item'> 
                        <a href='#info$id_info' class='nav-link active btn-primary' fade in role='tab' data-toggle='tab'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a href='#cont$id_cont' class='nav-link btn-info' fade role='tab' data-toggle='tab'>Content
                        </a>
                     </li>
                    <li class='nav-item'>
                        <a href='#eff$id_effect' class='nav-link btn' fade role='tab' data-toggle='tab'>Effects
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href='#rev$id_review' class='nav-link btn btn-info' fade role='tab' data-toggle='tab'>Reviews
                        </a>
                    </li>
                </ul>
                <div class='tab-content panel-body'>
                    <div id='info$id_info' role='tabpanel' class='tab-pane active'>
                        <img class='img img-responsive' src='$img' alt='Image'/>
                        Sold @ Ghc $price
                     </div>
                    <div id='cont$id_cont' role='tabpanel' class='tab-pane'>$name <br> $content </div>
                    <div id='eff$id_effect' role='tabpanel' class='tab-pane'>$effect</div>
                    <div id='rev$id_review' role='tabpanel' class='tab-pane'>$review</div>
                </div>           
            
            </div>
        </div>
       
   ";


}