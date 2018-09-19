<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Faq extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board');
    protected $helpers = array('download','file');

    private $board_name = 'faq';
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
        $faq_group_ccd = $this->_getFaqGroupInfo();
        
        //FAQ분류리스트
        $faq_ccd_list = $this->_listAllCode(array_keys($faq_group_ccd));

        $faq_ccd = [];
        if (empty($group_ccd) === false) {
            $faq_ccd = $this->_getCcdArray($group_ccd);
        }

        //FAQ구분별 게시글 횟수
        $faq_group_ccd_countList = $this->boardModel->getFaqBoardCcdCountList($this->bm_idx, array_keys($faq_group_ccd));

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

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
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

        if ($this->_reqP('search_is_best') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '1']);
        } else if ($this->_reqP('search_is_best') == 2) {
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
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LB.FaqGroupTypeCcd, LB.FaqTypeCcd, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName,
            LSC_FAQ1.CcdName as FaqGroupCcdName, LSC_FAQ2.CcdName as FaqCcdName,
            LB.OrderNum
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'asc'], $column);
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

        $result = $this->_boardIsBest(json_decode($this->_req('params'), true));
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

        //캠퍼스 조회
        $arr_campus = $this->_getCampusArray('');

        if (empty($params[0]) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LB.FaqGroupTypeCcd, LB.FaqTypeCcd, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
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

        //FAQ구분
        $faq_group_ccd = $this->_getFaqGroupInfo();

        //FAQ분류리스트
        $faq_ccd_list = $this->_listAllCode(array_keys($faq_group_ccd));

        $this->load->view("board/{$this->board_name}/create", [
            'boardName' => $this->board_name,
            'bmIdx' => $this->bm_idx,
            'arr_campus' => $arr_campus,
            'campus_all_ccd' => $this->codeModel->campusAllCcd,
            'faq_group_ccd' => $faq_group_ccd,
            'faq_ccd_list' => $faq_ccd_list,
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
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
        ];

        //사이트코드 통합코드가 아닐경우 카테고리 체크
        if ($this->_reqP('site_code') != config_item('app_intg_site_code')) {
            $rules = array_merge($rules, [
                ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required']
            ]);
        }

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
            LB.BoardIdx, LB.IsBest, LB.RegType, LB.SiteCode, LB.FaqGroupTypeCcd, LB.FaqTypeCcd, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LSC_FAQ1.CcdName as FaqGroupCcdName, LSC_FAQ2.CcdName as FaqCcdName
        ';
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

        $query_string = base64_decode(element('q',$this->_reqG(null)));
        $search_datas = json_decode($query_string,true);

        $data_PN = $this->_findBoardPrevious_Next($this->bm_idx, $board_idx, $data['IsBest'], $data['RegType'], $search_datas);
        $board_previous = $data_PN['next'];     //다음글
        $board_next = $data_PN['previous'];     //이전글



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
        $select_faq_group = $this->_req('select_group_ccd');

        //FAQ구분
        $faq_group_ccd = $this->_getFaqGroupInfo();
        $method = 'POST';

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => '1',
                'LB.SiteCode' => $this->site_code
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
            'select_group_ccd' => $select_faq_group
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
     * 첨부파일 다운로드
     * @param array $fileinfo
     */
    public function download($fileinfo = [])
    {
        $this->_download($fileinfo);
    }

    private function _setInputData($input){
        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->bm_idx,
                'FaqGroupTypeCcd' => element('faq_group_ccd', $input)
            ]
        ];
        $get_order_num = $this->getMaxOrderNum($arr_condition);
        $order_num = $get_order_num['OrderNum'];

        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->bm_idx,
                'FaqGroupTypeCcd' => element('faq_group_ccd', $input),
                'FaqTypeCcd' => element('faq_ccd', $input),
                'CampusCcd' => element('campus_ccd', $input),
                'RegType' => element('reg_type', $input),
                'Title' => element('title', $input),
                'OrderNum' => (empty($order_num) === true) ? '1' : $order_num + 1,
                'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
                'Content' => element('board_content', $input),
                'IsUse' => element('is_use', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'SettingReadCnt' => element('setting_readCnt', $input),
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        return$input_data;
    }
}