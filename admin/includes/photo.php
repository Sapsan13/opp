<?php
require "init.php";

class Photo extends Db_object
{


    protected static $table = "photos";
    protected static $db_table_fields = array('photo_id', 'title', 'description', 'filename', 'type', 'size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
    public $errors = array();
    public $upload_errors = array(
        UPLOAD_ERR_OK => "Ошибок не возникло",
        UPLOAD_ERR_INI_SIZE => "Размер принятого файла превысил максимально допустимый размер",
        UPLOAD_ERR_FORM_SIZE => " Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме",
        UPLOAD_ERR_PARTIAL => "Загружаемый файл был получен только частично",
        UPLOAD_ERR_NO_FILE => "Файл не был загружен",
        UPLOAD_ERR_NO_TMP_DIR => "Отсутствует временная папка",
        UPLOAD_ERR_CANT_WRITE => "Не удалось записать файл на диск.",
        UPLOAD_ERR_EXTENSION => "Не удалось записать файл на диск.",
    );


    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There is no file level";
            return false;

        } elseif ($file['error'] != 0) {

            $this->errors[] = $this->upload_errors_array[$file['error']];

            return false;
        } else {


            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];

        }

    }

    public function save()
    {
        if ($this->photo_id) {
            $this->update();
        } else {

            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->filename) || empty($this->tmp_path)) {

                $this->errors[] = "The file was notafile";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;


            if (file_exists($target_path)) {

                $this->errors[] = "The file {$this->filename}already exists";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {

                if ($this->tmp_path) {

                    unset($this->tmp_path);
                    return true;
                } else {

                $this->errors[]="the folder fold-DER";
                    return false;
                }


            }


            $this->create();

        }
    }

}


?>