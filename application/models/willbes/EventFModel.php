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
        'lms_member_otherinfo' => 'lms_member_otherinfo',
        'product_lecture_sample' => 'lms_product_lecture_sample',
        'pms_professor' => 'wbs_pms_professor',
        'wbs_cms_lecture_unit' => 'wbs_cms_lecture_unit',
        'wbs_cms_lecture' => 'wbs_cms_lecture',
        'event_r_point' => 'lms_event_r_point',
        'point_save' => 'lms_point_save',
        'event_register_r_product' => 'lms_event_register_r_product',
        'event_add_apply' => 'lms_event_add_apply',
        'event_add_apply_member' => 'lms_event_add_apply_member',
        'cart' => 'lms_cart',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product'
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

    // 포인트 구분
    private $_point_type = [
        '635002' => 'lecture',      // 강좌 포인트
        '635003' => 'book'          // 교재 포인트
    ];

    // 메세지 발송 치환 정보
    private $_sms_send_content_replace = [
        '{{name}}' => 'register_name',
        '{{id}}' => 'register_id'
    ];

    // 회원 관심직렬
    protected $_interest_to_sitecode = [
        '718001' => '2001',     // 경찰
        '718002' => '2003',     // 공무원
        '718003' => '2006',     // 자격증
        '718004' => '2005',     // 고등고시
        '718005' => '2008',     // 경찰간부
        '718006' => '2009',     // 취업
        '718007' => '2007',     // 어학
    ];

    // 회원의 관심직렬이 없을경우 default 세팅
    private $_default_point_site_code = '2001';     // 경찰 온라인

    //이벤트공지사항 (댓글영역)
    public $_bm_idx = '86';

    public function __construct()
    {
        parent::__construct('lms');
        $this->load->loadModels(['crm/smsF', 'pointF', 'order/orderF', 'order/cartF']);
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
            A.ElIdx, A.PromotionCode, A.SiteCode, A.CampusCcd, A.BIdx, A.IsBest, A.TakeType, A.RequestType, A.EventName, A.PopupTitle, A.ContentType, A.Content, A.CommentUseArea, A.LimitType, A.SelectType,
            A.RegisterStartDate, A.RegisterEndDate, DATE_FORMAT(A.RegisterStartDate, \'%Y-%m-%d\') AS RegisterStartDay, DATE_FORMAT(A.RegisterEndDate, \'%Y-%m-%d\') AS RegisterEndDay,
            A.OptionCcds, A.ReadCnt + A.AdjuReadCnt AS ReadCnt, A.IsRegister, A.IsUse, A.RegDatm, DATE_FORMAT(A.RegDatm, \'%Y-%m-%d\') AS RegDay,
            A.SendTel, A.SmsContent,
            G.SiteName, J.CcdName AS CampusName,
            IFNULL(H.CCount,\'0\') AS CommentCount,
            CASE A.RequestType WHEN 1 THEN \'설명회\' WHEN 2 THEN \'특강\' WHEN 3 THEN \'이벤트\' WHEN 4 THEN \'합격수기\' END AS RequestTypeName,
            CASE A.IsRegister WHEN \'Y\' THEN \'접수중\' WHEN 2 THEN \'마감\' END AS IsRegisterName,
            CASE A.TakeType WHEN 1 THEN \'회원\' WHEN 2 THEN \'회원+비회원\' END AS TakeTypeName,
            P.SubjectName, R.wProfName, A.CommentPointType, A.CommentPointAmount, A.CommentPointValidDays, A.PromotionParams
            ';

        $from = "
            FROM {$this->_table['event_lecture']} AS A
            LEFT JOIN (
                SELECT CIdx, ElIdx, COUNT(CIdx) AS CCount
                FROM {$this->_table['event_comment']}
                WHERE IsUse = 'Y' 
                AND IsStatus = 'Y'
                GROUP BY ElIdx
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
                FROM {$this->_table['event_member']}
                GROUP BY ErIdx
            ) AS B ON A.ErIdx = B.ErIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->result_array();
    }

    /**
     * 이벤트 추가신청 정보 리스트
     * @param array $arr_condition
     * @return mixed
     */
    public function listEventForApply($arr_condition=[])
    {
        $column = 'A.*, IFNULL(B.MemCount, \'0\') AS MemCount';
        $from = "
            FROM {$this->_table['event_add_apply']} AS A
            LEFT JOIN (
                SELECT EaaIdx, COUNT(EaaIdx) AS MemCount
                FROM {$this->_table['event_add_apply_member']}
                GROUP BY EaaIdx
            ) AS B ON A.EaaIdx = B.EaaIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('SELECT ' . $column . $from . $where);
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
        $from = " 
            FROM {$this->_table['event_member']} AS A
            LEFT OUTER JOIN {$this->_table['event_register']} AS B ON A.ErIdx = B.ErIdx AND B.IsStatus = 'Y'
        ";
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
                        if(strpos($target_param, '[]') !== false) {
                            // 체크박스등 name[]로 넘어왔을 경우 처리
                            foreach ($inputData[str_replace('[]', '', $target_param)] as $m_key => $m_val) {
                                $etc_value .= $m_val . ',';
                            }
                        } else {
                            $etc_value .= $inputData[$target_param]. ',';
                        }
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

                //신청자 조회 추가 조건
                if (empty($inputData['register_chk_col']) === false && is_array($inputData['register_chk_col']) === true) {
                    foreach ($inputData['register_chk_col'] as $keyRcw => $valRcw) {
                        $arr_condition = array_merge($arr_condition,[
                            'LKB' => [
                                $valRcw => $inputData['register_chk_val'][$keyRcw]
                            ]
                        ]);
                    }
                }

                //여러 특강중 하나의 특강만 신청 가능할시
                if(empty($inputData['register_chk_el_idx']) === false) {
                    unset($arr_condition['EQ']['A.ErIdx']); //기존 ErIdx 조회 조건 제거
                    $arr_condition['EQ']['B.ElIdx'] = $inputData['register_chk_el_idx'];
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

                // 지급할 강의상품이 있을 경우
                if(empty($row['ErIdx']) === false && empty($this->session->userdata('mem_idx')) == false) {
                    //중복신청여부 로그인 아이디 기준으로 체크
                    $result_register_member = $this->getRegisterMember(['EQ' => [ 'A.ErIdx' => $row['ErIdx'], 'A.MemIdx' => $this->session->userdata('mem_idx')]]);
                    if(count($result_register_member) == 0) {
                        $arr_event_product = $this->listEventPromotionForProduct($row['ErIdx']);
                        if(empty($arr_event_product) === false && count($arr_event_product) > 0) {
                            //데이터 배열 가공
                            $arr_product_code = [];
                            foreach($arr_event_product as $row){
                                $arr_product_code = array_merge($arr_product_code, [$row['ProdCode']]);
                            }
                            if($this->orderFModel->procAutoOrder('event', element('event_idx', $inputData), $arr_product_code) !== true) {
                                throw new \Exception('제공 강의상품이 처리되지 않았습니다.');
                            }
                        }
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
                SELECT '1' AS ContentOrderBy, a.BoardIdx AS Idx, '' AS MemIdx, '공지' AS MemName, a.Title AS Content, a.RegDatm, DATE_FORMAT(a.RegDatm, '%Y-%m-%d') AS RegDay, '1' AS RegType
                FROM {$this->_table['vw_board_2']} AS a
                INNER JOIN {$this->_table['board_r_category']} AS b ON a.BoardIdx = b.BoardIdx AND b.IsStatus = 'Y'
                {$where_notice}
                ORDER BY a.BoardIdx DESC
            ) AS a
            UNION ALL
            SELECT b.*
            FROM (
                SELECT '0' AS ContentOrderBy, a.CIdx AS Idx, IFNULL(a.MemIdx, ''), a.MemName, a.Comment AS Content, a.RegDatm, DATE_FORMAT(a.RegDatm, '%Y-%m-%d') AS RegDay, '2' AS RegType
                FROM {$this->_table['event_comment']} AS a
                INNER JOIN {$this->_table['event_lecture']} AS b ON a.ElIdx = b.ElIdx
                INNER JOIN {$this->_table['event_r_category']} AS c ON a.ElIdx = c.ElIdx AND c.IsStatus = 'Y'
                {$where_comment}
                ORDER BY a.CIdx DESC
            ) AS b
        ) AS c
        ORDER BY c.ContentOrderBy DESC, c.Idx DESC
        ";

        $query = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 댓글 등록 처리
     * @param array $requestData
     * @param string $add_type
     * @param string $site_code
     * @return array|bool
     */
    public function addEventComment($requestData = [], $add_type = null, $site_code = null)
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
            if (empty($event_data) === true || count($event_data) < 1) {
                throw new \Exception('이벤트 접수기간이 아니거나 이벤트 정보가 없습니다.');
            }

            if ($event_data['TakeType'] == '1' && empty($this->session->userdata('mem_idx')) === true) {
                throw new \Exception('로그인 후 이용해주세요.');
            }

            // *** 댓글 포인트 지급 ***
            if(empty($event_data['CommentPointType']) === false && empty($this->session->userdata('mem_idx')) === false && empty($site_code) === false) {
                // 댓글 형태가 기본형(713001)일 경우에만 포인트 지급
                if(empty($requestData['comment_ui_ccd']) === false && $requestData['comment_ui_ccd'] == '713001') {
                    // 이미 포인트가 지급 되었는지 체크
                    $member_comment_point_info = $this->getMemberCommentPoint(['EQ' => ['EL.ElIdx' => element('event_idx', $requestData), 'PS.MemIdx' => $this->session->userdata('mem_idx')]]);
                    if (count($member_comment_point_info) === 0) {
                        $comment_point_type = $this->_point_type[$event_data['CommentPointType']];
                        if(empty($comment_point_type) === false && empty($event_data['CommentPointAmount']) === false && empty($event_data['CommentPointValidDays']) === false) {
                            // 포인트 지급될 회원의 관심직렬 사이트코드 조회
                            $member_info_result = $this->findMemberInfo(['EQ' => ['M.MemIdx' => $this->session->userdata('mem_idx')]]);
                            if(empty($member_info_result) === false){
                                if(empty($member_info_result['InterestCode']) === true || empty($this->_interest_to_sitecode[$member_info_result['InterestCode']]) === true) {
                                    // 회원의 관심직렬이 없을 경우 기본 세팅
                                    $point_site_code = $this->_default_point_site_code;
                                } else {
                                    $point_site_code = $this->_interest_to_sitecode[$member_info_result['InterestCode']];
                                }
                                // 포인트 지급
                                $add_save_point_result = $this->pointFModel->addSavePoint($comment_point_type, $event_data['CommentPointAmount'], [
                                    // 'site_code' => $site_code,   //프로모션의 사이트 코드
                                    'site_code' => $point_site_code,
                                    'etc_reason' => '기타[' . $event_data['PromotionCode'] . ']',
                                    'reason_type' => 'event_comment',
                                    'valid_days' => $event_data['CommentPointValidDays']
                                ]);
                                if($add_save_point_result !== true) throw new \Exception('포인트 적립에 실패했습니다.');
                                // 이벤트와 포인트 연결 데이터 인서트
                                if($this->addEventLinkPoint(['el_idx' => element('event_idx', $requestData), 'point_idx' => $this->_conn->insert_id()]) === false) {
                                    throw new \Exception('이벤트포인트 연결데이터 등록에 실패했습니다.');
                                }
                            }
                        }
                    }
                }
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
            ElIdx, Content, OptionCcds, EventName, PromotionCode, PromotionParams, PromotionLiveType, PromotionLivePlayer, RegisterEndDate, CommentUseArea, LimitType, PromotionCnt
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
     * @param $cate_code
     * @return mixed
     */
    public function listEventForCommentPromotion($is_count, $arr_condition, $limit = null, $offset = null, $order_by = [], $cate_code = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'a.CIdx AS Idx, IFNULL(a.MemIdx, \'\') AS MemIdx, a.MemName, m.MemId, a.Comment AS Content, a.EmoticonNo, a.RegDatm, DATE_FORMAT(a.RegDatm, \'%Y-%m-%d\') AS RegDay, \'2\' AS RegType';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from_cate = (empty($cate_code) === false ? "INNER" : "LEFT")." JOIN {$this->_table['event_r_category']} AS c ON a.ElIdx = c.ElIdx AND c.IsStatus = 'Y'";
        $from = "
            FROM {$this->_table['event_comment']} AS a
            INNER JOIN {$this->_table['event_lecture']} AS b ON a.ElIdx = b.ElIdx
            {$from_cate}
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

    /**
     * 프로모션 라이브송출 기간에 맞는 데이터 1건 가져오기
     * @param $promotion_code
     * @return mixed
     */
    public function findEventPromotionForLiveVideo($promotion_code)
    {
        //TODO
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

    /**
     * 이벤트 추가신청 저장
     * @param $inputData
     * @return array|bool
     */
    private function _addEventApplyMember($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table['event_add_apply_member']) === false) {
                throw new \Exception('이벤트 추가신청 등록을 실패했습니다.');
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

        //$this->load->library('sendSms');
        //if ($this->sendsms->send($send_data['register_tel'], $data['SmsContent'], $data['SendTel']) !== true) {
        if($this->smsFModel->addKakaoMsg($send_data['register_tel'], $data['SmsContent'], $data['SendTel'], null, 'KFT') === false) {
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

    /**
     * 댓글로 지급된 포인트가 있는지 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function getMemberCommentPoint($arr_condition = [])
    {
        $column = 'PS.*';
        $from = "
            FROM lms_event_lecture AS EL
            INNER JOIN {$this->_table['event_r_point']} AS ERP ON EL.ElIdx = ERP.ElIdx
            INNER JOIN {$this->_table['point_save']}  AS PS ON ERP.PointIdx = PS.PointIdx        
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('SELECT ' . $column . $from . $where);
        return $query->result_array();
    }

    /**
     * 이벤트와 포인트 연결데이터 등록
     * @param array $requestData
     * @return array|bool
     */
    private function addEventLinkPoint($requestData = [])
    {
        try {
            $inputData = [
                'ElIdx' => element('el_idx', $requestData),
                'PointIdx' => element('point_idx', $requestData),
                'IsStatus' => 'Y',
                'RegMemIdx' => $this->session->userdata('mem_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($inputData)->insert($this->_table['event_r_point']) === false) {
                throw new \Exception('fail');
            }

        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 회원정보 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function findMemberInfo($arr_condition)
    {
        $column = ' 
            M.*, MO.*
        ';
        $from = "
            FROM {$this->_table['lms_member']} M
            LEFT OUTER JOIN {$this->_table['lms_member_otherinfo']} MO ON M.MemIdx = MO.MemIdx
        ";
        $default_arr_condition = [
            'EQ' => [
                'M.IsStatus' => 'Y'
            ]
        ];
        $arr_condition = array_merge_recursive($arr_condition, $default_arr_condition);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('SELECT '.$column .$from .$where)->row_array();
    }

    /**
     * 프로모션 지급 강의상품 리스트
     * @param $er_idx
     * @return mixed
     */
    public function listEventPromotionForProduct($er_idx)
    {
        $column = '
            B.*
        ';
        $from = "
            FROM {$this->_table['event_register']} AS A
            INNER JOIN {$this->_table['event_register_r_product']} AS B ON A.ErIdx = B.ErIdx AND B.IsStatus = 'Y'
        ";
        $where = ' WHERE A.ErIdx = ? and A.IsStatus = "Y"';
        $order_by_offset_limit = ' ORDER BY A.ErIdx ASC';

        return $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit, [$er_idx])->result_array();
    }

    /**
     * 이벤트 추가신청정보 데이터 조회
     * @param $el_idx
     * @return mixed
     */
    public function listEventPromotionForAddApply($el_idx)
    {
        $column = "A.*, IFNULL(B.MemberCnt, 0) AS MemberCnt";
        $from = "
            FROM {$this->_table['event_add_apply']} AS A
            LEFT OUTER JOIN	(
                SELECT EaaIdx, COUNT(*) AS MemberCnt
                FROM {$this->_table['event_add_apply_member']}
                WHERE IsStatus = 'Y'
                AND IsWin = 'Y'
                GROUP BY EaaIdx
            ) AS B ON A.EaaIdx = B.EaaIdx            
        ";
        $where = ' WHERE A.ElIdx = ? and A.IsUse = "Y"';
        $order_by_offset_limit = ' ORDER BY A.ApplyEndDatm, A.EaaIdx ASC';

        // 쿼리 실행
        return $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit, [$el_idx])->result_array();
    }

    /**
     * 추가 이벤트 신청자 등록
     * @param array $inputData
     * @param $site_code
     * @param $register_type
     * @return array|bool
     */
    public function addEventApplyMember($inputData = [], $site_code, $register_type)
    {
        $this->_conn->trans_begin();
        try {
            // *** 이벤트 조회 ***
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

            // *** 이벤트 추가신청 정보 조회 ***
            $arr_condition = [
                'EQ' => ['A.IsStatus' => 'Y'],
                'IN' => ['A.EaaIdx' => $inputData['add_apply_chk']]
            ];

            $result_apply = $this->listEventForApply($arr_condition);
            if (empty($result_apply) === true) {
                throw new \Exception('조회된 이벤트 추가신청 정보가 없습니다.');
            }

            // 이벤트 접수 체크
            $arr_condition = [
                'EQ'=>[
                    'A.MemIdx' => $this->session->userdata('mem_idx'),
                    'B.ElIdx' => element('event_idx', $inputData),
                    'B.IsStatus' => 'Y'
                ],
            ];
            $reg_member_result = $this->getRegisterMember($arr_condition);
            if(empty($reg_member_result) === true) {
                throw new \Exception('이벤트 신청후 이용 가능합니다.');
            }

            $apply_info = [];
            foreach ($result_apply as $key => $row) {
                $apply_info[$row['EaaIdx']] = $result_apply[$key];
            }

            // *** 신청수 체크 ***
            $arr_condition = [
                'IN' => ['EaaIdx' => $inputData['add_apply_chk']]
            ];
            $result_apply_member_info = $this->getApplyMemberCount($arr_condition);
            $arr_apply_member = array_pluck($result_apply_member_info, 'MemCount', 'EaaIdx');

            foreach ($apply_info as $key => $row) {

                if(empty($this->session->userdata('mem_idx')) === true) {
                    throw new \Exception('로그인이 필요한 서비스입니다.');
                } else {
                    $arr_condition = [
                        'EQ' => [
                            'A.EaaIdx' => $key,
                            'A.MemIdx' => $this->session->userdata('mem_idx')
                        ]
                    ];

                    $input_register_data = [
                        'EaaIdx' => $key,
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'IsWin' => 'Y'
                    ];
                }

                $register_member_info = $this->getApplyMember($arr_condition);
                if (count($register_member_info) > 0) {
                    throw new \Exception('이미 신청하셨습니다.');
                }

                if ($row['RegisterExpireStatus'] == 'N') {
                    throw new \Exception('접수 만료된 상태입니다.');
                }
                if ((empty($arr_apply_member[$key]) === false) && $row['PersonLimitType'] == $this->_register_limit_type['limit_true'] && $row['PersonLimit'] <= $arr_apply_member[$key]) {
                    throw new \Exception('마감되었습니다.');
                }

                //여러 추가신청중 하나의 추가신청만 가능할시
                if(empty($inputData['apply_chk_el_idx']) === false) {
                    unset($arr_condition['EQ']['A.EaaIdx']); //기존 ErIdx 조회 조건 제거
                    $arr_condition['EQ']['B.ElIdx'] = $inputData['apply_chk_el_idx'];
                }

                // 상품 구매여부 체크
                if(empty($row['ProdCode']) === false){
                    $order_event_member_count = $this->getOrderForEventMemberCount($row['ProdCode'], $this->session->userdata('mem_idx'));
                    if($order_event_member_count > 0) {
                        throw new \Exception('이미 구매한 상품입니다.');
                    }
                }

                // 지급할 강의상품이 있을 경우
                // TODO: 1545프로모션. 수동으로 교재 보낸다고함. 추후 상품 자동지급 필요시 개발
//                if(empty($row['EaaIdx']) === false && empty($this->session->userdata('mem_idx')) == false) {
//                    //중복신청여부 로그인 아이디 기준으로 체크
//                    $result_apply_member = $this->getApplyMember(['EQ' => [ 'A.EaaIdx' => $row['EaaIdx'], 'A.MemIdx' => $this->session->userdata('mem_idx')]]);
//                    if(count($result_apply_member) == 0) {
//                        if(empty($row['ProdCode']) === false) {
//                            if($this->orderFModel->procAutoOrder('event', element('event_idx', $inputData), $row['ProdCode']) !== true) {
//                                throw new \Exception('제공 상품이 처리되지 않았습니다.');
//                            }
//                        }
//                    }
//                }

                if ($this->_addEventApplyMember($input_register_data) !== true) {
                    throw new \Exception('추가 이벤트 신청 등록을 실패했습니다.');
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
     * 이벤트 추가 신청자 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function getApplyMember($arr_condition=[])
    {
        $column = 'A.*';
        $from = " 
            FROM {$this->_table['event_add_apply_member']} AS A
            LEFT OUTER JOIN {$this->_table['event_add_apply']} AS B ON A.EaaIdx = B.EaaIdx AND B.IsStatus = 'Y'
        ";
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
    public function getApplyMemberCount($arr_condition = [])
    {
        $column = 'EaaIdx, COUNT(EaaIdx) AS MemCount';
        $from = " FROM {$this->_table['event_add_apply_member']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $group_by = ' GROUP BY EaaIdx ';
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $group_by);
        return $query->result_array();
    }

    /**
     * 프로모션 기타 로직 처리
     * @param array $inputData
     * @param String $p_site_code
     * @return array|bool
     */
    public function procPromotionEtc($inputData = [], $p_site_code = null)
    {
        $this->_conn->trans_begin();
        try {
            // *** 이벤트 조회 ***
            $arr_condition = [
                'EQ'=>[
                    'A.ElIdx' => element('event_idx', $inputData),
                    'A.IsStatus' => 'Y'
                ],
                'GTE' => [
                    'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                ]
            ];
            $event_data = $this->findEvent($arr_condition, 'promotion');
            if (empty($event_data) === true) {
                throw new \Exception('조회된 이벤트 정보가 없습니다.');
            }

            // 프로모션 추가 파라미터 배열처리
            $arr_promotion_params = [];
            if (empty($event_data['PromotionParams']) === false) {
                $temp_params = explode('&', $event_data['PromotionParams']);
                if (empty($temp_params) === false) {
                    foreach ($temp_params as $key => $val) {
                        $arr_temp_params = explode('=', $val);
                        if (empty($arr_temp_params) === false && count($arr_temp_params) > 1) {
                            $arr_promotion_params[$arr_temp_params[0]] = $arr_temp_params[1];
                        }
                    }
                }
            }

            /**** 상품 장바구니 담기 제한 ***
             * ex:) 1545 프로모션
             * PromotionParams: cart_limit(장바구니 담기 제한치),  cart_limit_count(장바구니 담기 현재값), cart_prod_code(상품 코드)
             */
            if(empty($arr_promotion_params['cart_limit']) === false && empty($arr_promotion_params['cart_prod_code']) === false) {

                // 이벤트 접수 체크
                $arr_condition = [
                    'EQ'=>[
                        'A.MemIdx' => $this->session->userdata('mem_idx'),
                        'B.ElIdx' => element('event_idx', $inputData),
                        'B.IsStatus' => 'Y'
                    ],
                ];
                $reg_member_result = $this->getRegisterMember($arr_condition);
                if(empty($reg_member_result) === true) {
                    throw new \Exception('이벤트 신청후 이용 가능합니다.');
                }

                $cart_limit = $arr_promotion_params['cart_limit'];
                $cart_limit_count = $arr_promotion_params['cart_limit_count'];
                $cart_prod_code = $arr_promotion_params['cart_prod_code'];

                // 장바구니 이미 담겼는지 체크
                $cart_event_member_count = $this->getCartForEventMemberCount($cart_prod_code, $this->session->userdata('mem_idx'), ['RAW' => ['A.ConnOrderIdx IS' => ' NULL']]);
                if($cart_event_member_count > 0) {
                    throw new \Exception('이미 장바구니에 담긴 상품입니다.');
                }

                // 상품 구매여부 체크
                $order_event_member_count = $this->getOrderForEventMemberCount($cart_prod_code, $this->session->userdata('mem_idx'));
                if($order_event_member_count > 0) {
                    throw new \Exception('이미 구매한 상품입니다.');
                }

                if($cart_limit > $cart_limit_count) {
                    $result = $this->eventFModel->_modifyEventPromotionParams(element('event_idx', $inputData), 'cart_limit_count', $cart_limit_count+1);
                    if($result !== true) {
                        throw new \Exception('장바구니 처리 도중 오류가 발생하였습니다.');
                    }
                    //TODO: 상품 learn_pattern 조회
                    //$cart_type = 'book';
                    $learn_pattern = 'book';
                    $prod_code[0] = $cart_prod_code.':613001:'.$cart_prod_code;
                    $add_data = [
                        'site_code' => $p_site_code,
                        'prod_code' => $prod_code,
                        'is_direct_pay' => 'N',
                        'is_visit_pay' => 'N'
                    ];
                    $result = $this->cartFModel->addCart($learn_pattern, $add_data);
                    if(empty($result) === true || $result['ret_cd'] !== true){
                        throw new \Exception('장바구니 처리 도중 오류가 발생하였습니다.');
                    }
                    //redirect(front_url('/cart/index?tab=' . $cart_type));

                } else {
                    throw new \Exception('마감 되었습니다.');
                }
            }

            //TODO 그외 다른 프로모션 귀속 로직

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 이벤트 프로모션 파라미터 수정
     * @param $event_idx
     * @param $param_key
     * @param $param_value
     * @throws Exception
     * @return array|bool|string
     */
    private function _modifyEventPromotionParams($event_idx, $param_key, $param_value)
    {
        try {
            if(empty($event_idx) === true || empty($param_key) == true || empty($param_value) == true) {
                throw new \Exception('필수값이 누락 되었습니다.');
            }
            $arr_condition = [
                'EQ'=>[
                    'A.ElIdx' => $event_idx,
                    'A.IsStatus' => 'Y'
                ],
                'GTE' => [
                    'A.RegisterEndDate' => date('Y-m-d H:i') . ':00'
                ]
            ];
            $event_data = $this->findEvent($arr_condition, 'promotion');

            if(empty($event_data) === false && empty($event_data['PromotionParams']) === false) {

                // 업데이트할 컬럼 문자열 만들기
                $p_temp = $event_data['PromotionParams'];
                $start_str = strpos($p_temp, $param_key);
                $end_str = strpos($p_temp, '&', $start_str) === false ? mb_strlen($p_temp, 'utf-8') : strpos($p_temp, '&', $start_str);
                $update_value = mb_substr($p_temp, 0, $start_str +  mb_strlen($param_key, 'utf-8') + 1) . $param_value . mb_substr($p_temp, $end_str, mb_strlen($p_temp, 'utf-8'));

                $this->_conn->set('PromotionParams', $update_value)->where('ElIdx', $event_idx);
                if ($this->_conn->update($this->_table['event_lecture']) === false) {
                    throw new \Exception('오류가 발생 하였습니다.');
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 이벤트상품 회원 장바구니 카운트
     * @param $prod_code
     * @param $mem_idx
     * @param array $arr_condition
     * @return mixed
     */
    public function getCartForEventMemberCount($prod_code, $mem_idx, $arr_condition = [])
    {
        if(empty($prod_code) === true || empty($mem_idx) === true) {
            return false;
        }

        $column = 'COUNT(*) AS numrows';
        $from = "
            FROM {$this->_table['cart']} AS A
        ";

        $default_arr_condition = [
            'EQ' => [
                'A.ProdCode' => $prod_code,
                'A.MemIdx' => $mem_idx,
                'A.IsStatus' => 'Y'
            ]
        ];
        $arr_condition = array_merge_recursive($arr_condition, $default_arr_condition);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('SELECT ' . $column . $from . $where);
        return $query->row(0)->numrows;
    }

    /**
     * 이벤트상품 회원 주문 카운트
     * @param $prod_code
     * @param $mem_idx
     * @param array $arr_condition
     * @return mixed
     */
    public function getOrderForEventMemberCount($prod_code, $mem_idx, $arr_condition = [])
    {
        if(empty($prod_code) === true || empty($mem_idx) === true) {
            return false;
        }

        $column = 'COUNT(*) AS numrows';
        $from = "
            FROM {$this->_table['order_product']} AS A
            INNER JOIN {$this->_table['order']} AS B ON A.OrderIdx = B.OrderIdx            
        ";

        $default_arr_condition = [
            'EQ' => [
                'A.ProdCode' => $prod_code,
                'B.MemIdx' => $mem_idx
            ]
        ];
        $arr_condition = array_merge_recursive($arr_condition, $default_arr_condition);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('SELECT ' . $column . $from . $where);
        return $query->row(0)->numrows;
    }

    /**
     * 프로모션 신청 기타정보 통계 데이터 조회
     * @param $el_idx
     * @return mixed
     */
    public function getStatsEventMemberForEtcValue($el_idx)
    {
        if(empty($el_idx) === true) {
            return false;
        }

        $column = "ST.result AS Name, COUNT(*) AS Count";
        $from = "
            FROM (
                SELECT
                   SUBSTRING_INDEX (SUBSTRING_INDEX(em.EtcValue, ',', numbers.n), ',', -1) AS result
                FROM 
                   (SELECT 1 n UNION ALL SELECT 2  
                    UNION  ALL  SELECT  3  UNION  ALL SELECT 4 
                    UNION  ALL  SELECT  5  UNION  ALL  SELECT  6
                    UNION  ALL  SELECT  7  UNION  ALL  SELECT  8 
                    UNION  ALL  SELECT  9 UNION  ALL  SELECT  10) numbers INNER JOIN (
                        SELECT A.*
                        FROM {$this->_table['event_member']} A
                        LEFT OUTER JOIN {$this->_table['event_register']} B ON A.ErIdx = B.ErIdx
                        LEFT OUTER JOIN {$this->_table['event_lecture']} C ON B.ElIdx = C.ElIdx
                        WHERE C.ElIdx = ?
                    ) AS em ON CHAR_LENGTH ( em.EtcValue ) - CHAR_LENGTH ( REPLACE ( em.EtcValue, ',', '' ))>= numbers.n-1
                WHERE SUBSTRING_INDEX (SUBSTRING_INDEX(em.EtcValue,',',numbers.n),',',-1) != ''
            ) ST
        ";
        $order_by_offset_limit = " GROUP BY ST.result ORDER BY COUNT(*) DESC";

        return $this->_conn->query('SELECT ' . $column . $from . $order_by_offset_limit, [$el_idx])->result_array();
    }

}
