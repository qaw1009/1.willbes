<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermsModel extends WB_Model
{
    public $_content_types = [
        '0' => 'A',     //이용약관
        '1' => 'P'      //개인정보처리방침
    ];
    private $_table = [
        'terms' => 'lms_site_use_personal',
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllTerms($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.SupIdx, A.Title, A.ContentType, A.IsUse,
            A.ApplayStartDatm, A.ApplayEndDatm, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx,
            B.wAdminName AS RegAdminName, C.wAdminName AS UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['terms']} AS A
            INNER JOIN {$this->_table['admin']} AS B ON A.RegAdminIdx = B.wAdminIdx AND B.wIsStatus='Y'
            LEFT JOIN {$this->_table['admin']} AS C ON A.UpdAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 약관 간편 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findTerms($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['terms'], $column, $arr_condition);
    }

    /**
     * 약관 수정을 위한 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findTermsForModify($arr_condition)
    {
        $column = "            
            A.SupIdx, A.SiteCode, B.SiteName, A.Title, A.Content, A.ContentType, A.LinkUrl, A.IsUse, A.IsStatus, A.Desc,
            A.ApplayStartDatm, A.ApplayEndDatm,
            DATE_FORMAT(A.ApplayStartDatm, '%Y-%m-%d') AS ApplayStartDay, DATE_FORMAT(A.ApplayStartDatm, '%H') AS ApplayStartHour,
            DATE_FORMAT(A.ApplayEndDatm, '%Y-%m-%d') AS ApplayEndDay, DATE_FORMAT(A.ApplayEndDatm, '%H') AS ApplayEndHour,
            A.RegIp, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['terms']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 등록
     * @param array $input
     * @return array|bool
     */
    public function addTerms($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            if (empty(element('applay_start_day', $input)) === true) {
                $applay_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $applay_start_datm = element('applay_start_day', $input) . ' ' . element('applay_start_hour', $input) . ':00:00';
            }

            if (empty(element('applay_end_day', $input)) === true) {
                $applay_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $applay_end_datm = element('applay_end_day', $input) . ' ' . element('applay_end_hour', $input) . ':00:00';
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'Title' => element('title', $input),
                'ContentType' => element('content_type', $input),
                'Content' => element('content', $input),
                'LinkUrl' => element('link_url', $input),
                'Desc' => element('desc', $input),
                'ApplayStartDatm' => $applay_start_datm,
                'ApplayEndDatm' => $applay_end_datm,
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['terms']) === false) {
                throw new \Exception('랜딩페이지 등록에 실패했습니다.');
            }

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
    public function modifyTerms($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $sup_idx = element('sup_idx', $input);

            // 약관 간편 조회
            $row = $this->findTerms('SupIdx', ['EQ' => ['SupIdx' => $sup_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            if (empty(element('applay_start_day', $input)) === true) {
                $applay_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $applay_start_datm = element('applay_start_day', $input) . ' ' . element('applay_start_hour', $input) . ':00:00';
            }

            if (empty(element('applay_end_day', $input)) === true) {
                $applay_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $applay_end_datm = element('applay_end_day', $input) . ' ' . element('applay_end_hour', $input) . ':00:00';
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'Title' => element('title', $input),
                'ContentType' => element('content_type', $input),
                'Content' => element('content', $input),
                'LinkUrl' => element('link_url', $input),
                'Desc' => element('desc', $input),
                'ApplayStartDatm' => $applay_start_datm,
                'ApplayEndDatm' => $applay_end_datm,
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($this->_conn->set($data)->where('SupIdx', $sup_idx)->update($this->_table['terms']) === false) {
                throw new \Exception('랜딩페이지 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}