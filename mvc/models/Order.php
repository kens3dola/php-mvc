<?php

class Order
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getOrder()
        {
                $sql = 'select * form orders';
                return $this->db->query($sql);
        }

        public function addOrder($data)
        {
                try {
                        $sql = "INSERT INTO `orders` (`date`,`type`,`amount`, `account_id`) VALUES
                        (:date, :type, :amount,:account_id)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(':date', $data['date']);
                        $stmt->bindParam(':type', $data['type']);
                        $stmt->bindParam(':amount', $data['amount']);
                        $stmt->bindParam(':account_id', $data['account_id']);
                        $stmt->execute();
                } catch (PDOException $e) {
                        echo $e->getMessage();
                }
        }
}
