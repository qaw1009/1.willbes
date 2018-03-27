<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board//BaseBoard.php';

class Notice extends BaseBoard
{
    protected $tempModels = array('sys/boardMaster', 'board/board');
    protected $helpers = array();

    private $boardName = 'notice';
    private $bmIdx;
    private $subMenu;
    private $campusOnOff = 'off';   //캠퍼스노출상태값

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->tempModels);
        parent::__construct();
    }

    /**
     * 공지게시판 인덱스 (리스트페이지)
     */
    public function index()
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];
        $this->subMenu = $boardParams['subMenu'];
        $data = [];

        //사이트리스트
        $baseSiteInfos = $this->_getBaseSiteArray();

        $this->load->view("board/{$this->boardName}/index", [
            'boardName' => $this->boardName,
            'baseSiteInfos' => $baseSiteInfos,
            'campusOnOff' => $this->campusOnOff,
            'boardDefaultQueryString' => '&bm_idx='.$this->bmIdx.'&sub_menu='.$this->subMenu,
            'data' => $data
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
                'BmIdx' => $this->bmIdx,
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
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];
        $this->subMenu = $boardParams['subMenu'];

        $method = 'POST';
        $data = null;
        $bnidx = null;

        //권한유형별 운영사이트 목록 조회
        /*$getSiteArray = $this->_getSiteArray();*/
        $resultSiteArray = $this->_getSiteArray('SiteCode,SiteName,IsCampus');

        $getSiteArray = [];
        foreach ($resultSiteArray as $keys => $vals) {
            foreach ($vals as $key => $val) {
                $getSiteArray[$vals['SiteCode']] = array(
                    'SiteName' => $vals['SiteName'],
                    'IsCampus' => $vals['IsCampus']
                );
            }
        }

        //사이트카테고리 (구분)
        $firstSiteKey = key($getSiteArray);
        $getCategoryArray = $this->_getCategoryArray($firstSiteKey);

        $this->load->view("board/{$this->boardName}/create", [
            'boardName' => $this->boardName,
            'bmIdx' => $this->bmIdx,
            'subMenu' => $this->subMenu,
            'getSiteArray' => $getSiteArray,
            'getCategoryArray' => $getCategoryArray,
            'campusOnOff' => $this->campusOnOff,
            'method' => $method,
            'data' => $data,
            'bn_idx' => $bnidx,
            'attach_file_cnt' => 2
        ]);
    }

    public function read($params = [])
    {
        $this->setDefaultBoardParam();
        $boardParams = $this->getDefaultBoardParam();
        $this->bmIdx = $boardParams['bmIdx'];
        $this->subMenu = $boardParams['subMenu'];

        //캠퍼스리스트
        if ($this->subMenu == 'offline') {
            $this->campusOnOff = 'on';
        }

        $data = null;
        $this->load->view("board/{$this->boardName}/read",[
            'boardName' => $this->boardName,
            'campusOnOff' => $this->campusOnOff,
            'data' => $data
        ]);
    }

    /**
     * 운영사이트에 따른 카테고리(구분), 캠퍼스 정보 리턴
     * @param array $params
     */
    public function getAjaxSiteCategoryInfo($params = [])
    {
        //사이트카테고리
        $result['catagory'] = $this->_getCategoryArray($params[0]);
        //캠퍼스
        $result['compus'] = $this->_getCampusArray($params[0]);
        $this->json_result(true, '', [], $result);
    }

    /**
     * 캠퍼스 정보 리턴
     * @param array $params
     */
    public function getAjaxCompusInfo($params = [])
    {
        $result['compus'] = $this->_getCampusArray($params[0]);
        $this->json_result(true, '', [], $result);
    }
}