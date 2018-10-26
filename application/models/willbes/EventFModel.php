<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventFModel extends WB_Model
{
    private $_table = [
        'event_lecture' => 'lms_event_lecture',
        'event_lecture_r_category' => 'lms_event_r_category',
        'event_file' => 'lms_event_file',
        'event_comment' => 'lms_event_comment',
        'event_register' => 'lms_event_register',
        'event_member' => 'lms_event_member',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code'
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
            'comment_list' => '660002'
        ]
    ];

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
            A.ElIdx, A.SiteCode, A.CampusCcd, A.BIdx, A.IsBest, A.TakeType, A.RequstType, A.EventName,
            A.RegisterStartDate, A.RegisterEndDate, DATE_FORMAT(A.RegisterStartDate, \'%Y-%m-%d\') AS RegisterStartDay, DATE_FORMAT(A.RegisterEndDate, \'%Y-%m-%d\') AS RegisterEndDay,
            A.OptionCcds, A.ReadCnt, A.IsRegister, A.IsUse, A.RegDatm,
            G.SiteName, J.CcdName AS CampusName, D.CateCode,
            K.FileFullPath, K.FileName, IFNULL(H.CCount,\'0\') AS CommentCount,
            CASE A.RequstType WHEN 1 THEN \'설명회\' WHEN 2 THEN \'특강\' WHEN 3 THEN \'이벤트\' END AS RequstTypeName,
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
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function findEvent($arr_condition)
    {
        $column = '
            A.ElIdx, A.SiteCode, A.CampusCcd, A.BIdx, A.IsBest, A.TakeType, A.RequstType, A.EventName, A.ContentType, A.Content, A.CommentUseArea, A.LimitType,
            A.RegisterStartDate, A.RegisterEndDate, DATE_FORMAT(A.RegisterStartDate, \'%Y-%m-%d\') AS RegisterStartDay, DATE_FORMAT(A.RegisterEndDate, \'%Y-%m-%d\') AS RegisterEndDay,
            A.OptionCcds, A.ReadCnt, A.IsRegister, A.IsUse, A.RegDatm, DATE_FORMAT(A.RegDatm, \'%Y-%m-%d\') AS RegDay,
            G.SiteName, J.CcdName AS CampusName,
            K.FileFullPath, K.FileName,
            L.FileFullPath AS UploadFileFullPath, L.FileName AS UploadFileName, L.FileRealName as UploadFileRealName,
            IFNULL(H.CCount,\'0\') AS CommentCount,
            CASE A.RequstType WHEN 1 THEN \'설명회\' WHEN 2 THEN \'특강\' WHEN 3 THEN \'이벤트\' END AS RequstTypeName,
            CASE A.IsRegister WHEN \'Y\' THEN \'접수중\' WHEN 2 THEN \'마감\' END AS IsRegisterName,
            CASE A.TakeType WHEN 1 THEN \'회원\' WHEN 2 THEN \'회원+비회원\' END AS TakeTypeName
            ';

        $from = "
            FROM {$this->_table['event_lecture']} AS A
            LEFT JOIN (
                SELECT CIdx, ElIdx, COUNT(CIdx) AS CCount
                FROM {$this->_table['event_comment']}
            ) AS H ON H.ElIdx = A.ElIdx
            LEFT JOIN {$this->_table['event_file']} AS K ON A.ElIdx = K.ElIdx AND K.IsUse = 'Y' AND K.FileType = 'C'
            LEFT JOIN {$this->_table['event_file']} AS L ON A.ElIdx = L.ElIdx AND L.IsUse = 'Y' AND L.FileType = 'F'
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            LEFT OUTER JOIN {$this->_table['sys_code']} AS J ON A.CampusCcd = J.Ccd
        ";

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
        $column = 'A.ErIdx, A.PersonLimitType, A.PersonLimit, A.Name, IFNULL(B.MemCount, \'0\') AS MemCount';
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
        $column = 'A.EmIdx, A.ErIdx, A.MemIdx, A.UserName, A.UserTelEnc, A.UserMailEnc';
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
    public function getRegisterMemberCount($arr_condition=[])
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
     * @return array|bool
     */
    public function addEventRegisterMember($inputData = [])
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => ['A.IsStatus' => 'Y'],
                'IN' => ['A.ErIdx' => $inputData['register_chk']]
            ];
            $result_register = $this->listEventForRegister($arr_condition);
            if (count($result_register) <= 0) {
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
                //특강별 인원제한 체크
                if ((empty($arr_register_member[$key]) === false) && $row['PersonLimitType'] == $this->_register_limit_type['limit_true'] && $row['PersonLimit'] <= $arr_register_member[$key]) {
                    throw new \Exception('신청받는 횟수 제한이 넘었습니다.');
                }

                //중복체크
                if ($this->session->userdata('is_login') === false) {
                    $arr_condition = [
                        'EQ' => [
                            'A.UserName' => $inputData['register_name'],
                            'A.UserTelEnc' => $this->memberFModel->getEncString($inputData['register_tel']),
                            'A.UserMailEnc' => $this->memberFModel->getEncString($inputData['register_email']),
                        ]
                    ];
                } else {
                    $arr_condition = [
                        'EQ' => [
                            'A.MemIdx' => $this->session->userdata('mem_idx')
                        ]
                    ];
                }

                $register_member_info = $this->getRegisterMember($arr_condition);
                if (count($register_member_info) > 0) {
                    throw new \Exception('등록된 신청자 정보가 있습니다.');
                }
            }

            //데이터 저장

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}