<?php
Controller::checkVariables();
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