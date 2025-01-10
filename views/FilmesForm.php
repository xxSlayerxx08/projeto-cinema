<?php 

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;

?>

<main>
<section class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <span class="fs-4">Cadastro de um novo Filme</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/filmes-adm" class="btn btn-primary btn-md rounded-4">
        <i class="bi bi-arrow-left"></i>Voltar
      </a>
    </div>
  </div>
</section>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <form action="<?= $baseUrl ?>/filmes-adm/atualizar/<?= $id ?>" method="post">
            <label for="titulo">Titulo: </label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $titulo ?>" required>
            <br>

            <label for="classificacaoEtaria">Classificação Etaria: </label>
            <input type="number" class="form-control" name="classificacaoEtaria" id="classificacaoEtaria" require min="0" value="<?= $classificacaoEtaria ?>" required></input>
            <br>

            <label for="nota">Nota: </label>
            <input type="number" class="form-control" name="nota" id="nota" require min="0" step="0.01" value="<?= $nota ?>" required></input>
            <br>

            <label for="genero">Gênero: </label>
            <input type="text" class="form-control" name="genero" id="genero" value="<?= $genero ?>" required>
            <br>

            <label for="descricao">Descrição: </label>
            <textarea class="form-control" name="descricao" id="descricao" required><?= $descricao ?></textarea>
            <br>

            <label for="foto">Foto: </label>
            <input type="url" class="form-control" name="foto" id="foto" value="<?= $foto ?>" required></input>
            <br>
            
            <br>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
        </form>
      </div>
    </div>
  </section>
</main>

<?php

echo $footer;

?>