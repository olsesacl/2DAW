<?php include('Tenda.php'); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="index.css">
</head>
<body>

<section>
<header></header>
	<article>
		<?php
		$tenda = new Tenda();

		$pagina = (isset($_GET['pag']))? $_GET['pag'] : 1;
		$tamany = !empty($_GET['tamany']) ? $_GET['tamany'] : 15;
		$inicio = ($pagina-1) * $tamany;

		$tenda->show_all_store($inicio, $tamany, $pagina);
		?>
	</article>
</section>

</body>
</html>
