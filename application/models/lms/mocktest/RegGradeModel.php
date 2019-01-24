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
        'mockGrade' => 'lms_mock_grades',
        'mockGradeLog' => 'lms_mock_grades_log',
        'answerNote' => 'lms_mock_wronganswernote',
        'vProduct' => 'vw_product_mocktest',
        'mockGroupR' => 'lms_mock_group_r_product',
        'mockGroup' => 'lms_mock_group'

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
        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT 
            MP.*, CONCAT(A.wAdminName,'\<br\>(', MP.RegDatm,')') AS wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, 
            PD.IsUse, PS.SalePrice, PS.RealSalePrice,          
            C1.CateName, C1.IsUse AS IsUseCate
            ,SC1.CcdName As AcceptStatusCcd_Name
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
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MP.ProdCode DESC\n";

        //echo $select . $from . $where . $order . $offset_limit;

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        // 데이터정리
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        foreach ($data as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
            $it['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
            $it['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';

            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if( !empty($codes[$mockKindCode][$mp]) ) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return array($data, $count);
    }


    /**
     * 메인리스트
     */
    public function privateList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";

        $select = "
                   SELECT  
                   MR.MemIdx, MP.*, A.wAdminName, MR.IsTake AS MrIsStatus, MR.MrIdx, MR.TakeNumber, MR.TakeArea,
                   (SELECT MemName FROM lms_member WHERE MemIdx = MR.MemIdx) AS MemName,
                   (SELECT CcdName FROM lms_sys_code WHERE Ccd = MR.TakeForm) AS TakeFormType,
                   (SELECT CcdName FROM lms_sys_code WHERE Ccd = MR.TakeArea) AS TakeAreaName,
                   (SELECT CONCAT(Phone1,'-',fn_dec(Phone2Enc),'-',phone3) FROM lms_member WHERE MemIdx = MR.MemIdx) AS Phone,
                   (SELECT SUM(AdjustPoint) FROM lms_mock_grades WHERE MemIdx = MR.MemIdx) AS AdjustSum,
                   (SELECT RegDatm FROM lms_mock_log WHERE MrIdx = MR.MrIdx ORDER BY RegDatm LIMIT 1) AS ExamRegDatm,
                   (
                        SELECT 
                            GROUP_CONCAT(SubjectName) 
                        FROM lms_mock_Register_r_paper AS RP
                             JOIN lms_product_subject AS PS ON RP.SubjectIdx = PS.SubjectIdx
                        WHERE 
                             RP.SubjectIdx IN (SELECT GROUP_CONCAT(SubjectIdx) FROM lms_mock_Register_r_paper WHERE ProdCode = MR.ProdCode AND MrIdx = MR.MrIdx GROUP BY MpIdx)
                             AND MrIdx = MR.MrIdx
                    ) AS SubjectName,
                   (SELECT SiteGroupName FROM lms_site_group WHERE SiteGroupCode = (SELECT SiteGroupCode FROM lms_site WHERE SiteCode = PD.SiteCode)) AS SiteName,
                   (SELECT RegDatm FROM lms.lms_mock_answerpaper WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
                   (SELECT 
                        SUM(IF(MA.IsWrong = 'Y', Scoring, '0')) AS Res 
                   FROM
                        lms_mock_paper AS MP
                        JOIN lms_mock_questions AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y'
                        JOIN lms_mock_answerpaper AS MA ON MQ.MqIdx = MA.MqIdx 
                        JOIN lms_mock_register AS MMR ON MMR.MrIdx = MA.MrIdx
                   WHERE 
                        MA.MemIdx = MR.MemIdx AND MMR.ProdCode = MR.ProdCode
                   ) AS TCNT,
                   (SELECT COUNT(*) FROM lms_mock_register_r_paper WHERE MrIdx = MR.MrIdx AND ProdCode = MR.ProdCode) AS KCNT,
                   (SELECT RegDatm FROM lms_mock_answerpaper WHERE MemIdx = MR.MemIdx AND ProdCode = MR.ProdCode ORDER BY RegDatm DESC LIMIT 1) Wdate,
                   PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
                   C1.CateName, C1.IsUse AS IsUseCate, IsDisplay, GradeOpenDatm
        ";
        $from = "
            FROM 
                lms_product_mock AS MP
                JOIN lms_Product AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN lms_product_r_category AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN lms_sys_category AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN lms_Product_Sale AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN lms_mock_register AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                LEFT JOIN wbs_sys_admin AS A ON MP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN lms_mock_group_r_product AS GR ON MP.ProdCode = GR.ProdCode AND GR.IsStatus = 'Y'
                LEFT JOIN lms_mock_group AS MG ON GR.MgIdx = MG.MgIdx AND MG.IsStatus = 'Y' AND MG.IsUse = 'Y'
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = " WHERE PD.IsStatus = 'Y' ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = " ORDER BY MP.ProdCode DESC ";

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        // 데이터정리
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        foreach ($data as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
            $it['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
            $it['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';

            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if( !empty($codes[$mockKindCode][$mp]) ) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return array($data, $count);
    }



    /**
     * 모의고사 정보 상세
     * @param array $prodcode
     * @return mixed
     */
    public function productInfo($prodcode){

        $column = "
            *,
            (
                SELECT COUNT(*) FROM (
                    SELECT * FROM  {$this->_table['mockAnswerTemp']} GROUP BY MemIdx
                ) AS A
                WHERE ProdCode = GP.ProdCode
            ) AS USERCNT,
            (
                SELECT MemId FROM {$this->_table['mockGradeLog']} WHERE ProdCode = GP.ProdCode ORDER BY Regdatm DESC LIMIT 1
            ) AS writer,
            (
                SELECT Regdatm FROM {$this->_table['mockGradeLog']} WHERE ProdCode = GP.ProdCode ORDER BY Regdatm DESC LIMIT 1
            ) AS wdate
        ";

        $from = "
            FROM
                {$this->_table['vProduct']} AS PD
                JOIN {$this->_table['mockGroupR']} AS GP ON PD.ProdCode = GP.ProdCode AND GP.IsStatus = 'Y'
                JOIN {$this->_table['mockGroup']} AS GR ON GP.MgIdx = GR.MgIdx AND GR.IsUse = 'Y' AND GR.IsStatus = 'Y'
        ";

        $obder_by = " ";

        $where = " WHERE PD.ProdCode = ".$prodcode;
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->row_array();

    }

    /**
     * 조정점수반영
     * @param array $formData
     * @return mixed
     */
    public function scoreMake($formData = [])
    {

        try {
            $this->_conn->trans_begin();

            $ProdCodeOrigin = element('ProdCode', $formData);

            $column = "
                ProdCode
            ";

            $from = "
                FROM
                    {$this->_table['mockGroupR']}  
            ";

            $obder_by = " ";

            $where = " WHERE MgIdx = (SELECT MgIdx FROM {$this->_table['mockGroupR']} WHERE ProdCode = ".$ProdCodeOrigin." AND IsStatus='Y' LIMIT 1) AND IsStatus = 'Y' ";

            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

            $groupProd = $query->result_array();

            foreach($groupProd as $key => $val) {
                $ProdCode = $val['ProdCode'];

                $this->_conn->where(['ProdCode' => $ProdCode]);

                if ($this->_conn->delete($this->_table['mockGrade']) === false) {
                    throw new \Exception('성적 삭제에 실패했습니다.');
                }

                // 데이터 입력
                $data = [
                    'MemId' => $this->session->userdata('admin_id'),
                    'ProdCode' => $ProdCode
                ];

                if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockGradeLog']) === false) {
                    throw new \Exception('시험데이터가 없습니다.');
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
                                                SELECT MpIdx, MemIdx FROM {$this->_table['mockAnswerPaper']} GROUP BY MemIdx, MpIdx
                                            ) AS I
                                            WHERE I.MpIdx = A.MpIdx
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
                                            MP.MpIdx = ".$vmp."
                                            GROUP BY MA.MemIdx, MA.MpIdx
                                            ORDER BY MpIdx, Res DESC
                                        ) AS A
                                    WHERE A.MpIdx = MP.MpIdx
                                    GROUP BY A.MpIdx
                                 ),2) AS total
                            FROM
                                {$this->_table['mockExamBase']} AS MP
                                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                                LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS MA ON MQ.MqIdx = MA.MqIdx AND ProdCode = " . $ProdCode . "
                                JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MA.MrIdx AND MR.IsStatus = 'Y' 
                            WHERE 
                                MP.MpIdx = ".$vmp."
                            GROUP BY MR.MemIdx, MP.MpIdx
                            ORDER BY MP.MpIdx
                        )AS B
                    ";

                    $obder_by = " GROUP BY B.MpIdx ";

                    $where = " ";
                    //return "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
                    $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

                    $tresult = $query->row_array();

                    $arrMP[$vmp]['SUMAVG'] = $tresult['TOT'];
                }

                // 원점수평균/MpIdx/인원
                $column = "
                    A.MpIdx, 
                    ROUND((SUM(Res) / (
                        SELECT COUNT(MemIdx) FROM (
                            SELECT MpIdx, MemIdx FROM {$this->_table['mockAnswerPaper']} GROUP BY MemIdx, MpIdx
                        ) AS I
                        WHERE I.MpIdx = A.MpIdx
                    )),2) AS AVG, 
                    (
                        SELECT COUNT(MemIdx) FROM (
                            SELECT MpIdx, MemIdx FROM {$this->_table['mockAnswerPaper']} GROUP BY MemIdx, MpIdx
                        ) AS I
                        WHERE I.MpIdx = A.MpIdx
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
                        MP.MpIdx IN (
                                    " . $MpIdxIn . "
                                )
                        AND MA.ProdCode = " . $ProdCode . " AND MP.IsStatus = 'Y'
                        GROUP BY MA.MemIdx, MA.MpIdx
                        ORDER BY MpIdx, Res DESC
                    ) AS A
                ";

                $obder_by = " GROUP BY MpIdx ";

                $where = " ";
                //return "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

                $wresult = $query->result_array();

                foreach ($wresult AS $key => $val) {
                    $mp = $val['MpIdx'];
                    $avg = $val['AVG'];
                    $cnt = $val['CNT'];
                    $arrMP[$mp]['AVG'] = $avg;
                    $arrMP[$mp]['CNT'] = $cnt;
                }

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
                                    SELECT MpIdx, MemIdx FROM {$this->_table['mockAnswerPaper']} GROUP BY MemIdx, MpIdx
                                ) AS I
                                WHERE I.MpIdx = A.MpIdx
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
                            MP.MpIdx IN (
                                    " . $MpIdxIn . "
                            )
                            GROUP BY MA.MemIdx, MA.MpIdx
                          ORDER BY MpIdx, Res DESC
                        ) AS A
                        WHERE A.MpIdx = MP.MpIdx
                        GROUP BY MpIdx
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

                $obder_by = " GROUP BY MemIdx, MpIdx
                              ORDER BY MpIdx, Res DESC ";

                $where = "WHERE MP.MpIdx IN ( " . $MpIdxIn . " ) ";

                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

                $result = $query->result_array();

                $tempMp = '';
                $Rank = 1;

                foreach ($result AS $key => $val) {

                    if ($tempMp != $val['MpIdx']) $Rank = 1;
                    $currMp = $val['MpIdx'];

                    $tempRes = '';
                    //조정점수 반영로직
                    if ($arrMockType[$currMp] == 'S') {
                        //선택과목은 아래와 같은 계산법을 따른다.
                        /*
                         * 원점수평균 = 선택과목점수총합 / 응시자수
                         * 원점수표준편차 = 루트( (응시자점수 - 원점수평균)제곱(총) / (응시자수 - 1) )
                         * 조정점수 = (응시자점수 - 선택과목의평균점수 / 원점수표준편차) * 10 + 50
                         *
                         */

                        //가산점반영점수
                        $g_num = $val['Res'];

                        // 원점수평균 = 선택과목 점수총합 / 응시자수
                        $wonAVG = $val['won'];
                        $sumAVG = $arrMP[$currMp]['SUMAVG'];

                        // 응시자수
                        $pcnt = $arrMP[$currMp]['CNT'];

                        //표준편차
                        $tempRes = sqrt($sumAVG / ($pcnt - 1));

                        //$str .= "루트((".$g_num."(가산점반영원점수) - ".$wonAVG."(원점수평균))제곱(총) / (".$pcnt."(응시자수) - 1))";

                        //조정점수
                        $AdjustPoint = round(($g_num - $wonAVG / $tempRes) * 10 + 50, 2);
                        //$str .= "반올림(".$g_num." - ".$wonAVG." / ".$tempRes.") * 10 + 50)";
                        //if($currMp == '10045') return $str;

                    } else {
                        // 원점수평균 = 선택과목 점수총합 / 응시자수
                        $sumAVG = $arrMP[$currMp]['SUMAVG'];

                        // 응시자수
                        $pcnt = $arrMP[$currMp]['CNT'];
                        //표준편차
                        $tempRes = sqrt($sumAVG / ($pcnt - 1));

                        //필수과목일경우 가산점만 반영한다.
                        $AdjustPoint = $val['Res'];
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
                        'Rank' => $Rank,
                        'StandardDeviation' => $tempRes
                    ];

                    $Rank++;
                    $tempMp = $val['MpIdx'];

                    if ($this->_conn->set($data)->insert($this->_table['mockGrade']) === false) {
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
     * 모의고사 과목상세
     * @param array $prodcode
     * @return mixed
     */
    public function subjectDetail($ProdCode){

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

        $where = "WHERE PM.`ProdCode` = '" . $ProdCode . "' AND MP.IsStatus = 'Y' ";
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
        $column = "
                    TakeMockPart, CcdName
                ";

        $from = "
                    FROM
                        {$this->_table['mockExamBase']} AS MP
                        JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                        JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y'
                        JOIN lms_sys_code AS CD ON TakeMockPart = Ccd AND CD.IsStatus='Y' AND CD.IsUse='Y'
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
                            JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' AND TakeMockPart = '".$val['TakeMockPart']."' 
                    ) AS I
                    WHERE I.MpIdx = A.MpIdx 
                ) AS opAVG, 
                SUM(AdjustPoint) / (
                    SELECT COUNT(MemIdx) FROM (
                        SELECT 
                            MG.MpIdx, MG.MemIdx 
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' AND TakeMockPart = '".$val['TakeMockPart']."' 
                    ) AS I
                    WHERE I.MpIdx = A.MpIdx 
                ) AS adAVG, 
                StandardDeviation, (
                    SELECT COUNT(MemIdx) FROM (
                        SELECT 
                            MG.MpIdx, MG.MemIdx 
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' AND TakeMockPart = '".$val['TakeMockPart']."' 
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
                            JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MG.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'  
                            JOIN {$this->_table['mockRegisterR']} AS RP ON MG.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                        WHERE
                        MP.MpIdx IN (
                                $MpIdxIn
                            )
                        AND TakeMockPart = '".$val['TakeMockPart']."'
                        AND MG.ProdCode = '" . $ProdCode . "' AND MP.IsStatus = 'Y'
                        GROUP BY MpIdx, MR.MemIdx
                        ORDER BY TakeMockPart, MG.MpIdx
                    ) AS A 
                ";

            $obder_by = " GROUP BY A.MpIdx";

            $where = " ";
            //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
            $data = $query->result_array();
            foreach ($data as $key => $val){
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
        /*var_dump($TakeMockPartSet);*/
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
    public function subjectDetailPrivate($ProdCode){

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

        $where = "WHERE PM.`ProdCode` = '" . $ProdCode . "' AND MP.IsStatus = 'Y' ";
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
        $column = "
                    TakeMockPart, CcdName
                ";

        $from = "
                    FROM
                        {$this->_table['mockExamBase']} AS MP
                        JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                        JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y'
                        JOIN lms_sys_code AS CD ON TakeMockPart = Ccd AND CD.IsStatus='Y' AND CD.IsUse='Y'
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
                            JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' AND TakeMockPart = '".$val['TakeMockPart']."' 
                    ) AS I
                    WHERE I.MpIdx = A.MpIdx 
                ) AS opAVG, 
                SUM(AdjustPoint) / (
                    SELECT COUNT(MemIdx) FROM (
                        SELECT 
                            MG.MpIdx, MG.MemIdx 
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' AND TakeMockPart = '".$val['TakeMockPart']."' 
                    ) AS I
                    WHERE I.MpIdx = A.MpIdx 
                ) AS adAVG, 
                StandardDeviation, (
                    SELECT COUNT(MemIdx) FROM (
                        SELECT 
                            MG.MpIdx, MG.MemIdx 
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MR.IsStatus = 'Y' AND TakeMockPart = '".$val['TakeMockPart']."' 
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
                            JOIN {$this->_table['mockGrade']} AS MG ON MG.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND ProdCode = '" . $ProdCode . "'
                            JOIN {$this->_table['mockRegister']} AS MR ON MR.MrIdx = MG.MrIdx AND MG.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'  
                            JOIN {$this->_table['mockRegisterR']} AS RP ON MG.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                        WHERE
                        MP.MpIdx IN (
                                $MpIdxIn
                            )
                        AND TakeMockPart = '".$val['TakeMockPart']."'
                        AND MG.ProdCode = '" . $ProdCode . "' AND MP.IsStatus = 'Y'
                        GROUP BY MpIdx, MR.MemIdx
                        ORDER BY TakeMockPart, MG.MpIdx
                    ) AS A 
                ";

            $obder_by = " GROUP BY A.MpIdx";

            $where = " ";
            //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
            $data = $query->result_array();
            foreach ($data as $key => $val){
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

        var_dump($TakeMockPartSet);

        if($rdata) $dataTotal['rdata'] = $rdata;
        if($TakeMockPartSet) $dataTotal['TakeMockPartSet'] = $TakeMockPartSet;
        if($MpIdxSet) $dataTotal['MpIdxSet'] = array_unique($MpIdxSet);

        return $dataTotal;
    }

}
