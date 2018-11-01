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
        'ProductCate' => 'lms_Product_R_Category',
        'ProductSale' => 'lms_Product_Sale',
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
        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT MP.*, A.wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
            C1.CateName, C1.IsUse AS IsUseCate, GROUP_CONCAT(SC.CcdName) AS MockPart
        ";
        $from = "
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['sysCode']} AS SC ON SC.Ccd IN(MP.MockPart) AND SC.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
        ";
        $groupBy = "GROUP BY MP.ProdCode\n";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE MP.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MP.ProdCode DESC\n";

        $data = $this->_conn->query($select . $from . $where . $groupBy . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where . $groupBy)->row()->cnt;

        // todo 접수현황 추가


        // 문자열 필드 -> 배열
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        foreach ($data as &$it) {
            $tmp = explode(',', $it['MockPart']);
            $it['TakePart_on'] = ( in_array($applyType_on, $tmp) ) ? 'Y' : 'N';
            $it['TakePart_off'] = ( in_array($applyType_off, $tmp) ) ? 'Y' : 'N';
        }

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

            // 신규 상품코드 조회
            $prodcode = $this->_conn->getFindResult($this->_table['Product'], 'IFNULL(MAX(ProdCode) + 1, 200001) as ProdCode');
            $prodcode = $prodcode['ProdCode'];

            // lms_Product_Mock 복사
            $sql = "
                INSERT INTO {$this->_table['mockProduct']}
                    (ProdCode, TakePart, MockPart, TakeFormsCcds, TakeAreas1CCds, TakeAreas2Ccd, AddPointsCcd, MockYear, MockRotationNo, 
                     ClosingPerson, IsRegister, TakeType, TakeStartDatm, TakeEndDatm, TakeTime, IsUse,
                     RegIp, RegAdminIdx, RegDate)
                SELECT ?, TakePart, MockPart, TakeFormsCcds, TakeAreas1CCds, TakeAreas2Ccd, AddPointsCcd, MockYear, MockRotationNo, 
                       ClosingPerson, IsRegister, TakeType, TakeStartDatm, TakeEndDatm, TakeTime, 'N', ?, ?, ?
                FROM {$this->_table['mockProduct']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));


            // lms_Product_Mock_R_Paper 복사
            $sql = "
                INSERT INTO {$this->_table['mockProductExam']}
                    (ProdCode, MpIdx, MockType, OrderNum, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, MpIdx, MockType, OrderNum, ?, ?, ?
                FROM {$this->_table['mockProductExam']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));


            // lms_Product 복사
            $sql = "
                INSERT INTO {$this->_table['Product']}
                    (ProdCode, SiteCode, ProdName, ProdTypeCcd, SaleStartDatm, SaleEndDatm, SaleStatusCcd, PointApplyCcd, IsSms, IsUse,
                     RegIp, RegAdminIdx, RegDatm)
                SELECT ?, SiteCode, CONCAT('복사-', ProdName), ProdTypeCcd, SaleStartDatm, SaleEndDatm, SaleStatusCcd, PointApplyCcd, IsSms, 'N', ?, ?, ?
                FROM {$this->_table['Product']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));


            // lms_Product_R_Category 복사
            $sql = "
                INSERT INTO {$this->_table['ProductCate']}
                    (ProdCode, CateCode, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, CateCode, ?, ?, ?
                FROM {$this->_table['ProductCate']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));


            // lms_Product_Sale 복사
            $sql = "
                INSERT INTO {$this->_table['ProductSale']}
                    (ProdCode, SaleTypeCcd, SalePrice, SaleRate, SaleDiscType, RealSalePrice, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, SaleTypeCcd, SalePrice, SaleRate, SaleDiscType, RealSalePrice, ?, ?, ?
                FROM {$this->_table['ProductSale']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));


            // lms_Product_Sms 복사
            $sql = "
                INSERT INTO {$this->_table['ProductSMS']}
                    (ProdCode, SendTel, Memo, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, SendTel, Memo, ?, ?, ?
                FROM {$this->_table['ProductSMS']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));


            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('복사에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $prodcode]];
    }


    /**
     * 등록 (lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms)
     *
     * lms_Product > SaleStatusCcd 판매가능으로 상태고정
     * lms_Product_Mock > IsRegister 접수상태값으로 상태구분
     */
    public function store($SaleStartDatm, $SaleEndDatm, $TakeStartDatm, $TakeEndDatm)
    {
        $date = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_start();

            // 신규 상품코드 조회
            $prodcode = $this->_conn->getFindResult($this->_table['Product'], 'IFNULL(MAX(ProdCode) + 1, 200001) as ProdCode');
            $prodcode = $prodcode['ProdCode'];


            // lms_Product 저장
            $data = array(
                'ProdCode'      => $prodcode,
                'SiteCode'      => $this->input->post('siteCode'),
                'ProdName'      => $this->input->post('ProdName', true),
                'ProdTypeCcd'   => $this->config->item('sysCode_ProdTypeCcd', 'mock'),
                'SaleStartDatm' => $SaleStartDatm,
                'SaleEndDatm'   => $SaleEndDatm,
                'SaleStatusCcd' => $this->config->item('sysCode_SaleStatusCcd', 'mock'),
                'PointApplyCcd' => $this->config->item('sysCode_PointApplyCcd', 'mock'),
                'IsSms'         => $this->input->post('IsSms'),
                'IsUse'         => $this->input->post('IsUse'),
                'RegIp'         => $this->input->ip_address(),
                'RegDatm'       => $date,
                'RegAdminIdx'   => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['Product'], $data);

            // lms_Product_R_Category 저장
            $data = array(
                'ProdCode'    => $prodcode,
                'CateCode'    => $this->input->post('cateD1'),
                'RegIp'       => $this->input->ip_address(),
                'RegDatm'     => $date,
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['ProductCate'], $data);

            // lms_Product_Sale 저장
            $data = array(
                'ProdCode'      => $prodcode,
                'SaleTypeCcd'   => $this->config->item('sysCode_SaleTypeCcd', 'mock'),
                'SalePrice'     => $this->input->post('SalePrice'),
                'SaleRate'      => $this->input->post('SaleRate'),
                'SaleDiscType'  => $this->input->post('SaleDiscType'),
                'RealSalePrice' => $this->input->post('RealSalePrice'),
                'RegIp'         => $this->input->ip_address(),
                'RegDatm'       => $date,
                'RegAdminIdx'   => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['ProductSale'], $data);

            // lms_Product_Sms 저장
            $data = array(
                'ProdCode'    => $prodcode,
                'SendTel'     => str_replace('-', '', $this->input->post('SendTel')),
                'Memo'        => $this->input->post('Memo', true),
                'RegIp'       => $this->input->ip_address(),
                'RegDatm'     => $date,
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['ProductSMS'], $data);


            // lms_Product_Mock 저장
            $data = array(
                'ProdCode'       => $prodcode,
                'TakePart'       => $this->input->post('TakePart'),
                'MockPart'       => implode(',', $this->input->post('cateD2')),
                'TakeFormsCcds'  => implode(',', $this->input->post('TakeFormsCcds')),
                'TakeAreas1CCds' => implode(',', $this->input->post('TakeAreas1CCds')),
                'TakeAreas2Ccd'  => implode(',', $this->input->post('TakeAreas2Ccd')),
                'AddPointsCcd'   => implode(',', $this->input->post('AddPointsCcd')),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                'ClosingPerson'  => $this->input->post('ClosingPerson'),
                'IsRegister'     => $this->input->post('IsRegister'), // 접수상태
                'TakeType'       => $this->input->post('TakeType'),
                'TakeStartDatm'  => $TakeStartDatm,
                'TakeEndDatm'    => $TakeEndDatm,
                'TakeTime'       => $this->input->post('TakeTime'), // 분
                'IsUse'          => $this->input->post('IsUse'),
                'RegIp'          => $this->input->ip_address(),
                'RegDatm'        => $date,
                'RegAdminIdx'    => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['mockProduct'], $data);

            // lms_Product_Mock_R_Paper 저장
            if( $this->input->post('MpIdx') ) {
                $dataSubject = array();
                foreach ($this->input->post('MpIdx') as $k => $v) {
                    $dataSubject[] = array(
                        'ProdCode'    => $prodcode,
                        'MpIdx'       => $_POST['MpIdx'][$k],
                        'MockType'    => $_POST['MockType'][$k],
                        'OrderNum'    => $_POST['OrderNum'][$k],
                        'RegIp'       => $this->input->ip_address(),
                        'RegDatm'     => $date,
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                }
                if($dataSubject) $this->_conn->insert_batch($this->_table['mockProductExam'], $dataSubject);
            }


            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }


    /**
     * 수정
     */
    public function update($SaleStartDatm, $SaleEndDatm, $TakeStartDatm, $TakeEndDatm)
    {
        $date = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_start();

            // lms_Product 저장
            $data = array(
                'ProdName'      => $this->input->post('ProdName', true),
                'SaleStartDatm' => $SaleStartDatm,
                'SaleEndDatm'   => $SaleEndDatm,
                'IsSms'         => $this->input->post('IsSms'), // 문자사용여부
                'IsUse'         => $this->input->post('IsUse'),
                'UpdDatm'       => $date,
                'UpdAdminIdx'   => $this->session->userdata('admin_idx'),
            );
            $where = array('ProdCode' => $this->input->post('idx'));
            $this->_conn->update($this->_table['Product'], $data, $where);

            // lms_Product_R_Category 저장
            $data = array(
                'UpdDatm'     => $date,
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = array('ProdCode' => $this->input->post('idx'));
            $this->_conn->update($this->_table['ProductCate'], $data, $where);

            // lms_Product_Sale 저장
            $data = array(
                'SalePrice'     => $this->input->post('SalePrice'),
                'SaleRate'      => $this->input->post('SaleRate'),
                'SaleDiscType'  => $this->input->post('SaleDiscType'),
                'RealSalePrice' => $this->input->post('RealSalePrice'),
                'UpdDatm'       => $date,
                'UpdAdminIdx'   => $this->session->userdata('admin_idx'),
            );
            $where = array('ProdCode' => $this->input->post('idx'));
            $this->_conn->update($this->_table['ProductSale'], $data, $where);

            // lms_Product_Sms 저장
            $data = array(
                'SendTel'     => str_replace('-', '', $this->input->post('SendTel')),
                'Memo'        => $this->input->post('Memo', true),
                'UpdDatm'     => $date,
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = array('ProdCode' => $this->input->post('idx'));
            $this->_conn->update($this->_table['ProductSMS'], $data, $where);


            // lms_Product_Mock 저장
            $data = array(
                'TakeFormsCcds'  => implode(',', $this->input->post('TakeFormsCcds')),
                'TakeAreas1CCds' => implode(',', $this->input->post('TakeAreas1CCds')),
                'TakeAreas2Ccd'  => implode(',', $this->input->post('TakeAreas2Ccd')),
                'AddPointsCcd'   => implode(',', $this->input->post('AddPointsCcd')),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                'ClosingPerson'  => $this->input->post('ClosingPerson'),
                'IsRegister'     => $this->input->post('IsRegister'),
                'TakeType'       => $this->input->post('TakeType'),
                'TakeStartDatm'  => $TakeStartDatm,
                'TakeEndDatm'    => $TakeEndDatm,
                'TakeTime'       => $this->input->post('TakeTime'), // 분
                'IsUse'          => $this->input->post('IsUse'),
                'UpdDatm'        => $date,
                'UpdAdminIdx'    => $this->session->userdata('admin_idx'),
            );
            $where = array('ProdCode' => $this->input->post('idx'));
            $this->_conn->update($this->_table['mockProduct'], $data, $where);

            // lms_Product_Mock_R_Paper 저장
            $this->updateSubject($date);


            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }


    /**
     * 수정 - 과목부문 (삭제는 바로 처리)
     *
     */
    public function updateSubject($date)
    {
        $dataReg = $dataMod = array();

        if( !empty($this->input->post('chapterTotal')) ) {
            foreach ($this->input->post('chapterTotal') as $k => $v) {
                if ( empty($this->input->post('chapterExist')) || !in_array($v, $this->input->post('chapterExist')) ) { // 신규등록 데이터
                    $dataReg[] = array(
                        'ProdCode'    => $this->input->post('idx'),
                        'MpIdx'       => $_POST['MpIdx'][$k],
                        'MockType'    => $_POST['MockType'][$k],
                        'OrderNum'    => $_POST['OrderNum'][$k],
                        'RegIp'       => $this->input->ip_address(),
                        'RegDatm'     => $date,
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                } else { // 수정 데이터
                    $dataMod[] = array(
                        'PmrpIdx' => $v,
                        'MpIdx'       => $_POST['MpIdx'][$k],
                        'MockType'    => $_POST['MockType'][$k],
                        'OrderNum'    => $_POST['OrderNum'][$k],
                        'UpdDatm' => $date,
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                }
            }
        }

        if($dataReg) $this->_conn->insert_batch($this->_table['mockProductExam'], $dataReg);
        if($dataMod) $this->_conn->update_batch($this->_table['mockProductExam'], $dataMod, 'PmrpIdx');
    }


    /**
     * 등록정보 조회(1건)
     */
    public function getGoods($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        // 기본정보
        $sql = "
            SELECT MP.*,
                   PD.SiteCode, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsSms, PC.CateCode,
                   PS.SalePrice, PS.SaleRate, PS.SaleDiscType, PS.RealSalePrice,
                   SMS.SendTel, SMS.Memo
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['ProductSMS']} AS SMS ON MP.ProdCode = SMS.ProdCode AND SMS.IsStatus = 'Y'
            WHERE MP.IsStatus = 'Y' AND MP.ProdCode = '$idx'";

        $data = $this->_conn->query($sql)->row_array();

        $data['MockPart'] = explode(',', $data['MockPart']);
        $data['TakeFormsCcds'] = explode(',', $data['TakeFormsCcds']);
        $data['TakeAreas1CCds'] = explode(',', $data['TakeAreas1CCds']);
        $data['TakeAreas2Ccd'] = explode(',', $data['TakeAreas2Ccd']);
        $data['AddPointsCcd'] = explode(',', $data['AddPointsCcd']);


        // 과목정보
        $sql = "
            SELECT MPE.*, EB.Year, EB.RotationNo, EB.PapaerName, SJ.SubjectName, PMS.wProfName
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['mockProductExam']} AS MPE ON MP.ProdCode = MPE.ProdCode AND MPE.IsStatus = 'Y'
            JOIN {$this->_table['mockExamBase']} AS EB ON MPE.MpIdx = EB.MpIdx AND EB.IsStatus = 'Y'
            JOIN {$this->_table['mockAreaCate']} AS MC ON EB.MrcIdx = MC.MrcIdx AND MC.IsStatus = 'Y'
            JOIN {$this->_table['mockSubject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y'
            JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
            JOIN {$this->_table['professor']} AS P ON EB.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y'
            WHERE MP.IsStatus = 'Y' AND MP.ProdCode = '$idx'
            ORDER BY MPE.OrderNum ASC";

        $sData = $this->_conn->query($sql)->result_array();

        return array($data, $sData);
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
    public function searchExamSort($sorting)
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

        return true;
    }
}
