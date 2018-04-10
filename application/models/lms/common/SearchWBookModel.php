<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchWBookModel extends WB_Model
{
    private $_table = [
        'book' => 'vw_wbs_bms_book_list',
        'code' => 'wbs_sys_code',
        'admin' => 'wbs_sys_admin'
    ];
    private $_ccd = [
        'Edition' => '113',
        'Sale' => '112'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * WBS 교재 기본정보 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listSearchBook($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $colum = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $colum = '
                B.wBookIdx, B.wBookName, B.wPublIdx, B.wPublName, B.wPublDate, B.wIsbn, B.wPageCnt, B.wEditionCcd, B.wEditionCnt, B.wEditionSize
                    , B.wPrintCnt, B.wOrgPrice, B.wStockCnt, B.wSaleCcd, B.wBookDesc, B.wAuthorDesc, B.wTableDesc
		            , B.wAttachImgPath, B.wAttachImgName, B.wRegDatm, B.wRegAdminIdx, B.wAuthorNames
                    , CE.wCcdName as wEditionCcdName, CS.wCcdName as wSaleCcdName, A.wAdminName as wRegAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['book'] . ' as B
                left join ' . $this->_table['code'] . ' as CE
                    on B.wEditionCcd = CE.wCcd and CE.wGroupCcd = "' . $this->_ccd['Edition']. '" and CE.wIsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CS
                    on B.wSaleCcd = CS.wCcd and CS.wGroupCcd = "' . $this->_ccd['Sale']. '" and CS.wIsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as A 
                    on B.wRegAdminIdx = A.wAdminIdx                                                             
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
