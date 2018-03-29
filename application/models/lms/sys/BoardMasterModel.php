<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardMasterModel extends WB_Model
{
    private $_table = 'lms_sys_board_master';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 게시판생성관리 리스트
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllBoardMaster($arr_condition = [])
    {
        $column = 'A.BmIDX, A.BmName, A.BmTypeCcd, A.BmDesc, A.OneWayOption, A.TwoWayOption ,A.IsUse, A.IsSiteGroup, A.RegDatm, B.wAdminName';
        $from = '
                    From ' . $this->_table . ' A
	                    LEFT OUTER JOIN wbs_sys_admin B ON A.RegAdminIdx = B.wAdminIdx and B.wIsStatus="Y" ';

        /*$where = $this->_conn->makeWhere([
            'EQ'=>['A.wIsStatus'=>'Y']
        ])->getMakeWhere(false);*/
        $where = '';

        $order_by = $this->_conn->makeOrderBy(['A.BmIDX' => 'asc'])->getMakeOrderBy();

        return $this->_conn->query('Select ' . $column . $from . $where . $order_by)->result_array();
    }

    public function findBoardMasterForModify($bmidx)
    {
        $column = 'A.BmIDX, A.BmName, A.BmTypeCcd, A.BmDesc, A.OneWayOption, A.TwoWayOption ,A.IsUse, A.IsSiteGroup, A.RegDatm, A.UpdDatm';
        $column .= ', B.wAdminName, C.wAdminName As wUpdAdminName';

        $from = ' From '.$this->_table.' A 
                        LEFT OUTER JOIN wbs_sys_admin B ON A.RegAdminIdx = B.wAdminIdx And B.wIsStatus="Y"
                        LEFT OUTER JOIN wbs_sys_admin C ON A.UpdAdminIdx = C.wAdminIdx And C.wIsStatus="Y"
                    ';
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'A.BmIDX' => $bmidx
            ]
        ]);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' .$column .$from .$where)->row_array();
    }

    /**
     * 게시판생성관리 등록
     * @param array $input
     * @return array|bool
     */
    public function addBoardMaster($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $data = $this->inputCommon($input);
            $data = array_merge($data,[
                'RegAdminIdx'=> $this->session->userdata('admin_idx')
            ]);

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table) === false) {
                throw new \Exception('게시판관리 등록에 실패했습니다.');
            }
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    public function modifyBoardMaster($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $bmidx = element('bm_idx',$input);

            $data = $this->inputCommon($input);
            $data = array_merge($data,[
                'UpdAdminIdx'=> $this->session->userdata('admin_idx')
            ]);
            $this->_conn->set($data)->where('BmIDX', $bmidx);

            if($this->_conn->update($this->_table) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
            //echo $this->_conn->last_query();
            //exit;

        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * DB입력을 위한 INPUT 값 처리
     * @param array $input
     * @return array
     */
    private function inputCommon($input=[])
    {
        $one_way_options = '';
        if (!empty($input['one_way_option'])) {
            foreach ($input['one_way_option'] as $key => $val) {
                $one_way_options .= $val . ',';
            }
            $one_way_options = substr($one_way_options, 0, -1);
        }

        $two_way_options = '';
        if (!empty($input['two_way_option'])) {
            foreach ($input['two_way_option'] as $key => $val) {
                $two_way_options .= $val . ',';
            }
            $two_way_options = substr($two_way_options, 0, -1);
        }

        $is_site_group = 'N';
        if (element('is_site_group', $input) == 'Y') {
            $is_site_group = element('is_site_group', $input);
        }

        $input_data = [
            'BmTypeCcd' => element('bm_type_ccd', $input),
            'BmName' => element('bm_name', $input),
            'BmDesc' => element('bm_desc', $input),
            'OneWayOption' => $one_way_options,
            'TwoWayOption' => $two_way_options,
            'IsUse' => element('is_use', $input),
            'IsSiteGroup' => $is_site_group
        ];

        return $input_data;
    }
}