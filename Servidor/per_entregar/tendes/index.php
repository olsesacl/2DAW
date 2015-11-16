<?php
session_start();
if(!empty($_POST['linees'])){
	$_SESSION['linees'] = $_POST['linees'];
} elseif(empty($_SESSION['linees'])) {
	$_SESSION['linees'] = 20;
}
include('Tenda.php'); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="index.css">
</head>
<body>

<section>
<header>
</header>
	<article>
		<?php
		$tenda = new Tenda();

		$pagina = (isset($_GET['pag']))? $_GET['pag'] : 1;
		$inicio = ($pagina-1) * $_SESSION['linees'];

		//Comprovem quin valor te action, com pot vindre per metodo post i per get comprobe de les dos formes
		$action = !empty($_GET['action'])?$_GET['action']:'';
		if($action==''){
			$action = !empty($_POST['action'])?$_POST['action']:'';
		}
		//Comprovem quin valor te id, com pot vindre per metodo post i per get comprobe de les dos formes
		$id = !empty($_GET['id'])?$_GET['id']:'';
		if($id==''){
			$id = !empty($_POST['id'])?$_POST['id']:'';
		}

		if($action == 'edit'){
			$tenda->fetch($id);
			$tenda->editar();

		}elseif($action == 'update'){

			$tenda->fetch($id);
			$name = $_POST['name'];
			$zone_id = $_POST['zone_id'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];

			$tenda->update($name, $zone_id, $address, $city, $phone, $email);
			$tenda->show();
		}
		else {
			$order = '';
			$orderby = '';

			if(!empty($_GET['order'])){
				$order = $_GET['order'];
			} else {
				$order = 'ASC';
			}

			if(!empty($_GET['orderby'])){
				$orderby = $_GET['orderby'];
			} else {
				$orderby = 'Nombre';
			}
			Tenda::select_number_linees();
			Tenda::buscador();
			$tenda->show_all_store($inicio, $_SESSION['linees'], $pagina, $orderby, $order);
		}


		?>
	</article>
</section>

</body>
</html>
