<?php
session_start();

//averigua se o usuario esta logado
if (!isset($_SESSION['login'])){
    header('location:index.php');
}else{
    //se logado, captura os dados dele e guarda
    require('conexao.php');
    $sql = 'SELECT *
            FROM tb_usuario
            WHERE login_usuario="'.$_SESSION['login'].'";';

    $tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    $dados_usuario = mysqli_fetch_array($tabela);
    
    //checar se e adm
    if ($dados_usuario[4] != 1){
        header('location:menu.php');
    }

}
?>

<html>
    <head>
        <title>Menu do Sistema</title>
        <style>
            table {
                width: 100%;
            }
            table,th,td{
                border: 1px solid black;
                border-collapse: collapse;
            }
            th,td{
                padding: 5px;
                text-align: left;
            }
            table#t01 tr:nth-child(even){
                background-color: #eee;
            }
            table#t01 tr:nth-child(odd){
                background-color: #fff;
            }
            table#t01 th{
                background-color: black;
                color: white;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <table border="1px">
            <tr>
                <td colspan="2" style="height: 50px">
                    <h1>MENU DO SISTEMA</h1>
                </td>
            </tr>
            <tr style="height: 50px">
                <td>
                    <img height="50px" src="imagens/<?php echo $dados_usuario['login_usuario']; ?>.jpg"></img>
                    Seja bem-vindo, <?php echo $dados_usuario['nome_usuario']; ?>!
                </td>
                <td>
                    <a href="logout.php">
                        <img width="20px" height="20px" src="imagens/quit.png"></img>
                    </a>
                </td>
            </tr>
            <tr style="height: 200px">
                <td colspan="2">
                    <!-- TABELA QUE MOSTRA O MENU DO USUARIO -->
                     <table border="1px" style="height: 200px;">
                        <tr style="width: 150px; vertical-align: top;">
                            <td >
                                <?php
                                    if ($dados_usuario[4] == 1){
                                        echo '
                                            <b> ADM </b><br>
                                            <a href="novo_usuario.php">Novo usuário</a><br>
                                            <a href="lista_usuario.php">Gerenciar usuários</a>    
                                        ';
                                    } else {
                                        echo '
                                            <b> USUARIO COMUM </b><br>
                                            Você não tem acesso a nenhum cadastro   
                                        ';
                                    }
                                    
                                ?>
                            </td>
                            <td style="vertical-align: top; text-align: left; width:100%;">
                                <!-- TABELA QUE MOSTRA A LISTA DE USUARIOS -->
                                <div class="w3-container">
                                    <h2>LISTA DE USUÁRIOS</h2>
                                    <table class="w3-table-all">
                                        <thead>
                                            <tr class="w3-red">
                                                <th>FOTO</th>
                                                <th>NOME</th>
                                                <th>LOGIN</th>
                                                <th>PERFIL</th>
                                                <th><center>ALTERAR</center></th>
                                                <th><center>EXCLUIR</center></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            require('conexao.php');
                                            $sql = 'SELECT * FROM tb_usuario WHERE id_usuario != '. $dados_usuario[0] .';';
                                            $tabela = mysqli_query($conexao, $sql);
                                            while ($linha = mysqli_fetch_row($tabela)){
                                                $cod_perfil = $linha[4];
                                                $sql = 'SELECT nome_perfil FROM tb_perfil WHERE id_perfil = '. $cod_perfil .';';
                                                $tabela_perfil = mysqli_query($conexao, $sql);
                                                $nome_perfil = '';
                                                while ($linha_perfil = mysqli_fetch_row($tabela_perfil)){
                                                    $nome_perfil = $linha_perfil[0];
                                                }
                                                echo '<tr>
                                                        <td>
                                                            <img style="height: 150px;" src="imagens/'. $linha[2] .'.jpg"></img>
                                                        </td>
                                                        <td>'. $linha[1] .'</td>
                                                        <td>'. $linha[2] .'</td>
                                                        <td>'. $nome_perfil .'</td>
                                                        <td>
                                                            <center>
                                                                <a href="altera_usuario.php?codigo='. $linha[0] .'">✏️</a>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <a href="exclui_usuario.php?codigo='. $linha[0] .'">❌</a>
                                                            </center>
                                                        </td>
                                                    </tr>';
                                            }
                                        ?>
                                    </table>
                                </div>
                            </td>
                        </tr>
                     </table>
                </td>
            </tr>
            <tr style="height: 50px">
                <td colspan="2">
                    RODAPE
                </td>
            </tr>
        </table>
    </body>
</html>