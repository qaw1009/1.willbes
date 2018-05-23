<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/mail');
    protected $helpers = array();

    private $_send_type = 'mail';

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
        'SendPatternCcd' => '637',  //메세지성격 (일반발송, 자동발송)
        'SendTypeCcd' => '638',     //메세지종류 (SMS, LMS)
        'SendStatusCcd' => '639',   //발송상태 (성공,예약,취소)
        'SendOptionCcd' => '640',   //발송옵션 (즉시발송, 예약발송)
        'AdvertisePatternCcd' => '643'  //광고타입 (광고, 일반)
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendStatusCcd'], $this->_groupCcd['AdvertisePatternCcd']]);

        $this->load->view("crm/mail/index", [
            'arr_send_pattern_ccd' => $arr_codes[$this->_groupCcd['SendPatternCcd']],
            'arr_send_status_ccd' => $arr_codes[$this->_groupCcd['SendStatusCcd']],
            'arr_send_advertise_pattern_ccd' => $arr_codes[$this->_groupCcd['AdvertisePatternCcd']],
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
        $count = $this->mailModel->listMail(true, $arr_condition);

        if ($count > 0) {
            $list = $this->mailModel->listMail(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SMS.SendIdx' => 'desc']);

            // 사용하는 코드값 조회
            $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendTypeCcd'], $this->_groupCcd['SendStatusCcd']]);

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'SendPatternCcdName' => ['SendPatternCcd' => $arr_codes[$this->_groupCcd['SendPatternCcd']]],
                'SendStatusCcdName' => ['SendStatusCcd' => $arr_codes[$this->_groupCcd['SendStatusCcd']]],
                'AdvertisePatternCcdName' => ['SendTypeCcd' => $arr_codes[$this->_groupCcd['AdvertisePatternCcd']]]
            ], true);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 메일발송 등록(전송)
     */
    public function createSend()
    {
        $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendOptionCcd'], $this->_groupCcd['AdvertisePatternCcd']]);
        $advertise_placeholder = "본메일은 정보통신망법률 등 관련 규정에 의거하여 회원님께서 윌비스 이메일 수신동의를 하셨기에 발송되었습니다.";
        $advertise_placeholder .= "&#13;&#10;만약 메일 수신을 원치않으시면 [수신거부]를 눌러주십시오.";
        $advertise_placeholder .= "&#13;&#10;If you do not want to receive emails from us, please click.[HERE].";

        $method = 'POST';
        $set_row_count = '12';

        $this->load->view("crm/mail/create", [
            'method' => $method,
            'arr_send_pattern_ccd' => $arr_codes[$this->_groupCcd['SendPatternCcd']],
            'arr_send_option_ccd' => $arr_codes[$this->_groupCcd['SendOptionCcd']],
            'arr_advertise_pattern_ccd' => $arr_codes[$this->_groupCcd['AdvertisePatternCcd']],
            'set_row_count' => $set_row_count,
            'advertise_placeholder' => $advertise_placeholder
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
            ['field' => 'send_pattern_ccd', 'label' => '발송 성격', 'rules' => 'trim|required'],
            ['field' => 'send_mail', 'label' => '발송 메일', 'rules' => 'trim|required'],
            ['field' => 'advertise_pattern_ccd', 'label' => '광고성 유무', 'rules' => 'trim|required'],
            ['field' => 'send_title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'send_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'send_option_ccd', 'label' => '발송옵션', 'rules' => 'trim|required|integer'],
            ['field' => 'send_datm_day', 'label' => '날짜', 'rules' => 'callback_validateRequiredIf[send_option_ccd,N]']
        ];

        if ($send_type == 1) {
            $rules = array_merge($rules,[
                ['field' => 'mem_mail[]', 'label' => '수신정보', 'rules' => 'callback_validateArrayRequired[mem_mail,1]'],
            ]);
        } elseif ($send_type == 2) {
            $rules = array_merge($rules,[
                ['field' => 'attach_file', 'label' => '수신정보파일', 'rules' => 'callback_validateFileRequired[attach_file]'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }
    }

    /**
     * 사이트별 발신메일 조회
     * @param array $params
     * @return CI_Output
     */
    public function getSiteMailInfoAjax($params = [])
    {
        $site_code = $params[0];
        // 사이트 고객센터전화번호
        $result = $this->siteModel->findSite('CsTel', ['EQ' => ['SiteCode' => $site_code]]);
        return $this->response([
            'cs_tel' => $result['CsTel']
        ]);
    }

    /**
     * Excel 파일 업로드
     */
    public function fileUploadAjax()
    {
        list($result, $err_data, $return) = $this->mailModel->fileUpload();
        $this->json_result($result, '성공', $err_data, $return);
    }
}