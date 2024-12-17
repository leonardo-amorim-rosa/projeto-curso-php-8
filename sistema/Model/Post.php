<?php

namespace sistema\Model;

use sistema\Core\DBConnection;

/**
 * Description of Post
 *
 * @author leoam
 */
class Post
{
    /**
     * Find all posts in database
     * @return array
     */
    public function findAll(): array
    {
        $query = "SELECT * FROM posts";
        $stmt = DBConnection::getInstance()->query($query);
        return $stmt->fetchAll();
    }
    
    /**
     * Find post by id
     * @param int $id
     * @return type
     */
    public function findById(int $id): bool|object
    {
        $query = "SELECT * FROM posts WHERE id = {$id}";
        $stmt = DBConnection::getInstance()->query($query);
        $result = $stmt->fetch();
        return $result;       
    }
}
