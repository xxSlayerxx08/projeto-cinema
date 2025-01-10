<?php

require "models/UsuarioModel.php";

class UsuarioController{

    private $url = "http://localhost/projetos/cinema";
    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new UsuarioModel();
    }

    public function index(){
        $baseUrl = $this->url;
        $lista_usuario = $this->usuarioModel->getAllUsuario();
        require "views/UsuariosView.php";
    }

    public function criar(){
        $nome = "";
        $usuario = "";
        $nivelAcesso = "";
        $senha= "";
        $baseUrl = $this->url;
        $acao = "criar";
        require "views/UsuariosForm.php";
    }

    public function editar($id) {
        $form = $this->usuarioModel->getById($id);

        $nome = $form["nome"];
        $usuario = $form["usuario"];
        $nivelAcesso = $form["nivelAcesso"];

        $baseUrl = $this->url;

        $acao = "editar";
        require "views/UsuariosForm.php";
    }

    public function atualizar() {
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $nivelAcesso = $_POST["nivelAcesso"];

        $acao = $_POST["acao"];

        if($acao == "editar") {
            $id = $_POST["id"];
            $this->usuarioModel->update($id,$nome,$usuario,$nivelAcesso);
        }else{
            $this->usuarioModel->insert($nome,$usuario,$senha,$nivelAcesso);
        }

        header("location: ".$this->url."/usuarios");
    }        

    public function excluir($id){
        $this->usuarioModel->delete($id);
        header("location:" . $this->url . "/usuarios");
    }

    # Método usado para chamar o formulário de alteração de senha - passo 1
    public function alterarSenha($id){
        $baseUrl = $this->url;
        require "views/AlterarSenhaForm.php";
    }
    
    public function atualizarSenha($id = null){
        $senha = $_POST['senha'];
        $this->usuarioModel->updateSenha($id, $senha);
        header("location:" . $this->url . "/usuarios");
    }


}