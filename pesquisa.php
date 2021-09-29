<?php
    include_once("./connection/conexão.php");

    /* if (isset($_POST['busca-dados'])) {
        $buscarDados = $_POST['busca-dados'];
    } */

    $sql = "SELECT * FROM `tbl_dadosuser`";

    $dados = mysqli_query($conn,$sql);

    if(mysqli_num_rows($dados) > 0){
        // Buscando todos os registros da tabela
        while($row = mysqli_fetch_assoc($dados)){
            echo "Nome Completo: " . $row['nome_completo']. "<br>" . "Email: " . $row['email']. "<br>" . "Senha: " . $row['senha'] . "<hr>";
        }
    }
    else {
        $buscarDados = "<div class='alert alert-warning d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div>
        Dados não encontrados
        </div>
        </div>";
    }

    mysqli_close($conn);
?>