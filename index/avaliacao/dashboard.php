<?php
session_start();
 
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
</head>
<body>
<h2>Dashboard Sistema da Biblioteca</h2>
<p>Olá, <?php echo $_SESSION['usuario']; ?>!</p>

 
    <h3>Suas Opções São: </h3>
<ul>

<?php if ($_SESSION['tipo'] == 'biblio') { ?>
<li><a href="cadastrar_livros.php">Cadastrar Livros</a></li>
<li><a href="visualizar_pedidos.php">Visualizar Pedidos</a></li>
<?php } ?>

<?php if ($_SESSION['tipo'] == 'professor') { ?>
<li><a href="cadastrar_pedidos.php">Cadastrar Pedidos</a></li>
<?php } ?>
<li><a href="visualizar_livros.php">Visualizar Livros</a></li>
<a href="logout.php">Sair</a><br>
</ul>
</body>
</html>