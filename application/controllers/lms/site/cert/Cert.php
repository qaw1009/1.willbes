<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cert extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'site/cert');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 수강인증관리
     */
    public function index()
    {
        //카테고리 조회
        $arr_category = $this->categoryModel->getCategoryArray('', '', '', 1);
        $codes = $this->codeModel->getCcdInArray(['684','685']);

        $this->load->view("site/cert/cert_index", [
            'arr_category' => $arr_category,
            'CertType_ccd' => $codes['684'],
            'CertCondition_ccd' => $codes['685']
        ]);
    }

    /**
     * 목록
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.CertTypeCcd' => $this->_reqP('search_type'),
                'A.CertConditionCcd' =>$this->_reqP('search_condition'),
                'A.No' =>$this->_reqP('search_no'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
            ],
            'LKR' => [
                'A.CateCode' => $this->_reqP('search_category')
            ]
        ];

        $list = [];
        $count = $this->certModel->listCert(true, $arr_condition);

        if ($count > 0) {
            $list = $this->certModel->listCert(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.CertIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);

    }

    public function create($params=[])
    {
        $method = 'POST';
        $CertIdx = null;
        $data = null;

        if(empty($params[0]) === false) {
            $method = 'PUT';
            $CertIdx = $params[0];
            $arr_condition = [
                'EQ' => [
                    'A.CertIdx' => $CertIdx
                ],
            ];
            $data = $this->certModel->listCert(false, $arr_condition);
            if(empty($data) === false) {
                $data = $data[0];
            }
        }

        $arr_category = $this->categoryModel->getCategoryRouteArray();
        $codes = $this->codeModel->getCcdInArray(['684','685']);

        $this->load->view('site/cert/cert_create_modal',[
            'method'=>$method,
            'arr_category' => $arr_category,
            'CertType_ccd' => $codes['684'],
            'CertCondition_ccd' => $codes['685'],
            'CertIdx' => $CertIdx,
            'data' => $data
        ]);

    }

    public function store()
    {
        $method = 'add';
        $rules = [
            ['field'=>'CateCode', 'label' => '카테고리', 'rules' => 'trim|required'],
            ['field'=>'CertTypeCcd', 'label' => '인증구분', 'rules' => 'trim|required'],
            ['field'=>'CertConditionCcd', 'label' => '인증조건', 'rules' => 'trim|required'],
        ];

        if($this->validate($rules) === false) {
            return;
        }

        if(empty($this->_reqP('CertIdx',false))===false) {
            $method = 'modify';
        }

        $result = $this->certModel->{$method.'Cert'}($this->_reqP(null));
        //var_dump($result);exit;
        $this->json_result($result, '저장 되었습니다.', $result);

    }
}

