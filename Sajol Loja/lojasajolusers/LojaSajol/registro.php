<?php 
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome = $mysqli->escape_string($_POST['username']);
    $email = $mysqli->escape_string($_POST['email']);
    $senha = $_POST['password'];

    // Validação de campo
    if (empty($nome) || empty($email) || empty($senha)) {
        $erro[] = "Todos os campos são obrigatórios!";
    }

    // Verificar se o e-mail já existe
    $sql_check_email = "SELECT codigo FROM registro WHERE email = '$email'";
    $sql_query = $mysqli->query($sql_check_email);
    if ($sql_query->num_rows > 0) {
        $erro[] = "Este email já está cadastrado.";
    }

    // Se não houver erros, insira no banco de dados
    if (empty($erro)) {
        // Inserir no banco (senha em texto simples)
        $sql_insert = "INSERT INTO registro (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if ($mysqli->query($sql_insert)) {
            echo "<script>alert('Cadastro realizado com sucesso!'); location.href='login.php';</script>";
        } else {
            $erro[] = "Erro ao cadastrar o usuário. Tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registro - Loja Sajol</title> 
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
            <div class="form">
                <label for="username">Nome:</label>
                <input placeholder="Digite seu nome" type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form">
                <label for="email">Email:</label>
                <input type="email" placeholder="Digite seu email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form mt-1">
                <label for="password">Senha:</label>
                <input placeholder="Digite sua senha" type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Registrar</button>
        </form>
    </main>
    <footer class="text-black text-center p-3">
        <p>&copy; 2024 Loja Sajol</p>
    </footer>
</body>
</html>
