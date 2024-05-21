<?php

class PdoFactory
{
    public static function connect(): PDO
    {
        $db = new PDO('mysql:host=DB;dbname=furniture_store', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }
}