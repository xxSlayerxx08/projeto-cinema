<?php

$somente_leitura = $acao == "criar" ? "" : "readonly";

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;

?>

<main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4">Adicionar uma Pipoca</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/pipocas-adm" class="btn btn-primary btn-md rounded-4">
          <i class="bi bi-arrow-left"></i>Voltar
        </a>
      </div>
    </div>
  </section>

  <form action="<?= $baseUrl ?>/pipocas-adm/atualizar/<?= $id ?>" method="post" >
    <section class="container mt-4">
        <div class="row">
          <div class="col-md-3">
            <label>Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" value='<?= $nome ?>' required></input>
            <br>
                  
            <label>Tamanho:</label>
            <select class="form-select" name="tamanho" id="tamanho" required>
              <?= $tamanho ?>
            </select>
            <br>
                  
            <label>Preço:</label>
              <input type="number" class="form-control" name="preco" id="preco" require min="0" value='<?= $preco ?>' required></input>
            <br>

            <label>Foto:</label>
            <input type="text" class="form-control" name="foto" id="foto" value='<?= $foto ?>' required></input>
            <br>

            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <input type='hidden' name='acao' value='<?= $acao?>'></input>
            <input type="hidden" name="id" value="<?= $id ?>">

            
          </div>
        </div>
      </section>
  </form>
</main>

<?php

echo $footer;

?>