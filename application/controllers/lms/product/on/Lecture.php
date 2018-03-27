<?
defined('BASEPATH') OR exit('No direct script access allowed');

Class Lecture extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('product/on/index',[
            'data'=>[]
        ]);
    }


    public function listAjax()
    {
        /*
        $_search_value = $this->_req('search_value');
        $_search_prof = $this->_req('search_prof');
        $_search_cp = $this->_req('search_cp');
        $_search_category = $this->_req('search_category');
        $_search_progress = $this->_req('search_progress');
        $_search_is_use = $this->_req('search_is_use');
*/
        $count = 0;
        $list = [];

        return $this->response([
            'recordsTotal' => $count,
            'data' => $list
        ]);
    }

    public function create($params=[])
    {
        $method = 'POST';
        $lecidx = '';
        $data = null;


        $this->load->view('product/on/create',[
            'method'=>$method
            ,'lecidx'=>$lecidx
            ,'data'=>$data
        ]);
    }

}