<?php

require_once 'src/Entities/Product.php';

class ProductModel
{
    public static function getProductList($cat_id, PDO $db): array
    {
        $query = $db->prepare('SELECT `categories`.`name`, `products`.`id`, 
       `products`.`price`, `products`.`stock`, `products`.`color`
        FROM `products`
        LEFT JOIN `categories`
        ON `products`.`category_id`=`categories`.`id`
        WHERE `category_id` = :cat_id');
        $query->execute([':cat_id' => $cat_id]);
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $query->fetchAll();
    }
}