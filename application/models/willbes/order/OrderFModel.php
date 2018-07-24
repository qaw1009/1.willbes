<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/order/BaseOrderFModel.php';

class OrderFModel extends BaseOrderFModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 회원식별자 기준 최근 배송정보 조회
     * @param $mem_idx
     * @return mixed
     */
    public function getRecentDeliveryAddress($mem_idx)
    {
        $column = 'OD.Receiver
            , OD.ReceiverTel1, if(length(OD.ReceiverTel2Enc) > 0, fn_dec(OD.ReceiverTel2Enc), "") as ReceiverTel2, OD.ReceiverTel3, if(length(OD.ReceiverTelEnc) > 0, fn_dec(OD.ReceiverTelEnc), "") as ReceiverTel
            , OD.ReceiverPhone1, fn_dec(OD.ReceiverPhone2Enc) as ReceiverPhone2, OD.ReceiverPhone3, fn_dec(OD.ReceiverPhoneEnc) as ReceiverPhone
            , OD.ZipCode, OD.Addr1, fn_dec(OD.Addr2Enc) as Addr2, OD.DeliveryMemo';
        $arr_condition = ['EQ' => ['O.MemIdx' => $mem_idx]];

        $data = $this->_conn->getJoinListResult($this->_table['order'] . ' as O', 'inner', $this->_table['order_delivery_address'] . ' as OD'
            , 'O.OrderIdx = OD.OrderIdx'
            , $column, $arr_condition, 1, 0, ['O.OrderIdx' => 'desc']
        );

        return element('0', $data, []);
    }
}
