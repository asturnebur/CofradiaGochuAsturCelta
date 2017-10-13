<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* 
	*/
	class Loteriamodelo extends CI_Model
	{
		public $year;
		public $mes;
		public $msgLoteria;
		public $numLoteria;
		public $fotoLoteria;
		private $srcfotoLoteria;

		private $dataAsideizq;

		function __construct()
		{
			$this->year= date("Y");
			$this->mes= date("n");



			$filaLoteria = $this->getfilaLoteria($this->year);

			if ($filaLoteria == null || $filaLoteria->numeroLoteria==""){ 
				$this->msgLoteria= "A+la+espera+del+próximo+nº+para+el+sorteo+de+Navidad.";
				// Si existe el registro envialo sino year=year-1; y mostrar la loteria del año anterior
				//$numLoteria = "<del>". $this->loteria->getfilaLoteria($year-1)->numeroLoteria."</del>A la espera del siguiente nº";
				$this->numLoteria ="A la espera del próximo nº";
			   	$this->fotoLoteria = ''; 
			    $this->srcfotoLoteria="";

			}
			else{
				$this->numLoteria=$filaLoteria->numeroLoteria;
				$this->fotoLoteria = $filaLoteria->fotoLoteria;
				$this->msgLoteria= "A+la+venta+el+siguiente+nº+de+loteria+de+Navidad:+$this->numLoteria+de+los+Amigos+de+la+Cofradia+Gochu+Asturcelta";
				$this->srcfotoLoteria=base_url()."plantilla/img/imgLoteria/$this->fotoLoteria";
			}

			$this->dataAsideizq= array('year'=>$this->year, 
									'mes'=>$this->mes,
									'fotoLoteria'=>$this->fotoLoteria,
									'numLoteria' =>$this->numLoteria,
									'msgLoteria' => $this->msgLoteria,
									'srcfotoLoteria'=>$this->srcfotoLoteria
								);


			


	 	}
		
		public function getTablaLoteria(){

			return $this->db->get('loterias');
		}

		public function getfilaLoteria($yearLoteria){

			

			$sentencia= "SELECT * FROM loterias WHERE yearLoteria='$yearLoteria' LIMIT 1";

			$resultado= $this->db->query($sentencia);

			return $resultado->row();  //Convertirlo en una fila con ->row()
		}

		public function insertLoteria($numeroLoteria=null,$fotoLoteria=null ){


			if ($numeroLoteria !=null){

				$yearLoteria  = date('Y');				

				$sentencia = "INSERT INTO loterias(numeroLoteria, yearLoteria, fotoLoteria) 
							VALUES ('$numeroLoteria','$yearLoteria','$fotoLoteria'";


				if ( $this->db->query($sentencia) ){
					return true;
				}
			}

			return false;
		}

		public function getLoteria ($loteria=''){

			return $this->dataAsideizq;

		}
	}


		
		
		
 ?>