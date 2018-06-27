<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends \app\controllers\BaseController
{
    protected $models = array('site/popup', 'sys/code');
    protected $helpers = array();

    // 노출섹션 그룹공통코드
    private $_groupCcd = [
        'popup_disp' => '657',   //노출섹션
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 팝업 관리 인덱스
     */
    public function index()
    {
        //노출섹션
        $popup_info = $this->codeModel->getCcdInArray([$this->_groupCcd['popup_disp']]);

        $this->load->view('site/popup/index',[
            'popup_disp' => $popup_info[$this->_groupCcd['popup_disp']]
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();
        $list = [];
        $count = $this->popupModel->listAllPopup(true, $arr_condition);
        if ($count > 0) {
            $list = $this->popupModel->listAllPopup(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['PIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 배너 등록/수정
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $p_idx = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $p_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.PIdx' => $p_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->popupModel->findPopupForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->popupModel->listPopupCategory($p_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
        }

        //배너노출섹션, 배너위치
        $popup_info = $this->codeModel->getCcdInArray([$this->_groupCcd['popup_disp']]);

        $this->load->view("site/popup/create", [
            'method' => $method,
            'data' => $data,
            'p_idx' => $p_idx,
            'popup_disp' => $popup_info[$this->_groupCcd['popup_disp']]
        ]);
    }

    /**
     * 팝업 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'popup_disp', 'label' => '노출섹션', 'rules' => 'trim|required'],
            ['field' => 'popup_name', 'label' => '배너명', 'rules' => 'trim|required'],
            ['field' => 'link_type', 'label' => '링크방식', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'top_pixel', 'label' => '팝업위치 상단', 'rules' => 'trim|required|integer'],
            ['field' => 'left_pixel', 'label' => '팝업위치 좌측', 'rules' => 'trim|required|integer'],
            ['field' => 'width_size', 'label' => '팝업사이즈 가로', 'rules' => 'trim|required|integer'],
            ['field' => 'height_size', 'label' => '팝업사이즈 세로', 'rules' => 'trim|required|integer'],
            ['field' => 'link_url', 'label' => '링크주소', 'rules' => 'trim|required']
        ];

        if (empty($this->_reqP('p_idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
                ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required'],
                ['field' => 'attach_img', 'label' => '팝업이미지', 'rules' => 'callback_validateFileRequired[attach_img]']
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => '$p_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->popupModel->{$method . 'Popup'}($this->_reqP(null, false));

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
                'A.DispCcd' => $this->_reqP('search_disp'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG1' => [
                'LKB' => [
                    'A.PopUpName' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'I') {
            // 유효기간 검색
            $arr_condition['ORG2']['BET'] = [
                'A.DispStartDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                'A.DispEndDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
            ];
        } elseif ($this->_reqP('search_date_type') == 'R') {
            // 등록일 기간 검색
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }
}