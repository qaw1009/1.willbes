<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/mail', 'member/manageMember');
    protected $helpers = array('download');

    private $_send_type = 'mail';

    //수신거부링크주소
    private $_advertise_link = 'http://willbes.net';

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

    private $_send_advertise_pattern_ccd = [
        '0' => '643001',
        '1' => '643002'
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
                'MAIL.SendGroupTypeCcd' => $this->_send_type_ccd[$this->_send_type],
                'MAIL.SiteCode' => $this->_reqP('search_site_code'),
                'MAIL.SendPatternCcd' => $this->_reqP('search_send_pattern_ccd'),
                'MAIL.SendTypeCcd' => $this->_reqP('search_send_type_ccd'),
                'MAIL.SendStatusCcd' => $this->_reqP('search_send_status_ccd'),
                'MAIL.IsStatus' => 'Y',
            ],
            'ORG' => [
                'LKB' => [
                    'MAIL.Title' => $this->_reqP('search_value'),
                    'MAIL.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['MAIL.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->mailModel->listMail(true, $arr_condition);

        if ($count > 0) {
            $list = $this->mailModel->listMail(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['MAIL.SendIdx' => 'desc']);

            // 사용하는 코드값 조회
            $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendTypeCcd'], $this->_groupCcd['SendStatusCcd'], $this->_groupCcd['AdvertisePatternCcd']]);

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'SendPatternCcdName' => ['SendPatternCcd' => $arr_codes[$this->_groupCcd['SendPatternCcd']]],
                'SendStatusCcdName' => ['SendStatusCcd' => $arr_codes[$this->_groupCcd['SendStatusCcd']]],
                'AdvertisePatternCcdName' => ['AdvertisePatternCcd' => $arr_codes[$this->_groupCcd['AdvertisePatternCcd']]]
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
        $list_send_member = [];
        $target_id = $this->_req('target_id');
        if (empty($target_id) === false) {
            $set_send_member_ids = explode(',', $target_id);
            $arr_condition = [
                'IN' => [
                    'MemId' => $set_send_member_ids
                ]
            ];
            $list_send_member = $this->manageMemberModel->listSendMemberInfo($arr_condition);
        }

        $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendOptionCcd'], $this->_groupCcd['AdvertisePatternCcd']]);
        $advertise_placeholder = "본메일은 정보통신망법률 등 관련 규정에 의거하여 회원님께서 윌비스 이메일 수신동의를 하셨기에 발송되었습니다.";
        $advertise_placeholder .= "&#13;&#10;만약 메일 수신을 원치않으시면 [수신거부]를 눌러주십시오.";
        $advertise_placeholder .= "&#13;&#10;If you do not want to receive emails from us, please click. [HERE].";

        $method = 'POST';
        $set_row_count = '12';

        $this->load->view("crm/mail/create", [
            'method' => $method,
            'arr_send_pattern_ccd' => $arr_codes[$this->_groupCcd['SendPatternCcd']],
            'arr_send_option_ccd' => $arr_codes[$this->_groupCcd['SendOptionCcd']],
            'arr_advertise_pattern_ccd' => $arr_codes[$this->_groupCcd['AdvertisePatternCcd']],
            'set_row_count' => $set_row_count,
            'advertise_placeholder' => $advertise_placeholder,
            'list_send_member' => $list_send_member
        ]);
    }

    /**
     * 샘플파일 다운로드
     */
    public function sampleDownload()
    {
        $fileinfo = '/public/uploads/willbes/_sample_download/sample_mail.xlsx';
        public_download($fileinfo);
    }

    /**
     * 발송 첨부파일 다운로드
     * @param array $fileinfo
     */
    public function sendFileDownload($fileinfo=[])
    {
        public_download($fileinfo[0]);
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
                ['field' => 'mem_name[]', 'label' => '수신정보 이름', 'rules' => 'callback_validateArrayRequired[mem_name,1]'],
                ['field' => 'mem_mail[]', 'label' => '수신정보 메일', 'rules' => 'callback_validateArrayRequired[mem_mail,1]|valid_email'],
            ]);
        } elseif ($send_type == 2) {
            $rules = array_merge($rules,[
                ['field' => 'attach_file', 'label' => '수신정보파일', 'rules' => 'callback_validateFileRequired[attach_file]'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        list($result, $return_count) = $this->mailModel->addMail($this->_reqP(null,false),
            $this->_send_type, $this->_send_type_ccd, $this->_send_status_ccd, $this->_send_option_ccd, $this->_send_advertise_pattern_ccd, $this->_advertise_link);

        $this->json_result($result, '정상 처리되었습니다.',null, ['upload_cnt' => $return_count]);
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
        $result = $this->siteModel->findSite('UseMail', ['EQ' => ['SiteCode' => $site_code]]);
        return $this->response([
            'site_mail' => $result['UseMail']
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
        $result = $this->mailModel->updateSendStatus($params);
        $this->json_result($result, '적용 되었습니다.', $result);
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

        $column = 'Title, Content, SendAttachFilePath, SendAttachFileName, SendAttachRealFileName';
        $arr_condition = [
            'EQ' => [
                'SendIdx' => $send_idx
            ]
        ];
        $data = $this->mailModel->findMail($column, $arr_condition);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $this->load->view("crm/mail/list_send_detail_modal", [
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
                    'SEND.MailRcvStatus' => $this->_reqP('search_sms_is_agree')
                ],
                'ORG' => [
                    'LKB' => [
                        'Mem.MemId' => $this->_reqP('search_value'),
                        'Mem.MemName' => $this->_reqP('search_value'),
                    ]
                ]
            ];

            $count = $this->mailModel->listMailDetail(true, $arr_condition);
            if ($count > 0) {
                $list = $this->mailModel->listMailDetail(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SendIdx' => 'desc']);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}