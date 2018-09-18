<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/pass/BaseReadingRoomModel.php';

class ReadingRoomModel extends BaseReadingRoomModel
{
    public function listAllReadingRoom($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                a.*
                ,ab.countN, ab.countY
                ,pa.SalePrice AS main_SalePrice, pa.SaleRate AS main_SaleRate, pa.SaleDiscType AS main_SaleDiscType, pa.RealSalePrice AS main_RealSalePrice
                ,pb.SalePrice AS sub_SalePrice, pb.SaleRate AS sub_SaleRate, pb.SaleDiscType AS sub_SaleDiscType, pb.RealSalePrice AS sub_RealSalePrice
                ,c.SiteName, d.CcdName AS CampusName
                ,e.wAdminName AS RegAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM (
                SELECT LrIdx, ProdCode, SubProdCode, SiteCode, CampusCcd, IsUse, IsStatus, Name AS ReadingRoomName, LakeLayer, UseQty, TransverseNum, StartNo, EndNo, IsSmsUse, UseStartDate, UseEndDate, RegDatm, RegAdminIdx
                FROM {$this->_table['readingRoom']}
                WHERE MangType = 'R' AND IsStatus = 'Y'
            ) AS a
            INNER JOIN {$this->_table['product_sale']} AS pa ON a.ProdCode = pa.ProdCode AND pa.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_sale']} AS pb ON a.SubProdCode = pb.ProdCode AND pb.IsStatus = 'Y'
            INNER JOIN {$this->_table['lms_site']} AS c ON a.SiteCode = c.SiteCode
            LEFT OUTER JOIN {$this->_table['lms_sys_code']} AS d ON a.CampusCcd = d.Ccd
            INNER JOIN {$this->_table['wbs_sys_admin']} AS e ON a.RegAdminIdx = e.wAdminIdx AND e.wIsStatus='Y'
            INNER JOIN (
                SELECT temp_a.LrIdx,
                SUM(IF(temp_a.StatusCcd = {$this->_arr_reading_room_status_ccd['N']}, '1', '0')) AS countN,
                SUM(IF(temp_a.StatusCcd = {$this->_arr_reading_room_status_ccd['Y']}, '1', '0')) AS countY
                FROM {$this->_table['readingRoom_mst']} AS temp_a
                INNER JOIN {$this->_table['readingRoom']} AS temp_b ON temp_a.LrIdx = temp_b.LrIdx AND temp_b.MangType = 'R'
                GROUP BY temp_a.LrIdx
            ) AS ab ON a.LrIdx = ab.LrIdx        
        ";

        //사이트 권한
        $arr_condition['IN']['a.SiteCode'] = get_auth_site_codes();
        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        //켐퍼스 권한
        $where_campus = $this->_makeAuthCampusQueryString();
        $where = $where_temp . $where_campus;
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

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