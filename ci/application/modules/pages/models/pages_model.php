<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages_Model extends MY_Model {

    private $table, $mname;

    protected $_table_name = 'ct_pages';
    protected $_order_by = 'id';

    public function __construct() {
        parent::__construct();
        //$this->table = '';
    }

    public function index()
    {
       // $tmenu = 'top_menu';
       // $tmenu_model = $tmenu . '_model';
        $where = array(
            array('field' => 'url', 'match' => uri_string(), 'compare' => 'LIKE', 'both'),
            array('field' => 'lang', 'match' => language_code(), 'compare' => '=')
            );
        
        $page_content = $this->get_by($where, TRUE);

        $this->tp->tpl = $page_content->column_cnt . 'cols_template.tpl';

        //if( $this->bitauth->logged_in() )
       //     $a['CONTENT'] = isset($page_content->auth_body) ? stripslashes(htmlspecialchars_decode($page_content->auth_body, ENT_QUOTES)) : '';
       // else
            $a['CONTENT'] = isset($page_content->body) ? stripslashes(htmlspecialchars_decode($page_content->body, ENT_QUOTES)) : '';
                

        //var_dump_exit($a);

      
        $this->tp->assign($a);
        
        

        // верхнее меню
      //  $this->common->load_model($this->mname, $tmenu);
        //$this->load->model($this->mname.'/'.'top_menu_model');
        //$this->load->model('application/models/tree');
        //$top_menu = $this->tree->getTreeMenu(($this->session->userdata( 'ba_role' )) ? $this->session->userdata( 'ba_role' ) : 'all');

     //   $top_menu = $this->$tmenu_model->getTreeMenu('all');
        //var_dump($top_menu);
        //echo $this->top_menu_model->buildTopMenu($top_menu);
        //return $this->top_menu_model->buildTopMenu($top_menu);
        //return $list;

        // заполняем необходимые метки
      //  $a['modal_info'] = lang('ci_base.info');
      //  $a['modal_btn_close'] = lang('ci_base.close');
     //   $a['language_links'] = language_links('li');
     //   $a['promo_link'] = lang('ci_base.gotopromo');
     //   $a['support'] = lang('ci_base.technical_support');

       // $a['top_menu'] = $this->$tmenu_model->buildTopMenu($top_menu);
     //   $this->tp->assign($a);



    }

    public function get_by($where, $single = FALSE){
        if( isset($where) )
            foreach($where as $cond):
                if( $cond['compare'] == 'LIKE' ):
                    $this->db->like($cond['field'], $cond['match'], 'both');
                else:
                    $this->db->where($cond['field'], $cond['match']);
                endif;
            endforeach;

        return $this->get(NULL, $single);
    }

}