<?php
{
    class authorClass {
        public static function get_author() {
            $db = Database::getDB();
            $query = 'SELECT * FROM author ORDER BY id';
            $statement = $db->prepare($query);
            $statement->execute();
            $author = $statement->fetchAll();
            $statement->closeCursor();
            return $author;
        }
    
        public static function get_author_name($author_id) {
            $db = Database::getDB();
            $query = 'SELECT * FROM author WHERE id = :author_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':author_id', $author_id);
            $statement->execute();
            $author = $statement->fetch();
            $statement->closeCursor();
            $author_name = $author['author'];
            return $author_name;
        }
}