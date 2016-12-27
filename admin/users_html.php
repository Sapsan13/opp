<?php require_once "includes/header.php"; ?>
<?php require_once "includes/init.php"; ?>
<?php require_once "includes/db_object.php"; ?>
<?php require_once "includes/database.php"; ?>
<?php require_once "includes/users.php"; ?>



<?php

if (!$session->is_signed_in()) {
    redirect("includes/login.php");
}

$users = Users::find_all();

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
                        Users
                    </h1>


                    <a href="add_user.php" class="btn btn-primary">Add User</a>

                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?php echo $user->id; ?></td>

                                    <td><img  class="admin-user-thumbnail user_image" src="<?= $user->image_placehold(); ?>" alt=""></td>

                                    <td><?php echo $user->username; ?>

                                    <div class="action_links">

                                        <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                        <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                        <a href="##">View</a>

                                    </td>
                    </div>

                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->last_name; ?></td>
                                </tr>


                            <?php endforeach; ?>

                            </tbody>
                        </table>
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

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!---->
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
<!---->
<!--    <title>SB Admin - Bootstrap Admin Template</title>-->
<!---->
<!--    <!-- Bootstrap Core CSS -->-->
<!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
<!---->
<!--    <!-- Custom CSS -->-->
<!--    <link href="css/sb-admin.css" rel="stylesheet">-->
<!---->
<!--    <!-- Custom Fonts -->-->
<!--    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
<!---->
<!--    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->-->
<!--    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->-->
<!--    <!--[if lt IE 9]>-->
<!--    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
<!--    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
<!--    <![endif]-->-->
<!---->
<!--</head>-->

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
<!--    <div id="page-wrapper">-->
<!--        <div class="container-fluid">-->
<!--            <!-- Page Heading -->-->
<!--            <div class="row">-->
<!--                <div class="col-lg-12">-->
<!--                    <h1 class="page-header">-->
<!--                        userS-->
<!--                        <small>Subheading</small>-->
<!--                    </h1>-->
<!--                    <ol class="breadcrumb">-->
<!--                        <li>-->
<!--                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>-->
<!--                        </li>-->
<!--                        <li class="active">-->
<!--                            <i class="fa fa-file"></i> Blank Page-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- /.row -->-->
<!--        </div>-->
<!--        <!-- /.container-fluid -->-->
<!--    </div>-->
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>