<?php

    if(!empty($_GET['id'])){
    include_once('../config.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM fornecedor WHERE cnpj=$id";

    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0){

        $sqlDelete = "DELETE FROM fornecedor WHERE cnpj=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
}
header('Location: Fornecedores.php')

?>