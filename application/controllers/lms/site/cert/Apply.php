<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'site/cert', 'site/certApply');
    protected $helpers = array('download','file');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 수강인증현황
     */
    public function index()
    {
        //카테고리 조회
        $arr_category = $this->categoryModel->getCategoryArray('', '', '', 1);
        $codes = $this->codeModel->getCcdInArray(['684','685']);

        $this->load->view("site/cert/apply_index", [
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
                'A.CateCode' => $this->_reqP('search_category'),
                'A.CertTypeCcd' => $this->_reqP('search_type'),
                'A.CertConditionCcd' =>$this->_reqP('search_condition'),
                'A.No' =>$this->_reqP('search_no'),
                'A.ApprovalStatus' =>$this->_reqP('search_approval'),
            ],
        ];

        if(empty($this->_reqP('search_value')) === false) {
            $arr_condition = array_merge($arr_condition, [

                    'LKB' => [
                        'F.MemId' => $this->_reqP('search_value'),
                        'F.MemName' => $this->_reqP('search_value'),
                        'F.Phone2Enc' => 'fn_dec('.$this->_reqP('search_value').')'
                    ]

            ]);
        }

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    $this->_reqP('search_date_type') => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
                ],
            ]);
        }

        //echo var_dump($arr_condition);

        $list = [];
        $count = $this->certApplyModel->listApply(true, $arr_condition);

        if ($count > 0) {
            $list = $this->certApplyModel->listApply(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SA.CaIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);

    }

    /**
     * 상세정보 확인
     * @param $info
     */
    public function info($info)
    {
        $CaIdx = $info[0];

        $arr_condition = [
            'EQ' => [
                'SA.CaIdx' => $CaIdx
            ]
        ];

        $data = $this->certApplyModel->listApply(false, $arr_condition, null, null, []);
        $data = $data[0];

        $this->load->view('site/cert/apply_info_modal',[
            'data' => $data
        ]);
    }

    /**
     * 승인/취소 변경
     */
    public function change()
    {
        if (empty($this->_reqP('checkIdx'))) {
            return $this->json_error('인증 신청코드가 존재하지 않습니다.');
        }

        $result = $this->certApplyModel->changeApply($this->_reqP(null));

        var_dump($result);exit;

        $this->json_result($result, '수정 되었습니다.', $result);
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

    public function download($fileinfo=[])
    {
        public_download($fileinfo[0]);
    }

}

