<?php
session_start();
?>

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
    require __DIR__ . "/../../connection/conexao.php";

    $pesquisa = $_POST['busca'] ?? "";
    $sql = "SELECT * FROM tbl_dadosuser WHERE nome_completo LIKE '%$pesquisa%' ORDER BY nome_completo";
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
        <nav class="navbar navbar-light bg-light" style="padding: 0.7rem 0;">
            <div class="container-fluid">
                <form class="d-flex" action="pesquisa.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar usu??rio" aria-label="Search" name="busca" required autofocus>
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
                    <th scope="col">Fun????es</th>
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
                                    <a href='' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirm-delete-modal' onclick=" . '"' . "getDatas($idUser,'$nomeCompleto')" . '"' . ">Excluir</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<div class='alert alert-warning d-flex align-items-center' role='alert'>
                        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                        <div>
                        Dados n??o encontrados
                        </div>
                        </div>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <a href="../../index.php">
            <button type="button" class="btn btn-primary"><i class="fas fa-chevron-left"></i></i>In??cio</button>
        </a>

        <?php
        if (isset($_SESSION['user-deleted'])) {
            echo $_SESSION['user-deleted'];
            unset($_SESSION['user-deleted']);
        } else if (isset($_SESSION['user-not-deleted'])) {
            echo $_SESSION["user-not-deleted"];
            unset($_SESSION['user-not-deleted']);
        }
        ?>
    </div>

    <div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirma????o de exclus??o</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../delete/delete_cadastro.php" method="post">
                        <p>Deseja realmente excluir <b id="person-name"></b>?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">N??o</button>
                            <input type="hidden" name="id" id="cod-pessoa" value="">
                            <button type="submit" class="btn btn-danger">Sim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getDatas(id, name) {
            document.querySelector("#cod-pessoa").value = id
            document.querySelector("#person-name").innerHTML = name
        }
    </script>

    <script src="https://kit.fontawesome.com/798bcbaf05.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>