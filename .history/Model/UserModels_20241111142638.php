<?php 
    require_once 'Config/db.php';

    class UserModels {
        private $conn;

        public function __construct()
        {
            global $conn;
            $this->conn = $conn;
        }
    }
?>