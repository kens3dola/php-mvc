<?php

class Home extends Controller
{

    function
    index()
    {
        $this->view("default", "pages/home");
        $this->view->render();
    }
}
