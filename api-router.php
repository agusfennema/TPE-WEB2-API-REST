<?php
require_once 'config.php';
require_once './libs/Router.php';
require_once './app/controllers/product.controller.php';

// crea el router
$router = new Router();

// tabla de ruteo
$router->addRoute('products', 'GET', 'productController', 'showAll');
$router->addRoute('products/:ID', 'GET', 'productController', 'showProducts');
$router->addRoute('products/:ID', 'DELETE', 'productController', 'deleteProduct');
$router->addRoute('products', 'POST', 'productController', 'addProduct');
$router->addRoute('products/:ID', 'PUT', 'productController', 'updateProduct'); 
$router->addRoute('products/token', 'GET', 'UserApiController', 'getToken');


// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);