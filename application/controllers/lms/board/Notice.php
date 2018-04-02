<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Notice extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board');
    protected $helpers = array();

    private $board_name = 'notice';
    private $site_code = '';
    private $bm_idx;

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
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $board_params['site_code'];

        $this->load->view("board/{$this->board_name}/index", [
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&site_code={$this->site_code}",
        ]);
    }

    /**
     * 공지사항 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $board_params['site_code'];

        $best_data = $this->_bestBoardData();
        $best_count = $best_data['count'];
        $best_list = $best_data['data'];

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.RegType' => '1',
                'LB.IsBest' => 'N',
                'LB.SiteCode' => $this->site_code,
                //'wSaleCcd' => $this->_reqP('search_sale_ccd')
            ],
            /*'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]],*/
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

        $list = [];
        $column = 'LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LBC.CateCode, LC.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, B.wAdminName';
        $count = $this->boardModel->listAllBoard(true, $arr_condition);



        if ($count > 0) {
            $list = $this->boardModel->listAllBoard(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['LB.BoardIdx' => 'desc'], $column);

            /*// 사용하는 코드값 조회
            $codes = $this->codeModel->getCcdInArray(['109', '110', '117']);

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'wAdminDeptCcdName' => ['wAdminDeptCcd' => $codes['109']],
                'wAdminPositionCcdName' => ['wAdminPositionCcd' => $codes['110']],
                'wLoginLogCcdName' => ['wLoginLogCcd' => $codes['117']]
            ], true);*/
        }

        if ($best_count > 0) {
            $count = $count + $best_count;
            $list = array_merge($best_list, $list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'best_count' => $best_count,
            'data' => $list,
        ]);
    }

    public function copy($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'board_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->_boardCopy($this->_req('board_idx'));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 공지게시판 등록/수정 폼
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
            'method' => $method,
            'data' => $data,
            'board_idx' => $board_idx,
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
        $this->bm_idx = $board_params['bm_idx'];

        $data = null;
        $this->load->view("board/{$this->board_name}/read",[
            'boardName' => $this->board_name,
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

    /**
     * 게시판 BEST 정보 조회
     * @return array
     */
    private function _bestBoardData()
    {
        $arr_best_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.RegType' => '1',
                'LB.IsBest' => 'Y',
                'LB.SiteCode' => $this->site_code,
                //'wSaleCcd' => $this->_reqP('search_sale_ccd')
            ]
        ];

        $best_list = [];
        $best_count = $this->boardModel->listAllBoard(true, $arr_best_condition);
        $column = 'LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LBC.CateCode, LC.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, B.wAdminName';

        if ($best_count > 0) {
            $best_list = $this->boardModel->listAllBoard(false, $arr_best_condition, '10', '', ['LB.BoardIdx' => 'desc'], $column);
        }

        $datas = [
            'count' => $best_count,
            'data' => $best_list
        ];

        return $datas;
    }

    private function _setInputData($input){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => $this->bm_idx,
                'CampusCcd' => element('campus_ccd', $input),
                'RegType' => element('reg_type', $input),
                'Title' => element('title', $input),
                'IsBest' => (element('is_best', $input) == 'Y') ? 'Y' : 'N',
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