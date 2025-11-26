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

    $codigo = $_GET['codigo'];
    $sql = 'SELECT *
            FROM tb_usuario
            WHERE id_usuario="'.$codigo.'";';
    $tabela = mysqli_query($conexao, $sql);
    while($linha = mysqli_fetch_row($tabela)){
        $nome = $linha[1];
        $login = $linha[2];
        $senha = $linha[3];
        $id_perfil = $linha[4];
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
                                <!-- TABELA QUE MOSTRA O FORMULARIO DE CADASTRO -->
                                 <form method="post" action="salva_alteracao.php" enctype="multipart/form-data">
                                    <input type="hidden" name="hddCodigo" id="hddCodigo" value="<?php echo $codigo;?>">
                                    <table>
                                        <tr>
                                            <th>
                                                ALTERA USUÁRIO
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Nome:</td>
                                            <td>
                                                <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>login:</td>
                                            <td>
                                                <input type="text" name="txtLogin" id="txtLogin" value="<?php echo $login;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Senha:</td>
                                            <td>
                                                <input type="password" name="txtSenha" id="txtSenha" value="<?php echo $senha;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Perfil:</td>
                                            <td>
                                                <select name="slcPerfil" id="slcPerfil">
                                                    <?php
                                                        require('conexao.php');
                                                        $sql = 'SELECT * FROM tb_perfil;';
                                                        $tabela = mysqli_query($conexao, $sql);
                                                        while($linha = mysqli_fetch_row($tabela)){
                                                            if($id_perfil == $linha[0]){
                                                                echo '
                                                                    <option selected="true" value = "'. $linha[0] .'">'. $linha[1] .'</option>
                                                                ';
                                                            }else{
                                                                echo '
                                                                    <option value = "'. $linha[0] .'">'. $linha[1] .'</option>
                                                                ';
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Foto:</td>
                                            <td>
                                                <img src="imagens/<?php echo $login;?>.jpg" style="height: 150px">
                                                <br>
                                                <input type="file" name="txtFoto" id="txtFoto">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right">
                                                <button type="reset" name="btnApagar" id="btnApagar">Apagar</button>
                                                <button type="submit" name="btnSalvar" id="btnSalvar">Salvar</button>
                                            </td>
                                        </tr>
                                    </table>
                                 </form>
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