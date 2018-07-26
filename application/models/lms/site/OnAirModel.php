<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnAirModel extends WB_Model
{
    private $_table = [
        'onair' => 'lms_onair',
        'onair_date' => 'lms_onair_date',
        'onair_r_category' => 'lms_onair_r_category',
        'onair_title' => 'lms_onair_title',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin',
        'professor' => 'lms_professor'
    ];

    public $_title_type = [
        '0' => 'O',     //온에어 타이틀
        '1' => 'P'      //온에어 교수한마디
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 온에어 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param array $arr_condition_category
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllOnAir($is_count, $arr_condition = [], $arr_condition_category = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.OaIdx, A.SiteCode, MONTH(A.StudyStartDate) AS StudyStartMonth, A.WeekArray, A.OnAirNum, A.OnAirStartType, IFNULL(A.OnAirStartTime,0) AS OnAirStartTime, IFNULL(A.OnAirEndTime,0) AS OnAirEndTime, A.OnAirName,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            G.SiteName, D.CateCode, H.ProfIdx, I.ProfNickName,
            E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['onair']} AS A
            LEFT JOIN (
                SELECT B.OaIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['onair_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                GROUP BY B.OaIdx
            ) AS D ON A.OaIdx = D.OaIdx
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            INNER JOIN {$this->_table['onair_title']} AS H ON A.OaIdx = H.OaIdx AND H.TitleType = 'P'
            INNER JOIN {$this->_table['professor']} AS I ON H.ProfIdx = I.ProfIdx
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 온에어 등록
     * @param array $input
     * @return array|bool
     */
    public function addOnAir($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            $on_air_start_type = element('on_air_start_type', $input);
            $on_air_start_time = null;
            $on_air_end_time = null;

            $this->load->library('upload');
            if ($on_air_start_type == 'D') {
                $on_air_start_time = element('on_air_start_time', $input) . ':' . element('on_air_start_min', $input);
                $on_air_end_time = element('on_air_end_time', $input) . ':' . element('on_air_end_min', $input);
            }

            // 파일저장
            $upload_dir = SUB_DOMAIN . '/onAir/' . date('Ymd');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(2), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'StudyStartDate' => element('study_start_date', $input),
                'OnAirNum' => element('on_air_num', $input),
                'WeekArray' => element('week_str', $input),
                'OnAirStartType' => $on_air_start_type,
                'OnAirStartTIme' => $on_air_start_time,
                'OnAirEndTime' => $on_air_end_time,
                'OnAirName' => element('on_air_name', $input),
                'OnAirTabName' => element('on_air_tab_name', $input),
                'LeftExposureType' => element('left_exposure_type', $input),
                'LeftFileName' => (empty($uploaded[0]) === false) ? $uploaded[0]['orig_name'] : '',
                'LeftFileRealName' => (empty($uploaded[0]) === false) ? $uploaded[0]['client_name'] : '',
                'LeftFileFullPath' => $this->upload->_upload_url . $upload_dir . '/',
                'LeftLink' => element('left_link', $input),
                'RightExposureType' => element('right_exposure_type', $input),
                'RightFileName' => (empty($uploaded[1]) === false) ? $uploaded[1]['orig_name'] : '',
                'RightFileRealName' => (empty($uploaded[1]) === false) ? $uploaded[1]['client_name'] : '',
                'RightFileFullPath' => $this->upload->_upload_url . $upload_dir . '/',
                'RightLink' => element('right_link', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $reg_ip
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['onair']) === false) {
                throw new \Exception('온에어 등록에 실패했습니다.');
            }
            $oa_idx = $this->_conn->insert_id();

            //카테고리 저장
            $category_code = element('cate_code', $input);
            foreach ($category_code as $key => $val) {
                $category_data['OaIdx'] = $oa_idx;
                $category_data['CateCode'] = $val;
                $category_data['RegAdminIdx'] = $admin_idx;
                $category_data['RegIp'] = $reg_ip;
                if ($this->_addOnAirCategory($category_data) === false) {
                    throw new \Exception('카테고리 등록에 실패했습니다.');
                }
            }

            //타이블저장
            $title_data = [];
            $titles = element('title', $input);
            foreach ($titles as $key => $val) {
                $title_data['OaIdx'] = $oa_idx;
                $title_data['TitleType'] = $this->_title_type[0];
                $title_data['Title'] = $val;
                $title_data['RegAdminIdx'] = $admin_idx;
                $title_data['RegIp'] = $reg_ip;
                if ($this->_addOnAirTitle($title_data) === false) {
                    throw new \Exception('타이틀 등록에 실패했습니다.');
                }
            }

            //교수한마디 저장
            $title_data = [];
            $title_data['OaIdx'] = $oa_idx;
            $title_data['TitleType'] = $this->_title_type[1];
            $title_data['ProfIdx'] = element('prof_idx', $input);
            $title_data['Title'] = element('prof_title', $input);
            $title_data['RegAdminIdx'] = $admin_idx;
            $title_data['RegIp'] = $reg_ip;
            if ($this->_addOnAirTitle($title_data) === false) {
                throw new \Exception('타이틀 등록에 실패했습니다.');
            }

            //송출기간저장
            $savDay = element('savDay',$input,'');
            $savDay_data = [];
            $num = 1;
            if (empty($savDay) === false) {
                foreach ($savDay as $key => $val) {
                    if (empty($val) === false) {
                        $savDay_data['OaIdx'] = $oa_idx;
                        $savDay_data['OnAirDate'] = $val;
                        $savDay_data['OnAirNum'] = $num;
                        $savDay_data['RegAdminIdx'] = $admin_idx;
                        $savDay_data['RegIp'] = $reg_ip;
                        if ($this->_addOnAirDate($savDay_data) === false) {
                            throw new \Exception('송출기간 등록에 실패했습니다.');
                        }
                        $num += 1;
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
     * 카테고리 등록
     * @param $input
     * @return bool
     */
    private function _addOnAirCategory($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['onair_r_category']) === false) {
                throw new \Exception('카테고리 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 타이틀/교수한마디 저장
     * @param $input
     * @return bool
     */
    private function _addOnAirTitle($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['onair_title']) === false) {
                throw new \Exception('카테고리 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 송출기간 저장
     * @param $input
     * @return bool
     */
    private function _addOnAirDate($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['onair_date']) === false) {
                throw new \Exception('송출기간 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일명 배열 생성
     * @param $cnt
     * @return array
     */
    private function _getAttachImgNames($cnt)
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        for ($i = 0; $i < $cnt; $i++) {
            $attach_file_names[] = 'onair_' . $i . '_' . $temp_time;
        }
        return $attach_file_names;
    }
}