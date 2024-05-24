<?php

require_once 'src/Entities/Category.php';

class CategoryModel
{
    public static function getCategories(PDO $db): array
    {
        $query = $db->prepare('
            SELECT `categories`.`id`, `categories`.`name`, SUM(`products`.`stock`)
            AS `total_stock`
            FROM `categories`
            LEFT JOIN `products`
            ON `categories`.`id` = `products`.`category_id`
            GROUP BY `categories`.`id`, `categories`.`name`;');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Category::class);
        return $query->fetchAll();
    }

    public static function getCategoryById(int $category_id, PDO $db): Category | false
    {
        $query = $db->prepare('SELECT `categories`.`name`, `categories`.`id`
        FROM `categories`
        WHERE `id` = :category_id');
        $query->execute([':category_id' => $category_id]);
        $query->setFetchMode(PDO::FETCH_CLASS, Category::class);
        return $query->fetch();
    }

}