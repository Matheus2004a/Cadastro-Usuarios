# Sistema de cadastro de usuários ⚙️🧑‍🤝‍🧑

<div align="center">
    <video src="video/Cadastro-Demonstração.mp4" width="500" height="900">
</div>

Este sistema trata - se de um crud completo, onde é possível os usuários realizar todas as suas operações básicas em uma base de dados relacionais, sendo elas:

- **C (Create)**: Adicionar novos dados.
- **R (Read):** Realizar a leitura, recuperação ou visualização de seus dados.
- **U (Update)**: Fazer a alteração ou atualização de seus dados.
- **D (Delete):** Remover seus dados.  

Ao fazer esse sistema pude compreender melhor sobre conceitos como:
- Conexão com banco de dados.
- Envio de dados via método GET como é feito no caso do usuário realizar a atualização de seus dados, uma vez que utilizamos deste recurso para obter o preenchimento automático dos campos do formulário de cadastro.
- O funcionamento de instruções SQL dentro do PHP, a exibição dinâmica dos dados em tabelas e etc.
- Filtragem no campo de pesquisar usuários cadastrados.

**Observação:** Estou com um problema de erro de chave array indefinida ao trabalhar com sessão no PHP, então caso alguém tenha uma sugestão de melhoria no código a ser feita ou até mesmo sobre questões de segurança, podem ficar à vontade para fazê - las. Este erro não é nada grave, apenas uma mensagem de alerta, pois o sistema está funcionando.💕😍

## Sobre a conexão com o BD
```php
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Conexão falhada: " . mysqli_connect_error());
    }
?>
```
**Substituições recomendadas a serem feitas nas seguintes variáveis:**
- **$password:** Substitua pela sua senha configurada do seu próprio banco de dados.
- **$dbname:** Substitua pelo nome do banco de dados que você criou.