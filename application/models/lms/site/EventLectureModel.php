<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLectureModel extends WB_Model
{
    private $_table = [
        'event_lecture' => 'lms_event_lecture',
        'event_lecture_r_category' => 'lms_event_r_category',
        'event_register' => 'lms_event_register',
        'event_file' => 'lms_event_file',
        'event_comment' => 'lms_event_comment',
        'event_member' => 'lms_event_member',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'member' => 'lms_member',
        'admin' => 'wbs_sys_admin'
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
    public $_requst_type_names = ['1' => '설명회','22' => '특강','3' => '이벤트',];

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

    // 공지사항 이미지 등록 수
    public $_attach_img_cnt = 2;
    
    // 이벤트 공지사항 식별자
    public $bm_idx = '86';

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
            A.ElIdx, A.SiteCode, A.CampusCcd, A.BIdx, A.IsBest, A.RequstType, A.EventName, A.RegisterStartDate, A.RegisterEndDate, A.OptionCcds,
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
                FROM {$this->_table['event_comment']}
            ) AS H ON H.ElIdx = A.ElIdx
            LEFT JOIN {$this->_table['event_file']} AS K ON A.ElIdx = K.ElIdx AND K.IsUse = 'Y' AND K.FileType = 'S'
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

            //이벤트에 등록된 배너 정보 조회
            $arr_condition = [
                'EQ' => [
                    'BIdx' => element('banner_idx', $input)
                ]
            ];
            $banner_row = $this->findEvent('BIdx', $arr_condition);
            if (count($banner_row) > 0) {
                throw new \Exception('등록된 배너가 있습니다.', _HTTP_NOT_FOUND);
            }

            $set_option_ccd = implode(',', $option_ccds);
            $set_comment_use_area = '';
            if (empty($comment_use_area) === false) {
                $set_comment_use_area = implode(',', $comment_use_area);
            }

            if (empty(element('register_start_datm', $input)) === true) {
                $register_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $register_start_datm = element('register_start_datm', $input) . ' ' . element('register_start_hour', $input) . ':' . element('register_start_min', $input) . ':00';
            }

            if (empty(element('register_end_datm', $input)) === true) {
                $register_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $register_end_datm = element('register_end_datm', $input) . ' ' . element('register_end_hour', $input) . ':' . element('register_end_min', $input) . ':00';
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'CampusCcd' => element('campus_ccd', $input),
                'RequstType' => element('requst_type', $input),
                'TakeType' => element('take_type', $input),
                'BIdx' => element('banner_idx', $input),
                'SubjectIdx' => element('subject_idx', $input),
                'ProfIdx' => element('prof_idx', $input),
                'IsBest' => element('is_best', $input, 0),
                'RegisterStartDate' => $register_start_datm,
                'RegisterEndDate' => $register_end_datm,
                'IsRegister' => element('is_register', $input),
                'IsUse' => element('is_use', $input),
                'EventName' => element('event_name', $input),
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
     * 게시글 복사
     * @param $el_idx
     * @return array|bool
     */
    public function eventLectureCopy($el_idx)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            // 기존 카테고리 조회
            $arr_event_category = $this->_getEventCategoryArray($el_idx);

            // 기존 접수관리 데이터 조회
            $arr_event_register = $this->listEventForRegister($el_idx);

            // 데이터 복사 실행
            $insert_column = '
                SiteCode, CampusCcd, BIdx, IsBest, RequstType, TakeType, SubjectIdx, ProfIdx, RegisterStartDate, RegisterEndDate, IsRegister, IsUse, IsStatus, EventName,
                ContentType, Content, OptionCcds, LimitType, SelectType, SendTel, SmsContent, PopupTitle, CommentUseArea, Link, ReadCnt, AdjuReadCnt,
                RegAdminIdx, RegIp
            ';
            $select_column = '
                SiteCode, CampusCcd, BIdx, IsBest, RequstType, TakeType, SubjectIdx, ProfIdx, RegisterStartDate, RegisterEndDate, IsRegister, IsUse, IsStatus,
                CONCAT("복사본-", IF(LEFT(EventName,4)="복사본-", REPLACE(EventName, LEFT(EventName,4), ""), EventName)) AS EventName,
                ContentType, Content, OptionCcds, LimitType, SelectType, SendTel, SmsContent, PopupTitle, CommentUseArea, Link, ReadCnt, AdjuReadCnt,
                REPLACE(RegAdminIdx, RegAdminIdx, "'.$admin_idx.'") AS RegAdminIdx,
                REPLACE(RegIp, RegIp, "'.$reg_ip.'") AS RegIp
            ';
            $query = "insert into {$this->_table['event_lecture']} ({$insert_column})
                select {$select_column} from {$this->_table['event_lecture']}
                where ElIdx = {$el_idx}";
            $result = $this->_conn->query($query);
            $insert_event_idx = $this->_conn->insert_id();

            if ($result === true) {
                foreach ($arr_event_category as $key => $val) {
                    $set_event_category_data['ElIdx'] = $insert_event_idx;
                    $set_event_category_data['CateCode'] = $val;
                    $set_event_category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_event_category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addEventCategory($set_event_category_data) === false) {
                        throw new \Exception('복사 중 카테고리 등록에 실패했습니다.');
                    }
                }

                foreach ($arr_event_register as $key => $row) {
                    $set_event_register_data['ElIdx'] = $insert_event_idx;
                    $set_event_register_data['PersonLimitType'] = $row['PersonLimitType'];
                    $set_event_register_data['PersonLimit'] = $row['PersonLimit'];
                    $set_event_register_data['Name'] = $row['Name'];
                    $set_event_register_data['RegAdminIdx'] = $admin_idx;
                    $set_event_register_data['RegIp'] = $reg_ip;

                    $this->_addEventRegisterCopy($set_event_register_data);
                }
            } else {
                throw new \Exception('게시물 복사에 실패했습니다.');
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

            //이벤트에 등록된 배너 정보 조회
            $arr_condition = [
                'EQ' => [
                    'BIdx' => element('banner_idx', $input)
                ],
                'NOT' => ['ElIdx' => $el_idx]
            ];
            $banner_row = $this->findEvent('BIdx', $arr_condition);
            if (count($banner_row) > 0) {
                throw new \Exception('등록된 배너가 있습니다.', _HTTP_NOT_FOUND);
            }

            //정보 조회
            $row = $this->findEvent('ElIdx', ['EQ' => ['ElIdx' => $el_idx]]);
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

            if (empty(element('register_start_datm', $input)) === true) {
                $register_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $register_start_datm = element('register_start_datm', $input) . ' ' . element('register_start_hour', $input) . ':' . element('register_start_min', $input) . ':00';
            }

            if (empty(element('register_end_datm', $input)) === true) {
                $register_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $register_end_datm = element('register_end_datm', $input) . ' ' . element('register_end_hour', $input) . ':' . element('register_end_min', $input) . ':00';
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'CampusCcd' => element('campus_ccd', $input),
                'RequstType' => element('requst_type', $input),
                'TakeType' => element('take_type', $input),
                'BIdx' => element('banner_idx', $input),
                'IsBest' => element('is_best', $input, 0),
                'SubjectIdx' => element('subject_idx', $input),
                'ProfIdx' => element('prof_idx', $input),
                'RegisterStartDate' => $register_start_datm,
                'RegisterEndDate' => $register_end_datm,
                'IsRegister' => element('is_register', $input),
                'IsUse' => element('is_use', $input),
                'EventName' => element('event_name', $input),
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
                if ($this->_addEventRegister($el_idx, $input, 'modify') === false) {
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
    public function findEvent($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['event_lecture'], $column, $arr_condition);
    }

    public function getFindEventArray($arr_condition = [])
    {
        $column = 'ElIdx, SiteCode, BIdx';
        $arr_condition['EQ']['IsStatus'] = 'Y';

        $data = $this->_conn->getListResult($this->_table['event_lecture'], $column, $arr_condition);
        return $data;
        /*return array_pluck($data, 'BIdx', '');*/
    }

    /**
     * 수정 폼 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findEventForModify($arr_condition)
    {
        $column = "
            A.ElIdx, A.SiteCode, A.CampusCcd, A.RequstType, A.TakeType, A.SubjectIdx, A.ProfIdx, A.IsBest, A.BIdx,
            A.RegisterStartDate, A.RegisterEndDate, A.IsRegister, A.IsUse, A.IsStatus, A.EventName,
            DATE_FORMAT(A.RegisterStartDate, '%Y-%m-%d') AS RegisterStartDay, DATE_FORMAT(A.RegisterStartDate, '%H') AS RegisterStartHour, DATE_FORMAT(A.RegisterStartDate, '%i') AS RegisterStartMin,
            DATE_FORMAT(A.RegisterEndDate, '%Y-%m-%d') AS RegisterEndDay, DATE_FORMAT(A.RegisterEndDate, '%H') AS RegisterEndHour, DATE_FORMAT(A.RegisterEndDate, '%i') AS RegisterEndMin,
            A.ContentType, A.Content, A.OptionCcds, A.LimitType, A.SelectType,
            A.SendTel, A.SmsContent, A.PopupTitle, A.CommentUseArea, A.Link, A.ReadCnt, A.AdjuReadCnt,
            A.RegDatm, A.RegAdminIdx, A.RegIp, A.UpdDatm, A.UpdAdminIdx, C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName,
            B.SiteName, E.CcdName AS CampusName
            ";

        $from = "
            FROM {$this->_table['event_lecture']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
            INNER JOIN {$this->_table['sys_code']} AS E ON A.CampusCcd = E.Ccd AND E.IsStatus='Y'
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
     * 이벤트 접수관리(정원제한) 데이터 조회
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
     * 접수관리 회원 신청 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllEventRegister($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.EmIdx, A.MemIdx, B.PersonLimitType, B.PersonLimit, B.Name AS RegisterName, A.RegDatm,
            C.MemName, C.MemId, fn_dec(C.PhoneEnc) AS Phone, fn_dec(C.MailEnc) AS Mail, D.MemCnt
            ';

            if ($is_count == 'excel') {
                $column = 'C.MemName, C.MemId, fn_dec(C.PhoneEnc) AS Phone, fn_dec(C.MailEnc) AS Mail, A.RegDatm, B.Name AS RegisterName, D.MemCnt';
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['event_member']} AS A
            INNER JOIN {$this->_table['event_register']} AS B ON A.ErIdx = B.ErIdx
            INNER JOIN {$this->_table['member']} AS C ON A.MemIdx = C.MemIdx
            LEFT JOIN (
		        SELECT MemIdx, COUNT(MemIdx) AS memCnt FROM {$this->_table['event_member']} GROUP BY MemIdx
            ) AS D ON A.MemIdx = D.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 접수관리 회원 신청 수
     * @param $er_idx
     * @return mixed
     */
    public function getRegisterMemberCount($er_idx)
    {
        $column = 'count(B.EmIdx) as memberCnt, A.PersonLimitType';
        $from = "
            FROM {$this->_table['event_register']} AS A
            INNER JOIN {$this->_table['event_member']} AS B ON A.ErIdx = B.ErIdx
        ";
        $where = ' where A.ErIdx = ? ';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where, [$er_idx])->result_array();
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
     * 댓글리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllEventComment($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'A.CIdx, A.ElIdx, A.MemIdx, A.MemName, A.AdminIdx, A.CommentType, A.Comment AS eventComment, A.IsUse, A.RegDatm,
                        B.MemId, fn_dec(B.PhoneEnc) AS Phone, fn_dec(B.MailEnc) AS Mail
            ';

            if ($is_count == 'excel') {
                $column = 'A.MemName, B.MemId, fn_dec(B.PhoneEnc) AS Phone, fn_dec(B.MailEnc) AS Mail, A.Comment AS eventComment, A.RegDatm, A.IsUse';
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['event_comment']} AS A
            LEFT JOIN {$this->_table['member']} AS B ON A.MemIdx = B.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 댓글등록
     * @param array $input
     * @return array|bool
     */
    public function addEventComment($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            $data = [
                'ElIdx' => element('comment_el_idx', $input),
                'MemName' => element('admin_name', $input),
                'AdminIdx' => $admin_idx,
                'CommentType' => 'A',
                'Comment' => element('event_comment', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $reg_ip
            ];

            if ($this->_conn->set($data)->insert($this->_table['event_comment']) === false) {
                throw new \Exception('이벤트 댓글 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 이벤트 공지사항 조회 페이징 처리 없음
     * @param $arr_condition
     * @return mixed
     */
    public function listEventNotice($arr_condition)
    {
        $limit = 100;   // 페이지처리 없음으로 인한 limit 셋팅
        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName
        ';

        return $this->boardModel->listAllBoard('notice', false, $arr_condition, '', '', $limit, '', ['LB.BoardIdx' => 'DESC'], $column);
    }

    /**
     * 이벤트 공지사항 등록
     * @param $method
     * @param $inputData
     * @param $board_idx
     * @return mixed
     */
    public function addEventNotice($method, $inputData, $board_idx)
    {
        return $this->boardModel->{$method . 'Board'}($inputData);
    }

    /**
     * 이벤트 공지사항 수정
     * @param $method
     * @param $inputData
     * @param $board_idx
     * @return mixed
     */
    public function modifyEventNotice($method, $inputData, $board_idx)
    {
        return $this->boardModel->{$method . 'Board'}($inputData, $board_idx);
    }

    /**
     * 이벤트 공지사항 수정
     * @param $board_idx
     * @return mixed
     */
    public function findEventNoticeForModify($board_idx)
    {
        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName,
            LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm
            ';

        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.IsStatus' => 'Y',
                'LB.RegType' => 1
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => 1,
            'attach_file_type' => 0
        ];
        return $this->boardModel->findBoardForModify('notice', $column, $arr_condition, $arr_condition_file);
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

            $upload_dir = config_item('upload_prefix_dir') . '/event/' . date('Ymd');
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
                throw new \Exception('카테고리 등록에 실패했습니다.');
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
     * @param $regi_type (modify 일경우 기존 데이터 삭제)
     * @return bool
     */
    private function _addEventRegister($el_idx, $input, $regi_type = 'add')
    {
        $limit_type = element('limit_type', $input);

        try {
            if ($regi_type == 'modify') {
                $up_register_input['IsStatus'] = 'N';
                $up_register_input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
                $up_register_input['UpdDatm'] = date('Y-m-d H:i:s');

                $this->_conn->set($up_register_input)->where(['ElIdx' => $el_idx, 'IsStatus' => 'Y']);

                if ($this->_conn->update($this->_table['event_register']) === false) {
                    throw new \Exception('데이터 수정에 실패했습니다.');
                }
            }

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
     * 이벤트 접수 관리(정원제한) 복사 (저장)
     * @param $input
     * @return bool
     */
    private function _addEventRegisterCopy($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['event_register']) === false) {
                throw new \Exception('접수 관리 등록에 실패했습니다.');
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
            $upload_dir = config_item('upload_prefix_dir') . '/event/' . date('Ymd');

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