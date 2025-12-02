<?php
    session_start();
?>
<html>
    <head>
        <title>Login no Sistema</title>
        <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #333;
        }
        h3 {
            color: white;
            font-size: 2rem;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        form {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 300px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        form br { display: none; }
        input[type="text"], 
        input[type="password"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }
        input:focus {
            border-color: #4f46e5;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        input[type="submit"] {
            background-color: #4f46e5;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            margin-top: 10px;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #4338ca;
        }
        a {
            text-align: center;
            color: white;
            text-decoration: none;
            margin-top: 15px;
            font-size: 0.9rem;
        }
        a:hover { text-decoration: underline; }
    </style>
    </head>
    <body>
        <?php

            if (isset($_SESSION['login'])){
                echo 'Pessoa logada no sistem!
                      <br>
                      <a href="menu.php">Ir para o menu</a>
                      <br>
                      <a href="logout.php">Sair do sistema</a>';
            }else{
                echo '
                    <h3>Tela de Login</h3>
                    <form action="login.php" method="post">
                        Login: 
                        <input type="text" name="txtLogin" id="txtLogin">
                        <br>
                        Senha: 
                        <input type="password" name="txtSenha" id="txtSenha">
                        <br>
                        <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar">
                    </form>';
            }
        ?>
    </body>
</html>