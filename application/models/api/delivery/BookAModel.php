<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookAModel extends WB_Model
{
    private $_table = [
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'order_product_delivery_info' => 'lms_order_product_delivery_info',
        'order_delivery_address' => 'lms_order_delivery_address',
        'product' => 'lms_product',
        'member' => 'lms_member',
        'admin' => 'wbs_sys_admin'
    ];

    // 배송대상 상품구분 공통코드
    private $_delivery_prod_type_ccd = ['636003', '636004'];    // 교재, 사은품

    // 결제완료 결제상태 공통코드
    private $_paid_pay_status_ccd = '676001';

    // 배송상태 공통코드 (송장등록, 발송준비, 발송취소, 발송완료)
    private $_delivery_status_ccd = ['invoice' => '677001', 'prepare' => '677002', 'cancel' => '677003', 'complete' => '677004'];
    
    // 교재배송 관리자 아이디
    private $_admin_id = 'api_book';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 운송장 입력 대상 결제완료 주문목록 조회
     * @param int $site_code [사이트코드]
     * @param string $sdate [시작일 (y-m-d)]
     * @param string $stime [시작시간 (h)]
     * @param string $edate [종료일 (y-m-d)]
     * @param string $etime [종료시간 (h)]
     * @return mixed
     */
    public function listOrder($site_code, $sdate, $stime, $edate, $etime)
    {
        $sdatm = $sdate . ' ' . $stime . ':00:00';
        $edatm = $edate . ' ' . $etime . ':00:00';

        $column = 'O.OrderIdx, O.OrderNo, O.ReprProdName
            , ODA.Receiver, fn_dec(ODA.ReceiverPhoneEnc) as ReceiverPhone, fn_dec(ODA.ReceiverTelEnc) as ReceiverTel
            , ODA.ZipCode, ODA.Addr1, fn_dec(ODA.Addr2Enc) as Addr2, ODA.DeliveryMemo';
        $from = '
            from (
                select distinct(O.OrderIdx) as OrderIdx
                from ' . $this->_table['order'] . ' as O
                    inner join ' . $this->_table['order_product'] . ' as OP
                        on O.OrderIdx = OP.OrderIdx
                    inner join ' . $this->_table['order_product_delivery_info'] . ' as OPD
                        on OP.OrderProdIdx = OPD.OrderProdIdx
                    inner join ' . $this->_table['product'] . ' as P
                        on OP.ProdCode = P.ProdCode
                where O.SiteCode = ?
                    and O.CompleteDatm >= ? and O.CompleteDatm < ? 
                    and OP.PayStatusCcd = ?
                    and OPD.DeliveryStatusCcd is null		
                    and P.ProdTypeCcd in ?		
            ) as TA
                inner join ' . $this->_table['order'] . ' as O
                    on TA.OrderIdx = O.OrderIdx
                inner join ' . $this->_table['order_delivery_address'] . ' as ODA
                    on TA.OrderIdx = ODA.OrderIdx
            where O.SiteCode = ?
                and O.CompleteDatm >= ? and O.CompleteDatm < ?            
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$site_code, $sdatm, $edatm, $this->_paid_pay_status_ccd, $this->_delivery_prod_type_ccd, $site_code, $sdatm, $edatm]);

        return $query->result_array();
    }

    /**
     * 배송상태별 주문상품 목록 조회
     * @param int $site_code [사이트코드]
     * @param string $sdate [시작일 (y-m-d)]
     * @param string $stime [시작시간 (h)]
     * @param string $edate [종료일 (y-m-d)]
     * @param string $etime [종료시간 (h)]
     * @param string $delivery_status [배송상태, invoice (송장등록), prepare (발송준비)]
     * @return mixed
     */
    public function listOrderProduct($site_code, $sdate, $stime, $edate, $etime, $delivery_status)
    {
        $sdatm = $sdate . ' ' . $stime . ':00:00';
        $edatm = $edate . ' ' . $etime . ':00:00';
        $delivery_status_ccd = element($delivery_status, $this->_delivery_status_ccd, '');  // 배송상태공통코드

        $column = 'O.OrderIdx, O.OrderNo, O.CompleteDatm
            , ODA.Receiver, fn_dec(ODA.ReceiverPhoneEnc) as ReceiverPhone, fn_dec(ODA.ReceiverTelEnc) as ReceiverTel
            , ODA.ZipCode, ODA.Addr1, fn_dec(ODA.Addr2Enc) as Addr2, ODA.DeliveryMemo
            , OP.ProdCode, OP.RealPayPrice
            , OPD.InvoiceNo
            , P.ProdName
            , M.MemId, M.MemName';
        $from = '
            from ' . $this->_table['order'] . ' as O
                inner join ' . $this->_table['order_delivery_address'] . ' as ODA
                    on O.OrderIdx = ODA.OrderIdx
                inner join ' . $this->_table['order_product'] . ' as OP
                    on O.OrderIdx = OP.OrderIdx
                inner join ' . $this->_table['order_product_delivery_info'] . ' as OPD
                    on OP.OrderProdIdx = OPD.OrderProdIdx
                inner join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode
                inner join ' . $this->_table['member'] . ' as M
                    on O.MemIdx = M.MemIdx 
            where O.SiteCode = ?
                and O.CompleteDatm >= ? and O.CompleteDatm < ?
                and OPD.DeliveryStatusCcd = ?
                and P.ProdTypeCcd in ?                              
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$site_code, $sdatm, $edatm, $delivery_status_ccd, $this->_delivery_prod_type_ccd]);

        return $query->result_array();
    }

    /**
     * 주문번호별 주문상품배송정보 조회
     * @param string $order_no [주문번호]
     * @param int $site_code [사이트코드]
     * @return mixed
     */
    public function findOrderProductDeliveryInfo($order_no, $site_code)
    {
        $column = 'OPD.OrderProdDeliveryIdx, OPD.OrderProdIdx';
        $from = '
            from ' . $this->_table['order'] . ' as O
                inner join ' . $this->_table['order_product'] . ' as OP
                    on O.OrderIdx = OP.OrderIdx
                inner join ' . $this->_table['order_product_delivery_info'] . ' as OPD
                    on OP.OrderProdIdx = OPD.OrderProdIdx
                inner join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode		
            where O.OrderNo = ?
                and O.SiteCode = ?
                and P.ProdTypeCcd in ?     
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$order_no, $site_code, $this->_delivery_prod_type_ccd]);

        return $query->result_array();
    }

    /**
     * 송장번호 등록 (트랜잭션 제외)
     * @param array $input [송장등록 정보]
     * @return array|bool
     */
    public function modifyInvoiceNo($input)
    {
        //$this->_conn->trans_begin();
        $upd_cnt = 0;

        try {
            if (empty($input) === true) {
                throw new \Exception('송장번호 등록 대상이 없습니다.');
            }
            
            // 관리자 식별자 조회
            $admin_idx = element('wAdminIdx', $this->_conn->getFindResult($this->_table['admin'], 'wAdminIdx', [
                'EQ' => ['wAdminId' => $this->_admin_id]
            ]), 0);

            foreach ($input as $row) {
                if (empty($row['OrderNum']) === false && empty($row['TransNum']) === false && empty($row['SiteCode']) === false) {
                    // 주문상품배송정보 조회
                    $info_rows = $this->findOrderProductDeliveryInfo($row['OrderNum'], $row['SiteCode']);
                    if (empty($info_rows) === false) {
                        // 업데이트 대상 주문상품배송정보 식별자
                        $arr_order_prod_delv_idx = array_pluck($info_rows, 'OrderProdDeliveryIdx');

                        $data = [
                            'DeliveryStatusCcd' => $this->_delivery_status_ccd['invoice'],
                            'InvoiceNo' => str_replace('-', '', $row['TransNum']),
                            'InvoiceRegAdminIdx' => $admin_idx
                        ];

                        $is_update = $this->_conn->set($data)->set('InvoiceRegDatm', 'NOW()', false)
                            ->where_in('OrderProdDeliveryIdx', $arr_order_prod_delv_idx)
                            ->update($this->_table['order_product_delivery_info']);

                        if ($is_update === false) {
                            throw new \Exception('송장번호 등록에 실패했습니다.');
                        }

                        //if ($this->_conn->affected_rows() > 0) {
                            $upd_cnt++;
                        //}
                    }
                }
            }

            if ($upd_cnt < 1) {
                throw new \Exception('등록된 송장번호가 없습니다.');
            }

            //$this->_conn->trans_commit();
        } catch (\Exception $e) {
            //$this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 배송상태 변경 업데이트 (트랜잭션 제외)
     * @param string $delivery_status [배송상태, prepare (발송준비), complete (발송완료)]
     * @param array $input [상태변경 정보]
     * @return array|bool
     */
    public function modifyDeliveryStatus($delivery_status, $input)
    {
        //$this->_conn->trans_begin();
        $upd_cnt = 0;

        try {
            $delivery_status_ccd = element($delivery_status, $this->_delivery_status_ccd, '');  // 배송상태공통코드
            $column_prefix = $delivery_status == 'complete' ? 'DeliverySend' : 'StatusUpd';     // 업데이트 대상 컬럼

            if (empty($input) === true) {
                throw new \Exception('상태 변경 대상이 없습니다.');
            }

            if (empty($delivery_status_ccd) === true || in_array($delivery_status, ['prepare', 'complete']) === false) {
                throw new \Exception('배송상태 파라미터가 올바르지 않습니다.');
            }

            // 관리자 식별자 조회
            $admin_idx = element('wAdminIdx', $this->_conn->getFindResult($this->_table['admin'], 'wAdminIdx', [
                'EQ' => ['wAdminId' => $this->_admin_id]
            ]), 0);

            foreach ($input as $row) {
                if (empty($row['OrderNum']) === false && empty($row['SiteCode']) === false) {
                    // 주문상품배송정보 조회
                    $info_rows = $this->findOrderProductDeliveryInfo($row['OrderNum'], $row['SiteCode']);

                    if (empty($info_rows) === false) {
                        // 업데이트 대상 주문상품배송정보 식별자
                        $arr_order_prod_delv_idx = array_pluck($info_rows, 'OrderProdDeliveryIdx');

                        $data = [
                            'DeliveryStatusCcd' => $delivery_status_ccd,
                            $column_prefix . 'AdminIdx' => $admin_idx
                        ];

                        $is_update = $this->_conn->set($data)->set($column_prefix . 'Datm', 'NOW()', false)
                            ->where_in('OrderProdDeliveryIdx', $arr_order_prod_delv_idx)
                            ->update($this->_table['order_product_delivery_info']);

                        if ($is_update === false) {
                            throw new \Exception('상태 변경에 실패했습니다.');
                        }

                        //if ($this->_conn->affected_rows() > 0) {
                            $upd_cnt++;
                        //}
                    }
                }
            }

            if ($upd_cnt < 1) {
                throw new \Exception('상태 변경된 내역이 없습니다.');
            }

            //$this->_conn->trans_commit();
        } catch (\Exception $e) {
            //$this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 배송정보 초기화 (트랜잭션 제외)
     * @param $input
     * @return array|bool
     */
    public function modifyDeliveryInit($input)
    {
        //$this->_conn->trans_begin();
        $upd_cnt = 0;

        try {
            if (empty($input) === true) {
                throw new \Exception('초기화 대상이 없습니다.');
            }

            foreach ($input as $row) {
                if (empty($row['OrderNum']) === false && empty($row['SiteCode']) === false) {
                    // 주문상품배송정보 조회
                    $info_rows = $this->findOrderProductDeliveryInfo($row['OrderNum'], $row['SiteCode']);
                    if (empty($info_rows) === false) {
                        // 업데이트 대상 주문상품배송정보 식별자
                        $arr_order_prod_delv_idx = array_pluck($info_rows, 'OrderProdDeliveryIdx');

                        $data = [
                            'DeliveryStatusCcd' => 'NULL',
                            'InvoiceNo' => 'NULL',
                            'InvoiceRegDatm' => 'NULL',
                            'InvoiceRegAdminIdx' => 'NULL',
                            'InvoiceUpdDatm' => 'NULL',
                            'InvoiceUpdAdminIdx' => 'NULL',
                            'DeliverySendDatm' => 'NULL',
                            'DeliverySendAdminIdx' => 'NULL',
                            'StatusUpdDatm' => 'NULL',
                            'StatusUpdAdminIdx' => 'NULL'
                        ];

                        $is_update = $this->_conn->set($data, null, false)
                            ->where_in('OrderProdDeliveryIdx', $arr_order_prod_delv_idx)
                            ->update($this->_table['order_product_delivery_info']);

                        if ($is_update === false) {
                            throw new \Exception('초기화에 실패했습니다.');
                        }

                        //if ($this->_conn->affected_rows() > 0) {
                            $upd_cnt++;
                        //}
                    }
                }
            }

            if ($upd_cnt < 1) {
                throw new \Exception('초기화 내역이 없습니다.');
            }

            //$this->_conn->trans_commit();
        } catch (\Exception $e) {
            //$this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
