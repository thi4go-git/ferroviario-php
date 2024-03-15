<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SFE - Sistema Ferroviário Estadual</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{base_url('application/modules/sfe/views/solicitante/home.css')}}">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{base_url('assets/bootstrap4/css/bootstrap.min.css')}}">
    <!--  font awesome -->
    <link rel="stylesheet" href="{{base_url('assets/font-awesome/css/all.min.css')}}">

    <!-- CSS do AdminLTE 3 -->
    <link rel="stylesheet" href="{{base_url('assets/AdminLTE/dist/css/adminlte.css')}}">
</head>

<body>

    <div class="margem">
        <a class="govbr-card-content" href="{{base_url('sfe/solicitante/logout')}}">
            <span class="front">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="titulo">SAIR
                </span>
            </span>
        </a>
        <br>

        <!-- div ROW -->
        <form id="formulario-solicitante" method="POST" action="{{base_url('sfe/solicitante/home/editar')}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Informações do solicitante</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_nuCpfCnpj">{{ (strlen($solicitante['nuCpfCnpj']) == 11 ? 'CPF': 'CNPJ') }}</label>
                                        <input type="text" value="{{formatarCpfCnpj($solicitante['nuCpfCnpj'])}}" class="form-control" name="nuCpfCnpj" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_nmSolicitante">{{ (strlen($solicitante['nuCpfCnpj']) == 11 ? 'Nome': 'Razão social') }}</label>
                                        <input type="text" value="{{$solicitante['nmSolicitante']}}" class="form-control" name="nmSolicitante" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" id="divResponsavelEmpresa">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_dtCadastro">Responsável pela Empresa</label>
                                        <input type="text" value="{{$solicitante['nmResponsavelEmpresa']}}" class="form-control" name="nmResponsavelEmpresa" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_deEnderecoEmail">Email</label>
                                        <input type="text" value="{{$solicitante['deEnderecoEmail']}}" class="form-control" name="deEnderecoEmail">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_nuTelefoneCelular">Telefone celular</label>
                                        <input id="celular-input" type="text" value="{{$solicitante['nuTelefoneCelular']}}" class="form-control" name="nuTelefoneCelular">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_nuTelefoneComercial">Telefone comercial</label>
                                        <input id="tel-comercial-input" type="text" value="{{$solicitante['nuTelefoneComercial']}}" class="form-control" name="nuTelefoneComercial">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Endereço</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_sgEstado">CEP</label>
                                        <input id="cep-input" type="text" value="{{$solicitante['nuCep']}}" class="form-control" name="nuCep" onkeypress="consultarEnderecoViaCEP()">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="botao-cep" data-toggle="tooltip" data-placement="top" title="pesquisar" onclick="consultarEnderecoViaCEP()">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_deLogradouro">Logradouro</label>
                                        <input id="logradouro-input" type="text" value="{{$solicitante['deLogradouro']}}" class="form-control" name="deLogradouro">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_deComplemento">Complemento</label>
                                        <input id="complemento-input" type="text" value="{{$solicitante['deComplemento']}}" class="form-control" name="deComplemento">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_deSetor">Setor</label>
                                        <input id="setor-input" type="text" value="{{$solicitante['deSetor']}}" class="form-control" name="deSetor">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_nmCidade">Cidade</label>
                                        <input id="cidade-input" type="text" value="{{$solicitante['nmCidade']}}" class="form-control" name="nmCidade">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="form_control_sgEstado">Estado</label>
                                        <input id="estado-input" type="text" value="{{$solicitante['sgEstado']}}" class="form-control" name="sgEstado">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Arquivos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tableArquivos" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Arquivo</th>
                                        <th>Tipo</th>
                                        <th>Tamanho</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($solicitante['arquivos'] as $arquivo)
                                    <tr>
                                        <td>{{$arquivo['nmArquivo']}}</td>
                                        <td>{{$arquivo['deExtensaoArquivo']}}</td>
                                        <td>{{round($arquivo['nuTamanhoArquivo'] / 1024, 2)}} MB</td>
                                        <td><a href="{{base_url($arquivo['deCaminhoArquivo'])}}" target="_blank">Download</a></td>
                                    </tr>
                                    @endforeach
                                    </thead>
                                <tfoot>
                                    <tr>
                                        <th>Arquivo</th>
                                        <th>Tipo</th>
                                        <th>Tamanho</th>
                                        <th>Link</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <button id="botao-atualizar" name="btn_atualizar" type="submit" value="1" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Atualizar">
                <i class="fa-regular fa-floppy-disk"></i>
                Atualizar
            </button>
        </form>

        <!-- FIM div ROW -->

    </div>


    <script src="{{base_url('assets/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script src="{{base_url('application/modules/sfe/views/solicitante/home.js')}}" defer></script>
    <script src="{{base_url().'assets/plugins/vanilla-masker.min.js'}}"></script>
</body>

</html>