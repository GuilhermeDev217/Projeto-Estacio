<?php
session_start();

// Inicializa o carrinho na sessão se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adiciona o produto ao carrinho
if (isset($_POST['adicionar'])) {
    $produto = [
        'nome' => $_POST['nome'],
        'preco' => $_POST['preco'],
        'imagem' => $_POST['imagem'],
        'quantidade' => 1,  // Quantidade inicial é 1
        'tamanho' => $_POST['tamanho'],  // Tamanho selecionado
    ];

    // Verifica se o produto já existe no carrinho
    $produtoExistente = false;
    foreach ($_SESSION['carrinho'] as $index => $item) {
        if ($item['nome'] === $produto['nome'] && $item['tamanho'] === $produto['tamanho']) {
            $_SESSION['carrinho'][$index]['quantidade'] += 1;  // Incrementa a quantidade
            $produtoExistente = true;
            break;
        }
    }

    // Se o produto não existe no carrinho, adiciona-o
    if (!$produtoExistente) {
        $_SESSION['carrinho'][] = $produto;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tênis - Loja Sajol</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="./assets/leao.ico">
</head>
<body>

<!-- Notificação de sucesso ao adicionar ao carrinho -->


<div id="popup-tamanho" class="popup" style="display:none;">
    <div class="popup-content">
        <span class="fechar">&times;</span>
        <h2>Escolha o Tamanho</h2>
        <div id="produto-info">
            <img id="produto-imagem" src="" alt="Produto" style="width: 100px; height: auto;"/>
            <p id="produto-preco"></p>
        </div>
        <select id="tamanho">
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
        </select>
        <button onclick="addToCart('Produto Exemplo')" id="adicionar-carrinho-popup">Adicionar ao Carrinho</button>
    </div>
</div>
<div id="popup-finalizar" class="popup" style="display:none;">
    <div class="popup-content">
        <span class="fechar-popup">&times;</span>
        <h2>Confirmar Pedido</h2>
        <div id="produtos-finalizar">
            <!-- Produtos do carrinho serão inseridos aqui -->
        </div>
        <div id="total-pedido">
            <!-- Total do pedido será exibido aqui -->
        </div>
        <form action="processar_pedido.php" method="POST">
            <h4>Detalhes do Cliente</h4>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço de entrega</label>
                <textarea class="form-control" id="endereco" name="endereco" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar Pedido</button>
        </form>
    </div>
</div>

<header>
    <div class="container">
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link text-black" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="luvas.php">Luvas</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="meias.php">Meias</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="bones.php">Bonés</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="tenis.php">Tênis Esportivos</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="sobrenos.php">Sobre nós</a></li>
                <img class="logo" src="./assets/sajollogo.png">
                <?php if (isset($_SESSION['registro_nome'])): ?>
                    <li class="nav-item">
                        <a href="perfil.php">
                            <img src="./assets/user-icon.ico" alt="Perfil" class="icone-usuario">
                            <span class="ml-2"><?php echo htmlspecialchars($_SESSION['registro_nome']); ?></span>
                        </a>
                    </li>
                <?php else: ?>
                    <!-- Botão de login quando não logado -->
                    <li class="nav-item"><a class="nav-link text-black" id="log" href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<main class="container mt-4 text-center">
    
    <h2>Confira nossos tênis!</h2>

    <section class="produtos">
        <div class="produto">
            <img src="https://i.pinimg.com/736x/2f/14/06/2f14065ff91b552993d8cfdc8d3de9ce.jpg" alt="Tenis 1">
            <h3>Tênis Sajol-Adidas</h3>
            <p>Preço: R$ 149,90</p>
            <button class="adicionar-carrinho" data-imagem="https://i.pinimg.com/736x/2f/14/06/2f14065ff91b552993d8cfdc8d3de9ce.jpg" data-preco="R$ 149,90">Adicionar ao Carrinho</button>
        </div>
        <div class="produto">
            <img src="https://i.pinimg.com/736x/8e/32/50/8e3250ea7c4fc6b59e55268d6f8ad975.jpg" alt="Tenis 2">
            <h3>Tênis Sajol-Under</h3>
            <p>Preço: R$ 289,90</p>
            <button class="adicionar-carrinho" data-imagem="https://i.pinimg.com/736x/8e/32/50/8e3250ea7c4fc6b59e55268d6f8ad975.jpg" data-preco="R$ 289,90">Adicionar ao Carrinho</button>
        </div>
        <div class="produto">
            <img src="https://i.pinimg.com/736x/98/c8/e6/98c8e640ebb4ca56ce4088003dd44784.jpg" alt="Tenis 3">
            <h3>Tênis Sajol-Olympikus</h3>
            <p>Preço: R$ 129,90</p>
            <button class="adicionar-carrinho" data-imagem="https://i.pinimg.com/736x/98/c8/e6/98c8e640ebb4ca56ce4088003dd44784.jpg" data-preco="R$ 129,90">Adicionar ao Carrinho</button>
        </div>
        <div class="carrinho">
    <h3>Carrinho</h3>
    <div id="produtos-carrinho">
        <?php if (empty($_SESSION['carrinho'])): ?>
            <p>Nenhum produto no carrinho.</p>
        <?php else: ?>
            <?php foreach ($_SESSION['carrinho'] as $produto): ?>
                <div class="produto-carrinho">
                    <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" style="width: 50px; height: 50px;">
                    <span><?php echo $produto['nome']; ?> - <?php echo $produto['preco']; ?></span>
                    <span>Quantidade: <?php echo $produto['quantidade']; ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button id="finalizar-pedido" onclick="window.location.href='confirmar_pedido.php'">Finalizar Pedido</button>
</div>
                    
    </section>
</main>



<footer class="text-black text-center p-3">
    <p class="text-center foot">&copy; 2024 Loja Sajol</p>
</footer>

<script src="./scripts.js"></script>
</body>
</html>
