<?php include "db_object" ?>
<?php include "photo.php" ?>

<?php
class Users extends Db_object
{
    protected static $table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $password;
    public $user_image;
    public $upload_dir = "images";
    public $image_placeholder = "images/place/lol.png";

    public function image_placehold()
    {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_dir . DS . $this->user_image;
    }
    public static function verify_user($username, $password)
    {
        global $database;

        $username = $database->escaprString($username);
        $password = $database->escaprString($password);
        $sql = "SELECT * FROM " . self::$table . " WHERE username = '$username' AND password= '$password' LIMIT 1";

        $resultArray = self::findQuery($sql);
        return !empty ($resultArray) ? array_shift($resultArray) : false;
    }
    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There is no file leотvel";
            return false;
        } elseif ($file['error'] != 0) {

            $this->errors[] = $this->upload_errors_array[$file['error']];

            return false;
        } else {
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];




        }

    }
    public function save_img_usr()
    {
        if ($this->id) { //по id не проходит где его взять не догоню я проверку тут на юзернейм делал всёравно не валит
            $this->update();
        } else {
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->user_image) || empty($this->tmp_path)) {

                $this->errors[] = "The file was notafile";
                return false;
            }
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->user_image}already exists";
                return false;
            }
            if (move_uploaded_file($this->tmp_path, $target_path)) {

                if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                } else {
                    $this->errors[] = "Ulpodaded sfufly";
                    return false;
                }
            }

            $this->create();
        }
    }

}



?>








