<?php 
require "/app/bootstrap.php";
$id = $_SESSION['livro']['id'];
$banco = new Database();
$banco->connect("phprest", "teste", "password");
$banco->delete($id);
header("Location: books.php");
?>
