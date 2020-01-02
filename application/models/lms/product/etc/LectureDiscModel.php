<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LectureDiscModel extends WB_Model
{
    private $_table = [
        'product_lecture_disc' => 'lms_product_lecture_disc',
        'product_lecture_disc_info' => 'lms_product_lecture_disc_info',
        'site' => 'lms_site',
        'category' => 'lms_sys_category',
        'course' => 'lms_product_course',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 강좌할인율 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param int $limit
     * @param int $offset
     * @param array $order_by
     * @return int|array
     */
    public function listLectureDisc($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'PDC.DiscIdx, PDC.DiscTitle, PDC.SiteCode, PDC.CateCode, PDC.CourseIdx, PDC.IsUse, PDC.RegAdminIdx, PDC.RegDatm
                , S.SiteName, C.CateName, PC.CourseName, A.wAdminName as RegAdminName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['product_lecture_disc'] . ' as PDC
                left join ' . $this->_table['site'] . ' as S
                    on PDC.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['category'] . ' as C
                    on PDC.CateCode = C.CateCode and C.IsStatus = "Y"
                left join ' . $this->_table['course'] . ' as PC
                    on PDC.CourseIdx = PC.CourseIdx and PC.IsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as A
                    on PDC.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where PDC.IsStatus = "Y"            
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 강좌할인율 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findLectureDisc($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['product_lecture_disc'], $column, $arr_condition);
    }

    /**
     * 강좌할인율 정보 수정 폼에 필요한 데이터 조회
     * @param $disc_idx
     * @param bool $is_admin_info
     * @return mixed
     */
    public function findLectureDiscByDiscIdx($disc_idx, $is_admin_info = false)
    {
        $column = 'PDC.DiscIdx, PDC.DiscTitle, PDC.SiteCode, PDC.CateCode, PDC.CourseIdx, PDC.IsUse, PDC.RegAdminIdx, PDC.RegDatm, PDC.UpdDatm, PDC.UpdAdminIdx
            , S.IsCampus, C.CateName';

        if ($is_admin_info === true) {
            $column .= ', (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = PDC.RegAdminIdx and wIsStatus = "Y") as RegAdminName
            , if(PDC.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = PDC.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';
        }

        $from = '
            from ' . $this->_table['product_lecture_disc'] . ' as PDC
                left join ' . $this->_table['site'] . ' as S
                    on PDC.SiteCode = S.SiteCode and S.IsStatus = "Y"            
                left join ' . $this->_table['category'] . ' as C
                    on PDC.CateCode = C.CateCode and C.IsStatus = "Y"
        ';

        $where = 'where PDC.DiscIdx = ? and PDC.IsStatus = "Y"';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where, [$disc_idx])->row_array();
    }

    /**
     * 강좌할인율 상세정보 조회
     * @param array $arr_condition
     * @return array|int
     */
    public function findLectureDiscInfo($arr_condition = [])
    {
        $column = 'DiscInfoIdx, DiscIdx, IsApply, DiscNum, DiscRate';
        $arr_condition['EQ']['IsStatus'] = 'Y';
        $order_by = ['DiscIdx' => 'desc', 'DiscNum' => 'asc'];

        return $this->_conn->getListResult($this->_table['product_lecture_disc_info'], $column, $arr_condition, null, null, $order_by);
    }

    /**
     * 강좌할인율 중복체크
     * @param $site_code
     * @param $cate_code
     * @param $course_idx
     * @param $disc_idx
     * @return bool|string
     */
    public function dupCheckLectureDisc($site_code, $cate_code, $course_idx, $disc_idx = null)
    {
        $arr_condition['EQ'] = [
            'SiteCode' => get_var($site_code, 0), 'CateCode' => get_var($cate_code, 0), 'CourseIdx' => get_var($course_idx, 0)
        ];
        $arr_condition['NOT'] = ['DiscIdx' => $disc_idx];

        $data = $this->findLectureDisc('DiscIdx', $arr_condition);

        return empty($data) === true ? true : '동일하게 등록된 할인정보가 있습니다.';
    }

    /**
     * 강좌할인율 정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addLectureDisc($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $site_code = element('site_code', $input);
            $cate_ccd = element('cate_code', $input);
            $course_idx = element('course_idx', $input);
            $arr_is_apply = element('is_apply', $input);
            $arr_disc_num = element('disc_num', $input);
            $arr_disc_rate = element('disc_rate', $input);

            // 강좌할인율 중복체크
            $is_dup_check = $this->dupCheckLectureDisc($site_code, $cate_ccd, $course_idx);
            if ($is_dup_check !== true) {
                throw new \Exception($is_dup_check);
            }

            // 데이터 저장
            $data = [
                'DiscTitle' => element('disc_title', $input),
                'SiteCode' => $site_code,
                'CateCode' => $cate_ccd,
                'CourseIdx' => $course_idx,
                'IsUse' => element('is_use', $input, 'Y'),
                'RegAdminIdx' => $sess_admin_idx,
                'RegIp' => $reg_ip
            ];

            if ($this->_conn->set($data)->insert($this->_table['product_lecture_disc']) === false) {
                throw new \Exception('강좌할인율 정보 저장에 실패했습니다.');
            }

            $disc_idx = $this->_conn->insert_id();  // 할인식별자

            // 강좌할인율 상세정보 등록
            if (empty($arr_disc_rate) === false) {
                foreach ($arr_disc_rate as $idx => $disc_rate) {
                    if (empty($disc_rate) === false) {
                        $data = [
                            'DiscIdx' => $disc_idx,
                            'IsApply' => array_get($arr_is_apply, $idx, 'N'),
                            'DiscNum' => $arr_disc_num[$idx],
                            'DiscRate' => $disc_rate,
                            'RegAdminIdx' => $sess_admin_idx,
                            'RegIp' => $reg_ip
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['product_lecture_disc_info']) === false) {
                            throw new \Exception('강좌할인율 상세정보 저장에 실패했습니다.');
                        }
                    }
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
     * 강좌할인율 정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyLectureDisc($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $disc_idx = element('idx', $input);
            $course_idx = element('course_idx', $input);
            $arr_is_apply = element('is_apply', $input);
            $arr_disc_num = element('disc_num', $input);
            $arr_disc_rate = element('disc_rate', $input);
            
            // 강좌할인율 정보 조회
            $row = $this->findLectureDiscByDiscIdx($disc_idx);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }            

            // 강좌할인율 중복체크
            $is_dup_check = $this->dupCheckLectureDisc($row['SiteCode'], $row['CateCode'], $course_idx, $disc_idx);
            if ($is_dup_check !== true) {
                throw new \Exception($is_dup_check);
            }

            // 데이터 수정
            $data = [
                'DiscTitle' => element('disc_title', $input),
                'CourseIdx' => $course_idx,
                'IsUse' => element('is_use', $input, 'Y'),
                'UpdAdminIdx' => $sess_admin_idx
            ];

            if ($this->_conn->set($data)->where('DiscIdx', $disc_idx)->update($this->_table['product_lecture_disc']) === false) {
                throw new \Exception('강좌할인율 정보 수정에 실패했습니다.');
            }

            // 강좌할인율 상세정보 등록/수정
            if (empty($arr_disc_rate) === false) {
                // 기존 강좌할인율 상세정보 조회
                $info_rows = $this->findLectureDiscInfo(['EQ' => ['DiscIdx' => $disc_idx]]);

                foreach ($arr_disc_rate as $idx => $disc_rate) {
                    if (empty($disc_rate) === false) {
                        $is_apply = array_get($arr_is_apply, $idx, 'N');
                        $disc_num = $arr_disc_num[$idx];
                        $is_regist = true;

                        foreach ($info_rows as $info_row) {
                            if ($disc_num == $info_row['DiscNum']) {
                                if ($is_apply == $info_row['IsApply'] && $disc_rate == $info_row['DiscRate']) {
                                    // 강좌할인율 상세정보가 기존정보와 동일하다면 등록안함
                                    $is_regist = false;
                                } else {
                                    // 기존 강좌할인율 상세정보 상태변경
                                    $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $sess_admin_idx)
                                        ->where('DiscIdx', $disc_idx)->where('DiscInfoIdx', $info_row['DiscInfoIdx'])
                                        ->update($this->_table['product_lecture_disc_info']);
                                    if ($is_update === false) {
                                        throw new \Exception('기존 강좌할인율 상세정보 수정에 실패했습니다.');
                                    }
                                }

                                break;
                            }
                        }

                        // 강좌할인율 상세정보 등록
                        if ($is_regist === true) {
                            $data = [
                                'DiscIdx' => $disc_idx,
                                'IsApply' => $is_apply,
                                'DiscNum' => $disc_num,
                                'DiscRate' => $disc_rate,
                                'RegAdminIdx' => $sess_admin_idx,
                                'RegIp' => $reg_ip
                            ];

                            if ($this->_conn->set($data)->insert($this->_table['product_lecture_disc_info']) === false) {
                                throw new \Exception('강좌할인율 상세정보 저장에 실패했습니다.');
                            }
                        }
                    }
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
