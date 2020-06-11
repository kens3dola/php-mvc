<?php

class DB
{

    private $dbc;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "restaurant";

    function __construct()
    {
        $this->dbc = @mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die('Could not connect to Mysql: ' . mysqli_connect_error());
        mysqli_query($this->dbc, "SET NAMES 'utf8'");
    }

    public function getDbc()
    {
        return $this->dbc;
    }
}
