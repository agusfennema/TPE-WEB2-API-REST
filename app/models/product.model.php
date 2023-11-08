<?php

class productModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda;charset=utf8', 'root', '');
    }

    //    DEVUELVE LA LISTA DE PRODUCTOS COMPLETA 
    public function getAll() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM producto");
        $query->execute();
        // 3. obtengo los resultados
        $products = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        return $products;
    }

    // OBTENER PRODUCTO BY ID
    public function getProductById($ID_producto) {
        $query = $this->db->prepare("SELECT * FROM producto WHERE ID_producto = ?");
        $query->execute([$ID_producto]);
        $productById = $query->fetch(PDO::FETCH_OBJ);
        return $productById;
    }

   // INSERTAR PRODUCTO
    public function insertProduct($ID_categoria_fk, $TIPO, $TALLE, $PRECIO) {
        $query = $this->db->prepare("INSERT INTO producto (ID_categoria_fk, TIPO, TALLE, PRECIO) VALUES (?, ?, ?, ?)");
        $query->execute([$ID_categoria_fk, $TIPO, $TALLE, $PRECIO]);
        return $this->db->lastInsertId();
    }


    // ELIMINAR PRODUCTO 
    function deleteProduct($ID_producto) {
        $query = $this->db->prepare('DELETE FROM producto WHERE ID_producto = ?');
        $query->execute([$ID_producto]);
    }

    // ORDENAR ASCENDENTEMENTE PRODUCTOS
    function orderASC () {
        $query = $this->db->prepare("SELECT * FROM producto ORDER BY ID_producto ASC");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    // ORDENAR DESCENDENTEMENTE PRODUCTOS
    function orderDESC () {
        $query = $this->db->prepare("SELECT * FROM producto ORDER BY ID_producto DESC");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    // ORDENAR 
    function sortbyorder ($sortby = null , $order = null ){
        $query = $this->db->prepare("SELECT * FROM producto ORDER BY $sortby $order");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    // ACTUALIZAR/EDITAR PRODUCTO
    function update($ID_categoria_fk, $TIPO, $TALLE, $PRECIO, $ID_producto){
        $query = $this->db->prepare('UPDATE producto SET ID_categoria_fk=?, TIPO=?, TALLE=?, PRECIO=? WHERE ID_producto=?');
        $query->execute([$ID_categoria_fk, $TIPO, $TALLE, $PRECIO, $ID_producto]);
    }
}