<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegGoodsModel extends WB_Model
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

        'mockProduct' => 'lms_Product_Mock',
        'mockProductExam' => 'lms_Product_Mock_R_Paper',
        'Product' => 'lms_Product',
        'ProductSale' => 'lms_Product_Sale',
        'ProductCate' => 'lms_Product_R_Category',
        'ProductSMS' => 'lms_Product_Sms',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 메인리스트
     */
    public function mainList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['MB.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT EB.*, A.wAdminName, MB.SiteCode, MB.CateCode, MB.Ccd,
                   CONCAT(C1.CateName, ' > ', SC.CcdName) AS CateRouteName, SJ.SubjectName, PMS.wProfName,
                   (SELECT COUNT(*) FROM {$this->_table['mockExamQuestion']} AS EQ WHERE EB.MpIdx = EQ.MpIdx AND EQ.IsStatus = 'Y') AS ListCnt,
                   IF(MB.Isuse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS IsUseCate,
                   IF(MS.Isuse = 'N' OR SJ.IsUse = 'N', 'N', 'Y') AS IsUseSubject,
                   IF(P.Isuse = 'N' OR PMS.wIsUse = 'N', 'N', 'Y') AS IsUseProfessor
        ";
        $from = "
            FROM {$this->_table['mockExamBase']} AS EB
            JOIN {$this->_table['mockAreaCate']} AS MC ON EB.MrcIdx = MC.MrcIdx AND MC.IsStatus = 'Y'
            JOIN {$this->_table['mockSubject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y'
            JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND MS.IsStatus = 'Y'
            JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['sysCode']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
            JOIN {$this->_table['professor']} AS P ON EB.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE EB.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MB.SiteCode DESC\n";

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
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
            $this->_conn->trans_start();

            // lms_mock_paper 복사
            $sql = "
                INSERT INTO {$this->_table['mockExamBase']}
                    (SiteCode, MrsIdx, ProfIdx, PapaerName, Year, RotationNo, QuestionOption, AnswerNum, TotalScore, RegIp, RegAdminIdx, RegDate)
                SELECT SiteCode, MrsIdx, ProfIdx, CONCAT('복사-', PapaerName), Year, RotationNo, QuestionOption, AnswerNum, TotalScore, ?, ?, ?
                FROM {$this->_table['mockExamBase']}
                WHERE MpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($RegIp, $RegAdminIdx, $RegDatm, $idx));

            $nowMaIdx = $this->_conn->insert_id();

            // lms_mock_questions 복사
            $sql = "
                INSERT INTO {$this->_table['mockExamQuestion']}
                    (MpIdx, MalIdx, OrderNum, QuestionOption, RightAnswer, Scoring, Difficulty, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, MalIdx, OrderNum, QuestionOption, RightAnswer, Scoring, Difficulty, ?, ?, ?
                FROM {$this->_table['mockExamQuestion']}
                WHERE MpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($nowMaIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('복사에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowMaIdx]];
    }


    /**
     * 등록
     */
    public function store()
    {
        try {
            $this->_conn->trans_begin();

            $names = $this->mockCommonModel->makeUploadFileName(['TQ_','TE_']);

            // 데이터 저장
            $data = array(
                'SiteCode' => $this->input->post('siteCode'),
                'MrcIdx' => $this->input->post('moLink'),
                'ProfIdx' => $this->input->post('ProfIdx'),
                'PapaerName' => $this->input->post('PapaerName', true),
                'Year' => $this->input->post('Year'),
                'RotationNo' => $this->input->post('RotationNo'),
                'QuestionOption' => $this->input->post('QuestionOption'),
                'AnswerNum' => $this->input->post('AnswerNum'),
                'TotalScore' => $this->input->post('TotalScore'),

                'IsUse' => $this->input->post('IsUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDate' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            foreach ($names as $i => $it) { // 업로드 정보
                if($i == 0) {
                    $data['QuestionFile'] = $it['name'];
                    $data['RealQuestionFile'] = $it['real'];
                }
                if($i == 1) {
                    $data['QuestionFile'] = $it['name'];
                    $data['RealQuestionFile'] = $it['real'];
                }
            }

            $this->_conn->insert($this->_table['mockExamBase'], $data);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('저장에 실패했습니다.');
            }

            $nowMaIdx = $this->_conn->insert_id();

            // 파일 업로드
            $isSave = $this->uploadFileSave($nowMaIdx, $names, $this->input->post('_method'));
            if(!$isSave) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowMaIdx]];
    }


    /**
     * 수정
     */
    public function update()
    {
        try {
            $this->_conn->trans_begin();

            $names = $this->mockCommonModel->makeUploadFileName(['TQ_','TE_']);

            // 데이터 수정
            $data = array(
                'MrcIdx' => $this->input->post('moLink'),
                'ProfIdx' => $this->input->post('ProfIdx'),
                'PapaerName' => $this->input->post('PapaerName', true),
                'Year' => $this->input->post('Year'),
                'RotationNo' => $this->input->post('RotationNo'),
                'QuestionOption' => $this->input->post('QuestionOption'),
                'AnswerNum' => $this->input->post('AnswerNum'),
                'TotalScore' => $this->input->post('TotalScore'),

                'IsUse' => $this->input->post('IsUse'),
                'UpdDate' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            foreach ($names as $i => $it) { // 업로드 정보
                if($i == 0) {
                    $data['QuestionFile'] = $it['name'];
                    $data['RealQuestionFile'] = $it['real'];
                }
                if($i == 1) {
                    $data['QuestionFile'] = $it['name'];
                    $data['RealQuestionFile'] = $it['real'];
                }
            }
            $where = array('MpIdx' => $this->input->post('idx'));

            $this->_conn->update($this->_table['mockExamBase'], $data, $where);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('변경에 실패했습니다.');
            }

            // 파일 업로드
            $isSave = $this->uploadFileSave($this->input->post('idx'), $names, $this->input->post('_method'));
            if(!$isSave) {
                throw new Exception('파일 저장에 실패했습니다.');
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
     * 등록정보 조회(1건)
     */
    public function getExamBase($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $where = array('MpIdx' => $idx, 'IsStatus' => 'Y');

        // 기본정보
        $data = $this->_conn->get_where($this->_table['mockExamBase'], $where)->row_array();
        if(empty($data)) return false;

        // 문항정보
        $qData = $this->_conn->get_where($this->_table['mockExamQuestion'], $where)->result_array();


        // 등록된 카테고리정보 로드
        $moCate_name = $moCate_isUse = array();
        $condition = [
            'EQ' => ['MC.MrcIdx' => $data['MrcIdx']]
        ];
        $moCate = $this->mockCommonModel->moCateListAll($condition, '', '', false, true);
        if(empty($moCate)) return false;

        $moCate_name = array_column($moCate, 'CateRouteName', 'MrcIdx');
        $moCate_isUse = array_column($moCate, 'BaseIsUse', 'MrcIdx');


        // 등록된 교수정보 로드
        $professor = array();
        $condition = [
            'EQ' => ['P.ProfIdx' => $data['ProfIdx']]
        ];
        $professorDB = $this->searchProfessorModel->professorList($condition, '', '', false, false);
        if(empty($professorDB)) return false;

        foreach ($professorDB as $it) {
            $professor[] = array(
                'code' => $it['ProfIdx'],
                'txt' => $it['wProfName'] .' | '. $it['ProfIdx'] .' | '. $it['wProfId'] .' | '. (($it['BaseIsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>')
            );
        }

        // 문제영역 로드
        $areaList = $this->getAreaList($data['MrcIdx']);

        return array($data, $qData, $moCate_name, $moCate_isUse, $professor, $areaList);
    }


    /**
     * 과목검색 팝업리스트
     */
    public function searchExamList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['EB.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT EB.*, MB.CateCode, MB.Ccd,
                   CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName) AS CateRouteName, SJ.SubjectName, PMS.wProfName,
                   (SELECT COUNT(*) FROM {$this->_table['mockExamQuestion']} AS EQ WHERE EB.MpIdx = EQ.MpIdx AND EQ.IsStatus = 'Y') AS ListCnt
        ";
        $from = "
            FROM {$this->_table['mockExamBase']} AS EB            
            JOIN {$this->_table['site']} AS S ON EB.SiteCode = S.SiteCode
            JOIN {$this->_table['mockAreaCate']} AS MC ON EB.MrcIdx = MC.MrcIdx AND MC.IsStatus = 'Y'
            JOIN {$this->_table['mockSubject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y' AND MS.IsUse = 'Y'
            JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y' AND SJ.IsUse = 'Y'
            JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y' AND MB.IsUse = 'Y'
            JOIN {$this->_table['category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y' AND C1.IsUse = 'Y'
            JOIN {$this->_table['sysCode']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y' AND SC.IsUse = 'Y'
            JOIN {$this->_table['professor']} AS P ON EB.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y' AND P.IsUse = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y' AND PMS.wIsUse = 'Y'
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE EB.IsStatus = 'Y' AND EB.IsUse = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY EB.MpIdx DESC\n";

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        return array($data, $count);
    }


    /**
     * 과목검색 삭제
     */
    public function searchExamDel()
    {
        $data = array(
            'IsStatus' => 'N',
            'UpdDatm' => date("Y-m-d H:i:s"),
            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
        );
        $where = array('PmrpIdx' => $this->input->post('idx'));

        $this->_conn->update($this->_table['mockProductExam'], $data, $where);
        if ($this->_conn->affected_rows()) return true;
        else return false;
    }


    /**
     * 과목검색 정렬변경
     */
    public function searchExamSort()
    {
        $data = [];
        foreach ($sorting as $k => $v) {
            $data[] = array(
                'PmrpIdx' => $k,
                'OrderNum' => $v,
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
        }

        try {
            $this->_conn->trans_start();

            if($data) $this->_conn->update_batch($this->_table['mockProductExam'], $data, 'PmrpIdx');

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('정렬변경에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

    }
}
