<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasePassPredict extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', '_lms/sys/site', 'survey/survey');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('index','indexv2');

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        $idx = $params[0];
        
        $memidx = $this->session->userdata('mem_idx');

        $res = $this->surveyModel->predictResist($idx, $memidx);
        if(empty($res) === false){
            $mode = 'MOD';
            $subject = '';
            foreach ($res as $key => $val){
                $data['PrIdx'] = $val['PrIdx'];
                $data['TakeNumber'] = $val['TakeNumber'];
                $data['TakeMockPart'] = $val['TakeMockPart'];
                $data['TakeArea'] = $val['TakeArea'];
                $data['AddPoint'] = $val['AddPoint'];
                $data['LectureType'] = $val['LectureType'];
                $data['Period'] = $val['Period'];
                $data['ConfirmFile'] = $val['ConfirmFile'];
                $data['RealConfirmFile'] = $val['RealConfirmFile'];
                $subject .= $val['SubjectCode'].',';
            }
            $subject = substr($subject,0,strlen($subject)-1);
            $data['SubjectCode'] = $subject;

        } else {
            $mode = 'NEW';
            $data = array();
            $data['TakeMockPart'] = '';
            $data['SubjectCode'] = '';
            $data['PrIdx'] = '';
        }

        $serial = $this->surveyModel->getSerial(0);
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->surveyModel->getArea($sysCode_Area);

        $filepath = $this->config->item('upload_url_predict', 'predict');
        $filepath = $filepath.$idx."/";
        $view_file = 'willbes/'.APP_DEVICE.'/predict/'.$idx;
        $this->load->view($view_file, [
            'serial' => $serial,
            'area' => $area,
            'idx' => $idx,
            'mode' => $mode,
            'filepath' => $filepath,
            'data' => $data
        ], false);
    }

    public function indexv2($params = [])
    {
        $idx = $params[0];

        $memidx = $this->session->userdata('mem_idx');

        $res = $this->surveyModel->predictResist($idx, $memidx);
        if(empty($res) === false){
            $mode = 'MOD';
            $subject = '';
            foreach ($res as $key => $val){
                $data['PrIdx'] = $val['PrIdx'];
                $data['TakeNumber'] = $val['TakeNumber'];
                $data['TakeMockPart'] = $val['TakeMockPart'];
                $data['TakeArea'] = $val['TakeArea'];
                $data['AddPoint'] = $val['AddPoint'];
                $data['LectureType'] = $val['LectureType'];
                $data['Period'] = $val['Period'];
                $data['ConfirmFile'] = $val['ConfirmFile'];
                $data['RealConfirmFile'] = $val['RealConfirmFile'];
                $subject .= $val['SubjectCode'].',';
            }
            $subject = substr($subject,0,strlen($subject)-1);
            $data['SubjectCode'] = $subject;

        } else {
            $mode = 'NEW';
            $data = array();
            $data['TakeMockPart'] = '';
            $data['SubjectCode'] = '';
            $data['PrIdx'] = '';
        }

        $serial = $this->surveyModel->getSerial(0);
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->surveyModel->getArea($sysCode_Area);

        $view_file = 'willbes/'.APP_DEVICE.'/predict/'.$idx."_v2";
        $this->load->view($view_file, [
            'serial' => $serial,
            'area' => $area,
            'idx' => $idx,
            'mode' => $mode,
            'data' => $data
        ], false);
    }

    /**
     * 영역선택 ajax
     * @return object|string
     */
    public function getSerialAjax()
    {
        $GroupCcd = $this->_req("GroupCcd");

        $list = $this->surveyModel->getSerial($GroupCcd);

        return $this->response([
            'data' => $list
        ]);

    }

    /**
     * 기본정보 등록
     */
    public function store()
    {
        $rules = [
            ['field' => 'TakeMockPart', 'label' => '응시직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeArea', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPoint', 'label' => '가산점', 'rules' => 'trim|required'],
            ['field' => 'TakeNumber', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'LectureType', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        if( $_FILES['RealConfirmFile']['error'] !== UPLOAD_ERR_OK || $_FILES['RealConfirmFile']['size'] == 0 ) {
            $rules[] = ['field' => 'RealConfirmFile', 'label' => '인증파일', 'rules' => 'required'];
        }

        if ($this->validate($rules) === false) return;

        $result = $this->surveyModel->store();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 기본정보 등록
     */
    public function storeV2()
    {
        $rules = [
            ['field' => 'TakeMockPart', 'label' => '응시직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeArea', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPoint', 'label' => '가산점', 'rules' => 'trim|required'],
            ['field' => 'TakeNumber', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'LectureType', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->surveyModel->storeV2();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 기본정보 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'TakeArea', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPoint', 'label' => '가산점', 'rules' => 'trim|required'],
            ['field' => 'TakeNumber', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'LectureType', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->surveyModel->update();
        $this->json_result($result['ret_cd'], '수정되었습니다.', $result, $result);
    }

    /**
     * 기본정보 수정
     */
    public function updateV2()
    {
        $rules = [
            ['field' => 'TakeArea', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPoint', 'label' => '가산점', 'rules' => 'trim|required'],
            ['field' => 'TakeNumber', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'LectureType', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->surveyModel->updateV2();
        $this->json_result($result['ret_cd'], '수정되었습니다.', $result, $result);
    }

    /*
     * 합격예측서비스인원
     */
    public function autocount($param){
        $ProdCode = $param['prodcode'];
        $PromotionCode = $param['promotioncode'];
        $data = $this->surveyModel->autocount($ProdCode, $PromotionCode);
        $CNT = $data['CNT'];
        $PRECNT = $data['PRECNT'];
        $RCNT = $data['RCNT'];

        $TOTCNT = 0;
        for($i = 1; $i <= $CNT; $i++){
            $TOTCNT = $TOTCNT + mt_rand(2,10);
        }

        $cnt = $TOTCNT + $PRECNT + $RCNT;
        $cnt = number_format($cnt);
        $this->load->view('willbes/pc/predict/autocount', [
            'cnt' => $cnt
        ], false);
    }

    /*
     * 합격예측 실시간 입력자평균
     */
    public function areaAvrAjax(){
        $ProdCode = $this->_req("ProdCode");
        $order = 'area';
        $data = $this->surveyModel->statisticsListLine($ProdCode, $order);
        return $this->response([
            'data' => $data
        ]);
    }

    /*
     * 합격예측 실시간 입력자평균
     */
    public function noticeListAjax(){
        $BoardIdx = $this->_req("BoardIdx");

        $data = $this->surveyModel->noticeList($BoardIdx);
        return $this->response([
            'data' => $data
        ]);
    }

    /**
 * 합격예측채점팝업
 * @return object|string
 */
    public function popwin1()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode', $arr_input);
        $pridx = element('pridx', $arr_input);
        $ppidx = element('ppidx', $arr_input);

        $subject_list = $this->surveyModel->subjectList($prodcode, $pridx);

        if(empty($ppidx) === false) {
            $ppidx = $ppidx;
        } else {
            $ppidx = $subject_list[0]['PpIdx'];
        }

        $filepath = $this->config->item('upload_url_predict_lms', 'predict');
        $filepath = $filepath.$ppidx."/";

        $question_list= $this->surveyModel->predictQuestionCall($ppidx, $prodcode, $pridx);
        foreach ($subject_list as $key => $val){
            $tMpIdx[] =  $val['PpIdx'];
        }

        $arr_condition2 = [
            'IN' => [
                'pp.PpIdx' => $tMpIdx
            ]
        ];

        $qtCntList = $this->surveyModel->questionTempCnt($arr_condition2, $pridx);
        $etcALLYN = "YES";
        foreach ($qtCntList as $key => $val) {
            $mpIdx = $val['PpIdx'];
            $qtList[$mpIdx]['CNT'] =  $val['CNT'];
            $qtList[$mpIdx]['TCNT'] =  $val['TCNT'];

            if($ppidx != $mpIdx){
                if($val['CNT'] != $val['TCNT']) $etcALLYN = "NO";
            }
        }

        $this->load->view('willbes/pc/predict/gradepop1', [
            'prodcode'      => $prodcode,
            'ppidx'         => $ppidx,
            'subject_list'  => $subject_list,
            'question_list' => $question_list,
            'filepath'      => $filepath,
            'arr_input'     => $arr_input,
            'pridx'         => $pridx,
            'etcALLYN'      => $etcALLYN
        ], false);

    }

    /**
     * 임시저장 전체
     * @return object|string
     */
    public function tempSaveAjax()
    {
        ////////////////////////////////////////////////
        $result = $this->surveyModel->answerTempAllSave($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 정답제출
     * @return object|string
     */
    public function examSendAjax()
    {
        $result = $this->surveyModel->examSend($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 정답제출
     * @return object|string
     */
    public function examDeleteAjax()
    {
        $result = $this->surveyModel->examDelete($this->_reqP(null, false));
        $this->json_result($result, '삭제되었습니다.', $result, $result);
    }

    /**
     * 합격예측채점팝업
     * @return object|string
     */
    public function popwin2()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode', $arr_input);

        $this->load->view('willbes/pc/predict/gradepop2', [
            'prodcode' => $prodcode
        ], false);



    }

    /**
     * 합격예측채점팝업
     * @return object|string
     */
    public function popwin3()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode', $arr_input);

        $this->load->view('willbes/pc/predict/gradepop3', [
            'prodcode' => $prodcode
        ], false);

    }

    /**
     * 합격예측채점팝업
     * @return object|string
     */
    public function popwin4()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode', $arr_input);

        $this->load->view('willbes/pc/predict/gradepop4', [
            'prodcode' => $prodcode
        ], false);

    }

}

