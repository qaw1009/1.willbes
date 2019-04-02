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
                SELECT STRAIGHT_JOIN temp_a.LrIdx,
                SUM(IF(temp_a.StatusCcd = {$this->_arr_reading_room_status_ccd['N']}, '1', '0')) AS countN,
                SUM(IF(temp_a.StatusCcd = {$this->_arr_reading_room_status_ccd['Y']}, '1', '0')) AS countY
                FROM {$this->_table['readingRoom_mst']} AS temp_a
                INNER JOIN {$this->_table['readingRoom']} AS temp_b ON temp_a.LrIdx = temp_b.LrIdx AND temp_b.MangType = '{$mang_type}' AND temp_b.IsStatus = 'Y'
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
        $query = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 독서실/사물함 단일 데이터 조회
     * @param $arr_condition
     * @param $column
     * @return mixed
     */
    public function getReadingRoomInfo($arr_condition, $column)
    {
        return $this->_getReadingRoomInfo($arr_condition, $column);
    }

    /**
     * 독서실/사물함 다중 데이터 조회
     * @param $arr_condition
     * @param $column
     * @return mixed
     */
    public function listReadingRoomInfo($arr_condition, $column)
    {
        return $this->_listReadingRoomInfo($arr_condition, $column);
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
                SELECT STRAIGHT_JOIN temp_a.LrIdx,
                SUM(IF(temp_a.StatusCcd = {$this->_arr_reading_room_status_ccd['N']}, '1', '0')) AS countN,
                SUM(IF(temp_a.StatusCcd = {$this->_arr_reading_room_status_ccd['Y']}, '1', '0')) AS countY
                FROM {$this->_table['readingRoom_mst']} AS temp_a
                INNER JOIN {$this->_table['readingRoom']} AS temp_b ON temp_a.LrIdx = temp_b.LrIdx AND temp_b.ProdCode = '{$prod_code}' AND temp_b.IsStatus = 'Y'
                GROUP BY temp_a.LrIdx
            ) AS ab ON a.LrIdx = ab.LrIdx
        ";

        return $this->_conn->query('select STRAIGHT_JOIN '.$column .$from)->row_array();
    }

    /**
     * 독서실/사물함 상세 데이터 조회 [현재주문 식별자 기준 좌석데이터 조인]
     * @param $OrderIdx
     * @param array $arr_condition
     * @return mixed
     */
    public function findReadingRoomForModify($OrderIdx, $arr_condition = [], $mang_type)
    {
        $column = '
                a.LrIdx, a.CampusCcd, a.TransverseNum, b.OrderIdx, b.OrderNo, b.ReprProdName, m.MemId, m.MemName, fn_dec(m.PhoneEnc) AS MemPhone, op.ProdCode, op.RealPayPrice, b.OrderDatm,
                c.MasterOrderIdx, c.NowOrderIdx, c.SerialNumber, c.StatusCcd AS SeatStatusCcd, c.UseStartDate, c.UseEndDate,
                op.PayStatusCcd, f.SiteName,
                fn_ccd_name(a.CampusCcd) AS CampusName,
                fn_ccd_name(op.PayStatusCcd) AS PayStatusName,
                e.wAdminName AS RegAdminName, c.RegDatm AS SeatRegDatm,
                IF(d.RefundIdx IS NULL,\'미반환\',\'반환\') AS SubRefundTypeName,
                d.RealPayPrice AS SubRealPayPrice
            ';
        $from = "
            FROM (
                SELECT
                o.OrderIdx, o.OrderNo, o.MemIdx, o.SiteCode, o.ReprProdName, o.OrderDatm, o.CompleteDatm
                FROM {$this->_table['lms_order']} AS o
                WHERE o.OrderIdx = '{$OrderIdx}'
                  ) AS b
            INNER JOIN {$this->_table['lms_order_product']} AS op ON b.OrderIdx = op.OrderIdx
            INNER JOIN {$this->_table['lms_member']} AS m ON b.MemIdx = m.MemIdx
            INNER JOIN {$this->_table['readingRoom']} AS a ON op.ProdCode = a.ProdCode AND a.MangType = '{$mang_type}' AND a.IsStatus = 'Y'
            INNER JOIN {$this->_table['readingRoom_mst']} AS c ON b.OrderIdx = c.NowOrderIdx
            
            LEFT JOIN (
                SELECT STRAIGHT_JOIN op.OrderIdx, op.ProdCode, op.PayStatusCcd, opr.RefundIdx, opr.RefundPrice, op.RealPayPrice
                FROM lms_product AS p
                INNER JOIN {$this->_table['lms_order_product']} AS op ON p.ProdCode = op.ProdCode
                INNER JOIN {$this->_table['lms_order_product_refund']} AS opr ON op.OrderProdIdx = opr.OrderProdIdx
                WHERE p.ProdTypeCcd = '{$this->_sub_product_type_ccd}'
            ) AS d ON a.SubProdCode = d.ProdCode AND c.NowOrderIdx = d.OrderIdx
            
            INNER JOIN {$this->_table['lms_site']} AS f ON b.SiteCode = f.SiteCode AND f.IsStatus = 'Y'
            INNER JOIN {$this->_table['wbs_sys_admin']} AS e ON c.RegAdminIdx = e.wAdminIdx AND e.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select STRAIGHT_JOIN '.$column . $from . $where)->row_array();
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
                SELECT STRAIGHT_JOIN temp_a.LrIdx, temp_a.SerialNumber, temp_a.StatusCcd, temp_d.MemIdx, temp_d.MemName
                FROM {$this->_table['readingRoom_mst']} AS temp_a
                INNER JOIN {$this->_table['readingRoom']} AS temp_b ON temp_a.LrIdx = temp_b.LrIdx
                LEFT JOIN {$this->_table['lms_order']} AS temp_c ON temp_a.NowOrderIdx = temp_c.OrderIdx
                LEFT JOIN {$this->_table['lms_member']} AS temp_d ON temp_c.MemIdx = temp_d.MemIdx
                WHERE temp_b.ProdCode = '{$prod_code}' AND temp_b.IsUse = 'Y' AND temp_b.IsStatus = 'Y'
            ) AS b ON a.LrIdx = b.LrIdx
        ";

        return $this->_conn->query('select STRAIGHT_JOIN '.$column .$from)->result_array();
    }

    public function getReadingRoomMst($arr_condition, $column)
    {
        return $this->_getReadingRoomMst($arr_condition, $column);
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

            // 판매가격, 예치금가격 JSON 데이터 등록
            if ($this->readingRoomModel->_addProdJsonData() !== true) {
                throw new \Exception('판매가격 또는 예치금가격 JSON 데이터 등록에 실패했습니다.');
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
     * @param $lr_idx
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

        $query = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from . $where . $order_by_offset_limit);
        return $query->result_array();
    }

    /**
     * 좌석배정/연장
     * @param $input
     * @param $now_order_idx
     * @return array|bool
     */
    public function addSeat($input, $now_order_idx)
    {
        try {
            if (empty($input['prod_code']) == true) {
                throw new \Exception('좌석 등록에 필요한 데이터 없음.');
            }

            foreach ($input['prod_code'] as $key => $prod_code) {
                $arr_condition = [
                    'EQ' => [
                        'ProdCode' => $prod_code,
                        'IsStatus' => 'Y'
                    ]
                ];

                //독서실/사물함 식별자 조회
                $reading_info = $this->getReadingRoomInfo($arr_condition, 'LrIdx');

                //연장 : 1, 신규 : else
                if ($input['rdr_is_extension'][$key] == 1) {
                    $memo_master_order_idx = $input['rdr_master_order_idx'][$key];
                    if ($this->_addSeatExtension($prod_code, $key, $reading_info, $input, $now_order_idx) !== true) {
                        throw new \Exception('좌석 등록에 실패했습니다.');
                    }
                } else {
                    $memo_master_order_idx = $now_order_idx;
                    if ($this->_addSeatNotExtension($prod_code, $key, $reading_info, $input, $now_order_idx) !== true) {
                        throw new \Exception('좌석 등록에 실패했습니다.');
                    }
                }

                //메모 저장
                if (empty($input['rdr_memo'][$key]) === false) {
                    if ($this->_addMemo($memo_master_order_idx, $input['rdr_memo'][$key]) !== true) {
                        throw new \Exception('메모 등록에 실패했습니다.');
                    }
                }
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 좌석상태수정
     * 수정불가 : 사용중인 상태, 기타상태에서 '사용중'으로 업데이트할 경우
     * @param $input
     * @return array|bool
     */
    public function modifyReadingRoomSeatType($input)
    {
        $this->_conn->trans_begin();
        try {
            if ((element('seat_status', $input)) == $this->_arr_reading_room_status_ccd['Y']) {
                throw new \Exception('사용중인 상태로 수정할 수 없습니다.');
            }

            //좌석정보 조회
            $arr_condition = [
                'EQ' => [
                    'LrIdx' => element('lr_idx', $input),
                    'SerialNumber' => element('choice_serial_num', $input)
                ]
            ];
            $arr_use_seat_data = $this->getReadingRoomMst($arr_condition, 'MIdx, StatusCcd');
            if ($arr_use_seat_data['StatusCcd'] == $this->_arr_reading_room_status_ccd['Y']) {
                throw new \Exception('사용중인 좌석은 수정할 수 없습니다.');
            }

            if ($this->_updateSeatTypeForMst($input) !== true) {
                throw new \Exception('좌석 상태 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 신규등록
     * @param $prod_code
     * @param $key
     * @param $reading_info
     * @param $input
     * @param $now_order_idx
     * @return array|bool
     */
    private function _addSeatNotExtension($prod_code, $key, $reading_info, $input, $now_order_idx)
    {
        try {
            //사용중인 좌석 조회 [readingRoomMst, readingRoomDetail 2개 테이블 확인]
            $arr_condition = [
                'EQ' => [
                    'SerialNumber' => $input['serial_num'][$key],
                    'StatusCcd' => $this->_arr_reading_room_status_ccd['Y'],
                    'LrIdx' => $reading_info['LrIdx']
                ]
            ];
            $mst_data = $this->getReadingRoomMst($arr_condition, 'MIdx');
            if (empty($mst_data['MIdx']) === false) {
                throw new \Exception('사용중인 좌석입니다.');
            }

            $arr_condition = [
                'EQ' => [
                    'NowMIdx' => $input['serial_num'][$key],
                    'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['in'],
                    'LrIdx' => $reading_info['LrIdx']
                ]
            ];
            $detail_data = $this->_getReadingRoomUseDetail($arr_condition);
            if (count($detail_data) > 0) {
                throw new \Exception('등록된 좌석 정보가 있습니다.');
            }

            //좌석상태업데이트
            if ($this->_updateSeatMstNotExtension($reading_info['LrIdx'], $input['serial_num'][$key], $now_order_idx, $input['seat_status'][$key], $input['rdr_use_start_date'][$key], $input['rdr_use_end_date'][$key]) !== true) {
                throw new \Exception('좌석상태 수정에 실패했습니다.');
            }

            //입실 좌석상세정보저장
            if ($this->_insertSeatDetailForRoomIn($prod_code, $reading_info['LrIdx'], $now_order_idx, $now_order_idx, $input['serial_num'][$key], '', $input['rdr_use_start_date'][$key], $input['rdr_use_end_date'][$key]) !== true) {
                throw new \Exception('좌석 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 신규등록 [연장]
     * @param $prod_code
     * @param $key
     * @param $reading_info
     * @param $input
     * @param $now_order_idx
     * @return array|bool
     */
    private function _addSeatExtension($prod_code, $key, $reading_info, $input, $now_order_idx)
    {
        try {
            //좌석상태업데이트
            if ($this->_updateSeatMstExtension($reading_info['LrIdx'], $input['serial_num'][$key], $now_order_idx, $input['seat_status'][$key], $input['rdr_use_start_date'][$key], $input['rdr_use_end_date'][$key], $input['rdr_master_order_idx'][$key]) !== true) {
                throw new \Exception('좌석상태 수정에 실패했습니다.');
            }

            //입실 좌석상세정보저장
            if ($this->_insertSeatDetailForRoomInExtension($prod_code, $reading_info['LrIdx'], $now_order_idx, $input['serial_num'][$key], '', $input['rdr_use_start_date'][$key], $input['rdr_use_end_date'][$key], $input['rdr_master_order_idx'][$key]) !== true) {
                throw new \Exception('좌석 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 독서실/사물함 신청내역/연장 리스트
     * @param $mang_type
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSeatDetail($mang_type, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                a.LrIdx, b.OrderIdx, b.OrderNo, c.MasterOrderIdx, c.NowOrderIdx, b.ReprProdName, b.OrderDatm, op.OrderPrice
                , c.NowMIdx, a.CampusCcd, op.PayStatusCcd
                , op.ProdCode, op.OrderPrice, m.MemName, fn_dec(m.PhoneEnc) AS MemPhone
                , fn_ccd_name(a.CampusCcd) AS CampusName
                , fn_ccd_name(op.PayStatusCcd) AS PayStatusName
                , c.UseStartDate, c.UseEndDate, c.StatusCcd AS SeatStatusCcd
                , fn_ccd_name(c.StatusCcd) AS SeatStatusName
                , e.wAdminName AS RegAdminName, c.RegDatm AS SeatRegDatm
                , IFNULL(f.ExtensionType,\'N\') AS ExtensionType
                , IF(d.RefundIdx IS NULL,\'미반환\',\'반환\') AS SubRefundTypeName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM (
                SELECT o.OrderIdx, o.OrderNo, o.MemIdx, o.SiteCode, o.ReprProdName, o.OrderDatm, o.CompleteDatm
                FROM {$this->_table['lms_order']} AS o
                WHERE o.PayRouteCcd = '{$this->_order_route_ccd}'
            ) AS b
            
            INNER JOIN {$this->_table['lms_order_product']} AS op ON b.OrderIdx = op.OrderIdx
            INNER JOIN {$this->_table['lms_member']} AS m ON b.MemIdx = m.MemIdx
            INNER JOIN {$this->_table['readingRoom']} AS a ON op.ProdCode = a.ProdCode AND a.MangType = '{$mang_type}' AND a.IsStatus = 'Y'
            INNER JOIN {$this->_table['readingRoom_useDetail']} AS c ON b.OrderIdx = c.NowOrderIdx AND a.LrIdx = c.LrIdx
            INNER JOIN {$this->_table['wbs_sys_admin']} AS e ON c.RegAdminIdx = e.wAdminIdx AND e.wIsStatus='Y'
            
            LEFT JOIN (
                SELECT STRAIGHT_JOIN
                    a.LrIdx, a.MasterOrderIdx, a.NowOrderIdx, a.SerialNumber, a.UseEndDate,
                    IF ((TIMESTAMPDIFF(DAY, DATE_FORMAT(NOW(),'%Y-%m-%d'), a.UseEndDate) >= 0 && TIMESTAMPDIFF(DAY, DATE_FORMAT(NOW(),'%Y-%m-%d'), a.UseEndDate) <= 7) ||
                            (TIMESTAMPDIFF(DAY, DATE_FORMAT(NOW(),'%Y-%m-%d'), a.UseEndDate) <= 0 && TIMESTAMPDIFF(DAY, DATE_FORMAT(NOW(),'%Y-%m-%d'), a.UseEndDate) >= -7), 'Y','N'
                    ) AS ExtensionType
                    FROM {$this->_table['readingRoom_mst']} as a
                    INNER JOIN {$this->_table['readingRoom']} AS b ON a.LrIdx = b.LrIdx AND b.MangType = '{$mang_type}' AND b.IsStatus = 'Y'
                    WHERE StatusCcd = '{$this->_arr_reading_room_status_ccd['Y']}'
            ) AS f ON f.LrIdx = a.LrIdx AND f.SerialNumber = c.NowMIdx AND f.UseEndDate = c.UseEndDate
            
            LEFT JOIN (
                SELECT STRAIGHT_JOIN op.OrderIdx, op.ProdCode, op.PayStatusCcd, opr.RefundIdx, opr.RefundPrice
                FROM lms_product AS p
                INNER JOIN {$this->_table['lms_order_product']} AS op ON p.ProdCode = op.ProdCode
                INNER JOIN {$this->_table['lms_order_product_refund']} AS opr ON op.OrderProdIdx = opr.OrderProdIdx
                WHERE p.ProdTypeCcd = '{$this->_sub_product_type_ccd}'
            ) AS d ON a.SubProdCode = d.ProdCode AND c.NowOrderIdx = d.OrderIdx
        ";

        //사이트 권한
        $arr_condition['IN']['a.SiteCode'] = get_auth_site_codes();
        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        //켐퍼스 권한
        $where_campus = $this->_makeAuthCampusQueryString();
        $where = $where_temp . $where_campus;
        $query = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 독서실/사물함 좌석 이동
     * @param array $input
     * @param $mang_type
     * @return array|bool
     */
    public function modifyReadingRoomSeat($input = [], $mang_type)
    {
        $this->_conn->trans_begin();
        try {
            $now_date = date('Ymd');
            $is_change_seat = 'Y';      //좌석변경여부 설정

            //좌석검증, 조회
            $data = $this->findReadingRoomForModify($input['now_order_idx']);
            if (empty($data) === true) {
                throw new \Exception('조회된 좌석정보가 없습니다.');
            }

            $use_end_date = str_replace('-','',$data['UseEndDate']);
            if ($use_end_date < $now_date) {
                $is_change_seat = 'N';
            }

            //좌석관리테이블 수정
            if ($this->_modifyReadingRoomMst($input, $data) !== true) {
                throw new \Exception($this->readingRoomModel->arr_mang_title[$mang_type].' 좌석 수정에 실패했습니다.');
            }

            /**
             * 좌석관리현황테이블 데이터 등록,수정
             *  - 좌석 이동할 경우
             *  - 금일 기준 종료일자가 남아있는 경우
            */
            if ($data['SerialNumber'] != $input['set_seat'] && $is_change_seat == 'Y') {
                if ($this->_modifyReadingRoomDetail($input, $data) !== true) {
                    throw new \Exception($this->readingRoomModel->arr_mang_title[$mang_type] . ' 좌석 수정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 퇴실처리 [기존주문식별자에 해당되는 데이터 퇴실 처리]
     * @param array $input
     * @return array|bool
     */
    public function modifyReadingRoomSeatForOut($input = [])
    {
        $this->_conn->trans_begin();
        try {
            //좌석검증, 조회
            $arr_condition = [
                'EQ' => [
                    'NowOrderIdx' => $input['now_order_idx'],
                    'LrIdx' => $input['lr_idx'],
                    'SerialNumber' => $input['now_seat_num']
                ],
                'NOT' => [
                    'StatusCcd' => $this->_arr_reading_room_status_ccd['N']
                ],
            ];
            $now_seat_data = $this->_getReadingRoomMst($arr_condition, 'SerialNumber, StatusCcd');
            if (empty($now_seat_data['SerialNumber']) === true) {
                throw new \Exception('조회된 좌석정보가 없습니다.');
            }

            //좌석관리테이블
            $arr_where = [
                'NowOrderIdx' => $input['now_order_idx'],
                'LrIdx' => $input['lr_idx'],
                'SerialNumber' => $input['now_seat_num']
            ];
            $update_data = [
                'MasterOrderIdx' => null,
                'NowOrderIdx' => null,
                'StatusCcd' => $this->_arr_reading_room_status_ccd['N'],
                'UseStartDate' => null,
                'UseEndDate' => null
            ];
            if ($this->updateReadingRoomMst($arr_where, $update_data) !== true) {
                throw new \Exception('좌석 수정에 실패했습니다.');
            }

            //좌석현황테이블
            $arr_where = [
                'NowOrderIdx' => $input['now_order_idx'],
                'LrIdx' => $input['lr_idx'],
                'NowMIdx' => $input['now_seat_num']
            ];
            $update_data = [
                'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['out']
            ];
            if ($this->updateSeatDetail($arr_where, $update_data) !== true) {
                throw new \Exception('좌석 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 메모저장
     * @param array $params
     * @return array|bool
     */
    public function addMemo($params = [])
    {
        $this->_conn->trans_begin();
        try {
            //메모 저장
            if ($this->_addMemo($params['master_order_idx'], $params['memo_content']) !== true) {
                throw new \Exception('메모 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 독서실/사물함 환불
     * @param $prod_code
     * @param $now_order_idx
     * @return bool
     */
    public function refundReadingRoom($prod_code, $now_order_idx)
    {
        //환불대상데이터 조회
        $target_data = $this->_findReadingRoomForTargetRefund($prod_code, $now_order_idx);
        if (empty($target_data) === true) {
            return '환불대상 상품 없습니다.';
        }

        //환불로 인한 좌석 상태 수정
        $arr_update_condition = [
            'LrIdx' => $target_data['LrIdx'],
            'NowOrderIdx' => $now_order_idx
        ];
        $arr_target_data = [
            'StatusCcd' => $this->_arr_reading_room_status_ccd['N'],
        ];
        if ($this->updateReadingRoomMst($arr_update_condition, $arr_target_data, 'Y') !== true) {
            return '좌석 상태 수정에 실패했습니다.';
        }

        //환불로 인한 회원의 좌석 상태 수정
        $arr_update_condition = [
            'LrIdx' => $target_data['LrIdx'],
            'NowOrderIdx' => $now_order_idx,
        ];
        $arr_target_data = [
            'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['out'],
        ];
        if ($this->updateSeatDetail($arr_update_condition, $arr_target_data) !== true) {
            return '회원좌석 상태 수정에 실패했습니다.';
        }

        return true;
    }

    /**
     * 환불대상 데이터 조회
     * @param $prod_code
     * @param $now_order_idx
     * @return mixed
     */
    private function _findReadingRoomForTargetRefund($prod_code, $now_order_idx)
    {
        $column = 'a.LrIdx';
        $arr_condition = [
            'RAW' => [
                'a.ProdCode = ' => (empty($prod_code) === true) ? '\'\'' : $prod_code,
                'b.NowOrderIdx = ' => (empty($now_order_idx) === true) ? '\'\'' : $now_order_idx,
            ],
            'EQ' => [
                'b.StatusCcd' => $this->_arr_reading_room_status_ccd['Y'],
                'OP.PayStatusCcd' => $this->_order_pay_status_ccd,
            ],
        ];

        $from = "
            FROM {$this->_table['readingRoom']} AS a
            INNER JOIN {$this->_table['readingRoom_mst']} AS b ON a.LrIdx = b.LrIdx
            INNER JOIN {$this->_table['lms_order_product']} AS OP ON b.NowOrderIdx = OP.OrderIdx AND a.ProdCode = OP.ProdCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select STRAIGHT_JOIN '.$column . $from . $where)->row_array();
    }
}