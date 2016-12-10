<?php

class Crud{

    private $var;

    public function createUser($username,$password){


        $sql= "CREATE USER username='$username' passord='$password'";




    }


}
