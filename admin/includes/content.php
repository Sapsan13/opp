<?php include "init.php" ?>
<?php include "header.php"; ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>

<?php            $photo = New Photo();
            $photo->title = "wfeveeew1";
            $photo->filename = "ewrfvweeeese2";
            $photo->description = "first_nammeee543";
            $photo->size = "514";
            $photo->type="wreeef";

            $photo->create();


            ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->



