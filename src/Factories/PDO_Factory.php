<?php

class PDO_Factory
{
    public static function connect(): PDO
    {
        $db = new PDO('mysql:host=DB;dbname=FurnitureStore', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }
}