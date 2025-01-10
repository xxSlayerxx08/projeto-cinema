<?php

$lista = "";

foreach($lista_de_pipocas as $pipocas){
    $id = $pipocas["id"];
    $nome = $pipocas["nome"];
    $tamanho = $pipocas["tamanho"];
    $preco = $pipocas["preco"];
    $foto = $pipocas["foto"];

    $lista.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <img src='$foto' class='card-img-top'>
            <div class='card-body'>
                $nome <br>
                Tamanho: $tamanho <br>
                R$ $preco <br>
            </div>
        </div>
    </div>    
    ";
}

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "Pipocas", $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;