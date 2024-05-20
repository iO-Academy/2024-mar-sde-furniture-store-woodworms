<?php

require_once 'src/Entities/Categories.php';

Class CategoriesModel{

    public static function getCategories(PDO $db){
        $query = $db->prepare('SELECT `id`, `name` FROM `categories`;');
        $query->execute();

        $query->setFetchMode(PDO::FETCH_CLASS, Categories::class);
        return $query->fetchAll();
    }

}