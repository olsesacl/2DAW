<?php
include('Conexion.php');

class Tenda
{
	private $id;
	private $name;
	private	$zone_name;
	private $zone_id;
	private $address;
	private $city;
	private $phone;
	private $email;

	function __construct($id=''){
		$this->conex = conexion();
		if(!empty($id))$this->fetch($id);
	}

	/**
	 * @param $id
	 */
	function fetch($id){

		$sql = "SELECT store_id, store_name, area_store_name, store_address, store_city, store_phone, store_email, area_store_id
 				FROM cg_store s, cg_area_store astore
 				WHERE store_area_id = area_store_id AND store_id = ?";

		$stmt = $this->conex->prepare($sql);
		$stmt->execute(array($id));
		$result=$stmt->fetch();

		$this->id = $result['store_id'];
		$this->name = $result['store_name'];
		$this->zone_name = $result['area_store_name'];
		$this->zone_id = $result['area_store_id'];
		$this->address = $result['store_address'];
		$this->city = $result['store_city'];
		$this->phone = $result['store_phone'];
		$this->email = $result['store_email'];
	}

	private function clear(){
		$this->id = null;
		$this->name = null;
		$this->zone_name = null;
		$this->address = null;
		$this->city = null;
		$this->phone = null;
		$this->email = null;
	}

    /**
     * @param string $orderby
     * @param string $order
     * @param string $nombre
     * @param int|string $zona
     * @return array
     * @internal param string $inici
     * @internal param string $tamany
     */
	private function fetch_all_store($orderby = 'Nombre', $order = 'ASC', $nombre='', $zona=''){

		$sql = "SELECT store_id, store_name, area_store_name, store_address, store_city, store_phone, store_email
 				FROM cg_store s, cg_area_store astore
 				WHERE store_area_id = area_store_id";

		if($nombre!=''){
			$sql.=" AND store_name LIKE '%".$nombre."%'";
		}
		if($zona!=''){
			$sql.= " AND store_area_id=".$zona;
		}

		if($orderby!=''){
			switch($orderby){
				case 'Nombre':
					$orderby = 'store_name';
					break;
				case 'Zona':
					$orderby = 'area_store_name';
					break;
				case 'Direccion':
					$orderby = 'store_address';
					break;
				case 'Ciudad':
					$orderby = 'store_city';
					break;
				case 'Telefono':
					$orderby = 'store_phone';
					break;
				case 'Email':
					$orderby = 'store_email';
					break;
			}

			if(empty($order)) $order = 'ASC';

			$sql .= " ORDER BY ".$orderby." ".$order;

		}

		$stmt = $this->conex->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$tendes = array();
		$temp = new Tenda();

		foreach($result as $tenda){

			$temp->clear();

			$temp->id = $tenda['store_id'];
			$temp->name = $tenda['store_name'];
			$temp->zone_name = $tenda['area_store_name'];
			$temp->address = $tenda['store_address'];
			$temp->city = $tenda['store_city'];
			$temp->phone = $tenda['store_phone'];
			$temp->email = $tenda['store_email'];

			$tendes[] = clone $temp;
		}

		return $tendes;
	}

	/**
	 * @param string $inici
	 * @param string $tamany
	 * @param string $activa
	 * @param string $orderby
	 * @param string $order
	 * @param string $nombre
	 * @param string $zona
	 */
	function show_all_store($inici='0', $tamany = '10', $activa = '1', $orderby='Nombre', $order = 'ASC', $nombre='',
                            $zona=''){

		$this->cabecera(null, 1 , $orderby, $order);

		$tendes = new Tenda();
		$tendes = $tendes->fetch_all_store($orderby, $order, $nombre, $zona);

		print "<tbody>";

		for($i =0; $i < $tamany; $i++){
            if( ($i + $inici) < count($tendes))
			    $tendes[($i + $inici)]->tr_tienda(1);
		}
		print "</tbody>";
		print "</table>";
		print "<div id='paginador' class='pagination'>";

        $paginas = ceil(count($tendes) / $tamany);

		print "<footer>".$this->paginador($paginas, $activa)."</footer>";
		print "</div>";
	}

	/**
	 * @param int $actions
	 */
	private function tr_tienda($actions = 0){

		print "<tr>
					<td>".$this->name."</td>
					<td>".$this->zone_name."</td>
					<td>".$this->address."</td>
					<td>".$this->city."</td>
					<td>".$this->phone."</td>
					<td>".$this->email."</td>";

		if($actions ==1){
			print "<td>
						<a href='./index.php?action=edit&id=".$this->id."'><img alt='Editar' title='Editar' src='./img/32x32/edit_item.png'></a>
						<a href='./index.php?action=delete&id=".$this->id."'><img alt='Eliminar' title='Eliminar' src='./img/32x32/delete_item.png'></a>

					</td>";
		}

		print "</tr>";

	}


	/**
	 * @param string $actions
	 * @param string $links
	 * @param string $orderby
	 * @param string $order
	 */
	private function cabecera($actions = '', $links='', $orderby='Nombre', $order = 'ASC'){
		print "<table id='tiendas' border='1'>
				<thead>
				<tr>";

		$campos = array("Nombre", "Zona", "Direccion", "Ciudad", "Telefono", "Email");
		foreach($campos as $campo){
			print "<th>";
			if($links==''){
				print $campo;
			} else {
				print "<a href='./index.php?orderby=".$campo;


				if($order=='ASC' && $orderby == $campo) print "&order=DESC";
				else{ print "&order=ASC";}

				print "'><span>".$campo."</span>";


				if($orderby == $campo){
					if($order=='ASC'){
						print "<img src='./img/16x16/down_arrow.png'>";
					} else {
						print "<img src='./img/16x16/up_arrow.png'>";
					}
				} else {
					print "<img src='./img/16x16/down_arrow.png'>";
					print "<img src='./img/16x16/up_arrow.png'>";
				}

				print "</a>";

			}

			print "</th>";

		}

		if($actions == ''){
			print "<th>Acciones</th>";
		}
		print "</tr>
				</thead>";

	}

