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
    $codigo = $_GET['codigo'];
    if ($codigo == 1){
        header('location:lista_usuario.php');
    }
    $sql = 'DELETE FROM tb_usuario WHERE id_usuario = '. $codigo .';';
    $resultado = mysqli_query($conexao,$sql);
    if($resultado == true){
        unlink('imagens/' . $login . '.jpg');
        header('location:lista_usuario.php');
    }else{
        echo '
            Problema ao excluir o usuario!<br>
            <a href="menu.php">VOLTAR</a>';
    }
}
?>