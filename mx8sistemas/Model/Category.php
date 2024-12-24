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
        $query = "SELECT * FROM categories ORDER BY id DESC";
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
    
    /**
     * Save category in database
     * @param array $dados
     * @return void
     */
    public function save(array $dados): void
    {
        $query = "INSERT INTO categories (title, description, status) VALUES (?, ?, ?)";
        $stmt = DBConnection::getInstance()->prepare($query);
        $stmt->execute([$dados['title'], $dados['description'], $dados['status']]);
    }
    
    /**
     * Update category in database
     * @param array $data
     * @return void
     */
    public function update(array $data): void
    {
        $query = "UPDATE categories SET title = :title, description = :description, status = :status "
                . "WHERE id = :id";
        $stmt = DBConnection::getInstance()->prepare($query);
        $stmt->execute($data);
    }    
}