    /**
     * @param $paginas
     * @param $activa
     * @internal param $tamany
     */
	private function paginador($paginas, $activa){

		if($paginas > 0)print "<a class='page' href='index.php?pag=1'>Primera</a>";

		for ($i = 1; $i <= $paginas; $i++){
			print "<a class='page";
			if($i == $activa) print " active";
			print "' href='index.php?pag=$i'>$i</a>";
		}

        if($paginas > 0)print "<a class='page' href='index.php?pag=$paginas'>Ultima</a>";

	}

    /**
     * @param int $action if is edit $action = 1 if is add $action = 2
     */
    function edit_add($action=1){
		print "<form action='./index.php' method='post' enctype='application/x-www-form-urlencoded' id='form'>";
		$this->cabecera(1);

		print "<tbody>";
		print "<tr>

		".$this->input_edit('action', 'update', 'hidden')."
		".$this->input_edit('id', $this->id, 'hidden')."
		<td>".$this->input_edit('name', $this->name)."</td>
		<td>".$this->select_zone($this->zone_id)."</td>
		<td>".$this->input_edit('address', $this->address)."</td>
		<td>".$this->select_city()."</td>
		<td>".$this->input_edit('phone', $this->phone)."</td>
		<td>".$this->input_edit('email', $this->email)."</td>
		</tr></tbody></table>";

        print "</form>";
		print "<div class='submits'><button type='submit' value='Enviar'  form='form'>Enviar</button>
        <a href='./index.php'><button>Cancelar</button></a></div>";

	}
	private function input_edit($name, $value, $type='text'){
		return "<input type='".$type."' name='".$name."' value='".$value."'>";
	}

	/**
	 * Generate select for select zone
	 * @param $zone_id
	 *
	 * @return string
	 */
	static function select_zone($zone_id){
		$sql = 'SELECT area_store_id AS "id", area_store_name AS "name" FROM cg_area_store';
		$con = conexion();
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$data = "<select name='zone_id' id='zone_id'>";
		$data.= "<option value='0' style='color:#999'>Zona</option>";

		foreach($result as $zona){
			$data .= "<option value='".$zona['id']."'";

			if($zone_id == $zona['id']){
				$data .= " selected='selected'";
			}

			$data .= ">".$zona['name']."</option>";
		}

		$data .= "</select>";

		return $data;
	}

	private function select_city(){

		$city = array('GANDIA', 'GRAO DE GANDIA', 'PLAYA DE GANDIA');

		$data = "<select name='city'>";

		for($i = 0 ; $i < count($city); $i++){

			$data .= "<option value='".$city[$i]."'";

			if(!strcasecmp($this->city,$city[$i])){
				$data .= " selected='selected'";
			}

			$data .= ">".$city[$i]."</option>";
		}

		$data .= "</select>";
		return $data;
	}

	/**
	 * @param $name
	 * @param $zone_id
	 * @param $address
	 * @param $city
	 * @param $phone
	 * @param $email
	 */
	function update($name, $zone_id, $address, $city, $phone, $email){

		$sql = "UPDATE cg_store SET";
		$sql.= " store_name='".$name."',";
		$sql.= " store_area_id = '".$zone_id."',";
		$sql.= " store_address = '".$address."',";
		$sql.= " store_city = '".$city."',";
		$sql.= " store_phone = '".$phone."',";
		$sql.= " store_email = '".$email."'";

		$sql.= " WHERE store_id =".$this->id;

		try{
		$stmt = $this->conex->prepare($sql);
		$stmt->execute();

		}catch (Exception $error){
			print $error->getMessage();
		}
		$this->fetch($this->id);
	}

	function show(){
		$this->cabecera(1);

		print "<tbody>";
		$this->tr_tienda();
		print "</tbody>";
		print "</table>";
		print "<div class='submits'><a href='./index.php'><button type='button' value='Mostrar Todas'>Mostrar Todas</button></a></div>";
	}

	/**
	 *Show a form for select line for page
	 */
	static function select_number_linees(){
		print "<form class='linees' action='./index.php' method='post' enctype='application/x-www-form-urlencoded'>
		Numero de tiendas por pagina: <select name = 'linees'>";

		$opciones = array(10, 20, 50, 75, 100);

		foreach($opciones as $opcion){
			print "<option value='".$opcion."'";
			if($opcion == $_SESSION['linees']){
				print " selected='selected'";
			}
			print ">".$opcion."</option>";
		}

		print "</select>
				<button type='submit'>Seleccionar</button>
			</form>";
	}

	/**
	 * @param string $nombre
	 * @param string $zona
	 */
	static function buscador($nombre='', $zona=''){
		print "<div class='form-style-8'>";
		print "<h2>Buscador<div id='mostrar_form'>";
        if(!empty($nombre) || !empty($zona)){
            print "<img src='img/16x16/remove_item.png'> </div>";
        } else {
            print "<img src='img/16x16/add_item.png'> </div>";
        }

        print "</h2>";
		print "<form id='buscador' method='post' action='".$_SERVER['PHP_SELF']."'";
        if(!empty($nombre) || !empty($zona)) print ">";
        else  print " style='display:none'>";
		print "<input type='text' name='nombre' id='nombre' value='".$nombre."' placeholder='Nombre'>";
		print Tenda::select_zone($zona);
		print "<button type='submit'>Buscar</button>";
		print "<button type='reset'>Reset</button>";
		print "</form>";
		print "</div>";

	}


}