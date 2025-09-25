<!DOCTYPE html>
<!-- AULA 0 - Demonstracao de todos os controles html para formularios -->
 <!-- html entities
                ~ tilde
                ç cedil
                ´ acute
                ^ circ
                &[letra][acento]; 
            -->
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
         <input type="hidden" name="txtId" id="txtId" value="ABC123XYZ" />

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
                    id="txtCodigo"
                    readonly="deadonly"
                    value="CLI-2024-001"
                    />
                    <small class="tip">(Campo somente leitura)</small>
                </td>
            </tr>
            
            <!-- input text comum - campo de texto padrao -->
            <tr>
                <td>Nome Completo:</td>
                <td>
                    <input 
                        type="text"
                        name="txtNome"
                        id="txtNome"
                        placeholder="Digite o seu nome"
                        size="50"
                        maxlength="100"
                        required
                        value="Manelson"
                    />
                    <small>(Maximo 100 caracteres)</small>
                </td>
            </tr>

            <!-- input password - campo de senha com caracteres ocultos -->
            <tr>
                <td>Senha:</td>
                <td>
                    <input 
                    type="password"
                    name="txtSenha"
                    id="txtSenha"
                    placeholder="Digite sua senha"
                    minlength="6"
                    maxlength="20"
                    required
                    value="123456"
                />
                <small>(Entre 6 e 20 caracteres)</small>
                </td>
            </tr>

            <!-- input text disabled - desabilita o campo -->
            <tr>
                <td>Campo Desabilitado;</td>
                <td>
                    <input 
                    type="text"
                    name="txtDesabilitado"
                    id="txtDesabilitado"
                    size="21"
                    disabled="disabled"
                    value="Este campo esta Desabilitado"
                />
                <small>(N&atilde;o ser&aacute; enviado)</small>
                </td>
            </tr>

            <!-- secao: campos html5 de validacao -->
            <tr>
                <td colspan="2" class="subsecao-titulo">
                    Campos HTML5 com Valida&ccedil;&atilde;o Autom&aacute;tica     
                </td>
            </tr>

            <!-- input email - validacao atomatica de formato de email -->
            <tr>
                <td>Email:</td>
                <td>
                    <input 
                    type="email"
                    name="txtEmail"
                    id="txtEmail"
                    placeholder="usuario@exemplo.com"
                    required
                    value="manel@gmail.com"
                />
                <small>(Valida&ccedil;&atilde;o autom&aacute;tica de email)</small>
                </td>
            </tr>

            <!-- input url - validacao automatica de formato de url -->
            <tr>
                <td>Website:</td>
                <td>
                    <input 
                        type="url"
                        name="txtWebsite"
                        id="txtWebsite"
                        placeholder="https://www.exemplo.com"
                        required
                        value="https://ifmg.edu.br"
                    />
                    <small>(Deve iniciar com http:// ou https://)</small>
                </td>
            </tr>

            <!-- input tel - campo para telefone com pattern de validacao -->
            <tr>
                <td>Telefone:</td>
                <td>
                    <input 
                        type="tel"
                        name="txtTelefone"
                        id="txtTelefone"
                        placeholder="(11) 98765-4321"
                        pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}"
                        required
                        value="(11) 98765-4321"
                    />
                    <small>(Formato: (99) 99999-9999)</small>
                </td>
            </tr>

            <!-- input cpf - campo para cpf com pattern de validacao -->
            <tr>
                <td>Cpf:</td>
                <td>
                    <input 
                        type="text"
                        name="txtCpf"
                        id="txtCpf"
                        placeholder="123.456.789-00"
                        pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"
                        required
                        value="123.456.789-00"
                    />
                    <small>(Formato: 999.999.999-99)</small>
                </td>
            </tr>

            <!-- input search - campo otimizado para busca -->
            <tr>
                <td>Buscar Produto:</td>
                <td>
                    <input
                        type="search"
                        name="txtBusca"
                        id="txtBusca"
                        placeholder="Digite o nome do produto"
                        size="50"
                        required
                        value="Feijao"
                    />
                    <small>(Campo com botao X para limpar)</small>
                </td>
            </tr>

            <!-- botao provisorio para testar validacoes -->
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