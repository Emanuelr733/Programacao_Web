<?php
// Arquivo: controller/ctrl_ItemTreino.php
session_start();
require_once '../model/clsItemTreino.php';

// AÇÃO: EXCLUIR ITEM
if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    $id_item = $_GET['id_item'];
    $id_treino = $_GET['id_treino']; // Precisamos disso para voltar pra página certa
    
    $item = new clsItemTreino();
    $item->excluir($id_item);
    
    header("Location: ../view/treino_detalhes.php?id_treino=$id_treino");
    exit();
}

// AÇÃO: ADICIONAR NOVO ITEM
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = new clsItemTreino();
    
    $item->setTreinoId($_POST['treino_id']);
    $item->setExercicioId($_POST['exercicio_id']);
    $item->setSeries($_POST['series']);
    $item->setRepeticoes($_POST['repeticoes']);
    $item->setCarga($_POST['carga']); // Pode ser com ponto (ex: 20.5)

    if ($item->inserir()) {
        // Volta para a mesma tela para adicionar mais exercícios
        header("Location: ../view/treino_detalhes.php?id_treino=" . $_POST['treino_id']);
    } else {
        echo "Erro ao inserir item.";
    }
}
?>