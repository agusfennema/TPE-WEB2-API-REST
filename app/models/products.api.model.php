<?php
    class ProductModel{
        private $db;

    public function __construct {
        $this->db=new PDO("mysql:host=localhost;"."dbname=tienda;charset=utf8","rout","");
    }

    //funcion para obtener todo
    public funcion getAll{
        $query=$this->db->prepare("SELECT * from producto");
        $query->execute;
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    // funcion para obtener productos por id 
    public funcion getById{
        $query=$this->db->prepare("SELECT * from producto WHERE ID_producto = ?");
        $query->execute([$id]);
        $products = $query->fetch(PDO::FETCH_OBJ);
        return $products;
    }

    // funcion para obtener ASCENDENTE
    public funcion orderASC{
        $query=$this->db->prepare("SELECT * from producto ORDER BY ID_producto ASC");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;

    // funcion para obtener DESCENDENTE
    public funcion orderDESC{
        $query=$this->db->prepare("SELECT * from producto ORDER BY ID_producto DESC");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;

}