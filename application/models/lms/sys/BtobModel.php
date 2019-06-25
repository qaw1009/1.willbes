<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'btob' => 'lms_btob',
        'ip' => 'lms_btob_ip',
        'log' => 'lms_btob_access_log',
        'btob_member' => 'lms_btob_r_member',
        'member' => 'lms_member',
        'meminfo' => 'lms_member_otherinfo',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴사(회사) 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCompany($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'A.BtobIdx, A.BtobId, A.BtobName, A.ManagerName, A.Tel1, fn_dec(A.Tel2Enc) as Tel2, A.Tel3, A.IsUse
                           ,fn_dec(EmailEnc) as Email, ReferDomains, A.RegDatm, A.`Desc`, A.IpControlTypeCcds, D.wAdminName as RegAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from '.$this->_table['btob'].' A
	                        left outer join wbs_sys_admin D on A.RegAdminIdx = D.wAdminIdx and D.wIsStatus=\'Y\' 
                    where A.IsStatus=\'Y\' ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by_offset_limit);
        //var_dump($result);exit;
        //echo $this->_conn->last_query();
        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 정보 추출
     * @param $compidx
     * @return mixed
     */
    public function findCompanyForModify($compidx)
    {

        $column = 'BtobIdx, BtobId, BtobName, ManagerName, Phone1, fn_dec(Phone2Enc) as Phone2, Phone3, Tel1, fn_dec(Tel2Enc) as Tel2, Tel3
                        ,fn_dec(EmailEnc) as Email, ReferDomains, `Desc`, IpControlTypeCcds, A.ReturnUrl, A.IsUse, A.RegDatm, A.RegIp, A.UpdDatm
                        ,C.wAdminName as RegAdminName 
                        ,D.wAdminName as UpdAdminName ';
        $from = '
                    from '.$this->_table['btob'].' A
                        left outer join wbs_sys_admin C on A.RegAdminIdx = C.wAdminIdx and C.wIsStatus=\'Y\' 
                        left outer join wbs_sys_admin D on A.UpdAdminIdx = D.wAdminIdx and D.wIsStatus=\'Y\'
                    where A.IsStatus=\'Y\' ';
        $where = $this->_conn->makeWhere(['EQ'=>['A.BtobIdx'=>$compidx]])->getMakeWhere(true);

        $result = $this->_conn->query('select ' .$column .$from .$where)->row_array();
        //echo 'select ' .$column .$from .$where;
        return $result;

    }

    /**
     * 제휴사(회사) 코드 목록 조회
     * @return array
     */
    public function getCompanyArray()
    {
        $arr_condition = ['EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']];
        $data = $this->_conn->getListResult($this->_table['btob'], 'BtobIdx, BtobName' ,$arr_condition, null, null, [
            'BtobIdx' => 'asc'
        ]);

        return array_pluck($data, 'BtobName', 'BtobIdx');
    }

    /**
     * 입력
     * @param array $input
     * @return array|bool
     */
    public function addCompany($input=[])
    {
        $this->_conn->trans_begin();

        try {
            $btob_id = element('BtobId',$input);

            $chk_row = $this->_conn->getFindResult($this->_table['btob'], 'BtobId', ['EQ' => ['BtobId' => $btob_id]]);
            if (empty($chk_row) === false) {
                throw new \Exception('동일한 제휴사 아이디가 존재합니다.');
            }

            $input_data = $this->inputCommon($input);

            $input_data = array_merge($input_data,[
                'BtobId'=>$btob_id
                ,'RegAdminIdx'=>$this->session->userdata('admin_idx')
                ,'RegIp'=>$this->input->ip_address()
            ]);

            $this->_conn->set($input_data)
                ->set('Tel2Enc',  'fn_enc("' . element('Tel2', $input) . '")',false)
                ->set('Phone2Enc',  'fn_enc("' . element('Phone2', $input) . '")',false)
                ->set('EmailEnc',  'fn_enc("' . element('Email', $input) . '")',false);

            if($this->_conn->insert($this->_table['btob']) === false) {
                throw new \Exception('제휴사 등록에 실패했습니다.');
            };

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyCompany($input=[])
    {
        $this->_conn->trans_begin();

        try {
            $btobidx = element('btobidx',$input);

            $input_data = $this->inputCommon($input);

            $input_data = array_merge($input_data,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            $this->_conn->set($input_data)
                ->set('Tel2Enc',  'fn_enc("' . element('Tel2', $input) . '")',false)
                ->set('Phone2Enc',  'fn_enc("' . element('Phone2', $input) . '")',false)
                ->set('EmailEnc',  'fn_enc("' . element('Email', $input) . '")',false);

            if ($this->_conn->where('BtobIdx', $btobidx)->update($this->_table['btob']) === false) {
                throw new \Exception('정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
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
    public function inputCommon($input=[])
    {

        //테이블 입력
        $input_product = [
            'BtobName'=>element('BtobName',$input)
            ,'ManagerName'=>element('ManagerName',$input)
            ,'Phone1'=>element('Phone1',$input)
            ,'Phone3'=>element('Phone3',$input)
            ,'Tel1'=>element('Tel1',$input)
            ,'Tel3'=>element('Tel3',$input)
            ,'ReferDomains'=>element('ReferDomains',$input)
            ,'Desc' => element('Desc',$input)
            ,'IpControlTypeCcds' => implode(',',element('IpControlTypeCcds',$input))
            ,'ReturnUrl' => element('ReturnUrl',$input)
            ,'IsUse'=>element('IsUse',$input)
        ];

        return $input_product;
    }


    /**
     * IP  등록
     * @param array $input
     * @return array|bool
     */
    public function addIp($input=[])
    {
        try {
            //테이블 입력
            $input_data = [
                'BtobIdx' => element('btobidx', $input)
                , 'ApprovalIp' => element('ApprovalIp', $input)
                , 'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->set($input_data)->insert($this->_table['ip']) === false) {
                throw new \Exception('IP 등록에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * IP삭제
     * @param array $input
     * @return array|bool
     */
    public function deleteIp($input=[])
    {
        try {

            $btobidx = element('btobidx', $input);
            $biIdx = element('biIdx', $input);

            $input_data = [
                 'IsStatus' => 'N'
                , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($input_data)->where([
                'BtobIdx' => $btobidx,
                'BiIdx' => $biIdx
            ]);

            if ($this->_conn->update($this->_table['ip']) === false) {
                throw new \Exception('IP 삭제에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }


    /**
     * 등록 IP 목록 추출
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listIp($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = ' straight_join A.*,B.wAdminName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from '.$this->_table['ip'].' A
	                        left outer join wbs_sys_admin B on A.RegAdminIdx = B.wAdminIdx
                    where A.IsStatus=\'Y\' ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by_offset_limit);
        //var_dump($result);exit;
        //echo $this->_conn->last_query();
        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();

    }


    /**
     * 접속 목록 추출
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listLog($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = ' straight_join A.*,B.BtobIdx,B.BtobName,C.SiteName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        '.$this->_table['log'].' A
                        join '.$this->_table['btob'].' B on A.BtobIdx = B.BtobIdx
                        join '.$this->_table['site'].' C on A.SiteCode = C.SiteCode 
                    where B.IsStatus=\'Y\'
                    ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by_offset_limit);
        //var_dump($result);exit;
        //echo $this->_conn->last_query();
        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();

    }


    /**
     *  CP 사용자 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCpMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = ' B.BtobIdx,
                R.*,
                A.wAdminName AS AdminName,
                A2.wAdminName AS delAdminName,
                M.MemName, M.MemId, fn_dec(M.PhoneEnc) AS Phone
             ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['btob']} AS B
                    JOIN {$this->_table['btob_member']} AS R ON B.BtobIdx = R.BtobIdx
                    JOIN {$this->_table['member']} AS M ON R.MemIdx = M.MemIdx
                    JOIN {$this->_table['meminfo']} AS I ON M.MemIdx = I.Memidx
                    LEFT JOIN {$this->_table['admin']} AS A ON R.RegAdminIdx = A.wAdminIdx
                    LEFT JOIN {$this->_table['admin']} AS A2 ON R.UpdAdminIdx = A2.wAdminIdx
                    ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $result = $this->_conn->query('SELECT '. $column .$from .$where. $order_by_offset_limit);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    public function deleteCpMember($input)
    {
        try {
            $btobidx = element('BtobIdx', $input);
            $bmidx = element('BmIdx', $input);

            $input_data = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->
                set('UpdDatm', 'NOW()', false)->
                set($input_data)->
                where([
                'BtobIdx' => $btobidx,
                'BmIdx' => $bmidx
                ])->update($this->_table['btob_member']) === false) {
                throw new \Exception('제휴사 회원 삭제에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    public function addCpMember($input)
    {
        try {
            //테이블 입력
            $input_data = [
                'BtobIdx' => element('BtobIdx', $input),
                'MemIdx' => element('MemIdx', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->
                set('RegDatm', 'NOW()', false)->
                set($input_data)->
                insert($this->_table['btob_member']) === false) {
                throw new \Exception('회원등록에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

}