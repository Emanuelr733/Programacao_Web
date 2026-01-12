<?php
// Arquivo: controller/ctrl_Treino.php
session_start();
require_once '../model/clsTreino.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../view/login.php');
    exit();
}

// AÇÃO: CRIAR NOVO TREINO RÁPIDO
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao']) && $_POST['acao'] == 'novo') {
    
    $nome = $_POST['nome_treino'];
    // Se o usuário não digitar nome, gera um automático (Ex: Treino de Domingo)
    if(empty($nome)) {
        $dias = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
        $nome = "Treino de " . $dias[date('w')];
    }

    $treino = new clsTreino();
    $treino->setUsuarioId($_SESSION['id_usuario']);
    $treino->setNomeTreino($nome);
    $treino->setDataTreino(date('Y-m-d')); // Data de hoje
    $treino->setComentario("");

    // Salva e pega o ID do treino novo
    $id_novo_treino = $treino->inserir();

    if ($id_novo_treino > 0) {
        // Redireciona para a tela de ADICIONAR EXERCÍCIOS neste treino
        // (Vamos criar essa tela "treino_detalhes.php" no próximo passo)
        header("Location: ../view/treino_detalhes.php?id_treino=$id_novo_treino");
    } else {
        echo "Erro ao criar treino.";
    }
}
?>