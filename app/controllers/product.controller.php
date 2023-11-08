<?php
require_once './app/models/product.model.php';
require_once './app/views/api.view.php';

class productController {
    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new productModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    // FUNCION PARA MOSTRAR TODOS LOS PRODUCTOS ASC O DESC
    public function showAll($params = NULL){
      $products=$this->model->getAll();
        if (isset($_GET['sortby']) && isset($_GET['order'])){
            if($_GET['order'] == 'ASC'){
                if($_GET['sortby'] == 'id')
                $products = $this->model->orderASC();//?sortby=id&order=ASC
                }
            elseif ($_GET['order'] == 'DESC'){
                if($_GET['sortby'] == 'id')
                $products = $this->model->orderDESC();//?sortby=id&order=DESC
            }
        }
        else{
        $products = $this->model->getAll();
        }
        return $this->view->response($products, 200);
      } 

      // FUNCION PARA MOSTRAR POR ID
      public function showProducts($params = NULL) {
        $ID_producto = $params[':ID'];
        $products  = $this->model->getProductById($ID_producto);
        if($products)
            $this->view->response($products);
        else 
            $this->view->response("El producto buscado con el id=$ID_producto no existe", 404);
      }

      // FUNCION PARA AGREGAR PRODUCTO
      public function addProduct($params = NULL){ 
        $productsbyid = $this->getData();  
        if( empty($productsbyid->ID_categoria_fk) || empty($productsbyid->TIPO)|| empty($productsbyid->TALLE)|| empty($productsbyid->PRECIO)){
            $this->view->response("Complete los datos", 400);
        }
        else {
            $ID_producto = $this->model->insertProduct($productsbyid->ID_categoria_fk, $productsbyid->TIPO, $productsbyid->TALLE, $productsbyid->PRECIO);
            $productsbyid = $this->model->getProductById($ID_producto);
            $this->view->response("el producto con el id=$ID_producto se agregó correctamente", 201);
        }
      }


      public function deleteProduct($params = NULL) {
        $ID_producto = $params[':ID'];
        $products  = $this->model->getProductById($ID_producto);
      if($products){
        $this->model->deleteProduct($ID_producto);
        $this->view->response("el producto con el id=$ID_producto se elimino correctamente", 200);
      }
      else
        $this->view->response("el producto con el id=$ID_producto no existe", 404);
      }

        public function updateProduct($params = null){
          $ID_producto = $params[':ID'];
          $product = $this->model->getProductById($ID_producto);
          if ($product){
              $product = $this->getData();
              $this->model->update($product->ID_categoria_fk, $product->TIPO, $product->TALLE, $product->PRECIO, $ID_producto);
              $this->view->response("el producto con el id=$ID_producto se actualizo correctamente",200);
              }else {
              $this->view->response("El producto no existe",404);
          }
      }
}