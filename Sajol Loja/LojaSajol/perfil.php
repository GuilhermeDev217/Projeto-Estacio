<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['registro_nome'])) {
    header('Location: login.php');
    exit();
}

// Simulação de dados do último pedido (se estivesse em um banco de dados)
$ultimo_pedido = isset($_SESSION['ultimo_pedido']) ? $_SESSION['ultimo_pedido'] : null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="./assets/leao.ico">
    <style>
        /* Estilo básico para a página de perfil */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .perfil-info {
            margin-bottom: 20px;
        }

        .perfil-info p {
            font-size: 18px;
            margin: 10px 0;
        }

        .btn-logout {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .pedido-info {
            margin-top: 30px;
        }

        .pedido-info p {
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Perfil de <?php echo htmlspecialchars($_SESSION['registro_nome']); ?></h2>

    <div class="perfil-info">
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($_SESSION['registro_nome']); ?></p>
        <p><strong>E-mail:</strong> <?php echo htmlspecialchars($_SESSION['registro_email']); ?></p>
    </div>

    <?php if ($ultimo_pedido): ?>
        <div class="pedido-info">
            <h3>Último Pedido</h3>
            <p><strong>Data:</strong> <?php echo date('d/m/Y H:i', strtotime($ultimo_pedido['data'])); ?></p>
            <p><strong>Total:</strong> R$ <?php echo number_format($ultimo_pedido['total'], 2, ',', '.'); ?></p>
        </div>
    <?php else: ?>
    <?php endif; ?>

    <form action="logout.php" method="POST">
        <button type="submit" class="btn-logout">Sair</button>
    </form>
</div>

</body>
</html>
