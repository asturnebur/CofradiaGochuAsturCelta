<?php 
  
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


  /**
  // * //https://stackoverflow.com/questions/29369299/php-codeigniter-use-same-functions-for-different-controllers-minimize-repeti
  */
  class Datalibrary
  {
  protected $ci;

  protected $cCaptcha;

    public function __construct()
    {
        $this->ci =& get_instance(); 
    }

    public function buildHead()
    {
       $datahead = array (              
              'lang'=> 'es-ES',
              'application_name'=>'Cofradía Amigos Gochu Asturcelta',
              'mydistribution'=>'global',
              'creador' =>'Rubén González Rodríguez',
              'description' =>'Asociación amigos de la cofradía del Gochu Asturcelta',
              'keywords' => 'Amigos Cofradía Gochu Asturcelta,
                             Amigos Gochu Asturcelta,
                             Eventos cofradia gochu AsturCelta,
                             Gochu AsturCelta',

              'mytwitter_tag' =>'@cofgochuastur',
              'myrobots'=>'index, follow',
              'mygoogletraduccion'=>'notranslate',
              'title' => 'Asociación amigos de la cofradía del Gochu Asturcelta'          
            );
       return $datahead;
    }



    public function buildFooter(){

      $year= date("Y");

      $datahead = $this->buildHead();


      $txt_copyright= '© 2012-'.$year.'  <strong>'.$datahead["application_name"].'</strong> - Todos los derechos reservados.';

      $datafooter = array (
              'tlf_contacto' =>'695850696',
              'email_contacto' =>'cofradiagochuasturcelta@gmail.com',
              'email_contactoruben' =>'rgonzalezr@alumni.tecnun.es',
              'web_mobileruben'=>'http://play.google.com/store/apps/dev?id=6950543372313608410',
              'web_powerapps'=>'https://web.powerapps.com/apps/96caab80-3620-49e5-83ef-d1698d7f5b5a',
              'txt_copyright'=> $txt_copyright
            );

      return $datafooter;


    }



    public function linkCofradias(){

       // <!-- <h2><span class="label label-default">Amigos de la cofradía</span></h2> -->
       /* <div class="row"> <div class="bordemorado margen5">       
          <a href="http://amigosdelosnabos.com" target="_blank"><img src="<?=base_url() ?>plantilla/img/logo_amigodelosnabos.jpg"  alt="Logo cofradia amigo de los nabos" width="300" height="100" ></a>
        </div>

        <div class="bordemorado margen5">         
          <a href="http://cofradiadeloriciu.blogspot.com.es" target="_blank"><img src="<?=base_url() ?>plantilla/img/logo_amigodeloriciu.png" alt="Logo cofradia del oriciu" width="300" height="150"></a>
        </div>
        

        <div class="bordemorado margen5">         
          <a href="http://cofradiadelcolesterol.es" target="_blank"><img src="<?=base_url() ?>plantilla/img/logo_amigodelcolesterol.png" alt="Logo cofradia del coresterol" width="300" height="100" ></a>
        </div>

        <div class="bordemorado margen5">         
          <a href="https://www.facebook.com/cofradiadelquesugamoneu.gamoneu/" target="_blank"><img src="<?=base_url() ?>plantilla/img/logo_quesogamoneu.jpg" alt="Logo cofradia del quesu gamoneu" width="300" height="100"></a>
        </div>

        <div class="bordemorado margen5">         
          <a href="http://www.ordendelsabadiego.es" target="_blank"><img src="<?=base_url() ?>plantilla/img/logo_cofradiasabadiego.jpg" alt="Logo cofradia orden del sabadiego" width="300" height="100"></a>
        </div></div>*/

      $linksCofradias = array ( 'nabos'=>'http://amigosdelosnabos.com',
                                'oriciu'=>'http://cofradiadeloriciu.blogspot.com.es',
                                'colesterol'=>'http://cofradiadelcolesterol.es',
                                'gamoneu'=>'https://www.facebook.com/cofradiadelquesugamoneu.gamoneu',
                                'sabadiego'=>'http://www.ordendelsabadiego.es'
                    );


      return $linksCofradias;
    }


    public function configurarPaginador(){


      $this->ci->load->model('eventosmodelo');
      $config['base_url']= base_url()."Eventos/vereventos";
      //total_rows This number represents the total rows in the result set you are creating pagination for. Typically this number will be the total rows that your database query returned
      $config['total_rows']= $this->ci->eventosmodelo->numEventos();
      //per_page The number of items you intend to show per page. In the above example, you would be showing 20 items per page.
      $config['per_page']= 1;
      $config['uri_segment']=3;
      $config['num_links']=5;


      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = false;
      $config['last_link'] = false;
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['prev_link'] = '&laquo';
      $config['prev_tag_open'] = '<li class="prev">';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = '&raquo';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';


      return $config;
    }



   

    public function GenerateCaptcha()
    {
        $vals = array(
          'img_path'      => './captchaimg/',
          'img_url'       => base_url().'captchaimg/',
          'colors'        => array(
                'background' => array(135, 14, 59),
                'border' => array(0, 0, 255),
                'text' => array(255, 255, 255),
                'grid' => array(255, 40, 40)
                    ),
          
          'img_width'     => '150',
            'img_height'    => '50',
           
            
      );

      $cap = create_captcha($vals);
      return $cap;
      
    }



}









?>
