<div class="col-md-12">
	<!-- Profile Image -->
	<div class="card card-success card-outline">
		<div class="card-body box-profile" style="padding: 5px; padding-top: 10px">
			<div class="text-center">
				<img class="profile-user-img img-fluid img-circle" src="{{ getGravatarUrl(obterUsuarioLogado()->mail, 256) }}" alt="User profile picture">
			</div>
			<h3 class="profile-username text-center" style="margin-bottom: 2px">{{ obterUsuarioLogado()->givenName }}</h3>
			<p class="text-muted text-center" style="margin: 0px; margin-bottom: 1px">{{ obterUsuarioLogado()->mail }}</p>
			@foreach (obterUsuarioLogado()->memberof as $perfil)
			<p class="text-muted text-center" style="margin: 0px">{{ $perfil }}</p>
			@endforeach
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-12">
		<div class="card card-success">
			<div class="card-header">
				<h4 class="card-title">Selecione uma Aplicação</h4>
			</div>
			<div class="card-body">
				<div>
					<!-- Adicione o input de pesquisa -->
					<input type="text" id="searchInput" class="form-control mb-3" placeholder="Pesquisar por título ou sigla">
					<div class="filter-container p-0 row">
						@foreach ($listagem as $item)
						<div class="filtr-item col-sm-2" data-category="1" data-titulo="{{ $item->titulo }}" data-sigla="{{ $item->sigla }}">
							<a href="{{ printUrl($item->url) }}" data-toggle="lightbox" data-title="{{ $item->titulo }}">
								<h4 class='font-weight-light' style="text-align: center; color: #217027">{{ $item->titulo }}</h4>
								<img src="{{ printUrl($item->logotipo) }}" style="width: 300px !important; height: auto !important;" class="img-fluid mb-2" alt="{{ $item->titulo }}" />
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->
<script>
	// Função para remover acentos e diacríticos
	function removeAccents(str) {
		return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
	}

	// Função para filtrar os elementos com base no input de pesquisa
	function filterItems(searchTerm) {
		const normalizedSearchTerm = removeAccents(searchTerm.toLowerCase());

		const items = Array.from(document.querySelectorAll('.filtr-item'));

		items.forEach(item => {
			const normalizedTitulo = removeAccents(item.dataset.titulo.toLowerCase());
			const normalizedSigla = removeAccents(item.dataset.sigla.toLowerCase());
			const shouldDisplay = normalizedTitulo.includes(normalizedSearchTerm) || normalizedSigla.includes(normalizedSearchTerm);

			item.style.display = shouldDisplay ? 'block' : 'none';
		});
	}

	// Adicione um listener para o evento 'input' no input de pesquisa
	const searchInput = document.getElementById('searchInput');
	searchInput.addEventListener('input', function() {
		filterItems(this.value);
	});
</script>
