<div class="row">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">Editar Item de Menu</h3>
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

				{{ InputText::build('Título', 'titulo', $item->titulo) }}
				{{ InputText::build('Ícone', 'icone', $item->icone)->setNonRequired() }}
				{{ InputText::build('Url', 'url', $item->url) }}

				{{ SelectBootstrap::build('Aplicação', 'administracao_aplicacao_id', [], $item->administracao_aplicacao_id)->setData($listagem_aplicacaoes, ['value' => 'id', 'label' => ['titulo', 'sigla']]) }}
				{{ SelectBootstrap::build('Filho de', 'administracao_menuitem_id', [], $item->administracao_menuitem_id)->setData($listagem_menuitens, ['value' => 'id', 'label' => ['administracao_aplicacao_titulo', 'titulo']])->setNonRequired() }}

				{{ SelectOption::build('Situação', 'situacao', Constantes::SITUACOES, $item->situacao) }}

				{{ NavBarButton::editarLte($urlListagem) }}
				{{ form_close() }}
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!--/.col (left) -->
</div>
