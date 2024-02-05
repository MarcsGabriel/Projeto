<!DOCTYPE html>
<html lang="Pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrega</title>
    <link rel="stylesheet" type="text/css" href="../css/estiloEPI.css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="../barra.js"></script>
    <script src="conectar_bd.js"></script>

    <script>
        function preencherSetor() {
            var selectFuncionario = document.getElementById("NomeFuncionario");
            var inputSetor = document.getElementById("setor");
            var selectedValue = selectFuncionario.options[selectFuncionario.selectedIndex].getAttribute("data-setor");

            inputSetor.value = selectedValue;
        }
   
        document.addEventListener("DOMContentLoaded", function() {
            var selectNomeEPI = document.getElementById("NomeEPI");
            var inputQuantidadeEPI = document.getElementById("QuantidadeEPI");
            var inputQuantidadeEntrega = document.getElementById("QuantidadeEntrega");
            var resultadoSpan = document.getElementById("resultado");

            selectNomeEPI.addEventListener("change", function() {
                var selectedOption = selectNomeEPI.options[selectNomeEPI.selectedIndex];
                var quantidadeEPI = selectedOption.getAttribute("data-quantidade-epi");

                inputQuantidadeEPI.value = quantidadeEPI;
            });

            document.getElementById("calcular").addEventListener("click", function() {
    var quantidadeEPI = parseFloat(inputQuantidadeEPI.value);
    var quantidadeEntrega = parseFloat(inputQuantidadeEntrega.value);

    if (!isNaN(quantidadeEPI) && !isNaN(quantidadeEntrega)) {
        var resultado = quantidadeEPI - quantidadeEntrega;
        resultadoSpan.textContent = resultado;

       
        var selectedOptionEPI = selectNomeEPI.options[selectNomeEPI.selectedIndex];
        var codigoEPI = selectedOptionEPI.value;
        document.getElementById("CodigoEPI").value = codigoEPI;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "seuscript.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                if (response === "success") {
                
                    document.getElementById("mensagem").textContent = "Dados enviados com sucesso.";
                } else {

                    document.getElementById("mensagem").textContent = "Erro ao enviar dados para o banco de dados.";
                }
            }
        };
        xhr.send("QuantidadeEntrega=" + quantidadeEntrega + "&QuantidadeEPI=" + quantidadeEPI + "&resultado=" + resultado + "&CodigoEPI=" + codigoEPI);
    } else {
        resultadoSpan.textContent = "Erro nos valores inseridos";
    }
});
        });

        

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
                <li><a href="entrega.php"> Entrega</a></li>
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
        <form class="formulario" method="POST" action="HistoricoEntrega.php">
            <h2 class="titulo">Entrega EPI</h2>
            
            <label class="label">
                <select name="NomeFuncionario" id="NomeFuncionario" class="input-bordas" required onchange="preencherSetor()">
                    <option value="" data-setor="">Selecione um funcionário</option>
                    <?php
                    
                    include_once('../config.php');

                    
                    $sql = "SELECT idfuncionarios, nome, setor FROM funcionarios ORDER BY idfuncionarios DESC";
                    $result = $conexao->query($sql);

                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['idfuncionarios'] . "' data-setor='" . $row['setor'] . "'>" . $row['nome'] . "</option>";
                    }
                    ?>
                </select>
                <span class="focus-border"><i></i></span>
            </label>

            <label class="label">
                <input type="text" name="setor" id="setor" class="input-bordas" placeholder="Setor" required>
                <span class="focus-border"><i></i></span>
            </label>

            <label class="label">
                <select name="NomeEPI" id="NomeEPI" class="input-bordas" required>
                <option value="">Selecione um EPI</option>
                <?php
                 
                $sqlEPIs = "SELECT CodigoEPI, NomeEPI, QuantidadeEPI FROM epi ORDER BY CodigoEPI DESC";
                $resultEPIs = $conexao->query($sqlEPIs);

                
                while ($rowEPIs = mysqli_fetch_assoc($resultEPIs)) {
                echo "<option value='" . $rowEPIs['CodigoEPI'] . "' data-quantidade-epi='" . $rowEPIs['QuantidadeEPI'] . "'>" . $rowEPIs['NomeEPI'] . "</option>";
                }
                    ?>
                </select>
                <span class="focus-border"><i></i></span>
            </label>

            <label class="label">
                <input type="text" name="
                " id="QuantidadeEPI" class="input-bordas" placeholder="TotalEpi" required>
                <span class="focus-border"><i></i></span>
            </label>

            <label class="label">
            <input type="text" name="QuantidadeEntrega" id="QuantidadeEntrega" class="input-bordas" placeholder="Insira a quantidade" required>
            <span class="focus-border"><i></i></span>
            </label>
            
            <input type="hidden" name="CodigoEPI" id="CodigoEPI">

            <div class="resultado">
                <span id="resultado"></span>
                </div>
                <div id="mensagem"></div>
                <button class="button-form borda-inversa" type="submit" id="calcular" name="entregue" >Entregue</button>
        </form>
    </div>
</body>
</html>
