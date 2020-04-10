<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LectureRoomRegistModel extends WB_Model
{
    protected $_table = [
        'lectureroom' => 'lms_lectureroom',
        'lectureroom_r_unit' => 'lms_lectureroom_r_unit',
        'lectureroom_r_unit_r_seat' => 'lms_lectureroom_r_unit_r_seat',
        'lectureroom_seat_register' => 'lms_lectureroom_seat_register',
        'product_r_lectureroom' => 'lms_product_r_lectureroom',
        'lectureroom_log' => 'lms_lectureroom_log',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'member' => 'lms_member',
        'admin' => 'wbs_sys_admin',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code'
    ];

    public $_seat_unit_ccd = '727';     //좌석상태
    public $_seat_member_ccd = '728';   //회원좌석상태
    public $_arr_seat_status_ccd = [
        'N' => '727001',    //좌석상태(미사용)
        'Y' => '727002',    //좌석상태(사용중)
    ];

    //등록파일 rule 설정
    private $_upload_file_rule = [
        'allowed_types' => 'gif|jpg|jpeg|png',
        'overwrite' => 'false'
    ];
    private $_add_seat_count = '0';

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function mainList($is_count = false, $arr_condition_1 = [], $arr_condition_2 = [], $limit = null, $offset = null)
    {
        $arr_condition_1['IN']['SiteCode'] = get_auth_site_codes();       //사이트 권한 추가
        $where_1 = $this->_conn->makeWhere($arr_condition_1);
        $where_1 = $where_1->getMakeWhere(false);

        $where_2 = $this->_conn->makeWhere($arr_condition_2);
        $where_2 = $where_2->getMakeWhere(false);

        if ($is_count === true) {
            $query_string = $this->_set_query_string_count($where_1, $where_2);
        } else {
            $query_string = $this->_set_query_string_row($where_1, $where_2, $limit, $offset);
        }
        $query = $this->_conn->query($query_string);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    private function _set_query_string_count($where_1, $where_2)
    {
        $column = 'COUNT(*) AS numrows';
        $from = "
            FROM (
                SELECT L.* FROM (
                    SELECT A.* FROM (
                        SELECT LR.LrCode FROM (
                            SELECT LrCode FROM {$this->_table['lectureroom']} {$where_1}
                        ) AS LR
                        LEFT JOIN {$this->_table['lectureroom_r_unit']} AS LU ON LU.LrCode = LR.LrCode
                        {$where_2}
                    ) AS A
                ) AS L
                GROUP BY L.LrCode
            ) AS M
        ";
        return 'select ' . $column . $from;
    }

    private function _set_query_string_row($where_1, $where_2, $limit, $offset)
    {
        $offset_limit = $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        $column = 'M.*, S.SiteName, C.CcdName AS CampusName';

        $from = "
            FROM (
                SELECT
                L.LrCode, L.SiteCode, L.CampusCcd, L.LectureRoomName, L.IsUse, L.RegAdminName, L.RegDatm
                ,CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                    'LrUnitCode', L.LrUnitCode,
                    'UnitName', L.UnitName,
                    'TotalSeat', IFNULL(L.UseQty,0),
                    'UseSeatCnt', L.SumUseSeatCnt,
                    'RemainSeatCnt', L.RemainSeatCnt,
                    'SeatChoiceStartDate', L.SeatChoiceStartDate,
                    'SeatChoiceEndDate', L.SeatChoiceEndDate,
                    'IsSmsUse', L.IsSmsUse,
                    'unitIsUse', L.unitIsUse
                ) ORDER BY L.LrUnitCode DESC), ']') AS UnitData
                FROM (
                    SELECT
                    A.* ,IFNULL(A.UseSeatCnt,0) AS SumUseSeatCnt, IFNULL(A.UseQty - (A.UseSeatCnt),0) AS RemainSeatCnt
                    FROM (
                        SELECT LR.LrCode, LR.SiteCode, LR.CampusCcd, LR.LectureRoomName, LR.IsUse, LR.RegAdminName, LR.RegDatm
                        , LU.LrUnitCode, LU.UnitName, LU.UseQty, LU.SeatChoiceStartDate, LU.SeatChoiceEndDate, LU.IsSmsUse, LU.IsUse as unitIsUse
                        ,(SELECT COUNT(*) AS cnt FROM {$this->_table['lectureroom_r_unit_r_seat']} AS RS 
                            WHERE RS.LrUnitCode = LU.LrUnitCode AND RS.IsStatus = 'Y' AND RS.SeatStatusCcd IN (727002, 727003)) AS UseSeatCnt
                        FROM (
                            SELECT a.LrCode, a.SiteCode, a.CampusCcd, a.LectureRoomName, a.IsUse, b.wAdminName AS RegAdminName, a.RegDatm
                            FROM {$this->_table['lectureroom']} as a
                            INNER JOIN {$this->_table['admin']} AS b ON a.RegAdminIdx = b.wAdminIdx
                            {$where_1}
                            ORDER BY LrCode DESC
                            {$offset_limit}
                        ) AS LR
                        LEFT JOIN {$this->_table['lectureroom_r_unit']} AS LU ON LU.LrCode = LR.LrCode
                        {$where_2}
                    ) AS A
                ) AS L
                GROUP BY L.LrCode
            ) AS M
            INNER JOIN {$this->_table['site']} AS S ON M.SiteCode = S.SiteCode
            INNER JOIN {$this->_table['sys_code']} AS C ON M.CampusCcd = C.Ccd
            ORDER BY M.LrCode DESC
        ";
        return 'select ' . $column . $from;
    }

    /**
     * 강의실기본정보 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findLectureRoom($arr_condition)
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "lr.LrCode, lr.SiteCode, lr.CampusCcd, lr.LectureRoomName, lr.IsUse, lr.RegDatm, lr.UpdDatm, admin.wAdminName AS RegAdminName, admin2.wAdminName AS UpdAdminName";
        $from = "
            FROM {$this->_table['lectureroom']} AS lr
            INNER JOIN {$this->_table['admin']} admin on lr.RegAdminIdx = admin.wAdminIdx
            LEFT JOIN {$this->_table['admin']} admin2 on lr.RegAdminIdx = admin2.wAdminIdx
        ";
        return $this->_conn->query('SELECT ' . $column . $from . $where . 'limit 1')->row_array();
    }

    /**
     * 강의실등록
     * @param array $form_data
     * @return array|bool
     */
    public function addLectureRoom($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            //기본정보 등록
            $query_string = "LrCode FROM {$this->_table['lectureroom']} ORDER BY LrCode DESC limit 1";
            $get_lr_code = $this->_conn->query('SELECT ' . $query_string)->row_array();
            $lr_code = (empty($get_lr_code) === true) ? '101' : $get_lr_code['LrCode'] + 1;

            $input_data = [
                'LrCode' => $lr_code,
                'SiteCode' => element('site_code',$form_data),
                'CampusCcd' => element('campus_ccd',$form_data),
                'LectureRoomName' => element('room_name',$form_data),
                'IsUse' => element('is_use',$form_data),
                'RegDatm' => date('Y-m-d H:i:s'),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($input_data)->insert($this->_table['lectureroom']) === false) {
                throw new \Exception('강의실 기본정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return [
            'ret_cd' => true,
            'last_idx' => $lr_code
        ];
    }

    /**
     * 강의실수정
     * @param array $form_data
     * @return array|bool
     */
    public function modifyLectureRoom($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $input_data = [
                'SiteCode' => element('site_code',$form_data),
                'CampusCcd' => element('campus_ccd',$form_data),
                'LectureRoomName' => element('room_name',$form_data),
                'IsUse' => element('is_use',$form_data),
                'UpdDatm' => date('Y-m-d H:i:s'),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $this->_conn->set($input_data)->where('LrCode', element('lr_code',$form_data));
            if($this->_conn->update($this->_table['lectureroom'])=== false) {
                throw new \Exception('강의실 기본정보 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return [
            'ret_cd' => true,
            'last_idx' => element('lr_code',$form_data)
        ];
    }

    /**
     * 강의실회차 리스트
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return int
     */
    public function unitList($is_count = false, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "
                LU.LrUnitCode, LU.UnitName, LU.SeatChoiceStartDate, LU.SeatChoiceEndDate, LU.UseQty, LU.IsUse, LU.IsSmsUse, A.wAdminName AS RegAdminName, LU.RegDatm
                ,(SELECT COUNT(*) AS cnt FROM {$this->_table['lectureroom_r_unit_r_seat']} AS RS 
                    WHERE RS.LrUnitCode = LU.LrUnitCode AND RS.IsStatus = 'Y' AND RS.SeatStatusCcd IN (727002, 727003)) AS UseSeatCnt
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy(['LU.RegDatm' => 'DESC'])->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $arr_condition_1['IN']['LU.SiteCode'] = get_auth_site_codes();       //사이트 권한 추가
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['lectureroom_r_unit']} AS LU
            INNER JOIN {$this->_table['admin']} AS A ON LU.RegAdminIdx = A.wAdminIdx
        ";
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 강의실회차 조회
     * @param $lr_code
     * @param $lr_unit_code
     * @return mixed
     */
    public function findLectureRoomUnit($lr_code, $lr_unit_code)
    {
        $arr_condition = [
            'EQ' => [
                'lr.LrCode' => $lr_code,
                'lu.LrUnitCode' => $lr_unit_code,
                'lu.IsStatus' => 'Y'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
        lr.SiteCode, lr.CampusCcd, lr.LectureRoomName, S.SiteName, C.CcdName AS CampusName
        ,lu.LrUnitCode, lu.LrCode, lu.UnitName, lu.UseQty, lu.TransverseNum, lu.StartNo, lu.EndNo
        ,lu.SeatChoiceStartDate, lu.SeatChoiceEndDate, lu.SeatMapFileRoute, lu.SeatMapFileName, lu.Desc, lu.IsSmsUse, lu.SmsContent, lu.SendTel, lu.IsUse, lu.RegDatm, lu.UpdDatm
        ,admin.wAdminName AS RegAdminName, admin2.wAdminName AS UpdAdminName
        ,(SELECT COUNT(*) AS cnt FROM {$this->_table['lectureroom_r_unit_r_seat']} AS RS 
            WHERE RS.LrUnitCode = LU.LrUnitCode AND RS.IsStatus = 'Y' AND RS.SeatStatusCcd IN (727002, 727003)) AS UseSeatCnt
        ,(SELECT COUNT(*) AS cnt FROM {$this->_table['lectureroom_seat_register']} AS SR
            WHERE SR.LrCode = lu.LrCode AND SR.LrUnitCode = lu.LrUnitCode AND SR.IsStatus = 'Y' AND SR.OrderNum = '1' AND SR.SeatStatusCcd IN (728001,728002)) AS UseMemberSeatCnt
        ";
        $from = "
            FROM {$this->_table['lectureroom']} AS lr
            INNER JOIN {$this->_table['lectureroom_r_unit']} AS lu on lr.LrCode = lu.LrCode
            INNER JOIN {$this->_table['site']} AS S ON lr.SiteCode = S.SiteCode
            INNER JOIN {$this->_table['sys_code']} AS C ON lr.CampusCcd = C.Ccd
            INNER JOIN {$this->_table['admin']} admin on lu.RegAdminIdx = admin.wAdminIdx
            LEFT JOIN {$this->_table['admin']} admin2 on lu.UpdAdminIdx = admin2.wAdminIdx
        ";
        return $this->_conn->query('SELECT ' . $column . $from . $where . ' limit 1')->row_array();
    }

    /**
     * 강의실 회차 등록
     * @param array $form_data
     * @return array|bool
     */
    public function addLectureRoomUnit($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            //회차(기타)정보 등록
            $result = $this->_addLectureRoomUnit($form_data);
            if ($result === false) {
                throw new \Exception('강의실 회차정보 등록에 실패했습니다.');
            }

            //좌석정보 등록
            if ($this->_addLectureRoomUnitSeat($form_data, $result['last_lr_unit_code']) !== true) {
                throw new \Exception('강의실 좌석정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 강의실 회차정보 수정
     * @param array $form_data
     * @return array|bool
     */
    public function modifyLectureRoomUnit($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $lr_code = element('lr_code', $form_data);
            $lr_unit_code = element('lr_unit_code', $form_data);
            //기존좌석정보조회
            $data = $this->findLectureRoomUnit($lr_code, $lr_unit_code);
            if (empty($data) === true) {
                throw new \Exception('조회된 좌석 정보가 없습니다.');
            }

            $result = $this->_modifyLectureRoomUnit($form_data, $data);
            if ($result !== true) {
                throw new \Exception($result['ret_msg']);
            }

            //좌석추가
            if (empty($this->_add_seat_count) === false) {
                if ($this->_modifyLectureRoomUnitSeat($lr_unit_code) !== true) {
                    throw new \Exception('강의실 좌석정보 추가 실패했습니다.');
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
     * 강의실 회차별 좌석회원 등록정보
     * @param $lr_unit_code
     * @return mixed
     */
    public function listLectureRoomUnitForRegister($lr_unit_code)
    {
        $column = "b.LrUnitCode, b.LrrursIdx, b.SeatNo, b.SeatStatusCcd, b.OrderIdx, b.ProdCodeSub, b.MemIdx, b.MemName, b.SeatStatusName";
        $from = "
            FROM (
                SELECT LrUnitCode
                FROM {$this->_table['lectureroom_r_unit']}
                WHERE LrUnitCode = '{$lr_unit_code}'
            ) AS a
            INNER JOIN (
                SELECT rs.LrUnitCode, rs.LrrursIdx, rs.SeatNo, rs.SeatStatusCcd, lrsr.MemIdx, lrsr.MemName, lrsr.OrderIdx, lrsr.ProdCodeSub, sc.CcdName AS SeatStatusName
                FROM {$this->_table['lectureroom_r_unit_r_seat']} AS rs
                INNER JOIN {$this->_table['sys_code']} AS sc ON rs.SeatStatusCcd = sc.Ccd                
                LEFT JOIN (
                    SELECT a.LrrursIdx, a.MemIdx, a.OrderIdx, a.OrderProdIdx, a.ProdCodeSub, c.MemName
                    FROM (
                        SELECT LrrursIdx, MemIdx, OrderIdx, OrderProdIdx, ProdCodeSub
                        FROM {$this->_table['lectureroom_seat_register']}
                        WHERE LrUnitCode = '{$lr_unit_code}'
                        AND SeatStatusCcd IN ('728001','728002')
                        AND IsStatus = 'Y'
                        AND OrderNum = '1'
                    ) AS a
                    INNER JOIN {$this->_table['order_product']} AS b ON a.OrderIdx = b.OrderIdx AND a.OrderProdIdx = b.OrderProdIdx AND b.PayStatusCcd = '676001'
                    INNER JOIN {$this->_table['member']} AS c ON a.MemIdx = c.MemIdx
                ) AS lrsr ON rs.LrrursIdx = lrsr.LrrursIdx
                WHERE rs.LrUnitCode = '{$lr_unit_code}' AND rs.IsStatus = 'Y'
            ) AS b ON a.LrUnitCode = b.LrUnitCode
            ORDER BY b.LrrursIdx ASC
        ";
        return $this->_conn->query('SELECT ' . $column . $from)->result_array();
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
            $arr_lr_rurs_idx = explode(',', element('lr_rurs_idx',$form_data));
            $arr_choice_serial_num = explode(',', element('choice_serial_num',$form_data));

            $arr_condition = ['IN' => ['lrsr.LrrursIdx' => $arr_lr_rurs_idx]];
            $register_data = $this->lectureRoomIssueModel->findSeatRegister('LrsrIdx', $arr_condition);
            if (empty($register_data) === false) {
                throw new Exception('회원이 선택한 좌석은 수정할 수 없습니다.');
            }

            $log_data = [];
            $update_data = [];
            foreach ($arr_lr_rurs_idx as $k => $v) {
                $log_data[] = [
                    'LrUnitCode' => element('lr_unit_code',$form_data),
                    'LrCode' => element('lr_code',$form_data),
                    'SeatStatusCcd' => element('seat_status',$form_data),
                    'LrrursIdx' => $v,
                    'AfterSeatNo' => $arr_choice_serial_num[$k],
                    'Desc' => element('desc', $form_data),
                    'RegDatm' => date('Y-m-d H:i:s'),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];

                $update_data[] = [
                    'LrrursIdx' => $v,
                    'SeatStatusCcd' => element('seat_status',$form_data),
                    'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    'UpdDatm' => date('Y-m-d H:i:s')
                ];
            }

            if($log_data) $this->_conn->insert_batch($this->_table['lectureroom_log'], $log_data);
            if($update_data) $this->_conn->update_batch($this->_table['lectureroom_r_unit_r_seat'], $update_data, 'LrrursIdx');

            if ($this->_conn->trans_status() === false) {
                throw new Exception('좌석상태 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 로그데이타 리스트
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listLectureRoomLog($is_count = false, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "
                lg.LogIdx, lg.LrCode, lg.LrUnitCode, lg.SeatStatusCcd, o.OrderNo, o.OrderIdx, lg.LrrursIdx, lg.LrsrIdx, lg.OrderProdIdx, lg.MemIdx, lg.BeforeSeatNo, lg.AfterSeatNo, lg.Desc, lg.RegDatm
                ,sc.CcdName AS SeatStatusName
                ,mem.MemId, mem.MemName
                ,ad.wAdminName AS RegAdminName
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy(['lg.LogIdx' => 'DESC'])->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['lectureroom_log']} AS lg
            LEFT JOIN {$this->_table['order_product']} AS op ON lg.OrderProdIdx = op.OrderProdIdx
            LEFT JOIN {$this->_table['order']} AS o ON op.OrderIdx = o.OrderIdx
            LEFT JOIN {$this->_table['sys_code']} AS sc ON lg.SeatStatusCcd = sc.Ccd
            LEFT JOIN {$this->_table['admin']} AS ad ON lg.RegAdminIdx = ad.wAdminIdx
            LEFT JOIN {$this->_table['member']} AS mem ON lg.MemIdx = mem.MemIdx
        ";
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 파일 삭제
     * @param $lr_code
     * @param $lr_unit_code
     * @return array|bool
     */
    public function removeFile($lr_code, $lr_unit_code)
    {
        $this->_conn->trans_begin();
        try {
            $data = $this->findLectureRoomUnit($lr_code, $lr_unit_code);
            if (empty($data) === true) {
                throw new \Exception('조회된 좌석 정보가 없습니다.');
            }

            $file_path = $data['SeatMapFileRoute'];
            $this->load->helper('file');
            $real_file_path = public_to_upload_path($file_path);
            if (@unlink($real_file_path) === false) {
                throw new \Exception('파일 삭제에 실패했습니다.');
            }

            $img_data['SeatMapFileRoute'] = '';
            $img_data['SeatMapFileName'] = '';
            if ($this->_conn->set($img_data)->where('LrUnitCode', $lr_unit_code)->update($this->_table['lectureroom_r_unit']) === false) {
                throw new \Exception('파일 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 강의실 데이타 리스트
     * @return mixed
     */
    public function listLectureRoom()
    {
        $arr_condition = ['EQ' => ['IsStatus' => 'Y', 'IsUse' => 'Y']];
        $column = 'LrCode, SiteCode, CampusCcd, LectureRoomName';
        $from = "
            FROM {$this->_table['lectureroom']}
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['LrCode' => 'DESC'])->getMakeOrderBy();
        return $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 강의실회차조회
     * @return mixed
     */
    public function listLectureRoomUnit()
    {
        $arr_condition = ['EQ' => ['IsStatus' => 'Y', 'IsUse' => 'Y']];
        $column = 'LrUnitCode, LrCode, UnitName';
        $from = "
            FROM {$this->_table['lectureroom_r_unit']}
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['LrCode' => 'DESC', 'LrUnitCode' => 'DESC'])->getMakeOrderBy();
        return $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * @param $prod_code
     * @return mixed
     */
    public function findProductLectureRoom($prod_code)
    {
        $arr_condition = [
            'EQ' => [
                'ProdCode' => $prod_code,
                'IsStatus' => 'Y'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "ProdCode, LrCode, LrUnitCode, IsUse";
        $from = "
            FROM {$this->_table['product_r_lectureroom']}
        ";
        return $this->_conn->query('SELECT ' . $column . $from . $where)->row_array();
    }

    /**
     * 강의실좌석 상품 등록/수정 (단과반 등록시 호출)
     * @param null $prod_code
     * @param null $lr_code
     * @param null $lr_unit_code
     * @param string $lr_is_use
     * @return array|bool
     */
    public function addProductLectureRoom($prod_code = null, $lr_code = null, $lr_unit_code = null, $lr_is_use = 'N')
    {
        try {
            $now =  date('Y-m-d H:i:s');
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            $duplicate_query = /** @lang text */ "
                INSERT INTO {$this->_table['product_r_lectureroom']} (ProdCode, LrCode, LrUnitCode, IsUse, RegDatm, RegAdminIdx, RegIp)
                VALUES ('{$prod_code}', '{$lr_code}', '{$lr_unit_code}', '{$lr_is_use}', '{$now}', '{$admin_idx}', '{$reg_ip}')
                ON DUPLICATE KEY UPDATE
                ProdCode = '{$prod_code}', LrCode = '{$lr_code}', LrUnitCode = '{$lr_unit_code}', IsUse = '{$lr_is_use}', UpdDatm = '{$now}', UpdAdminIdx = '{$admin_idx}'
            ";

            if ($this->_conn->query($duplicate_query) === false) {
                throw new \Exception('강의실좌석 상품 등록 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 강의실 회차(기타)정보 등록
     * @param array $form_data
     * @return array|bool
     */
    private function _addLectureRoomUnit($form_data = [])
    {
        try {
            $query_string = "LrUnitCode FROM {$this->_table['lectureroom_r_unit']} WHERE LrCode = {$form_data['lr_code']} ORDER BY LrUnitCode DESC limit 1";
            $get_lr_unit_code = $this->_conn->query('SELECT ' . $query_string)->row_array();
            $lr_unit_code = (empty($get_lr_unit_code) === true) ? element('lr_code',$form_data).'001' : $get_lr_unit_code['LrUnitCode'] + 1;

            $uploaded = [];
            $upload_dir = '';
            if ($_FILES['map_file']['size'] > 0) {
                $this->load->library('upload');
                $upload_dir = config_item('upload_prefix_dir') . '/lectureroom/' . date('Y') . '/' . date('md');
                $uploaded = $this->upload->uploadFile('file', ['map_file'], $this->_getAttachImgNames(), $upload_dir);
                if (is_array($uploaded) === false) {
                    throw new \Exception($uploaded);
                }
            }

            $input_data = [
                'LrUnitCode' => $lr_unit_code,
                'LrCode' => element('lr_code',$form_data),
                'UnitName' => element('unit_name',$form_data),
                'UseQty' => element('use_qty',$form_data),
                'TransverseNum' => element('transverse_num',$form_data),
                'StartNo' => element('start_no',$form_data),
                'EndNo' => element('end_no',$form_data),
                'SeatChoiceStartDate' => element('seat_choice_start_date',$form_data),
                'SeatChoiceEndDate' => element('seat_choice_end_date',$form_data),
                'SeatMapFileRoute' => (empty($uploaded[0]) === false) ? $this->upload->_upload_url . $upload_dir . '/'. $uploaded[0]['orig_name'] : '',
                'SeatMapFileName' => (empty($uploaded[0]) === false) ? $uploaded[0]['client_name'] : '',
                'Desc' => element('desc',$form_data),
                'IsSmsUse' => element('sms_is_use',$form_data),
                'SmsContent' => element('sms_content',$form_data),
                'SendTel' => element('send_tel',$form_data),
                'IsUse' => element('is_use',$form_data),
                'RegDatm' => date('Y-m-d H:i:s'),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($input_data)->insert($this->_table['lectureroom_r_unit']) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return [
            'ret_cd' => true,
            'last_lr_unit_code' => $lr_unit_code
        ];
    }

    /**
     * 강의실 좌석정보 등록
     * @param array $form_data
     * @param $lr_unit_code
     * @return bool
     */
    private function _addLectureRoomUnitSeat($form_data = [], $lr_unit_code)
    {
        try {
            $input_data = [];
            $no = $form_data['start_no'];
            for($i=0; $i<$form_data['use_qty']; $i++) {
                $input_data[] = [
                    'LrUnitCode' => $lr_unit_code,
                    'SeatNo' => $no,
                    'SeatStatusCcd' => $this->_arr_seat_status_ccd['N'],
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];
                $no++;
            }
            if($input_data) {
                if ($this->_conn->insert_batch($this->_table['lectureroom_r_unit_r_seat'], $input_data) === false) {
                    throw new \Exception('fail');
                }
            }

        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 강의실 회차(기타)정보 수정
     * @param $form_data
     * @param $data
     * @return array|bool
     */
    private function _modifyLectureRoomUnit($form_data, $data)
    {
        try {
            //넘어온 좌석수가 기존보다 많은 값일 경우 좌석 추가
            if ($data['UseQty'] > element('use_qty', $form_data)) {
                throw new \Exception('좌석수는 기존 좌석주보다 많아야 합니다.');
            }

            $uploaded = [];
            $upload_dir = '';
            if ($_FILES['map_file']['size'] > 0) {
                //up, 기존 파일 삭제
                $this->load->helper('file');
                $this->load->library('upload');

                $path_y = date('Y');
                $path_md = date('md');
                if (empty($data['SeatMapFileRoute']) === false) {
                    $arr_seat_file = explode('/', $data['SeatMapFileRoute']);
                    $path_y = ((int)$arr_seat_file[5] <= 0) ? date('Y') : $arr_seat_file[5];
                    $path_md = ((int)$arr_seat_file[6] <= 0) ? date('md') : $arr_seat_file[6];
                    $real_img_path = public_to_upload_path($data['SeatMapFileRoute']);
                    if (@unlink($real_img_path) === false) {
                        /*throw new \Exception('이미지 삭제에 실패했습니다.');*/
                    }
                }

                $upload_dir = config_item('upload_prefix_dir') . '/lectureroom/' . $path_y . '/' . $path_md;
                $uploaded = $this->upload->uploadFile('file', ['map_file'], $this->_getAttachImgNames(), $upload_dir);
                if (is_array($uploaded) === false) {
                    throw new \Exception($uploaded);
                }
            }

            $input_data = [
                'UnitName' => element('unit_name',$form_data),
                'TransverseNum' => element('transverse_num',$form_data),
                'SeatChoiceStartDate' => element('seat_choice_start_date',$form_data),
                'SeatChoiceEndDate' => element('seat_choice_end_date',$form_data),
                'Desc' => element('desc',$form_data),
                'IsSmsUse' => element('sms_is_use',$form_data),
                'SmsContent' => element('sms_content',$form_data),
                'SendTel' => element('send_tel',$form_data),
                'IsUse' => element('is_use',$form_data),
                'UpdDatm' => date('Y-m-d H:i:s'),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if (empty($uploaded[0]) === false) {
                $input_data['SeatMapFileRoute'] = $this->upload->_upload_url . $upload_dir . '/'. $uploaded[0]['orig_name'];
                $input_data['SeatMapFileName'] = $uploaded[0]['client_name'];
            }

            if ($data['UseQty'] < element('use_qty', $form_data)) {
                $input_data['UseQty'] = element('use_qty', $form_data);
                $input_data['EndNo'] = element('end_no', $form_data);
            }

            $this->_conn->set($input_data)->where('LrUnitCode', element('lr_unit_code',$form_data));
            if($this->_conn->update($this->_table['lectureroom_r_unit'])=== false) {
                throw new \Exception('좌석 정보 수정에 실패했습니다.');
            }

            //추가될 좌석수 셋팅
            $this->_add_seat_count = element('use_qty', $form_data) - $data['UseQty'];
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 강의실 좌석정보 추가
     * @param $lr_unit_code
     * @return array|bool
     */
    private function _modifyLectureRoomUnitSeat($lr_unit_code)
    {
        try {
            $arr_condition = [
                'EQ' => [
                    'LrUnitCode' => $lr_unit_code
                ]
            ];
            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $query_string = "SeatNo FROM {$this->_table['lectureroom_r_unit_r_seat']} {$where} ORDER BY LrrursIdx DESC LIMIT 1";
            $unit_data = $this->_conn->query('SELECT ' . $query_string)->row_array();
            if (empty($unit_data) === true) {
                throw new \Exception('조회된 강의실 회차정보가 없습니다.');
            }

            $input_data = [];
            $start_seat_no = $unit_data['SeatNo'] + 1;
            for ($i=0; $i<$this->_add_seat_count; $i++) {
                $input_data[] = [
                    'LrUnitCode' => $lr_unit_code,
                    'SeatNo' => $start_seat_no,
                    'SeatStatusCcd' => $this->_arr_seat_status_ccd['N']
                ];
                $start_seat_no++;
            }

            if($input_data) {
                if ($this->_conn->insert_batch($this->_table['lectureroom_r_unit_r_seat'], $input_data) === false) {
                    throw new \Exception('fail');
                }
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 파일명 생성
     * @return string
     */
    private function _getAttachImgNames()
    {
        $attach_file_names = date("YmdHis");
        return $attach_file_names;
    }
}