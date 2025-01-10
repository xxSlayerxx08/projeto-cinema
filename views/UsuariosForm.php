<?php
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/UsuarioView.html");
echo $header;

$senha = isset($senha) ? $senha : '';

$opcaoSenha= "
<label for=\"senha\" class=\"form-senha\">Senha:</label>
<input type=\"password\" name=\"senha\" id=\"senha\" class=\"form-control\" value=\"<?=$senha?>\">";

if($acao == "editar"){
   $opcaoSenha = "";
}
?>
<main>
      <div class="container mt-5">
         <div class="row d-flex justify-content-center">
            <div class="col-md-5">
               <div class="card mb-4 rounded-3 shadow-sm ">
                  <div class="card-header bg-secondary py-3">
                     <h4 class="my-0 fw-normal text-white">Usuario</h4>
                     <div class="text-end">
                        <a href="<?= $baseUrl ?>/usuarios" class="btn btn-primary btn-md rounded-4">
                           <i class="bi bi-arrow-left"></i>Voltar
                        </a>
                     </div>
                  </div>
                  <div class="card-body p-4">
                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/usuarios/atualizar">
                        <div class="form-floating mb-3">
                           <input type="text" name="nome" id="nome" class="form-control" value="<?=$nome?>">
                           <label for="nome">Nome:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="usuario" id="usuario" class="form-control" value="<?=$usuario?>">
                           <label for="usuario">Usuario:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <?= $opcaoSenha?>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="number" name="nivelAcesso" id="nivelAcesso" class="form-control" value="<?= $nivelAcesso ?>">
                           <label for="nivelAcesso">Nivel De Acesso:</label>
                        </div>
                        <button type="submit" id="btnAcessar" name="btnAcessar" class="w-100 btn btn-lg btn-primary">Criar</button>
                        <input type='hidden' name='acao' value='<?= $acao?>'></input>
                        <input type='hidden' name='id' value='<?= $id?>'></input>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

<?php
echo $footer;