<?php
    class connect {
        private $conn;
        public function __construct() {
            $host = "localhost";
            $user = "root";
            $passwd = "";
            $db = "playoffsdb";
            try {
                $this->conn = new PDO("mysql:host={$host};dbname={$db};charset=utf8", $user, $passwd);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $_SESSION['error'] = "Connection failed: " . $e->getMessage();
            }
        }
        public function getConn() { return $this->conn; }
    }
?>