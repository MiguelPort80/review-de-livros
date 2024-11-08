<?php
require __DIR__ .  "/../app/bootstrap.php"; 
session_start();

$banco = new Database();
$banco->connect("phprest", "teste", "password");

if (isset($_POST['submit'])) {
  // Validação dos dados do formulário
  $nomeLivro = filter_var(trim($_POST['nomeLivro']), FILTER_SANITIZE_STRING);
  $resenha = filter_var(trim($_POST['resenha']), FILTER_SANITIZE_STRING);
  $nota = filter_var(trim($_POST['nota']), FILTER_SANITIZE_NUMBER_INT);
  
  if ($nota < 0 || $nota > 10) {
    echo "<h2>A nota deve ser um número entre 0 e 10.</h2>";
    exit();
  }

  if (empty($nomeLivro) || empty($resenha) || empty($nota) || !isset($_FILES['capaLivro'])) {
      echo "<h2>Por favor, preencha todos os campos e envie uma imagem.</h2>";
      exit();
  }

  $nomeImagem= $_FILES['capaLivro']['name'];
  $nomeTemp = $_FILES['capaLivro']['tmp_name']; 
  $pasta = 'uploads/' . $nomeImagem;
  
  // Verifica se o arquivo é uma imagem
  $tipoArquivo = mime_content_type($nomeTemp);
  if (strpos($tipoArquivo, 'image/') !== 0) {
      echo "<h2>O arquivo enviado não é uma imagem válida.</h2>";
      exit();
  }

  $banco->create($_POST['nomeLivro'],$_POST['resenha'], $_POST['nota'], $nomeImagem);

  if (move_uploaded_file($nomeTemp, $pasta)) {

    echo "<h2>Arquivo enviado com sucesso</h2>";
    header("Location: index.php");
    exit();

  }else{

    echo "<h2>Arquivo não enviado</h2>";
    header("Location: index.php");
    exit();

  }
}
