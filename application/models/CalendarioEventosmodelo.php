 

<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* 
	*/
	class CalendarioEventosmodelo extends CI_Model
	{
		
		private $date;

		private $day;
		private $month;
		private $year;

		private $firstDay;

		private $daysInMonth;

		public $dias=array('L','M','X','J','V','S','D');
		public $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
	               'Agosto','Septiembre','Octubre','Noviembre','Diciembre');



		public function __construct() {
	        $this->date = strtotime(date("Y-m-d"));

	        $this->day = date('d', $this->date);
			$this->month = date('m', $this->date);
			$this->year = date('Y', $this->date);

			$this->firstDay = mktime(0,0,0,$this->month, 1, $this->year);

			$this->setdaysInMonth($this->month,$this->year);

			$this->empieza = date('N', strtotime("{$this->year}-{$this->month}-01"));  // 1 (para lunes) hasta 7 (para domingo) "2017-08-01"

			$this->setdiasBlanco($this->empieza);
	    }


		

			
	    private function setdaysInMonth($month,$year){
			$this->daysInMonth = cal_days_in_month(0, $month, $year); //Devolver el número de días de un mes para un año y un calendario dados;
		}

		 private function setdiasBlanco($empieza){

			$this->blank = $this->empieza-1;
		}


		
		public function getdaysInMonth(){
			return $this->daysInMonth;
		}


		public function getDias(){
			return $this->dias;
		}
		public function getMeses(){
			return $this->meses;
		}

		public function getdiasBlanco(){
			return $this->blank;
		}

		public function getDay(){
			return $this->day;
		}

		public function getMonth(){
			return $this->month;
		}
		public function getYear(){
			return $this->year;
		}
		




	}//fin class

?>