<?php
session_start();

// Verifica o usuario professor
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'professor') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $editora = $_POST['editora'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    
    if ($titulo && $autor && $editora && $isbn) {
        $linha = "$titulo|$autor|$editora|$isbn" . PHP_EOL;
        file_put_contents('pedidos.txt', $linha, FILE_APPEND);
        $mensagem = "Pedido cadastrado com sucesso!";
    } else {
        $erro = "Todos os campos são obrigatórios!";
    }
}
?>

 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastrar Pedido</title>
</head>
<body>
<h2>Cadastrar Pedido de Livro</h2>
<form action="cadastrar_pedidos.php" method="POST">
<label for="titulo">Título:</label>
<input type="text" name="titulo" id="titulo" required><br>
 
        <label for="autor">Autor:</label>
<input type="text" name="autor" id="autor" required><br>
 
        <label for="editora">Editora:</label>
<input type="text" name="editora" id="editora" required><br>
 
        <label for="isbn">ISBN:</label>
<input type="text" name="isbn" id="isbn" required><br>
 
        <button type="submit">Cadastrar</button>
</form>
<a href="dashboard.php">Voltar ao Dashboard</a>
</body>
</html>