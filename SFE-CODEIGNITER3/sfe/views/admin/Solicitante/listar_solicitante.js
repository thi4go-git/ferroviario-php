document.addEventListener('DOMContentLoaded', function () {

	$('#dataTableListaCandidatos').DataTable({
		language: {
			url: '/assets/metronic_v3.6.1/theme/assets/global/plugins/datatables/plugins/i18n/pt-BR.json'
		},
		searching: true,
		lengthChange: true,
		info: true,
		page: 25
	})

})


