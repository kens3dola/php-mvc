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
                $sql = 'select * form tables';
                return $this->db->query($sql);
        }

        public function addTable($data)
        {
                $sql = 'insert into tables values(:';
                try {
                        $sql = "INSERT INTO `tables` (`chairs_count`) VALUES
                        (:chairs_count)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(':chairs_count', $data['chairs_count']);
                        $stmt->execute();
                } catch (PDOException $e) {
                        echo $e->getMessage();
                }
        }
}
