<?php
include 'App/Config.php';
abstract class Model
{
    protected $attributes;
    protected $table;
    protected $id;

//    public function __construct($id)
//    {
//        $this->id = $id;
//    }

    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
            // показывать предупреждение если есть ошибки
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }

    public  function getAll()
    {
        $table = $this->table;
        $db = static::getDB();
        $attributes = $db->query("SELECT * FROM $table");
        return $attributes->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getById()
    {
        $id = Router::getInstance()->getId();
        $db = self::getDB();
        $sql = $db->query("SELECT $this->attributes FROM $this->table WHERE id = $id");
        foreach ($sql as $render){
            return $render;
        }
    }

    public function putDB($data)
    {
        $attributes = implode(',', $this->attributes);
        var_dump($attributes);
        $db = static::getDB();
        $stmt = "INSERT INTO $this->table ($attributes) VALUES (NULL, '$data')";
        var_dump($stmt);
        $query = $db->query($stmt);

    }


    public function create ($data)
    {
        $attributes = implode("','", $data);
        $this->putDB($attributes);
        return $data;

    }

        public function delete()
        {
            $id = Router::getInstance()->getId();
            $db = static::getDB();
            $sql = "DELETE FROM $this->table WHERE id= $id";
            return $db->query($sql);

        }






}