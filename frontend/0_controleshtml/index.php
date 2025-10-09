<!DOCTYPE html>
<!--
   AULA 0
   DEMONSTRACAO DE TODOS OS CONTROLES HTML PARA FORMULARIOS
-->
<html>
   <head>
      <title>Formulario HTML - Demonstracao de Controles</title>
      <meta charset="UTF-8">

      <!-- css -->
      <link rel="stylesheet" type="text/css" href="css/estilos.css">
   </head>
   <body>
      <h1 style="text-align: center;">Demonstracao de Controles HTML para Formularios</h1>
      
      <!--formulario principal com enctype para upload de arquivos-->
      <form name="frmCadastro" action="processa.php" method="post" enctype="multipart/form-data">
         
         <!--campo oculto - armazena dados que nao devem ser visiveis ao usuario-->
         <input type="hidden" name="hddIdSessao" value="ABC123XYZ" />
         
         <table border="1">
            <!--titulo principal do formulario-->
            <tr>
               <td colspan="2" class="secao-titulo">
                  FORMULARIO DE CADASTRO COMPLETO
               </td>
            </tr>
            
            <!--secao: campos de texto basicos-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Campos de Texto Basicos
               </td>
            </tr>
            
            <!--input text readonly - campo somente leitura, nao editavel-->
            <tr>
               <td width="30%">Codigo do Cliente:</td>
               <td>
                  <input 
                     type="text" 
                     name="txtCodigo" 
                     value="CLI-2024-001" 
                     readonly="readonly"
                  />
                  <small>(Campo somente leitura)</small>
               </td>
            </tr>
            
            <!--input text comum - campo de texto padrao-->
            <tr>
               <td>Nome Completo:</td>
               <td>
                  <input 
                     type="text" 
                     name="txtNome" 
                     placeholder="Digite seu nome completo"
                     size="50" 
                     maxlength="100"
                     required
                  />
                  <small>(Maximo 100 caracteres)</small>
               </td>
            </tr>
            
            <!--input password - campo de senha com caracteres ocultos-->
            <tr>
               <td>Senha:</td>
               <td>
                  <input 
                     type="password" 
                     name="txtSenha" 
                     placeholder="Digite sua senha"
                     minlength="6"
                     maxlength="20"
                     required
                  />
                  <small>(Entre 6 e 20 caracteres)</small>
               </td>
            </tr>
            
            <!--input text disabled - campo desabilitado, nao enviado no submit-->
            <tr>
               <td>Campo Desabilitado:</td>
               <td>
                  <input 
                     type="text" 
                     name="txtDesabilitado" 
                     value="Este campo esta desabilitado"
                     disabled="disabled"
                  />
                  <small>(Nao sera enviado)</small>
               </td>
            </tr>
            
            <!--secao: campos html5 de validacao-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Campos HTML5 com Validacao Automatica
               </td>
            </tr>
            
            <!--input email - validacao automatica de formato de email-->
            <tr>
               <td>Email:</td>
               <td>
                  <input 
                     type="email" 
                     name="txtEmail"
                     placeholder="usuario@exemplo.com"
                     required
                  />
                  <small>(Validacao automatica de email)</small>
               </td>
            </tr>
            
            <!--input url - validacao automatica de formato de url-->
            <tr>
               <td>Website:</td>
               <td>
                  <input 
                     type="url" 
                     name="txtWebsite"
                     placeholder="https://www.exemplo.com"
                  />
                  <small>(Deve iniciar com http:// ou https://)</small>
               </td>
            </tr>
            
            <!--input tel - campo para telefone com pattern de validacao-->
            <tr>
               <td>Telefone:</td>
               <td>
                  <input 
                     type="tel" 
                     name="txtTelefone"
                     placeholder="(11) 98765-4321"
                     pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}"
                  />
                  <small>(Formato: (99) 99999-9999)</small>
               </td>
            </tr>
            
            <!--input search - campo otimizado para busca-->
            <tr>
               <td>Buscar Produto:</td>
               <td>
                  <input 
                     type="search" 
                     name="srcBusca"
                     placeholder="Digite o nome do produto..."
                  />
                  <small>(Campo de busca com botao X para limpar)</small>
               </td>
            </tr>
            
            <!--secao: campos numericos-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Campos Numericos e de Intervalo
               </td>
            </tr>
            
            <!--input number - campo numerico com setas de incremento-->
            <tr>
               <td>Idade:</td>
               <td>
                  <input 
                     type="number" 
                     name="numIdade"
                     id="numIdade"
                     min="1" 
                     max="120" 
                     step="1"
                     value="25"
                     oninput="atualizaOutputNumber()"
                  />
                  <output id="outputNumber">25</output> anos
                  <small>(Use as setas ou digite)</small>
               </td>
            </tr>
            
            <!--input range - controle deslizante para selecao de valor-->
            <tr>
               <td>Nivel de Satisfacao:</td>
               <td>
                  <input 
                     type="range" 
                     name="rngSatisfacao"
                     id="rngVolume"
                     min="0" 
                     max="10"
                     value="5"
                     oninput="atualizaOutputRange()"
                  />
                  Nota: <output id="outputRange">5</output>/10
                  <small>(Arraste o controle)</small>
               </td>
            </tr>
            
            <!--secao: campos de data e hora-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Campos de Data e Hora
               </td>
            </tr>
            
            <!--input date - seletor de data-->
            <tr>
               <td>Data de Nascimento:</td>
               <td>
                  <input 
                     type="date" 
                     name="dtNascimento"
                     min="1900-01-01"
                     max="2024-12-31"
                  />
                  <small>(Formato: dd/mm/aaaa)</small>
               </td>
            </tr>
            
            <!--input time - seletor de horario-->
            <tr>
               <td>Horario Preferencial:</td>
               <td>
                  <input 
                     type="time" 
                     name="tmHorario"
                  />
                  <small>(Formato: hh:mm)</small>
               </td>
            </tr>
            
            <!--input datetime-local - seletor de data e hora combinados-->
            <tr>
               <td>Data e Hora do Agendamento:</td>
               <td>
                  <input 
                     type="datetime-local" 
                     name="dtAgendamento"
                  />
                  <small>(Data e hora local)</small>
               </td>
            </tr>
            
            <!--input month - seletor de mes e ano-->
            <tr>
               <td>Mes de Referencia:</td>
               <td>
                  <input 
                     type="month" 
                     name="dtMes"
                  />
                  <small>(Selecione mes e ano)</small>
               </td>
            </tr>
            
            <!--input week - seletor de semana-->
            <tr>
               <td>Semana de Ferias:</td>
               <td>
                  <input 
                     type="week" 
                     name="dtSemana"
                  />
                  <small>(Selecione a semana do ano)</small>
               </td>
            </tr>
            
            <!--secao: campos de selecao-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Campos de Selecao e Escolha
               </td>
            </tr>
            
            <!--input color - seletor de cor-->
            <tr>
               <td>Cor Preferida:</td>
               <td>
                  <input 
                     type="color" 
                     name="clrCor"
                     value="#4CAF50"
                  />
                  <small>(Clique para escolher uma cor)</small>
               </td>
            </tr>
            
            <!--input file - upload de arquivo-->
            <tr>
               <td>Foto de Perfil:</td>
               <td>
                  <input 
                     type="file" 
                     name="flFoto"
                     accept="image/*"
                  />
                  <small>(Apenas imagens)</small>
               </td>
            </tr>
            
            <!--input radio - opcoes mutuamente exclusivas-->
            <tr>
               <td>Genero:</td>
               <td>
                  <input type="radio" name="rdbGenero" id="rdbMasculino" value="M" checked/>
                  <label for="rdbMasculino">Masculino</label><br>
                  
                  <input type="radio" name="rdbGenero" id="rdbFeminino" value="F"/>
                  <label for="rdbFeminino">Feminino</label><br>
                  
                  <input type="radio" name="rdbGenero" id="rdbOutro" value="O"/>
                  <label for="rdbOutro">Outro</label><br>
                  
                  <small>(Selecione apenas uma opcao)</small>
               </td>
            </tr>
            
            <!--input checkbox - multiplas selecoes independentes-->
            <tr>
               <td>Interesses:</td>
               <td>
                  <input type="checkbox" name="chkEsporte" id="chkEsporte" value="esporte"/>
                  <label for="chkEsporte">Esporte</label><br>
                  
                  <input type="checkbox" name="chkMusica" id="chkMusica" value="musica" checked/>
                  <label for="chkMusica">Musica</label><br>
                  
                  <input type="checkbox" name="chkLeitura" id="chkLeitura" value="leitura"/>
                  <label for="chkLeitura">Leitura</label><br>
                  
                  <input type="checkbox" name="chkViagem" id="chkViagem" value="viagem"/>
                  <label for="chkViagem">Viagem</label><br>
                  
                  <small>(Selecione quantas desejar)</small>
               </td>
            </tr>
            
            <!--secao: listas e caixas de selecao-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Listas e Caixas de Selecao
               </td>
            </tr>
            
            <!--select dropdown - lista suspensa de opcao unica-->
            <tr>
               <td>Estado Civil:</td>
               <td>
                  <select name="slcEstadoCivil">
                     <option value="">Selecione...</option>
                     <option value="solteiro">Solteiro(a)</option>
                     <option value="casado" selected>Casado(a)</option>
                     <option value="divorciado">Divorciado(a)</option>
                     <option value="viuvo">Viuvo(a)</option>
                  </select>
                  <small>(Lista suspensa)</small>
               </td>
            </tr>
            
            <!--select listbox - lista visivel de opcao unica-->
            <tr>
               <td>Escolaridade:</td>
               <td>
                  <select name="slcEscolaridade" size="5">
                     <option value="fundamental">Ensino Fundamental</option>
                     <option value="medio">Ensino Medio</option>
                     <option value="superior" selected>Ensino Superior</option>
                     <option value="pos">Pos-Graduacao</option>
                     <option value="mestrado">Mestrado</option>
                  </select>
                  <small>(Lista visivel)</small>
               </td>
            </tr>
            
            <!--select multiple - lista de multipla selecao-->
            <tr>
               <td>Idiomas que Fala:</td>
               <td>
                  <select name="slcIdiomas[]" size="6" multiple>
                     <option value="portugues" selected>Portugues</option>
                     <option value="ingles" selected>Ingles</option>
                     <option value="espanhol">Espanhol</option>
                     <option value="frances">Frances</option>
                     <option value="alemao">Alemao</option>
                     <option value="italiano">Italiano</option>
                  </select>
                  <small>(Segure Ctrl para multipla selecao)</small>
               </td>
            </tr>
            
            <!--select com optgroup - lista com grupos de opcoes-->
            <tr>
               <td>Curso de Interesse:</td>
               <td>
                  <select name="slcCurso">
                     <optgroup label="Tecnologia">
                        <option value="ti">Tecnologia da Informacao</option>
                        <option value="ads">Analise e Desenvolvimento de Sistemas</option>
                        <option value="redes">Redes de Computadores</option>
                     </optgroup>
                     <optgroup label="Negocios">
                        <option value="adm">Administracao</option>
                        <option value="cont">Contabilidade</option>
                        <option value="rh">Recursos Humanos</option>
                     </optgroup>
                     <optgroup label="Saude">
                        <option value="enf">Enfermagem</option>
                        <option value="farm">Farmacia</option>
                        <option value="nutri">Nutricao</option>
                     </optgroup>
                  </select>
                  <small>(Opcoes agrupadas por categoria)</small>
               </td>
            </tr>
            
            <!--input com datalist - campo com sugestoes pre-definidas-->
            <tr>
               <td>Navegador Utilizado:</td>
               <td>
                  <input 
                     list="navegadores" 
                     name="txtNavegador"
                     placeholder="Digite ou selecione..."
                  />
                  <datalist id="navegadores">
                     <option value="Google Chrome">
                     <option value="Mozilla Firefox">
                     <option value="Safari">
                     <option value="Microsoft Edge">
                     <option value="Opera">
                     <option value="Brave">
                  </datalist>
                  <small>(Digite ou escolha da lista)</small>
               </td>
            </tr>
            
            <!--secao: agrupamento de campos-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Agrupamento de Campos
               </td>
            </tr>
            
            <!--fieldset - agrupamento logico de campos relacionados-->
            <tr>
               <td>Preferencias de Contato:</td>
               <td>
                  <fieldset>
                     <legend>Melhor Periodo</legend>
                     <input type="radio" name="rdbPeriodo" id="rdbManha" value="manha"/>
                     <label for="rdbManha">Manha (8h-12h)</label><br>
                     
                     <input type="radio" name="rdbPeriodo" id="rdbTarde" value="tarde" checked/>
                     <label for="rdbTarde">Tarde (12h-18h)</label><br>
                     
                     <input type="radio" name="rdbPeriodo" id="rdbNoite" value="noite"/>
                     <label for="rdbNoite">Noite (18h-22h)</label>
                  </fieldset>
                  
                  <fieldset>
                     <legend>Forma de Contato</legend>
                     <input type="checkbox" name="chkEmail" id="chkEmailContato" value="email" checked/>
                     <label for="chkEmailContato">Email</label><br>
                     
                     <input type="checkbox" name="chkTelefone" id="chkTelefoneContato" value="telefone"/>
                     <label for="chkTelefoneContato">Telefone</label><br>
                     
                     <input type="checkbox" name="chkWhatsapp" id="chkWhatsapp" value="whatsapp" checked/>
                     <label for="chkWhatsapp">WhatsApp</label>
                  </fieldset>
               </td>
            </tr>
            
            <!--secao: campos de texto longo-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Campos de Texto Longo
               </td>
            </tr>
            
            <!--textarea - area de texto multilinha-->
            <tr>
               <td>Observacoes:</td>
               <td>
                  <textarea 
                     name="txaObservacoes" 
                     rows="5" 
                     cols="60"
                     placeholder="Digite suas observacoes aqui..."
                     maxlength="500"
                  ></textarea><br>
                  <small>(Maximo 500 caracteres)</small>
               </td>
            </tr>
            
            <!--secao: elementos html5 semanticos-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Elementos HTML5 Semanticos
               </td>
            </tr>
            
            <!--progress - barra de progresso-->
            <tr>
               <td>Progresso do Cadastro:</td>
               <td>
                  <progress value="75" max="100"></progress> 75%
                  <br><small>(Indicador de progresso)</small>
               </td>
            </tr>
            
            <!--meter - medidor de escala-->
            <tr>
               <td>Nivel de Experiencia:</td>
               <td>
                  <meter 
                     value="7" 
                     min="0" 
                     max="10"
                     low="3"
                     high="7"
                     optimum="10"
                  ></meter> 7/10
                  <br><small>(Medidor com niveis)</small>
               </td>
            </tr>
            
            <!--details/summary - conteudo expansivel-->
            <tr>
               <td>Termos de Uso:</td>
               <td>
                  <details>
                     <summary>Clique para ler os termos</summary>
                     <p>Ao utilizar este formulario, voce concorda com:</p>
                     <ul>
                        <li>O processamento dos seus dados pessoais</li>
                        <li>O envio de comunicacoes relacionadas</li>
                        <li>A politica de privacidade da empresa</li>
                     </ul>
                  </details>
                  <small>(Conteudo expansivel)</small>
               </td>
            </tr>
            
            <!--output - resultado de calculo-->
            <tr>
               <td>Calculo de Valores:</td>
               <td>
                  <input type="number" id="num1" value="10" style="width: 50px;"> +
                  <input type="number" id="num2" value="20" style="width: 50px;"> =
                  <output name="resultado" for="num1 num2">30</output>
                  <br><small>(Elemento output para resultados)</small>
               </td>
            </tr>
            
            <!--secao: botoes especiais-->
            <tr>
               <td colspan="2" class="subsecao-titulo">
                  Tipos de Botoes
               </td>
            </tr>
            
            <!--input image - botao com imagem-->
            <tr>
               <td>Botao de Imagem:</td>
               <td>
                  <input 
                     type="image" 
                     name="imgEnviar"
                     id="imgEnviar" 
                     src="img/foto.bmp" 
                     alt="Um cabrita de oculos"
                     value="fotocabrita"
                     width="150"
                     height="100"
                  />
                  <br>
                  <label for="imgEnviar">Minha cabrita Rebeca dando um rolezinho na roca!</label>
                  <br><small>(Botao que usa imagem - clique envia o formulario)</small>
               </td>
            </tr>
            
            <!--secao: botoes de acao-->
            <tr>
               <td colspan="2">
                  <table width="100%">
                     <tr>
                        <!--input button - botao generico para javascript-->
                        <td align="center">
                           <input 
                              type="button" 
                              name="btnMostrar"
                              id="btnMostrar"
                              value="Botao JavaScript" 
                              class="button"
                              onclick="alertaGenerico()" 
                              onmouseover="mudaCor()" 
                              onmouseout="voltaCor()"
                           />
                           <br><small>(Executa JavaScript)</small>
                        </td>
                        
                        <!--input reset - limpa todos os campos do formulario-->
                        <td align="center">
                           <input 
                              type="reset" 
                              name="btnLimpar" 
                              value="Limpar Formulario"
                              class="button button4"
                           />
                           <br><small>(Restaura valores)</small>
                        </td>
                        
                        <!--input submit - envia o formulario-->
                        <td align="center">
                           <input 
                              type="submit" 
                              name="btnEnviar" 
                              value="Enviar Dados"
                              class="button button2"
                           />
                           <br><small>(Envia formulario)</small>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
      </form>

      <!-- scripts -->
      <script src="js/acoes.js"></script>
   </body>
</html>