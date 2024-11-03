<?php
require "/home/miguel/cursos/php/pratical/books/app/bootstrap.php";
session_start();
$banco = new Database();
$banco->connect("phprest", "teste", "password");
if (isset($_POST['submit'])) {
  $nomeImagem= $_FILES['capaLivro']['name'];
  $nomeTemp = $_FILES['capaLivro']['tmp_name']; 
  $pasta = 'uploads/' . $nomeImagem;
  $banco->create($_POST['nomeLivro'],$_POST['resenha'], $_POST['nota'], $nomeImagem);
  if (move_uploaded_file($nomeTemp, $pasta)) {
    echo "<h2>Arquivo enviado com sucesso</h2>";
    $resultado = $banco->read();
    header("Location: books.php");
    exit();
  }else{
    echo "<h2>Arquivo não enviado</h2>";
    header("Location: books.php");
    exit();
  }
}
