<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultModel extends WB_Model
{
    private $_table = [
        'consult_schedule' => 'lms_consult_schedule',
        'consult_r_category' => 'lms_consult_r_category',
        'consult_schedule_time' => 'lms_consult_schedule_time',
        'consult_schedule_member' => 'lms_consult_schedule_member',
        'member' => 'lms_member',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin',
        'sys_code' => 'lms_sys_code',
        'product_subject' => 'lms_product_subject'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 상담일정 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param array $arr_condition_category
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllConsultSchedule($is_count, $arr_condition = [], $arr_condition_category = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.CsIdx, A.SiteCode, A.CampusCcd, A.ConsultDate, A.StartTime, A.EndTime, A.LunchStartTime,A.LunchEndTime, A.ConsultTime, A.BreakTime,
            A.IsUse, A.IsStatus, A.RegDatm, A.RegAdminIdx, A.RegIp, A.UpdDatm, A.UpdAdminIdx,
            C.SiteName, B.CateCode, H.CcdName AS CampusName,
            D.totalConsult, E.memCount,
            F.wAdminName AS RegAdminName, G.wAdminName AS UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where_category = $this->_conn->makeWhere($arr_condition_category);
        $where_category = $where_category->getMakeWhere(false);

        $from = "
            FROM {$this->_table['consult_schedule']} AS A
            LEFT JOIN (
                SELECT tA.CsIdx, GROUP_CONCAT(CONCAT(tB.CateName,'[',tA.CateCode,']')) AS CateCode
                FROM {$this->_table['consult_r_category']} AS tA
                INNER JOIN {$this->_table['sys_category']} AS tB ON tA.CateCode = tB.CateCode AND tA.IsStatus = 'Y'
                {$where_category}
                GROUP BY tA.CsIdx
            ) AS B ON A.CsIdx = B.CsIdx
            INNER JOIN {$this->_table['site']} AS C ON A.SiteCode = C.SiteCode
            
            INNER JOIN (
                SELECT CsIdx, SUM(ConsultPersonCount) AS totalConsult
                FROM {$this->_table['consult_schedule_time']}
                WHERE IsUse = 'Y' AND IsStatus = 'Y'
                GROUP BY CsIdx
            ) AS D ON A.CsIdx = D.CsIdx
            
            LEFT JOIN (
                SELECT tA.CsIdx, COUNT(tB.CstIdx) AS memCount FROM {$this->_table['consult_schedule_time']} AS tA
                LEFT JOIN {$this->_table['consult_schedule_member']} AS tB ON tA.CstIdx = tB.CstIdx AND tB.IsReg = 'Y' AND tA.IsUse = 'Y' AND tA.IsStatus = 'Y'
                GROUP BY tA.CsIdx
            ) AS E ON A.CsIdx = E.CsIdx
        ";

        $from .= "
            INNER JOIN {$this->_table['admin']} AS F ON A.RegAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS G ON A.UpdAdminIdx = G.wAdminIdx AND G.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['sys_code']} AS H ON A.CampusCcd = H.Ccd
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);
        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        // 캠퍼스 권한
        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
        $where_campus = $this->_conn->group_start();
        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
            $where_campus->or_group_start();
            $where_campus->or_where('A.SiteCode',$set_site_ccd);
            $where_campus->group_start();
            $where_campus->where('A.CampusCcd', $this->codeModel->campusAllCcd);
            $where_campus->or_where_in('A.CampusCcd', $set_campus_ccd);
            $where_campus->group_end();
            $where_campus->group_end();
        }
        $where_campus->or_where('A.CampusCcd', "''", false);
        $where_campus->or_where('A.CampusCcd IS NULL');
        $where_campus->group_end();
        $where_campus = $where_campus->getMakeWhere(true);
        $where = $where_temp . $where_campus;

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 상담일정 테이블 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findConsultSchedule($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['con'], $column, $arr_condition);
    }

    /**
     * 수정 폼에 필요한 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findConsultScheduleForModify($arr_condition)
    {
        $column = '
            A.CsIdx, A.SiteCode, A.CampusCcd, A.ConsultDate,
            A.StartTime, A.EndTime,
            DATE_FORMAT(A.StartTime,\'%H\') AS StartHour,
            DATE_FORMAT(A.StartTime,\'%i\') AS StartMin,
            DATE_FORMAT(A.EndTime,\'%H\') AS EndHour,
            DATE_FORMAT(A.EndTime,\'%i\') AS EndMin,
            A.LunchStartTime,A.LunchEndTime,
            DATE_FORMAT(A.LunchStartTime,\'%H\') AS LunchStartHour,
            DATE_FORMAT(A.LunchStartTime,\'%i\') AS LunchStartMin,
            DATE_FORMAT(A.LunchEndTime,\'%H\') AS LunchEndHour,
            DATE_FORMAT(A.LunchEndTime,\'%i\') AS LunchEndMin,
            A.ConsultTime, A.BreakTime,
            A.IsUse, A.IsStatus, A.RegDatm, A.RegAdminIdx, A.RegIp, A.UpdDatm, A.UpdAdminIdx,
            C.SiteName, H.CcdName AS CampusName,
            D.totalConsult, E.memCount,
            F.wAdminName AS RegAdminName, G.wAdminName AS UpdAdminName
            ';

        $from = "
        FROM {$this->_table['consult_schedule']} AS A
        INNER JOIN {$this->_table['site']} AS C ON A.SiteCode = C.SiteCode
        
        INNER JOIN (
            SELECT CsIdx, SUM(ConsultPersonCount) AS totalConsult
            FROM {$this->_table['consult_schedule_time']}
            WHERE IsUse = 'Y' AND IsStatus = 'Y'
            GROUP BY CsIdx
        ) AS D ON A.CsIdx = D.CsIdx
        
        LEFT JOIN (
            SELECT tA.CsIdx, COUNT(tB.CstIdx) AS memCount FROM {$this->_table['consult_schedule_time']} AS tA
            LEFT JOIN {$this->_table['consult_schedule_member']} AS tB ON tA.CstIdx = tB.CstIdx AND tB.IsReg = 'Y' AND tA.IsUse = 'Y' AND tA.IsStatus = 'Y'
            GROUP BY tA.CsIdx
        ) AS E ON A.CsIdx = E.CsIdx
            ";

        $from .= "
            INNER JOIN {$this->_table['admin']} AS F ON A.RegAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS G ON A.UpdAdminIdx = G.wAdminIdx AND G.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['sys_code']} AS H ON A.CampusCcd = H.Ccd
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 특정 요일의 시간표 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findConsultScheduleTimeForModify($arr_condition)
    {
        $column = "A.CstIdx, A.ConsultPersonCount, A.ConsultTargetType, A.IsUse";

        $form = "
            FROM {$this->_table['consult_schedule_time']} AS A
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['CstIdx' => 'ASC'])->getMakeOrderBy();

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $form . $where . $order_by)->result_array();
    }

    /**
     * 특정시간표읠 회원 정보 조회
     * @param $cs_idx
     * @param $join_type
     * @return mixed
     */
    public function findConsultScheduleTimeForMember($cs_idx, $join_type = 'LEFT')
    {
        $arr_condition['EQ']['A.CsIdx'] = $cs_idx;

        $column = "A.CstIdx, B.CsmIdxs, B.Mem_Infos";
        $form = "
            FROM {$this->_table['consult_schedule_time']} AS A
            {$join_type} JOIN (
                SELECT tA.CstIdx, GROUP_CONCAT(tA.CsmIdx) AS CsmIdxs, GROUP_CONCAT(tA.MemIdx) AS MemIdxs, GROUP_CONCAT(CONCAT(tC.MemName, '[',tC.MemId,']')) AS Mem_Infos
                FROM {$this->_table['consult_schedule_member']} AS tA
                INNER JOIN {$this->_table['consult_schedule_time']} AS tB ON tA.CstIdx = tB.CstIdx
                INNER JOIN {$this->_table['member']} AS tC ON tA.MemIdx = tC.MemIdx
                WHERE tB.CsIdx = {$cs_idx} AND tA.IsReg = 'Y'
                GROUP BY tA.CstIdx
            ) AS B ON A.CstIdx = B.CstIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['A.CstIdx' => 'ASC'])->getMakeOrderBy();

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $form . $where . $order_by)->result_array();
    }

    /**
     * 카테고리 연결 데이터 조회
     * @param $cs_idx
     * @return array
     */
    public function listConsultScheduleCategory($cs_idx)
    {
        $column = '
            CC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName
        ';
        $from = '
            from ' . $this->_table['consult_r_category'] . ' as CC
                inner join ' . $this->_table['sys_category'] . ' as C
                    on CC.CateCode = C.CateCode
                left join ' . $this->_table['sys_category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where CC.CsIdx = ? and CC.IsStatus = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by CC.CsIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$cs_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * 간편 상담정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findSimpleConsultScheduleDetailForMember($column = '*', $arr_condition = [])
    {
        return $this->_conn->getFindResult($this->_table['consult_schedule_member'], $column, $arr_condition);
    }

    /**
     * 상담정보 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findConsultScheduleDetailForMember($arr_condition)
    {
        $column = '
            C.CsIdx, C.SiteCode, J.SiteName, C.CampusCcd, K.CcdName AS CampusName, C.ConsultDate
            ,B.ConsultTargetType
            ,C.StartTime, C.EndTime
            ,DATE_FORMAT(C.StartTime,\'%H\') AS StartHour
            ,DATE_FORMAT(C.StartTime,\'%i\') AS StartMin
            ,DATE_FORMAT(C.EndTime,\'%H\') AS EndHour
            ,DATE_FORMAT(C.EndTime,\'%i\') AS EndMin
            ,D.MemName, D.MemId, D.BirthDay
            ,fn_dec(D.PhoneEnc) AS Phone
            ,fn_dec(D.MailEnc) AS Mail
            ,A.CateCode, E.CateName #응시직급
            ,A.SerialCcd, F.CcdName AS SerialName #응시직렬
            ,A.CandidateAreaCcd, G.CcdName AS CandidateAreaName #응시지역
            ,A.ExamPeriod #수험기간
            ,A.SubjectIdx, H.SubjectName #과목식별자(취약과목)
            ,A.IsStudy #수강여부
            ,A.Memo #메모
            ,A.IsConsult #여부상담 (상담상태)
            ,A.ConsultMemo #상담내용 (코멘트)
        ';

        $from = "
            FROM {$this->_table['consult_schedule_member']} AS A
            INNER JOIN {$this->_table['consult_schedule_time']} AS B ON A.CstIdx = B.CstIdx AND B.IsStatus = 'Y'
            INNER JOIN {$this->_table['consult_schedule']} AS C ON B.CsIdx = C.CsIdx AND C.IsStatus = 'Y'
            INNER JOIN {$this->_table['member']} AS D ON A.MemIdx = D.MemIdx
            INNER JOIN {$this->_table['sys_category']} AS E ON A.CateCode = E.CateCode AND E.IsStatus = 'Y'
            INNER JOIN {$this->_table['site']} AS J ON C.SiteCode = J.SiteCode
            LEFT JOIN {$this->_table['sys_code']} AS K ON C.CampusCcd = K.Ccd            
            LEFT JOIN {$this->_table['sys_code']} AS F ON A.SerialCcd = F.Ccd
            LEFT JOIN {$this->_table['sys_code']} AS G ON A.CandidateAreaCcd = G.Ccd
            LEFT JOIN {$this->_table['product_subject']} AS H ON A.SubjectIdx = H.SubjectIdx
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
    public function addConsultSchedule($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $yoil = array(0,1,2,3,4,5,6);
            $get_week = element('week', $input);

            //카테고리
            $category_code = element('cate_code', $input);

            //상담시간표 변수 셋팅
            $arr_person_count = element('add_person_count', $input);
            $arr_target_type = element('add_target_type', $input);
            $arr_is_use = element('add_is_use', $input);

            //상담일정
            $schedule_start_date = element('schedule_start_date', $input);
            $schedule_end_date = element('schedule_end_date', $input);

            //상담시간
            $schedule_start_time = element('schedule_start_hour', $input) . ':' . element('schedule_start_min', $input) . ':00';
            $schedule_end_time = element('schedule_end_hour', $input) . ':' . element('schedule_end_min', $input) . ':59';

            //점심시간
            $lunch_start_time = element('lunch_start_hour', $input) . ':' . element('lunch_start_min', $input) . ':00';
            $lunch_end_time = element('lunch_end_hour', $input) . ':' . element('lunch_end_min', $input) . ':59';

            $data = [
                'SiteCode' => element('site_code', $input),
                'CampusCcd' => element('campus_ccd', $input),
                'StartTime' => $schedule_start_time,
                'EndTime' => $schedule_end_time,
                'LunchStartTime' => $lunch_start_time,
                'LunchEndTime' => $lunch_end_time,
                'ConsultTime' => element('consult_time', $input),
                'BreakTime' => element('break_time', $input),
                'IsUse' => element('is_use', $input),
                'RegIp' => $reg_ip,
                'RegAdminIdx' => $admin_idx,
            ];

            //날짜 사이의 일수 계산하여 insert
            $strtotime_start = strtotime($schedule_start_date);
            $strtotime_end = strtotime($schedule_end_date);
            while ($strtotime_start <= $strtotime_end){
                if (empty($get_week[date('w', $strtotime_start)]) === false) {
                    $consult_date = date('Y-m-d', $strtotime_start);
                    $consult_yoil = $yoil[date('w', $strtotime_start)];
                    //echo $consult_date.' '.$consult_yoil.'<br>';

                    $data = array_merge($data,['ConsultDate' => $consult_date]);
                    // 상담예약 데이터 저장
                    if ($this->_conn->set($data)->insert($this->_table['consult_schedule']) === false) {
                        throw new \Exception('상담예약 등록에 실패했습니다.');
                    }
                    $cs_idx = $this->_conn->insert_id();

                    //카테고리 저장
                    foreach ($category_code as $key => $val) {
                        $category_data['CsIdx'] = $cs_idx;
                        $category_data['CateCode'] = $val;
                        $category_data['RegAdminIdx'] = $admin_idx;
                        $category_data['RegIp'] = $reg_ip;
                        if ($this->_addConsultCategory($category_data) === false) {
                            throw new \Exception('카테고리 등록에 실패했습니다.');
                        }
                    }

                    // 상담예약시간등록
                    $_order_num = 1;
                    foreach ($arr_target_type as $key => $val) {
                        $time_data['CsIdx'] = $cs_idx;
                        $time_data['OrderNum'] = $_order_num;
                        $time_data['ConsultPersonCount'] = $arr_person_count[$key];
                        $time_data['ConsultTargetType'] = $val;
                        $time_data['IsUse'] = $arr_is_use[$key];
                        $time_data['RegAdminIdx'] = $admin_idx;
                        $time_data['RegIp'] = $reg_ip;
                        if ($this->_addConsultScheduleTime($time_data) === false) {
                            throw new \Exception('상담예약시간 등록에 실패했습니다.');
                        }
                        $_order_num++;
                    }
                }
                $strtotime_start = strtotime("+1 day",$strtotime_start);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 수정 (시간대별 관리테이블 수정, 일자별 관리 테이블 : 사용유무)
     * @param array $input
     * @return array|bool
     */
    public function modifyConsultSchedule($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $cs_idx = element('cs_idx', $input);

            // 기본정보 조회
            $row = $this->findConsultSchedule('CsIdx', ['EQ' => ['CsIdx' => $cs_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            //일자별 관리 테이블 수정
            $data = ['IsUse' => element('is_use', $input)];
            if ($this->_conn->set($data)->where('Csidx', $cs_idx)->update($this->_table['consult_schedule']) === false) {
                throw new \Exception('상담일 수정에 실패했습니다.');
            }

            //시간대별 관리 테이블 수정
            //상담시간표 변수 셋팅
            $arr_schedule_idx = element('add_schedule_idx', $input);
            $arr_person_count = element('add_person_count', $input);
            $arr_target_type = element('add_target_type', $input);
            $arr_is_use = element('add_is_use', $input);

            foreach ($arr_schedule_idx as $key => $val) {
                $time_data['ConsultPersonCount'] = $arr_person_count[$key];
                $time_data['ConsultTargetType'] = $arr_target_type[$key];
                $time_data['IsUse'] = $arr_is_use[$key];
                $time_data['UpdAdminIdx'] = $admin_idx;
                if ($this->_modifyConsultScheduleTime($val, $time_data) === false) {
                    throw new \Exception('상담예약시간 수정에 실패했습니다.');
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
     * @param $cs_idx
     * @return array|bool
     */
    public function deleteConsultSchedule($cs_idx)
    {
        $this->_conn->trans_begin();
        try {
            $join_type = 'INNER';
            $arr_schedule_member_list = $this->findConsultScheduleTimeForMember($cs_idx,$join_type);

            if (count($arr_schedule_member_list) > 0 ) {
                throw new \Exception('이미 접수된 상담이 있습니다.');
            }

            //일자별 관리 테이블 삭제
            $data = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            if ($this->_conn->set($data)->where('Csidx', $cs_idx)->update($this->_table['consult_schedule']) === false) {
                throw new \Exception('상담일 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 회원 상담정보 수정
     * @param array $input
     * @return bool
     */
    public function modifyDetailConsultMember($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $csm_idx = element('csm_idx', $input);

            // 기본정보 조회
            $row = $this->findSimpleConsultScheduleDetailForMember('CsmIdx', ['EQ' => ['CsmIdx' => $csm_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $member_data['ConsultAdminIdx'] = $admin_idx;
            $member_data['ConsultDatm'] = date('Y-m-d H:i:s');
            $member_data['IsConsult'] = element('is_consult', $input);
            $member_data['ConsultMemo'] = element('consult_memo', $input);

            if ($this->_conn->set($member_data)->where('CsmIdx', $csm_idx)->update($this->_table['consult_schedule_member']) === false) {
                throw new \Exception('상담 등록에 실패했습니다.');
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
    private function _addConsultCategory($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['consult_r_category']) === false) {
                throw new \Exception('카테고리 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 상담예약시간 관리 등록
     * @param $input
     * @return bool
     */
    private function _addConsultScheduleTime($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['consult_schedule_time']) === false) {
                throw new \Exception('상담예약시간 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 스케줄 데이터 수정
     * @param $cst_idx
     * @param $input
     * @return bool
     */
    private function _modifyConsultScheduleTime($cst_idx, $input)
    {
        try {
            if ($this->_conn->set($input)->where('CstIdx', $cst_idx)->update($this->_table['consult_schedule_time']) === false) {
                throw new \Exception('온에어 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}