<?php

require_once "models/FilmesModel.php";

class FilmesController {
    private $url = "http://localhost/projetos/cinema";

    private $filmesModel;

    public function __construct(){
        $this->filmesModel = new Filmes();
    }

    public function index() {
        $lista_de_filmes = $this->filmesModel->getAllFilmes();
        $baseUrl = $this->url;
        require "views/FilmesView.php";
    }

    public function ver_filmes() {
        $lista_de_filmes = $this->filmesModel->getAllFilmes();
        $baseUrl = $this->url;
        require "views/FilmesSiteView.php";
    }

    public function excluir($id){
        $this->filmesModel->delete($id);
        header("location: ".$this->url. "/filmes-adm");
    }

    public function criar() {
        $acao="criar";
        $id="";
        $titulo="";
        $classificacaoEtaria= 0;
        $nota= 0;
        $genero = "";
        $descricao="";
        $foto="";
        
        $baseUrl = $this->url;
        require "views/FilmesForm.php";
    }

    public function editar($id) {
        $filmes = $this->filmesModel->getById($id);
        $titulo = $filmes["titulo"];
        $classificacaoEtaria = $filmes["classificacaoEtaria"];
        $nota = $filmes["nota"];
        $genero = $filmes["genero"];
        $descricao = $filmes["descricao"];
        $foto = $filmes["foto"];

        $baseUrl = $this->url;
        $acao = "editar";
        require "views/FilmesForm.php";
    }

    public function atualizar() {
        $titulo = $_POST["titulo"];
        $classificacaoEtaria = $_POST["classificacaoEtaria"];
        $nota = $_POST["nota"];
        $genero = $_POST["genero"];
        $descricao = $_POST["descricao"];
        $foto = $_POST["foto"];

        $acao = $_POST["acao"];

        if($acao == "editar") {
            $id = $_POST["id"];
            $this->filmesModel->update($id,$titulo,$classificacaoEtaria,$nota,$genero,$descricao,$foto);
        }else{
            $this->filmesModel->insert($titulo,$classificacaoEtaria,$nota,$genero,$descricao,$foto);
        }

        header("location: ".$this->url."/filmes-adm");
    }
}

?>