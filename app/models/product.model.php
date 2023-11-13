<?php

class productModel {

    private $db;
    // constructor
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda;charset=utf8', 'root', '');
    }

    // devuelve una lista con todos los productos
    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM producto");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        return $products;
    }

    // devuelve un producto by id
    public function getProductById($ID_producto) {
        $query = $this->db->prepare("SELECT * FROM producto WHERE ID_producto = ?");
        $query->execute([$ID_producto]);
        $productById = $query->fetch(PDO::FETCH_OBJ);
        return $productById;
    }

    // inserta un producto en la base de datos
    public function insertProduct($ID_categoria_fk, $TIPO, $TALLE, $PRECIO) {
        $query = $this->db->prepare("INSERT INTO producto (ID_categoria_fk, TIPO, TALLE, PRECIO) VALUES (?, ?, ?, ?)");
        $query->execute([$ID_categoria_fk, $TIPO, $TALLE, $PRECIO]);
        return $this->db->lastInsertId();
    }


    // elimina un producto dado su id
    function deleteProduct($ID_producto) {
        $query = $this->db->prepare('DELETE FROM producto WHERE ID_producto = ?');
        $query->execute([$ID_producto]);
    }

    //  selecciona todos los registros de la tabla y los ordena segun su campo y orden especifico
    function sortbyorder($sortby = null , $order = null ){
        $query = $this->db->prepare("SELECT * FROM producto ORDER BY $sortby $order");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    // actualiza o modifica un producto
    function update($ID_categoria_fk, $TIPO, $TALLE, $PRECIO, $ID_producto){
        $query = $this->db->prepare('UPDATE producto SET ID_categoria_fk=?, TIPO=?, TALLE=?, PRECIO=? WHERE ID_producto=?');
        $query->execute([$ID_categoria_fk, $TIPO, $TALLE, $PRECIO, $ID_producto]);
    }
}