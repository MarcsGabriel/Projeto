<?php

 if(isset($_POST['update'])){

   include_once('../config.php');
    $idfuncionarios = $_POST['idfuncionarios'];
    $nome = $_POST['nome'];
    $setor = $_POST['setor'];

    $sqlUpdate = "UPDATE funcionarios SET idfuncionarios='$idfuncionarios',nome='$nome',setor='$setor' WHERE idfuncionarios='$idfuncionarios' ";
    $result = $conexao->query($sqlUpdate);

 }
 header('Location: Funcionarios.php');
?>