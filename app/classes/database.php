<?php
class Database {
  public $pdo;
  public function connect($dbname, $user, $password){
    $this->pdo = new PDO("mysql:host=localhost; dbname={$dbname}; charset=UTF8", "{$user}", "{$password}");
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    return $this->pdo;
  }

  public function create($nomeLivro, $resenha, $nota, $imagem){
    try {
      $prepare = $this->pdo->prepare("INSERT INTO livros (nome, resenha, arquivo, nota) VALUES (:nome, :resenha, :arquivo ,:nota)"); 
      $prepare->execute([
        'nome' => $nomeLivro,
        'resenha' => $resenha,
        'arquivo' => $imagem,
        'nota' => $nota
      ]);
    } catch (PDOException $e) {
      echo "<p>Erro no banco de dados: {$e}</p>";
    }
  }

  public function read(){
    try {
      $prepare = $this->pdo->prepare("SELECT * FROM livros");
      $prepare->execute();
      //O resultado será um objeto 
      $resultado = $prepare->fetch(PDO::FETCH_OBJ);
      return $resultado;
    } catch (PDOException $e) {
      echo "<h1> Erro no banco de dados:{$e->getMessage()}</h1>";
      
    }
    
  }

  public function readAll(){
    try {
      $prepare = $this->pdo->prepare("SELECT * FROM livros");
      $prepare->execute();
      //O resultado será um array 
      $resultado = $prepare->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (PDOException $e) {
      echo "<h1> Erro no banco de dados:{$e->getMessage()}</h1>";
      return [];
    }
    
  }

  public function delete($id){
    try {
      $prepare = $this->pdo->prepare("DELETE FROM livros WHERE id = :id");
      $prepare->bindValue(':id',$id);
      return $prepare->execute();
    } catch (PDOException $e) {
      echo "<h1> Erro no banco de dados:{$e->getMessage()}</h1>";
    }
  }
}


