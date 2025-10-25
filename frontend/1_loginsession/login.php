<?php
$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

session_start();

if ($login=='Ciniro' && $senha=='1234'){
    $_SESSION['login'] = $login;
    header('location:pagina1.php');
} else {
    $_SESSION['erro'] = 'Login ou senha incorretos';
    header('location:index.php');
}