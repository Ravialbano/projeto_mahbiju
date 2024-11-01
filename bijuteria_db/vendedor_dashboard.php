<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo a loja de bijuterias</title>
    
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
            font-family: 'new york';
            font-weight: lighter;
            height: 100vh;
            display: flex;
            background-color: #f4EFEC;
            background-image: url(img/flores.png) ;
            background-size: cover;
            background-position: center;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .container{
            text-align: center;
            width: 1219px;
            height: 400px;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            display: flex;
            font-weight: lighter;
        }
        #folha_1{
            position: absolute;
            top: 160.76px;
            left:220px;
            color: #999B85;
        }
        #folha_2{
            position: absolute;
            top: 600px;
            left: 1458px;
            color: #999B85;
        }

        .section{
            background-color: #F0D9D1;
            color: #999B85;
            font-family: 'new york';
            border-radius: 40px;
            width: 600px;
            height: 400px;
            margin-left: 20px;
            font-weight: lighter;
        }
        .section h2{
            font-size: 40px;
        }
        #img_cadastro{
            height: 100px;
            width: 150px;
            padding: 20px;
            background-color: #999B85;
            border-radius: 20px;

        }
        #img_cadastro:hover{
            transform: scale(1.25, 1.25);
            cursor: pointer;
        }
        #img_estoque{
            height: 100px;
            width: 150px;
            padding: 20px;
            background-color: #999B85;
            border-radius: 20px;
        }
        #img_estoque:hover{
            transform: scale(1.25, 1.25);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h2>mahbiju</h2>
    </header>
        <img id="folha_1" src="img/Group 6.png" alt="folha">
        <img id="folha_2" src="img/Group 5.png" alt="folha">
    
    <div class="container" >
        <div class="section">
             <h2>Cadastrar produto</h2>
             <a href="cadastrar_produto.php"><img id="img_cadastro"  src="img/cadastrar_png-removebg-preview.png"></a>
        </div>
          
        <div class="section">
             <h2>Ver estoque</h2>
             <a href="listar_produtos.php"><img id="img_estoque"   src="img/png-transparent-computer-icons-estoque-maquina-text-rectangle-black-thumbnail-removebg-preview.png" alt=""></a>
        </div>
    </div>
    

</body>
</html>