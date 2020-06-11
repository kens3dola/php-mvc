<?php

class Account
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getAccounts()
        {
                $sql = 'select * form accounts';
                return $this->db->query($sql);
        }

        public function addAccount($data)
        {
                try {
                        $sql = "INSERT INTO `accounts` (`username`,`password`,`role`) VALUES
                        (:username, :password, :role)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(':username', $data['username']);
                        $stmt->bindParam(':password', $data['password']);
                        $stmt->bindParam(':role', $data['role']);
                        $stmt->execute();
                } catch (PDOException $e) {
                        echo $e->getMessage();
                }
        }
}
