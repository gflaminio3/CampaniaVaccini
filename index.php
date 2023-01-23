<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>InfoVaccini - Campania</title>

	<link href="css/app.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>

<body class="bg-secondary">
	<main class="content">
		<div class="container-fluid p-0">
			<div class="container text-center">
				<h1 class="mb-3 text-center text-white"><strong>InfoVaccini - Campania</strong></h1>
				<p class="text-center text-white">Progetto Open Source creato a scopo didattico, illustrativo e per allenamento personale. Tutte le fonti dei dati sono reperibili <a href="https://github.com/italia/covid19-opendata-vaccini" class="text-danger">a questo indirizzo</a></p>
				<a href="api.php" class="btn btn-success mb-3">Aggiorna API</a>
			</div>	
			
			<div class="row">
				<div class="col-6 col-lg-6 col-xxl-6 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0">Tabella Consegne Dosi</h5>
						</div>
						<div class="container dataTables_wrapper dt-bootstrap4 no-footer">
							<table class="table table-borderless my-o mb-0 text-center" id="table2">
								<thead>
									<tr>
										<th scope="col">Data di Consegna</th>
										<th scope="col">Nome Del Fornitore</th>
										<th scope="col">Numero di Pezzi</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-6 col-xxl-6 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0">Tabella Centri ASL</h5>
						</div>
						<div class="container dataTables_wrapper dt-bootstrap4 no-footer">
							<table class="table table-borderless my-o mb-0 text-center" id="hospitals">
								<thead>
									<tr>
										<th scope="col">Comune</th>
										<th scope="col">Nome del Luogo</th>
										<th scope="col">Sito Web</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-6 col-xxl-6 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0">Tabella Vaccinazioni Giornaliere IN ITALIA</h5>
						</div>
						<div class="container dataTables_wrapper dt-bootstrap4 no-footer">
							<table class="table table-borderless my-o mb-0 text-center" id="vaxtoday">
								<thead>
									<tr>
										<th scope="col">Fascia</th>
										<th scope="col">Maschi</th>
										<th scope="col">Femmine</th>
										<th scope="col">Prime Dosi</th>
										<th scope="col">Seconde Dosi</th>
										<th scope="col">Terze Dosi</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-6 col-xxl-6 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0">Tabella della Platea di Cittadini Eleggibili alla Vaccinazione</h5>
						</div>
						<div class="container dataTables_wrapper dt-bootstrap4 no-footer">
							<table class="table table-borderless my-o mb-0 text-center" id="table">
								<thead>
									<tr>
										<th scope="col">Fascia Età</th>
										<th scope="col">Numero di Eleggibili</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer class="footer">
		<div class="container-fluid">
			<div class="row text-muted">
				<div class="col-6 text-start">
					<p class="mb-0">
						<a href="" target="_blank" class="text-muted"><strong>InfoVaccini Open</strong></a> ©
					</p>
				</div>
				<div class="col-6 text-end">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a class="text-muted">Creato da Giuseppe Flaminio</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="js/app.js"></script>
	<script src="js/datatables.js"></script>

	<script>
		$(document).ready(function() {
			$('#table').DataTable({
				"language": {
					"url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
				},

				"ajax": {
					"url": "data/notVaccinated.json",
					"dataSrc": ""
				},

				"columns": [{
						"data": "fascia"
					},
					{
						"data": "platea"
					}
				]
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#table2').DataTable({
				"language": {
					"url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
				},

				"ajax": {
					"url": "data/dailyDelivered.json",
					"dataSrc": ""
				},

				"columns": [{
						"data": "data_consegna"
					},
					{
						"data": "fornitore"
					},
					{
						"data": "dosi"
					}
				],

				"order": [
					[0, "desc"]
				]
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#hospitals').DataTable({
				"language": {
					"url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
				},

				"ajax": {
					"url": "data/availableHospitals.json",
					"dataSrc": ""
				},

				"columns": [{
						"data": "comune"
					},
					{
						"data": "luogo"
					},
					{
						"data": "link"
					}
				],

				"order": [
					[0, "desc"]
				]
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#vaxtoday').DataTable({
				"language": {
					"url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
				},

				"ajax": {
					"url": "data/todayStats.json",
					"dataSrc": ""
				},

				"columns": [{
						"data": "fascia"
					},
					{
						"data": "maschi"
					},
					{
						"data": "femmine"
					},
					{
						"data": "prime_dosi"
					},
					{
						"data": "seconda_dose"
					},
					{
						"data": "terza_dose"
					},
				]
			});
		});
	</script>
</body>

</html>