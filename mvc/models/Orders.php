<?php

class Orders
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getOrder($account_id)
        {
                $sql_select = "select * from orders where `account_id`=$account_id and date is null";
                $r = mysqli_query($this->db, $sql_select);
                if ($r->num_rows == 0) {
                        $this->addOrder(['date' => 'NULL', 'type' => 'order', 'amount' => '0', 'account_id' => $account_id]);
                        return mysqli_query($this->db, $sql_select);
                } else {
                        return $r;
                }
        }

        public function addOrder($data)
        {
                $date = $data['date'];
                $type = $data['type'];
                $amount = $data['amount'];
                $account_id = $data['account_id'];
                $sql = "INSERT INTO `orders` (`date`,`type`,`amount`, `account_id`) VALUES
                        ($date,'$type',$amount,$account_id)";
                return mysqli_query($this->db, $sql);
        }

        public function updatePrice($id, $price)
        {
                $sql = "update orders set amount=$price where id=$id";
                return mysqli_query($this->db, $sql);
        }

        public function submitOrder($date, $account_id)
        {
                $sql = "update orders set date='$date' where account_id=$account_id and date is null";
                return mysqli_query($this->db, $sql);
        }
}
