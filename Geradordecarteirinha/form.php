<?php
session_start();
if (!isset($_SESSION['login'])) {
    $_SESSION['locked'] = 'Acesso bloqueado';
    header('location: index.php');
}
$mensagem = 'GERADOR DE CARTEIRINHA';
$mensagem .= '<br>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gerador de Carteirinha IFMG</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Segoe UI", Arial, sans-serif;
            }

            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                padding: 20px;
                color: #333;
            }

            h1 {
                color: #fff;
                text-align: center;
                margin-bottom: 30px;
                text-shadow: 0 3px 8px rgba(0,0,0,0.3);
                font-size: 2em;
                letter-spacing: 1px;
            }

            .form-container {
                background: #fff;
                padding: 40px 50px;
                border-radius: 20px;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
                max-width: 480px;
                width: 100%;
                animation: aparecer 0.4s ease-in-out;
            }

            @keyframes aparecer {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            form {
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            label {
                font-weight: bold;
                color: #333;
                margin-bottom: 5px;
            }

            input[type="text"],
            input[type="date"],
            input[type="file"],
            select {
                padding: 10px 12px;
                border: 2px solid #ccc;
                border-radius: 10px;
                font-size: 15px;
                transition: 0.2s ease;
                width: 100%;
            }

            input:focus,
            select:focus {
                border-color: #667eea;
                outline: none;
                box-shadow: 0 0 5px rgba(102,126,234,0.5);
            }

            select optgroup {
                font-weight: bold;
                color: #444;
            }

            .btn-enviar {
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

            .btn-enviar::after {
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

            .btn-enviar:hover::after {
                left: 125%;
            }

            .btn-enviar:hover {
                transform: scale(1.03);
                opacity:0.9;
            }
            @media (max-width: 500px) {
                .form-container {
                    padding: 25px;
                }
            }
        </style>
    </head>
    <body>
        <h1>Gerador de Carteirinha</h1>
        <div class="form-container">
        <form name="frmGerador" action="confirmacao.php" method="post" enctype="multipart/form-data">
            Nome:<input 
                    type="text" 
                    name="txtNome" 
                    placeholder="Digite seu nome completo" 
                    size="21" 
                    maxlength="100" 
                    required><br>
            Data de Nascimento:<input 
                    type="date" 
                    name="dtaNascimento" 
                    min="1900-01-01" 
                    max="2025-10-23" 
                    required><br>
            CPF:<input 
                    type="text"
                    name="txtCpf"
                    placeholder="123.456.789-00"
                    pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"
                    required><br>
            Curso:<select name="slcCurso">
                         <optgroup label="T&eacute;cnico">
                            <option value="T&eacute;cnico em Admnistra&ccedil;&atilde;o">Administra&ccedil;&atilde;o</option>
                            <option value="T&eacute;cnico em Agropecu&aacute;ria">Agropecu&aacute;ria</option>
                            <option value="T&eacute;cnico em Biotecnologia">Biotecnologia</option>
                            <option value="T&eacute;cnico em Eletromec&acirc;nica">Eletromec&acirc;nica</option>
                            <option value="T&eacute;cnico em Inform&aacute;tica">Inform&aacute;tica</option>
                            <option value="T&eacute;cnico em Meio Ambiente">Meio Ambiente</option>
                         </optgroup>
                         <optgroup label="Bacharelado">
                            <option value="Bacharelado em Administra&ccedil;&atilde;o">Administra&ccedil;&atilde;o</option>
                            <option value="Bacharelado em Agronomia">Agronomia</option>
                            <option value="Bacharelado em Engenharia de Computa&ccedil;&atilde;o">Engenharia de Computa&ccedil;&atilde;o</option>
                            <option value="Bacharelado em Engenharia de Produ&ccedil;&atilde;o">Engenharia de Produ&ccedil;&atilde;o</option>
                            <option value="Bacharelado em Medicina Veterin&aacute;ria">Medicina Veterin&aacute;ria</option>
                            <option value="Bacharelado em Zootecnia">Zootecnia</option>
                         </optgroup>
                         <optgroup label="Licenciatura">
                            <option value="Licenciatura em F&iacute;sica">F&iacute;sica</option>
                            <option value="Licenciatura em Ci&ecirc;ncias Biol&oacute;gicas">Ci&ecirc;ncias Biol&oacute;gicas</option>
                            <option value="Licenciatura em Educa&ccedil;&atilde;o F&iacute;sica">Educa&ccedil;&atilde;o F&iacute;sica</option>
                         </optgroup>
                      </select>
                      <br>
            Matr&iacute;cula:<input 
                    type="text"
                    name="txtMat"
                    placeholder="0123456"
                    pattern="[0-9]{7}"
                    required><br>
            Foto:<input 
                    type="file" 
                    name="flFoto"
                    accept="image/*"><br>       
            <button type="submit" name="btnEnviar" class="btn-enviar">Prever</button>
        </form>
    </div>
</body>
</html>
';
echo $mensagem;
?>
