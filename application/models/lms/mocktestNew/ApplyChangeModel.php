<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplyChangeModel extends WB_Model
{
    private $_table = [
        'lms_product' => 'lms_product'
        ,'lms_product_mock' => 'lms_product_mock'
        ,'lms_mock_register' => 'lms_mock_register'
        ,'lms_mock_register_changelog' => 'lms_mock_register_changelog'
        ,'lms_mock_register_changelog_r_detail' => 'lms_mock_register_changelog_r_detail'
        ,'lms_Order' => 'lms_Order'
        ,'lms_Order_Product' => 'lms_Order_Product'
        ,'lms_member' => 'lms_member'
        ,'wbs_sys_admin' => 'wbs_sys_admin'
        ,'lms_sys_code' => 'lms_sys_code'
    ];
    private $_arr_TakeForm = ['690001', '690002'];  //응시형태(온라인,오프라인)

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function logList($is_count = false, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            $column = "
                rl.LogIdx,rl.ProdCode,rl.RegAdminIdx, rl.RegDatm,p.ProdName, a.wAdminName AS RegAdminName
                ,(SELECT COUNT(*) FROM {$this->_table['lms_mock_register_changelog_r_detail']} AS rld WHERE rld.LogIdx = rl.LogIdx) AS cntIsRestore
                ,(SELECT COUNT(*) FROM {$this->_table['lms_mock_register_changelog_r_detail']} AS rld WHERE rld.LogIdx = rl.LogIdx AND rld.IsRestore = 'Y') AS cntIsRestore_Y
            ";
        }
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['lms_mock_register_changelog']} AS rl
            INNER JOIN {$this->_table['lms_product']} AS p ON rl.ProdCode = p.ProdCode
            LEFT JOIN {$this->_table['wbs_sys_admin']} AS a ON rl.RegAdminIdx = a.wAdminIdx
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 로그 상세 리스트
     * @param false $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function logListDetail($is_count = false, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
            $column = '
                rld.LogDetailIdx, rld.MrIdx, o.OrderNo, mr.TakeNumber, m.MemName, m.MemId, rld.TakeForm, rld.TakeArea, sc1.CcdName AS TakeFormName, sc2.CcdName AS TakeAreaName, rld.IsRestore
            ';
        }
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $from = "
            FROM {$this->_table['lms_mock_register_changelog_r_detail']} AS rld
            INNER JOIN {$this->_table['lms_mock_register']} AS mr ON rld.MrIdx = mr.MrIdx
            INNER JOIN {$this->_table['lms_Order_Product']} AS op ON op.OrderProdIdx = mr.OrderProdIdx
            INNER JOIN {$this->_table['lms_Order']} AS o ON op.OrderIdx = o.OrderIdx
            INNER JOIN {$this->_table['lms_product']} AS p ON p.ProdCode = mr.ProdCode
            INNER JOIN {$this->_table['lms_member']} AS m ON m.MemIdx = mr.MemIdx
            INNER JOIN {$this->_table['lms_sys_code']} AS sc1 ON rld.TakeForm = sc1.Ccd
            INNER JOIN {$this->_table['lms_sys_code']} AS sc2 ON rld.TakeArea = sc2.Ccd
        ";
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 복구
     * @param array $params
     * @return array|bool
     */
    public function updateForLogDetail($params = [])
    {
        $this->_conn->trans_begin();
        try {
            $log_detail_idx = element('log_detail_idx', $params);
            $mr_idx = element('mr_idx', $params);

            $arr_condition = [
                'EQ' => [
                    'rld.LogDetailIdx' => $log_detail_idx,
                    'rld.IsRestore' => 'N'
                ]
            ];
            $column = "rld.MrIdx,rld.TakeMockPart,rld.TakeForm,rld.TakeArea,DATE_FORMAT(pm.TakeStartDatm,'%Y%m%d%H%i') AS TakeStartDatm";
            $from = "
                FROM lms_mock_register_changelog_r_detail AS rld
                INNER JOIN lms_mock_register AS mr ON rld.MrIdx = mr.MrIdx
                INNER JOIN lms_product_mock AS pm ON mr.ProdCode = pm.ProdCode
            ";
            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
            $back_data = $this->_conn->query('select ' . $column . $from . $where)->row_array();

            if (empty($back_data) === true) {
                throw new \Exception('조회된 데이터가 없습니다.');
            }

            if ($back_data['TakeStartDatm'] <= date('YmdHi')) {
                throw new \Exception('응시시작일이 지난 모의고사 상품은 복구할 수 없습니다.');
            }

            //로그상세테이블 수정
            $where = [
                'LogDetailIdx' => $log_detail_idx,
                'MrIdx' => $mr_idx
            ];
            $this->_conn->set(['IsRestore' => 'Y'])->where($where);
            if ($this->_conn->update($this->_table['lms_mock_register_changelog_r_detail']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            //접수테이블 수정
            $data = [
                'TakeForm' => $back_data['TakeForm'],
                'TakeArea' => $back_data['TakeArea']
            ];
            $where = [
                'MrIdx' => $mr_idx
            ];
            $this->_conn->set($data)->where($where);
            if ($this->_conn->update($this->_table['lms_mock_register']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 엑셀데이터 저장, 로그저장
     * 응시형태 변경
     * @param $params
     * @param array $input_data
     * @return array|bool
     */
    public function excelDataUpload($params, $input_data = [])
    {
        $this->_conn->trans_begin();
        try {
            //모의고사 상품 조회
            $arr_condition = [
                'EQ' => [
                    'a.ProdCode' => element('prod_code', $params),
                    'a.ProdTypeCcd' => '636010'
                ]
            ];
            $column = "a.ProdCode, DATE_FORMAT(b.TakeStartDatm,'%Y%m%d%H%i') AS TakeStartDatm";
            $from = "
                FROM {$this->_table['lms_product']} as a
                INNER JOIN {$this->_table['lms_product_mock']} as b ON a.ProdCode = b.ProdCode
            ";
            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
            $result = $this->_conn->query('select ' . $column . $from . $where)->row_array();
            if (empty($result) === true) {
                throw new \Exception('조회된 모의고사 상품이 없습니다.');
            }

            if ($result['TakeStartDatm'] <= date('YmdHi')) {
                throw new \Exception('응시시작일이 지난 모의고사 상품입니다.');
            }

            $add_condition = [];
            foreach ($input_data as $row) {
                if (empty($row['A']) === false) {
                    $add_condition[] = $row['A'];
                }
            }
            if (empty($add_condition) === true) {throw new \Exception('변경할 정보가 없습니다. 파일을 다시 확인해주세요.');}
            $arr_condition = [
                'EQ' => [
                    'ProdCode' => element('prod_code', $params),
                    'TakeForm' => $this->_arr_TakeForm[1]
                ],
                'IN' => [
                    'MrIdx' => $add_condition
                ]
            ];
            $column = "MrIdx, TakeMockPart, TakeForm, TakeArea";
            $from = " FROM {$this->_table['lms_mock_register']} ";
            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
            $backup_data = $this->_conn->query('select ' . $column . $from . $where)->result_array();
            if (empty($backup_data) === true) {
                throw new \Exception('변경할 회원 정보가 없습니다.');
            }

            //변경할 상품정보 저장 (백업로그)
            $addData = [
                'ProdCode' => $result['ProdCode']
                ,'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];
            if ($this->_conn->set($addData)->set('RegDatm', 'NOW()', false)->insert($this->_table['lms_mock_register_changelog']) === false) {
                throw new \Exception('로그 데이터 등록에 실패했습니다.');
            }
            $idx = $this->_conn->insert_id();

            //변경할 데이터 백업
            $addData = []; $i=0; $arr_mr_idx = [];
            foreach ($backup_data as $row) {
                $arr_mr_idx[] = $row['MrIdx'];
                $addData[$i]['LogIdx'] = $idx;
                $addData[$i]['MrIdx'] = $row['MrIdx'];
                $addData[$i]['TakeMockPart'] = $row['TakeMockPart'];
                $addData[$i]['TakeForm'] = $row['TakeForm'];
                $addData[$i]['TakeArea'] = $row['TakeArea'];
                $addData[$i]['IsRestore'] = 'N';
                $i++;
            }

            if ($this->_conn->insert_batch($this->_table['lms_mock_register_changelog_r_detail'], $addData) === false) {
                throw new \Exception('로그 데이터 등록에 실패했습니다.');
            }

            //변경 (offline -> online)
            $target_data = [
                'TakeForm' => $this->_arr_TakeForm[0]
                ,'TakeArea' => ''
            ];
            $this->_conn->set($target_data)->where_in('MrIdx', $arr_mr_idx);
            if ($this->_conn->update($this->_table['lms_mock_register']) === false) {
                throw new \Exception('정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}