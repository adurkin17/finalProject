<?php
    class Database { 
        //local development server connection
        private  $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
        private  $username = 'root';
        private $conn;

        public function connect(){
            $this->conn = null;

            try {
                $this->conn = new PDO($this->$dsn, $this->$username);
                $this->conn ->setAttribbute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }
        }
        return $this->conn;
    }