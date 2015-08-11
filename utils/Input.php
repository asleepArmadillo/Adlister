<?php


//THIS IS BOILERPLATE CODE FOR OUR INPUT CLASS




var_dump($_REQUEST);

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        if (isset($_REQUEST[$key])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        } else {
            return NULL;
        }
    }

    public static function getString($key)
    {
        //static::$variable is just like $this->variable, but for static methods, only on the class definition.
        //static::get()
        $value = str_replace(',', '', static::get($key)); 

        if (!isset($value)) {
            throw new Exception('Input cannot be null.');
        } 

        if (!is_string($value)) {
            throw new Exception('Input must be a string.');
        }
        return $value;
    }

    public static function getNumber($key)
    {
        $value = static::get($key); 

        if (!isset($key)) {
            throw new Exception('Input cannot be null.');
        } 

        if (!is_numeric($key)) {
            throw new Exception('Input must be a number.');
        }
        return $value;
    }

    public static function getDate($key) 
    {
        $value = static::get($key);
        $format = 'Y-m-d';

        $dateObject = DateTime::createFromFormat($format, $value);
        $dateString = $dateObject->date;

        if($dateString) {
            return $dateString;
        } else {
            throw new Exception('This must be a valid date.');
        }
    }


    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
