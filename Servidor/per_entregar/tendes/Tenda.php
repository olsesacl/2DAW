<?php
include('Conexion.php');

class Tenda
{
	var $id;
	var $name;
	var	$zone_name;
	var $address;
	var $city;
	var $phone;
	var $email;

	function __construct($id=''){
		$this->conex = conexion();
		if(!empty($id))$this->fetch($id);
	}

	/**
	 * @param $id
	 */
	function fetch($id){

		$sql = "SELECT store_id, store_name, area_store_name, store_address, store_city, store_phone, store_email
 				FROM cg_store s, cg_area_store astore
 				WHERE store_area_id = area_store_id AND store_id = ?";

		$stmt = $this->conex->prepare($sql);
		$stmt->execute(array($id));
		$result=$stmt->fetch();

		$this->id = $result['store_id'];
		$this->name = $result['store_name'];
		$this->zone_name = $result['area_store_name'];
		$this->address = $result['store_address'];
		$this->city = $result['store_city'];
		$this->phone = $result['store_phone'];
		$this->email = $result['store_email'];
	}

	function clear(){
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
	function fetch_all_store($inici='', $tamany = ''){

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
	function show_all_store($inici='', $tamany = ''){
		print "<table border='1'>
				<tr>
					<th>Nombre</th>
					<th>Zona</th>
					<th>Dirección</th>
					<th>Ciudad</th>
					<th>Telefono</th>
					<th>Email</th>
					</tr>";

		$tendes = new Tenda();
		$tendes = $tendes->fetch_all_store($inici, $tamany);

		foreach($tendes as $tenda){
			print "<tr>
					<td>".$tenda->name."</td>
					<td>".$tenda->zone_name."</td>
					<td>".$tenda->address."</td>
					<td>".$tenda->city."</td>
					<td>".$tenda->phone."</td>
					<td>".$tenda->email."</td>
					</tr>";
		}

		print "</table>";
		print "<div id='paginador'>".$this->paginador($tamany)."</div>";
	}

	/**
	 * @param $tamany
	 */
	function paginador($tamany){

		$sql = "SELECT COUNT(*) as total FROM cg_store";
		$stmt = $this->conex->prepare($sql);
		$stmt->execute();
		$total=$stmt->fetch();
		$total = $total['total'];

		$paginas = ceil($total / $tamany);

		for ($i = 1; $i <= $paginas; $i++){
			echo "<span></span><a href='index.php?pag=$i'>$i</a><span>";
		}

	}
}