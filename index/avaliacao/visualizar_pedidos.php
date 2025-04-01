<?php
session_start();
 
if ($_SESSION['tipo'] != 'biblio') {
    header("Location: login.php");
    exit();
}
 
$pedidos = file('pedidos.txt');
 
foreach ($pedidos as $pedido) {
    list($titulo, $autor, $editora, $isbn) = explode('|', $pedido);
    echo "Título: $titulo <br> Autor: $autor <br> Editora: $editora <br> ISBN: $isbn <br><br>";
}
?>