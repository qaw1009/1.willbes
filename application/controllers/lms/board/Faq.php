<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Faq extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board');
    protected $helpers = array();

    private $board_name = 'faq';
    private $site_code = '';
    private $bm_idx;
    private $_groupCcd = [
        'faq_group_type_ccd' => ['623','624','625','626','627','628','629'],
    ];
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
     * FAQ 게시판 인덱스 (리스트페이지)
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $group_ccd = $this->_req('group_ccd');

        //검색상태조회
        $arr_search_data = $this->getBoardSearchingArray($this->bm_idx);

        //카테고리 조회(구분)
        $arr_category = $this->_getCategoryArray('');

        //캠퍼스 조회
        $arr_campus = $this->_getCampusArray('');

        //FAQ구분
        $faq_group_ccd = $this->_getFaqGroupInfo($this->_groupCcd['faq_group_type_ccd']);

        $faq_ccd = [];
        if (empty($group_ccd) === false) {
            $faq_ccd = $result = $this->_getCcdArray($group_ccd);
        }

        $faq_ccd_list = $result = $this->_listAllCode($this->_groupCcd['faq_group_type_ccd']);

        //FAQ구분별 게시글 횟수
        $faq_group_ccd_countList = $this->boardModel->getFaqBoardCcdCountList($this->bm_idx, $this->_groupCcd['faq_group_type_ccd']);

        $this->load->view("board/{$this->board_name}/index", [
            'bm_idx' => $this->bm_idx,
            'arr_search_data' => $arr_search_data['arr_search_data'],
            'ret_search_site_code' => $arr_search_data['ret_search_site_code'],
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
            'boardName' => $this->board_name,
            'faq_group_ccd' => $faq_group_ccd,
            'faq_ccd' => $faq_ccd,
            'faq_ccd_list' => $faq_ccd_list,
            'faq_group_ccd_countList' => $faq_group_ccd_countList,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&site_code={$this->site_code}&group_ccd={$group_ccd}",
        ]);
    }

    public function listAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('search_site_code');
        $is_best_type = ($this->_reqP('search_chk_hot_display') == 1) ? '1' : '0';

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1',
                'LB.IsBest' => 'N',
                'LB.SiteCode' => $this->site_code,
                'LB.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'LB.FaqGroupTypeCcd' => $this->_reqP('search_group_faq_ccd'),
                'LB.FaqTypeCcd' => $this->_reqP('search_faq_type'),
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
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LB.FaqGroupTypeCcd, LB.FaqTypeCcd, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName,
            LSC_FAQ1.CcdName as FaqGroupCcdName, LSC_FAQ2.CcdName as FaqCcdName,
            LB.OrderNum
        ';

        $best_count = 0;
        $best_list = [];
        if ($is_best_type == 0) {
            $best_data = $this->_bestBoardData($column);
            $best_count = $best_data['count'];
            $best_list = $best_data['data'];
        }

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->_reqP('length'), $this->_reqP('start'), ['LB.BoardIdx' => 'asc'], $column);
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
     * FAQ 게시판 등록/수정 폼
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

        if (empty($params[0]) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LB.FaqGroupTypeCcd, LB.FaqTypeCcd, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName
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

        //FAQ구분
        $faq_group_ccd = $this->_getFaqGroupInfo($this->_groupCcd['faq_group_type_ccd']);

        $this->load->view("board/{$this->board_name}/create", [
            'boardName' => $this->board_name,
            'bmIdx' => $this->bm_idx,
            'site_code' => $site_code,
            /*'getSiteArray' => $get_site_array,*/
            'getCategoryArray' => $get_category_array,
            'faq_group_ccd' => $faq_group_ccd,
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

        //_addBoard, _modifyBoard
        $result = $this->{'_' . $method . 'Board'}($method, $inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function read($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.BoardIdx, LB.SiteCode, LB.FaqGroupTypeCcd, LB.FaqTypeCcd, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LSC_FAQ1.CcdName as FaqGroupCcdName, LSC_FAQ2.CcdName as FaqCcdName
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
                'IsBest' => $data['IsBest'],
                'RegType' => $this->_reg_type['admin']
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
     * 운영사이트에 따른 카테고리(구분), 캠퍼스 정보 리턴
     * @param array $params
     */
    public function getAjaxSiteCategoryInfo($params = [])
    {
        $result = $this->_getSiteCategoryInfo($params);
        $this->json_result(true, '', [], $result);
    }

    /**
     * 캠퍼스 정보 리턴
     * @param array $params
     */
    public function getAjaxCampusInfo($params = [])
    {
        $result = $this->_getCampusInfo($params);
        $this->json_result(true, '', [], $result);
    }

    /**
     * FAQ 분류
     * @param array $params
     */
    public function getAjaxFaqList($params = [])
    {
        $result = $this->_getCcdArray($params[0]);
        $this->json_result(true, '', [], $result);
    }

    /**
     * FAQ 정렬 변경
     */
    public function createOrderByModal()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        //FAQ구분
        $faq_group_ccd = $this->_getFaqGroupInfo($this->_groupCcd['faq_group_type_ccd']);
        $method = 'POST';

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1',
                'LB.SiteCode' => $this->site_code,
                //'LB.FaqGroupTypeCcd' => (empty($this->_req('group_ccd')) === true) ? $this->_groupCcd['faq_group_type_ccd'][0] : $this->_req('group_ccd'),
                //'LB.FaqGroupTypeCcd' => (empty($this->_reqP('model_faq_group_ccd')) === true) ? $this->_groupCcd['faq_group_type_ccd'][0] : $this->_reqP('model_faq_group_ccd')
            ]
        ];

        $column = "
            LB.BoardIdx, LB.Title, LB.IsUse, LB.OrderNum, LB.FaqGroupTypeCcd,
            LSC_FAQ1.CcdName as FaqGroupCcdName, LSC_FAQ2.CcdName as FaqCcdName
        ";

        $list = $this->boardModel->listFaqBoardForOrderBy($arr_condition, $column);

        $this->load->view("board/{$this->board_name}/create_orderby_modal",[
            'boardName' => $this->board_name,
            'method' => $method,
            'data' => $list,
            'faq_group_ccd' => $faq_group_ccd,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&site_code={$this->site_code}",
        ]);
    }

    /**
     * OrderValue Update
     */
    public function updateAjaxOrderBy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'faq_group_ccd', 'label' => 'FAQ구분', 'rules' => 'trim|required|integer'],
            ['field' => 'target_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'distance', 'label' => '순위', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $data = [
            'bm_idx' => $this->_req('bm_idx'),
            'faq_group_ccd' => $this->_reqP('faq_group_ccd'),
            'target_idx' => $this->_reqP('target_idx'),
            'distance' => $this->_reqP('distance')
        ];

        $result = $this->boardModel->modifyOrderByBoard($data);

        $this->json_result(true, '정렬이 변경되었습니다.', [], $result);
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
                'FaqGroupTypeCcd' => element('faq_group_ccd', $input),
                'FaqTypeCcd' => element('faq_ccd', $input),
                'CampusCcd' => element('campus_ccd', $input),
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