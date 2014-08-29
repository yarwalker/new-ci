<?php
class Common extends CI_Model {
        
    public function __construct() {
        parent::__construct();
    }
    
    function load_module($module)
    {

        if (is_dir('../../ci/application/modules/'.$module))  // proveryaet, sushestvuet li modul
        {
            //$method = 'index';

            //if( isset( $this->uri->segment(3) ) && $this->uri->segment(3) != '')
             if( ! $method = $this->uri->segment(3) )
                $method = 'index';

            $this->load->module($module);

            $this->$module->$method();
            //echo 'load module: ' . $module . '<br/>';
        }        

       
    }
    
    function load_controller($module, $contr)
    {

        if (is_file('../../ci/application/modules/'.$module.'/controllers/'.$contr.'.php'))
        {
            $this->load->module($module.'/'.$contr);
            $this->$contr->index($module);   


        }
        else
        {
            show_404('page');
        }
    }
    
    function load_model($module, $model, $folder='')
    {
        $model .= '_model';
        if ($folder) $folder .= '/';

        if ( is_file(APPPATH.'modules/'.$module.'/models/'.$folder.$model.'.php') )
        {
            $this->load->model($module.'/'.$folder.$model);
            $this->$model->index($module);
        }
        else
        {
            show_404('page');
        }
    }  
        
}
