<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/sms');
    protected $helpers = array();

    private $_send_type = 'sms';
    // 메세지 발송 종류 (SMS,쪽지,메일)
    private $_send_type_ccd = [
        'sms' => '641001',
        'msg' => '641002',
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
        $arr_send_pattern_ccd = $this->codeModel->getCcd($this->_groupCcd['SendPatternCcd']);
        $arr_send_option_ccd = $this->codeModel->getCcd($this->_groupCcd['SendOptionCcd']);

        $method = 'POST';
        $set_row_count = '12';

        $this->load->view("crm/sms/create_modal", [
            'method' => $method,
            'get_site_array' => $get_site_array,
            'arr_send_pattern_ccd' => $arr_send_pattern_ccd,
            'arr_send_option_ccd' => $arr_send_option_ccd,
            'set_row_count' => $set_row_count
        ]);
    }

    public function getSiteCsTelAjax($params = [])
    {
        $site_code = $params[0];
        // 사이트 고객센터전화번호
        $result = $this->siteModel->findSite('CsTel', ['EQ' => ['SiteCode' => $site_code]]);
        return $this->response([
            'cs_tel' => $result['CsTel']
        ]);
    }

    public function listMemberModal()
    {
        $get_site_array = $this->siteModel->getSiteArray();

        $this->load->view("crm/sms/list_member_modal", [
            'send_type' => $this->_send_type,
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
        $arr_mem_phone = [];
        $field_mem_phone = false;
        $send_type = $this->_reqP('send_type');
        $member_type = $this->_reqP('member_type');
        $data_mem_phone = $this->_reqP('mem_phone[]');

        /*print_r($this->_reqP(null,false));*/
        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'send_pattern_ccd', 'label' => '발송성격', 'rules' => 'trim|required'],
            ['field' => 'cs_tel', 'label' => '발신번호', 'rules' => 'trim|required|integer'],
            ['field' => 'send_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'send_option_ccd', 'label' => '발송옵션', 'rules' => 'trim|required|integer'],
            ['field' => 'send_datm_day', 'label' => '날짜', 'rules' => 'callback_validateRequiredIf[send_option_ccd,Y]']
        ];

        /**
         * send_type
         * 1 : 전화번호기준 검색
         * 2 : 첨부파일기준 검색
         */
        switch ($send_type) {
            case "1" :
                foreach ($data_mem_phone as $key => $val) {
                    if (empty($data_mem_phone[$key]) === false) {
                        $arr_mem_phone[$key] = $val;
                        $field_mem_phone = true;
                    }
                }

                if ($field_mem_phone === false) {
                    $rules = array_merge($rules,[
                        ['field' => 'mem_phone[]', 'label' => '수신번호', 'rules' => 'trim|required']
                    ]);
                }
                break;
            case "2" :
                break;

            default :
                $this->json_result(false, '', ['ret_cd' => false,'ret_msg' => '필수 데이터 누락입니다. 관리자에게 문의해 주세요.','ret_status' => '500']);
                return;
                break;
        }

        if ($this->validate($rules) === false) {
            return;
        }

        /**
         * $member_type
         * 1 : 정회원
         * 2 : 비회원
         */
        $arr_member_data = [];
        if ($member_type == 1) {
            $arr_condition = [
                'EQ' => ['Mem.SiteCode' => $this->_reqP('site_code')],
                'IN' => ['CONCAT(Mem.Hp1,Mem.Hp2,Mem.Hp3)' => $arr_mem_phone]
            ];
            $column = "Mem.MemIdx, Mem.MemId, Mem.MemName, CONCAT(Mem.Hp1,Mem.Hp2,Mem.Hp3) AS Phone, CONCAT(Mem.Email,'@',Mem.EmailDomain) as Email, MemInfo.SmsRcvStatus, MemInfo.EmailRcvStatus";
            $arr_member_data = $this->_memberList($arr_condition, $column);

            if (empty($arr_member_data) || count($arr_member_data) <= 0) {
                $this->json_result(false, '', ['ret_cd' => false,'ret_msg' => '조회된 회원 정보가 없습니다.','ret_status' => '500']);
                return;
            }
        } else {
            foreach ($arr_mem_phone as $key => $val) {
                $arr_member_data[$key] = ['Phone' => $val];
            }
        }

        // 데이터 등록
        $inputData = $this->_setInputData($this->_reqP(null, false));
        $inputData = array_merge($inputData,[
            'RegAdminIdx' => $this->session->userdata('admin_idx'),
            'RegDatm' => date('Y-m-d H:i:s'),
            'RegIp' => $this->input->ip_address()
        ]);
        $result = $this->smsModel->addSms($inputData, $arr_member_data);


        $result = true;
        $this->json_result($result, '성공적으로 발송되었습니다.', $result);
    }

    /**
     * Excel 파일 업로드
     */
    public function fileUploadAjax()
    {
        $result = true;
        $err_data = [];
        $return = [];

        try{
            $this->load->library('upload');
            $upload_sub_dir = SUB_DOMAIN . '/sendList/sms/' . date('Ymd');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

            if (empty($uploaded) === true || count($uploaded) <= 0) {
                throw new \Exception('업로드할 파일이 없습니다.');
            }

            $attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
            $attach_data['AttachFileName'] = $uploaded[0]['orig_name'];

            // 엑셀 데이터 셋팅
            $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);

            // 업로드 파일 삭제
            @unlink($uploaded[0]['full_path']);

            $return = [
                'file_info' => $attach_data,
                'excel_data' => $excel_data
            ];

        } catch (\Exception $e) {
            $result = false;
            $err_data['ret_cd'] = false;
            $err_data['ret_msg'] = $e->getMessage();
            $err_data['ret_status'] = '422';
        }

        $this->json_result($result, '성공', $err_data, $return);
    }

    private function _memberList($arr_condition, $column)
    {
        $mem_list = $this->smsModel->getMemberList($arr_condition, $column);

        if (empty($mem_list) === true) {
            return false;
        }

        return $mem_list;
    }

    /**
     * 엑셀 데이터 리턴
     * @param $file_path
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    private function _ExcelReader($file_path)
    {
        $this->load->library('excel');
        $excel_data = $this->excel->readExcel($file_path);

        return $excel_data;
    }

    /**
     * 파일명 배열 생성
     * @param $board_idx
     * @return array
     */
    private function _getAttachImgNames()
    {
        $attach_file_names[] = 'send_list_' . date('YmdHis');
        return $attach_file_names;
    }

    /**
     * input date 셋팅
     * @param $input
     * @return array
     */
    private function _setInputData($input)
    {
        $input_data = [
            'SendGroupTypeCcd' => $this->_send_type_ccd[$this->_send_type],
            'SiteCode' => element('site_code', $input),
            'SendPatternCcd' => element('send_pattern_ccd', $input),
            /*'SendTypeCcd' => 'SMS' //LMS*/
            'SendOptionCcd' => element('send_option_ccd', $input),
            'SendStatusCcd' => (element('send_option_ccd', $input) == $this->_send_option_ccd['0']) ? $this->_send_status_ccd['0'] : $this->_send_status_ccd['1'],
            'CsTel' => element('cs_tel', $input),
            'AttachFileRoute' => '',
            'AttachFileName' => '',
            'Title' => '',
            'Content' => element('send_content', $input)
        ];

        return $input_data;
    }
}