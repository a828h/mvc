<?php

namespace App\Models;

use PDO;

class Device extends \Core\Model
{

    public static function get($id)
    {
    
        try {
            $db = static::getDB();

            $stmt = $db->query("SELECT * FROM devices where id = $id");
            $result = $stmt->fetch();

            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAll()
    {
    
        try {
            $db = static::getDB();

            $stmt = $db->query('SELECT * FROM devices ');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insert($name)
    {
    
        try {
            $db = static::getDB();

            $sql = 'INSERT INTO devices (name) VALUES (:name)';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $result = $stmt->execute();
            $id = $db->lastInsertId();

            return $id;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
