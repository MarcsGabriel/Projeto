


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../login/stylelogin.css">
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
        <div class ="Tamanho">
        <?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categorias = [];
    
    
    for ($i = 1; isset($_POST["categoria$i"]); $i++) {
        $categoria = $_POST["categoria$i"];
        if (!empty($categoria)) {
            $categorias[] = $categoria;
        }
    }
    
    if (count($categorias) >= 2) {
        $soma = array_sum($categorias);
        $media = $soma / count($categorias);
        echo "A média da quantidade de EPI para as categorias selecionadas é: $media";

        // Calcular a mediana
        sort($categorias);
        $count = count($categorias);
        if ($count % 2 == 0) {
            $mediana = ($categorias[($count / 2) - 1] + $categorias[$count / 2]) / 2;
        } else {
            $mediana = $categorias[floor($count / 2)];
        }
        echo "<br>A mediana da quantidade de EPI para as categorias selecionadas é: $mediana";

        // Calcular a moda
        $counts = array_count_values($categorias);
        $maxCount = max($counts);
        $moda = array();
        foreach ($counts as $value => $count) {
            if ($count == $maxCount) {
                $moda[] = $value;
            }
        }
        if (count($moda) > 1) {
            echo "<br>As modas da quantidade de EPI para as categorias selecionadas são: " . implode(", ", $moda);
        } else {
            echo "<br>A moda da quantidade de EPI para as categorias selecionadas é: " . reset($moda);
        }
    } else {
        echo "Pelo menos duas categorias devem ser selecionadas.";
    }
}
?>
        
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

