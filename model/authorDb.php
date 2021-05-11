<?php
{
    class authorClass {

        private $conn;

        public $id;
        public $author;

        public __construct($db)
        {
            $this->conn = $db;
        }

        public function read(){
            $query = 'SELECT * FROM author ORDER BY id';
            $statement = $this->conn->prepare($query);
            $statement->execute();
            return $statement;
        }

        public function read_single() {
            $query = 'SELECT * FROM author WHERE id = ?';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(1,$this->id);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        
            $this->id = $row['id'];
            $this->author = $row['author'];

        }
    
        public function create() {
            $query = 'INSERT INTO author SET author = :author';
            $statement = $this->conn->prepare($query);

            $this->author = htmlspecialchars(strip_tags($this->author));

            $statement->bindParam(':author',$this->author);

            if($stmt->execute()) {
                return true;
              }
            
              // Print error if something goes wrong
              printf("Error: $s.\n", $stmt->error);
            
              return false;
        }

        public function delete() {
            $query = 'DELETE FROM author WHERE id = :id';
            $statement = $this->conn->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));

            $statement->bindParam(':id',$this->id);

            if($stmt->execute()) {
                return true;
              }
            
              // Print error if something goes wrong
              printf("Error: $s.\n", $stmt->error);
            
              return false;
        }
        public function update(){

            $query = 'UPDATE author SET author = :author WHERE id = :id';
            $statement = $this->conn->prepare($query);

            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->id = htmlspecialchars(strip_tags($this->id));

            $statement->bindParam(':id',$this->id);
            $statement->bindParam(':author',$this->author);

            if($stmt->execute()) {
                return true;
              }
            
              // Print error if something goes wrong
              printf("Error: $s.\n", $stmt->error);
            
              return false;
        }
    }
}