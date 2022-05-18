<?php

    class database {
        protected $db_connection;
        public $db_name = 'd6-invoice';
        public $db_user = 'root';
        public $db_pass = 'DevTK77';
        public $db_host = 'localhost';
        public $db_dsn = 'mysql:host=localhost';
        public $dsn = 'mysql:host=localhost;dbname=d6-invoice';

        function connect() {
            try {
                $this->db_connection = new PDO($this->dsn,$this->db_user,$this->db_pass);
                $this->db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->db_connection;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function link() {
            try {
                $this->db_connection = new PDO($this->dsn, $this->db_user, $this->db_pass);
                $this->db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->db_connection;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }

?>
