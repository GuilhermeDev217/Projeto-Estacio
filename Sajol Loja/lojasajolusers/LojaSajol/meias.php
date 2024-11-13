<?php
session_start(); // Inicia a sessão para verificar se o usuário está logado
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meias - Loja Sajol</title>
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
        <h2 class="titulo">Confira nossas meias!</h2>
        <section class="produtos">
            <div class="produto">
                <img src="https://i.pinimg.com/736x/6f/33/f0/6f33f07528db9d5ac479d1722a928772.jpg" alt="Produto 1">
                <h3>Meias Sajol-Nike</h3>
                <p>Preço: R$ 89,90</p>
                <button class="adicionar-carrinho" data-imagem="https://i.pinimg.com/736x/6f/33/f0/6f33f07528db9d5ac479d1722a928772.jpg" data-preco="R$ 89,90" data-nome="Meias Sajol-Nike">Adicionar ao Carrinho</button>
            </div>
            <div class="produto">
                <img src="https://a-static.mlcdn.com.br/800x560/kit-de-3-pares-meias-adidas-sportswear-no-show-unissex/b2online/ic1337s/1f8c1d0be10e63b3ea21e14ee73340ce.jpeg" alt="Produto 2">
                <h3>Meias Sajol-Adidas</h3>
                <p>Preço: R$ 49,90</p>
                <button class="adicionar-carrinho" data-imagem="https://a-static.mlcdn.com.br/800x560/kit-de-3-pares-meias-adidas-sportswear-no-show-unissex/b2online/ic1337s/1f8c1d0be10e63b3ea21e14ee73340ce.jpeg" data-preco="R$ 49,90" data-nome="Meias Sajol-Adidas">Adicionar ao Carrinho</button>
            </div>
            <div class="produto">
                <img src="https://i.pinimg.com/236x/7b/ce/0b/7bce0bd8efd933a65e1211e86b416df4.jpg" alt="Produto 3">
                <h3>Meias Sajol</h3>
                <p>Preço: R$ 29,90</p>
                <button class="adicionar-carrinho" data-imagem="https://i.pinimg.com/236x/7b/ce/0b/7bce0bd8efd933a65e1211e86b416df4.jpg" data-preco="R$ 29,90" data-nome="Meias Sajol">Adicionar ao Carrinho</button>
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
    <button id="finalizar-pedido" onclick="window.location.href='confirma_pedido.php'">Finalizar Pedido</button>
</div>
            <!-- Outros produtos -->
        </section>
    </main>
    <footer class="text-black text-center p-3">
        <p class="text-center foot">&copy; 2024 Loja Sajol</p>
    </footer>
    <script src="./scripts.js"></script>
</body>
</html>
