<?php
include 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Senha nova</title>
</head>
<body>

    <form action="" method="POST"> 
        <div class="main-logo">

            <div class="rigth-login">
                <div class="card-login">
                     <h1>Nova Senha</h1>

                    <div class="textfield">
                        <label for="recuperar_senha">Nova Senha</label>
                        <input type="password" name="senha" placeholder="Insira"required>
                    </div>
                    <div class = "mensagem">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submite'])) {
                            
                            $novaSenha = $_POST['senha'];
                        
                            
                            $sql = "UPDATE usuarios SET senha = ? WHERE id = 1";
                            $stmt = $conexao->prepare($sql);
                        
                            if ($stmt) {
                                
                                $stmt->bind_param("s", $novaSenha);
                        
                                if ($stmt->execute()) {
                                    header("Location: login.php"); 
                                    exit;
                                } else {
                                    
                                    echo "Erro ao atualizar a senha: " . $conexao->error;
                                }
                        
                                
                                $stmt->close();
                            } else {
                                
                                echo "Erro na preparação da consulta: " . $conexao->error;
                            }
                        }
                        
                        $conexao->close();?>
                    </div>
                    <button class="btn-login" type = "submite" name ="submite"> Registre Senha</button>
                </div>
            </div>
        </div>
        </form>
    
</body>
</html>