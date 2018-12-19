<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agreement extends \app\controllers\BaseController
{
    protected $models = array('site/terms');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 약관동의 인덱스
     */
    public function index()
    {
        $this->load->view('site/terms/agreement/index',[
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->termsModel->listAllTerms(true, $arr_condition);
        if ($count > 0) {
            $list = $this->termsModel->listAllTerms(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.SupIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 약관동의 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $sup_idx = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $sup_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.SupIdx' => $sup_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->termsModel->findTermsForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view("site/terms/agreement/create", [
            'method' => $method,
            'data' => $data,
            'sup_idx' => $sup_idx,
            'content_type' => $this->termsModel->_content_types[0]
        ]);
    }

    /**
     * 등록/수정
     */
    public function store()
    {
        $method = 'add';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'content_type', 'label' => '약관타입', 'rules' => 'trim|required|in_list[A,P]'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'link_url', 'label' => '링크주소', 'rules' => 'trim|required'],
            ['field' => 'content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[R,Y,N]']
        ];

        if (empty($this->_reqP('sup_idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'sup_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->termsModel->{$method . 'Terms'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 검색 조건 셋팅
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.ContentType' => $this->termsModel->_content_types[0],
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG1' => [
                'LKB' => [
                    'A.Title' => $this->_reqP('search_value'),
                    'A.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            if ($this->_reqP('search_date_type') == 'I') {
                // 유효기간 검색
                $arr_condition['ORG2']['BET'] = [
                    'A.ApplayStartDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                    'A.ApplayEndDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                ];
                $arr_condition['ORG2']['RAW'] = ['(A.ApplayStartDatm < "' => $this->_reqP('search_start_date') . '" AND A.ApplayEndDatm > "' . $this->_reqP('search_end_date') . '")'];
            } elseif ($this->_reqP('search_date_type') == 'R') {
                // 등록일 기간 검색
                $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
            }
        }

        return $arr_condition;
    }
}