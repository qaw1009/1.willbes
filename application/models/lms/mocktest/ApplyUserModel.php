<?php
/**
 * ======================================================================
 * 모의고사 접수현황 > 개별접수현황
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ApplyUserModel extends WB_Model
{

    private $_table = [
        'mockApply' => 'lms_Mock_Register',
        'mockApplySubject' => 'lms_Mock_Register_R_Paper',
        'mockProduct' => 'lms_Product_Mock',
        'mockProductExam' => 'lms_Product_Mock_R_Paper',
        'mockExamBase' => 'lms_mock_paper',
        'mockAreaCate' => 'lms_Mock_R_Category',
        'mockSubject' => 'lms_mock_r_subject',
        'mockPrint' => 'lms_mock_register_print_log',

        'subject' => 'lms_product_subject',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_Product_R_Category',
        'ProductSale' => 'lms_Product_Sale',
        'ProductSMS' => 'lms_Product_Sms',
        'category' => 'lms_sys_category',
        'sysCode' => 'lms_sys_code',
        'member' => 'lms_Member',
        'order' => 'lms_Order',
        'orderProduct' => 'lms_Order_Product',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 신청목록
     */
    public function mockRegistList($conditionAdd='', $limit='', $offset='', $rowtype='')
    {

        $condition = [ 'IN' => ['O.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";

        /* 신청 과목 정보 전체*/
        $subject_all = "
            SELECT GROUP_CONCAT(SJ.SubjectName)
            FROM {$this->_table['mockApplySubject']} AS MAS
            JOIN {$this->_table['subject']} AS SJ ON MAS.SubjectIdx = SJ.SubjectIdx
            WHERE MR.MrIdx = MAS.MrIdx
        ";

        /* 필수 신청 과목 정보*/
        $subject_ess = "
            SELECT GROUP_CONCAT(ps.SubjectName)
            from
                    lms_mock_register_r_paper mrp 
                    join lms_product_mock_r_paper pmp on mrp.ProdCode = pmp.ProdCode and mrp.MpIdx = pmp.MpIdx and pmp.IsStatus='Y'
                    join lms_mock_paper mp on pmp.MpIdx = mp.MpIdx and mp.IsStatus='Y'
                    join lms_mock_r_category mrc on mp.MrcIdx = mrc.MrcIdx and mrc.IsStatus='Y'
                    join lms_mock_r_subject mrs on  mrc.MrsIdx = mrs.MrsIdx and mrs.IsStatus='Y'
                    join lms_product_subject ps on mrs.SubjectIdx = ps.SubjectIdx 
            WHERE pmp.MockType='E' And mrp.MrIdx = MR.MrIdx 
        ";

        /* 선택 신청 과목 정보*/
        $subject_sub = "
            SELECT GROUP_CONCAT(ps.SubjectName)
            from
                    lms_mock_register_r_paper mrp 
                    join lms_product_mock_r_paper pmp on mrp.ProdCode = pmp.ProdCode and mrp.MpIdx = pmp.MpIdx and pmp.IsStatus='Y'
                    join lms_mock_paper mp on pmp.MpIdx = mp.MpIdx and mp.IsStatus='Y'
                    join lms_mock_r_category mrc on mp.MrcIdx = mrc.MrcIdx and mrc.IsStatus='Y'
                    join lms_mock_r_subject mrs on  mrc.MrsIdx = mrs.MrsIdx and mrs.IsStatus='Y'
                    join lms_product_subject ps on mrs.SubjectIdx = ps.SubjectIdx 
            WHERE pmp.MockType='S' And mrp.MrIdx = MR.MrIdx
            order by mrp.MrrpIdx 
        ";

        $column = " Straight_join
                            MR.*, PD.ProdName, PD.SiteCode, MP.MockYear, MP.MockRotationNo, MP.TakeStartDatm, MP.TakeEndDatm
                            ,fn_day_name(MP.TakeStartDatm,'') as day_name
                            ,C1.CateName
                            ,U.MemId, U.MemName, fn_dec(U.PhoneEnc) AS MemPhone
                            ,O.OrderIdx, O.OrderNo, O.RealPayPrice, O.CompleteDatm, OP.PayStatusCcd
                            ,SC1.CcdName as TakeMockPart_Name
                            ,SC2.CcdName as TakeForm_Name
                            ,SC3.CcdName as TakeArea_Name
                            ,SC4.CcdName as PayStatusCcd_Name
                            ,SC5.CcdName as PayMethodCcd_Name
                            ,(
                                select count(*) 
                                from {$this->_table['mockPrint']} mrpl
                                where mrpl.MrIdx = Mr.MrIdx
                            ) as PrintCnt
                            ,($subject_all) AS SubjectNameList
        ";

        if($rowtype=='Y') {
            $column .= ",($subject_ess) AS SubjectNameList_Ess
                            ,($subject_sub) AS SubjectNameList_Sub";
        }

        $from = "
            FROM {$this->_table['mockApply']} AS MR
                JOIN {$this->_table['member']} AS U ON MR.MemIdx = U.MemIdx AND U.IsStatus = 'Y'
                JOIN {$this->_table['orderProduct']} AS OP ON OP.OrderProdIdx = MR.OrderProdIdx
                JOIN {$this->_table['order']} AS O ON OP.OrderIdx = O.OrderIdx
                JOIN {$this->_table['mockProduct']} AS MP ON MR.ProdCode = MP.ProdCode
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSMS']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC1 ON MR.TakeMockPart = SC1.Ccd AND SC1.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC2 ON MR.TakeForm = SC2.Ccd AND SC2.IsStatus = 'Y'
                LEFT OUTER JOIN {$this->_table['sysCode']} AS SC3 ON MR.TakeArea = SC3.Ccd AND SC3.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC4 ON OP.PayStatusCcd = SC4.Ccd AND SC4.IsStatus = 'Y'
                LEFT JOIN {$this->_table['sysCode']} AS SC5 ON O.PayMethodCcd = SC5.Ccd AND SC5.IsStatus = 'Y'
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE MR.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MR.MrIdx DESC\n";

        //echo 'Select'. $column . $from . $where . $order . $offset_limit;

        //단일 데이터 조회 && 출력용 데이터 조회
        if($rowtype == 'Y') {
            $data =  $this->_conn->query('Select'. $column . $from . $where . $order . $offset_limit)->row_array();

            //수강증 출력용 데이터 조합
                if($data['SiteCode'] == '2001' || $data['SiteCode'] == '2002') {
                    // 경찰
                    $data['ViewType'] = 'C';
                    // 상품명 길이 조정
                    $this->load->helper('text');
                    $data['ProdName_Print'] = ellipsize($data['ProdName'], 14, 1, '');
                    $data['TakeDate'] = date('m/d', strtotime($data['TakeStartDatm'])).'('.$data['day_name'].') '. date('H', strtotime($data['TakeStartDatm'])).'시';
                    $data['Subject_Sub'] = ['',''];

                    if(empty($data['SubjectNameList_Sub'] === false)) {
                        $data['Subject_Sub'] = explode(',',$data['SubjectNameList_Sub']);
                    }

                } elseif ($data['SiteCode'] == '2003' || $data['SiteCode'] == '2004') {
                    // 공무원학원
                    $data['ViewType'] = 'G';
                    $data['ProdName_Print'] = $data['ProdName'];
                    $data['TakeDate'] = date('m/d', strtotime($data['TakeStartDatm']));
                    $data['Subject_Sub'] = ['',''];

                    if(empty($data['SubjectNameList_Sub'] === false)) {
                        $data['Subject_Sub'] = explode(',',$data['SubjectNameList_Sub']);
                    }
                }

            return $data;

        } else {
            $data = $this->_conn->query('Select'. $column . $from . $where . $order . $offset_limit)->result_array();
            $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;
            return array($data, $count);
        }
    }


    /**
     * 신청목록-Excel
     */
    public function mockRegistListExcel($conditionAdd='')
    {

        $condition = [ 'IN' => ['O.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $subQuery = "
            SELECT GROUP_CONCAT(SJ.SubjectName)
            FROM {$this->_table['mockApplySubject']} AS MAS
            JOIN {$this->_table['subject']} AS SJ ON MAS.SubjectIdx = SJ.SubjectIdx
            WHERE MR.MrIdx = MAS.MrIdx
        ";

        $column = " Straight_join
                            O.OrderNo,U.MemId, U.MemName, O.CompleteDatm,O.RealPayPrice,SC4.CcdName as PayStatusCcd_Name
                            ,concat('[',PD.ProdCode,'] ', PD.ProdName) as prodName, MP.MockYear, MP.MockRotationNo
                            ,SC2.CcdName as TakeForm_Name
                            ,MR.TakeNumber, C1.CateName
                            ,SC1.CcdName as TakeMockPart_Name
                            ,($subQuery) AS SubjectNameList
                            ,SC3.CcdName as TakeArea_Name            
                            ,case MR.IsTake
		        	            when 'Y' then '응시'
		                    else '미응시' end AS IsTake
        ";

        $from = "
            FROM {$this->_table['mockApply']} AS MR
                JOIN {$this->_table['member']} AS U ON MR.MemIdx = U.MemIdx AND U.IsStatus = 'Y'
                JOIN {$this->_table['orderProduct']} AS OP ON OP.OrderProdIdx = MR.OrderProdIdx
                JOIN {$this->_table['order']} AS O ON OP.OrderIdx = O.OrderIdx
                JOIN {$this->_table['mockProduct']} AS MP ON MR.ProdCode = MP.ProdCode
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSMS']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC ON MR.TakeMockPart = SC.Ccd AND SC.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC1 ON MR.TakeMockPart = SC1.Ccd AND SC1.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC2 ON MR.TakeForm = SC2.Ccd AND SC2.IsStatus = 'Y'
                left outer JOIN {$this->_table['sysCode']} AS SC3 ON MR.TakeArea = SC3.Ccd AND SC3.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC4 ON OP.PayStatusCcd = SC4.Ccd AND SC4.IsStatus = 'Y'
        ";

        $where = "WHERE MR.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MR.MrIdx DESC\n";

        //echo $select . $from . $where . $order . $offset_limit;

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
     * 응시표 출력 로그 저장
     * @param array $input
     */
    public function ticketPrint($mr_idx)
    {

        if(empty($mr_idx)) {
            return '응시표 식별자가 존재하지 않습니다.';
        }

        $data = array(
            'MrIdx' => $mr_idx,
            'RegIp' => $this->input->ip_address(),
            'RegAdminIdx' => $this->session->userdata('admin_idx'),
        );
        $this->_conn->insert($this->_table['mockPrint'], $data);
        return true;
    }


    /**
     * 출력 이력 추출
     * @param $mr_idx
     * @return mixed
     */
    public function ticketPrintLog($mr_idx) {

        $select = 'Select  a.* ,sa.wAdminName ';

        $from = ' from
                        lms_mock_register_print_log a
 	                    join wbs_sys_admin sa on a.RegAdminIdx = sa.wAdminIdx
 	                 where 1=1
        ';

        $where = $this->_conn->makeWhere(['EQ'=>['a.MrIdx'=>$mr_idx]])->getMakeWhere(true);

        $order = "Order by a.mrplIdx DESC";

        return $this->_conn->query($select. $from. $where. $order)->result_array();
    }
}
