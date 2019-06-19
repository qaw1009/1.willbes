<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupportersMemberModel extends WB_Model
{
    private $_table = [
        'supporters' => 'lms_supporters',
        'supporters_r_member' => 'lms_supporters_r_member',
        'lms_member' => 'lms_member',
        'lms_member_otherinfo' => 'lms_member_otherinfo',
        'lms_site' => 'lms_site',
        'wbs_sys_admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listSupportersMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                a.SrmIdx, a.SupportersIdx, a.SiteCode, a.SupportersStatusCcd, a.MemIdx, a.UniversityName, a.Department,
                a.RegDatm, a.RegAdminIdx, a.UpdDatm,
                b.SupportersYear, b.SupportersNumber, b.Title,
                m.MemName, m.MemId,
                c.SiteName, d.wAdminName as RegAdminName,
                fn_ccd_name(a.SerialCcd) AS SerialCcdName,
                fn_ccd_name(a.SchoolYearCcd) AS SchoolYearCcdName,
                fn_ccd_name(a.IsSchoolCcd) AS IsSchoolCcdName,
                "과제수행" as reply, "제안/토론" as board
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = "
            FROM {$this->_table['supporters_r_member']} AS a
            INNER JOIN {$this->_table['supporters']} as b ON a.SupportersIdx = b.SupportersIdx
            INNER JOIN {$this->_table['lms_member']} as m ON a.MemIdx = m.MemIdx
            INNER JOIN {$this->_table['lms_site']} as c ON a.SiteCode = c.SiteCode
            INNER JOIN {$this->_table['wbs_sys_admin']} as d ON a.RegAdminIdx = d.wAdminIdx AND d.wIsStatus='Y'
        ";

        // 사이트 권한 추가
        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'a.SiteCode' => get_auth_site_codes()
            ]
        ]);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 서포터즈 회원 등록
     * @param $input
     * @return array|bool
     */
    public function addSupportersMember($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'a.SiteCode' => element('site_code',$input),
                    'a.SupportersIdx' => element('supporters_idx',$input),
                    'a.MemIdx' => element('mem_idx',$input)
                ]
            ];
            $check = $this->findSupportersMember($arr_condition);
            if(empty($check) === false) {
                throw new \Exception('이미 등록된 회원 정보가 있습니다.');
            }

            $input_data = $this->_inputCommon($input);
            $input_data = array_merge($input_data, [
                'RegAdminIdx'=>$this->session->userdata('admin_idx'),
                'RegIp'=>$this->input->ip_address()
            ]);

            if($this->_conn->set($input_data)->insert($this->_table['supporters_r_member']) === false) {
                throw new \Exception('서포터즈 회원 등록에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 서포터즈 회원 일괄 등록
     * @param array $input
     * @return array|bool
     */
    public function addSupportersMemberGroup($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $arr_mem_idx = element('mem_idx', $input);
            foreach ($arr_mem_idx as $mem_idx) {
                $data = [
                    'site_code' => element('site_code', $input),
                    'supporters_idx' => element('supporters_idx', $input),
                    'supporters_status_ccd' => element('supporters_status_ccd', $input),
                    'mem_idx' => $mem_idx
                ];
                $result = $this->addSupportersMember($data);
                if ($result !== true) {
                    throw new \Exception($result['ret_msg']);
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
     * 서포터즈 회원 수정
     * @param $input
     * @return array|bool
     */
    public function modifySupportersMember($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $srm_idx = element('srm_idx',$input);
            $arr_condition = [
                'EQ' => [
                    'a.SrmIdx' => $srm_idx
                ]
            ];
            $data = $this->findSupportersMember($arr_condition);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            $common_data = $this->_inputCommon($input);
            $input_data = array_merge($common_data, [
                'UpdAdminIdx'=>$this->session->userdata('admin_idx')
            ]);

            if ($this->_conn->set($input_data)->where('SrmIdx', $srm_idx)->update($this->_table['supporters_r_member']) === false) {
                throw new \Exception('서포터즈 회원 정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 서포터즈 회원 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    public function findSupportersMember($arr_condition, $column = 'a.SupportersIdx')
    {
        $from = "
            FROM {$this->_table['supporters_r_member']} as a
            INNER JOIN {$this->_table['supporters']} as s ON a.SupportersIdx = s.SupportersIdx
            INNER JOIN {$this->_table['lms_site']} as b ON a.SiteCode = b.SiteCode
            INNER JOIN {$this->_table['lms_member']} as m ON a.MemIdx = m.MemIdx
            INNER JOIN {$this->_table['lms_member_otherinfo']} as mo ON m.MemIdx = mo.MemIdx
            INNER JOIN {$this->_table['wbs_sys_admin']} as c ON a.RegAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
            LEFT JOIN {$this->_table['wbs_sys_admin']} as d ON a.UpdAdminIdx = d.wAdminIdx AND d.wIsStatus='Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 인풋항목 공통처리
     * @param array $input
     * @return array
     */
    private function _inputCommon($input = [])
    {
        $input_data = [
            'SiteCode' => element('site_code',$input),
            'SupportersIdx' => element('supporters_idx',$input),
            'MemIdx' => element('mem_idx',$input),
            'SupportersStatusCcd' => element('supporters_status_ccd',$input),
            'SerialCcd' => element('serial_ccd',$input),
            'UniversityName' => element('university_name',$input),
            'Department' => element('department',$input),
            'SchoolYearCcd' => element('school_year_ccd',$input),
            'IsSchoolCcd' => element('is_school_ccd',$input),
            'ExamPeriodCcd' => element('exam_period_ccd',$input),
            'ExamCount' => element('exam_count',$input),
            'Content1' => element('content_1',$input),
            'Content2' => element('content_2',$input),
            'Content3' => element('content_3',$input),
            'Content4' => element('content_4',$input),
            'Content5' => element('content_5',$input)
        ];
        return $input_data;
    }
}