<?php 
class quotesDB{

    public static function get_quotes_by_category($category_id) {
        $db = Database::getDB();  
        $query = 'SELECT q.id, a.author, c.category
        FROM quote q 
        LEFT JOIN author a ON q.authorID = a.id
        LEFT JOIN category c ON q.categoryid = c.id 
        WHERE c.categoryid = :category_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $quotes = $statement->fetchAll();
        $statement->closeCursor();
        return $quotes;
    }

    public static function get_all_quotes() {
        $db = Database::getDB();
        $query = 'SELECT q.id, a.author, c.category
        FROM quote q 
        LEFT JOIN author a ON q.authorID = a.id
        LEFT JOIN category c ON q.categoryid = c.id';
        $statement = $db->prepare($query);
        $statement->execute();
        $quotes = $statement->fetchAll();
        $statement->closeCursor();
        return $quotes;
    }

    public static function get_quotes_by_author($author_id) {
        $db = Database::getDB();
        $query = 'SELECT q.id, a.author, c.category
        FROM quote q 
        LEFT JOIN author a ON q.authorID = a.id
        LEFT JOIN category c ON q.categoryid = c.id 
        WHERE a.authorid = :author_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':author_id', $author_id);
        $statement->execute();
        $quotes = $statement->fetchAll();
        $statement->closeCursor();
        return $quotes;
    }

    public static function delete_quote($quote_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM quote WHERE id = :quote_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $statement->closeCursor();
    }
}