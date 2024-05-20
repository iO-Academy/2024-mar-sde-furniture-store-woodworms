<?php

require_once 'src/Entities/Categories.php';

Class CategoriesModel{

    public static function getCategories(PDO $db){
        $query = $db->prepare('
            SELECT `categories`.`id`, `categories`.`name`, SUM(`products`.`stock`)
            AS `total_stock`
            FROM `categories`
            LEFT JOIN `products`
            ON `categories`.`id` = `products`.`category_id`
            GROUP BY `categories`.`id`, `categories`.`name`;');
        $query->execute();

        $query->setFetchMode(PDO::FETCH_CLASS, Categories::class);
        return $query->fetchAll();
    }

}