<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventFModel extends WB_Model
{
    private $_table = [
        'event_lecture' => 'lms_event_lecture',
        'event_r_category' => 'lms_event_r_category',
        'event_file' => 'lms_event_file',
        'event_comment' => 'lms_event_comment',
        'event_register' => 'lms_event_register',
        'event_member' => 'lms_event_member',
        'event_promotion_otherinfo' => 'lms_event_promotion_otherinfo',
        'event_promotion_live_video' => 'lms_event_promotion_live_video',
        'event_read_log' => 'lms_event_read_log',
        'board' => 'lms_board',
        'board_r_category' => 'lms_board_r_category',
        'vw_board_2' => 'vw_board_2',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'sys_code' => 'lms_sys_code',
        'crm_send' => 'lms_crm_send',
        'crm_send_r_receive_sms' => 'lms_crm_send_r_receive_sms',
        'product_subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'professor_reference' => 'lms_professor_reference',
        'lms_event_promotion_log' => 'lms_event_promotion_log',
        'lms_member' => 'lms_member',
        'product_lecture_sample' => 'lms_product_lecture_sample',
        'pms_professor' => 'wbs_pms_professor',
        'wbs_cms_lecture_unit' => 'wbs_cms_lecture_unit',
        'wbs_cms_lecture' => 'wbs_cms_lecture'
    ];

    //등록파일 rule 설정
    private $_upload_file_rule = [
        'allowed_types' => 'jpg|gif|png|pdf|hwp|doc|docx',
        'overwrite' => 'false',
        'max_size' => 5120
    ];

    public $_request_type = [
        '1' => '설명회',
        '2' => '특강',
        '3' => '이벤트',
    ];
    public $_content_type = [
        'image' => 'I',
        'editer' => 'E'
    ];
    
    public $_register_limit_type = [
        'limit_true' => 'L',    //인원제한
        'limit_false' => 'N'    //인원무제한
    ];

    //이벤트 댓글 노출 영역
    public $_comment_use_area_type = [
        'event' => 'B',
        'banner' => 'P'
    ];

    public $_ccd = [
        'option' => [
            'regist_list' => '660001',
            'comment_list' => '660002',
            'send_sms' => '660003'
        ]
    ];

    // 메세지 발송 치환 정보
    private $_sms_send_content_replace = [
        '{{name}}' => 'register_name',
        '{{id}}' => 'register_id'
    ];

    //이벤트공지사항 (댓글영역)
    public $_bm_idx = '86';

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listAllEvent($is_count, $arr_condition=[], $sub_query_condition, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.ElIdx, A.SiteCode, A.CampusCcd, A.BIdx, A.IsBest, A.TakeType, A.RequestType, A.EventName,
            A.RegisterStartDate, A.RegisterEndDate, DATE_FORMAT(A.RegisterStartDate, \'%Y-%m-%d\') AS RegisterStartDay, DATE_FORMAT(A.RegisterEndDate, \'%Y-%m-%d\') AS RegisterEndDay,
            A.OptionCcds, A.ReadCnt + A.AdjuReadCnt AS ReadCnt, A.IsRegister, A.IsUse, A.RegDatm,
            G.SiteName, J.CcdName AS CampusName, D.CateCode,
            K.FileFullPath, K.FileName, IFNULL(H.CCount,\'0\') AS CommentCount,
            CASE A.RequestType WHEN 1 THEN \'설명회\' WHEN 2 THEN \'특강\' WHEN 3 THEN \'이벤트\' WHEN 4 THEN \'합격수기\' END AS RequestTypeName,
            CASE A.IsRegister WHEN \'Y\' THEN \'접수중\' WHEN 2 THEN \'마감\' END AS IsRegisterName,
            CASE A.TakeType WHEN 1 THEN \'회원\' WHEN 2 THEN \'회원+비회원\' END AS TakeTypeName
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
                FROM {$this->_table['event_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                {$sub_query_where}
                GROUP BY B.ElIdx
            ) AS D ON A.ElIdx = D.ElIdx
            LEFT JOIN (
                SELECT ElIdx, COUNT(CIdx) AS CCount
                FROM {$this->_table['event_comment']}
                GROUP BY ElIdx
            ) AS H ON H.ElIdx = A.ElIdx
            LEFT JOIN {$this->_table['event_file']} AS K ON A.ElIdx = K.ElIdx AND K.IsUse = 'Y' AND K.FileType = 'S'
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            LEFT OUTER JOIN {$this->_table['sys_code']} AS J ON A.CampusCcd = J.Ccd
        ";

        $default_arr_condition = ['NOT' => ['a.RequestType' => '5']];
        $arr_condition = array_merge_recursive($arr_condition, $default_arr_condition);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function findEvent($arr_condition, $add_type = null)
    {
        $column = '
            A.ElIdx, A.SiteCode, A.CampusCcd, A.BIdx, A.IsBest, A.TakeType, A.RequestType, A.EventName, A.PopupTitle, A.ContentType, A.Content, A.CommentUseArea, A.LimitType, A.SelectType,
            A.RegisterStartDate, A.RegisterEndDate, DATE_FORMAT(A.RegisterStartDate, \'%Y-%m-%d\') AS RegisterStartDay, DATE_FORMAT(A.RegisterEndDate, \'%Y-%m-%d\') AS RegisterEndDay,
            A.OptionCcds, A.ReadCnt + A.AdjuReadCnt AS ReadCnt, A.IsRegister, A.IsUse, A.RegDatm, DATE_FORMAT(A.RegDatm, \'%Y-%m-%d\') AS RegDay,
            A.SendTel, A.SmsContent,
            G.SiteName, J.CcdName AS CampusName,
            IFNULL(H.CCount,\'0\') AS CommentCount,
            CASE A.RequestType WHEN 1 THEN \'설명회\' WHEN 2 THEN \'특강\' WHEN 3 THEN \'이벤트\' WHEN 4 THEN \'합격수기\' END AS RequestTypeName,
            CASE A.IsRegister WHEN \'Y\' THEN \'접수중\' WHEN 2 THEN \'마감\' END AS IsRegisterName,
            CASE A.TakeType WHEN 1 THEN \'회원\' WHEN 2 THEN \'회원+비회원\' END AS TakeTypeName,
            P.SubjectName, R.wProfName
            ';

        $from = "
            FROM {$this->_table['event_lecture']} AS A
            LEFT JOIN (
                SELECT CIdx, ElIdx, COUNT(CIdx) AS CCount
                FROM {$this->_table['event_comment']}
            ) AS H ON H.ElIdx = A.ElIdx
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            LEFT OUTER JOIN {$this->_table['sys_code']} AS J ON A.CampusCcd = J.Ccd
            LEFT OUTER JOIN {$this->_table['product_subject']} as P ON A.SubjectIdx = P.SubjectIdx
            LEFT OUTER JOIN {$this->_table['professor']} as Q ON A.ProfIdx = Q.ProfIdx
            LEFT JOIN {$this->_table['pms_professor']} as R ON Q.wProfIdx = R.wProfIdx
        ";

        $default_arr_condition = [];
        if ($add_type != 'promotion') {
            $default_arr_condition = ['NOT' => ['A.RequestType' => '5']];
        }
        $arr_condition = array_merge_recursive($arr_condition, $default_arr_condition);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 이벤트 신청 리스트
     * @param array $arr_condition
     * @return mixed
     */
    public function listEventForRegister($arr_condition=[])
    {
        $column = 'A.ErIdx, A.PersonLimitType, A.PersonLimit, A.Name, A.RegisterExpireStatus, IFNULL(B.MemCount, \'0\') AS MemCount';
        $from = "
            FROM {$this->_table['event_register']} AS A
            LEFT JOIN (
                SELECT ErIdx, COUNT(ErIdx) AS MemCount
                FROM lms_event_member
                GROUP BY ErIdx
            ) AS B ON A.ErIdx = B.ErIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->result_array();
    }

    /**
     * 이벤트 신청 회원 정보
     * @param array $arr_condition
     * @return mixed
     */
    public function getRegisterMember($arr_condition=[])
    {
        $column = 'A.EmIdx, A.ErIdx, A.MemIdx, A.UserName, A.UserTelEnc, A.UserMailEnc, A.FileFullPath, A.FileRealName';
        $from = " FROM {$this->_table['event_member']} AS A";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->result_array();
    }

    /**
     * 이벤트 특강별 회원 수
     * @param array $arr_condition
     * @return mixed
     */
    public function getRegisterMemberCount($arr_condition = [])
    {
        $column = 'ErIdx, COUNT(ErIdx) AS MemCount';
        $from = " FROM {$this->_table['event_member']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $group_by = ' GROUP BY ErIdx ';
        $query = $this->_conn->query('select ' . $column . $from . $where . $group_by);
        return $query->result_array();
    }

    /**
     * 특강 신청자 등록
     * @param array $inputData
     * @param $site_code
     * @param string $register_type 등록타입(이벤트, 프로모션)
     * @return array|bool
     */
    public function addEventRegisterMember($inputData = [], $site_code, $register_type = '')
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ'=>[
                    'A.ElIdx' => element('event_idx', $inputData),
                    'A.IsStatus' => 'Y'
                ],
                'GTE' => [
                    'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                ]
            ];
            $event_data = $this->findEvent($arr_condition, $register_type);
            if (empty($event_data) === true) {
                throw new \Exception('조회된 이벤트 정보가 없습니다.');
            }

            $arr_condition = [
                'EQ' => ['A.IsStatus' => 'Y'],
                'IN' => ['A.ErIdx' => $inputData['register_chk']]
            ];
            $result_register = $this->listEventForRegister($arr_condition);
            if (empty($result_register) === true) {
                throw new \Exception('조회된 특강 정보가 없습니다.');
            }

            $register_info = [];
            foreach ($result_register as $key => $row) {
                $register_info[$row['ErIdx']] = $result_register[$key];
            }

            //인원제한체크를 위한 특강별 회원 수
            $arr_condition = [
                'IN' => ['ErIdx' => $inputData['register_chk']]
            ];
            $result_register_member_info = $this->getRegisterMemberCount($arr_condition);
            $arr_register_member = array_pluck($result_register_member_info,'MemCount','ErIdx');

            //검증
            foreach ($register_info as $key => $row) {
                //만료상태 체크
                if ($row['RegisterExpireStatus'] == 'N') {
                    throw new \Exception('접수 만료된 상태입니다.');
                }

                //특강별 인원제한 체크
                if ((empty($arr_register_member[$key]) === false) && $row['PersonLimitType'] == $this->_register_limit_type['limit_true'] && $row['PersonLimit'] <= $arr_register_member[$key]) {
                    throw new \Exception('마감되었습니다.');
                }

                //중복체크, 저장 데이터 셋팅
                $register_tel = (empty($inputData['register_tel']) === true) ? '' : $this->memberFModel->getEncString($inputData['register_tel']);
                $register_email = (empty($inputData['register_email']) === true) ? '' : $this->memberFModel->getEncString($inputData['register_email']);

                $etc_value = '';
                if (empty($inputData['target_params']) === false && is_array($inputData['target_params'])) {
                    foreach ($inputData['target_params'] as $target_key => $target_param) {
                        $etc_value .= $inputData[$target_param]. ',';
                    }
                    $etc_value = substr($etc_value, 0, -1);
                }

                if(empty($this->session->userdata('mem_idx')) === true) {
                    $arr_condition = [
                        'EQ' => [
                            'A.ErIdx' => $key,
                            'A.UserName' => $inputData['register_name'],
                            'A.UserTelEnc' => $register_tel,
                            'A.UserMailEnc' => $register_email
                        ]
                    ];

                    $input_register_data = [
                        'ErIdx' => $key,
                        'UserName' => $inputData['register_name'],
                        'UserTelEnc' => $register_tel,
                        'UserMailEnc' => $register_email,
                        'EtcValue' => $etc_value
                    ];
                } else {
                    $arr_condition = [
                        'EQ' => [
                            'A.ErIdx' => $key,
                            'A.MemIdx' => $this->session->userdata('mem_idx'),
                            'A.UserName' => $inputData['register_name'],
                            'A.UserTelEnc' => $register_tel,
                            'A.UserMailEnc' => $register_email
                        ]
                    ];

                    $input_register_data = [
                        'ErIdx' => $key,
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'UserName' => $inputData['register_name'],
                        'UserTelEnc' => $register_tel,
                        'UserMailEnc' => $register_email,
                        'EtcValue' => $etc_value
                    ];
                }

                $register_member_info = $this->getRegisterMember($arr_condition);
                if (count($register_member_info) > 0) {
                    throw new \Exception('등록된 신청자 정보가 있습니다.');
                }

                //이미지 등록
                if (empty($_FILES['attach_file']) === false) {
                    $sum_size_mb = round($_FILES['attach_file']['size'] / 1024);
                    if ($sum_size_mb > $this->_upload_file_rule['max_size']) {
                        throw new \Exception('첨부파일 최대 5MB까지 등록 가능합니다.');
                    }

                    $this->load->library('upload');
                    $upload_dir = config_item('upload_prefix_dir') . '/event/member/' . date('Y') . '/' . date('md');
                    $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_dir
                        ,'allowed_types:'.$this->_upload_file_rule['allowed_types'].',overwrite:'.$this->_upload_file_rule['overwrite']);
                    if (is_array($uploaded) === false) {
                        throw new \Exception($uploaded);
                    }

                    if (count($uploaded) > 0) {
                        $input_register_data['FileFullPath'] = $this->upload->_upload_url . $upload_dir . '/' . $uploaded[0]['orig_name'];
                        $input_register_data['FileRealName'] = $uploaded[0]['client_name'];
                    }
                }

                if ($this->_addEventRegisterMember($input_register_data) !== true) {
                    throw new \Exception('특강 신청에 등록 실패했습니다.');
                }
            }

            //SMS 발송
            $arr_event_option = array_flip(explode(',', $event_data['OptionCcds']));
            if (empty($arr_event_option) === false && array_key_exists($this->_ccd['option']['send_sms'], $arr_event_option) === true) {
                if ($this->_sendSms($event_data, $inputData) === false) {
                    throw new \Exception('SMS발송 실패했습니다. 관리자에게 문의해 주세요.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    public function modifyRegisterMemberForFile($inputData)
    {
        $this->_conn->trans_begin();
        try {
            $input_data = [];
            $arr_condition = [
                'EQ' => [
                    'A.ErIdx' => element('register_chk', $inputData)[0],
                    'A.MemIdx' => $this->session->userdata('mem_idx')
                ]
            ];

            $register_member_info = $this->getRegisterMember($arr_condition);
            if (empty($register_member_info) === true) {
                throw new \Exception('등록된 신청자 정보가 없습니다.');
            }

            $this->load->library('upload');
            $this->load->helper('file');
            $upload_dir = config_item('upload_prefix_dir') . '/event/member/' . date('Y') . '/' . date('md');

            if ($_FILES['attach_file']['size'] > 0) {
                if (empty($register_member_info[0]['FileRealName']) === false) {
                    $file_path = $register_member_info[0]['FileFullPath'];
                    $real_file_path = public_to_upload_path($file_path);
                    if (@unlink($real_file_path) === false) {
                        /*throw new \Exception('이미지 삭제에 실패했습니다.');*/
                    }
                }
                $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames(), $upload_dir
                    ,'allowed_types:'.$this->_upload_file_rule['allowed_types'].',overwrite:'.$this->_upload_file_rule['overwrite']);
                if (is_array($uploaded) === false) {
                    throw new \Exception($uploaded);
                }

                if (count($uploaded) > 0) {
                    $input_data['FileFullPath'] = $this->upload->_upload_url . $upload_dir . '/' . $uploaded[0]['orig_name'];
                    $input_data['FileRealName'] = $uploaded[0]['client_name'];
                }
            } else {
                throw new \Exception('수정할 파일을 선택해 주세요.');
            }

            $is_update = $this->_conn->set($input_data)->where('MemIdx', $this->session->userdata('mem_idx'))->where('ErIdx', element('register_chk', $inputData)[0])->update($this->_table['event_member']);

            if ($is_update === false) {
                throw new \Exception('파일 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 댓글 리스트
     * @param $is_count
     * @param $arr_condition_notice
     * @param $arr_condition_event_comment
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listEventForComment($is_count, $arr_condition_notice, $arr_condition_event_comment, $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '*';
            $order_by_offset_limit = $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where_notice = $this->_conn->makeWhere($arr_condition_notice);
        $where_notice = $where_notice->getMakeWhere(false);

        $where_comment = $this->_conn->makeWhere($arr_condition_event_comment);
        $where_comment = $where_comment->getMakeWhere(false);

        $from = "
        FROM (
            SELECT a.*
            FROM (
                SELECT a.BoardIdx AS Idx, '' AS MemIdx, '공지' AS MemName, a.Title AS Content, a.RegDatm, DATE_FORMAT(a.RegDatm, '%Y-%m-%d') AS RegDay, '1' AS RegType
                FROM {$this->_table['vw_board_2']} AS a
                INNER JOIN {$this->_table['board_r_category']} AS b ON a.BoardIdx = b.BoardIdx AND b.IsStatus = 'Y'
                {$where_notice}
                ORDER BY a.BoardIdx DESC
            ) AS a
            UNION ALL
            SELECT b.*
            FROM (
                SELECT a.CIdx AS Idx, IFNULL(a.MemIdx, ''), a.MemName, a.Comment AS Content, a.RegDatm, DATE_FORMAT(a.RegDatm, '%Y-%m-%d') AS RegDay, '2' AS RegType
                FROM {$this->_table['event_comment']} AS a
                INNER JOIN {$this->_table['event_lecture']} AS b ON a.ElIdx = b.ElIdx
                INNER JOIN {$this->_table['event_r_category']} AS c ON a.ElIdx = c.ElIdx AND c.IsStatus = 'Y'
                {$where_comment}
                ORDER BY a.CIdx ASC
            ) AS b
        ) AS c
        ";

        $query = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 댓글 등록 처리
     * @param array $requestData
     * @param string $add_type
     * @return array|bool
     */
    public function addEventComment($requestData = [], $add_type = null)
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ'=>[
                    'A.ElIdx' => element('event_idx', $requestData),
                    'A.IsStatus' => 'Y'
                ],
                'GTE' => [
                    'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                ]
            ];
            $event_data = $this->findEvent($arr_condition, $add_type);
            if (count($event_data) < 1) {
                throw new \Exception('조회된 이벤트 정보가 없습니다.');
            }

            if ($event_data['TakeType'] == '1' && empty($this->session->userdata('mem_idx')) === true) {
                throw new \Exception('로그인 후 이용해주세요.');
            }

            $inputData = [
                'ElIdx' => $requestData['event_idx'],
                'MemIdx' => $this->session->userdata('mem_idx'),
                'MemName' => $this->session->userdata('mem_name'),
                'CommentType' => 'U',
                'CommentUiCcd' => element('comment_ui_ccd', $requestData, '713001'),
                'Comment' => $requestData['event_comment'],
                'EmoticonNo' => element('sns_icon', $requestData, ''),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($inputData)->insert($this->_table['event_comment']) === false) {
                throw new \Exception('댓글 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 댓글 삭제 처리
     * @param $comment_idx
     * @return array|bool
     */
    public function delEventComment($comment_idx)
    {
        $this->_conn->trans_begin();
        try {
            $result = $this->_findCommentData($comment_idx, 'CIdx');
            if (empty($result)) {
                throw new \Exception('조회된 댓글이 없습니다.');
            }

            $is_update = $this->_conn->set([
                'IsStatus' => 'N',
                'UpdDatm' => date('Y-m-d H:i:s')
            ])->where('CIdx', $comment_idx)->where('IsStatus', 'Y')->update($this->_table['event_comment']);

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
     * 이벤트용 공지사항
     * @param $board_idx
     * @param string $column
     * @return mixed
     */
    public function findEventForNotice($board_idx, $column='*')
    {
        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'BoardIdx' => $board_idx,
                'IsUse' => 'Y'
            ],
        ];
        $result = $this->_conn->getListResult($this->_table['vw_board_2'], $column, $arr_condition, '1', null);
        //echo $this->_conn->last_query();exit;
        return element('0', $result, []);
    }

    public function getEventForNotice($event_idx, $column='*', $order_by=['b.BoardIdx' => 'desc'])
    {
        $def_column = "
                m.*,
                IFNULL((
                    SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                        'FileIdx', BoardFileIdx,
                        'FileType', AttachFiletype,
                        'FilePath', AttachFilePath,
                        'FileName', AttachFileName,
                        'RealName', AttachRealFileName,
                        'Filesize', AttachFileSize
                    )), ']') AS AttachData	
                    
                    FROM lms_board_attach
                    WHERE BoardIdx=m.BoardIdx AND IsStatus='Y'
                ),'N') AS AttachData
            ";
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset(10, null)->getMakeLimitOffset();

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.ElIdx' => $event_idx,
                'b.IsUse' => 'Y'
            ],
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['board']} AS b
        ";

        $set_query = ' FROM ( select ' . $column;
        $set_query .= $from . $where . $order_by_offset_limit;
        $set_query .= ') AS m ';
        $query = $this->_conn->query('select ' . $def_column . $set_query);

        return $query->result_array();
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
     * 이벤트 조회수 수정 및 로그정보 저장
     * @param $event_idx
     * @return array|bool|string
     */
    public function modifyEventRead($event_idx)
    {
        if(empty($event_idx)) {
            return '이벤트 번호가 없습니다.';
        }

        $this->_conn->trans_begin();
        try{
            #-----  조회수 업데이트
            $this->_conn->set('ReadCnt', 'ReadCnt+1',false)->where('ElIdx', $event_idx);
            if ($this->_conn->update($this->_table['event_lecture']) === false) {
                throw new \Exception('조회수 수정에 실패했습니다.');
            }

            #----- 로그 저장
            $log_data = [
                'ElIdx' => $event_idx
                ,'MemIdx' => sess_data('mem_idx')
                ,'UserAgent' => substr($this->input->user_agent(),0,99)
                ,'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($log_data)->insert($this->_table['event_read_log']) === false) {
                throw new \Exception('로그 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        //echo $this->_conn->last_query();
        return true;
    }

    /**
     * MyClass -> 회원 이벤트신청현황
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllEventForMyClass($is_count, $arr_condition=[], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'A.*';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM (
                SELECT STRAIGHT_JOIN
                    c.ElIdx, c.CampusCcd, fn_ccd_name(c.CampusCcd) AS CampusName, f.SiteGroupName, IF(e.IsCampus = 'Y', '학원', '온라인') AS OnOffTypeName,
                    c.EventName, CASE c.RequestType WHEN 1 THEN '설명회' WHEN 2 THEN '특강' WHEN 3 THEN '이벤트' END AS RequestTypeName,
                    DATE_FORMAT(c.RegisterStartDate, '%Y-%m-%d') AS RegisterStartDate,
	                DATE_FORMAT(c.RegisterEndDate, '%Y-%m-%d') AS RegisterEndDate,
                    d.FileFullPath, d.FileName,
                    DATE_FORMAT(a.RegDatm, '%Y-%m-%d') AS MemRegDatm
                FROM
                    {$this->_table['event_member']} AS a
                    INNER JOIN {$this->_table['event_register']} AS b ON a.ErIdx = b.ErIdx
                    INNER JOIN {$this->_table['event_lecture']} AS c ON b.ElIdx = c.ElIdx
                    LEFT JOIN {$this->_table['event_file']} AS d ON c.ElIdx = d.ElIdx AND d.IsUse = 'Y' AND d.FileType = 'S'
                    INNER JOIN {$this->_table['site']} AS e ON c.SiteCode = e.SiteCode
                    INNER JOIN {$this->_table['site_group']} AS f ON e.SiteGroupCode = f.SiteGroupCode
                {$where}
                GROUP BY c.Elidx
            ) AS A
        ";

        $query = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function findAttachData($arr_condition)
    {
        $column = '
            EfIdx, ElIdx, FileName, FileRealName, FileFullPath, FileType
        ';
        $from = "
            FROM {$this->_table['event_file']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '. $column . $from . $where . ' limit 1')->row_array();
    }

    /**
     * 프로모션 조회
     * @param $promotion_code
     * @param $test_type [1:프로모션 확인용 파라미터]
     * @return mixed
     */
    public function findEventForPromotion($promotion_code, $test_type = '')
    {
        $column = '
            ElIdx, Content, OptionCcds, EventName, PromotionCode, PromotionParams, PromotionLiveType, RegisterEndDate, CommentUseArea, LimitType, PromotionCnt
        ';
        $from = "
            FROM {$this->_table['event_lecture']}
        ";

        // 1일 경우 미리보기용으로 간주
        if ($test_type == 1) {
            $arr_condition = ['EQ'=>['PromotionCode' => $promotion_code]];
        } else {
            $arr_condition = [
                'EQ' => [
                    'PromotionCode' => $promotion_code,
                    'RequestType' => '5',
                    'IsUse' => 'Y',
                    'IsStatus' => 'Y'
                ],
                /*'GTE' => [
                    'a.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                ]*/
            ];
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '. $column . $from . $where . ' limit 1')->row_array();
    }

    /**
     * 프로모션 접속 로그
     * @param $site_code
     * @param $cate_code
     * @param null $idx
     * @return array|bool
     */
    public function saveLogPromotion($site_code, $cate_code, $idx = null)
    {
        $refer_info = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null ;
        $refer_domain = parse_url($refer_info, PHP_URL_HOST);
        $this->__userAgent($agent_short, $agent, $platform);

        $input_data = [
            'SiteCode' => $site_code,
            'CateCode' => $cate_code,
            'PromotionCode' => $idx,
            'MemIdx' => (empty($this->session->userdata('mem_idx')) ? null : $this->session->userdata('mem_idx')),
            'ReferDomain' => (empty($refer_domain) ? null : $refer_domain ),
            'ReferPath' => (empty($refer_info) ? null : $refer_info ),
            'ReferQuery' => urldecode($_SERVER['QUERY_STRING']),
            'UserPlatform' =>$platform,
            'UserAgent' =>substr($agent,0,199),
            'RegIp' =>$this->input->ip_address()
        ];

        try {
            if ($this->_conn->set($input_data)->insert($this->_table['lms_event_promotion_log']) === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 등록파일 데이터 조회
     * @param $el_idx
     * @return mixed
     */
    public function listEventForFile($el_idx)
    {
        $column = "EfIdx, FileName, FileRealName, FileFullPath, FileType, Ordering";
        $from = "
            FROM {$this->_table['event_file']}
        ";
        $where = ' where ElIdx = ? and IsUse = "Y"';
        $order_by_offset_limit = ' order by EfIdx asc';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$el_idx])->result_array();
    }

    /**
     * 프로모션 댓글 리스트
     * @param $is_count
     * @param $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listEventForCommentPromotion($is_count, $arr_condition, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'a.CIdx AS Idx, IFNULL(a.MemIdx, \'\') AS MemIdx, a.MemName, m.MemId, a.Comment AS Content, a.EmoticonNo, a.RegDatm, DATE_FORMAT(a.RegDatm, \'%Y-%m-%d\') AS RegDay, \'2\' AS RegType';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['event_comment']} AS a
            INNER JOIN {$this->_table['event_lecture']} AS b ON a.ElIdx = b.ElIdx
            INNER JOIN {$this->_table['event_r_category']} AS c ON a.ElIdx = c.ElIdx AND c.IsStatus = 'Y'
            LEFT JOIN {$this->_table['lms_member']} AS m ON a.MemIdx = m.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
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
        G.SubjectName, H.ProfNickName, sample.wUnitIdx, PR.ReferValue, wLecUnit.wUnitIdx, MasterLecture.wAttachPath, wLecUnit.wUnitAttachFile, wLecUnit.wUnitAttachFileReal, wLecUnit.wHD
        ';
        $from = "
            FROM {$this->_table['event_promotion_otherinfo']} AS A
            LEFT OUTER JOIN {$this->_table['product_subject']} AS G ON A.SubjectIdx = G.SubjectIdx
            LEFT OUTER JOIN {$this->_table['professor']} AS H ON A.ProfIdx = H.ProfIdx
            LEFT OUTER JOIN {$this->_table['product_lecture_sample']} AS sample ON A.OtherData1 = sample.ProdCode AND sample.IsStatus='Y'
            LEFT OUTER JOIN {$this->_table['wbs_cms_lecture_unit']} AS wLecUnit ON sample.wUnitIdx = wLecUnit.wUnitIdx AND sample.IsStatus='Y' AND wLecUnit.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['wbs_cms_lecture']} AS MasterLecture ON wLecUnit.wLecIdx = MasterLecture.wLecIdx
            LEFT OUTER JOIN {$this->_table['professor_reference']} AS PR ON A.ProfIdx = PR.ProfIdx AND PR.ReferType = 'lec_detail_img' AND PR.IsStatus = 'Y'
        ";
        $where = ' where A.PromotionCode = ? and A.IsStatus = "Y"';
        $order_by_offset_limit = ' order by A.OrderNum asc';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$promotion_code])->result_array();
    }

    public function listEventPromotionForLiveVideo($promotion_code)
    {
        $column = '
            EplvIdx, PromotionCode, Title, LiveAutoType, LiveRatio, REPLACE(LiveDate, "-", "") AS LiveDate, LiveStartTime, LiveEndTime, LiveUrl, FileFullPath, FileRealName, FileStartDatm, FileEndDatm,
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
        $where = ' where PromotionCode = ? and IsStatus = "Y" and IsUse = "Y"';
        $order_by_offset_limit = ' order by EplvIdx asc';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$promotion_code])->result_array();
    }

    private function __userAgent(&$agent_short, &$agent, &$platform)
    {
        $this->load->library('user_agent');

        if ($this->agent->is_browser())
        {
            $agent_short = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
            $agent_short = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
            $agent_short = $this->agent->mobile();
        }
        else
        {
            $agent_short = 'Unidentified User Agent';
        }

        $agent = $this->agent->agent_string();
        $platform = $this->agent->platform();
    }

    /**
     * 이벤트 특강 신청 데이터 저장
     * @param $inputData
     * @return array|bool
     */
    private function _addEventRegisterMember($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table['event_member']) === false) {
                throw new \Exception('특강 신청에 등록 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    private function _findCommentData($idx, $column = '*')
    {
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
     * 발송완료 SMS 발송
     * @param $data [발신자 정보]
     * @param $send_data [수신자 정보]
     * @return bool
     */
    private function _sendSms($data, $send_data)
    {
        //메세지 치환
        foreach($this->_sms_send_content_replace as $key => $val) {
            if(strpos($data['SmsContent'], $key) !== false) {
                $data['SmsContent'] = str_replace($key, $send_data[$val], $data['SmsContent']);
            }
        }

        $this->load->library('sendSms');
        if ($this->sendsms->send($send_data['register_tel'], $data['SmsContent'], $data['SendTel']) !== true) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 파일명 생성
     * @return string
     */
    private function _getAttachImgNames()
    {
        $attach_file_names = date("YmdHis").'-'.rand(100,999);
        return $attach_file_names;
    }
}