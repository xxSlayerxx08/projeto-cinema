<?php

require_once "database.php";

class Pipocas {
    private $db;

    public function __construct() {
        $this->db = database::getConexao();
    }

    public function getAllPipocas() {
        $sql = $this->db->query("SELECT * FROM pipocas");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $sql = $this->db->prepare("SELECT * FROM pipocas WHERE id = ?");     
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $sql = $this->db->prepare("DELETE FROM pipocas WHERE id = ?");
        return $sql->execute([$id]);
    }

    public function insert($nome,$tamanho,$preco,$foto) {
        $sql = $this->db->prepare(
            "INSERT INTO pipocas (nome,tamanho,preco,foto)
            VALUES (?, ?, ?, ?)"
        );
        return $sql->execute([$nome,$tamanho,$preco,$foto]);
    }

    public function update($id,$nome,$tamanho,$preco,$foto) {
        $sql = $this->db->prepare("UPDATE pipocas SET nome=?,tamanho=?,preco=?,foto=? WHERE id=?");
        return $sql->execute([$nome,$tamanho,$preco,$foto,$id]);
    }
}

?>