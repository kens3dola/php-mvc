<?php

class Home extends Controller
{

    function index()
    {
        $this->view("default", "pages/home");
        $this->view->render();
    }

    function menu()
    {
        $item_model = $this->model("Item");
        $list_items = $item_model->getItems();
        $this->view("default", "pages/menu", $list_items);
        $this->view->render();
    }
}
