<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/site/supporters/BaseSupporters.php';

class Assignment extends BaseSupporters
{
    protected $temp_models = array('board/board', 'board/boardSupporters');
    protected $helpers = array('download','file');
    private $bm_idx = 104;
    private $_reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    private $_attach_reg_type = [
        'default' => 0,     //본문글 첨부
        'reply' => 1        //본문 답변글첨부
    ];

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_base['def_site_code'] = '2001';
        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['arr_supporters_year'] = $this->supportersRegistModel->getSupportersYear();
        $arr_base['arr_supporters_number'] = $this->supportersRegistModel->getSupportersNumber();
        $this->load->view('site/supporters/assignment/index', ['arr_base' => $arr_base]);
    }

    public function listSupportersAjax()
    {
        $arr_condition = [
            'EQ' => [
                'a.SiteCode' => $this->_reqP('search_site_code'),
                'a.SupportersYear' => $this->_reqP('search_supporters_year'),
                'a.SupportersNumber' =>$this->_reqP('search_supporters_number'),
                'a.IsUse' =>$this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'a.SupportersIdx' => $this->_reqP('search_value'),
                    'a.Title' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['a.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->supportersRegistModel->listSupporters(true, true, $arr_condition);

        if ($count > 0) {
            $list = $this->supportersRegistModel->listSupporters(true, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SP.SupportersIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 과제등록관리[게시판]
     * @param array $params
     */
    public function registForBoard($params = [])
    {
        if (empty($params) === true) show_error('잘못된 접근입니다.');

        // 기본 서포터즈 정보
        $column = '
            a.SupportersIdx, a.SiteCode, a.Title, a.SupportersYear, a.SupportersNumber, a.StartDate, a.EndDate, a.CouponIssueCcd, a.IsUse, a.RegDatm, a.RegAdminIdx,
            b.SiteName, c.wAdminName as RegAdminName, d.wAdminName as UpdAdminName
        ';
        $arr_condition = [
            'EQ' => [
                'a.SupportersIdx' => $params[0]
            ]
        ];
        $data = $this->supportersRegistModel->findSupporters($arr_condition, $column);
        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view("site/supporters/assignment/regist/index", [
            'supporters_idx' => $params[0],
            'supporters_data' => $data
        ]);
    }

    /**
     * 과제등록관리[게시판] AJAX
     * @param array $params
     * @return CI_Output
     */
    public function registForBoardAjax($params = [])
    {
        if (empty($params) === true) show_error('잘못된 접근입니다.');

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.SupportersIdx' => $params[0],
                'LB.IsStatus' => 'Y',
                'LB.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.SupportersStartDate, LB.SupportersEndDate, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName,
            LB.SupportersIdx, SP.SupportersYear, SP.SupportersNumber
        ';

        $list = [];
        $count = $this->boardSupportersModel->listAllBoardForSupporters(true, $arr_condition, '');

        if ($count > 0) {
            $list = $this->boardSupportersModel->listAllBoardForSupporters(false, $arr_condition, '', $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 과제 등록/수정 폼
     * @param array $params
     */
    public function createAssignmentModal($params = [])
    {
        if (empty($params) === true) show_error('잘못된 접근입니다.');

        // 기본 서포터즈 정보
        $column = '
            a.SupportersIdx, a.SiteCode, a.Title, a.SupportersYear, a.SupportersNumber, a.StartDate, a.EndDate, a.CouponIssueCcd, a.IsUse, a.RegDatm, a.RegAdminIdx,
            b.SiteName, c.wAdminName as RegAdminName, d.wAdminName as UpdAdminName
        ';
        $arr_condition = [
            'EQ' => [
                'a.SupportersIdx' => $params[0]
            ]
        ];
        $data = $this->supportersRegistModel->findSupporters($arr_condition, $column);
        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $board_idx = $this->_req('board_idx');
        $input_params = [
            'board_idx' => $board_idx,
            'site_code' => $data['SiteCode'],
            'bm_idx' => $this->bm_idx,
            'supporters_idx' => $params[0]
        ];

        $method = 'POST';
        $data = null;

        if (empty($board_idx) === false) {
            $method = 'PUT';

            $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.SupportersStartDate, LB.SupportersEndDate,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName,
            LB.SupportersIdx, SP.SupportersYear, SP.SupportersNumber
            ';

            $arr_condition = ([
                'EQ'=>[
                    'LB.BoardIdx' => $board_idx,
                    'LB.SupportersIdx' => $params[0],
                    'LB.IsStatus' => 'Y'
                ]
            ]);
            $arr_condition_file = [
                'reg_type' => $this->_reg_type['admin'],
                'attach_file_type' => $this->_attach_reg_type['default']
            ];
            $data = $this->boardSupportersModel->findBoardForSupporters($column, $arr_condition, $arr_condition_file);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
            $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
            $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
            $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);
        }

        $this->load->view("site/supporters/assignment/regist/create_modal", [
            'method' => $method,
            'input_params' => $input_params,
            'data' => $data,
            'attach_file_cnt' => 5
        ]);
    }

    /**
     * 과제 등록/수정
     */
    public function storeAssignment()
    {
        $method = 'add';
        $idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'bm_idx', 'label' => '게시판관리식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'supporters_idx', 'label' => '서포터즈식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'supporters_start_date', 'label' => '제출시작일자', 'rules' => 'trim|required'],
            ['field' => 'supporters_end_date', 'label' => '제출종료일자', 'rules' => 'trim|required'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('board_idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('board_idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));

        //_addBoard, _modifyBoard
        $result = $this->boardSupportersModel->{$method . 'BoardForSupporters'}($inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 과제보기
     * @param array $params
     */
    public function readAssignmentModal($params = [])
    {
        if (empty($params[0]) === true) show_error('잘못된 접근 입니다.');
        $column = '            
            LB.BoardIdx, LB.RegType, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.SupportersStartDate, LB.SupportersEndDate,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LB.SupportersIdx, SP.SupportersYear, SP.SupportersNumber
        ';

        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $params[0],
                'LB.IsStatus' => 'Y'
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['admin'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardSupportersModel->findBoardForSupporters($column, $arr_condition, $arr_condition_file);
        if (empty($data) === true) show_error('데이터 조회에 실패했습니다.');

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $this->load->view("site/supporters/assignment/regist/read_modal", [
            'board_idx' => $params[0],
            'data' => $data,
            'attach_file_cnt' => 5,
        ]);
    }

    /**
     * 과제 삭제
     * @param array $params
     */
    public function deleteRegistBoard($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $idx = $params[0];
        $result = $this->boardModel->boardDelete($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * 첨부파일 다운로드
     */
    public function download()
    {
        $this->_download();
    }

    /**
     * 게시판 등록/수정 데이타 셋팅
     * @param $input
     * @return array
     */
    private function _setInputData($input){
        $input_data = [
            'SiteCode' => element('site_code', $input),
            'BmIdx' => element('bm_idx', $input),
            'SupportersIdx' => element('supporters_idx', $input),
            'SupportersStartDate' => element('supporters_start_date', $input),
            'SupportersEndDate' => element('supporters_end_date', $input),
            'RegType' => $this->_reg_type['admin'],
            'Title' => element('title', $input),
            'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
            'Content' => element('board_content', $input),
            'IsUse' => element('is_use', $input),
            'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
            'SettingReadCnt' => '0',
        ];

        return$input_data;
    }

    /**
     * 파일 삭제
     */
    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }
}