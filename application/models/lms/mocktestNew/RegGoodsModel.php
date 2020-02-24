<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegGoodsModel extends WB_Model
{
    private $_table = [
        'mock_product' => 'lms_Product_Mock',
        'mock_paper' => 'lms_mock_paper_new',
        'mock_paper_r_category' => 'lms_mock_paper_r_category',
        'mock_r_category' => 'lms_Mock_R_Category',
        'mock_r_subject' => 'lms_mock_r_subject',
        'mock_register' => 'lms_mock_register',
        'mock_grades' => 'lms_mock_grades',
        'mock_answerpaper' => 'lms_mock_answerpaper',

        'product_mock_r_paper' => 'lms_Product_Mock_R_Paper',
        'product' => 'lms_Product',
        'product_r_cate' => 'lms_Product_R_Category',
        'product_sale' => 'lms_Product_Sale',
        'product_sms' => 'lms_Product_Sms',
        'product_subject' => 'lms_product_subject',
        'product_memo' => 'lms_Product_Memo',
        'product_r_auto_coupon' => 'lms_Product_R_AutoCoupon',
        'product_json_data' => 'lms_product_json_data',
        'product_copy_log' => 'lms_product_copy_log',

        'order_product' => 'lms_order_product',
        'order' => 'lms_order',

        'lms_professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'sys_category' => 'lms_sys_category',
        'admin' => 'wbs_sys_admin',
        'sys_code' => 'lms_sys_code'
    ];
    private $_prod_code = '';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * @param bool $is_count
     * @param array $add_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function mainList($is_count = false, $add_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $arr_order_by = ['MP.ProdCode' => 'DESC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            $column = "
                MP.*, A.wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsUse, PD.IsCoupon, PS.SalePrice, PS.RealSalePrice,          
                C1.CateName, C1.IsUse AS IsUseCate
                ,SC1.CcdName As AcceptStatusCcd_Name
                ,CONCAT(MP.TakeStartDatm,' ~ ',MP.TakeEndDatm) AS TakeSETime
                ,CONCAT(MP.TakeTime,' 분') AS TakeMinute,
            ";
            $column .= "
                (
                    SELECT COUNT(mr1.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr1
                        join {$this->_table['order_product']} op1 on mr1.OrderProdIdx = op1.OrderProdIdx
                        join {$this->_table['order']} o1 on op1.OrderIdx = o1.OrderIdx
                        join {$this->_table['sys_code']} sc1 on mr1.TakeForm = sc1.Ccd
                        WHERE mr1.IsStatus = 'Y' AND mr1.IsTake = 'Y' AND mr1.ProdCode = MP.ProdCode AND mr1.TakeForm = '{$this->mockCommonModel->_ccd['applyType_on']}' and op1.PayStatusCcd='{$this->mockCommonModel->_ccd['paid_pay_status']}'
                ) AS OnlineCnt,
                (
                    SELECT COUNT(mr2.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr2
                        join {$this->_table['order_product']} op2 on mr2.OrderProdIdx = op2.OrderProdIdx
                        join {$this->_table['order']} o2 on op2.OrderIdx = o2.OrderIdx 
                        join {$this->_table['sys_code']} sc2 on mr2.TakeForm = sc2.Ccd
                    WHERE mr2.IsStatus = 'Y' AND mr2.ProdCode = MP.ProdCode AND mr2.TakeForm = '{$this->mockCommonModel->_ccd['applyType_off']}' and op2.PayStatusCcd='{$this->mockCommonModel->_ccd['paid_pay_status']}'
                ) AS OfflineCnt,
                (
                    SELECT COUNT(mr3.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr3
                        join {$this->_table['order_product']} op3 on mr3.OrderProdIdx = op3.OrderProdIdx
                        join {$this->_table['order']} o3 on op3.OrderIdx = o3.OrderIdx
                        join {$this->_table['sys_code']} sc3 on mr3.TakeForm = sc3.Ccd
                    WHERE mr3.IsStatus = 'Y' AND mr3.ProdCode = MP.ProdCode AND mr3.TakeForm = '{$this->mockCommonModel->_ccd['applyType_on']}' and op3.PayStatusCcd='{$this->mockCommonModel->_ccd['paid_pay_status']}'
                ) AS OnlineRegCnt,
                (
                    SELECT COUNT(mr4.MemIdx) 
                    FROM 
                        {$this->_table['mock_register']} mr4
                        join {$this->_table['order_product']} op4 on mr4.OrderProdIdx = op4.OrderProdIdx
                        join {$this->_table['order']} o4 on op4.OrderIdx = o4.OrderIdx 
                        join {$this->_table['sys_code']} sc4 on mr4.TakeForm = sc4.Ccd
                    WHERE mr4.IsStatus = 'Y' AND mr4.ProdCode = MP.ProdCode AND mr4.TakeForm = '{$this->mockCommonModel->_ccd['applyType_off']}' and op4.PayStatusCcd='{$this->mockCommonModel->_ccd['paid_pay_status']}'
                ) AS OfflineRegCnt,
                (SELECT COUNT(*) FROM {$this->_table['mock_answerpaper']} WHERE ProdCode = PD.ProdCode) AS GradeCNT
            ";
        }

        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mock_product']} AS MP
            INNER JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode
            INNER JOIN {$this->_table['product_r_cate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y' and PS.SaleTypeCcd='{$this->mockCommonModel->_ccd['sale_type']}'
            INNER JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT JOIN {$this->_table['sys_code']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 모의고사 상품 데이터 조회
     * @param $arr_condition
     * @return bool
     */
    public function findGoods($arr_condition)
    {
        $column = '
            MP.*, PD.SiteCode, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsSms, PD.IsUse, PC.CateCode, SC.CateName
            , PD.IsCoupon, PS.SalePrice, PS.SaleRate, PS.SaleDiscType, PS.RealSalePrice, SMS.SendTel, SMS.Memo
            , ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName
        ';
        $from = "
            FROM {$this->_table['mock_product']} AS MP
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode  
            JOIN {$this->_table['product_r_cate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['product_sms']} AS SMS ON MP.ProdCode = SMS.ProdCode AND SMS.IsStatus = 'Y'
            JOIN {$this->_table['sys_category']} AS SC ON PC.CateCode = SC.CateCode AND SC.IsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MP.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MP.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";

        $arr_condition = array_merge_recursive($arr_condition,[
            'EQ' => ['PD.IsStatus' => 'Y']
        ]);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $data = $this->_conn->query('select '.$column .$from .$where)->row_array();

        if (empty($data) === true) {
            return false;
        }

        $data['arr_mock_part'] = explode(',', $data['MockPart']);
        $data['arr_take_forms_ccd'] = explode(',', $data['TakeFormsCcd']);
        $data['arr_take_areas1_ccds'] = explode(',', $data['TakeAreas1CCds']);
        $data['arr_take_areas2_ccds'] = explode(',', $data['TakeAreas2Ccds']);
        $data['add_point_ccds'] = explode(',', $data['AddPointCcds']);

        return $data;
    }

    /**
     * 모의고사 상품의 과목 목록 조회
     * @param $arr_condition
     * @return mixed
     */
    public function listGoodsForSubject($arr_condition)
    {
        $column = 'MPE.*, EB.Year, EB.RotationNo, EB.PapaerName, SJ.SubjectName, PMS.wProfName';

        $from = "
            FROM {$this->_table['mock_product']} AS MP
            JOIN {$this->_table['product_mock_r_paper']} AS MPE ON MP.ProdCode = MPE.ProdCode AND MPE.IsStatus = 'Y'
            JOIN {$this->_table['mock_paper']} AS EB ON MPE.MpIdx = EB.MpIdx AND EB.IsStatus = 'Y'
            JOIN {$this->_table['mock_paper_r_category']} AS MPRC ON EB.MpIdx = MPRC.MpIdx AND MPRC.IsStatus = 'Y'
            JOIN {$this->_table['mock_r_category']} AS MC ON MPRC.MrcIdx = MC.MrcIdx AND MC.IsStatus = 'Y'
            JOIN {$this->_table['mock_r_subject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y'
            JOIN {$this->_table['product_subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
            JOIN {$this->_table['lms_professor']} AS P ON EB.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $group_by = ' group by EB.MpIdx';
        $order_by = ' order by MPE.OrderNum';
        return $this->_conn->query('select '.$column .$from .$where . $group_by . $order_by)->result_array();
    }

    /**
     * 모의고사 상품 등록
     * @param array $form_data
     * @return array|bool
     */
    public function addGoods($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            // 신규 상품코드 조회
            $get_prod_code = $this->_conn->getFindResult($this->_table['product'], 'IFNULL(MAX(ProdCode) + 1, 200001) as ProdCode');
            $this->_prod_code = $get_prod_code['ProdCode'];

            if ($this->_addProduct($form_data) === false) {
                throw new \Exception('상품 등록에 실패했습니다.');
            }

            if ($this->_addProductRCategory($form_data) === false) {
                throw new \Exception('상품 카테고리 등록에 실패했습니다.');
            }

            if ($this->_addProductSale($form_data) === false) {
                throw new \Exception('상품 가격 등록에 실패했습니다.');
            }

            if ($this->_addProductSms($form_data) === false) {
                throw new \Exception('상품 문자 등록에 실패했습니다.');
            }

            if ($this->_addProductMock($form_data) === false) {
                throw new \Exception('모의고사 상품 등록에 실패했습니다.');
            }

            if ($this->_storeProductMockRPaper($form_data) === false) {
                throw new \Exception('모의고사 상품 과목 저장에 실패했습니다.');
            }

            $result = $this->_storeProductMockMemo($form_data);
            if ($result !== true) {
                throw new \Exception($result);
            }

            $result = $this->_setAutoCoupon($form_data);
            if ($result !== true) {
                throw new \Exception($result);
            }

            // 상품연관 데이터 json 형태로 테이블 저장
            $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$this->_prod_code]);
            $result = $query->row(0)->ReturnMsg;
            if ($result != 'Success') {
                throw new \Exception('판매가격 JSON 데이터 등록에 실패했습니다.');
            }

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
     * 모의고사 상품 수정
     * @param array $form_data
     * @return array|bool
     */
    public function modifyGoods($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $this->_prod_code = element('prod_code', $form_data);

            if ($this->_modifyProduct($form_data) === false) {
                throw new \Exception('상품 수정에 실패했습니다.');
            }

            if ($this->_modifyProductSale($form_data) === false) {
                throw new \Exception('상품 가격 수정에 실패했습니다.');
            }

            if ($this->_modifyProductSms($form_data) === false) {
                throw new \Exception('상품 문자 수정에 실패했습니다.');
            }

            if ($this->_modifyProductMock($form_data) === false) {
                throw new \Exception('모의고사 상품 수정에 실패했습니다.');
            }

            if ($this->_storeProductMockRPaper($form_data) === false) {
                throw new \Exception('모의고사 상품 과목 수정에 실패했습니다.');
            }

            $result = $this->_storeProductMockMemo($form_data);
            if ($result !== true) {
                throw new \Exception($result);
            }

            $result = $this->_setAutoCoupon($form_data);
            if ($result !== true) {
                throw new \Exception($result);
            }

            // 상품연관 데이터 json 형태로 테이블 저장
            $query = $this->_conn->query('call sp_product_json_data_insert(?)', [element('prod_code', $form_data)]);
            $result = $query->row(0)->ReturnMsg;
            if ($result != 'Success') {
                throw new \Exception('판매가격 JSON 데이터 수정에 실패했습니다.');
            }

            if ($this->_conn->trans_status() === false) {
                throw new Exception('수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 데이터 복사
     * @param $target_prod_code
     * @return array|bool
     */
    public function copyData($target_prod_code)
    {
        $this->_conn->trans_begin();
        try {
            // 신규 상품코드 조회
            $prod_code = $this->_conn->getFindResult($this->_table['product'], 'IFNULL(MAX(ProdCode) + 1, 200001) as ProdCode');
            $prod_code = $prod_code['ProdCode'];

            //lms_Product 복사
            $insert_column = '(ProdCode, SiteCode, ProdName, ProdTypeCcd, SaleStartDatm, SaleEndDatm, SaleStatusCcd, PointApplyCcd, IsSms, IsUse, IsCoupon, IsCart, RegIp, RegAdminIdx, RegDatm)';
            $select_column = "?, SiteCode, CONCAT(ProdName), ProdTypeCcd, SaleStartDatm, SaleEndDatm, SaleStatusCcd, PointApplyCcd, IsSms, 'N', IsCoupon, IsCart, ?, ?, ?";
            $arr_condition = ['EQ' => ['ProdCode' => $target_prod_code,'IsStatus' => 'Y']];
            if ($this->_copyData($this->_table['product'], $prod_code, $insert_column, $select_column, $arr_condition) === false) {
                throw new \Exception('상품 복사에 실패했습니다.');
            }

            //lms_Product_R_Category 복사
            $insert_column = '(ProdCode, CateCode, RegIp, RegAdminIdx, RegDatm)';
            $select_column = "?, CateCode, ?, ?, ?";
            $arr_condition = ['EQ' => ['ProdCode' => $target_prod_code,'IsStatus' => 'Y']];
            if ($this->_copyData($this->_table['product_r_cate'], $prod_code, $insert_column, $select_column, $arr_condition) === false) {
                throw new \Exception('상품 카테고리 복사에 실패했습니다.');
            }

            //lms_Product_Sale 복사
            $insert_column = '(ProdCode, SaleTypeCcd, SalePrice, SaleRate, SaleDiscType, RealSalePrice, RegIp, RegAdminIdx, RegDatm)';
            $select_column = "?, SaleTypeCcd, SalePrice, SaleRate, SaleDiscType, RealSalePrice, ?, ?, ?";
            $arr_condition = ['EQ' => ['ProdCode' => $target_prod_code,'IsStatus' => 'Y']];
            if ($this->_copyData($this->_table['product_sale'], $prod_code, $insert_column, $select_column, $arr_condition) === false) {
                throw new \Exception('상품 가격 복사에 실패했습니다.');
            }

            //lms_Product_Sms 복사
            $insert_column = '(ProdCode, SendTel, Memo, RegIp, RegAdminIdx, RegDatm)';
            $select_column = "?, SendTel, Memo, ?, ?, ?";
            $arr_condition = ['EQ' => ['ProdCode' => $target_prod_code,'IsStatus' => 'Y']];
            if ($this->_copyData($this->_table['product_sms'], $prod_code, $insert_column, $select_column, $arr_condition) === false) {
                throw new \Exception('문자발송 데이터 복사에 실패했습니다.');
            }

            //lms_Product_Mock 복사
            $insert_column = '
                (ProdCode, TakePart, MockPart, TakeFormsCcd, TakeAreas1CCds, TakeAreas2Ccds, AddPointCcds, MockYear, MockRotationNo,
                 ClosingPerson, AcceptStatusCcd, TakeStartDatm, TakeEndDatm, TakeTime, PaperType,
                 RegIp, RegAdminIdx, RegDatm)
            ';
            $select_column = "
                ?, TakePart, MockPart, TakeFormsCcd, TakeAreas1CCds, TakeAreas2Ccds, AddPointCcds, MockYear, MockRotationNo,
                ClosingPerson, AcceptStatusCcd, TakeStartDatm, TakeEndDatm, TakeTime, PaperType, ?, ?, ?
            ";
            $arr_condition = ['EQ' => ['ProdCode' => $target_prod_code]];
            if ($this->_copyData($this->_table['mock_product'], $prod_code, $insert_column, $select_column, $arr_condition) === false) {
                throw new \Exception('모의고사 상품 복사에 실패했습니다.');
            }

            //lms_Product_Mock_R_Paper 복사
            $insert_column = '(ProdCode, MpIdx, MockType, OrderNum, RegIp, RegAdminIdx, RegDatm)';
            $select_column = "?, MpIdx, MockType, OrderNum, ?, ?, ?";
            $arr_condition = ['EQ' => ['ProdCode' => $target_prod_code,'IsStatus' => 'Y']];
            if ($this->_copyData($this->_table['product_mock_r_paper'], $prod_code, $insert_column, $select_column, $arr_condition) === false) {
                throw new \Exception('모의고사 과목 데이터 복사에 실패했습니다.');
            }

            //lms_product_r_auto_coupon 복사
            $insert_column = '(ProdCode, AutoCouponIdx, IsStatus, RegDatm, RegAdminIdx,RegIp)';
            $select_column = "?, AutoCouponIdx, IsStatus, ?, ?, ?";
            $arr_condition = ['EQ' => ['ProdCode' => $target_prod_code,'IsStatus' => 'Y']];
            if ($this->_copyData($this->_table['product_r_auto_coupon'], $prod_code, $insert_column, $select_column, $arr_condition) === false) {
                throw new \Exception('쿠폰 복사에 실패했습니다.');
            }

            //lms_product_memo 복사
            $insert_column = '(ProdCode, MemoTypeCcd, Memo, IsOutput, IsStatus, RegDatm, RegAdminIdx, RegIp)';
            $select_column = "?, MemoTypeCcd, Memo, IsOutput, IsStatus, ?, ?, ?";
            $arr_condition = ['EQ' => ['ProdCode' => $target_prod_code,'IsStatus' => 'Y']];
            if ($this->_copyData($this->_table['product_memo'], $prod_code, $insert_column, $select_column, $arr_condition) === false) {
                throw new \Exception('메모 복사에 실패했습니다.');
            }

            //json 데이터 복사
            $insert_column = '(ProdCode, ProdPriceData, ProdBookData, LectureSampleData)';
            $select_column = "?, ProdPriceData, ProdBookData, LectureSampleData";
            $arr_condition = ['EQ' => ['ProdCode' => $target_prod_code]];
            if ($this->_copyData($this->_table['product_json_data'], $prod_code, $insert_column, $select_column, $arr_condition, false) === false) {
                throw new \Exception('복사 이력 저장에 실패했습니다.(1)');
            }

            //복사 로그 저장
            $copy_data = [
                'ProdCode' => $prod_code,
                'ProdCode_Original' => $target_prod_code,
                'RegAdminIdx' =>$this->session->userdata('admin_idx')
            ];
            if($this->_conn->set($copy_data)->insert($this->_table['product_copy_log']) === false) {
                throw new \Exception('복사 이력 저장에 실패했습니다.(2)');
            }

            if ($this->_conn->trans_status() === false) {
                throw new Exception('복사에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    /**
     * 상품 등록
     * @param $form_data
     * @return bool|string
     */
    private function _addProduct($form_data)
    {
        try {
            $data = [
                'ProdCode' => $this->_prod_code,
                'SiteCode' => element('siteCode', $form_data),
                'ProdName' => element('ProdName', $form_data),
                'ProdTypeCcd' => $this->mockCommonModel->_ccd['sysCode_ProdTypeCcd'],
                'SaleStartDatm' => element('SaleStartDatm_d', $form_data) .' '. element('SaleStartDatm_h', $form_data) .':'. element('SaleStartDatm_m', $form_data) .':00',
                'SaleEndDatm' => element('SaleEndDatm_d', $form_data) .' '. element('SaleEndDatm_h', $form_data) .':'. element('SaleEndDatm_m', $form_data) .':59',
                'SaleStatusCcd' => $this->mockCommonModel->_ccd['sysCode_SaleStatusCcd'],
                'IsPoint' => 'N',
                'PointApplyCcd' => $this->mockCommonModel->_ccd['sysCode_PointApplyCcd'],
                'PointSavePrice' => '0',
                'PointSaveType' => 'R',
                'IsSms' => element('IsSms', $form_data),
                'IsUse' => element('is_use', $form_data),
                'IsCoupon' => element('IsCoupon', $form_data),
                'IsCart' => 'N',
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->insert($this->_table['product'], $data) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 카테고리 저장
     * @param $form_data
     * @return bool|string
     */
    private function _addProductRCategory($form_data)
    {
        try {
            $data = [
                'ProdCode' => $this->_prod_code,
                'CateCode' => element('cate_code', $form_data),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->insert($this->_table['product_r_cate'], $data) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 상품 가격 등록
     * @param $form_data
     * @return bool|string
     */
    private function _addProductSale($form_data)
    {
        try {
            $data = [
                'ProdCode' => $this->_prod_code,
                'SaleTypeCcd' => $this->mockCommonModel->_ccd['sysCode_SaleTypeCcd'],
                'SalePrice' => element('SalePrice', $form_data),
                'SaleRate' => element('SaleRate', $form_data),
                'SaleDiscType' => element('SaleDiscType', $form_data),
                'RealSalePrice' => element('RealSalePrice', $form_data),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->insert($this->_table['product_sale'], $data) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 상품 문자 발송 데이터 저장
     * @param $form_data
     * @return bool|string
     */
    private function _addProductSms($form_data)
    {
        try {
            $data = [
                'ProdCode' => $this->_prod_code,
                'SendTel' => element('SendTel', $form_data),
                'Memo' => element('Memo', $form_data),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->insert($this->_table['product_sms'], $data) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 모의고사 상품 등록
     * @param $form_data
     * @return bool
     */
    private function _addProductMock($form_data)
    {
        try {
            $data = [
                'ProdCode' => $this->_prod_code,
                'TakePart' => element('TakePart', $form_data),
                'MockPart' => implode(',', element('mock_part', $form_data)),
                'TakeFormsCcd' => implode(',', element('TakeFormsCcd', $form_data)),
                'TakeAreas1CCds' => empty(element('TakeAreas1CCds', $form_data)) ? '': implode(',', element('TakeAreas1CCds', $form_data)),
                'TakeAreas2Ccds' => empty(element('TakeAreas2Ccds', $form_data)) ? '' : implode(',', element('TakeAreas2Ccds', $form_data)),
                'AddPointCcds' => implode(',', element('AddPointCcds', $form_data)),
                'MockYear' => element('MockYear', $form_data),
                'MockRotationNo' => element('MockRotationNo', $form_data),
                'ClosingPerson' => empty(element('ClosingPerson', $form_data)) ? '' : element('ClosingPerson', $form_data),
                'AcceptStatusCcd' => element('AcceptStatusCcd', $form_data),
                'TakeStartDatm' => element('TakeStartDatm_d', $form_data) .' '. element('TakeStartDatm_h', $form_data) .':'. element('TakeStartDatm_m', $form_data) .':00',
                'TakeEndDatm' => element('TakeEndDatm_d', $form_data) .' '. element('TakeEndDatm_h', $form_data) .':'. element('TakeEndDatm_m', $form_data) .':59',
                'TakeTime' => element('TakeTime', $form_data), // 분
                'PaperType' => element('PaperType', $form_data),
                'GradeOpenIsUse' => element('grade_open_is_use', $form_data),
                'GradeOpenDatm' => (empty(element('GradeOpenDatm_d', $form_data)) === false) ? element('GradeOpenDatm_d', $form_data) .' '. element('GradeOpenDatm_h', $form_data) .':'. element('GradeOpenDatm_m', $form_data) .':00' : null,
                'SubjectSViewCount' => element('subject_s_view_count', $form_data, '2'),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            if ($this->_conn->insert($this->_table['mock_product'], $data) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    private function _modifyProduct($form_data)
    {
        try {
            $data = [
                'ProdName' => element('ProdName', $form_data),
                'SaleStartDatm' => element('SaleStartDatm_d', $form_data) .' '. element('SaleStartDatm_h', $form_data) .':'. element('SaleStartDatm_m', $form_data) .':00',
                'SaleEndDatm' => element('SaleEndDatm_d', $form_data) .' '. element('SaleEndDatm_h', $form_data) .':'. element('SaleEndDatm_m', $form_data) .':59',
                'IsSms' => element('IsSms', $form_data),
                'IsUse' => element('is_use', $form_data),
                'IsCoupon' => element('IsCoupon', $form_data),
                'UpdDatm'       => date("Y-m-d H:i:s"),
                'UpdAdminIdx'   => $this->session->userdata('admin_idx'),
            ];

            $this->_conn->set($data)->where('ProdCode', element('prod_code', $form_data));
            if($this->_conn->update($this->_table['product'])=== false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    private function _modifyProductSale($form_data)
    {
        try {
            $data = [
                'SalePrice' => element('SalePrice', $form_data),
                'SaleRate' => element('SaleRate', $form_data),
                'SaleDiscType' => element('SaleDiscType', $form_data),
                'RealSalePrice' => element('RealSalePrice', $form_data),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            $this->_conn->set($data)->where('ProdCode', element('prod_code', $form_data));
            if($this->_conn->update($this->_table['product_sale'])=== false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    private function _modifyProductSms($form_data)
    {
        try {
            $data = [
                'SendTel' => element('SendTel', $form_data),
                'Memo' => element('Memo', $form_data),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($data)->where('ProdCode', element('prod_code', $form_data));
            if($this->_conn->update($this->_table['product_sms'])=== false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    private function _modifyProductMock($form_data)
    {
        try {
            $data = [
                'TakeFormsCcd' => implode(',', element('TakeFormsCcd', $form_data)),
                'TakeAreas1CCds' => empty(element('TakeAreas1CCds', $form_data)) ? '': implode(',', element('TakeAreas1CCds', $form_data)),
                'TakeAreas2Ccds' => empty(element('TakeAreas2Ccds', $form_data)) ? '' : implode(',', element('TakeAreas2Ccds', $form_data)),
                'AddPointCcds' => implode(',', element('AddPointCcds', $form_data)),
                'MockYear' => element('MockYear', $form_data),
                'MockRotationNo' => element('MockRotationNo', $form_data),
                'ClosingPerson' => empty(element('ClosingPerson', $form_data)) ? '' : element('ClosingPerson', $form_data),
                'AcceptStatusCcd' => element('AcceptStatusCcd', $form_data),
                'TakeStartDatm' => element('TakeStartDatm_d', $form_data) .' '. element('TakeStartDatm_h', $form_data) .':'. element('TakeStartDatm_m', $form_data) .':00',
                'TakeEndDatm' => element('TakeEndDatm_d', $form_data) .' '. element('TakeEndDatm_h', $form_data) .':'. element('TakeEndDatm_m', $form_data) .':59',
                'TakeTime' => element('TakeTime', $form_data), // 분
                'PaperType' => element('PaperType', $form_data),
                'GradeOpenIsUse' => element('grade_open_is_use', $form_data),
                'GradeOpenDatm' => (empty(element('GradeOpenDatm_d', $form_data)) === false) ? element('GradeOpenDatm_d', $form_data) .' '. element('GradeOpenDatm_h', $form_data) .':'. element('GradeOpenDatm_m', $form_data) .':00' : null,
                'SubjectSViewCount' => element('subject_s_view_count', $form_data, '2'),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            $this->_conn->set($data)->where('ProdCode', element('prod_code', $form_data));
            if($this->_conn->update($this->_table['mock_product'])=== false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 데이터 복사
     * @param string $table
     * @param string $prod_code
     * @param string $insert_column
     * @param string $select_column
     * @param array $arr_condition
     * @param bool $column_type
     * @return bool
     */
    private function _copyData($table = '', $prod_code = '', $insert_column = '', $select_column = '', $arr_condition = [], $reg_column_type = true)
    {
        try {
            $reg_ip = $this->input->ip_address();
            $reg_admin_idx = $this->session->userdata('admin_idx');
            $reg_datm = date("Y-m-d H:i:s");

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);

            $query = " {$table} {$insert_column} SELECT {$select_column} FROM {$table} {$where} ";
            $arr_data = ($reg_column_type === false) ? [$prod_code] : [$prod_code, $reg_ip, $reg_admin_idx, $reg_datm];
            if ($this->_conn->query('insert into' . $query, $arr_data) === false) {
                throw new Exception('fail');
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }


    /**
     * 메모등록
     * @param $form_data
     * @return bool
     */
    private function _storeProductMockMemo($form_data)
    {
        try {
            /*각종 메모*/
            $MemoTypeCcd = element('MemoTypeCcd',$form_data,'');
            $IsOutPut = element('IsOutPut',$form_data,'Y');
            $Memo = element('CMemo',$form_data);

            /*  기존 메모 정보 상태값 변경 : 강사료 정산 메모의 경우는 보존*/
            $result = $this->_setDataDelete($this->_prod_code, $this->_table['product_memo'], '메모', 'where_not_in', 'MemoTypeCcd', '634001');
            if($result !== true) {
                throw new \Exception($result);
            }

            if(empty($MemoTypeCcd) === false) {
                for($i=0;$i<count($MemoTypeCcd);$i++) {
                    if(empty($Memo[$i]) === false) {
                        $data = [
                            'ProdCode' => $this->_prod_code
                            , 'MemoTypeCcd' => $MemoTypeCcd[$i]
                            , 'Memo' => $Memo[$i]
                            , 'IsOutput' => $IsOutPut[$i]
                            , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                            , 'RegIp' => $this->input->ip_address()
                        ];

                        if($this->_conn->set($data)->insert($this->_table['product_memo']) === false) {
                            throw new \Exception('메모 등록에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 쿠폰 자동 지급
     * @param array $form_data
     * @return bool|string
     */
    private function _setAutoCoupon($form_data)
    {
        try {
            /*  기존 쿠폰 정보 상태값 변경 */
            $result = $this->_setDataDelete($this->_prod_code, $this->_table['product_r_auto_coupon'], '쿠폰');
            if($result !== true) {
                throw new \Exception($result);
            }

            $CouponIdx = element('CouponIdx',$form_data);
            if(empty($CouponIdx) === false) {
                for($i=0;$i<count($CouponIdx);$i++) {
                    $data = [
                        'ProdCode' => $this->_prod_code
                        ,'AutoCouponIdx' => $CouponIdx[$i]
                        , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                        , 'RegIp' => $this->input->ip_address()
                    ];

                    if($this->_conn->set($data)->insert($this->_table['product_r_auto_coupon']) === false) {
                        //echo $this->_conn->last_query();
                        throw new \Exception('자동지급쿠폰 등록에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 모의고사 상품 과목 저장/수정
     * @param $form_data
     * @return bool
     */
    private function _storeProductMockRPaper($form_data)
    {
        try {
            $dataReg = $dataMod = $dataDel = [];

            if(empty(element('chapterTotal', $form_data)) === false) {
                foreach (element('chapterTotal', $form_data) as $k => $v) {
                    if (empty(element('chapterExist', $form_data)) === true || in_array($v, element('chapterExist', $form_data)) === false) { // 신규등록 데이터
                        $dataReg[] = array(
                            'ProdCode'    => $this->_prod_code,
                            /*'ProdCode'    => '999999',*/
                            'MpIdx'       => element('MpIdx', $form_data)[$k],
                            'MockType'    => element('MockType', $form_data)[$k],
                            'OrderNum'    => element('OrderNum', $form_data)[$k],
                            'RegIp'       => $this->input->ip_address(),
                            'RegDatm'     => date("Y-m-d H:i:s"),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        );
                    } else { // 수정 데이터
                        $dataMod[] = array(
                            'PmrpIdx' => $v,
                            'MpIdx'       => element('MpIdx', $form_data)[$k],
                            'MockType'    => element('MockType', $form_data)[$k],
                            'OrderNum'    => element('OrderNum', $form_data)[$k],
                            'UpdDatm' => date("Y-m-d H:i:s"),
                            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                        );
                    }
                }
            }

            // 삭제 데이터 (IsStatus Update)
            if( !empty(element('chapterDel', $form_data)) ) {
                foreach (element('chapterDel', $form_data) as $k => $v) {
                    $dataDel[] = array(
                        'PmrpIdx' => $v,
                        'IsStatus' => 'N',
                        'UpdDatm' => date("Y-m-d H:i:s"),
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                }
            }

            if($dataReg) {
                if ($this->_conn->insert_batch($this->_table['product_mock_r_paper'], $dataReg) === false) {
                    throw new \Exception('fail');
                }
            }
            if($dataMod) {
                if ($this->_conn->update_batch($this->_table['product_mock_r_paper'], $dataMod, 'PmrpIdx') === false) {
                    throw new \Exception('fail');
                }
            }
            if($dataDel) {
                if ($this->_conn->update_batch($this->_table['product_mock_r_paper'], $dataDel, 'PmrpIdx') === false) {
                    throw new \Exception('fail');
                }
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 기존데이터 상태값 변경
     * @param $prod_code
     * @param $table_name
     * @param $msg
     * @param null $where_type
     * @param null $where_key
     * @param null $where_val
     * @return bool|string
     */
    private function _setDataDelete($prod_code, $table_name, $msg, $where_type = null, $where_key = null, $where_val = null)
    {
        try {
            /*  기존 정보 상태값 변경 */
            $del_data = [
                'IsStatus' => 'N'
                , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($del_data)->where('ProdCode', $prod_code)->where('IsStatus', 'Y');
            if(empty($where_type) === false) {
                $this->_conn->{$where_type}($where_key, $where_val);
            }

            if ($this->_conn->update($table_name) === false) {
                throw new \Exception('이전 ' . $msg . ' 정보 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }
}