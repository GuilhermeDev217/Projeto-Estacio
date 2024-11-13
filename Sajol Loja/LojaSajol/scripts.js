// Função para mostrar o pop-up com a imagem do produto e o preço
function mostrarPopup(imagem, preco, nome) {
    // Atualiza o conteúdo do pop-up com a imagem e o preço do produto
    document.getElementById('produto-imagem').src = imagem;
    document.getElementById('produto-preco').innerText = 'Preço: ' + preco;

    // Exibe o pop-up (mudando display de 'none' para 'flex' para que apareça)
    document.getElementById('popup-tamanho').style.display = 'flex';

    // Atribui o nome do produto ao botão "Adicionar ao Carrinho" no pop-up
    document.getElementById('adicionar-carrinho-popup').dataset.nome = nome;
    document.getElementById('adicionar-carrinho-popup').dataset.imagem = imagem;
    document.getElementById('adicionar-carrinho-popup').dataset.preco = preco;
}

// Evento para fechar o pop-up ao clicar no 'x'
document.querySelector('.fechar').addEventListener('click', function() {
    // Esconde o pop-up
    document.getElementById('popup-tamanho').style.display = 'none';
});

// Evento de clique para os botões de "Adicionar ao Carrinho" (cada produto)
document.querySelectorAll('.adicionar-carrinho').forEach(function(botao) {
    botao.addEventListener('click', function() {
        // Captura a imagem, o preço e o nome do produto
        const produtoImagem = this.dataset.imagem;
        const produtoPreco = this.dataset.preco;
        const produtoNome = this.previousElementSibling.innerText;  // Pega o nome do produto (h3)

        // Exibe o pop-up com as informações do produto
        mostrarPopup(produtoImagem, produtoPreco, produtoNome);
    });
});

// Função para adicionar o produto ao carrinho (dentro do pop-up)
document.getElementById('adicionar-carrinho-popup').addEventListener('click', function() {
    const produto = {
        nome: this.dataset.nome,
        preco: this.dataset.preco,
        imagem: this.dataset.imagem,
        tamanho: document.getElementById('tamanho').value  // Obtém o tamanho selecionado no pop-up
    };

    // Verifica se todos os campos necessários estão preenchidos
    if (!produto.nome || !produto.preco || !produto.imagem || !produto.tamanho) {
        alert("Todos os campos devem ser preenchidos.");
        return;  // Se algum campo estiver vazio, não envia a requisição
    }

    console.log("Dados do produto:", produto);  // Verifica os dados no console

    // Adiciona o produto ao carrinho
    addToCart(produto);
    
    // Fecha o pop-up
    document.getElementById('popup-tamanho').style.display = 'none';

    // Mostra a notificação de sucesso
    showAddNotification();
});

// Função para adicionar o produto ao carrinho (atualizar o carrinho lateral)
function addToCart(produto) {
    // Se a sessão de carrinho já existe, obtém ela, caso contrário, cria um novo carrinho
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Verifica se o produto já existe no carrinho, caso sim, atualiza a quantidade
    const produtoExistente = carrinho.find(item => item.nome === produto.nome && item.tamanho === produto.tamanho);

    if (produtoExistente) {
        produtoExistente.quantidade += 1;  // Incrementa a quantidade
    } else {
        produto.quantidade = 1;  // Se o produto não existir, adiciona com quantidade 1
        carrinho.push(produto);
    }

    // Atualiza o carrinho no localStorage
    localStorage.setItem('carrinho', JSON.stringify(carrinho));

    // Atualiza a visualização do carrinho lateral
    updateCarrinho();
}

// Função para mostrar a notificação quando o produto for adicionado ao carrinho
function showAddNotification() {
    var notification = document.getElementById('addNotification');
    
    // Exibe a notificação
    notification.style.display = 'block';
    
    // Após 3 segundos, a notificação desaparece
    setTimeout(function() {
        notification.style.display = 'none';
    }, 3000);
}

// Função para atualizar o carrinho lateral
function updateCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const carrinhoContainer = document.getElementById('produtos-carrinho');
    carrinhoContainer.innerHTML = ''; // Limpa o conteúdo atual do carrinho

    if (carrinho.length === 0) {
        carrinhoContainer.innerHTML = '<p>Nenhum produto no carrinho.</p>';
    } else {
        carrinho.forEach((produto, index) => {
            const produtoElement = document.createElement('div');
            produtoElement.classList.add('produto-carrinho');
            produtoElement.innerHTML = `
                <img src="${produto.imagem}" alt="${produto.nome}" style="width: 50px; height: 50px;">
                <span>${produto.nome} </span>
                <span>Tamanho: ${produto.tamanho}</span>
                <span>Quantidade: ${produto.quantidade}</span>
                <button class="remover-produto" data-index="${index}" style="background-color: red; color: white; border: none; cursor: pointer; padding: 5px 10px; margin-top: 5px;">Remover</button>
            `;
            carrinhoContainer.appendChild(produtoElement);
        });

        // Adicionar evento de remover para cada botão "Remover"
        document.querySelectorAll('.remover-produto').forEach(function(botao) {
            botao.addEventListener('click', function() {
                const index = this.dataset.index;  // Pega o índice do produto a ser removido
                removeFromCart(index);
            });
        });
    }
}

// Função para remover um produto do carrinho
function removeFromCart(index) {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Remove o produto com o índice fornecido
    carrinho.splice(index, 1);

    // Atualiza o carrinho no localStorage
    localStorage.setItem('carrinho', JSON.stringify(carrinho));

    // Atualiza a visualização do carrinho lateral
    updateCarrinho();
}

// Chama a função de atualização de carrinho ao carregar a página
document.addEventListener('DOMContentLoaded', updateCarrinho);
