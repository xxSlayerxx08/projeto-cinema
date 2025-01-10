<?php

require_once "database.php";

class Filmes {
    private $db;

    public function __construct() {
        $this->db = database::getConexao();
    }

    public function getAllFilmes() {
        $sql = $this->db->query("SELECT * FROM filmes");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $sql = $this->db->prepare("SELECT * FROM filmes WHERE id = ?");     
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $sql = $this->db->prepare("DELETE FROM filmes WHERE id = ?");
        return $sql->execute([$id]);
    }

    public function insert($titulo,$classificacaoEtaria,$nota,$genero,$descricao,$foto) {
        $sql = $this->db->prepare(
            "INSERT INTO filmes (titulo,classificacaoEtaria,nota,genero,descricao,foto)
            VALUES (?, ?, ?, ?, ?, ?)"
        );
        return $sql->execute([$titulo,$classificacaoEtaria,$nota,$genero,$descricao,$foto]);
    }

    public function update($id,$titulo,$classificacaoEtaria,$nota,$genero,$descricao,$foto) {
        $sql = $this->db->prepare("UPDATE filmes SET titulo=?,classificacaoEtaria=?,nota=?,genero=?,descricao=?,foto=? WHERE id=?");
        return $sql->execute([$titulo,$classificacaoEtaria,$nota,$genero,$descricao,$foto,$id]);
    }
}

?>