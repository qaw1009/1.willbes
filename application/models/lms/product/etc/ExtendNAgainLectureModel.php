<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/product/on/CommonLectureModel.php';

class ExtendNAgainLectureModel extends CommonLectureModel
{
    private $_prod_type_ccd = ['extend_lecture' => '636010', 'again_lecture' => '636011'];
    private $_prod_type_name = ['extend_lecture' => '수강연장', 'again_lecture' => '재수강'];
    private $_available_sale_status_ccd = '618001'; // 판매상태 공통코드 : 판매가능
    private $_default_point_apply_ccd = '635001';   // 포인트 적용 공통코드 : 전체
    private $_default_sale_type_ccd = '613001'; // 판매가격 구분 공통코드 : PC+모바일
    private $_min_prod_code = '100001'; // 상품코드 채번을 위한 최소 상품코드 값
    private $_max_prod_code = '199999'; // 상품코드 채번을 위한 최대 상품코드 값
    
    /**
     * 수강연장, 재수강 상품 등록 (상품 데이터 수정 안함)
     * @param int $site_code [사이트코드]
     * @return array|bool
     */
    public function replaceProduct($site_code)
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            if (empty($site_code) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            foreach ($this->_prod_type_ccd as $prod_type => $prod_type_cdd) {
                // 상품 등록여부 확인
                $row = $this->_conn->getFindResult($this->_table['product'], 'ProdCode',
                    ['EQ' => ['SiteCode' => $site_code, 'ProdTypeCcd' => $prod_type_cdd]]);

                if (empty($row) === true) {
                    // 상품코드 채번
                    $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 100001) as ProdCode',
                        ['BET' => ['ProdCode' => [$this->_min_prod_code, $this->_max_prod_code]]]);

                    // 상품 등록
                    $data = [
                        'ProdCode' => $row['ProdCode'],
                        'SiteCode' => $site_code,
                        'ProdName' => $this->_prod_type_name[$prod_type],
                        'ProdTypeCcd' => $prod_type_cdd,
                        'SaleStartDatm' => date('Y-m-d') . ' 00:00:00',
                        'SaleEndDatm' => '2100-12-31 23:59:59',
                        'SaleStatusCcd' => $this->_available_sale_status_ccd,
                        'IsSaleEnd' => 'N',
                        'IsCoupon' => 'N',
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
                        throw new \Exception($this->_prod_type_name[$prod_type] . ' 상품 정보 등록에 실패했습니다.');
                    }

                    // 상품가격 등록
                    $data = [
                        'SaleTypeCcd' => [$this->_default_sale_type_ccd],
                        'SalePriceIsUse' => ['Y'],
                        'SalePrice' => [0],
                        'SaleDiscType' => ['R'],
                        'SaleRate' => [0],
                        'RealSalePrice' => [0]
                    ];

                    if($this->_setPrice($data, $row['ProdCode']) !== true) {
                        throw new \Exception($this->_prod_type_name[$prod_type] . ' 상품 가격 등록에 실패했습니다.');
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
