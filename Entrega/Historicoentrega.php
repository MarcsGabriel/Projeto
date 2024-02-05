<?php
if (isset($_POST['entregue'])) {
    
    $CodigoEPI = $_POST['CodigoEPI'];
    $NomeFuncionario = $_POST['NomeFuncionario'];
    $setor = $_POST['setor'];
    $NomeEPI = $_POST['NomeEPI'];
    $QuantidadeEntrega = $_POST['QuantidadeEntrega'];

    
    include_once('../config.php'); 

    $sql = "INSERT INTO tabela_historico_entrega (CodigoEPI, NomeFuncionario, setor, NomeEPI, QuantidadeEntrega) VALUES ('$CodigoEPI', '$NomeFuncionario', '$setor', '$NomeEPI', '$QuantidadeEntrega')";

    if (mysqli_query($conexao, $sql)) {
        
        echo "Dados inseridos com sucesso!";
    } else {
        
        echo "Erro ao inserir dados na tabela de histórico de entrega: " . mysqli_error($conexao);
    }
}


$sqlSelect = "SELECT * FROM tabela_historico_entrega";
$result = mysqli_query($conexao, $sqlSelect);
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
    <script>
        
    </script>
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
                <li><a href="../Funcionario/Funcionarios.php"> Funcionarios </a></li>
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
                        <th scope="col"><h3>ID Funcionario.</h3></th>
                        <th scope="col"><h3>Setor</h3></th>
                        <th scope="col"><h3>Codigo Epi</h></th>
                        <th scope="col"><h3>Quantidade</h></th>
                        <th scope="col"></th>
                    </tr>
            </thead>
            <tbody>
                <?php 
                while($user_data = mysqli_fetch_assoc($result)){
                    echo"<tr>";
                    echo "<td align=\"center\">". $user_data['NomeFuncionario']."</td>";
                    echo "<td align=\"center\">". $user_data['setor']."</td>";
                    echo "<td align=\"center\">". $user_data['NomeEPI']."</td>";
                    echo "<td align=\"center\">". $user_data['QuantidadeEntrega']."</td>";
                    
                    echo"</tr>";
                }
                ?>
            </tbody>
        </table>

</body>
</html>