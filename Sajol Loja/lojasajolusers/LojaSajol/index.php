<?php
session_start(); // Inicia a sessão para verificar se o usuário está logado
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Sajol</title>
    <link rel="icon" type="image/png" href="./assets/leao.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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

                    <!-- Verifica se o usuário está logado -->
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

    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/slide1.webp" class="slider d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="./assets/slide2.jpg" class="slider d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="./assets/slide3.jpg" class="slider d-block w-100" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="./assets/slide4.jpg" class="slider d-block w-100" alt="Slide 4">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>

    <main class="container mt-4 text-center">
        <h2 class="foot">Bem-vindo à Loja Sajol !</h2>
        <p>Confira alguns de nossos produtos:</p>
        <section class="produtos">
            <div class="produtop">
                <img src="https://a-static.mlcdn.com.br/800x560/kit-de-3-pares-meias-adidas-sportswear-no-show-unissex/b2online/ic1337s/1f8c1d0be10e63b3ea21e14ee73340ce.jpeg" alt="Produto 1">
                <h3>Meias Sajol-Adidas</h3>
                <p>Preço: R$ 39,90</p>
                <button><a class="text-white direct" href="./meias.php">Explorar Categoria</a></button>
            </div>
            <div class="produtop">
                <img src="https://i.pinimg.com/564x/9a/7e/e9/9a7ee96a7704383e0e33cc34862d8e6f.jpg" alt="Produto 2">
                <h3>Boné Tênis Sajol-Adidas</h3>
                <p>Preço: R$ 89,90</p>
                <button><a class="text-white direct" href="./bones.php">Explorar Categoria</a></button>
            </div>
            <div class="produtop">
                <img src="https://i.pinimg.com/736x/65/48/d9/6548d920df5854450a671740f1165dba.jpg" alt="Produto 3">
                <h3>Tênis Sajol-Nike</h3>
                <p>Preço: R$ 389,90</p>
                <button><a class="text-white direct" href="./tenis.php">Explorar Categoria</a></button>
            </div>
            <div class="produtop">
                <img src="https://i.pinimg.com/736x/2e/24/45/2e244581793a58be60c860b117c1e6c9.jpg" alt="Produto 4">
                <h3>Manguito Sajol</h3>
                <p>Preço: R$ 39,90</p>
                <button><a class="text-white direct" href="./luvas.php">Explorar Categoria</a></button>
            </div>
        </section>
    </main>

    <footer class="text-black text-center p-3">
        <p class="text-center foot">&copy; 2024 Loja Sajol</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./scripts.js"></script>
</body>
</html>
