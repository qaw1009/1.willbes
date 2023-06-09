<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LectureRoomIssueModel extends WB_Model
{
    private $_table = [
        'lectureroom' => 'lms_lectureroom',
        'lectureroom_r_unit' => 'lms_lectureroom_r_unit',
        'lectureroom_r_unit_r_seat' => 'lms_lectureroom_r_unit_r_seat',
        'lectureroom_seat_register' => 'lms_lectureroom_seat_register',
        'lectureroom_log' => 'lms_lectureroom_log',
        'product_r_lectureroom' => 'lms_product_r_lectureroom',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_r_sublecture' => 'lms_product_r_sublecture',
        'site' => 'lms_site',
        'member' => 'lms_member',
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
            lrsr.LrsrIdx, lrsr.LrCode, lrsr.LrUnitCode, lrsr.LrrursIdx, lrsr.ProdCodeSub, lrrurs.SeatNo, lrsr.SeatStatusCcd AS MemSeatStatusCcd
            ,o.OrderNo, lrsr.OrderIdx, lrsr.OrderProdIdx, p.ProdCode, p.ProdName, lr.LectureRoomName, lrru.UnitName, pl.LearnPatternCcd, o.RealPayPrice, o.CompleteDatm
            ,pl.StudyStartDate, pl.StudyEndDate
            ,site.SiteName, mb.MemIdx, mb.MemId, mb.MemName, mb.Phone1 AS Tel1, fn_dec(mb.Phone2Enc) AS Tel2, mb.Phone3 AS Tel3
            ,fn_ccd_name(lrrurs.SeatStatusCcd) AS SeatStatusCcdName
            ,fn_ccd_name(lrsr.SeatStatusCcd) AS MemSeatStatusCcdName
            ,fn_ccd_name(op.PayStatusCcd) AS PayStatusCcdName
            ,fn_ccd_name(pl.LearnPatternCcd) AS LearnPatternCcdName
            ,fn_order_refund_price(o.OrderIdx, 0, "refund") AS tRefundPrice, opr.RefundDatm
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy(['o.OrderIdx' => 'DESC', 'lrsr.LrrursIdx' => 'ASC'])->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['lectureroom_seat_register']} AS lrsr
            INNER JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrrurs ON lrsr.LrrursIdx = lrrurs.LrrursIdx
            INNER JOIN {$this->_table['lectureroom']} AS lr ON lrsr.LrCode = lr.LrCode
            INNER JOIN {$this->_table['lectureroom_r_unit']} AS lrru ON lr.LrCode = lrru.LrCode AND lrrurs.LrUnitCode = lrru.LrUnitCode
            INNER JOIN {$this->_table['order']} AS o ON lrsr.OrderIdx = o.OrderIdx
            INNER JOIN {$this->_table['order_product']} AS op ON o.OrderIdx = op.OrderIdx AND lrsr.OrderProdIdx = op.OrderProdIdx
            INNER JOIN {$this->_table['product']} AS p ON lrsr.ProdCode = p.ProdCode
            INNER JOIN {$this->_table['product_lecture']} AS pl ON op.ProdCode = pl.ProdCode
            INNER JOIN {$this->_table['site']} AS site ON o.SiteCode = site.SiteCode
            INNER JOIN {$this->_table['member']} AS mb ON lrsr.MemIdx = mb.MemIdx
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

    public function excel($arr_condition = [], $column)
    {
        $from = "
            FROM {$this->_table['lectureroom_seat_register']} AS lrsr
            INNER JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrrurs ON lrsr.LrrursIdx = lrrurs.LrrursIdx
            INNER JOIN {$this->_table['lectureroom']} AS lr ON lrsr.LrCode = lr.LrCode
            INNER JOIN {$this->_table['lectureroom_r_unit']} AS lrru ON lr.LrCode = lrru.LrCode AND lrrurs.LrUnitCode = lrru.LrUnitCode
            INNER JOIN {$this->_table['order']} AS o ON lrsr.OrderIdx = o.OrderIdx
            INNER JOIN {$this->_table['order_product']} AS op ON o.OrderIdx = op.OrderIdx AND lrsr.OrderProdIdx = op.OrderProdIdx
            INNER JOIN {$this->_table['product']} AS p ON lrsr.ProdCode = p.ProdCode
            INNER JOIN {$this->_table['product_lecture']} AS pl ON op.ProdCode = pl.ProdCode
            INNER JOIN {$this->_table['site']} AS site ON o.SiteCode = site.SiteCode
            INNER JOIN {$this->_table['member']} AS mb ON lrsr.MemIdx = mb.MemIdx
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
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 좌석신청 기본 정보 조회
     * @param $lr_code
     * @param $lr_unit_code
     * @param $order_idx
     * @param $prod_code_sub
     * @return mixed
     */
    public function findLectureRoomMemberInfo($lr_code, $lr_unit_code = '', $order_idx, $prod_code_sub = '')
    {
        $arr_condition = [
            'EQ' => [
                'o.OrderIdx' => $order_idx,
                'lrsr.LrCode' => $lr_code,
                'lrsr.LrUnitCode' => $lr_unit_code,
                'lrsr.ProdCodeSub' => $prod_code_sub,
                'lrsr.OrderNum' => '1'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            o.OrderNo, lrsr.OrderIdx, lrsr.OrderProdIdx, p.ProdName, op.PayStatusCcd
            , pl.LearnPatternCcd, o.RealPayPrice, o.CompleteDatm
            , lr.LectureRoomName, lrru.UnitName, lrru.SeatChoiceStartDate, lrru.SeatChoiceEndDate, lrru.TransverseNum
            , lrrurs.LrrursIdx, lrrurs.SeatNo, lrrurs.SeatStatusCcd, lrrurs.IsStatus AS SeatIsStatus, lrsr.SeatStatusCcd AS MemSeatStatusCcd, fn_ccd_name(lrsr.SeatStatusCcd) AS MemSeatStatusCcdName
            , site.SiteName, lrsr.MemIdx, mb.MemId, mb.MemName, mb.Phone1 AS Tel1, fn_dec(mb.Phone2Enc) AS Tel2, mb.Phone3 AS Tel3
            , fn_ccd_name(lr.CampusCcd) AS CampusName
            , fn_ccd_name(lrrurs.SeatStatusCcd) AS SeatStatusCcdName
            , fn_ccd_name(lrsr.SeatStatusCcd) AS MemSeatStatusCcdName
            , fn_ccd_name(op.PayStatusCcd) AS PayStatusCcdName
            ,(
                SELECT GROUP_CONCAT(CONCAT('[',c.ProdCode,']',c.ProdName)) AS ProdNameSub
                FROM {$this->_table['lectureroom_seat_register']} AS a
                INNER JOIN {$this->_table['product_r_sublecture']} AS b ON a.ProdCode = b.ProdCode AND a.ProdCodeSub = b.ProdCodeSub AND b.IsStatus = 'Y'
                INNER JOIN {$this->_table['product']} AS c ON b.ProdCodeSub = c.ProdCode
                WHERE a.ProdCode = lrsr.ProdCode AND a.LrUnitCode = lrsr.LrUnitCode AND a.OrderIdx = lrsr.OrderIdx
            ) AS ProdNameSub
            ,(
                SELECT GROUP_CONCAT(c.ProdCode)
                FROM {$this->_table['lectureroom_seat_register']} AS a
                INNER JOIN {$this->_table['product_r_sublecture']} AS b ON a.ProdCode = b.ProdCode AND a.ProdCodeSub = b.ProdCodeSub AND b.IsStatus = 'Y'
                INNER JOIN {$this->_table['product']} AS c ON b.ProdCodeSub = c.ProdCode
                WHERE a.ProdCode = lrsr.ProdCode AND a.LrUnitCode = lrsr.LrUnitCode AND a.OrderIdx = lrsr.OrderIdx
            ) AS ProdCodeSubAll
        ";

        $from = "
            FROM {$this->_table['order']} AS o
            INNER JOIN {$this->_table['order_product']} AS op ON o.OrderIdx = op.OrderIdx
            INNER JOIN {$this->_table['product']} AS p ON op.ProdCode = p.ProdCode
            INNER JOIN {$this->_table['product_lecture']} AS pl ON op.ProdCode = pl.ProdCode
            INNER JOIN {$this->_table['lectureroom_seat_register']} AS lrsr ON op.ProdCode = lrsr.ProdCode AND o.OrderIdx = lrsr.OrderIdx
            INNER JOIN {$this->_table['lectureroom']} AS lr ON lrsr.LrCode = lr.LrCode
            INNER JOIN {$this->_table['lectureroom_r_unit']} AS lrru ON lrsr.LrCode = lrru.LrCode AND lrsr.LrUnitCode = lrru.LrUnitCode
            INNER JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrrurs ON lrsr.LrrursIdx = lrrurs.LrrursIdx
            INNER JOIN {$this->_table['member']} AS mb ON lrsr.MemIdx = mb.MemIdx
            INNER JOIN {$this->_table['site']} AS site ON o.SiteCode = site.SiteCode
        ";

        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 서브상품관련 좌석정보
     * @param $order_idx
     * @param $prod_code_sub
     * @return mixed
     */
    public function listLectureRoomMemberSeatForProdCodeSub($order_idx, $prod_code_sub)
    {
        $column = '
            p.ProdName, lr.LectureRoomName, lrru.UnitName, p.ProdCode, lrsr.OrderIdx, lrsr.LrCode, lrsr.LrUnitCode
            ,lrrurs.SeatStatusCcd, lrsr.SeatStatusCcd AS MemSeatStatusCcd, lrsr.LrrursIdx, lrrurs.SeatNo
            ,lrru.SeatChoiceStartDate, lrru.SeatChoiceEndDate
            ,mb.MemId, mb.MemName, mb.Phone1 AS Tel1, fn_dec(mb.Phone2Enc) AS Tel2, mb.Phone3 AS Tel3
            ,fn_ccd_name(lrrurs.SeatStatusCcd) AS SeatStatusCcdName
            ,fn_ccd_name(lrsr.SeatStatusCcd) AS MemSeatStatusCcdName
        ';
        $arr_condition = [
            'EQ' => [
                'lrsr.OrderIdx' => $order_idx
            ],
            'IN' => [
                'p.ProdCode' => explode(',', $prod_code_sub)
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['product']} AS p
            INNER JOIN {$this->_table['lectureroom_seat_register']} AS lrsr ON p.ProdCode = lrsr.ProdCodeSub
            INNER JOIN {$this->_table['lectureroom']} AS lr ON lrsr.LrCode = lr.LrCode
            INNER JOIN {$this->_table['lectureroom_r_unit']} AS lrru ON lr.LrCode = lrru.LrCode AND lrsr.LrUnitCode = lrru.LrUnitCode
            INNER JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrrurs ON lrsr.LrrursIdx = lrrurs.LrrursIdx
            INNER JOIN {$this->_table['member']} AS mb ON lrsr.MemIdx = mb.MemIdx
        ";
        return $this->_conn->query('SELECT ' . $column . $from . $where)->result_array();
    }

    /**
     * 강의실 좌석상태 정보수정
     * @param array $form_data
     * @return array|bool
     */
    public function modifyLectureRoomUnitSeat($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $column = 'lrsr.LrsrIdx, lrsr.MemIdx, lrsr.OrderIdx, lrsr.OrderProdIdx, lrsr.ProdCode, lrsr.ProdCodeSub, lrsr.LrCode, lrsr.LrUnitCode, lrsr.LrrursIdx, lrsr.SeatStatusCcd';
            $arr_condition = [
                'EQ' => [
                    'lrsr.OrderIdx' => element('order_idx', $form_data),
                    'lrsr.LrCode' => element('lr_code', $form_data),
                    'lrsr.LrUnitCode' => element('lr_unit_code', $form_data)
                ]
            ];
            $seat_register_data = $this->findSeatRegister($column, $arr_condition);
            if (empty($seat_register_data) === true) {
                throw new \Exception('조회된 강의실 좌석정보가 없습니다.');
            }
            if ($seat_register_data[0]['SeatStatusCcd'] == '728003' || $seat_register_data[0]['SeatStatusCcd'] == '728004') {
                throw new \Exception('퇴실 또는 환불된 좌석은 수정할 수 없습니다.');
            }

            if (element('is_seat_out', $form_data) === 'Y') {
                //퇴실
                $this->_modifyLectureRoomSeatForOut($form_data, $seat_register_data);
            } else {
                #사용중 좌석 조회
                $arr_condition = [
                    'EQ' => [
                        'lrsr.LrCode' => element('lr_code', $form_data),
                        'lrsr.LrUnitCode' => element('lr_unit_code', $form_data),
                        'lrsr.LrrursIdx' => element('lr_rurs_idx', $form_data),
                    ],
                    'ORG' => [
                        'IN' => [
                            'lrrurs.SeatStatusCcd' => ['727002', '727003'], //좌석상태 : 사용중, 고장
                            'lrsr.SeatStatusCcd' => ['728001', '728002']    //회원좌석상태 : 신규,자리이동
                        ]
                    ],
                    'NOTIN' => [
                        'lrsr.SeatStatusCcd' => ['728003', '728004']        //회원좌석상태 : 퇴실,환불
                    ]
                ];
                $chk_seat_data = $this->findSeatRegister($column, $arr_condition);
                if (empty($chk_seat_data) === false) {
                    throw new \Exception('사용중인 좌석입니다.');
                }

                //자리이동
                $result = $this->_modifyLectureRoomSeatForMove($form_data, $seat_register_data);
                if ($result['ret_cd'] !== true) {
                    throw new \Exception($result['ret_msg']);
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
     * 환불 > 좌석상태 환불처리, 좌석상태 미사용, 로그 저장
     * @param $order_idx
     * @param $prod_code
     * @return array|bool
     */
    public function refundLectureRoom($order_idx = null, $prod_code = null)
    {
        try {
            $column = 'lrsr.OrderProdIdx, lrsr.LrsrIdx, lrsr.LrCode, lrsr.LrUnitCode, lrsr.LrrursIdx, lrsr.MemIdx, SeatNo';
            $arr_condition = [
                'RAW' => [
                    'lrsr.OrderIdx = ' => (empty($order_idx) === true) ? '\'\'' : $order_idx,
                    'lrsr.ProdCode = ' => (empty($prod_code) === true) ? '\'\'' : $prod_code
                ],
                'NOT' => [
                    'lrsr.SeatStatusCcd' => '728004'
                ]
            ];
            $data = $this->findSeatRegister($column, $arr_condition);

            //환불
            if (empty($data) === false) {
                $update_target_seat_data = [];
                foreach ($data as $row) {
                    $update_target_seat_data[$row['LrrursIdx']]['MemIdx'] = $row['MemIdx'];
                }

                //좌석정보 수정 (미사용)
                foreach ($update_target_seat_data as $key => $row) {
                    if ($this->_modifyLectureRoomUnitSeatForAdd($key, $row['MemIdx'], '727001', 'del') !== true) {
                        throw new \Exception('강의실 좌석 상태 수정에 실패했습니다.');
                    }
                }

                //퇴실처리
                $result = $this->_modifyLectureRoomUnitSeatForRefund($data);
                if ($result !== true) {
                    throw new \Exception($result);
                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 좌석등록정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return mixed
     */
    public function findSeatRegister($column = '*', $arr_condition = [])
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['lectureroom_seat_register']} AS lrsr
            INNER JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrrurs ON lrsr.LrrursIdx = lrrurs.LrrursIdx
            INNER JOIN {$this->_table['product_lecture']} AS pl ON lrsr.ProdCodeSub = pl.ProdCode
        ";
        return $this->_conn->query('SELECT ' . $column . $from . $where)->result_array();
    }

    /**
     * 회원좌석 만료처리
     * @param array $params
     * @return array|bool
     */
    public function deleteMemberSeatStatus($params = [])
    {
        $this->_conn->trans_begin();
        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $column = '
                lrsr.LrsrIdx, lrsr.MemIdx, lrsr.OrderIdx, lrsr.OrderProdIdx, lrsr.ProdCode
                , lrsr.ProdCodeSub, lrsr.LrCode, lrsr.LrUnitCode, lrsr.LrrursIdx, lrsr.SeatStatusCcd, lrrurs.SeatNo, pl.StudyStartDate, pl.StudyEndDate
            ';
            $arr_condition = ['IN' => ['lrsr.LrsrIdx' => $params]];
            $arr_lrrurs_idx = [];
            $data = $this->findSeatRegister($column, $arr_condition);
            if (empty($data) === true) {
                throw new \Exception('조회된 강의실 좌석정보가 없습니다.');
            }

            foreach ($data as $row) {
                $arr_lrrurs_idx[] = $row['LrrursIdx'];
                if ($row['SeatStatusCcd'] == '728003' || $row['SeatStatusCcd'] == '728004' || $row['SeatStatusCcd'] == '728005') {
                    throw new \Exception('퇴실,환불,종강 처리된 좌석은 수정할 수 없습니다.');
                }
                if ($row['StudyEndDate'] >= date('Y-m-d')) {
                    throw new \Exception('종강일이 지난 좌석이 아닙니다.');
                }
            }

            $mod_register_data = [
                'SeatStatusCcd' => '728005',
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdAdminDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($mod_register_data)->where_in('LrsrIdx',$params);
            if($this->_conn->update($this->_table['lectureroom_seat_register'])=== false) {
                throw new \Exception('회원좌석 정보 수정에 실패했습니다.');
            }

            $mod_seat_data = [
                'SeatStatusCcd' => '727001',
                'MemIdx' => '',
                'RegMemDatm' => '',
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($mod_seat_data)->where_in('LrrursIdx',$arr_lrrurs_idx);
            if($this->_conn->update($this->_table['lectureroom_r_unit_r_seat'])=== false) {
                throw new \Exception('좌석 정보 수정에 실패했습니다.');
            }

            $log_data = [];
            foreach ($data as $row) {
                $log_data[] = [
                    'LrCode' => $row['LrCode'],
                    'LrUnitCode' => $row['LrUnitCode'],
                    'SeatStatusCcd' => '728005',
                    'LrrursIdx' => $row['LrrursIdx'],
                    'LrsrIdx' => $row['LrsrIdx'],
                    'OrderProdIdx' => $row['OrderProdIdx'],
                    'MemIdx' => $row['MemIdx'],
                    'BeforeSeatNo' => $row['SeatNo'],
                    'Desc' => '종강처리',
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address(),
                ];
            }
            if($log_data) $this->_conn->insert_batch($this->_table['lectureroom_log'], $log_data);

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 자리이동
     * @param $form_data
     * @param $seat_register_data
     * @return array
     */
    private function _modifyLectureRoomSeatForMove($form_data, $seat_register_data)
    {
        try {
            //기존 좌석식별자 취득
            $old_lrrurs_idx = $seat_register_data[0]['LrrursIdx'];
            $mem_idx = $seat_register_data[0]['MemIdx'];

            //좌석정보 수정 (미사용)
            if ($this->_modifyLectureRoomUnitSeatForAdd($old_lrrurs_idx, $mem_idx, '727001', 'del') !== true) {
                throw new \Exception('강의실 좌석 상태 수정에 실패했습니다.');
            }

            //좌석정보 수정 (사용)
            if ($this->_modifyLectureRoomUnitSeatForAdd(element('lr_rurs_idx', $form_data), $mem_idx, '727002', 'add') !== true) {
                throw new \Exception('강의실 좌석 상태 수정에 실패했습니다.');
            }

            //자리이동
            $result = $this->_modifyLectureRoomSeatRegister($form_data, $seat_register_data);
            if ($result['ret_cd'] !== true) {
                throw new \Exception($result['ret_msg']);
            }
        } catch (\Exception $e) {
            return [
                'ret_cd' => false,
                'ret_msg' => $e->getMessage()
            ];
        }
        return [
            'ret_cd' => true
        ];
    }

    /**
     * 퇴실
     * @param $form_data
     * @param $seat_register_data
     * @return array
     */
    private function _modifyLectureRoomSeatForOut($form_data, $seat_register_data)
    {
        try {
            //기존 좌석식별자 취득
            $old_lrrurs_idx = $seat_register_data[0]['LrrursIdx'];
            $mem_idx = $seat_register_data[0]['MemIdx'];

            //좌석정보 수정 (미사용)
            if ($this->_modifyLectureRoomUnitSeatForAdd($old_lrrurs_idx, $mem_idx, '727001', 'del') !== true) {
                throw new \Exception('강의실 좌석 상태 수정에 실패했습니다.');
            }

            //퇴실처리
            $result = $this->_modifyLectureRoomUnitSeatForDel($form_data, $seat_register_data);
            if ($result['ret_cd'] !== true) {
                throw new \Exception($result['ret_msg']);
            }
        } catch (\Exception $e) {
            return [
                'ret_cd' => false,
                'ret_msg' => $e->getMessage()
            ];
        }
        return [
            'ret_cd' => true
        ];
    }

    /**
     * 강의실 좌석 상태 수정 (신규등록)
     * @param $lr_rurs_idx
     * @param $mem_idx
     * @param $status_ccd
     * @param $mode
     * @return array|bool
     */
    private function _modifyLectureRoomUnitSeatForAdd($lr_rurs_idx, $mem_idx, $status_ccd, $mode)
    {
        try {
            $input_data = [
                'SeatStatusCcd' => $status_ccd
            ];
            if ($mode == 'add') {
                $input_data = array_merge($input_data, [
                    'MemIdx' => $mem_idx,
                    'RegMemDatm' => date('Y-m-d H:i:s'),
                    'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    'UpdDatm' => date('Y-m-d H:i:s')
                ]);
            } else {
                $input_data = array_merge($input_data, [
                    'MemIdx' => '',
                    'RegMemDatm' => ''
                ]);
            }
            $this->_conn->set($input_data)->where('LrrursIdx', $lr_rurs_idx);
            if($this->_conn->update($this->_table['lectureroom_r_unit_r_seat'])=== false) {
                throw new \Exception('강의실회차 좌석상태 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 좌석이동 / 로그저장
     * @param array $form_data
     * @param array $seat_register_data
     * @return array
     */
    private function _modifyLectureRoomSeatRegister($form_data = [], $seat_register_data = [])
    {
        try {
            $_arr_lrsr_idx = array_pluck($seat_register_data, 'LrsrIdx');
            $mod_data = [
                'LrCode' => element('lr_code', $form_data),
                'LrUnitCode' => element('lr_unit_code', $form_data),
                'LrrursIdx' => element('lr_rurs_idx', $form_data),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdAdminDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($mod_data)->where_in('LrsrIdx', $_arr_lrsr_idx);
            if($this->_conn->update($this->_table['lectureroom_seat_register'])=== false) {
                throw new \Exception('강의실회차 좌석 수정에 실패했습니다.');
            }

            $log_data = [];
            foreach ($seat_register_data as $row) {
                $log_data[] = [
                    'LrCode' => element('lr_code', $form_data),
                    'LrUnitCode' => element('lr_unit_code', $form_data),
                    'SeatStatusCcd' => '728002',
                    'LrrursIdx' => element('lr_rurs_idx', $form_data),
                    'LrsrIdx' => $row['LrsrIdx'],
                    'OrderProdIdx' => $row['OrderProdIdx'],
                    'MemIdx' => $row['MemIdx'],
                    'BeforeSeatNo' => element('old_seat_no', $form_data),
                    'AfterSeatNo' => element('choice_serial_num', $form_data),
                    'Desc' => element('desc', $form_data),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address(),
                ];
            }
            if($log_data) $this->_conn->insert_batch($this->_table['lectureroom_log'], $log_data);

            if ($this->_conn->trans_status() === false) {
                throw new Exception('로그저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return [
                'ret_cd' => false,
                'ret_msg' => $e->getMessage()
            ];
        }
        return [
            'ret_cd' => true
        ];
    }

    /**
     * 퇴실 / 로그저장
     * @param array $form_data
     * @param array $seat_register_data
     * @return array
     */
    private function _modifyLectureRoomUnitSeatForDel($form_data = [], $seat_register_data = [])
    {
        try {
            $_arr_lrsr_idx = array_pluck($seat_register_data, 'LrsrIdx');
            $mod_data = [
                'SeatStatusCcd' => '728003',
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdAdminDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($mod_data)->where_in('LrsrIdx', $_arr_lrsr_idx);
            if($this->_conn->update($this->_table['lectureroom_seat_register'])=== false) {
                throw new \Exception('강의실회차 좌석 수정에 실패했습니다.');
            }

            $log_data = [];
            foreach ($seat_register_data as $row) {
                $log_data[] = [
                    'LrCode' => element('lr_code', $form_data),
                    'LrUnitCode' => element('lr_unit_code', $form_data),
                    'SeatStatusCcd' => '728003',
                    'LrrursIdx' => $seat_register_data[0]['LrrursIdx'],
                    'LrsrIdx' => $row['LrsrIdx'],
                    'OrderProdIdx' => $row['OrderProdIdx'],
                    'MemIdx' => $row['MemIdx'],
                    'BeforeSeatNo' => element('old_seat_no', $form_data),
                    'Desc' => element('desc', $form_data),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address(),
                ];
            }
            if($log_data) $this->_conn->insert_batch($this->_table['lectureroom_log'], $log_data);

            if ($this->_conn->trans_status() === false) {
                throw new Exception('로그저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return [
                'ret_cd' => false,
                'ret_msg' => $e->getMessage()
            ];
        }
        return [
            'ret_cd' => true
        ];
    }

    /**
     * 환불 / 로그저장
     * @param array $seat_register_data
     * @return bool|string
     */
    private function _modifyLectureRoomUnitSeatForRefund($seat_register_data = [])
    {
        try {
            $_arr_lrsr_idx = array_pluck($seat_register_data, 'LrsrIdx');
            $mod_data = [
                'SeatStatusCcd' => '728004',
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdAdminDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($mod_data)->where_in('LrsrIdx', $_arr_lrsr_idx);
            if($this->_conn->update($this->_table['lectureroom_seat_register'])=== false) {
                throw new \Exception('강의실회차 좌석 수정에 실패했습니다.');
            }

            $log_data = [];
            foreach ($seat_register_data as $row) {
                $log_data[] = [
                    'LrCode' => $row['LrCode'],
                    'LrUnitCode' => $row['LrUnitCode'],
                    'SeatStatusCcd' => '728004',
                    'LrrursIdx' => $seat_register_data[0]['LrrursIdx'],
                    'LrsrIdx' => $row['LrsrIdx'],
                    'OrderProdIdx' => $row['OrderProdIdx'],
                    'MemIdx' => $row['MemIdx'],
                    'BeforeSeatNo' => $row['SeatNo'],
                    'Desc' => '주문상품 환불로 인한 퇴실처리',
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address(),
                ];
            }
            if($log_data) $this->_conn->insert_batch($this->_table['lectureroom_log'], $log_data);

            if ($this->_conn->trans_status() === false) {
                throw new Exception('로그저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 강사배정데이터 기준 좌석정보 셋팅
     * 기존 데이터 조회
     *  - 강의실 기준 기존상품, 신규상품 비교
     *    있으면 좌석셋팅, 없으면 미등록(좌석미선택)
     * @param $member_idx
     * @param $order_idx
     * @param $order_prod_idx
     * @param $prod_code
     * @param $prod_code_sub
     * @return bool
     */
    public function storeProfForSeat($order_idx, $order_prod_idx, $prod_code, $prod_code_sub)
    {
        try {
            $arr_condition = [
                'EQ' => [
                    'lrsr.OrderIdx' => $order_idx,
                    'lrsr.OrderProdIdx' => $order_prod_idx,
                    'lrsr.ProdCode' => $prod_code,
                ],
                'IN' => [
                    'lrsr.SeatStatusCcd' => ['728001', '728002']
                ]
            ];
            $register_seat_data = $this->findSeatRegister('lrsr.LrCode, lrsr.LrUnitCode, lrsr.LrrursIdx, lrsr.MemIdx, lrrurs.SeatNo', $arr_condition);

            //등록된 좌석 정보가 있을 경우
            if (empty($register_seat_data) === false) {
                $arr_register_unit_code = array_pluck($register_seat_data, 'LrrursIdx', 'LrUnitCode');
                $arr_register_seat_no = array_pluck($register_seat_data, 'SeatNo', 'LrUnitCode');

                $arr_condition = [
                    'EQ' => ['IsStatus' => 'Y','IsUse' => 'Y',],
                    'IN' => ['ProdCode' => $prod_code_sub]
                ];
                $product_lectureroom_data = $this->_getProductLectureRoom('ProdCode, LrCode, LrUnitCode', $arr_condition);

                //기존좌석정보 삭제
                $is_del_my_lectureroom = $this->_conn
                    ->where('OrderIdx', $order_idx)
                    ->where('OrderProdIdx', $order_prod_idx)
                    ->where('ProdCode', $prod_code)
                    ->delete($this->_table['lectureroom_seat_register']);
                if ($is_del_my_lectureroom === false) {
                    throw new \Exception('좌석 배정에 실패했습니다.[006]');
                }

                //등록
                $input_data = [];
                foreach ($arr_register_unit_code as $unit_code => $lrrurs_idx) {
                    $order_num = 1;
                    foreach ($product_lectureroom_data as $key => $row) {
                        if ($row['LrUnitCode'] == $unit_code) {
                            $input_data[] = [
                                'ProdCode' => $prod_code,
                                'ProdCodeSub' => $row['ProdCode'],
                                'LrCode' => $row['LrCode'],
                                'LrUnitCode' => $row['LrUnitCode'],
                                'MemIdx' => $register_seat_data[0]['MemIdx'],
                                'OrderIdx' => $order_idx,
                                'OrderProdIdx' => $order_prod_idx,
                                'LrrursIdx' => $lrrurs_idx,
                                'SeatStatusCcd' => '728001',
                                'OrderNum' => $order_num,
                                'IsStatus' => 'Y',
                                'RegMemDatm' => date('Y-m-d H:i:s'),
                                'RegMemIp' => $this->input->ip_address(),
                            ];
                            $order_num++;
                        }
                    }
                }

                foreach ($input_data as $key => $data) {
                    if($this->_conn->set($data)->insert($this->_table['lectureroom_seat_register']) === false) {
                        throw new \Exception('좌석 배정에 실패했습니다.[007]');
                    }

                    $lrsr_idx = $this->_conn->insert_id();
                    $log_data = [
                        'LrCode' => $data['LrCode'],
                        'LrUnitCode' => $data['LrUnitCode'],
                        'SeatStatusCcd' => '728001',
                        'LrrursIdx' => $data['LrrursIdx'],
                        'LrsrIdx' => $lrsr_idx,
                        'OrderProdIdx' => $data['OrderProdIdx'],
                        'MemIdx' => $register_seat_data[0]['MemIdx'],
                        'BeforeSeatNo' => $arr_register_seat_no[$data['LrUnitCode']],
                        'Desc' => '강사배정에 따른 좌석 리셋'
                    ];

                    if($this->_conn->set($log_data)->insert($this->_table['lectureroom_log']) === false) {
                        throw new \Exception('좌석 배정에 실패했습니다.[008]');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    private function _getProductLectureRoom($column = '*', $arr_condition)
    {
        $from = "
            FROM {$this->_table['product_r_lectureroom']}
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('SELECT ' . $column . $from . $where)->result_array();
    }
}