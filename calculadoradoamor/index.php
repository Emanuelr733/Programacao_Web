<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora do amor</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <form name="frmCadastro"
          id="frmCadastro"
          action="calcula.php" 
          method="post" 
          enctype="multipart/form-data">

        <table border="1px">
        <tr>
            <td colspan="2" class="secao-titulo">
                Calculadora do amor &hearts;
            </td>
        </tr>
        <tr>
            <td>Nome Completo:</td>
            <td>
                <input 
                    type="text"
                    name="txtNome1"
                    id="txtNome"
                    placeholder="Digite o seu nome"
                    size="50"
                    maxlength="100"
                    required
                />
            </td>
        </tr>
        <tr>
            <td align="center">+</td>
        </tr>
        <tr>
            <td>Nome Completo:</td>
            <td>
                <input 
                    type="text"
                    name="txtNome2"
                    id="txtNome"
                    placeholder="Digite o seu nome"
                    size="50"
                    maxlength="100"
                    required
                />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input 
                    type="submit"
                    name="btnEnviar"
                    id="btnEnviar"
                    value="Enviar"
                />
            </td>
        </tr>
        </table>
    </form>
    <script src="js/acoes.js"></script>
</body>
</html>