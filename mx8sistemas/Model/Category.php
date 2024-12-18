<?php

namespace mx8sistemas\Model;

use mx8sistemas\Core\DBConnection;

/**
 * Category Model
 *
 * @author leoam
 */
class Category
{
    /**
     * Find all categories in database
     * @return array
     */
    public function findAll(): array
    {
        $query = "SELECT * FROM categories ORDER BY title ASC";
        $stmt = DBConnection::getInstance()->query($query);
        return $stmt->fetchAll();
    }
    
    /**
     * Find category by id
     * @param int $id
     * @return type
     */
    public function findById(int $id): bool|object
    {
        $query = "SELECT * FROM categories WHERE id = {$id}";
        $stmt = DBConnection::getInstance()->query($query);
        $result = $stmt->fetch();
        return $result;       
    }
    
    /**
     * Find posts from category
     * @param int $categoryId
     * @return array
     */
    public function findPostsByCategory(int $categoryId): array
    {
        $query = "SELECT * FROM posts WHERE category_id = {$categoryId} AND status = 1";
        $stmt = DBConnection::getInstance()->query($query);
        $result = $stmt->fetchAll();
        return $result;               
    }
}
