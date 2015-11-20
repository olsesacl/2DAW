<?php
session_start();
$_SESSION['linees'] = !empty($_POST['linees'])?$_POST['linees']:$_SESSION['linees'];

//si no existen las variables se declaran
if(empty($_SESSION['nombre'])) $_SESSION['nombre'] = '';
if(empty($_SESSION['zone_id'])) $_SESSION['zone_id'] = '';

//comprovamos si se ha enviado por post los datos, y si es asi los cogemos
if(isset($_POST['nombre'])) $_SESSION['nombre'] = $_POST['nombre'];
if(isset($_POST['zone_id'])) $_SESSION['zone_id'] = $_POST['zone_id'];


include('Tenda.php'); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="./css/index.css">
	<link rel="stylesheet" href="./css/form.css">
	<link rel="stylesheet" href="./css/tabla.css">
	<link rel="stylesheet" href="./css/paginador.css">
	<script type="text/javascript" src="index.js"></script>
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
            unset($_SESSION['nombre']);
            unset($_SESSION['zone_id']);
			$tenda->fetch($id);
			$tenda->editar();

		}elseif($action == 'update'){
            unset($_SESSION['nombre']);
            unset($_SESSION['zone_id']);

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

			Tenda::buscador($_SESSION['nombre'], $_SESSION['zone_id']);
			$tenda->show_all_store($inicio, $_SESSION['linees'], $pagina, $orderby, $order,$_SESSION['nombre'],
                $_SESSION['zone_id']);
		}


		?>
	</article>
</section>

</body>
</html>
