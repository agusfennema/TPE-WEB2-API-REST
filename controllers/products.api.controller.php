<?php
require_once("./models/products.api.model.php");
require_once("./views/product.api.view.php");

class ProductsApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductsModel();
        $this->view = new ApiView();
    }

    public function showProducts($params = null) {
        $products = $this->model->getProducts();
            if(isset($_GET["sortby"]) && isset($_GET["order"])) {
                if($_GET["order" == "ASC"]){
                    if($_GET["sortby"] == "ID_producto")
                    $products = $this->model->orderASC();
                }
                elseif($_GET["order" == "DESC"]){
                    if($_GET["sortby"] == "ID_producto")
                    $products = $this->model->orderDESC();
                }
            }
        else{
            $products = $this->model->getAll();
        }
        return $this->view->response($products,200);
    }

    // * $params arreglo asociativo con los parámetros del recurso
    public function showProductsById($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        $product = $this->model->getById($id);
        
        if ($tarea) {
            $this->view->response($product, 200);   
        } else {
            $this->view->response("No existe el producto con el id={$ID_producto}", 404);
        }
    }
}
