<?php

class PagesController extends Controller {


    public static function index() {
        self::returnView('index');
    }

    public static function login() {
        self::returnView('auth/login');
    }

    public static function register() {
        self::returnView('auth/register');
    }
    public static function showErrors() {
        self::returnView('inc/errors');
    }

    public static function returnView($page) {
        require_once("./views/layouts/header.php");
        require_once("./views/inc/navbar.php");
        require_once("./views/$page.php");
        require_once("./views/layouts/footer.php");
    }
}

?>