<?php

require_once "models/LoginModel.php";

class LoginController
{
    private $url = "http://localhost/projetos/cinema";

    private $loginModel;

    public function __construct(){
        $this->loginModel = new Login();
    }
    
    public function index(){
        $baseUrl = $this->url;
        $erro = "";
        require "views/LoginForm.php";
    }

    public function criar() {
        $nome = "Fernando";
        $usuario = "FERSnake_BR";
        $senha = "1234";
        $this->loginModel->insert($nome,$usuario,$senha,$nivelAcesso);
        echo "Usuário criado com sucesso";
    }

    public function autenticar() {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $manter_logado = isset($_POST["manter_logado"]) ? true : false;

        $this->loginModel->getByUsuarioESenha($usuario,$senha,$manter_logado);

        if (isset($_SESSION["erro"])) {
            unset($_SESSION["erro"]);
            $erro = "<div class='alert alert-danger'>Não foi possível efetuar o login. Tente novamente</div>";
            $baseUrl = $this->url;
            require "views/LoginForm.php";
        }else{
            header("location: " . $this->url . "/filmes-adm");
        }
    }
}