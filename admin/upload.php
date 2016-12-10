<?php
include "includes/init.php";
include_once "photos.php";
?>
<?php
$message='';
/*
if (!$session->is_signed_in()) {
    redirect("includes/login.php");
}
*/
?>


<?php
var_dump($_POST);
if (isset($_POST['submit'])) {
    echo "<h1>HELAU</h1>";
    $photo = New Photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file_upload']);

        if ($photo->save()) {


            $message = "Photaploded sufufusly";
        }

        else{

            $message = join("<br>",$photo->errors);

        }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

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
                        UPLOADS
                        <small>Subheading</small>
                    </h1>

                    <div class="col-md-6">
                        <form action="upload.php" method="post" enctype="multipart/form-data">


                            <div class="form-group">

                                <input type="text" name="title" class="form-control">

                                </div>

                                <div class="form-group" >

                                    <input type="file" name="file_upload">

                                </div>
                            <input type="submit" name="submit">

                        </form>
                    </div>
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

</body>

</html>
