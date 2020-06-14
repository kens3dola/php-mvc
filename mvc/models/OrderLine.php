<?php

class OrderLine
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getOrderLines($order_id)
        {
                $sql = "select l.id, l.item_id, l.item_quantity, l.amount, l.order_id, i.name, i.description, i.image from order_lines as l
                 inner join items as i on l.item_id=i.id where order_id=$order_id";
                return mysqli_query($this->db, $sql);
        }

        public function addOrderLine($data)
        {
                $sql_select = "select * from order_lines where order_id={$data['order_id']} and item_id={$data['item_id']}";
                $r = mysqli_query($this->db, $sql_select);
                if ($r->num_rows == 0) {
                        $sql_insert = "INSERT INTO `order_lines` (`item_id`,`item_quantity`,`amount`, `order_id`) VALUES
                        ({$data['item_id']}, {$data['item_quantity']}, {$data['amount']},{$data['order_id']})";
                        mysqli_query($this->db, $sql_insert);
                } else {
                        $row = mysqli_fetch_assoc($r);
                        $quantity =  (int) $row['item_quantity'] + (int) $data['item_quantity'];
                        $sql_update = "UPDATE `order_lines` set `item_quantity`=$quantity where  `id`={$row['id']}";
                        mysqli_query($this->db, $sql_update);
                }
        }
        public function delete($id)
        {
                $sql = "delete from order_lines where id=$id";
                mysqli_query($this->db, $sql);
        }
}
