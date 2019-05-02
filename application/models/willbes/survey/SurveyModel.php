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

        'predictGradesLog' => 'lms_predict_grades_log',
        'predictPaper' => 'lms_predict_paper',
        'predictAnswerPaper' => 'lms_predict_answerpaper',
        'predictGradesOrigin' => 'lms_predict_grades_origin',
        'predictGrades' => 'lms_predict_grades',
        'predictGradesArea' => 'lms_predict_grades_area',
        'predictGradesLine' => 'lms_predict_grades_line',
        'predictQuestion' => 'lms_predict_questions',

        'eventComment' => 'lms_event_comment',
        'eventLecture' => 'lms_event_lecture',

        'sysCode' => 'lms_sys_code',
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin',
        'board' => 'lms_board',
        'member' => 'lms_member',
    ];

    public $upload_path_predict;       // 통파일 저장경로: ~/predict/{idx}/

    public function __construct()
    {
        parent::__construct('lms');
        $this->upload_path_predict = $this->config->item('upload_path_predict', 'predict');
    }

    /**
     *  합격예측 접수인원
     */
    public function autocount($PredictIdx, $PromotionCode){
        $column = "
            (
                (SELECT COUNT(*) FROM {$this->_table['predictRegister']} WHERE PredictIdx = ".$PredictIdx.") 
                + (SELECT COUNT(*) FROM {$this->_table['eventComment']} WHERE ElIdx = (SELECT ElIdx FROM {$this->_table['eventLecture']} WHERE PromotionCode = ".$PromotionCode."))
            ) AS CNT,
            (SELECT ReadCnt FROM {$this->_table['eventLecture']} WHERE PromotionCode = ".$PromotionCode.") AS RCNT,
            (SELECT AdjuReadCnt FROM {$this->_table['eventLecture']} WHERE PromotionCode = ".$PromotionCode.") AS PRECNT

        ";

        $from = "
            FROM 
                DUAL
        ";

        $order_by = "";
        $where = "";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     * 기본정보 등록
     */
    public function store()
    {
        try {
            $this->_conn->trans_begin();
            $names = $this->makeUploadFileName(['RealConfirmFile'], 1);

            if(empty($names)) {
                $names['RealConfirmFile']['name'] = null;
                $names['RealConfirmFile']['real'] = null;
            }

            $PredictIdx = $this->input->post('PredictIdx');

            $regist_check = $this->predictResist($PredictIdx, $this->session->userdata('mem_idx'));

            if(empty($regist_check) === false) {
                throw new \Exception('이미 신청하셨습니다.');
            }

            // 데이터 저장
            $data = array(
                'ApplyType' => empty($this->input->post('ApplyType')) === false ? $this->input->post('ApplyType') : '합격예측',
                'PredictIdx' => $PredictIdx,
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
            $uploadSubPath = $this->upload_path_predict . $PredictIdx;

            if(empty($names) === false) {
                $isSave = $this->uploadFileSave($uploadSubPath, $names);
                if ($isSave !== true) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }

            $Ssubject = $this->input->post('Ssubject');
            $Psubject = $this->input->post('Psubject');

            if(empty($Ssubject)===false){
                for($i=0; $i < count($Ssubject); $i++){
                    // 데이터 저장
                    $data = array(
                        'PrIdx' => $nowIdx,
                        'PredictIdx' => $this->input->post('PredictIdx'),
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
                        'PredictIdx' => $this->input->post('PredictIdx'),
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
     * 기본정보 등록
     */
    public function storeV2()
    {
        try {
            $this->_conn->trans_begin();

            $PredictIdx = $this->input->post('PredictIdx');

            $regist_check = $this->predictResist($PredictIdx, $this->session->userdata('mem_idx'));

            if(empty($regist_check) === false) {
                throw new \Exception('이미 신청하셨습니다.');
            }
            // 데이터 저장
            $data = array(
                'PredictIdx' => $PredictIdx,
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SiteCode' => $this->input->post('SiteCode'),
                'TakeNumber' => $this->input->post('TakeNumber'),
                'TakeMockPart' => $this->input->post('TakeMockPart'),
                'TakeArea' => $this->input->post('TakeArea'),
                'AddPoint' => $this->input->post('AddPoint'),
                'LectureType' => $this->input->post('LectureType'),
                'Period' => $this->input->post('Period'),
            );

            if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictRegister']) === false) {
                throw new \Exception('저장에 실패했습니다.');
            }

            $nowIdx = $this->_conn->insert_id();

            $Ssubject = $this->input->post('Ssubject');
            $Psubject = $this->input->post('Psubject');

            if(empty($Ssubject)===false){
                for($i=0; $i < count($Ssubject); $i++){
                    // 데이터 저장
                    $data = array(
                        'PrIdx' => $nowIdx,
                        'PredictIdx' => $this->input->post('PredictIdx'),
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
                        'PredictIdx' => $this->input->post('PredictIdx'),
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
            $PredictIdx = $this->input->post('PredictIdx');
            $PrIdx = $this->input->post('PrIdx');
            // 데이터 저장
            $data = array(
                'PredictIdx' => $PredictIdx,
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
                $uploadSubPath = $this->upload_path_predict . $PredictIdx;

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
                        'PredictIdx' => $this->input->post('PredictIdx'),
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
                        'PredictIdx' => $this->input->post('PredictIdx'),
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
     * 기본정보 수정
     */
    public function updateV2()
    {
        try {
            $this->_conn->trans_begin();

            $PredictIdx = $this->input->post('PredictIdx');
            $PrIdx = $this->input->post('PrIdx');
            // 데이터 저장
            $data = array(
                'PredictIdx' => $PredictIdx,
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SiteCode' => $this->input->post('SiteCode'),
                'TakeNumber' => $this->input->post('TakeNumber'),
                'TakeMockPart' => $this->input->post('TakeMockPart'),
                'TakeArea' => $this->input->post('TakeArea'),
                'AddPoint' => $this->input->post('AddPoint'),
                'LectureType' => $this->input->post('LectureType'),
                'Period' => $this->input->post('Period'),
            );

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
                        'PredictIdx' => $this->input->post('PredictIdx'),
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
                        'PredictIdx' => $this->input->post('PredictIdx'),
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

        return ['ret_cd' => true, 'dt' => ['idx' => $PrIdx]];
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
    public function uploadFileSave($uploadSubPath, $names, $type='file')
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

        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /*
     *  합격예측 2번째탭 오픈여부
     */
    public function predictOpenTab2($PredictIdx){
        $column = "
            ServiceSDatm, ServiceEDatm
        ";

        $from = "
            FROM 
                {$this->_table['predictProduct']}
        ";

        $order_by = "";
        $where = " WHERE PredictIdx = ".$PredictIdx;

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data = $query->row_array();
        $currentTime = date('Y-m-d H:i:s');
        if($data['ServiceSDatm'] < $currentTime && $data['ServiceEDatm'] > $currentTime){
            $res = 'Y';
        } else {
            $res = 'N';
        }
        return $res;
    }

    /**
     * 합격예측 접수데이터 호출
     * @param $PredictIdx
     * @param $MemIdx
     * @return mixed
     */
    public function predictResist($PredictIdx, $MemIdx){
        $column = "
            PrIdx
        ";

        $from = "
            FROM 
                {$this->_table['predictRegister']} 
        ";

        $order_by = " ORDER BY PrIdx ASC LIMIT 1";
        $where = " WHERE MemIdx = '".$MemIdx."' AND PredictIdx = ".$PredictIdx."";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data1 = $query->row_array();
        $PrIdx = $data1['PrIdx'];
        if(empty($PrIdx)===false){
            $addWhere = " AND pr.PrIdx = ".$PrIdx;
        } else {
            $addWhere = "";
        }

        $column = "
            pr.PrIdx, TakeNumber, TakeMockPart, TakeArea, AddPoint, LectureType, Period, ConfirmFile, RealConfirmFile, SubjectCode, 
            cc.CcdName as subject, cc2.CcdName AS serial, cc3.CcdName AS areanm
        ";

        $from = "
            FROM 
                {$this->_table['predictRegister']} AS pr
                JOIN {$this->_table['predictRegisterR']} AS pc ON pr.PrIdx = pc.PrIdx
                LEFT JOIN {$this->_table['predictCode']} AS cc ON pc.SubjectCode = cc.Ccd
                LEFT JOIN {$this->_table['predictCode']} AS cc2 ON pr.TakeMockPart = cc2.Ccd
                LEFT JOIN {$this->_table['sysCode']} AS cc3 ON pr.TakeArea = cc3.Ccd
        ";

        $order_by = " ORDER BY pr.PrIdx DESC";
        $where = " WHERE MemIdx = '".$MemIdx."' AND pr.PredictIdx = ".$PredictIdx.$addWhere;
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data2 = $query->result_array();

        return $data2;
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
     *  합격예측용 성적입력 점수호출 타입1
     */
    public function getScore1($pridx, $PredictIdx){
        $column = "
            pc2.CcdName AS SubjectName, SUM(IF(pg.IsWrong = 'Y', Scoring, '0')) AS OrgPoint, AdjustPoint  
        ";

        $from = "
            FROM 
                {$this->_table['predictAnswerPaper']} AS pg
                LEFT JOIN {$this->_table['predictGrades']} AS g ON pg.PpIdx = g.PpIdx AND pg.PrIdx = g.PrIdx
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                LEFT JOIN {$this->_table['predictCode']} AS pc2 ON pp.SubjectCode = pc2.Ccd
                LEFT JOIN {$this->_table['predictQuestion']} AS pq ON pg.PpIdx = pq.PpIdx AND pg.PqIdx = pq.PqIdx
        ";

        $order_by = " GROUP BY pg.PpIdx ORDER BY pg.PpIdx";
        $where = " WHERE pg.PredictIdx = ".$PredictIdx." AND pg.PrIdx = ".$pridx;
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     *  합격예측용 성적입력 점수호출 타입1
     */
    public function getScore2($pridx, $PredictIdx){
        $column = "
            pg.PpIdx, pc2.CcdName AS SubjectName, pg.OrgPoint, AdjustPoint, Rank, FivePerPoint, AvrPoint, TakeNum
        ";

        $from = "
            FROM 
                {$this->_table['predictGradesOrigin']} AS pg
                LEFT JOIN {$this->_table['predictGrades']} AS g ON pg.PpIdx = g.PpIdx AND pg.PrIdx = g.PrIdx
                LEFT JOIN {$this->_table['predictGradesArea']} AS ga ON ga.TakeMockPart = pg.TakeMockPart AND ga.TakeArea = pg.TakeArea AND ga.PpIdx = pg.PpIdx
                LEFT JOIN {$this->_table['sysCode']} AS sc ON pg.TakeArea = sc.Ccd
                LEFT JOIN {$this->_table['predictCode']} AS pc ON pg.TakeMockPart = pc.Ccd
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                LEFT JOIN {$this->_table['predictCode']} AS pc2 ON pp.SubjectCode = pc2.Ccd 
        ";

        $order_by = " GROUP BY pg.PpIdx ORDER BY pg.PpIdx ";
        $where = " WHERE pg.PredictIdx = ".$PredictIdx." AND pg.PrIdx = ".$pridx;

        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     *  합격예측용 성적입력 점수호출 타입1
     */
    public function getSumAvg(){
        $column = "
            MemIdx, ROUND(SUM(AdjustPoint),2) AS SUM, 
            (
                SELECT ROUND(AVG(SUM),2) FROM(
                    SELECT SUM(AdjustPoint) AS SUM FROM {$this->_table['predictGrades']} GROUP BY MemIdx
                ) AS A
            ) AS AVG
        ";

        $from = "
            FROM 
                {$this->_table['predictGrades']} 
        ";

        $order_by = " GROUP BY MemIdx ORDER BY SUM DESC";
        $where = "";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     *  합격예측용 성적입력 점수호출 타입1
     */
    public function getGradeLine($idx, $TakeMockPart, $TakeArea){
        $column = "
            *
        ";

        $from = "
            FROM 
                {$this->_table['predictGradesLine']} 
        ";

        $order_by = "";
        $where = " WHERE PredictIdx = ".$idx." AND TakeMockPart = ".$TakeMockPart." AND TakeArea = ".$TakeArea;
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

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
        echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

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

                if($type == 'S' || $type == 'D'){
                    $txt = $q;
                } else {
                    $txt = implode("/",(array)$q);
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

    /**
     * 문항세트전체호출
     */
    public function statisticsListLine($PredictIdx, $order){

        $column = "
            pc.CcdName AS TakeMockPartName, sc.CcdName AS TakeAreaName, 
            pg.TakeMockPart, pg.TakeArea, 
            (
            SELECT COUNT(*) FROM (
                    SELECT * FROM {$this->_table['predictGradesOrigin']} GROUP BY MemIdx
                ) AS A
                WHERE TakeArea = pg.TakeArea AND TakeMockPart = pg.TakeMockPart AND PredictIdx = pg.PredictIdx 
            ) AS TakeOrigin,  
            ROUND(SUM(pg.AvrPoint),2) AS AvrPoint,
            (SELECT COUNT(*) FROM {$this->_table['predictRegister']} WHERE TakeArea = pg.TakeArea AND TakeMockPart = pg.TakeMockPart) AS TotalRegist,
            pl.PickNum, pl.TakeNum, CompetitionRateNow, CompetitionRateAgo, PassLineAgo, AvrPointAgo, StabilityAvrPoint, StabilityAvrPercent,
            StrongAvrPoint1, StrongAvrPoint2, StrongAvrPercent, ExpectAvrPoint1, ExpectAvrPoint2, ExpectAvrPercent, pl.IsUse,               
            StrongAvrPoint1Ref, StrongAvrPoint2Ref, ExpectAvrPoint1Ref, ExpectAvrPoint2Ref, StabilityAvrPointRef             
        ";

        $from = "
            FROM
                {$this->_table['predictGradesArea']} AS pg
                LEFT JOIN {$this->_table['predictGradesLine']} AS pl ON pg.TakeArea = pl.TakeArea AND pg.TakeMockPart = pl.TakeMockPart AND pg.PredictIdx = pl.PredictIdx
                LEFT JOIN {$this->_table['sysCode']} AS sc ON pg.TakeArea = sc.Ccd
                LEFT JOIN {$this->_table['predictCode']} AS pc ON pg.TakeMockPart = pc.Ccd
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                LEFT JOIN {$this->_table['predictCode']} AS pc2 ON pp.SubjectCode = pc2.Ccd
        ";

        if($order == 'area'){
            $order_by = " GROUP BY pg.TakeMockPart, pg.TakeArea ORDER BY pg.TakeArea, pg.TakeMockPart";
        } else {
            $order_by = " GROUP BY pg.TakeMockPart, pg.TakeArea ORDER BY pg.TakeMockPart, pg.TakeArea";
        }

        $where = " WHERE pg.PredictIdx = ".$PredictIdx;
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data = $query->result_array();

        return $data;
    }

    /**
     * 공지
     */
    public function noticeList($BoardIdx){

        $column = "
            STRAIGHT_JOIN (SELECT COUNT(*) FROM lms_board_r_comment AS CT WHERE LB.BoardIdx = CT.BoardIdx AND CT.IsStatus = 'Y') AS CommentCnt, 
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName, LB.Title, LB.RegAdminIdx, SUBSTR(LB.RegDatm, 1, 10) AS RegDatm, LB.IsBest, LB.IsUse, 
            LB.PredictIdx, LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName ,IFNULL(FN_BOARD_CATECODE_DATA_LMS(LB.BoardIdx),'N') AS CateCode ,
            IFNULL(fn_board_attach_data(LB.BoardIdx),NULL) AS AttachFileName,
            LB.Content              
        ";

        $from = "
            FROM
                {$this->_table['board']} AS LB 
                LEFT OUTER JOIN {$this->_table['member']} AS MEM ON LB.RegMemIdx = MEM.MemIdx 
                LEFT OUTER JOIN {$this->_table['site']} as LS ON LB.SiteCode = LS.SiteCode 
                LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON LB.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y' 
                LEFT OUTER JOIN {$this->_table['sysCode']} as LSC ON LB.CampusCcd = LSC.Ccd 
        ";

        $order_by = " ORDER BY `LB`.`IsBest` DESC, `LB`.`BoardIdx` ";

        if($BoardIdx){
            $where = " WHERE `LB`.`BmIdx` = '102' AND `LB`.`IsStatus` = 'Y' AND `LB`.`BoardIdx` = ".$BoardIdx;
            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
            $data = $query->row_array();
        } else {
            $where = " WHERE `LB`.`BmIdx` = '102' AND `LB`.`IsStatus` = 'Y' ";
            $order_by .= " LIMIT 10";
            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
            $data = $query->result_array();
        }

        return $data;
    }

    /***
     * @param $PredictIdx
     * 지역별현황
     */
    public function areaList($PredictIdx){
        $column = "
            sc.CcdName AS Areaname, pc.CcdName AS Serialname, pg.*       
        ";

        $from = "
            FROM 
                {$this->_table['predictGradesLine']} AS pg
                LEFT JOIN {$this->_table['sysCode']} AS sc ON pg.TakeArea = sc.Ccd
                LEFT JOIN {$this->_table['predictCode']} AS pc ON pg.TakeMockPart = pc.Ccd
        ";

        $where = " WHERE PredictIdx = ".$PredictIdx;
        $order_by = " ORDER BY TaKeMockPart, TakeArea";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data = $query->result_array();

        return $data;
    }

    /***
     * 지역별현황
     */
    public function gradeList(){
        $column = "
            pg.PpIdx, ROUND(AVG(OrgPoInt)) AS Avg, CcdName       
        ";

        $from = "
            FROM 
                {$this->_table['predictGradesOrigin']} AS pg
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                LEFT JOIN {$this->_table['predictCode']} AS pc ON pp.SubjectCode = pc.Ccd
        ";

        $where = "";
        $order_by = " GROUP BY pg.PpIdx ";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data = $query->result_array();

        return $data;
    }

    /**
     * 문항코멘트
     */
    public function surveyQuestionSet($idx){
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

    public function wrongRank($PredictIdx){
        $column = "
            COUNT(*) AS wcnt, pa.PpIdx, pq.PqIdx, Answer, IsWrong, PaperName, RightAnswer,
            (
                SELECT COUNT(*) FROM {$this->_table['predictAnswerPaper']}  
                WHERE PredictIdx = ".$PredictIdx." AND PpIdx = pa.PpIdx AND PqIdx = pa.PqIdx AND IsWrong = 'N'
            ) AS Wrong,
            (
                SELECT COUNT(*) FROM {$this->_table['predictAnswerPaper']}  
                WHERE PredictIdx = ".$PredictIdx." AND PpIdx = pa.PpIdx AND PqIdx = pa.PqIdx
            ) AS allcnt
        ";

        $from = "
            FROM 
                {$this->_table['predictAnswerPaper']} AS pa
                JOIN {$this->_table['predictPaper']} AS pp ON pa.PpIdx = pp.PpIdx  
                JOIN {$this->_table['predictQuestion']} AS pq ON pq.PpIdx = pa.PpIdx AND pq.PqIdx = pa.PqIdx
        ";

        $order_by = " GROUP BY PpIdx, PqIdx, Answer 
                      ORDER BY PpIdx, Wrong DESC, PqIdx, IsWrong ";
        $where = " WHERE pa.PredictIdx = ".$PredictIdx." AND Answer IN ('1','2','3','4')";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     * 설문결과
     */
    public function surveyAnswerCall($idx)
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
     * 과목호출
     */
    public function subjectList($PredictIdx, $pridx){
        $column = "
            SubjectCode  
        ";

        $from = "
            FROM
                {$this->_table['predictRegister']} AS pr
	            JOIN {$this->_table['predictRegisterR']} AS prc ON pr.PrIdx = prc.PrIdx
        ";

        $order_by = " ";

        $where = " WHERE pr.PredictIdx = ". $PredictIdx ." AND MemIdx = ".$this->session->userdata('mem_idx')." AND pr.PrIdx = ".$pridx;
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data = $query->result_array();
        $subjectIn = '';
        foreach($data as $key => $val){
            $SubjectCode = $val['SubjectCode'];
            $SubjectCode = substr($SubjectCode, 3, 3);
            if($key == 0) {
                $subjectIn = "100".$SubjectCode;
            } else {
                $subjectIn .= ", 100".$SubjectCode;
            }
        }

        $column = "
            TotalScore, pp.PpIdx, CcdName, pp.Type
        ";

        $from = "
            FROM
                {$this->_table['predictPaper']} AS pp
	            LEFT JOIN {$this->_table['predictCode']} AS pc ON pp.SubjectCode = pc.Ccd
        ";

        $order_by = " ORDER BY OrderNum";

        $where = " WHERE pp.PredictIdx = ". $PredictIdx ." AND SubjectCode IN (" . $subjectIn . ")";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $res = $query->result_array();

        return $res;
    }



    /**
     * 과목호출
     */
    public function orginGradeCall($pridx){
        $column = "
            PpIdx, OrgPoint  
        ";

        $from = "
            FROM
                {$this->_table['predictGradesOrigin']}
        ";

        $order_by = " ";

        $where = " WHERE PrIdx = ".$pridx;
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data = $query->result_array();
        $data2 = array();
        foreach ($data as $key => $val){
            $PpIdx = $val['PpIdx'];
            $data2[$PpIdx] = $val['OrgPoint'];
        }

        return $data2;
    }

    /**
     * 문항정보호출(시험지코드포함)
     * @param array $MpIdx $PredictIdx
     * @return mixed
     */
    public function predictQuestionCall($ppIdx, $PredictIdx, $pridx){

        $column = "
            pp.PpIdx,
            pq.PqIdx,
            AnswerNum, 
            QuestionNO,
            RightAnswer,
            RealQuestionFile AS file,
            pa.Answer,
            pa.IsWrong,
            (SELECT 
                SUM(IF(pa2.IsWrong = 'Y', Scoring, '0')) 
                FROM 
                    {$this->_table['predictQuestion']} AS pq
                    LEFT JOIN {$this->_table['predictAnswerPaper']} AS pa2 ON pq.PqIdx = pa2.PqIdx AND pa2.MemIdx = ".$this->session->userdata('mem_idx')." AND pa2.PredictIdx = ".$PredictIdx." AND pa2.PrIdx = ".$pridx." 
                WHERE pa2.PpIdx = pa.PpIdx
            ) AS OrgPoint 
        ";

        $from = "
            FROM
                {$this->_table['predictPaper']} AS pp
                JOIN {$this->_table['predictQuestion']} AS pq ON pp.PpIdx = pq.PpIdx AND pp.IsUse = 'Y' AND pq.IsStatus = 'Y'
                LEFT JOIN {$this->_table['predictAnswerPaper']} AS pa ON pq.PqIdx = pa.PqIdx AND pa.MemIdx = ".$this->session->userdata('mem_idx')." AND pp.PredictIdx = ".$PredictIdx." AND pa.PrIdx = ".$pridx."
        ";

        if($ppIdx){
            $where = "WHERE pp.PpIdx = ".$ppIdx;
            $order_by = " ORDER BY QuestionNO ";
        } else {
            $where = "";
            $order_by = " ORDER BY pp.PpIdx, QuestionNO ";
        }

        //echo "<pre>".'select ' . $column . $from . $where . $order_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 임시저장 전문항
     * @param array $formData
     * @return mixed
     */
    public function answerTempAllSave($formData = [])
    {

        try {
            $this->_conn->trans_begin();

            $PrIdx = element('PrIdx', $formData);
            $PredictIdx = element('PredictIdx', $formData);
            $PpIdx = element('PpIdx', $formData);

            $qcnt = element('QCnt',$formData);

            for($i = 1; $i <= $qcnt; $i++){
                ${"answer$i"} = element('answer'.$i,$formData);
                ${"PqIdx$i"}  = element('PqIdx'.$i,$formData);

                $column = "
                    PapIdx
                ";

                $from = "
                    FROM
                        {$this->_table['predictAnswerPaper']}
                ";

                $arr_condition = [
                    'EQ' => [
                        'MemIdx'   => $this->session->userdata('mem_idx'),
                        'PredictIdx' => $PredictIdx,
                        'PrIdx' => $PrIdx,
                        'PpIdx' => $PpIdx,
                        'PqIdx' => ${"PqIdx$i"},
                    ]
                ];

                $where = $this->_conn->makeWhere($arr_condition);
                $where = $where->getMakeWhere(false);
                $order_by = "";

                $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

                $result = $query->row_array();

                if($result['PapIdx']){
                    // 데이터 수정
                    $data = [
                        'Answer' => ${"answer$i"}
                    ];

                    $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['MemIdx' => $this->session->userdata('mem_idx'), 'PredictIdx' => $PredictIdx, 'PrIdx' => $PrIdx, 'PpIdx' => $PpIdx, 'PqIdx' => ${"PqIdx$i"}]);

                    if ($this->_conn->update($this->_table['predictAnswerPaper']) === false) {
                        throw new \Exception('임시저장에 수정에 실패했습니다.');
                    }

                }else{
                    // 데이터 입력
                    $data = [
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'PrIdx'  => $PrIdx,
                        'PredictIdx'=> $PredictIdx,
                        'PpIdx' => $PpIdx,
                        'PqIdx' => ${"PqIdx$i"},
                        'Answer' => ${"answer$i"},
                    ];

                    if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictAnswerPaper']) === false) {
                        throw new \Exception('임시저장에 실패했습니다.');
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

    /**
     * 임시저장 갯수(전체문항/임시저장문항)
     * @param array $arr_condition
     * @return mixed
     */
    public function questionTempCnt($arr_condition=[], $pridx){

        $column = "
            pp.PpIdx,
            COUNT(*) AS TCNT,
            (SELECT 
                COUNT(*) 
            FROM 
                {$this->_table['predictAnswerPaper']} 
            WHERE 
                PpIdx = pp.PpIdx AND Answer != '0'  AND MemIdx = '".$this->session->userdata('mem_idx')."' AND PrIdx = ".$pridx.") AS CNT
        ";

        $from = "
            FROM
                {$this->_table['predictPaper']} AS pp
                JOIN {$this->_table['predictQuestion']} AS pq ON pp.PpIdx = pq.PpIdx AND pp.IsUse = 'Y' AND pq.IsStatus = 'Y'
            
        ";

        $order_by = " GROUP BY pp.PpIdx ORDER BY pp.PpIdx";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        //echo "<pre>".'select ' . $column . $from . $where . $order_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

        return $query->result_array();
    }

    /**
     * 정답제출삭제
     * @param array $formData
     * @return mixed
     */
    public function examDelete($PrIdx)
    {
        try {
            $this->_conn->trans_begin();

            $where = ['PrIdx' => $PrIdx];

            try {
                if($this->_conn->delete($this->_table['predictAnswerPaper'], $where) === false){
                    throw new \Exception('삭제에 실패했습니다.');
                }
                if($this->_conn->delete($this->_table['predictGradesOrigin'], $where) === false){
                    throw new \Exception('삭제에 실패했습니다.');
                }
                if($this->_conn->delete($this->_table['predictGrades'], $where) === false){
                    throw new \Exception('삭제에 실패했습니다.');
                }
            } catch (\Exception $e) {
                return error_result($e);
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 정답제출
     * @param array $formData
     * @return mixed
     */
    public function examSend($formData = [])
    {
        try {
            $this->_conn->trans_begin();

            $PredictIdx = element('PredictIdx', $formData);
            $PrIdx = element('PrIdx', $formData);
            $MemIdx = $this->session->userdata('mem_idx');

            $column = "
                MemIdx, PrIdx, PredictIdx, pp.PpIdx, pq.PqIdx, Answer, if(Answer = RightAnswer, 'Y', 'N') AS IsWrong, pp.RegDatm
            ";

            $from = "
                FROM
                    {$this->_table['predictAnswerPaper']} AS pp
                    JOIN {$this->_table['predictQuestion']} AS pq ON pp.PqIdx = pq.PqIdx AND pq.IsStatus = 'Y' 
            ";

            $order_by = " ORDER BY PpIdx ";

            $where = " WHERE MemIdx = ".$MemIdx." AND PredictIdx = ".$PredictIdx." AND PrIdx = ".$PrIdx;

            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

            $res = $query->result_array();

            foreach ($res as $key => $val){
                $data = [
                    'MemIdx' => $MemIdx,
                    'PrIdx'  => $PrIdx,
                    'PredictIdx'=> $PredictIdx,
                    'PpIdx' => $val['PpIdx'],
                    'PqIdx' => $val['PqIdx'],
                    'Answer' => $val['Answer'],
                    'IsWrong' => $val['IsWrong']
                ];

                $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['MemIdx' => $MemIdx, 'PredictIdx' => $PredictIdx, 'PrIdx' => $PrIdx, 'PpIdx' => $val['PpIdx'], 'PqIdx' => $val['PqIdx']]);

                if ($this->_conn->update($this->_table['predictAnswerPaper']) === false) {
                    throw new \Exception('저장에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;

    }

    /**
 * 정답제출
 * @param array $formData
 * @return mixed
 */
    public function examSend2($formData = [])
    {
        try {
            $this->_conn->trans_begin();

            $PredictIdx = element('PredictIdx', $formData);
            $PrIdx = element('PrIdx', $formData);
            $PpIdx = element('PpIdx', $formData);
            $AnswerArr = element('Answer', $formData);

            //삭제후 입력
            $this->examDelete($PrIdx);

            $strAnswer = '';
            for($i = 0; $i < count($AnswerArr); $i++){
                $strAnswer .= $AnswerArr[$i];
            }

            $PpIdx = implode(',', $PpIdx);

            $MemIdx = $this->session->userdata('mem_idx');

            $column = "
                PpIdx, PqIdx, RightAnswer
            ";

            $from = "
                FROM
                    {$this->_table['predictQuestion']}
            ";

            $order_by = " ORDER BY PpIdx, PqIdx ";

            $where = " WHERE PpIdx IN (".$PpIdx.")";

            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

            $res = $query->result_array();

            foreach($res as $key => $val){

                $PpIdx = $val['PpIdx'];
                $PqIdx = $val['PqIdx'];
                $RightAnswer = $val['RightAnswer'];
                $Answer = substr($strAnswer, $key, 1);
                if($Answer == $RightAnswer){
                    $IsWrong = 'Y';
                } else {
                    $IsWrong = 'N';
                }

                $data = [
                    'MemIdx' => $MemIdx,
                    'PrIdx'  => $PrIdx,
                    'PredictIdx'=> $PredictIdx,
                    'PpIdx' => $PpIdx,
                    'PqIdx' => $PqIdx,
                    'Answer' => $Answer,
                    'IsWrong' => $IsWrong
                ];

                if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictAnswerPaper']) === false) {
                    throw new \Exception('저장에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;

    }

    /**
     * 정답제출
     * @param array $formData
     * @return mixed
     */
    public function examSend3($formData = [])
    {
        try {
            $this->_conn->trans_begin();

            $PredictIdx = element('PredictIdx', $formData);
            $PrIdx = element('PrIdx', $formData);
            $PpIdxArr = element('PpIdx', $formData);
            $ScoreArr = element('Score', $formData);
            $MemIdx = $this->session->userdata('mem_idx');

            //삭제후 입력
            $this->examDelete($PrIdx);


            $column = "
                TakeMockPart, TakeArea
            ";

            $from = "
                FROM
                    {$this->_table['predictRegister']}
            ";

            $order_by = "";

            $where = " WHERE PrIdx = ".$PrIdx;

            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

            $res = $query->row_array();

            foreach($ScoreArr as $key => $val){
                $PpIdx = $PpIdxArr[$key];

                $data = [
                    'MemIdx' => $MemIdx,
                    'PrIdx'  => $PrIdx,
                    'PredictIdx'=> $PredictIdx,
                    'PpIdx' => $PpIdx,
                    'TakeMockPart' => $res['TakeMockPart'],
                    'TakeArea' => $res['TakeArea'],
                    'OrgPoint' => $val
                ];

                if ($this->_conn->set($data)->insert($this->_table['predictGradesOrigin']) === false) {
                    throw new \Exception('저장에 실패했습니다.');
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