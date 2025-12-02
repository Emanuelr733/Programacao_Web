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
    if ($dados_usuario[4] != 1){
        header('location:menu.php');
    }
}
$nome = $_POST['txtNome'];
$login = $_POST['txtLogin'];
$senhas = $_POST['txtSenha'];
$perfil = $_POST['slcPerfil'];
$foto = $_FILES['txtFoto'];
require('conexao.php');
$sql = 'SELECT * FROM tb_usuario WHERE login_usuario = "'. $login .'";';
$tabela = mysqli_query($conexao,$sql);
$num_linhas = mysqli_num_rows($tabela);
if ($num_linhas == 0){
    $sql = 'INSERT INTO tb_usuario(nome_usuario, login_usuario, senha_usuario, id_perfil)
            VALUES ("'. $nome .'","'. $login .'","'. $senhas .'",'. $perfil .');';
    $resultado = mysqli_query($conexao,$sql);
    if($resultado == true){
        move_uploaded_file($foto['tmp_name'], 'imagens/' . $login . '.jpg');
        header('location:lista_usuario.php');
    }else{
        echo '
            Problema ao salvar o novo usuario!<br>
            <a href="menu.php">VOLTAR</a>';
    }
}else{
    echo '
        Esse usuário já existe! Escolha um login diferente!<br>
        <a href="novo_usuario.php">Voltar</a>';
}
?>