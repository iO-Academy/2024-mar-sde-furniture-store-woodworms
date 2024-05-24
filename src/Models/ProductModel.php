<?php

require_once 'src/Entities/Product.php';

class ProductModel
{
    public static function getProductByCategoryId(int $category_id, PDO $db): array
    {
        $query = $db->prepare('SELECT `categories`.`name`, `products`.`id`, 
       `products`.`price`, `products`.`stock`, `products`.`color`
        FROM `products`
        LEFT JOIN `categories`
        ON `products`.`category_id`=`categories`.`id`
        WHERE `category_id` = :category_id');
        $query->execute([':category_id' => $category_id]);
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $query->fetchAll();
    }
}