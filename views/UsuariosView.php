<?php
$lista='';

foreach($lista_usuario as $us){
    $id = $us['id'];
    $nome = $us['nome'];
    $usuario = $us['usuario'];
    $nivelAcesso = $us['nivelAcesso'];

    $linkEditar = "<a  class='text-decoration-none text-primary'href='[[base-url]]/usuarios/editar/$id'>Editar</a>";
    $linkExcluir = "<a class='text-danger text-decoration-none'href='[[base-url]]/usuarios/excluir/$id'
    onClick=\"return confirm('Confirma a exclusão do usuário $nome?')\">Excluir</a>";
    $linkEditarSenha = "<a class='text-decoration-none text-primary'href='[[base-url]]/usuarios/alterarSenha/$id'>Editar Senha</a>";

    if(isset($_SESSION["nivelAcesso"])){
        if($_SESSION["numero_usuario"] == 3) {
            $linkExcluir = "";
            $linkEditar = "";
            $linkEditarSenha = "";
        }elseif($_SESSION["numero_usuario"] == 2) {
            $linkExcluir = "";
        }
    }else{
        if($_COOKIE["nivelAcesso"] == 3) {
            $linkExcluir = "";
            $linkEditar = "";
            $linkEditarSenha = "";
        }elseif($_COOKIE["nivelAcesso"] == 2) {
            $linkExcluir = "";
        }
    }

    $lista.="
        <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                ID: $id <br> 
                Nome: $nome <br>
                Usuário: $usuario <br>
                Acesso: $nivelAcesso
            </div>
            <div class='card-footer'>
                $linkEditar  $linkExcluir  $linkEditarSenha
            </div>
        </div>
    </div>
   "; 

}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/UsuarioView.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);  
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;