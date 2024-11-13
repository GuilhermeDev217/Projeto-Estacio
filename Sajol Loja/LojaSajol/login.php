<?php
session_start();
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $email = $mysqli->escape_string($_POST['username']);
    $senha = $_POST['password'];

    // Verificar se o e-mail existe na tabela 'registro'
    $sql = "SELECT * FROM registro WHERE email = '$email'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        $registro = $resultado->fetch_assoc();

        // Verificar se a senha está correta (sem hash, comparação direta)
        if ($senha === $registro['senha']) {  // Comparação direta da senha
            // Iniciar sessão
            $_SESSION['registro_id'] = $registro['codigo'];  // Usando 'codigo' como chave primária
            $_SESSION['registro_nome'] = $registro['nome'];
            $_SESSION['registro_email'] = $registro['email'];

            // Redirecionar para a página de boas-vindas
            header("Location: bemvindo.php");  // redireciona para uma página de boas-vindas
            exit();
        } else {
            // Se a senha não for correta
            $erro[] = "Senha incorreta!";
        }
    } else {
        // Se o e-mail não for encontrado
        $erro[] = "E-mail não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Loja Sajol</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="./assets/leao.ico">
</head>
<body>
    <header>
        <a href="index.php"><img class="logorl" src="./assets/sajollogo.png"></a>
    </header>
    <main class="container mt-4">

        <!-- Exibindo erros, se houver -->
        <?php 
        if (isset($erro) && count($erro) > 0) {
            echo '<div class="alert alert-danger">';
            foreach ($erro as $msg) {
                echo "<p>$msg</p>";
            }
            echo '</div>';
        }
        ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
            <p class="mt-3">Não tem uma conta? <a href="registro.php">Registre-se aqui</a>.</p>
        </form>
    </main>
    <footer class="text-black text-center p-3">
        <p class="text-center foot">&copy; 2024 Loja Sajol</p>
    </footer>
</body>
</html>
