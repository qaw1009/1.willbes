<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/product/on/CommonLectureModel.php';

class DeliveryPriceModel extends CommonLectureModel
{
    private $_prod_type_ccd = ['delivery_price' => '636005', 'delivery_add_price' => '636006'];
    private $_prod_type_name = ['delivery_price' => '배송료', 'delivery_add_price' => '추가 배송료'];
    private $_prod_type_is_coupon = ['delivery_price' => 'Y', 'delivery_add_price' => 'N'];
    private $_available_sale_status_ccd = '618001'; // 판매상태 공통코드 : 판매가능
    private $_default_point_apply_ccd = '635002';   // 포인트 적용 공통코드 : 강좌
    private $_default_sale_type_ccd = '613001'; // 판매가격 구분 공통코드 : PC+모바일
    private $_min_prod_code = '100001'; // 상품코드 채번을 위한 최소 상품코드 값
    private $_max_prod_code = '199999'; // 상품코드 채번을 위한 최대 상품코드 값

    /**
     * 배송료, 추가 배송료 상품 등록
     * @param int $site_code [사이트코드]
     * @param int $delivery_price [배송료]
     * @param int $delivery_add_price [추가 배송료]
     * @return array|bool
     */
    public function replaceProduct($site_code, $delivery_price = 0, $delivery_add_price = 0)
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $arr_delivery_price = ['delivery_price' => $delivery_price, 'delivery_add_price' => $delivery_add_price];

            if (empty($site_code) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            foreach ($arr_delivery_price as $prod_type => $prod_price) {
                $prod_type_cdd = $this->_prod_type_ccd[$prod_type];

                // 배송료 상품 등록여부 확인
                $row = $this->_conn->getFindResult($this->_table['product'], 'ProdCode',
                    ['EQ' => ['SiteCode' => $site_code, 'ProdTypeCcd' => $prod_type_cdd]]);

                if (empty($row) === true) {
                    // 상품코드 채번
                    $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 100001) as ProdCode',
                        ['BET' => ['ProdCode' => [$this->_min_prod_code, $this->_max_prod_code]]]);

                    $data = [
                        'ProdCode' => $row['ProdCode'],
                        'SiteCode' => $site_code,
                        'ProdName' => $this->_prod_type_name[$prod_type],
                        'ProdTypeCcd' => $prod_type_cdd,
                        'SaleStartDatm' => date('Y-m-d') . ' 00:00:00',
                        'SaleEndDatm' => '2100-12-31 23:59:59',
                        'SaleStatusCcd' => $this->_available_sale_status_ccd,
                        'IsSaleEnd' => 'N',
                        'IsCoupon' => $this->_prod_type_is_coupon[$prod_type],
                        'IsPoint' => 'N',
                        'PointApplyCcd' => $this->_default_point_apply_ccd,
                        'PointSaveType' => 'R',
                        'PointSavePrice' => 0,
                        'IsBest' => 'N',
                        'IsNew' => 'N',
                        'IsCart' => 'N',
                        'IsRefund' => 'Y',
                        'IsFreebiesTrans' => 'N',
                        'IsSms' => 'N',
                        'IsUse' => 'Y',
                        'IsDeliveryInfo' => 'N',
                        'RegAdminIdx' => $sess_admin_idx,
                        'RegIp' => $reg_ip
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['product']) === false) {
                        throw new \Exception('배송료 상품 정보 등록에 실패했습니다.');
                    }
                }

                // 기존 배송료 가격 조회
                $price_row = $this->_conn->getFindResult($this->_table['sale'], 'SalePrice', ['EQ' => ['ProdCode' => $row['ProdCode'], 'IsStatus' => 'Y']]);

                if (empty($price_row) === true || $price_row['SalePrice'] != $prod_price) {
                    // 배송료 가격 등록
                    $data = [
                        'SaleTypeCcd' => [$this->_default_sale_type_ccd],
                        'SalePriceIsUse' => ['Y'],
                        'SalePrice' => [$prod_price],
                        'SaleDiscType' => ['R'],
                        'SaleRate' => [0],
                        'RealSalePrice' => [$prod_price]
                    ];

                    if($this->_setPrice($data, $row['ProdCode']) !== true) {
                        throw new \Exception('배송료 상품 가격 등록에 실패했습니다.');
                    }

                    // 배송료 가격 JSON 데이터 등록
                    $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$row['ProdCode']]);
                    $sp_result = $query->row(0)->ReturnMsg;
                    if ($sp_result != 'Success') {
                        throw new \Exception('배송료 상품 가격 JSON 데이터 등록에 실패했습니다.');
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
}
