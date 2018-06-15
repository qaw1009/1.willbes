<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Material extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board', 'product/base/professor', 'product/base/subject');
    protected $helpers = array();

    private $board_name = 'Material';
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
    private $_groupCcd = [
        'type_group_ccd' => '632' //유형 그룹 코드 = 자료유형
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
     * 강사게시판 - 메인 학습자료실
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
                    //'P.wProfId' => $this->_reqP('search_value'),
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
     * 강사게시판 - 강사별 학습자료실
     * @param array $params
     */
    public function detailList($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        //검색상태조회
        $arr_search_data = $this->getBoardSearchingArray($this->bm_idx);

        //카테고리 조회(구분)
        $arr_category = $this->_getCategoryArray('');

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        //과목
        $arr_subject = $this->professorModel->getProfessorSubjectArray($prof_idx);

        //자료유형
        $arr_type_group_ccd = $this->_getCcdArray($this->_groupCcd['type_group_ccd']);

        $this->load->view("board/professor/{$this->board_name}/detailList", [
            'bm_idx' => $this->bm_idx,
            'arr_search_data' => $arr_search_data['arr_search_data'],
            'ret_search_site_code' => $arr_search_data['ret_search_site_code'],
            'arr_category' => $arr_category,
            'arr_subject' => $arr_subject,
            'boardName' => $this->board_name,
            'arr_type_group_ccd' => $arr_type_group_ccd,
            'arr_prof_info' => $arr_prof_info,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}",
        ]);
    }

    /**
     * 강사게시판 - 강사별 공지사항
     * @param array $params
     * @return CI_Output
     */
    public function detailListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('search_site_code');
        $prof_idx = $this->_req('prof_idx');
        $is_best_type = ($this->_reqP('search_chk_hot_display') == 1) ? '1' : '0';

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.ProfIdx' => $prof_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1',
                'LB.IsBest' => 'N',
                'LB.SubjectIdx' => $this->_reqP('search_subject'),
                'LB.IsUse' => $this->_reqP('search_is_use'),
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
                'subLBrC.IsStatus' => 'Y',
                'subLBrC.CateCode' => $this->_reqP('search_category')
            ]
        ];

        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LBC.CateCode, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ExamProblemYear,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName,
            LB.AreaCcd, LB.SubjectIdx, PS.SubjectName, LB.TypeCcd, LSC.CcdName AS TypeCcdName
        ';

        $best_count = 0;
        $best_list = [];
        if ($is_best_type == 0) {
            $best_data = $this->_bestBoardData($column, $prof_idx);
            $best_count = $best_data['count'];
            $best_list = $best_data['data'];
        }

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.BoardIdx' => 'desc'], $column);
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
     * 게시글 복사
     * @param array $params
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

        $result = $this->_boardIsBest(json_decode($this->_req('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 강사게시판 - 강사별 공지사항 등록/수정 폼
     * @param array $params
     */
    public function createDetail($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        $method = 'POST';
        $data = null;
        $board_idx = null;
        $site_code = '';
        $get_category_array = [];

        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        if (empty($params[0]) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ExamProblemYear,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName,
            LB.AreaCcd, LB.SubjectIdx, PS.SubjectName, LB.TypeCcd, LSC.CcdName AS TypeCcdName,
            LB.ProdCode
            ';
            $method = 'PUT';
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
            $site_code = $data['SiteCode'];
            $data['arr_cate_code'] = explode(',', $data['CateCode']);
            $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
            $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
            $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);

            //사이트카테고리 (구분)
            $get_category_array = $this->_getCategoryArray($site_code);
        }

        //과목
        $arr_subject = $this->professorModel->getProfessorSubjectArray($prof_idx);

        //자료유형
        $arr_type_group_ccd = $this->_getCcdArray($this->_groupCcd['type_group_ccd']);

        $this->load->view("board/professor/{$this->board_name}/create_Detail", [
            'boardName' => $this->board_name,
            'bmIdx' => $this->bm_idx,
            'site_code' => $site_code,
            'arr_prof_info' => $arr_prof_info,
            'getCategoryArray' => $get_category_array,
            'arr_subject' => $arr_subject,
            'arr_type_group_ccd' => $arr_type_group_ccd,
            'method' => $method,
            'data' => $data,
            'board_idx' => $board_idx,
            'arr_reg_type' => $this->_reg_type,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    public function store()
    {
        $method = 'add';
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'site_category[]', 'label' => '구분', 'rules' => 'trim|required'],
            ['field' => 'subject_idx', 'label' => '과목', 'rules' => 'trim|required|integer'],
            ['field' => 'type_ccd', 'label' => '자료유형', 'rules' => 'trim|required|integer'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false), $prof_idx);

        //_addBoard, _modifyBoard
        $result = $this->{'_' . $method . 'Board'}($method, $inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 강사게시판 - 강사별 공지사항 뷰 페이지
     */
    public function readDetail($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        $column = '
            LB.BoardIdx, LB.SiteCode, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ExamProblemYear,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LB.AreaCcd, LB.SubjectIdx, PS.SubjectName, LB.TypeCcd, LSC.CcdName AS TypeCcdName
            ';
        $board_idx = $params[0];
        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.ProfIdx' => $prof_idx,
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
                'ProfIdx' => $prof_idx,
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

        $get_category_array = $this->_getCategoryArray($site_code);

        foreach ($arr_cate_code as $item => $code) {
            $data['arr_cate_code'][$code] = $get_category_array[$code];
        }

        $this->load->view("board/professor/{$this->board_name}/read_detail",[
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'data' => $data,
            'getCategoryArray' => $get_category_array,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'board_previous' => $board_previous,
            'board_next' => $board_next,
        ]);
    }

    /**
     * 단강좌정보
     */
    public function lecListModal()
    {
        $method = 'POST';
        $data = null;

        $this->load->view("board/professor/{$this->boardName}/lecList_modal",[
            'boardName' => $this->boardName,
            'method' => $method,
            'data' => $data
        ]);
    }

    /**
     * 단강좌정보
     */
    public function lecListAjax()
    {

    }

    /**
     * 게시판 삭제
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
     * 운영사이트에 따른 카테고리(구분), 캠퍼스 정보 리턴
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
     * @param $prof_idx
     * @return array
     */
    private function _bestBoardData($column, $prof_idx)
    {
        $arr_best_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.ProfIdx' => $prof_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1',
                'LB.IsBest' => 'Y'
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y'
            ]
        ];

        $best_list = $this->boardModel->listAllBoard($this->board_name,false, $arr_best_condition, $sub_query_condition, $this->site_code, '10', '', ['LB.BoardIdx' => 'desc'], $column);
        $datas = [
            'count' => count($best_list),
            'data' => $best_list
        ];

        return $datas;
    }

    private function _setInputData($input, $prof_idx){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->bm_idx,
                'RegType' => element('reg_type', $input),
                'ProfIdx' => $prof_idx,
                'TypeCcd' => element('type_ccd', $input),
                'SubjectIdx' => element('subject_idx', $input),
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