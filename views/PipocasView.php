<?php

$lista = "";

foreach($lista_de_pipocas as $pipocas){
    $id = $pipocas["id"];
    $nome = $pipocas["nome"];
    $tamanho = $pipocas["tamanho"];
    $preco = $pipocas["preco"];
    $foto = $pipocas["foto"];

    $linkEditar = "<a class='text-primary me-2 text-decoration-none' href='[[base-url]]/pipocas-adm/editar/$id'><i class='bi bi-pencil-square'></i>Editar</a>";
    $linkExcluir = "<a class='text-danger text-decoration-none' href='[[base-url]]/pipocas-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão do item $nome ?')\"><i class='bi bi-trash'></i>Excluir</a>";

    if(isset($_SESSION["nivelAcesso"])){
        if($_SESSION["numero_usuario"] == 3) {
            $linkExcluir = "";
            $linkEditar = "";
        }elseif($_SESSION["numero_usuario"] == 2) {
            $linkExcluir = "";
        }
    }else{
        if($_COOKIE["nivelAcesso"] == 3) {
            $linkExcluir = "";
            $linkEditar = "";
        }elseif($_COOKIE["nivelAcesso"] == 2) {
            $linkExcluir = "";
        }
    }

    $lista.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <img src='$foto' class='card-img-top'>
            <div class='card-body'>
                <small>ID: $id<br></small>
                $nome <br>
                $tamanho <br>
                Preço: $preco <br>
            </div>
            <div class='card-footer'>
                $linkEditar
                $linkExcluir
            </div>
        </div>
    </div>    
    "; 
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/PipocasList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;