<?php
$dbHost = 'localhost'; 
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'gepi';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantidadeEntrega = $_POST['QuantidadeEntrega'];
    $quantidadeEPI = $_POST['QuantidadeEPI'];
    $resultado = $_POST['resultado'];
    $codigoEPI = $_POST['CodigoEPI']; 
 
    $novaQuantidadeEPI = $quantidadeEPI - $quantidadeEntrega;

    $sql = "UPDATE epi SET QuantidadeEPI = ? WHERE CodigoEPI = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ii', $novaQuantidadeEPI, $codigoEPI);
    $stmt->execute();

    
    if ($stmt->affected_rows > 0) {
    
        header('Location: EPIs.php');
    } else {
        echo "Erro na atualização: " . $conexao->error;
    }

    
    $stmt->close();
    $conexao->close();
}
?>
