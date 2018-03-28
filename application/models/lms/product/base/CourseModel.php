<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseModel extends WB_Model
{
    private $_table = 'lms_product_course';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 과정 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listCourse($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $colum = 'PC.CourseIdx, PC.SiteCode, PC.CourseName, PC.OrderNum, PC.IsUse, PC.RegDatm, PC.RegAdminIdx, S.SiteName';
        $colum .= ' , (select wAdminName from wbs_sys_admin where wAdminIdx = PC.RegAdminIdx) as RegAdminName';
        $arr_condition['EQ']['PC.IsStatus'] = 'Y';
        $arr_condition['EQ']['S.IsUse'] = 'Y';
        $arr_condition['EQ']['S.IsStatus'] = 'Y';
        $arr_condition['IN']['PC.SiteCode'] = get_auth_site_codes();

        return $this->_conn->getJoinListResult($this->_table . ' as PC', 'inner', 'lms_site as S', 'PC.SiteCode = S.SiteCode'
            , $colum, $arr_condition, $limit, $offset, $order_by
        );
    }

    /**
     * 과정 수정 폼을 위한 데이터 조회
     * @param $course_idx
     * @return array
     */
    public function findCourseForModify($course_idx)
    {
        $colum = 'PC.CourseIdx, PC.SiteCode, PC.CourseName, PC.OrderNum, PC.Keyword, PC.IsUse, PC.RegDatm, PC.RegAdminIdx, PC.UpdDatm, PC.UpdAdminIdx';
        $colum .= ' , (select wAdminName from wbs_sys_admin where wAdminIdx = PC.RegAdminIdx) as RegAdminName';
        $colum .= ' , if(PC.UpdAdminIdx is null, "", (select wAdminName from wbs_sys_admin where wAdminIdx = PC.UpdAdminIdx)) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table . ' as PC', $colum, [
            'EQ' => ['PC.CourseIdx' => $course_idx]
        ]);
    }

    /**
     * 사이트 코드별 과정 정렬순서 값 조회
     * @param $site_code
     * @return int
     */
    public function getCourseOrderNum($site_code)
    {
        return $this->_conn->getFindResult($this->_table, 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['SiteCode' => $site_code]
        ])['NextOrderNum'];
    }

    /**
     * 과정 등록
     * @param array $input
     * @return array|bool
     */
    public function addCourse($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $site_code = element('site_code', $input);
            $order_num = get_var(element('order_num', $input), $this->getCourseOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SiteCode' => $site_code,
                'CourseName' => element('course_name', $input),
                'OrderNum' => $order_num,
                'Keyword' => element('keyword', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            // 과장 등록
            if ($this->_conn->set($data)->insert($this->_table) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
