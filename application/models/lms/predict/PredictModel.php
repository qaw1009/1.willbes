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

        'mockProduct' => 'lms_product_mock',
        'mockProductExam' => 'lms_product_mock_r_paper',
        'mockRegisterR' => 'lms_mock_register_r_paper',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_product_r_category',
        'ProductSale' => 'lms_Product_Sale',
        'ProductSMS' => 'lms_Product_Sms',
        'mockRegister' => 'lms_mock_register',

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

    ];


    public function __construct()
    {
        parent::__construct('lms');
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
                Hint1, Hint2, Hint3, Hint4, Hint5, Hint6, Hint7, Hint8, Hint9, Hint10, Cnt, SqUseYn
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
            Hint1, Hint2, Hint3, Hint4, Hint5, Hint6, Hint7, Hint8, Hint9, Hint10, Cnt, SqUseYn
        ";

        $from = "
            FROM
                {$this->_table['surveyQuestion']} 
        ";

        $obder_by = " ";
        $where = " WHERE SqIdx = ".$idx;

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
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
            Hint1, Hint2, Hint3, Hint4, Hint5, Hint6, Hint7, Hint8, Hint9, Hint10, Cnt, SqUseYn
        ";



        $from = "
            FROM
                {$this->_table['surveyQuestion']} 
        ";

        $obder_by = " ";
        $where = " WHERE SqUseYn = 'Y' ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
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

        $obder_by = " ORDER BY Ordering ASC";
        $where = " WHERE sqs.SqsIdx = ".$idx;
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
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

        $obder_by = " ";
        $where = " WHERE SpIdx = ".$idx;

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
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

        $obder_by = " GROUP BY sqs.SqsIdx";
        $where = " WHERE sqs.`SqsUseYn` = 'Y'";

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $Res = $query->result_array();

        return $Res;
    }


}
