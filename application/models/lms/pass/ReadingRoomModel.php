<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/pass/BaseReadingRoomModel.php';

class ReadingRoomModel extends BaseReadingRoomModel
{
    /**
     * 독서실/사물함 리스트
     * @param $mang_type
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllReadingRoom($mang_type, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
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
                WHERE MangType = '{$mang_type}' AND IsStatus = 'Y'
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
                INNER JOIN {$this->_table['readingRoom']} AS temp_b ON temp_a.LrIdx = temp_b.LrIdx AND temp_b.MangType = '{$mang_type}'
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
     * 독서실/사물함 데이터 조회
     * @param $lr_idx
     * @param $column
     * @return mixed
     */
    public function getReadingRoomInfo($lr_idx, $column)
    {
        return $this->_getReadingRoomInfo($lr_idx, $column);
    }

    /**
     * 독서실/사물함 상세 데이터 조회
     * @param $prod_code
     * @return mixed
     */
    public function findReadingRoom($prod_code)
    {
        $column = '
                a.*
                ,ab.countN, ab.countY
                ,pa.SalePrice AS main_SalePrice, pa.SaleRate AS main_SaleRate, pa.SaleDiscType AS main_SaleDiscType, pa.RealSalePrice AS main_RealSalePrice
                ,pb.SalePrice AS sub_SalePrice, pb.SaleRate AS sub_SaleRate, pb.SaleDiscType AS sub_SaleDiscType, pb.RealSalePrice AS sub_RealSalePrice
                ,c.SiteName, d.CcdName AS CampusName
                ,e.wAdminName AS RegAdminName, eb.wAdminName AS UpdAdminName
            ';

        $from = "
            FROM (
                SELECT
                LrIdx, ProdCode, SubProdCode, SiteCode, CampusCcd, IsUse, IsStatus, Name AS ReadingRoomName, LakeLayer, UseQty, TransverseNum, StartNo, EndNo, IsSmsUse, UseStartDate, UseEndDate
                ,{$this->_table['readingRoom']}.Desc, SendTel, SmsContent ,RegDatm, RegAdminIdx, UpdAdminIdx, UpdDatm
                FROM {$this->_table['readingRoom']}
                WHERE ProdCode = '{$prod_code}' AND IsStatus = 'Y'
            ) AS a
            INNER JOIN {$this->_table['product_sale']} AS pa ON a.ProdCode = pa.ProdCode AND pa.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_sale']} AS pb ON a.SubProdCode = pb.ProdCode AND pb.IsStatus = 'Y'
            INNER JOIN {$this->_table['lms_site']} AS c ON a.SiteCode = c.SiteCode
            LEFT OUTER JOIN {$this->_table['lms_sys_code']} AS d ON a.CampusCcd = d.Ccd
            INNER JOIN {$this->_table['wbs_sys_admin']} AS e ON a.RegAdminIdx = e.wAdminIdx AND e.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['wbs_sys_admin']} AS eb ON a.UpdAdminIdx = eb.wAdminIdx AND eb.wIsStatus='Y'
            INNER JOIN (
                SELECT temp_a.LrIdx,
                SUM(IF(temp_a.StatusCcd = {$this->_arr_reading_room_status_ccd['N']}, '1', '0')) AS countN,
                SUM(IF(temp_a.StatusCcd = {$this->_arr_reading_room_status_ccd['Y']}, '1', '0')) AS countY
                FROM {$this->_table['readingRoom_mst']} AS temp_a
                INNER JOIN {$this->_table['readingRoom']} AS temp_b ON temp_a.LrIdx = temp_b.LrIdx AND temp_b.ProdCode = '{$prod_code}' AND temp_b.IsStatus = 'Y'
                GROUP BY temp_a.LrIdx
            ) AS ab ON a.LrIdx = ab.LrIdx
        ";

