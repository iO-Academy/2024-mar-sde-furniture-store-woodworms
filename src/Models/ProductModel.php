<?php

require_once 'src/Entities/ProductEntity.php';

class ProductModel
{
    public static function getProductByCatId(int $cat_id, PDO $db): array
    {
        $query = $db->prepare('SELECT `categories`.`name`, `products`.`id`, 
       `products`.`price`, `products`.`stock`, `products`.`color`
        FROM `products`
        LEFT JOIN `categories`
        ON `products`.`category_id`=`categories`.`id`
        WHERE `category_id` = :cat_id');
        $query->execute([':cat_id' => $cat_id]);
        $query->setFetchMode(PDO::FETCH_CLASS, ProductEntity::class);
        return $query->fetchAll();
    }

    public static function getIndividualProduct($id, PDO $db): array
    {
        $query = $db->prepare('SELECT `products`.`id`, `products`.`width`, 
       `products`.`price`, `products`.`height`, `products`.`color`, `products`.`depth` FROM `products` 
        WHERE `id` = :id');
        $query->execute([':id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, ProductEntity::class);
        return $query->fetchAll();
    }
}