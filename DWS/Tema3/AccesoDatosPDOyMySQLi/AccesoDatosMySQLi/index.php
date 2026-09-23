<?php

require_once __DIR__ . '/AccesoDatos.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Catálogo Sakila | Film</title>
	<link rel="stylesheet" href="style/estilos.css">
</head>
<body>
	<main class="dashboard">
		<header>
			<div>
				<h1>Catálogo de películas</h1>
				<p class="subtitle">Consulta de la tabla <strong>film</strong> de la base de datos Sakila</p>
			</div>
			<div class="connection">MySQL · localhost:3306 · sakila</div>
		</header>

		<?php if ($error !== ''): ?>
			<div class="error" role="alert"><?= $error ?></div>
		<?php else: ?>
			<section class="metrics" aria-label="Resumen del catálogo">
				<article class="metric">
					<span class="metric-label">Películas</span>
					<span class="metric-value"><?= number_format($totalFilms) ?></span>
				</article>
				<article class="metric">
					<span class="metric-label">Valoración media</span>
					<span class="metric-value"><?= number_format((float) $averageRating, 1) ?></span>
				</article>
				<article class="metric">
					<span class="metric-label">Duración media</span>
					<span class="metric-value"><?= number_format((float) $averageLength, 0) ?> min</span>
				</article>
				<article class="metric">
					<span class="metric-label">Total de alquileres</span>
					<span class="metric-value"><?= number_format($totalAlquileres) ?></span>
				</article>

			</section>

			
		<?php endif; ?>
	</main>
</body>
</html>