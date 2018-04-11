<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'course' => 'lms_product_course',
        'admin' => 'wbs_sys_admin'
    ];    

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
        $column = 'PC.CourseIdx, PC.SiteCode, PC.CourseName, PC.OrderNum, PC.IsUse, PC.RegDatm, PC.RegAdminIdx, S.SiteName';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = PC.RegAdminIdx) as RegAdminName';
        $arr_condition['EQ']['PC.IsStatus'] = 'Y';
        $arr_condition['EQ']['S.IsUse'] = 'Y';
        $arr_condition['EQ']['S.IsStatus'] = 'Y';
        $arr_condition['IN']['PC.SiteCode'] = get_auth_site_codes();

        return $this->_conn->getJoinListResult($this->_table['course'] . ' as PC', 'inner', $this->_table['site'] . ' as S', 'PC.SiteCode = S.SiteCode'
            , $column, $arr_condition, $limit, $offset, $order_by
        );
    }

    /**
     * 과정 코드 목록 조회
     * @param string $site_code
     * @return array
     */
    public function getCourseArray($site_code = '')
    {
        $arr_condition = ['EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']];
        if (empty($site_code) === false) {
            $arr_condition['EQ']['SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['SiteCode'] = get_auth_site_codes();
        }

        $data = $this->_conn->getListResult($this->_table['course'], 'SiteCode, CourseIdx, CourseName', $arr_condition, null, null, [
            'SiteCode' => 'asc', 'OrderNum' => 'asc'
        ]);

        return (empty($site_code) === false) ? array_pluck($data, 'CourseName', 'CourseIdx') : $data;
    }

    /**
     * 과정 수정 폼을 위한 데이터 조회
     * @param $course_idx
     * @return array
     */
    public function findCourseForModify($course_idx)
    {
        $column = 'PC.CourseIdx, PC.SiteCode, PC.CourseName, PC.OrderNum, PC.Keyword, PC.IsUse, PC.RegDatm, PC.RegAdminIdx, PC.UpdDatm, PC.UpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = PC.RegAdminIdx) as RegAdminName';
        $column .= ' , if(PC.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = PC.UpdAdminIdx)) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['course'] . ' as PC', $column, [
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
        return $this->_conn->getFindResult($this->_table['course'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
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

            // 과정 등록
            if ($this->_conn->set($data)->insert($this->_table['course']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 과정 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyCourse($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $course_idx = element('idx', $input);

            // 기존 과정 정보 조회
            $row = $this->findCourseForModify($course_idx);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $site_code = $row['SiteCode'];
            $order_num = get_var(element('order_num', $input), $this->getCourseOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'CourseName' => element('course_name', $input),
                'OrderNum' => $order_num,
                'Keyword' => element('keyword', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $admin_idx,
            ];

            // 과정 수정
            if ($this->_conn->set($data)->where('CourseIdx', $course_idx)->update($this->_table['course']) === false) {
                throw new \Exception('과정 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 과정 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyCoursesReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $course_idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $this->session->userdata('admin_idx'))->where('CourseIdx', $course_idx);

                if ($this->_conn->update($this->_table['course']) === false) {
                    throw new \Exception('데이터 수정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
