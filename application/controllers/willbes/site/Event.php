<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends \app\controllers\FrontController
{
    protected $models = array('eventF');
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
            $pass_val = '/'.substr($this->_pass_site_val, 1);
        }

        $onoff_type = $params[0];
        if(empty($onoff_type) === true){
            redirect($pass_val.'/event/list/ongoing');
        }
        $this->setOnOffType($onoff_type);

        switch($onoff_type) {
            case 'ongoing': // 진행중 이벤트
                $this->ongoing();
                break;

            case 'end': // 종료 이벤트
                $this->end();
                break;

            default:
                redirect($pass_val.'/event/list/ongoing');
                break;
        }
    }

    private function ongoing()
    {
        $onoff_type = $this->getOnOffType();
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_site_code,
                'A.CampusCcd' => element('s_campus',$arr_input)
            ],
            'ORG1' => [
                'LKB' => [
                    'A.EventName' => element('s_keyword',$arr_input)
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
        $paging = $this->pagination('/notice/index/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->eventFModel->listAllEvent(false,$arr_condition, $sub_query_condition, $paging['limit'], $paging['offset'], ['A.IsBest' => 'DESC', 'A.ElIdx' => 'DESC']);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('site/event/index',[
            'onoff_type' => $onoff_type,
            'arr_input' => $arr_input
        ]);
    }

    private function end()
    {
        $onoff_type = $this->getOnOffType();
    }
}