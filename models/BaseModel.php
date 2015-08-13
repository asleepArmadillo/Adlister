<?php

define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'adlister_db'); 
define("DB_USER", 'adlister_user'); 
define("DB_PASS", 'asdf');

class Model 
{

    protected static $dbc;
    protected static $table;


    public $attributes = array();

    public function __construct()
    {
        self::dbConnect();
    }


    protected static function dbConnect()
    {
        if (!self::$dbc)
        {
            self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
	        self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }


    
    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
			return $this->attributes[$name];
		}
		return null;

    }


    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }


    public function save()
    {

    }


    public static function find($id)
    {
        self::dbConnect();

        
        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;


    }


    public static function all()
    {
        self::dbConnect();
    }

}


?>