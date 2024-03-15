<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hello World</title>
        <link rel="stylesheet" href="{{base_url('assets/bootstrap4/css/bootstrap.min.css')}}">
    </head>
<body>
    <form method="POST" action="{{current_url().'/enviar'}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5">
                        {{$mensagem ?? ''}}
                        Hello World 
                        <div class="card-header">Hello World {{$variavel}}</div>
                        <div class="card-body">
                            <p>Welcome to Laravel Blade with Bootstrap 4! </p>
                        </div>
                        <input type="hidden" name="input_1" value="teste 888" />
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" title="Enviar" />
    </form>

    <!-- Adicione os scripts do Bootstrap 4 -->
    <script src="{{base_url('assets/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script src="{{base_url('application/modules/sfe/views/teste.js')}}"></script>
</body>
</html>