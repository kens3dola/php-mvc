<?php

class Item
{

        private $db;

        public function __construct($dbc)
        {
                $this->db = $dbc;
        }

        public function getItems()
        {
                $sql = 'select * from items';
                return mysqli_query($this->db, $sql);
        }

        public function getItem($id)
        {
                $sql = "select * from items where id=$id";
                return mysqli_query($this->db, $sql);
        }

        public function delete($id)
        {
                $sql = "delete from items where id=$id";
                return mysqli_query($this->db, $sql);
        }
        public function update($id, $name, $description, $price, $image)
        {
                $sql = "update items set name='$name', description='$description', price=$price, image='$image' where id=$id";
                return mysqli_query($this->db, $sql);
        }
        public function insert($id, $name, $description, $price, $image)
        {
                $sql = "insert into items(name, description, price, image) value ('$name', '$description', $price, '$image')";
                return mysqli_query($this->db, $sql);
        }
}
