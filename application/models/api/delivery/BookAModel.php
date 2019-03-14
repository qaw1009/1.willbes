<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookAModel extends WB_Model
{
    private $_table = [
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'order_product_delivery_info' => 'lms_order_product_delivery_info',
        'order_delivery_address' => 'lms_order_delivery_address',
    ];

    // 교재 상품구분 공통코드
    private $_book_prod_type_ccd = '636003';

    // 결제완료 결제상태 공통코드
    private $_paid_pay_status_ccd = '676001';

    // 배송상태 공통코드 (송장등록, 발송준비, 발송취소, 발송완료)
    private $_delivery_status_ccd = ['invoice' => '677001', 'prepare' => '677002', 'cancel' => '677003', 'complete' => '677004'];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 운송장 입력 대상 교재상품 결제완료 주문목록 조회
     * @param string $sdate [시작일 (y-m-d)]
     * @param string $stime [시작시간 (h)]
     * @param string $edate [종료일 (y-m-d)]
     * @param string $etime [종료시간 (h)]
     * @return mixed
     */
    public function listOrder($sdate, $stime, $edate, $etime)
    {
        $sdatm = $sdate . ' ' . $stime . ':00:00';
        $edatm = $edate . ' ' . $etime . ':00:00';

        $column = 'O.OrderIdx, O.OrderNo, O.ReprProdName
            , ODA.Receiver, fn_dec(ODA.ReceiverPhoneEnc) as ReceiverPhone, fn_dec(ODA.ReceiverTelEnc) as ReceiverTel
            , ODA.ZipCode, ODA.Addr1, fn_dec(ODA.Addr2Enc) as Addr2, ODA.DeliveryMemo';

        $from = '
            from (
                select distinct(O.OrderIdx) as OrderIdx
                from lms_order as O
                    inner join lms_order_product as OP
                        on O.OrderIdx = OP.OrderIdx
                    inner join lms_order_product_delivery_info as OPD
                        on OP.OrderProdIdx = OPD.OrderProdIdx
                    inner join lms_product as P
                        on OP.ProdCode = P.ProdCode
                where O.CompleteDatm >= ? and O.CompleteDatm < ? 
                    and OP.PayStatusCcd = "' . $this->_paid_pay_status_ccd . '"
                    and OPD.DeliveryStatusCcd is null		
                    and P.ProdTypeCcd = "' . $this->_book_prod_type_ccd . '"		
            ) as TA
                inner join lms_order as O
                    on TA.OrderIdx = O.OrderIdx
                inner join lms_order_delivery_address as ODA
                    on TA.OrderIdx = ODA.OrderIdx
            where O.CompleteDatm >= ? and O.CompleteDatm < ?            
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$sdatm, $edatm, $sdatm, $edatm]);

        return $query->result_array();
    }
}
