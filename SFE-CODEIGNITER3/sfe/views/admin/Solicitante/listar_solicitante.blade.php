<div class="row">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">Lista de Solicitantes</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<div class="card-body">
				<table id="dataTableListaSolicitantes" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nome/Razão Social</th>
							<th>CPF/CNPJ</th>
							<th>Celular</th>
							<th>E-mail</th>
							<th>Data Cadastro</th>
							<th>Opções</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($listagem as $item)
						<tr>

							<td> {{ $item->nmSolicitante }}</td>
							<td> {{ formatarCpfCnpj($item->nuCpfCnpj) }}</td>
							<td> {{ $item->nuTelefoneCelular }}</td>
							<td> {{ $item->deEnderecoEmail }}</td>
							<td> {{ formatarDataHoraPtBr($item->dtCadastro) }}</td>
							<td class="text-center">
								<hide>{{ $item->idSolicitante }}</hide>
								{{ Button::build('', 'visualizar', base_url($urlVisualizar . $item->idSolicitante), 'fa fa-eye')->setSmall()->setTooltip('Visualizar')->exibir() }}
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Nome/Razão Social</th>
							<th>CPF/CNPJ</th>
							<th>Celular</th>
							<th>E-mail</th>
							<th>Data Cadastro</th>
							<th>Opções</th>
						</tr>
					</tfoot>
				</table>
				<div class="container">
					<p class="text-center mt-5">{{ Button::build('Imprimir Relação de Inscritos', 'imprimir', base_url($urlImprimir), 'fa fa-print')->setSmall()->setTooltip('Imprimir')->exibir() }}</p>
				  </div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!--/.col (left) -->
</div>
