
<?php include "includes/header.php" ?>
<?php include "includes/init.php"; ?>


<?php

if (!$session->is_signed_in())

{

redirect("includes/login.php");
}


?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           <?php  include "includes/top_nav.php" ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include"includes/sidebar.php"?>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <?php include "includes/content.php" ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js">

</body>
</html>
