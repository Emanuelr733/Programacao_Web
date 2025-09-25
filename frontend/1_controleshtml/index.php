<!DOCTYPE html>
<!-- AULA 0 - Demonstracao de todos os controles html para formularios -->
<head>
    <title>Formulario HTML - Demonstracao de Controles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>
        Demonstra&ccedil;&atilde;o de Controles HTML para Formul&aacute;rios
    </h1>
    <form name="frmCadastro"
          id="frmCadastro"
          action="processa.php" 
          method="post" 
          enctype="multipart/form-data">
        <!-- campo oculto - armazena dados que nao devem ser visiveis ao usuario -->
         <input type="hidden" name="hddIdSessao" id="hddIdSessao" value="ABC123XYZ" />

         <table border="1px">
            <!-- titulo principal do formulario -->
            <tr>
                <td colspan="2" class="secao-titulo">
                    FORMUL&Aacute;RIO DE CADASTRO COMPLETO
                </td>
            </tr>

            <!-- secao: campos de texto basicos -->
            <tr>
                <td colspan="2" class="subsecao-titulo">
                    Campos de Texto B&aacute;sicos
                </td>
            </tr>
            
            <!-- input text readonly - campo somente leitura, nao editavel -->
            <tr>
                <td width="30%">
                    C&oacute;digo do cliente:
                </td>
                <td>
                    <input 
                    type="text"
                    name="txtCodigo"
                    value="CLI-2024-001"
                    readonly="deadonly"
                    />
                    <small class="tip">(Campo somente leitura)</small>
                </td>
            </tr>
            <!-- html entities
                ~ tilde
                ç cedil
                ´ acute
                ^ circ
                &[letra][acento]; 
            -->


        </table>
    </form>





    <script src="js/acoes.js"></script>
</body>
</html>