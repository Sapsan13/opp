<?php include "includes/header.php"; ?>
<?php include "includes/init.php"; ?>
<?include_once "includes/photo.php"; ?>
<?php

if (!$session->is_signed_in()) {
    redirect("includes/login.php");
}

if (empty($_GET['id'])) {

    redirect("users_html.php");
}

$user = Users::findById($_GET['id']);

if (isset($_POST['update'])) {
    if ($user) {

        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = ['last_name'];
        $user->password = ['password'];

        if(empty($_FILES['user_image'])){
            $users->save();
            redirect("edit_user.php?id={$user->id}");
        }else{
            $user->set_file($_FILES['user_image']);
            $user->save_img_usr();
            $user->save();

            redirect("edit_user.php?id={$user->id}");
        }
    }
}
if (isset($_POST['delete'])){

    $user->delete($_POST['id']);

      redirect("users_html.php");

}

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
                        USERS
                        <small>Subheading</small>
                    </h1>

                   <div class="col-md-6">

                       <img class="img-responsive" src="<?php echo $user->image_placehold();?> " alt="">

                   </div> 

                    <form method="post" enctype="multipart/form-data">
                        <div class="col-lg-6 ">

                            <div class="form-group">
                                <input type="file" name="user_image">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">

                            </div>

                            <div>
                                <label for="caption">First Name</label>
                                <input type="text" name="first_name" class="form-control"value="<?php echo $user->first_name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="alternate_text">Last Name</label>
                                <input type="text" name="last_name" class="form-control"value="<?php echo $user->last_name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="alternate_text">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $user->password ?>">
                            </div>
                            <div>
                                <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
                                <input type="submit" name="delete" value="Delete" class="btn btn-primary pull-left">
                                <div>

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
<!-- 111Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
