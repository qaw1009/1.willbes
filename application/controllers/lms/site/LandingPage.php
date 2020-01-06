<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends \app\controllers\BaseController
{
    protected $models = array('site/landingPage', 'sys/code');
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
        $this->load->view('site/landingPage/index',[
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->landingPageModel->listAllLandingPage(true, $arr_condition);
        if ($count > 0) {
            $list = $this->landingPageModel->listAllLandingPage(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['LIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 랜딩페이지 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $l_idx = null;
        $max_lcode = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $l_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.LIdx' => $l_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->landingPageModel->findLandingPageForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            /*
            $arr_cate_code = $this->landingPageModel->listLandingPageCategory($l_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
            */
        } else {
            $max_lcode = $this->landingPageModel->findLCode()['LCode'];
        }

        $this->load->view("site/landingPage/create", [
            'method' => $method,
            'data' => $data,
            'l_idx' => $l_idx,
            'max_lcode' =>$max_lcode
        ]);
    }

    /**
     * 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'l_code', 'label' => '랜딩코드', 'rules' => 'trim|required'],
            ['field' => 'disp_route', 'label' => '노출경로', 'rules' => 'trim|required'],
            ['field' => 'content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if (empty($this->_reqP('l_idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
                //['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required']
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'l_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->landingPageModel->{$method . 'LandingPage'}($this->_reqP(null, false));

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
                    'A.Title' => $this->_reqP('search_value'),
                    'A.LCode' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            if ($this->_reqP('search_date_type') == 'I') {
                // 유효기간 검색
                $arr_condition['ORG2']['BET'] = [
                    'A.DispStartDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                    'A.DispEndDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                ];
                $arr_condition['ORG2']['RAW'] = ['(A.DispStartDatm < "' => $this->_reqP('search_start_date') . '" AND A.DispEndDatm > "' . $this->_reqP('search_end_date') . '")'];
            } elseif ($this->_reqP('search_date_type') == 'R') {
                // 등록일 기간 검색
                $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
            }
        }

        return $arr_condition;
    }
}