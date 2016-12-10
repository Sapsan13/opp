<?php include_once "DBconst.php" ?>
<?php
class Connection
{
    public $firvar;
    public $connect;

    function __construct()
    {
        $this->ConnectDb();
    }

    public function ConnectDb()
    {
        $this->connect = new mysqli(HOST_DB, USER_DB, PASS_DB, NAME_DB);
        if (!$this->connect->connect_error) {
            die ("DatabaseconnectionFAILED" . mysqli_error());
        }
    }


    public function query($sql)
    {
        $result=mysqli_query($this->connect,$sql);
        return $result;
    }

    public function realEscape($string){

        $realString = mysqi_real_escape_string($this->connect,$string);
        return $realString;
    }
}

$database = new Connection();