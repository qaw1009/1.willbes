<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends \app\controllers\FrontController
{
    protected $models = array('eventF', 'siteF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();
    protected $onoff_type = '';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 이벤트 분기값 셋팅
     * @param $type
     */
    private function setOnOffType($type)
    {
        $this->onoff_type = $type;
    }

    /**
     * 이벤트 분기값 리턴
     * @return string
     */
    private function getOnOffType()
    {
        return $this->onoff_type;
    }

    /**
     * 이벤트 리스트 분기
     * @param array $params
     */
    public function list($params = [])
    {
        if (empty($this->_is_pass_site) === true) {
            $pass_val = '';
        } else {
            $pass_val = '/' . substr($this->_pass_site_val, 1);
        }

        $onoff_type = $params[0];
        if (empty($onoff_type) === true) {
            redirect($pass_val . '/event/list/ongoing');
        }
        $this->setOnOffType($onoff_type);

        switch ($onoff_type) {
            case 'ongoing': // 진행중 이벤트
                $this->ongoing();
                break;

            case 'end': // 종료 이벤트
                $this->end();
                break;

            default:
                redirect($pass_val . '/event/list/ongoing');
                break;
        }
    }

    private function ongoing()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);
        $get_page_params = 's_request_type=' . element('s_request_type', $arr_input) . '&s_campus=' . element('s_campus', $arr_input);
        $get_page_params .= '&s_keyword=' . urlencode(element('s_keyword', $arr_input));

        $arr_base['request_type'] = $this->eventFModel->_request_type;

        //학원,온라인 경로 셋팅
        $arr_base['default_path'] = ($this->_is_pass_site === true) ? '/pass' : '';

        //진행중,마감 이벤트 타입
        $arr_base['onoff_type'] = $this->getOnOffType();

        //캠퍼스조회
        $arr_base['campus'] = ($this->_is_pass_site === true) ? $this->siteFModel->getSiteCampusArray($this->_site_code) : [];

        $arr_condition = [
            'EQ' => [
                'A.IsRegister' => 'Y',
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_site_code,
                'A.RequstType' => element('s_request_type', $arr_input),
                'A.CampusCcd' => element('s_campus', $arr_input)
            ],
            'ORG1' => [
                'LKB' => [
                    'A.EventName' => element('s_keyword', $arr_input)
                ]
            ],
            'GTE' => [
                'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'B.IsStatus' => 'Y',
                'B.CateCode' => $this->_cate_code
            ]
        ];

        $total_rows = $this->eventFModel->listAllEvent(true, $arr_condition, $sub_query_condition);
        $paging = $this->pagination($arr_base['default_path'] . '/event/list/ongoing?' . $get_page_params, $total_rows, $this->_paging_limit, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listAllEvent(false, $arr_condition, $sub_query_condition, $paging['limit'], $paging['offset'], ['A.IsBest' => 'DESC', 'A.ElIdx' => 'DESC']);
        }

        $this->load->view('site/event/index', [
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging
        ]);
    }

    private function end()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);
        $get_page_params = 's_request_type=' . element('s_request_type', $arr_input) . '&s_campus=' . element('s_campus', $arr_input);
        $get_page_params .= '&s_keyword=' . urlencode(element('s_keyword', $arr_input));

        $arr_base['request_type'] = $this->eventFModel->_request_type;

        //학원,온라인 경로 셋팅
        $arr_base['default_path'] = ($this->_is_pass_site === true) ? '/pass' : '';

        //진행중,마감 이벤트 타입
        $arr_base['onoff_type'] = $this->getOnOffType();

        //캠퍼스조회
        $arr_base['campus'] = ($this->_is_pass_site === true) ? $this->siteFModel->getSiteCampusArray($this->_site_code) : [];

        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_site_code,
                'A.RequstType' => element('s_request_type', $arr_input),
                'A.CampusCcd' => element('s_campus', $arr_input)
            ],
            'ORG1' => [
                'LKB' => [
                    'A.EventName' => element('s_keyword', $arr_input)
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'A.IsRegister' => 'N',
                ],
                'LTE' => [
                    'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                ]
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'B.IsStatus' => 'Y',
                'B.CateCode' => $this->_cate_code
            ]
        ];

        $total_rows = $this->eventFModel->listAllEvent(true, $arr_condition, $sub_query_condition);
        $paging = $this->pagination($arr_base['default_path'] . '/event/list/end?' . $get_page_params, $total_rows, $this->_paging_limit, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listAllEvent(false, $arr_condition, $sub_query_condition, $paging['limit'], $paging['offset'], ['A.IsBest' => 'DESC', 'A.ElIdx' => 'DESC']);
        }

        $this->load->view('site/event/index', [
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging
        ]);
    }

    public function show()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $arr_condition = ([
            'EQ'=>[
                'A.ElIdx' => element('event_idx', $arr_input),
                'A.IsStatus' => 'Y'
            ]
        ]);

        $data = $this->eventFModel->findEvent($arr_condition);
        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view('site/event/show',[
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'data' => $data
        ]);
    }
}