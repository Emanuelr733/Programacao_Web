<?php
$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

session_start();

if ($login=='0082834' && $senha=='batata123'){
    $_SESSION['login'] = $login;
    header('location:form.php');
} else {
    $_SESSION['erro'] = 'Login ou senha incorretos';
    header('location:index.php');
}
?>