<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['registro_id'])) {
    // Se a sessão não está ativa, redirecionar para o login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;url=index.php"> <!-- Redireciona para index.php após 5 segundos -->
    <title>Bem-vindo - Loja Sajol</title>
    <style>
        /* Centralizando a tela */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 300px;
        }

        h1 {
            color: #4CAF50;
        }

        p {
            color: #555;
            font-size: 18px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Bem-vindo, <?php echo $_SESSION['registro_nome']; ?>!</h1>
        <p>Email: <?php echo $_SESSION['registro_email']; ?></p>
        <p>Você será redirecionado para a página inicial em 5 segundos...</p>
        <a href="index.php" class="btn">Ir para a página inicial agora</a>
    </div>

</body>
</html>
