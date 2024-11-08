<?php require __DIR__ .  "/../app/bootstrap.php"; ?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Meus Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
<form action="upload.php" method="post" enctype="multipart/form-data">
  <div class="container">
      <div class="mb-3">
        <label for="exampleInputText" class="form-label">Nome do livro</label>
        <input type="text" class="form-control" name="nomeLivro">
      </div>
      <div class="mb-3">
        <label for="exampleInputText" class="form-label">Resenha</label>
        <input type="text" class="form-control" name="resenha">
      </div>
      <div class="mb-3">
        <label for="exampleInputText" class="form-label">Nota</label>
        <input type="number" class="form-control" name="nota">
      </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Imagem da capa do livro</label>
          <input class="form-control" type="file" id="formFile" name="capaLivro">
        </div>
      <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
  </div>
</form>
