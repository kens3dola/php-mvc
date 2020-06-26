<?php

class Table
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getTables()
        {
                $sql = "select * from tables";
                return mysqli_query($this->db, $sql);
        }

        public function insert()
        {
                $sql = 'insert into tables(chairs_count) values(6)';
                return mysqli_query($this->db, $sql);
        }

        public function delete($id)
        {
                $sql = "delete from tables where id=$id";
                return mysqli_query($this->db, $sql);
        }
}
