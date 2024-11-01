
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        @font-face {
            src: url(/fonts/newyork/NewYork\ PERSONAL\ USE.otf);
            font-family: 'new york';

           
            
        }

        header{
            background-color: #999B85;
            position: absolute;
            top: 0;
            width: 100%;
            text-align: center;
   
            border-radius: 0 0 20px 20px;
        }
        header h2{
            color: #f4EFEC;
            text-align: center;
            font-family: 'new york';
            font-weight: lighter;
            font-size: 30px ;
            
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            height: 100vh;
            display: flex;
            background-color: #f4EFEC;
            background-image: url(img/flores.png) ;
            background-size: cover;
            background-position: center;
            font-weight: 400;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .container{
            background-color: #F0D9D1;
            text-align: center;
            width: 800px;
            height: 600px;
            top: 212;
            border-radius: 49px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        #folha_1{
            position: absolute;
            top: 88.24px;
            left: 425.93px;
            color: #999B85;
        }
        #folha_2{
            position: absolute;
            top: 662px;
            left: 1208px;
            color: #999B85;
        }
        .volta{
            position: absolute;
            bottom: 250px;
        }
        a{
            text-decoration: none;
            color: #999B85;
        }
      
    </style>
</head>
<body>
    <div class="container">
        <img src="img/Group 5.png" alt="folha" id="folha_1">
        <img src="img/Group 6.png" alt="folha" id="folha_2">
        <?php

require 'db.php'; // chama a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome_produto = $_POST['nome_produto'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];

    // upload de imagem

    $imagem = $_FILES['imagem']['name'];
    $target_dir = "uploads/"; // a imagem vai ser salva na pasta uploads do banco de dados
    $target_file = $target_dir . basename($imagem);

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file)) {

        $sql = "INSERT INTO produtos (nome_produto, descricao, preco, quantidade, categoria, imagem) 
                VALUES (:nome_produto, :descricao, :preco, :quantidade, :categoria, :imagem)";
        $stmt = $conn->prepare($sql);

        // bind dos valores

        $stmt->bindParam(':nome_produto', $nome_produto);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':imagem', $imagem);
        
        if ($stmt->execute()){
            echo "<h2 style='font-family:'new york';'>produto cadastrado com sucesso</h2>";
        }else {
            echo "<h2 style='font-family:'new york';'>erro ao cadastrar o produto</h2>";
        }
    }else {
        echo "<h2 style='font-family:'new york';'>erro ao fazer o upload da imagem</h2>";
    }
}else {
    echo "<h2 style='font-family:'new york';'>Metodo invalido</h2>";
}
?>  
    <a href="vendedor_dashboard.php" class="volta">clique para voltar</a>
    </div>
    
</body>
</html>
