<?php
require_once './app/models/product.model.php';
require_once './app/views/api.view.php';

class productController {
    private $productModel;
    private $viewApi;
    private $data;

    // Constructor
    public function __construct() {
        $this->productModel = new productModel();
        $this->viewApi = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    // Funcion: decodifica 
    private function getData() {
        return json_decode($this->data);
    }

    // Mostrar todos los productos
    public function showAll($params = NULL){
      if (isset($_GET['sortby']) && isset($_GET['order'])) { // si esta todo completo
        if (($_GET['sortby'] == 'ID_producto' || $_GET['sortby'] == 'TIPO'|| $_GET['sortby'] == 'TALLE'|| $_GET['sortby'] == 'PRECIO') // si coincide
        &&($_GET['order']== 'ASC' || $_GET['order']== 'DESC')){
          $products = $this->productModel->sortbyorder($_GET['sortby'], $_GET['order']);
          return $this->viewApi->response($products, 200);
        }else{
          return $this->viewApi->response("Los campos son inválidos", 400);
        }
      } 
      else{
        $products = $this->productModel->getAll();
        return $this->viewApi->response($products, 200);
      } 
    }

    // Muestra productos por id 
      public function showProductById($params = NULL) {
        $ID_producto = $params[':ID'];
        $products  = $this->productModel->getProductById($ID_producto);
        if($products)
            $this->viewApi->response($products, 200);
        else 
            $this->viewApi->response("El producto buscado con el id=$ID_producto no existe", 404);
      }

      // Agregar producto
      public function addProduct($params = NULL){ 
        $productsbyid = $this->getData();  
        if( empty($productsbyid->ID_categoria_fk) || empty($productsbyid->TIPO)|| empty($productsbyid->TALLE)|| empty($productsbyid->PRECIO)){ // si hay alguno vacio
            $this->viewApi->response("Complete los datos", 400);
        }
        else {
            $ID_producto = $this->productModel->insertProduct($productsbyid->ID_categoria_fk, $productsbyid->TIPO, $productsbyid->TALLE, $productsbyid->PRECIO);
            $productsbyid = $this->productModel->getProductById($ID_producto);
            $this->viewApi->response("El producto se agregó correctamente", 201);
        }
      }

      // Borrar producto
      public function deleteProduct($params = NULL) {
        $ID_producto = $params[':ID'];
        $products  = $this->productModel->getProductById($ID_producto);
      if($products){
        $this->productModel->deleteProduct($ID_producto);
        $this->viewApi->response("el producto con el id=$ID_producto se eliminó correctamente", 200);
      }
      else
        $this->viewApi->response("el producto con el id=$ID_producto no existe", 404);
      }

      // Actualizar o modificar un producto
        public function updateProduct($params = null){
          $ID_producto = $params[':ID'];
          $product = $this->productModel->getProductById($ID_producto);
          if ($product){
              $product = $this->getData();
              $this->productModel->update($product->ID_categoria_fk, $product->TIPO, $product->TALLE, $product->PRECIO, $ID_producto);
              $this->viewApi->response("el producto con el id=$ID_producto se actualizo correctamente",200);
              }else {
              $this->viewApi->response("El producto no existe",404);
          }
      }
}