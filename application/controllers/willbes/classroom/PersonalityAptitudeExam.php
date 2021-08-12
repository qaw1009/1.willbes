<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalityAptitudeExam extends \app\controllers\FrontController
{
    protected $models = array('personalityAptitudeExamF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();
    private $arr_exam_state = [
        '0' => '검사시작'
        ,'1' => '검사중'
        ,'3' => '시간만료'
        ,'9' => '검사완료'
    ];

    //윌비스 api 도메인
    private $_willbes_api_domain = '';

    //윌비스 URI
    private $_willbes_url = [
        'validate' => '/canwe/exam/validateForData'
        ,'update_state' => '/canwe/exam/updateState'
    ];

    //canwe 연동모드 (test/real)
    private $_canwe_mode = (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? 'test' : 'real';

    //canwe 연동주소 설정
    private $_canwe_url_info = [
        'test' => [
            'exam' => 'https://willbesdev.canwe.co.kr/ver02/exam/checkWillbesExamUser.asp' //인적성검사
            ,'report' => 'https://willbesdev.canwe.co.kr/ver02/exam/checkWillbesExamUser.asp' //레포트
        ],
        'real' => [
            'exam' => 'https://willbes.canwe.co.kr/ver02/exam/checkWillbesExamUser.asp' //인적성검사
            ,'report' => 'https://willbes.canwe.co.kr/ver02/exam/checkWillbesExamUser.asp' //레포트
        ]
    ];

    //canwe 연동주소
    private $_canwe_url = array();

    public function __construct()
    {
        parent::__construct();
        $this->_willbes_api_domain = 'https://api' . ENV_DOMAIN . '.' . config_item('base_domain');
        $this->_canwe_url = $this->_canwe_url_info[$this->_canwe_mode];
    }

    /**
     * 인적성검사 상품 리스트
     */
    public function index()
    {
        $base_data['arr_exam_state'] = $this->arr_exam_state;
        //인적성검사 상품구매리스트 조회
        $list = $this->personalityAptitudeExamFModel->listProduct($this->_set_condition(),null,1);
        if (empty($list) === true) {
            show_alert('인적성검사상품 구매회원 전용입니다.','/classroom/home/index');
        }

        $this->load->view('/classroom/personalityAptitudeExam/index', [
            'base_data' => $base_data
            ,'row_count' => count($list)
            ,'list' => $list
        ]);
    }

    public function listAjax()
    {
        $list = $this->personalityAptitudeExamFModel->listProduct($this->_set_condition(),['o.OrderIdx' => 'desc']);
        if (empty($list) === true) { $list = []; }
        return $this->response([
            'rownum' => count($list),
            'ret_data' => $list
        ]);
    }

    /**
     * 인적성 검사 페이지 호출
     * @param array $params
     */
    public function exam($params = [])
    {
        if (empty($params[0]) === true) {
            show_alert('잘못된 접근입니다.','close');
        }
        $op_idx = $params[0];
        $arr_condition = $this->_set_condition();
        unset($arr_condition['IN']);
        $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['op.OrderProdIdx' => $op_idx, 'op.PayStatusCcd' => '676001']);
        $data = $this->personalityAptitudeExamFModel->listProduct($arr_condition,null,1);
        if (empty($data) === true) {
            show_alert('조회된 상품이 없습니다.','close');
        }

        //데이터 유효성 검사
        $this->_data_validation($data[0]);

        //인적성 검사 데이터 저장
        $result = $this->personalityAptitudeExamFModel->addPersonalityAptitudeExam($data[0]);
        if ($result['ret_cd'] === false) {
            show_alert($result['ret_msg'],'close');
        }

        //파라미터 셋팅
        $params = $this->_setExamParams($data[0], $result['ret_msg']);

        //로그저장
        $this->personalityAptitudeExamFModel->addPersonalityAptitudeExamForLog($params, $result['ret_msg'],'exam');

        //인적성검사 페이지 이동
        redirect($this->_canwe_url['exam'].'?'.$params);
    }

    /**
     * 레포트페이지 호출
     * @param array $params
     */
    public function report($params = [])
    {
        if (empty($params[0]) === true) {
            show_alert('잘못된 접근입니다.','close');
        }

        $pae_idx = $params[0];
        $arr_condition = $this->_set_condition();
        unset($arr_condition['IN']);
        $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['pae.PaeIdx' => $pae_idx, 'op.PayStatusCcd' => '676001']);
        $data = $this->personalityAptitudeExamFModel->listProduct($arr_condition,null,1, 'INNER');
        if (empty($data) === true) {
            show_alert('조회된 상품이 없습니다.','close');
        }

        $form_data = [
            'mode' => 'V'
            ,'bmt_uid' => $data[0]['BtmUid']
            ,'user_ids' => $data[0]['OrderProdIdx']
        ];
        //로그저장
        $this->personalityAptitudeExamFModel->addPersonalityAptitudeExamForLog(json_encode($form_data,JSON_UNESCAPED_UNICODE), $data[0]['PaeIdx'],'report');

        form_data_submit($form_data,'',$this->_canwe_url['report']);
    }

    /**
     * 조회 조건 셋팅
     * @return array[]
     */
    private function _set_condition()
    {
        $condition = [
            'EQ' => [
                'o.MemIdx' => $this->session->userdata('mem_idx')
                ,'mstp.ProdTypeCcd' => $this->personalityAptitudeExamFModel->prodTypeCcd
                ,'mstpl.ExternalCorpCcd' => $this->personalityAptitudeExamFModel->externalCorpCcd
            ],
            'IN' => [
                'op.PayStatusCcd' => $this->personalityAptitudeExamFModel->payStatusCcd
            ]
        ];
        return $condition;
    }

    private function _data_validation($data = [])
    {
        $now = date('Ymd');
        if (empty($data['ExamEndDayForNumber']) === false && ($data['ExamEndDayForNumber'] < $now)) {
            show_alert('검사기간이 만료되었습니다.','close');
        }
    }

    /**
     * 인적성 검사 파라미터 셋팅
     * @param array $data
     * @param string $pae_idx
     * @return false|string
     */
    private function _setExamParams($data = [],$pae_idx = '')
    {
        if (empty($pae_idx) === true) {
            show_alert('데이터 오류입니다. 운영자에게 문의해주세요.(0)','close');
        }
        if (empty(explode(':',$data['ExternalLinkCode'])[0]) === true) {
            show_alert('데이터 오류입니다. 운영자에게 문의해주세요.(1)','close');
        }

        $params = 'order_namber='.$data['OrderProdIdx'];
        $params .= '&id='.$data['MemId'];
        $params .= '&name='.urlencode($data['MemName']);
        $params .= '&case_i='.explode(':',$data['ExternalLinkCode'])[0];
        $params .= '&case_j='.(empty(explode(':',$data['ExternalLinkCode'])[1]) === true ? '' : explode(':',$data['ExternalLinkCode'])[1]);
        $params .= '&ret_idx='.$pae_idx;
        $params .= '&ret_url='.urlencode($this->_willbes_api_domain.$this->_willbes_url['validate']);
        $params .= '&state_url='.urlencode($this->_willbes_api_domain.$this->_willbes_url['update_state']);
        return $params;
    }
}