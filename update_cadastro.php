<?php
    session_start();
    include_once("./connection/conexao.php");

    $nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $sql = "UPDATE `tbl_dadosuser` (`id_user`, nome_completo`, `email`, `senha`) 
            VALUES ('$nomeCompleto','$email','$senha')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['user-cadastrado'] = "<div class='alert alert-success d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
            <div>
            Usuário alterado com sucesso
            </div>
            </div>";
        header("location: ./home/forms.php");
    } 
    else {
        $_SESSION['user-descadastrado'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'>
            <use xlink:href='#exclamation-triangle-fill' />
            </svg>
            <div>
            Usuário não alterado
            </div>
            </div>";
        header("location: ./home/forms.php");
    }

    mysqli_close($conn);
?>
