<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login com PHP</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <?php if (!isset($_POST['entrar'])) { // se não tiver clickado no botão entrar 
        ?>
    <form method="post" class="form-login">
        <h1>Login</h1>
        <?php if (isset($_SESSION['msg'])) // se existir uma sessão 'msg', ou seja, se user/senha tiver incorreto
            {
                echo $_SESSION['msg']; // informa ao usuário o conteúdo da sessão 'msg'
                unset($_SESSION['msg']); // destrói a sessão 'msg'
            } ?>
        <div class="campos-usuario">
            <input type="text" name="usuario" autocomplete="off">
            <span data-placeholder="Nome de usuário"></span>
        </div>
        <div class="campos-usuario">
            <input type="password" name="senha" autocomplete="off">
            <span data-placeholder="Senha"></span>
        </div>
        <input type="submit" value="Entrar" name="entrar" class="botao-login">
    </form>
    <?php
    } else { // se tiver clicado no botão de entrar
        if ($_POST['usuario'] == "lucas" && $_POST['senha'] == "123") { // verifica se o user é 'lucas' e se a senha é '123'
            echo '<div id="boas-vindas">Bem-vindo ' . $_POST['usuario'] . '!</div>'; // dá mensagem de boas-vindas ao usuário logado
        } else { // se o user e a senha não forem certas
            $_SESSION['msg'] = '<div id="erro">Usuário ou senha incorretos.<br></div>'; // cria a sessão 'msg' com mensagem de erro
            header("Location: ."); // redireciona à mesma página para nova tentativa de login
        }
    } ?>
</body>

<script>
    $(".campos-usuario input").on("focus", function() {
        $(this).addClass("focus");
    });

    $(".campos-usuario input").on("blur", function() {
        if ($(this).val() == "")
            $(this).removeClass("focus");
    });
</script>

</html>