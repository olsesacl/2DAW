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
	 * @param string $inici
	 * @param string $tamany
	 *
	 * @return array
	 */
	private function fetch_all_store($inici='', $tamany = ''){

		$sql = "SELECT store_id, store_name, area_store_name, store_address, store_city, store_phone, store_email
 				FROM cg_store s, cg_area_store astore
 				WHERE store_area_id = area_store_id";
		if(!empty($tamany)){
			$inici = $inici=='' ? 0:$inici;

			$sql .=" LIMIT ".$inici.",".$tamany;
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
	 */
	function show_all_store($inici='0', $tamany = '15', $activa = '1'){

	print "<form class='linees' action=\"./index.php\" method=\"post\" enctype=\"application/x-www-form-urlencoded\">
		Numero de tiendas por pagina: <select name = \"linees\">";

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
		$this->cabecera();

		$tendes = new Tenda();
		$tendes = $tendes->fetch_all_store($inici, $tamany);

		print "<tbody>";
		foreach($tendes as $tenda){
			$this->tr_tienda($tenda, 1);
		}
		print "</tbody>";
		print "</table>";
		print "<div id='paginador' class='pagination'>";
		print "<footer>".$this->paginador($tamany, $activa)."</footer>";
		print "</div>";
	}

	/**
	 * @param object|string $object	Se le pasa el objeto a crear la linea tr de la tabla, si no se le envia coge $this
	 * @param int|void           $actions	es para seleccionar si se quiere un td con acciones como modificar o eliminar
	 */
	function tr_tienda($object='', $actions = 0){
		if($object==''){
			$tenda = $this;
		} else {
			$tenda = $object;
		}
		print "<tr>
					<td>".$tenda->name."</td>
					<td>".$tenda->zone_name."</td>
					<td>".$tenda->address."</td>
					<td>".$tenda->city."</td>
					<td>".$tenda->phone."</td>
					<td>".$tenda->email."</td>";

		if($actions ==1){
			print "<td>
						<a href='./index.php?action=edit&id=".$tenda->id."'><img alt='Editar' title='Editar' src='./img/32x32/edit_item.png'></a>
						<a href='./index.php?action=delete&id=".$tenda->id."'><img alt='Eliminar' title='Eliminar' src='./img/32x32/delete_item.png'></a>

					</td>";
		}

		print "</tr>";

	}


	/**
	 * @param string $id use any number for no show actions
	 */
	private function cabecera($id = ''){
		print "<table id='tiendas' border='1'>
				<thead>
				<tr>
					<th>Nombre</th>
					<th>Zona</th>
					<th>Dirección</th>
					<th>Ciudad</th>
					<th>Telefono</th>
					<th>Email</th>";
		if($id == ''){
			print "<th>Acciones</th>";
		}
		print "</tr>
				</thead>";

	}

	/**
	 * @param $tamany
	 */
	private function paginador($tamany, $activa){

		$sql = "SELECT COUNT(*) as total FROM cg_store";
		$stmt = $this->conex->prepare($sql);
		$stmt->execute();
		$total=$stmt->fetch();
		$total = $total['total'];

		$paginas = ceil($total / $tamany);

		print "<a class='page' href='index.php?pag=1'>Primera</a>";

		for ($i = 1; $i <= $paginas; $i++){
			print "<a class='page";
			if($i == $activa) print " active";
			print "' href='index.php?pag=$i'>$i</a>";
		}

		print "<a class='page' href='index.php?pag=$paginas'>Ultima</a>";

	}

	function editar(){
		print "<form action='./index.php' method='post' enctype='application/x-www-form-urlencoded'>";
		$this->cabecera(1);

		print "<tbody>";
		print "<tr>

		".$this->input_edit('action', 'update', 'hidden')."
		".$this->input_edit('id', $this->id, 'hidden')."
		<td>".$this->input_edit('name', $this->name)."</td>
		<td>".$this->select_zone()."</td>
		<td>".$this->input_edit('address', $this->address)."</td>
		<td>".$this->select_city()."</td>
		<td>".$this->input_edit('phone', $this->phone)."</td>
		<td>".$this->input_edit('email', $this->email)."</td>
		</tr></tbody></table>";

		print "<div class='submits'><button type='submit' value='Enviar'>Enviar</button></div>";

		print "</form>";

	}
	private function input_edit($name, $value, $type='text'){
		return "<input type='".$type."' name='".$name."' value='".$value."'>";
	}

	/**
	 * Generate select for select zone
	 * @return string
	 */
	private function select_zone(){
		$sql = 'SELECT area_store_id AS "id", area_store_name AS "name" FROM cg_area_store';

		$stmt = $this->conex->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$data = "<select name='zone_id'>";

		foreach($result as $zona){
			$data .= "<option value='".$zona['id']."'";

			if($this->zone_id == $zona['id']){
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


}