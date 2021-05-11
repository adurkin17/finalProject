<?php 
class categoryClass{

    public static function get_category() {
        $db = Database::getDB();
        $query = 'SELECT * FROM category ORDER BY id';
        $statement = $db->prepare($query);
        $statement->execute();
        $category = $statement->fetchAll();
        $statement->closeCursor();
        return $category;
    }

    public static function get_category_name($category_id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM category WHERE id = :category_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $category = $statement->fetch();
        $statement->closeCursor();
        $category_name = $categor['Category'];
        return $category_name;
    }

}