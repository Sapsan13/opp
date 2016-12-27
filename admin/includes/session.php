<?php
class Session
{
    private $signed_in = false;
    public $id;
    function  __construct()
    {
        session_start();
        $this->check_the_login();
    }
    public function is_signed_in()
    {    //GETTER
        return $this->signed_in;

    }
    public function login($user)
    {
        if ($user) {
            $this->id = $_SESSION['id'] = $user->id;
            $this->signed_in = true;

        }
    }
    public function logout()
    {
        unset($_SESSION['id']);
        unset($this->id);
        $this->signed_in = false;
    }
    private function check_the_login()
    {
        if (isset($_SESSION['id'])) {
            $this->id = $_SESSION ['id'];
            $this->signed_in = true;
        } else {
            unset ($this->id);
            $this->signed_in = false;
        }
    }
}
$session = new Session();