<?php
    session_start();
    require __DIR__ . "/../connection/conexao.php";

    $idUser = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $sql = "UPDATE `tbl_dadosuser` set `nome_completo` = '$nomeCompleto', `email` = '$email', `senha` = '$senha' WHERE id_user = '$idUser'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION["user-alterado"] = "<div class='alert alert-success d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
            <div>
            Usuário alterado com sucesso
            </div>
            </div>";
        header("location: tela_edit_cadastro.php");
    } 
    else {
        $_SESSION['user-nao-alterado'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'>
            <use xlink:href='#exclamation-triangle-fill' />
            </svg>
            <div>
            Usuário já alterado
            </div>
            </div>";
            header("location: tela_edit_cadastro.php");
    }

    mysqli_close($conn);
?>