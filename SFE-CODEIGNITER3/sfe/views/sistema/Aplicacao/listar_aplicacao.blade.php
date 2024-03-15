<div class="row">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">Lista de Aplicações</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<div class="card-body">
				<p>
					{{ NavBarButton::cadastroAncoraLte($urlCadastrar) }}
				</p>

				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th><i class="fas fa fa-cog"></th>
							<th>Logotipo</th>
							<th>Título</th>
							<th>Sigla</th>
							<th>URL</th>
							<th>Situação</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($listagem as $item)
						<tr>
							<td>
								<hide>{{ $item->id }}</hide>
								{{ Button::build('', 'editar', base_url($urlEditar . $item->id), 'fa fa-pencil-alt')->setSmall()->setTooltip('Editar')->exibir() }}
								{{ Button::build('', 'alternar', base_url($urlAlternar . $item->id), 'fa fa-trash')->setSmall()->setTooltip('Visibilidade')->setStyleBySituacao($item)->exibir() }}
							</td>
							<td> <a href='{{ printUrl($item->url) }}'><img src="{{ printUrl($item->logotipo) }}" style="max-height: 128px;"><a> </td>
							<td> <a href='{{ printUrl($item->url) }}'>{{ $item->titulo }}<a> </td>
							<td> <a href='{{ printUrl($item->url) }}'>{{ $item->sigla }}<a> </td>
							<td> <a href='{{ printUrl($item->url) }}' target="_blank">{{ $item->url }}<a> </td>
							<td> {{ statusLabel($item->situacao) }} </td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th><i class="fas fa fa-cog"></th>
							<th>Logotipo</th>
							<th>Título</th>
							<th>Sigla</th>
							<th>URL</th>
							<th>Situação</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!--/.col (left) -->
</div>
