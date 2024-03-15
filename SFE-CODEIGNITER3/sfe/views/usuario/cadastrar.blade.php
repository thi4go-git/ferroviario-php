<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SFE - Formulário de Requerimento</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{base_url('application/modules/sfe/views/usuario/usuario.css')}}">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{base_url('assets/bootstrap4/css/bootstrap.min.css')}}">
    <!--  font awesome -->
    <link rel="stylesheet" href="{{base_url('assets/font-awesome/css/all.min.css')}}">
    <!-- CSS do AdminLTE 3 -->
    <link rel="stylesheet" href="{{base_url('assets/AdminLTE/dist/css/adminlte.css')}}">
</head>





<body class="layout-top-nav" style="height: auto;">

    <div class="wrapper">

        <!--  HEADER -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav mr-auto d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="{{base_url('sfe/home')}}" role="button">
                        <i class="fas fa-bars fa-2x"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <h5> Sistemas de Ferrovias Estadual - SFE</h5>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Pesquisar" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- fim HEADER -->

        <!-- Content Wrapper-->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <!-- Formulário ÚNICO -->
                        <div class="col-md-12">
                            <div class="card card-success m-2">

                                <div class="card-header">
                                    <h4 class="card-title">Formulário de Cadastro SFE</h4>
                                </div>

                                <div class="card-body">
                                    <form id="formulario" action="{{base_url('sfe/formulario/formulario/enviar')}}" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">CPF/CNPJ</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="cpf-cnpj-input" placeholder="CPF ou CNPJ" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Nome/Razão Social</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="nome-razao-input" placeholder="Nome/Razão Social" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Nome do Responsável pela empresa</label>
                                                    <div class="input-group">
                                                        <input disabled="true" type="text" class="form-control" id="nome-resp-input" placeholder="Nome do Responsável pela Empresa" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Email</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="email-input" placeholder="Email" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Celular</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="celular-input" placeholder="Nº Celular" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Telefone Comercial</label>
                                                    <div class="input-group">
                                                        <input disabled="true" type="text" class="form-control" id="tel-comercial-input" placeholder="Nº Telefone Comercial" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Logradouro</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="logradouro-input" placeholder="Logradouro" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Complemento</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="complemento-input" placeholder="Complemento" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Setor</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="setor-input" placeholder="Setor" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Cidade</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="cidade-input" placeholder="Cidade" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small">Cep</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="cep-input" placeholder="Nº CEP" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                            <button type="button" class="btn btn-secondary" onclick="limparForm()">Limpar</button>
                                        </div>
                                    </form>
                                </div>

                                <hr>

                            </div>
                        </div>
                        <!-- FIM Formulário ÚNICO -->
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Rodapé -->
        <footer class="main-footer">
            <strong>&copy; 2024 <a href="#">GOInfra</a>
            </strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Versao</b> 0.0.1
            </div>
        </footer>
        <!-- FIM Rodapé -->

    </div>



    <script src="{{base_url('assets/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script src="{{base_url('application/modules/sfe/views/formulario/formulario.js')}}" defer></script>
    <script src="{{base_url().'assets/plugins/vanilla-masker.min.js'}}"></script>
</body>

</html>