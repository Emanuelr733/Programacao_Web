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

            <!-- secao: campos numericos -->
            <tr>
                <td colspan="2" class="subsecao-titulo">
                    Campos Num&eacute;ricos e de intervalo
                </td>
            </tr>

            <!-- input number - campo numerico com setas de incremento-->
            <tr>
                <td>Idade:</td>
                <td>
                    <input 
                        type="number"
                        name="txtIdade"
                        id="txtIdade"
                        min="1"
                        max="120"
                        step="1"
                        value="25"
                        oninput="atualizaOutIdade()"
                    />
                    <output id="outIdade">25</output> anos
                    <small>(Use as setas ou digite)</small>
                </td>
            </tr>

            <!-- input range - controle deslizante para selecao de valor -->
            <tr>
                <td>Nivel de Satisfacao:</td>
                <td>
                    <input 
                        type="range"
                        name="rngSatisfacao"
                        id="rngSatisfacao"
                        min="0"
                        max="10"
                        value="5"
                        oninput="atualizaOutSatisfacao()"
                    />
                    Nota: <output id="outSatisfacao">5</output>/10
                    <small>(Arraste o controle)</small>
                </td>
            </tr>

            <!-- <tr>
                <td colspan="2"> 
                    <table border="1px" height="300px" align="center" class="equalizador">
                        <tr align="">
                            <td>Equalizador:</td>
                            <td>
                                Agudo
                                <input 
                                    type="range"
                                    id="rngAgudo"
                                    min="0"
                                    max="5"
                                    class="range-equalizador"
                                    value="3">
                            </td>
                            <td>
                                AgudoMedio
                                <input 
                                    type="range"
                                    id="rngAgudoMedio"
                                    min="0"
                                    max="5"
                                    class="range-equalizador"
                                    value="3">
                            </td>
                            <td>
                                Medio
                                <input 
                                    type="range"
                                    id="rngMedio"
                                    min="0"
                                    max="5"
                                    class="range-equalizador"
                                    value="3">
                            </td>
                            <td>
                                GraveMedio
                                <input 
                                    type="range"
                                    id="rngGraveMedio"
                                    min="0"
                                    max="5"
                                    class="range-equalizador"
                                    value="3">
                            </td>
                            <td>
                                Grave
                                <input 
                                    type="range"
                                    id="rngGrave"
                                    min="0"
                                    max="5"
                                    class="range-equalizador"
                                    value="3">
                            </td>
                            <td>
                                Geral
                                <input 
                                    type="range"
                                    id="rngGeral"
                                    min="0"
                                    max="5"
                                    class="range-equalizador"
                                    value="3"
                                    oninput="outEqualizador()"
                                    >
                                    
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> -->

            <!-- input date - seletor de data -->
            <tr>
                <td>Data de Nascimento:</td>
                <td>
                    <input
                        type="date"
                        name="txtDataNascimento"
                        id="txtDataNascimento"
                        min="1900-01-01"
                        max="2025-10-01"
                    />
                    <small>(Formato: dd/mm/aaaa)</small>
                </td>
            </tr>

            <!-- input time - seletor de horario -->

            <tr>
                <td>Horario Preferencial:</td>
                <td>
                    <input
                        type="time"
                        name="txtHorario"
                        id="txtHorario"
                    />
                    <small>(Formato: hh:mm)</small>
                </td>
            </tr>

            <!-- input datetime-local - seletor de data e hora combinados -->
            <tr>
                <td>Data e hora do agendamento:</td>
                <td>
                    <input 
                        type="datetime-local"
                        name="txtAgendamento"
                        id="txtAgendamento"
                    />
                    <small>(Data e hora local)</small>
                </td>
            </tr>

            <!-- input month - seletor de mes e ano -->

            <tr>
                <td>Mes de Referencia::</td>
                <td>
                    <input
                        type="month"
                        name="txtMes"
                        id="txtMes"
                    />
                    <small>(Selecione mes e ano)</small>
                </td>
            </tr>

            <!-- input week - seletor de semana -->

            <tr>
                <td>Semana de Ferias:</td>
                <td>
                    <input
                        type="week"
                        name="txtSemana"
                        id="txtSemana"
                    />
                    <small>(Selecione a semana do ano)</small>
                </td>
            </tr>

            <!-- secao: campos de selecao -->
            <tr>
                <td colspan="2" class="subsecao-titulo">
                    Campos de Selecao de Escolha

                </td>
            </tr>

            <!-- input color - seletor de cor -->
             <tr>
                <td>Cor Preferida:</td>
                <td>
                    <input 
                        type="color"
                        name="txtCor"
                        id="txtCor"
                        value="#4CAF50"
                    />
                    <small>(Clique para escolher uma cor)</small>
                </td>
             </tr>

             <!-- input file - upload de arquivos -->
              <tr>
                <td>Foto de Perfil:</td>
                <td>
                    <input 
                        type="file"
                        name="fleFoto"
                        id="fleFoto"
                        accept="image/*"
                    />
                    <small>(Apenas imagens)</small>
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