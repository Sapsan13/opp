<?php include_once "includes/init.php"; ?>



<?php
if (!$session->is_signed_in()) {
    redirect("includes/login.php");
}


if (empty($_GET['id'])) {
    redirect("admin/users_html.php");
}

$user = Users::findById ($_GET['id']);

if($user){
    $user->delete();
    if(delete_user){

        redirect("users_html.php");
    }
} else {

    redirect("users_html.php");
}

?>

