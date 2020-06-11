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

        public function addItem($data)
        {
                try {
                        $sql = "INSERT INTO `items` (`name`,`description`,`price`) VALUES
                        (:name, :description, :price)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(':name', $data['name']);
                        $stmt->bindParam(':description', $data['description']);
                        $stmt->bindParam(':price', $data['price']);
                        $stmt->execute();
                } catch (PDOException $e) {
                        echo $e->getMessage();
                }
        }
}
