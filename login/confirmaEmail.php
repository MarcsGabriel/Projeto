<?php

include 'config.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Recuperar senha</title>
</head>
<body>
    <form action="confirmaEmail.php" method="POST"> 
        <div class="main-logo">
            <div class="left-login">
                 <img src="security2.svg" class="left-login-imagen" alt="animação no login">
                 
            </div>
            <div class="rigth-login">
                <div class="card-login">
                        
                    <h1>Confirme E-mail</h1>
                    <div class="textfield">
                        <label for="email"> E-mail</label>
                        <input type="text" name="email" placeholder="E-mail" required>

                    </div>
                    <div class= "mensagem">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sendRecuperar"])) {
                            $email = $_POST['email'];

                            
                            $sql = "SELECT * FROM usuarios WHERE email = '$email'";
                            $result = $conexao->query($sql);

                            if ($result->num_rows > 0) {
                            
                                header("Location: recuperandoSenha.php"); 
                                exit;
                                
                            } else {
                                
                                echo "$email não existe no sistema.";
                            }

                            
                        }
                        ?>
                    </div>
                    <button class="btn-login" type = "submite" name ="sendRecuperar">Recuperar</button>
    
</body>
</html>