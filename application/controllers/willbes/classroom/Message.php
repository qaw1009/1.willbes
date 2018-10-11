<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends \app\controllers\FrontController
{
    protected $models = array('crm/messageF', '_lms/sys/site', 'support/supportBoardTwoWayF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list = [];
        $sess_mem_idx = $this->session->userdata('mem_idx');

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $s_site_code = element('s_site_code',$arr_input);
        $s_is_receive = element('s_is_receive',$arr_input);
        $s_onoff_type = element('s_onoff_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_site_code='.$s_site_code;
        $get_params .= '&s_is_receive='.$s_is_receive;
        $get_params .= '&s_onoff_type='.$s_onoff_type;
        $get_params .= '&s_keyword='.$s_keyword;
        $get_params .= '&page='.$page;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false);
        unset($arr_base['site_list'][config_item('app_intg_site_code')]);

        //구분목록 (학원,온라인)
        $arr_base['onoff_type'] = $this->supportBoardTwoWayFModel->listSiteOnOffType();

        $arr_condition = [
            'EQ' => [
                'a.SiteCode' => $s_site_code,
                'a.IsReceive' => $s_is_receive,
                'g.IsCampus' => $s_onoff_type
            ],
            'ORG' => [
                'LKB' => [
                    'a.Title' => $s_keyword
                    ,'a.Content' => $s_keyword
                ]
            ]
        ];

        $total_rows = $this->messageFModel->listMessage(true, $arr_condition, $sess_mem_idx);
        $paging = $this->pagination('/classroom/message/index/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);
        if ($total_rows > 0) {
            $list = $this->messageFModel->listMessage(false, $arr_condition, $sess_mem_idx, $paging['limit'], $paging['offset'], ['a.SendIdx' => 'DESC']);
        }

        $this->load->view('/classroom/message/index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'total_rows' => $total_rows,
            'list' => $list,
            'paging' => $paging,
            'get_params' => $get_params
        ]);
    }

    /**
     * 파일다운로드
     */
    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');
        $send_idx = $this->_reqG('send_idx');

        $this->messageFModel->saveLog($send_idx);
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }
}