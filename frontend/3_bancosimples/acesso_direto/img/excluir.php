<?php
//comando para exibir erros durante a execucao do codigo
ini_set('display_errors', 1);
//comando para exibir erros antes da execucao do codigo
ini_set('display_startup_errors', 1);
//comando para listar os erros
error_reporting(E_ALL);

$codigo = $_GET['codigo'];
echo $codigo;



//executando conexao com o banco de dados
$conexao = mysqli_connect('localhost','root','','bd_teste');

//verificando a conexao
if(!$conexao){
    die('Erro de conexao: '.mysqli_connect_error());
}

//executando SQL
$sql = 'DELETE from tb_pessoa WHERE id=' . $codigo . ';';
$tabela = mysqli_query($conexao,$sql) or die('Erro na consulta: '. mysqli_error($conexao));

//verificar se existem registros
if (mysqli_num_rows($tabela) > 0){
    echo 'Existem ' . mysqli_num_rows($tabela) . ' pessoas no banco.<br><br>';
    //capturando dados das pessoas cadastradas no banco e exibindo
    while($linha = mysqli_fetch_row($tabela)){
        echo 'ID: ' . $linha[0] . '<br>';
        echo 'Nome: ' . $linha[0] . '<br>';
        echo 'Idade: ' . $linha[0] . '<br><hr>';
    }
}else{
    echo 'Nenhum registro encontrado.';
}

mysqli_close($conexao);

echo '<a href="menu.php">VOLTAR</a>';
?>

?>