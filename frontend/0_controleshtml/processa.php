<?php
$campo_escondido = $_POST['txtId'];
$codigo = $_POST['txtCodigo'];
$nome = $_POST['txtNome'];
$senha = $_POST['txtSenha'];
$email = $_POST['txtEmail'];
$website = $_POST['txtWebsite'];
$telefone = $_POST['txtTelefone'];
$cpf = $_POST['txtCpf'];
$busca = $_POST['txtBusca'];

echo ('<b>txtId:</b>' . $campo_escondido . '<br></br>');
echo('<b>txtCodigo:</b>' . $codigo . '<br></br>');
echo('<b>txtNome:</b>' . $nome . '<br></br>');
echo('<b>txtSenha:</b>' . $senha . '<br></br>');
echo('<b>txtEmail:</b>' . $email . '<br></br>');
echo('<b>txtWebsite:</b>' . $website . '<br></br>');
echo('<b>txtTelefone:</b>' . $telefone . '<br></br>');
echo('<b>txtCpf:</b>' . $cpf . '<br></br>');
echo('<b>txtBusca:</b>' . $busca . '<br></br>');

?>