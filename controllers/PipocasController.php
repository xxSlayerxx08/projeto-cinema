<?php 

require_once "models/PipocasModel.php";

class PipocasController{
    private $url = "http://localhost/projetos/cinema";
    
    private $pipocasModel; 

    public function __construct() {
      $this->pipocasModel = new Pipocas();
    }

    public function index(){
        $lista_de_pipocas = $this->pipocasModel->getAllPipocas();
        $baseUrl = $this->url;
        require "views/PipocasView.php";
    }

    public function ver_pipocas() {
      $lista_de_pipocas = $this->pipocasModel->getAllPipocas();
      $baseUrl = $this->url;
      require "views/PipocasSiteView.php";
    }

    public function excluir($id) {
      $this->pipocasModel->delete($id);
      header("location: ".$this->url. "/pipocas-adm");
    }

    public function criar() {
      $id = "";
      $nome = "";
      $tamanho = "<option></option>
      <option>Pequena</option>
      <option>Média</option>
      <option>Grande</option>
      ";
      $preco = 0;
      $foto = "";
      
      $acao = "criar";
      $baseUrl = $this->url;
      
        require "views/PipocasForm.php";
      }

    public function editar($id) {
      $pipocas = $this->pipocasModel->getById($id);
      $id = $pipocas["id"];
      $nome = $pipocas["nome"];
      $tamanho = $pipocas["tamanho"];
      $preco = $pipocas["preco"];
      $foto = $pipocas["foto"];

      $tamanhos = ["Pequena","Média","Grande"];

      $tamanho = "<option></option>";

      foreach($tamanhos as $t) {
        $selecionado = $pipocas["tamanho"] == $t ? "selected" : "";
        $tamanho .= "<option $selecionado>$t</option>";
      }

      $baseUrl = $this->url;
      
      $acao = "editar";
        
      require "views/PipocasForm.php";
    }

    # Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar() {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $tamanho = $_POST["tamanho"];
        $preco = $_POST["preco"];
        $foto = $_POST["foto"];

        $acao = $_POST["acao"];

      if($acao == "editar") {
        $id = $_POST["id"];
        $this->pipocasModel->update($id,$nome,$tamanho,$preco,$foto);
      }else{
        $this->pipocasModel->insert($nome,$tamanho,$preco,$foto,$foto);
      }

      header("location: ".$this->url."/pipocas-adm");
    }
}

?>