<?php
class Controller
{
    protected $dbc;
    protected $view;

    public function __construct()
    {
        require_once './mvc/core/DB.php';
        $db = new DB();
        $this->dbc = $db->getDbc();
    }

    public function model($model)
    {
        require_once "./mvc/models/" . $model . ".php";
        return new $model($this->dbc);
    }

    public function view($view_template, $view_file, $view_data = [])
    {
        require_once "./mvc/core/View.php";
        $this->view = new View($view_template, $view_file, $view_data);
        return $this->view;
    }
}
