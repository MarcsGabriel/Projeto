<?php

 if(isset($_POST['update'])){

   include_once('../config.php');
    $NomeEPI = $_POST['NomeEPI'];
    $CodigoEPI = $_POST['CodigoEPI'];
    $QuantidadeEPI = $_POST['QuantidadeEPI'];
    $DescriçaoEPI = $_POST['DescriçaoEPI'];

    $sqlUpdate = "UPDATE epi SET NomeEPI='$NomeEPI',CodigoEPI='$CodigoEPI',QuantidadeEPI='$QuantidadeEPI', DescriçaoEPI='$DescriçaoEPI' WHERE CodigoEPI='$CodigoEPI' ";
    $result = $conexao->query($sqlUpdate);

 }
 header('Location: EPIs.php');
?>