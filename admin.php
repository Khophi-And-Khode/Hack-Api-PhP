
<!DOCTYPE html>

<html>
<?php
include 'header.php';
?>
<body class="panel panel-info ">
<?php
include 'navbar.php';
?>
<div class="container-fluid panel-heading" style="margin:5px;">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="get_msg">
        </div>
        <div class="col-md-2"></div>

    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 panel panel-primary"  >
            <div class="panel-heading " style="text-align: center"><h3> Save New Product</h3></div>
            <div class="panel-body">
                <form class="form-group" id="image_saver" method="POST" enctype="multipart/form-data">

                    <label for="name" class="label-info"><h5><span class="glyphicon glyphicon-pencil"></span> Product Name *&nbsp;</h5></label>
                    <input class="form-control" type="text" id="name" name="name" autocomplete="off" placeholder="Coca Cola" required />
                    <hr>

                    <label for="price" class="label-info"><h5> Price (Gh₵) *&nbsp;</h5></label>
                    <input class="form-control" type="price" id="price" name="price" autocomplete="off" placeholder="100" required />
                    <hr>

                    <label for="content" class="label-info"><h5><span class="glyphicon glyphicon-comment"></span> Content / Constituents *&nbsp;</h5></label>
                    <textarea style="width: 425px;height: 100px;" class="form-control" type="text" id="content" name="content" autocomplete="off" placeholder="Your Nose Bicarbonate :)" required ></textarea>
                    <hr>

                    <label for="implication" class="label-info"><h5><span class="glyphicon glyphicon-comment"></span> Health Effect / Implications *&nbsp;</h5></label>
                    <textarea style="width: 425px;height: 100px;" class="form-control" type="text" id="implication" name="implication" autocomplete="off" placeholder="It can kill you if abused" required ></textarea>
                    <hr>

                    <label for="image_file" class="label-info"><h5><span class="glyphicon glyphicon-picture"></span> Image *&nbsp;</h5></label>
                    <input class="form-control" type="file" id="image_file" name="image_file" />
                    <hr>

                    <p class="text text-danger"> * Means Required Fields</p>

                    <button type="submit" class="btn btn-danger pull-right" id="save_image_btn" name="submit"><span class="glyphicon glyphicon-saved"></span></button>
                </form>
            </div>

        </div>
        <div class="col-md-3"></div>
    </div>

</div>
<?php
include 'footer.php';
?>
<!-- end of footer -->
</body>

</html>
