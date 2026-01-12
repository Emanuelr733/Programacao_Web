<?php
// Arquivo: view/dashboard.php
session_start();

// 1. Segurança: Se o usuário não estiver logado, manda de volta pro login
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}

// Pega os dados que salvamos na sessão durante o login
$nome = $_SESSION['nome_usuario'];
$perfil = $_SESSION['perfil_usuario']; // Aqui sabemos se é 'admin' ou 'atleta'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SudoLift - Painel</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f4f4f4; }
        
        /* Estilo da Barra de Navegação */
        .navbar { background-color: #333; overflow: hidden; }
        .navbar a { float: left; display: block; color: white; text-align: center; padding: 14px 20px; text-decoration: none; }
        .navbar a:hover { background-color: #ddd; color: black; }
        .navbar a.sair { float: right; background-color: #d9534f; }
        
        .container { padding: 20px; }
        .card { background: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="dashboard.php">Home</a>

        <?php if ($perfil == 'admin'): ?>
            <a href="exercicios_lista.php">Gerenciar Exercícios</a>
            <a href="usuarios_lista.php">Gerenciar Usuários</a>
        
        <?php else: ?>
            <a href="meus_treinos.php">Meus Treinos</a>
            <a href="novo_treino.php">Registrar Treino</a>
        <?php endif; ?>

        <a href="alterar_senha.php">Alterar Senha</a>
        
        <a href="../controller/logout.php" class="sair">Sair</a>
    </div>

    <div class="container">
        <h1>Bem-vindo, <?php echo $nome; ?>!</h1>
        
        <div class="card">
            <h3>Seu Perfil: <?php echo strtoupper($perfil); ?></h3>
            <p>Você está logado no sistema SudoLift.</p>
            
            <?php if ($perfil == 'atleta'): ?>
                <p>Pronto para o treino de hoje? Use o menu acima para registrar suas cargas.</p>
            <?php else: ?>
                <p>Modo Administrativo. Você tem acesso total ao cadastro de exercícios.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>