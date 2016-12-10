<?php require_once("header.php"); ?>
<?php require_once("init.php"); ?>

<?php

if (isset($_POST['username'])) {

    $username = ($_POST['username']);
    $password = ($_POST['password']);
     var_dump($username);
     var_dump($password);
    //method check user in database

    $user_found = Users::verify_user($username, $password);

    if ($user_found) {
        $session->login($user_found);
        redirect("../index.php");

    } else {
        $username = "";
        $password = "";
        echo "Username not passwoord";
    }
    if ($session->is_signed_in()) {

        redirect("../index.php");
    }

}


?>

<div class="col-md-4 col-md-offset-5">
        <form action="login.php" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?= $username;?>">

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" value="<?=$password;?>">

        </div>


        <div class="form-group">
            <input type="submit" name="" value="submit" class="btn btn-primary">

        </div>
    </form>
</div>
