<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupportersMemberModel extends WB_Model
{
    private $_table = [
        'supporters' => 'lms_supporters',
        'supporters_r_member' => 'lms_supporters_r_member',
        'supporters_myclass' => 'lms_supporters_myclass',
        'supporters_attendance' => 'lms_supporters_attendance',
        'lms_member' => 'lms_member',
        'lms_member_otherinfo' => 'lms_member_otherinfo',
        'lms_site' => 'lms_site',
        'wbs_sys_admin' => 'wbs_sys_admin'
    ];

    public $_arr_bm_idx = [
        'assignment' => '104',
        'suggest' => '105'
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
                b.SupportersTypeCcd, b.SupportersYear, b.SupportersNumber, b.Title,
                m.MemName, m.MemId,
                c.SiteName, d.wAdminName as RegAdminName,
                fn_ccd_name(a.SupportersStatusCcd) AS SupportersStatusCcdName,
                fn_ccd_name(a.SerialCcd) AS SerialCcdName,
                fn_ccd_name(a.SchoolYearCcd) AS SchoolYearCcdName,
                fn_ccd_name(a.IsSchoolCcd) AS IsSchoolCcdName,
                fn_ccd_name(b.SupportersTypeCcd) AS SupportersTypeCcdName,
                ( SELECT COUNT(*) FROM lms_board WHERE BmIdx = "'.$this->_arr_bm_idx['assignment'].'" AND SupportersIdx = a.SupportersIdx ) AS AssignmentTotalCnt,
                ( SELECT COUNT(*) FROM lms_board AS ta 
                    INNER JOIN lms_board_assignment AS tb ON ta.BoardIdx = tb.BoardIdx WHERE ta.BmIdx = "'.$this->_arr_bm_idx['assignment'].'" AND ta.SupportersIdx = a.SupportersIdx AND tb.MemIdx = a.MemIdx
                ) AS AssignmentCnt,
                ( SELECT COUNT(*) FROM lms_board WHERE BmIdx = "'.$this->_arr_bm_idx['suggest'].'" AND SupportersIdx = a.SupportersIdx AND RegMemIdx = a.MemIdx ) AS SuggestCnt,
                ( 
                    SELECT COUNT(*) AS AttendanceCnt FROM lms_supporters_attendance AS ad
                    WHERE a.SupportersIdx = ad.SupportersIdx AND a.MemIdx = ad.MemIdx AND ad.IsStatus = "Y"
                    AND ad.AttendanceDay BETWEEN DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH) + INTERVAL 1 DAY, "%Y%m%d") AND DATE_FORMAT(LAST_DAY(NOW()), "%Y%m%d")
                ) AS AttendanceCnt
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

    public function findMyClass($arr_condition, $column = 'a.SupportersIdx')
    {
        $from = "
            FROM {$this->_table['supporters_myclass']}
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    public function modifyMyClass($inputData, $idx)
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'SmcIdx' => $idx
                ]
            ];
            $myClassData = $this->findMyClass($arr_condition, 'AttachFileName, AttachFileRealName, AttachFilePath');
            if (empty($myClassData)) {
                throw new \Exception('조회된 나의 소개 데이터가 없습니다.');
            }

            $inputData = array_merge($inputData,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ]);
            $this->_conn->set($inputData)->where('SmcIdx', $idx);
            if ($this->_conn->update($this->_table['supporters_myclass']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            //이미지 수정
            if ($_FILES['attach_file']['size'] > 0) {
                $this->load->library('upload');
                $paths = explode('/', $myClassData['AttachFilePath']);  //날짜 형태의 값만 추출

                if (empty($myClassData['AttachFilePath']) === false) {
                    $paths1 = $paths[6];
                    $paths2 = $paths[7];
                } else {
                    $paths1 = date('Y');
                    $paths2 = date('md');
                }

                $upload_dir = config_item('upload_prefix_dir') . '/supporters/myclass/' . $paths1 . '/' . $paths2;
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_dir);

                if (empty($uploaded) === true || empty($uploaded[0]) === true) {
                    throw new \Exception('이미지 등록에 실패했습니다.');
                }
                if (count($uploaded) > 0) {
                    //기존 파일 삭제
                    $this->load->helper('file');
                    $real_img_path = public_to_upload_path($myClassData['AttachFilePath'] . $myClassData['AttachFileName']);
                    if (@unlink($real_img_path) === false) {
                        // 로컬에서 등록한 이미지는 삭제가 안되기 때문에 에러 메시지 노출 안함으로 변경
                        //throw new \Exception('이미지 삭제에 실패했습니다.');
                    }

                    $img_data['AttachFilePath'] = $this->upload->_upload_url . $upload_dir . '/';
                    $img_data['AttachFileName'] = $uploaded[0]['orig_name'];
                    $img_data['AttachFileRealName'] = $uploaded[0]['client_name'];

                    if ($this->_conn->set($img_data)->where('SmcIdx', $idx)->update($this->_table['supporters_myclass']) === false) {
                        throw new \Exception('이미지 등록에 실패했습니다.');
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

    public function removeFile($attach_idx)
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'SmcIdx' => $attach_idx
                ]
            ];
            $data = $this->findMyClass($arr_condition, 'AttachFileName, AttachFileRealName, AttachFilePath');
            if (empty($data) === true) {
                throw new \Exception('삭제할 데이터가 없습니다.');
            }

            $file_path = $data['AttachFilePath'].$data['AttachFileName'];
            $this->load->helper('file');
            $real_file_path = public_to_upload_path($file_path);
            if (@unlink($real_file_path) === false) {
                throw new \Exception('이미지 삭제에 실패했습니다.');
            }

            $img_data['AttachFilePath'] = '';
            $img_data['AttachFileName'] = '';
            $img_data['AttachFileRealName'] = '';
            if ($this->_conn->set($img_data)->where('SmcIdx', $attach_idx)->update($this->_table['supporters_myclass']) === false) {
                throw new \Exception('이미지 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 회원 출석 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listMyAttendance($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "SadIdx, SupportersIdx, DATE_FORMAT(AttendanceDay, '%Y-%m-%d') AS AttendanceDay, RegDatm";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = " FROM {$this->_table['supporters_attendance']}";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 출석체크 회원 정보 조회
     * @param array $arr_condition
     * @return array
     */
    public function getSupportersAttendanceMember($arr_condition = [])
    {
        $column = " 
            AttendanceDay
        ";
        $from = " FROM {$this->_table['supporters_attendance']} ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $list = $this->_conn->query('SELECT '. $column. $from. $where)->result_array();

        $data = [];
        foreach ($list as $key => $val){
            $data[$val['AttendanceDay']] = $val;
        }
        return $data;
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

    /**
     * 파일명 생성
     * @return string
     */
    private function _getAttachImgNames()
    {
        $temp_time = date('YmdHis');
        $attach_file_names = 'myclass_' . $temp_time;
        return $attach_file_names;
    }
}