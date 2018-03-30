<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Notice extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board');
    protected $helpers = array();

    private $board_name = 'notice';
    private $bm_idx;
    private $campus_on_off = 'off';   //캠퍼스노출상태값

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 공지게시판 인덱스 (리스트페이지)
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bmIdx'];
        $data = [];

        //사이트리스트
        $base_site_infos = $this->_getBaseSiteArray();

        $this->load->view("board/{$this->board_name}/index", [
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => '&bm_idx='.$this->bm_idx,
        ]);
    }

    /**
     * 공지사항 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'RegType' => '1',
                'BmIdx' => $this->bm_idx,
                //'SiteCode' => '',
                'wSaleCcd' => $this->_reqP('search_sale_ccd')
            ],
            'BDT' => ['RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]],
            'ORG' => [
                'LKB' => [
                    'Title' => $this->_reqP('search_value'),
                    'Content' => $this->_reqP('search_value'),
                ]
            ]
        ];

        $list = [];
        $count = $this->boardModel->listAllBoard(true, $arr_condition);

        if ($count > 0) {
            $column = 'BoardIdx, SiteCode, CampusCcd';
            $list = $this->boardModel->listAllBoard(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['BoardIdx' => 'desc'], $column);

            /*// 사용하는 코드값 조회
            $codes = $this->codeModel->getCcdInArray(['109', '110', '117']);

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'wAdminDeptCcdName' => ['wAdminDeptCcd' => $codes['109']],
                'wAdminPositionCcdName' => ['wAdminPositionCcd' => $codes['110']],
                'wLoginLogCcdName' => ['wLoginLogCcd' => $codes['117']]
            ], true);*/
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 공지게시판 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bmIdx'];

        $method = 'POST';
        $data = null;
        $board_idx = null;

        //권한유형별 운영사이트 목록 조회
        $get_site_array = $this->_getSiteArray();

        //사이트카테고리 (구분)
        $first_site_key = key($get_site_array);
        $get_category_array = $this->_getCategoryArray($first_site_key);

        $this->load->view("board/{$this->board_name}/create", [
            'boardName' => $this->board_name,
            'bmIdx' => $this->bm_idx,
            'getSiteArray' => $get_site_array,
            'getCategoryArray' => $get_category_array,
            'campusOnOff' => $this->campus_on_off,
            'method' => $method,
            'data' => $data,
            'board_idx' => $board_idx,
            'attach_file_cnt' => 2
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
        $this->bm_idx = $board_params['bmIdx'];

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'site_category[]', 'label' => '구분', 'rules' => 'trim|required'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            /*['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required|'],*/
        ];

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
        }

        if ($this->validate($rules) === false) {
            return;
        }
        $inputData = $this->_setInputData($this->_reqP(null, false));

        //_addBoard, _modifyBoard
        $result = $this->{'_' . $method . 'Board'}($method, $inputData);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function read($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bmIdx'];

        $data = null;
        $this->load->view("board/{$this->board_name}/read",[
            'boardName' => $this->board_name,
            'campusOnOff' => $this->campus_on_off,
            'data' => $data
        ]);
    }

    /**
     * 운영사이트에 따른 카테고리(구분), 캠퍼스 정보 리턴
     * @param array $params
     */
    public function getAjaxSiteCategoryInfo($params = [])
    {
        $resultSiteArray = $this->_listSite('SiteCode,SiteName,IsCampus', $params[0]);
        $get_site_array = [];
        foreach ($resultSiteArray as $keys => $vals) {
            foreach ($vals as $key => $val) {
                $get_site_array[$vals['SiteCode']] = array(
                    'SiteName' => $vals['SiteName'],
                    'IsCampus' => $vals['IsCampus']
                );
            }
        }

        //사이트카테고리
        $result['category'] = $this->_getCategoryArray($params[0]);
        //캠퍼스
        $result['campus'] = $this->_getCampusArray($params[0]);

        //캠퍼스 사용 유무
        $result['isCampus'] = $get_site_array[$params[0]]['IsCampus'];
        $this->json_result(true, '', [], $result);
    }

    /**
     * 캠퍼스 정보 리턴
     * @param array $params
     */
    public function getAjaxCampusInfo($params = [])
    {
        $result_site_array = $this->_listSite('SiteCode,SiteName,IsCampus', $params[0]);
        $get_site_array = [];
        foreach ($result_site_array as $keys => $vals) {
            foreach ($vals as $key => $val) {
                $get_site_array[$vals['SiteCode']] = array(
                    'SiteName' => $vals['SiteName'],
                    'IsCampus' => $vals['IsCampus']
                );
            }
        }

        $result['campus'] = $this->_getCampusArray($params[0]);
        //캠퍼스 사용 유무
        $result['isCampus'] = $get_site_array[$params[0]]['IsCampus'];
        $this->json_result(true, '', [], $result);
    }

    private function _setInputData($input){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->bm_idx,
                'CampusCcd' => element('campus_ccd', $input),
                'RegType' => element('reg_type', $input),
                'Title' => element('title', $input),
                'isBest' => element('is_best', $input),
                'Content' => element('board_content', $input),
                'IsUse' => element('is_use', $input),
                'ReadCnt' => '0',
                'SettingReadCnt' => element('setting_readCnt', $input),
                'RegAdminIdx'=> $this->session->userdata('admin_idx')
            ],
            'board_r_category' => [
                'site_category' => element('site_category', $input)
            ]
        ];

        return$input_data;
    }
}