<?php
include_once "includes/db_object.php";
include_once "includes/photo.php";
//include_once "includes/functions.php";
include "includes/header.php";
include_once "includes/session.php";
?>
<?php

if (!$session->is_signed_in()) {
    redirect("includes/login.php");
}

if(empty($_GET['id'])){

    redirect("photos.php");
    }
    else {

    $photo= Photo::findById($_GET['id']);
    if (isset($_POST['update'])) {

        if ($photo) {

            $photo->title=$_POST['title'];
            $photo->caption=$_POST['caption'];
            $photo->alternate_text=$_POST['alternate_text'];
            $photo->description=$_POST['description'];




            $photo->save();

    }

    }
}


$photos = Photo::find_all();
?>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->

        <?php include "includes/top_nav.php" ?>;

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->


        <?php include "includes/sidebar.php" ?>;

        <!-- /.navbar-collapse -->

    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        PHOTOS
                        <small>Subheading</small>
                    </h1>

                    <form   actoion="" method="post">
                    <div class="col-lg-8">

                        <div class="form-group">
                            <input type="text" name="title" class="form-control" value="<?php echo $photo->title;?>">

                        </div>

                        <div class="form-group">

                            <a href="#"><img src="<?php  echo $photo->pic_path() ?>alt=""> </a>
                            <label for="caption">Caption</label>
                            <input type="text" name="caption" class="form-control" value="<?php echo $photo->caption;?>">
                        </div>

                        <div class="form-group">
                            <label for="alternate_text">Alternate_text</label>
                            <input type="text" name="alternate_text" class="form-control" value="<?php echo $photo->alternate_text;?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="30""><?php echo $photo->description;?> </textarea>
                        </div>


                                </div>
                    <div class="col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save<span id="toggle" class="glyphicon glyphicon-menu-up"> </span></h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="glyhpicon glyphicon-calendar"></span>Uploaded</div>
                                </p>

                                <p class="text">
                                    Photo Id:<span class="data photo_id_inbox"><?php echo $photo->id;?></span>
                                </p>
                                <p class="text">
                                    Filename:<span class="data"><?php echo $photo->filename;?></span>
                                </p>
                                <p class="text">
                                    File Size:<span class="data"><?php echo $photo->size;?></span>
                                </p>
                            </div>
                            <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a href="delete_photo.php?=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg" >Delete</a>
                                </div>
                                <div class="info-box-update pull-right">
                                    <input type="submit" name="update" value="Update" class="=btn btn-primary btn-lg">
                                </div>

                            </div>

                        </div>

                    </div>
                    </form>

                </div>
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.container-fluid -->


                    </div>
                    <!-- /#page-wrapper -->

                </div>
                <!-- /#wrapper -->

                <!-- jQuery -->
                <script src="js/jquery.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="js/bootstrap.min.js"></script>
<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>

</body>

</html>
