<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageCs extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'crm/cs/cs');
    protected $helpers = array();

    private $_groupCcd = '704';    //기술응대유형

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_base['issue_division_ccd'] = $this->codeModel->getCcd($this->_groupCcd);

        $this->load->view("crm/cs/index", [
            'arr_base' => $arr_base
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'CS.IssueDivisionCcd' => $this->_reqP('search_issue_division_ccd'),
                'CS.IsStatus' => 'Y',
            ],
            'ORG' => [
                'LKB' => [
                    'CS.Title' => $this->_reqP('search_value'),
                    'CS.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['CS.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->csModel->listManageCs(true, $arr_condition);

        if ($count > 0) {
            $list = $this->csModel->listManageCs(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CS.IsBest' => 'desc', 'CS.CtmIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 목록 페이지 [외부 접근 허용]
     */
    public function noAuthList()
    {
        $arr_base['issue_division_ccd'] = $this->codeModel->getCcd($this->_groupCcd);

        $this->load->view("crm/cs/noauth_index", [
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 목록 페이지 ajax
     * @return CI_Output
     */
    public function noAuthListAjax()
    {
        $arr_condition = [
            'EQ' => [
                'CS.IssueDivisionCcd' => $this->_reqP('search_issue_division_ccd'),
                'CS.IsUse' => 'Y',
                'CS.IsStatus' => 'Y',
            ],
            'ORG' => [
                'LKB' => [
                    'CS.Title' => $this->_reqP('search_value'),
                    'CS.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['CS.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->csModel->listManageCs(true, $arr_condition);

        if ($count > 0) {
            $list = $this->csModel->listManageCs(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CS.IsBest' => 'desc', 'CS.CtmIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $ctm_idx = null;

        $arr_base['issue_division_ccd'] = $this->codeModel->getCcd($this->_groupCcd);

        if (empty($params[0]) === false) {
            $column = '
                CS.CtmIdx, CS.IssueDivisionCcd, CS.Title, CS.Content, CS.ReadCnt, CS.IsBest, CS.IsUse, CS.IsStatus, CS.RegDatm, CS.RegAdminIdx, CS.RegIp, CS.UpdDatm, CS.UpdAdminIdx,
                fn_ccd_name(CS.IssueDivisionCcd) AS IssueDivisionCcdName, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName
            ';
            $method = 'PUT';
            $ctm_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'CS.CtmIdx' => $ctm_idx,
                    'CS.IsStatus' => 'Y'
                ]
            ]);
            $data = $this->csModel->findCsForModify($column, $arr_condition);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view("crm/cs/create", [
            'method' => $method,
            'data' => $data,
            'ctm_idx' => $ctm_idx,
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $idx = '';

        $rules = [
            ['field' => 'issue_division_ccd', 'label' => '응대유형', 'rules' => 'trim|required|integer'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));

        //_addCsManual, _modifyCsManual
        $result = $this->csModel->{$method . 'CsManual'}($inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 조회수 업데이트
     */
    public function updateReadCnt()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->csModel->updateReadCnt($this->_reqP(null, false));
        $this->json_result($result, '수정 되었습니다.', $result);
    }

    private function _setInputData($input){
        $input_data = [
            'IssueDivisionCcd' => element('issue_division_ccd', $input),
            'Title' => element('title', $input),
            'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
            'Content' => element('board_content', $input),
            'IsUse' => element('is_use', $input)
        ];

        return$input_data;
    }
}