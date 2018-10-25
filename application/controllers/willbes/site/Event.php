<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends \app\controllers\FrontController
{
    protected $models = array('eventF', 'siteF', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_onoff_type = '';
    protected $_page_url = '';
    protected $_view_url = '';
    
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 기본정보셋팅
     * @param $type
     * @param $page_url
     * @param $view_url
     */
    private function setDefaultData($type, $page_url, $view_url)
    {
        $this->_onoff_type = $type;
        $this->_page_url = $page_url;
        $this->_view_url = $view_url;
    }

    /**
     * 기본정보받기
     * @param $target_data
     * @return mixed
     */
    private function getDefaultData($target_data)
    {
        return $this->$target_data;
    }

    /**
     * 이벤트 리스트 분기
     * @param array $params
     */
    public function list($params = [])
    {
        if (empty($this->_is_pass_site) === true) {
            $onoff_type = $params['pattern'];
            $page_url = '/event/list/cate/'.$params['cate'].'/pattern/'.$onoff_type;
            $view_url = '/event/show/cate/'.$params['cate'].'/pattern/'.$onoff_type;
        } else {
            $pass_val = '/' . substr($this->_pass_site_val, 1);
            $onoff_type = $params[0];
            $page_url = $pass_val.'/event/list/'.$onoff_type;
            $view_url = $pass_val.'/event/show/'.$onoff_type;
        }

        if (empty($onoff_type) === true) {
            redirect($page_url);
        }
        $this->setDefaultData($onoff_type, $page_url, $view_url);

        switch ($onoff_type) {
            case 'ongoing': // 진행중 이벤트
                $this->ongoing();
                break;

            case 'end': // 종료 이벤트
                $this->end();
                break;

            default:
                redirect($page_url);
                break;
        }
    }

    /**
     * 이벤트 뷰 페이지
     * @param array $params
     */
    public function show($params = [])
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        //학원,온라인 경로 셋팅
        if (empty($this->_is_pass_site) === true) {
            $pass_val = '';
            $onoff_type = $params['pattern'];
            $page_url = '/event/list/cate/'.$params['cate'].'/pattern/'.$onoff_type;
        } else {
            $pass_val = '/' . substr($this->_pass_site_val, 1);
            $onoff_type = $params[0];
            $page_url = $pass_val.'/event/list/'.$onoff_type;
        }

        if (empty($onoff_type) === true) {
            redirect($page_url);
        }

        $arr_condition = [
            'EQ'=>[
                'A.ElIdx' => element('event_idx', $arr_input),
                'A.IsStatus' => 'Y'
            ]
        ];

        switch ($onoff_type) {
            case 'ongoing': // 진행중 이벤트
                $arr_condition = array_merge($arr_condition, [
                    'GTE' => [
                        'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                    ]
                ]);
                break;

            case 'end': // 종료 이벤트
                $arr_condition = array_merge($arr_condition, [
                    'ORG2' => [
                        'EQ' => [
                            'A.IsRegister' => 'N',
                        ],
                        'LTE' => [
                            'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                        ]
                    ]
                ]);
                break;

            default:
                redirect($pass_val . '/event/list/ongoing');
                break;
        }

        $data = $this->eventFModel->findEvent($arr_condition);
        if (count($data) < 1) {
            show_alert('데이터 조회에 실패했습니다.', site_url($page_url), false);
        }
        $data['data_option_ccd'] = array_flip(explode(',', $data['OptionCcds']));   // 관리옵션 데이터 가공처리
        $data['data_comment_use_area'] = array_flip(explode(',', $data['CommentUseArea']));   // 댓글사용영역 데이터 가공처리

        $arr_base['onoff_type'] = $onoff_type;
        $arr_base['page_url'] = $page_url;
        $arr_base['default_path'] = $pass_val;
        $arr_base['content_type'] = $this->eventFModel->_content_type;
        $arr_base['option_ccd'] = $this->eventFModel->_ccd['option'];
        $arr_base['comment_use_area'] = $this->eventFModel->_ccd['comment_use_area'];

        $this->load->view('site/event/show',[
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'data' => $data
        ]);
    }

    public function frameCommentList()
    {
        $this->load->view('site/event/frame_comment_list',[
        ]);
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');
        $event_idx = $this->_reqG('event_idx');

        $this->downloadFModel->saveLogEvent($event_idx);
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }

    private function ongoing()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);
        $get_page_params = 's_request_type=' . element('s_request_type', $arr_input) . '&s_campus=' . element('s_campus', $arr_input);
        $get_page_params .= '&s_keyword=' . urlencode(element('s_keyword', $arr_input));

        $arr_base['request_type'] = $this->eventFModel->_request_type;

        //진행중,마감 이벤트 타입
        $arr_base['onoff_type'] = $this->getDefaultData('_onoff_type');

        //기본경로셋팅
        $arr_base['page_url'] = $this->getDefaultData('_page_url');
        $arr_base['view_url'] = $this->getDefaultData('_view_url');

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
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, $this->_paging_limit, $this->_paging_count, true);

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

        //진행중,마감 이벤트 타입
        $arr_base['onoff_type'] = $this->getDefaultData('_onoff_type');

        //기본경로셋팅
        $arr_base['page_url'] = $this->getDefaultData('_page_url');
        $arr_base['view_url'] = $this->getDefaultData('_view_url');

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
        $paging = $this->pagination($arr_base['page_url'].'?' . $get_page_params, $total_rows, $this->_paging_limit, $this->_paging_count, true);

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
}