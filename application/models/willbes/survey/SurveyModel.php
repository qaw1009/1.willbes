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

        'Product' => 'lms_Product',
        'predict_r_product' => 'lms_predict_r_product',
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

        //일반경채(남)의 수사, 행정법 코드 제외
        $where .= " AND Ccd != '100901' AND Ccd != '100902'";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     * 과목별 성적분포 (0점 제외)
     * @param $PredictIdx
     * @return array
     */
    public function getSubjectPoint($PredictIdx){
        $column = "
            A.PpIdx, A.Pointarea, A.CNT, B.SubjectCode, C.CcdName as SubjectName 
                , (select count(0) from {$this->_table['predictGradesOrigin']} where PpIdx = A.PpIdx) as TotalCNT
        ";

        $from = "
            from (
                select PpIdx
                    , (case 
                        when OrgPoint between 1 and 20 then 1
                        when OrgPoint between 21 and 40 then 2
                        when OrgPoint between 41 and 60 then 3
                        when OrgPoint between 61 and 80 then 4
                        else 5
                      end) as Pointarea	
                    , count(0) as CNT 	  
                from {$this->_table['predictGradesOrigin']}
                where PredictIdx = ?
                    and OrgPoint > 0
                group by PpIdx, Pointarea
            ) as A
                left join {$this->_table['predictPaper']} AS B ON A.PpIdx = B.PpIdx
                left join {$this->_table['predictCode']} AS C ON B.SubjectCode = C.Ccd	
            order by A.PpIdx, A.pointarea asc             
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);
        $result = $query->result_array();

        $arr_point_area = [];
        if (empty($result) === false) {
            $tmp_subject_code = '';

            foreach ($result as $idx => $row) {
                if ($row['SubjectCode'] != $tmp_subject_code) {
                    $arr_point_area[$row['SubjectCode']]['SubjectName'] = $row['SubjectName'];
                }

                for($i = 1; $i <= 5; $i++) {
                    if ($i == $row['Pointarea']) {
                        $arr_point_area[$row['SubjectCode']][$row['Pointarea']] = ROUND(($row['CNT'] / $row['TotalCNT']) * 100, 2);
                    } else {
                        if (isset($arr_point_area[$row['SubjectCode']][$i]) === false) {
                            $arr_point_area[$row['SubjectCode']][$i] = 0;
                        }
                    }
                }

                $tmp_subject_code = $row['SubjectCode'];
            }
        }

        return $arr_point_area;
    }

    /**
     * 과목별 단일 선호도 (0점 제외)
     * @param $PredictIdx
     * @return array
     */
    public function bestSubject($PredictIdx)
    {
        $column = "
            pc.CcdName as SubjectName, A.CNT
        ";

        $from = "
            from (
                select pg.PpIdx, count(0) as CNT, max(pp.SubjectCode) as SubjectCode
                from {$this->_table['predictGradesOrigin']} as pg
                    left join {$this->_table['predictPaper']} as pp
                        on pg.PpIdx = pp.PpIdx
                where pg.PredictIdx = ?
                    and pp.Type = 'S'
                    and pg.OrgPoint > 0
                group by pg.PpIdx	
            ) as A
                left join {$this->_table['predictCode']} as pc
                    on pc.Ccd = A.SubjectCode
            where A.CNT > 0                    
            order by A.CNT desc	            
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);
        $result = $query->result_array();

        $arr_subject = [];
        if (empty($result) === false) {
            $total = array_sum(array_pluck($result, 'CNT'));

            foreach ($result as $row) {
                $arr_subject[] = [
                    'SubjectName' => $row['SubjectName'],
                    'SubjectRatio' => ROUND(($row['CNT'] / $total) * 100,2)
                ];
            }
        }

        return $arr_subject;
    }

    /**
     * 과목별 조합 선호도 (0점 제외)
     * @param $PredictIdx
     * @return array
     */
    public function bestCombineSubject($PredictIdx)
    {
        $column = "
            A.SubjectName, count(0) as CNT
        ";

        $from = "
            from (
                select pg.PrIdx, group_concat(pc.CcdName order by pp.PpIdx asc separator '/') as SubjectName
                from {$this->_table['predictGradesOrigin']} as pg
                    left join {$this->_table['predictPaper']} as pp
                        on pg.PpIdx = pp.PpIdx
                    left join {$this->_table['predictCode']} as pc
                        on pp.SubjectCode = pc.Ccd
                where pg.PredictIdx = ?
                    and pp.Type = 'S'
                    and pg.OrgPoint > 0
                group by pg.PrIdx
            ) as A
            group by A.SubjectName
            order by CNT desc	            
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);
        $result = $query->result_array();

        $arr_subject = [];
        if (empty($result) === false) {
            $total = array_sum(array_pluck($result, 'CNT'));

            foreach ($result as $row) {
                $arr_subject[] = [
                    'SubjectName' => $row['SubjectName'],
                    'SubjectRatio' => ROUND(($row['CNT'] / $total) * 100,2)
                ];
            }
        }

        return $arr_subject;
    }

    /**
     * 총점 성적분포
     * @param $PredictIdx
     * @return array
     */
    public function pointArea($PredictIdx)
    {
        $column = "
            COUNT(*) AS CNT, Pointarea
        ";

        $from = "            
            FROM 
            (
                SELECT 
                    (case 
                        when SUM(OrgPoint) <= 100 then 0    # 0 ~ 100
                        when SUM(OrgPoint) >= 500 then 4    # 500 이상
                        else substr(SUM(OrgPoint), 1, 1)    # 101 ~ 499
                    end) as Pointarea 
                FROM 
                    {$this->_table['predictGradesOrigin']} 
                WHERE PredictIdx = ?
                GROUP BY PrIdx                
            ) AS A                
        ";

        $order_by = " GROUP BY Pointarea ORDER BY Pointarea ASC";

        $query = $this->_conn->query('select ' . $column . $from . $order_by, [$PredictIdx]);
        $result = $query->result_array();

        $arr_point_area = [];
        if (empty($result) === false) {
            $total = array_sum(array_pluck($result, 'CNT'));    // 총인원수

            // 점수대별 인원비율, (인원수/총인원수) * 100, PA0 ~ PA4
            foreach ($result as $row) {
                $arr_point_area['PA' . $row['Pointarea']] = $row['CNT'] < 1 ? 0 : ROUND($row['CNT'] / $total * 100, 2);
            }
        }

        return $arr_point_area;
    }

    /**
     *  합격예측용 성적입력 점수호출 타입1
     */
    public function getScore1($pridx, $PredictIdx){
        $column = "
            pg.PpIdx, pc2.CcdName AS SubjectName, SUM(IF(pg.IsWrong = 'Y', Scoring, '0')) AS OrgPoint, AdjustPoint
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
     * TODO : 미사용
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
     * * TODO : 미사용
     */
    public function getGradeLine($idx, $TakeMockPart, $TakeArea){
        $column = "*";
        $from = "
            FROM {$this->_table['predictGradesLine']}
        ";

        $order_by = "";
        $where = " WHERE PredictIdx = ".$idx." AND TakeMockPart = ".$TakeMockPart." AND TakeArea = ".$TakeArea;
        //echo "<pre>". 'select ' . $column . $from . $where . $order_by . "</pre>";

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
        $where = " 
            WHERE SpIdx = {$idx}
            AND SpUseYn = 'Y' 
        ";
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
        $where = " 
            WHERE sqs.SqsIdx = {$idx}
            AND sqs.SqsUseYn = 'Y' 
        ";
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
        $where = " 
            WHERE SqIdx = {$idx}
            AND SqUseYn = 'Y' 
        ";
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
            (SELECT Cnt FROM {$this->_table['surveyQuestion']} WHERE SqIdx = sa.SqIdx) AS CNT,
	        sr.IsDispResult
        ";

        $from = "
            FROM 
                {$this->_table['surveyProduct']} AS sp
                JOIN {$this->_table['surveyAnswer']} AS si ON sp.SpIdx = si.SpIdx
                JOIN {$this->_table['surveyAnswerDetail']} AS sa ON si.SaIdx = sa.SaIdx
                LEFT JOIN {$this->_table['surveyQuestionSetDetail']}  sr ON sa.SqIdx = sr.SqIdx AND sp.SqsIdx = sr.SqsIdx
        ";

        $order_by = " ORDER BY sr.GroupNumber ASC, sa.SqIdx ASC";
        $where = " WHERE sp.SpIdx = " . $idx . " AND sa.TYPE IN ('S','T') AND sr.SqsdIdx IS NOT NULL";

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
//                    $txt = substr($txt,0,strlen($txt)-1);
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
     * 실시간 합격안정권 예측
     * @param $PredictIdx
     * @param $order
     * @return mixed
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
            pl.PickNum, pl.TakeNum, pl.CompetitionRateNow, pl.CompetitionRateAgo, pl.PassLineAgo, pl.AvrPointAgo, pl.StabilityAvrPoint, pl.StabilityAvrPercent,
            pl.StrongAvrPoint1, pl.StrongAvrPoint2, pl.StrongAvrPercent, pl.ExpectAvrPoint1, pl.ExpectAvrPoint2, pl.ExpectAvrPercent, pl.IsUse,               
            pl.StrongAvrPoint1Ref, pl.StrongAvrPoint2Ref, pl.ExpectAvrPoint1Ref, pl.ExpectAvrPoint2Ref, pl.StabilityAvrPointRef             
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

    /**
     * 지역별현황
     * @param $PredictIdx
     * @return mixed
     */
    public function areaList($PredictIdx){
        $column = "
            sc.CcdName AS Areaname, pc.CcdName AS Serialname, pg.*   
            , (select round(sum(AvrPoint), 2) as AvrPoint 
                from {$this->_table['predictGradesArea']} 
                where PredictIdx = pg.PredictIdx and TakeMockPart = pg.TakeMockPart and TakeArea = pg.TakeArea
              ) as AvrPoint    
        ";

        $from = "
            FROM 
                {$this->_table['predictGradesLine']} AS pg
                LEFT JOIN {$this->_table['sysCode']} AS sc ON pg.TakeArea = sc.Ccd
                LEFT JOIN {$this->_table['predictCode']} AS pc ON pg.TakeMockPart = pc.Ccd
        ";

        $where = " WHERE PredictIdx = ?";
        $order_by = " ORDER BY TaKeMockPart, TakeArea";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by, [$PredictIdx]);

        return $query->result_array();
    }

    /**
     * 과목별 원점수 평균 (0점 제외)
     * @param $PredictIdx
     * @return mixed
     */
    public function gradeList($PredictIdx){
        $column = "
            pg.PpIdx, pg.Avg, pc.CcdName as SubjectName, pp.SubjectCode, pp.Type       
        ";

        $from = "
            from (
                select PpIdx, ROUND(AVG(OrgPoint)) AS Avg
                from {$this->_table['predictGradesOrigin']}
                where PredictIdx = ?
                    and OrgPoint > 0
                group by PpIdx
            ) as pg
                left join {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                left join {$this->_table['predictCode']} AS pc ON pp.SubjectCode = pc.Ccd
            order by pg.PpIdx asc                            
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);

        return $query->result_array();
    }

    /**
     * 과목별 오답 랭킹
     * @param $PredictIdx
     * @return mixed
     */
    public function wrongRank($PredictIdx)
    {
        $column = "A.PpIdx, A.PqIdx, A.CNT, A.Answer1, A.Answer2, A.Answer3, A.Answer4, A.WrongCnt, A.RankNum
            , round((A.Answer1 / A.CNT) * 100, 2) as AnswerRatio1
            , round((A.Answer2 / A.CNT) * 100, 2) as AnswerRatio2
            , round((A.Answer3 / A.CNT) * 100, 2) as AnswerRatio3
            , round((A.Answer4 / A.CNT) * 100, 2) as AnswerRatio4
            , pp.PaperName, pq.QuestionNO, pq.RightAnswer            
        ";

        $from = "
            from (
                select PpIdx, PqIdx, count(0) as CNT
                    , sum(if(Answer = '1', 1, 0)) as Answer1
                    , sum(if(Answer = '2', 1, 0)) as Answer2
                    , sum(if(Answer = '3', 1, 0)) as Answer3
                    , sum(if(Answer = '4', 1, 0)) as Answer4
                    , sum(if(IsWrong = 'N', 1, 0)) as WrongCNT
                    , row_number() over (partition by PpIdx order by WrongCnt desc, PqIdx asc) as RankNum 
                from {$this->_table['predictAnswerPaper']}
                where PredictIdx = ?
                    and Answer in ('1', '2', '3', '4')
                group by PpIdx, PqIdx
            ) as A
                inner join {$this->_table['predictPaper']} as pp
                    on A.PpIdx = pp.PpIdx
                inner join {$this->_table['predictQuestion']} as pq
                    on A.PpIdx = pq.PpIdx and A.PqIdx = pq.PqIdx
            where A.RankNum between 1 and 5
            order by A.PpIdx asc, A.RankNum asc            
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$PredictIdx]);

        return $query->result_array();
    }

    /**
     * 설문조사 결과 리턴 (특정설문문항 결과)
     * @param int $spidx
     * @param array $arr_sq_idx
     * @return mixed
     */
    public function surveyAnswerCall($spidx, $arr_sq_idx = [])
    {
        $column = "A.SqIdx, A.Answer1, A.Answer2, A.Answer3, A.Answer4, A.Answer5, A.CNT
            , round((A.Answer1 / A.CNT) * 100) as AnswerRatio1
            , round((A.Answer2 / A.CNT) * 100) as AnswerRatio2
            , round((A.Answer3 / A.CNT) * 100) as AnswerRatio3
            , round((A.Answer4 / A.CNT) * 100) as AnswerRatio4
            , round((A.Answer5 / A.CNT) * 100) as AnswerRatio5            
            , sq.SqTitle
            , trim(sq.Comment1) as Comment1, trim(sq.Comment2) as Comment2, trim(sq.Comment3) as Comment3, trim(sq.Comment4) as Comment4, trim(sq.Comment5) as Comment5            
        ";

        $from = "
            from (
                select sa.SqIdx
                    , sum(if(sa.Answer = '1', 1, 0)) as Answer1
                    , sum(if(sa.Answer = '2', 1, 0)) as Answer2
                    , sum(if(sa.Answer = '3', 1, 0)) as Answer3
                    , sum(if(sa.Answer = '4', 1, 0)) as Answer4
                    , sum(if(sa.Answer = '5', 1, 0)) as Answer5
                    , count(0) as CNT
                from {$this->_table['surveyAnswer']} as sai
                    inner join {$this->_table['surveyAnswerDetail']} as sa
                        on sai.SaIdx = sa.SaIdx
                where sai.SpIdx = ?"
            . $this->_conn->makeWhere(['IN' => ['sa.SqIdx' => $arr_sq_idx]])->getMakeWhere(true) .
            "   group by sa.SqIdx	
            ) as A
                inner join {$this->_table['surveyQuestion']} as sq
                    on A.SqIdx = sq.SqIdx 
            order by A.SqIdx desc                                
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$spidx]);

        return $query->result_array();
    }

    /**
     * 직렬별 설문결과 리턴
     * @param int $spidx [설문식별자]
     * @param int $serial_group_num [응시직렬 문항셋트 그룹넘버]
     * @return array
     */
    public function surveyAnswerCallBySerial($spidx, $serial_group_num)
    {
        // 직렬별 설문결과 조회
        $column = "TA.SerialAnswer, TA.SerialAnswerName, TA.SqIdx, TA.CNT, TA.Answer1, TA.Answer2, TA.Answer3, TA.Answer4, TA.Answer5
            , round((TA.Answer1 / TA.CNT) * 100) as AnswerRatio1
            , round((TA.Answer2 / TA.CNT) * 100) as AnswerRatio2
            , round((TA.Answer3 / TA.CNT) * 100) as AnswerRatio3
            , round((TA.Answer4 / TA.CNT) * 100) as AnswerRatio4
            , round((TA.Answer5 / TA.CNT) * 100) as AnswerRatio5  
            , sqsr.GroupNumber
            , sq.SqTitle
            , trim(sq.Comment1) as Comment1, trim(sq.Comment2) as Comment2, trim(sq.Comment3) as Comment3, trim(sq.Comment4) as Comment4, trim(sq.Comment5) as Comment5
        ";

        $from = "
            from (
                select A.SpIdx, A.SerialAnswer, sa.SqIdx, count(0) as CNT, A.SerialAnswerName
                    , sum(if(sa.Answer = '1', 1, 0)) as Answer1
                    , sum(if(sa.Answer = '2', 1, 0)) as Answer2
                    , sum(if(sa.Answer = '3', 1, 0)) as Answer3
                    , sum(if(sa.Answer = '4', 1, 0)) as Answer4
                    , sum(if(sa.Answer = '5', 1, 0)) as Answer5		
                from (
                    select sai.SaIdx, sai.SpIdx, sa.SqIdx as SerialSqIdx, sa.Answer as SerialAnswer
                        , (case sa.Answer
                            when '1' then trim(sq.Comment1)
                            when '2' then trim(sq.Comment2)
                            when '3' then trim(sq.Comment3)
                            when '4' then trim(sq.Comment4)
                            when '5' then trim(sq.Comment5)
                            else ''
                          end) as SerialAnswerName                    
                    from {$this->_table['surveyAnswer']} as sai
                        inner join {$this->_table['surveyAnswerDetail']} as sa
                            on sai.SaIdx = sa.SaIdx
                        inner join {$this->_table['surveyQuestion']} as sq
                            on sa.SqIdx = sq.SqIdx  
                        inner join {$this->_table['surveyProduct']} as sp
                            on sai.SpIdx = sp.SpIdx
                        inner join {$this->_table['surveyQuestionSetDetail']} as sqsr
                            on sp.SqsIdx = sqsr.SqsIdx and sq.SqIdx = sqsr.SqIdx                                                      
                    where sai.SpIdx = ?
                        and sqsr.GroupNumber = ?
                ) as A
                    inner join {$this->_table['surveyAnswerDetail']} as sa
                        on A.SaIdx = sa.SaIdx and A.SerialSqIdx != sa.SqIdx and sa.Type = 'S'
                group by A.SpIdx, A.SerialAnswer, sa.SqIdx
            ) as TA
                inner join {$this->_table['surveyProduct']} as sp
                    on TA.SpIdx = sp.SpIdx			
                inner join {$this->_table['surveyQuestionSetDetail']} as sqsr
                    on sp.SqsIdx = sqsr.SqsIdx and TA.SqIdx = sqsr.SqIdx
                inner join {$this->_table['surveyQuestion']} as sq
                    on TA.SqIdx = sq.SqIdx
            order by TA.SerialAnswer, sqsr.GroupNumber, sqsr.Ordering            
        ";

        $query = $this->_conn->query('select ' . $column . $from, [$spidx, $serial_group_num]);

        return $query->result_array();
    }

    /**
     * 과목호출
     * @param $PredictIdx
     * @param $pridx
     * @return mixed
     */
    public function subjectList($PredictIdx, $pridx) {
        try {
            $column = 'SubjectCode';
            $from = "
                FROM {$this->_table['predictRegister']} AS pr
                JOIN {$this->_table['predictRegisterR']} AS prc ON pr.PrIdx = prc.PrIdx
            ";
            $arr_condition = [
                'EQ' => [
                    'pr.PredictIdx' => $PredictIdx,
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'pr.PrIdx' => $pridx
                ]
            ];

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $query = $this->_conn->query('select ' . $column . $from . $where);
            $data = $query->result_array();
            if (empty($data) === true) {
                throw new \Exception('등록된 과목이 없습니다.');
            }

            $subjectIn = '';
            foreach ($data as $key => $val) {
                $SubjectCode = $val['SubjectCode'];
                $SubjectCode = substr($SubjectCode, 3, 3);
                if ($key == 0) {
                    $subjectIn = "100" . $SubjectCode;
                } else {
                    $subjectIn .= ", 100" . $SubjectCode;
                }
            }

            $column = 'TotalScore, pp.PpIdx, CcdName, pp.Type';
            $from = "
                FROM {$this->_table['predictPaper']} AS pp
                LEFT JOIN {$this->_table['predictCode']} AS pc ON pp.SubjectCode = pc.Ccd
            ";
            $order_by = " ORDER BY OrderNum";
            $where = " WHERE pp.PredictIdx = " . $PredictIdx . " AND SubjectCode IN (" . $subjectIn . ") AND pp.IsUse = 'Y'";
            $data = $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
            if (empty($data) === true) {
                throw new \Exception('조회된 과목이 없습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }

        return $data;
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
     * @param $ppIdx
     * @param $PredictIdx
     * @param $pridx
     * @return mixed
     */
    public function predictQuestionCall($ppIdx, $PredictIdx, $pridx) {
        $column = "
            pp.PpIdx, pq.PqIdx, AnswerNum, QuestionNO, RightAnswer, RealQuestionFile AS file, pa.Answer, pa.IsWrong,
            (SELECT 
                SUM(IF(pa2.IsWrong = 'Y', Scoring, '0')) 
                FROM 
                    {$this->_table['predictQuestion']} AS pq
                    LEFT JOIN {$this->_table['predictAnswerPaper']} AS pa2 ON pq.PqIdx = pa2.PqIdx AND pa2.MemIdx = ".$this->session->userdata('mem_idx')." AND pa2.PredictIdx = '{$PredictIdx}' AND pa2.PrIdx = '{$pridx}' 
                WHERE pa2.PpIdx = pa.PpIdx
            ) AS OrgPoint 
        ";

        $from = " 
            FROM
                {$this->_table['predictPaper']} AS pp
                JOIN {$this->_table['predictQuestion']} AS pq ON pp.PpIdx = pq.PpIdx AND pp.IsUse = 'Y' AND pq.IsStatus = 'Y'
                LEFT JOIN {$this->_table['predictAnswerPaper']} AS pa ON pq.PqIdx = pa.PqIdx AND pa.MemIdx = ".$this->session->userdata('mem_idx')." AND pp.PredictIdx = '{$PredictIdx}' AND pa.PrIdx = '{$pridx}'
        ";

        if($ppIdx){
            $where = "WHERE pp.PpIdx = '{$ppIdx}'";
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
        $this->_conn->trans_begin();
        try {
            $PrIdx = element('PrIdx', $formData);
            $PredictIdx = element('PredictIdx', $formData);
            $PpIdx = element('PpIdx', $formData);
            $qcnt = element('QCnt',$formData);

            //정답데이터 조회
            $column = "PqIdx, QuestionNo, RightAnswer";
            $from = " FROM {$this->_table['predictQuestion']} ";
            $arr_condition = [
                'EQ' => [
                    'PpIdx' => $PpIdx,
                    'IsStatus' => 'Y'
                ]
            ];
            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $questionResult = $this->_conn->query('select ' . $column . $from . $where)->result_array();
            $questionData = [];
            foreach ($questionResult as $row) {
                $questionData[$row['QuestionNo']]['PqIdx'] = $row['PqIdx'];
                $questionData[$row['QuestionNo']]['RightAnswer'] = $row['RightAnswer'];
            }

            //임시저장
            foreach ($questionData as $key => $val) {
                if (empty(element('answer'.$key,$formData)) === true) {
                    throw new \Exception($key.'번 문항을 체크해주세요.');
                }

                $column = "PapIdx";
                $from = " FROM {$this->_table['predictAnswerPaper']} ";
                $arr_condition = [
                    'EQ' => [
                        'MemIdx'   => $this->session->userdata('mem_idx'),
                        'PredictIdx' => $PredictIdx,
                        'PrIdx' => $PrIdx,
                        'PpIdx' => $PpIdx,
                        'PqIdx' => element('PqIdx'.$key,$formData)
                    ]
                ];
                $where = $this->_conn->makeWhere($arr_condition);
                $where = $where->getMakeWhere(false);
                $result = $this->_conn->query('select ' . $column . $from . $where)->row_array();

                if (empty($result) === true) {
                    //저장
                    $data = [
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'PrIdx'  => $PrIdx,
                        'PredictIdx'=> $PredictIdx,
                        'PpIdx' => $PpIdx,
                        'PqIdx' => element('PqIdx'.$key,$formData),
                        'Answer' => element('answer'.$key,$formData),
                        'IsWrong' => ($val['RightAnswer'] == element('answer'.$key,$formData) ? 'Y' : 'N')
                    ];
                    if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictAnswerPaper']) === false) {
                        throw new \Exception('임시데이터 저장에 실패했습니다.');
                    }
                } else {
                    //수정
                    $data = [
                        'Answer' => element('answer'.$key,$formData),
                        'IsWrong' => ($val['RightAnswer'] == element('answer'.$key,$formData) ? 'Y' : 'N')
                    ];
                    $where = [
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'PredictIdx' => $PredictIdx,
                        'PrIdx' => $PrIdx,
                        'PpIdx' => $PpIdx,
                        'PqIdx' => element('PqIdx'.$key,$formData)
                    ];
                    $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where($where);
                    if ($this->_conn->update($this->_table['predictAnswerPaper']) === false) {
                        throw new \Exception('임시데이터 수정에 실패했습니다.');
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
     * @param $PrIdx
     * @return array|bool
     */
    public function examDelete($PrIdx)
    {
        try {
            $this->_conn->trans_begin();
            $where = ['PrIdx' => $PrIdx];

            $register_data = $this->predictFModel->findPredictRegister($PrIdx, 'PrIdx, PointDelCnt');
            if (empty($register_data) === true) {
                throw new \Exception('조회된 기본정보가 없습니다.');
            }

            if ($register_data['PointDelCnt'] >= 2) {
                throw new \Exception('재채점은 최대 2회만 가능합니다.');
            }
            $point_del_cnt = $register_data['PointDelCnt'] + 1;

            if($this->_conn->delete($this->_table['predictAnswerPaper'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }
            if($this->_conn->delete($this->_table['predictGradesOrigin'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }
            if($this->_conn->delete($this->_table['predictGrades'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }

            if ($this->_conn->set(['PointDelCnt'=>$point_del_cnt, 'PointDelDatm'=>date('Y-m-d H:i:s')])->where('PrIdx', $PrIdx)->update('lms_predict_register') === false) {
                throw new \Exception('수정에 실패했습니다.');
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


    /**
     * 그룹공통코드 배열에 해당하는 공통코드 조회
     * @param array $group_ccds
     * @param array $add_condition
     * @return array
     */
    public function getCcdInArray($group_ccds = [], $add_condition = [])
    {
        $column = 'GroupCcd, Ccd, CcdName';
        $arr_condition = ['IN' => ['GroupCcd' => $group_ccds], 'EQ' => ['IsUse' => 'Y']];
        empty($add_condition) === false && $arr_condition = array_merge_recursive($arr_condition, $add_condition);

        $data = $this->_conn->getListResult($this->_table['predictCode'], $column, $arr_condition, null, null, ['GroupCcd' => 'asc', 'OrderNum' => 'asc']);

        $codes = [];
        foreach ($data as $rows) {
            $codes[$rows['GroupCcd']][(string) $rows['Ccd']] = $rows['CcdName'];
        }
        return $codes;
    }


    /**
     * 합격예측에 설정된 자동지급 강좌
     * @param $PredictIdx
     * @return mixed
     */
    public function getPredictProduct($PredictIdx)
    {
        $column = 'A.*, B.ProdName';
        $from = '
                from 
                    '. $this->_table['predict_r_product'] .' A
                    join '.$this->_table['Product'] .' B ON A.ProdCode = B.ProdCode
                where 
                    A.IsStatus=\'Y\' and B.IsStatus=\'Y\'
                    And DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s") between A.StartDate and A.EndDate
        ';
        $order_by_offset_limit = $this->_conn->makeOrderBy(['A.PrpIdx' => 'ASC'])->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset(1,null)->getMakeLimitOffset();
        $where = $this->_conn->makeWhere(['EQ'=>['PredictIdx'=>$PredictIdx]])->getMakeWhere(true);

        $result = $this->_conn->query('select ' .$column .$from .$where. $order_by_offset_limit)->row_array();
        return $result;
    }

    /**
     * 회원의 직렬, 과목 : 원점수, 조정점수, 내석차, 응시자수, 전체평균, 상위5%평균
     * @param $PredictIdx
     * @param $take_mock_part
     * @param $member_idx
     * @param $take_area
     * @return mixed
     */
    public function AvgListForUserInfo($PredictIdx, $take_mock_part, $take_area, $member_idx)
    {
        $column = "pg.MemIdx, pg.TakeMockPart, pg.TakeArea, pg.PpIdx, pg.OrgPoint, pg.AdjustPoint, pg.MyRank, pa.TakeNum, pa.AvrPoint, pa.FivePerPoint, pp.PaperName";
        $from = "
        FROM (
            SELECT MemIdx,TakeMockPart, TakeArea, PpIdx, OrgPoint, AdjustPoint, RANK AS MyRank
            FROM {$this->_table['predictGrades']}
            WHERE PredictIdx = '{$PredictIdx}'
            AND MemIdx = '{$member_idx}'
            AND TakeMockPart = '{$take_mock_part}'
            AND TakeArea = '{$take_area}'
        ) AS pg
        INNER JOIN {$this->_table['predictGradesArea']} AS pa ON pa.PredictIdx = '{$PredictIdx}' AND pg.TakeMockPart = pa.TakeMockPart AND pg.TakeArea = pa.TakeArea AND pg.PpIdx = pa.PpIdx
        INNER JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx AND IsStatus = 'Y'
        ";
        $order_by = 'ORDER BY pg.PpIdx ASC';
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 직렬/지역의 원점수 총점, 조정점수 총점, 평균총점, 상위5%총점
     * @param $PredictIdx
     * @param $pr_idx
     * @param $take_mock_part
     * @param $take_area
     * @return mixed
     */
    public function TotalAreaAvgInfo($PredictIdx, $take_mock_part, $take_area, $pr_idx)
    {
        $column = "A.PrIdx, A.TakeMockPart, A.TakeArea, A.TotalOrgPoint, A.TotalAdjustPoint, A.RankNum, A.Cnt, B.TotalAvrPoint, B.TotalFivePerPoint";
        $from = "
        FROM (
            SELECT *
            FROM (
                SELECT tmpA.PrIdx, tmpA.TakeMockPart, tmpA.TakeArea, tmpA.TotalOrgPoint, tmpA.TotalAdjustPoint, tmpA.RankNum, tmpB.Cnt
                FROM (
                    SELECT PrIdx, TakeMockPart, TakeArea, SUM(OrgPoint) AS TotalOrgPoint, ROUND(SUM(AdjustPoint),2) AS TotalAdjustPoint
                        , RANK() OVER (PARTITION BY TakeMockPart, TakeArea ORDER BY AdjustPoint DESC) AS RankNum
                    FROM {$this->_table['predictGrades']}
                    WHERE PredictIdx = '{$PredictIdx}'
                        AND TakeMockPart = '{$take_mock_part}'
                        AND TakeArea = '{$take_area}'
                    GROUP BY PrIdx, TakeMockPart, TakeArea
                ) AS tmpA
                INNER JOIN (
                    SELECT PrIdx, COUNT(*) AS cnt 
                    FROM {$this->_table['predictGrades']}
                    WHERE PredictIdx = '{$PredictIdx}'
                    AND TakeMockPart = '{$take_mock_part}'
                    AND TakeArea = '{$take_area}'
                    GROUP BY PrIdx, TakeMockPart, TakeArea	
                ) AS tmpB
                ON tmpA.Pridx = tmpB.PrIdx
            ) A
            WHERE A.PrIdx = {$pr_idx}
        ) AS A
        INNER JOIN (
            SELECT TakeMockPart, TakeArea, ROUND(SUM(AvrPoint),2) AS TotalAvrPoint, ROUND(SUM(FivePerPoint),2) AS TotalFivePerPoint
            FROM {$this->_table['predictGradesArea']}
            WHERE PredictIdx = '{$PredictIdx}'
            GROUP BY TakeMockPart, TakeArea
        ) AS B ON A.TakeMockPart = B.TakeMockPart AND A.TakeArea = B.TakeArea
        ";
        //echo "<pre>".'select ' . $column . $from."</pre>";
        return $this->_conn->query('select ' . $column . $from)->row_array();
    }

    /**
     * 직렬/지역별 점수대 회원수 100, 150, 200, 250, 300, 350, 400, 450, 500 이하!
     * @param $PredictIdx
     * @param $take_mock_part
     * @param $take_area
     * @return mixed
     */
    public function CountAreaForMemberPoint($PredictIdx, $take_mock_part, $take_area)
    {
        $query = "
            (SELECT COUNT(*) AS cnt FROM {$this->_table['predictGrades']} WHERE PredictIdx = '{$PredictIdx}' AND TakeMockPart = '{$take_mock_part}' AND TakeArea = '{$take_area}' AND AdjustPoint <= 100) AS cnt_100,
            (SELECT COUNT(*) AS cnt FROM {$this->_table['predictGrades']} WHERE PredictIdx = '{$PredictIdx}' AND TakeMockPart = '{$take_mock_part}' AND TakeArea = '{$take_area}' AND (AdjustPoint BETWEEN 101 AND 200)) AS cnt_200,
            (SELECT COUNT(*) AS cnt FROM {$this->_table['predictGrades']} WHERE PredictIdx = '{$PredictIdx}' AND TakeMockPart = '{$take_mock_part}' AND TakeArea = '{$take_area}' AND (AdjustPoint BETWEEN 201 AND 300)) AS cnt_300,
            (SELECT COUNT(*) AS cnt FROM {$this->_table['predictGrades']} WHERE PredictIdx = '{$PredictIdx}' AND TakeMockPart = '{$take_mock_part}' AND TakeArea = '{$take_area}' AND (AdjustPoint BETWEEN 301 AND 400)) AS cnt_400,
            (SELECT COUNT(*) AS cnt FROM {$this->_table['predictGrades']} WHERE PredictIdx = '{$PredictIdx}' AND TakeMockPart = '{$take_mock_part}' AND TakeArea = '{$take_area}' AND (AdjustPoint BETWEEN 401 AND 500)) AS cnt_500
        ";
        return $this->_conn->query('select ' . $query)->row_array();
    }

    /**
     * 합격가능성 분석결과 조회 (합격기대권, 합격유력권, 합격안정권, 일배수컷)
     * @param $PredictIdx
     * @param $take_mock_part
     * @param $take_area
     * @return mixed
     */
    public function getAreaForLineData($PredictIdx, $take_mock_part, $take_area)
    {
        $column = "ExpectAvrPoint1, ExpectAvrPoint2, StrongAvrPoint1, StrongAvrPoint2, StabilityAvrPoint, OnePerCut, IsUse";

        $from = " FROM {$this->_table['predictGradesLine']} ";

        $arr_condition = [
            'EQ' => [
                'PredictIdx' => $PredictIdx,
                'TakeMockPart' => $take_mock_part,
                'TakeArea' => $take_area,
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        //echo "<pre>".'select ' . $column . $from . $where . $order_by."</pre>";
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }
}