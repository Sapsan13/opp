<?php require_once "init.php" ?>

<?php
function redirect($location)
{
    header("Location:$location");
}
function __autoload($class)
{
    $class = strtolower($class);
    $path = "includes/$class.php";
    if (file_exists($path))
    {
        require_once($path);
    }
    else{
        die("file is not a file");
    }
}
