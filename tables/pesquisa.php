<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabelas dos dados pessoais</title>
    <link rel="stylesheet" href="pesquisa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <?php
    $pesquisa = $_POST['busca'] ?? "";

    include_once("../connection/conexao.php");

    $sql = "SELECT * FROM tbl_dadosuser WHERE nome_completo LIKE '%$pesquisa%'";

    $dados = mysqli_query($conn, $sql);
    ?>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex" action="pesquisa.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar usuário" aria-label="Search" name="busca" required autofocus>
                    <button class="btn btn-outline-success" type="submit">Procurar</button>
                </form>
            </div>
        </nav>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome Completo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (mysqli_num_rows($dados) > 0) {
                        // Buscando todos os registros da tabela
                        while ($row = mysqli_fetch_assoc($dados)) {
                            $idUser = $row['id_user'];
                            $nomeCompleto = $row['nome_completo'];
                            $email = $row['email'];
                            $senha = $row['senha'];

                            echo "<tr>
                                <td>$nomeCompleto</td>
                                <td>$email</td>
                                <td>$senha</td>
                                <td>
                                    <a href='../update/tela_edit_cadastro.php?id=$idUser' class='btn btn-success btn-sm'>Editar</a>
                                    <a href='' class='btn btn-danger btn-sm'>Excluir</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<div class='alert alert-warning d-flex align-items-center' role='alert'>
                        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                        <div>
                        Dados não encontrados
                        </div>
                        </div>";
                    }

                    mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <a href="../index.php">
            <button type="button" class="btn btn-primary"><i class="fas fa-chevron-left"></i></i>Início</button>
        </a>
    </div>

    <script src="https://kit.fontawesome.com/798bcbaf05.js" crossorigin="anonymous"></script>
</body>

</html>