<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Assignment extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board', 'product/base/professor', 'product/on/lecture');
    protected $helpers = array('download','file');

    private $board_name = 'assignment';
    private $site_code = '';
    private $bm_idx;
    protected $prodtypeccd = '636001';  //온라인강좌
    protected $learnpatternccd = '615001'; //단강좌
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
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        redirect(site_url("/board/professor/{$this->board_name}/mainList?bm_idx={$this->bm_idx}"));
    }

    /**
     * 강사게시판 - 첨삭게시판
     */
    public function mainList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $this->load->view("board/professor/{$this->board_name}/mainList", [
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}",
        ]);
    }
    
    public function mainListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $arr_condition = [
            'ORG' => [
                'LKB' => [
                    'P.ProfIdx' => $this->_reqP('search_value'),
                    'P.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        if (empty($this->_reqP('search_site_code')) === false) {
            $arr_condition['EQ']['P.SiteCode'] = $this->_reqP('search_site_code');
        } else {
            $arr_condition['IN']['P.SiteCode'] = get_auth_site_codes();
        }

        $list = [];
        $count = $this->professorModel->listProfessorSubjectMappingForBoard(true, $arr_condition, $this->bm_idx);

        if ($count > 0) {
            $list = $this->professorModel->listProfessorSubjectMappingForBoard(false, $arr_condition, $this->bm_idx);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 강사게시판 - 강사별 첨삭게시판
     * 강사에 매핑된 단강좌목록 인덱스
     */
    public function productList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        $this->load->view("board/professor/{$this->board_name}/productList", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$arr_prof_info['SiteCode']}",
        ]);
    }

    /**
     * 강사게시판 - 강사별 첨삭게시판
     * 강사에 매핑된 단강좌목록 데이타
     */
    public function productListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.IsEdit' => 'Y',
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->_reqP('site_code'),
                'A.IsUse' =>$this->_reqP('search_is_use')
            ],
            'LKB' => [
                'E.ProfIdx_String' => $prof_idx,
            ],
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ];

        $list = [];
        $count = $this->lectureModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->lectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 과제미노출관리
     */
    public function createExceptDateModal()
    {
        $method = 'POST';
        $data = null;
        $week_arr = explode(",",",,,,,,");

        $this->load->view("board/professor/{$this->board_name}/create_except_date_modal", [
            'method' => $method,
            'week_arr' => $week_arr,
            'data' => $data
        ]);
    }

    /**
     * 과제등록관리[게시판]
     * @param array $params
     */
    public function registForBoard($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');
        $prod_code = $params[0];

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ],
            'LKB' => [
                'E.ProfIdx_String' => $prof_idx,
            ]
        ];
        $product_data = $this->lectureModel->listLecture(false, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];

        $this->load->view("board/professor/{$this->board_name}/regist/index", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->board_name,
            'prod_code' => $prod_code,
            'arr_prof_info' => $arr_prof_info,
            'product_data' => $product_data,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$product_data['SiteCode']}",
        ]);
    }

    /**
     * 과제등록관리[게시판] AJAX
     * @param array $params
     * @return CI_Output
     */
    public function registForBoardAjax($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('site_code');
        $prof_idx = $this->_req('prof_idx');
        $prod_code = $params[0];

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.ProfIdx' => $prof_idx,
                'LB.ProdCode' => $prod_code,
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

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y'
            ]
        ];

        $column = '
            LB.BoardIdx, LB.SiteCode, LBC.CateCode, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 과제등록[게시판등록]
     * @param array $params
     */
    public function createAssignmentModal($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_req('site_code');
        $cate_code = $this->_req('cate_code');
        $prof_idx = $this->_req('prof_idx');
        $board_idx = $this->_req('board_idx');
        $prod_code = $params[0];

        $input_params = [
            'site_code' => $this->site_code,
            'cate_code[]' => $cate_code,
            'bm_idx' => $this->bm_idx,
            'prof_idx' => $prof_idx,
            'board_idx' => $board_idx
        ];

        $method = 'POST';
        $data = null;

        if (empty($board_idx) === false) {
            $method = 'PUT';

            $column = '
            LB.BoardIdx, LB.SiteCode, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName
            ';

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
            $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);

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

        $this->load->view("board/professor/{$this->board_name}/regist/create_modal", [
            'boardName' => $this->board_name,
            'method' => $method,
            'input_params' => $input_params,
            'prod_code' => $prod_code,
            'data' => $data,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    public function readAssignmentModal($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_req('site_code');

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ProfIdx, LB.ProdCode,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm
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
        $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $site_code = $data['SiteCode'];
        $arr_cate_code = explode(',', $data['CateCode']);
        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        if (empty($this->site_code) === false) {
            $site_code = $this->site_code;
        }
        $get_category_array = $this->_getCategoryArray($site_code);
        if (empty($get_category_array) === true) {
            $data['arr_cate_code'] = [];
        } else {
            foreach ($arr_cate_code as $item => $code) {
                if (empty($get_category_array[$code]) === false) {
                    $data['arr_cate_code'][$code] = $get_category_array[$code];
                }
            }
        }

        $this->load->view("board/professor/{$this->board_name}/regist/read_modal", [
            'boardName' => $this->board_name,
            'prod_code' => $data['ProdCode'],
            'data' => $data,
            'getCategoryArray' => $get_category_array,
            'board_idx' => $params[0],
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$data['ProfIdx']}&site_code={$data['SiteCode']}&cate_code={$data['CateCode']}&board_idx={$data['BoardIdx']}",
        ]);
    }

    /**
     * 과제등록
     * @param array $params
     */
    public function storeAssignment($params = [])
    {
        $method = 'add';
        $idx = '';
        $prod_code = $params[0];

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code[]', 'label' => '구분', 'rules' => 'trim|required'],
            ['field' => 'bm_idx', 'label' => '게시판식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prof_idx', 'label' => '교수식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('board_idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('board_idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false), $prod_code);

        //_addBoard, _modifyBoard
        $result = $this->{'_' . $method . 'Board'}($method, $inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
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
        $result = $this->_delete($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * 과제제출목록관리
     * @param array $params
     */
    public function issueForBoard($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');
        $prod_code = $params[0];

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ],
            'LKB' => [
                'E.ProfIdx_String' => $prof_idx,
            ]
        ];
        $product_data = $this->lectureModel->listLecture(false, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];

        $this->load->view("board/professor/{$this->board_name}/issue/index", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->board_name,
            'prod_code' => $prod_code,
            'arr_prof_info' => $arr_prof_info,
            'product_data' => $product_data,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$product_data['SiteCode']}",
        ]);
    }

    /**
     * 과제제출목록관리 Ajax
     */
    public function issueForBoardAjax()
    {
        $count = 0;
        $list = [];

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 첨부파일 다운로드
     */
    public function download()
    {
        $this->_download();
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

    /**
     * 게시판 등록/수정 데이타 셋팅
     * @param $input
     * @param $prod_code
     * @return array
     */
    private function _setInputData($input, $prod_code){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => element('bm_idx', $input),
                'ProdCode' => $prod_code,
                'ProfIdx' => element('prof_idx', $input),
                'RegType' => $this->_reg_type['admin'],
                'Title' => element('title', $input),
                'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
                'Content' => element('board_content', $input),
                'IsUse' => element('is_use', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'SettingReadCnt' => '0',
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        return$input_data;
    }
}