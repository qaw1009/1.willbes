<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PointFModel extends WB_Model
{
    private $_table = [
        'point_save' => 'lms_point_save',
        'point_use' => 'lms_point_use',
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'order' => 'lms_order',
        'code' => 'lms_sys_code'
    ];

    public $_point_status_ccd = ['save' => '679001', 'useall' => '679002', 'expire' => '679003'];    // 포인트상태 (적립, 소진, 소멸)
    private $_point_save_reason_ccd = ['paid' => '680001', 'join' => '680006'];   // 포인트 적립사유 (결제완료)
    private $_point_use_reason_ccd = ['paid' => '681001'];    // 포인트 사용사유 (주문결제)

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회원 적립 포인트 목록
     * @param bool|string $is_count [count 조회 여부 or 조회 컬럼]
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMemberSavePoint($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $column = 'count(*) AS numrows';
            } else {
                $column = 'PS.PointIdx, PS.PointType, PS.SiteCode, PS.OrderIdx, PS.OrderProdIdx, PS.SavePoint, PS.RemainPoint, PS.SaveDatm, PS.ExpireDatm, PS.ReasonCcd
                    , if(PS.EtcReason is null or length(PS.EtcReason) < 1, CR.CcdName, PS.EtcReason) as ReasonName, SG.SiteGroupName, O.OrderNo';
            }
        } else {
            $column = $is_count;
        }

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        $from = '
            from ' . $this->_table['point_save'] . ' as PS
                left join ' . $this->_table['order'] . ' as O
                    on PS.OrderIdx = O.OrderIdx
                left join ' . $this->_table['site'] . ' as S
                    on PS.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['site_group'] . ' as SG
                    on S.SiteGroupCode = SG.SiteGroupCode and SG.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CR
                    on PS.ReasonCcd = CR.Ccd and CR.IsStatus = "Y"
            where PS.MemIdx = ?';

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$this->session->userdata('mem_idx')]);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 회원 사용 포인트 목록
     * @param bool|string $is_count [count 조회 여부 or 조회 컬럼]
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMemberUsePoint($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $column = 'count(*) AS numrows';
            } else {
                $column = 'PU.PointUseIdx, PU.PointIdx, PS.PointType, PU.SiteCode, PU.OrderIdx, PU.OrderProdIdx, PU.UsePoint, PU.UseDatm, PU.ReasonCcd
                    , if(PU.EtcReason is null or length(PU.EtcReason) < 1, CR.CcdName, PU.EtcReason) as ReasonName, SG.SiteGroupName, O.OrderNo';
            }
        } else {
            $column = $is_count;
        }

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        $from = '
            from ' . $this->_table['point_use'] . ' as PU
                inner join ' . $this->_table['point_save'] . ' as PS
                    on PU.PointIdx = PS.PointIdx
                left join ' . $this->_table['order'] . ' as O
                    on PU.OrderIdx = O.OrderIdx
                left join ' . $this->_table['site'] . ' as S
                    on PU.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['site_group'] . ' as SG
                    on S.SiteGroupCode = SG.SiteGroupCode and SG.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CR
                    on PU.ReasonCcd = CR.Ccd and CR.IsStatus = "Y"		
            where PS.MemIdx = ?';

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$this->session->userdata('mem_idx')]);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 회원 적립/사용 포인트 목록
     * @param bool|string $is_count [count 조회 여부 or 조회 컬럼]
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMemberAllPoint($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $column = 'count(*) AS numrows';
            } else {
                $column = 'PSU.PointIdx, PSU.MemIdx, PSU.PointType, PSU.PointStatusType, PSU.SiteCode, PSU.OrderIdx, PSU.OrderProdIdx, PSU.PointAmt
                    , PSU.RemainPoint, PSU.RegDatm, PSU.ExpireDatm, PSU.ReasonCcd
                    , if(PSU.EtcReason is null or length(PSU.EtcReason) < 1, CR.CcdName, PSU.EtcReason) as ReasonName
                    , SG.SiteGroupName, O.OrderNo';
            }
        } else {
            $column = $is_count;
        }

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        $from = '
            from (
                select PS.PointIdx, PS.MemIdx, PS.PointType, "S" as PointStatusType, PS.SiteCode, PS.OrderIdx, PS.OrderProdIdx, PS.`SavePoint` as PointAmt
                    , PS.RemainPoint, PS.SaveDatm as RegDatm, PS.ExpireDatm, PS.ReasonCcd, PS.EtcReason
                from ' . $this->_table['point_save'] . ' as PS
                where PS.MemIdx = ?
                union all
                select PU.PointIdx, PS.MemIdx, PS.PointType, "U" as PointStatusType, PU.SiteCode, PU.OrderIdx, PU.OrderProdIdx, PU.UsePoint as PointAmt
                    , 0 as RemainPoint, PU.UseDatm as RegDatm, null as ExpireDatm, PU.ReasonCcd, PU.EtcReason
                from ' . $this->_table['point_use'] . ' as PU
                    inner join ' . $this->_table['point_save'] . ' as PS
                        on PU.PointIdx = PS.PointIdx
                where PS.MemIdx = ?	    	
            ) as PSU
                left join ' . $this->_table['order'] . ' as O
                    on PSU.OrderIdx = O.OrderIdx
                left join ' . $this->_table['site'] . ' as S
                    on PSU.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['site_group'] . ' as SG
                    on S.SiteGroupCode = SG.SiteGroupCode and SG.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CR
                    on PSU.ReasonCcd = CR.Ccd and CR.IsStatus = "Y"            
        ';

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$this->session->userdata('mem_idx'), $this->session->userdata('mem_idx')]);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 회원 포인트 조회
     * @param string $point_type [포인트구분, lecture : 강좌, book : 교재, all : 전체]
     * @return mixed
     */
    public function getMemberPoint($point_type = 'all')
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
        $query = $this->_conn->query('select fn_member_point(?, ?) as MemPoint', [$sess_mem_idx, $point_type]);
        $data = $query->row(0)->MemPoint;

        if ($point_type == 'all') {
            $data = json_decode($data, true);

            // 조회되지 않는 포인트 초기화
            $arr_point_type = ['lecture', 'book'];
            foreach ($arr_point_type as $type) {
                if (isset($data[$type]) === false) {
                    $data[$type] = 0;
                } else {
                    // 사용가능포인트가 0 미만일 경우 0으로 설정
                    if ($data[$type] < 0) {
                        $data[$type] = 0;
                    }
                }
            }
        } else {
            // 사용가능포인트가 0 미만일 경우 0으로 설정
            if ($data < 0) {
                $data = 0;
            }
        }

        return $data;
    }

    /**
     * 결제시 사용한 포인트 내역 저장 및 적립 포인트 차감
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $use_point [사용포인트]
     * @param int $site_code [사이트코드]
     * @param int $order_idx [주문식별자]
     * @param int $order_prod_idx [주문상품식별자]
     * @return bool|string
     */
    public function addOrderUsePoint($point_type, $use_point, $site_code, $order_idx, $order_prod_idx)
    {
        $input = [
            'site_code' => $site_code,
            'order_idx' => $order_idx,
            'order_prod_idx' => $order_prod_idx,
            'reason_type' => 'paid'
        ];

        return $this->addUsePoint($point_type, $use_point, $input);
    }

    /**
     * 포인트 사용
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $use_point [사용포인트]
     * @param array $input
     * @return bool|string
     */
    public function addUsePoint($point_type, $use_point, $input = [])
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션

            $data = [
                $sess_mem_idx, element('site_code', $input, 0), $point_type, $use_point,
                element('order_idx', $input, 0), element('order_prod_idx', $input, 0),
                $this->_point_use_reason_ccd[element('reason_type', $input)], element('etc_reason', $input), $this->input->ip_address()
            ];

            $query = $this->_conn->query('call sp_member_point_use(?, ?, ?, ?, ?, ?, ?, ?, null, ?)', $data);
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
     * 결제완료된 주문일 경우 포인트 적립 저장
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $save_point [적립포인트]
     * @param int $site_code [사이트코드]
     * @param int $order_idx [주문식별자]
     * @param int $order_prod_idx [주문상품식별자]
     * @param string $mem_idx [회원식별자]
     * @return array|bool
     */
    public function addOrderSavePoint($point_type, $save_point, $site_code, $order_idx, $order_prod_idx, $mem_idx = '')
    {
        $input = [
            'mem_idx' => $mem_idx,
            'site_code' => $site_code,
            'order_idx' => $order_idx,
            'order_prod_idx' => $order_prod_idx,
            'reason_type' => 'paid',
            'valid_days' => '365'   // 유효기간 1년
        ];

        return $this->addSavePoint($point_type, $save_point, $input);
    }

    /**
     * 포인트 적립
     * @param string $point_type [강좌포인트 : lecture, 교재포인트 : book]
     * @param int $save_point [적립포인트]
     * @param array $input
     * @return array|bool
     */
    public function addSavePoint($point_type, $save_point, $input = [])
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $mem_idx = element('mem_idx', $input);  // 회원 식별자 파라미터
            $mem_idx = empty($mem_idx) === false ? $mem_idx : $sess_mem_idx;
            $valid_days = element('valid_days', $input, 365);   // 기본값 1년

            if (empty($mem_idx) === true) {
                throw new \Exception('회원 식별자가 없습니다.');
            }

            $data = [
                'PointType' => $point_type,
                'MemIdx' => $mem_idx,
                'SiteCode' => element('site_code', $input),
                'OrderIdx' => element('order_idx', $input, 0),
                'OrderProdIdx' => element('order_prod_idx', $input, 0),
                'PointStatusCcd' => $this->_point_status_ccd['save'],
                'SavePoint' => $save_point,
                'RemainPoint' => $save_point,
                'ReasonCcd' => $this->_point_save_reason_ccd[element('reason_type', $input)],
                'EtcReason' => element('etc_reason', $input),
                'RegIp' => $this->input->ip_address()
            ];
            $this->_conn->set($data)->set('ExpireDatm', 'date_add(NOW(), interval ' . ($valid_days - 1) . ' day)', false);

            if ($this->_conn->insert($this->_table['point_save']) === false) {
                throw new \Exception('포인트 적립에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
