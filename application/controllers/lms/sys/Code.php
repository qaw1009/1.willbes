<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends \app\controllers\BaseController
{
    protected $models = array('sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 공통코드관리 인덱스 (리스트페이지)
     */
    public function index()
    {
        $data = $this->codeModel->listAllCode();
        $this->load->view('sys/code/index',[
            'data'=>$data
        ]);
    }


    /**
     * 공통관리코드 등록/수정 폼
     * @param array $params
     * @return CI_Output
     */
    public function createModal($params = [])
    {
        $method = 'POST';
        $makeType = $params[0];     //group, sub
        $groupCcd = $params[1];      //groupcode
        $ccd = null;                        //ccd
        $parent_data = null;
        $data = null;

        //그룹코드가 존재할 경우 하위등록을 위한 그룹유형 정보 필요
        if($groupCcd !== "0") {
            $parent_data = $this->codeModel->findParentCcd($groupCcd);
            if (count($parent_data) < 1) {
                return $this->json_error('그룹유형 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }
        }

        // ccd 값이 존재하면 수정 플래그
        if (empty($params[2]) === false) {
            $method = 'PUT';
            $ccd = $params[2];
            $data = $this->codeModel->findCcdForModify($ccd);
        }

        $this->load->view('sys/code/create_modal',[
            'method' => $method
            ,'makeType' => $makeType
            ,'groupCcd' => $groupCcd
            ,'Ccd' => $ccd
            ,'parent_data' => $parent_data
            ,'data' => $data
        ]);
    }

    /**
     * 등록/수정 처리 프로세스
     */
    public function store()
    {
        $method="add";

        $rules = [
            ['field' => 'makeType', 'label' => '코드유형(그룹,세부)', 'rules' => 'trim|required']
            ,['field' => 'groupCcd', 'label' => '상위코드', 'rules' => 'trim|required']
        ];

        if($this->_reqP('groupCcd') === '0') {
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

        if($this->validate($rules)=== false) {
            return;
        }

        if(empty($this->_reqP('Ccd',false))===false) {
            $method="modify";
        }

        $result = $this->codeModel->{$method.'Ccd'}($this->_reqP(null,false));

        $this->json_result($result, '저장 되었습니다.', $result);

    }
}