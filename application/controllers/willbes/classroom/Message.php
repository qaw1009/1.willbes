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
     * 쪽지 뷰페이지
     * @return CI_Output
     */
    public function show()
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $arr_input = $this->_reqG(null);

        if (empty($arr_input['send_idx']) === true) {
            $err_data = [
                'ret_cd' => false,
                'ret_msg' => '잘못된 접근입니다.',
                'ret_status' => _HTTP_ERROR
            ];
            return $this->json_result(false, '잘못된 접근 입니다다.', $err_data);
        }

        //수신상태 업데이트
        $arr_condition = [
            'SendIdx' => $arr_input['send_idx'],
            'MemIdx' => $sess_mem_idx,
            'IsReceive' => 'N'
        ];
        $inputData = [
            'IsReceive' => 'Y',
            'RcvDatm' => date('Y-m-d H:i:s')
        ];
        if ($this->messageFModel->updateReceiveMessage($arr_condition, $inputData) === false) {
            $err_data = [
                'ret_cd' => false,
                'ret_msg' => '잘못된 접근입니다.',
                'ret_status' => _HTTP_ERROR
            ];
            return $this->json_result(false, '상태 수정 실패입니다. 관리자에게 문의해 주세요.', $err_data);
        }

        $arr_condition = [
            'EQ' => [
                'a.SendIdx' => $arr_input['send_idx']
            ]
        ];
        $data = $this->messageFModel->listMessage(false, $arr_condition, $sess_mem_idx);

        $this->load->view('/classroom/message/show', [
            'arr_input' => $arr_input,
            'data' => $data[0]
        ]);
    }

    public function delete()
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');

        $arr_condition = [
            'SendIdx' => $this->_reqP('send_idx'),
            'MemIdx' => $sess_mem_idx
        ];
        $inputData = [
            'IsStatus' => 'N',
            'DelDatm' => date('Y-m-d H:i:s')
        ];
        $result = $this->messageFModel->updateReceiveMessage($arr_condition, $inputData);
        $this->json_result($result, '삭제 되었습니다.', $result);
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