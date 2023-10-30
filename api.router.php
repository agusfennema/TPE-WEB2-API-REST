<?php
require_once("./libs/router.php");
require_once("./app/controllers/products.api.controller.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("products", "GET", "ProductsApiController", "showProducts");
$router->addRoute("products/:ID", "GET", "ProductsApiController", "showProductsById");
$router->addRoute("products", "POST", "ProductsApiController", "addProduct");
$router->addRoute("products", "PUT", "ProductsApiController", "updateProduct");


// rutea
$router->route($resource, $method);
