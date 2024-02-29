<!-- incluir a URL base do sistema -->
<?php
require_once("../../config/baseUrl.php");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS Tema-->
    <link href="../../css/estilo.css" rel="stylesheet">
</head>

<body>
    <br>
    <div class="container">
        <h1 id="main-title">Novo requerimento</h1>
        <hr>
        <form id="create-form" action="<?= $BASE_URL ?>process/contatoProcess.php" method="POST">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nome . </label>
                <input type="text" class="form-control input" id="name" name="name" placeholder="Digite o nome"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input type="text" class="form-control input" id="phone" name="phone" placeholder="Digite o telefone"
                    required>
            </div>
            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea type="text" class="form-control input" id="observations" name="observations"
                    placeholder="Insira as observações" rows="3"></textarea>
            </div>
            <br>
            <button class="btn btn-primary" id="btn-voltar">Voltar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    <br>

    <script>
        // Script para redirecionar o usuário ao clicar no botão Voltar
        document.getElementById('btn-voltar').addEventListener('click', function () {
            // Redireciona para a página inicial
            window.location.href = '<?= $BASE_URL ?>';
        });
    </script>

</body>

</html>


<?php
require_once("../../template/footer.html");
?>