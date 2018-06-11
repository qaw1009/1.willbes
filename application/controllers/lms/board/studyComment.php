<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class studyComment extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'sys/Site', 'board/board', 'product/base/subject', 'product/base/professor', 'product/on/lecture');
    protected $helpers = array();

    private $board_name = 'studyComment';
    private $site_code = '';
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
     * 수강후기관리 인덱스 (리스트페이지)
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        //검색상태조회
        $arr_search_data = $this->getBoardSearchingArray($this->bm_idx);

        //카테고리 조회(구분)
        $arr_category = $this->_getCategoryArray('');

        //과목조회
        $arr_subject = $this->_getSubjectArray();

        //교수조회
        $arr_professor = $this->_getProfessorArray();

        $this->load->view("board/{$this->board_name}/index", [
            'bm_idx' => $this->bm_idx,
            'arr_search_data' => $arr_search_data['arr_search_data'],
            'ret_search_site_code' => $arr_search_data['ret_search_site_code'],
            'arr_category' => $arr_category,
            'arr_subject' => $arr_subject,
            'arr_professor' => $arr_professor,
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}"
        ]);
    }

    /**
     * 수강후기 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('search_site_code');

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.IsBest' => 'N',
                'LB.SiteCode' => $this->site_code,
                'LB.SubjectIdx' => $this->_reqP('search_subject'),
                'LB.ProfIdx' => $this->_reqP('search_professor'),
                'LB.IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if ($this->_reqP('search_chk_create_by_admin') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'LB.RegType' => '1'
            ]);
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
            LB.RegType, LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LBC.CateCode, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.SubjectIdx, PS.SubjectName, LB.ProfIdx, PROFESSOR.ProfNickName, LB.LecScore, LB.RegMemId, LB.RegMemName, LB.ProdCode, lms_product.ProdName,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName
            ';

        $best_data = $this->_bestBoardData($column);
        $best_count = $best_data['count'];
        $best_list = $best_data['data'];

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->_reqP('length'), $this->_reqP('start'), ['LB.BoardIdx' => 'desc'], $column);
        }

        if ($best_count > 0) {
            $count = $count + $best_count;
            $list = array_merge($best_list, $list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
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

        $result = $this->_boardIsBest(json_decode($this->_req('params'), true), json_decode($this->_req('dis_params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 라이브강의자료실 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $method = 'POST';
        $data = null;
        $board_idx = null;
        $site_code = '';
        $get_category_array = [];

        //과목조회
        $arr_subject = $this->_getSubjectArray();

        //교수조회
        $arr_professor = $this->_getProfessorArray();

        if (empty($params[0]) === false) {
            $column = '
            LB.RegType, LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.SubjectIdx, PS.SubjectName, LB.ProfIdx, PROFESSOR.ProfNickName, LB.LecScore, LB.RegMemId, LB.RegMemName, LB.ProdCode,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName
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
            $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
            $site_code = $data['SiteCode'];
            $data['arr_cate_code'] = explode(',', $data['CateCode']);
            $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
            $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
            $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);

            $get_category_array = $this->_getCategoryArray($site_code);
        }

        $this->load->view("board/{$this->board_name}/create", [
            'boardName' => $this->board_name,
            'bmIdx' => $this->bm_idx,
            'site_code' => $site_code,
            'arr_subject' => $arr_subject,
            'arr_professor' => $arr_professor,
            'getCategoryArray' => $get_category_array,
            'method' => $method,
            'data' => $data,
            'board_idx' => $board_idx,
            'arr_reg_type' => $this->_reg_type,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    /**
     * 게시판 글 등록
     */
    public function store()
    {
        $method = 'add';
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'site_category[]', 'label' => '구분', 'rules' => 'trim|required'],
            ['field' => 'subject_idx', 'label' => '과목명', 'rules' => 'trim|required'],
            ['field' => 'prof_idx', 'label' => '교수명', 'rules' => 'trim|required'],

            /*['field' => 'prod_code', 'label' => '강좌명', 'rules' => 'trim|required'],*/
            /*['field' => 'lec_score', 'label' => '평점', 'rules' => 'trim|required'],*/

            ['field' => 'reg_mem_name', 'label' => '회원명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
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

        //_addBoard, _modifyBoard
        $result = $this->{'_' . $method . 'Board'}($method, $inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 수강후기관리 Read 페이지
     * @param array $params
     */
    public function read($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.RegType, LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LB.SubjectIdx, PS.SubjectName, LB.ProfIdx, PROFESSOR.ProfNickName, LB.LecScore, LB.RegMemId, LB.RegMemName, LB.ProdCode
            ';
        $board_idx = $params[0];
        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => $this->_reg_type['admin']
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

        $arr_condition = ([
            'EQ'=>[
                'BmIdx' => $this->bm_idx,
                'IsStatus' => 'Y',
                'IsBest' => $data['IsBest']
            ]
        ]);

        //이전글
        $arr_condition_previous = array_merge($arr_condition, ['LT'=>['BoardIdx' => $board_idx]]);
        $board_previous = $this->boardModel->findBoardPrevious($arr_condition_previous);

        //다음글
        $arr_condition_next = array_merge($arr_condition, ['GT'=>['BoardIdx' => $board_idx]]);
        $board_next = $this->boardModel->findBoardNext($arr_condition_next);

        $site_code = $data['SiteCode'];
        $arr_cate_code = explode(',', $data['CateCode']);
        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);

        if (empty($this->site_code) === false) {
            $site_code = $this->site_code;
        }
        $get_category_array = $this->_getCategoryArray($site_code);

        foreach ($arr_cate_code as $item => $code) {
            $data['arr_cate_code'][$code] = $get_category_array[$code];
        }

        $this->load->view("board/{$this->board_name}/read",[
            'boardName' => $this->board_name,
            'data' => $data,
            'getCategoryArray' => $get_category_array,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'board_previous' => $board_previous,
            'board_next' => $board_next,
        ]);
    }

    /**
     * 수강후기관리 강좌데이터 기준 Read 페이지
     */
    public function readLecture($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prod_code = $params[0];

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            lms_site.SiteName, lms_product.ProdName, lms_sys_category.CateName, lms_product_subject.SubjectName, vw_product_r_professor_concat.wProfName_String
            ';
        $arr_condition = ([
            'EQ'=>[
                'lms_product.ProdCode' => $prod_code,
                'lms_product.IsStatus' => 'Y'
            ]
        ]);
        $data = $this->findProductForStudyBoard($arr_condition, $column);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view("board/{$this->board_name}/readLecture",[
            'boardName' => $this->board_name,
            'data' => $data,
            'prod_code' => $prod_code
        ]);
    }

    /**
     * 게시판 삭제
     * @param array $params
     */
    public function delete($params = [])
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
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 운영사이트에 따른 카테고리(구분)
     * @param array $params
     */
    public function getAjaxSiteCategoryInfo($params = [])
    {
        $result = $this->_getSiteCategoryInfo($params);
        $this->json_result(true, '', [], $result);
    }

    /**
     * 게시판 BEST 정보 조회
     * @param $column
     * @return array
     */
    private function _bestBoardData($column)
    {
        $arr_best_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1',
                'LB.IsBest' => 'Y',
                'LB.SiteCode' => $this->site_code,
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y'
            ]
        ];

        $best_list = $this->boardModel->listAllBoard($this->board_name,false, $arr_best_condition, $sub_query_condition, '10', '', ['LB.BoardIdx' => 'desc'], $column);
        $datas = [
            'count' => count($best_list),
            'data' => $best_list
        ];

        return $datas;
    }

    private function _setInputData($input){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->bm_idx,
                'SubjectIdx' => element('subject_idx', $input),
                'ProfIdx' => element('prof_idx', $input),
                'ProdCode' => element('prod_code', $input),
                'LecScore' => element('lec_score', $input),
                'RegMemName' => element('reg_mem_name', $input),
                'RegType' => element('reg_type', $input),
                'Title' => element('title', $input),
                'IsBest' => (element('is_best', $input) == 'Y') ? 'Y' : 'N',
                'Content' => element('board_content', $input),
                'IsUse' => element('is_use', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'SettingReadCnt' => element('setting_readCnt', $input),
            ],
            'board_r_category' => [
                'site_category' => element('site_category', $input)
            ]
        ];

        return$input_data;
    }
}