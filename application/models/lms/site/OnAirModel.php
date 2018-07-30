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
            A.OaIdx, A.SiteCode, A.StudyStartDate, A.WeekArray, A.OnAirNum, A.OnAirStartType, IFNULL(A.OnAirStartTime,0) AS OnAirStartTime, IFNULL(A.OnAirEndTime,0) AS OnAirEndTime, A.OnAirName,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            G.SiteName, D.CateCode, H.ProfIdx, I.ProfNickName, K.OnAirLastDate,
            E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where_category = $this->_conn->makeWhere($arr_condition_category);
        $where_category = $where_category->getMakeWhere(false);

        $from = "
            FROM {$this->_table['onair']} AS A
            LEFT JOIN (
                SELECT B.OaIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['onair_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                {$where_category}
                GROUP BY B.OaIdx
            ) AS D ON A.OaIdx = D.OaIdx
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            
            INNER JOIN (
                SELECT temp_a.OaIdx, REPLACE(temp_a.OnAirDate, '-', '') AS OnAirLastDate
                FROM (
                    SELECT OaIdx, MAX(OnAirDate) AS OnAirDate
                    FROM lms_onair_date
                    WHERE IsStatus = 'Y'
                    GROUP BY OaIdx
                    ORDER BY OaIdx ASC
                ) AS temp_a
            ) AS K ON A.OaIdx = K.OaIdx
            
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            INNER JOIN {$this->_table['onair_title']} AS H ON A.OaIdx = H.OaIdx AND H.TitleType = '{$this->_title_type['1']}' AND H.IsStatus = 'Y'
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
     * 온에어 테이블 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findOnAir($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['onair'], $column, $arr_condition);
    }

    /**
     * 온에어 데이터 조회 / 수정 폼
     * @param $arr_condition
     * @return mixed
     */
    public function findOnAirForModify($arr_condition)
    {
        $column = '
            A.OaIdx, A.SiteCode, A.StudyStartDate, A.WeekArray, A.OnAirNum, A.OnAirStartType, IFNULL(A.OnAirStartTime,0) AS OnAirStartTime, IFNULL(A.OnAirEndTime,0) AS OnAirEndTime,
            TIME_FORMAT(A.OnAirStartTIme, \'%H\') AS OnAirStartHour, TIME_FORMAT(A.OnAirStartTIme, \'%i\') AS OnAirStartMin,
            TIME_FORMAT(A.OnAirEndTime, \'%H\') AS OnAirEndHour, TIME_FORMAT(A.OnAirEndTime, \'%i\') AS OnAirEndMin,
            A.OnAirName, A.OnAirTabName, A.LeftExposureType,A.LeftFileName,A.LeftFileRealName,A.LeftFileFullPath,A.LeftLink,A.RightExposureType,A.RightFileName,A.RightFileRealName,A.RightFileFullPath,A.RightLink,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            G.SiteName, D.CateCode, H.ProfIdx, H.Title as ProfTitle, I.ProfNickName, K.OnAirLastDate,
            E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ';

        $from = "
            FROM {$this->_table['onair']} AS A
            LEFT JOIN (
                SELECT B.OaIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['onair_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                GROUP BY B.OaIdx
            ) AS D ON A.OaIdx = D.OaIdx
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            
            INNER JOIN (
                SELECT temp_a.OaIdx, REPLACE(temp_a.OnAirDate, '-', '') AS OnAirLastDate
                FROM (
                    SELECT OaIdx, MAX(OnAirDate) AS OnAirDate
                    FROM lms_onair_date
                    WHERE IsStatus = 'Y'
                    GROUP BY OaIdx
                    ORDER BY OaIdx ASC
                ) AS temp_a
            ) AS K ON A.OaIdx = K.OaIdx
            
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            INNER JOIN {$this->_table['onair_title']} AS H ON A.OaIdx = H.OaIdx AND H.TitleType = '{$this->_title_type['1']}'
            INNER JOIN {$this->_table['professor']} AS I ON H.ProfIdx = I.ProfIdx
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 카테고리 연결 데이터 조회
     * @param $oa_idx
     * @return array
     */
    public function listOnAirCategory($oa_idx)
    {
        $column = '
            CC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table['onair_r_category'] . ' as CC
                inner join ' . $this->_table['sys_category'] . ' as C
                    on CC.CateCode = C.CateCode
                left join ' . $this->_table['sys_category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where CC.OaIdx = ? and CC.IsStatus = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by CC.OaIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$oa_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * 타이틀 조회
     * @param $oa_idx
     * @return array
     */
    public function findOnAirTitleListForModify($oa_idx)
    {
        $column = 'OatIdx, Title';
        $from = "
            FROM {$this->_table['onair_title']}
        ";
        $where = " where OaIdx = ? AND TitleType = '{$this->_title_type['0']}' AND IsStatus = 'Y'";
        $order_by_offset_limit = ' order by OatIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$oa_idx])->result_array();
        return array_pluck($data, 'Title', 'OatIdx');
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
                $on_air_start_time = element('on_air_start_time', $input) . ':' . element('on_air_start_min', $input) . ':00';
                $on_air_end_time = element('on_air_end_time', $input) . ':' . element('on_air_end_min', $input) . ':59';
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
     * 온에어 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyOnAir($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $oa_idx = element('oa_idx', $input);

            // 기존 온에어 기본정보 조회
            $row = $this->findOnAir('OaIdx, LeftFileName, LeftFileRealName, LeftFileFullPath, RightFileName, RightFileRealName, RightFileFullPath', ['EQ' => ['OaIdx' => $oa_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $on_air_start_type = element('on_air_start_type', $input);
            $on_air_start_time = null;
            $on_air_end_time = null;

            if ($on_air_start_type == 'D') {
                $on_air_start_time = element('on_air_start_time', $input) . ':' . element('on_air_start_min', $input) . ':00';
                $on_air_end_time = element('on_air_end_time', $input) . ':' . element('on_air_end_min', $input) . ':59';
            }

            // 파일 삭제/저장
            $this->load->library('upload');
            $this->load->helper('file');
            $upload_dir = SUB_DOMAIN . '/onAir/' . date('Ymd');
            if ($_FILES['attach_file']['size'][0] > 0) {
                if (empty($row['LeftFileName']) === false) {
                    $file_path = $row['LeftFileFullPath'].$row['LeftFileName'];
                    $real_file_path = public_to_upload_path($file_path);
                    if (@unlink($real_file_path) === false) {
                        throw new \Exception('이미지 삭제에 실패했습니다.');
                    }
                }
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(2), $upload_dir);
                if (is_array($uploaded) === false) {
                    throw new \Exception($uploaded);
                }
            }
            if ($_FILES['attach_file']['size'][1] > 0) {
                if (empty($row['RightFileName']) === false) {
                    $file_path = $row['RightFileFullPath'].$row['RightFileName'];
                    $real_file_path = public_to_upload_path($file_path);
                    if (@unlink($real_file_path) === false) {
                        throw new \Exception('이미지 삭제에 실패했습니다.');
                    }
                }
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(2), $upload_dir);
                if (is_array($uploaded) === false) {
                    throw new \Exception($uploaded);
                }
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
                'LeftLink' => element('left_link', $input),
                'RightExposureType' => element('right_exposure_type', $input),
                'RightLink' => element('right_link', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if (empty($uploaded[0]) === false) {
                $data = array_merge($data,[
                    'LeftFileName' => $uploaded[0]['orig_name'],
                    'LeftFileRealName' => $uploaded[0]['client_name'],
                    'LeftFileFullPath' => $this->upload->_upload_url . $upload_dir . '/'
                ]);
            }

            if (empty($uploaded[1]) === false) {
                $data = array_merge($data,[
                    'RightFileName' => $uploaded[1]['orig_name'],
                    'RightFileRealName' => $uploaded[1]['client_name'],
                    'RightFileFullPath' => $this->upload->_upload_url . $upload_dir . '/'
                ]);
            }

            //등록
            if ($this->_conn->set($data)->where('Oaidx', $oa_idx)->update($this->_table['onair']) === false) {
                throw new \Exception('온에어 등록에 실패했습니다.');
            }

            if($this->_setDataDelete($oa_idx, $this->_table['onair_r_category']) !== true) {
                throw new \Exception('카테고리 수정에 실패했습니다.');
            }

            if($this->_setDataDelete($oa_idx, $this->_table['onair_title'],'where', 'TitleType', $this->_title_type[0]) !== true) {
                throw new \Exception('타이틀 수정에 실패했습니다.');
            }

            if($this->_setDataDelete($oa_idx, $this->_table['onair_date']) !== true) {
                throw new \Exception('송출기간 수정에 실패했습니다.');
            }

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

            //타이블 저장
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

    private function _setDataDelete($oa_idx, $table_name, $where_type = null, $where_key = null, $where_val = null)
    {
        try {
            /*  기존 정보 상태값 변경 */
            $del_data = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($del_data)->where('OaIdx', $oa_idx)->where('IsStatus', 'Y');
            if ($this->_conn->update($table_name) === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('정보 수정에 실패했습니다.');
            }

            /*  기존 정보 상태값 변경 */
        } catch (\Exception $e) {
            return $e->getMessage();
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