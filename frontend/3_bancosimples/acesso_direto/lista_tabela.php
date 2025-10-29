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

//executando SQL
$sql = 'SELECT * from tb_pessoa;';
$tabela = mysqli_query($conexao,$sql) or die('Erro na consulta: '. mysqli_error($conexao));

//verificar se existem registros
if (mysqli_num_rows($tabela) > 0){
    echo 'Existem ' . mysqli_num_rows($tabela) . ' pessoas no banco.<br><br>';
    //capturando dados das pessoas cadastradas no banco e exibindo
    echo '<table border="1px">';
    echo '<tr><th>ID</th><th>NOME</th><th>IDADE</th><th>EXCLUIR</th></tr>';

    while ($linha = mysqli_fetch_row($tabela)){
        echo '<tr>';
        echo '<td>' . $linha[0] . '</td>';
        echo '<td>' . $linha[1] . '</td>';
        echo '<td>' . $linha[2] . '</td>';
        echo '<td>
                <a href="excluir.php?codigo=' . $linha[0] . '">
                    <img src="img/excluir.png" width="30px">
                </a>
            </td>';
        echo '</tr>';
    }
}else{
    echo 'Nenhum registro encontrado.';
}

mysqli_close($conexao);

echo '<a href="menu.php">VOLTAR</a>';
?>
