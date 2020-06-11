<?php

class Customer
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getCustomers()
        {
                $sql = 'select * form customers';
                return $this->db->query($sql);
        }

        public function addCustomer($data)
        {
                try {
                        $sql = "INSERT INTO `customers` (`account_id`,`name`,`address`,`phone`) VALUES
                        (:account_id, :name, :address, :phone)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(':accpunt_id', $data['account_id']);
                        $stmt->bindParam(':name', $data['name']);
                        $stmt->bindParam(':address', $data['address']);
                        $stmt->bindParam(':phone', $data['phone']);
                        $stmt->execute();
                } catch (PDOException $e) {
                        echo $e->getMessage();
                }
        }
}
