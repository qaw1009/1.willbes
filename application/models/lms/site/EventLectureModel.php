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
        'event_member_successinfo' => 'lms_event_member_successinfo',
        'event_promotion_otherinfo' => 'lms_event_promotion_otherinfo',
        'event_promotion_live_video' => 'lms_Event_Promotion_Live_Video',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'member' => 'lms_member',
        'member_otherinfo' => 'lms_member_otherinfo',
        'banner' => 'lms_banner',
        'admin' => 'wbs_sys_admin',
        'product_subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'event_register_r_product' => 'lms_event_register_r_product',
        'product' => 'lms_product',
        'event_add_apply' => 'lms_event_add_apply',
        'event_add_apply_member' => 'lms_event_add_apply_member',
        'event_display_product' => 'lms_event_display_product'
    ];

    public $_groupCcd = [
        'option' => '660',
        'SerialCcd' => '666',
        'CandidateAreaCcd' => '631',
        'SmsSendCallBackNum' => '706',   //SMS 발송번호
        'CommentUiType' => '713'        //댓글 UI 종류
    ];

    // 이벤트 접수 관리(정원제한), 댓글기능, 자동문자, 바로신청팝업, 추가프로모션신청
    public $_event_lecture_option_ccds = [
        '0' => '660001',
        '1' => '660002',
        '2' => '660003',
        '3' => '660004',
        '4' => '660005'
    ];

    // 신청유형
    public $_request_type_names = ['1' => '설명회','2' => '특강','3' => '이벤트','4'=>'합격수기','5'=>'프로모션'];
    public $_option_rules = ['1','2','3'];

    // 참여구분
    public $_take_type_names = ['1' => '회원','2' => '회원+비회원'];

    // 접수상태
    public $_is_register_names = ['Y' => '접수중','N' => '마감'];

    // 내용등록/수정 이미지 타입 설정
    public $_set_attache_type = [
        '0' => 'C',
        '1' => 'F',
        '2' => 'S',
        '3' => 'I',
        '4' => 'R'
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
    public $_attach_img_cnt = 7;
    
    // 이벤트 공지사항 식별자
    public $bm_idx = '86';

    // 이벤트 합격수기 : 합격구분
    public  $_successType = ['1' => '필기', '2' => '최종'];

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

    public function listAllEvent($is_count, $arr_condition = [], $sub_query_condition = [], $site_code = '', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.ElIdx, A.SiteCode, A.CampusCcd, A.PromotionCode, A.BIdx, A.IsBest, A.RequestType, A.EventName, A.RegisterStartDate, A.RegisterEndDate, A.OptionCcds,
            A.ReadCnt, A.IsRegister, A.IsCopy, A.IsUse, A.RegDatm,
            G.SiteName, J.CcdName AS CampusName, D.CateCode, E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName,
            K.Ordering, K.FileFullPath, K.FileName, IFNULL(H.CCount,\'0\') AS CommentCount,
            CASE RequestType WHEN 1 THEN \'설명회\' WHEN 2 THEN \'특강\' WHEN 3 THEN \'이벤트\' WHEN 4 THEN \'합격수기\' WHEN 5 THEN \'프로모션\' END AS RequestTypeName,
            CASE IsRegister WHEN \'Y\' THEN \'접수중\' WHEN \'N\' THEN \'마감\' END AS IsRegisterName,
            L.BannerName, L.BannerFullPath, L.BannerImgName, L.BannerImgRealName,
            P.PromotionAttachFilePath, P.PromotionAttachFileName, P.PromotionAttachRealFileName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $sub_query_where = $this->_conn->makeWhere($sub_query_condition);
        $sub_query_where = $sub_query_where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['event_lecture']} AS A
            LEFT JOIN (
                SELECT B.ElIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['event_lecture_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                {$sub_query_where}
                GROUP BY B.ElIdx
            ) AS D ON A.ElIdx = D.ElIdx
            LEFT JOIN (
                SELECT CIdx, ElIdx, COUNT(CIdx) AS CCount
                FROM {$this->_table['event_comment']}
                GROUP BY ElIdx
            ) AS H ON H.ElIdx = A.ElIdx
            LEFT JOIN {$this->_table['event_file']} AS K ON A.ElIdx = K.ElIdx AND K.IsUse = 'Y' AND K.FileType = 'S'
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            LEFT OUTER JOIN {$this->_table['sys_code']} AS J ON A.CampusCcd = J.Ccd
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['banner']} AS L ON A.BIdx = L.BIdx AND L.LinkType = 'layer'
            LEFT OUTER JOIN (
                SELECT ElIdx, GROUP_CONCAT(FileFullPath) AS PromotionAttachFilePath, GROUP_CONCAT(FileName) AS PromotionAttachFileName, GROUP_CONCAT(FileRealName) AS PromotionAttachRealFileName
                FROM {$this->_table['event_file']}
                WHERE IsUse = 'Y' AND FileType = 'P'
                GROUP BY ElIdx
            ) AS P ON A.ElIdx = P.ElIdx
        ";

        /*$arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);*/
        if (empty($site_code) === false) {
            $arr_condition['EQ']['A.SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);
        }

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

        // 쿼리 실행
        $where = $where_temp . $where_campus;

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
            $comment_ui_type_ccds = element('comment_ui_type_ccds', $input);
            $ordering = element('Ordering', $input);
            $request_type = element('request_type', $input);    //신청유형
            $promotion_live_type = element('promotion_live_type', $input, 'N');    //라이브송출관리타입

            if ($this->_request_type_names[$request_type] == '프로모션') {
                $content = element('promotion_content', $input);
            } else {
                $content = element('content', $input);
            }

            if (empty($option_ccds) === false) {
                foreach ($option_ccds as $key => $val) {
                    switch ($val) {
                        case $this->eventLectureModel->_event_lecture_option_ccds[3] :
                            //이벤트에 등록된 배너 정보 조회
                            $arr_condition = [
                                'EQ' => [
                                    'BIdx' => element('banner_idx', $input)
                                ]
                            ];
                            $banner_row = $this->findEvent('BIdx', $arr_condition);
                            if (empty($banner_row) === false) {
                                throw new \Exception('등록된 배너가 있습니다.', _HTTP_NOT_FOUND);
                            }
                            break;
                    }
                }
            }

            // 프로모션코드 셋팅
            $promotionCode = $this->_setPromotionCode();

            $set_option_ccd = (empty($option_ccds) === false) > 0 ? implode(',', $option_ccds) : '';
            $set_comment_use_area = '';
            if (empty($comment_use_area) === false) {
                $set_comment_use_area = implode(',', $comment_use_area);
            }

            $set_comment_ui_type_ccds = '';
            if (empty($comment_ui_type_ccds) === false) {
                $set_comment_ui_type_ccds = implode(',', $comment_ui_type_ccds);
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
                'RequestType' => element('request_type', $input),
                'TakeType' => element('take_type', $input),
                'PromotionCode' => $promotionCode,
                'PromotionParams' => element('promotion_params', $input),
                'PromotionLiveType' => $promotion_live_type,
                'PromotionLivePlayer' => element('promotion_live_player', $input),
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
                'Content' => $content,
                'OptionCcds' => $set_option_ccd,
                'LimitType' => element('limit_type', $input),
                'SelectType' => element('select_type', $input),
                'SendTel' => element('send_tel', $input),
                'SmsContent' => element('sms_content', $input),
                'PopupTitle' => element('popup_title', $input),
                'CommentUseArea' => $set_comment_use_area,
                'CommentUiTypeCcds' => $set_comment_ui_type_ccds,
                'Link' => element('promotion_link', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'AdjuReadCnt' => (empty(element('setting_readCnt', $input))) ? '0' : element('setting_readCnt', $input),
                'CommentPointType' => element('comment_point_type', $input),
                'CommentPointAmount' => element('comment_point_amount', $input),
                'CommentPointValidDays' => element('comment_point_valid_days', $input),
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
            if (empty($category_code) === false) {
                foreach ($category_code as $key => $val) {
                    $category_data['ElIdx'] = $el_idx;
                    $category_data['CateCode'] = $val;
                    $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addEventCategory($category_data) === false) {
                        throw new \Exception('카테고리 등록에 실패했습니다.');
                    }
                }
            }

            //이벤트 접수 관리(정원제한) 저장
            if ($option_ccds[0] == $this->_event_lecture_option_ccds[0]) {
                if ($this->_addEventRegister($el_idx, $input) === false) {
                    throw new \Exception('이벤트 정원제한 등록에 실패했습니다.');
                }
            }

            // 이벤트 파일저장
            $this->load->library('upload');
            $this->load->library('image_lib');
            if ($this->_addContentAttach($el_idx, count($this->_set_attache_type)) === false) {
                throw new \Exception('이벤트 파일 등록에 실패했습니다.');
            }

            // 프로모션 파일저장
            $promo_file_cnt = (empty($_FILES['attach_file_promotion']) === true) ? '0' : count($_FILES['attach_file_promotion']['name']);
            if ($this->_addContentAttachByPromotion($el_idx, $promo_file_cnt, $ordering) === false) {
                throw new \Exception('프로모션 파일 등록에 실패했습니다.');
            }

            // 프로모션 부가정보 저장
            if (empty($promotionCode) === false) {
                if ($this->_addPromotionOtherInfo($promotionCode, $input) === false) {
                    throw new \Exception('프로모션 상세설정 등록에 실패했습니다.');
                }
            }

            // 프로모션 라이브송출 데이터 저장
            if ($promotion_live_type == 'Y') {
                if ($this->_addPromotionLiveVideo($promotionCode, $input) === false) {
                    throw new \Exception('프로모션 라이브송출데이터 등록에 실패했습니다.');
                }
            }

            // 이벤트 DP상품 저장
            if(empty($input['edp_idx']) === false) {
                if ($this->_addEventDisplayProduct($el_idx, $input) === false) {
                    throw new \Exception('이벤트 DP상품 등록에 실패했습니다.');
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

            // 프로모션코드 셋팅
            $promotionCode = $this->_setPromotionCode();

            // 데이터 복사 실행
            $insert_column = '
                SiteCode, CampusCcd, PromotionCode, PromotionParams, PromotionLiveType, , BIdx, IsBest, RequestType, TakeType, SubjectIdx, ProfIdx, RegisterStartDate, RegisterEndDate, IsRegister, IsCopy, IsUse, IsStatus, EventName,
                ContentType, Content, OptionCcds, LimitType, SelectType, SendTel, SmsContent, PopupTitle, CommentUseArea, Link, ReadCnt, AdjuReadCnt,
                RegAdminIdx, RegIp
            ';
            $select_column = '
                SiteCode, CampusCcd, '.$promotionCode.', PromotionParams, PromotionLiveType, BIdx, IsBest, RequestType, TakeType, SubjectIdx, ProfIdx, RegisterStartDate, RegisterEndDate, IsRegister, "Y", "N", IsStatus,
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
     * @param bool $promotion_modify_type
     * @return array|bool
     */
    public function modifyEventLecture($input = [], $promotion_modify_type = false)
    {
        $this->_conn->trans_begin();

        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $el_idx = element('el_idx', $input);
            $ordering = element('Ordering', $input);
            $event_category_data = element('cate_code', $input);
            $option_ccds = element('option_ccds', $input);
            $request_type = element('request_type', $input);    //신청유형
            $promotion_live_type = element('promotion_live_type', $input, 'N');    //라이브송출관리타입

            if ($this->_request_type_names[$request_type] == '프로모션') {
                $content = element('promotion_content', $input);
            } else {
                $content = element('content', $input);
            }

            if (empty($option_ccds) === false) {
                foreach ($option_ccds as $key => $val) {
                    switch ($val) {
                        case $this->eventLectureModel->_event_lecture_option_ccds[3] :
                            //이벤트에 등록된 배너 정보 조회
                            $arr_condition = [
                                'EQ' => [
                                    'BIdx' => element('banner_idx', $input)
                                ],
                                'NOT' => ['ElIdx' => $el_idx]
                            ];
                            $banner_row = $this->findEvent('BIdx', $arr_condition);
                            if (empty($banner_row) === false) {
                                throw new \Exception('등록된 배너가 있습니다.', _HTTP_NOT_FOUND);
                            }
                        break;
                    }
                }
            }

            //정보 조회
            $row = $this->findEvent('ElIdx', ['EQ' => ['ElIdx' => $el_idx]]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $comment_use_area = element('comment_use_area', $input);
            $comment_ui_type_ccds = element('comment_ui_type_ccds', $input);
            $set_option_ccd = (empty($option_ccds) === false) ? implode(',', $option_ccds) : '';
            $set_comment_use_area = '';
            if (empty($comment_use_area) === false) {
                $set_comment_use_area = implode(',', $comment_use_area);
            }

            $set_comment_ui_type_ccds = '';
            if (empty($comment_ui_type_ccds) === false) {
                $set_comment_ui_type_ccds = implode(',', $comment_ui_type_ccds);
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
                'RequestType' => element('request_type', $input),
                'TakeType' => element('take_type', $input),
                'PromotionParams' => element('promotion_params', $input),
                'PromotionLiveType' => $promotion_live_type,
                'PromotionLivePlayer' => element('promotion_live_player', $input),
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
                'Content' => $content,
                'OptionCcds' => $set_option_ccd,
                'LimitType' => element('limit_type', $input),
                'SelectType' => element('select_type', $input),
                'SendTel' => element('send_tel', $input),
                'SmsContent' => element('sms_content', $input),
                'PopupTitle' => element('popup_title', $input),
                'CommentUseArea' => $set_comment_use_area,
                'CommentUiTypeCcds' => $set_comment_ui_type_ccds,
                'Link' => element('promotion_link', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'AdjuReadCnt' => (empty(element('setting_readCnt', $input))) ? '0' : element('setting_readCnt', $input),
                'CommentPointType' => element('comment_point_type', $input),
                'CommentPointAmount' => element('comment_point_amount', $input),
                'CommentPointValidDays' => element('comment_point_valid_days', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($promotion_modify_type === true) {
                $data['PromotionCode'] = element('promotion_code', $input);
            }

            if ($this->_conn->set($data)->where('ElIdx', $el_idx)->update($this->_table['event_lecture']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            // 카테고리수정
            $is_category = $this->_modifyEventCategory($el_idx, $event_category_data, element('site_code', $input));
            if ($is_category !== true) {
                throw new \Exception($is_category);
            }

            // 파일수정
            $is_attach = $this->_modifyEventAttach($el_idx, count($this->_set_attache_type));
            if ($is_attach === false) {
                throw new \Exception($is_attach);
            }

            // 프로모션 파일 등록
            if ($this->_addContentAttachByPromotion($el_idx, count($this->_set_attache_type), $ordering) === false) {
                throw new \Exception('프로모션 파일 등록에 실패했습니다.');
            }
            
            // 프로모션 파일 정렬순서 수정
            $arr_ef_idx = element('ef_idx', $input);
            $arr_ef_ordering = element('Ordering', $input);
            if(empty($arr_ef_idx) === false) {
                foreach($arr_ef_idx as $ef_key => $ef_val) {
                    if(empty($ef_val) === false && empty($arr_ef_ordering[$ef_key]) === false)
                    if ($this->_modifyContentAttachByPromotion($ef_val, ['Ordering' => $arr_ef_ordering[$ef_key]]) === false) {
                        throw new \Exception('프로모션 파일 수정에 실패했습니다.');
                    }
                }
            }

            // 프로모션 신청리스트 수정 비교/수정
            //if ($this->getMemberForRegisterCount($el_idx) <= 0) {
                if ($option_ccds[0] == $this->_event_lecture_option_ccds[0]) {
                    //if ($this->_addEventRegister($el_idx, $input, 'modify') === false) {
                    if ($this->_modifyEventRegister($el_idx, $input) === false) {
                        throw new \Exception('이벤트 정원제한 등록에 실패했습니다.');
                    }
                }
            //}

            // 프로모션 부가정보 수정
            if (empty(element('promotion_code', $input)) === false) {
                if ($this->_addPromotionOtherInfo(element('promotion_code', $input), $input) === false) {
                    throw new \Exception('프로모션 상세설정 등록에 실패했습니다.');
                }
            }

            // 프로모션 라이브송출 데이터 저장
            if ($promotion_live_type == 'Y') {
                if ($this->_addPromotionLiveVideo(element('promotion_code', $input), $input) === false) {
                    throw new \Exception('프로모션 라이브송출데이터 등록에 실패했습니다.');
                }
            }

            // 이벤트 DP상품 저장
            if(empty($input['edp_idx']) === false) {
                if ($this->_addEventDisplayProduct($el_idx, $input) === false) {
                    throw new \Exception('이벤트 DP상품 등록에 실패했습니다.');
                }
            }

            // 프로모션 추가신청정보 비교수정
            if ($this->_modifyEventAddApply($el_idx, $input) === false) {
                throw new \Exception('프로모션 추가신청정보 수정에 실패했습니다.');
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

    /**
     * 수정 폼 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findEventForModify($arr_condition)
    {
        $column = "
            A.ElIdx, A.SiteCode, A.CampusCcd, A.RequestType, A.TakeType, A.SubjectIdx, A.ProfIdx, A.IsBest, A.PromotionCode, A.PromotionParams, A.PromotionLiveType, A.PromotionLivePlayer, A.BIdx, F.BannerName,
            A.RegisterStartDate, A.RegisterEndDate, A.IsRegister, A.IsUse, A.IsStatus, A.EventName,
            DATE_FORMAT(A.RegisterStartDate, '%Y-%m-%d') AS RegisterStartDay, DATE_FORMAT(A.RegisterStartDate, '%H') AS RegisterStartHour, DATE_FORMAT(A.RegisterStartDate, '%i') AS RegisterStartMin,
            DATE_FORMAT(A.RegisterEndDate, '%Y-%m-%d') AS RegisterEndDay, DATE_FORMAT(A.RegisterEndDate, '%H') AS RegisterEndHour, DATE_FORMAT(A.RegisterEndDate, '%i') AS RegisterEndMin,
            A.ContentType, A.Content, A.OptionCcds, A.LimitType, A.SelectType,
            A.SendTel, A.SmsContent, A.PopupTitle, A.CommentUseArea, A.CommentUiTypeCcds, A.Link, A.ReadCnt, A.AdjuReadCnt, (A.ReadCnt + A.AdjuReadCnt) as TotalReadCnt,
            A.RegDatm, A.RegAdminIdx, A.RegIp, A.UpdDatm, A.UpdAdminIdx, C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName,
            B.SiteName, E.CcdName AS CampusName,
            G.SubjectName, H.ProfNickName,
            B.SiteUrl, A.CommentPointType, A.CommentPointAmount, A.CommentPointValidDays
            ";

        $from = "
            FROM {$this->_table['event_lecture']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['sys_code']} AS E ON A.CampusCcd = E.Ccd AND E.IsStatus='Y'
            LEFT OUTER JOIN {$this->_table['banner']} as F ON A.BIdx = F.BIdx AND F.LinkType = 'layer'
            LEFT OUTER JOIN {$this->_table['product_subject']} as G ON A.SubjectIdx = G.SubjectIdx
            LEFT OUTER JOIN {$this->_table['professor']} as H ON A.ProfIdx = H.ProfIdx
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
        $column = 'EfIdx, FileName, FileRealName, FileFullPath, FileType, Ordering';
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
     * @param $prod_list
     * @param $rtn_col
     * @return bool
     */
    public function listEventForRegister($el_idx, $prod_list = false, $rtn_col = '')
    {
        $column = 'ErIdx, PersonLimitType, PersonLimit, Name, RegisterExpireStatus, IsUse';
        $from = "
            FROM {$this->_table['event_register']}
        ";
        $where = ' WHERE ElIdx = ? and IsStatus = "Y"';
        $order_by_offset_limit = ' ORDER BY ErIdx ASC';

        $result = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit, [$el_idx])->result_array();

        // 프로모션 지급상품 조회
        if($prod_list === true && empty($result) === false) {
            $event_product_data = $this->listEventPromotionForProduct(['EQ' => ['A.ElIdx' => $el_idx]]);
            foreach ($result as $key => $val) {
                $arr_event_product = [];
                foreach ($event_product_data as $p_key => $p_val) {
                    if($val['ErIdx'] == $p_val['ErIdx']) {
                        //$arr_event_product = array_merge($arr_event_product, $p_val);
                        array_push($arr_event_product, $p_val);
                    }
                }
                $result[$key]['arr_event_product'] = $arr_event_product;
            }
        }

        //특정 컬럼만 리턴
        if(empty($rtn_col) === false) {
            //데이터 배열 가공
            $arr_rtn_col = [];
            foreach($result as $row){
                $arr_rtn_col = array_merge($arr_rtn_col, [$row[$rtn_col]]);
            }
            $result = $arr_rtn_col;
        }

        return $result;
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
            A.EmIdx, A.MemIdx, B.PersonLimitType, B.PersonLimit, B.Name AS RegisterName, A.EtcValue, A.RegDatm,
            A.UserName, C.MemId, fn_dec(A.UserTelEnc) AS Phone, fn_dec(A.UserMailEnc) AS Mail, D.registerCnt, A.FileFullPath, A.FileRealName,
            O.Addr1, fn_dec(O.Addr2Enc) AS Addr2, O.ZipCode
            ';

            if ($is_count == 'excel') {
                $column = '
                    A.UserName, C.MemId, fn_dec(A.UserTelEnc) AS Phone, fn_dec(A.UserMailEnc) AS Mail, A.EtcValue, A.RegDatm, B.Name AS RegisterName, D.registerCnt, O.Addr1, fn_dec(O.Addr2Enc) AS Addr2, O.ZipCode,
                    CASE C.Sex WHEN "M" THEN "남" WHEN "F" THEN "여" END AS MemSex
                ';
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['event_member']} AS A
            INNER JOIN {$this->_table['event_register']} AS B ON A.ErIdx = B.ErIdx
            LEFT JOIN {$this->_table['member']} AS C ON A.MemIdx = C.MemIdx
            LEFT JOIN {$this->_table['member_otherinfo']} AS O ON C.MemIdx = O.MemIdx
            LEFT JOIN (
		        SELECT ErIdx, COUNT(*) AS registerCnt FROM {$this->_table['event_member']} GROUP BY ErIdx
            ) AS D ON B.ErIdx = D.ErIdx
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
     * 이벤트에 매핑된 신청자 수
     * @param $el_idx
     * @param array $arr_condition
     * @return mixed
     */
    public function getMemberForRegisterCount($el_idx, $arr_condition = [])
    {
        $column = 'count(*) AS numrows';
        $from = "
            FROM {$this->_table['event_member']} as a
            INNER JOIN {$this->_table['event_register']} as b ON a.ErIdx = b.ErIdx AND b.ElIdx = '{$el_idx}' AND b.IsStatus = 'Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row(0)->numrows;
    }

    /**
     * 이벤트 접수 관리(정원제한) 단일 데이터 삭제
     * @param $el_idx
     * @param $er_idx
     * @return array|bool
     */
    public function delRegister($el_idx, $er_idx)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            if ($this->getMemberForRegisterCount($el_idx) > 0) {
                throw new \Exception('신청자 데이터가 존재합니다. 삭제할 수 없습니다..');
            }

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
     * 이벤트 접수 관리 단일 데이터 만료상태 수정
     * @param $input
     * @return array|bool
     */
    public function expireRegister($input)
    {
        $this->_conn->trans_begin();
        try {
            $input_data = [
                'PersonLimitType' => $input['person_limit_type'],
                'PersonLimit' => $input['person_limit'],
                'Name' => $input['register_name'],
                'RegisterExpireStatus' => $input['expire_status'],
                'IsUse' => $input['is_use'],
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($input_data)->where('ErIdx', $input['er_idx']);
            if($this->_conn->update($this->_table['event_register'])=== false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // *** 이벤트접수 지급강의 업데이트 ***
            if(empty($input['prod_code']) === false) {
                // 기존 상품 비교하기 위하여 조회
                $before_data = $this->listEventPromotionForProduct(['EQ' => ['A.ErIdx' => $input['er_idx']]], 'ProdCode');
                if(empty($before_data) === false && count($before_data) == 0){
                    // 신규 등록
                    foreach ($input['prod_code'] as $i_key => $i_val) {
                        if($this->addEventPromotionForProduct($input['er_idx'], $i_val) !== true) {
                            throw new \Exception('프로모션 지급상품 등록을 실패하였습니다.');
                        }                        
                    }
                } else {
                    // 비교 삭제
                    $del_data = array_values(array_diff($before_data, $input['prod_code']));
                    if(empty($del_data) === false && count($del_data) > 0) {
                        if($this->removeEventPromotionForProduct($input['er_idx'], $del_data) !== true) {
                            throw new \Exception('프로모션 지급상품 삭제 업데이트를 실패하였습니다.');
                        }
                    }
                    // 비교 등록
                    $insert_data = array_values(array_diff($input['prod_code'], $before_data));
                    if(empty($insert_data) === false) { 
                        foreach ($insert_data as $i_key => $i_val) {
                            if($this->addEventPromotionForProduct($input['er_idx'], $i_val) !== true) {
                                throw new \Exception('프로모션 지급상품 등록을 실패하였습니다.');
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

    /**
     * 신청리스트 : 특강 정보 수정
     * @param $input
     * @return array|bool
     */
    public function updateRegister($input)
    {
        $this->_conn->trans_begin();
        try {
            $input_data = [
                'PersonLimitType' => $input['person_limit_type'],
                'PersonLimit' => $input['person_limit'],
                'Name' => $input['register_name'],
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($input_data)->where('ErIdx', $input['er_idx']);
            if($this->_conn->update($this->_table['event_register'])=== false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
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
            $column = 'A.CIdx, A.ElIdx, A.MemIdx, A.MemName, A.AdminIdx, A.CommentType, A.CommentUiCcd, A.Comment AS eventComment, A.IsUse, A.IsStatus, A.RegDatm,
                        B.MemId, fn_dec(B.PhoneEnc) AS Phone, fn_dec(B.MailEnc) AS Mail,
                        fn_ccd_name(A.CommentUiCcd) AS CommentUiCcdName
            ';

            if ($is_count == 'excel') {
                $column = 'fn_ccd_name(A.CommentUiCcd) AS CommentUiCcdName, A.MemName, B.MemId, fn_dec(B.PhoneEnc) AS Phone, fn_dec(B.MailEnc) AS Mail, A.Comment AS eventComment, A.RegDatm, A.IsStatus';
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
                'CommentUiCcd' => element('comment_ui_type_ccd', $input),
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

    public function commentDelete($idx)
    {
        $this->_conn->trans_begin();
        try {
            $event_comment_idx = $idx;
            $admin_idx = $this->session->userdata('admin_idx');
            $result = $this->_findEventCommentData($event_comment_idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $is_update = $this->_conn->set([
                'IsStatus' => 'N',
                'UpdAdminIdx' => $admin_idx,
                'UpdDatm' => date('Y-m-d H:i:s')
            ])->where('CIdx', $event_comment_idx)->where('IsStatus', 'Y')->update($this->_table['event_comment']);

            if ($is_update === false) {
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
     * 단일 이벤트 댓글 데이터 조회(데이터 update 발생 시 idx 검증)
     * @param $idx
     * @return mixed
     */
    private function _findEventCommentData($idx)
    {
        $column = 'CIdx';
        $from = "
            FROM {$this->_table['event_comment']}
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'CIdx' => $idx,
                'IsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        $query = $query->row_array();

        return $query;
    }

    /**
     * 이벤트 공지사항 조회 페이징 처리 없음
     * @param $arr_condition
     * @return mixed
     */
    public function listEventNotice($arr_condition)
    {
        $limit = 100;   // 페이지처리 없음으로 인한 limit 셋팅
        /*$column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFilePath, LBA.AttachFileName, ADMIN.wAdminName
        ';*/
        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName
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
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName,
            LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm
            ';
        /*$column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName,
            LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm
            ';*/

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
     * 합격수기 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllEventMemberSuccess($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            a.EmsIdx, a.ElIdx, a.MemIdx, a.CandidateNum, a.SerialCcd, a.CandidateAreaCcd, a.SuccessType, a.FileName1,
            a.FileRealName1, a.FileFullPath1, a.FileName2, a.FileRealName2, a.FileFullPath2, a.IsStatus, a.RegDatm, a.RegIp, a.UpdDatm,
            b.MemId, b.MemName, fn_dec(b.PhoneEnc) AS MemPhone, c.SmsRcvStatus,
            fn_ccd_name(a.SerialCcd) AS SerialName, fn_ccd_name(a.CandidateAreaCcd) AS CandidateAreaName,
            CASE a.SuccessType WHEN 1 THEN \'필기\' WHEN 2 THEN \'최종\' END AS SuccessTypeName
            ';

            if ($is_count == 'excel') {
                $column = '
                b.MemName, b.MemId, fn_dec(b.PhoneEnc) AS MemPhone, a.CandidateNum,
                fn_ccd_name(a.SerialCcd) AS SerialName, fn_ccd_name(a.CandidateAreaCcd) AS CandidateAreaName,
                CASE a.SuccessType WHEN 1 THEN \'필기\' WHEN 2 THEN \'최종\' END AS SuccessTypeName,
                a.RegDatm
                ';
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['event_member_successinfo']} AS a
            INNER JOIN {$this->_table['member']} AS b ON a.MemIdx = b.MemIdx
            LEFT JOIN {$this->_table['member_otherinfo']} AS c ON b.MemIdx = c.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 파일삭제
     */
    public function removeFile($attach_idx)
    {
        $this->_conn->trans_begin();
        try {
            $arr_data = $this->_findBoardAttach($attach_idx)[0];
            if (empty($arr_data) === true) {
                throw new \Exception('삭제할 데이터가 없습니다.');
            }

            $file_path = $arr_data['FileFullPath'].$arr_data['FileName'];
            $this->load->helper('file');
            $real_file_path = public_to_upload_path($file_path);
            /*if (@unlink($real_file_path) === false) {
                throw new \Exception('이미지 삭제에 실패했습니다.');
            }*/

            $data = [
                'IsUse' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($data)->where('EfIdx', $attach_idx);

            if($this->_conn->update($this->_table['event_file'])=== false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 프로모션 부가정보 리스트
     * @param $promotion_code
     * @return mixed
     */
    public function listEventPromotionForOther($promotion_code)
    {
        $column = '
        A.EpoIdx, A.PromotionCode, A.ProfIdx, A.SubjectIdx, A.OtherData1, A.OtherData2, A.OtherData3,
        A.FileFullPath, A.FileRealName, A.OrderNum, A.IsStatus, A.RegDatm, A.RegAdminIdx, A.UpdDatm, A.UpdAdminIdx,
        G.SubjectName, H.ProfNickName
        ';
        $from = "
            FROM {$this->_table['event_promotion_otherinfo']} AS A
            LEFT OUTER JOIN {$this->_table['product_subject']} as G ON A.SubjectIdx = G.SubjectIdx
            LEFT OUTER JOIN {$this->_table['professor']} as H ON A.ProfIdx = H.ProfIdx
        ";
        $where = ' where A.PromotionCode = ? and A.IsStatus = "Y"';
        $order_by_offset_limit = ' order by A.OrderNum asc';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$promotion_code])->result_array();
    }

    /**
     * 프로모션 부가정보 단일 데이터 삭제
     * @param $epo_idx
     * @return array|bool
     */
    public function deletePromotionOtherInfo($epo_idx)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $admin_idx)->where('EpoIdx', $epo_idx);
            if ($this->_conn->update($this->_table['event_promotion_otherinfo']) === false) {
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
     * 프로모션 라이브송출 리스트
     * @param $promotion_code
     * @return mixed
     */
    public function listEventPromotionForLiveVideo($promotion_code)
    {
        $column = '
            EplvIdx, PromotionCode, Title, LiveAutoType, LiveRatio, LiveDate, LiveStartTime, LiveEndTime, LiveUrl, FileFullPath, FileRealName, IsUse, IsStatus, FileStartDatm, FileEndDatm,
            DATE_FORMAT(FileStartDatm, \'%Y-%m-%d\') AS FileStartDate,
            DATE_FORMAT(FileEndDatm, \'%Y-%m-%d\') AS FileEndDate,
            DATE_FORMAT(FileStartDatm, \'%H\') AS FileStartHour,
            DATE_FORMAT(FileEndDatm, \'%H\') AS FileEndHour,
            DATE_FORMAT(FileStartDatm, \'%i\') AS FileStartMin,
            DATE_FORMAT(FileEndDatm, \'%i\') AS FileEndMin
        ';
        $from = "
            FROM {$this->_table['event_promotion_live_video']}
        ";
        $where = ' where PromotionCode = ? and IsStatus = "Y"';
        $order_by_offset_limit = ' order by EplvIdx asc';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$promotion_code])->result_array();
    }

    /**
     * 프로모션 라이브송출 단일 데이터 삭제
     * @param $eplv_idx
     * @return array|bool
     */
    public function deletePromotionLiveVideo($eplv_idx)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $admin_idx)->where('EplvIdx', $eplv_idx);
            if ($this->_conn->update($this->_table['event_promotion_live_video']) === false) {
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
     * 이벤트 파일저장
     * @param $el_idx
     * @param $cnt
     * @return bool
     */
    private function _addContentAttach($el_idx, $cnt)
    {
        try {
            /*$this->load->library('upload');
            $this->load->library('image_lib');*/

            $upload_dir = config_item('upload_prefix_dir') . '/event/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($cnt), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (empty($attach_files) === false) {

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
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 프로모션 파일저장
     * @param $el_idx
     * @param $cnt
     * @param $ordering
     * @return bool
     */
    private function _addContentAttachByPromotion($el_idx, $cnt, $ordering)
    {
        try {
            /*$this->load->library('upload');
            $this->load->library('image_lib');*/

            $upload_dir = config_item('upload_prefix_dir') . '/promotion/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file_promotion'], $this->_getAttachImgNames($cnt, 'promotion'), $upload_dir);

            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (empty($attach_files) === false) {
                    $set_attach_data['ElIdx'] = $el_idx;
                    $set_attach_data['FileName'] = $attach_files['orig_name'];
                    $set_attach_data['FileFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                    $set_attach_data['FileRealName'] = $attach_files['client_name'];
                    $set_attach_data['FileType'] = 'P';

                    $set_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_attach_data['RegIp'] = $this->input->ip_address();

                    $set_attach_data['Ordering'] = $ordering[$idx];

                    if ($this->_addEventAttach($set_attach_data) === false) {
                        throw new \Exception('fail');
                    }
                }
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 프로모션 파일수정
     * @param $ef_idx
     * @param $input
     * @return bool
     */
    private function _modifyContentAttachByPromotion($ef_idx, $input)
    {
        try {
            if(empty($ef_idx) === true) {
                throw new \Exception('필수 파라미터 오류');
            }

            $data = [
                'Ordering' => element('Ordering', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->set($data)->where('EfIdx', $ef_idx)->update($this->_table['event_file']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }
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
                    'Name' => element('register_name', $input),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];

                if ($this->_conn->set($reg_set_data)->insert($this->_table['event_register']) === false) {
                    throw new \Exception('fail');
                }
            } else if ($limit_type == 'M') {
                $event_register_person_limit_type = element('event_register_person_limit_type', $input);
                $event_register_person_limit = element('event_register_person_limit', $input);
                $event_register_name = element('event_register_name', $input);

                if (empty($event_register_person_limit_type) === false) {
                    foreach ($event_register_person_limit_type as $key => $val) {
                        $reg_set_data = [
                            'ElIdx' => $el_idx,
                            'PersonLimitType' => $val,
                            'PersonLimit' => $event_register_person_limit[$key],
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
     * @param string $name_type
     * @return array
     */
    private function _getAttachImgNames($cnt, $name_type = 'event')
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        $postfix = '';
        for ($i = 0; $i < $cnt; $i++) {
            if ($name_type == 'event') {
                if (empty($this->_set_attache_type[$i]) === false) {
                    if ($this->_set_attache_type[$i] == 'S' || $this->_set_attache_type[$i] == 'I') {
                        $postfix = $this->_thumb_postfixs['S'];
                    }
                }
                $attach_file_names[] = 'event_' . $i . '_' . $temp_time . $postfix;
            } else {
                $attach_file_names[] = 'event_' . $i . '_' . $temp_time;
            }

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
     * @param $post_site_code
     * @return bool|string
     */
    private function _modifyEventCategory($el_idx, $event_category_data, $post_site_code)
    {
        try {
            //수정할 사이트코드가 통합사이트 코드일 경우 카테고리 N처리
            if ($post_site_code == config_item('app_intg_site_code')) {
                $up_cate_data['ElIdx'] = $el_idx;
                if ($this->_updateEventCategory($up_cate_data) === false) {
                    throw new \Exception('게시판 등록(카테고리)에 실패했습니다.');
                }
            } else {
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
            $event_attach_data = [];
            foreach ($arr_event_attach as $row) {
                $event_attach_data[$row['num']] = [
                    'EfIdx' => $row['EfIdx'],
                    'FileInfo' => $row['FileInfo']
                ];
            }

            $this->load->library('upload');
            $this->load->library('image_lib');
            $upload_dir = config_item('upload_prefix_dir') . '/event/' . date('Y') . '/' . date('md');

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

                    if (empty($event_attach_data[$key]) === true) {
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
                        $real_img_path = public_to_upload_path($event_attach_data[$key]['FileInfo']);

                        if (@unlink($real_img_path) === false) {
                            /*throw new \Exception('이미지 삭제에 실패했습니다.');*/
                        }

                        $set_attach_data['FileFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                        $set_attach_data['FileName'] = $uploaded[$key]['orig_name'];
                        $set_attach_data['FileRealName'] = $uploaded[$key]['client_name'];

                        $whereData = [
                            'EfIdx' => $event_attach_data[$key]['EfIdx']
                        ];

                        if ($this->_updateEventAttach($set_attach_data, $whereData) === false) {
                            throw new \Exception('파일 수정에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
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
        $query = "
            SELECT a.*
            FROM (
                SELECT '0' AS num, EfIdx, CONCAT(FileFullPath, FileName) AS FileInfo
                FROM {$this->_table['event_file']}
                WHERE IsUse = 'Y' AND ElIdx = '{$el_idx}' AND FileType = 'C' ORDER BY EfIdx DESC LIMIT 1
            ) AS a
            
            UNION ALL
            
            SELECT b.*
            FROM (
                SELECT '1' AS num, EfIdx, CONCAT(FileFullPath, FileName) AS FileInfo
                FROM {$this->_table['event_file']}
                WHERE IsUse = 'Y' AND ElIdx = '{$el_idx}' AND FileType = 'F' ORDER BY EfIdx DESC LIMIT 1
            ) AS b
            
            UNION ALL
            
            SELECT c.*
            FROM (
                SELECT '2' AS num, EfIdx, CONCAT(FileFullPath, FileName) AS FileInfo
                FROM {$this->_table['event_file']}
                WHERE IsUse = 'Y' AND ElIdx = '{$el_idx}' AND FileType = 'S' ORDER BY EfIdx DESC LIMIT 1
            ) AS c
            
            UNION ALL
            
            SELECT d.*
            FROM (
                SELECT '3' AS num, EfIdx, CONCAT(FileFullPath, FileName) AS FileInfo
                FROM {$this->_table['event_file']}
                WHERE IsUse = 'Y' AND ElIdx = '{$el_idx}' AND FileType = 'I' ORDER BY EfIdx DESC LIMIT 1
            ) AS d
            
            UNION ALL
            
            SELECT e.*
            FROM (
                SELECT '4' AS num, EfIdx, CONCAT(FileFullPath, FileName) AS FileInfo
                FROM {$this->_table['event_file']}
                WHERE IsUse = 'Y' AND ElIdx = '{$el_idx}' AND FileType = 'R' ORDER BY EfIdx DESC LIMIT 1
            ) AS e
        ";

        $data = $this->_conn->query($query)->result_array();
        return $data;
    }

    /**
     * 파일 식별자 기준 파일 목록 조회
     * @param $attach_idx
     * @return array|int
     */
    private function _findBoardAttach($attach_idx)
    {
        $column = 'EfIdx, ElIdx, FileFullPath, FileName';
        $arr_condition = ['EQ' => ['IsUse' => 'Y', 'EfIdx' => $attach_idx]];
        $data = $this->_conn->getListResult($this->_table['event_file'], $column, $arr_condition, null, null, [
            'EfIdx' => 'DESC'
        ]);

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

    private function _setPromotionCode()
    {
        $row = $this->_conn->getFindResult($this->_table['event_lecture'], 'ifnull(max(PromotionCode) + 1, 1001) as PromotionCode');
        return $row['PromotionCode'];
    }

    /**
     * 프로모션 부가정보 저장
     * @param $promotionCode
     * @param array $input
     * @return array|bool
     */
    private function _addPromotionOtherInfo($promotionCode, $input = [])
    {
        try {
            if(empty($input['epo_idx']) === false) {
                //파일 저장
                $upload_dir = config_item('upload_prefix_dir') . '/promotion/' . date('Y') . '/' . date('md') . '/other';
                $promo_file_cnt = (empty($_FILES['other_attach_file']) === true) ? '0' : count($_FILES['other_attach_file']['name']);
                $uploaded = $this->upload->uploadFile('file', ['other_attach_file'], $this->_getAttachImgNames($promo_file_cnt, 'promotion'), $upload_dir);
                if (is_array($uploaded) === false) {
                    throw new \Exception($uploaded);
                }
                $set_attach_data = [];
                foreach ($uploaded as $idx => $attach_files) {
                    if (empty($attach_files) === false) {
                        $set_attach_data['FileFullPath'][$idx] = $this->upload->_upload_url . $upload_dir . '/' . $attach_files['orig_name'];
                        $set_attach_data['FileRealName'][$idx] = $attach_files['client_name'];
                    }
                }

                /**
                 * 프로모션 부가정보 저장
                 * epo_idx 값으로 insert, update 구분
                 */
                foreach ($input['epo_idx'] as $key => $val) {
                    $inputData['PromotionCode'] = $promotionCode;
                    $inputData['ProfIdx'] = (empty($input['other_prof_idx'][$key]) === false) ? $input['other_prof_idx'][$key] : null;
                    $inputData['SubjectIdx'] = (empty($input['other_subject_idx'][$key]) === false) ? $input['other_subject_idx'][$key] : null;
                    $inputData['OtherData1'] = (empty($input['other_data_1'][$key]) === false) ? $input['other_data_1'][$key] : null;
                    $inputData['OtherData2'] = (empty($input['other_data_2'][$key]) === false) ? $input['other_data_2'][$key] : null;
                    $inputData['OtherData3'] = (empty($input['other_data_3'][$key]) === false) ? $input['other_data_3'][$key] : null;       //여분필드
                    $inputData['OrderNum'] = (empty($input['other_order_num'][$key]) === false) ? $input['other_order_num'][$key] : null;

                    if(empty($set_attach_data['FileFullPath'][$key]) === false) {
                        $inputData['FileFullPath'] = $set_attach_data['FileFullPath'][$key];
                        $inputData['FileRealName'] = $set_attach_data['FileRealName'][$key];
                    } else {
                        unset($inputData['FileFullPath']);
                        unset($inputData['FileRealName']);
                    }

                    if (empty($val) === true) {
                        $inputData['RegAdminIdx'] = $this->session->userdata('admin_idx');
                        if ($this->_conn->set($inputData)->insert($this->_table['event_promotion_otherinfo']) === false) {
                            throw new \Exception('fail');
                        }
                    } else {
                        //기존파일삭제
                        if(empty($input['other_file_full_path'][$key]) === false && empty($inputData['FileFullPath']) === false) {
                            $this->load->helper('file');
                            $file_path = public_to_upload_path(urldecode($input['other_file_full_path'][$key]));
                            if (@unlink($file_path) === false) {
                                /*throw new \Exception('이미지 삭제에 실패했습니다.');*/
                            }
                        }

                        $inputData['UpdAdminIdx'] = $this->session->userdata('admin_idx');
                        if ($this->_conn->set($inputData)->where('EpoIdx', $val)->update($this->_table['event_promotion_otherinfo']) === false) {
                            throw new \Exception('프로모션 부가정보 수정에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 프로모션 라이브송출데이터 저장
     * @param $promotionCode
     * @param array $input
     * @return array|bool
     */
    private function _addPromotionLiveVideo($promotionCode, $input = [])
    {
        try {
            if(empty($input['eplv_idx']) === false) {
                //파일 저장
                $upload_dir = config_item('upload_prefix_dir') . '/promotion/' . date('Y') . '/' . date('md') . '/live';
                $promo_file_cnt = (empty($_FILES['live_attach_file']) === true) ? '0' : count($_FILES['live_attach_file']['name']);
                $uploaded = $this->upload->uploadFile('file', ['live_attach_file'], $this->_getAttachImgNames($promo_file_cnt, 'promotion'), $upload_dir);
                if (is_array($uploaded) === false) {
                    throw new \Exception($uploaded);
                }
                $set_attach_data = [];
                foreach ($uploaded as $idx => $attach_files) {
                    if (empty($attach_files) === false) {
                        $set_attach_data['FileFullPath'][$idx] = $this->upload->_upload_url . $upload_dir . '/' . $attach_files['orig_name'];
                        $set_attach_data['FileRealName'][$idx] = $attach_files['client_name'];
                    }
                }

                /**
                 * 프로모션 라이브송출데이터 저장
                 * eplv_idx 값으로 insert, update 구분
                 */
                foreach ($input['eplv_idx'] as $key => $val) {
                    $inputData['PromotionCode'] = $promotionCode;
                    $inputData['Title'] = $input['live_title'][$key];
                    $inputData['LiveAutoType'] = (empty($input['live_auto_type'][$key]) === false && $input['live_auto_type'][$key] == 'Y') ? $input['live_auto_type'][$key] : 'N';
                    $inputData['LiveRatio'] = $input['live_ratio'][$key];
                    $inputData['LiveDate'] = $input['live_date'][$key];
                    $inputData['LiveStartTime'] = $input['live_start_hour'][$key].$input['live_start_min'][$key].'00';
                    $inputData['LiveEndTime'] = $input['live_end_hour'][$key].$input['live_end_min'][$key].'00';
                    $inputData['LiveUrl'] = $input['live_url'][$key];
                    $inputData['IsUse'] = $input['live_is_use'][$key];

                    $inputData['FileStartDatm'] =  str_replace('-','',$input['file_start_date'][$key].$input['file_start_hour'][$key].$input['file_start_min'][$key].'00');
                    $inputData['FileEndDatm'] = str_replace('-','',$input['file_end_date'][$key].$input['file_end_hour'][$key].$input['file_end_min'][$key].'00');

                    if(empty($set_attach_data['FileFullPath'][$key]) === false) {
                        $inputData['FileFullPath'] = $set_attach_data['FileFullPath'][$key];
                        $inputData['FileRealName'] = $set_attach_data['FileRealName'][$key];
                    } else {
                        unset($inputData['FileFullPath']);
                        unset($inputData['FileRealName']);
                    }

                    if (empty($val) === true) {
                        $inputData['RegAdminIdx'] = $this->session->userdata('admin_idx');
                        if ($this->_conn->set($inputData)->insert($this->_table['event_promotion_live_video']) === false) {
                            throw new \Exception('fail');
                        }
                    } else {
                        //기존파일삭제
                        if(empty($input['live_file_full_path'][$key]) === false && empty($inputData['FileFullPath']) === false) {
                            $this->load->helper('file');
                            $file_path = public_to_upload_path(urldecode($input['live_file_full_path'][$key]));
                            if (@unlink($file_path) === false) {
                                /*throw new \Exception('이미지 삭제에 실패했습니다.');*/
                            }
                        }

                        $inputData['UpdAdminIdx'] = $this->session->userdata('admin_idx');
                        if ($this->_conn->set($inputData)->where('EplvIdx', $val)->update($this->_table['event_promotion_live_video']) === false) {
                            throw new \Exception('프로모션 라이브송출데이터 수정에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 프로모션 지급 강의상품 리스트
     * @param $arr_condition
     * @param $rtn_col
     * @return mixed
     */
    public function listEventPromotionForProduct($arr_condition = [], $rtn_col = '')
    {
        if (empty($arr_condition) === true) return false;

        $column = '
            B.*,
            C.ProdName
        ';
        $from = "
            FROM {$this->_table['event_register']} AS A
            INNER JOIN {$this->_table['event_register_r_product']} AS B ON A.ErIdx = B.ErIdx AND B.IsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['product']} AS C ON B.ProdCode = C.ProdCode
            WHERE A.IsStatus = 'Y' 
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = ' ORDER BY A.ErIdx ASC';
        $result = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit)->result_array();

        if(empty($rtn_col) === false) {
            //데이터 배열 가공
            $arr_rtn_col = [];
            foreach($result as $row){
                $arr_rtn_col = array_merge($arr_rtn_col, [$row[$rtn_col]]);
            }
            $result = $arr_rtn_col;
        }
        return $result;
    }

    /**
     * 프로모션 지급 강의상품 삭제 업데이트
     * @param stirng $er_idx
     * @param array $arr_prod_code
     * @return mixed
     */
    public function removeEventPromotionForProduct($er_idx, $arr_prod_code)
    {
        try {
            if (empty($er_idx) === true || empty($arr_prod_code) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            $data = ['IsStatus' => 'N'];

            $is_update = $this->_conn->set($data)
                ->where('ErIdx', $er_idx)
                ->where_in('ProdCode', $arr_prod_code)
                ->update($this->_table['event_register_r_product']);

            if ($is_update !== true) {
                throw new \Exception('프로모션 지급상품 삭제 업데이트를 실패하였습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 프로모션 지급 강의상품 등록
     * @param stirng $er_idx
     * @param string $prod_code
     * @return mixed
     */
    public function addEventPromotionForProduct($er_idx, $prod_code)
    {
        try {
            if (empty($er_idx) === true || empty($prod_code) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }
            $data = [
                'ErIdx' => $er_idx,
                'ProdCode' => $prod_code,
                'IsStatus' => 'Y',
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];
            if ($this->_conn->set($data)->insert($this->_table['event_register_r_product']) === false) {
                throw new \Exception('프로모션 지급상품 등록을 실패하였습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 이벤트 접수 관리 수정
     * @param $el_idx
     * @param $input
     * @return bool
     */
    private function _modifyEventRegister($el_idx, $input)
    {
        $limit_type = element('limit_type', $input);

        try {
            if ($limit_type == 'S') {
                // 단일 리스트: 기존로직
                $up_register_input['IsStatus'] = 'N';
                $up_register_input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
                $up_register_input['UpdDatm'] = date('Y-m-d H:i:s');

                $this->_conn->set($up_register_input)->where(['ElIdx' => $el_idx, 'IsStatus' => 'Y']);

                if ($this->_conn->update($this->_table['event_register']) === false) {
                    throw new \Exception('데이터 수정에 실패했습니다.');
                }

                $reg_set_data = [
                    'ElIdx' => $el_idx,
                    'PersonLimitType' => element('person_limit_type', $input),
                    'PersonLimit' => element('person_limit', $input),
                    'Name' => element('register_name', $input),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];

                if ($this->_conn->set($reg_set_data)->insert($this->_table['event_register']) === false) {
                    throw new \Exception('fail');
                }
            } else if ($limit_type == 'M') {
                // 다중 리스트: 비교 수정
                $arr_event_register_er_idx = element('event_register_er_idx', $input);
                $arr_event_register_name = element('event_register_name', $input);
                $arr_event_register_person_limit_type = element('event_register_person_limit_type', $input);
                $arr_event_register_person_limit = element('event_register_person_limit', $input);
                $arr_expire_status = element('expire_status', $input);
                $arr_register_is_use = element('register_is_use', $input);

                if (empty(element('el_idx', $input)) === false && empty($arr_event_register_er_idx) === false) {

                    $before_data = $this->listEventForRegister(element('el_idx', $input), null, 'ErIdx');

                    // 비교 삭제
                    $del_data = array_values(array_diff($before_data, $arr_event_register_er_idx));
                    if(empty($del_data) === false && count($del_data) > 0) {
                        if($this->removeEventForRegister($del_data) !== true) {
                            throw new \Exception('프로모션 신청리스트 업데이트를 실패하였습니다.');
                        }
                    }
                    // 비교 등록
                    $insert_data = array_values(array_diff($arr_event_register_er_idx, $before_data));
                    if(empty($insert_data) === false) {
                        foreach ($insert_data as $i_key => $i_val) {
                            $arr_key = array_search($i_val, $arr_event_register_er_idx) ;
                            $add_param = [
                                'ElIdx' => $input['el_idx'],
                                'PersonLimitType' => $arr_event_register_person_limit_type[$arr_key],
                                'PersonLimit' => $arr_event_register_person_limit[$arr_key],
                                'Name' => $arr_event_register_name[$arr_key],
                                'RegisterExpireStatus' => $arr_expire_status[$arr_key],
                                'IsUse' => $arr_register_is_use[$arr_key],
                                'IsStatus' => 'Y',
                                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                                'RegIp' => $this->input->ip_address()
                            ];
                            if($this->addEventForRegister($add_param) !== true) {
                                throw new \Exception('프로모션 신청리스트 업데이트를 실패하였습니다.');
                            }
                        }
                    }

                    // 비교 수정
                    $update_data = array_values(array_intersect($before_data, $arr_event_register_er_idx));
                    if(empty($update_data) === false) {
                        foreach ($update_data as $i_key => $i_val) {
                            $arr_key = array_search($i_val, $arr_event_register_er_idx) ;
                            $modify_param = [
                                'PersonLimitType' => $arr_event_register_person_limit_type[$arr_key],
                                'PersonLimit' => $arr_event_register_person_limit[$arr_key],
                                'Name' => $arr_event_register_name[$arr_key],
                                'RegisterExpireStatus' => $arr_expire_status[$arr_key],
                                'IsUse' => $arr_register_is_use[$arr_key]
                            ];
                            if($this->modifyEventForRegister($i_val, $modify_param) !== true) {
                                throw new \Exception('프로모션 신청리스트 업데이트를 실패하였습니다.');
                            }
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
     * 프로모션 신청리스트 삭제 업데이트
     * @param array $arr_er_idx
     * @return mixed
     */
    public function removeEventForRegister($arr_er_idx)
    {
        try {
            if (empty($arr_er_idx) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }
            if(is_array($arr_er_idx) === false) {
                $arr_er_idx[0] = $arr_er_idx;   //단건 처리
            }

            $is_update = $this->_conn->set(['IsStatus' => 'N'])
                ->where_in('ErIdx', $arr_er_idx)
                ->update($this->_table['event_register']);

            if ($is_update !== true) {
                throw new \Exception('프로모션 신청리스트 삭제 업데이트를 실패하였습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 프로모션 신청 리스트 등록
     * @param array $input
     * @return mixed
     */
    public function addEventForRegister($input)
    {
        try {
            if (empty($input) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }
            if ($this->_conn->set($input)->insert($this->_table['event_register']) === false) {
                throw new \Exception('프로모션 신청리스트 등록을 실패하였습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 프로모션 신청 리스트 수정
     * @param string $er_idx
     * @param array $input
     * @return mixed
     */
    public function modifyEventForRegister($er_idx, $input)
    {
        try {
            if (empty($er_idx) === true || empty($input) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }
            if ($this->_conn->set($input)->where('ErIdx', $er_idx)->update($this->_table['event_register']) === false) {
                throw new \Exception('프로모션 신청리스트 수정을 실패하였습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 프로모션 추가신청정보 회원 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param bool $excel_yn
     * @return mixed
     */
    public function listAllEventApply($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $excel_yn = false)
    {
        if ($is_count === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            if($excel_yn === false) {
                $column = '
                    A.MemIdx, A.IsWin, A.RegDatm,
                    C.MemId, C.MemName, fn_dec(C.PhoneEnc) as MemPhone,
                    O.Addr1, fn_dec(O.Addr2Enc) AS Addr2, O.ZipCode, B.Name
                ';
            } else {
                $column = '
                    C.MemId, C.MemName, fn_dec(C.PhoneEnc) as MemPhone,
                    B.Name, A.RegDatm
                ';
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            if($excel_yn === false) {
                $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
            }
        }

        $from = "
            FROM {$this->_table['event_add_apply_member']} AS A
            INNER JOIN {$this->_table['event_add_apply']} AS B ON A.EaaIdx = B.EaaIdx
            LEFT JOIN {$this->_table['member']} AS C ON A.MemIdx = C.MemIdx
            LEFT JOIN {$this->_table['member_otherinfo']} AS O ON C.MemIdx = O.MemIdx
        ";

        $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['A.IsStatus' => 'Y']);

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 이벤트 DP 강좌신청 리스트 조회
     * @param $el_idx
     * @return bool
     */
    public function listEventForDisplayProduct($el_idx)
    {
        $column = 'DP.EdpIdx, DP.ElIdx, DP.ProdCode, DP.IsDispCart, DP.IsDispDirectPay, DP.OrderNum, DP.IsStatus, P.ProdName';
        $from = "
            FROM {$this->_table['event_display_product']} AS DP
            LEFT OUTER JOIN {$this->_table['product']} AS P ON DP.ProdCode = P.ProdCode AND P.IsStatus = 'Y'
        ";
        $where = ' WHERE DP.ElIdx = ? AND DP.IsStatus = "Y"';
        $order_by_offset_limit = ' ORDER BY DP.EdpIdx ASC';

        $result = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit, [$el_idx])->result_array();
        return $result;
    }

    /**
     * 이벤트 DP 강좌신청 삭제
     * @param $edp_idx
     * @return array|bool
     */
    public function delDisplayProduct($edp_idx)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $admin_idx)->where('EdpIdx', $edp_idx);
            if ($this->_conn->update($this->_table['event_display_product']) === false) {
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
     * 이벤트 DP상품 저장/수정
     * @param $el_idx
     * @param array $input
     * @return array|bool
     */
    private function _addEventDisplayProduct($el_idx, $input = [])
    {
        try {
            if(empty($input['edp_idx']) === false) {
                foreach ($input['edp_idx'] as $key => $val) {
                    $inputData['EdpIdx'] = $input['edp_idx'][$key];
                    $inputData['ElIdx'] = $el_idx;
                    $inputData['ProdCode'] = $input['event_display_product_prod_code'][$key];
                    $inputData['IsDispCart'] = $input['event_display_product_is_disp_cart'][$key];
                    $inputData['IsDispDirectPay'] = $input['event_display_product_is_disp_direct_pay'][$key];
                    $inputData['OrderNum'] = $input['event_display_product_order_num'][$key];

                    // edp_idx 값으로 insert, update 구분
                    if (empty($val) === true) {
                        $inputData['RegAdminIdx'] = $this->session->userdata('admin_idx');
                        if ($this->_conn->set($inputData)->insert($this->_table['event_display_product']) === false) {
                            throw new \Exception('fail');
                        }
                    } else {
                        $inputData['UpdAdminIdx'] = $this->session->userdata('admin_idx');
                        if ($this->_conn->set($inputData)->where('EdpIdx', $val)->update($this->_table['event_display_product']) === false) {
                            throw new \Exception('fail');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 프로모션 추가신청정보 조회
     * @param $el_idx
     * @param $rtn_col
     * @return bool
     */
    public function listEventForAddApply($el_idx, $rtn_col = '')
    {
        $column = "
            AA.EaaIdx, AA.ElIdx, AA.ProdCode, AA.PersonLimitType, AA.PersonLimit, AA.Name, AA.ApplyStartDatm, AA.ApplyEndDatm, 
            AA.RegisterExpireStatus, AA.IsUse, AA.IsStatus, AA.RegDatm, AA.RegAdminIdx, AA.RegIp, AA.UpdDatm, AA.UpdAdminIdx,
            DATE_FORMAT(AA.ApplyStartDatm, '%Y-%m-%d') AS ApplyStartDate,
            DATE_FORMAT(AA.ApplyEndDatm, '%Y-%m-%d') AS ApplyEndDate,
            DATE_FORMAT(AA.ApplyStartDatm, '%H') AS ApplyStartHour,
            DATE_FORMAT(AA.ApplyEndDatm, '%H') AS ApplyEndHour,
            DATE_FORMAT(AA.ApplyStartDatm, '%i') AS ApplyStartMin,
            DATE_FORMAT(AA.ApplyEndDatm, '%i') AS ApplyEndMin
        ";
        $from = "
            FROM {$this->_table['event_add_apply']} AS AA
        ";
        $where = " WHERE AA.ElIdx = ? AND AA.IsStatus = 'Y'";
        $order_by_offset_limit = " ORDER BY AA.EaaIdx DESC";

        $result = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit, [$el_idx])->result_array();

        // 특정 컬럼만 리턴
        if(empty($rtn_col) === false) {
            $arr_rtn_col = [];
            foreach($result as $row){
                $arr_rtn_col = array_merge($arr_rtn_col, [$row[$rtn_col]]);
            }
            $result = $arr_rtn_col;
        }
        return $result;
    }

    /**
     * 프로모션 추가신청정보 수정
     * @param $input
     * @return array|bool
     */
    public function modifyAddApply($input)
    {
        $this->_conn->trans_begin();
        try {
            $input_data = [
                'PersonLimitType' => $input['person_limit_type'],
                'PersonLimit' => $input['person_limit'],
                'Name' => $input['name'],
                'ApplyStartDatm' => $input['apply_start_datm'],
                'ApplyEndDatm' => $input['apply_end_datm'],
                'RegisterExpireStatus' => $input['register_expire_status'],
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($input_data)->where('EaaIdx', $input['eaa_idx']);
            if($this->_conn->update($this->_table['event_add_apply']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 프로모션 추가신청정보 비교/수정
     * @param $el_idx
     * @param $input
     * @return bool
     */
    private function _modifyEventAddApply($el_idx, $input)
    {
        try {
            $arr_event_add_apply_eaa_idx = element('event_add_apply_eaa_idx', $input);
            $arr_event_add_apply_name = element('event_add_apply_name', $input);
            $arr_event_add_apply_person_limit_type = element('event_add_apply_person_limit_type', $input);
            $arr_event_add_apply_person_limit = element('event_add_apply_person_limit', $input);
            $arr_expire_status = element('event_add_apply_register_expire_status', $input);
            $arr_add_apply_is_use = element('add_apply_is_use', $input);
            $arr_event_add_apply_start_date = element('event_add_apply_start_date', $input);
            $arr_event_add_apply_start_hour = element('event_add_apply_start_hour', $input);
            $arr_event_add_apply_start_min = element('event_add_apply_start_min', $input);
            $arr_event_add_apply_end_date = element('event_add_apply_end_date', $input);
            $arr_event_add_apply_end_hour = element('event_add_apply_end_hour', $input);
            $arr_event_add_apply_end_min = element('event_add_apply_end_min', $input);

            if (empty($el_idx) === false && empty($arr_event_add_apply_eaa_idx) === false) {

                $before_data = $this->listEventForAddApply($el_idx, 'EaaIdx');

                // 비교 삭제
                $del_data = array_values(array_diff($before_data, $arr_event_add_apply_eaa_idx));
                if(empty($del_data) === false && count($del_data) > 0) {
                    if($this->removeEventForAddApply($del_data) !== true) {
                        throw new \Exception('프로모션 추가신청정보 업데이트를 실패하였습니다.');
                    }
                }
                // 비교 등록
                $insert_data = array_values(array_diff($arr_event_add_apply_eaa_idx, $before_data));
                if(empty($insert_data) === false) {
                    foreach ($insert_data as $i_key => $i_val) {
                        $arr_key = array_search($i_val, $arr_event_add_apply_eaa_idx) ;
                        $event_add_apply_start_datm = $arr_event_add_apply_start_date[$arr_key] . ' ' . $arr_event_add_apply_start_hour[$arr_key] . ':' . $arr_event_add_apply_start_min[$arr_key] . ':00';
                        $event_add_apply_end_datm = $arr_event_add_apply_end_date[$arr_key] . ' ' . $arr_event_add_apply_end_hour[$arr_key] . ':' . $arr_event_add_apply_end_min[$arr_key] . ':59';

                        $add_param = [
                            'ElIdx' => $el_idx,
                            'PersonLimitType' => $arr_event_add_apply_person_limit_type[$arr_key],
                            'PersonLimit' => $arr_event_add_apply_person_limit[$arr_key],
                            'Name' => $arr_event_add_apply_name[$arr_key],
                            'ApplyStartDatm' => $event_add_apply_start_datm,
                            'ApplyEndDatm' => $event_add_apply_end_datm,
                            'RegisterExpireStatus' => $arr_expire_status[$arr_key],
                            'IsUse' => $arr_add_apply_is_use[$arr_key],
                            'IsStatus' => 'Y',
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                            'RegIp' => $this->input->ip_address()
                        ];
                        if($this->addEventForAddApply($add_param) !== true) {
                            throw new \Exception('프로모션 추가신청정보 업데이트를 실패하였습니다.');
                        }
                    }
                }

                // 비교 수정
                $update_data = array_values(array_intersect($before_data, $arr_event_add_apply_eaa_idx));
                if(empty($update_data) === false) {
                    foreach ($update_data as $i_key => $i_val) {
                        $arr_key = array_search($i_val, $arr_event_add_apply_eaa_idx) ;
                        $event_add_apply_start_datm = $arr_event_add_apply_start_date[$arr_key] . ' ' . $arr_event_add_apply_start_hour[$arr_key] . ':' . $arr_event_add_apply_start_min[$arr_key] . ':00';
                        $event_add_apply_end_datm = $arr_event_add_apply_end_date[$arr_key] . ' ' . $arr_event_add_apply_end_hour[$arr_key] . ':' . $arr_event_add_apply_end_min[$arr_key] . ':59';

                        $modify_param = [
                            'PersonLimitType' => $arr_event_add_apply_person_limit_type[$arr_key],
                            'PersonLimit' => $arr_event_add_apply_person_limit[$arr_key],
                            'Name' => $arr_event_add_apply_name[$arr_key],
                            'ApplyStartDatm' => $event_add_apply_start_datm,
                            'ApplyEndDatm' => $event_add_apply_end_datm,
                            'RegisterExpireStatus' => $arr_expire_status[$arr_key],
                            'IsUse' => $arr_add_apply_is_use[$arr_key]
                        ];
                        if($this->modifyEventForAddApply($i_val, $modify_param) !== true) {
                            throw new \Exception('프로모션 추가신청정보 업데이트를 실패하였습니다.');
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
     * 프로모션 추가신청정보 삭제 업데이트
     * @param array $arr_eaa_idx
     * @return mixed
     */
    public function removeEventForAddApply($arr_eaa_idx)
    {
        try {
            if (empty($arr_eaa_idx) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }
            if(is_array($arr_eaa_idx) === false) {
                $arr_eaa_idx[0] = $arr_eaa_idx;   //단건 처리
            }

            $is_update = $this->_conn->set(['IsStatus' => 'N'])
                ->where_in('EaaIdx', $arr_eaa_idx)
                ->update($this->_table['event_add_apply']);

            if ($is_update !== true) {
                throw new \Exception('프로모션 추가신청정보 삭제 업데이트를 실패하였습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 프로모션 추가신청정보 등록
     * @param array $input
     * @return mixed
     */
    public function addEventForAddApply($input)
    {
        try {
            if (empty($input) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }
            if ($this->_conn->set($input)->insert($this->_table['event_add_apply']) === false) {
                throw new \Exception('프로모션 추가신청정보 등록을 실패하였습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 프로모션 추가신청정보 수정
     * @param string $eaa_idx
     * @param array $input
     * @return mixed
     */
    public function modifyEventForAddApply($eaa_idx, $input)
    {
        try {
            if (empty($eaa_idx) === true || empty($input) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }
            if ($this->_conn->set($input)->where('EaaIdx', $eaa_idx)->update($this->_table['event_add_apply']) === false) {
                throw new \Exception('프로모션 추가신청정보 수정을 실패하였습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

}