
<?php
session_start(); // Inicia a sessão para verificar se o usuário está logado
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Luvas - Loja Sajol</title>
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
                <ul class="nav"> <!-- Cabeçalho do site, cada nome de categoria redireciona para a pagina da categoria de produtos -->
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
        <h2 class="titulo">Confira nossas luvas!</h2>
        <section class="produtos"> <!-- Sessão com os produtos da categoria + classe para estilizar no css -->
            <div class="produto"> <!-- Classe para estilizar no css -->
                <img src="https://i.pinimg.com/736x/37/e1/49/37e14901ee345d58ebda5198366416bf.jpg" alt="Produto 1"> <!-- imagem + link dela -->
                <h3>Luvas Sajol-Nike Goleiro</h3>  <!-- Nome do produto -->
                <p id="produto-preco">Preço: R$ 89,90</p> <!-- preço do produto -->
                <button class="adicionar-carrinho" data-preco="R$ 89,90" data-imagem="https://i.pinimg.com/736x/37/e1/49/37e14901ee345d58ebda5198366416bf.jpg">Adicionar ao Carrinho</button>  <!-- Botão para adicionar ao carrinho futuramente -->
            </div>
            <div class="produto">
                <img src="https://i.pinimg.com/564x/84/f9/9f/84f99f94e8b391b817ae5228bd4e0822.jpg" alt="Produto 2">
                <h3>Luvas Sajol-Poker Goleiro</h3>
                <p>Preço: R$ 59,90</p>
                <button class="adicionar-carrinho" data-preco="R$ 59,90" data-imagem="https://i.pinimg.com/564x/84/f9/9f/84f99f94e8b391b817ae5228bd4e0822.jpg">Adicionar ao Carrinho</button>
            </div>
            <div class="produto">
                <img src="https://i.pinimg.com/564x/e1/0d/0c/e10d0caf65068a8bf293d737d1ecd486.jpg" alt="Produto 3">
                <h3>Luvas Sajol-Adidas Boxe</h3>
                <p id="produto-preco">Preço: R$ 129,90</p>
                <button class="adicionar-carrinho" data-preco="R$ 129,90" data-imagem="https://i.pinimg.com/564x/e1/0d/0c/e10d0caf65068a8bf293d737d1ecd486.jpg" >Adicionar ao Carrinho</button>
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
    <footer class="text-black text-center p-3"> <!-- Rodapé do site -->
        <p class="text-center foot">&copy; 2024 Loja Sajol</p>
    </footer>
    <script src="./scripts.js"></script>
 </body>
</html>
