<?php
class Controller {

    static $config;

    public static function config($key = '') {
        if (empty($errors)) {
            $errors = array();
        }
        self::$config = [
            'dbConnect' => self::connectDatabase(),
            'errors' => $errors
        ];

        return isset(self::$config[$key]) ? self::$config[$key] : null;
        
    }


    public static function connectDatabase() {
        // attempt to connect to database
        $db = mysqli_connect("localhost","root","","marktplaats");
        // Check connection
        if($db === false) {
            die("ERROR: Could not connect to the database. " . mysqli_connect_error());
        } else {
            return $db;
        }
    }
}







?>