<?php 

$listaFilmes = "";

foreach($lista_de_filmes as $filmes){
    $id = $filmes["id"];
    $titulo = $filmes["titulo"];
    $classificacaoEtaria = $filmes["classificacaoEtaria"];
    $nota = $filmes["nota"];
    $genero = $filmes["genero"];
    $descricao = $filmes["descricao"];
    $foto = $filmes["foto"];
    
    $listaFilmes.= "
    <div class='card mb-3 me-4' style='max-width: 540px;'>
        <div class='row g-0'>
            <div class='col-md-4'>
                <img src='$foto' class='img-fluid rounded-start' alt='...'>
            </div>
            <div class='col-md-12'>
                <div class='card-body'>
                    <h5 class='card-title'>$titulo</h5>
                    <p class='card-text'><small class='text-body-secondary'>$classificacaoEtaria</small></p>
                    <p class='card-text'><small class='text-body-secondary'>$genero</small></p>
                    <p class='card-text'><small class='text-body-secondary'>Nota: $nota</small></p>
                    <p class='card-text'>$descricao</p>
                </div>
            </div>
        </div>
    </div>
   ";
}

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "Filmes", $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $listaFilmes, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;