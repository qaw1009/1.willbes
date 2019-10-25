<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/message', 'member/manageMember');
    protected $helpers = array();

    private $_send_type = 'message';

    // 메세지 발송 종류 (SMS,쪽지,메일)
    private $_send_type_ccd = [
        'sms' => '641001',
        'message' => '641002',
        'mail' => '641003'
    ];

    // 메시지 상태 (성공,예약,취소)
    private $_send_status_ccd = [
        '0' => '639001',
        '1' => '639002',
        '2' => '639003'
    ];

    // 메시지 발송 옵션 (즉시발송, 예약발송)
    private $_send_option_ccd = [
        '0' => '640001',
        '1' => '640002'
    ];

    private $_groupCcd = [
        'SendStatusCcd' => '639',   //발송상태 (성공,예약,취소)
        'SendOptionCcd' => '640',   //발송옵션 (즉시발송, 예약발송)
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_send_status_ccd = $this->codeModel->getCcd($this->_groupCcd['SendStatusCcd']);
        $this->load->view("crm/message/index", [
            'arr_send_status_ccd' => $arr_send_status_ccd,
            'arr_send_status_ccd_vals' => $this->_send_status_ccd
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'MSG.SendGroupTypeCcd' => $this->_send_type_ccd[$this->_send_type],
                'MSG.SiteCode' => $this->_reqP('search_site_code'),
                'MSG.SendStatusCcd' => $this->_reqP('search_send_status_ccd'),
                'MSG.IsStatus' => 'Y',
            ],
            'ORG' => [
                'LKB' => [
                    'MSG.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['MSG.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->messageModel->listMessage(true, $arr_condition);

        if ($count > 0) {
            $list = $this->messageModel->listMessage(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['MSG.SendIdx' => 'desc']);

            // 사용하는 코드값 조회
            $arr_send_status_ccd = $this->codeModel->getCcd($this->_groupCcd['SendStatusCcd']);

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'SendStatusCcdName' => ['SendStatusCcd' => $arr_send_status_ccd]
            ], true);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 발송 상세 리스트
     * @param array $params
     */
    public function listSendDetailModal($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $send_idx = $params[0];

        $column = 'Content';
        $arr_condition = [
            'EQ' => [
                'a.SendIdx' => $send_idx,
                'b.MemIdx' => $this->_reqG('member_idx')
            ]
        ];
        $data = $this->messageModel->findMessage($column, $arr_condition);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view("crm/message/list_send_detail_modal", [
            'send_type' => $this->_send_type,
            'send_idx' => $send_idx,
            'member_idx' => $this->_reqG('member_idx'),
            'data' => $data
        ]);
    }

    /**
     * 발송 상세 리스트 ajax
     * @param array $params
     * @return CI_Output
     */
    public function listSendDetailModalAjax($params = [])
    {
        $list = [];
        $count = 0;

        if (empty($params[0]) === false) {
            $arr_condition = [
                'EQ' => [
                    'SEND.SendIdx' => $params[0],
                    'SEND.SmsRcvStatus' => $this->_reqP('search_sms_is_agree'),
                    'Mem.MemIdx' => $this->_reqG('member_idx'),
                ],
                'ORG' => [
                    'LKB' => [
                        'Mem.MemId' => $this->_reqP('search_value'),
                        'Mem.MemName' => $this->_reqP('search_value'),
                        'TM.Phone3' => $this->_reqP('search_value'),
                    ]
                ]
            ];

            $count = $this->messageModel->listMessageDetail(true, $arr_condition);
            if ($count > 0) {
                $list = $this->messageModel->listMessageDetail(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SendIdx' => 'desc']);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 쪽지발송 등록(전송)
     */
    public function createSendModal()
    {
        $arr_send_option_ccd = $this->codeModel->getCcd($this->_groupCcd['SendOptionCcd']);
        $method = 'POST';
        $set_row_count = 12;
        $list_send_member = [];
        $temp_mem_idx = '';
        $temp_mem_id = '';
        $js_action = (empty($this->_req('js_action')) === true) ? 'NoAction' : $this->_req('js_action');

        $target_idx = $this->_req('target_idx');
        if (empty($target_idx) === false) {
            $set_send_member_idx = explode(',', $target_idx);
            $arr_condition = [
                'IN' => [
                    'MemIdx' => $set_send_member_idx
                ]
            ];
            $list_send_member = $this->manageMemberModel->listSendMemberInfo($arr_condition, count($set_send_member_idx));
            foreach ($list_send_member as $row) {
                $temp_mem_idx .= $row['MemIdx'].',';
                $temp_mem_id .= $row['MemId'].',';
            }
            if(count($set_send_member_idx) > $set_row_count) {
                $set_row_count = count($set_send_member_idx);
            }
        }
        $temp_mem_idx = substr($temp_mem_idx , 0, -1);
        $temp_mem_id = substr($temp_mem_id , 0, -1);

        $this->load->view("crm/message/create_modal", [
            'method' => $method,
            'arr_send_option_ccd' => $arr_send_option_ccd,
            'set_row_count' => $set_row_count,
            'list_send_member' => $list_send_member,
            'temp_mem_idx' => $temp_mem_idx,
            'temp_mem_id' => $temp_mem_id,
            'js_action' => $js_action
        ]);
    }

    /**
     * 샘플파일 다운로드
     */
    public function sampleDownload()
    {
        $this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_message.xlsx';
        force_download($file_path, null);
    }

    /**
     * 발송
     */
    public function storeSend()
    {
        $send_type = $this->_reqP('send_type');

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'send_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'send_option_ccd', 'label' => '발송옵션', 'rules' => 'trim|required|integer'],
            ['field' => 'send_datm_day', 'label' => '날짜', 'rules' => 'callback_validateRequiredIf[send_option_ccd,N]']
        ];

        if ($send_type == 1) {
            $rules = array_merge($rules,[
                ['field' => 'mem_id[]', 'label' => '수신아이디', 'rules' => 'callback_validateArrayRequired[mem_id,1]'],
            ]);
        } elseif ($send_type == 2) {
            $rules = array_merge($rules,[
                ['field' => 'attach_file', 'label' => '수신정보파일', 'rules' => 'callback_validateFileRequired[attach_file]'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        list($result, $return_count) = $this->messageModel->addMessage($this->_reqP(null,false), $this->_send_type, $this->_send_type_ccd, $this->_send_status_ccd, $this->_send_option_ccd);
        $this->json_result($result, '정상 처리되었습니다.',null, ['upload_cnt' => $return_count]);
    }

    /**
     * Excel 파일 업로드
     */
    public function fileUploadAjax()
    {
        list($result, $err_data, $return) = $this->messageModel->fileUpload();
        $this->json_result($result, '성공', $err_data, $return);
    }

    /**
     * 예약 취소
     */
    public function cancelSend()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }
        $params = json_decode($this->_req('params'), true);
        $result = $this->messageModel->updateSendStatus($params);
        $this->json_result($result, '적용 되었습니다.', $result);
    }

}