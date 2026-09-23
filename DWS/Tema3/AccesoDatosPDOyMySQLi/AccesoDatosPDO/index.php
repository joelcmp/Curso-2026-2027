<?php

require_once __DIR__ . '/AccesoDatos.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Total de alquileres | Sakila</title>
	<link rel="stylesheet" href="style/estilos.css">
</head>
<body>
	<main class="dashboard">
		<header>
			<div>
				<h1>Total de alquileres</h1>
				<p class="subtitle">Cantidad devuelta por el procedimiento almacenado <strong>TotalAlquileres</strong></p>
			</div>
			<div class="connection">MySQL · localhost:3306 · sakila</div>
		</header>

		<?php if ($error !== ''): ?>
			<div class="error" role="alert"><?= htmlspecialchars((string) $error, ENT_QUOTES, 'UTF-8') ?></div>
		<?php else: ?>
			<section class="metrics" aria-label="Total de alquileres">
				<article class="metric">
					<span class="metric-label">Alquileres</span>
					<span class="metric-value"><?= number_format($totalAlquileres) ?></span>
				</article>
			</section>
		<?php endif; ?>
	</main>
</body>
</html>