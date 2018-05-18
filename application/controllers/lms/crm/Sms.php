<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/crmService', 'crm/send/sms');
    protected $helpers = array();

    private $_send_type = 'sms';

    // 메세지 발송 종류 (SMS,쪽지,메일)
    private $_send_type_ccd = [
        'sms' => '641001',
        'message' => '641002',
        'email' => '641003'
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

    // 메시지 발송 옵션 (즉시발송, 예약발송)
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

        $this->load->view("crm/sms/create_modal", [
            'method' => $method,
            'arr_send_pattern_ccd' => $arr_codes[$this->_groupCcd['SendPatternCcd']],
            'arr_send_option_ccd' => $arr_codes[$this->_groupCcd['SendOptionCcd']],
            'set_row_count' => $set_row_count
        ]);
    }

    /**
     * 사이트별 고객센터번호조회
     * @param array $params
     * @return CI_Output
     */
    public function getSiteCsTelAjax($params = [])
    {
        $site_code = $params[0];
        // 사이트 고객센터전화번호
        $result = $this->siteModel->findSite('CsTel', ['EQ' => ['SiteCode' => $site_code]]);
        return $this->response([
            'cs_tel' => $result['CsTel']
        ]);
    }

    /**
     * 회원 리스트 페이지
     */
    public function listMemberModal()
    {
        $get_site_array = $this->siteModel->getSiteArray();
        $this->load->view("crm/sms/list_member_modal", [
            'send_type' => $this->_send_type,
            'get_site_array' => $get_site_array

        ]);
    }

    /**
     * 회원 리스트 Ajax
     * @return CI_Output
     */
    public function listMemberModalAjax()
    {
        $get_site_array = $this->siteModel->getSiteArray();

        $column = 'Mem.MemIdx, Mem.SiteCode, Mem.MemId, Mem.MemName, fn_dec(Mem.PhoneEnc) as Phone, Mem.JoinDate, Mem.IsStatus, MemInfo.SmsRcvStatus';
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
        $count = $this->_memberList(true, $arr_condition);

        if ($count > 0) {
            $list = $this->_memberList(false, $arr_condition, $column, $this->_reqP('length'), $this->_reqP('start'), ['Mem.MemIdx' => 'desc']);

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
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function storeSend()
    {
        $field_mem_phone = false;
        $send_type = $this->_reqP('send_type');
        $data_mem_phone = $this->_reqP('mem_phone');
        $send_option = $this->_reqP('send_option_ccd');

        $rules = [
            ['field' => 'datest[]', 'label' => 'datest', 'rules' => 'trim|required'],
            ['field' => 'mem_phone[]', 'label' => '수신번호', 'rules' => 'trim|required'],

            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'send_pattern_ccd', 'label' => '발송성격', 'rules' => 'trim|required'],
            ['field' => 'cs_tel', 'label' => '발신번호', 'rules' => 'trim|required|integer'],



            ['field' => 'send_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'send_option_ccd', 'label' => '발송옵션', 'rules' => 'trim|required|integer'],
            ['field' => 'send_datm_day', 'label' => '날짜', 'rules' => 'callback_validateRequiredIf[send_option_ccd,Y]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = true;
        $return_count = ['1'];
        $this->json_result($result, '정상 처리되었습니다.',null, ['upload_cnt' => count($return_count)]);

        /**
         * send_type
         * 1 : 전화번호기준 검색
         * 2 : 첨부파일기준 검색
         */
        /*$set_mem_phone = '';
        $return_count = [];
        switch ($send_type) {
            case "1" :
                foreach ($data_mem_phone as $key => $val) {
                    if (empty($data_mem_phone[$key]) === false) {
                        $return_count[$key] = $val;
                        $set_mem_phone .= $val.',';
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
                $this->load->library('upload');
                $upload_sub_dir = SUB_DOMAIN . '/send/sms/' . date('Y') . '/' . date('m') . '/' . date('d') ;
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

                if (empty($uploaded) === true || count($uploaded) <= 0) {
                    $this->json_result(false, '', ['ret_cd' => false,'ret_msg' => '업로드할 파일이 없습니다.','ret_status' => '500']);
                    return;
                }

                // 엑셀 데이터 셋팅
                $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);
                foreach ($excel_data as $key => $val) {
                    $return_count[$key] = $val['C'];
                    $set_mem_phone .= $val['C'].',';
                }

                // 업로드 파일 삭제
                @unlink($uploaded[0]['full_path']);
                break;

            default :
                $this->json_result(false, '', ['ret_cd' => false,'ret_msg' => '필수 데이터 누락입니다. 관리자에게 문의해 주세요.','ret_status' => '500']);
                return;
                break;
        }

        if ($this->validate($rules) === false) {
            return;
        }
        $set_mem_phone = substr($set_mem_phone , 0, -1);*/

        /**
         * 발송 옵션에 따른 SMS 솔루션 호출 (즉시발송일 경우)
         */
        /*if ($send_option == $this->_send_option_ccd[0]) {
            // 솔루션 호출 구문 시작
        }*/

        /**
         * 데이터 등록
         */
        /*$inputData = $this->_setInputData($this->_reqP(null, false));
        if ($send_option == $this->_send_option_ccd[0]) {
            $inputData = array_merge($inputData, ['SendDatm' => date('Y-m-d H:i:s')]);
        } else {
            $send_datm = $this->_reqP('send_datm_day') . ' ' . $this->_reqP('send_datm_h') . ':' . $this->_reqP('send_datm_m') . ':' . '00';
            $inputData = array_merge($inputData, ['SendDatm' => $send_datm]);
        }

        $inputData = array_merge($inputData,[
            'RegAdminIdx' => $this->session->userdata('admin_idx'),
            'RegDatm' => date('Y-m-d H:i:s'),
            'RegIp' => $this->input->ip_address()
        ]);
        $result = $this->smsModel->addSms($inputData, $set_mem_phone, $this->_send_type);

        $this->json_result($result, '정상 처리되었습니다.',null, ['upload_cnt' => count($return_count)]);*/
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
        $result = true;
        $err_data = [];
        $return = [];

        try{
            $this->load->library('upload');
            $upload_sub_dir = SUB_DOMAIN . '/send/sms/' . date('Y') . '/' . date('m') . '/' . date('d') ;
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

            if (empty($uploaded) === true || count($uploaded) <= 0) {
                throw new \Exception('업로드할 파일이 없습니다.');
            }

            // 엑셀 데이터 셋팅
            $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);

            // 업로드 파일 삭제
            @unlink($uploaded[0]['full_path']);

            $return = [
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

    /**
     * 회원 정보 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $column
     * @return bool|mixed
     */
    private function _memberList($is_count, $arr_condition, $column = '*', $limit = null, $offset = null, $order_by = [])
    {
        $mem_list = $this->smsModel->getMemberList($is_count, $arr_condition, $column, $limit, $offset, $order_by);

        if (empty($mem_list) === true) {
            return 0;
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
            'SendTypeCcd' => (mb_strlen(element('send_content', $input),'euc-kr') <= 80) ? $this->_send_text_length_ccd[0] : $this->_send_text_length_ccd[1],     //LMS
            'SendOptionCcd' => element('send_option_ccd', $input),
            'SendStatusCcd' => (element('send_option_ccd', $input) == $this->_send_option_ccd['0']) ? $this->_send_status_ccd['0'] : $this->_send_status_ccd['1'],
            'CsTel' => element('cs_tel', $input),
            'Title' => '',
            'Content' => element('send_content', $input)
        ];

        return $input_data;
    }
}