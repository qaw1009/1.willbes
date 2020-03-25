<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LectureRoomIssueModel extends WB_Model
{
    private $_table = [
        'lectureroom' => 'lms_lectureroom',
        'lectureroom_r_unit' => 'lms_lectureroom_r_unit',
        'lectureroom_r_unit_r_seat' => 'lms_lectureroom_r_unit_r_seat',
        'lectureroom_seat_register' => 'lms_lectureroom_seat_register',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_r_sublecture' => 'lms_product_r_sublecture',
        'site' => 'lms_site',
        'member' => 'lms_member',
        'member_otherinfo' => 'lms_member_otherinfo',
        'order_product_refund' => 'lms_order_product_refund'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 좌석신청현황 리스트
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function mainList($is_count = false, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            lrsr.LrsrIdx, lrsr.LrCode, lrsr.LrUnitCode, lrsr.LrrursIdx, lrrurs.SeatNo
            ,o.OrderNo, lrsr.OrderIdx, lrsr.OrderProdIdx, p.ProdName, pl.LearnPatternCcd, o.RealPayPrice, o.CompleteDatm
            ,site.SiteName, mb.MemId, mb.MemName, mbo.Tel1, fn_dec(mbo.Tel2Enc) AS Tel2, mbo.Tel3
            ,fn_ccd_name(lrrurs.SeatStatusCcd) AS SeatStatusCcdName
            ,fn_ccd_name(op.PayStatusCcd) AS PayStatusCcdName
            ,fn_ccd_name(pl.LearnPatternCcd) AS LearnPatternCcdName
            ,fn_order_refund_price(o.OrderIdx, 0, "refund") AS tRefundPrice, opr.RefundDatm
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy(['lrsr.LrsrIdx' => 'DESC'])->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['lectureroom_seat_register']} AS lrsr
            INNER JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrrurs ON lrsr.LrrursIdx = lrrurs.LrrursIdx
            INNER JOIN {$this->_table['lectureroom']} AS lr ON lrsr.LrCode = lr.LrCode
            INNER JOIN {$this->_table['order']} AS o ON lrsr.OrderIdx = o.OrderIdx
            INNER JOIN {$this->_table['order_product']} AS op ON o.OrderIdx = op.OrderIdx AND lrsr.OrderProdIdx = op.OrderProdIdx
            INNER JOIN {$this->_table['product']} AS p ON lrsr.ProdCode = p.ProdCode
            INNER JOIN {$this->_table['product_lecture']} AS pl ON op.ProdCode = pl.ProdCode
            INNER JOIN {$this->_table['site']} AS site ON o.SiteCode = site.SiteCode
            INNER JOIN {$this->_table['member']} AS mb ON lrsr.MemIdx = mb.MemIdx
            INNER JOIN {$this->_table['member_otherinfo']} AS mbo ON mb.MemIdx = mbo.MemIdx
            LEFT JOIN {$this->_table['order_product_refund']} AS opr ON o.OrderIdx = opr.OrderIdx AND op.OrderProdIdx = opr.OrderProdIdx
        ";

        $arr_condition['IN']['lr.SiteCode'] = get_auth_site_codes(false, true);
        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        // 캠퍼스 권한
        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
        $where_campus = $this->_conn->group_start();
        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
            $where_campus->or_group_start();
            $where_campus->or_where('lr.SiteCode',$set_site_ccd);
            $where_campus->group_start();
            $where_campus->where('lr.CampusCcd', $this->codeModel->campusAllCcd);
            $where_campus->or_where_in('lr.CampusCcd', $set_campus_ccd);
            $where_campus->group_end();
            $where_campus->group_end();
        }
        $where_campus->or_where('lr.CampusCcd', "''", false);
        $where_campus->or_where('lr.CampusCcd IS NULL');
        $where_campus->group_end();
        $where_campus = $where_campus->getMakeWhere(true);

        // 쿼리 실행
        $where = $where_temp . $where_campus;

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 좌석신청 기본 정보 조회
     * @param $lr_code
     * @param $lr_unit_code
     * @param $order_idx
     * @return mixed
     */
    public function findLectureRoomMemberInfo($lr_code, $lr_unit_code, $order_idx)
    {
        $arr_condition = [
            'EQ' => [
                'o.OrderIdx' => $order_idx,
                'lrsr.LrCode' => $lr_code,
                'lrsr.LrUnitCode' => $lr_unit_code,
                'lrsr.OrderNum' => '1'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            o.OrderNo, lrsr.OrderIdx, lrsr.OrderProdIdx, p.ProdName, op.PayStatusCcd
            , pl.LearnPatternCcd, o.RealPayPrice, o.CompleteDatm
            , lr.LectureRoomName
            , lrru.UnitName
            , lrrurs.SeatNo, lrrurs.SeatStatusCcd, lrrurs.IsStatus AS SeatIsStatus, lrsr.SeatStatusCcd AS MemSeatStatusCcd
            , site.SiteName, mb.MemId, mb.MemName, mbo.Tel1, fn_dec(mbo.Tel2Enc) AS Tel2, mbo.Tel3
            , fn_ccd_name(lrrurs.SeatStatusCcd) AS SeatStatusCcdName
            , fn_ccd_name(lrsr.SeatStatusCcd) AS MemSeatStatusCcdName
            , fn_ccd_name(op.PayStatusCcd) AS PayStatusCcdName
            
            ,(
                SELECT GROUP_CONCAT(CONCAT('[',c.ProdCode,']',c.ProdName)) AS ProdNameSub
                FROM {$this->_table['lectureroom_seat_register']} AS a
                INNER JOIN {$this->_table['product_r_sublecture']} AS b ON a.ProdCode = b.ProdCode AND a.ProdCodeSub = b.ProdCodeSub AND b.IsStatus = 'Y'
                INNER JOIN {$this->_table['product']} AS c ON b.ProdCodeSub = c.ProdCode
                WHERE a.ProdCode = lrsr.ProdCode
            ) AS ProdNameSub
        ";

        $from = "
            FROM {$this->_table['order']} AS o
            INNER JOIN {$this->_table['order_product']} AS op ON o.OrderIdx = op.OrderIdx
            INNER JOIN {$this->_table['product']} AS p ON op.ProdCode = p.ProdCode
            INNER JOIN {$this->_table['product_lecture']} AS pl ON op.ProdCode = pl.ProdCode
            INNER JOIN {$this->_table['lectureroom_seat_register']} AS lrsr ON op.ProdCode = lrsr.ProdCode
            INNER JOIN {$this->_table['lectureroom']} AS lr ON lrsr.LrCode = lr.LrCode
            INNER JOIN {$this->_table['lectureroom_r_unit']} AS lrru ON lrsr.LrCode = lrru.LrCode AND lrsr.LrUnitCode = lrru.LrUnitCode
            INNER JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrrurs ON lrsr.LrrursIdx = lrrurs.LrrursIdx
            INNER JOIN {$this->_table['member']} AS mb ON lrsr.MemIdx = mb.MemIdx
            INNER JOIN {$this->_table['member_otherinfo']} AS mbo ON mb.MemIdx = mbo.MemIdx
            INNER JOIN {$this->_table['site']} AS site ON o.SiteCode = site.SiteCode
        ";

        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }
}