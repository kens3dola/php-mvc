<?php

class View
{
        protected $view_file;
        protected $view_data;
        protected $view_template;

        public function __construct($view_template, $view_file, $view_data)
        {
                $this->view_file = $view_file;
                $this->view_data = $view_data;
                $this->view_template = $view_template;
        }

        public function render()
        {
                if (file_exists('./mvc/views/' . $this->view_template . '.php')) {
                        include './mvc/views/' . $this->view_template . '.php';
                }
        }
}
