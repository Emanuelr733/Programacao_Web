<?php
session_start();
if (!isset($_SESSION['login'])) {
    $_SESSION['locked'] = 'Acesso bloqueado';
    header('location: index.php');
}
echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pré-visualização Carteirinha</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family: Arial, sans-serif; }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            padding:20px;
        }

        .preview-container {
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 20px 50px rgba(0,0,0,0.3);
            max-width:500px;
            width:100%;
        }

        .campo {
            margin-bottom:15px;
        }

        .nome-campo {
            font-weight:bold;
            color:#333;
        }

        .valor-campo {
            display:block;
            font-size:15px;
            color:#555;
            margin-top:3px;
        }

        .vazio {
            display:block;
            font-size:14px;
            color:#a00;
            margin-top:3px;
        }

        .foto-preview {
            margin-top:10px;
            max-width:200px;
            border-radius:12px;
            box-shadow:0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-confirmar {
            display: inline-block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            background: linear-gradient(90deg, #002913, #00843D);
            color:white;
            border:none;
            border-radius:12px;
            padding:12px 0;
            font-size:17px;
            font-weight:bold;
            cursor:pointer;
            transition: 0.3s ease;
            width:100%;
            margin-top:20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
        }

        .btn-confirmar::after {
            content: "";
            position: absolute;
            top:0;
            left:-75%;
            width:50%;
            height:100%;
            background: rgba(255,255,255,0.2);
            transform: skewX(-20deg);
            transition: 0.5s;
        }

        .btn-confirmar:hover::after {
            left: 125%;
        }

        .btn-confirmar:hover {
            transform: scale(1.03);
            opacity:0.9;
        }
    </style>
</head>
<body>
<div class="preview-container">';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<div class="campo">';
    if (isset($_POST['txtNome']) && !empty($_POST['txtNome'])) {
        echo '<span class="nome-campo">Nome:</span>';
        echo '<span class="valor-campo">' . htmlspecialchars($_POST['txtNome']) . '</span>';
        $_SESSION['txtNome']=$_POST['txtNome'];
    }
    echo '</div>';
    echo '<div class="campo">';
    if (isset($_POST['dtaNascimento']) && !empty($_POST['dtaNascimento'])) {
        echo '<span class="nome-campo">Data de Nascimento:</span>';
        $data = DateTime::createFromFormat('Y-m-d', $_POST['dtaNascimento']);
        $_SESSION['dtaNascimento']=$data->format('d/m/Y');
        if ($data) {
            echo $data->format('d/m/Y');
        }
    }
    echo '</div>';
    echo '<div class="campo">';
    if (isset($_POST['txtCpf']) && !empty($_POST['txtCpf'])) {
        echo '<span class="nome-campo">CPF:</span>';
        echo '<span class="valor-campo">' . htmlspecialchars($_POST['txtCpf']) . '</span>';
        $_SESSION['txtCpf']=$_POST['txtCpf'];
    }
    echo '</div>';
    echo '<div class="campo">';
    if (isset($_POST['slcCurso']) && !empty($_POST['slcCurso'])) {
        echo '<span class="nome-campo">Curso:</span>';
        echo '<span class="valor-campo">' . htmlspecialchars($_POST['slcCurso']) . '</span>';
        $_SESSION['slcCurso']=$_POST['slcCurso'];
    }
    echo '</div>';
    echo '<div class="campo">';
    if (isset($_POST['txtMat']) && !empty($_POST['txtMat'])) {
        echo '<span class="nome-campo">Matr&iacute;cula:</span>';
        echo '<span class="valor-campo">' . htmlspecialchars($_POST['txtMat']) . '</span>';
        $_SESSION['txtMat']=$_POST['txtMat'];
    }
    echo '</div>';
    echo '<div class="campo">';
    if (isset($_FILES['flFoto']) && $_FILES['flFoto']['error'] == 0) {
        echo '<span class="nome-campo">Foto:</span><br>';
        echo '<div class="array">';   
        $extensoes_imagem = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp');
        $extensao = strtolower(pathinfo($_FILES['flFoto']['name'], PATHINFO_EXTENSION));
            if (in_array($extensao, $extensoes_imagem)) {
                $nomeArquivo = uniqid('foto  _') . '.' . $extensao;
                $caminhoDestino = __DIR__ . '/img/' . $nomeArquivo; 
            if (move_uploaded_file($_FILES['flFoto']['tmp_name'], $caminhoDestino)) {
                echo '<img src="img/'.$nomeArquivo.'" alt="Foto do usuário" width="180px" height="240px"">';
                $_SESSION['flFoto'] = 'img/' . $nomeArquivo;
            } else {
                echo '<p>Erro ao salvar a imagem.</p>';
        }
      }
       echo '</div>';
    } elseif (isset($_FILES['flFoto']) && $_FILES['flFoto']['error'] != 0) {
       echo '<span class="nome-campo">Foto:</span>';
       echo '<span class="vazio">Erro no upload - codigo: ' . $_FILES['flFoto']['error'] . '</span>';
    } else {
       echo '<span class="nome-campo">flFoto (type=file):</span>';
       echo '<span class="vazio">Nenhum arquivo enviado</span>';
    }
    echo '</div>';
    echo '<html>
            <head></head>
            <body>
                <form action="carteira.php" method="post">
                    <button type="submit" class="btn-confirmar">Confirmar</button>
                    <a href="form.php" class="btn-confirmar">Voltar</a>
                </form>
            </body>
        </html>';
}
?>