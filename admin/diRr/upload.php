<?php
var_dump($_POST);
if (isset($_POST['submit'])) {

//    echo "<pre>";
//    print_r($_FILES['file_upload']);
//    echo "<pre>";
$upload_errors = array(
UPLOAD_ERR_OK  => "Ошибок не возникло",
UPLOAD_ERR_INI_SIZE => "Размер принятого файла превысил максимально допустимый размер",
UPLOAD_ERR_FORM_SIZE =>" Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме",
UPLOAD_ERR_PARTIAL => "Загружаемый файл был получен только частично",
UPLOAD_ERR_NO_FILE =>   "Файл не был загружен",
UPLOAD_ERR_NO_TMP_DIR =>   "Отсутствует временная папка",
UPLOAD_ERR_CANT_WRITE =>  "Не удалось записать файл на диск.",
UPLOAD_ERR_EXTENSION =>  "Не удалось записать файл на диск.",
);
    $tmp_name = $_FILES['file_upload']['tmp_name'];
    $the_file = $_FILES['file_upload']['name'];
    $directory = "uploads";

    if(move_uploaded_file($tmp_name,$directory . "/" . $the_file)) {

        $the_message="file uploaded";
    } else {

        $the_error = $_FILES['file_upload']['error'];
        $the_message=$upload_errors[$the_error];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="upload.php" enctype="multipart/form-data" method="post">
    <h2>
    <?php
   if(!empty ($upload_errors))
   {
       echo $the_message;
   }
    ?>
    </h2>

    <input type="file" name="file_upload"> <br>
    <input type="submit" name="submit">

</form>
</body>
</html>
