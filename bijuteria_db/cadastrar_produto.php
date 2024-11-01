<?php  
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
         .container{
            background-color: #F0D9D1;
            width: 800px;
            height: 800px;
            top: 212;
            border-radius: 49px;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        #folha_1{
            position: absolute;
            top: 20.24px;
            left: 425.93px;
            color: #999B85;
        }
        #folha_2{
            position: absolute;
            top: 730px;
            left: 1208px;
            color: #999B85;
        }
        body{
            display: flex;
            text-align: center;
            font-family: 'new york';
            font-weight: lighter;
            height: 100vh;
            background-color: #f4EFEC;
            background-image: url(img/flores.png) ;
            background-size: cover;
            background-position: center;
            align-items: center;
            justify-content: center;
        }
        form{
            text-align: center;
            height: 4rem;
            padding: 20px;  
            display: flex;
            flex-direction: column;
            width: 300px;
            margin-left: 225px;
           
        }
        .input-text {
            color: #333333;
            border: none;
            border-bottom: 1px solid #b6b6b6;
            font-size: 1rem;
            margin: 2px 0 5px;
            width: 100%;
        }

        .input-text:focus-visible {
            border: none;
            border-bottom: 1px solid #333333;
            outline: none;
        }


        .button {
            background-color: #DDB7AC;
            border: none;
            border-radius: 30px;
            color: #fff;
            font-weight: bold;
            font-size: 1rem;
            margin: 20px 0;
            padding: 15px;
             width: 100%;
        }

        .button:hover {
            opacity: 70%;
        }

        .button:disabled {
            color: #dddcdc;
            background-color: #f6f6f6;
        }
        .login_h1{
            font-size: 45px;
            color: #999B85;
            font-family:'new york';
        }
        a{
            text-decoration: none;
            color: #999B85;
        }
        .input-label {
            display: block;
            color: #999B85;
            font-size: 0.9rem;
            margin: 20px 0 5px;
        }
        #imagem{
            margin: 20px;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produtos</title>
</head>
<body>
    <div class="container">
        <img id="folha_1" src="img/Group 6.png" alt="folha">
        <img id="folha_2" src="img/Group 5.png" alt="folha">
    <h1>Cadastrar produto</h1>
    <form action="salvar_produto.php" method="post" enctype="multipart/form-data" >
    
        <label for="nome_produto" class="input-label">Nome do produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" required class ="input_text">

        <label for="descricao" class="input-label">Descrição do produto:</label>
        <input type="text" id="descricao" name="descricao" required class ="input_text">

        <label for="preco" class="input-label">preço: </label>
        <input type="text" id="preco" name="preco" required class = "input_text">

        <label for="quantidade" class="input-label">quantidade em estoque:</label>
        <input type="number" id="quantidade" name="quantidade" required class="input_text">

        <label for="categoria" class="input-label">categoria: </label>
        <input type="text" id="categoria" name="categoria" required class="input_text">

        <label for="imagem" class="input-label">imagens do produto: </label>
        <input type="file" id="imagem" name="imagem" required >

        <input type="submit" value="Cadastrar" class="button">
    </form>
    </div>
</body>
</html>