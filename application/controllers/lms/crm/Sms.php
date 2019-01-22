<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/sms', 'member/manageMember');
    protected $helpers = array();

    private $_send_type = 'sms';

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

    // 메시지 발송 옵션 (SMS, LMS)
    private $_send_text_length_ccd = [
        '0' => '638001',
        '1' => '638002'
    ];

    private $_groupCcd = [
        'SendPatternCcd' => '637',  //메세지성격 (일반발송, 자동발송)
        'SendTypeCcd' => '638',     //메세지종류 (SMS, LMS)
        'SendStatusCcd' => '639',   //발송상태 (성공,예약,취소)
        'SendOptionCcd' => '640',   //발송옵션 (즉시발송, 예약발송)
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendTypeCcd'], $this->_groupCcd['SendStatusCcd']]);

        $this->load->view("crm/sms/index", [
            'arr_send_pattern_ccd' => $arr_codes[$this->_groupCcd['SendPatternCcd']],
            'arr_send_type_ccd' => $arr_codes[$this->_groupCcd['SendTypeCcd']],
            'arr_send_status_ccd' => $arr_codes[$this->_groupCcd['SendStatusCcd']],
            'arr_send_status_ccd_vals' => $this->_send_status_ccd
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'SMS.SendGroupTypeCcd' => $this->_send_type_ccd[$this->_send_type],
                'SMS.SiteCode' => $this->_reqP('search_site_code'),
                'SMS.SendPatternCcd' => $this->_reqP('search_send_pattern_ccd'),
                'SMS.SendTypeCcd' => $this->_reqP('search_send_type_ccd'),
                'SMS.SendStatusCcd' => $this->_reqP('search_send_status_ccd'),
                'SMS.IsStatus' => 'Y',
            ],
            'ORG' => [
                'LKB' => [
                    'SMS.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['SMS.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->smsModel->listSms(true, $arr_condition);

        if ($count > 0) {
            $list = $this->smsModel->listSms(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SMS.SendIdx' => 'desc']);

            // 사용하는 코드값 조회
            $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendTypeCcd'], $this->_groupCcd['SendStatusCcd']]);

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'SendPatternCcdName' => ['SendPatternCcd' => $arr_codes[$this->_groupCcd['SendPatternCcd']]],
                'SendTypeCcdName' => ['SendTypeCcd' => $arr_codes[$this->_groupCcd['SendTypeCcd']]],
                'SendStatusCcdName' => ['SendStatusCcd' => $arr_codes[$this->_groupCcd['SendStatusCcd']]]
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
                'SendIdx' => $send_idx
            ]
        ];
        $data = $this->smsModel->findSms($column, $arr_condition);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view("crm/sms/list_send_detail_modal", [
            'send_type' => $this->_send_type,
            'send_idx' => $send_idx,
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
                    'SEND.SmsRcvStatus' => $this->_reqP('search_sms_is_agree')
                ],
                'ORG' => [
                    'LKB' => [
                        'Mem.MemId' => $this->_reqP('search_value'),
                        'Mem.MemName' => $this->_reqP('search_value'),
                        'TM.Phone3' => $this->_reqP('search_value'),
                    ]
                ]
            ];

            $count = $this->smsModel->listSmsDetail(true, $arr_condition, $params[0]);
            if ($count > 0) {
                $list = $this->smsModel->listSmsDetail(false, $arr_condition, $params[0], $this->_reqP('length'), $this->_reqP('start'), ['SendIdx' => 'desc']);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * SMS발송 등록(전송)
     */
    public function createSendModal()
    {
        $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendOptionCcd']]);
        $method = 'POST';
        $set_row_count = '12';
        $list_send_member = null;

        //고객센터 전화번호 조회
        $site_csTel = json_encode($this->siteModel->getSiteArray(false,'CsTel'));

        $target_id = $this->_req('target_id');
        $target_idx = $this->_req('target_idx');
        $target_phone = $this->_req('target_phone');
        $js_action = (empty($this->_req('js_action')) === true) ? 'NoAction' : $this->_req('js_action');

        if (empty($target_id) === false || empty($target_idx) === false) {
            $set_send_member_idx = explode(',', $target_idx);
            $set_send_member_id = explode(',', $target_id);
            $arr_condition = [
                'ORG' => [
                    'IN' => [
                        'MemIdx' => $set_send_member_idx,
                        'MemId' => $set_send_member_id
                    ]
                ]
            ];
            $list_send_member = $this->manageMemberModel->listSendMemberInfo($arr_condition);

            //전송할 휴대폰번호가 폼데이터에 있을 경우 넘어온 휴대폰 번호로 대체
            /*if (empty($target_phone) === false) {
                $set_send_member_phone = explode(',', $target_phone);

                foreach ($list_send_member as $key => $row) {
                    if (empty($set_send_member_phone[$key]) === false && empty($set_send_member_id[$key]) === false && $list_send_member[$key]['MemId'] == $set_send_member_id[$key]) {
                        $list_send_member[$key]['Phone'] = $set_send_member_phone[$key];
                    }

                    if (empty($set_send_member_phone[$key]) === false && empty($set_send_member_idx[$key]) === false && $list_send_member[$key]['MemIdx'] == $set_send_member_idx[$key]) {
                        $list_send_member[$key]['Phone'] = $set_send_member_phone[$key];
                    }
                }
            }*/
        }

        $this->load->view("crm/sms/create_modal", [
            'method' => $method,
            'site_csTel' => $site_csTel,
            'arr_send_pattern_ccd' => $arr_codes[$this->_groupCcd['SendPatternCcd']],
            'arr_send_option_ccd' => $arr_codes[$this->_groupCcd['SendOptionCcd']],
            'set_row_count' => $set_row_count,
            'list_send_member' => $list_send_member,
            'js_action' => $js_action
        ]);
    }

    /**
     * 샘플파일 다운로드
     */
    public function sampleDownload()
    {
        $this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_sms.xlsx';
        force_download($file_path, null);
    }

    /**
     * 회원 리스트 페이지
     */
    public function listMemberModal($params = [])
    {
        $set_mem_idx = $this->_reqG('temp_mem_idx');
        $set_mem_id = $this->_reqG('temp_mem_id');
        $choice_mem_idx = $this->_reqG('choice_mem_idx');
        $choice_mem_id = $this->_reqG('choice_mem_id');

        //회원검색 1회 할 경우
        if (empty($choice_mem_idx) === false) {
            $set_mem_idx = $choice_mem_idx;
            $set_mem_id = $choice_mem_id;
        }

        $get_site_array = $this->siteModel->getSiteArray();
        $this->load->view("crm/sms/list_member_modal", [
            'send_type' => $params[0],
            'get_site_array' => $get_site_array,
            'set_mem_idx' => $set_mem_idx,
            'set_mem_id' => $set_mem_id,
        ]);
    }

    /**
     * 회원 리스트 Ajax
     * @return CI_Output
     */
    public function listMemberModalAjax()
    {
        $get_site_array = $this->siteModel->getSiteArray();

        $column = 'Mem.MemIdx, Mem.SiteCode, Mem.MemId, Mem.MemName, fn_dec(Mem.PhoneEnc) as Phone, fn_dec(Mem.MailEnc) as MemMail, Mem.JoinDate, Mem.IsStatus, MemInfo.SmsRcvStatus, MemInfo.MailRcvStatus';
        $arr_condition = [
            'EQ' => [
                'Mem.SiteCode' => $this->_reqP('site_code'),
                'MemInfo.SmsRcvStatus' => $this->_reqP('search_sms_is_agree'),
                'MemInfo.MailRcvStatus' => $this->_reqP('search_email_is_agree')
            ],
            'ORG' => [
                'LKB' => [
                    'Mem.MemId' => $this->_reqP('search_value'),
                    'Mem.MemName' => $this->_reqP('search_value'),
                    'Mem.Phone3' => $this->_reqP('search_value')
                ]
            ]
        ];

        if (!empty($this->_reqP('search_member_start_regdate')) && !empty($this->_reqP('search_member_end_regdate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['Mem.JoinDate' => [$this->_reqP('search_member_start_regdate'), $this->_reqP('search_member_end_regdate')]]
            ]);
        }

        $list = [];
        $count = $this->smsModel->getMemberList(true, $arr_condition);

        if ($count > 0) {
            $list = $this->smsModel->getMemberList(false, $arr_condition, $column, $this->_reqP('length'), $this->_reqP('start'), ['Mem.MemIdx' => 'desc']);

            // 사이트 코드 명 추가
            $list = array_data_fill($list, [
                'SiteName' => ['SiteCode' => $get_site_array]
            ], true);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 발송
     */
    public function storeSend()
    {
        $send_type = $this->_reqP('send_type');

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'send_pattern_ccd', 'label' => '발송성격', 'rules' => 'trim|required'],
            ['field' => 'cs_tel', 'label' => '발신번호', 'rules' => 'trim|required|integer'],
            ['field' => 'send_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'send_option_ccd', 'label' => '발송옵션', 'rules' => 'trim|required|integer'],
            ['field' => 'send_datm_day', 'label' => '날짜', 'rules' => 'callback_validateRequiredIf[send_option_ccd,N]']
        ];

        if ($send_type == 1) {
            $rules = array_merge($rules,[
                ['field' => 'mem_name[]', 'label' => '수신정보 이름', 'rules' => 'callback_validateArrayRequired[mem_name,1]'],
                ['field' => 'mem_phone[]', 'label' => '수신정보 전화번호', 'rules' => 'callback_validateArrayRequired[mem_phone,1]'],
            ]);
        } elseif ($send_type == 2) {
            $rules = array_merge($rules,[
                ['field' => 'attach_file', 'label' => '수신정보파일', 'rules' => 'callback_validateFileRequired[attach_file]'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        list($result, $return_count) = $this->smsModel->addSms($this->_reqP(null,false), $this->_send_type, $this->_send_type_ccd, $this->_send_status_ccd, $this->_send_option_ccd, $this->_send_text_length_ccd);

        $this->json_result($result, '정상 처리되었습니다.',null, ['upload_cnt' => $return_count]);
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
        $result = $this->smsModel->updateSendStatus($params);
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * Excel 파일 업로드
     */
    public function fileUploadAjax()
    {
        list($result, $err_data, $return) = $this->smsModel->fileUpload();
        $this->json_result($result, '성공', $err_data, $return);
    }

}