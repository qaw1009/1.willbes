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
        'predict_r_product' => 'lms_predict_r_product',
        'predictFinal' => 'lms_predict_final',
        'predictFinalPoint' => 'lms_predict_final_point',
        'predictSuccessfulCount' => 'lms_predict_successful_count',
        'predict_code_r_subject' => 'lms_predict_code_r_subject',
        'cert_apply' => 'lms_cert_apply'
    ];
    private $_temp_base_excel = ['C','D','E','F','G','H','I','J','K','L','M'];

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
            PP.PredictIdx, PP.MockPart, PP.SiteCode, PP.ProdName, PP.QuestionTypeCnt, PP.TakeAreas1CCds, PP.AddPointCcds, PP.MockYear, PP.MockRotationNo,
            PP.TakeNumRedundancyCheckIsUse, PP.PreServiceIsUse, PP.AnswerServiceIsUse, PP.ServiceIsUse, PP.LastServiceIsUse, PP.ExplainLectureIsUse, PP.MobileServiceIs, PP.SurveyIs,
            PP.PreServiceSDatm, PP.PreServiceEDatm, PP.AnswerServiceSDatm, PP.AnswerServiceEDatm, PP.ServiceSDatm, PP.ServiceEDatm, PP.LastServiceSDatm, PP.LastServiceEDatm,
            PP.RegIp, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx, PP.IsUse, A.wAdminName
        ";

        $from = "
            FROM {$this->_table['predictProduct']} AS PP
            LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
        ";
        $selectCount = " SELECT COUNT(*) AS cnt";
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);
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
	        ,(SELECT COUNT(*) FROM {$this->_table['predictQuestion']} AS EQ WHERE PP.PpIdx = EQ.PpIdx AND EQ.QuestionType = 1 AND EQ.IsStatus = 'Y') AS QuestionCnt1
            ,(SELECT COUNT(*) FROM {$this->_table['predictQuestion']} AS EQ WHERE PP.PpIdx = EQ.PpIdx AND EQ.QuestionType = 2 AND EQ.IsStatus = 'Y') AS QuestionCnt2
            ,(SELECT COUNT(*) FROM {$this->_table['predictQuestion']} AS EQ WHERE PP.PpIdx = EQ.PpIdx AND EQ.QuestionType = 3 AND EQ.IsStatus = 'Y') AS QuestionCnt3
            ,(SELECT COUNT(*) FROM {$this->_table['predictQuestion']} AS EQ WHERE PP.PpIdx = EQ.PpIdx AND EQ.QuestionType = 4 AND EQ.IsStatus = 'Y') AS QuestionCnt4
	        ,(SELECT CcdName FROM lms_predict_code AS a WHERE a.Ccd = PP.TakeMockPart) AS TakeMockPartName
	        ,(SELECT CcdName FROM lms_predict_code AS a WHERE a.Ccd = PP.SubjectCode) AS SubjectName
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
        $order = " ORDER BY PP.RegDate ASC";
        //echo "<pre>". 'select' . $column . $from . $where . $order . $offset_limit . "</pre>";

        $data = $this->_conn->query('SELECT' . $column . $from . $where . $order . $offset_limit)->result_array();
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
            PR.PrIdx,P.ProdName,P.PredictIdx,PR.ApplyType,MemName,PR.MemIdx,MemId,fn_dec(M.PhoneEnc) AS Phone,TaKeNumber,
            (SELECT IFNULL(CcdValue,CcdName) FROM {$this->_table['predictCode']} WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM {$this->_table['sysCode']} WHERE Ccd = PR.TaKeArea) AS TaKeArea,
            if(LectureType = 1, '온라인강의', if(LectureType = 2, '학원강의', if(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            if(Period = 1, '6개월 이하', if(Period = 2, '1년 이하', if(Period = 3, '2년 이하', '2년 이상'))) AS Period,
            PR.RegDatm,PR.AddPoint,
            (
                SELECT GROUP_CONCAT(CcdName) 
                FROM {$this->_table['predictCode']} 
                WHERE Ccd IN (SELECT SSPRRC.SubjectCode FROM {$this->_table['predictRegisterR']} AS SSPRRC WHERE SSPRRC.PrIdx = PR.PrIdx GROUP BY SSPRRC.PrIdx)
            ) AS SubjectName
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
        $order = " ORDER BY PR.PrIdx DESC";

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
            (SELECT IFNULL(CcdValue,CcdName) FROM lms_predict_code WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM lms_sys_code WHERE Ccd = PR.TaKeArea) AS TaKeArea,
            TaKeNumber,IF(LectureType = 1, '온라인강의', IF(LectureType = 2, '학원강의', IF(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            IF(Period = 1, '6개월 이하', IF(Period = 2, '1년 이하', IF(Period = 3, '2년 이하', '2년 이상'))) AS Period,
            RegDatm
            ,(GROUP_CONCAT(CONCAT('-',PP.PaperName,':',PG.OrgPoint))) AS OPOINT
            ,(SELECT COUNT(*) FROM lms_predict_answerpaper AS pa WHERE pa.PrIdx = PR.PrIdx ) AS AnswerCnt
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
    public function predictRegistList3($is_count, $predict_idx, $arr_condition = [], $arr_condition2 = [], $limit='', $offset='', $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $OPoint = "
                (
                    SELECT 
                        GROUP_CONCAT(CONCAT('-',PaperName,':',OrgPoint) ORDER BY PgoIdx) AS OPOINT
                    FROM 
                        {$this->_table['predictGradesOrigin']} AS go
                        LEFT JOIN {$this->_table['predictPaper']} AS pp ON go.PpIDx = pp.PpIdx
                    WHERE go.PrIdx = PR.PrIdx
                )
            ";

            $column = " 
                PrIdx, ApplyType, MemName, MemIdx, MemId, AddPoint, fn_dec(PhoneEnc) AS Phone, TaKeNumber as TaKeNumber,
                (SELECT IFNULL(CcdValue,CcdName) FROM {$this->_table['predictCode']} WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
                (SELECT CcdValue FROM {$this->_table['sysCode']} WHERE Ccd = PR.TaKeArea) AS TaKeArea,
                if(LectureType = 1, '온라인강의', if(LectureType = 2, '학원강의', if(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
                if(Period = 1, '6개월 이하', if(Period = 2, '1년 이하', if(Period = 3, '2년 이하', '2년 이상'))) AS Period, RegDatm,
                ".$OPoint." AS OPOINT,
                (
                    SELECT 
                        GROUP_CONCAT(go.PgoIdx ORDER BY PgoIdx) AS PgoIdx
                    FROM 
                        {$this->_table['predictGradesOrigin']} AS go
                        LEFT JOIN {$this->_table['predictPaper']} AS pp ON go.PpIDx = pp.PpIdx
                    WHERE go.PrIdx = PR.PrIdx
                ) AS pgoIdxs
                ,ppCount
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $where2 = $this->_conn->makeWhere($arr_condition2);
        $where2 = $where2->getMakeWhere(true);

        $from = "
            FROM (
                SELECT 
                r.*, M.MemId, M.MemName, M.PhoneEnc, cc.ppCount
                FROM lms_predict_register AS r
                INNER JOIN lms_member AS M ON r.MemIdx = M.MemIdx
                LEFT JOIN (
                    SELECT PrIdx, OrgPoint FROM lms_predict_grades_origin
                    WHERE PredictIdx = '{$predict_idx}'
                    GROUP BY PrIdx
                ) AS o ON r.PrIdx = o.PrIdx
                LEFT JOIN (
                    SELECT PrIdx, COUNT(*) AS ppCount FROM lms_predict_grades_origin
                    WHERE PredictIdx = '{$predict_idx}'
                    GROUP BY PrIdx
                ) AS cc ON r.PrIdx = cc.PrIdx
                WHERE r.PredictIdx = '{$predict_idx}' AND o.PrIdx IS NOT NULL AND M.MemIdx = 1000000
                {$where}
                ORDER BY r.PrIdx DESC
            ) AS PR
            WHERE PrIdx IS NOT NULL
        ";

        $query = $this->_conn->query('select '. $column . $from . $where2 . $order_by_offset_limit);
        if ($is_count === true) {
            return $query->row(0)->numrows;
        } else {
            $data = $query->result_array();
        }

        /*foreach ($data as &$it) {
            $it['OPOINT'] = str_replace(',','<br>',$it['OPOINT']);
        }*/
        return $data;
    }

    /**
     * 가데이터 엑셀변환
     * @param $predict_idx
     * @return mixed
     */
    public function predictRegistFakeListForExcel($form_data = [])
    {
        //과목정보조회
        $condition = [
            'EQ' => [
                'a.PredictIdx' => element('search_predict_idx', $form_data),
            ]
        ];

        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);
        $queryString = "a.PpIdx, CONCAT(a.PaperName,':',b.CcdName) AS PaperName
            from {$this->_table['predictPaper']} as a
            INNER JOIN {$this->_table['predictCode']} AS b ON a.TakeMockPart = b.Ccd AND b.GroupCcd = 0
        ";
        $paperList = $this->_conn->query("select ". $queryString . $where)->result_array();

        $order_by = ['a.TakeMockPart' => 'ASC', 'a.TakeArea' => 'ASC'];
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $column = "
            c.CcdName AS TakeMockPartName,d.CcdName AS TakeAreaName
            #GROUP_CONCAT(b.PaperName ORDER BY a.PpIdx ASC) AS PaperName,
            #GROUP_CONCAT(a.OrgPoint ORDER BY a.PpIdx ASC) AS OrgPoint
        ";
        foreach ($paperList as $row) {
            $column .= ",(SELECT OrgPoint FROM {$this->_table['predictGradesOrigin']} AS t1 WHERE t1.PrIdx = a.PrIdx AND t1.PpIdx = '{$row['PpIdx']}') AS '{$row['PaperName']}({$row['PpIdx']})'";
        }

        $from = "
            FROM {$this->_table['predictGradesOrigin']} AS a
            INNER JOIN {$this->_table['predictPaper']} AS b ON a.PpIdx = b.PpIdx
            INNER JOIN {$this->_table['predictCode']} AS c ON a.TakeMockPart = c.Ccd
            INNER JOIN {$this->_table['sysCode']} AS d ON a.TakeArea = d.Ccd
        ";

        $condition = [
            'EQ' => [
                'a.PredictIdx' => element('search_predict_idx', $form_data),
                'a.MemIdx' => '1000000'
            ],
            /*'NOT' => [
                'a.MemIdx' => '1000000'
            ]*/
        ];

        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);
        $group_by = " GROUP BY a.PrIdx ";

        return [
            'paperList' => $paperList,
            'list' => $this->_conn->query("select ". $column . $from . $where . $group_by . $order_by_offset_limit)->result_array()
        ];
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
            $sql = /** @lang text */"
                INSERT INTO {$this->_table['predictPaper']}
                    (PaperName, AnswerNum, TotalScore, 
                     QuestionFile, RealQuestionFile, PredictIdx, TakeMockPart, SubjectCode, Type, IsUse, RegIp, RegAdminIdx, RegDate)
                SELECT CONCAT('복사-', PaperName), AnswerNum, TotalScore,
                       QuestionFile, RealQuestionFile, PredictIdx, TakeMockPart, SubjectCode, Type, 'N', ?, ?, ?
                FROM {$this->_table['predictPaper']}
                WHERE PpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($RegIp, $RegAdminIdx, $RegDatm, $idx));

            $nowIdx = $this->_conn->insert_id();

            // lms_mock_questions 복사
            $sql = /** @lang text */"
                INSERT INTO {$this->_table['predictQuestion']}
                    (PpIdx, QuestionType, QuestionNO, RightAnswer, Scoring, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, QuestionType, QuestionNO, RightAnswer, Scoring, ?, ?, ?
                FROM {$this->_table['predictQuestion']}
                WHERE PpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($nowIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            // 파일 복사
            $src = $this->upload_path . $this->upload_path_predict . $idx . "/";
            $dest = $this->upload_path . $this->upload_path_predict . $nowIdx . "/";

            exec("cp -rf $src $dest");
            /*if(is_dir($dest) === false) {
                throw new Exception('파일 저장에 실패했습니다.');
            }*/

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
     * 문항리스트
     * @param array $arr_condition
     * @return mixed
     */
    public function listExamQuestions($arr_condition = [])
    {
        $column = 'PQ.*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['predictQuestion']} AS PQ
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON PQ.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON PQ.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 합격예측신청목록
     */
    public function predictRegistListExcel($condition='', $limit='', $offset='')
    {
        $column = "
            CONCAT(P.ProdName,'[',P.PredictIdx,']') AS ProdName, PR.ApplyType, MemName,MemId,fn_dec(M.PhoneEnc) AS Phone,
            (SELECT IFNULL(CcdValue,CcdName) FROM {$this->_table['predictCode']} WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM {$this->_table['sysCode']} WHERE Ccd = PR.TaKeArea) AS TaKeArea, TaKeNumber,
            if(LectureType = 1, '온라인강의', if(LectureType = 2, '학원강의', if(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            if(Period = 1, '6개월 이하', if(Period = 2, '1년 이하', if(Period = 3, '2년 이하', '2년 이상'))) AS Period, PR.RegDatm
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
        $data = $this->_conn->query('SELECT' . $column . $from . $where . $order)->result_array();
        return $data;
    }

    /**
     * 채점서비스참여현황
     * @param array $condition
     * @param array $order_by
     * @param array $paperData
     * @return mixed
     */
    public function predictRegistListExcel2($condition=[], $order_by = [], $paperData = [])
    {
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $paper_query_string = '';
        if (empty($paperData) === false) {
            foreach ($paperData[0] as $row) {
                $paper_query_string .= ", IFNULL((SELECT OrgPoint FROM lms_predict_grades_origin WHERE PpIdx = '{$row['PpIdx']}' AND PrIdx = PR.PrIdx limit 1),'') AS '{$row['PpIdx']}'";
            }
        }

        $column = "
            PR.ApplyType,MemName,PR.MemIdx,MemId,fn_dec(M.PhoneEnc) AS Phone,
            (SELECT IFNULL(CcdValue,CcdName) FROM lms_predict_code WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM lms_sys_code WHERE Ccd = PR.TaKeArea) AS TaKeArea,
            AddPoint,TaKeNumber,IF(LectureType = 1, '온라인강의', IF(LectureType = 2, '학원강의', IF(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            IF(Period = 1, '6개월 이하', IF(Period = 2, '1년 이하', IF(Period = 3, '2년 이하', '2년 이상'))) AS Period,
            RegDatm
            ,SUM(PG.OrgPoint) AS SumOrgPoint
            ,(GROUP_CONCAT(CONCAT(PP.PaperName,':',PG.OrgPoint))) AS OPOINT
        ";
        $column .= $paper_query_string;
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
            CcdName, Ccd
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
     *  합격예측용 기존데이터 호출
     */
    public function getProduct($PredictIdx){
        $column = "
            PP.PredictIdx, PP.MockPart, PP.SiteCode, PP.ProdName, PP.QuestionTypeCnt, PP.TakeAreas1CCds, PP.AddPointCcds, PP.MockYear, PP.MockRotationNo,
            PP.TakeNumRedundancyCheckIsUse, PP.PreServiceIsUse, PP.AnswerServiceIsUse, PP.ServiceIsUse, PP.LastServiceIsUse, PP.ExplainLectureIsUse, PP.MobileServiceIs, PP.SurveyIs,
            PP.PreServiceSDatm, PP.PreServiceEDatm, PP.AnswerServiceSDatm, PP.AnswerServiceEDatm, PP.ServiceSDatm, PP.ServiceEDatm, PP.LastServiceSDatm, PP.LastServiceEDatm,
            pp.SuccessfulCount, pp.CertIdxArr, pp.SpIdx, pp.IsQuestionType, pp.IsAddPoint,
            PP.RegIp, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx, PP.IsUse,
            A.wAdminName, A2.wAdminName AS wAdminName2
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

        if (empty($Res) === false) {
            $Res['MobileServiceIsArr'] = (empty($Res['MobileServiceIs']) === false) ? explode(',', $Res['MobileServiceIs']) : [];
            $Res['SurveyIsArr'] = (empty($Res['SurveyIsArr']) === false) ? explode(',', $Res['SurveyIsArr']) : [];
            $Res['MockPartArr'] = (empty($Res['MockPartArr']) === false) ? explode(',', $Res['MockPartArr']) : [];
        }
        return $Res;
    }

    /**
     *  가데이터입력
     */
    public function tempDataUpload($params = [], $form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $arr_ppidx = $this->getPpIdx($form_data);
            foreach ($params as $row) {
                $take_area = $row['B'];

                if (empty($take_area) === false) {
                    // 데이터 등록
                    $addRegData = [
                        'PredictIdx' => element('predictidx', $form_data),
                        'MemIdx' => 1000000,
                        'SiteCode' => element('site_code', $form_data),
                        'TakeMockPart' => element('take_mock_part', $form_data),
                        'TakeNumber' => '999',
                        'TakeArea' => $take_area,
                        'AddPoint' => 0,
                        'IsStatus' => 'Y',
                        'LectureType' => 1,
                        'Period' => 1,
                        'IsTake' => 'N'
                    ];
                    if ($this->_conn->set($addRegData)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictRegister']) === false) {
                        throw new \Exception('등록에 실패했습니다.');
                    }
                    $idx = $this->_conn->insert_id();

                    $arrPoint = [];
                    foreach ($this->_temp_base_excel as $sel_key => $sel_name) {
                        if (array_key_exists($sel_name, $row)) {
                            if (empty($row[$sel_name]) === false) {
                                $arrPoint[$sel_key] = $row[$sel_name];
                            } else {
                                $arrPoint[$sel_key] = 0;
                            }
                        }
                    }

                    foreach ($arrPoint as $pp_key => $pp_point) {
                        $addOriginData = [
                            'MemIdx' => 1000000,
                            'PrIdx' => $idx,
                            'PredictIdx' => element('predictidx', $form_data),
                            'PpIdx' => $arr_ppidx[$pp_key]['PpIdx'],
                            'TakeMockPart' => element('take_mock_part', $form_data),
                            'TakeArea' => $take_area,
                            'OrgPoint' => $pp_point,
                        ];
                        if ($this->_conn->set($addOriginData)->insert($this->_table['predictGradesOrigin']) === false) {
                            throw new \Exception('점수등록에 실패했습니다.');
                        }
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
     * 합격예측+직렬에 설정된 과목코드 조회
     * @param array $form_data
     * @return mixed
     */
    private function getPpIdx($form_data = [])
    {
        $column = "a.PpIdx, a.SubjectCode";
        $arr_condition = [
            'EQ' => [
                'a.PredictIdx' => element('predictidx', $form_data)
                ,'a.TakeMockPart' => element('take_mock_part', $form_data)
                ,'a.IsStatus' => 'Y'
                ,'a.IsUse' => 'Y'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $arr_order_by = [
            'b.TakeMockPart' => 'ASC'
            ,'b.OrderNum' => 'ASC'
        ];
        $order_by = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
        $from = "
                FROM {$this->_table['predictPaper']} as a
                INNER JOIN lms_predict_code_r_subject AS b ON a.PredictIdx = b.PredictIdx AND a.SubjectCode = b.SubjectCode AND b.IsUse = 'Y'
            ";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     *  합격예측용 기존데이터 호출
     */
    public function getProductALL(){
        $arr_condition = ['IN' => ['PP.SiteCode' => get_auth_site_codes()]];    //사이트 권한 추가

        $column = "
            PP.PredictIdx, PP.MockPart, PP.SiteCode, PP.ProdName, PP.QuestionTypeCnt, PP.TakeAreas1CCds, PP.AddPointCcds, PP.MockYear, PP.MockRotationNo,  
            PP.TakeNumRedundancyCheckIsUse, PP.PreServiceIsUse, PP.AnswerServiceIsUse, PP.ServiceIsUse, PP.LastServiceIsUse, PP.ExplainLectureIsUse, PP.MobileServiceIs, PP.SurveyIs,
            PP.PreServiceSDatm, PP.PreServiceEDatm, PP.AnswerServiceSDatm, PP.AnswerServiceEDatm, PP.ServiceSDatm, PP.ServiceEDatm, PP.LastServiceSDatm, PP.LastServiceEDatm,
            PP.RegIp, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx, PP.IsUse, A.wAdminName, A2.wAdminName AS wAdminName2
        ";

        $from = "
            FROM 
                {$this->_table['predictProduct']} AS PP
                LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN {$this->_table['admin']} AS A2 ON PP.UpdAdminIdx = A2.wAdminIdx
                
        ";

        $order_by = " ORDER BY PP.PredictIdx DESC ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
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
	        PP.PpIdx, PP.PaperName, PP.AnswerNum, PP.TotalScore, PP.QuestionFile, PP.RealQuestionFile, PP.RegDate, PP.PredictIdx, PP.SubjectCode, PP.Type, PP.TakeMockPart, PP.UpdDate, 
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
        return $data;
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
            $AnswerServiceSDatm =   $this->input->post('AnswerServiceSDatm_d') .' '. $this->input->post('AnswerServiceSDatm_h') .':'. $this->input->post('AnswerServiceSDatm_m') .':00';
            $AnswerServiceEDatm =   $this->input->post('AnswerServiceEDatm_d') .' '. $this->input->post('AnswerServiceEDatm_h') .':'. $this->input->post('AnswerServiceEDatm_m') .':00';
            $ServiceSDatm =   $this->input->post('ServiceSDatm_d') .' '. $this->input->post('ServiceSDatm_h') .':'. $this->input->post('ServiceSDatm_m') .':00';
            $ServiceEDatm =   $this->input->post('ServiceEDatm_d') .' '. $this->input->post('ServiceEDatm_h') .':'. $this->input->post('ServiceEDatm_m') .':00';
            $LastServiceSDatm =   $this->input->post('LastServiceSDatm_d') .' '. $this->input->post('LastServiceSDatm_h') .':'. $this->input->post('LastServiceSDatm_m') .':00';
            $LastServiceEDatm =   $this->input->post('LastServiceEDatm_d') .' '. $this->input->post('LastServiceEDatm_h') .':'. $this->input->post('LastServiceEDatm_m') .':00';

            // 신규 상품코드 조회
            $PredictIdx = $this->_conn->getFindResult($this->_table['predictProduct'], 'IFNULL(MAX(PredictIdx) + 1, 100001) as PredictIdx');
            $PredictIdx = $PredictIdx['PredictIdx'];

            // lms_product_predict 저장
            $data = array(
                'PredictIdx'       => $PredictIdx,
                'MockPart'       => implode(',', $this->input->post('MockPart')),
                'MobileServiceIs' => empty($this->input->post('MobileServiceIs')) ? null : implode(',', $this->input->post('MobileServiceIs')),
                'SurveyIs'       => empty($this->input->post('SurveyIs')) ? null : implode(',', $this->input->post('SurveyIs')),
                'SiteCode'      => $this->input->post('SiteCode'),
                'ProdName'      => $this->input->post('ProdName', true),
                'QuestionTypeCnt' => $this->input->post('QuestionTypeCnt', true),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                'TakeNumRedundancyCheckIsUse' => $this->input->post('TakeNumRedundancyCheckIsUse'),
                'PreServiceIsUse' => $this->input->post('PreServiceIsUse'),
                'AnswerServiceIsUse' => $this->input->post('AnswerServiceIsUse'),
                'ServiceIsUse' => $this->input->post('ServiceIsUse'),
                'LastServiceIsUse' => $this->input->post('LastServiceIsUse'),
                'ExplainLectureIsUse' => $this->input->post('ExplainLectureIsUse'),
                'IsUse' => $this->input->post('IsUse'),
                'PreServiceSDatm' => $PreServiceSDatm,
                'PreServiceEDatm' => $PreServiceEDatm,
                'AnswerServiceSDatm' => $AnswerServiceSDatm,
                'AnswerServiceEDatm' => $AnswerServiceEDatm,
                'ServiceSDatm' => $ServiceSDatm,
                'ServiceEDatm' => $ServiceEDatm,
                'LastServiceSDatm' => $LastServiceSDatm,
                'LastServiceEDatm' => $LastServiceEDatm,
                'SuccessfulCount' =>$this->input->post('SuccessfulCount'),
                'CertIdxArr' =>$this->input->post('CertIdxArr'),
                'SpIdx' =>$this->input->post('SpIdx'),
                'IsQuestionType' =>$this->input->post('IsQuestionType'),
                'IsAddPoint' =>$this->input->post('IsAddPoint'),
                'RegIp'          => $this->input->ip_address(),
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
            $AnswerServiceSDatm =   $this->input->post('AnswerServiceSDatm_d') .' '. $this->input->post('AnswerServiceSDatm_h') .':'. $this->input->post('AnswerServiceSDatm_m') .':00';
            $AnswerServiceEDatm =   $this->input->post('AnswerServiceEDatm_d') .' '. $this->input->post('AnswerServiceEDatm_h') .':'. $this->input->post('AnswerServiceEDatm_m') .':00';
            $ServiceSDatm =   $this->input->post('ServiceSDatm_d') .' '. $this->input->post('ServiceSDatm_h') .':'. $this->input->post('ServiceSDatm_m') .':00';
            $ServiceEDatm =   $this->input->post('ServiceEDatm_d') .' '. $this->input->post('ServiceEDatm_h') .':'. $this->input->post('ServiceEDatm_m') .':00';
            $LastServiceSDatm =   $this->input->post('LastServiceSDatm_d') .' '. $this->input->post('LastServiceSDatm_h') .':'. $this->input->post('LastServiceSDatm_m') .':00';
            $LastServiceEDatm =   $this->input->post('LastServiceEDatm_d') .' '. $this->input->post('LastServiceEDatm_h') .':'. $this->input->post('LastServiceEDatm_m') .':00';

            // lms_product_predict 저장
            $data = array(
                'MockPart'       => implode(',', $this->input->post('MockPart')),
                'ProdName'      => $this->input->post('ProdName', true),
                'MobileServiceIs' => empty($this->input->post('MobileServiceIs')) ? null : implode(',', $this->input->post('MobileServiceIs')),
                'SurveyIs'       => empty($this->input->post('SurveyIs')) ? null : implode(',', $this->input->post('SurveyIs')),
                'QuestionTypeCnt' => $this->input->post('QuestionTypeCnt', true),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                'TakeNumRedundancyCheckIsUse' => $this->input->post('TakeNumRedundancyCheckIsUse'),
                'PreServiceIsUse' => $this->input->post('PreServiceIsUse'),
                'AnswerServiceIsUse' => $this->input->post('AnswerServiceIsUse'),
                'ServiceIsUse' => $this->input->post('ServiceIsUse'),
                'LastServiceIsUse' => $this->input->post('LastServiceIsUse'),
                'ExplainLectureIsUse' => $this->input->post('ExplainLectureIsUse'),
                'IsUse' => $this->input->post('IsUse'),
                'PreServiceSDatm' => $PreServiceSDatm,
                'PreServiceEDatm' => $PreServiceEDatm,
                'AnswerServiceSDatm' => $AnswerServiceSDatm,
                'AnswerServiceEDatm' => $AnswerServiceEDatm,
                'ServiceSDatm' => $ServiceSDatm,
                'ServiceEDatm' => $ServiceEDatm,
                'LastServiceSDatm' => $LastServiceSDatm,
                'LastServiceEDatm' => $LastServiceEDatm,
                'SuccessfulCount' =>$this->input->post('SuccessfulCount'),
                'CertIdxArr' =>$this->input->post('CertIdxArr'),
                'SpIdx' =>$this->input->post('SpIdx'),
                'IsQuestionType' =>$this->input->post('IsQuestionType'),
                'IsAddPoint' =>$this->input->post('IsAddPoint'),
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
    public function storePaper($form_data = [])
    {
        try {
            $this->_conn->trans_begin();

            $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile'], 1);

            // 데이터 저장
            $data = array(
                'PaperName' => $this->input->post('PaperName', true),
                'AnswerNum' => $this->input->post('AnswerNum'),
                'PredictIdx' => $this->input->post('PredictIdx'),
                'TakeMockPart' => element('take_mock_part', $form_data),
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
    public function updatePaper($form_data = [])
    {
        $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile'], 1);

        try {
            $this->_conn->trans_begin();

            // 데이터 수정
            $data = array(
                'PaperName' => $this->input->post('PaperName', true),
                'PredictIdx' => $this->input->post('PredictIdx'),
                'TakeMockPart' => element('take_mock_part', $form_data),
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
     * 문제유형 수
     * @param string $pp_idx
     * @param int $questionTypeCnt
     * @return mixed
     */
    public function countExamQuestions($pp_idx = '', $questionTypeCnt = 2)
    {
        $query_string = "";
        for ($i=1; $i<=$questionTypeCnt; $i++){
            $query_string .= ",(SELECT COUNT(*) AS cnt FROM {$this->_table['predictQuestion']} WHERE PpIdx = '{$pp_idx}' AND QuestionType = {$i} AND IsStatus = 'Y') AS QuestionType{$i}";
        }
        $query_string = ltrim($query_string, ',');
        return $this->_conn->query('select ' . $query_string)->row_array();
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

            $dataReg = $dataMod = $dataDel = [];
            if( !empty($this->input->post('chapterTotal')) ) {
                foreach ($this->input->post('chapterTotal') as $k => $v) {
                    if ( empty($this->input->post('chapterExist')) || !in_array($v, $this->input->post('chapterExist')) ) {
                        // 등록
                        $dataReg[$k] = [
                            'PpIdx' => $this->input->post('idx'),
                            'QuestionType' => $this->input->post('question_type'),
                            'QuestionNO' => $_POST['QuestionNO'][$k],
                            'RightAnswer' => $_POST['RightAnswer'][$k],
                            'Scoring' => $_POST['Scoring'][$k],
                            'RegIp' => $this->input->ip_address(),
                            'RegDatm' => date("Y-m-d H:i:s"),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        ];
                    }
                    else {
                        // 수정
                        $dataMod[$k] = [
                            'PqIdx' => $v,
                            'QuestionNO' => $_POST['QuestionNO'][$k],
                            'RightAnswer' => $_POST['RightAnswer'][$k],
                            'Scoring' => $_POST['Scoring'][$k],
                            'UpdDatm' => date("Y-m-d H:i:s"),
                            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                        ];
                    }
                }
            }

            // 삭제 (IsStatus Update)
            if( !empty($this->input->post('chapterDel')) ) {
                foreach ($this->input->post('chapterDel') as $k => $v) {
                    $dataDel[$k] = [
                        'PqIdx' => $v,
                        'IsStatus' => 'N',
                        'UpdDatm' => date("Y-m-d H:i:s"),
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    ];
                }
            }
            if($dataReg) $this->_conn->insert_batch($this->_table['predictQuestion'], $dataReg);
            if($dataMod) $this->_conn->update_batch($this->_table['predictQuestion'], $dataMod, 'PqIdx');
            if($dataDel) $this->_conn->update_batch($this->_table['predictQuestion'], $dataDel, 'PqIdx');
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
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
     * 문항 전체 삭제
     * @param $pp_idx
     * @param $question_type
     * @return bool
     */
    public function deleteQuestion($pp_idx, $question_type)
    {
        try {
            $input = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s'),
            ];

            $this->_conn->set($input)->where('PpIdx', $pp_idx)->where('QuestionType', $question_type);
            if ($this->_conn->update($this->_table['predictQuestion']) === false) {
                throw new \Exception('삭제 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
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
     * 채점하기
     * @param $PredictIdx
     * @return array|bool
     */
    public function updateForGradePaper($PredictIdx)
    {
        try {
            $this->_conn->trans_begin();
            if(empty($PredictIdx) == true){
                throw new \Exception('필수값 누락입니다.');
            }

            $query_string = "
                lms_predict_answerpaper AS a,
                (
                    SELECT pa.PrIdx, pa.PpIdx, pa.PqIdx, IF(FIND_IN_SET(pa.Answer, pq.RightAnswer) > 0, 'Y', 'N') AS targetIsWrong
                    FROM lms_predict_answerpaper AS pa
                    INNER JOIN lms_predict_paper AS pp ON pa.PredictIdx = pp.PredictIdx AND pa.PpIdx = pp.PpIdx AND pp.IsStatus = 'Y' AND pp.IsUse = 'Y'
                    INNER JOIN lms_predict_register_r_code AS rc ON pa.PredictIdx = rc.PredictIdx AND pa.PrIdx = rc.PrIdx AND pp.SubjectCode = rc.SubjectCode
                    INNER JOIN lms_predict_questions AS pq ON pa.PqIdx = pq.PqIdx AND rc.QuestionType = pq.QuestionType
                    WHERE pa.PredictIdx = ?
                ) AS b
                SET a.IsWrong = b.targetIsWrong
                WHERE a.PredictIdx = ? AND a.PrIdx = b.PrIdx AND a.PpIdx = b.PpIdx AND a.PqIdx = b.PqIdx
            ";
            // 쿼리 실행
            $results = $this->_conn->query('update ' . $query_string, [$PredictIdx, $PredictIdx]);
            if (empty($results) === true) {
                throw new \Exception('채점하기 실패입니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 원점수입력
     * @param array $form_data
     * @return array|bool
     */
    public function scoreMakeStep1($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $predict_idx = element('PredictIdx', $form_data);
            $take_mock_part = element('TakeMockPart', $form_data);

            $data = [
                'MemId' => $this->session->userdata('admin_id'),
                'Step' => '1',
                'PredictIdx' => $predict_idx
            ];
            $is_insert = $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictGradesLog']);
            if ($is_insert === false) {
                throw new \Exception('로그생성실패.');
            }

            $arr_condition = [
                'EQ' => [
                    'a.PredictIdx' => $predict_idx
                    ,'a.TakeMockPart' => $take_mock_part
                ]
            ];

            $column = "
                a.MemIdx, a.PrIdx, a.PredictIdx, d.PpIdx
                ,a.TakeMockPart, a.TakeArea
                ,SUM(IF(FIND_IN_SET(d.Answer, e.RightAnswer) > 0, e.Scoring, '0')) AS OrgPoint
            ";
            $from = "
                FROM lms_predict_register AS a
                INNER JOIN lms_predict_register_r_code AS b ON a.PrIdx = b.PrIdx
                INNER JOIN lms_predict_paper AS c ON b.SubjectCode = c.SubjectCode AND c.IsStatus = 'Y' AND c.IsUse = 'Y'
                INNER JOIN lms_predict_answerpaper AS d ON a.PredictIdx = d.PredictIdx AND a.PrIdx = d.PrIdx AND c.PpIdx = d.PpIdx
                INNER JOIN lms_predict_questions AS e ON d.PpIdx = e.PpIdx AND d.PqIdx = e.PqIdx AND b.QuestionType = e.QuestionType
            ";

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);

            $group_by = " GROUP BY a.PrIdx, d.PpIdx ";
            $order_by = $this->_conn->makeOrderBy(['a.PrIdx' => 'ASC', 'd.PpIdx' => 'ASC'])->getMakeOrderBy();

            $target_data = $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by)->result_array();
            $del_data = [];
            $ins_data = [];

            if (empty($target_data) === false) {
                foreach ($target_data as $row) {
                    $del_data[$row['PrIdx']] = $row['PrIdx'];
                    $ins_data[] = [
                        'MemIdx' => $row['MemIdx'],
                        'PrIdx' => $row['PrIdx'],
                        'PredictIdx' => $row['PredictIdx'],
                        'PpIdx' => $row['PpIdx'],
                        'OrgPoint' => $row['OrgPoint'],
                        'TakeMockPart' => $row['TakeMockPart'],
                        'TakeArea' => $row['TakeArea']
                    ];
                }

                $this->_conn->where('PredictIdx', $predict_idx);
                $this->_conn->where_in('PrIdx', $del_data);
                if ($this->_conn->delete($this->_table['predictGradesOrigin']) === false) {
                    throw new \Exception('삭제에 실패했습니다.');
                }

                if ($this->_conn->insert_batch($this->_table['predictGradesOrigin'], $ins_data) === false) {
                    throw new \Exception('원점수 저장 실패입니다.');
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
                    'MemId' => (empty($this->session->userdata('admin_id')) === true ? 'systemcron' : $this->session->userdata('admin_id')),
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
                    'MemId' => (empty($this->session->userdata('admin_id')) === true ? 'systemcron' : $this->session->userdata('admin_id')),
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
                    $inputData[$key]['AvrPoint'] = $topFiveAvgData[$tmp_mapping_data]['AvgAdjustPoint'];
                    $inputData[$key]['FivePerPoint'] = $topFiveAvgData[$tmp_mapping_data]['Top5AvgOrgPoint'];
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

    /**
     * 기대/유력/안정 점수계산
     * @param $PredictIdx
     * @param $TakeMockPart
     * @param $TakeArea
     * @param $P1
     * @param $P2
     * @param $P3
     * @return array
     */
    public function calculate($PredictIdx, $TakeMockPart, $TakeArea, $P1, $P2, $P3)
    {
        $result = [];
        for ($i=1; $i<=3; $i++) {
            $n = ${'P'.$i};
            $percent = $n / 100;

            $query_string = "
                (
                    SELECT B.SumAdjustPoint
                    FROM 
                    (
                        SELECT
                        *
                        ,PERCENT_RANK() OVER (PARTITION BY A.TakeMockPart, A.TakeArea ORDER BY A.SumAdjustPoint DESC) AS PointRank
                        FROM (
                            SELECT PrIdx, TakeMockPart, TakeArea, ROUND(SUM(AdjustPoint),2) AS SumAdjustPoint
                            FROM {$this->_table['predictGrades']}
                            WHERE PredictIdx = {$PredictIdx}
                            AND TakeMockPart = '{$TakeMockPart}'
                            AND TakeArea = '{$TakeArea}'
                            GROUP BY PrIdx
                        ) AS A
                    ) AS B
                    WHERE B.PointRank BETWEEN 0 AND {$percent}
                    ORDER BY B.SumAdjustPoint DESC
                    LIMIT 1
                ) AS MaxPoint
                ,
                (
                    SELECT B.SumAdjustPoint
                    FROM 
                    (
                        SELECT
                        *
                        ,PERCENT_RANK() OVER (PARTITION BY A.TakeMockPart, A.TakeArea ORDER BY A.SumAdjustPoint DESC) AS PointRank
                        FROM (
                            SELECT PrIdx, TakeMockPart, TakeArea, ROUND(SUM(AdjustPoint),2) AS SumAdjustPoint
                            FROM {$this->_table['predictGrades']}
                            WHERE PredictIdx = {$PredictIdx}
                            AND TakeMockPart = '{$TakeMockPart}'
                            AND TakeArea = '{$TakeArea}'
                            GROUP BY PrIdx
                        ) AS A
                    ) AS B
                    WHERE B.PointRank BETWEEN 0 AND {$percent}
                    ORDER BY B.SumAdjustPoint ASC
                    LIMIT 1
                ) AS MinPoint
            ";

            $result[] = $this->_conn->query('select ' . $query_string)->row_array();
        }

        return $result;
    }

    /**
     * 직렬별예상합격선 리스트
     * 메인쿼리 : 직렬별 지역(전국제외) 테이블 [직렬이 101단(400)인경우 서울만 조인]
     * @param string $predict_dix
     * @param array $arr_condition
     * @return mixed
     */
    public function listGradesLine($predict_dix = '', $arr_condition = [])
    {
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $query_string = "A.*, L.PickNum, L.TakeNum, L.CompetitionRateNow, L.CompetitionRateAgo, L.PassLineAgo, L.AvrPointAgo, L.StabilityAvrPoint, L.StabilityAvrPercent
            ,L.StrongAvrPoint1, L.StrongAvrPoint2, L.StrongAvrPercent, L.ExpectAvrPoint1, L.ExpectAvrPoint2, L.ExpectAvrPercent, L.IsUse
            ,L.StrongAvrPoint1Ref, L.StrongAvrPoint2Ref, L.ExpectAvrPoint1Ref, L.ExpectAvrPoint2Ref, L.StabilityAvrPointRef
            ,(
                SELECT B.SumAdjustPoint
                FROM (
                    SELECT *,PERCENT_RANK() OVER (PARTITION BY A.TakeMockPart, A.TakeArea ORDER BY A.SumAdjustPoint DESC) AS PointRank
                    FROM (
                        SELECT PredictIdx, PrIdx, TakeMockPart, TakeArea, ROUND(SUM(AdjustPoint),2) AS SumAdjustPoint
                        FROM {$this->_table['predictGrades']}
                        WHERE PredictIdx = ?
                        GROUP BY PrIdx
                    ) AS A
                ) AS B
                WHERE B.PointRank BETWEEN 0 AND ROUND((L.PickNum / L.TakeNum),2)
                AND B.PredictIdx = L.PredictIdx AND B.TakeMockPart = L.TakeMockPart AND B.TakeArea = L.TakeArea
                ORDER BY B.SumAdjustPoint ASC
                LIMIT 1
            ) AS SetOnePerCut
            ,(
                SELECT A.AvgAdjustPoint
                FROM (
                    SELECT PredictIdx, TakeMockPart, TakeArea, ROUND(AVG(t.SumAdjustPoint),2) AS AvgAdjustPoint
                    FROM (
                        SELECT PredictIdx, TakeMockPart, TakeArea, ROUND(SUM(AdjustPoint),2) AS SumAdjustPoint
                        FROM {$this->_table['predictGrades']}
                        WHERE PredictIdx = ?
                        GROUP BY PrIdx
                    ) AS t
                    GROUP BY TakeMockPart, TakeArea
                ) AS A
                WHERE PredictIdx = L.PredictIdx AND TakeMockPart = L.TakeMockPart AND TakeArea = L.TakeArea
            ) AS SetAvrPoint
            ,(
                SELECT COUNT(*)
                FROM (
                    SELECT PredictIdx,TakeMockPart,TakeArea FROM {$this->_table['predictGrades']} WHERE PredictIdx = ? AND MemIdx != 1000000 GROUP BY PrIdx
                ) AS A
                WHERE PredictIdx = L.PredictIdx AND TakeMockPart = L.TakeMockPart AND TakeArea = L.TakeArea
            ) AS SetTakeOrigin
            ,(
                SELECT COUNT(*)
                FROM (
                    SELECT PredictIdx,TakeMockPart,TakeArea FROM {$this->_table['predictGrades']}
                    WHERE PredictIdx = ? GROUP BY PrIdx
                ) AS A
                WHERE PredictIdx = L.PredictIdx AND TakeMockPart = L.TakeMockPart AND TakeArea = L.TakeArea
            ) AS SetTotalRegist
            
            FROM (
                SELECT pp.PredictIdx, pp.MockPart AS TakeMockPart, pp.TakeMockPartName, pp.AreaGroupCode, ar.TakeArea, ar.TakeAreaName, pp.RowNum
                FROM (
                    SELECT
                    Ccd AS TakeArea, GroupCcd, CcdName AS TakeAreaName
                    FROM {$this->_table['sysCode']}
                    WHERE GroupCcd = '712' AND Ccd != '712018' #전국제외
                ) AS ar
                INNER JOIN (
                    SELECT p.PredictIdx, p.MockPart, pc.CcdName AS TakeMockPartName, '712' AS AreaGroupCode,(@rownum1 := @rownum1 + 1) AS RowNum
                    FROM (
                        SELECT PredictIdx, SUBSTRING_INDEX(SUBSTRING_INDEX(a.MockPart, ',', TN.num), ',', -1) AS MockPart
                        FROM tmp_numbers AS TN, {$this->_table['predictProduct']} AS a
                        WHERE a.PredictIdx = ?
                        AND CHAR_LENGTH(a.MockPart) - CHAR_LENGTH(REPLACE(a.MockPart, ',', '')) >= TN.num - 1
                    ) AS p
                    INNER JOIN {$this->_table['predictCode']} AS pc ON p.MockPart = pc.Ccd AND pc.IsUse = 'Y' AND pc.GroupCcd = 0
                    ,(SELECT @rownum1 := 0) AS tmp
                ) AS pp ON ar.GroupCcd = pp.AreaGroupCode
                AND CASE WHEN pp.MockPart = '400' THEN ar.TakeArea = '712001' ELSE TRUE END #400인경우 서울만 조인
                ORDER BY pp.RowNum, pp.MockPart, ar.TakeArea
            ) AS A
            LEFT JOIN {$this->_table['predictGradesLine']} AS L ON L.PredictIdx = ? AND A.TakeMockPart = L.TakeMockPart AND A.TakeArea = L.TakeArea
            {$where}
            ORDER BY A.RowNum, A.TakeMockPart, A.TakeArea ASC
        ";
        return $this->_conn->query('SELECT '.$query_string, [$predict_dix,$predict_dix,$predict_dix,$predict_dix,$predict_dix,$predict_dix])->result_array();
    }

    /**
     * 직렬별예상합격선 등록
     * @param $form_data
     * @return array|bool
     */
    public function storeLine($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $this->_conn->where(['PredictIdx' => $this->input->post('PredictIdx')]);
            if ($this->_conn->delete($this->_table['predictGradesLine']) === false) {
                throw new \Exception('성적 삭제에 실패했습니다.');
            }

            $input_data = [];
            $arr_take_mock_part = element('TakeMockPart',$form_data);
            foreach ($arr_take_mock_part as $key => $val) {
                $input_data[$key]['PredictIdx'] = element('PredictIdx',$form_data);
                $input_data[$key]['TakeMockPart'] = element('TakeMockPart',$form_data)[$key];
                $input_data[$key]['TakeArea'] = element('TakeArea',$form_data)[$key];
                $input_data[$key]['PickNum'] = (empty(element('PickNum',$form_data)[$key]) === false ? element('PickNum',$form_data)[$key] : '');
                $input_data[$key]['TakeNum'] = (empty(element('TakeNum',$form_data)[$key]) === false ? element('TakeNum',$form_data)[$key] : '');
                $input_data[$key]['CompetitionRateNow'] = (empty(element('CompetitionRateNow',$form_data)[$key]) === false ? element('CompetitionRateNow',$form_data)[$key] : '');
                $input_data[$key]['CompetitionRateAgo'] = (empty(element('CompetitionRateAgo',$form_data)[$key]) === false ? element('CompetitionRateAgo',$form_data)[$key] : '');
                $input_data[$key]['PassLineAgo'] = (empty(element('PassLineAgo',$form_data)[$key]) === false ? element('PassLineAgo',$form_data)[$key] : '');
                $input_data[$key]['AvrPointAgo'] = (empty(element('AvrPointAgo',$form_data)[$key]) === false ? element('AvrPointAgo',$form_data)[$key] : '');
                $input_data[$key]['StabilityAvrPoint'] = (empty(element('StabilityAvrPoint',$form_data)[$key]) === false ? (float)element('StabilityAvrPoint',$form_data)[$key] : '');
                $input_data[$key]['StabilityAvrPointRef'] = (empty(element('StabilityAvrPointRef',$form_data)[$key]) === false ? (float)element('StabilityAvrPointRef',$form_data)[$key] : '');
                $input_data[$key]['StabilityAvrPercent'] = (empty(element('StabilityAvrPercent',$form_data)[$key]) === false ? (float)element('StabilityAvrPercent',$form_data)[$key] : '');
                $input_data[$key]['StrongAvrPoint1'] = (empty(element('StrongAvrPoint1',$form_data)[$key]) === false ? (float)element('StrongAvrPoint1',$form_data)[$key] : '');
                $input_data[$key]['StrongAvrPoint1Ref'] = (empty(element('StrongAvrPoint1Ref',$form_data)[$key]) === false ? (float)element('StrongAvrPoint1Ref',$form_data)[$key] : '');
                $input_data[$key]['StrongAvrPoint2'] = (empty(element('StrongAvrPoint2',$form_data)[$key]) === false ? (float)element('StrongAvrPoint2',$form_data)[$key] : '');
                $input_data[$key]['StrongAvrPoint2Ref'] = (empty(element('StrongAvrPoint2Ref',$form_data)[$key]) === false ? (float)element('StrongAvrPoint2Ref',$form_data)[$key] : '');
                $input_data[$key]['StrongAvrPercent'] = (empty(element('StrongAvrPercent',$form_data)[$key]) === false ? (float)element('StrongAvrPercent',$form_data)[$key] : '');
                $input_data[$key]['ExpectAvrPoint1'] = (empty(element('ExpectAvrPoint1',$form_data)[$key]) === false ? (float)element('ExpectAvrPoint1',$form_data)[$key] : '');
                $input_data[$key]['ExpectAvrPoint1Ref'] = (empty(element('ExpectAvrPoint1Ref',$form_data)[$key]) === false ? (float)element('ExpectAvrPoint1Ref',$form_data)[$key] : '');
                $input_data[$key]['ExpectAvrPoint2'] = (empty(element('ExpectAvrPoint2',$form_data)[$key]) === false ? (float)element('ExpectAvrPoint2',$form_data)[$key] : '');
                $input_data[$key]['ExpectAvrPoint2Ref'] = (empty(element('ExpectAvrPoint2Ref',$form_data)[$key]) === false ? (float)element('ExpectAvrPoint2Ref',$form_data)[$key] : '');
                $input_data[$key]['ExpectAvrPercent'] = (empty(element('ExpectAvrPercent',$form_data)[$key]) === false ? (float)element('ExpectAvrPercent',$form_data)[$key] : '');
                $input_data[$key]['IsUse'] = (empty(element('IsUse',$form_data)[$key]) === false ? element('IsUse',$form_data)[$key] : '');;
            }

            if($input_data) $this->_conn->insert_batch($this->_table['predictGradesLine'], $input_data);
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 엑셀파일 업로드
     * @param null $form_data
     * @param array $excel_data
     */
    public function passlineStoreForExcel($form_data = null, $excel_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $predict_idx = element('predict_idx', $form_data);

            //기존데이터 삭제
            $this->_conn->where(['PredictIdx' => $predict_idx]);
            if ($this->_conn->delete($this->_table['predictGradesLine']) === false) {
                throw new \Exception('합격선 데이터 삭제에 실패했습니다.');
            }

            $input_data = [];
            foreach ($excel_data as $key => $row) {
                if (empty($row['A']) === false) {
                    $input_data[$key]['PredictIdx'] = $predict_idx;
                    $input_data[$key]['TakeMockPart'] = $row['A'];
                    $input_data[$key]['TakeArea'] = $row['C'];
                    $input_data[$key]['PickNum'] = $row['E'];
                    $input_data[$key]['TakeNum'] = $row['F'];
                    $input_data[$key]['CompetitionRateNow'] = $row['G'];
                    $input_data[$key]['CompetitionRateAgo'] = $row['H'];
                    $input_data[$key]['PassLineAgo'] = $row['I'];
                    $input_data[$key]['AvrPointAgo'] = $row['J'];

                    $input_data[$key]['ExpectAvrPercent'] = $row['K'];
                    $input_data[$key]['ExpectAvrPoint1'] = $row['L'];
                    $input_data[$key]['ExpectAvrPoint1Ref'] = '';
                    $input_data[$key]['ExpectAvrPoint2'] = $row['M'];
                    $input_data[$key]['ExpectAvrPoint2Ref'] = '';

                    $input_data[$key]['StrongAvrPercent'] = $row['N'];
                    $input_data[$key]['StrongAvrPoint1'] = $row['O'];
                    $input_data[$key]['StrongAvrPoint1Ref'] = '';
                    $input_data[$key]['StrongAvrPoint2'] = $row['P'];
                    $input_data[$key]['StrongAvrPoint2Ref'] = '';

                    $input_data[$key]['StabilityAvrPercent'] = $row['Q'];
                    $input_data[$key]['StabilityAvrPoint'] = $row['R'];
                    $input_data[$key]['StabilityAvrPointRef'] = '';

                    $input_data[$key]['IsUse'] = $row['S'];
                }
            }

            if ($this->_conn->insert_batch($this->_table['predictGradesLine'], $input_data) === false) {
                throw new Exception('저장에 실패했습니다.');
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
                a.PstIdx, a.TalkShowContentsType, a.Title, a.ContentType, a.Content, a.ExcelFileFullPath, a.ExcelFileRealName, a.AttachFileFullPath, a.AttachFileRealName, a.IsUse, a.RegDatm, a.RegAdminIdx, a.RegIp,
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
                a.PstIdx, a.TalkShowContentsType, a.Title, a.ContentType, a.Content, a.ExcelFileFullPath, a.ExcelFileRealName, a.AttachFileFullPath, a.AttachFileRealName, a.IsUse
                ,a.RegDatm, a.RegAdminIdx, a.RegIp, b.wAdminName as RegAdminName, a.UpdDatm, a.UpdAdminIdx, c.wAdminName as UpdAdminName
            ';

        $from = "
            FROM {$this->_table['predictSubTitles']} as a
            LEFT JOIN {$this->_table['admin']} AS b ON a.RegAdminIdx = b.wAdminIdx and b.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} AS c ON a.UpdAdminIdx = c.wAdminIdx and c.wIsStatus='Y'
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
                'TalkShowContentsType' => element('talkshow_contents_type', $input),
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
                if (empty($temp_content) === false) {
                    foreach ($temp_content as $key => $val) {
                        if (empty($val) === false) {
                            $content_data .= $val . '|';
                        }
                    }
                    $content_data = substr($content_data, 0, -1);
                }
                $excel_file_path = '';
                $excel_file_name = '';
            } else {    // excel
                $excel_data = $this->setExcelData();
                $excel_file_path = $excel_data['ExcelFileFullPath'];
                $excel_file_name = $excel_data['ExcelFileRealName'];
                $content_data = $excel_data['ExcelData'];
            }

            $input_data = [
                'TalkShowContentsType' => element('talkshow_contents_type', $input),
                'Title' => element('title', $input),
                'ContentType' => element('content_type', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
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
            $input_data = [
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ,'UpdDatm' => date('Y-m-d H:i:s')
                ,'content' => $set_temp_data
            ];

            $this->_conn->set($input_data)->where_in('PstIdx',element('idx', $input));
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
            $column = /** @lang text */"
                A.*,C.ProdName,D.MemId,D.MemName,fn_dec(D.PhoneEnc) AS phone,E.CcdName AS TakeMockPartName
                ,F.CcdName AS TakeAreaCcdName,G.TakeNo,REPLACE(A.EtcValues,',','<BR>') AS SetEtcValues
                ,(
                    SELECT GROUP_CONCAT(CONCAT('-',bb.CcdName,':',aa.Point,IF(ISNULL(aa.Level),'',CONCAT('(',aa.Level,')'))) ORDER BY PfpIdx SEPARATOR '<BR>') AS pointJson
                    FROM {$this->_table['predictFinalPoint']} aa
                    JOIN {$this->_table['predictCode']} bb ON aa.Subject = bb.Ccd
                    WHERE aa.PfIdx = A.PfIdx AND aa.IsStatus='Y'
                    GROUP BY aa.PfIdx
                ) AS pointJson
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $arr_condition['IN']['C.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            from {$this->_table['predictFinal']} AS A
            inner join {$this->_table['predictProduct']} C ON A.PredictIdx = C.PredictIdx
            inner join {$this->_table['member']} D ON A.MemIdx = D.MemIdx
            inner join {$this->_table['predictCode']} E ON A.TakeMockPart = E.Ccd
            left join {$this->_table['sysCode']} F ON A.TakeAreaCcd = F.Ccd
            left join {$this->_table['cert_apply']} G ON A.MemIdx = G.MemIdx AND A.CertIdx = G.CertIdx AND G.ApprovalStatus='Y' AND G.IsStatus='Y'
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function listPredictFinalExcel($arr_condition = [], $order_by = [])
    {
        $column = /** @lang text */"
            C.ProdName,D.MemId,D.MemName,fn_dec(D.PhoneEnc) as phone,G.TakeNo
            ,E.CcdName as TakeMockPartName,F.CcdName as TakeAreaCcdName
            ,(
                SELECT GROUP_CONCAT(CONCAT(bb.CcdName,':',aa.Point,IF(ISNULL(aa.Level),'',CONCAT('(',aa.Level,')'))) ORDER BY PfpIdx SEPARATOR ', ') AS pointJson
                FROM {$this->_table['predictFinalPoint']} aa
                JOIN {$this->_table['predictCode']} bb ON aa.Subject = bb.Ccd
                WHERE aa.PfIdx = A.PfIdx AND aa.IsStatus='Y'
                GROUP BY aa.PfIdx
            ) AS pointJson                            
            ,A.StrengthPoint,A.AddPoint,A.AnnouncementType,A.EtcValues,A.RegDatm
        ";

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $from = "
            from {$this->_table['predictFinal']} AS A
            inner join {$this->_table['predictProduct']} C ON A.PredictIdx = C.PredictIdx
            inner join {$this->_table['member']} D ON A.MemIdx = D.MemIdx
            inner join {$this->_table['predictCode']} E ON A.TakeMockPart = E.Ccd
            left join {$this->_table['sysCode']} F ON A.TakeAreaCcd = F.Ccd
            left join {$this->_table['cert_apply']} G ON A.MemIdx = G.MemIdx AND A.CertIdx = G.CertIdx AND G.ApprovalStatus='Y' AND G.IsStatus='Y'
        ";
        // 사이트 권한 추가
        $arr_condition['IN']['C.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
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
        $group_by = " GROUP BY pg.TakeMockPart, pg.TakeArea, pg.PpIdx";
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
     * 과목 점수 리스트 (직렬100,200인 데이터 같은 직렬로 계산, 직렬300,800인 경우 필수과목(P)으로 정의)
     * @param $PredictIdx
     * @param $TakeMockPart
     * @return mixed
     */
    public function listUserForSubjectPoint($PredictIdx, $TakeMockPart)
    {
        $column = "pg.MemIdx, pg.PredictIdx, pg.PrIdx, pg.TakeArea, pg.PpIdx, pg.OrgPoint, pg.TakeMockPart";
        /*$column .= "pp.Type AS PpType";*/
        $column .= "
            ,CASE WHEN pg.TakeMockPart = '300' THEN 'P' WHEN pg.TakeMockPart = '800' THEN 'P'
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
     * 합격예측의 직렬별 지역 코드 리스트
     * 합격선 셈플 데이터 다운로드
     * @param string $predict_idx
     * @return mixed
     */
    public function areaForMockPartCodelist($predict_idx = '')
    {
        $column = "pp.PredictIdx, pp.MockPart AS TakeMockPart, pp.TakeMockPartName, pp.AreaGroupCode, ar.TakeArea, ar.TakeAreaName, pp.RowNum";
        $from = "
            FROM (
                SELECT
                Ccd AS TakeArea, GroupCcd, CcdName AS TakeAreaName
                FROM lms_sys_code
                WHERE GroupCcd = '712' AND Ccd != '712018' #전국제외
            ) AS ar
            INNER JOIN (
                SELECT p.PredictIdx, p.MockPart, pc.CcdName AS TakeMockPartName, '712' AS AreaGroupCode,(@rownum1 := @rownum1 + 1) AS RowNum
                FROM (
                    SELECT PredictIdx, SUBSTRING_INDEX(SUBSTRING_INDEX(a.MockPart, ',', TN.num), ',', -1) AS MockPart
                    FROM tmp_numbers AS TN, lms_product_predict AS a
                    WHERE a.PredictIdx = ?
                    AND CHAR_LENGTH(a.MockPart) - CHAR_LENGTH(REPLACE(a.MockPart, ',', '')) >= TN.num - 1
                ) AS p
                INNER JOIN lms_predict_code AS pc ON p.MockPart = pc.Ccd AND pc.IsUse = 'Y' AND pc.GroupCcd = 0
                ,(SELECT @rownum1 := 0) AS tmp
            ) AS pp ON ar.GroupCcd = pp.AreaGroupCode AND CASE WHEN pp.MockPart = '400' THEN ar.TakeArea = '712001' ELSE TRUE END #400인경우 서울만 조인
        ";

        $order_by = $this->_conn->makeOrderBy(['pp.RowNum' => 'ASC', 'pp.MockPart' => 'ASC', 'ar.TakeArea' => 'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $order_by, [$predict_idx])->result_array();
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
                $data[$key] = (empty($arr_sum[$key]) === true || $arr_sum[$key] <= 0 || $subject_cnt <= 0) ? '0' : round(sqrt($arr_sum[$key] / $subject_cnt), 2);
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

        $column = "CONCAT(A.TakeMockPart,'_', A.TakeArea,'_', A.PpIdx) AS addColumnKey, A.TakeMockPart, A.TakeArea, A.PpIdx, A.AvgAdjustPoint, B.Top5AvgOrgPoint";
        $from = "
            FROM (
                SELECT TakeMockPart, TakeArea, PpIdx, ROUND(AVG(AdjustPoint),2) AS AvgAdjustPoint
                FROM lms_predict_grades
                {$where}
                GROUP BY TakeMockPart, TakeArea, PpIdx
            ) AS A
            
            INNER JOIN (
                SELECT A.TakeMockPart, A.TakeArea, A.PpIdx, ROUND(AVG(A.AdjustPoint),2) AS Top5AvgOrgPoint
                FROM (
                    SELECT TakeMockPart, TakeArea, PpIdx, AdjustPoint
                        , PERCENT_RANK() OVER (PARTITION BY TakeMockPart, TakeArea, PpIdx ORDER BY AdjustPoint DESC) AS PaperPercRank
                    FROM lms_predict_grades
                    {$where}
                ) AS A
                WHERE A.PaperPercRank BETWEEN 0 AND {$percent}
                GROUP BY A.TakeMockPart, A.TakeArea, A.PpIdx
            ) AS B ON A.TakeMockPart = B.TakeMockPart AND A.TakeArea = B.TakeArea AND A.PpIdx = B.PpIdx
        ";
        $data = $this->_conn->query('select ' . $column . $from)->result_array();

        $result_data = [];
        foreach ($data as $row) {
            $result_data[$row['addColumnKey']]['TakeMockPart'] = $row['TakeMockPart'];
            $result_data[$row['addColumnKey']]['TakeArea'] = $row['TakeArea'];
            $result_data[$row['addColumnKey']]['PpIdx'] = $row['PpIdx'];
            $result_data[$row['addColumnKey']]['AvgAdjustPoint'] = $row['AvgAdjustPoint'];
            $result_data[$row['addColumnKey']]['Top5AvgOrgPoint'] = $row['Top5AvgOrgPoint'];
        }
        return $result_data;
    }

    /**
     * 최종합격예측서비스 데이터 삭제
     * @param $targetParams
     * @return array|bool
     */
    public function delFinalData($targetParams)
    {
        $this->_conn->trans_begin();
        try {
            $pf_idx = element('pf_idx',$targetParams);
            $predict_idx = element('predict_idx',$targetParams);
            $inputData['IsStatus'] = 'N';

            $this->_conn->set($inputData)->where('PfIdx', $pf_idx)->where('PredictIdx', $predict_idx)->where('IsStatus','Y');
            if ($this->_conn->update($this->_table['predictFinal']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->set($inputData)->where('PfIdx', $pf_idx)->where('PredictIdx', $predict_idx)->where('IsStatus','Y');
            if ($this->_conn->update($this->_table['predictFinalPoint']) === false) {
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
     * 최종합격예측서비스 가데이터입력
     * @param $params
     * @param array $form_data
     * @return array|bool
     */
    public function tempFinalDataUpload($params, $form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            //기본 엑셀 출력 배열 다시 셋팅
            array_splice($this->_temp_base_excel, 0, 3);

            $arr_ppidx = $this->getPpIdx($form_data);
            foreach ($params as $row) {
                $take_area = $row['B'];
                $final_point = $row['C'];
                $strength_point = $row['D'];
                $add_point = $row['E'];

                if (empty($take_area) === false) {
                    // 데이터 등록
                    $addRegData = [
                        'PredictIdx' => element('predictidx', $form_data),
                        'CertIdx' => element('cert_idx', $form_data),
                        'MemIdx' => 1000000,
                        'TakeMockPart' => element('take_mock_part', $form_data),
                        'TakeAreaCcd' => $take_area,
                        'StrengthPoint' => $final_point,
                        'AddPoint' => $strength_point,
                        'FinalPoint' => $add_point,
                        'IsStatus' => 'Y'
                    ];
                    if ($this->_conn->set($addRegData)->set('RegDatm', 'NOW()', false)->insert($this->_table['predictFinal']) === false) {
                        throw new \Exception('등록에 실패했습니다.');
                    }
                    $idx = $this->_conn->insert_id();

                    $addFinalPoint = [];
                    foreach ($this->_temp_base_excel as $sel_key => $sel_name) {
                        if (array_key_exists($sel_name, $row)) {
                            if (empty($row[$sel_name]) === false) {
                                $addFinalPoint[$sel_key] = $row[$sel_name];
                            } else {
                                $addFinalPoint[$sel_key] = 0;
                            }
                        }
                    }

                    foreach ($addFinalPoint as $pp_key => $pp_point) {
                        $addOriginData = [
                            'PredictIdx' => element('predictidx', $form_data),
                            'PfIdx' => $idx,
                            'MemIdx' => 1000000,
                            'Subject' => $arr_ppidx[$pp_key]['SubjectCode'],
                            'Point' => $pp_point,
                        ];
                        if ($this->_conn->set($addOriginData)->insert($this->_table['predictFinalPoint']) === false) {
                            throw new \Exception('점수등록에 실패했습니다.');
                        }
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
     * 최종합격예측서비스 합격자인증코드 등록
     * @param $params
     * @param array $input_data
     * @return array|bool
     */
    public function certExamDataUpload($params, $input_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $column = "CertIdx";
            $from = " FROM lms_cert ";
            $cert_idx = element('exam_cert_idx',$params);
            $exam_name = element('exam_name',$params);
            $cen_code = element('exam_cen_code',$params);

            $where = " WHERE CertIdx = ".$cert_idx." AND IsStatus = 'Y' AND IsUse = 'Y'";
            $query = $this->_conn->query('select ' . $column . $from . $where);
            $result = $query->row_array();
            if (empty($result) === true) {
                throw new \Exception('조회된 수강인증코드가 없습니다.');
            }

            $dataReg = [];
            foreach ($input_data as $key => $val) {
                $dataReg[$key]['CertIdx'] = $cert_idx;
                $dataReg[$key]['CenCode'] = $cen_code;
                $dataReg[$key]['ExamName'] = $exam_name;
                $dataReg[$key]['TakeKindCcd'] = $val['A'];
                $dataReg[$key]['TakeAreaCcd'] = $val['B'];
                $dataReg[$key]['PassTakeNumber'] = $val['C'];
            }

            if($dataReg) $this->_conn->insert_batch('lms_cert_examnumber', $dataReg);

            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 최종합격자수 등록
     * @param $params
     * @param array $input_data
     * @return array|bool
     */
    public function successfulDataUpload($params, $input_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'PredictIdx' => element('predict_idx', $params)
                ]
            ];
            $column = "PredictIdx";
            $from = " FROM {$this->_table['predictProduct']} ";
            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
            $result = $this->_conn->query('select ' . $column . $from . $where)->row_array();
            if (empty($result) === true) {
                throw new \Exception('조회된 합격예측 코드가 없습니다.');
            }

            if ($this->_conn->delete($this->_table['predictSuccessfulCount'], ['PredictIdx' => element('predict_idx', $params)]) === false) {
                throw new \Exception('등록된 합격자수 데이터 삭제에 실패했습니다.');
            }

            $addData = []; $i=0;
            foreach ($input_data as $row) {
                $addData[$i]['PredictIdx'] = element('predict_idx', $params);
                $addData[$i]['TakeMockPart'] = $row['A'];
                $addData[$i]['TakeArea'] = $row['B'];
                $addData[$i]['SuccessFulCount'] = $row['C'];
                $addData[$i]['IsUse'] = 'Y';
                $addData[$i]['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $i++;
            }

            if ($this->_conn->insert_batch($this->_table['predictSuccessfulCount'], $addData) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 최종합격자수 조회
     * @param $arr_condition
     * @param $order_by
     * @return mixed
     */
    public function listSuccessful($arr_condition, $order_by)
    {
        $column = "p.ProdName, ps.TakeMockPart, ps.TakeArea, pc.CcdName AS TakeMockPartName, sc.CcdName AS TakeAreaName, ps.SuccessFulCount, ps.IsUse, a.wAdminName, ps.RegDatm";
        $from = "
            FROM {$this->_table['predictSuccessfulCount']} AS ps
            INNER JOIN {$this->_table['predictProduct']} AS p ON ps.PredictIdx = p.PredictIdx
            INNER JOIN {$this->_table['predictCode']} AS pc ON ps.TakeMockPart = pc.Ccd
            INNER JOIN {$this->_table['sysCode']} AS sc ON ps.TakeArea = sc.Ccd
            LEFT JOIN {$this->_table['admin']} AS a ON ps.RegAdminIdx = a.wAdminIdx and a.wIsStatus='Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 최종합격자 수 단일 데이터 수정
     * @param array $params
     * @return array|bool
     */
    public function updateForSuccessful($params = [])
    {
        $this->_conn->trans_begin();
        try {
            $data = [
                'SuccessFulCount' => element('count', $params),
                'IsUse' => element('is_use', $params),
            ];
            $where = [
                'PredictIdx' => element('predict_idx', $params),
                'TakeMockPart' => element('take_mock_part', $params),
                'TakeArea' => element('take_area', $params),
            ];

            $this->_conn->set($data)->where($where);
            if ($this->_conn->update($this->_table['predictSuccessfulCount']) === false) {
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
     * 합격자 인증정보 확인 후 삭제
     * 인증된 회원정보 없을 경우 : 인증번호 삭제
     * 인증된 회원정보 있을 경우 : 경고메시지 띄움 -> 삭제동의할경우 certExamDataDelete 호출
     * @param $form_data
     * @return array|bool
     */
    public function chkCertApplyDataForDelete($form_data)
    {
        $column = "CertIdx";
        $from = " FROM lms_cert_apply ";
        $cert_idx = element('del_cert_exam_idx',$form_data);

        $where = " WHERE CertIdx = ".$cert_idx." AND IsStatus = 'Y'";
        $data = $this->_conn->query('select ' . $column . $from . $where)->result_array();
        if (empty($data) === false) {
            return [
                'ret_cd' => false,
                'ret_msg' => '인증된 회원정보가 있습니다.',
                'ret_status' => 200
            ];
        } else {
            $result = $this->certExamDataDelete($form_data);
        }
        return $result;
    }

    /**
     * 합격자 인증정보 삭제
     * @param $form_data
     * @return array|bool
     */
    public function certExamDataDelete($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $column = "CertIdx";
            $from = " FROM lms_cert ";
            $cert_idx = element('del_cert_exam_idx',$form_data);

            $where = " WHERE CertIdx = ".$cert_idx." AND IsStatus = 'Y' AND IsUse = 'Y'";
            $query = $this->_conn->query('select ' . $column . $from . $where);
            $result = $query->row_array();
            if (empty($result) === true) {
                throw new \Exception('조회된 수강인증코드가 없습니다.');
            }

            if ($this->_conn->delete('lms_cert_examnumber', ['CertIdx' => $cert_idx]) === false) {
                throw new \Exception('등록된 합격자 인증정보 삭제에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 합격예측 회원 데이터 삭제
     * @param $form_data
     * @return array|bool
     */
    public function predictRegistDelete($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'PredictIdx' => element('predict_idx', $form_data),
                    'PrIdx' => element('pr_idx', $form_data)
                ]
            ];
            $column = '*';
            $from = " FROM {$this->_table['predictRegister']} ";

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $register_data =  $this->_conn->query('select '.$column .$from .$where)->row_array();

            if (empty($register_data) === true) {
                throw new Exception('조회된 기본정보가 없습니다.');
            }

            $target_data = ['PredictIdx' => element('predict_idx', $form_data), 'PrIdx' => element('pr_idx', $form_data)];
            if($this->_conn->delete($this->_table['predictGradesOrigin'], $target_data) === false){
                throw new \Exception('삭제에 실패했습니다.(5)');
            }

            if($this->_conn->delete($this->_table['predictGrades'], $target_data) === false){
                throw new \Exception('삭제에 실패했습니다.(4)');
            }

            if($this->_conn->delete($this->_table['predictAnswerPaper'], $target_data) === false){
                throw new \Exception('삭제에 실패했습니다.(3)');
            }

            if($this->_conn->delete($this->_table['predictRegisterR'], $target_data) === false){
                throw new \Exception('삭제에 실패했습니다.(2)');
            }

            if($this->_conn->delete($this->_table['predictRegister'], $target_data) === false){
                throw new \Exception('삭제에 실패했습니다.(1)');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true];
    }

    public function originSampleDataDelete($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $target_data = [
                'PredictIdx' => element('predict_idx', $form_data),
                'PrIdx' => element('pr_idx', $form_data),
                'PgoIdx' => element('pgo_idx', $form_data),
                'MemIdx' => '1000000'
            ];
            if($this->_conn->delete($this->_table['predictGradesOrigin'], $target_data) === false){
                throw new \Exception('삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true];
    }

    /**
     * 합격예측에 설정된 직렬조회
     * 콤마(,) => ROW형태 변환
     */
    public function getMockPartListForPredict($predict_idx = null)
    {
        $column = "p.MockPart, c.CcdName AS MockPartName";
        $arr_condition = [
            'EQ' => [
                'PredictIdx' => $predict_idx
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['c.Ccd' => 'ASC'])->getMakeOrderBy();

        $from = "
            FROM (
                SELECT SUBSTRING_INDEX (SUBSTRING_INDEX(p.MockPart,',',numbers.n),',',-1) AS MockPart
                FROM (SELECT 1 n
                    UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5
                    UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10
                    UNION ALL SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15
                    UNION ALL SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19 UNION ALL SELECT 20
                    UNION ALL SELECT 21 UNION ALL SELECT 22 UNION ALL SELECT 23 UNION ALL SELECT 24 UNION ALL SELECT 25
                    UNION ALL SELECT 26 UNION ALL SELECT 27 UNION ALL SELECT 28 UNION ALL SELECT 29 UNION ALL SELECT 30
                    UNION ALL SELECT 31 UNION ALL SELECT 32 UNION ALL SELECT 33 UNION ALL SELECT 34 UNION ALL SELECT 35
                    UNION ALL SELECT 36 UNION ALL SELECT 37 UNION ALL SELECT 38 UNION ALL SELECT 39 UNION ALL SELECT 40
                    
                    ) numbers
                INNER JOIN {$this->_table['predictProduct']} AS p ON CHAR_LENGTH (p.MockPart) - CHAR_LENGTH(REPLACE(p.MockPart,',','')) >= numbers . n-1
                {$where}
            ) AS p
            INNER JOIN {$this->_table['predictCode']} AS c ON p.MockPart = c.Ccd AND c.GroupCcd = 0
        ";
        return $this->_conn->query("select ". $column . $from . $order_by)->result_array();
    }

    public function listAnswerPaperForExcel($arr_condition)
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
                m.MemId, c.CcdName AS TakeMockPartName, pa.RegDatm, pp.PaperName
                ,pq.QuestionType, pq.QuestionNO, pa.Answer
                ,GROUP_CONCAT(pq.QuestionNO ORDER BY pq.QuestionNO ASC) AS question_no
                ,GROUP_CONCAT(pa.Answer ORDER BY pq.QuestionNO ASC) AS member_answer
            ";
        $from = "
            FROM lms_predict_register AS r
            INNER JOIN lms_predict_code AS c ON r.TakeMockPart = c.Ccd
            INNER JOIN lms_predict_register_r_code AS rc ON r.PredictIdx = rc.PredictIdx AND r.PrIdx = rc.PrIdx
            INNER JOIN lms_predict_paper AS pp ON rc.PredictIdx = pp.PredictIdx AND rc.SubjectCode = pp.SubjectCode AND pp.IsStatus = 'Y' AND pp.IsUse = 'Y'
            INNER JOIN lms_predict_code_r_subject AS crs ON pp.PredictIdx = crs.PredictIdx AND pp.TakeMockPart = crs.TakeMockPart AND pp.SubjectCode = crs.SubjectCode AND crs.IsStatus = 'Y' AND crs.IsUse = 'Y'
            INNER JOIN lms_predict_answerpaper AS pa ON r.PredictIdx = pa.PredictIdx AND r.PrIdx = pa.PrIdx AND pp.PpIdx = pa.PpIdx
            INNER JOIN lms_predict_questions AS pq ON pa.PpIdx = pq.PpIdx AND pa.PqIdx = pq.PqIdx AND pq.IsStatus = 'Y'
            INNER JOIN lms_member AS m ON r.MemIdx = m.MemIdx
        ";

        $group_order_by = "GROUP BY r.PrIdx ORDER BY r.RegDatm ASC";
        return $this->_conn->query('select ' . $column . $from . $where . $group_order_by)->result_array();
    }
}
