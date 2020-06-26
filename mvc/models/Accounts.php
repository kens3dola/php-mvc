<?php

class Accounts
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getAccount($id)
        {
                $sql = "select * from accounts where id = $id";
                return mysqli_query($this->db, $sql);
        }

        public function getAccounts()
        {
                $sql = "select * from accounts where role='customer'";
                return mysqli_query($this->db, $sql);
        }

        public function validate($username, $password)
        {
                $sql = "SELECT * FROM `accounts` WHERE `username`='$username' AND `password`='$password'";
                return mysqli_query($this->db, $sql);
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
        public function delete($id)
        {
                $sql = "delete from accounts where id=$id";
                return mysqli_query($this->db, $sql);
        }
        public function update($id, $username, $password, $role)
        {
                $sql = "update accounts set username='$username', password='$password', role='$role' where id=$id";
                return mysqli_query($this->db, $sql);
        }

        public function changePassword($id, $newPass)
        {
                $sql = "update accounts set password='$newPass' where id=$id";
                return mysqli_query($this->db, $sql);
        }
}
