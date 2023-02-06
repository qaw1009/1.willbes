<?php
/**
 * ======================================================================
 * 합격예측 코드 관리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCode extends \app\controllers\BaseController
{
    protected $models = array('predict/predict', 'predict/predictCode');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 합격예측 운영코드 관리
     */
    public function index()
    {
        $data = $this->predictCodeModel->listAllCode();
        $this->load->view('predict/baseCode/index',[
            'data'=>$data
        ]);
    }

    /**
     * 합격예측 직렬/과목관리코드 등록/수정 폼
     * @param array $params
     * @return CI_Output
     */
    public function createModal($params = [])
    {
        $method = 'POST';
        $makeType = $params[0]; //group, sub
        $groupCcd = $params[1]; //groupcode
        $ccd = null; //ccd
        $parent_data = null;
        $data = null;

        //그룹코드가 존재할 경우 하위등록을 위한 그룹유형 정보 필요
        if($groupCcd !== "0") {
            $parent_data = $this->predictCodeModel->findParentCcd($groupCcd);
            if (count($parent_data) < 1) {
                return $this->json_error('그룹유형 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }
        }

        // ccd 값이 존재하면 수정 플래그
        if (empty($params[2]) === false) {
            $method = 'PUT';
            $ccd = $params[2];
            $data = $this->predictCodeModel->findCcdForModify($ccd);
        }

        $this->load->view('predict/baseCode/create_modal',[
            'method' => $method
            ,'makeType' => $makeType
            ,'groupCcd' => $groupCcd
            ,'Ccd' => $ccd
            ,'parent_data' => $parent_data
            ,'data' => $data
        ]);
    }

    public function store()
    {
        $method="add";

        $rules = [
            ['field' => 'makeType', 'label' => '코드유형(그룹,세부)', 'rules' => 'trim|required']
            ,['field' => 'groupCcd', 'label' => '상위코드', 'rules' => 'trim|required']
        ];

        if($this->_reqP('groupCcd') === '0') {
            $rules = array_merge($rules, [
                ['field' => 'CcdName', 'label' => '직렬명', 'rules' => 'trim|required']
            ]);
        } else {
            $rules = array_merge($rules, [
                ['field' => 'CcdName', 'label' => '과목명', 'rules' => 'trim|required']
                ,['field' => 'subject_type', 'label' => '과목타입', 'rules' => 'trim|required|in_list[P,S]']
                ,['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
            ]);
        }

        if($this->validate($rules)=== false) {
            return;
        }

        if(empty($this->_reqP('Ccd',false))===false) {
            $method="modify";
        }

        $result = $this->predictCodeModel->{$method.'Ccd'}($this->_reqP(null,false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 합격예측 과목코드 관리
     * @param array $params
     */
    public function listSubject($params = [])
    {
        $arr_base = [];
        $arr_base['predict_idx'] = $params[0];
        $arr_base['code'] = $this->predictCodeModel->getPredictForSubjectAll($params[0]);
        $this->load->view('predict/baseCode/list_subject', [
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 합격예측 과목코드 등록
     * @param array $params
     */
    public function createSubject($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $arr_base = [];
        $arr_base['predict_idx'] = $params[0];
        $result_take_mock_part = $this->predictModel->getMockPartListForPredict($arr_base['predict_idx']);
        $arr_take_mock_part = array_pluck($result_take_mock_part, 'MockPart', 'MockPart');
        $data = $this->predictCodeModel->listAllCodeForPredict($arr_base['predict_idx'], $arr_take_mock_part);

        $this->load->view('predict/baseCode/create_subject', [
            'arr_base' => $arr_base
            ,'data' => $data
        ]);
    }

    /**
     * 합격예측의 과목데이터 저장
     */
    public function storeSubject()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'predict_idx', 'label' => '합격예측코드', 'rules' => 'trim|required|integer']
        ];
        if ($this->validate($rules) === false) return;


        $result = $this->predictCodeModel->storeSubjectCode($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 합격예측 과목코드 삭제
     */
    public function deleteSubject()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'prs_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->predictCodeModel->deleteSubjectCode($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 과목그룹 변경
     */
    public function updateGroupBy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'predict_idx', 'label' => '합격예측식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->predictCodeModel->updateParams($this->_reqP(null), 'group_by');
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 정렬순서 변경
     */
    public function updateOrderNum()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'predict_idx', 'label' => '합격예측식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->predictCodeModel->updateParams($this->_reqP(null), 'order_num');
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    public function storeGroupTakeNumber()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'predict_idx', 'label' => '합격예측식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->predictCodeModel->updateGroupTakeNumber($this->_reqP(null));
        $this->json_result($result, '적용 되었습니다.', $result);
    }
}