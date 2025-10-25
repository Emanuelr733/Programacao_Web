<?php
session_start();
$mensagem = 'Fa&ccedil;a seu login no sistema';
$mensagem .= '<br>
    <form action="login.php" method="post">
        Login:<input type="text" name="txtLogin"><br>
        Senha:<input type="text" name="txtSenha"<br>
        <input type="submit" name="btnEnviar">
    </form>';
if (isset($_SESSION['erro']))
{
    $mensagem = 'Seu login ou senha est&aacute; incorreto.';
    $mensagem .= '<br>
    <form action="login.php" method="post">
        Login:<input type="text" name="txtLogin"><br>
        Senha:<input type="text" name="txtSenha"<br>
        <input type="submit" name="btnEnviar">
    </form>';
}
if (isset($_SESSION['login']))
{
    $mensagem = 'Voc&ecirc; j&aacute; est&aacute; logado no sistema.';
    $mensagem .= '<br><br>
    <a href="form.php">Gerar Carteirinha</a>
    <a href="logout.php">SAIR DO SISTEMA</a><br><br>';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Sistema</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }
            
            .container {
                background: white;
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                max-width: 400px;
                width: 100%;
                text-align: center;
            }
            
            .container form {
                margin-top: 25px;
            }
            
            .container input[type="text"] {
                width: 100%;
                padding: 12px 15px;
                margin: 10px 0;
                border: 2px solid #e0e0e0;
                border-radius: 8px;
                font-size: 14px;
                transition: all 0.3s ease;
                display: block;
            }
            
            .container input[type="text"]:focus {
                outline: none;
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            }
            
            .container input[type="submit"] {
                width: 100%;
                padding: 12px;
                margin-top: 20px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }
            
            .container input[type="submit"]:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            }
            
            .container input[type="submit"]:active {
                transform: translateY(0);
            }
            
            .container a {
                display: inline-block;
                margin: 8px 10px;
                padding: 10px 20px;
                background: #667eea;
                color: white;
                text-decoration: none;
                border-radius: 6px;
                transition: all 0.3s ease;
            }
            
            .container a:hover {
                background: #764ba2;
                transform: translateY(-2px);
            }
            
            .container a[href="logout.php"] {
                background: #ef4444;
                margin-top: 10px;
                display: block;
                width: fit-content;
                margin-left: auto;
                margin-right: auto;
            }
            
            .container a[href="logout.php"]:hover {
                background: #dc2626;
            }
            
            .message {
                font-size: 18px;
                color: #333;
                margin-bottom: 10px;
                font-weight: 500;
            }
            
            .error-message {
                color: #ef4444;
            }
            
            .success-message {
                color: #10b981;
            }
            
            label {
                display: block;
                text-align: left;
                margin-top: 15px;
                margin-bottom: 5px;
                color: #555;
                font-weight: 500;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php echo $mensagem; ?>
        </div>
    </body>
</html>