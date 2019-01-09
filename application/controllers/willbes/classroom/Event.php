<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/siteGroup', 'eventF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 특강&이벤트현황 목록
     * @return object|string
     */
    public function index()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null));
        $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 3);  // 검색어
        $get_page_params = 'search_text=' . element('search_text', $arr_input);
        $get_page_params .= '&search_site_group=' . element('search_site_group', $arr_input);
        $get_page_params .= '&search_is_pass=' . element('search_is_pass', $arr_input);
        $get_page_params .= '&search_campus=' . element('search_campus', $arr_input);

        // 사이트그룹 코드 조회
        $arr_base['arr_site_group'] = $this->siteGroupModel->getSiteGroupArray(false);

        // 셀렉트박스 캠퍼스 데이터 조회
        $arr_base['arr_campus'] = $this->_getCampusData();

        $arr_condition = $this->_condition($arr_input, 'list');
        $total_rows = $this->eventFModel->listAllEventForMyClass(true, $arr_condition);
        $paging = $this->pagination('/classroom/event/index?'.$get_page_params, $total_rows, $this->_paging_limit, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listAllEventForMyClass(false, $arr_condition, $paging['limit'], $paging['offset'], ['A.ElIdx' => 'DESC']);
        }

        return $this->load->view('/classroom/event/index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'list' => $list,
            'paging' => $paging
        ]);
    }

    /**
     * 회원이 신청한 이벤트중 캠퍼스 정보가 있는 데이터 조회
     * @return array
     */
    private function _getCampusData()
    {
        $arr_condition = $this->_condition('', 'campus');
        $campus_data = $this->eventFModel->listAllEventForMyClass(false, $arr_condition);
        return array_pluck($campus_data, 'CampusName', 'CampusCcd');
    }

    /**
     * 검색조건 셋팅
     * @param $arr_input
     * @param string $condition_type
     * @return array
     */
    private function _condition($arr_input, $condition_type = '')
    {
        $arr_condition = [
            'EQ' => [
                'b.IsStatus' => 'Y',
                'c.IsUse' => 'Y',
                'c.IsStatus' => 'Y'
            ],
            'RAW' => [
                'a.MemIdx = ' => $this->session->userdata('mem_idx')
            ]
        ];

        switch ($condition_type) {
            case 'campus' :
                $arr_condition = array_merge_recursive($arr_condition,[
                    'ORG' => [
                        'RAW' => [
                            'c.CampusCcd = ' => '\'\'',
                            'c.CampusCcd is not ' => 'null'
                        ]
                    ]
                ]);
                break;

            case 'list' :
                $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 3);  // 검색어
                $arr_condition = array_merge_recursive($arr_condition,[
                    'EQ' => [
                        'f.SiteGroupCode' => element('search_site_group', $arr_input),
                        'e.IsCampus' => element('search_is_pass', $arr_input),
                        'c.CampusCcd' => element('search_campus', $arr_input)
                    ],
                    'BDT' => ['a.RegDatm' => [element('0', $arr_search_text), element('1', $arr_search_text)]],
                    'LKB' => ['c.EventName' => element('2', $arr_search_text)]
                ]);
                break;
        }
        return $arr_condition;
    }
}