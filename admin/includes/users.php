<?php include_once "init.php" ?>
<?php include_once "db_object.php" ?>
<?php

class Users extends Db_object
{
    protected static $table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $password;

    public static function verify_user($username, $password)
    {
        global $database;

        $username = $database->escaprString($username);
        $password = $database->escaprString($password);

        $sql = "SELECT * FROM " . self::$table ." WHERE username = '$username' AND password= '$password' LIMIT 1";
        $resultArray = self::findQuery($sql);
        return !empty ($resultArray) ? array_shift($resultArray) : false;
    }








}

?>