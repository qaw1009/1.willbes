<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PointModel extends WB_Model
{
    private $_table = [
        'point_save' => 'lms_point_save',
        'point_use' => 'lms_point_use',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'product' => 'lms_product',
        'member' => 'lms_member',
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    // 포인트상태 (적립, 소진, 소멸)
    public $_point_status_ccd = ['save' => '679001', 'useall' => '679002', 'expire' => '679003'];

    // 포인트 적립사유 (결제완료, 환불에 따른 사용포인트 복구)
    public $_point_save_reason_ccd = ['paid' => '680001', 'refund' => '680002'];

    // 포인트 사용사유 (주문결제, 소멸, 환불에 따른 적립포인트 회수)
    public $_point_use_reason_ccd = ['paid' => '681001', 'expire' => '681002', 'refund' => '681003'];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 포인트 적립/사용 목록 조회
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param string $list_type [전체 : all, 적립 : save or save_only, 사용 : use or use_only]
     * @param null|int $mem_idx [회원식별자]
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllSaveUsePoint($point_type, $list_type, $mem_idx = null, $is_count = true, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $column = 'count(*) AS numrows';
            } else {
                $column = 'PSU.*, if(PointStatusCcd = "U", "차감", CPS.CcdName) as PointStatusCcdName, if(PSU.ReasonCcd like "%999", EtcReason, CR.CcdName) as ReasonCcdName
                    , S.SiteName, M.MemId, M.MemName, O.OrderNo, A.wAdminName as RegAdminName';
            }
        } else {
            $column = $is_count;
        }

        $is_join = strpos($list_type, '_only') === false;   // save_only, use_only = false (합계조회), 그 외 true (목록)
        $list_type = str_first_pos_before($list_type, '_');     // all, save, use

        // inner where 조건
        $arr_inner_condition = [
            'EQ' => ['PS.MemIdx' => $mem_idx]
        ];
        $inner_where = $this->_conn->makeWhere($arr_inner_condition);
        $inner_where = $inner_where->getMakeWhere(true);

        $save_from = /** @lang text */ '
            select PS.PointIdx, PS.MemIdx, PS.PointType, null as PointUseIdx, PS.SiteCode, PS.OrderIdx, PS.PointStatusCcd, PS.SavePoint as PointAmt, PS.RemainPoint
                , PS.SaveDatm as RegDatm, PS.ExpireDatm, PS.ReasonCcd, PS.EtcReason, PS.RegAdminIdx		 
            from ' . $this->_table['point_save'] . ' as PS
            where PS.PointType = ?' . $inner_where;

        $use_from = /** @lang text */ '
            select PS.PointIdx, PS.MemIdx, PS.PointType, PU.PointUseIdx, PU.SiteCode, PU.OrderIdx, "U" as PointStatusCcd, PU.UsePoint as PointAmt, 0 as RemainPoint
                , PU.UseDatm as RegDatm, null as ExpireDatm, PU.ReasonCcd, PU.EtcReason, PU.RegAdminIdx 
            from ' . $this->_table['point_use'] . ' as PU
                inner join ' . $this->_table['point_save'] . ' as PS
                    on PU.PointIdx = PS.PointIdx
            where PS.PointType = ?' . $inner_where;

        if ($list_type == 'all') {
            $inner_from = $save_from . ' union all ' . $use_from;
            $binds = [$point_type, $point_type];
        } else {
            $inner_from = ${$list_type . '_from'};
            $binds = [$point_type];
        }

        $from = '
            from (
                ' . $inner_from . '
            ) as PSU';

        if ($is_join === true) {
            $from .= '
                left join ' . $this->_table['site'] . ' as S
                    on PSU.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['member'] . ' as M
                    on PSU.MemIdx = M.MemIdx
                left join ' . $this->_table['order'] . ' as O
                    on PSU.OrderIdx = O.OrderIdx
                left join ' . $this->_table['code'] . ' as CPS
                    on PSU.PointStatusCcd = CPS.Ccd and CPS.IsStatus = "Y"                    
                left join ' . $this->_table['code'] . ' as CR
                    on PSU.ReasonCcd = CR.Ccd and CR.IsStatus = "Y"		
                left join ' . $this->_table['admin'] . ' as A
                    on PSU.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"';
        }

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, $binds);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 적립 포인트 목록 조회
     * @param bool|string $column
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSavePoint($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        return $this->_conn->getListResult($this->_table['point_save'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 적립포인트금액별 적립/사용 목록 조회
     * @param int $save_point [적립포인트금액]
     * @param string $use_start_date [포인트사용시작일자]
     * @param string $use_end_date [포인트사용종료일자]
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSaveUsePointByPointAmt($save_point, $use_start_date, $use_end_date, $is_count = true, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'SO.OrderNo as SaveOrderNo, SOP.ProdCode, ifnull(SP.ProdName, SO.ReprProdName) as ProdName
                , (case when O.UseLecPoint > 0 then "강좌" when O.UseBookPoint > 0 then "교재" else "" end) as UsePointType
                , if(PU.ReasonCcd = "' . $this->_point_use_reason_ccd['paid'] . '", "사용", "회수") as UseType
                , M.MemId, M.MemName, O.OrderNo as UseOrderNo, PS.SaveDatm, PS.SavePoint, PU.UseDatm, TA.SumUsePoint, PS.RemainPoint 
                , CUR.CcdName as UseReasonCcdName                                
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from (
                select PU.PointIdx, PU.OrderIdx, sum(PU.UsePoint) as SumUsePoint, max(PU.PointUseIdx) as PointUseIdx
                from ' . $this->_table['point_use'] . ' as PU
                    inner join ' . $this->_table['point_save'] . ' as PS
                        on PU.PointIdx = PS.PointIdx 
                where PS.SavePoint in (?)
                    and PU.UseDatm between ? and ?
                group by PU.PointIdx, PU.OrderIdx
            ) as TA
                inner join ' . $this->_table['point_save'] . ' as PS
                    on TA.PointIdx = PS.PointIdx
                inner join ' . $this->_table['point_use'] . ' as PU
                    on TA.PointUseIdx = PU.PointUseIdx
                left join ' . $this->_table['order'] . ' as O
                    on PU.OrderIdx = O.OrderIdx
                left join ' . $this->_table['order'] . ' as SO
                    on PS.OrderIdx = SO.OrderIdx	
                left join ' . $this->_table['order_product'] . ' as SOP
                    on PS.OrderIdx = SOP.OrderIdx and PS.OrderProdIdx = SOP.OrderProdIdx
                left join ' . $this->_table['product'] . ' as SP
                    on SOP.ProdCode = SP.ProdCode
                left join ' . $this->_table['member'] . ' as M
                    on PS.MemIdx = M.MemIdx	       
                left join ' . $this->_table['code'] . ' as CUR
                    on PU.ReasonCcd = CUR.Ccd and CUR.IsStatus = "Y"                       
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$save_point, $use_start_date . ' 00:00:00', $use_end_date . ' 23:59:59']);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 회원 포인트 조회
     * @param int $mem_idx [회원식별자]
     * @param string $point_type [포인트구분, lecture : 강좌, book : 교재, all : 전체]
     * @return mixed
     */
    public function getMemberPoint($mem_idx, $point_type = 'all')
    {
        $query = $this->_conn->query('select fn_member_point(?, ?) as MemPoint', [$mem_idx, $point_type]);
        $data = $query->row(0)->MemPoint;

        if ($point_type == 'all') {
            $data = json_decode($data, true);

            // 조회되지 않는 포인트 초기화
            $arr_point_type = ['lecture', 'book'];
            foreach ($arr_point_type as $type) {
                if (isset($data[$type]) === false) {
                    $data[$type] = 0;
                }
            }
        }

        return $data;
    }

    /**
     * 포인트 적립
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $save_point [적립포인트]
     * @param int $mem_idx [회원식별자]
     * @param array $input
     * @return array|bool
     */
    public function addSavePoint($point_type, $save_point, $mem_idx, $input = [])
    {
        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $valid_start_date = element('valid_start_date', $input);
            $valid_end_date = element('valid_end_date', $input);
            $valid_days = element('valid_days', $input, 365);   // 기본값 1년

            $data = [
                'PointType' => $point_type,
                'MemIdx' => $mem_idx,
                'SiteCode' => element('site_code', $input),
                'OrderIdx' => element('order_idx', $input, '0'),
                'OrderProdIdx' => element('order_prod_idx', $input, '0'),
                'PointStatusCcd' => $this->_point_status_ccd['save'],
                'SavePoint' => $save_point,
                'RemainPoint' => $save_point,
                'ReasonCcd' => element('reason_ccd', $input),
                'EtcReason' => element('etc_reason', $input),
                'RegAdminIdx' => $sess_admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            if (empty($valid_start_date) === false && empty($valid_end_date) === false) {
                // 유효기간이 있을 경우
                if (strtotime($valid_end_date) - strtotime($valid_start_date) < 0) {
                    throw new \Exception('유효시작일자가 종료일자보다 큽니다.');
                }

                $data['SaveDatm'] = $valid_start_date . ' ' . date('H:i:s');
                $data['ExpireDatm'] = $valid_end_date . ' 23:59:59';

                $this->_conn->set($data);
            } else {
                $this->_conn->set($data)->set('ExpireDatm', 'date_add(NOW(), interval ' . ($valid_days - 1) . ' day)', false);
            }

            if ($this->_conn->insert($this->_table['point_save']) === false) {
                throw new \Exception('포인트 적립에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 포인트 사용
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $use_point [사용포인트]
     * @param int $mem_idx [회원식별자]
     * @param array $input
     * @param bool $is_save_point_check [사용포인트보다 적립포인트가 많을 경우 남은 적립포인트만큼만 차감할 경우 true, false일 경우 보유 포인트 부족 에러 리턴]
     * @return bool|string
     */
    public function addUsePoint($point_type, $use_point, $mem_idx, $input = [], $is_save_point_check = false)
    {
        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');

            if ($is_save_point_check === true) {
                // 회원 포인트 조회
                $save_point = $this->getMemberPoint($mem_idx, $point_type);

                // 회원 포인트가 없을 경우 차감할 포인트가 없기 때문에 true 리턴
                if ($save_point < 1) {
                    return true;
                }

                // 사용 포인트보다 회원 포인트가 작을 경우 회원 포인트 만큼만 차감
                if ($save_point < $use_point) {
                    $use_point = $save_point;
                }
            }

            // 코드이그나이터에서 프로시저 단독으로 쿼리 실행시 커밋이 안되는 버그 해결을 위해 페이크 쿼리 실행
            $this->_conn->query(/** @lang text */'select NOW() from dual');

            $data = [
                $mem_idx, element('site_code', $input, 0), $point_type, $use_point,
                element('order_idx', $input, '0'), element('order_prod_idx', $input, '0'),
                element('reason_ccd', $input), element('etc_reason', $input),
                $sess_admin_idx, $this->input->ip_address()
            ];

            $query = $this->_conn->query('call sp_member_point_use(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
            $result = $query->row(0)->ReturnMsg;

            if ($result != 'Success') {
                $err_msg = '포인트 사용에 실패했습니다.';
                if ($result == 'NotEnoughPoint') {
                    $err_msg = '보유 포인트가 부족합니다.';
                }
                throw new \Exception($err_msg);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 포인트 적립/차감 일괄/바로 등록
     * @param array $input
     * @return array|bool
     */
    public function addSaveUsePoint($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $arr_mem_idx = element('mem_idx', $input);
            $point_type = element('point_type', $input);
            $save_use = element('save_use', $input);
            $point_amt = element('point_amt', $input);

            $data = [
                'site_code' => element('site_code', $input),
                'reason_ccd' => element('reason_ccd', $input),
                'etc_reason' => element('etc_reason', $input),
                'valid_start_date' => element('valid_start_date', $input),
                'valid_end_date' => element('valid_end_date', $input)
            ];

            foreach ($arr_mem_idx as $mem_idx) {
                if ($save_use == 'save') {
                    $is_add = $this->addSavePoint($point_type, $point_amt, $mem_idx, $data);
                } else {
                    $is_add = $this->addUsePoint($point_type, $point_amt, $mem_idx, $data);
                }

                if ($is_add !== true) {
                    throw new \Exception($is_add);
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
