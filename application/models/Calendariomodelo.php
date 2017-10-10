 

<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* 
	*/
	class Calendariomodelo extends CI_Model
	{
		
		

		private $prefs = array();


		public function __construct()
		{
			$dias_semana =array('L','M','X','J','V','S','D');

		    $this->prefs= array(
		    					'show_next_prev' => TRUE,
							     'next_prev_url' => 'http://localhost/calendario_ci/calendario/cal',
							     'start_day' =>'Monday',
							     'month_type'   => 'long',
							      'day_type'     => 'short',
							     'template' => '  
                                      
               {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendario centrado">{/table_open}
 
               {heading_row_start}<tr id="head_links">{/heading_row_start}
            
               {heading_previous_cell}<th class="previo"><a href="{previous_url}"><</a></th>{/heading_previous_cell}
               {heading_title_cell}<th class="fecha_actual" colspan="{colspan}">{heading}</th>{/heading_title_cell}
               {heading_next_cell}<th class="siguiente"><a href="{next_url}">></a></th>{/heading_next_cell} 
            
               {heading_row_end}</tr>{/heading_row_end}

               
               
               {week_row_start}<tr>{/week_row_start}
               {week_day_cell}<td class="dias_semana">{week_day}</td>{/week_day_cell}
               {week_row_end}</tr>{/week_row_end}
               
               {cal_row_start}<tr>{/cal_row_start}
               {cal_cell_start}<td class="dia">{/cal_cell_start}   
            
               {cal_cell_content}<div id=oc_{content} class="otro_dia {content}">{day}</div>{/cal_cell_content}
               {cal_cell_content_today}<div class="highlight">{day}</div>{/cal_cell_content_today}
                   
               {cal_cell_no_content}<div class="highlight">{day}</div>{/cal_cell_no_content}
               {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}
                   
               {cal_cell_blank}<br><br>{/cal_cell_blank}
                   
               {cal_cell_end}</td>{/cal_cell_end}
               {cal_row_end}</tr>{/cal_row_end}
            
               {table_close}</table>{/table_close}             
        ');


		}

	







		public function getPrefsCalendar(){

			//$this->load->library('calendar', $this->prefs);

			//return $this->calendar->generate();

			return $this->prefs;

		}






	}//fin class

?>