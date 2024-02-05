<?php 
    session_start();
    
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEPI</title>
    <link rel="stylesheet" type="text/css" href="./css/estilo.css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="barra.js"></script>
   
</head>
<body>
    
    <div class="top-bar">  
        <div class="imagem">
            <a href="projectHome.php"><img src="./img/gepi.png" alt="Logo" height="70px"></a>   
        </div>

        <div class="sair">
            <a href="./login/login.php"> Sair</a> <br><br>
        
        </div>
    </div>

        <div class="borda">
                <nav>
                    <ul class="dropdown">
                    <li> 
                        <img src="./img/Registros.png"><br>
                        <a>Cadastros &#9660;</a>
                        <ul class="dropdown-submenu">
                            <li><a href="./EPI/EPI.php">EPI</a></li>
                            <li><a href="./Funcionario/Funcionario.php">Funcionario</a></li>
                            <li><a href="./Fornecedor/Fornecedor.php">Fornecedor</a></li>
                        </ul>
                    </li>
        
                  <li>
                    <img src="./img/produtoss.png" ><br>
                    <a>Dados &#9660;</a>
                    <ul class="dropdown-submenu">
                            <li><a href="./EPI/EPIs.php">D/EPI</a></li>
                            <li><a href="./Funcionario/Funcionarios.php">D/Funcionario</a></li>
                            <li><a href="./Fornecedor/Fornecedores.php">D/Fornecedor</a></li>
                        </ul>
                    </li>  
                  <li>
                    <img src="./img/fornecem.png" alt=""><br>
                    <a >Fornecimentos &#9660;</a>
                    <ul class="dropdown-submenu">
                            <li><a href="./Entrega/entrega.php">Entrega</a></li>
                        </ul>
                </li>  
                  <li>
                    <img src="./img/estatistica.png" alt=""><br>
                    <a href="">Estatistica &#9660; </a>
                    <ul class="dropdown-submenu">
                            <li><a href="./estatistica/dados.php">Estatistica</a></li>
         
                        </ul>
                </li>

                <li>
                    <img src="./img/cadastre.png" alt=""><br>
                    <a href="">Registre-se &#9660; </a>
                    <ul class="dropdown-submenu">
                            <li><a href="./login/registro.php">Registra</a></li>
         
                        </ul>
                </li>
                  </ul>
                  </nav>
        </div>
</body>
</html>