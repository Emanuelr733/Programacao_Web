<html>
    <head>
        <title>Login no Sistema</title>
    </head>
    <body>
        <?php
            session_start();

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
                    </form>
                ';
            }
        ?>
    </body>
</html>