<div class="row">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">Cadastro de Aplicações</h3>
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

				{{ InputText::build('Título', 'titulo') }}
				{{ InputText::build('Sigla', 'sigla') }}
				{{ InputText::build('URL', 'url') }}
				{{ InputText::build('Logotipo (URL)', 'logotipo') }}
				{{ SelectOption::build('Acesso', 'contexto_aplicacao_id', [1 => 'Interno', 2 => 'Externo']) }}

				{{ NavBarButton::cadastroLte($urlListagem) }}
				{{ form_close() }}
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!--/.col (left) -->
</div>
