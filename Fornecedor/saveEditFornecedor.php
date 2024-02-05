<?php

 if(isset($_POST['update'])){

   include_once('../config.php');
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $tpproduto = $_POST['tpproduto'];
    $contato = $_POST['contato'];

    $sqlUpdate = "UPDATE fornecedor SET cnpj='$cnpj',nome='$nome',tpproduto='$tpproduto',contato='$contato' WHERE cnpj='$cnpj' ";
    $result = $conexao->query($sqlUpdate);

 }
 header('Location: Fornecedores.php');
?>