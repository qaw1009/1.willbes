<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublisherModel extends WB_Model
{
    private $_table = 'wbs_bms_publisher';

    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 출판사 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listPublisher($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $colum = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $colum = 'P.wPublIdx, P.wPublName, P.wPublManager, concat(P.wPublTel1, "-", P.wPublTel2, "-", P.wPublTel3) as wPublTel, concat(P.wPublPhone1, "-", P.wPublPhone2, "-", P.wPublPhone3) as wPublPhone';
            $colum .= ' , P.wPublDesc, P.wIsUse, P.wRegDatm, P.wRegAdminIdx, A.wAdminName as wRegAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table . ' as P
                left join wbs_sys_admin as A 
                on P.wRegAdminIdx = A.wAdminIdx
            where P.wIsStatus = "Y"  
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 출판사 코드 목록 조회
     * @return array
     */
    public function getPublisherArray()
    {
        $data = $this->_conn->getListResult($this->_table, 'wPublIdx, wPublName', [
            'EQ' => ['wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wPublName' => 'asc'
        ]);

        return array_pluck($data, 'wPublName', 'wPublIdx');
    }

    /**
     * 출판사 조회
     * @param string $colum
     * @param array $arr_condition
     * @return array
     */
    public function findPublisher($colum = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['wIsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table, $colum, $arr_condition);
    }

    /**
     * 출판사 수정 폼에 필요한 데이터 조회
     * @param $publ_idx
     * @return array
     */
    public function findPublisherForModify($publ_idx)
    {
        $colum = 'P.wPublIdx, P.wPublName, P.wPublManager, P.wPublTel1, P.wPublTel2, P.wPublTel3, P.wPublPhone1, P.wPublPhone2, P.wPublPhone3';
        $colum .= ' , P.wPublDesc, P.wIsUse, P.wRegDatm, P.wRegAdminIdx, P.wUpdDatm, P.wUpdAdminIdx';
        $colum .= ' , (select wAdminName from wbs_sys_admin where wAdminIdx = P.wRegAdminIdx) as wRegAdminName';
        $colum .= ' , if(P.wUpdAdminIdx is null, "", (select wAdminName from wbs_sys_admin where wAdminIdx = P.wUpdAdminIdx)) as wUpdAdminName';

        return $this->_conn->getFindResult($this->_table . ' as P', $colum, [
            'EQ' => ['P.wPublIdx' => $publ_idx, 'P.wIsStatus' => 'Y']
        ]);
    }

    /**
     * 출판사 등록
     * @param array $input
     * @return array|bool
     */
    public function addPublisher($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'wPublName' => element('publ_name', $input),
                'wPublManager' => element('publ_manager', $input),
                'wPublTel1' => element('publ_tel1', $input),
                'wPublTel2' => element('publ_tel2', $input),
                'wPublTel3' => element('publ_tel3', $input),
                'wPublPhone1' => element('publ_phone1', $input),
                'wPublPhone2' => element('publ_phone2', $input),
                'wPublPhone3' => element('publ_phone3', $input),
                'wPublDesc' => element('publ_desc', $input),
                'wIsUse' => element('is_use', $input),
                'wRegAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table) === false) {
                throw new \Exception('출판사 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;        
    }

    /**
     * 출판사 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyPublisher($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $publ_idx = element('idx', $input);

            // 기존 출판사 정보 조회
            $row = $this->findPublisherForModify($publ_idx);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 백업 데이터 등록
            $this->addBakData($this->_table, ['wPublIdx' => $publ_idx]);

            $data = [
                'wPublName' => element('publ_name', $input),
                'wPublManager' => element('publ_manager', $input),
                'wPublTel1' => element('publ_tel1', $input),
                'wPublTel2' => element('publ_tel2', $input),
                'wPublTel3' => element('publ_tel3', $input),
                'wPublPhone1' => element('publ_phone1', $input),
                'wPublPhone2' => element('publ_phone2', $input),
                'wPublPhone3' => element('publ_phone3', $input),
                'wPublDesc' => element('publ_desc', $input),
                'wIsUse' => element('is_use', $input),
                'wUpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            if ($this->_conn->set($data)->where('wPublIdx', $publ_idx)->update($this->_table) === false) {
                throw new \Exception('출판사 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
