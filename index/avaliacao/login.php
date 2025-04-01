<?php
session_start();

// Verifica o formulário 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Usuarios fixos
    $usuarios = [
        'professor' => 'professor',
        'biblio' => 'biblio'
    ];

    // Verifica login e senha
    if (isset($usuarios[$login]) && $usuarios[$login] === $senha) {
        $_SESSION['usuario'] = $login;
        header('Location: dashboard.php');
        exit();
    } else {
        $erro = "Login ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
</head>
<body>
<h3>Login - Sistema da Biblioteca</h3>
<?php if (isset($erro)) { echo "<p style='color:red;'>$erro</p>"; } ?>
<form action="login.php" method="POST">
<label for="login">Login:</label>
<input type="text" name="login" id="login" required><br>
 
        <label for="senha">Senha:</label>
<input type="password" name="senha" id="senha" required><br>
 
        <button type="submit">Entrar</button>
</form>
</body>
</html>