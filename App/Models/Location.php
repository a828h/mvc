<?php

namespace App\Models;

use PDO;

class Location extends \Core\Model
{

    public static function getAll()
    {
    
        try {
            $db = static::getDB();

            $stmt = $db->query('SELECT * FROM locations ');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insert($deviceId, $x, $y)
    {
    
        try {
            $db = static::getDB();

            $sql = 'INSERT INTO locations (device_id, x, y) VALUES (:device_id, :x, :y)';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':device_id', $deviceId, PDO::PARAM_INT);
            $stmt->bindParam(':x', $x, PDO::PARAM_INT);
            $stmt->bindParam(':y', $y, PDO::PARAM_INT);
            $result = $stmt->execute();
            $id = $db->lastInsertId();

            return $id;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
