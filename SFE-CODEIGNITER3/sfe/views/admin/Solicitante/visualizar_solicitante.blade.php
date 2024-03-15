<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">Informações do solicitante</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<div class="card-body">
				{{ form_open_multipart() }}
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_nmSolicitante">{{ (strlen($solicitante['nuCpfCnpj']) == 11 ? 'Nome': 'Razão social') }}</label>
							<input type="text" value="{{$solicitante['nmSolicitante']}}" class="form-control" name="nmSolicitante" readonly="readonly">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_nuCpfCnpj">CPF/CNPJ</label>
							<input type="text" value="{{formatarCpfCnpj($solicitante['nuCpfCnpj'])}}" class="form-control" name="nuCpfCnpj" readonly="readonly">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_nuTelefoneCelular">Telefone celular</label>
							<input type="text" value="{{$solicitante['nuTelefoneCelular']}}" class="form-control" name="nuTelefoneCelular" readonly="readonly">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_nuTelefoneComercial">Telefone comercial</label>
							<input type="text" value="{{$solicitante['nuTelefoneComercial']}}" class="form-control" name="nuTelefoneComercial" readonly="readonly">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_deEnderecoEmail">Email</label>
							<input type="text" value="{{$solicitante['deEnderecoEmail']}}" class="form-control" name="deEnderecoEmail" readonly="readonly">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_dtCadastro">Data do cadastro</label>
							<input type="text" value="{{formatarDataHoraPtBr($solicitante['dtCadastro'])}}" class="form-control" name="dtCadastro" readonly="readonly">
						</div>
					</div>
				</div>
				
				{{ form_close() }}
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
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
			<!-- /.card-header -->
			<!-- form start -->
			<div class="card-body">
				{{ form_open_multipart() }}
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label" for="form_control_deLogradouro">Logradouro</label>
							<input type="text" value="{{$solicitante['deLogradouro']}}" class="form-control" name="deLogradouro" readonly="readonly">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_deComplemento">Complemento</label>
							<input type="text" value="{{$solicitante['deComplemento']}}" class="form-control" name="deComplemento" readonly="readonly">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_deSetor">Setor</label>
							<input type="text" value="{{$solicitante['deSetor']}}" class="form-control" name="deSetor" readonly="readonly">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_nmCidade">Cidade</label>
							<input type="text" value="{{$solicitante['nmCidade']}}" class="form-control" name="nmCidade" readonly="readonly">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="form_control_sgEstado">Estado</label>
							<input type="text" value="{{$solicitante['sgEstado']}}" class="form-control" name="sgEstado" readonly="readonly">
						</div>
					</div>
				</div>
				{{ form_close() }}
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
				{{ form_open_multipart() }}
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
				<a href="{{base_url($urlListagem)}}" title="Voltar">
					<button name="btn_voltar" type="button" id="btn_voltar" value="1" class="btn-outline-secondary btn" data-toggle="tooltip" data-placement="top" title="Voltar">
						<i class="fas fa-arrow-alt-circle-left"></i> 
						Voltar
					</button>
				</a>
				{{ form_close() }}
			</div>
		</div>
	</div>
</div>
