<?php
//comando para exibir erros durante a execucao do codigo
ini_set('display_errors', 1);
//comando para exibir erros antes da execucao do codigo
ini_set('display_startup_errors', 1);
//comando para listar os erros
error_reporting(E_ALL);

//executando conexao com o banco de dados
$conexao = mysqli_connect('localhost','root','','bd_teste');

//verificando a conexao
if(!$conexao){
    die('Erro de conexao: '.mysqli_connect_error());
}

//criar a SQL
$sql = 'INSERT INTO tb_pessoa (nome, idade)
        VALUES ("César Menoti e Gabriano",23);';

//executando a consulta SQL
$resultado = mysqli_query($conexao,$sql);

//verificando o retorno
if ($resultado){
    echo 'Registro inserido com sucesso';
}else{
    echo'Problema ao inserir o registro: '. mysqli_error($conexao);
}

mysqli_close($conexao);

echo '<a href="menu.php">VOLTAR</a>';
?>