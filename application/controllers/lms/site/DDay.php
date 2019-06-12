<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dday extends \app\controllers\BaseController
{
    protected $models = array('site/dDay', 'sys/site', 'sys/code', 'sys/category');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * D-Day 인덱스
     */
    public function index()
    {
        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('', '', '', 1);

        $this->load->view("site/d_day/index", [
            'arr_category' => $arr_category
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();
        $arr_condition_category = [
            'LKR' => [
                'B.CateCode' => $this->_reqP('search_category')
            ]
        ];

        $list = [];
        $count = $this->dDayModel->listAllDDay(true, $arr_condition, $arr_condition_category);
        if ($count > 0) {
            $list = $this->dDayModel->listAllDDay(false, $arr_condition, $arr_condition_category, $this->_reqP('length'), $this->_reqP('start'), ['DIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * D-Day 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $d_idx = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $d_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.DIdx' => $d_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->dDayModel->findDDayForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->dDayModel->listDDayCategory($d_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
        }

        $this->load->view("site/d_day/create", [
            'method' => $method,
            'data' => $data,
            'd_idx' => $d_idx
        ]);
    }

    public function store()
    {
        $rules = [
            ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required'],
            ['field' => 'day_title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'day_datm', 'label' => 'D-Day 날짜', 'rules' => 'trim|required']
        ];

        if (empty($this->_reqP('d_idx')) === true) {
            $method = 'add';
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'd_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->dDayModel->{$method . 'DDay'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 게시글 복사
     */
    public function copy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'd_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->dDayModel->DDCopy($this->_reqP('d_idx'));
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
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG1' => [
                'LKB' => [
                    'A.DayTitle' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'D') {
            // D-Day 기간 검색
            $arr_condition['ORG2']['BET'] = [
                'A.DayDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]
            ];
        } elseif ($this->_reqP('search_date_type') == 'R') {
            // 등록일 기간 검색
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }
}