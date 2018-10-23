<?php

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


Route::set('index', function(){
    PagesController::index();
});
Route::set('/', function(){
    PagesController::index();
});
Route::set('login', function(){
    PagesController::login();
});
Route::set('register', function(){
    PagesController::register();
});


// display 404 if route does not exist
if (!in_array($_GET['url'], Route::$validRoutes)) {
    require_once("./views/inc/404.php");
    }