<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location:index.php');
}
$codigo = $_POST['hddCodigo'];
$nome = $_POST['txtNome'];
$login = $_POST['txtLogin'];
$senhas = $_POST['txtSenha'];
$perfil = $_POST['slcPerfil'];
$foto = $_FILES['txtFoto'];

require('conexao.php');
$sql = 'UPDATE tb_usuario
        SET 
        nome_usuario="'.$nome.'",
        senha_usuario="'.$senhas.'",
        id_perfil='.$perfil.'
        WHERE
        id_usuario='.$codigo.'
        ;';
$resultado = mysqli_query($conexao, $sql);
if($resultado){
    move_uploaded_file($foto['tmp_name'], 'imagens/' . $login . '.jpg');
    header('location:lista_usuario.php');
}else{
    echo 'Problema ao alterar o usuario <br> <a href="menu.php">VOLTAR</a>';
}
?>