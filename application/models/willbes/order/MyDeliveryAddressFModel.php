<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyDeliveryAddressFModel extends WB_Model
{
    private $_table = 'lms_my_delivery_address';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 나의 배송 주소록 조회
     * @param $column
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listMyDeliveryAddress($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($column !== true) {
            $column = 'AddrIdx, AddrName, Receiver
                , ReceiverTel1, if(length(ReceiverTel2Enc) > 0, fn_dec(ReceiverTel2Enc), "") as ReceiverTel2, ReceiverTel3, if(length(ReceiverTelEnc) > 0, fn_dec(ReceiverTelEnc), "") as ReceiverTel
                , ReceiverPhone1, fn_dec(ReceiverPhone2Enc) as ReceiverPhone2, ReceiverPhone3, fn_dec(ReceiverPhoneEnc) as ReceiverPhone, ZipCode, Addr1, fn_dec(Addr2Enc) as Addr2';
        }

        return $this->_conn->getListResult($this->_table, $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 나의 배송 주소록 등록
     * @param array $input
     * @return array|bool
     */
    public function addMyDeliveryAddress($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자
            $regi_ip = $this->input->ip_address();

            // 등록된 주소록 갯수 조회
            $regi_cnt = $this->listMyDeliveryAddress(true, ['EQ' => ['MemIdx' => $sess_mem_idx]]);
            if ($regi_cnt >= 5) {
                throw new \Exception('주소록은 최대 5개까지 등록 가능합니다.' . PHP_EOL . '기존 주소록을 삭제한 후 등록해 주시기 바랍니다.');
            }

            // 주소록 등록
            $data = [
                'MemIdx' => $sess_mem_idx,
                'AddrName' => element('addr_name', $input),
                'Receiver' => element('receiver', $input),
                'ReceiverTel1' => element('receiver_tel1', $input),
                'ReceiverTel3' => element('receiver_tel3', $input),
                'ReceiverPhone1' => element('receiver_phone1', $input),
                'ReceiverPhone3' => element('receiver_phone3', $input),
                'ZipCode' => element('zipcode', $input),
                'Addr1' => element('addr1', $input),
                'RegIp' => $regi_ip
            ];
            $this->_conn->set($data)
                ->set('ReceiverTel2Enc', 'fn_enc("' . element('receiver_tel2', $input) . '")', false)
                ->set('ReceiverTelEnc', 'fn_enc("' . element('receiver_tel', $input) . '")', false)
                ->set('ReceiverPhone2Enc', 'fn_enc("' . element('receiver_phone2', $input) . '")', false)
                ->set('ReceiverPhoneEnc', 'fn_enc("' . element('receiver_phone', $input) . '")', false)
                ->set('Addr2Enc', 'fn_enc("' . element('addr2', $input) . '")', false);

            if ($this->_conn->insert($this->_table) === false) {
                throw new \Exception('배송 주소록 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 나의 배송 주소록 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyMyDeliveryAddress($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자
            $addr_idx = element('addr_idx', $input);

            if (empty($addr_idx) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            // 주소록 수정
            $data = [
                'AddrName' => element('addr_name', $input),
                'Receiver' => element('receiver', $input),
                'ReceiverTel1' => element('receiver_tel1', $input),
                'ReceiverTel3' => element('receiver_tel3', $input),
                'ReceiverPhone1' => element('receiver_phone1', $input),
                'ReceiverPhone3' => element('receiver_phone3', $input),
                'ZipCode' => element('zipcode', $input),
                'Addr1' => element('addr1', $input)
            ];
            $this->_conn->set($data)
                ->set('ReceiverTel2Enc', 'fn_enc("' . element('receiver_tel2', $input) . '")', false)
                ->set('ReceiverTelEnc', 'fn_enc("' . element('receiver_tel', $input) . '")', false)
                ->set('ReceiverPhone2Enc', 'fn_enc("' . element('receiver_phone2', $input) . '")', false)
                ->set('ReceiverPhoneEnc', 'fn_enc("' . element('receiver_phone', $input) . '")', false)
                ->set('Addr2Enc', 'fn_enc("' . element('addr2', $input) . '")', false);

            if ($this->_conn->where('AddrIdx', $addr_idx)->where('MemIdx', $sess_mem_idx)->update($this->_table) === false) {
                throw new \Exception('배송 주소록 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 나의 배송 주소록 삭제
     * @param $addr_idx
     * @return array|bool
     */
    public function removeMyDeliveryAddress($addr_idx)
    {
        $this->_conn->trans_begin();

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자

            if (empty($addr_idx) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            if ($this->_conn->where('AddrIdx', $addr_idx)->where('MemIdx', $sess_mem_idx)->delete($this->_table) === false) {
                throw new \Exception('배송 주소록 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
