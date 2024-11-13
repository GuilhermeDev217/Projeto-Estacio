<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Confirmado</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .check-icon {
            font-size: 100px;
            color: #28a745;
            margin-bottom: 20px;
            animation: checkmark 1s ease-in-out forwards;
        }

        @keyframes checkmark {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); }
        }

        .message {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 30px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="check-icon">&#10003;</div>
    <div class="message">
        Pedido Confirmado! <br> Obrigado pela compra.
    </div>
    <a href="index.php" class="btn">Voltar para a Loja</a>
</div>

<script>
    // Redireciona automaticamente para a página inicial após 3 segundos
    setTimeout(function() {
        window.location.href = 'index.php';
    }, 3000); // Tempo de 3 segundos
</script>

</body>
</html>
