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

        'predictPaper' => 'lms_predict_paper',
        'predictQuestion' => 'lms_predict_questions',
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
            PP.ProdCode, PP.MockPart, PP.SiteCode, PP.ProdName, PP.TakeAreas1CCds, PP.AddPointCcds, PP.MockYear, PP.MockRotationNo, PP.TakeStartDatm, PP.TakeEndDatm, 
            PP.RegIp, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx, PP.IsUse, A.wAdminName
        ";

        $from = "
            FROM {$this->_table['predictProduct']} AS PP
            LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
        ";
        $selectCount = " SELECT COUNT(*) AS cnt";
        $where = " WHERE PP.ProdCode > 0 ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = " ORDER BY PP.ProdCode DESC\n";
        //echo "<pre>SELECT ". $column . $from . $where . $order . $offset_limit . "</pre>";
        $data = $this->_conn->query('SELECT' . $column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        // 직렬이름 추출
        //$mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        //$codes = $this->codeModel->getCcdInArray([$mockKindCode]);

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
            if($it['TakeStartDatm'] > date('Y-m-d H:i:s')){
                $dres = "접수대기";
            } else if($it['TakeStartDatm'] < date('Y-m-d H:i:s') && $it['TakeEndDatm'] > date('Y-m-d H:i:s')) {
                $dres = "접수중";
            } else {
                $dres = "접수마감";
            }

            $it['link'] = 'https://www.'.ENVIRONMENT.'.willbes.net/predict/index/'.$it['ProdCode'];
            $it['include'] = "프로모션 페이지 URL + /spidx/".$it['ProdCode'];

            $it['AcceptStatusCcd_Name'] = $dres;
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
	        PP.PpIdx, PP.PaperName, PP.AnswerNum, PP.TotalScore, PP.QuestionFile, PP.RealQuestionFile, PP.RegDate, PP.ProdCode, PP.SubjectCode, PP.Type, 
	        A.wAdminName, A2.wAdminName AS wAdminName2, PP.IsUse
        ";

        $from = "
            FROM 
                {$this->_table['predictPaper']} AS PP
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
       
            MemName,
            PR.MemIdx,
            MemId,
            fn_dec(M.PhoneEnc) AS Phone,
            (SELECT CcdValue FROM {$this->_table['predictCode']} WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM {$this->_table['sysCode']} WHERE Ccd = PR.TaKeArea) AS TaKeArea,
            TaKeNumber,
            if(LectureType = 1, '온라인강의', if(LectureType = 2, '학원강의', if(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            if(Period = 1, '6개월 이하', if(Period = 2, '1년 이하', if(Period = 3, '2년 이하', '2년 이상'))) AS Period,
            RegDatm

        ";


        $from = "
            FROM 
                {$this->_table['predictRegister']} AS PR
                JOIN {$this->_table['member']} AS M ON PR.MemIdx = M.MemIdx
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = " WHERE PR.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = " ORDER BY PR.RegDatm DESC";
        $data = $this->_conn->query('Select'. $column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;
        return array($data, $count);
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
                     QuestionFile, RealQuestionFile, ProdCode, SubjectCode, Type, IsUse, RegIp, RegAdminIdx, RegDate)
                SELECT CONCAT('복사-', PaperName), AnswerNum, TotalScore,
                       QuestionFile, RealQuestionFile, ProdCode, SubjectCode, Type, 'N', ?, ?, ?
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
            MemName,
            MemId,
            fn_dec(M.PhoneEnc) AS Phone,
            (SELECT CcdValue FROM {$this->_table['predictCode']} WHERE Ccd = PR.TakeMockPart) AS TakeMockPart,
            (SELECT CcdValue FROM {$this->_table['sysCode']} WHERE Ccd = PR.TaKeArea) AS TaKeArea,
            TaKeNumber,
            if(LectureType = 1, '온라인강의', if(LectureType = 2, '학원강의', if(LectureType = 3, '온라인 + 학원강의', '미수강'))) AS LectureType,
            if(Period = 1, '6개월 이하', if(Period = 2, '1년 이하', if(Period = 3, '2년 이하', '2년 이상'))) AS Period,
            RegDatm

        ";

        $from = "
            FROM 
                {$this->_table['predictRegister']} AS PR
                JOIN {$this->_table['member']} AS M ON PR.MemIdx = M.MemIdx
        ";

        $where = "WHERE PR.IsStatus = 'Y'";
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

    /**
     *  합격예측용 직렬호출
     */
    public function getSerialAll(){
        $column = "
            Ccd, CcdName, Type  
        ";

        $from = "
            FROM 
                {$this->_table['predictCode']} 
        ";

        $order_by = " ORDER BY OrderNum";
        $where = " WHERE IsUse = 'Y' AND GroupCcd = 0";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->result_array();

        return $Res;
    }

    /**
     *  합격예측용 기존데이터 호출
     */
    public function getProduct($ProdCode){
        $column = "
            PP.ProdCode, PP.MockPart, PP.SiteCode, PP.ProdName, PP.TakeAreas1CCds, PP.AddPointCcds, PP.MockYear, PP.MockRotationNo, PP.TakeStartDatm, PP.TakeEndDatm, 
            PP.RegIp, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx, PP.IsUse, A.wAdminName, A2.wAdminName AS wAdminName2
        ";

        $from = "
            FROM 
                {$this->_table['predictProduct']} AS PP
                LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN {$this->_table['admin']} AS A2 ON PP.UpdAdminIdx = A2.wAdminIdx
                
        ";

        $order_by = " ";
        $where = " WHERE PP.ProdCode = ".$ProdCode."";
        //echo "<pre>". 'select' . $column . $from . $where . $order_by . "</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by);
        $Res = $query->row_array();

        return $Res;
    }

    /**
     *  합격예측용 기존데이터 호출
     */
    public function getProductALL(){
        $column = "
            PP.ProdCode, PP.MockPart, PP.SiteCode, PP.ProdName, PP.TakeAreas1CCds, PP.AddPointCcds, PP.MockYear, PP.MockRotationNo, PP.TakeStartDatm, PP.TakeEndDatm, 
            PP.RegIp, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx, PP.IsUse, A.wAdminName, A2.wAdminName AS wAdminName2
        ";

        $from = "
            FROM 
                {$this->_table['predictProduct']} AS PP
                LEFT JOIN {$this->_table['admin']} AS A ON PP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN {$this->_table['admin']} AS A2 ON PP.UpdAdminIdx = A2.wAdminIdx
                
        ";

        $order_by = " ";
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
	        PP.PpIdx, PP.PaperName, PP.AnswerNum, PP.TotalScore, PP.QuestionFile, PP.RealQuestionFile, PP.RegDate, PP.ProdCode, PP.SubjectCode, PP.Type, PP.UpdDate, 
	        A.wAdminName, A2.wAdminName AS wAdminName2, PP.IsUse
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
    public function getSubject($ProdCode){

        $column = "
            Ccd, CcdName, pc.Type, if(pp.ProdCode != '','(등록완료)','') AS AddIs
        ";

        $from = "
            FROM 
                {$this->_table['predictCode']} AS pc
                LEFT JOIN {$this->_table['predictPaper']} AS pp ON pc.Ccd = pp.SubjectCode AND pp.ProdCode = ".$ProdCode;

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

            // 신규 상품코드 조회
            $prodcode = $this->_conn->getFindResult($this->_table['predictProduct'], 'IFNULL(MAX(ProdCode) + 1, 100001) as ProdCode');
            $prodcode = $prodcode['ProdCode'];

            // lms_Product_Mock 저장
            $data = array(
                'ProdCode'       => $prodcode,
                'MockPart'       => implode(',', $this->input->post('MockPart')),
                'SiteCode'      => $this->input->post('SiteCode'),
                'ProdName'      => $this->input->post('ProdName', true),
                //'AddPointCcds'   => implode(',', $this->input->post('AddPointCcds')),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                //'TakeStartDatm'  => ($this->input->post('TakeType') == 'A') ? null : $TakeStartDatm,
                //'TakeEndDatm'    => ($this->input->post('TakeType') == 'A') ? null : $TakeEndDatm,
                'RegIp'          => $this->input->ip_address(),
                'RegDatm'        => $date,
                'RegAdminIdx'    => $this->session->userdata('admin_idx'),
            );

            $this->_conn->insert($this->_table['predictProduct'], $data);

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $prodcode]];
    }

    /**
     * @return array|bool
     */
    public function update()
    {
        $date = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_start();

            // lms_Product_Mock 저장
            $data = array(
                'MockPart'       => implode(',', $this->input->post('MockPart')),
                'ProdName'      => $this->input->post('ProdName', true),
                //'AddPointCcds'   => implode(',', $this->input->post('AddPointCcds')),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                //'TakeStartDatm'  => ($this->input->post('TakeType') == 'A') ? null : $TakeStartDatm,
                //'TakeEndDatm'    => ($this->input->post('TakeType') == 'A') ? null : $TakeEndDatm,
                'RegIp'          => $this->input->ip_address(),
                'RegDatm'        => $date,
                'UpdAdminIdx'    => $this->session->userdata('admin_idx'),
            );

            $this->_conn->set($data)->set('UpdDatm', 'NOW()', false)->where(['ProdCode' => $this->input->post('idx')]);

            if ($this->_conn->update($this->_table['predictProduct']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

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
                'ProdCode' => $this->input->post('ProdCode'),
                'SubjectCode' => $this->input->post('SubjectCode'),
                'TotalScore' => $this->input->post('TotalScore'),
                'Type' => $this->input->post('Type'),
                'QuestionFile' => $names['QuestionFile']['name'],
                'RealQuestionFile' => $names['QuestionFile']['real'],
                'IsUse' => $this->input->post('IsUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDate' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );

            $this->_conn->insert($this->_table['predictPaper'], $data);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('저장에 실패했습니다.');
            }

            $nowIdx = $this->_conn->insert_id();

            $uploadSubPath = $this->upload_path_predict . $nowIdx;

            $isSave = $this->uploadFileSave($uploadSubPath, $names);
            if($isSave !== true) {
                throw new Exception('파일 저장에 실패했습니다.');
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
                'ProdCode' => $this->input->post('ProdCode'),
                'SubjectCode' => $this->input->post('SubjectCode'),
                'Type' => $this->input->post('Type'),
                'IsUse' => $this->input->post('IsUse'),
                'UpdDate' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
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
            sa.SaIdx, SubTitle, sa.SqIdx, Answer, sa.Comment, sa.TYPE, si.MemIdx, lm.MemName, lm.MemId, si.RegDatm
        ";

        $from = "
            FROM 
                {$this->_table['surveyProduct']} AS sp
                JOIN {$this->_table['surveyAnswer']} AS si ON sp.SpIdx = si.SpIdx
                JOIN {$this->_table['member']} AS lm ON si.MemIdx = lm.MemIdx
                JOIN {$this->_table['surveyAnswerDetail']} AS sa ON si.SaIdx = sa.SaIdx
                LEFT JOIN {$this->_table['surveyQuestionSetDetail']}  sr ON sa.SqIdx = sr.SqIdx AND sp.SqsIdx = sr.SqsIdx
        ";

        $order_by = " ORDER BY si.SaIdx, si.MemIdx, sr.GroupNumber ASC, sa.SqIdx ASC";
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


}
