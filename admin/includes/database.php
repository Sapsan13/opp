<?php

require_once "new_config.php";

class Database
{
   public $connection;

    function __construct()
    {
        $this->openDbConnection();
    }
    public function openDbConnection()
    {
        $this->connection = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_errno) {
            die ("DatabaseconnectionFAILED" . mysqli_error());
        }
    }

    public function query($sql)
    {
        $result = mysqli_query($this->connection,$sql);


        return $result;

    }

    private function confirm_query($result)
    {
        if (!$result) {
            die("Query failed");
        }
    }

    public function escaprString($string)
    {
        $escaped_string = mysqli_real_escape_string($this->connection, $string);
        return $escaped_string;
    }

    public function the_insert_id(){



        return mysqli_insert_id($this->connection);

    }

}
$database = new Database();
?>


