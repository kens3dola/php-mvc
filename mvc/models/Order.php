<?php

class Order
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getOrder($account_id)
        {
                $sql_select = 'select * form orders where $account_id = :account_id and date=NULL';
                $stmt = $this->db->prepare($sql_select);
                $stmt->bindParam(':account_id', $account_id);
                $r = $this->db->query($sql_select);
                if ($r->num_rows == 0) {
                        $this->addOrder(['date' => 'NULL', 'type' => 'order', 'amount' => '0', 'account_id' => $account_id]);
                        return $this->db->qurey($sql_select);
                } else {
                        return $r;
                }
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
