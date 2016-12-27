<?php include_once "includes/init.php"; ?>


<?php
if (!$session->is_signed_in()) {
    redirect("includes/login.php");
}

if (empty($_GET['id'])) {
    redirect("photos.php");
}

$photo = Photo ::findById ($_GET['id']);

if($photo){
    $photo->delete_photo();
    if(delete_photo){

        redirect("photos.php");
            }
} else {

    redirect("photos.php");
}

?>

