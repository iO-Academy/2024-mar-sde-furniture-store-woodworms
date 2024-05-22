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

    public static function getProductTitle($cat_id, PDO $db) : string
    {
        $query = $db->prepare('SELECT `categories`.`name`
        FROM `categories`
        WHERE `id` = :cat_id');
        $query->execute([':cat_id' => $cat_id]);
        $cat_array =  $query->fetch();
        return $cat_array['name'];
    }

    public static function getNumberOfCategories(PDO $db) : int
    {
        $query = $db->prepare('SELECT `categories`.`name`
        FROM `categories`');
        $query->execute();
        $q = $query->fetchAll();
        return count($q);
    }

}