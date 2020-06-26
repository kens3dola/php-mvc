<?php

use function PHPSTORM_META\type;

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

        public function insert($table_id, $start, $end, $account_id)
        {
                $s = date_format($start, 'Y/m/d H:i:s');
                $e = date_format($end, 'Y/m/d H:i:s');
                $sql = "INSERT INTO `tables_track` (`table_id`,`start`,`end`,`account_id`) VALUES
                        ($table_id,'$s','$e',$account_id)";
                echo $sql;
                return mysqli_query($this->db, $sql);
        }

        public function getUnavailable($start, $end)
        {
                $s = date_format($start, 'Y/m/d H:i:s');
                $e = date_format($end, 'Y/m/d H:i:s');
                $sql = "select * from tables_track where start='$s' or end='$e' or (start>'$s' and start<'$e') or (end>'$s' and end<'$e')";
                return mysqli_query($this->db, $sql);
        }

        public function getReservations()
        {
                $sql = "select * from tables_track";
                return mysqli_query($this->db, $sql);
        }
}
