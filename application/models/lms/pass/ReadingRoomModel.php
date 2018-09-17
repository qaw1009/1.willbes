<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/pass/BaseReadingRoomModel.php';

class ReadingRoomModel extends BaseReadingRoomModel
{
    /**
     * 독서실/사물함 등록
     * @param array $input
     * @return array|bool
     */
    public function addReadingRoom($input = [])
    {
        $this->_conn->trans_begin();
        try {
            // 상품등록
            if ($this->readingRoomModel->_addProductForReadingRoom($input) !== true) {
                throw new \Exception('상품 등록에 실패했습니다.');
            }

            // 예치금 상품등록
            if ($this->readingRoomModel->_addSubProductForReadingRoom($input) !== true) {
                throw new \Exception('예치금 등록에 실패했습니다.');
            }

            // 판매가격 등록
            if ($this->readingRoomModel->_setProductPriceForReadingRoom($input) !== true) {
                throw new \Exception('상품 가격 등록에 실패했습니다.');
            }

            // 예치금 판매가격 등록
            if ($this->readingRoomModel->_setSubProductPriceForReadingRoom($input) !== true) {
                throw new \Exception('예치금 가격 등록에 실패했습니다.');
            }

            // 연관상품(예치금) 등록
            if ($this->readingRoomModel->_setSubProduct($input) !== true) {
                throw new \Exception('예치금 상품 등록에 실패했습니다.');
            }

            // SMS 발송
            if($this->_setSms($input) !== true) {
                throw new \Exception('SMS 등록에 실패했습니다.');
            }

            // 독서실/사물함 기본 정보 등록
            if ($this->readingRoomModel->_addReadingRoom($input) !== true) {
                throw new \Exception($this->readingRoomModel->arr_mang_title[element('mang_type',$input)].' 등록에 실패했습니다.');
            }

            // 독서실/사물함 좌석 정보 등록
            if ($this->readingRoomModel->_setReadingRoomMst($input) !== true) {
                throw new \Exception($this->readingRoomModel->arr_mang_title[element('mang_type',$input)].' 좌석 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}