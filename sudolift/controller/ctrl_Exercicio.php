<?php
// Arquivo: controller/ctrl_Exercicio.php
session_start();
require_once '../model/clsExercicio.php';

// 1. ROTINA DE EXCLUSÃO (Quando clica no X da lista)
if (isset($_GET['acao']) && $_GET['acao'] == 'excluir' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $exercicio = new clsExercicio();
    
    if ($exercicio->excluir($id)) {
        header('Location: ../view/exercicios_lista.php'); // Volta pra lista atualizada
    } else {
        echo "Erro ao excluir.";
    }
    exit();
}

// 2. ROTINA DE CADASTRO (Quando clica em Salvar no formulário)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome  = $_POST['nome'];
    $grupo = $_POST['grupo'];
    $tipo  = $_POST['tipo'];

    $exercicio = new clsExercicio();
    $exercicio->setNome($nome);
    $exercicio->setGrupoMuscular($grupo);
    $exercicio->setTipo($tipo);

    // Chama o método inserir que criamos na classe
    if ($exercicio->inserir()) {
        header('Location: ../view/exercicios_lista.php'); // Sucesso: Volta pra lista
    } else {
        echo "Erro ao salvar o exercício.";
    }
}
?>