<?php

class TableTrack
{

        private $db;

        public function __construct($db)
        {
                $this->db = $db;
        }

        public function getTables()
        {
                $sql = 'select * form tables_track';
                return $this->db->query($sql);
        }

        public function addTableTrack($data)
        {
                try {
                        $sql = "INSERT INTO `tables_track` (`table_id`,`order_id`,`start`,`end`) VALUES
                        (:table_id,:order_id,:start,:end)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindParam(':table_id', $data['table_id']);
                        $stmt->bindParam(':order_id', $data['order_id']);
                        $stmt->bindParam(':start', $data['start']);
                        $stmt->bindParam(':end', $data['end']);
                        $stmt->execute();
                } catch (PDOException $e) {
                        echo $e->getMessage();
                }
        }
}
