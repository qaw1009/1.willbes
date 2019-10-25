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

    // 메시지 발송 옵션 (SMS, LMS, 친구톡, 알림톡)
    private $_send_text_length_ccd = [
        '0' => '638001',
        '1' => '638002',
        '2' => '638003',
        '3' => '638004'
    ];

    private $_groupCcd = [
        'SendPatternCcd' => '637',  //메세지성격 (일반발송, 자동발송)
        'SendTypeCcd' => '638',     //메세지종류 (SMS, LMS)
        'SendStatusCcd' => '639',   //발송상태 (성공,예약,취소)
        'SendOptionCcd' => '640',   //발송옵션 (즉시발송, 예약발송)
        'SmsSendCallBackNum' => '706'   //SMS 발송번호
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
                'a.SendIdx' => $send_idx,
                'b.MemIdx' => $this->_reqG('member_idx')
            ]
        ];
        $data = $this->smsModel->findSms($column, $arr_condition);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view("crm/sms/list_send_detail_modal", [
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

            $count = $this->smsModel->listSmsDetail(true, $arr_condition, $params[0]);
            if ($count > 0) {
                $list = $this->smsModel->listSmsDetail(false, $arr_condition, $params[0], $this->_reqP('length'), $this->_reqP('start'), ['SendIdx' => 'desc']);

                //최종 카카오 전송결과 조회
                if(empty($list) === false) {
                    foreach ($list as $i => $row){
                        try{
                            if(empty($row['SendYyyyMm']) === false) {
                                if(strtotime('201910') <= strtotime($row['SendYyyyMm'])){ //카카오 알림톡 적용시점
                                    $list[$i]['log_data'] = $this->smsModel->findKakaoLog($row['SendYyyyMm'], $row['Receive_PhoneEnc'], $row['SendIdx']);
                                }
                            }
                        } catch (\Exception $e) {
                            $list[$i]['log_data'] = null;
                        }
                    }
                }
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * SMS발송 등록(전송) (2019-09-19 이전, TODO 제거)
     */
    public function createSendModal()
    {
        $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendOptionCcd']]);
        
        //발신번호조회
        $arr_send_callback_ccd = $this->codeModel->getCcd($this->_groupCcd['SmsSendCallBackNum'], 'CcdValue');

        $method = 'POST';
        $set_row_count = '12';
        $list_send_member = null;

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
        }

        $this->load->view("crm/sms/create_modal", [
            'method' => $method,
            'arr_send_pattern_ccd' => $arr_codes[$this->_groupCcd['SendPatternCcd']],
            'arr_send_option_ccd' => $arr_codes[$this->_groupCcd['SendOptionCcd']],
            'arr_send_callback_ccd' => $arr_send_callback_ccd,
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
     * 발송 (2019-09-19 이전, TODO 제거)
     */
    public function storeSend()
    {
        $send_type = $this->_reqP('send_type');

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'send_pattern_ccd', 'label' => '발송성격', 'rules' => 'trim|required'],
            ['field' => 'cs_tel_ccd', 'label' => '발신번호', 'rules' => 'trim|required'],
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

        $this->json_result($result, '정상 처리되었습니다.', null, ['upload_cnt' => $return_count]);
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

    /**
     * SMS(친구톡), 알림톡 팝업 (2019-09-19 이후)
     */
    public function createSendKakaoModal()
    {
        $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendOptionCcd']]);

        //발신번호조회
        $arr_send_callback_ccd = $this->codeModel->getCcd($this->_groupCcd['SmsSendCallBackNum'], 'CcdValue');

        $method = 'POST';
        $set_row_count = 12;
        $list_send_member = null;

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
            $list_send_member = $this->manageMemberModel->listSendMemberInfo($arr_condition, count($set_send_member_idx));

            if(empty($target_idx) === false && count($set_send_member_idx) > $set_row_count) {
                $set_row_count = count($set_send_member_idx);
            }
        }

        $arr_kakao_template = $this->smsModel->listKakaoTemplate(false, ['EQ' => ['KT.IsStatus' => 'Y', 'KT.IsUse' => 'Y', 'KT.IsApproval' => 'Y']], null, null, []);

        $this->load->view("crm/sms/create_kakao_modal", [
            'method' => $method,
            'arr_send_pattern_ccd' => $arr_codes[$this->_groupCcd['SendPatternCcd']],
            'arr_send_option_ccd' => $arr_codes[$this->_groupCcd['SendOptionCcd']],
            'arr_send_callback_ccd' => $arr_send_callback_ccd,
            'arr_kakao_template' => $arr_kakao_template,
            'set_row_count' => $set_row_count,
            'list_send_member' => $list_send_member,
            'js_action' => $js_action
        ]);
    }

    /**
     * SMS(친구톡), 알림톡 발송 (2019-09-19 이후)
     */
    public function storeSendKakao()
    {
        $send_type = $this->_reqP('send_type');
        $kakao_msg_type = $this->_reqP('kakao_msg_type');
        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'send_pattern_ccd', 'label' => '발송성격', 'rules' => 'trim|required'],
            ['field' => 'send_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'send_option_ccd', 'label' => '발송옵션', 'rules' => 'trim|required|integer'],
            ['field' => 'send_datm_day', 'label' => '날짜', 'rules' => 'callback_validateRequiredIf[send_option_ccd,N]']
        ];

        switch ($kakao_msg_type) {
            case 'KFT' :
                $rules = array_merge($rules,[
                    ['field' => 'cs_tel_ccd', 'label' => '발신번호', 'rules' => 'trim|required']
                ]);
                break;
            case 'KAT' :
                $rules = array_merge($rules,[
                    ['field' => 'tmpl_cd', 'label' => '템플릿 유형', 'rules' => 'trim|required']
                ]);
                break;
        }

        switch ($send_type) {
            case 1 :
                $rules = array_merge($rules,[
                    ['field' => 'mem_name[]', 'label' => '수신정보 이름', 'rules' => 'callback_validateArrayRequired[mem_name,1]'],
                    ['field' => 'mem_phone[]', 'label' => '수신정보 전화번호', 'rules' => 'callback_validateArrayRequired[mem_phone,1]']
                ]);
            break;
            case 2 :
                $rules = array_merge($rules,[
                    ['field' => 'attach_file', 'label' => '수신정보파일', 'rules' => 'callback_validateFileRequired[attach_file]']
                ]);
            break;
        }

        if ($this->validate($rules) === false) return;

        list($result, $return_count) = $this->smsModel->addKakao($this->_reqP(null, false));

        $this->json_result($result, '정상 처리되었습니다.', null, ['upload_cnt' => $return_count]);
    }

}