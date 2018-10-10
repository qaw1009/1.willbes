<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageMemberModel extends WB_Model
{
    private $_table = [
        'member' => 'lms_Member',
        'info' => 'lms_Member_OtherInfo',
        'loginLog' => 'lms_Member_Login_Log',
        'changeLog' => 'lms_Member_Change_Log',
        'outLog' => 'lms_Member_Out_Log',
        'device' => 'lms_member_device',
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회원 목록 조회
     * @param boolean $is_count
     * @param array $arr_condition
     * @param int $limit
     * @param int $offset
     * @param array $order_by
     * @return int|array
     */
    public function list($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $inQuery = '')
    {
        $rows = [];

        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            /*
             * 회원번호, 회원명, 아이디, 휴대전화, 수신여부, 이메일, 수신여부
             * 가입일, 통합여부, 마지막로그인일, 최종정보변경일, 비밀번호변경일, 탈퇴일
             * 블랙컨슈머여부, 기기등록정보,
             */
            $column = " Mem.MemIdx, Mem.MemName, Mem.MemId, 
            fn_dec(Mem.PhoneEnc) AS Phone, Info.SmsRcvStatus,
            fn_dec(Mem.MailEnc) AS Mail, Info.MailRcvStatus,
            IFNULL(Mem.JoinDate, '') AS JoinDate, 
            IFNULL(Mem.IsChange, '') AS IsChange,
            IFNULL(Mem.ChangeDatm, '') AS ChangeDate,
            IFNULL(Mem.LastLoginDatm, '') AS LoginDate, 
            IFNULL(Mem.LastInfoModyDatm, '') AS InfoUpdDate, 
            IFNULL(Mem.LastPassModyDatm, '') AS PwdUpdDate,
            IFNULL((SELECT outDatm FROM {$this->_table['outLog']} WHERE MemIdx = Mem.MemIdx ORDER BY outDatm DESC LIMIT 1), '') AS OutDate,
            IFNULL(Mem.IsBlackList, '') AS IsBlackList, 
            (SELECT COUNT(*) FROM {$this->_table['device']} WHERE MemIDX = Mem.MemIdx AND DeviceType = 'P' AND IsUse='Y' ) AS PcCount,
            (SELECT COUNT(*) FROM {$this->_table['device']} WHERE MemIDX = Mem.MemIdx AND DeviceType = 'M' AND IsUse='Y' ) AS MobileCount         
            ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT STRAIGHT_JOIN ' . $column . $from . $inQuery . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }

    /**
     * 회원 상세정보 조회
     * @param int $memIdx
     * @return array
     */
    public function getMember($memIdx)
    {
        $column = " Mem.MemIdx, Mem.MemName, Mem.MemId, Mem.BirthDay, Mem.Sex, 
            Info.ZipCode, Info.Addr1, fn_dec(Info.Addr2Enc) AS Addr2,
            fn_dec(Mem.PhoneEnc) AS Phone, Info.SmsRcvStatus,
            fn_dec(Mem.MailEnc) AS Mail, Info.MailRcvStatus,
            IFNULL(Mem.JoinDate, '') AS JoinDate, 
            IFNULL(Mem.IsChange, '') AS IsChange,
            IFNULL(Mem.ChangeDatm, '') AS ChangeDate, 
            IFNULL(Mem.LastLoginDatm, '') AS LoginDate, 
            IFNULL(Mem.LastInfoModyDatm, '') AS InfoUpdDate, 
            IFNULL(Mem.LastPassModyDatm, '') AS PwdUpdDate,
            IFNULL((SELECT outDatm FROM {$this->_table['outLog']} WHERE MemIdx = Mem.MemIdx ORDER BY outDatm DESC LIMIT 1), '') AS OutDate,
            IFNULL(Mem.IsBlackList, '') AS IsBlackList, 
            (SELECT COUNT(*) FROM {$this->_table['device']} WHERE MemIDX = Mem.MemIdx AND DeviceType = 'P' AND IsUse='Y' ) AS PcCount,
            (SELECT COUNT(*) FROM {$this->_table['device']} WHERE MemIDX = Mem.MemIdx AND DeviceType = 'M' AND IsUse='Y' ) AS MobileCount,
            (SELECT SiteName FROM {$this->_table['site']} WHERE SiteCode = Mem.SiteCode) AS SiteName               
            ";

        $from = "FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx ";

        $where = " WHERE Mem.MemIdx = {$memIdx} ";

        $rows = $this->_conn->query('SELECT STRAIGHT_JOIN ' . $column . $from . $where );

        return $rows->row_array();
    }

    /**
     * 사용자 정보 업데이트
     * @param $MemIdx
     * @param array $data
     * @return array|bool
     */
    public function setMember($MemIdx, $data = [])
    {
        $oriData = $this->getMember($MemIdx);
        $UpdData = '';

        if(empty($oriData) === true){
            return false;
        } else {
            foreach($data as $key => $value){
                if($data[$key] != $oriData[$key]){
                    $UpdData .= "";
                }
            }
        }

        $this->_conn->trans_begin();

        try {

            if ($this->_conn->set($data)->where('MemIdx', $MemIdx)->update($this->_table['member']) === false) {
                throw new \Exception('회원정보 업데이트에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 정보변경로그
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function infologList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $rows = [];

        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            $column = "log.MemIdx, IFNULL(code.CcdName, '') AS UpdType, log.UpdMemo, log.ReferFileRoute, 
                log.ReferFile, log.UpdIp, log.UpdData, log.UpdDatm, log.UpdAdminIdx, IFNULL(admin.wAdminName, '') AS adminName ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['changeLog']} AS log 
            LEFT JOIN {$this->_table['admin']} AS admin ON admin.wAdminIdx = log.UpdAdminIdx 
            LEFT JOIN {$this->_table['code']} AS code ON code.Ccd = log.UpdTypeCcd AND GroupCcd='656'
            ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }

    /**
     * 로그인 로그
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function loginlogList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $rows = [];

        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            $column = "MemIdx, IsLogin, LoginIp, LoginDatm, LogoutIp, LogoutDatm ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['loginLog']} AS log ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }

    /**
     * 사용자 기기등록정보
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function deviceList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $rows = [];

        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            $column = " MdIdx, MemIdx, DeviceId, DeviceType, IsUse, Os, App, RegDatm, 
            DelDatm, DelAdminIdx, IFNULL(admin.wAdminName, '') AS adminName ";

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            //$order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['device']} AS log
            LEFT JOIN {$this->_table['admin']} AS admin ON admin.wAdminIdx = log.DelAdminIdx  
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }

    /**
     * 사용자 등록 기기 삭제
     * @param array $input
     * @return array|bool
     */
    public function deleteDevice($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $memIdx = element('MemIdx', $input);
            $MdIdx = element('MdIdx', $input);

            // 회원데이터테이블 이름변경
            $data = [
                'IsUse' => 'N',
                'DelAdminIdx' => $admin_idx
            ];

            if ($this->_conn->set($data)->set('DelDatm','NOW()',false)->where(['MemIdx' => $memIdx, 'MdIdx' => $MdIdx])->update($this->_table['device']) === false) {
                throw new \Exception('기기삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 사용자 이름 변경 처리
     * @param array $input
     * @return array|bool
     */
    public function chgName($input = [])
    {
        $this->_conn->trans_begin();

        try {

            $admin_idx = $this->session->userdata('admin_idx');
            $memIdx = element('MemIdx', $input);

            // 회원데이터테이블 이름변경
            $data = [
                'MemName' => element('MemName', $input)
                ];

            if ($this->_conn->set($data)->where('MemIdx', $memIdx)->update($this->_table['member']) === false) {
                throw new \Exception('이름변경에 실패했습니다.');
            }

            // 이름변경한 로그 저장
            $data = [
                'MemIdx' => element('MemIdx', $input),
                'UpdTypeCcd' => '656005',
                'UpdMemo' => element('UpdMemo', $input),
                'UpdData' => element('UpdData', $input),
                'UpdAdminIdx' => $admin_idx,
                'UpdIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['changeLog']) === false) {
                throw new \Exception('데이터수정에 실패했습니다.');
            }
            
            $ch_idx = $this->_conn->insert_id(); // 로그 번호 구해오기

            //이미지 등록
            $this->load->library('upload');
            $upload_dir = SUB_DOMAIN . '/changeName/' . date('Ymd');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $memIdx . '_' . date('YmdHis'), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (count($uploaded) > 0) {
                $img_data['ReferFileRoute'] = $this->upload->_upload_url . $upload_dir . '/'. $uploaded[0]['orig_name'];
                $img_data['ReferFile'] = $uploaded[0]['client_name'];

                if ($this->_conn->set($img_data)->where('ChIdx', $ch_idx)->update($this->_table['changeLog']) === false) {
                    throw new \Exception('첨부파일 등록에 실패했습니다.');
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
     * 회원정보조회 (발송기본정보리턴)
     * @param array $arr_condition
     * @param string $limit
     * @return mixed
     */
    public function listSendMemberInfo($arr_condition = [], $limit = '12')
    {
        $column = 'MemIdx, MemName, MemId, fn_dec(PhoneEnc) AS Phone, fn_dec(MailEnc) AS Mail';
        $from = "
            FROM {$this->_table['member']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeLimitOffset($limit, null)->getMakeLimitOffset();

        // 쿼리 실행/리턴
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit)->result_array();
    }
}