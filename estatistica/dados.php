<?php include("conn.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="../barra.js"></script>
    <title>Estatísticas GEPI</title>
    
</head>
<body>
<div class="top-bar">  
        <div class="imagem">
            <a href="../projectHome.php"><img src="../img/gepi.png" alt="Logo" height="70px"></a>   
        </div>

    </div>
    <form action="media.php" method="POST">
        <div class="fundo">
            <div class="backfundo">
                <div class="fundo-formulario">
                    <h2>Selecione abaixo</h2>
                    <select name="categoria1" required>
                        <option value="">Selecione o Material 1</option>
                        <?php
                        $query = $conn->query("SELECT NomeEPI, QuantidadeEPI FROM epi ORDER BY NomeEPI ASC");
                        $registros = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($registros as $option) {
                        ?>
                            <option value="<?php echo $option['QuantidadeEPI']?>"><?php echo $option['NomeEPI']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br><br>
                    
                    <select name="categoria2" required>
                        <option value="">Selecione o Material 2</option>
                        <?php
                        $query = $conn->query("SELECT NomeEPI, QuantidadeEPI FROM epi ORDER BY NomeEPI ASC");
                        $registros = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($registros as $option) {
                        ?>
                            <option value="<?php echo $option['QuantidadeEPI']?>"><?php echo $option['NomeEPI']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br><br>
                    
                    <select name="categoria3" required>
                        <option value="">Selecione o Material 3</option>
                        <?php
                        $query = $conn->query("SELECT NomeEPI, QuantidadeEPI FROM epi ORDER BY NomeEPI ASC");
                        $registros = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($registros as $option) {
                        ?>
                            <option value="<?php echo $option['QuantidadeEPI']?>"><?php echo $option['NomeEPI']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br><br>
                    
                    <select name="categoria4" required>
                        <option value="">Selecione o Material 4</option>
                        <?php
                        $query = $conn->query("SELECT NomeEPI, QuantidadeEPI FROM epi ORDER BY NomeEPI ASC");
                        $registros = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($registros as $option) {
                        ?>
                            <option value="<?php echo $option['QuantidadeEPI']?>"><?php echo $option['NomeEPI']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br><button class="botao" type="submit">Enviar</button>
                    <a class="btn btn-primary" href="../projectHome.php" role="button">Voltar</a><br>
                </div>
            </div>
        </div>
       
    </form>
    <p><?php include("media.php"); ?></p>
</body>
</html>