        return $this->_conn->query('select '.$column .$from)->row_array();
    }

    /**
     * 독서실/사물함 좌석리스트
     * @param $prod_code
     * @return mixed
     */
    public function listSeat($prod_code)
    {
        $column = 'a.*, b.SerialNumber, b.StatusCcd, b.MemIdx, b.MemName';
        $from = "
            FROM (
                SELECT LrIdx, ProdCode
                FROM {$this->_table['readingRoom']}
                WHERE ProdCode = '{$prod_code}' AND IsUse = 'Y' AND IsStatus = 'Y'
            ) AS a
            INNER JOIN (
                SELECT temp_a.LrIdx, temp_a.SerialNumber, temp_a.StatusCcd, temp_d.MemIdx, temp_d.MemName
                FROM {$this->_table['readingRoom_mst']} AS temp_a
                INNER JOIN {$this->_table['readingRoom']} AS temp_b ON temp_a.LrIdx = temp_b.LrIdx
                LEFT JOIN {$this->_table['lms_order']} AS temp_c ON temp_a.NowOrderIdx = temp_c.OrderIdx
                LEFT JOIN {$this->_table['lms_member']} AS temp_d ON temp_c.MemIdx = temp_d.MemIdx
                WHERE temp_b.ProdCode = '{$prod_code}' AND temp_b.IsUse = 'Y' AND temp_b.IsStatus = 'Y'
            ) AS b ON a.LrIdx = b.LrIdx
        ";

        return $this->_conn->query('select '.$column .$from)->result_array();
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

    /**
     * 독서실/사물함 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyReadingRoom($input = [], $lr_idx)
    {
        $this->_conn->trans_begin();
        try {
            // 상품수정
            if ($this->readingRoomModel->_modifyProductForReadingRoom($input) !== true) {
                throw new \Exception('상품 수정에 실패했습니다.');
            }

            // 예치금 상품수정
            if ($this->readingRoomModel->_modifySubProductForReadingRoom($input) !== true) {
                throw new \Exception('예치금 수정에 실패했습니다.');
            }

            // 판매가격 등록
            if ($this->readingRoomModel->_setProductPriceForReadingRoom($input) !== true) {
                throw new \Exception('상품 가격 수정에 실패했습니다.');
            }

            // 예치금 판매가격 등록
            if ($this->readingRoomModel->_setSubProductPriceForReadingRoom($input) !== true) {
                throw new \Exception('예치금 가격 수정에 실패했습니다.');
            }

            // 연관상품(예치금) 등록
            if ($this->readingRoomModel->_setSubProduct($input) !== true) {
                throw new \Exception('예치금 상품 수정에 실패했습니다.');
            }

            // SMS 발송
            if($this->_setSms($input) !== true) {
                throw new \Exception('SMS 수정에 실패했습니다.');
            }

            // 독서실/사물함 기본 정보 등록
            if ($this->readingRoomModel->_modifyReadingRoom($input) !== true) {
                throw new \Exception($this->readingRoomModel->arr_mang_title[element('mang_type',$input)].' 수정에 실패했습니다.');
            }

            // 독서실/사물함 좌석 정보 등록
            if ($this->readingRoomModel->_setReadingRoomMst($input) !== true) {
                throw new \Exception($this->readingRoomModel->arr_mang_title[element('mang_type',$input)].' 좌석 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 메모 리스트
     * @param $master_order_idx
     * @return mixed
     */
    public function getMemoListAll($master_order_idx = '')
    {
        $column = 'a.RmIdx, a.Memo, b.wAdminName AS RegAdminName, a.RegDatm';
        $from = "
            FROM {$this->_table['readingRoom_Memo']} as a
            INNER JOIN {$this->_table['wbs_sys_admin']} as b ON a.RegAdminIdx = b.wAdminIdx AND b.wIsStatus='Y'
        ";

        $arr_condition = [
            'RAW' => [
                'a.MasterOrderIdx = ' => (empty($master_order_idx) === true) ? '\'\'' : $master_order_idx
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['a.RmIdx' => 'DESC'])->getMakeOrderBy();

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return $query->result_array();
    }

    /**
     * 좌석배정/연장
     * @param $input
     * @param $now_order_idx
     * @param $master_order_idx : 연장 시 필요한 값
     */
    public function addSeat($input, $now_order_idx, $master_order_idx = null)
    {
        /**
         * 좌석상태 체크
         *
         */
    }
}