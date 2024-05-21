<?php

require_once 'src/Entities/Product.php';

class ProductModel
{
    public static function getProductList(PDO $db): array
    {
        $query = $db->prepare('
            SELECT `categories`.`name`, `products`. `id`, `products`. `price`, `products`.`stock`, `products`. `color`
            FROM `products`
            LEFT JOIN  `categories`
            ON `products`.`category_id` = `categories`.`id`');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $query->fetchAll();
    }
}