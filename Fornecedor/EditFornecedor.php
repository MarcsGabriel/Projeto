<?php
    if(!empty($_GET['id'])){
        include_once('../config.php');
        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM fornecedor WHERE cnpj=$id";

        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result))
            {
            $cnpj = $user_data['cnpj'];
            $nome = $user_data['nome'];
            $tpproduto = $user_data['tpproduto'];
            $contato = $user_data['contato'];   
            }
            
        }
        else{
            header('Location: Fornecedores.php');
        }
        
        
    }
    else{
        header('Location: Fornecedores.php');
    }
?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEPI</title>
    <link rel="stylesheet" type="text/css" href="../css/estiloEPI.css" media="screen" />
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

    <div class="cadastroEPI">
        
        <form class="formulario" method="POST" action="saveEditFornecedor.php">
        
            <h2 class="titulo">Editar cadastro</h2>
            <label class="label">
                
                <input type="hidden" name="cnpj" id="cnpj" value="<?php echo$cnpj ?>" class="input-bordas" placeholder="CNPJ" required="">
                <span class="focus-border"> <i></i> </span>
            
            </label>
            <label class="label">
                
                <input type="text" name="nome" id="nome" value="<?php echo$nome ?>" class="input-bordas" placeholder="Nome Fantasia" required="">
                <span class="focus-border"> <i></i> </span>
            
            </label>
            <label class="label">
                
                <input type="text" name="tpproduto" id="tpproduto" value="<?php echo$tpproduto ?>" class="input-bordas" placeholder="Tipo de Produto" required="">
                <span class="focus-border"> <i></i> </span>
            
            </label>
            
            <label class="label">
                
                <input type="text" name="contato" id="contato" value="<?php echo$contato ?>" class="input-bordas" placeholder="Contato" required="">
                <span class="focus-border"> <i></i> </span>
            
            </label>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <button class="button-form borda-inversa" type="update" name="update" id="update"> Enviar</button>
            
        </form>  
    </div>
    
</body>
</html>