<?
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MX_Controller
{
    private $_modules;
    public $tpl;

    public function __construct()
    {
        parent::__construct();
        $this->_modules = array('auth','cabinet','ads','root', 'test', 'pages', 'menu'); // разрешенные модули
    }

    public function index()
    {
        session_start();  // сессии я использую, хотя базовый CI нет
        $this->check_lang();  // проверяет язык из урла

        // формируем шапку
     //   modules::run('header');

        // формируем ссылки футера
       // modules::run('footer');



        $this->check_module();  // проверяет модуль из урла


      

        $this->tp->load_tpl($this->tp->tpl); // загружает шаблон и проверяет на модули

        $this->tp->print_page(); // выводит шаблон с проработанными модулями на экран

        
    }

    public function check_lang()
    {
        if ($this->uri->segment(1))
        {
            switch ($this->uri->segment(1))
            {
                case 'en': define('LANG','en'); break;
                case 'ru': define('LANG','ru'); $this->config->set_item('language', 'russian');  break;
                default: show_404('page');
            }
        }
        else
        {
            define('LANG','en');
        }
        $this->tp->assign("LANG",LANG);
        $this->tp->assign("SITEURL",SITEURL);
        define('URL',SITEURL.'/'.LANG);
        $this->tp->assign("URL",URL);
    }

    public function check_module()
    {
        if( $m = $this->uri->segment(2) )
        {
            //var_dump_exit($m);

            if( in_array($m, $this->_modules) )
            {
                $this->common->load_module($m);
                $this->tp->tpl = $this->$m->tpl;
            }
            else
            {
                show_404('page');
            }
        }
        else
        {
            //echo 'try to load main page';
            $this->load_main_page(); // esli net vtorogo segmenta, to zagruzhaet glavnuyu stranicu
        }
    }

    public function load_main_page()
    {
        // формируем главную страницу
        modules::run('pages');
    }

    public function test()
    {
        modules::run('footer/test');
    }
}