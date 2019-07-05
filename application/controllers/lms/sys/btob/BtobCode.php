<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobCode extends \app\controllers\BaseController
{
    protected $models = array('sys/btob', 'sys/btobCode');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 제휴사 공통코드 인덱스
     */
    public function index()
    {
        // 제휴사 목록
        $arr_btob_idx = $this->btobModel->getCompanyArray();

        $this->load->view('sys/btob/code/index', [
            'arr_btob_idx' => $arr_btob_idx
        ]);
    }

    /**
     * 제휴사 공통코드 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'S.ParentBtobIdx' => $this->_reqP('search_btob_idx'),
                'A.IsUse' => $this->_reqP('search_is_use'),
                'A.IsValueUse' => $this->_reqP('search_is_value_use')
            ],
            'ORG' => [
                'LKB' => [
                    'S.ParentCcd' => $this->_reqP('search_value'),
                    'S.ParentName' => $this->_reqP('search_value'),
                    'A.Ccd' => $this->_reqP('search_value'),
                    'A.CcdName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->btobCodeModel->listCode(true, $arr_condition);

        if ($count > 0) {
            $list = $this->btobCodeModel->listCode(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['S.ParentOrder' => 'Desc', 'A.OrderNum' => 'Asc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴사 공통코드 등록/수정 폼
     * @param array $params
     * @return mixed
     */
    public function createModal($params = [])
    {
        $method = 'POST';
        $makeType = $params[0];     // group, sub
        $groupCcd = $params[1];     // groupcode
        $ccd = null;                // ccd
        $parent_data = null;
        $data = null;
        $btob_idx = null;

        //그룹코드가 존재할 경우 하위등록을 위한 그룹유형 정보 필요
        if($groupCcd !== "0") {
            $parent_data = $this->btobCodeModel->findParentCcd($groupCcd);
            if (count($parent_data) < 1) {
                return $this->json_error('그룹유형 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }
            $btob_idx = $parent_data['BtobIdx'];
        }

        // ccd 값이 존재하면 수정 플래그
        if (empty($params[2]) === false) {
            $method = 'PUT';
            $ccd = $params[2];
            $data = $this->btobCodeModel->findCcdForModify($ccd);
            $btob_idx = $data['BtobIdx'];
        }

        // 제휴사 목록
        $arr_btob_idx = $this->btobModel->getCompanyArray();

        return $this->load->view('sys/btob/code/create_modal', [
            'method' => $method
            ,'makeType' => $makeType
            ,'groupCcd' => $groupCcd
            ,'Ccd' => $ccd
            ,'parent_data' => $parent_data
            ,'data' => $data
            ,'btob_idx' => $btob_idx
            ,'arr_btob_idx' => $arr_btob_idx
        ]);
    }

    /**
     * 제휴사 공통코드 등록/수정 처리 프로세스
     */
    public function store()
    {
        $rules = [
            ['field' => 'makeType', 'label' => '코드유형(그룹,세부)', 'rules' => 'trim|required']
            ,['field' => 'groupCcd', 'label' => '상위코드', 'rules' => 'trim|required']
        ];

        if (empty($this->_reqP('Ccd',false)) === false) {
            $method = "modify";
        } else {
            $method = "add";
            $rules = array_merge($rules, [
                ['field' => 'btob_idx', 'label' => '제휴사', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->_reqP('groupCcd') === '0') {
            $rules = array_merge($rules, [
                ['field' => 'CcdName', 'label' => '그룹유형명', 'rules' => 'trim|required']
            ]);
        } else {
            $rules = array_merge($rules, [
                ['field' => 'CcdName', 'label' => '세부항목명', 'rules' => 'trim|required']
                ,['field' => 'CcdValue', 'label' => '세부항목값', 'rules' => 'trim|required']
                ,['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
            ]);
        }

        if ($this->validate($rules)=== false) {
            return;
        }

        $result = $this->btobCodeModel->{$method.'Ccd'}($this->_reqP(null,false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}
