<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/message');
    protected $helpers = array();

    private $_send_type = 'message';

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

    private $_groupCcd = [
        'SendPatternCcd' => '637',  //메세지성격 (일반발송, 자동발송)
        'SendTypeCcd' => '638',     //메세지종류 (SMS, LMS)
        'SendStatusCcd' => '639',   //발송상태 (성공,예약,취소)
        'SendOptionCcd' => '640',   //발송옵션 (즉시발송, 예약발송)
    ];

    // 메시지 발송 옵션 (즉시발송, 예약발송)
    private $_send_option_ccd = [
        '0' => '640001',
        '1' => '640002'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendTypeCcd'], $this->_groupCcd['SendStatusCcd']]);

        $this->load->view("crm/message/index", [
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
                'MSG.SendGroupTypeCcd' => $this->_send_type_ccd[$this->_send_type],
                'MSG.SiteCode' => $this->_reqP('search_site_code'),
                'MSG.SendPatternCcd' => $this->_reqP('search_send_pattern_ccd'),
                'MSG.SendTypeCcd' => $this->_reqP('search_send_type_ccd'),
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
     * 쪽지발송 등록(전송)
     */
    public function createSendModal()
    {
        $arr_codes = $this->codeModel->getCcdInArray([$this->_groupCcd['SendPatternCcd'], $this->_groupCcd['SendOptionCcd']]);

        $method = 'POST';
        $set_row_count = '12';

        $this->load->view("crm/message/create_modal", [
            'method' => $method,
            'arr_send_pattern_ccd' => $arr_codes[$this->_groupCcd['SendPatternCcd']],
            'arr_send_option_ccd' => $arr_codes[$this->_groupCcd['SendOptionCcd']],
            'set_row_count' => $set_row_count
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
            ['field' => 'send_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'send_option_ccd', 'label' => '발송옵션', 'rules' => 'trim|required|integer'],
            ['field' => 'send_datm_day', 'label' => '날짜', 'rules' => 'callback_validateRequiredIf[send_option_ccd,Y]']
        ];

        if ($send_type == 1) {
            $rules = array_merge($rules,[
                ['field' => 'mem_id[]', 'label' => 'ID', 'rules' => 'trim|required']
            ]);
        } elseif ($send_type == 2) {
            $rules = array_merge($rules,[
                ['field' => 'attach_file', 'label' => '쪽지수신파일', 'rules' => 'callback_validateFileRequired[attach_file]'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->messageModel->addMessage($this->_reqP(null,false));

        /*$this->json_result($result, '정상 처리되었습니다.',null, ['upload_cnt' => count($return_count)]);*/
        $this->json_result($result, '저장 되었습니다.', $result);

        /**
         * send_type
         * 1 : 입력폼기준 검색
         * 2 : 첨부파일기준 검색
         */
        /*$set_mem_id = '';
        $return_count = [];
        switch ($send_type) {
            case "1" :
                foreach ($data_mem_id as $key => $val) {
                    if (empty($data_mem_id[$key]) === false) {
                        $return_count[$key] = $val;
                        $set_mem_id .= $val.',';
                        $field_mem_id = true;
                    }
                }

                if ($field_mem_id === false) {
                    $rules = array_merge($rules,[
                        ['field' => 'mem_id[]', 'label' => '수신번호', 'rules' => 'trim|required']
                    ]);
                }
                break;
            case "2" :
                $upload_sub_dir = SUB_DOMAIN . '/send/message/' . date('Y') . '/' . date('m') . '/' . date('d');
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

                if (empty($uploaded) === true || count($uploaded) <= 0) {
                    $this->json_result(false, '', ['ret_cd' => false,'ret_msg' => '업로드할 파일이 없습니다.','ret_status' => '500']);
                    return;
                }

                // 엑셀 데이터 셋팅
                $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);
                foreach ($excel_data as $key => $val) {
                    $return_count[$key] = $val['B'];
                    $set_mem_id .= $val['B'].',';
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
        $set_mem_id = substr($set_mem_id , 0, -1);*/

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

        $result = $this->messageModel->addMessage($inputData, $set_mem_id, $this->_send_type);

        $this->json_result($result, '정상 처리되었습니다.',null, ['upload_cnt' => count($return_count)]);*/
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
            $upload_sub_dir = SUB_DOMAIN . '/send/message/' . date('Y') . '/' . date('m') . '/' . date('d') ;
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

    /**
     * 파일명 배열 생성
     * @return string
     */
    private function _getAttachImgNames()
    {
        $attach_file_names[] = 'msg_' . date('YmdHis');
        return $attach_file_names;
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
     * input date 셋팅
     * @param $input
     * @return array
     */
    private function _setInputData($input)
    {
        $upload_sub_dir = SUB_DOMAIN . '/send/message/' . date('Y') . '/' . date('m') . '/' . date('d') ;
        $uploaded = $this->upload->uploadFile('file', ['send_attach_file'], $this->_getAttachImgNames(), $upload_sub_dir);

        $input_data = [
            'SendGroupTypeCcd' => $this->_send_type_ccd[$this->_send_type],
            'SiteCode' => element('site_code', $input),
            'SendOptionCcd' => element('send_option_ccd', $input),
            'SendStatusCcd' => (element('send_option_ccd', $input) == $this->_send_option_ccd['0']) ? $this->_send_status_ccd['0'] : $this->_send_status_ccd['1'],
            'Title' => '',
            'Content' => element('send_content', $input),
            'SendAttachFilePath' => $this->upload->_upload_url . $upload_sub_dir . '/',
            'SendAttachFileName' => (empty($uploaded[0]) || count($uploaded[0]) < 0) ? '' : $uploaded[0]['orig_name']
        ];

        return $input_data;
    }
}