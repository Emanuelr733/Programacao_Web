<?php
#=============================================================================
#arquivo: processa.php
#descricao: captura e exibe todos os dados enviados via post do formulario
#           seguindo exatamente a ordem em que aparecem no html
#=============================================================================

#verifica se o formulario foi enviado via post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
   #=============================================================================
   #inicio do html de resposta
   #=============================================================================
   echo "<!DOCTYPE html>";
   echo "<html>";
   echo "<head>";
   echo "<title>Dados Recebidos do Formulario</title>";
   echo "<meta charset='UTF-8'>";
   echo "<style>";
   echo "body { font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9; }";
   echo "h1 { color: #333; text-align: center; }";
   echo "h2 { color: #666; border-bottom: 2px solid #4CAF50; padding-bottom: 5px; margin-top: 30px; }";
   echo ".container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }";
   echo ".campo { background-color: #f5f5f5; padding: 10px; margin: 10px 0; border-left: 4px solid #4CAF50; border-radius: 4px; }";
   echo ".nome-campo { font-weight: bold; color: #333; }";
   echo ".valor-campo { color: #0066cc; margin-left: 10px; }";
   echo ".vazio { color: #999; font-style: italic; }";
   echo ".array { background-color: #e8f5e9; padding: 5px 10px; margin: 5px 0; border-radius: 3px; }";
   echo ".debug { background-color: #fff3cd; border-left-color: #ff9800; }";
   echo ".btn-voltar { background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 20px; }";
   echo ".btn-voltar:hover { background-color: #45a049; }";
   echo "</style>";
   echo "</head>";
   echo "<body>";
   echo "<div class='container'>";
   echo "<h1>Processamento do Formulario - Dados Recebidos via POST</h1>";
   echo "<p style='text-align: center; color: #666;'>Os dados abaixo foram recebidos na mesma ordem em que aparecem no formulario HTML</p>";
   
   #=============================================================================
   #secao 1: campos ocultos
   #=============================================================================
   echo "<h2>1. Campos Ocultos</h2>";
   
   #campo hidden - armazena dados que nao sao visiveis ao usuario mas sao enviados
   echo "<div class='campo'>";
   if (isset($_POST['hddIdSessao'])) {
      echo "<span class='nome-campo'>hddIdSessao:</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['hddIdSessao']) . "</span>";
   } else {
      echo "<span class='nome-campo'>hddIdSessao:</span>";
      echo "<span class='vazio'>Nao enviado</span>";
   }
   echo "</div>";
   
   #=============================================================================
   #secao 2: campos de texto basicos
   #=============================================================================
   echo "<h2>2. Campos de Texto Basicos</h2>";
   
   #campo text readonly - somente leitura
   echo "<div class='campo'>";
   if (isset($_POST['txtCodigo'])) {
      echo "<span class='nome-campo'>txtCodigo (readonly):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['txtCodigo']) . "</span>";
   }
   echo "</div>";
   
   #campo text comum - entrada de texto padrao
   echo "<div class='campo'>";
   if (isset($_POST['txtNome']) && !empty($_POST['txtNome'])) {
      echo "<span class='nome-campo'>txtNome:</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['txtNome']) . "</span>";
   } else {
      echo "<span class='nome-campo'>txtNome:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo password - senha oculta com asteriscos por seguranca
   echo "<div class='campo'>";
   if (isset($_POST['txtSenha']) && !empty($_POST['txtSenha'])) {
      echo "<span class='nome-campo'>txtSenha:</span>";
      echo "<span class='valor-campo'>";
      echo str_repeat('*', strlen($_POST['txtSenha'])) . " (" . strlen($_POST['txtSenha']) . " caracteres)";
      echo "</span>";
   } else {
      echo "<span class='nome-campo'>txtSenha:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo disabled nao e enviado no post, apenas para informacao
   echo "<div class='campo'>";
   echo "<span class='nome-campo'>txtDesabilitado:</span>";
   echo "<span class='vazio'>Campo disabled - nao enviado via POST</span>";
   echo "</div>";
   
   #=============================================================================
   #secao 3: campos html5 com validacao automatica
   #=============================================================================
   echo "<h2>3. Campos HTML5 com Validacao Automatica</h2>";
   
   #campo email - validacao automatica de formato de email
   echo "<div class='campo'>";
   if (isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])) {
      echo "<span class='nome-campo'>txtEmail (type=email):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['txtEmail']) . "</span>";
      #validacao adicional do email no servidor
      if (filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)) {
         echo " ✓";
      } else {
         echo " (formato invalido)";
      }
   } else {
      echo "<span class='nome-campo'>txtEmail:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo url - validacao automatica de formato de url
   echo "<div class='campo'>";
   if (isset($_POST['txtWebsite']) && !empty($_POST['txtWebsite'])) {
      echo "<span class='nome-campo'>txtWebsite (type=url):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['txtWebsite']) . "</span>";
      #validacao adicional da url no servidor
      if (filter_var($_POST['txtWebsite'], FILTER_VALIDATE_URL)) {
         echo " ✓";
      } else {
         echo " (formato invalido)";
      }
   } else {
      echo "<span class='nome-campo'>txtWebsite:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo tel - telefone com pattern de validacao
   echo "<div class='campo'>";
   if (isset($_POST['txtTelefone']) && !empty($_POST['txtTelefone'])) {
      echo "<span class='nome-campo'>txtTelefone (type=tel):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['txtTelefone']) . "</span>";
   } else {
      echo "<span class='nome-campo'>txtTelefone:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo search - campo otimizado para busca
   echo "<div class='campo'>";
   if (isset($_POST['srcBusca']) && !empty($_POST['srcBusca'])) {
      echo "<span class='nome-campo'>srcBusca (type=search):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['srcBusca']) . "</span>";
   } else {
      echo "<span class='nome-campo'>srcBusca:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #=============================================================================
   #secao 4: campos numericos e de intervalo
   #=============================================================================
   echo "<h2>4. Campos Numericos e de Intervalo</h2>";
   
   #campo number - entrada numerica com setas
   echo "<div class='campo'>";
   if (isset($_POST['numIdade'])) {
      echo "<span class='nome-campo'>numIdade (type=number):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['numIdade']) . " anos</span>";
   } else {
      echo "<span class='nome-campo'>numIdade:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo range - controle deslizante
   echo "<div class='campo'>";
   if (isset($_POST['rngSatisfacao'])) {
      echo "<span class='nome-campo'>rngSatisfacao (type=range):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['rngSatisfacao']) . "/10</span>";
      #barra visual do nivel
      $nivel = intval($_POST['rngSatisfacao']);
      echo "<div style='background: #ddd; height: 20px; width: 200px; display: inline-block; margin-left: 10px; position: relative;'>";
      echo "<div style='background: #4CAF50; height: 100%; width: " . ($nivel * 10) . "%;'></div>";
      echo "</div>";
   } else {
      echo "<span class='nome-campo'>rngSatisfacao:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #=============================================================================
   #secao 5: campos de data e hora
   #=============================================================================
   echo "<h2>5. Campos de Data e Hora</h2>";
   
   #campo date - seletor de data
   echo "<div class='campo'>";
   if (isset($_POST['dtNascimento']) && !empty($_POST['dtNascimento'])) {
      echo "<span class='nome-campo'>dtNascimento (type=date):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['dtNascimento']) . "</span>";
      #formata a data para exibicao em formato brasileiro
      $data = DateTime::createFromFormat('Y-m-d', $_POST['dtNascimento']);
      if ($data) {
         echo " (" . $data->format('d/m/Y') . ")";
      }
   } else {
      echo "<span class='nome-campo'>dtNascimento:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo time - seletor de horario
   echo "<div class='campo'>";
   if (isset($_POST['tmHorario']) && !empty($_POST['tmHorario'])) {
      echo "<span class='nome-campo'>tmHorario (type=time):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['tmHorario']) . "</span>";
   } else {
      echo "<span class='nome-campo'>tmHorario:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo datetime-local - seletor de data e hora
   echo "<div class='campo'>";
   if (isset($_POST['dtAgendamento']) && !empty($_POST['dtAgendamento'])) {
      echo "<span class='nome-campo'>dtAgendamento (type=datetime-local):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['dtAgendamento']) . "</span>";
      #formata data e hora para exibicao
      $datetime = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['dtAgendamento']);
      if ($datetime) {
         echo " (" . $datetime->format('d/m/Y H:i') . ")";
      }
   } else {
      echo "<span class='nome-campo'>dtAgendamento:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo month - seletor de mes e ano
   echo "<div class='campo'>";
   if (isset($_POST['dtMes']) && !empty($_POST['dtMes'])) {
      echo "<span class='nome-campo'>dtMes (type=month):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['dtMes']) . "</span>";
      #formata mes e ano
      $mes = DateTime::createFromFormat('Y-m', $_POST['dtMes']);
      if ($mes) {
         $meses = array('', 'Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 
                       'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
         echo " (" . $meses[intval($mes->format('n'))] . "/" . $mes->format('Y') . ")";
      }
   } else {
      echo "<span class='nome-campo'>dtMes:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo week - seletor de semana
   echo "<div class='campo'>";
   if (isset($_POST['dtSemana']) && !empty($_POST['dtSemana'])) {
      echo "<span class='nome-campo'>dtSemana (type=week):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['dtSemana']) . "</span>";
   } else {
      echo "<span class='nome-campo'>dtSemana:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #=============================================================================
   #secao 6: campos de selecao e escolha
   #=============================================================================
   echo "<h2>6. Campos de Selecao e Escolha</h2>";
   
   #campo color - seletor de cor
   echo "<div class='campo'>";
   if (isset($_POST['clrCor'])) {
      echo "<span class='nome-campo'>clrCor (type=color):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['clrCor']) . "</span>";
      #exibe a cor visualmente
      echo "<span style='display: inline-block; width: 30px; height: 20px; background-color: " . $_POST['clrCor'] . "; ";
      echo "border: 1px solid #000; margin-left: 10px; vertical-align: middle;'></span>";
   } else {
      echo "<span class='nome-campo'>clrCor:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #campo file - upload de arquivo (dados em $_FILES, nao $_POST)
   echo "<div class='campo'>";
   if (isset($_FILES['flFoto']) && $_FILES['flFoto']['error'] == 0) {
      echo "<span class='nome-campo'>flFoto (type=file):</span><br>";
      echo "<div class='array'>";
      echo "<strong>Arquivo recebido com sucesso:</strong><br>";
      echo "Nome original: " . htmlspecialchars($_FILES['flFoto']['name']) . "<br>";
      echo "Tipo MIME: " . htmlspecialchars($_FILES['flFoto']['type']) . "<br>";
      echo "Tamanho: " . number_format($_FILES['flFoto']['size'] / 1024, 2) . " KB<br>";
      echo "Arquivo temporario: " . htmlspecialchars($_FILES['flFoto']['tmp_name']) . "<br>";
      #verifica se e uma imagem
      $extensoes_imagem = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp');
      $extensao = strtolower(pathinfo($_FILES['flFoto']['name'], PATHINFO_EXTENSION));
      if (in_array($extensao, $extensoes_imagem)) {
         echo "Status: Arquivo de imagem valido ✓";
      }
      echo "</div>";
   } elseif (isset($_FILES['flFoto']) && $_FILES['flFoto']['error'] != 0) {
      echo "<span class='nome-campo'>flFoto (type=file):</span>";
      echo "<span class='vazio'>Erro no upload - codigo: " . $_FILES['flFoto']['error'] . "</span>";
   } else {
      echo "<span class='nome-campo'>flFoto (type=file):</span>";
      echo "<span class='vazio'>Nenhum arquivo enviado</span>";
   }
   echo "</div>";
   
   #campo radio - opcoes mutuamente exclusivas para genero
   echo "<div class='campo'>";
   if (isset($_POST['rdbGenero'])) {
      echo "<span class='nome-campo'>rdbGenero (type=radio):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['rdbGenero']);
      #traduz o valor para exibicao
      $generos = array('M' => 'Masculino', 'F' => 'Feminino', 'O' => 'Outro');
      if (isset($generos[$_POST['rdbGenero']])) {
         echo " (" . $generos[$_POST['rdbGenero']] . ")";
      }
      echo "</span>";
   } else {
      echo "<span class='nome-campo'>rdbGenero:</span>";
      echo "<span class='vazio'>Nao selecionado</span>";
   }
   echo "</div>";
   
   #campos checkbox - multiplas selecoes de interesses
   echo "<div class='campo'>";
   echo "<span class='nome-campo'>Interesses (type=checkbox):</span><br>";
   echo "<div class='array'>";
   #lista todos os checkboxes possiveis
   $interesses = array(
      'chkEsporte' => 'Esporte',
      'chkMusica' => 'Musica', 
      'chkLeitura' => 'Leitura',
      'chkViagem' => 'Viagem'
   );
   $algum_marcado = false;
   foreach ($interesses as $campo => $label) {
      if (isset($_POST[$campo])) {
         echo "✓ " . $label . " (valor: " . htmlspecialchars($_POST[$campo]) . ")<br>";
         $algum_marcado = true;
      }
   }
   if (!$algum_marcado) {
      echo "<span class='vazio'>Nenhum interesse marcado</span>";
   }
   echo "</div>";
   echo "</div>";
   
   #=============================================================================
   #secao 7: listas e caixas de selecao
   #=============================================================================
   echo "<h2>7. Listas e Caixas de Selecao</h2>";
   
   #select dropdown - lista suspensa simples
   echo "<div class='campo'>";
   if (isset($_POST['slcEstadoCivil']) && !empty($_POST['slcEstadoCivil'])) {
      echo "<span class='nome-campo'>slcEstadoCivil (select dropdown):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['slcEstadoCivil']) . "</span>";
   } else {
      echo "<span class='nome-campo'>slcEstadoCivil:</span>";
      echo "<span class='vazio'>Nao selecionado</span>";
   }
   echo "</div>";
   
   #select listbox - lista visivel
   echo "<div class='campo'>";
   if (isset($_POST['slcEscolaridade'])) {
      echo "<span class='nome-campo'>slcEscolaridade (select size=5):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['slcEscolaridade']) . "</span>";
   } else {
      echo "<span class='nome-campo'>slcEscolaridade:</span>";
      echo "<span class='vazio'>Nao selecionado</span>";
   }
   echo "</div>";
   
   #select multiple - lista de multipla selecao (recebe array)
   echo "<div class='campo'>";
   if (isset($_POST['slcIdiomas']) && is_array($_POST['slcIdiomas'])) {
      echo "<span class='nome-campo'>slcIdiomas[] (select multiple):</span><br>";
      echo "<div class='array'>";
      echo "<strong>" . count($_POST['slcIdiomas']) . " idioma(s) selecionado(s):</strong><br>";
      foreach ($_POST['slcIdiomas'] as $indice => $idioma) {
         echo ($indice + 1) . ". " . htmlspecialchars($idioma) . "<br>";
      }
      echo "</div>";
   } else {
      echo "<span class='nome-campo'>slcIdiomas[]:</span>";
      echo "<span class='vazio'>Nenhum idioma selecionado</span>";
   }
   echo "</div>";
   
   #select com optgroup - lista com grupos
   echo "<div class='campo'>";
   if (isset($_POST['slcCurso']) && !empty($_POST['slcCurso'])) {
      echo "<span class='nome-campo'>slcCurso (select com optgroup):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['slcCurso']) . "</span>";
   } else {
      echo "<span class='nome-campo'>slcCurso:</span>";
      echo "<span class='vazio'>Nao selecionado</span>";
   }
   echo "</div>";
   
   #input com datalist - campo com sugestoes
   echo "<div class='campo'>";
   if (isset($_POST['txtNavegador']) && !empty($_POST['txtNavegador'])) {
      echo "<span class='nome-campo'>txtNavegador (input + datalist):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['txtNavegador']) . "</span>";
   } else {
      echo "<span class='nome-campo'>txtNavegador:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #=============================================================================
   #secao 8: agrupamento de campos (fieldset)
   #=============================================================================
   echo "<h2>8. Agrupamento de Campos (Fieldset)</h2>";
   
   #radio buttons dentro de fieldset - periodo de contato
   echo "<div class='campo'>";
   if (isset($_POST['rdbPeriodo'])) {
      echo "<span class='nome-campo'>rdbPeriodo (fieldset radio):</span>";
      echo "<span class='valor-campo'>" . htmlspecialchars($_POST['rdbPeriodo']);
      #traduz o periodo
      $periodos = array('manha' => 'Manha (8h-12h)', 'tarde' => 'Tarde (12h-18h)', 'noite' => 'Noite (18h-22h)');
      if (isset($periodos[$_POST['rdbPeriodo']])) {
         echo " - " . $periodos[$_POST['rdbPeriodo']];
      }
      echo "</span>";
   } else {
      echo "<span class='nome-campo'>rdbPeriodo:</span>";
      echo "<span class='vazio'>Nao selecionado</span>";
   }
   echo "</div>";
   
   #checkboxes dentro de fieldset - formas de contato
   echo "<div class='campo'>";
   echo "<span class='nome-campo'>Formas de Contato (fieldset checkbox):</span><br>";
   echo "<div class='array'>";
   $formas_contato = array(
      'chkEmail' => 'Email',
      'chkTelefone' => 'Telefone',
      'chkWhatsapp' => 'WhatsApp'
   );
   $algum_contato = false;
   foreach ($formas_contato as $campo => $label) {
      if (isset($_POST[$campo])) {
         echo "✓ " . $label . " (valor: " . htmlspecialchars($_POST[$campo]) . ")<br>";
         $algum_contato = true;
      }
   }
   if (!$algum_contato) {
      echo "<span class='vazio'>Nenhuma forma de contato selecionada</span>";
   }
   echo "</div>";
   echo "</div>";
   
   #=============================================================================
   #secao 9: campos de texto longo
   #=============================================================================
   echo "<h2>9. Campos de Texto Longo</h2>";
   
   #textarea - area de texto multilinha
   echo "<div class='campo'>";
   if (isset($_POST['txaObservacoes']) && !empty($_POST['txaObservacoes'])) {
      echo "<span class='nome-campo'>txaObservacoes (textarea):</span><br>";
      echo "<div class='array'>";
      #preserva quebras de linha e escapa html
      echo nl2br(htmlspecialchars($_POST['txaObservacoes']));
      echo "<br><br><em>Caracteres: " . strlen($_POST['txaObservacoes']) . "</em>";
      echo "</div>";
   } else {
      echo "<span class='nome-campo'>txaObservacoes:</span>";
      echo "<span class='vazio'>Nao preenchido</span>";
   }
   echo "</div>";
   
   #=============================================================================
   #secao 10: elementos html5 semanticos
   #nota: progress, meter, details e output nao enviam dados via post
   #=============================================================================
   echo "<h2>10. Elementos HTML5 Semanticos</h2>";
   echo "<div class='campo'>";
   echo "<span class='vazio'>Elementos progress, meter, details e output nao enviam dados via POST</span>";
   echo "</div>";
   
   #=============================================================================
   #secao 11: botoes especiais
   #=============================================================================
   echo "<h2>11. Botoes Especiais</h2>";
   
   #input image - se clicado, envia coordenadas x e y do clique
   echo "<div class='campo'>";
   if (isset($_POST['imgEnviar_x']) && isset($_POST['imgEnviar_y'])) {
      echo "<span class='nome-campo'>imgEnviar (type=image):</span><br>";
      echo "<div class='array'>";
      echo "Botao de imagem (foto.bmp) foi clicado!<br>";
      echo "Coordenada X do clique: " . htmlspecialchars($_POST['imgEnviar_x']) . " pixels<br>";
      echo "Coordenada Y do clique: " . htmlspecialchars($_POST['imgEnviar_y']) . " pixels<br>";
      echo "<em>Nota: as coordenadas indicam onde na imagem o usuario clicou</em>";
      echo "</div>";
   } else {
      echo "<span class='nome-campo'>imgEnviar:</span>";
      echo "<span class='vazio'>Botao de imagem nao foi usado para enviar</span>";
   }
   echo "</div>";
   
   #=============================================================================
   #secao 12: botao de envio usado
   #=============================================================================
   echo "<h2>12. Botao de Envio</h2>";
   
   #verifica qual botao foi usado para enviar o formulario
   echo "<div class='campo'>";
   if (isset($_POST['btnEnviar'])) {
      echo "<span class='nome-campo'>btnEnviar (type=submit):</span>";
      echo "<span class='valor-campo'>\"" . htmlspecialchars($_POST['btnEnviar']) . "\" foi clicado</span>";
   } else {
      echo "<span class='nome-campo'>Botao de envio:</span>";
      echo "<span class='vazio'>Formulario enviado por outro metodo</span>";
   }
   echo "</div>";
   
   #=============================================================================
   #secao debug: exibe arrays completos para desenvolvedor
   #=============================================================================
   echo "<h2>Debug - Arrays Completos (Para Desenvolvimento)</h2>";
   
   #exibe todo o array $_POST
   echo "<div class='campo debug'>";
   echo "<strong>Array \$_POST completo:</strong>";
   echo "<pre style='background: white; padding: 10px; border: 1px solid #ddd; overflow-x: auto;'>";
   print_r($_POST);
   echo "</pre>";
   echo "</div>";
   
   #exibe o array $_FILES se houver upload
   if (!empty($_FILES)) {
      echo "<div class='campo debug'>";
      echo "<strong>Array \$_FILES completo:</strong>";
      echo "<pre style='background: white; padding: 10px; border: 1px solid #ddd; overflow-x: auto;'>";
      print_r($_FILES);
      echo "</pre>";
      echo "</div>";
   }
   
   #=============================================================================
   #resumo estatistico dos dados recebidos
   #=============================================================================
   echo "<h2>Resumo Estatistico</h2>";
   echo "<div class='campo' style='background-color: #e3f2fd; border-left-color: #2196f3;'>";
   echo "<strong>Total de campos POST recebidos:</strong> " . count($_POST) . "<br>";
   echo "<strong>Total de arquivos recebidos:</strong> " . count($_FILES) . "<br>";
   $campos_preenchidos = 0;
   foreach ($_POST as $valor) {
      if (!empty($valor)) $campos_preenchidos++;
   }
   echo "<strong>Campos preenchidos:</strong> " . $campos_preenchidos . " de " . count($_POST) . "<br>";
   echo "<strong>Taxa de preenchimento:</strong> " . round(($campos_preenchidos / count($_POST)) * 100, 1) . "%";
   echo "</div>";
   
   #=============================================================================
   #botao para voltar ao formulario
   #=============================================================================
   echo "<br>";
   echo "<div style='text-align: center;'>";
   echo "<a href='javascript:history.back()' class='btn-voltar'>← Voltar ao Formulario</a>";
   echo "</div>";
   
   echo "</div>"; #fecha container
   echo "</body>";
   echo "</html>";
   
} else {
   #=============================================================================
   #se nao foi enviado via post, redireciona para o formulario
   #=============================================================================
   header("Location: formulario.html");
   exit();
}
?>