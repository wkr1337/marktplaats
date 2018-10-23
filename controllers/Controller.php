<?php
class Controller {

    static $config;
    static $errors;

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

    public static function setErrors($errors) {
        foreach($errors as $error) {
            array_push(self::$errors, $error);
        }

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

    public static function checkVariables() {
        if (!isset($_SESSION)) {
            session_start();
            if (!isset($_SESSION['logged_in'])){
                    $_SESSION['logged_in'] = false;
        
            }
        }
        
        if (isset($_POST['loginButton'])) {
            AuthController::login();
        }        
        if (isset($_POST['logoutButton'])) {
            AuthController::logout();
        }
        if (isset($_POST['registerButton'])) {
            AuthController::register();
        }
        
        if (count(Controller::$errors) != 0) {
            PagesController::showErrors();
        }
    }
}







?>