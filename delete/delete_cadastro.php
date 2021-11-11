<?php
    session_start();
    include_once("../connection/conexao.php");

    $idUser = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $sql = "DELETE FROM `tbl_dadosuser` WHERE id_user = $idUser";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['user-deleted'] = "<div class='alert alert-success d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
            <div>
            Usuário excluído com sucesso
            </div>
            </div>";
        header("location: ../tables/pesquisa.php");
    } 
    else {
        $_SESSION['user-not-deleted'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'>
            <use xlink:href='#exclamation-triangle-fill' />
            </svg>
            <div>
            Usuário não excluído
            </div>
            </div>";
            header("location: ../tables/pesquisa.php");
    }

    mysqli_close($conn);
?>
