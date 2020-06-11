<?php

class OrderLine
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getOrderLine()
        {
                $sql = 'select * form order_lines';
                return $this->db->query($sql);
        }

        public function addOrderLine($data)
        {
                try {
                        $sql = "INSERT INTO `order_lines` (`item_id`,`item_quantity`,`amount`, `order_id`) VALUES
                        (:item_id, :item_quantity, :amount,:order_id)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(':item_id', $data['item_id']);
                        $stmt->bindParam(':item_quantity', $data['item_quantity']);
                        $stmt->bindParam(':amount', $data['amount']);
                        $stmt->bindParam(':order_id', $data['order_id']);
                        $stmt->execute();
                } catch (PDOException $e) {
                        echo $e->getMessage();
                }
        }
}
