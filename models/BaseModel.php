<?php

class Model 
{

    protected static $dbc;
    protected static $table;

    public $attributes = array();

    //Constructor
    public function __construct()
    {
        self::dbConnect();
    }


    //Connect to the DB- using self in dbc b/c we want to instantiate the db connection once and only once. if we used static::dbc, any child class could overwrite the connection.
    protected static function dbConnect()
    {
    	//definitely more secure to connect via config file by require_once at top of page
    	define("DB_HOST", '127.0.0.1');
		define("DB_NAME", 'adlister_db'); 
		define("DB_USER", 'adlister_user'); 
		define("DB_PASS", 'asdf');

        if (!self::$dbc)
        {
            //Connects to db
            self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            //Tell PDO to throw exceptions on error
	        self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }


    
    //Get a value from attributes based on name
    public function __get($name)
    {
        //Returns the value from attributes with a matching $name, if it exists
        if (array_key_exists($name, $this->attributes)) {
			return $this->attributes[$name];
		}
		return null;

    }


    //Sets a new attribute for the object
    public function __set($name, $value)
    {
        //Store name/value pair in attributes array
        $this->attributes[$name] = $value;
    }


    //Persist the object to the database
    public function save()
    {
    	// @TODO: Ensure there are attributes before attempting to save

        // @TODO: Perform the proper action - if the `id` is set, this is an update, if not it is a insert

        // @TODO: Ensure that update is properly handled with the id key

        // @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id

        // @TODO: You will need to iterate through all the attributes to build the prepared query

        // @TODO: Use prepared statements to ensure data security

    	/*if ($this->attributes) {
	    	if (isset($this->attributes[$name])) {
	    		//if attributes id is set, this is an UPDATE
	    	}
	    		$post = $dbc->prepare('INSERT INTO :table(:name) VALUES (:value)');
	    		$post->bindValue(':table', $this->table, PDO::PARAM_STR);

	    		//else this is an INSERT
	    		//after INSERT add the id back to $this->attributes array so object can reflect the id
    			//iterate through $this->attributes to build query
	    		//  ^^ use prepared statements for security ^^
    	}*/


    }


    //Find a record based on an id
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements

        // @TODO: Store the resultset in a variable named $result

        // The following code will set the attributes on the calling object based on the result variable's contents

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;


    }


    //Find all records in a table
    public static function all()
    {
        self::dbConnect();

        // @TODO: Learning from the previous method, return all the matching records
    }

}


?>