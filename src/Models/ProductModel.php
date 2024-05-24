<?php

require_once 'src/Entities/ProductEntity.php';

class ProductModel
{
    public static function getProductByCatId(int $cat_id, PDO $db): array
    {
        $query = $db->prepare('SELECT `categories`.`name`, `products`.`id`, 
       `products`.`price`, `products`.`stock`, `products`.`color`, 
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
       `products`.`price`, `products`.`height`, `products`.`color`, `products`.`depth`, `products`.`related` FROM `products`
        WHERE `id` = :id');
        $query->execute([':id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, ProductEntity::class);
        return $query->fetchAll();
    }

//    public static function getRelatedProduct($related, PDO $db): array
//    {
//        $query = $db->prepare('SELECT `products`.`related`, `products`.`id`, `products`.`color`, `products`.`price`
//        FROM `products`
//        WHERE `related` = :related');
//        $query->execute([':related' => $related]);
//        $query->setFetchMode(PDO::FETCH_CLASS, ProductEntity::class);
//        return $query->fetchAll();
//    }

    public static function getRelatedByID(int $id, PDO $db): array
    {
        $query = $db->prepare('SELECT `products`.`id`, 
   `products`.`price`, `products`.`stock`, `products`.`color`, `products`.`related`
    FROM `products`
    WHERE `related` = :related');
        $query->execute([':related' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, ProductEntity::class);
        return $query->fetchAll();
    }


}

