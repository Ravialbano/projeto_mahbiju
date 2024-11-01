<?php
require 'db.php';

// Verifica se o ID do produto foi enviado pelo formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_produto'])) {
    $id_produto = $_POST['id_produto'];

    // Executa a exclusão no banco de dados
    $sql = "DELETE FROM produtos WHERE id_produto = :id_produto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Produto excluído com sucesso!";
    } else {
        echo "Erro ao excluir o produto. Tente novamente.";
    }
}

// Redireciona de volta para a página de listagem após a exclusão
header("Location: listar_produtos.php");
exit;
