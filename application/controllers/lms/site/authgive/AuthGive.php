<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthGive extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'site/authgive/authGive');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $pay_route_ccd = ['0원결제' => '670003', '관리자유료결제' => '670007']; //0원결제, 관리자유료결제

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('site/auth_give/auth/index', [
            'pay_route_ccd' => $this->pay_route_ccd
        ]);
    }

    /**
     * 목록
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.IsAutoApproval' => $this->_reqP('search_is_auto_approval'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'A.PayRouteCcd' => $this->_reqP('search_pay_route_ccd')
            ],
            'LKR' => [
                'A.CateCode' => $this->_reqP('search_category'),
                'A.Title' => $this->_reqP('search_title')
            ]
        ];

        $list = [];
        $count = $this->authGiveModel->listAuthGive(true, $arr_condition);

        if($count > 0) {
            $list = $this->authGiveModel->listAuthGive(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.AgIdx' => 'DESC']);
        }

        foreach ($list as $idx => $row) {
            $list[$idx]['CateInfo'] = json_decode($row['CateInfo'], true);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 등록/수정
     * @param array $params
     */
    public function create($params = [])
    {
        $arr_site_code = get_auth_on_off_site_codes('N',true);
        $arr_send_callback_ccd = $this->codeModel->getCcd(706, 'CcdValue');  // 발신번호조회
        $method = 'POST';
        $idx = null;
        $data = null;
        $data_product = [];
        if(empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];

            $arr_condition = [
                'EQ' => [
                    'A.AgIdx' => $idx,
                    'A.IsStatus' => 'Y'
                ]
            ];
            $data = $this->authGiveModel->listAuthGive(false, $arr_condition);
            if(empty($data) === false) {
                $data = $data[0];
                $data['CateInfo'] = json_decode($data['CateInfo'], true);
            }

            $data_product = $this->authGiveModel->listSubProduct($idx);
        }

        $this->load->view('site/auth_give/auth/create', [
            'arr_site_code' => $arr_site_code,
            'method' => $method,
            'data' => $data,
            'data_product' => $data_product,
            'idx' => $idx,
            'pay_route_ccd' => $this->pay_route_ccd,
            'arr_send_callback_ccd' => $arr_send_callback_ccd,
        ]);
    }

    /**
     * 처리
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required'],
            ['field' => 'cate_code[]', 'label' => '카테고리선택', 'rules' => 'trim|required'],
            ['field' => 'Title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'IsAutoApproval', 'label' => '승인유형', 'rules' => 'trim|required'],
            ['field' => 'AuthStartDate', 'label' => '인증기간', 'rules' => 'trim|required'],
            ['field' => 'AuthEndDate', 'label' => '인증기간', 'rules' => 'trim|required'],
            ['field' => 'PayRouteCcd', 'label' => '강좌지급방법', 'rules' => 'trim|required'],
            ['field' => 'StudyPeriodType', 'label' => '수강제공기간 유형', 'rules' => 'trim|required'],
            ['field' => 'IsUseSms', 'label' => 'SMS사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
        } else {
            $method = 'modify';
        }

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->authGiveModel->{$method.'AuthGive'}($this->_req(null, false));

        if($result === true) {
            $this->json_result($result, '저장 되었습니다.', $result);
        } else {
            $this->json_error($result['ret_msg']);
        }
    }
}