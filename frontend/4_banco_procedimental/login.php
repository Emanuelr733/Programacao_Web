<?php
    session_start();
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
    $sql = '
        SELECT * 
        FROM tb_usuario 
        WHERE 
        login_usuario="'.$login.'" AND
        senha_usuario="'.$senha.'"
    ';
    require('conexao.php');
    $tabela = mysqli_query($conexao, $sql)
                or die(mysqli_error($conexao));
    if(mysqli_num_rows($tabela) == 1){
        $_SESSION['login'] = $login;
        header('location:menu.php');
    }else{
        echo 'Login ou senha incorretos!<br><a href="index.php">Voltar</a>';
    }
?>