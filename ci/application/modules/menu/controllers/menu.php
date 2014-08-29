<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MX_Controller {

    public $mname, 
           $tag = 'MENU',
           $tpl = 'menu.tpl';

    function __construct()
    {
        parent::__construct();
        $this->mname = strtolower(get_class());// imya modulya
        $this->tag = strtoupper($this->mname); // TAG v shablone

        // загружаем модель для меню
        $this->load->model( $this->mname . '/' . $this->mname . '_model' ); 
    }

    public function index( $type = 'all' )
    {
        $model = $this->mname . '_model';
        $this->$model->index( $type );
    }

    public function makeUserMenu()
    {
        $model = $this->mname . '_model'; 
        $this->$model->getUserMenu(); 
    }

    

}