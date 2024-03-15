<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Meu Site</title>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Verdana, Arial, sans-serif;
        }

        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .conteudo {
            flex: 1;
            padding: 20px;
        }

        .relatorio {
            border: 1px solid black;
        }

        .relatorio th {
            background-color: darkgray;
            color: black;
            border: 1px solid black;
            font-size: 12px;
        }

        .relatorio td {
            color: black;
            border: 1px solid black;
            padding: 5px;
            font-size: 10px;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .colunaEsquerda {
            width: 30%;
        }
    </style>
</head>

<body>
    <div class="conteudo">
        <table class="w-100 relatorio" style="border-top:100px;">
            <thead>
                <tr>
                    <th class="text-center" scope="col">CANDIDATO</th>
                    <th class="text-center" scope="col">CPF/CNPJ</th>
                    <th class="text-center" scope="col">TEL. COMERCIAL</th>
                    <th class="text-center" scope="col">CELULAR</th>
                    <th class="text-center" scope="col">EMAIL</th>
                    <th class="text-center" scope="col">ENDEREÇO</th>
                    <th class="text-center" scope="col">TOTAL DE ARQUIVOS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $linha)
                <tr>
                    <td class="text-start">
                         {{ $linha['nmSolicitante']; }}
                    </td>
                    <td class="text-end">
                        <?php echo formatarCpfCnpj($linha['nuCpfCnpj']); ?>
                    </td>
                    <td class="text-end">
                        <?php echo $linha['nuTelefoneComercial']; ?>
                    </td>
                    <td class="text-end">
                        <?php echo $linha['nuTelefoneCelular']; ?>
                    </td>
                    <td class="text-start">
                        <?php echo $linha['deEnderecoEmail']; ?>
                    </td>
                    <td class="text-start">
                        <?php echo $linha['deLogradouro'].', '.$linha['deComplemento'].', '.$linha['deSetor'].', '.$linha['nmCidade'].', '.$linha['sgEstado']; ?>
                    </td>
                    <td class="text-end">
                        <?php echo $linha['nuTotalArquivos']; ?>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr class="w-100">
</body>

</html>