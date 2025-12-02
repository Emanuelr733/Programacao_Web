<?php
session_start();
if (!isset($_SESSION['login'])){
    header('location:index.php');
}else{
    require('conexao.php');
    $sql = 'SELECT *
            FROM tb_usuario
            WHERE login_usuario="'.$_SESSION['login'].'";';
    $tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $dados_usuario = mysqli_fetch_array($tabela);
}
?>
<html>
    <head>
        <title>Menu do Sistema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * { box-sizing: border-box; }
            body {
                font-family: 'Segoe UI', sans-serif;
                background-color: #e2e8f0;
                margin: 0;
                padding: 0;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .tabela-mestra {
                width: 95%;
                height: 90vh;
                background-color: white;
                border-collapse: collapse;
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
                border-radius: 10px;
                overflow: hidden;
            }
            .linha-titulo td {
                background-color: #1e293b;
                color: white;
                height: 60px;
                text-align: center;
                font-size: 1.5rem;
                letter-spacing: 1px;
            }
            h1 { margin: 0; font-size: inherit; }
            .linha-usuario {
                background-color: #3b82f6;
                height: 70px;
            }
            .celula-info {
                padding-left: 30px;
                color: white;
                font-size: 1.2rem;
                text-align: left;
            }
            .celula-info img {
                width: 60px;
                height: 60px;
                border: 3px solid rgba(255,255,255,0.5);
                vertical-align: middle;
                margin-right: 15px;
                object-fit: cover;
            }
            .celula-logout {
                text-align: right;
                padding-right: 30px;
            }
            .celula-logout {
                text-align: right;
                padding-right: 30px;
            }
            .celula-logout a {
                text-decoration: none;
                font-size: 35px;
                display: inline-block;
                transition: transform 0.2s;
                cursor: pointer;
            }
            .celula-logout a:hover {
                transform: scale(1.2);
            }
            .celula-conteudo-global {
                padding: 0;
                vertical-align: top;
                height: 100%;
            }
            .tabela-interna {
                width: 100%;
                height: 100%;
                border-collapse: collapse;
            }
            .coluna-menu {
                width: 200px; /* Largura fixa do menu */
                background-color: #f8fafc;
                border-right: 1px solid #e2e8f0;
                vertical-align: top;
                padding: 20px;
            }
            .coluna-menu a {
                display: block;
                padding: 12px;
                margin-bottom: 8px;
                color: #475569;
                text-decoration: none;
                font-weight: 500;
                border-radius: 6px;
                transition: 0.2s;
            }
            .coluna-menu a:hover {
                background-color: #cbd5e1;
                color: #0f172a;
                transform: translateX(5px);
            }
            .coluna-menu b {
                display: block;
                margin-bottom: 15px;
                color: #94a3b8;
                font-size: 0.85rem;
                text-transform: uppercase;
            }
            .coluna-conteudo {
                vertical-align: top;
                padding: 40px;
                background-color: white;
            }
            .coluna-conteudo-texto {
                 color: #94a3b8;
                 font-size: 1.5rem;
                 text-align: center;
                 padding-top: 50px;
            }
            .linha-rodape td {
                background-color: #f1f5f9;
                color: #94a3b8;
                text-align: center;
                height: 40px;
                font-size: 0.8rem;
                border-top: 1px solid #e2e8f0;
            }
        </style>
    </head>
    <body>
        <table class="tabela-mestra">
            <tr class="linha-titulo">
                <td colspan="2"><h1>MENU DO SISTEMA</h1></td>
            </tr>
            <tr class="linha-usuario">
                <td class="celula-info">
                    <img src="imagens/<?php echo $dados_usuario['login_usuario']; ?>.jpg"></img>
                    Seja bem-vindo, <?php echo $dados_usuario['nome_usuario']; ?>!
                </td>
                    <td class="celula-logout"><a href="logout.php" title="Sair do Sistema">🚪</a></td>
            </tr>
            <tr class="celula-conteudo-global">
                <td colspan="2">
                     <table class="tabela-interna">
                        <tr>
                            <td class="coluna-menu">
                                <?php
                                    if ($dados_usuario[4] == 1){
                                        echo '
                                            <b> ADM </b><br>
                                            <a href="novo_usuario.php">Novo usuário</a><br>
                                            <a href="lista_usuario.php">Gerenciar usuários</a>';
                                    } else {
                                        echo '
                                            <b> USUARIO COMUM </b><br>
                                            Você não tem acesso a nenhum cadastro!';
                                    }   
                                ?>
                            </td>
                            <td class="coluna-conteudo">
                                <div class="coluna-conteudo-texto">NENHUM CADASTRO SELECIONADO</div>
                            </td>
                        </tr>
                     </table>
                </td>
            </tr>
            <tr class="linha-rodape">
                <td colspan="2">RODAPE</td>
            </tr>
        </table>
    </body>
</html>