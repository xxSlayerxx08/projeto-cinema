<?php

$listaFilmes = "";

foreach($lista_de_filmes as $filmes) {
    $id = $filmes["id"];
    $titulo = $filmes["titulo"];
    $classificacaoEtaria = $filmes["classificacaoEtaria"];
    $nota = $filmes["nota"];
    $genero = $filmes["genero"];
    $descricao = $filmes["descricao"];
    $foto = $filmes["foto"];

    $linkEditar = "<a class='text-primary text-decoration-none' href='[[base-url]]/filmes-adm/editar/$id'><i class='bi bi-pencil-square'></i>Editar</a>";
    $linkExcluir = "<a class='text-danger text-decoration-none' href='[[base-url]]/filmes-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão do item $id - $titulo?')\"><i class='bi bi-trash'></i>Excluir</a>";

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

    $listaFilmes.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <img src='$foto' class='card-img-top'>
            <div class='card-body'>
                <small>$id</small>
                <strong>$titulo</strong><br>
                $classificacaoEtaria <br>
                Nota: $nota <br>
                $genero <br>
                <br>
                $descricao<br>
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
$html = file_get_contents("views/templates/html/FilmesList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $listaFilmes, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;

?>