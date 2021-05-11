<?php
    class Database { 
        //local development server connection
       /* private  $dsn = 'mysql:host=localhost;dbname=quotesdb';
        private  $username = 'root';*/

        private static $dsn = 'mysql:host=y5svr1t2r5xudqeq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=pgty17iti0nn8gzc';
        private static $username = 'olgxi5spjrud3c2v';
        private static $password = 'jbfdc81652a30th4';
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