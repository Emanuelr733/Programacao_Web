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

echo "<div>";
if (isset($_FILES['fleFoto']) && $_FILES['fleFoto']['name'] != ''){
    echo "<span>flFoto (type=file):</span><br>";
    echo "<div>";
    echo "<strong>Arquivo recebido com sucesso:</strong><br>";
    echo "Nome original: " . htmlspecialchars($_FILES['fleFoto']['name']) . "<br>";
    echo "Tipo MIME: " . htmlspecialchars($_FILES['fleFoto']['type']) . "<br>";
    echo "Tamanho: " . number_format($_FILES['fleFoto']['size'] / 1024, 2) . " KB<br>";
    echo "Arquivo temporario: " . htmlspecialchars($_FILES['fleFoto']['tmp_name']) . "<br>";
    #verifica se e uma imagem
    $extensoes_imagem = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp');
    $extensao = strtolower(pathinfo($_FILES['fleFoto']['name'], PATHINFO_EXTENSION));
    if (in_array($extensao, $extensoes_imagem)){
        echo "Status: Arquivo de imagem valido!";
    }
    echo "</div>";
} else {
    echo "<span>fleFoto (type=file):</span>";
    echo "<span>Nenhum arquivo enviado</span>";
}
echo "</div>";
?>