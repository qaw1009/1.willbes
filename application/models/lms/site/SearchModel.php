<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel  extends WB_Model
{
    private $_table = [
        'search_log' => 'lms_search_log',
        'site' => 'lms_site',
        'category' => 'lms_sys_category',
        'member' => 'lms_member',
        'willbes_ip' => 'lms_willbes_ip',
        'search_word_setup' => 'lms_search_word_setup',
        'search_word_auto_except' => 'lms_search_word_auto_except',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listWord($is_count, $arr_condition=[], $limit = null, $offset = null, $order_by=[])
    {

        if($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column ='A.* 
                        ,B.SiteName
                        ,C.CateName
                        ,D.wAdminName as RegAdminName
                        ,E.wAdminName as UpdAdminName
                        ,(Select Count(*) from '.$this->_table['search_log'].' Where EtcInfo = A.SwIdx) as Click_Cnt';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from 
                        '.$this->_table['search_word_setup'].' A
                        join '.$this->_table['site'].'  B on A.SiteCode = B.SiteCode
                        left outer join '.$this->_table['category'].'  C on A.CateCode = C.CateCode
                        left outer join '.$this->_table['admin'].'  D on A.RegAdminIdx = D.wAdminIdx
                        left outer join '.$this->_table['admin'].' E on A.UpdAdminIdx = E.wAdminIdx
                    where A.IsStatus=\'Y\'
        ';

        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'A.SiteCode' => get_auth_site_codes(false,true,false)
            ]
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query('select '. $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function addWord($input=[])
    {
        $this->_conn->trans_begin();
        try{

            $input_data = array_merge($this->_inputCommon($input), [
                'SiteCode'=>element('SiteCode',$input),
                'RegAdminIdx'=>$this->session->userdata('admin_idx')
                ,'RegIp'=>$this->input->ip_address()
            ]);

            if($this->_conn->set($input_data)->insert($this->_table['search_word_setup']) === false) {
                throw new \Exception('검색어 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    public function modifyWord($input=[])
    {
        $this->_conn->trans_begin();
        try{
            $SwIdx = element('SwIdx',$input);

            $input_data = array_merge($this->_inputCommon($input), [
                'UpdAdminIdx'=>$this->session->userdata('admin_idx'),
            ]);

            if ($this->_conn->set($input_data)->set('UpdDatm', 'NOW()', false)->where('SwIdx', $SwIdx)->update($this->_table['search_word_setup']) === false) {
                throw new \Exception('검색어 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    private function _inputCommon($input=[])
    {
        $input_data = [
            'CateCode' => element('CateCode',$input,0)
            ,'SearchWord' => element('SearchWord',$input)
            ,'StartDate' => element('StartDate',$input)
            ,'EndDate' => element('EndDate',$input)
            ,'TargetType' => element('TargetType',$input,'S')
            ,'TargetUrl' => element('TargetUrl',$input)
            ,'TargetOpen' => element('TargetOpen',$input,'_self')
            ,'OrderNum' => element('OrderNum',$input,'0')
            ,'IsUse' => element('IsUse',$input,'Y')
        ];
        return $input_data;
    }

    public function modifyByColumn($params=[])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $SwIdx => $columns) {
                $this->_conn->set($columns)->set('UpdAdminIdx', $this->session->userdata('admin_idx'))->set('UpdDatm', 'NOW()', false)->where('SwIdx', $SwIdx);

                if ($this->_conn->update($this->_table['search_word_setup']) === false) {
                    throw new \Exception('정보 수정에 실패했습니다.');
                }
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    public function modifyByOrder($params=[])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $SwIdx => $order_num) {
                $this->_conn->set('OrderNum',$order_num )->set('UpdDatm', 'NOW()', false)->where('SwIdx', $SwIdx);

                if ($this->_conn->update($this->_table['search_word_setup']) === false) {
                    throw new \Exception('정렬 정보 수정에 실패했습니다.');
                }
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    public function listWordExcept($is_count, $arr_condition=[], $limit = null, $offset = null, $order_by=[])
    {
        if($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column ='A.* 
                        ,B.SiteName
                        ,D.wAdminName as RegAdminName
                        ,E.wAdminName as UpdAdminName
                        ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from 
                        '.$this->_table['search_word_auto_except'].' A
                        join '.$this->_table['site'].'  B on A.SiteCode = B.SiteCode
                        left outer join '.$this->_table['admin'].'  D on A.RegAdminIdx = D.wAdminIdx
                        left outer join '.$this->_table['admin'].' E on A.UpdAdminIdx = E.wAdminIdx
                    where A.IsStatus=\'Y\'
        ';

        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'A.SiteCode' => get_auth_site_codes(false,true,false)
            ]
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query('select '. $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function addWordExcept($input=[])
    {
        $this->_conn->trans_begin();
        try{

            $input_data = [
                'SiteCode'=>element('SiteCode',$input)
                ,'ExceptType' => element('ExceptType',$input)
                ,'ExceptWord' => element('ExceptWord',$input)
                ,'RegAdminIdx'=>$this->session->userdata('admin_idx')
            ];

            if($this->_conn->set($input_data)->insert($this->_table['search_word_auto_except']) === false) {
                throw new \Exception('예외 단어 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    public function deleteWordExcept($input=[])
    {

        $this->_conn->trans_begin();
        try{
            $SwaeIdx = element('SwaeIdx',$input);
            $input_data = [
                'IsStatus' => 'N'
                ,'UpdAdminIdx'=>$this->session->userdata('admin_idx')
            ];

            if ($this->_conn->set($input_data)->where('SwaeIdx', $SwaeIdx)->update($this->_table['search_word_auto_except']) === false) {
                throw new \Exception('예외 단어 삭제에 실패했습니다.');
            }
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

}