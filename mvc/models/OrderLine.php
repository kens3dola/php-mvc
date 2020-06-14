<?php

class OrderLine
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getOrderLine($order_id)
        {
                $sql = 'select * form order_lines';
                return $this->db->query($sql);
        }

        public function addOrderLine($data)
        {
                $sql_select = 'select * form order_lines where order_id=:order_id and item_id=:item_id';
                $stmt = $this->db->prepare($sql_select);
                $stmt->bindParam(':order_id', $data['order_id']);
                $stmt->bindParam(':item_id', $data['item_id']);
                $r = $this->db->query($sql_select);
                if ($r->num_rows == 0) {
                        $sql = "INSERT INTO `order_lines` (`item_id`,`item_quantity`,`amount`, `order_id`) VALUES
                        (:item_id, :item_quantity, :amount,:order_id)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(':item_id', $data['item_id']);
                        $stmt->bindParam(':item_quantity', $data['item_quantity']);
                        $stmt->bindParam(':amount', $data['amount']);
                        $stmt->bindParam(':order_id', $data['order_id']);
                        $stmt->execute();
                } else {
                        $row = mysqli_fetch_assoc($r);
                        $sql = "UPDATE `order_lines` set `item_quantity`=:item_quantity where  `id`=:id";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(':item_quantity', (int) $row['quantity'] + (int) $data['item_quantity']);
                        $stmt->bindParam(':id', $row['id']);
                        $stmt->execute();
                }
        }
}
