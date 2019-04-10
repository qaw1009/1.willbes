<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyModel extends WB_Model
{
    private $_table = [
        'surveyQuestion' => 'lms_survey_question',
        'surveyQuestionSet' => 'lms_survey_question_set',
        'surveyQuestionSetDetail' => 'lms_survey_question_set_r_question',
        'surveyProduct' => 'lms_survey_product',
        'surveyAnswer' => 'lms_survey_answer_info',
        'surveyAnswerDetail' => 'lms_survey_answer',

        'predictProduct' => 'lms_product_predict',
        'predictCode' => 'lms_predict_code',
        'predictRegisterR' => 'lms_predict_register_r_code',
        'predictRegister' => 'lms_predict_register',

        'sysCode' => 'lms_sys_code',
    ];

    public $upload_path_predict;       // 통파일 저장경로: ~/predict/{idx}/

    public function __construct()
    {
        parent::__construct('lms');
        $this->upload_path_predict = $this->config->item('upload_path_predict', 'predict');
    }

    /**
     * 기본정보 등록
     */
    public function store()
    {
        try {
            $this->_conn->trans_begin();

            $names = $this->makeUploadFileName(['RealConfirmFile'], 1);
            $ProdCode = $this->input->post('ProdCode');
            // 데이터 저장
            $data = array(
                'ProdCode' => $ProdCode,
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SiteCode' => $this->input->post('SiteCode'),
                'TakeNumber' => $this->input->post('TakeNumber'),
                'TakeMockPart' => $this->input->post('TakeMockPart'),
                'TakeArea' => $this->input->post('TakeArea'),
                'AddPoint' => $this->input->post('AddPoint'),
                'LectureType' => $this->input->post('LectureType'),
                'Period' => $this->input->post('Period'),
                'ConfirmFile' => $names['RealConfirmFile']['name'],
                'RealConfirmFile' => $names['RealConfirmFile']['real'],
            );

            if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictRegister']) === false) {
                throw new \Exception('저장에 실패했습니다.');
            }

            $nowIdx = $this->_conn->insert_id();

            // 파일 업로드
            $uploadSubPath = $this->upload_path_predict . $ProdCode;

            $isSave = $this->uploadFileSave($uploadSubPath, $names);
            if($isSave !== true) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            $Ssubject = $this->input->post('Ssubject');
            $Psubject = $this->input->post('Psubject');

            if(empty($Ssubject)===false){
                for($i=0; $i < count($Ssubject); $i++){
                    // 데이터 저장
                    $data = array(
                        'PrIdx' => $nowIdx,
                        'ProdCode' => $this->input->post('ProdCode'),
                        'SubjectCode' => $Ssubject[$i],
                    );

                    if ($this->_conn->set($data)->insert($this->_table['predictRegisterR']) === false) {
                        throw new \Exception('저장에 실패했습니다.');
                    }
                }
            }

            if(empty($Psubject)===false) {
                for ($i = 0; $i < count($Psubject); $i++) {
                    // 데이터 저장
                    $data = array(
                        'PrIdx' => $nowIdx,
                        'ProdCode' => $this->input->post('ProdCode'),
                        'SubjectCode' => $Psubject[$i],
                    );

                    if ($this->_conn->set($data)->insert($this->_table['predictRegisterR']) === false) {
                        throw new \Exception('저장에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowIdx]];
    }

    /**
     * 기본정보 수정
     */
    public function update()
    {
        try {
            $this->_conn->trans_begin();

            $names = $this->makeUploadFileName(['RealConfirmFile'], 1);
            $ProdCode = $this->input->post('ProdCode');
            $PrIdx = $this->input->post('PrIdx');
            // 데이터 저장
            $data = array(
                'ProdCode' => $ProdCode,
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SiteCode' => $this->input->post('SiteCode'),
                'TakeNumber' => $this->input->post('TakeNumber'),
                'TakeMockPart' => $this->input->post('TakeMockPart'),
                'TakeArea' => $this->input->post('TakeArea'),
                'AddPoint' => $this->input->post('AddPoint'),
                'LectureType' => $this->input->post('LectureType'),
                'Period' => $this->input->post('Period'),
            );

            if( isset($names['RealConfirmFile']['error']) && $names['RealConfirmFile']['error'] === UPLOAD_ERR_OK && $names['RealConfirmFile']['size'] > 0 ) {
                $data['ConfirmFile'] = $names['RealConfirmFile']['name'];
                $data['RealConfirmFile'] = $names['RealConfirmFile']['real'];

                // 파일 업로드
                $uploadSubPath = $this->upload_path_predict . $ProdCode;

                $isSave = $this->uploadFileSave($uploadSubPath, $names);
                if($isSave !== true) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }

            $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where('PrIdx', $PrIdx);

            if ($this->_conn->update($this->_table['predictRegister']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            //삭제후 입력
            $where = ['PrIdx' => $PrIdx];
            try {
                if($this->_conn->delete($this->_table['predictRegisterR'], $where) === false){
                    throw new \Exception('삭제에 실패했습니다.');
                }
            } catch (\Exception $e) {
                return error_result($e);
            }

            $Ssubject = $this->input->post('Ssubject');
            $Psubject = $this->input->post('Psubject');

            if(empty($Ssubject)===false){

                for($i=0; $i < count($Ssubject); $i++){
                    // 데이터 저장
                    $data = array(
                        'PrIdx' => $PrIdx,
                        'ProdCode' => $this->input->post('ProdCode'),
                        'SubjectCode' => $Ssubject[$i],
                    );

                    if ($this->_conn->set($data)->insert($this->_table['predictRegisterR']) === false) {
                        throw new \Exception('저장에 실패했습니다.');
                    }
                }
            }

            if(empty($Psubject)===false) {
                for ($i = 0; $i < count($Psubject); $i++) {
                    // 데이터 저장
                    $data = array(
                        'PrIdx' => $PrIdx,
                        'ProdCode' => $this->input->post('ProdCode'),
                        'SubjectCode' => $Psubject[$i],
                    );

                    if ($this->_conn->set($data)->insert($this->_table['predictRegisterR']) === false) {
                        throw new \Exception('저장에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true];
    }

    /**
     *  업로드시 저장될 파일명 생성
     */
    public function makeUploadFileName($in, $prefixLen=0)
    {
        $names = $_FILES;

        foreach ($names as $key => &$it) {
            if(in_array($key, $in)) {
                if (is_array($it['name'])) { // 업로드 배열로 받는 경우
                    $i = 1;
                    foreach ($it['name'] as $key_s => $it_s) {
                        $tmp = explode('.', $it['name'][$key_s]);
                        $ext = isset($tmp[1]) ? '.' . $tmp[1] : '';
                        $prefix = ($prefixLen) ? substr($key, 0, $prefixLen) . $i . '_' : '';

                        $it['real'][] = $prefix . md5(uniqid(mt_rand())) . $ext;
                        $i++;
                    }
                }
                else {
                    $tmp = explode('.', $it['name']);
                    $ext = isset($tmp[1]) ? '.' . $tmp[1] : '';
                    $prefix = ($prefixLen) ? substr($key, 0, $prefixLen) . '_' : '';

                    $it['real'] = $prefix . md5(uniqid(mt_rand())) . $ext;
                }
            }
        }

        return $names;
    }

    /**
     *  파일저장 및 수정
     */
    public function uploadFileSave($uploadSubPath, $names, $fileBackup=array(), $type='file')
    {
        $this->load->library('upload');

        try {
            if (!$uploadSubPath) {
                throw new Exception('파라메타 오류');
            }

            $realFileNames = array();
            foreach ($names as $name) {
                if( is_array($name['real']) )
                    $realFileNames = array_merge($realFileNames, $name['real']);
                else
                    $realFileNames[] = $name['real'];
            }

            // 이미지 업로드
            $uploaded = $this->upload->uploadFile($type, array_keys($names), $realFileNames, $uploadSubPath);
            if (is_array($uploaded) === false) {
                throw new Exception($uploaded);
            }

            // 수정, 삭제시 이미지 백업
            if($fileBackup) {
                $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($fileBackup), false, $this->upload_path_mockBackup);
                if ($is_bak_uploaded_file !== true) {
                    throw new Exception($is_bak_uploaded_file);
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;
    }


    /**
     * 합격예측 접수데이터 호출
     * @param $ProdCode
     * @param $MemIdx
     * @return mixed
     */
    public function predictResist($ProdCode, $MemIdx){
        $column = "
            pr.PrIdx, TakeNumber, TakeMockPart, TakeArea, AddPoint, LectureType, Period, ConfirmFile, RealConfirmFile, SubjectCode
        ";

        $from = "
            FROM 
                {$this->_table['predictRegister']} AS pr
                JOIN {$this->_table['predictRegisterR']} AS pc ON pr.PrIdx = pc.PrIdx
        ";

        $order_by = " ";
        $where = " WHERE MemIdx = '".$MemIdx."' AND pr.ProdCode = ".$ProdCode."";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data = $query->result_array();

        return $data;
    }

    /**
     *  합격예측용 직렬호출
     */
    public function getSerial($GroupCcd){
        $column = "
            Ccd, CcdName, Type  
        ";

        $from = "
            FROM 
                {$this->_table['predictCode']} 
        ";

        $order_by = " ORDER BY OrderNum";
        $where = " WHERE IsUse = 'Y' AND GroupCcd = ".$GroupCcd."";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     *  합격예측용 직렬호출
     */
    public function getArea($GroupCcd){
        $column = "
            Ccd, CcdName  
        ";

        $from = "
            FROM 
                {$this->_table['sysCode']} 
        ";

        $order_by = " ORDER BY OrderNum";
        $where = " WHERE IsUse = 'Y' AND GroupCcd = ".$GroupCcd;
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    //설문 상품호출
    public function productCall($idx){
        $column = "
            *
        ";

        $from = "
            FROM
                {$this->_table['surveyProduct']} 
        ";

        $order_by = "";
        $where = " WHERE SpIdx = ".$idx;
        //echo "<pre>".'select ' . $column . $from . $where . $order_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     * 문항세트호출
     */
    public function questionSetCall($idx){
        $column = "
            *
        ";

        $from = "
            FROM
                {$this->_table['surveyQuestionSet']} AS sqs
                JOIN {$this->_table['surveyQuestionSetDetail']} AS sqsd ON sqs.SqsIdx = sqsd.SqsIdx
        ";

        $order_by = " ORDER BY Ordering ASC";
        $where = " WHERE sqs.SqsIdx = ".$idx;
        //echo "<pre>".'select ' . $column . $from . $where . $order_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     * 문항세트호출
     */
    public function questionCall($idx){
        $column = "
            *
        ";

        $from = "
            FROM
                {$this->_table['surveyQuestion']}
        ";

        $order_by = "";
        $where = " WHERE SqIdx = ".$idx;
        //echo "<pre>".'select ' . $column . $from . $where . $order_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     * 설문저장
     */
    public function surveyIs($idx){
        $column = "
            COUNT(*) AS CNT
        ";

        $from = "
            FROM
                {$this->_table['surveyAnswer']}
        ";

        $order_by = "";
        $where = " WHERE SpIdx = ".$idx." AND MemIdx = ".$this->session->userdata('mem_idx');
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     * 설문결과
     */
    public function answerCall($idx)
    {
        $column = "
            SubTitle, sa.SqIdx, Answer, sa.Type, 
            (SELECT Cnt FROM {$this->_table['surveyQuestion']} WHERE SqIdx = sa.SqIdx) AS CNT
        ";

        $from = "
            FROM 
                {$this->_table['surveyProduct']} AS sp
                JOIN {$this->_table['surveyAnswer']} AS si ON sp.SpIdx = si.SpIdx
                JOIN {$this->_table['surveyAnswerDetail']} AS sa ON si.SaIdx = sa.SaIdx
                LEFT JOIN {$this->_table['surveyQuestionSetDetail']}  sr ON sa.SqIdx = sr.SqIdx AND sp.SqsIdx = sr.SqsIdx
        ";

        $order_by = "ORDER BY sr.GroupNumber ASC, sa.SqIdx ASC";
        $where = " WHERE sp.SpIdx = " . $idx . " AND sa.TYPE IN ('S','T')";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     * 문항코멘트
     */
    public function questionSet($idx){
        $column = "
            Comment1,Comment2,Comment3,Comment4,Comment5,Comment6,Comment7,Comment8,Comment9,Comment10,
            Comment11, Comment12, Comment13, Comment14, Comment15, Comment16, Comment17, Comment18, Comment19, Comment20, 
            Comment21, Comment22, Comment23, Comment24, Comment25
        ";

        $from = "
            FROM 
                {$this->_table['surveyQuestion']} 
        ";

        $order_by = " ";
        $where = " WHERE SqIdx = " . $idx;
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }
    
    /**
     * 설문저장
     */
    public function storeSurvey($formData = []){
        try {
            $this->_conn->trans_begin();

            $SpIdx = element('SpIdx', $formData);
            $totalIdx = element('totalIdx', $formData);
            $totalType = element('totalType', $formData);

            // 데이터 수정
            $data = [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SpIdx'  => $SpIdx
            ];

            $this->_conn->set($data)->set('RegDatm', 'NOW()', false);

            if ($this->_conn->insert($this->_table['surveyAnswer']) === false) {
                throw new \Exception('문항저장에 실패했습니다.');
            }

            $saidx = $this->_conn->insert_id();

            for($i = 0; $i < count($totalIdx); $i++){
                // 데이터 수정
                $snum = $totalIdx[$i];
                $type = $totalType[$i];

                $q = element('q'.$snum, $formData);

                $txt = '';
                if($type == 'S' || $type == 'D'){
                    $txt = $q;
                } else {
                    for($j=0; $j < COUNT($q); $j++){
                        $txt .= $q[$j]."/";
                    }
                    $txt = substr($txt,0,strlen($txt)-1);
                }

                $Comment = '';
                $Answer = '';

                if($type == 'S' || $type == 'T'){
                    $Answer = $txt;
                } else {
                    $Comment = $txt;
                }

                if(empty(trim($txt)) === false){
                    $data = [
                        'SaIdx' => $saidx,
                        'SqIdx' => $snum,
                        'Type' => $type,
                        'Comment' => $Comment,
                        'Answer' => $Answer
                    ];

                    $this->_conn->set($data);

                    if ($this->_conn->insert($this->_table['surveyAnswerDetail']) === false) {
                        throw new \Exception('문항저장에 실패했습니다 .');
                    }

                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}