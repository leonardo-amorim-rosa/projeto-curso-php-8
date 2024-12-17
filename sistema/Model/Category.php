<?php

namespace sistema\Model;

use sistema\Core\DBConnection;

/**
 * Description of Category
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
}
