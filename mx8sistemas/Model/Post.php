<?php

namespace mx8sistemas\Model;

use mx8sistemas\Core\DBConnection;

/**
 * Post Model
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
        $query = "SELECT * FROM posts ORDER BY id DESC";
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
    
    /**
     * Search posts by partial text
     * @param string $text
     * @return array
     */
    public function search(string $text): array
    {
        $query = "SELECT * FROM posts WHERE status = 1 "
                . "AND title LIKE '%{$text}%' ORDER BY id DESC";
        $stmt = DBConnection::getInstance()->query($query);
        $result = $stmt->fetchAll();
        return $result;               
    }
    
    /**
     * Save post in database
     * @param array $dados
     * @return void
     */
    public function save(array $dados): void
    {
        $query = "INSERT INTO posts (category_id, title, body, status)"
                . " VALUES (:category_id, :title, :body, :status)";
        $stmt = DBConnection::getInstance()->prepare($query);
        $stmt->execute($dados);
    }
    
}
