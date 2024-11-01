<?php
require 'db.php';   

// Inicializa a variável de pesquisa
$search = "";

// Verifica se o formulário de pesquisa foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Consulta SQL com filtro e ordenação alfabética
$sql = "SELECT * FROM produtos WHERE nome_produto LIKE :search ORDER BY nome_produto ASC";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':search', '%' . $search . '%');
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        /* Seu estilo existente */
        @font-face {
            src: url(/fonts/newyork/NewYork\ PERSONAL\ USE.otf);
            font-family: 'new york';
        }

        header {
            background-color: #999B85;
            position: absolute;
            top: 0;
            width: 100%;
            text-align: center;
            border-radius: 0 0 20px 20px;
        }
        header h2 {
            color: #f4EFEC;
            text-align: center;
            font-family: 'new york';
            font-weight: lighter;
            font-size: 30px ;
        }
        body {
            height: 100vh;
            display: flex;
            background-color: #f4EFEC;
            background-image: url(img/flores.png);
            background-size: cover;
            background-position: center;
            align-items: center;
            justify-content: center;
            margin: 0;
            flex-direction: column;
        }
        .container {
            font-family: 'new york';
            background-color: #F0D9D1;
            text-align: center;
            width: 800px;
            padding: 100px;
            top: 212;
            border-radius: 49px;
            display: flex;
            flex-direction: column;
            max-height: 300px; /* Altura máxima */
            overflow-y: auto; /* Rolagem vertical */
            overflow-x: auto; /* Rolagem horizontal, se necessário */
        }
        table {
            border: 3px solid #999B85;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 3px solid #999B85;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <header>
        <h2>Pesquisar e Listar Produtos</h2>
    </header>
    
    <div class="container">
        <h1 style="font-family:'new york';">Lista de Produtos</h1>

        <!-- Formulário de Pesquisa -->
        <form method="GET" action="listar_produtos.php" style="margin-bottom: 20px;">
            <input type="text" name="search" placeholder="Pesquisar produto" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Buscar</button>
        </form>

        <!-- Tabela de Produtos -->
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td><?= htmlspecialchars($produto['nome_produto']) ?></td>
                    <td><?= htmlspecialchars($produto['descricao']) ?></td>
                    <td><?= number_format($produto['preco'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($produto['quantidade']) ?></td>
                    <td><?= htmlspecialchars($produto['categoria']) ?></td>
                    
                    <td>
                        <?php if (!empty($produto['imagem'])): ?>
                            <img src="uploads/<?= htmlspecialchars($produto['imagem']) ?>" width="100" height="100">
                        <?php endif; ?>
                    </td>
                    <td>
                      
                        <form action="deletar_produto.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id_produto" value="<?= htmlspecialchars($produto['id_produto']) ?>">
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <?php if (empty($produtos)): ?>
                <tr>
                    <td colspan="7">Nenhum produto encontrado.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
