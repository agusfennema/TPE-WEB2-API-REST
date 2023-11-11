<?php

class productModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM producto");
        $query->execute();

        // 3. obtengo los resultados
        $products = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $products;
    }

    public function getProductById($ID_producto) {
        $query = $this->db->prepare("SELECT * FROM producto WHERE ID_producto = ?");
        $query->execute([$ID_producto]);
        $productById = $query->fetch(PDO::FETCH_OBJ);
        
        return $productById;
    }

    /**
     * Inserta una tarea en la base de datos.
     */
    public function insertProduct($ID_categoria_fk, $TIPO, $TALLE, $PRECIO) {
        $query = $this->db->prepare("INSERT INTO producto (ID_categoria_fk, TIPO, TALLE, PRECIO) VALUES (?, ?, ?, ?)");
        $query->execute([$ID_categoria_fk, $TIPO, $TALLE, $PRECIO]);

        return $this->db->lastInsertId();
    }


    /**
     * Elimina una tarea dado su id.
     */
    function deleteProduct($ID_producto) {
        $query = $this->db->prepare('DELETE FROM producto WHERE ID_producto = ?');
        $query->execute([$ID_producto]);
    }

    function sortbyorder($sortby = null , $order = null ){
        $query = $this->db->prepare("SELECT * FROM producto ORDER BY $sortby $order");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function update($ID_categoria_fk, $TIPO, $TALLE, $PRECIO, $ID_producto){
        $query = $this->db->prepare('UPDATE producto SET ID_categoria_fk=?, TIPO=?, TALLE=?, PRECIO=? WHERE ID_producto=?');
        $query->execute([$ID_categoria_fk, $TIPO, $TALLE, $PRECIO, $ID_producto]);
    }
}