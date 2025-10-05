<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do amor</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="resultado">    
        <?php
            $nome1 = trim($_POST['txtNome1'] ?? '');
            $nome2 = trim($_POST['txtNome2'] ?? '');
            if ($nome1 && $nome2) {
            $juntos = strtolower(str_replace(' ', '', $nome1 . $nome2));
            $soma = 0;
            $qtd = 0;
            for ($i = 0; $i < strlen($juntos); $i++) {
                $letra = $juntos[$i];
                if ($letra >= 'a' && $letra <= 'z') {
                    $valor = ord($letra) - 96;
                    $soma += $valor;
                    $qtd++;
                }
            }
            $media = $soma / ($qtd ?: 1);
            $amor = ($media * 7 + strlen($nome1) + strlen($nome2)) % 101;
            if (strtolower($nome1[0]) === strtolower($nome2[0])) {
                $amor += 5;
            }
            if ($amor > 100) $amor = 100;
            echo "Compatibilidade entre $nome1 e $nome2 = $amor%";
            } else {
                echo "Por favor, preencha os dois nomes.";
            }
        ?>
    </div>
    <script src="js/acoes.js"></script>
</body>
</html>
