<?php

session_start();

$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

$requisicao = str_replace("/projetos/cinema/", "", $requisicao);

$segmentos = explode("/", $requisicao);

$controlador = isset($segmentos[0]) ? $segmentos[0]: "filmes-adm";
$metodo = isset($segmentos[1]) && $segmentos[1]!= "" ? $segmentos[1]: "index";
$identificador = isset($segmentos[2]) && $segmentos[2]!= "" ? $segmentos[2]: null;

switch($controlador) {
    case "filmes-adm":
        ValidaSessao();
        require "controllers/FilmesController.php";
        $controller = new FilmesController();
        break;

    case "pipocas-adm":
        ValidaSessao();
        require "controllers/PipocasController.php";
        $controller = new PipocasController();
        break;
    
    case "usuarios":
        ValidaSessao();
        require "controllers/UsuariosController.php";
        $controller = new UsuarioController();
        break;

    case "login":
        require "controllers/LoginController.php";
        $controller = new LoginController();
        break;

    case "filmes":
        require "controllers/FilmesController.php";
        $controller = new FilmesController();
        $metodo = "ver_filmes";
        break;

    case "pipocas":
        require "controllers/PipocasController.php";
        $controller = new PipocasController();
        $metodo = "ver_pipocas";
        break;

    case "contatos":
        require "controllers/ContatosController.php";
        $controller = new ContatosController();
        break;

    case "sair":
        require "controllers/SairController.php";
        $controller = new SairController();
        break;

    default:
    echo "Página não encontrada";
    break;
}

if ($identificador) {
    $controller->$metodo($identificador);
}else {
    $controller->$metodo();
}

function ValidaSessao(){
    if(!isset($_COOKIE["usuario"])){
        if(!isset($_SESSION['nome_usuario'])){
            $url = "http://localhost/projetos/cinema";
            header("location: " . $url . "/login");
        }
    }
}

# Usuario: teste
# Senha: 1234
# Nivel: 1

?>