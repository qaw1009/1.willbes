<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegGradeModel extends WB_Model
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
        'member' => 'lms_member'

    ];


    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 메인리스트
     */
    public function mainList($conditionAdd = '', $limit = '', $offset = '')
    {
        $condition = ['IN' => ['PD.SiteCode' => get_auth_site_codes()]];    //사이트 권한 추가
        if ($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";

        $column = "
                MP.*, CONCAT(A.wAdminName,'\<br\>(', MP.RegDatm,')') AS wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, 
                PD.IsUse, PS.SalePrice, PS.RealSalePrice, CONCAT(TakeStartDatm,'~',TakeEndDatm) AS SETIME, CONCAT(TakeTime,' 분') AS TakeStr,
                (SELECT MgIdx FROM lms_mock_group_r_product WHERE ProdCode = PD.ProdCode AND IsStatus='Y') AS MgIdx,
                (SELECT COUNT(MemIdx) FROM {$this->_table['mockRegister']} WHERE IsStatus = 'Y' AND IsTake = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = (SELECT Ccd FROM {$this->_table['sysCode']} Where CcdName = 'online')) AS OnlineCnt,
                (SELECT COUNT(MemIdx) FROM {$this->_table['mockRegister']} WHERE IsStatus = 'Y' AND IsTake = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = (SELECT Ccd FROM {$this->_table['sysCode']} Where CcdName = 'off(학원)')) AS OfflineCnt,
                (SELECT COUNT(*) FROM {$this->_table['mockGrades']} WHERE ProdCode = PD.ProdCode) AS GradeCNT,  
                fn_ccd_name(MP.AcceptStatusCcd) AS AcceptStatusCcd,            
                C1.CateName, C1.IsUse AS IsUseCate,
                (
                    SELECT 
                      GradeOpenDatm 
                    FROM 
                      {$this->_table['mockGroup']} AS MG 
                      JOIN {$this->_table['mockGroupR']} AS GR ON MG.MgIdx = GR.MgIdx AND GR.IsStatus = 'Y'  
                    WHERE
                       GR.ProdCode = MP.ProdCode
                )AS GradeOpenDatm, 
                SC1.CcdName As AcceptStatusCcd_Name
        ";
        $from = "
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode 
            JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT OUTER JOIN {$this->_table['sysCode']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE PD.IsStatus = 'Y' ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true) . "\n";
        $order = "ORDER BY MP.ProdCode DESC\n";


        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        // 데이터정리
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        foreach ($data as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
            $it['TakePart_on'] = (in_array($applyType_on, $takeFormsCcds)) ? 'Y' : 'N';
            $it['TakePart_off'] = (in_array($applyType_off, $takeFormsCcds)) ? 'Y' : 'N';

            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if (!empty($codes[$mockKindCode][$mp])) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return array($data, $count);
    }


    /**
     * 메인리스트
     */
    public function privateList($conditionAdd = '', $limit = '', $offset = '')
    {
        $condition = ['IN' => ['PD.SiteCode' => get_auth_site_codes()]];    //사이트 권한 추가
        if ($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";

        $column = "
            MR.MemIdx, MP.*, A.wAdminName, MR.IsTake AS MrIsStatus, MR.MrIdx, MR.TakeNumber, MR.TakeArea,
            (SELECT MemName FROM {$this->_table['member']} WHERE MemIdx = MR.MemIdx) AS MemName,
            fn_ccd_name(MR.TakeForm) AS TakeFormType,
            fn_ccd_name(MR.TakeArea) AS TakeAreaName,
            (SELECT CONCAT(Phone1,'-',fn_dec(Phone2Enc),'-',phone3) FROM {$this->_table['member']} WHERE MemIdx = MR.MemIdx) AS Phone,
            (SELECT ROUND(SUM(AdjustPoint),2) FROM {$this->_table['mockGrades']} WHERE MemIdx = MR.MemIdx AND ProdCode = PD.Prodcode) AS AdjustSum,
            (SELECT RegDatm FROM {$this->_table['mockLog']} WHERE MrIdx = MR.MrIdx ORDER BY RegDatm LIMIT 1) AS ExamRegDatm,
            (
                SELECT 
                    GROUP_CONCAT(SubjectName) 
                FROM {$this->_table['mockRegisterR']} AS RP
                     JOIN {$this->_table['subject']} AS PS ON RP.SubjectIdx = PS.SubjectIdx
                WHERE 
                    RP.SubjectIdx IN (SELECT GROUP_CONCAT(SubjectIdx) FROM {$this->_table['mockRegisterR']} WHERE ProdCode = MR.ProdCode AND MrIdx = MR.MrIdx GROUP BY MpIdx)
                    AND MrIdx = MR.MrIdx
            ) AS SubjectName,
            (SELECT SiteGroupName FROM {$this->_table['siteGroup']} WHERE SiteGroupCode = (SELECT SiteGroupCode FROM lms_site WHERE SiteCode = PD.SiteCode)) AS SiteName,
            (SELECT RegDatm FROM {$this->_table['mockAnswerPaper']} WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
            fn_ccd_name(MR.TakeMockPart) AS TakeMockPartName,
            (SELECT 
                SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) AS Res 
            FROM
                lms_mock_paper AS MP
                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y'
                JOIN {$this->_table['mockAnswerPaper']} AS MA ON MQ.MqIdx = MA.MqIdx 
                JOIN {$this->_table['mockRegister']} AS MMR ON MMR.MrIdx = MA.MrIdx
            WHERE 
                MA.MemIdx = MR.MemIdx AND MMR.ProdCode = MR.ProdCode
            ) AS TCNT,
            (SELECT COUNT(*) FROM {$this->_table['mockRegisterR']} WHERE MrIdx = MR.MrIdx AND ProdCode = MR.ProdCode) AS KCNT,
            (SELECT RegDatm FROM {$this->_table['mockAnswerPaper']} WHERE MemIdx = MR.MemIdx AND ProdCode = MR.ProdCode ORDER BY RegDatm DESC LIMIT 1) Wdate,
            PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
            C1.CateName, C1.IsUse AS IsUseCate, IsDisplay, GradeOpenDatm
        ";
        $from = "
            FROM 
                {$this->_table['mockProduct']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['mockRegister']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
                LEFT OUTER JOIN {$this->_table['sysCode']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
                LEFT JOIN {$this->_table['mockGroupR']} AS GR ON MP.ProdCode = GR.ProdCode AND GR.IsStatus = 'Y'
                LEFT JOIN {$this->_table['mockGroup']} AS MG ON GR.MgIdx = MG.MgIdx AND MG.IsStatus = 'Y' AND MG.IsUse = 'Y'
                
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = " WHERE PD.IsStatus = 'Y' ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true) . "\n";
        $order = " ORDER BY MP.ProdCode DESC ";

        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        // 데이터정리
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        foreach ($data as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
            $it['TakePart_on'] = (in_array($applyType_on, $takeFormsCcds)) ? 'Y' : 'N';
            $it['TakePart_off'] = (in_array($applyType_off, $takeFormsCcds)) ? 'Y' : 'N';

            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if (!empty($codes[$mockKindCode][$mp])) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return array($data, $count);
    }

    /**
     * 신청목록-Excel
     */
    public function privateListExcel($conditionAdd = '')
    {

        $condition = ['IN' => ['PD.SiteCode' => get_auth_site_codes()]];    //사이트 권한 추가
        if ($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $column = "
            (SELECT MemName FROM {$this->_table['member']} WHERE MemIdx = MR.MemIdx) AS MemName,
            (SELECT CONCAT(Phone1,'-',fn_dec(Phone2Enc),'-',phone3) FROM {$this->_table['member']} WHERE MemIdx = MR.MemIdx) AS Phone,
            MR.TakeNumber,
            fn_ccd_name(MR.TakeForm) AS TakeFormType,
            MockYear,
            MockRotationNo,
            CONCAT('[',PD.ProdCode,']',PD.ProdName) AS ProdName,
            C1.CateName,
            fn_ccd_name(MR.TakeMockPart) AS TakeMockPartName,
            (
                SELECT 
                    GROUP_CONCAT(SubjectName) 
                FROM {$this->_table['mockRegisterR']} AS RP
                     JOIN {$this->_table['subject']} AS PS ON RP.SubjectIdx = PS.SubjectIdx
                WHERE 
                     RP.SubjectIdx IN (SELECT GROUP_CONCAT(SubjectIdx) FROM {$this->_table['mockRegisterR']} WHERE ProdCode = MR.ProdCode AND MrIdx = MR.MrIdx GROUP BY MpIdx)
                     AND MrIdx = MR.MrIdx
            ) AS SubjectName,
            fn_ccd_name(MR.TakeArea) AS TakeAreaName,
            (SELECT ROUND(SUM(AdjustPoint),2) FROM {$this->_table['mockGrades']} WHERE MemIdx = MR.MemIdx AND ProdCode = PD.Prodcode) AS AdjustSum,
            (SELECT RegDatm FROM {$this->_table['mockLog']} WHERE MrIdx = MR.MrIdx ORDER BY RegDatm LIMIT 1) AS ExamRegDatm
        ";
        $from = "
            FROM 
                {$this->_table['mockProduct']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['mockRegister']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
                LEFT OUTER JOIN {$this->_table['sysCode']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
                LEFT JOIN {$this->_table['mockGroupR']} AS GR ON MP.ProdCode = GR.ProdCode AND GR.IsStatus = 'Y'
                LEFT JOIN {$this->_table['mockGroup']} AS MG ON GR.MgIdx = MG.MgIdx AND MG.IsStatus = 'Y' AND MG.IsUse = 'Y'
                
        ";

        $where = " WHERE PD.IsStatus = 'Y' ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true) . "\n";
        $order = " ORDER BY MP.ProdCode DESC ";

        $sql = "Select @SEQ := @SEQ+1 as NO,mm.*
                    From  (SELECT @SEQ := 0) A,
                    (
                      SELECT 
                        $column     
                        $from  
                        $where 
                        $order              
                    ) mm Order by @SEQ DESC
        ";
        $data = $this->_conn->query($sql)->result_array();
        return $data;
    }

    /**
     * 모의고사 정보 상세
     * @param array $prodcode
     * @return mixed
     */
    public function productInfo($prodcode)
    {

        $column = "
            *,
            (
                SELECT COUNT(*) FROM (
                    SELECT * FROM  {$this->_table['mockAnswerTemp']} GROUP BY MemIdx
                ) AS A
                WHERE ProdCode = GP.ProdCode
            ) AS USERCNT,
            (
                SELECT MemId FROM {$this->_table['mockGradesLog']} WHERE ProdCode = GP.ProdCode ORDER BY Regdatm DESC LIMIT 1
            ) AS writer,
            (
                SELECT Regdatm FROM {$this->_table['mockGradesLog']} WHERE ProdCode = GP.ProdCode ORDER BY Regdatm DESC LIMIT 1
            ) AS wdate
        ";

        $from = "
            FROM
                {$this->_table['vProduct']} AS PD
                JOIN {$this->_table['mockGroupR']} AS GP ON PD.ProdCode = GP.ProdCode AND GP.IsStatus = 'Y'
                JOIN {$this->_table['mockGroup']} AS GR ON GP.MgIdx = GR.MgIdx AND GR.IsUse = 'Y' AND GR.IsStatus = 'Y'
        ";

        $obder_by = " ";

        $where = " WHERE PD.ProdCode = " . $prodcode;

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->row_array();

    }

    /**
     * 상품정보
     * @param array $arr_condition
     * @return mixed
     */
    public function productInfoV2($arr_condition = [])
    {

        $column = "
            MP.*, A.wAdminName, MR.IsTake AS MrIsStatus,
                   (SELECT RegDatm FROM {$this->_table['mockAnswerPaper']} WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
                   PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
                   C1.CateName, C1.IsUse AS IsUseCate, MR.OrderProdIdx, MR.MrIdx, MR.TakeNumber , M.MemName,
                   fn_ccd_name(MR.TakeMockPart) AS TakeMockPartName
        ";

        $from = "
            FROM 
                {$this->_table['mockProduct']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['mockRegister']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'
                JOIN {$this->_table['member']} AS M ON MR.MemIdx = M.MemIdx
                LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
        ";

        $obder_by = " ORDER BY `MP`.`ProdCode` DESC";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $data = $query->row_array();

        return $data;
    }

    /*
     * 회원시험접수정보
     *
     */
    public function privateExamInfo($prodcode, $memidx)
    {

        $column = "
                   MR.MemIdx, MP.*, A.wAdminName, MR.IsTake AS MrIsStatus, MR.MrIdx, MR.TakeNumber, MR.TakeArea, MR.TakeMockPart,
                   (SELECT RegDatm FROM {$this->_table['mockGradesLog']} WHERE ProdCode = " . $prodcode . " AND MemIdx = " . $memidx . " ORDER BY RegDatm DESC LIMIT 1) AS GradeDatm,
                   fn_ccd_name(MR.TakeMockPart) AS TakeMockPartName,
                   (SELECT MemName FROM {$this->_table['member']} WHERE MemIdx = MR.MemIdx) AS MemName,
                   (SELECT MemId FROM {$this->_table['member']} WHERE MemIdx = MR.MemIdx) AS MemId,
                   fn_ccd_name(MR.TakeForm) AS TakeFormType,
                   fn_ccd_name(MR.TakeArea) AS TakeAreaName,
                   (SELECT CONCAT(Phone1,'-',fn_dec(Phone2Enc),'-',phone3) FROM {$this->_table['member']} WHERE MemIdx = MR.MemIdx) AS Phone,
                   (SELECT ROUND(SUM(AdjustPoint),2) FROM {$this->_table['mockGrades']} WHERE MemIdx = MR.MemIdx AND ProdCode = PD.Prodcode) AS AdjustSum,
                   (SELECT RegDatm FROM {$this->_table['mockLog']} WHERE MrIdx = MR.MrIdx ORDER BY RegDatm LIMIT 1) AS ExamRegDatm,
                   (
                        SELECT 
                            GROUP_CONCAT(SubjectName) 
                        FROM {$this->_table['mockRegisterR']} AS RP
                             JOIN {$this->_table['subject']} AS PS ON RP.SubjectIdx = PS.SubjectIdx
                        WHERE 
                             RP.SubjectIdx IN (SELECT GROUP_CONCAT(SubjectIdx) FROM {$this->_table['mockRegisterR']} WHERE ProdCode = MR.ProdCode AND MrIdx = MR.MrIdx GROUP BY MpIdx)
                             AND MrIdx = MR.MrIdx
                    ) AS SubjectName,
                   (SELECT SiteGroupName FROM {$this->_table['siteGroup']} WHERE SiteGroupCode = (SELECT SiteGroupCode FROM lms_site WHERE SiteCode = PD.SiteCode)) AS SiteName,
                   (SELECT RegDatm FROM {$this->_table['mockAnswerPaper']} WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
                   (SELECT 
                        SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) AS Res 
                   FROM
                        lms_mock_paper AS MP
                        JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y'
                        JOIN {$this->_table['mockAnswerPaper']} AS MA ON MQ.MqIdx = MA.MqIdx 
                        JOIN {$this->_table['mockRegister']} AS MMR ON MMR.MrIdx = MA.MrIdx
                   WHERE 
                        MA.MemIdx = MR.MemIdx AND MMR.ProdCode = MR.ProdCode
                   ) AS TCNT,
                   (SELECT COUNT(*) FROM {$this->_table['mockRegisterR']} WHERE MrIdx = MR.MrIdx AND ProdCode = MR.ProdCode) AS KCNT,
                   (SELECT RegDatm FROM {$this->_table['mockAnswerPaper']} WHERE MemIdx = MR.MemIdx AND ProdCode = MR.ProdCode ORDER BY RegDatm DESC LIMIT 1) Wdate,
                   PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
                   C1.CateName, C1.IsUse AS IsUseCate, IsDisplay, GradeOpenDatm
        ";
        $from = "
            FROM 
                {$this->_table['mockProduct']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['mockRegister']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
                LEFT OUTER JOIN {$this->_table['sysCode']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
                LEFT JOIN {$this->_table['mockGroupR']} AS GR ON MP.ProdCode = GR.ProdCode AND GR.IsStatus = 'Y'
                LEFT JOIN {$this->_table['mockGroup']} AS MG ON GR.MgIdx = MG.MgIdx AND MG.IsStatus = 'Y' AND MG.IsUse = 'Y'
                
        ";

        $obder_by = " ";

        $where = " WHERE MR.ProdCode=" . $prodcode . " AND MemIdx = " . $memidx;
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

        return $query->row_array();

    }

    /**
     * 크론탭에서 호출(성적오픈일에 성적데이터생성)
     * @param
     * @return result
     */
    public function todayScoreMake()
    {
        $column = "RP.MgIdx";

        $from = "
                FROM
                    lms_mock_group AS MG 
	                JOIN lms_Mock_Group_R_Product AS RP ON MG.MgIdx = RP.MgIdx
            ";

        $obder_by = " Group By RP.MgIdx";

        $where = " WHERE GradeOpenDatm = curdate() ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

        $res = $query->row_array();

        if ($res['MgIdx']){
            return $this->scoreMake($res['MgIdx'], 'cron');
        }
    }

    /**
     * 조정점수반영
     * @param $MgIdx $mode = cron or web
     * @return mixed
     */
    public function scoreMake($MgIdx, $mode)
    {
        try {
            $this->_conn->trans_begin();

            if(empty($MgIdx) == true){
                throw new \Exception('모의고사 그룹 미등록 상태입니다.');
            }

            $column = "
                ProdCode
            ";

            $from = "
                FROM
                    {$this->_table['mockGroupR']}  
            ";

            $obder_by = " ";

            $where = " 
            WHERE 
                MgIdx = " . $MgIdx . "
                AND IsStatus = 'Y' ";

            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

            $groupProd = $query->result_array();

            foreach ($groupProd as $key => $val) {
                $ProdCode = $val['ProdCode'];

                $this->_conn->where(['ProdCode' => $ProdCode]);

                if ($this->_conn->delete($this->_table['mockGrades']) === false) {
                    throw new \Exception('성적 삭제에 실패했습니다.');
                }

                // 데이터 입력
                if ($mode == 'web') {
                    $data = [
                        'MemId' => $this->session->userdata('admin_id'),
                        'ProdCode' => $ProdCode
                    ];
                } else {
                    $data = [
                        'MemId' => 'systemcron',
                        'ProdCode' => $ProdCode
                    ];
                }

                $is_insert = $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockGradesLog']);
                if ($is_insert === false) {
                    throw new \Exception('로그생성실패.');
                }

                //시험코드
                $column = "
                    MpIdx, MockType
                ";

                $from = "
                    FROM
                        {$this->_table['mockProduct']}  AS PM
                        JOIN {$this->_table['mockProductExam']} AS MP ON PM.Prodcode = MP.ProdCode
                ";

                $obder_by = " ORDER BY MockType, OrderNum ";

                $where = "WHERE PM.`ProdCode` = '" . $ProdCode . "' AND MP.IsStatus = 'Y' ";

                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

                $resMp = $query->result_array();
                $MpIdxIn = '';
                foreach ($resMp AS $key => $val) {
                    $vmp = $val['MpIdx'];
                    if ($key == 0) $MpIdxIn = "'" . $val['MpIdx'] . "'";
                    else          $MpIdxIn .= ",'" . $val['MpIdx'] . "'";
                    $arrMockType[$vmp] = $val['MockType'];

                    //원점수 평균총합 (응시자점수 - 원점수평균)제곱(총)
                    $column = "
                        MpIdx, ROUND(SUM(total),2) AS TOT
                    ";

                    $from = "
                        FROM    
                        (
                            SELECT  
                                MP.MpIdx,
                                POW((SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) + TotalScore * (AddPoint * 0.01)) -
                                    (
                                    SELECT SUM(Res) / (
                                            SELECT COUNT(MemIdx) FROM (
                                                SELECT MemIdx FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = " . $ProdCode . " AND MpIdx = " . $vmp . " GROUP BY MemIdx, MpIdx
                                            ) AS I
                                        ) AS R 
                                        FROM (
                                            SELECT 
                                                MA.IsWrong, MA.MpIdx, MQ.Scoring, MR.AddPoint,
                                                MA.ProdCode,
                                                SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) + TotalScore * (AddPoint * 0.01) AS Res
                                            FROM
                                                {$this->_table['mockExamBase']} AS MP
                                                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                                                LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS MA ON MQ.MqIdx = MA.MqIdx AND ProdCode = " . $ProdCode . "
                                                JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MA.MrIdx AND MR.IsStatus = 'Y' 
                                            WHERE 
                                                MP.MpIdx = " . $vmp . "
                                                GROUP BY MA.MemIdx, MA.MpIdx
                                                ORDER BY MpIdx, Res DESC
                                        ) AS A
                                   
                                 ),2) AS total
                            FROM
                                {$this->_table['mockExamBase']} AS MP
                                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                                LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS MA ON MQ.MqIdx = MA.MqIdx AND ProdCode = " . $ProdCode . "
                                JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MA.MrIdx AND MR.IsStatus = 'Y' 
                            WHERE 
                                MP.MpIdx = " . $vmp . "
                            GROUP BY MR.MemIdx
                        )AS B
                    ";

                    $obder_by = " ";

                    $where = " ";

                    $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

                    $tresult = $query->row_array();

                    $arrMP[$vmp]['SUMAVG'] = $tresult['TOT'];


                    // 원점수평균/MpIdx/인원
                    $column = "
                    A.MpIdx, 
                    ROUND((SUM(Res) / (
                        SELECT COUNT(MemIdx) FROM (
                            SELECT MemIdx FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = " . $ProdCode . " AND MpIdx = " . $vmp . " GROUP BY MemIdx
                        ) AS I
                    )),2) AS AVG, 
                    (
                        SELECT COUNT(MemIdx) FROM (
                            SELECT MemIdx FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = " . $ProdCode . " AND MpIdx = " . $vmp . " GROUP BY MemIdx
                        ) AS I
                    )AS CNT
                    ";

                    $from = "
                            
                        FROM
                        (
                            SELECT
                                MA.MpIdx,
                                MA.ProdCode,
                                SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) + TotalScore * (AddPoint * 0.01) AS Res 
                                FROM
                                    {$this->_table['mockExamBase']} AS MP
                                    JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                                    LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS MA ON MQ.MqIdx = MA.MqIdx AND ProdCode = " . $ProdCode . "
                                    JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MA.MrIdx AND MR.IsStatus = 'Y' 
                            WHERE
                                MP.MpIdx = " . $vmp . "
                                AND MA.ProdCode = " . $ProdCode . " AND MP.IsStatus = 'Y'
                            GROUP BY MA.MemIdx
                        ) AS A
                    ";

                    $obder_by = " ";

                    $where = " ";

                    $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

                    $wresult = $query->row_array();

                    $avg = $wresult['AVG'];
                    $cnt = $wresult['CNT'];
                    $arrMP[$vmp]['AVG'] = $avg;
                    $arrMP[$vmp]['CNT'] = $cnt;

                    // 응시자 개별과목 / 점수
                    $column = "
                        MQ.MqIdx,
                        MP.MpIdx,
                        AnswerNum, 
                        Scoring,
                        QuestionNO, 
                        MA.MemIdx,
                        MA.Answer,
                        MA.IsWrong,
                        MA.MrIdx,
                        (SELECT RemainSec FROM {$this->_table['mockLog']} WHERE LogIdx = MA.LogIdx) AS Rsec,
                        SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) AS OrgPoint,
                        
                        (
                            SELECT (SUM(Res) / (
                                    SELECT COUNT(MemIdx) FROM (
                                        SELECT MemIdx FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = " . $ProdCode . " AND MpIdx = " . $vmp . " GROUP BY MemIdx
                                    ) AS I
                                )) AS AVG FROM (
                                SELECT 
                                      MA.MpIdx,
                                      MA.ProdCode,
                                      SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) + TotalScore * (AddPoint * 0.01) AS Res
                                FROM
                                      {$this->_table['mockExamBase']} AS MP
                                      JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                                      LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS MA ON MQ.MqIdx = MA.MqIdx AND ProdCode = " . $ProdCode . "
                                      JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MA.MrIdx AND MR.IsStatus = 'Y' 
                                WHERE 
                                    MP.MpIdx = " . $vmp . "
                                GROUP 
                                    BY MA.MemIdx
                            ) AS A
                        )AS won,
                        ROUND(SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) + TotalScore * (AddPoint * 0.01), 2) AS Res
                    ";

                    $from = "
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                            LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS MA ON MQ.MqIdx = MA.MqIdx AND ProdCode = " . $ProdCode . "
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MA.MrIdx AND MR.IsStatus = 'Y' 
                    ";

                    $obder_by = " GROUP BY MemIdx  ORDER BY OrgPoint DESC";

                    $where = "WHERE MP.MpIdx = " . $vmp;
                    //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
                    $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

                    $result = $query->result_array();

                    // 랭킹 산정시 동일점수때문에 임시저장
                    $tempJum = '';
                    $Rank = 1;
                    $minusRank = 1;
                    foreach ($result AS $key => $val) {
                        $orgPoint = $val['OrgPoint'];
                        //조정점수 반영로직
                        if ($arrMockType[$vmp] == 'S') {
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
                            $wonAVG = $val['won'];
                            $sumAVG = $arrMP[$vmp]['SUMAVG'];

                            // 응시자수
                            $pcnt = $arrMP[$vmp]['CNT'];

                            //표준편차
                            $tempRes = round(sqrt($sumAVG / ($pcnt - 1)), 2);

                            //조정점수
                            $AdjustPoint = round((($g_num - $wonAVG) / $tempRes) * 10 + 50, 2);

                        } else {
                            // 원점수평균 = 선택과목 점수총합 / 응시자수
                            $sumAVG = $arrMP[$vmp]['SUMAVG'];

                            // 응시자수
                            $pcnt = $arrMP[$vmp]['CNT'];
                            //표준편차
                            $tempRes = round(sqrt($sumAVG / ($pcnt - 1)), 2);

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

                        // 데이터 입력
                        $data = [
                            'MemIdx' => $val['MemIdx'],
                            'MrIdx' => $val['MrIdx'],
                            'ProdCode' => $ProdCode,
                            'MpIdx' => $val['MpIdx'],
                            'UseTime' => $val['Rsec'],
                            'OrgPoint' => $val['OrgPoint'],
                            'AdjustPoint' => $AdjustPoint,
                            'Rank' => $rRank,
                            'StandardDeviation' => $tempRes
                        ];

                        $tempJum = $val['OrgPoint'];
                        $Rank++;

                        if ($this->_conn->set($data)->insert($this->_table['mockGrades']) === false) {
                            throw new \Exception('시험데이터가 없습니다.');
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
     * 모의고사 과목상세
     * @param array $prodcode
     * @return mixed
     */
    public function subjectDetail($ProdCode)
    {

        //시험코드
        $column = "
            MP.MpIdx, MP.MockType, 
            (SELECT SubjectName FROM {$this->_table['subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName
                ";

        $from = "
            FROM
                {$this->_table['mockProduct']}  AS PM
                JOIN {$this->_table['mockProductExam']} AS MP ON PM.Prodcode = MP.ProdCode
                JOIN {$this->_table['mockRegister']} AS MR ON PM.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                JOIN {$this->_table['mockRegisterR']} AS RP ON PM.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx AND MP.MpIdx = RP.MpIdx
                ";

        $obder_by = " GROUP BY MpIdx ORDER BY MockType, OrderNum";

        $where = " WHERE PM.`ProdCode` = '" . $ProdCode . "' AND MP.IsStatus = 'Y' ";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

        $resMp = $query->result_array();
        $MpIdxIn = '';
        foreach ($resMp AS $key => $val) {
            $vmp = $val['MpIdx'];
            if ($key == 0) $MpIdxIn = "'" . $val['MpIdx'] . "'";
            else          $MpIdxIn .= ",'" . $val['MpIdx'] . "'";
            $arrMockType[$vmp] = $val['MockType'];
            $arrSubjectName[$vmp] = $val['SubjectName'];
        }

        //시험코드
        $column = " TakeMockPart, CcdName ";

        $from = "
            FROM
                {$this->_table['mockExamBase']} AS MP
                JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS CD ON TakeMockPart = Ccd AND CD.IsStatus='Y' AND CD.IsUse='Y'
                ";

        $obder_by = " GROUP BY TakeMockPart";

        $where = " ";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

        $resMockPart = $query->result_array();
        $rdata = array();
        $TakeMockPartSet = array();
        $MpIdxSet = array();
        $dataTotal = array();

        foreach ($resMockPart AS $key => $val) {
            $TakeMockPart = $val['TakeMockPart'];
            $TakeMockPartSet[] = $TakeMockPart;
            $CcdName = $val['CcdName'];
            $column = "
                A.MpIdx, MAX(OrgPoint) AS opMax, MAX(AdjustPoint) AS adMax, 
                SUM(OrgPoint) / (
                    SELECT COUNT(MemIdx) FROM (
                        SELECT 
                            MG.MpIdx, MG.MemIdx 
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' AND TakeMockPart = '" . $val['TakeMockPart'] . "' 
                    ) AS I
                    WHERE I.MpIdx = A.MpIdx 
                ) AS opAVG, 
                SUM(AdjustPoint) / (
                    SELECT COUNT(MemIdx) FROM (
                        SELECT 
                            MG.MpIdx, MG.MemIdx 
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' AND TakeMockPart = '" . $val['TakeMockPart'] . "' 
                    ) AS I
                    WHERE I.MpIdx = A.MpIdx 
                ) AS adAVG, 
                StandardDeviation, (
                    SELECT COUNT(MemIdx) FROM (
                        SELECT 
                            MG.MpIdx, MG.MemIdx 
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' AND TakeMockPart = '" . $val['TakeMockPart'] . "' 
                    ) AS I
                    WHERE I.MpIdx = A.MpIdx 
                ) AS CNT
                ";

            $from = "
                    FROM (
                        SELECT
                            MR.TakeMockPart,
                            MG.MpIdx,
                            MG.ProdCode,
                            OrgPoint,
                            AdjustPoint,
                            StandardDeviation,
			                MR.MrIdx
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MG.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'  
                            JOIN {$this->_table['mockRegisterR']} AS RP ON MG.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                        WHERE
                        MP.MpIdx IN (
                                $MpIdxIn
                            )
                        AND TakeMockPart = '" . $val['TakeMockPart'] . "'
                        AND MG.ProdCode = '" . $ProdCode . "' AND MP.IsStatus = 'Y'
                        GROUP BY MpIdx, MR.MemIdx
                        ORDER BY TakeMockPart, MG.MpIdx
                    ) AS A 
                ";

            $obder_by = " GROUP BY A.MpIdx";

            $where = " ";

            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
            $data = $query->result_array();
            foreach ($data as $key => $val) {
                $mpidx = $val['MpIdx'];
                $MockType = $arrMockType[$mpidx];
                $subjectName = $arrSubjectName[$mpidx];

                $rdata[$TakeMockPart][$MockType][$mpidx]['MockType'] = $MockType;
                $rdata[$TakeMockPart][$MockType][$mpidx]['MpIdx'] = $val['MpIdx'];
                $rdata[$TakeMockPart][$MockType][$mpidx]['opMax'] = $val['opMax'];
                $rdata[$TakeMockPart][$MockType][$mpidx]['adMax'] = $val['adMax'];
                $rdata[$TakeMockPart][$MockType][$mpidx]['opAVG'] = $val['opAVG'];
                $rdata[$TakeMockPart][$MockType][$mpidx]['adAVG'] = $val['adAVG'];
                $rdata[$TakeMockPart][$MockType][$mpidx]['StandardDeviation'] = $val['StandardDeviation'];
                $rdata[$TakeMockPart][$MockType][$mpidx]['CNT'] = $val['CNT'];
                $rdata[$TakeMockPart][$MockType][$mpidx]['SubjectName'] = $subjectName;


                $MpIdxSet[] = $mpidx;
            }
            $rdata[$TakeMockPart]['CcdName'] = $CcdName;
        }
        $dataTotal['rdata'] = $rdata;
        $dataTotal['TakeMockPartSet'] = $TakeMockPartSet;
        $dataTotal['MpIdxSet'] = array_unique($MpIdxSet);

        return $dataTotal;
    }

    /**
     * 모의고사 개인성적 과목상세
     * @param array $prodcode
     * @return mixed
     */
    public function subjectDetailPrivate($ProdCode, $MemIdx)
    {

        //시험코드
        $column = "
                    MP.MpIdx, MP.MockType, 
                    (SELECT SubjectName FROM {$this->_table['subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName
                ";

        $from = "
                    FROM
                        {$this->_table['mockProduct']}  AS PM
                        JOIN {$this->_table['mockProductExam']} AS MP ON PM.Prodcode = MP.ProdCode
                        JOIN {$this->_table['mockRegister']} AS MR ON PM.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                        JOIN {$this->_table['mockRegisterR']} AS RP ON PM.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx AND MP.MpIdx = RP.MpIdx
                ";

        $obder_by = " GROUP BY MpIdx ORDER BY MockType, OrderNum";

        $where = "WHERE PM.`ProdCode` = '" . $ProdCode . "' AND MP.IsStatus = 'Y' AND MR.MemIdx = " . $MemIdx;
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

        $resMp = $query->result_array();
        $MpIdxIn = '';
        foreach ($resMp AS $key => $val) {
            $vmp = $val['MpIdx'];
            if ($key == 0) $MpIdxIn = "'" . $val['MpIdx'] . "'";
            else          $MpIdxIn .= ",'" . $val['MpIdx'] . "'";
            $arrMockType[$vmp] = $val['MockType'];
            $arrSubjectName[$vmp] = $val['SubjectName'];
        }

        $column = "
            A.MpIdx, MAX(OrgPoint) AS opMax, MAX(AdjustPoint) AS adMax, 
            SUM(OrgPoint) / (
                SELECT COUNT(MemIdx) FROM (
                    SELECT 
                        MG.MpIdx, MG.MemIdx 
                    FROM
                        {$this->_table['mockExamBase']} AS MP
                        JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                        JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                ) AS I
                WHERE I.MpIdx = A.MpIdx 
            ) AS opAVG, 
            (
                SELECT 
                    OrgPoint  
                FROM
                    {$this->_table['mockExamBase']} AS MP
                    JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                    JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                WHERE Mp.MpIdx = A.MpIdx AND MR.MemIdx = '" . $MemIdx . "' 
            ) AS pOrgPoint, 
            (
                SELECT 
                    AdjustPoint  
                FROM
                    {$this->_table['mockExamBase']} AS MP
                    JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                    JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                WHERE Mp.MpIdx = A.MpIdx AND MR.MemIdx = '" . $MemIdx . "' 
            ) AS pAdjustPoint,
            CONCAT((
                SELECT serial_number AS SNUM FROM (
                    SELECT  @s:=@s+1 AS serial_number, A.MemIdx  FROM
                    (
                        SELECT 
                             SUM(AdjustPoint) AS SAdjustPoint, MR.MemIdx  
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                        GROUP BY MR.MemIdx
                        ORDER BY SUM(AdjustPoint) DESC
                    ) AS A
                    ,
                    (SELECT @s:= 0) AS s
                ) AS B
                WHERE B.MemIdx = '" . $MemIdx . "'
		    ) ,'/', (
                SELECT MAX(CNT) FROM (
                    SELECT COUNT(MemIdx) AS CNT FROM (
                                SELECT 
                                    MG.MpIdx, MG.MemIdx 
                                FROM
                                    {$this->_table['mockExamBase']} AS MP
                                    JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                                    JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                            ) AS I
                    GROUP BY I.MpIdx
                ) AS K
            )) AS pSRank,
            CONCAT((
                SELECT 
                    Rank  
                FROM
                    {$this->_table['mockExamBase']} AS MP
                    JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                    JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                WHERE Mp.MpIdx = A.MpIdx AND MR.MemIdx = '" . $MemIdx . "' 
            ) ,'/', (
                SELECT COUNT(MemIdx) FROM (
                    SELECT 
                        MG.MpIdx, MG.MemIdx 
                    FROM
                        {$this->_table['mockExamBase']} AS MP
                        JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                        JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                ) AS I
                WHERE I.MpIdx = A.MpIdx 
            )) AS pRank,
            SUM(AdjustPoint) / (
                SELECT COUNT(MemIdx) FROM (
                    SELECT 
                        MG.MpIdx, MG.MemIdx 
                    FROM
                        {$this->_table['mockExamBase']} AS MP
                        JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                        JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                ) AS I
                WHERE I.MpIdx = A.MpIdx 
            ) AS adAVG,
            StandardDeviation, 
            (
                SELECT COUNT(MemIdx) FROM (
                    SELECT 
                        MG.MpIdx, MG.MemIdx 
                    FROM
                        {$this->_table['mockExamBase']} AS MP
                        JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                        JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                ) AS I
                WHERE I.MpIdx = A.MpIdx 
            ) AS CNT,
            (
                SELECT MAX(CNT) FROM (
                    SELECT COUNT(MemIdx) AS CNT FROM (
                                SELECT 
                                    MG.MpIdx, MG.MemIdx 
                                FROM
                                    {$this->_table['mockExamBase']} AS MP
                                    JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                                    JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' 
                            ) AS I
                    GROUP BY I.MpIdx
                ) AS K
            ) AS MAXCNT
            ";

        $from = "
                FROM (
                    SELECT
                        MR.TakeMockPart,
                        MG.MpIdx,
                        MG.ProdCode,
                        OrgPoint,
                        AdjustPoint,
                        StandardDeviation,
                        MR.MrIdx
                    FROM
                        {$this->_table['mockExamBase']} AS MP
                        JOIN {$this->_table['mockGrades']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                        JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MG.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'  
                        JOIN {$this->_table['mockRegisterR']} AS RP ON MG.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                    WHERE
                    MP.MpIdx IN (
                            $MpIdxIn
                        )
                    AND MG.ProdCode = '" . $ProdCode . "' AND MP.IsStatus = 'Y'
                    GROUP BY MpIdx, MR.MemIdx
                    ORDER BY TakeMockPart, MG.MpIdx
                ) AS A 
            ";

        $obder_by = " GROUP BY A.MpIdx";

        $where = " ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $data = $query->result_array();
        $MpIdxSet = array();
        $rdata = array();
        foreach ($data as $key => $val) {
            $mpidx = $val['MpIdx'];
            $MockType = $arrMockType[$mpidx];
            $subjectName = $arrSubjectName[$mpidx];
            $arrTRank = explode('/', $val['pRank']);
            $arrSRank = explode('/', $val['pSRank']);

            $trank = $arrTRank[0];
            $srank = $arrSRank[0];

            $rdata[$ProdCode][$MockType][$mpidx]['MockType'] = $MockType;
            $rdata[$ProdCode][$MockType][$mpidx]['MpIdx'] = $val['MpIdx'];
            $rdata[$ProdCode][$MockType][$mpidx]['opMax'] = $val['opMax'];
            $rdata[$ProdCode][$MockType][$mpidx]['adMax'] = $val['adMax'];
            $rdata[$ProdCode][$MockType][$mpidx]['opAVG'] = $val['opAVG'];
            $rdata[$ProdCode][$MockType][$mpidx]['pRank'] = $val['pRank'];
            $rdata[$ProdCode][$MockType][$mpidx]['adAVG'] = $val['adAVG'];
            $rdata[$ProdCode][$MockType][$mpidx]['tpct'] = round(100 - ((($trank) / $val['CNT']) * 100 - (100 / $val['CNT'])), 2);
            $rdata[$ProdCode][$MockType][$mpidx]['pOrgPoint'] = $val['pOrgPoint'];
            $rdata[$ProdCode][$MockType][$mpidx]['pAdjustPoint'] = $val['pAdjustPoint'];
            $rdata[$ProdCode][$MockType][$mpidx]['StandardDeviation'] = $val['StandardDeviation'];
            $rdata[$ProdCode][$MockType][$mpidx]['CNT'] = $val['CNT'];
            $rdata[$ProdCode][$MockType][$mpidx]['SubjectName'] = $subjectName;
            $rdata[$ProdCode]['pSRank'] = $val['pSRank'];
            $rdata[$ProdCode]['stpct'] = round(100 - ((($srank) / $val['MAXCNT']) * 100 - (100 / $val['MAXCNT'])), 2);

            $MpIdxSet[] = $mpidx;
        }

        $dataTotal['rdata'] = $rdata;
        $dataTotal['MpIdxSet'] = array_unique($MpIdxSet);

        return $dataTotal;
    }

    /**
     * 모의고사 학생별 문항상세
     * @param array $prodcode
     * @return mixed
     */
    public function questionAnswerList($condition = '', $limit = '', $offset = '')
    {
        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";

        $column = "
            
                CONCAT((SELECT MemName FROM lms_member WHERE MemIdx = MR.MemIdx),'(',
                (SELECT MemId FROM lms_member WHERE MemIdx = MR.MemIdx),')') AS MemName,
                TakeNumber, 
                (SELECT SubjectName FROM lms_product_subject WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
                QuestionNO, 
                Answer,
                IsWrong,
                MP.MpIdx, MP.MockType, MA.MqIdx
        ";
        $from = "
            FROM 
                {$this->_table['mockProduct']} AS PM
                JOIN {$this->_table['mockProductExam']} AS MP ON PM.Prodcode = MP.ProdCode
                JOIN {$this->_table['mockRegister']} AS MR ON PM.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                JOIN {$this->_table['mockRegisterR']} AS RP ON PM.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx AND MP.MpIdx = RP.MpIdx
                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx
                JOIN {$this->_table['mockAnswerPaper']} AS MA ON MR.MemIdx = MA.MemIdx AND MQ.MqIdx = MA.MqIdx AND MR.ProdCode = MA.Prodcode
        ";
        $selectCount = "SELECT COUNT(*) AS cnt FROM (SELECT MR.ProdCode";
        $where = " WHERE MR.IsStatus = 'Y' ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true) . "\n";
        $order = " ORDER BY MR.MemIdx, MA.MpIdx, MQ.QuestionNO ";
        $group = " ";
        //echo "<pre>".'SELECT'.$column . $from . $where . $group . $order . $offset_limit."</pre>";
        $data = $this->_conn->query('SELECT'.$column . $from . $where . $group . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where . $group . ") AS A")->row()->cnt;

        return array($data, $count);
    }

    /**
     * 과목정보호출
     * @param array $arr_condition
     * @return mixed
     */
    public function subjectCall($arr_condition = [])
    {

        $column = "
            (SELECT SubjectName FROM {$this->_table['subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
            MP.MpIdx, MockType, OrderNum, MR.MrIdx
        ";

        $from = "
            FROM
                {$this->_table['mockProduct']} AS PM
                JOIN {$this->_table['mockRegister']} AS MR ON PM.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                JOIN {$this->_table['mockRegisterR']} AS RP ON PM.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                JOIN {$this->_table['mockProductExam']} AS MP ON RP.MpIdx = MP.MpIdx AND RP.ProdCode = MP.ProdCode AND MP.IsStatus = 'Y'
        ";

        $obder_by = " ORDER BY MockType, OrderNum";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 종합분석 성적데이터 호출
     * @param array $MpIdx $ProdCode
     * @return mixed
     */
    public function gradeCall($ProdCode, $mode)
    {
        if ($mode == 'org') {
            $column = "
                MemIdx, SUM(OrgPoint) AS ORG,
                (
                    SELECT COUNT(*) FROM (
                        SELECT ProdCode, COUNT(*) FROM {$this->_table['mockGrades']} WHERE ProdCode = " . $ProdCode . " GROUP BY MemIdx
                    ) AS A
                ) AS COUNT,
                (
                    SELECT COUNT(*) FROM {$this->_table['mockGrades']} WHERE ProdCode = " . $ProdCode . " GROUP BY MemIdx LIMIT 1
                ) AS KCNT
            ";

            $from = "
                FROM
                    {$this->_table['mockGrades']} AS MG
            ";

            $obder_by = " GROUP BY MemIdx 
		                  ORDER BY ORG DESC ";

            $where = " WHERE ProdCode = " . $ProdCode;
        } else {
            $column = "
                MemIdx, SUM(AdjustPoint) AS AD,
                (
                    SELECT COUNT(*) FROM (
                        SELECT ProdCode, COUNT(*) FROM {$this->_table['mockGrades']} WHERE ProdCode = " . $ProdCode . " GROUP BY MemIdx
                    ) AS A
                ) AS COUNT,
                (
                    SELECT COUNT(*) FROM {$this->_table['mockGrades']} WHERE ProdCode = " . $ProdCode . " GROUP BY MemIdx LIMIT 1
                ) AS KCNT,
                (
                    SELECT MAX(ad) FROM(
                        SELECT SUM(AdjustPoint) AS ad FROM {$this->_table['mockGrades']} WHERE ProdCode = " . $ProdCode . " GROUP BY MemIdx
                    ) AS A
                ) AS ADMAX
            ";

            $from = "
                FROM
                    {$this->_table['mockGrades']} AS MG
            ";

            $obder_by = " GROUP BY MemIdx 
		                  ORDER BY AD DESC ";

            $where = " WHERE ProdCode = " . $ProdCode;
        }

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 종합분석 성적데이터 호출
     * @param array $MpIdx $ProdCode
     * @return mixed
     */
    public function gradeDetailCall($ProdCode)
    {

        $column = "
            MR.MemIdx,
            (
                SELECT COUNT(*) FROM (
                    SELECT ProdCode, COUNT(*) FROM {$this->_table['mockGrades']} GROUP BY MemIdx
                ) AS A
                WHERE ProdCode = MR.ProdCode	
            ) AS COUNT,
            (SELECT MAX(OrgPoint) FROM {$this->_table['mockGrades']} WHERE ProdCode = MR.ProdCode AND MpIdx = MG.MpIdx GROUP BY MpIdx) AS ORGMAX,
	        (SELECT MAX(AdjustPoint) FROM {$this->_table['mockGrades']} WHERE ProdCode = MR.ProdCode AND MpIdx = MG.MpIdx GROUP BY MpIdx) AS ADMAX,
	        (SELECT SUM(OrgPoint) FROM {$this->_table['mockGrades']} WHERE ProdCode = MR.ProdCode AND MpIdx = MG.MpIdx GROUP BY MpIdx) AS ORGSUM,
	        (SELECT SUM(AdjustPoint) FROM {$this->_table['mockGrades']} WHERE ProdCode = MR.ProdCode AND MpIdx = MG.MpIdx GROUP BY MpIdx) AS ADSUM,
            (SELECT SubjectName FROM {$this->_table['subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
            MP.MpIdx, MockType, OrderNum, MR.MrIdx, MG.*
        ";

        $from = "
            FROM
                {$this->_table['mockProduct']} AS PM
                JOIN {$this->_table['mockRegister']} AS MR ON PM.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                JOIN {$this->_table['mockRegisterR']} AS RP ON PM.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                JOIN {$this->_table['mockProductExam']} AS MP ON RP.MpIdx = MP.MpIdx AND RP.ProdCode = MP.ProdCode AND MP.IsStatus = 'Y'
                JOIN {$this->_table['mockGrades']} AS MG ON MR.MemIdx = MG.MemIdx AND RP.MpIdx = MG.MpIdx
        ";

        $obder_by = " ORDER BY MockType, OrderNum ";

        $where = " WHERE MR.ProdCode = " . $ProdCode;

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 과목별 문항분석 쿼리(mode = 1) , 영역 및 학습요소(mode = 2)
     * @param array $MpIdx $ProdCode
     * @return mixed
     */
    public function gradeSubjectDetailCall($ProdCode, $memidx, $mode)
    {

        $column = "
            PM.MockType,
            PM.OrderNum,
            MP.MpIdx,
            MQ.MqIdx,
            MQ.MalIdx,
            RightAnswer,
            (
                SELECT ROUND(ycnt / (ycnt + ncnt) * 100) FROM (
                    SELECT 
                     (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND IsWrong = 'Y') AS ycnt,
                     (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND IsWrong = 'N') AS ncnt,
                     MP.MpIdx
                    FROM
                    {$this->_table['mockExamBase']} AS MP
                    JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                    JOIN {$this->_table['mockProductExam']} AS PM ON Mp.MpIdx = PM.MpIdx AND PM.ProdCode = " . $ProdCode . " AND PM.IsStatus = 'Y'  
                    LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS AP ON MQ.MqIdx = AP.MqIdx  AND AP.ProdCode = " . $ProdCode . "
                    GROUP BY MP.MpIdx
                ) AS AA
                WHERE
                AA.MpIdx = AP.MpIdx	
            ) AS AVR,
            (
                SELECT ROUND(ycnt / (ycnt + ncnt) * 100) FROM (
                    SELECT 
                     (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND MqIdx = AP.MqIdx AND IsWrong = 'Y') AS ycnt,
                     (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND MqIdx = AP.MqIdx AND IsWrong = 'N') AS ncnt,
                     MP.MpIdx,AP.MqIdx
                    FROM
                    {$this->_table['mockExamBase']} AS MP
                    JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                    JOIN {$this->_table['mockProductExam']} AS PM ON Mp.MpIdx = PM.MpIdx AND PM.ProdCode = " . $ProdCode . " AND PM.IsStatus = 'Y' 
                    LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS AP ON MQ.MqIdx = AP.MqIdx  AND AP.ProdCode = " . $ProdCode . "
                    GROUP BY MQ.MqIdx
                ) AS AA
                WHERE
                AA.MpIdx = AP.MpIdx AND AA.MqIdx = AP.MqIdx	
            ) AS QAVR,
                if(MQ.Difficulty='T','상',(if(MQ.Difficulty='M','중','하')))AS Difficulty,
            AnswerNum, 
            QuestionNO, 
            Answer, IsWrong,
            (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND MemIdx = Ap.MemIdx AND IsWrong = 'Y') AS ycnt,
            (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND MemIdx = Ap.MemIdx AND IsWrong = 'N') AS ncnt,
            (SELECT AreaName FROM {$this->_table['mockAreaList']} WHERE MalIdx = MQ.MalIdx AND IsStatus = 'Y') AS areaName
        ";

        $from = "
            FROM
                {$this->_table['mockExamBase']} AS MP
                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                JOIN {$this->_table['mockProductExam']} AS PM ON Mp.MpIdx = PM.MpIdx AND PM.ProdCode = " . $ProdCode . " AND PM.IsStatus = 'Y'
                LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS AP ON MQ.MqIdx = AP.MqIdx AND AP.ProdCode = " . $ProdCode . " AND AP.MemIdx = " . $memidx . "
                
        ";

        if ($mode == 1) {
            $obder_by = " ORDER BY PM.MockType, PM.OrderNum, MP.MpIdx, QuestionNO ";
        } else {
            $obder_by = " ORDER BY PM.MockType, MQ.MalIdx, PM.OrderNum, MP.MpIdx, QuestionNO ";
        }


        $where = "";

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * OFF 응시자성적등록
     * @return array|bool
     */
    public function offGradeUpload($prodcode, $params = [])
    {
        //print_r($params);

        $this->_conn->trans_begin();

        try {
            $tempId = '';
            $logidx = '';
            foreach ($params as $key => $val) {
                //회원 정보호출
                $column = "
                    MB.MemIdx, MR.MrIdx
                ";

                $from = "
                    FROM {$this->_table['member']} AS MB
                         JOIN {$this->_table['mockRegister']} AS MR ON MB.MemIdx = MR.MemIdx AND MR.IsStatus = 'Y'
                ";

                $obder_by = "";

                $where = " WHERE MB.MemId = '". $val['A'] ."' AND ProdCode=".$prodcode;

                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
                $data = $query->row_array();

                if(empty($data['MrIdx'])==true){
                    throw new \Exception('모의고사 접수회원이 아닙니다.');
                }

                //로그테이블등록
                $log_data = [
                    'LogType' => 'S',
                    'RegIp' => '999999',
                    'RemainSec' => '999999',
                    'MrIdx' => $data['MrIdx']
                ];

                if ($this->_conn->set($log_data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockLog']) === false) {
                    throw new \Exception('시험 로그등록에 실패했습니다.');
                }
                // 등록된 게시판 식별자
                if ($tempId != $val['A']) {
                    $logidx = $this->_conn->insert_id();
                }

                $column = "
                    Answer
                ";

                $from = "
                    FROM
                        {$this->_table['mockExamQuestion']} AS MQ
                        JOIN {$this->_table['mockAnswerPaper']} AS MA ON MQ.MqIdx = MA.MqIdx AND MQ.MpIdx = MA.MpIdx
                ";

                $obder_by = "";

                $where = " WHERE MA.ProdCode = " . $prodcode . " AND MA.MemIdx = " . $data['MemIdx'] . " AND MA.MrIdx = " . $data['MrIdx'] . " AND MA.MpIdx = " . $val['B'] . " AND QuestionNO = " . $val['C'];

                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
                //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
                $IsData = $query->row_array();

                $column = "
                        QuestionNO, RightAnswer, MqIdx
                    ";

                $from = "
                        FROM
                            {$this->_table['mockExamQuestion']} 
                            
                    ";

                $obder_by = "";

                $where = " WHERE MpIdx = " . $val['B'] . " AND QuestionNO = " . $val['C'];

                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

                $indata = $query->row_array();

                if ($indata['RightAnswer'] == $val['D']) {
                    $okYN = 'Y';
                } else {
                    $okYN = 'N';
                }

                if ($IsData['Answer']) {
                    // 데이터 수정
                    $addData = [
                        'Answer' => $val['D'],
                        'IsWrong' => $okYN
                    ];

                    $this->_conn->set($addData)->set('RegDatm', 'NOW()', false)->where(['ProdCode' => $prodcode, 'MemIdx' => $data['MemIdx'], 'MrIdx' => $data['MrIdx'], 'MpIdx' => $val['B'], 'MqIdx' => $indata['MqIdx']])->update($this->_table['mockAnswerPaper']);

                    if (!$this->_conn->affected_rows()) {
                        throw new Exception('변경에 실패했습니다.');
                    }
                } else {
                    // 데이터 등록
                    $addData = [
                        'MemIdx' => $data['MemIdx'],
                        'MrIdx' => $data['MrIdx'],
                        'ProdCode' => $prodcode,
                        'MpIdx' => $val['B'],
                        'MqIdx' => $indata['MqIdx'],
                        'LogIdx' => $logidx,
                        'Answer' => $val['D'],
                        'IsWrong' => $okYN
                    ];

                    //print_r($addData);

                    if ($this->_conn->set($addData)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockAnswerPaper']) === false) {
                        throw new \Exception('등록에 실패했습니다.');
                    }
                }
                $tempId = $val['A'];
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

}
