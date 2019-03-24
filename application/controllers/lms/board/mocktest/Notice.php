<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/mocktest/Main.php';

class Notice extends Main
{
    protected $temp_models = array('board/board');
    protected $helpers = array('download','file');

    public $boardName = 'mocktest/notice';
    private $bm_idx;
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

    /**
     * 메인 리스트 페이지 리턴
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        redirect(site_url("/board/{$this->boardName}/mainList?bm_idx={$this->bm_idx}"));
    }

    /**
     * 메인페이지
     */
    public function mainList()
    {
        return $this->_mainList();
    }

    /**
     * 메인페이지 ajax
     * @return CI_Output
     */
    public function mainListAjax()
    {
        return $this->_mainListAjax();
    }

    /**
     * 모의고사별 공지사항 목록
     */
    public function detailList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $this->_req('prod_code');

        //모의고사 상품 조회
        $prod_data = $this->_prodData($prod_code);

        $this->load->view("board/{$this->boardName}/index", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->boardName,
            'prod_code' => $prod_code,
            'prod_data' => $prod_data,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prod_code={$prod_data['ProdCode']}&site_code={$prod_data['SiteCode']}",
        ]);
    }

    public function detailListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $this->_req('prod_code');
        $site_code = $this->_req('site_code');

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.ProdCode' => $prod_code,
                'LB.IsStatus' => 'Y',
                'LB.IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if ($this->_reqP('search_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0']);
        }

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y',
                'subLBrC.CateCode' => $this->_reqP('search_category')
            ]
        ];

        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->boardName,true, $arr_condition, $sub_query_condition, $site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->boardName,false, $arr_condition, $sub_query_condition, $site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 게시글 복사
     */
    public function copy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'board_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->_boardCopy($this->_reqP('board_idx'));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * BEST 적용
     */
    public function storeIsBest()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->_boardIsBest(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 모의고사별 공지사항 등록/수정 폼
     * @param array $params
     */
    public function createDetail($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $this->_req('prod_code');
        $site_code = $this->_req('site_code');

        $method = 'POST';
        $data = null;
        $board_idx = null;

        // 기존 교수 기본정보 조회
        //모의고사 상품 조회
        $prod_data = $this->_prodData($prod_code);

        if (empty($params[0]) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ExamProblemYear,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName
            ';
            $method = 'PUT';
            $board_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'LB.BoardIdx' => $board_idx,
                    'LB.IsStatus' => 'Y'
                ]
            ]);
            $arr_condition_file = [
                'reg_type' => $this->_reg_type['admin'],
                'attach_file_type' => $this->_attach_reg_type['default']
            ];
            $data = $this->boardModel->findBoardForModify($this->boardName, $column, $arr_condition, $arr_condition_file);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
            $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
            $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
            $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
            $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);
        }

        $input_params = [
            'site_code' => $site_code,
            'cate_code[]' => $prod_data['CateCode'],
            'bm_idx' => $this->bm_idx,
            'prod_code' => $prod_code,
            'board_idx' => $board_idx,
            'reg_type' => $this->_reg_type['admin']
        ];

        $this->load->view("board/{$this->boardName}/create_detail", [
            'method' => $method,
            'boardName' => $this->boardName,
            'prod_data' => $prod_data,
            'input_params' => $input_params,
            'data' => $data,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    public function store()
    {
        $method = 'add';
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required'],
            ['field' => 'prod_code', 'label' => '모의고사코드', 'rules' => 'trim|required|integer'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
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
        $result = $this->{'_' . $method . 'Board'}($method, $inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function readDetail($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $this->_req('prod_code');

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        //모의고사 상품 조회
        $prod_data = $this->_prodData($prod_code);

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ExamProblemYear,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm
            ';

        $board_idx = $params[0];
        $arr_condition = [
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.ProdCode' => $prod_code,
                'LB.IsStatus' => 'Y'
            ]
        ];
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['admin'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardModel->findBoardForModify($this->boardName, $column, $arr_condition, $arr_condition_file);
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachFilePath'], $data['AttachFileName']);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $query_string = base64_decode(element('q',$this->_reqG(null)));
        $search_datas = json_decode($query_string,true);

        $data_PN = $this->_findBoardPrevious_Next($this->bm_idx, $board_idx, $data['IsBest'], $data['RegType'], $search_datas, '', '', $prod_code);
        $board_previous = $data_PN['previous'];     //이전글
        $board_next = $data_PN['next'];             //다음글

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $this->load->view("board/{$this->boardName}/read_detail",[
            'boardName' => $this->boardName,
            'prod_data' => $prod_data,
            'data' => $data,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'board_previous' => $board_previous,
            'board_next' => $board_next,
        ]);
    }

    /**
     * 모의고사 공지사항 삭제
     * @param array $params
     */
    public function deleteDetail($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $idx = $params[0];
        $result = $this->_delete($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * 첨부파일 다운로드
     */
    public function download()
    {
        $this->_download();
    }

    private function _setInputData($input){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->bm_idx,
                'RegType' => element('reg_type', $input),
                'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
                'ProdCode' => element('prod_code', $input),
                'Title' => element('title', $input),
                'Content' => element('board_content', $input),
                'IsUse' => element('is_use', $input),
                'ReadCnt' => (empty(element('read_count', $input)) === true) ? '0' : element('read_count', $input),
                'SettingReadCnt' => element('setting_readCnt', $input),
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        return$input_data;
    }
}