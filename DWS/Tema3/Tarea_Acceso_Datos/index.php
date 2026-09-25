<?php

$host = '127.0.0.1';
$port = 3306;
$database = 'sakila';
$username = 'root';
$password = '1234';

mysqli_report(MYSQLI_REPORT_OFF);
$connection = @new mysqli($host, $username, $password, $database, $port);

$error = '';
$totalAlquileres = 0;

if ($connection->connect_error) {
	$error = 'No se pudo conectar con MySQL: ' . $connection->connect_error;
} else {
	$connection->set_charset('utf8mb4');
	$connection->query("CALL total_alquileres(@total)");
	$result = $connection->query("SELECT @total AS total");

	if ($result) {
		$row = $result->fetch_assoc();
		$totalAlquileres = (int) $row['total'];
		$result->free();
	} else {
		$error = 'No se pudo consultar el total de alquileres: ' . $connection->error;
	}

	$connection->close();
}

function escapeHtml($value): string
{
	return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Catálogo Sakila | Film</title>
	<style>
		:root {
			--background: #f3f6f8;
			--surface: #ffffff;
			--ink: #17212b;
			--muted: #6b7785;
			--accent: #087f8c;
			--accent-dark: #075b65;
			--border: #dce4e8;
			--shadow: 0 12px 30px rgba(23, 33, 43, 0.08);
		}

		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			background: var(--background);
			color: var(--ink);
			font-family: "Segoe UI", Tahoma, sans-serif;
		}

		.dashboard {
			width: min(1180px, calc(100% - 32px));
			margin: 0 auto;
			padding: 42px 0 56px;
		}

		header {
			display: flex;
			align-items: end;
			justify-content: space-between;
			gap: 24px;
			margin-bottom: 30px;
		}

		h1 {
			margin: 0 0 8px;
			font-size: clamp(2rem, 4vw, 3.2rem);
			letter-spacing: -0.04em;
		}

		.subtitle {
			margin: 0;
			color: var(--muted);
			font-size: 1rem;
		}

		.connection {
			padding: 10px 14px;
			border: 1px solid #b8dfe3;
			border-radius: 999px;
			background: #e7f6f7;
			color: var(--accent-dark);
			font-size: 0.85rem;
			font-weight: 600;
			white-space: nowrap;
		}

		.metrics {
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			gap: 18px;
			margin-bottom: 26px;
		}

		.metric,
		.table-panel,
		.error {
			border: 1px solid var(--border);
			border-radius: 12px;
			background: var(--surface);
			box-shadow: var(--shadow);
		}

		.metric {
			padding: 22px 24px;
		}

		.metric-label {
			display: block;
			margin-bottom: 10px;
			color: var(--muted);
			font-size: 0.82rem;
			font-weight: 700;
			letter-spacing: 0.08em;
			text-transform: uppercase;
		}

		.metric-value {
			font-size: 2rem;
			font-weight: 700;
		}

		.empty,
		.error {
			padding: 24px;
		}

		.error {
			border-color: #f2c5c5;
			background: #fff5f5;
			color: #9a2f2f;
		}

		@media (max-width: 700px) {
			.dashboard {
				width: min(100% - 20px, 1180px);
				padding-top: 24px;
			}

			header {
				align-items: start;
				flex-direction: column;
			}

			.connection {
				white-space: normal;
			}

			.metrics {
				grid-template-columns: 1fr;
			}
		}
	</style>
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
			<div class="error" role="alert"><?= escapeHtml($error) ?></div>
		<?php else: ?>
			<section class="metrics" aria-label="Resumen del catálogo">
				<article class="metric">
					<span class="metric-label">Total de alquileres</span>
					<span class="metric-value"><?= number_format($totalAlquileres) ?></span>
				</article>
			</section>
		<?php endif; ?>
	</main>
</body>
</html>