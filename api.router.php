<?php
require_once './libs/Router.php';
require_once './app/controllers/product.controller.php';

// crea el router
$router = new Router();

// tabla de ruteo
$router->addRoute('product', 'GET', 'productController', 'showAll');
$router->addRoute('product/:ID', 'GET', 'productController', 'showProducts');
$router->addRoute('product/:ID', 'DELETE', 'productController', 'deleteProduct');
$router->addRoute('product', 'POST', 'productController', 'addProduct');
$router->addRoute('product/:ID', 'PUT', 'productController', 'updateProduct'); 

//$router->addRoute('reviews', 'PUT', 'Reviewcontroller', 'editreview');

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);