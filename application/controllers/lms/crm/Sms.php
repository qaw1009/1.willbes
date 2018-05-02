<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/sms');
    protected $helpers = array();

    private $_groupCcd = [
        'SendPatternCcd' => '637',  //메세지성격 (일반발송, 자동발송)
        'SendTypeCcd' => '638',     //메세지종류 (SMS, LMS)
        'SendStatusCcd' => '639',   //발송상태 (성공,예약,취소)
        'SendOptionCcd' => '640',   //발송옵션 (즉시발송, 예약발송)
    ];
    private $send_type = 'sms';

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
            'arr_send_status_ccd' => $arr_codes[$this->_groupCcd['SendStatusCcd']]
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
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
     * SMS발송 등록(전송)
     */
    public function createSendModal()
    {
        $get_site_array = $this->siteModel->getSiteArray();
        $arr_send_option_ccd = $this->codeModel->getCcd($this->_groupCcd['SendOptionCcd']);

        $method = 'POST';
        $set_row_count = '12';

        $this->load->view("crm/sms/create_modal", [
            'method' => $method,
            'get_site_array' => $get_site_array,
            'arr_send_option_ccd' => $arr_send_option_ccd,
            'set_row_count' => $set_row_count
        ]);
    }

    public function listMemberModal()
    {
        $get_site_array = $this->siteModel->getSiteArray();

        $this->load->view("crm/sms/list_member_modal", [
            'send_type' => $this->send_type,
            'get_site_array' => $get_site_array

        ]);
    }

    public function listMemberModalAjax()
    {
        $column = 'MEM.MemIdx, MEM.SiteCode, MEM.MemId, MEM.MemName, MEM.Hp1, MEM.Hp2, MEM.Hp3, MEM.Email, MEM.EmailEnc, MEM.EmailDomain, MEM_R.SmsRcvStatus, MEM_R.EmailRcvStatus, MEM.JoinDate, MEM.IsStatus';
        $count = 4;

        $list = [
            '0' => [
                'MemIdx' => '100001',
                'SiteCode' => '2001',
                'MemId' => 'dlumjjang01',
                'MemName' => '최현탁',
                'Hp1' => '010',
                'Hp2' => '4619',
                'Hp3' => '5149',
                'Email' => '1',
                'EmailEnc' => '1',
                'EmailDomain' => '1',
                'SmsRcvStatus' => 'Y',
                'EmailRcvStatus' => 'Y',
                'JoinDate' => '2018-04-30 11:21:45',
                'IsStatus' => 'Y'
            ],
            '1' => [
                'MemIdx' => '100002',
                'SiteCode' => '2',
                'MemId' => 'dlumjjang02',
                'MemName' => '2',
                'Hp1' => '010',
                'Hp2' => '1234',
                'Hp3' => '5149',
                'Email' => '2',
                'EmailEnc' => '2',
                'EmailDomain' => '2',
                'SmsRcvStatus' => '2',
                'EmailRcvStatus' => '2',
                'JoinDate' => '2',
                'IsStatus' => '2'
            ],
            '2' => [
                'MemIdx' => '100003',
                'SiteCode' => '3',
                'MemId' => 'dlumjjang03',
                'MemName' => '3',
                'Hp1' => '010',
                'Hp2' => '4456',
                'Hp3' => '3124',
                'Email' => '3',
                'EmailEnc' => '3',
                'EmailDomain' => '3',
                'SmsRcvStatus' => '3',
                'EmailRcvStatus' => '3',
                'JoinDate' => '3',
                'IsStatus' => '3'
            ],
            '3' => [
                'MemIdx' => '100004',
                'SiteCode' => '4',
                'MemId' => 'dlumjjang04',
                'MemName' => '4',
                'Hp1' => '010',
                'Hp2' => '7890',
                'Hp3' => '5632',
                'Email' => '4',
                'EmailEnc' => '4',
                'EmailDomain' => '4',
                'SmsRcvStatus' => '4',
                'EmailRcvStatus' => '4',
                'JoinDate' => '4',
                'IsStatus' => '4'
            ],
        ];


        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    //발송
    public function storeSend()
    {
        print_r($this->_reqP(null,false));

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'cs_tel', 'label' => '발신번호', 'rules' => 'trim|required|integer'],
            ['field' => 'send_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'send_option_ccd', 'label' => '발송옵션', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'send_datm_day', 'label' => '날짜', 'rules' => 'callback_validateRequiredIf[send_option_ccd,Y]']
        ];

        $field_mem_idx = false;
        foreach ($this->_reqP('mem_idx[]') as $key => $val) {
            if (empty($this->_reqP('mem_phone[]')[$key]) === false) {
                $field_mem_idx = true;
            }
        }
        if ($field_mem_idx === false) {
            $rules = array_merge($rules,[
                ['field' => 'mem_idx[]', 'label' => '수신번호', 'rules' => 'trim|required']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }



        $result = true;
        $this->json_result($result, '성공적으로 발송되었습니다.', $result);
    }
}