<?php
class Controller
{
    protected $dbc;
    protected $view;
    protected $requiredRole = 'login';
    public function __construct()
    {
        require_once './mvc/core/DB.php';
        $db = new DB();
        $this->dbc = $db->getDbc();
    }

    public function model($model)
    {
        if ($model != "Account") {
            require_once "./mvc/models/" . $model . ".php";
        }
        return new $model($this->dbc);
    }

    public function view($view_template, $view_file, $view_data = [])
    {
        require_once "./mvc/core/View.php";
        $this->view = new View($view_template, $view_file, $view_data);
        return $this->view;
    }

    public function getRequiredRole()
    {
        return $this->requiredRole;
    }

    public function setRequiredRole($role)
    {
        $this->requiredRole = $role;
    }
}
