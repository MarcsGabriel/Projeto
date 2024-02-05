<?php
include_once('../config.php');
$sql = "SELECT * FROM funcionarios ORDER BY idfuncionarios DESC";
$result = $conexao ->query($sql);
print_r($result);
?>


<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEPI</title>
    <link rel="stylesheet" type="text/css" href="../css/estiloEPIs.css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="../barra.js"></script>
</head>
<body>
<div class="top-bar">
        <span class="icon" onclick="toggleSubmenu('cadastro')"><a><img src="../img/Registros.png" style="max-widht:32px; max-height:32px;"></a>Cadastro </span>
        <span class="icon" onclick="toggleSubmenu('estoque')"><a><img src="../img/produtoss.png" style="max-widht:32px; max-height:32px;"></a>Dados</span>
        <span class="icon" onclick="toggleSubmenu('fornecimento')"><a><img src="../img/fornecem.png"style="max-widht:32px; max-height:32px;"></a>Fornecimento</span>
        <span class="icon" onclick="toggleSubmenu('estatisticas')"><a><img src="../img/estatistica.png" style="max-widht:32px; max-height:32px;">Estatísticas</a></span>
        <div class="sub-menu" id="cadastro-sub-menu">
                <li><a href="../EPI/EPI.php"> EPI</a></li>
                <li><a href="../Funcionario/Funcionario.php"> Funcionário</a></li>
                <li><a href="../Fornecedor/Fornecedor.php"> Fornecedor</a></li>
        </div>
        <div class="sub-menu" id="estoque-sub-menu">
                <li><a href="../EPI/EPIs.php"> EPIs</a></li>
                <li><a href="Funcionarios.php"> Funcionarios </a></li>
                <li><a href="../Fornecedor/Fornecedores.php"> Fornecedores  </a></li>
        </div>
        <div class="sub-menu" id="fornecimento-sub-menu">
                <li><a href="../Entrega/entrega.php"> Entrega</a></li>
        </div>
        <div class="sub-menu" id="estatisticas-sub-menu">
                <li><a href="../estatistica/dados.php">Estatistica</a></li>    
                
        </div>
        <div class="imagem">
            <a href="../projectHome.php"><img src="../img/gepi.png" alt="Logo" height="70px"></a>
        </div>
        <div class="sair">
            <a href="../login/login.php"> Sair</a> <br><br>
            
        </div>
       
    </div>


    <div class="tabelaEPI">
        <table class = "table">
            <thead>
                    <tr>
                        <th scope="col"><h3>ID Funcionario</h3></th>
                        <th scope="col"><h3>Nome Funcionario</h3></th>
                        <th scope="col"><h3>Setor</h3></th>
                        <th scope="col"></th>
                    </tr>
            </thead>
            <tbody>
                <?php 
                while($user_data = mysqli_fetch_assoc($result)){
                    echo"<tr>";
                    echo "<td align=\"center\">". $user_data['idfuncionarios']."</td>";
                    echo "<td align=\"center\">". $user_data['nome']."</td>";
                    echo "<td align=\"center\">". $user_data['setor']."</td>";
                    echo "<td align=\"center\">
                    <a class='btn' href='EditFuncionario.php?id=$user_data[idfuncionarios]'>
                    <img src='../img/editartexto.png' style='max-widht:20px; max-height:20px;'>
                    </a>
                    <a class='btn' href='DeleteFuncionario.php?id=$user_data[idfuncionarios]'>
                    <img src='../img/lixo.png' style='max-widht:20px; max-height:20px;'>
                    </a>
                    </td>";
                    echo"</tr>";
                }
                ?>
            </tbody>
        </table>

</body>
</html>