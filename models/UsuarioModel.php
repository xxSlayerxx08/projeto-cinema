<?php

require "models/database.php";

class UsuarioModel{

    private $db;

    public function __construct(){
        $this->db = database::getConexao();
    }

    public function getAllUsuario(){
        $sql = $this->db->prepare("SELECT * FROM usuarios");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id=?");
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }


    public function insert($nome,$usuario,$senha,$nivelAcesso){
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        $sql = $this->db->prepare("INSERT INTO usuarios (nome, usuario, senha, nivelAcesso) VALUES (?, ?, ?, ?);");
        return $sql->execute([$nome,$usuario,$senhaCriptografada,$nivelAcesso]);
    }

    public function update($id, $nome, $usuario, $nivelAcesso){
        error_log("Updating user with ID: $id, Nome: $nome, Usuario: $usuario, NivelAcesso: $nivelAcesso");
        $nivelAcesso = (int)$nivelAcesso;
        $sql = $this->db->prepare("UPDATE usuarios SET nome=?, usuario=?, nivelAcesso=? WHERE id=?");
        $sql->execute([$nome, $usuario, $nivelAcesso, $id]);
        $rowCount = $sql->rowCount();
        error_log("Rows affected: $rowCount");
        return $rowCount;
    }

    public function updateSenha($id, $senha){
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        $sql = $this->db->prepare("UPDATE usuarios SET senha=? WHERE id=?");
        $sql->execute([$senhaCriptografada,$id]);
        return $sql->rowCount();
    }

    public function delete($id){
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE id=?");
        return $sql->execute([$id]);
    }
}