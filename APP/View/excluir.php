<?php
include 'conecta.php';

// Verifica se o ID foi recebido via GET
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: listar.php?erro=ID inválido");
    exit;
}

$id = $_GET['id'];

// Prepara e executa a query de exclusão
$sql = "DELETE FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);

if($stmt === false) {
    die("Erro na preparação da query: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();

// Verifica se alguma linha foi afetada
if($stmt->affected_rows > 0) {
    header("Location: listar.php?sucesso=Produto excluído com sucesso");
} else {
    header("Location: listar.php?erro=Produto não encontrado ou já excluído");
}

$stmt->close();
$conn->close();