<?php 
require __DIR__ .  "/../app/bootstrap.php"; 
$id = $_SESSION['livro']['id'];
$banco = new Database();
$banco->connect("phprest", "teste", "password");
$banco->delete($id);
header("Location: index.php");
?>
