<?php require "/home/miguel/cursos/php/pratical/books/app/bootstrap.php"?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Meus Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body>

<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="centralizada">
              <h1>Home</h1>
            </div>
        </div>
    </div>
</div>


<div class="row row-cols-1 row-cols-md-3 g-4 m-0">
<?php 
session_start();
$banco = new Database();
$banco->connect("phprest", "teste", "password");
if(empty($banco->readAll())){

?>
  <div class="col">
    <div class="card" style="margin-right: 200px;">
      <img src="assets/images/o-banquete.jpg" class="card-img-top" style="height: 320px; width: 250px; margin: 5px;" alt="Livro O banquete - Platão">
      <div class="card-body container">
        <h5 class="card-title">O Banquete - Platão</h5>
        <p class="card-text">Descrição aqui</p>
        <p class="btn btn-warning">Nota: 9/10.</p>
      </div>
    </div>
  </div>

  <?php }?>
<!--Arquivos do usuário--!>
<?php
if(!empty($banco->readAll())){
$livros = $banco->readAll();
foreach ($livros as $livro) {
$_SESSION['livro'] = $livro;
?>
<div class="col">
    <div class="card" style="margin-right: 200px;">
    <img src="uploads/<?=htmlspecialchars($livro['arquivo'])?>" class="card-img-top" style="height: 350px; width: 305px;" alt="<?=htmlspecialchars($livro['nome'])?>">
      <div class="card-body container">
        <h5 class="card-title"><?=htmlspecialchars($livro['nome'])?></h5>
        <p class="card-text"><?=htmlspecialchars($livro['resenha'])?></p>
        <p class="btn btn-warning">Nota: <?=htmlspecialchars($livro['nota'])?>/10.</p>
        <a href="delete.php" class="btn btn-danger" style="border-bottom-width: 1px;margin-bottom: 14px;">Deletar livro</a>
      </div>
    </div>
  </div>
  <?php }}?>
</div>
  <a href="form.php" class="btn btn-outline-success" style="margin: 50px; margin-left: 20px;">Editar lista </a>
  </body>
</html>
