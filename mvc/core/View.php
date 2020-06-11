<?php

class View
{
        protected $view_file;
        protected $view_data;
        protected $view_tempalte;

        public function __construct($view_tempalte, $view_file, $view_data)
        {
                $this->view_file = $view_file;
                $this->view_data = $view_data;
                $this->view_tempalte = $view_tempalte;
        }

        public function render()
        {
                if (file_exists('./mvc/views/' . $this->view_tempalte . '.php')) {
                        include './mvc/views/' . $this->view_tempalte . '.php';
                }
        }
}
