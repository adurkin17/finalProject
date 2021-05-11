<?php 
class quotesClass{

    private $conn;

    public $id;
    public $author;
    public $quote;
    public $categoryid;
    public $category;
    public $authorid;

    public __construct($db)
    {
        $this->conn = $db;
    }

    public function read(){
        $query = 'SELECT Q.id, Q.quote, A.author, C.category  FROM quotes Q LEFT JOIN author A ON Q.authorid = A.id LEFT JOIN category C ON Q.categoryid = c.id ORDER BY id';
        $statement = $this->conn->prepare($query);
        $statement->execute();
        return $statement;
    }

    public function read_single() {
        $query = 'SELECT Q.id, Q.quote, A.author, C.category  FROM quotes Q LEFT JOIN author A ON Q.authorid = A.id LEFT JOIN category C ON Q.categoryid = c.id WHERE Q.id = ?'
        $statement = $this->conn->prepare($query);
        $statement->bindParam(1,$this->id);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
    
        $this->id = $row['id'];
        $this->author = $row['author'];
        $this->quote = $row['quote'];
        $this ->category = $row['category'];

    }

    public function create() {
        $query = 'INSERT INTO quotes SET authorid = :authorid, quote=:quote, categoryid = :categoryid';
        $statement = $this->conn->prepare($query);

        $this->authorid = htmlspecialchars(strip_tags($this->authorid));
        $this->categoryid = htmlspecialchars(strip_tags($this->categoryid));
        $this->quote = htmlspecialchars(strip_tags($this->quotes));

        $statement->bindParam(':quotes',$this->quotes);
        $statement->bindParam(':authorid',$this->authorid);
        $statement->bindParam(':categoryid',$this->categoryid);

        if($stmt->execute()) {
            return true;
          }
        
          // Print error if something goes wrong
          printf("Error: $s.\n", $stmt->error);
        
          return false;
    }

    public function delete() {
        $query = 'DELETE FROM quotes WHERE id = :id';
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

        $query = 'UPDATE quotes SET quote = :quote, authorid = :authorid, categoryid = :categoryid WHERE id = :id';
        $statement = $this->conn->prepare($query);

        $this->authorid = htmlspecialchars(strip_tags($this->authorid));
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->categoryid = htmlspecialchars(strip_tags($this->categoryid));
        $this->quote = htmlspecialchars(strip_tags($this->quote));

        $statement->bindParam(':id',$this->id);
        $statement->bindParam('author',$this->categoryid);
        $statement->bindParam(':id',$this->quote);
        $statement->bindParam('author',$this->authorid);


        if($stmt->execute()) {
            return true;
          }
        
          // Print error if something goes wrong
          printf("Error: $s.\n", $stmt->error);
        
          return false;
    }
}
}