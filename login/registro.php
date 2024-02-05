<?php


    if(isset($_POST['submite'])){

        include_once('config.php');
       $nome = $_POST['nome'];
       $email = $_POST['email'];
       $senha = $_POST['senha'];

       $result = mysqli_query($conexao,"INSERT INTO usuarios(nome,email,senha)VALUES ('$nome','$email','$senha')");

       header('Location: ../projectHome.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="stylelogin.css">
    <script type="text/javascript" src="../barra.js"></script>
    <title>Registro GEPI</title>
</head>
<body>
<div class="top-bar">  
        <div class="imagem">
            <a href="../projectHome.php"><img src="../img/gepi.png" alt="Logo" height="70px"></a>   
        </div>

    </div>
        <form action="registro.php" method="POST"> 
        <div class="main-logo">

            <div class="rigth-login">
                <div class="card-login">
                     <br><img src="reg.png" alt=""><br>
                     <div class="textfield">
                        <label for="nome"> Nome</label>
                        <input type="text" name="nome" placeholder="Nome" required>
                    </div>

                    <div class="textfield">
                        <label for="email"> Email</label>
                        <input type="text" name="email" placeholder="E-mail"required>

                    </div>
                    <div class="textfield">
                        <label for="senha"> Senha</label>
                        <input type="password" name="senha" placeholder="Senha"required>
                    </div>
                    <button class="btn-login" type = "submite" name ="submite"> Registre</button>
                    <a class="btn btn-primary" href="../projectHome.php" role="button">Voltar</a>
                </div>
            </div>
        </div>
        </form>

        <script>
        function validarFormulario() {
            var nome = document.getElementById('nome').value;
            var email = document.getElementById('email').value;
            var senha = document.getElementById('senha').value;

            if (nome === '' || email === '' || senha === '') {
                alert('Por favor, preencha todos os campos.');
                return false; 
            }
            return true;
        }
    </script>

</body>
</html>
