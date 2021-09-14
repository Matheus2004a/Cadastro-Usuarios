<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuários no MySQL com PHP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>

<body>
    <form action="cadastro.php" method="post">
        <h3 class="title-form">Cadastro de usuários</h3>
        <h6>Nome completo</h6>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nomeCompleto" required>
            <label for="floatingInput">Digite seu nome completo</label>
        </div>

        <h6>Email</h6>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
            <label for="floatingInput">Digite seu email</label>
        </div>

        <h6>Senha</h6>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="senha" required>
            <label for="floatingInput">Digite sua senha</label>
        </div>

        <div class="btn-form">
            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>Salvar</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
        </div>
    </form>

    <script src="https://kit.fontawesome.com/798bcbaf05.js" crossorigin="anonymous"></script>
</body>

</html>