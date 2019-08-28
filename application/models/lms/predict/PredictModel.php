<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class PredictModel extends WB_Model
{
    private $_table = [
        'admin' => 'wbs_sys_admin',
        'mockExamBase' => 'lms_mock_paper',
        'mockExamQuestion' => 'lms_mock_questions',
        'mockSubject' => 'lms_mock_r_subject',
        'mockAreaCate' => 'lms_Mock_R_Category',
        'mockArea' => 'lms_mock_area',
        'mockAreaList' => 'lms_mock_area_list',
        'mockBase' => 'lms_mock',
        'category' => 'lms_sys_category',
        'sysCode' => 'lms_sys_code',

        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'site' => 'lms_site',

        'mockProductExam' => 'lms_product_mock_r_paper',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_product_r_category',
        'ProductSale' => 'lms_Product_Sale',
        'ProductSMS' => 'lms_Product_Sms',


        'mockAnswerTemp' => 'lms_mock_answertemp',
        'mockAnswerPaper' => 'lms_mock_answerpaper',
        'mockLog' => 'lms_mock_log',
        'mockGrades' => 'lms_mock_grades',
        'mockGradesLog' => 'lms_mock_grades_log',
        'answerNote' => 'lms_mock_wronganswernote',
        'vProduct' => 'vw_product_mocktest',
        'mockGroupR' => 'lms_mock_group_r_product',
        'mockGroup' => 'lms_mock_group',

        'siteGroup' => 'lms_site_group',
        'member' => 'lms_member',
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

        'predictCnt' => 'lms_predict_cnt',      //todo 사용하지 않을 테이블 : 2019-08-13 조규호
        'predictSubTitles' => 'lms_predict_subtitles',

        'predict_r_product' => 'lms_predict_r_product'
    ];

    public $upload_path;            // 업로드 기본경로
    public $upload_path_predict;       // 통파일 저장경로: ~/predict/{idx}/
    public $upload_url_predict;       // 통파일 저장경로: ~/predict/{idx}/

    public function __construct()
    {
        parent::__construct('lms');
        $this->load->config('upload');
        $this->upload_path = $this->config->item('upload_path');
        $this->upload_path_predict = $this->config->item('upload_path_predict', 'predict');
        $this->upload_url_predict = $this->config->item('upload_url_predict', 'predict');
    }

    /**
     * 합격예측기본정보관리메인리스트
     */
    public function mainList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['PP.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";
        $column = "
            PP.PredictIdx, PP.MockPart, PP.SiteCode, PP.ProdName, PP.TakeAreas1CCds, PP.AddPointCcds, PP.MockYear, PP.MockRotationNo, 
            PP.PreServiceIsUse, PP.ServiceIsUse, PP.LastServiceIsUse, PP.ExplainLectureIsUse, PP.MobileServiceIs, PP.SurveyIs, PP.PreServiceSDatm, PP.PreServiceEDatm,
            PP.ServiceSDatm, PP.ServiceEDatm, PP.LastServiceSDatm, PP.LastServiceEDatm,
            PP.RegIp, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx, PP.IsUse, A.wAdminName
        ";

        $from = "
            FROM {$this->_table['predictProduct']} AS PP
            LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
        ";
        $selectCount = " SELECT COUNT(*) AS cnt";
        $where = " WHERE PP.PredictIdx > 0 ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = " ORDER BY PP.PredictIdx DESC\n";
        //echo "<pre>SELECT ". $column . $from . $where . $order . $offset_limit . "</pre>";
        $data = $this->_conn->query('SELECT' . $column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        $column = "
            *
        ";

        $from = "
            FROM 
                {$this->_table['predictCode']} 
                
        ";

        $order_by = " ";
        $where = " WHERE GroupCcd = 0";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();
        $arrCcd = array();
        foreach ($Res as $key => $val){
            $Ccd = $val['Ccd'];
            $CcdName = $val['CcdName'];
            $arrCcd[$Ccd] = $CcdName;
        }

        foreach ($data as &$it) {
            $arrMockPart = explode(',',$it['MockPart']);

            $mockpartstr = '';
            for($i=0; $i < count($arrMockPart); $i++){
                $tempstr = $arrMockPart[$i];
                $mockpartstr .= $arrCcd[$tempstr]."/";
            }
            $mockpartstr = substr($mockpartstr, 0, strlen($mockpartstr) - 1);

            $it['link'] = 'https://www.'.ENVIRONMENT.'.willbes.net/predict/index/'.$it['PredictIdx'];
            $it['include'] = "프로모션 페이지 URL + /spidx/".$it['PredictIdx'];

            $it['SerialStr'] = $mockpartstr;
        }

        return array($data, $count);
    }

    /**
     * 과목별문제등록 리스트
     */
    public function QuestionMainList($condition='', $limit='', $offset='')
    {
        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? " LIMIT $offset, $limit" : "";
        $column = "
	        PP.PpIdx, PP.PaperName, PP.AnswerNum, PP.TotalScore, PP.QuestionFile, PP.RealQuestionFile, PP.RegDate, PP.PredictIdx, PP.SubjectCode, PP.Type, 
	        A.wAdminName, A2.wAdminName AS wAdminName2, PP.IsUse, PD.ProdName
        ";

        $from = "
            FROM 
                {$this->_table['predictPaper']} AS PP
                LEFT JOIN {$this->_table['predictProduct']} AS PD ON PP.PredictIdx = PD.PredictIdx
                LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN {$this->_table['admin']} AS A2 ON PP.UpdAdminIdx = A2.wAdminIdx
        ";
        $selectCount = " SELECT COUNT(*) AS cnt";
        $where = " WHERE PP.PpIdx > 0 ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = " ORDER BY PP.RegDate DESC";
        //echo "<pre>". 'select' . $column . $from . $where . $order . $offset_limit . "</pre>";

        $data = $this->_conn->query('SELECT' . $column . $from . $where . $order . $offset_limit)->result_array();
        foreach($data as $key => &$val){
            $data[$key]['FilePath'] = $this->upload_url_predict.$val['PpIdx']."/";
        }
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        return array($data, $count);
    }

    /**
     * 합격예측신청목록
     */
    public function predictRegistList($condition='', $limit='', $offset='')
    {
        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? " LIMIT $offset, $limit" : "";
        $column = " 
            P.ProdName,
            P.PredictIdx,
            PR.ApplyType,
            MemName,
            PR.MemIdx,
            MemId,
            fn_dec(M.PhoneEnc) AS Phone,
            (SELECT CcdValue FROM {$this->_table['predictCode']} WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM {$this->_table['sysCode']} WHERE Ccd = PR.TaKeArea) AS TaKeArea,
            TaKeNumber,
            if(LectureType = 1, '온라인강의', if(LectureType = 2, '학원강의', if(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            if(Period = 1, '6개월 이하', if(Period = 2, '1년 이하', if(Period = 3, '2년 이하', '2년 이상'))) AS Period,
            PR.RegDatm,
            PR.AddPoint,
            ( SELECT GROUP_CONCAT(CcdName) FROM lms_predict_code WHERE Ccd IN ( SELECT SSPRRC.SubjectCode FROM lms_predict_register_r_code SSPRRC WHERE SSPRRC.PrIdx = PR.PrIdx GROUP BY SSPRRC.PrIdx ) ) AS SubjectName
        ";
        $from = "
            FROM 
                {$this->_table['predictRegister']} AS PR
                JOIN {$this->_table['member']} AS M ON PR.MemIdx = M.MemIdx
                JOIN {$this->_table['predictProduct']} AS P ON PR.PredictIdx = P.PredictIdx
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = " WHERE PR.IsStatus = 'Y' AND PR.MemIdx != '1000000'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        //$order = " ORDER BY PR.RegDatm DESC";
        $order = " ORDER BY PR.PrIdx DESC";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $data = $this->_conn->query('Select'. $column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;
        return array($data, $count);
    }

    /**
     * 합격예측채점서비스 신청목록
     * @param $is_count
     * @param array $condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function predictRegistList2($is_count, $condition=[], $limit=null, $offset=null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
            $column = " * ";
        }

        $def_column = "
            PR.ApplyType,MemName,PR.MemIdx,MemId,AddPoint,fn_dec(M.PhoneEnc) AS Phone,
            (SELECT CcdValue FROM lms_predict_code WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM lms_sys_code WHERE Ccd = PR.TaKeArea) AS TaKeArea,
            TaKeNumber,IF(LectureType = 1, '온라인강의', IF(LectureType = 2, '학원강의', IF(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            IF(Period = 1, '6개월 이하', IF(Period = 2, '1년 이하', IF(Period = 3, '2년 이하', '2년 이상'))) AS Period,
            RegDatm
            ,(GROUP_CONCAT(CONCAT('-',PP.PaperName,':',PG.OrgPoint))) AS OPOINT
        ";
        $from = "
            FROM {$this->_table['predictRegister']} AS PR
            JOIN {$this->_table['member']} AS M ON PR.MemIdx = M.MemIdx
            INNER JOIN {$this->_table['predictGradesOrigin']} AS PG ON PR.PrIdx = PG.PrIdx
            INNER JOIN {$this->_table['predictPaper']} AS PP ON PP.PpIDx = PG.PpIdx
        ";

        $condition = array_merge_recursive($condition, [
            'EQ' => [
                'PR.IsStatus' => 'Y',
            ],
            'NOT' => [
                'PR.MemIdx' => '1000000'
            ]
        ]);

        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);
        $group_by = " GROUP BY PR.PrIdx ";
        $query = $this->_conn->query("SELECT {$column} "."FROM (select ". $def_column . $from . $where . $group_by . $order_by_offset_limit . ") AS A");

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 합격가데이터
     * @param $is_count
     * @param $predict_idx
     * @param array $arr_condition
     * @param string $limit
     * @param string $offset
     * @param array $order_by
     * @return mixed
     */
    public function predictRegistList3($is_count, $predict_idx, $arr_condition = [], $limit='', $offset='', $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $OPoint = "
                (
                    SELECT 
                        GROUP_CONCAT(CONCAT('-',PaperName,':',OrgPoint)) AS OPOINT
                    FROM 
                        {$this->_table['predictGradesOrigin']} AS go
                        LEFT JOIN {$this->_table['predictPaper']} AS pp ON go.PpIDx = pp.PpIdx
                    WHERE go.PrIdx = PR.PrIdx
                )
            ";

            $column = " 
                ApplyType, MemName, MemIdx, MemId, AddPoint, fn_dec(PhoneEnc) AS Phone, TaKeNumber as TaKeNumber,
                (SELECT CcdValue FROM {$this->_table['predictCode']} WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
                (SELECT CcdValue FROM {$this->_table['sysCode']} WHERE Ccd = PR.TaKeArea) AS TaKeArea,
                if(LectureType = 1, '온라인강의', if(LectureType = 2, '학원강의', if(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
                if(Period = 1, '6개월 이하', if(Period = 2, '1년 이하', if(Period = 3, '2년 이하', '2년 이상'))) AS Period, RegDatm,
                ".$OPoint." AS OPOINT
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $from = "
            FROM (
                SELECT 
                r.*, M.MemId, M.MemName, M.PhoneEnc
                FROM lms_predict_register AS r
                INNER JOIN lms_member AS M ON r.MemIdx = M.MemIdx
                LEFT JOIN (
                    SELECT PrIdx, OrgPoint FROM lms_predict_grades_origin
                    WHERE PredictIdx = '{$predict_idx}'
                    GROUP BY PrIdx
                ) AS o ON r.PrIdx = o.PrIdx
                WHERE r.PredictIdx = '{$predict_idx}' AND o.PrIdx IS NOT NULL AND M.MemIdx = 1000000
                {$where}
                ORDER BY r.PrIdx DESC
            ) AS PR
            WHERE PrIdx IS NOT NULL
        ";

        $query = $this->_conn->query('select '. $column . $from . $order_by_offset_limit);
        if ($is_count === true) {
            return $query->row(0)->numrows;
        } else {
            $data = $query->result_array();
        }

        foreach ($data as &$it) {
            $it['OPOINT'] = str_replace(',','<br>',$it['OPOINT']);
        }
        return $data;
    }


    /**
     * 데이터 복사
     */
    public function copyData($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $RegIp = $this->input->ip_address();
        $RegAdminIdx = $this->session->userdata('admin_idx');
        $RegDatm = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_begin();

            // lms_mock_paper 복사
            $sql = "
                INSERT INTO {$this->_table['predictPaper']}
                    (PaperName, AnswerNum, TotalScore, 
                     QuestionFile, RealQuestionFile, PredictIdx, SubjectCode, Type, IsUse, RegIp, RegAdminIdx, RegDate)
                SELECT CONCAT('복사-', PaperName), AnswerNum, TotalScore,
                       QuestionFile, RealQuestionFile, PredictIdx, SubjectCode, Type, 'N', ?, ?, ?
                FROM {$this->_table['predictPaper']}
                WHERE PpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($RegIp, $RegAdminIdx, $RegDatm, $idx));

            $nowIdx = $this->_conn->insert_id();

            // lms_mock_questions 복사
            $sql = "
                INSERT INTO {$this->_table['predictQuestion']}
                    (PpIdx, QuestionNO, RightAnswer, Scoring, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, QuestionNO, RightAnswer, Scoring, ?, ?, ?
                FROM {$this->_table['predictQuestion']}
                WHERE PpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($nowIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            // 파일 복사
            $src = $this->upload_path . $this->upload_path_predict . $idx . "/";
            $dest = $this->upload_path . $this->upload_path_predict . $nowIdx . "/";

            exec("cp -rf $src $dest");
            if(is_dir($dest) === false) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            if ($this->_conn->trans_status() === false) {
                throw new Exception('복사에 실패했습니다.');
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
     * 합격예측신청목록
     */
    public function predictRegistListExcel($condition='', $limit='', $offset='')
    {
        $column = "
            CONCAT(P.ProdName,'[',P.PredictIdx,']') AS ProdName,
            PR.ApplyType, 
            MemName,
            MemId,
            fn_dec(M.PhoneEnc) AS Phone,
            (SELECT CcdValue FROM {$this->_table['predictCode']} WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM {$this->_table['sysCode']} WHERE Ccd = PR.TaKeArea) AS TaKeArea,
            TaKeNumber,
            if(LectureType = 1, '온라인강의', if(LectureType = 2, '학원강의', if(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            if(Period = 1, '6개월 이하', if(Period = 2, '1년 이하', if(Period = 3, '2년 이하', '2년 이상'))) AS Period,
            PR.RegDatm

        ";

        $from = "
            FROM 
                {$this->_table['predictRegister']} AS PR
                JOIN {$this->_table['member']} AS M ON PR.MemIdx = M.MemIdx
                JOIN {$this->_table['predictProduct']} AS P ON PR.PredictIdx = P.PredictIdx
        ";

        $where = "WHERE PR.IsStatus = 'Y' AND PR.MemIdx != '1000000'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = " ORDER BY PR.RegDatm DESC\n";

        $sql = "
            SELECT 
            $column     
            $from  
            $where 
            $order              
        ";
        $data = $this->_conn->query($sql)->result_array();
        return $data;
    }

    /**
     * 채점서비스참여현황
     * @param array $condition
     * @param array $order_by
     * @return mixed
     */
    public function predictRegistListExcel2($condition=[], $order_by = [])
    {
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $column = "
            PR.ApplyType,MemName,PR.MemIdx,MemId,AddPoint,fn_dec(M.PhoneEnc) AS Phone,
            (SELECT CcdValue FROM lms_predict_code WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM lms_sys_code WHERE Ccd = PR.TaKeArea) AS TaKeArea,
            TaKeNumber,IF(LectureType = 1, '온라인강의', IF(LectureType = 2, '학원강의', IF(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            IF(Period = 1, '6개월 이하', IF(Period = 2, '1년 이하', IF(Period = 3, '2년 이하', '2년 이상'))) AS Period,
            RegDatm
            ,(GROUP_CONCAT(CONCAT('-',PP.PaperName,':',PG.OrgPoint))) AS OPOINT
        ";
        $from = "
            FROM {$this->_table['predictRegister']} AS PR
            JOIN {$this->_table['member']} AS M ON PR.MemIdx = M.MemIdx
            INNER JOIN {$this->_table['predictGradesOrigin']} AS PG ON PR.PrIdx = PG.PrIdx
            INNER JOIN {$this->_table['predictPaper']} AS PP ON PP.PpIDx = PG.PpIdx
        ";

        $condition = array_merge_recursive($condition, [
            'EQ' => [
                'PR.IsStatus' => 'Y',
            ],
            'NOT' => [
                'PR.MemIdx' => '1000000'
            ]
        ]);

        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);
        $group_by = " GROUP BY PR.PrIdx ";
        return $this->_conn->query("select ". $column . $from . $where . $group_by . $order_by_offset_limit)->result_array();
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
        $where = " WHERE IsUse = 'Y' AND GroupCcd = ".$GroupCcd." AND Ccd != '712018' -- 전국제외";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /*
     *  todo 사용하지 않음(권순현대리 개발건) : 2019-08-13 조규호
     */
    public function getCntVarious(){
        $column = "
            (SELECT COUNT(*) FROM lms_survey_answer_info WHERE SpIdx = '3') AS Survey, -- 설문
            (SELECT COUNT(*) FROM lms_predict_register WHERE PredictIdx = '100001') AS Preregist, -- 사전접수
            (SELECT COUNT(*) FROM (
                SELECT MemIdx FROM lms_predict_grades_origin WHERE PredictIdx = '100001' GROUP BY MemIdx
            ) AS A) AS Score, -- 채점
            (SELECT COUNT(*) FROM lms_event_comment WHERE ElIdx = (SELECT ElIdx FROM lms_event_lecture WHERE PromotionCode = 1187)) AS Rumor, -- 소문내기
            (SELECT COUNT(*) FROM lms_event_comment WHERE ElIdx = (SELECT ElIdx FROM lms_event_lecture WHERE PromotionCode = 1199)) AS Hit, -- 적중
            (SELECT COUNT(*) FROM lms_event_comment WHERE ElIdx = (SELECT ElIdx FROM lms_event_lecture WHERE PromotionCode = 1200)) AS precedents -- 최신판례특강
            -- 라이브특강플레이수
            -- 해설강의
            -- 봉투모의고사
            -- 시크릿다운
        ";

        $from = "
            FROM 
                DUAL
        ";

        $order_by = "";
        $where = " ";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     *  합격예측용 직렬호출
     */
    public function getSerialAll($arr_condition = array()){
        $column = "
            Ccd, CcdName, Type  
        ";

        $from = "
            FROM 
                {$this->_table['predictCode']} 
        ";

        $order_by = " ORDER BY OrderNum";
        if(empty($arr_condition)===true){
            $where = " WHERE IsUse = 'Y' AND GroupCcd = 0";
        }else{
            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        }
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     *  합격예측용 기존데이터 호출
     */
    public function getProduct($PredictIdx){
        $column = "
            PP.PredictIdx, PP.MockPart, PP.SiteCode, PP.ProdName, PP.TakeAreas1CCds, PP.AddPointCcds, PP.MockYear, PP.MockRotationNo,
            PP.PreServiceIsUse, PP.ServiceIsUse, PP.LastServiceIsUse, PP.ExplainLectureIsUse, PP.MobileServiceIs, PP.SurveyIs, PP.PreServiceSDatm, PP.PreServiceEDatm,
            PP.ServiceSDatm, PP.ServiceEDatm, PP.LastServiceSDatm, PP.LastServiceEDatm,
            PP.RegIp, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx, PP.IsUse, A.wAdminName, A2.wAdminName AS wAdminName2
            ,pp.SuccessfulCount,pp.CertIdxArr,pp.SpIdx
        ";

        $from = "
            FROM 
                {$this->_table['predictProduct']} AS PP
                LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN {$this->_table['admin']} AS A2 ON PP.UpdAdminIdx = A2.wAdminIdx
        ";

        $order_by = " ";
        $where = " WHERE PP.PredictIdx = ".$PredictIdx."";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        $Res['MobileServiceIsArr'] = explode(',',$Res['MobileServiceIs']);
        $Res['SurveyIsArr'] = explode(',',$Res['SurveyIs']);
        $Res['MockPartArr'] = explode(',',$Res['MockPart']);

        return $Res;
    }

    /**
     *  가데이터입력
     */
    public function tempDataUpload($PredictIdx, $params = [])
    {
        //print_r($params);

        $this->_conn->trans_begin();

        try {
            $column = "PpIdx";
            $from = " FROM {$this->_table['predictPaper']} ";

            $order_by = " ORDER BY PpIdx";
            $where = " WHERE PredictIdx = ".$PredictIdx." AND IsStatus = 'Y' AND IsUse = 'Y'";
            //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
            $ArrPpIdx = $query->result_array();

            foreach ($params as $key => $val) {
                $TakeMockPart = $val['A'];
                if(empty($TakeMockPart)===false){
                    $TakeArea = $val['B'];

                    $arrPoint[] = $val['C'];
                    $arrPoint[] = $val['D'];
                    $arrPoint[] = $val['E'];
                    $arrPoint[] = $val['F'];
                    $arrPoint[] = $val['G'];
                    $arrPoint[] = $val['H'];
                    $arrPoint[] = $val['I'];
                    $arrPoint[] = $val['J'];
                    $arrPoint[] = $val['K'];

                    // 데이터 등록
                    $addData = [
                        'PredictIdx' => $PredictIdx,
                        'MemIdx' => 1000000,
                        'SiteCode' => 2001,
                        'TakeMockPart' => $TakeMockPart,
                        'TakeNumber' => '999',
                        'TakeArea' => $TakeArea,
                        'AddPoint' => 0,
                        'IsStatus' => 'Y',
                        'LectureType' => 1,
                        'Period' => 1,
                        'IsTake' => 'N'
                    ];

                    //print_r($addData);

                    if ($this->_conn->set($addData)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictRegister']) === false) {
                        throw new \Exception('등록에 실패했습니다.');
                    }

                    $idx = $this->_conn->insert_id();

                    if($TakeMockPart == 300){
                        for($i=0; $i<5; $i++){
                            // 데이터 등록
                            $addData2 = [
                                'MemIdx' => 1000000,
                                'PrIdx' => $idx,
                                'PredictIdx' => $PredictIdx,
                                'PpIdx' => $ArrPpIdx[$i]['PpIdx'],
                                'TakeMockPart' => $TakeMockPart,
                                'TakeArea' => $TakeArea,
                                'OrgPoint' => $arrPoint[$i],
                            ];

                            //print_r($addData2);

                            if ($this->_conn->set($addData2)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictGradesOrigin']) === false) {
                                throw new \Exception('점수등록에 실패했습니다.');
                            }
                        }
                    } else {
                        for($i=0; $i<count($arrPoint); $i++){
                            // 데이터 등록
                            $addData2 = [
                                'MemIdx' => 1000000,
                                'PrIdx' => $idx,
                                'PredictIdx' => $PredictIdx,
                                'PpIdx' => $ArrPpIdx[$i]['PpIdx'],
                                'TakeMockPart' => $TakeMockPart,
                                'TakeArea' => $TakeArea,
                                'OrgPoint' => $arrPoint[$i],
                            ];

                            //print_r($addData2);

                            if ($this->_conn->set($addData2)->insert($this->_table['predictGradesOrigin']) === false) {
                                throw new \Exception('점수등록에 실패했습니다.');
                            }
                        }
                    }
                    unset($arrPoint);
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
     *  합격예측용 기존데이터 호출
     */
    public function getProductALL(){
        $column = "
            PP.PredictIdx, PP.MockPart, PP.SiteCode, PP.ProdName, PP.TakeAreas1CCds, PP.AddPointCcds, PP.MockYear, PP.MockRotationNo,  
            PP.PreServiceIsUse, PP.ServiceIsUse, PP.LastServiceIsUse, PP.ExplainLectureIsUse, PP.MobileServiceIs, PP.SurveyIs, PP.PreServiceSDatm, PP.PreServiceEDatm,
            PP.ServiceSDatm, PP.ServiceEDatm, PP.LastServiceSDatm, PP.LastServiceEDatm,
            PP.RegIp, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx, PP.IsUse, A.wAdminName, A2.wAdminName AS wAdminName2
        ";

        $from = "
            FROM 
                {$this->_table['predictProduct']} AS PP
                LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN {$this->_table['admin']} AS A2 ON PP.UpdAdminIdx = A2.wAdminIdx
                
        ";

        $order_by = " ORDER BY PP.PredictIdx DESC ";
        $where = "";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     * 기본정보, 문항정보 조회
     */
    public function getExamBase($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $column = "
	        PP.PpIdx, PP.PaperName, PP.AnswerNum, PP.TotalScore, PP.QuestionFile, PP.RealQuestionFile, PP.RegDate, PP.PredictIdx, PP.SubjectCode, PP.Type, PP.UpdDate, 
	        A.wAdminName, A2.wAdminName AS wAdminName2, PP.IsUse
	        ,PP.RegistAvgPoint, PP.RegistStandard
        ";

        $from = "
            FROM 
                {$this->_table['predictPaper']} AS PP
                LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN {$this->_table['admin']} AS A2 ON PP.UpdAdminIdx = A2.wAdminIdx
        ";

        $where = " WHERE PP.PpIdx = ".$idx;
        $order = " ORDER BY PP.RegDate DESC";

        $data = $this->_conn->query('SELECT' . $column . $from . $where . $order)->row_array();
        if(empty($data)) return false;

        $where = array('PpIdx' => $idx, 'IsStatus' => 'Y');
        // 문항정보
        $qData = $this->_conn->order_by('QuestionNO ASC')->get_where($this->_table['predictQuestion'], $where)->result_array();

        return array($data, $qData);
    }

    /**
     *  합격예측용 과목코드 호출
     */
    public function getSubject($PredictIdx){

        $column = "
            Ccd, CcdName, pc.Type, if(pp.PredictIdx != '','(등록완료)','') AS AddIs
        ";

        $from = "
            FROM 
                {$this->_table['predictCode']} AS pc
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pc.Ccd = pp.SubjectCode AND pp.PredictIdx = ".$PredictIdx;

        $order_by = " ORDER BY Ccd";
        $where = " WHERE GroupCcd = 100 GROUP BY CcdName";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     * @return array|bool
     */
    public function store()
    {
        $date = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_start();

            $PreServiceSDatm =   $this->input->post('PreServiceSDatm_d') .' '. $this->input->post('PreServiceSDatm_h') .':'. $this->input->post('PreServiceSDatm_m') .':00';
            $PreServiceEDatm =   $this->input->post('PreServiceEDatm_d') .' '. $this->input->post('PreServiceEDatm_h') .':'. $this->input->post('PreServiceEDatm_m') .':00';

            $ServiceSDatm =   $this->input->post('ServiceSDatm_d') .' '. $this->input->post('ServiceSDatm_h') .':'. $this->input->post('ServiceSDatm_m') .':00';
            $ServiceEDatm =   $this->input->post('ServiceEDatm_d') .' '. $this->input->post('ServiceEDatm_h') .':'. $this->input->post('ServiceEDatm_m') .':00';

            $LastServiceSDatm =   $this->input->post('LastServiceSDatm_d') .' '. $this->input->post('LastServiceSDatm_h') .':'. $this->input->post('LastServiceSDatm_m') .':00';
            $LastServiceEDatm =   $this->input->post('LastServiceEDatm_d') .' '. $this->input->post('LastServiceEDatm_h') .':'. $this->input->post('LastServiceEDatm_m') .':00';

            // 신규 상품코드 조회
            $PredictIdx = $this->_conn->getFindResult($this->_table['predictProduct'], 'IFNULL(MAX(PredictIdx) + 1, 100001) as PredictIdx');
            $PredictIdx = $PredictIdx['PredictIdx'];

            // lms_Product_Mock 저장
            $data = array(
                'PredictIdx'       => $PredictIdx,
                'MockPart'       => implode(',', $this->input->post('MockPart')),
                'MobileServiceIs' => empty($this->input->post('MobileServiceIs')) ? null : implode(',', $this->input->post('MobileServiceIs')),
                'SurveyIs'       => empty($this->input->post('SurveyIs')) ? null : implode(',', $this->input->post('SurveyIs')),
                'SiteCode'      => $this->input->post('SiteCode'),
                'ProdName'      => $this->input->post('ProdName', true),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                'PreServiceIsUse' => $this->input->post('PreServiceIsUse'),
                'ServiceIsUse' => $this->input->post('ServiceIsUse'),
                'LastServiceIsUse' => $this->input->post('LastServiceIsUse'),
                'ExplainLectureIsUse' => $this->input->post('ExplainLectureIsUse'),
                'IsUse' => $this->input->post('IsUse'),
                'PreServiceSDatm' => $PreServiceSDatm,
                'PreServiceEDatm' => $PreServiceEDatm,
                'ServiceSDatm' => $ServiceSDatm,
                'ServiceEDatm' => $ServiceEDatm,
                'LastServiceSDatm' => $LastServiceSDatm,
                'LastServiceEDatm' => $LastServiceEDatm,
                'RegIp'          => $this->input->ip_address(),
                'SuccessfulCount' =>$this->input->post('SuccessfulCount'),
                'CertIdxArr' =>$this->input->post('CertIdxArr'),
                'SpIdx' =>$this->input->post('SpIdx'),
                'RegDatm'        => $date,
                'RegAdminIdx'    => $this->session->userdata('admin_idx'),
            );

            $this->_conn->insert($this->_table['predictProduct'], $data);

            /*----------------          자동지급강좌 등록        ---------------*/
            if($this->_setPredictProduct($this->input->post(null), $PredictIdx) !== true) {
                throw new \Exception('자동지급강좌 등록에 실패했습니다.');
            }
            /*----------------          자동지급강좌 등록        ---------------*/

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $PredictIdx]];
    }

    /**
     * @return array|bool
     */
    public function update()
    {
        $date = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_start();

            $PreServiceSDatm =   $this->input->post('PreServiceSDatm_d') .' '. $this->input->post('PreServiceSDatm_h') .':'. $this->input->post('PreServiceSDatm_m') .':00';
            $PreServiceEDatm =   $this->input->post('PreServiceEDatm_d') .' '. $this->input->post('PreServiceEDatm_h') .':'. $this->input->post('PreServiceEDatm_m') .':00';

            $ServiceSDatm =   $this->input->post('ServiceSDatm_d') .' '. $this->input->post('ServiceSDatm_h') .':'. $this->input->post('ServiceSDatm_m') .':00';
            $ServiceEDatm =   $this->input->post('ServiceEDatm_d') .' '. $this->input->post('ServiceEDatm_h') .':'. $this->input->post('ServiceEDatm_m') .':00';

            $LastServiceSDatm =   $this->input->post('LastServiceSDatm_d') .' '. $this->input->post('LastServiceSDatm_h') .':'. $this->input->post('LastServiceSDatm_m') .':00';
            $LastServiceEDatm =   $this->input->post('LastServiceEDatm_d') .' '. $this->input->post('LastServiceEDatm_h') .':'. $this->input->post('LastServiceEDatm_m') .':00';


            // lms_Product_Mock 저장
            $data = array(
                'MockPart'       => implode(',', $this->input->post('MockPart')),
                'ProdName'      => $this->input->post('ProdName', true),
                'MobileServiceIs' => empty($this->input->post('MobileServiceIs')) ? null : implode(',', $this->input->post('MobileServiceIs')),
                'SurveyIs'       => empty($this->input->post('SurveyIs')) ? null : implode(',', $this->input->post('SurveyIs')),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                'PreServiceIsUse' => $this->input->post('PreServiceIsUse'),
                'ServiceIsUse' => $this->input->post('ServiceIsUse'),
                'LastServiceIsUse' => $this->input->post('LastServiceIsUse'),
                'ExplainLectureIsUse' => $this->input->post('ExplainLectureIsUse'),
                'IsUse' => $this->input->post('IsUse'),
                'PreServiceSDatm' => $PreServiceSDatm,
                'PreServiceEDatm' => $PreServiceEDatm,
                'ServiceSDatm' => $ServiceSDatm,
                'ServiceEDatm' => $ServiceEDatm,
                'LastServiceSDatm' => $LastServiceSDatm,
                'LastServiceEDatm' => $LastServiceEDatm,
                'SuccessfulCount' =>$this->input->post('SuccessfulCount'),
                'CertIdxArr' =>$this->input->post('CertIdxArr'),
                'SpIdx' =>$this->input->post('SpIdx'),
                'RegIp'          => $this->input->ip_address(),
                'UpdAdminIdx'    => $this->session->userdata('admin_idx'),
            );

           $this->_conn->set($data)->set('UpdDatm', 'NOW()', false)->where(['PredictIdx' => $this->input->post('idx')]);

            if ($this->_conn->update($this->_table['predictProduct']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $PredictIdx = $this->input->post('idx');

            /*----------------          자동지급강좌 등록        ---------------*/
            if($this->_setPredictProduct($this->input->post(null), $PredictIdx) !== true) {
                throw new \Exception('자동지급강좌 등록에 실패했습니다.');
            }
            /*----------------          자동지급강좌 등록        ---------------*/

            $this->_conn->trans_complete();
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }

    /**
     * 과목정보 등록 (lms_Predict_Paper)
     */
    public function storePaper()
    {
        try {
            $this->_conn->trans_begin();

            $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile'], 1);

            // 데이터 저장
            $data = array(
                'PaperName' => $this->input->post('PaperName', true),
                'AnswerNum' => $this->input->post('AnswerNum'),
                'PredictIdx' => $this->input->post('PredictIdx'),
                'SubjectCode' => $this->input->post('SubjectCode'),
                'TotalScore' => $this->input->post('TotalScore'),
                'Type' => $this->input->post('Type'),
                'QuestionFile' => $names['QuestionFile']['name'],
                'RealQuestionFile' => $names['QuestionFile']['real'],
                'IsUse' => $this->input->post('IsUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDate' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegistAvgPoint' => $this->input->post('RegistAvgPoint'),
                'RegistStandard' => $this->input->post('RegistStandard'),
            );

            $this->_conn->insert($this->_table['predictPaper'], $data);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('저장에 실패했습니다.');
            }
            $nowIdx = $this->_conn->insert_id();

            if( isset($names['QuestionFile']['error']) && $names['QuestionFile']['error'] === UPLOAD_ERR_OK && $names['QuestionFile']['size'] > 0 ) {
                $uploadSubPath = $this->upload_path_predict . $nowIdx;
                $isSave = $this->uploadFileSave($uploadSubPath, $names);
                if ($isSave !== true) {
                    throw new Exception('파일 저장에 실패했습니다.');
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
     * 과목정보 수정 (lms_Predict_Paper)
     */
    public function updatePaper()
    {
        $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile'], 1);

        try {
            $this->_conn->trans_begin();

            // 데이터 수정
            $data = array(
                'PaperName' => $this->input->post('PaperName', true),
                'PredictIdx' => $this->input->post('PredictIdx'),
                'SubjectCode' => $this->input->post('SubjectCode'),
                'Type' => $this->input->post('Type'),
                'IsUse' => $this->input->post('IsUse'),
                'UpdDate' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'RegistAvgPoint' => $this->input->post('RegistAvgPoint'),
                'RegistStandard' => $this->input->post('RegistStandard'),
            );
            if($this->input->post('AnswerNum'))      $data['AnswerNum'] = $this->input->post('AnswerNum');
            if($this->input->post('TotalScore'))     $data['TotalScore'] = $this->input->post('TotalScore');

            if( isset($names['QuestionFile']['error']) && $names['QuestionFile']['error'] === UPLOAD_ERR_OK && $names['QuestionFile']['size'] > 0 ) {
                $data['QuestionFile'] = $names['QuestionFile']['name'];
                $data['RealQuestionFile'] = $names['QuestionFile']['real'];

                // 파일 업로드
                $uploadSubPath = $this->upload_path_predict . $this->input->post('idx');

                $isSave = $this->uploadFileSave($uploadSubPath, $names);
                if($isSave !== true) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }

            $where = array('PpIdx' => $this->input->post('idx'));

            $this->_conn->update($this->_table['predictPaper'], $data, $where);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('변경에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $this->input->post('idx')]];
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

    /**
     * 문항정보 등록,수정
     *
     * (주의) 저장파일에 Q1_~ 로 번호 붙으나 삭제를 하게 되면 index가 변경됨으로 번호가 안 맞을 수도 있음 (중복은 안됨)
     */
    public function storePPQuestion()
    {
        try {
            $this->_conn->trans_begin();

            if( !empty($this->input->post('chapterTotal')) ) {
                foreach ($this->input->post('chapterTotal') as $k => $v) {
                    if ( empty($this->input->post('chapterExist')) || !in_array($v, $this->input->post('chapterExist')) ) { // 신규등록

                        $dataReg = array(
                            'PpIdx' => $this->input->post('idx'),
                            'QuestionNO' => $_POST['QuestionNO'][$k],
                            'RightAnswer' => $_POST['RightAnswer'][$k],
                            'Scoring' => $_POST['Scoring'][$k],
                            'RegIp' => $this->input->ip_address(),
                            'RegDatm' => date("Y-m-d H:i:s"),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        );

                        $this->_conn->insert($this->_table['predictQuestion'], $dataReg);
                        if(!$this->_conn->affected_rows()) {
                            throw new Exception('저장에 실패했습니다(1).');
                        }
                    }
                    else { // 수정
                        $dataMod = array(
                            'QuestionNO' => $_POST['QuestionNO'][$k],
                            'RightAnswer' => $_POST['RightAnswer'][$k],
                            'Scoring' => $_POST['Scoring'][$k],
                            'UpdDatm' => date("Y-m-d H:i:s"),
                            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                        );

                        $where = array('PqIdx' => $v);
                        $this->_conn->update($this->_table['predictQuestion'], $dataMod, $where);

                        if(!$this->_conn->affected_rows()) {
                            throw new Exception('저장에 실패했습니다(2).');
                        }
                    }
                }
            }

            // 삭제 (IsStatus Update)
            if( !empty($this->input->post('chapterDel')) ) {
                foreach ($this->input->post('chapterDel') as $k => $v) {
                    $dataDel = array(
                        'IsStatus' => 'N',
                        'UpdDatm' => date("Y-m-d H:i:s"),
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    );

                    $where = array('PqIdx' => $v);
                    $this->_conn->update($this->_table['predictQuestion'], $dataDel, $where);
                    if(!$this->_conn->affected_rows()) {
                        throw new Exception('저장에 실패했습니다(3).');
                    }

                }
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $this->input->post('idx')]];
    }

    /**
     *  합격예측용 직렬호출
     */
    public function getSerial($GroupCcd){
        $column = "
            Ccd, CcdName  
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
     * 설문리스트
     */
    public function surveyList($conditionAdd = '', $limit = '', $offset = '')
    {
        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? " LIMIT $offset, $limit" : "";

        $column = "
            SpIdx,
            SpTitle,
            SqsIdx,
            (SELECT SqsTitle FROM {$this->_table['surveyQuestionSet']} WHERE SqsIdx = SP.SqsIdx) AS SqsTitle,
            (SELECT COUNT(*) FROM {$this->_table['surveyAnswer']} WHERE SpIdx = SP.SpIdx) AS CNT,
            StartDate,
            EndDate,
            SpComment,
            SpUseYn
        ";
        $from = "
            FROM 
                {$this->_table['surveyProduct']} AS SP
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE SpIdx > 0 ";
        $order = "ORDER BY SpIdx DESC";

        //echo "<pre>".'SELECT ' . $column . $from . $where . $order . $offset_limit."</pre>";
        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        foreach ($data as $key => $val){
            $data[$key]['link'] = 'https://www.'.ENVIRONMENT.'.willbes.net/survey/index/'.$val['SpIdx'];
            $data[$key]['include'] = "프로모션 페이지 URL + /spidx/".$val['SpIdx'];
        }

        return array($data, $count);
    }

    /**
     * 문항리스트
     */
    public function surveyQuestionList($conditionAdd = '', $limit = '', $offset = '')
    {
        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? " LIMIT $offset, $limit" : "";

        $column = "
                SqIdx, SqTitle, 
                IF(Type = 'S','선택형',IF(Type = 'M','선다형',IF(Type = 'T','복수형','서술형'))) AS Type, 
                SqComment, Comment1, Comment2, Comment3, Comment4, Comment5, Comment6, Comment7, Comment8, Comment9, Comment10,
                Comment11, Comment12, Comment13, Comment14, Comment15, Comment16, Comment17, Comment18, Comment19, Comment20, 
                Comment21, Comment22, Comment23, Comment24, Comment25, 
                Hint1, Hint2, Hint3, Hint4, Hint5, Hint6, Hint7, Hint8, Hint9, Hint10, 
                Hint11, Hint12, Hint13, Hint14, Hint15, Hint16, Hint17, Hint18, Hint19, Hint20, 
                Hint21, Hint22, Hint23, Hint24, Hint25, 
                Cnt, SqUseYn
        ";
        $from = "
            FROM 
                {$this->_table['surveyQuestion']}
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE SqIdx > 0 ";
        $order = "ORDER BY SqIdx DESC";

        //echo "<pre>".'SELECT ' . $column . $from . $where . $order . $offset_limit."</pre>";
        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        return array($data, $count);
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
     * 설문결과상세
     */
    public function answerCallDetail($idx)
    {
        $column = "
            sa.SaIdx, sq.SqTitle AS SubTitle, sa.SqIdx, Answer, sa.Comment, sa.TYPE, si.MemIdx, lm.MemName, lm.MemId, si.RegDatm
        ";

        $from = "
            FROM 
                {$this->_table['surveyProduct']} AS sp
                JOIN {$this->_table['surveyAnswer']} AS si ON sp.SpIdx = si.SpIdx
                JOIN {$this->_table['member']} AS lm ON si.MemIdx = lm.MemIdx
                JOIN {$this->_table['surveyAnswerDetail']} AS sa ON si.SaIdx = sa.SaIdx
                JOIN {$this->_table['surveyQuestion']} AS sq ON sa.SqIdx = sq.SqIdx
        ";

        $order_by = " ORDER BY si.SaIdx, si.MemIdx, sa.SadIdx";
        $where = " WHERE sp.SpIdx = " . $idx;
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
     * 문항코멘트
     */
    public function questionSetAll($idx){
        $column = "
            sq.*
        ";

        $from = "
            FROM 
                {$this->_table['surveyProduct']} AS sp
                JOIN {$this->_table['surveyQuestionSetDetail']} AS qs ON sp.SqsIdx = qs.SqsIdx
                JOIN {$this->_table['surveyQuestion']} AS sq ON qs.SqIdx = sq.SqIdx
        ";

        $order_by = " ORDER BY SqIdx ";
        $where = " WHERE sp.SpIdx = " . $idx;
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     * 문항세트리스트
     */
    public function surveyQuestionSetList($conditionAdd = '', $limit = '', $offset = '')
    {
        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? " LIMIT $offset, $limit" : "";

        $column = "
                *
        ";
        $from = "
            FROM 
                {$this->_table['surveyQuestionSet']}
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE SqsIdx > 0 ";
        $order = "ORDER BY SqsIdx DESC";

        //echo "<pre>".'SELECT ' . $column . $from . $where . $order . $offset_limit."</pre>";
        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        return array($data, $count);
    }

    /**
     * 문항등록
     */
    public function storeQuestion($data)
    {
        try {
            $this->_conn->trans_start();

            $this->_conn->insert($this->_table['surveyQuestion'], $data);


            $survey_idx = $this->_conn->insert_id();

            $this->_conn->trans_complete();
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $survey_idx]];
    }

    /**
     * 설문 문항등록수정
     */
    public function updateQuestion($data, $idx)
    {
        try {
            $this->_conn->trans_start();

            $where = array('SqIdx' => $idx);
            $this->_conn->update($this->_table['surveyQuestion'], $data, $where);

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('수정에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $this->input->post('idx')]];
    }

    /**
     * 설문 등록
     */
    public function storeSurvey($data)
    {
        try {
            $this->_conn->trans_start();

            $this->_conn->insert($this->_table['surveyProduct'], $data);

            $this->_conn->trans_complete();
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }

    /**
     * 설문 수정
     */
    public function updateSurvey($data, $idx)
    {
        try {
            $this->_conn->trans_start();

            $where = array('SpIdx' => $idx);
            $this->_conn->update($this->_table['surveyProduct'], $data, $where);

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('수정에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }

    /**
     * 문항세트등록
     */
    public function storeQuestionSet($data, $arr_input)
    {
        try {
            $this->_conn->trans_start();

            $this->_conn->insert($this->_table['surveyQuestionSet'], $data);

            $surveyset_idx = $this->_conn->insert_id();

            $arrSubTitle = $arr_input['SubTitle'];
            $arrSqIdx = $arr_input['SqIdx'];
            $arrGroupNumber = $arr_input['GroupNumber'];
            $arrGroup = $arr_input['Group'];
            $arrGroupTitle = $arr_input['GroupTitle'];

            $arrGroupSet = array();
            for($i = 0; $i < COUNT($arrGroup); $i++){
                $number = $arrGroup[$i];
                $arrGroupSet[$number] = $arrGroupTitle[$i];
            }

            for($i = 0; $i < COUNT($arrSqIdx); $i++){
                $v = $i + 1;
                $gnum = $arrGroupNumber[$i];
                $insert_column = $surveyset_idx.", ".$arrSqIdx[$i].", ".$arrGroupNumber[$i].", ".$v.", '".addslashes($arrGroupSet[$gnum])."', '".addslashes($arrSubTitle[$i])."'";
                $query = "INSERT INTO {$this->_table['surveyQuestionSetDetail']}(SqsIdx, SqIdx, GroupNumber, Ordering, GroupTitle, SubTitle) 
                          VALUES ({$insert_column})";
                $this->_conn->query($query);
            }

            $this->_conn->trans_complete();

        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }

    /**
     * 설문 문항세트수정
     */
    public function updateQuestionSet($data, $arr_input, $idx)
    {
        try {
            $this->_conn->trans_start();

            $where = array('SqsIdx' => $idx);
            $this->_conn->update($this->_table['surveyQuestionSet'], $data, $where);

            $arrSubTitle = $arr_input['SubTitle'];
            $arrSqIdx = $arr_input['SqIdx'];
            $arrGroupNumber = $arr_input['GroupNumber'];
            $arrGroup = $arr_input['Group'];
            $arrGroupTitle = $arr_input['GroupTitle'];

            $arrGroupSet = array();
            for($i = 0; $i < COUNT($arrGroup); $i++){
                $number = $arrGroup[$i];
                $arrGroupSet[$number] = $arrGroupTitle[$i];
            }

            // 개수가 많아질수 경우가 있어서 지우고 재입력
            $where = array('SqsIdx' => $idx);
            if($this->_conn->delete($this->_table['surveyQuestionSetDetail'], $where) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }

            for($i = 0; $i < COUNT($arrSqIdx); $i++){
                $v = $i + 1;
                $gnum = $arrGroupNumber[$i];
                $insert_column = $idx.", ".$arrSqIdx[$i].", ".$arrGroupNumber[$i].", ".$v.", '".addslashes($arrGroupSet[$gnum])."', '".addslashes($arrSubTitle[$i])."'";
                $query = "INSERT INTO {$this->_table['surveyQuestionSetDetail']}(SqsIdx, SqIdx, GroupNumber, Ordering, GroupTitle, SubTitle) 
                          VALUES ({$insert_column})";
                $this->_conn->query($query);
            }

            $this->_conn->trans_complete();
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }

    /**
     * 문항호출
     */
    public function questionCall($idx){
        $column = "
            SqIdx, SqTitle, 
            IF(Type = 'S','선택형',IF(Type = 'M','선다형',IF(Type = 'T','복수형','서술형'))) AS Type, 
            SqComment, Comment1, Comment2, Comment3, Comment4, Comment5, Comment6, Comment7, Comment8, Comment9, Comment10, 
            Comment11, Comment12, Comment13, Comment14, Comment15, Comment16, Comment17, Comment18, Comment19, Comment20, 
            Comment21, Comment22, Comment23, Comment24, Comment25, 
            Hint1, Hint2, Hint3, Hint4, Hint5, Hint6, Hint7, Hint8, Hint9, Hint10, 
            Hint11, Hint12, Hint13, Hint14, Hint15, Hint16, Hint17, Hint18, Hint19, Hint20, 
            Hint21, Hint22, Hint23, Hint24, Hint25, 
            Cnt, SqUseYn
        ";

        $from = "
            FROM
                {$this->_table['surveyQuestion']} 
        ";

        $order_by = " ";
        $where = " WHERE SqIdx = ".$idx;

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
 * 문항호출
 */
    public function questionCallAll(){
        $column = "
            SqIdx, SqTitle, 
            IF(Type = 'S','선택형',IF(Type = 'M','선다형',IF(Type = 'T','복수형','서술형'))) AS Type, 
            SqComment, Comment1, Comment2, Comment3, Comment4, Comment5, Comment6, Comment7, Comment8, Comment9, Comment10, 
            Comment11, Comment12, Comment13, Comment14, Comment15, Comment16, Comment17, Comment18, Comment19, Comment20, 
            Comment21, Comment22, Comment23, Comment24, Comment25, 
            Hint1, Hint2, Hint3, Hint4, Hint5, Hint6, Hint7, Hint8, Hint9, Hint10, 
            Hint11, Hint12, Hint13, Hint14, Hint15, Hint16, Hint17, Hint18, Hint19, Hint20, 
            Hint21, Hint22, Hint23, Hint24, Hint25, 
            Cnt, SqUseYn
        ";

        $from = "
            FROM
                {$this->_table['surveyQuestion']} 
        ";

        $order_by = " ";
        $where = " WHERE SqUseYn = 'Y' ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

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
    public function surveyCall($idx){
        $column = "
            *
        ";

        $from = "
            FROM
                {$this->_table['surveyProduct']} 
        ";

        $order_by = " ";
        $where = " WHERE SpIdx = ".$idx;

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     * 문항세트전체호출
     */
    public function questionSetCallAll(){
        $column = "
            *
        ";

        $from = "
            FROM
                {$this->_table['surveyQuestionSet']} AS sqs
                JOIN {$this->_table['surveyQuestionSetDetail']} AS sqsd ON sqs.SqsIdx = sqsd.SqsIdx
        ";

        $order_by = " GROUP BY sqs.SqsIdx";
        $where = " WHERE sqs.`SqsUseYn` = 'Y'";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
 * 문항세트전체호출
 */
    public function statisticsList($PredictIdx, $condition){

        $column = "
            pc.CcdName AS TakeMockPart, sc.CcdName AS TakeArea, pc2.CcdName AS SubjectName, TakeNum, AvrPoint, FivePerPoint
        ";

        $from = "
            FROM
                {$this->_table['predictGradesArea']} AS pg
                LEFT JOIN {$this->_table['sysCode']} AS sc ON pg.TakeArea = sc.Ccd
                LEFT JOIN {$this->_table['predictCode']} AS pc ON pg.TakeMockPart = pc.Ccd
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                LEFT JOIN {$this->_table['predictCode']} AS pc2 ON pp.SubjectCode = pc2.Ccd
        ";

        $order_by = " ORDER BY pg.TakeMockPart, pg.TakeArea";
        $where = " WHERE pg.PredictIdx = ".$PredictIdx;
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true) . "\n";

        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

        $data = $query->result_array();

        $selectCount = "SELECT COUNT(*) AS cnt";
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        return array($data, $count);
    }

    /**
     * 문항세트전체호출
     */
    public function statisticsListLine($PredictIdx){

        $column = "
            pc.CcdName AS TakeMockPartName, sc.CcdName AS TakeAreaName, 
            pg.TakeMockPart, pg.TakeArea, OnePerCut,
            (
            SELECT COUNT(*) FROM (
                    SELECT * FROM {$this->_table['predictGradesOrigin']} WHERE PredictIdx = '{$PredictIdx}' GROUP BY PrIdx
                ) AS A
                WHERE PredictIdx = pg.PredictIdx AND TakeArea = pg.TakeArea AND TakeMockPart = pg.TakeMockPart
            ) AS TakeOrigin,  
            ROUND(AVG(pg.OrgPoint),2) AS AvrPoint,
            (SELECT COUNT(*) FROM {$this->_table['predictRegister']} WHERE PredictIdx = pg.PredictIdx AND TakeArea = pg.TakeArea AND TakeMockPart = pg.TakeMockPart) AS TotalRegist,
            pl.PickNum, pl.TakeNum, CompetitionRateNow, CompetitionRateAgo, PassLineAgo, AvrPointAgo, StabilityAvrPoint, StabilityAvrPercent,
            StrongAvrPoint1, StrongAvrPoint2, StrongAvrPercent, ExpectAvrPoint1, ExpectAvrPoint2, ExpectAvrPercent, pl.IsUse,
            StrongAvrPoint1Ref, StrongAvrPoint2Ref, ExpectAvrPoint1Ref, ExpectAvrPoint2Ref, StabilityAvrPointRef
        ";

        $from = "
            FROM
                {$this->_table['predictGradesOrigin']} AS pg
                LEFT JOIN {$this->_table['predictGradesLine']} AS pl ON pg.TakeArea = pl.TakeArea AND pg.TakeMockPart = pl.TakeMockPart AND pg.PredictIdx = pl.PredictIdx
                LEFT JOIN {$this->_table['sysCode']} AS sc ON pg.TakeArea = sc.Ccd
                LEFT JOIN {$this->_table['predictCode']} AS pc ON pg.TakeMockPart = pc.Ccd
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                LEFT JOIN {$this->_table['predictCode']} AS pc2 ON pp.SubjectCode = pc2.Ccd
        ";

        $order_by = " GROUP BY pg.TakeMockPart, pg.TakeArea ORDER BY pg.TakeMockPart, pg.TakeArea";
        $where = " WHERE pg.PredictIdx = ".$PredictIdx;
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data = $query->result_array();

        return $data;
    }

    /**
     * 문항세트전체호출
     */
    public function statisticsListLine2($arr_condition){
        $column = "
            *
        ";
        $from = "
            FROM
                {$this->_table['predictGradesLine']}
        ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = " ";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $data = $query->result_array();
        return $data;
    }

    /**
     * 원점수입력
     * @param $MgIdx $mode = cron or web
     * @return mixed
     */
    public function scoreMakeStep1($PredictIdx, $mode, $TakeMockPart)
    {
        try {
            $this->_conn->trans_begin();

            if(empty($PredictIdx) == true){
                throw new \Exception('합격예측상품 미등록 상태입니다.');
            }

            // 데이터 입력
            if ($mode == 'web') {
                $data = [
                    'MemId' => $this->session->userdata('admin_id'),
                    'Step' => '1',
                    'PredictIdx' => $PredictIdx
                ];
            } else {
                $data = [
                    'MemId' => 'systemcron',
                    'Step' => '1',
                    'PredictIdx' => $PredictIdx
                ];
            }

            $is_insert = $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictGradesLog']);
            if ($is_insert === false) {
                throw new \Exception('로그생성실패.');
            }

            $addQuery = "";
            if(empty($TakeMockPart) == false){
                $addQuery = " AND pr.TakeMockPart = ".$TakeMockPart;
            }

            //시험코드
            $column = "
                pr.TakeMockPart, pr.TakeArea, pg.PpIdx, pp.Type
            ";

            $from = "
                FROM
                    
                    {$this->_table['predictAnswerPaper']} AS pg
	                JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
	                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
            ";

            $order_by = " GROUP BY PpIdx ORDER BY pg.PpIdx";

            $where = " WHERE pg.PredictIdx = " . $PredictIdx . $addQuery;
            //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

            $result = $query->result_array();

            foreach($result AS $key => $val){

                $PpIdx = $val['PpIdx'];

                // 응시자 개별과목 / 점수
                $column = "
                    MQ.PqIdx,
                    MP.PpIdx,
                    AnswerNum, 
                    Scoring,
                    QuestionNO, 
                    MA.MemIdx,
                    MA.Answer,
                    MA.IsWrong,
                    MA.PrIdx,
                    MA.PredictIdx,
                    MR.TakeMockPart,
                    MR.TakeArea,
                    SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) AS OrgPoint
                ";

                $from = "
                    FROM
                        {$this->_table['predictPaper']} AS MP
                        JOIN {$this->_table['predictQuestion']} AS MQ ON MQ.PpIdx = MP.PpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                        LEFT OUTER JOIN {$this->_table['predictAnswerPaper']} AS MA ON MQ.PqIdx = MA.PqIdx AND MA.PpIdx = " . $PpIdx . "
                        JOIN {$this->_table['predictRegister']} AS MR ON MR.PrIdx = MA.PrIdx AND MR.IsStatus = 'Y' 
                ";

                $order_by = " GROUP BY PrIdx  ORDER BY OrgPoint DESC";

                $where = " WHERE MP.PpIdx = " . $PpIdx;
                //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";
                //exit;

                $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

                $result = $query->result_array();

                foreach ($result AS $key => $val) {
                    if(empty($TakeMockPart) == false) {
                        $where = ['PrIdx' => $val['PrIdx'], 'PpIdx' => $val['PpIdx'], 'PredictIdx' => $val['PredictIdx'], 'TakeMockPart' => $TakeMockPart];
                    } else {
                        $where = ['PrIdx' => $val['PrIdx'], 'PpIdx' => $val['PpIdx'], 'PredictIdx' => $val['PredictIdx']];
                    }
                    try {
                        if($this->_conn->delete($this->_table['predictGradesOrigin'], $where) === false){
                            throw new \Exception('삭제에 실패했습니다.');
                        }
                    } catch (\Exception $e) {
                        return error_result($e);
                    }

                    $orgPoint = $val['OrgPoint'];
                    // 데이터 입력
                    $data = [
                        'MemIdx' => $val['MemIdx'],
                        'PrIdx' => $val['PrIdx'],
                        'PredictIdx' => $val['PredictIdx'],
                        'PpIdx' => $val['PpIdx'],
                        'OrgPoint' => $orgPoint,
                        'TakeMockPart' => $val['TakeMockPart'],
                        'TakeArea' => $val['TakeArea']
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['predictGradesOrigin']) === false) {
                        throw new \Exception('시험데이터가 없습니다.');
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
     * 조정점수반영
     * @param $PredictIdx
     * @param $mode
     * @param $TakeMockPart
     * @return array|bool
     */
    public function scoreMakeStep2($PredictIdx, $mode, $TakeMockPart)
    {
        $this->_conn->trans_begin();
        try {
            if (empty($PredictIdx) == true) {
                throw new \Exception('합격예측상품 미등록 상태입니다.');
            }

            if(empty($TakeMockPart) == false){
                $where = ['PredictIdx' => $PredictIdx, 'TakeMockPart' => $TakeMockPart];
            } else {
                $where = ['PredictIdx' => $PredictIdx];
            }

            if ($this->_conn->delete($this->_table['predictGrades'], $where) === false) {
                throw new \Exception('성적 삭제에 실패했습니다.');
            }

            if ($mode == 'web') {
                $data = [
                    'MemId' => $this->session->userdata('admin_id'),
                    'Step' => '2',
                    'PredictIdx' => $PredictIdx
                ];
            } else {
                $data = [
                    'MemId' => 'systemcron',
                    'Step' => '2',
                    'PredictIdx' => $PredictIdx
                ];
            }

            $is_insert = $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictGradesLog']);
            if ($is_insert === false) {
                throw new \Exception('로그생성실패.');
            }

            //표준편차용 직렬,지역,과목별 평균점수
            $avg_standard_list = $this->listSubjectAvgPointForStandard($PredictIdx, $TakeMockPart);

            //응시자용 직렬,지역,과목별 평균점수
            $avg_user_list = $this->listSubjectAvgPointForUser($PredictIdx, $TakeMockPart);

            //유저점수
            $user_point_list = $this->listUserForSubjectPoint($PredictIdx, $TakeMockPart);

            //과목별 표준편차
            $arr_standard_data = $this->setStandardDeviation($user_point_list, $avg_standard_list);

            //유저별 조정점수 및 저장 데이터 셋팅
            $inputData = $this->setAdjustPointForData($user_point_list, $avg_user_list, $arr_standard_data);

            //저장
            if ($this->_conn->insert_batch($this->_table['predictGrades'], $inputData) === false) {
                throw new \Exception('시험데이터가 없습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
    public function _back_scoreMakeStep2($PredictIdx, $mode, $TakeMockPart)
    {
        try {
            $this->_conn->trans_begin();

            if(empty($PredictIdx) == true){
                throw new \Exception('합격예측상품 미등록 상태입니다.');
            }

            $addQuery = "";
            if(empty($TakeMockPart) == false){
                $addQuery = " AND pg.TakeMockPart = " . $TakeMockPart;
                $this->_conn->where(['PredictIdx' => $PredictIdx, 'TakeMockPart' => $TakeMockPart]);

                if ($this->_conn->delete($this->_table['predictGrades']) === false) {
                    throw new \Exception('성적 삭제에 실패했습니다.');
                }
            } else {
                $this->_conn->where(['PredictIdx' => $PredictIdx]);

                if ($this->_conn->delete($this->_table['predictGrades']) === false) {
                    throw new \Exception('성적 삭제에 실패했습니다.');
                }
            }
            
            // 데이터 입력
            if ($mode == 'web') {
                $data = [
                    'MemId' => $this->session->userdata('admin_id'),
                    'Step' => '2',
                    'PredictIdx' => $PredictIdx
                ];
            } else {
                $data = [
                    'MemId' => 'systemcron',
                    'Step' => '2',
                    'PredictIdx' => $PredictIdx
                ];
            }

            $is_insert = $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictGradesLog']);
            if ($is_insert === false) {
                throw new \Exception('로그생성실패.');
            }

            //시험코드
            $column = "
                pr.TakeMockPart, pr.TakeArea, pg.PpIdx, pp.Type
            ";

            $from = "
                FROM
                    
                    {$this->_table['predictGradesOrigin']} AS pg
	                JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
	                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
            ";

            $order_by = " GROUP BY TakeMockPart, TaKeArea, PpIdx
                          ORDER BY TakeMockPart, TakeArea, pg.PpIdx";

            $where = " WHERE pg.PredictIdx = " . $PredictIdx . $addQuery;
            //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

            $result = $query->result_array();

            foreach($result AS $key => $val){

                $PpIdx = $val['PpIdx'];
                $TakeMockPart = $val['TakeMockPart'];
                $TakeArea = $val['TakeArea'];

                $arrType[$PpIdx] = $val['Type'];

                //원점수 평균총합 (응시자점수 - 원점수평균)제곱(총)
                $column = "
                    pg.PpIdx, ROUND(SUM(OrgPoint),2) AS TOT
                ";

                $from = "
                    FROM
                        {$this->_table['predictGradesOrigin']} AS pg
                        LEFT JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                        LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                ";

                $order_by = " ";

                $where = " WHERE pg.PredictIdx = " . $PredictIdx . " AND pg.PpIdx = " . $PpIdx . " AND pg.TakeMockPart = " . $TakeMockPart . " AND pg.TakeArea = " . $TakeArea;

                $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
                $tresult = $query->row_array();

                $arrMP[$PpIdx]['SUMAVG'] = $tresult['TOT'];


                // 원점수평균/PpIdx/인원
                $column = "
                    pg.PpIdx, 
                    ROUND(SUM(OrgPoint),2) /
                    (
                        SELECT COUNT(MemIdx) FROM (
                            SELECT 
                                MemIdx 
                            FROM 
                                {$this->_table['predictGradesOrigin']}
                            WHERE 
                                PredictIdx = " . $PredictIdx . " AND PpIdx = " . $PpIdx . " AND TakeMockPart = " . $TakeMockPart . " AND TakeArea = " . $TakeArea . " 
                            GROUP BY PrIdx, PpIdx
                        ) AS I
                    ) AS AVG
                    , 
                    (
                        SELECT COUNT(MemIdx) FROM (
                            SELECT 
                                MemIdx 
                            FROM 
                                {$this->_table['predictGradesOrigin']}
                            WHERE 
                                PredictIdx = " . $PredictIdx . " AND PpIdx = " . $PpIdx . " AND TakeMockPart = " . $TakeMockPart . " AND TakeArea = " . $TakeArea . " 
                            GROUP BY PrIdx, PpIdx
                        ) AS I
                    ) AS CNT
                ";

                $from = "
                    FROM
                        {$this->_table['predictGradesOrigin']} AS pg
                        LEFT JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                        LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                ";

                $order_by = " ";

                $where = " WHERE pg.PredictIdx = " . $PredictIdx . " AND pg.PpIdx = " . $PpIdx . " AND pg.TakeMockPart = " . $TakeMockPart . " AND pg.TakeArea = " . $TakeArea . "";

                $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

                $wresult = $query->row_array();

                $avg = $wresult['AVG'];
                $cnt = $wresult['CNT'];
                $arrMP[$PpIdx]['AVG'] = $avg;
                $arrMP[$PpIdx]['CNT'] = $cnt;

                // 응시자 개별과목 / 점수
                $column = "
                    pg.PredictIdx, pg.PrIdx, pg.MemIdx, pg.OrgPoint, pg.PpIdx, 
                    ROUND(OrgPoint,2) AS Res,
                    ROUND(OrgPoint,2) /
                    (
                       SELECT COUNT(MemIdx) FROM (
                           SELECT 
                               MemIdx 
                           FROM 
                               {$this->_table['predictGradesOrigin']}
                           WHERE 
                               PredictIdx = " . $PredictIdx . " AND PpIdx = " . $PpIdx . " AND TakeMockPart = " . $TakeMockPart . " AND TakeArea = " . $TakeArea . " 
                           GROUP BY PrIdx, PpIdx
                       ) AS I
                    ) AS AVG,
                    (
                            SELECT 
                               SUM(OrgPoint) /
                               (
                                       SELECT COUNT(MemIdx) FROM (
                                           SELECT 
                                               MemIdx 
                                           FROM 
                                               {$this->_table['predictGradesOrigin']}
                                           WHERE 
                                               PredictIdx = " . $PredictIdx . " AND PpIdx = " . $PpIdx . " AND TakeMockPart = " . $TakeMockPart . " AND TakeArea = " . $TakeArea . " 
                                           GROUP BY PrIdx, PpIdx
                                       ) AS I
                                    ) AS won
                           FROM 
                                  {$this->_table['predictGradesOrigin']} AS pg
                                  LEFT JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                                  LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                           WHERE 
                               pg.PredictIdx = " . $PredictIdx . " AND pg.PpIdx = " . $PpIdx . " AND pg.TakeMockPart = " . $TakeMockPart . " AND pg.TakeArea = " . $TakeArea . "
                    ) AS won,
                    RegistAvgPoint,
                    RegistStandard
                ";

                $from = "
                    FROM
                        {$this->_table['predictGradesOrigin']} AS pg
                        LEFT JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                        LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                ";

                $order_by = " GROUP BY pg.MemIdx ORDER BY OrgPoint DESC";

                $where = " WHERE pg.PredictIdx = " . $PredictIdx . " AND pg.PpIdx = " . $PpIdx . " AND pg.TakeMockPart = " . $TakeMockPart . " AND pg.TakeArea = " . $TakeArea . "";
                //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";


                $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

                $result = $query->result_array();

                // 랭킹 산정시 동일점수때문에 임시저장
                $tempJum = '';
                $Rank = 1;
                $minusRank = 1;
                foreach ($result AS $key => $val) {
                    $orgPoint = $val['OrgPoint'];
                    //조정점수 반영로직
                    if ($arrType[$PpIdx] == 'S' && $TakeMockPart != 300) {
                        /*
                        * 선택과목은 아래와 같은 계산법을 따른다.
                        *
                        * 원점수평균 = 선택과목점수총합 / 응시자수
                        * 원점수표준편차 = 루트( (응시자점수 - 원점수평균)제곱(응시자전체) / (응시자수 - 1) )
                        * 조정점수 = ((응시자점수 - 선택과목의평균점수) / 원점수표준편차) * 10 + 50
                        *
                        */

                        //가산점반영점수
                        $g_num = $val['Res'];

                        // 원점수평균 = 선택과목 점수총합 / 응시자수
                        $wonAVG = $val['RegistAvgPoint'];
                        if (empty($wonAVG) === true) {
                            throw new \Exception('원점수 평균이 없습니다..');
                        }
                        //$wonAVG = $val['won'];

                        /**
                        $sumAVG = $arrMP[$PpIdx]['SUMAVG'];

                        // 응시자수
                        $pcnt = $arrMP[$PpIdx]['CNT'];

                        //표준편차
                        if($sumAVG != 0 && $pcnt != 1){
                        $tempRes = round(sqrt($sumAVG / ($pcnt - 1)), 2);
                        } else {
                        $tempRes = 0;
                        }**/

                        $tempRes = $val['RegistStandard'];
                        if (empty($tempRes) === true) {
                            throw new \Exception('표준 편차가 없습니다.');
                        }

                        //조정점수
                        if($g_num - $wonAVG != 0 && $tempRes != 0){
                            $AdjustPoint = round((($g_num - $wonAVG) / $tempRes) * 10 + 50, 2);
                        } else {
                            $AdjustPoint = 50;
                        }
                    } else {
                        // 원점수평균 = 선택과목 점수총합 / 응시자수
                        $sumAVG = $arrMP[$PpIdx]['SUMAVG'];

                        // 응시자수
                        $pcnt = $arrMP[$PpIdx]['CNT'];

                        //표준편차
                        if($sumAVG != 0 && $pcnt != 1){
                            $tempRes = round(sqrt($sumAVG / ($pcnt - 1)), 2);
                        } else {
                            $tempRes = 0;
                        }

                        //필수과목일경우 가산점만 반영한다.
                        $AdjustPoint = round($val['Res'], 2);
                    }

                    if ($tempJum == $orgPoint) {
                        $rRank = $Rank - $minusRank;
                        $minusRank++;
                    } else {
                        $rRank = $Rank;
                        $minusRank = 1;
                    }

                    if($AdjustPoint > 100){
                        $AdjustPoint = 100;
                    }

                    $OrgPoint = $val['OrgPoint'];
                    if($OrgPoint > 100){
                        $OrgPoint = 100;
                    }

                    if($OrgPoint == 0){
                        $AdjustPoint = 0;
                    }

                    // 데이터 입력
                    $data = [
                        'MemIdx' => $val['MemIdx'],
                        'PrIdx' => $val['PrIdx'],
                        'PredictIdx' => $val['PredictIdx'],
                        'PpIdx' => $val['PpIdx'],
                        'OrgPoint' => $OrgPoint,
                        'TakeMockPart' => $TakeMockPart,
                        'TakeArea' => $TakeArea,
                        'AdjustPoint' => $AdjustPoint,
                        'Rank' => $rRank,
                        'StandardDeviation' => $tempRes
                    ];

                    $tempJum = $val['OrgPoint'];
                    $Rank++;

                    if ($this->_conn->set($data)->insert($this->_table['predictGrades']) === false) {
                        throw new \Exception('시험데이터가 없습니다.');
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
     * 시험통계처리
     * @param $PredictIdx
     * @param $mode
     * @param $TakeMockPart
     * @return array|bool
     */
    public function scoreProcess($PredictIdx, $mode, $TakeMockPart)
    {
        $this->_conn->trans_begin();
        try {
            if(empty($PredictIdx) == true){
                throw new \Exception('합격예측상품 미등록 상태입니다.');
            }

            if(empty($TakeMockPart) == false){
                $where = ['PredictIdx' => $PredictIdx, 'TakeMockPart' => $TakeMockPart];
            } else {
                $where = ['PredictIdx' => $PredictIdx];
            }

            if ($this->_conn->delete($this->_table['predictGradesArea'], $where) === false) {
                throw new \Exception('성적 삭제에 실패했습니다.');
            }

            // 데이터 입력
            if ($mode == 'web') {
                $data = [
                    'MemId' => $this->session->userdata('admin_id'),
                    'Step' => '3',
                    'PredictIdx' => $PredictIdx
                ];
            } else {
                $data = [
                    'MemId' => 'systemcron',
                    'Step' => '3',
                    'PredictIdx' => $PredictIdx
                ];
            }

            $is_insert = $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictGradesLog']);
            if ($is_insert === false) {
                throw new \Exception('로그생성실패.');
            }

            // 1. 직렬,지역,과목별 평균점수 / 응시인원 / 표준편차
            $listSubject = $this->listSubjectAvgPoint($PredictIdx, $TakeMockPart);

            // 2. 직렬,지역,과목별 상위 5% 평균 점수
            $topFiveAvgData = $this->subjectTopFiveAvg($PredictIdx, $TakeMockPart, '0.05');

            // 저장 데이터 셋팅
            $inputData = [];
            foreach ($listSubject as $key => $val) {
                $tmp_mapping_data = $val['TakeMockPart'].'_'.$val['TakeArea'].'_'.$val['PpIdx'];

                if (empty($topFiveAvgData[$tmp_mapping_data]) === false ) {
                    $inputData[$key]['PredictIdx'] = $PredictIdx;
                    $inputData[$key]['TakeMockPart'] = $val['TakeMockPart'];
                    $inputData[$key]['TakeArea'] = $val['TakeArea'];
                    $inputData[$key]['TakeNum'] = $val['cnt'];
                    $inputData[$key]['PpIdx'] = $val['PpIdx'];
                    $inputData[$key]['AvrPoint'] = $val['AvgAdjustPoint'];
                    $inputData[$key]['FivePerPoint'] = $val['AvgAdjustPoint'];
                    $inputData[$key]['StandardDeviation'] = $val['StandardDeviation'];
                }
            }

            // 3. 저장
            if ($this->_conn->insert_batch($this->_table['predictGradesArea'], $inputData) === false) {
                throw new \Exception('시험통계처리 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
    public function _back_scoreProcess($PredictIdx, $mode, $TakeMockPart)
    {
        try {
            $this->_conn->trans_begin();

            if(empty($PredictIdx) == true){
                throw new \Exception('합격예측상품 미등록 상태입니다.');
            }

            $this->_conn->where(['PredictIdx' => $PredictIdx]);

            if ($this->_conn->delete($this->_table['predictGradesArea']) === false) {
                throw new \Exception('성적 삭제에 실패했습니다.');
            }

            // 데이터 입력
            if ($mode == 'web') {
                $data = [
                    'MemId' => $this->session->userdata('admin_id'),
                    'Step' => '3',
                    'PredictIdx' => $PredictIdx
                ];
            } else {
                $data = [
                    'MemId' => 'systemcron',
                    'Step' => '3',
                    'PredictIdx' => $PredictIdx
                ];
            }

            $is_insert = $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictGradesLog']);
            if ($is_insert === false) {
                throw new \Exception('로그생성실패.');
            }

            $addQuery = "";
            if(empty($TakeMockPart) == false){
                $addQuery = " AND TakeMockPart = " . $TakeMockPart;
            }

            //시험코드
            $column = "
                pr.TakeMockPart, pr.TakeArea, pg.PpIdx, pp.Type
            ";

            $from = "
                FROM
                    
                    {$this->_table['predictGradesOrigin']} AS pg
	                JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
	                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
            ";

            $order_by = " GROUP BY TakeMockPart, TaKeArea, PpIdx
                          ORDER BY TakeMockPart, TakeArea, pg.PpIdx";

            $where = " WHERE pg.PredictIdx = " . $PredictIdx . $addQuery;

            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

            $result = $query->result_array();

            foreach($result AS $key => $val) {

                $PpIdx = $val['PpIdx'];
                $TakeMockPart = $val['TakeMockPart'];
                $TakeArea = $val['TakeArea'];

                // 응시자 개별과목 / 점수
                $column = "
                    pg.PredictIdx, pg.PrIdx, pg.MemIdx, pg.OrgPoint, ROUND(OrgPoint,2) AS gasan, 
					pg.AdjustPoint, pg.PpIdx, pg.Rank, pg.StandardDeviation
                ";

                $from = "
                    FROM
                        {$this->_table['predictGrades']} AS pg
                        LEFT JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                        LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                ";

                $order_by = " GROUP BY pg.MemIdx ORDER BY OrgPoint DESC";

                $where = " WHERE pg.PredictIdx = " . $PredictIdx . " AND pg.PpIdx = " . $PpIdx . " AND pg.TakeMockPart = " . $TakeMockPart . " AND pg.TakeArea = " . $TakeArea . "";
                //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

                $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

                $result = $query->result_array();

                // 랭킹 산정시 동일점수때문에 임시저장
                $Rank = 1;
                $count = 0;
                $sum = 0;
                $arrAdPoint = array();
                foreach ($result AS $key => $val) {
                    $point = $val['AdjustPoint'];
                    $arrAdPoint[$Rank] = $point;
                    $StandardDeviation = $val['StandardDeviation'];
                    $sum = $sum + $point;
                    $Rank++;
                    $count++;
                }

                //상위 5퍼의 점수
                $FivePer = round($count * 0.05,1);
                if($FivePer < 1){
                    $FivePer = 1;
                } else {
                    $FivePer = floor($FivePer);
                }

                $FivePerPoint = $arrAdPoint[$FivePer];

                if($sum != 0 && $count != 0){
                    $avr = round($sum / $count, 2);
                } else {
                    $avr = 0;
                }

                // 데이터 입력
                $data = [
                    'TakeMockPart' => $TakeMockPart,
                    'TakeArea' => $TakeArea,
                    'TakeNum' => $count,
                    'PredictIdx' => $PredictIdx,
                    'PpIdx' => $PpIdx,
                    'AvrPoint' => $avr,
                    'FivePerPoint' => $FivePerPoint,
                    'StandardDeviation' => $StandardDeviation
                ];

                if ($this->_conn->set($data)->insert($this->_table['predictGradesArea']) === false) {
                    throw new \Exception('시험데이터가 없습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /*
     *  기대/유력/안정 점수계산
     */
    public function calculate($PredictIdx, $TakeMockPart, $TakeArea, $P1, $P2, $P3){
        $rtnCal = null;

        // 응시자 개별과목 / 점수
        $column = "
                    ROUND(SUM(pg.AdjustPoint),2) AS POINT
                ";

        $from = "
                    FROM
                        {$this->_table['predictGrades']} AS pg
                        LEFT JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                        LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                ";

        $order_by = " GROUP BY pg.MemIdx ORDER BY SUM(pg.AdjustPoint) DESC";

        $where = " WHERE pg.PredictIdx = " . $PredictIdx . " AND pg.TakeMockPart = " . $TakeMockPart . " AND pg.TakeArea = " . $TakeArea . "";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);

        $result = $query->result_array();

        if(empty($result) === false){
            // 랭킹 산정시 동일점수때문에 임시저장
            $Rank = 1;
            $count = 0;
            $sum = 0;
            $arrAdPoint = array();
            foreach ($result AS $key => $val) {
                $point = $val['POINT'];
                $arrAdPoint[$Rank] = $point;
                $sum = $sum + $point;
                $Rank++;
                $count++;
            }

            $Per1 = round($count * 0.01 * $P1, 1);
            if($Per1 < 1){
                $Per1 = 1;
            } else {
                $Per1 = floor($Per1);
            }

            $Per2 = round($count * 0.01 * $P2, 1);
            if($Per2 < 1){
                $Per2 = 1;
            } else {
                $Per2 = floor($Per2);
            }

            $Per3 = round($count * 0.01 * $P3, 1);
            if($Per3 < 1){
                $Per3 = 1;
            } else {
                $Per3 = floor($Per3);
            }

            $PerPoint1 = $arrAdPoint[$Per1];
            $PerPoint2 = $arrAdPoint[$Per2];
            $PerPoint3 = $arrAdPoint[$Per3];
            $PerPoint3M = $PerPoint3 - 0.01;

            if($PerPoint3 == $PerPoint2){
                $ResPerPoint2 = $PerPoint2 - 0.02;
            } else {
                $ResPerPoint2 = $PerPoint2;
            }

            if($PerPoint2 == $PerPoint1){
                if($PerPoint3 == $PerPoint1){
                    $ResPerPoint1 = $PerPoint1 - 0.04;
                } else {
                    $ResPerPoint1 = $PerPoint1 - 0.02;
                }
            } else {
                $ResPerPoint1 = $PerPoint1;
            }
            $PerPoint2M = $ResPerPoint2 - 0.01;

            //           고             저              고               저
            $rtnCal = $PerPoint2M."/".$ResPerPoint1."/".$PerPoint3M."/".$ResPerPoint2."/".$PerPoint3;
        }
        return $rtnCal;
    }

    /**
     * 예상합격선저장
     */
    public function storeLine()
    {
        try {
            $this->_conn->trans_begin();
            $PredictIdx = $this->input->post('PredictIdx');

            $this->_conn->where(['PredictIdx' => $PredictIdx]);

            if ($this->_conn->delete($this->_table['predictGradesLine']) === false) {
                throw new \Exception('성적 삭제에 실패했습니다.');
            }

            $arrTakeMockPart = $this->input->post('TakeMockPart[]');
            $arrTakeArea = $this->input->post('TakeArea[]');
            $arrPickNum = $this->input->post('PickNum[]');
            $arrTakeNum = $this->input->post('TakeNum[]');
            $arrCompetitionRateNow = $this->input->post('CompetitionRateNow[]');
            $arrCompetitionRateAgo = $this->input->post('CompetitionRateAgo[]');
            $arrPassLineAgo = $this->input->post('PassLineAgo[]');
            $arrAvrPointAgo = $this->input->post('AvrPointAgo[]');
            $arrOnePerCut = $this->input->post('OnePerCut[]');
            $arrStabilityAvrPoint = $this->input->post('StabilityAvrPoint[]');
            $arrStabilityAvrPointRef = $this->input->post('StabilityAvrPointRef[]');
            $arrStabilityAvrPercent = $this->input->post('StabilityAvrPercent[]');
            $arrStrongAvrPoint1 = $this->input->post('StrongAvrPoint1[]');
            $arrStrongAvrPoint1Ref = $this->input->post('StrongAvrPoint1Ref[]');
            $arrStrongAvrPoint2 = $this->input->post('StrongAvrPoint2[]');
            $arrStrongAvrPoint2Ref = $this->input->post('StrongAvrPoint2Ref[]');
            $arrStrongAvrPercent = $this->input->post('StrongAvrPercent[]');
            $arrExpectAvrPoint1 = $this->input->post('ExpectAvrPoint1[]');
            $arrExpectAvrPoint1Ref = $this->input->post('ExpectAvrPoint1Ref[]');
            $arrExpectAvrPoint2 = $this->input->post('ExpectAvrPoint2[]');
            $arrExpectAvrPoint2Ref = $this->input->post('ExpectAvrPoint2Ref[]');
            $arrExpectAvrPercent     = $this->input->post('ExpectAvrPercent[]');
            $arrIsUse     = $this->input->post('IsUse[]');

            // 데이터 저장
            for($i=0; $i < COUNT($arrTakeMockPart); $i++){
                $data = array(
                    'PredictIdx' => $PredictIdx,
                    'TakeMockPart' => $arrTakeMockPart[$i],
                    'TakeArea' => $arrTakeArea[$i],
                    'PickNum' => $arrPickNum[$i],
                    'TakeNum' => $arrTakeNum[$i],
                    'CompetitionRateNow' => $arrCompetitionRateNow[$i],
                    'CompetitionRateAgo' => $arrCompetitionRateAgo[$i],
                    'PassLineAgo' => $arrPassLineAgo[$i],
                    'AvrPointAgo' => $arrAvrPointAgo[$i],
                    'OnePerCut' => $arrOnePerCut[$i],
                    'StabilityAvrPoint' => (array_key_exists($i, $arrStabilityAvrPoint) ? (float) $arrStabilityAvrPoint[$i] : null ),
                    'StabilityAvrPointRef' => (array_key_exists($i, $arrStabilityAvrPointRef) ? (float) $arrStabilityAvrPointRef[$i] : null ),
                    'StabilityAvrPercent' => (array_key_exists($i, $arrStabilityAvrPercent) ? (float) $arrStabilityAvrPercent[$i] : null ),
                    'StrongAvrPoint1' => (array_key_exists($i, $arrStrongAvrPoint1) ? (float) $arrStrongAvrPoint1[$i] : null ),
                    'StrongAvrPoint1Ref' => (array_key_exists($i, $arrStrongAvrPoint1Ref) ? (float) $arrStrongAvrPoint1Ref[$i] : null ),
                    'StrongAvrPoint2' => (array_key_exists($i, $arrStrongAvrPoint2) ? (float) $arrStrongAvrPoint2[$i] : null ),
                    'StrongAvrPoint2Ref' => (array_key_exists($i, $arrStrongAvrPoint2Ref) ? (float) $arrStrongAvrPoint2Ref[$i] : null ),
                    'StrongAvrPercent' => (array_key_exists($i, $arrStrongAvrPercent) ? (float) $arrStrongAvrPercent[$i] : null ),
                    'ExpectAvrPoint1' => (array_key_exists($i, $arrExpectAvrPoint1) ? (float) $arrExpectAvrPoint1[$i] : null ),
                    'ExpectAvrPoint1Ref' => (array_key_exists($i, $arrExpectAvrPoint1Ref) ? (float) $arrExpectAvrPoint1Ref[$i] : null ),
                    'ExpectAvrPoint2' => (array_key_exists($i, $arrExpectAvrPoint2) ? (float) $arrExpectAvrPoint2[$i] : null ),
                    'ExpectAvrPoint2Ref' => (array_key_exists($i, $arrExpectAvrPoint2Ref) ? (float) $arrExpectAvrPoint2Ref[$i] : null ),
                    'ExpectAvrPercent' => (array_key_exists($i, $arrExpectAvrPercent) ? (float) $arrExpectAvrPercent[$i] : null ),
                    'IsUse' => $arrIsUse[$i]
                );

                $this->_conn->insert($this->_table['predictGradesLine'], $data);
                if(!$this->_conn->affected_rows()) {
                    throw new Exception('저장에 실패했습니다.');
                }
            }

            $nowIdx = $this->_conn->insert_id();
            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowIdx]];
    }

    /**
     * todo 사용하지 않음(권순현대리 개발건) : 2019-08-13 조규호
     * 합격예측카운트관리 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findPredictCnt($arr_condition)
    {
        $column = 'PcIdx, PredictIdx, CntType, AddCnt, ResultCnt';

        $from = "
            FROM {$this->_table['predictCnt']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * todo 사용하지 않음(권순현대리 개발건) : 2019-08-13 조규호
     * 합격예측카운트관리 등록
     * @param $input
     * @return array|bool
     */
    public function addPredictCnt($input)
    {
        $this->_conn->trans_begin();
        try {
            $inputData['PredictIdx'] = element('predict_idx', $input);;
            $inputData['CntType'] = element('type', $input);
            $inputData['AddCnt'] = element('add_count', $input);

            // 데이터 등록
            if ($this->_conn->set($inputData)->insert($this->_table['predictCnt']) === false) {
                throw new \Exception('메모 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * todo 사용하지 않음(권순현대리 개발건) : 2019-08-13 조규호
     * 합격예측카운트관리 수정
     * @param $input
     * @return array|bool
     */
    public function modifyPredictCnt($input, $idx)
    {
        $this->_conn->trans_begin();
        try {
            $inputData['PredictIdx'] = element('predict_idx', $input);
            $inputData['CntType'] = element('type', $input);
            $inputData['AddCnt'] = element('add_count', $input);

            $this->_conn->set($inputData)->where('PcIdx', $idx);
            if ($this->_conn->update($this->_table['predictCnt']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 자막관리 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSubTitles($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                a.PstIdx, a.Title, a.ContentType, a.Content, a.ExcelFileFullPath, a.ExcelFileRealName, a.AttachFileFullPath, a.AttachFileRealName, a.IsUse, a.RegDatm, a.RegAdminIdx, a.RegIp,
                a.UpdDatm, a.UpdAdminIdx, b.wAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['predictSubTitles']} as a
            LEFT JOIN {$this->_table['admin']} AS b ON a.RegAdminIdx = b.wAdminIdx and b.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 자막관리 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findSubTitlesForModify($arr_condition)
    {
        $column = '
                a.PstIdx, a.Title, a.ContentType, a.Content, a.ExcelFileFullPath, a.ExcelFileRealName, a.AttachFileFullPath, a.AttachFileRealName, a.IsUse, a.RegDatm, a.RegAdminIdx, a.RegIp,
                a.UpdDatm, a.UpdAdminIdx, b.wAdminName
            ';

        $from = "
            FROM {$this->_table['predictSubTitles']} as a
            LEFT JOIN {$this->_table['admin']} AS b ON a.RegAdminIdx = b.wAdminIdx and b.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 자막데이터 등록
     * @param $input
     * @return bool
     */
    public function addSubTitles($input)
    {
        $this->_conn->trans_begin();
        try {
            $file_path = '';
            $file_name = '';

            $this->load->library('upload');
            $this->load->library('excel');
            $content_type = element('content_type', $input);

            $upload_sub_dir = config_item('upload_prefix_dir') . '/predict/subTitle/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames('img'), $upload_sub_dir);
            if (empty($uploaded[0]) === false) {
                $file_path = $this->upload->_upload_url . $upload_sub_dir . '/' . $uploaded[0]['file_name'];
                $file_name = $uploaded[0]['client_name'];
            }

            // text
            if ($content_type == 1) {
                $get_content_data = element('content', $input);
                $content_data = implode('|', $get_content_data);
                $excel_file_path = '';
                $excel_file_name = '';
            } else {    // excel
                $excel_data = $this->setExcelData();
                $excel_file_path = $excel_data['ExcelFileFullPath'];
                $excel_file_name = $excel_data['ExcelFileRealName'];
                $content_data = $excel_data['ExcelData'];
            }

            $input_data = [
                'Title' => element('title', $input),
                'ContentType' => element('content_type', $input),
                'Content' => $content_data,
                'ExcelFileFullPath' => $excel_file_path,
                'ExcelFileRealName' => $excel_file_name,
                'AttachFileFullPath' => $file_path,
                'AttachFileRealName' => $file_name,
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($input_data)->insert($this->_table['predictSubTitles']) === false) {
                return false;
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
        }

        return true;
    }

    /**
     * 자막데이터 수정
     * @param $input
     * @return array|bool
     */
    public function modifySubTitles($input)
    {
        $this->_conn->trans_begin();
        try {
            $file_path = '';
            $file_name = '';

            $this->load->library('upload');
            $this->load->library('excel');
            $content_type = element('content_type', $input);

            $upload_sub_dir = config_item('upload_prefix_dir') . '/predict/subTitle/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames('img'), $upload_sub_dir);
            if (empty($uploaded[0]) === false) {
                $file_path = $this->upload->_upload_url . $upload_sub_dir . '/' . $uploaded[0]['file_name'];
                $file_name = $uploaded[0]['client_name'];
            }

            // text
            if ($content_type == 1) {
                $content_data = '';
                $temp_content = element('content', $input);
                foreach ($temp_content as $key => $val) {
                    if (empty($val) === false) {
                        $content_data .= $val.'|';
                    }
                }
                $content_data = substr($content_data, 0, -1);
                $excel_file_path = '';
                $excel_file_name = '';
            } else {    // excel
                $excel_data = $this->setExcelData();
                $excel_file_path = $excel_data['ExcelFileFullPath'];
                $excel_file_name = $excel_data['ExcelFileRealName'];
                $content_data = $excel_data['ExcelData'];
            }

            $input_data = [
                'Title' => element('title', $input),
                'ContentType' => element('content_type', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if (empty($content_data) === false) {
                $input_data = array_merge($input_data, [
                    'Content' => $content_data
                ]);
            }

            if (empty($excel_file_path) === false) {
                $input_data = array_merge($input_data, [
                    'ExcelFileFullPath' => $excel_file_path
                ]);
            }

            if (empty($excel_file_name) === false) {
                $input_data = array_merge($input_data, [
                    'ExcelFileRealName' => $excel_file_name
                ]);
            }

            if (empty($file_path) === false) {
                $input_data = array_merge($input_data, [
                    'AttachFileFullPath' => $file_path
                ]);
            }

            if (empty($file_name) === false) {
                $input_data = array_merge($input_data, [
                    'AttachFileRealName' => $file_name
                ]);
            }

            $this->_conn->set($input_data)->where('PstIdx', element('idx', $input));
            if ($this->_conn->update($this->_table['predictSubTitles']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 자막데이터 테이블 형태 수정
     * @param $input
     * @return bool
     */
    public function modifySubtitlesForDetail($input)
    {
        $this->_conn->trans_begin();
        try {
            $set_temp_data = '';

            $cnt = element('params_cnt', $input);
            for ($i = 0; $i < $cnt; $i++) {
                $arr_temp_data = element('params'.$i, $input);
                if (empty($arr_temp_data) === false) {
                    $set_temp_data .= implode('^', $arr_temp_data) . '|';
                }
            }
            $set_temp_data = substr($set_temp_data, 0, -1);

            $this->_conn->set(['content' => $set_temp_data])->where_in('PstIdx',element('idx', $input));
            if($this->_conn->update($this->_table['predictSubTitles'])=== false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
        }

        return true;
    }

    /**
     * 엑셀데이터 셋팅
     * @return array|null
     */
    private function setExcelData()
    {
        try {
            $upload_sub_dir = config_item('upload_prefix_dir') . '/predict/subTitle/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['content_excel'], $this->_getAttachImgNames('excel'), $upload_sub_dir);

            if (empty($uploaded) === true || count($uploaded) <= 0) {
                throw new \Exception('업로드할 파일이 없습니다.');
            }

            // 엑셀 데이터 셋팅
            $set_data = '';
            $excel_data = $this->_ExcelReader($uploaded[0]['full_path']);

            if (empty($excel_data) === false) {
                foreach ($excel_data as $keys => $vals) {
                    foreach ($vals as $key => $val) {
                        if (empty($val) === false) {
                            $set_data .= $val . '^';
                        }
                    }
                    $set_data = substr($set_data, 0, -1);
                    $set_data = $set_data.'|';
                }
                $set_data = substr($set_data, 0, -1);
            }

        } catch (\Exception $e) {
            return null;
        }

        $return = [
            'ExcelFileFullPath' => $this->upload->_upload_url . $upload_sub_dir . '/' . $uploaded[0]['file_name'],
            'ExcelFileRealName' => $uploaded[0]['client_name'],
            'ExcelData' => $set_data
        ];

        return $return;
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
        $excel_data = $this->excel->readExcel($file_path);
        return $excel_data;
    }

    /**
     * 파일명 배열 생성
     * @param $type
     * @return array
     */
    private function _getAttachImgNames($type)
    {
        $attach_file_names[] = 'excel_subtitles_' . $type . '_' . date('YmdHis');
        return $attach_file_names;
    }


    /**
     * 최종합격예측서비스 등록 리스트
     */
    public function listPredictFinal($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = 'A.*
                            ,B.pointJson
                            ,C.ProdName
                            ,D.MemId,D.MemName,fn_dec(D.PhoneEnc) as phone
                            ,E.CcdName as TakeMockPartName
                            ,F.CcdName as TakeAreaCcdName
                            ,G.TakeNo
                            ,REPLACE(A.EtcValues,\',\',\'<BR>\') AS SetEtcValues
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        lms_predict_final A
                        join
                        (
                            select
                            PfIdx
                            #,group_concat(CONCAT(\'{subjectName:"\',bb.CcdName,\'",point:"\',aa.Point,\'"}\')order by PfpIdx) as pointJson
                            #,GROUP_CONCAT(CONCAT(\'-\',bb.CcdName,\':\',aa.Point) order by PfpIdx separator \'<BR>\') as pointJson
                            ,GROUP_CONCAT(CONCAT(\'-\',bb.CcdName,\':\',aa.Point,IF(ISNULL(aa.Level),\'\',CONCAT(\'(\',aa.Level,\')\'))) order by PfpIdx separator \'<BR>\') as pointJson
                            from
                                lms_predict_final_point aa
                                join lms_predict_code bb on aa.Subject = bb.Ccd
                            where aa.IsStatus=\'Y\'
                            group by PfIdx
                        ) B on A.pfIdx = B.PfIdx
                        join lms_product_predict C on A.PredictIdx = C.PredictIdx
                        join lms_member D on A.MemIdx = D.MemIdx
                        join lms_predict_code E on A.TakeMockPart = E.Ccd
                        left join lms_sys_code F on A.TakeAreaCcd = F.Ccd
                        left outer join lms_cert_apply G on A.MemIdx = G.MemIdx And A.CertIdx = G.CertIdx And G.ApprovalStatus=\'Y\' And G.IsStatus=\'Y\'  
                     where A.IsStatus=\'Y\'
        ';
        // 사이트 권한 추가
        $arr_condition['IN']['C.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function listPredictFinalExcel($arr_condition = [], $order_by = [], $arr_condition_add = null)
    {

            $column = '
                            C.ProdName
                            ,D.MemId,D.MemName,fn_dec(D.PhoneEnc) as phone
                            ,G.TakeNo
                            ,E.CcdName as TakeMockPartName
                            ,F.CcdName as TakeAreaCcdName
                            ,B.pointJson
                            ,A.StrengthPoint,A.AddPoint
                            ,A.AnnouncementType
                            ,REPLACE(A.EtcValues,\',\',\'\n\') AS SetEtcValues
                            ,A.RegDatm
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

            $from = '
                        from
                            lms_predict_final A
                            join
                            (
                                select
                                PfIdx
                                #,group_concat(CONCAT(\'{subjectName:"\',bb.CcdName,\'",point:"\',aa.Point,\'"}\')order by PfpIdx) as pointJson
                                #,GROUP_CONCAT(CONCAT(\'-\',bb.CcdName,\':\',aa.Point,\'(\',aa.Level,\')\') order by PfpIdx separator \'\n\') as pointJson
                                ,GROUP_CONCAT(CONCAT(\'-\',bb.CcdName,\':\',aa.Point,IF(ISNULL(aa.Level),\'\',CONCAT(\'(\',aa.Level,\')\'))) order by PfpIdx separator \'\n\') as pointJson
                                from
                                    lms_predict_final_point aa
                                    join lms_predict_code bb on aa.Subject = bb.Ccd
                                where aa.IsStatus=\'Y\'
                                group by PfIdx
                            ) B on A.pfIdx = B.PfIdx
                            join lms_product_predict C on A.PredictIdx = C.PredictIdx
                            join lms_member D on A.MemIdx = D.MemIdx
                            join lms_predict_code E on A.TakeMockPart = E.Ccd
                            left join lms_sys_code F on A.TakeAreaCcd = F.Ccd
                            left outer join lms_cert_apply G on A.MemIdx = G.MemIdx And A.CertIdx = G.CertIdx And G.ApprovalStatus=\'Y\' And G.IsStatus=\'Y\'  
                         where A.IsStatus=\'Y\'
            ';
        // 사이트 권한 추가
        $arr_condition['IN']['C.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        if(empty($arr_condition_add) === false) {
            $where .= ' and '.$arr_condition_add;
        }

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;
        return $query->result_array();
    }

    /**
     * 표준편차용 직렬,지역,과목별 평균점수/카운트수 (직렬100,200인 데이터 같은 직렬로 계산)
     * @param $PredictIdx
     * @param $TakeMockPart
     * @return array
     */
    public function listSubjectAvgPointForStandard($PredictIdx, $TakeMockPart)
    {
        $column = "
                CONCAT('1@200','_', pg.TakeArea,'_', pg.PpIdx) AS addColumnKey, pg.TakeMockPart, pg.TakeArea, pg.PpIdx, ROUND(AVG(pg.OrgPoint)) AS AvgOrgPoint,
                pp.RegistStandard, pp.RegistAvgPoint, pp.RegistStandardIsUse, pp.RegistAvgPointIsUse, COUNT(*) AS cnt
            ";
        $from = "
                FROM {$this->_table['predictGradesOrigin']} AS pg
                JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
            ";

        $add_condition = [
            'EQ' => [
                'pg.PredictIdx' => $PredictIdx,
                'pg.TakeMockPart' => $TakeMockPart,
            ],
            'IN' => [
                'pg.TakeMockPart' => ['100','200']
            ]
        ];
        $where = $this->_conn->makeWhere($add_condition);
        $where = $where->getMakeWhere(false);
        $group_by = " GROUP BY pg.TakeArea, pg.PpIdx";
        $query_1 = 'select ' . $column . $from . $where . $group_by;

        $column = "
                CONCAT(pg.TakeMockPart,'_', pg.TakeArea,'_', pg.PpIdx) AS addColumnKey, pg.TakeMockPart, pg.TakeArea, pg.PpIdx, ROUND(AVG(pg.OrgPoint)) AS AvgOrgPoint,
                pp.RegistStandard, pp.RegistAvgPoint, pp.RegistStandardIsUse, pp.RegistAvgPointIsUse, COUNT(*) AS cnt
            ";
        $from = "
                FROM {$this->_table['predictGradesOrigin']} AS pg
                JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
            ";

        $add_condition = [
            'EQ' => [
                'pg.PredictIdx' => $PredictIdx,
                'pg.TakeMockPart' => $TakeMockPart,
            ],
            'NOTIN' => [
                'pg.TakeMockPart' => ['100','200']
            ]
        ];
        $where = $this->_conn->makeWhere($add_condition);
        $where = $where->getMakeWhere(false);
        $group_by = " GROUP BY pg.TakeArea, pg.PpIdx";
        $query_2 = 'select ' . $column . $from . $where . $group_by;

        $list = $this->_conn->query($query_1 . ' UNION ALL ' . $query_2)->result_array();

        $avg_list = [];
        foreach ($list as $row) {
            $avg_list[$row['addColumnKey']]['TakeMockPart'] = $row['TakeMockPart'];
            $avg_list[$row['addColumnKey']]['TakeArea'] = $row['TakeArea'];
            $avg_list[$row['addColumnKey']]['PpIdx'] = $row['PpIdx'];
            $avg_list[$row['addColumnKey']]['AvgOrgPoint'] = $row['AvgOrgPoint'];
            $avg_list[$row['addColumnKey']]['SubjectCnt'] = $row['cnt'];
            $avg_list[$row['addColumnKey']]['RegistAvgPoint'] = $row['RegistAvgPoint'];
            $avg_list[$row['addColumnKey']]['RegistStandard'] = $row['RegistStandard'];
            $avg_list[$row['addColumnKey']]['RegistAvgPointIsUse'] = $row['RegistAvgPointIsUse'];
            $avg_list[$row['addColumnKey']]['RegistStandardIsUse'] = $row['RegistStandardIsUse'];
        }
        return $avg_list;
    }

    /**
     * 응시자용 직렬,지역,과목별 평균점수/카운트수
     * @param $PredictIdx
     * @param $TakeMockPart
     * @return array
     */
    public function listSubjectAvgPointForUser($PredictIdx, $TakeMockPart)
    {
        $column = "
                CONCAT(pg.TakeMockPart,'_', pg.TakeArea,'_', pg.PpIdx) AS addColumnKey, pg.TakeMockPart, pg.TakeArea, pg.PpIdx, ROUND(AVG(pg.OrgPoint)) AS AvgOrgPoint,
                pp.RegistStandard, pp.RegistAvgPoint, pp.RegistStandardIsUse, pp.RegistAvgPointIsUse, COUNT(*) AS cnt
            ";
        $from = "
                FROM {$this->_table['predictGradesOrigin']} AS pg
                JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
            ";

        $add_condition = [
            'EQ' => [
                'pg.PredictIdx' => $PredictIdx,
                'pg.TakeMockPart' => $TakeMockPart,
            ]
        ];
        $where = $this->_conn->makeWhere($add_condition);
        $where = $where->getMakeWhere(false);
        $group_by = " GROUP BY pg.TakeMockPart, pg.TakeArea, pg.PpIdx";
        $list = $this->_conn->query('select ' . $column . $from . $where . $group_by)->result_array();

        $avg_list = [];
        foreach ($list as $row) {
            $avg_list[$row['addColumnKey']]['TakeMockPart'] = $row['TakeMockPart'];
            $avg_list[$row['addColumnKey']]['TakeArea'] = $row['TakeArea'];
            $avg_list[$row['addColumnKey']]['PpIdx'] = $row['PpIdx'];
            $avg_list[$row['addColumnKey']]['AvgOrgPoint'] = $row['AvgOrgPoint'];
            $avg_list[$row['addColumnKey']]['SubjectCnt'] = $row['cnt'];
            $avg_list[$row['addColumnKey']]['RegistAvgPoint'] = $row['RegistAvgPoint'];
            $avg_list[$row['addColumnKey']]['RegistStandard'] = $row['RegistStandard'];
            $avg_list[$row['addColumnKey']]['RegistAvgPointIsUse'] = $row['RegistAvgPointIsUse'];
            $avg_list[$row['addColumnKey']]['RegistStandardIsUse'] = $row['RegistStandardIsUse'];
        }
        return $avg_list;
    }

    /**
     * 과목 점수 리스트    (직렬100,200인 데이터 같은 직렬로 계산)
     * @param $PredictIdx
     * @param $TakeMockPart
     * @return mixed
     */
    public function listUserForSubjectPoint($PredictIdx, $TakeMockPart)
    {
        $column = "pg.MemIdx, pg.PredictIdx, pg.PrIdx, pg.TakeArea, pg.PpIdx, pg.OrgPoint, pg.TakeMockPart";
        /*$column .= "pp.Type AS PpType";*/
        $column .= "
            ,CASE WHEN pg.TakeMockPart = '800' THEN 'P'
            ELSE pp.Type
            END AS PpType
        ";
        $column .= "
            ,CASE WHEN pg.TakeMockPart = '100' THEN '1@200'
            WHEN pg.TakeMockPart = '200' THEN '1@200'
            ELSE pg.TakeMockPart
            END AS addTakeMockPart
        ";
        $from = "
                FROM {$this->_table['predictGradesOrigin']} AS pg
                JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
            ";

        $add_condition = [
            'EQ' => [
                'pg.PredictIdx' => $PredictIdx,
                'pg.TakeMockPart' => $TakeMockPart,
            ]
        ];
        $where = $this->_conn->makeWhere($add_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 과목별 표준편차계산
     * (응시자가 선택한 과목의 점수 - 응시자가 선택한 과목의 평균)의 제곱의 총합계 => $arr_sum
     * ---------------------------------------------------------------------------
     *                  응시자가 선택한 과목의 응시인원수 - 1
     *
     * @param $user_point_list      //유저점수 리스트
     * @param $avg_standard_list    //과목별 평균 점수
     * @return array
     */
    private function setStandardDeviation($user_point_list, $avg_standard_list)
    {
        $data = [];
        $arr_sum = null;

        //총합계
        foreach ($user_point_list as $row) {
            $tmp_mapping_data = $row['addTakeMockPart'].'_'.$row['TakeArea'].'_'.$row['PpIdx'];
            if (empty($avg_standard_list[$tmp_mapping_data]) === false) {
                if ($avg_standard_list[$tmp_mapping_data]['RegistAvgPointIsUse'] == 'N') {
                    $sum = pow((int)$row['OrgPoint'] - (int)$avg_standard_list[$tmp_mapping_data]['AvgOrgPoint'],2);
                } else {
                    $sum = pow((int)$row['OrgPoint'] - (int)$avg_standard_list[$tmp_mapping_data]['RegistAvgPoint'],2);
                }
                $arr_sum[$tmp_mapping_data] = (empty($arr_sum[$tmp_mapping_data]) === true ? 0 : $arr_sum[$tmp_mapping_data]) + $sum;
            }
        }

        //계산
        foreach ($avg_standard_list as $key => $val) {
            if ($val['RegistStandardIsUse'] == 'N') {
                $subject_cnt = $val['SubjectCnt'] - 1;
                $data[$key] = (empty($arr_sum[$key]) === true || $arr_sum[$key] <= 0) ? '0' : round(sqrt($arr_sum[$key] / $subject_cnt), 2);
            } else {
                $data[$key] = $val['RegistStandard'];
            }
        }

        return $data;
    }

    /**
     * 유저별 조정점수 및 저장 데이터 셋팅
     * AdjustPoint => 필수과목 : 원점수, 선택과목 : 조정점수
     * StandardDeviation => 필수과목 : 0, 선택과목 : 표준편차
     * 응시자의 과목 점수 - 과목의 평균
     * --------------------------------  X 10 + 50
     *      과목의 표준편차
     *
     * @param $user_point_list      //유저점수 리스트
     * @param $avg_user_list        //과목별 평균 점수
     * @param $arr_standard_data    //과목별 표준편차
     * @return string
     */
    private function setAdjustPointForData($user_point_list, $avg_user_list, $arr_standard_data)
    {
        $user_list = $user_point_list;
        $arr_set_rank = $this->arrSetRank($user_list);

        foreach ($user_list as $key => $val) {
            $tmp_mapping_data_user = $val['TakeMockPart'].'_'.$val['TakeArea'].'_'.$val['PpIdx'];
            $tmp_mapping_data_standard = $val['addTakeMockPart'].'_'.$val['TakeArea'].'_'.$val['PpIdx'];

            if ($val['PpType'] == 'P') {
                $user_list[$key]['AdjustPoint'] = $val['OrgPoint'];
                $user_list[$key]['StandardDeviation'] = 0;
            } else {
                if (isset($arr_standard_data[$tmp_mapping_data_standard])) {
                    if ($arr_standard_data[$tmp_mapping_data_standard] == 0) {
                        $user_list[$key]['AdjustPoint'] = ( 0 * 10 ) + 50;
                        $user_list[$key]['StandardDeviation'] = $arr_standard_data[$tmp_mapping_data_standard];
                    } else {
                        $avg_data = ($avg_user_list[$tmp_mapping_data_user]['RegistAvgPointIsUse'] == 'N') ? $avg_user_list[$tmp_mapping_data_user]['AvgOrgPoint'] : $avg_user_list[$tmp_mapping_data_user]['RegistAvgPoint'];
                        $user_list[$key]['AdjustPoint'] = round((($val['OrgPoint'] - $avg_data) / $arr_standard_data[$tmp_mapping_data_standard] * 10) + 50, 2);
                        $user_list[$key]['StandardDeviation'] = $arr_standard_data[$tmp_mapping_data_standard];
                    }
                } else {
                    $user_list[$key]['AdjustPoint'] = 0;
                    $user_list[$key]['StandardDeviation'] = 0;
                }

                /*if (empty($arr_standard_data[$tmp_mapping_data_standard]) === false) {
                    $avg_data = ($avg_user_list[$tmp_mapping_data_user]['RegistAvgPointIsUse'] == 'N') ? $avg_user_list[$tmp_mapping_data_user]['AvgOrgPoint'] : $avg_user_list[$tmp_mapping_data_user]['RegistAvgPoint'];
                    //$user_list[$key]['AdjustPoint'] = ($val['PpType'] == 'P') ? $val['OrgPoint'] : round((($val['OrgPoint'] - $avg_data) / $arr_standard_data[$tmp_mapping_data_standard] * 10) + 50, 2);
                    $user_list[$key]['AdjustPoint'] = round((($val['OrgPoint'] - $avg_data) / $arr_standard_data[$tmp_mapping_data_standard] * 10) + 50, 2);
                    $user_list[$key]['StandardDeviation'] = $arr_standard_data[$tmp_mapping_data_standard];
                } else {
                    $user_list[$key]['AdjustPoint'] = 0;
                    $user_list[$key]['StandardDeviation'] = 0;
                }*/
            }

            if (empty($arr_set_rank[$tmp_mapping_data_user]) === false) {
                $user_list[$key]['Rank'] = $arr_set_rank[$tmp_mapping_data_user][$val['OrgPoint']] + 1;
            }
            unset($user_list[$key]['addTakeMockPart']);
            unset($user_list[$key]['PpType']);
        }

        return $user_list;
    }

    /**
     * 등록된 직렬,지역,과목별 등수 셋팅
     * @param $user_list
     * @return array
     */
    private function arrSetRank($user_list)
    {
        $arr_set_rank = [];
        $set_rank = [];

        foreach ($user_list as $key => $val) {
            $tmp_mapping_data = $val['TakeMockPart'].'_'.$val['TakeArea'].'_'.$val['PpIdx'];
            $arr_set_rank[$tmp_mapping_data][] = $val['OrgPoint'];

            rsort($arr_set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_unique($arr_set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_flip($set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_keys($set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_flip($set_rank[$tmp_mapping_data]);
        }
        return $set_rank;
    }


    /**
     * 자동지급강좌 추출
     * @param array $input
     * @param $PredictIdx
     * @return bool|string
     */
    public function _getPredictProduct($PredictIdx)
    {

        $column = 'A.*, B.ProdName';

        $from = '
                from 
                    '. $this->_table['predict_r_product'] .' A
                    join '.$this->_table['Product'] .' B ON A.ProdCode = B.ProdCode
                where 
                    A.IsStatus=\'Y\' and B.IsStatus=\'Y\'
        ';

        $where = $this->_conn->makeWhere(['EQ'=>['PredictIdx'=>$PredictIdx]])->getMakeWhere(true);
        $result = $this->_conn->query('select ' .$column .$from .$where)->result_array();
        return $result;
    }

    /**
     * 자동지급강좌 등록
     * @param array $input
     * @param $PredictIdx
     * @return bool|string
     */
    public function _setPredictProduct($input=[],$PredictIdx)
    {
        try {

            /*  기존 정보 상태값 변경 */
            $del_data = [
                'IsStatus' => 'N'
                , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $this->_conn->set($del_data)->where('PredictIdx', $PredictIdx)->where('IsStatus', 'Y');
            if ($this->_conn->update($this->_table['predict_r_product']) === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('이전 자동지급강좌 정보 수정에 실패했습니다.');
            }

            $OrderNum = element('OrderNum', $input,'');
            $StartDate_D = element('StartDate_D', $input,'');
            $StartDate_H = element('StartDate_H', $input,'');
            $EndDate_D = element('EndDate_D', $input,'');
            $EndDate_H = element('EndDate_H', $input,'');
            $ProdCode = element('prod_code', $input, '');

            if(empty($OrderNum) === false) {

                for($i=0;$i<count($OrderNum);$i++) {

                    if($StartDate_D[$i] != '' && $EndDate_D[$i] != '' && $ProdCode[$i] != '' ) {

                        $start_date= $StartDate_D[$i].' '.$StartDate_H[$i].':00:00';
                        $end_date= $EndDate_D[$i].' '.$EndDate_H[$i].':59:59';
                        $data = [
                            'PredictIdx' => $PredictIdx
                            ,'ProdCode' => $ProdCode[$i]
                            , 'OrderNum' => $OrderNum[$i]
                            , 'StartDate' => $start_date
                            , 'EndDate' => $end_date
                            , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                        ];

                        if($this->_conn->set($data)->insert($this->_table['predict_r_product']) === false) {
                            throw new \Exception('자동지급강좌 등록에 실패했습니다.');
                        }

                    }
                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 직렬,지역,과목별 -> 평균점수 / 응시인원 / 표준편차 / 조정점수 평균
     * @param $PredictIdx
     * @param $TakeMockPart
     * @return mixed
     */
    public function listSubjectAvgPoint($PredictIdx, $TakeMockPart)
    {
        $add_condition = [
            'EQ' => [
                'pg.PredictIdx' => $PredictIdx,
                'pg.TakeMockPart' => $TakeMockPart,
            ]
        ];
        $where = $this->_conn->makeWhere($add_condition);
        $where = $where->getMakeWhere(false);

        $column = "
                CONCAT(pg.TakeMockPart,'_', pg.TakeArea,'_', pg.PpIdx) AS addColumnKey, pg.TakeMockPart, pg.TakeArea, pg.PpIdx, ROUND(AVG(pg.OrgPoint)) AS AvgOrgPoint,
                pp.RegistStandard, pp.RegistAvgPoint, pp.RegistStandardIsUse, pp.RegistAvgPointIsUse, COUNT(*) AS cnt, pgr.StandardDeviation, pgr.AvgAdjustPoint
            ";
        $from = "
                FROM {$this->_table['predictGradesOrigin']} AS pg
                JOIN {$this->_table['predictRegister']} AS pr ON pg.PrIdx = pr.PrIdx
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pg.PpIdx = pp.PpIdx
                LEFT JOIN (
                    SELECT TakeMockPart, TakeArea, PpIdx, StandardDeviation, ROUND(AVG(pg.AdjustPoint),2) AS AvgAdjustPoint
                    FROM {$this->_table['predictGrades']} AS pg
                    {$where}
                    GROUP BY TakeMockPart, TakeArea, PpIdx
                ) AS pgr ON pgr.TakeMockPart = pg.TakeMockPart AND pgr.TakeArea = pg.TakeArea AND pgr.PpIdx = pg.PpIdx
            ";

        $group_by = " GROUP BY pg.TakeMockPart, pg.TaKeArea, pg.PpIdx";
        return $this->_conn->query('select ' . $column . $from . $where . $group_by)->result_array();
    }

    /**
     * 직렬,지역,과목별 상위 {percent} 평균 점수
     * @param $PredictIdx
     * @param $TakeMockPart
     * @param $percent
     * @return array
     */
    public function subjectTopFiveAvg($PredictIdx, $TakeMockPart, $percent)
    {
        $add_condition = [
            'EQ' => [
                'PredictIdx' => $PredictIdx,
                'TakeMockPart' => $TakeMockPart,
            ]
        ];
        $where = $this->_conn->makeWhere($add_condition);
        $where = $where->getMakeWhere(false);

        $column = "
        CONCAT(A.TakeMockPart,'_', A.TakeArea,'_', A.PpIdx) AS addColumnKey,
        A.TakeMockPart, A.TakeArea, A.PpIdx, SUM(A.AdjustPoint) AS TotAdjustPoint, ROUND(SUM(A.AdjustPoint) / COUNT(0), 2) AS AvgAdjustPoint
        ";
        $from = "
            FROM (
                SELECT pg.TakeMockPart, pg.TakeArea, pg.PpIdx, pg.AdjustPoint
                    , PERCENT_RANK() OVER (PARTITION BY TakeMockPart, TakeArea, PpIdx ORDER BY AdjustPoint DESC) AS PercRank
                FROM {$this->_table['predictGrades']} AS pg
                {$where}
            ) AS A
            WHERE PercRank BETWEEN 0 AND {$percent}
        ";
        $group_by = " GROUP BY A.TakeMockPart, A.TakeArea, A.PpIdx";
        $data = $this->_conn->query('select ' . $column . $from . $group_by)->result_array();

        $result_data = [];
        foreach ($data as $row) {
            $result_data[$row['addColumnKey']]['TakeMockPart'] = $row['TakeMockPart'];
            $result_data[$row['addColumnKey']]['TakeArea'] = $row['TakeArea'];
            $result_data[$row['addColumnKey']]['PpIdx'] = $row['PpIdx'];
            $result_data[$row['addColumnKey']]['TotAdjustPoint'] = $row['TotAdjustPoint'];
            $result_data[$row['addColumnKey']]['AvgAdjustPoint'] = $row['AvgAdjustPoint'];
        }
        return $result_data;
    }
}
