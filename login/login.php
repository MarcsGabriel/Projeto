<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Login GEP</title>
</head>
<body>
    <form action="testeLogin.php" method="POST"> 
        <div class="main-logo">
            <div class="left-login">
                 <img src="animacao.svg" class="left-login-imagen" alt="animação no login">
                 <h1>Faça o Login & <br> Entre em Nosso time</h1>
            </div>
            <div class="rigth-login">
                <div class="card-login">
                        
                     <br><img src="logo.png"><br><br>
                    <div class="textfield" required>
                        <label for="email"> Email</label>
                        <input type="text" name="email" placeholder="E-mail">

                    </div>
                    <div class="textfield" required>
                        <label for="senha"> Senha</label>
                        <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <button class="btn-login" type = "submite" name ="submite">Entrar</button>
                    <div class = "recuperar">
                        <a href="confirmaEmail.php">Esqueceu a senha?</a><br><br>
                    </div>


                </div>
            </div>


        </div>
    </form>

</body>
</html>