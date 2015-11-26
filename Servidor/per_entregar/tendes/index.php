<?php
session_start();

ob_start();

//si no existen las variables se declaran
if(empty($_SESSION['nombre'])) $_SESSION['nombre'] = '';
if(empty($_SESSION['zone_id'])) $_SESSION['zone_id'] = '';
if(empty($_SESSION['linees'])) $_SESSION['linees'] = '10';

//comprovamos si se ha enviado por post los datos, y si es asi los cogemos
if(isset($_POST['linees']))$_SESSION['linees'] = $_POST['linees'];
if(isset($_POST['nombre'])) $_SESSION['nombre'] = $_POST['nombre'];

if(isset($_POST['zone_id'])){
    //esta opcion es para cuando hacemos reset en el formulario envia 0, asi que la variable de sesion se ha de poner a 0
    if($_POST['zone_id']=='0') $_SESSION['zone_id']='';
    else $_SESSION['zone_id'] = $_POST['zone_id'];
}



include('Tenda.php'); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="./css/index.css">
	<link rel="stylesheet" href="./css/form.css">
	<link rel="stylesheet" href="./css/tabla.css">
	<link rel="stylesheet" href="./css/paginador.css">
	<script type="text/javascript" src="index.js"></script>
    <script type="text/javascript" src="./fancybox/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen">
    <script>
        $(document).ready(function() {
            $("a.fancybox").fancybox();
        });
    </script>
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

		if($action == 'add' || $action == 'edit' || $action == 'update' || $action == 'delete'){
			unset($_SESSION['nombre']);
			unset($_SESSION['zone_id']);
		}

        if($action == 'add'){

            $tenda->fetch($id);
            $tenda->edit_add(2);
        }
		elseif($action == 'edit'){

			$tenda->fetch($id);
			$tenda->edit_add();

		}elseif($action == 'update'){

			$tenda->fetch($id);
			$name = $_POST['name'];
			$zone_id = $_POST['zone_id'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];

			$tenda->update($name, $zone_id, $address, $city, $phone, $email);
			if(isset($_POST['del_photo'])){
				$tenda->delete_image();
			}
			if($_FILES['photo']['size']!=0){
				$tenda->upload_file($_FILES);
			}

			$tenda->show();
		}elseif($action == 'added'){

			$name = $_POST['name'];
			$zone_id = $_POST['zone_id'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];

			$tenda->add($name, $zone_id, $address, $city, $phone, $email);

			if($_FILES['photo']['size']!=0){
				$tenda->upload_file($_FILES);
			}

			$tenda->show();
		} elseif($action == 'delete'){
			$tenda->fetch($id);
			$tenda->delete();
			header('Location: ./index.php');
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

            print "<div id='add_shop' class='linees'>
					<a href='".$_SERVER['PHP_SELF']."?action=add'>
						<span>Añadir una nueva tienda</span>
						<img src='./img/16x16/add_item.png'>
					</a>
				</div>";

			$tenda->show_all_store($inicio, $_SESSION['linees'], $pagina, $orderby, $order,$_SESSION['nombre'],
                $_SESSION['zone_id']);
		}


		?>
	</article>
</section>

</body>
</html>
<?php
ob_end_flush();
?>