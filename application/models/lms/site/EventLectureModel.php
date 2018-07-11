<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLectureModel extends WB_Model
{
    private $_table = [
        'event_lecture' => 'lms_event_lecture',
        'event_lecture_r_category' => 'lms_event_r_category',
        'event_register' => 'lms_event_register',
        'event_file' => 'lms_event_file',
        'event_commnet' => 'lms_event_commnet',
        'event_member' => 'lms_event_member',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public $_groupCcd = [
        'option' => '660'
    ];

    // 이벤트 접수 관리(정원제한), 댓글기능, 자동문자, 바로신청팝업
    public $_event_lecture_option_ccds = [
        '0' => '660001',
        '1' => '660002',
        '2' => '660003',
        '3' => '660004'
    ];

    // 신청유형
    public $_requst_type_names = ['1' => '설명회','2' => '특강','3' => '이벤트',];

    // 참여구분
    public $_take_type_names = ['1' => '회원','2' => '회원+비회원'];

    // 접수상태
    public $_is_register_names = ['Y' => '접수중','N' => '마감'];

    // 내용등록/수정 이미지 타입 설정
    public $_set_attache_type = [
        '0' => 'C',
        '1' => 'F',
        '2' => 'S',
        '3' => 'I'
    ];

    // 원본 이미지 후첨자
    //public $_img_postfix = '_og';
    // 썸네일 이미지 후첨자
    public $_thumb_postfixs = [
        'S' => '_sm',
        /*'M' => '_md',
        'L' => '_lg'*/
    ];

    // 댓글 이미지 등록 수
    public $_set_attach_comment_img_cnt = 2;

    // 썸네일 이미지 생성 비율
    private $_thumb_radio = [
        'S' => '50%',
        /*'M' => '150%',
        'L' => '200%'*/
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listAllEvent($is_count, $arr_condition = [], $sub_query_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.ElIdx, A.SiteCode, A.CampusCcd, A.RequstType, A.EventName, A.RegisterStartDate, A.RegisterEndDate,
            A.EventStartDate, A.EventStartHour, A.EventStartMin, A.EventEndDate, A.EventEndHour, A.EventEndMin,
            A.SendTel,
            A.ReadCnt, A.IsRegister, A.IsUse, A.RegDatm,
            G.SiteName, J.CcdName AS CampusName, D.CateCode, E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName,
            K.FileFullPath, K.FileName, IFNULL(H.CCount,\'0\') AS CommentCount,
            CASE RequstType WHEN 1 THEN \'설명회\' WHEN 2 THEN \'특강\' WHEN 3 THEN \'이벤트\' END AS RequstTypeName,
            CASE IsRegister WHEN \'Y\' THEN \'접수중\' WHEN 2 THEN \'마감\' END AS IsRegisterName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $sub_query_where = $this->_conn->makeWhere($sub_query_condition);
        $sub_query_where = $sub_query_where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['event_lecture']} AS A
            INNER JOIN (
                SELECT B.ElIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['event_lecture_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                {$sub_query_where}
                GROUP BY B.ElIdx
            ) AS D ON A.ElIdx = D.ElIdx
            LEFT JOIN (
                SELECT CIdx, ElIdx, COUNT(CIdx) AS CCount
                FROM {$this->_table['event_commnet']}
            ) AS H ON H.ElIdx = A.ElIdx
            INNER JOIN {$this->_table['event_file']} AS K ON A.ElIdx = K.ElIdx AND K.IsUse = 'Y' AND K.FileType = 'S'
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            LEFT OUTER JOIN {$this->_table['sys_code']} AS J ON A.CampusCcd = J.Ccd
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 이벤트/설명회/특강관리 등록
     * @param array $input
     * @return array|bool
     */
    public function addEventLecture($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $option_ccds = element('option_ccds', $input);
            $comment_use_area = element('comment_use_area', $input);

            $set_option_ccd = implode(',', $option_ccds);
            $set_comment_use_area = '';
            if (empty($comment_use_area) === false) {
                $set_comment_use_area = implode(',', $comment_use_area);
            }

            if (empty(element('event_start_datm', $input)) === true) {
                $event_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $event_start_datm = element('event_start_datm', $input) . ' ' . element('event_start_hour', $input) . ':' . element('event_start_min', $input) . ':00';
            }

            if (empty(element('event_end_datm', $input)) === true) {
                $event_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $event_end_datm = element('event_end_datm', $input) . ' ' . element('event_end_hour', $input) . ':' . element('event_end_min', $input) . ':00';
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'CampusCcd' => element('campus_ccd', $input),
                'RequstType' => element('requst_type', $input),
                'TakeType' => element('take_type', $input),
                'SubjectIdx' => element('subject_idx', $input),
                'ProfIdx' => element('prof_idx', $input),
                'RegisterStartDate' => element('register_start_date', $input),
                'RegisterEndDate' => element('register_end_date', $input),
                'IsRegister' => element('is_register', $input),
                'IsUse' => element('is_use', $input),
                'EventName' => element('event_name', $input),

                /*'EventStartDate' => $event_start_datm,
                'EventEndDate' => $event_end_datm,*/
                'EventStartDate' => (empty(element('event_start_datm', $input))) ? '0000-00-00' : element('event_start_datm', $input),
                'EventEndDate' => (empty(element('event_end_datm', $input))) ? '0000-00-00' : element('event_end_datm', $input),

                'EventNum' => (empty(element('event_num', $input))) ? '0' : element('event_num', $input),
                'ContentType' => element('content_type', $input),
                'Content' => element('content', $input),
                'OptionCcds' => $set_option_ccd,
                'LimitType' => element('limit_type', $input),
                'SelectType' => element('select_type', $input),
                'SendTel' => element('send_tel', $input),
                'SmsContent' => element('sms_content', $input),
                'PopupTitle' => element('popup_title', $input),
                'CommentUseArea' => $set_comment_use_area,
                'Link' => element('promotion_link', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'AdjuReadCnt' => (empty(element('setting_readCnt', $input))) ? '0' : element('setting_readCnt', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['event_lecture']) === false) {
                throw new \Exception('이벤트 등록에 실패했습니다.');
            }
            $el_idx = $this->_conn->insert_id();

            //카테고리 저장
            $category_code = element('cate_code', $input);
            foreach ($category_code as $key => $val) {
                $category_data['ElIdx'] = $el_idx;
                $category_data['CateCode'] = $val;
                $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $category_data['RegIp'] = $this->input->ip_address();
                if ($this->_addEventCategory($category_data) === false) {
                    throw new \Exception('카테고리 등록에 실패했습니다.');
                }
            }

            //이벤트 접수 관리(정원제한) 저장
            if ($option_ccds[0] == $this->_event_lecture_option_ccds[0]) {
                if ($this->_addEventRegister($el_idx, $input) === false) {
                    throw new \Exception('이벤트 정원제한 등록에 실패했습니다.');
                }
            }

            //파일저장
            if ($this->_addContentAttach($el_idx, count($this->_set_attache_type)) === false) {
                throw new \Exception('이벤트 파일 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 이벤트/설명회/특강관리 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyEventLecture($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $el_idx = element('el_idx', $input);
            $evnet_category_data = element('cate_code', $input);

            // 기존 배너 기본정보 조회
            $row = $this->findPopup('ElIdx', ['EQ' => ['ElIdx' => $el_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $option_ccds = element('option_ccds', $input);
            $comment_use_area = element('comment_use_area', $input);

            $set_option_ccd = implode(',', $option_ccds);
            $set_comment_use_area = '';
            if (empty($comment_use_area) === false) {
                $set_comment_use_area = implode(',', $comment_use_area);
            }

            if (empty(element('event_start_datm', $input)) === true) {
                $event_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $event_start_datm = element('event_start_datm', $input) . ' ' . element('event_start_hour', $input) . ':' . element('event_start_min', $input) . ':00';
            }

            if (empty(element('event_end_datm', $input)) === true) {
                $event_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $event_end_datm = element('event_end_datm', $input) . ' ' . element('event_end_hour', $input) . ':' . element('event_end_min', $input) . ':00';
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'CampusCcd' => element('campus_ccd', $input),
                'RequstType' => element('requst_type', $input),
                'TakeType' => element('take_type', $input),
                'SubjectIdx' => element('subject_idx', $input),
                'ProfIdx' => element('prof_idx', $input),
                'RegisterStartDate' => element('register_start_date', $input),
                'RegisterEndDate' => element('register_end_date', $input),
                'IsRegister' => element('is_register', $input),
                'IsUse' => element('is_use', $input),
                'EventName' => element('event_name', $input),

                /*'EventStartDate' => $event_start_datm,
                'EventEndDate' => $event_end_datm,*/
                'EventStartDate' => (empty(element('event_start_datm', $input))) ? '0000-00-00' : element('event_start_datm', $input),
                'EventEndDate' => (empty(element('event_end_datm', $input))) ? '0000-00-00' : element('event_end_datm', $input),

                'EventNum' => (empty(element('event_num', $input))) ? '0' : element('event_num', $input),
                'ContentType' => element('content_type', $input),
                'Content' => element('content', $input),
                'OptionCcds' => $set_option_ccd,
                'LimitType' => element('limit_type', $input),
                'SelectType' => element('select_type', $input),
                'SendTel' => element('send_tel', $input),
                'SmsContent' => element('sms_content', $input),
                'PopupTitle' => element('popup_title', $input),
                'CommentUseArea' => $set_comment_use_area,
                'Link' => element('promotion_link', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'AdjuReadCnt' => (empty(element('setting_readCnt', $input))) ? '0' : element('setting_readCnt', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($this->_conn->set($data)->where('ElIdx', $el_idx)->update($this->_table['event_lecture']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            // 카테고리수정
            $is_category = $this->_modifyEventCategory($el_idx, $evnet_category_data);
            if ($is_category !== true) {
                throw new \Exception($is_category);
            }

            // 파일수정
            $is_attach = $this->_modifyEventAttach($el_idx, count($this->_set_attache_type));
            if ($is_attach === false) {
                throw new \Exception($is_attach);
            }

            // 이벤트 접수 관리(정원제한), 기존 데이터 삭제 후 저장
            if ($option_ccds[0] == $this->_event_lecture_option_ccds[0]) {
                if ($this->_delEventRegister($el_idx) === false) {
                    throw new \Exception('이벤트 정원제한 등록에 실패했습니다.');
                }
                if ($this->_addEventRegister($el_idx, $input) === false) {
                    throw new \Exception('이벤트 정원제한 등록에 실패했습니다.');
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
     * 팝업 기본 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findPopup($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['event_lecture'], $column, $arr_condition);
    }

    /**
     * 수정 폼 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findEventForModify($arr_condition)
    {
        $column = "
            A.ElIdx, A.SiteCode, A.CampusCcd, A.RequstType, A.TakeType, A.SubjectIdx, A.ProfIdx, 
            A.RegisterStartDate, A.RegisterEndDate, A.IsRegister, A.IsUse, A.IsStatus, A.EventName,
            A.EventStartDate, A.EventStartHour, A.EventStartMin, A.EventEndDate, A.EventEndHour, A.EventEndMin, A.EventNum,
            A.ContentType, A.Content, A.OptionCcds, A.LimitType, A.SelectType,
            A.SendTel, A.SmsContent, A.PopupTitle, A.CommentUseArea, A.Link, A.ReadCnt, A.AdjuReadCnt,
            A.RegDatm, A.RegAdminIdx, A.RegIp, A.UpdDatm, A.UpdAdminIdx
            ";

        $from = "
            FROM {$this->_table['event_lecture']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 카테고리 연결 데이터 조회
     * @param $el_idx
     * @return array
     */
    public function listEventCategory($el_idx)
    {
        $column = '
            CC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table['event_lecture_r_category'] . ' as CC
                inner join ' . $this->_table['sys_category'] . ' as C
                    on CC.CateCode = C.CateCode
                left join ' . $this->_table['sys_category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where CC.ElIdx = ? and CC.IsStatus = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by CC.ElIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$el_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * 등록파일 데이터 조회
     * @param $el_idx
     * @return mixed
     */
    public function listEventForFile($el_idx)
    {
        $column = 'EfIdx, FileName, FileRealName, FileFullPath, FileType';
        $from = "
            FROM {$this->_table['event_file']}
        ";
        $where = ' where ElIdx = ? and IsUse = "Y"';
        $order_by_offset_limit = ' order by EfIdx asc';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$el_idx])->result_array();
    }

    /**
     * 이벤트 접수 관리(정원제한) 데이터 조회
     * @param $el_idx
     * @param $LimitType
     * @return bool
     */
    public function listEventForRegister($el_idx)
    {
        $column = 'ErIdx, PersonLimitType, PersonLimit, Name';
        $from = "
            FROM {$this->_table['event_register']}
        ";
        $where = ' where ElIdx = ? and IsStatus = "Y"';
        $order_by_offset_limit = ' order by ErIdx asc';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$el_idx])->result_array();
    }

    /**
     * 이벤트 접수 관리(정원제한) 단일 데이터 삭제
     * @param $er_idx
     * @return array|bool
     */
    public function delRegister($er_idx)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $admin_idx)->where('ErIdx', $er_idx);
            if ($this->_conn->update($this->_table['event_register']) === false) {
                throw new \Exception('데이터 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 이벤트 접수 관리(정원제한) 다중 데이터 삭제
     * @param $el_idx
     * @return array|bool
     */
    private function _delEventRegister($el_idx)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $admin_idx)->where('ElIdx', $el_idx);
            if ($this->_conn->update($this->_table['event_register']) === false) {
                throw new \Exception('데이터 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 파일저장
     * @param $el_idx
     * @param $cnt
     * @return bool
     */
    private function _addContentAttach($el_idx, $cnt)
    {
        try {
            $this->load->library('upload');
            $this->load->library('image_lib');

            $upload_dir = SUB_DOMAIN . '/event/' . date('Ymd');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($cnt), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {

                    if ($this->_set_attache_type[$idx] == 'S' || $this->_set_attache_type[$idx] == 'I') {
                        // 썸네일 생성
                        $new_imgs = $this->image_lib->getThumbImgNames($attach_files['orig_name'], $this->_thumb_postfixs);
                        $is_thumb = $this->image_lib->createThumbImgs($attach_files['full_path'], $new_imgs, array_values($this->_thumb_radio));
                        if ($is_thumb === false) {
                            throw new \Exception($is_thumb);
                        }
                    }

                    $set_attach_data['ElIdx'] = $el_idx;
                    $set_attach_data['FileName'] = $attach_files['orig_name'];
                    $set_attach_data['FileFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                    $set_attach_data['FileRealName'] = $attach_files['client_name'];
                    $set_attach_data['FileType'] = $this->_set_attache_type[$idx];

                    $set_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_attach_data['RegIp'] = $this->input->ip_address();

                    if ($this->_addEventAttach($set_attach_data) === false) {
                        throw new \Exception('fail');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일 등록
     * @param $inputData
     * @return bool
     */
    private function _addEventAttach($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table['event_file']) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 카테고리 등록
     * @param $input
     * @return bool
     */
    private function _addEventCategory($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['event_lecture_r_category']) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 이벤트 접수 관리(정원제한) 저장
     * @param $el_idx
     * @param $input
     * @return bool
     */
    private function _addEventRegister($el_idx, $input)
    {
        $limit_type = element('limit_type', $input);

        try {
            if ($limit_type == 'S') {
                $reg_set_data = [
                    'ElIdx' => $el_idx,
                    'PersonLimitType' => element('person_limit_type', $input),
                    'PersonLimit' => element('person_limit', $input),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];

                if ($this->_conn->set($reg_set_data)->insert($this->_table['event_register']) === false) {
                    throw new \Exception('fail');
                }
            } else if ($limit_type == 'M') {
                $event_register_parson_limit_type = element('event_register_parson_limit_type', $input);
                $event_register_parson_limit = element('event_register_parson_limit', $input);
                $event_register_name = element('event_register_name', $input);

                if (empty($event_register_parson_limit_type) === false) {
                    foreach ($event_register_parson_limit_type as $key => $val) {
                        $reg_set_data = [
                            'ElIdx' => $el_idx,
                            'PersonLimitType' => $val,
                            'PersonLimit' => $event_register_parson_limit[$key],
                            'Name' => $event_register_name[$key],
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                            'RegIp' => $this->input->ip_address()
                        ];

                        if ($this->_conn->set($reg_set_data)->insert($this->_table['event_register']) === false) {
                            throw new \Exception('fail');
                        }
                    }
                }
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
        $postfix = '';
        for ($i = 0; $i < $cnt; $i++) {
            if (empty($this->_set_attache_type[$i]) === false) {
                if ($this->_set_attache_type[$i] == 'S' || $this->_set_attache_type[$i] == 'I') {
                    $postfix = $this->_thumb_postfixs['S'];
                }
            }

            $attach_file_names[] = 'event_' . $i . '_' . $temp_time . $postfix;
        }
        return $attach_file_names;
    }

    /**
     * 카테고리 조회
     * @param $el_idx
     * @return array|int
     */
    private function _getEventCategoryArray($el_idx)
    {
        $arr_condition = ['EQ' => ['IsStatus' => 'Y', 'ElIdx' => $el_idx]];
        $data = $this->_conn->getListResult($this->_table['event_lecture_r_category'], 'CcIdx, CateCode', $arr_condition, null, null, [
            'CcIdx' => 'asc'
        ]);
        $data = array_pluck($data, 'CateCode', 'CcIdx');
        return $data;
    }

    /**
     * 카테고리 수정
     * @param $el_idx
     * @param $event_category_data
     * @return bool|string
     */
    private function _modifyEventCategory($el_idx, $event_category_data)
    {
        try {
            // 기존 카테고리 조회
            $arr_event_category = array_values($this->_getEventCategoryArray($el_idx));
            $up_arr_category_data = array_diff($arr_event_category, $event_category_data);     //N 업데이트
            $ins_arr_category_data = array_diff($event_category_data, $arr_event_category);     //insert

            $up_cate_data = [];
            foreach ($up_arr_category_data as $key => $val) {
                $up_cate_data['ElIdx'] = $el_idx;
                $up_cate_data['CateCode'] = $val;
                if ($this->_updateEventCategory($up_cate_data) === false) {
                    throw new \Exception('게시판 등록(카테고리)에 실패했습니다.');
                }
            }

            $ins_cate_data = [];
            foreach ($ins_arr_category_data as $key => $val) {
                $ins_cate_data['ElIdx'] = $el_idx;
                $ins_cate_data['CateCode'] = $val;
                $ins_cate_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $ins_cate_data['RegIp'] = $this->input->ip_address();
                if ($this->_addEventCategory($ins_cate_data) === false) {
                    throw new \Exception('게시판 등록(카테고리)에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 카테고리 업데이트
     * @param $whereData
     * @return bool
     */
    private function _updateEventCategory($whereData)
    {
        try {
            $input['IsStatus'] = 'N';
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table['event_lecture_r_category']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일 수정
     * 파일 등록 상태에 따른 DB insert, update 분기 처리
     * update 발생 시 파일 삭제 처리
     * @param $el_idx
     * @param $cnt
     * @return array|bool
     */
    private function _modifyEventAttach($el_idx, $cnt)
    {
        try {
            $el_attach_data = $_FILES['attach_file']['size'];
            $arr_event_attach = $this->_getEventAttachArray($el_idx);
            $arr_event_attach_keys = array_keys($arr_event_attach);

            $this->load->library('upload');
            $this->load->library('image_lib');
            $upload_dir = SUB_DOMAIN . '/event/' . date('Ymd');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($cnt), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($el_attach_data as $key => $val) {
                /*if (empty($val) === false && $val != 'blob') {*/
                if ($val > 0) {
                    if ($this->_set_attache_type[$key] == 'S' || $this->_set_attache_type[$key] == 'I') {
                        // 썸네일 생성
                        $new_imgs = $this->image_lib->getThumbImgNames($uploaded[$key]['orig_name'], $this->_thumb_postfixs);
                        $is_thumb = $this->image_lib->createThumbImgs($uploaded[$key]['full_path'], $new_imgs, array_values($this->_thumb_radio));
                        if ($is_thumb === false) {
                            throw new \Exception($is_thumb);
                        }
                    }

                    if (empty($arr_event_attach_keys[$key]) === true) {
                        //ins
                        $set_attach_data['ElIdx'] = $el_idx;
                        $set_attach_data['FileName'] = $uploaded[$key]['orig_name'];
                        $set_attach_data['FileFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                        $set_attach_data['FileRealName'] = $uploaded[$key]['client_name'];
                        $set_attach_data['FileType'] = $this->_set_attache_type[$key];
                        $set_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                        $set_attach_data['RegIp'] = $this->input->ip_address();

                        if ($this->_addEventAttach($set_attach_data) === false) {
                            throw new \Exception('파일 등록에 실패했습니다.');
                        }
                    } else {
                        //up, 기존 파일 삭제
                        $this->load->helper('file');
                        $real_img_path = public_to_upload_path($arr_event_attach[$arr_event_attach_keys[$key]]);

                        if (@unlink($real_img_path) === false) {
                            throw new \Exception('이미지 삭제에 실패했습니다.');
                        }

                        $set_attach_data['FileFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                        $set_attach_data['FileName'] = $uploaded[$key]['orig_name'];
                        $set_attach_data['FileRealName'] = $uploaded[$key]['client_name'];

                        $whereData = [
                            'EfIdx' => $arr_event_attach_keys[$key]
                        ];

                        if ($this->_updateEventAttach($set_attach_data, $whereData) === false) {
                            throw new \Exception('파일 수정에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 파일 목록 조회
     * @param $el_idx
     * @return array|int
     */
    private function _getEventAttachArray($el_idx)
    {
        $arr_condition = [
            'EQ' => [
                'IsUse' => 'Y',
                'ElIdx' => $el_idx
            ]
        ];
        $data = $this->_conn->getListResult($this->_table['event_file'], 'EfIdx, CONCAT(FileFullPath, FileName) AS FileInfo', $arr_condition, null, null, [
            'EfIdx' => 'asc'
        ]);

        $data = array_pluck($data, 'FileInfo', 'EfIdx');

        return $data;
    }

    /**
     * 파일 수정
     * @param $input
     * @param $whereData
     * @return bool
     */
    private function _updateEventAttach($input, $whereData)
    {
        try {
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table['event_file']) === false) {
                throw new \Exception('파일 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}