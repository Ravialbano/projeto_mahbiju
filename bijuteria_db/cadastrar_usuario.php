<?php 
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo']; //pode ser adm ou vendedor

    $sql = "select * from usuarios WHERE nome = :nome LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->execute();


    if($stmt->rowCount() > 0){
    $error = "Nome de usuário já existe, por favor escolha outro";
    } else {
    
    $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios( nome, senha, tipo) values (:nome, :senha, :tipo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':senha', $hashedPassword);
    $stmt->bindParam(':tipo', $tipo);

    if ($stmt->execute()) {
        $success = "O cadastro foi realizado com sucesso!";
    } else {
        $error = "Ocorreu um erro ao cadastrar o usuário, por favor tente novamente.";
 }  
}
}
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
            height: 100vh;
            display: flex;
            background-color: #f4EFEC;
            background-image: url(img/flores.png) ;
            background-size: cover;
            background-position: center;
            align-items: center;
            justify-content: center;
            margin: 0;
            flex-direction: column;
        }
        .container{
            background-color: #F0D9D1;
            text-align: center;
            width: 800px;
            height: 600px;
            top: 212;
            border-radius: 49px;
            display: flex;
            flex-direction: column;
        }
        .container form{
            display: grid;
            flex-direction: column;
            width: 200px;
            margin-left: 38%;
             
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
        .input-label {
            display: block;
            color: #999B85;
            font-size: 0.8rem;
            margin: 20px 0 5px;
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

    </style>
</head>
<body>
    <header>
        <h2>mahbiju</h2>
    </header>
    <div class="container">
        <img id="folha_1" src="img/Group 6.png" alt="folha">
        <img id="folha_2" src="img/Group 5.png" alt="folha">
        <h1>Cadastrar Usuário</h1>
        <?php 
        if (!empty($error)) echo "<p style='color: red;'>$error</p>"; 
        if (!empty($success)) echo "<p style='color: green;'>$success</p>"; 
        ?>
        <form action="cadastrar_usuario.php" method="POST">
            <label for="nome" class="input-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form_text" required>
            <label for="senha" class="input-label">Senha:</label>
            <input type="password" name="senha" id="senha" class="form_text" required>
            <label for="tipo">Função:</label>
            <select name="tipo" id="tipo">
                <option value="vendedor">Vendedor</option>
    
            </select> 

            <button type="submit" class="button">Cadastrar</button>
        </form>
        <br>
        <a href="index.html">Voltar para a página inicial</a>

    </div>

</body>
</html>