<?
defined('BASEPATH') OR exit('No direct script access allowed');

Class Freebie extends \app\controllers\BaseController
{
    protected $models = array('/product/etc/freebie');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_condition = [
            'IN' => ['A.SiteCode' => get_auth_site_codes()]    //사이트 권한 추가
        ];

        $list = $this->freebieModel->listFreebie($arr_condition);

        $this->load->view('product/etc/freebie/index', [
            'data' => $list
        ]);

    }


    public function create($params=[])
    {
        $method='POST';
        $idx = null;
        $data = null;

        if(empty($params[0]) === false) {
            $method='PUT';
            $idx=$params[0];
            $data = $this->freebieModel->findFreebieForModify($idx);
        }

        $this->load->view('/product/etc/freebie/create',[
            'method' => $method
            ,'idx' => $idx
            ,'data' => $data
        ]);

    }


    public function store()
    {
        $rules = [
            ['field' => 'FreebieName', 'label' => '사은품명', 'rules' => 'trim|required'],
            ['field' => 'RefundSetPrice', 'label' => '환불책정가', 'rules' => 'trim|required'],
            ['field' => 'Stock', 'label' => '재고', 'rules' => 'trim|required'],
        ];

        if(empty($this->_reqP('idx')) === true){
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules,[
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required'],
            ]);
        }

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->freebieModel->{$method.'Freebie'}($this->_reqP(null));
        
        //var_dump($result);exit;

        $this->json_result($result,'저장 되었습니다.',$result);

    }
}