<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">BEM VINDO!</h2>
                <p class="description description-primary">ACERVO DIGITAL DE CULTURA QUILOMBOLA</p>
                <p class="description description-primary">tradição, cultura, ancestralidade, isso e muito mais...</p>
                <button id="signin" class="btn btn-primary">Login</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Crie sua conta</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <p class="description description-second">Faça seu Cadastro :)</p>
                <form class="form" action="php_manipulacao/cadastro-usuario.php" method="POST">
                    <label class="label-input" for="nome">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" placeholder="Nome" required>
                    </label>

                    <label class="label-input" for="email">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </label>

                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </label>

                    <label class="label-input" for="confirma_senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="confirma_senha" placeholder="Confirme a senha" required>
                    </label>

                    <button id="Cadastrar" class="btn btn-second" type="submit">Cadastrar</button>
                </form>
            </div><!-- second column -->
        </div>

        <!-- Login Form -->
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">BEM VINDO!</h2>
                <p class="description description-primary">ACERVO DIGITAL DE CULTURA QUILOMBOLA</p>
                <p class="description description-primary">tradição, cultura, ancestralidade, isso e muito mais...</p>
                <button id="signup" class="btn btn-primary">Cadastrar</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Login</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <p class="description description-second">Entre com seu e-mail e senha:</p>

                <!-- Mensagem de sucesso -->
                <?php if (isset($_GET['success'])): ?>
                    <div class="message" style="color: green;" id="success-message">
                        <p><?php echo htmlspecialchars($_GET['success']); ?></p>
                    </div>
                    <script>
                        // Após 5 segundos, oculta a mensagem de sucesso
                        setTimeout(function () {
                            document.getElementById('success-message').style.display = 'none';
                        }, 5000);
                    </script>
                <?php endif; ?>

                <!-- Mensagem de erro -->
                <?php if (isset($_GET['error'])): ?>
                    <div class="message" style="color: red;" id="error-message">
                        <p><?php echo htmlspecialchars($_GET['error']); ?></p>
                    </div>
                    <script>
                        // Após 5 segundos, oculta a mensagem de erro
                        setTimeout(function () {
                            document.getElementById('error-message').style.display = 'none';
                        }, 5000);
                    </script>
                <?php endif; ?>

                <form class="form" action="php_manipulacao/login.php" method="POST">
                    <label class="label-input" for="email">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </label>

                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </label>
                    <a class="password" href="#">Esqueceu a senha?</a>
                    <button id="Entrar" class="btn btn-second" type="submit">Entrar</button>
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->

    </div>


    <script src="./js/index.js"></script>
</body>

</html>
