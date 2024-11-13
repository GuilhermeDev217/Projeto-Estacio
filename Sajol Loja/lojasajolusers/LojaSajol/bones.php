
<?php
session_start(); // Inicia a sessão para verificar se o usuário está logado
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bonés - Loja Sajol</title>
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
        <h2>Confira nossos bonés!</h2>
        <section class="produtos">
            <!-- Produtos -->
            <div class="produto">
                <img src="https://img.fantaskycdn.com/6c0f1d911c4d03b8e8a895f911f7761f_750x.jpeg" alt="Produto 1">
                <h3>Boné Viseira Sajol</h3>
                <p >Preço: R$ 49,90</p>
                <button class="adicionar-carrinho" data-imagem="https://img.fantaskycdn.com/6c0f1d911c4d03b8e8a895f911f7761f_750x.jpeg"data-preco="R$ 49,90">Adicionar ao Carrinho</button>
            </div>
            <div class="produto">
                <img src="https://i.pinimg.com/736x/b4/b8/75/b4b875b54b5c8909b830a6680f974593.jpg" alt="Produto 2">
                <h3>Boné Sajol-NY</h3>
                <p id="produto-preco">Preço: R$ 89,90</p>
                <button class="adicionar-carrinho" data-imagem="https://i.pinimg.com/736x/b4/b8/75/b4b875b54b5c8909b830a6680f974593.jpg" data-preco="R$ 89,90">Adicionar ao Carrinho</button>
            </div>
            <div class="produto">
                <img src="https://i.pinimg.com/236x/94/b8/33/94b833132acc4de3f298d1015b4c7a6e.jpg" alt="Produto 3">
                <h3>Boné DryFit Sajol-Nike</h3>
                <p id="produto-preco">Preço: R$ 79,90</p>
                <button class="adicionar-carrinho" data-imagem="https://i.pinimg.com/236x/94/b8/33/94b833132acc4de3f298d1015b4c7a6e.jpg" data-preco="R$ 79,90">Adicionar ao Carrinho</button>
            </div>
            <div class="carrinho">
    <h3>Carrinho</h3>
    <div id="produtos-carrinho">
        <?php if (empty($carrinho)): ?>
            <p>Nenhum produto no carrinho.</p>
        <?php else: ?>
            <?php foreach ($carrinho as $produto): ?>
                <div class="produto-carrinho">
                    <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" style="width: 50px; height: 50px;">
                    <span><?php echo $produto['nome']; ?> - R$ <?php echo $produto['preco']; ?></span>
                    <span>Tamanho: <?php echo $produto['tamanho']; ?></span>
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
