<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberFModel extends WB_Model
{
    private $_table = [
        'member' => 'lms_Member',
        'info' => 'lms_Member_OtherInfo',
        'loginlog' => 'lms_Member_Login_Log',
        'infolog' => 'lms_Member_Change_Log',
        'outlog' => 'lms_Member_Out_Log',
        'device' => 'lms_member_device',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
        'authmail' => 'lms_member_certifiedmail'
    ];

    protected $_mailSendTypeCcd = [
        'JOIN' => '662001',
        'FINDID' => '662002',
        'FINDPWD' => '662003',
        'UNSLEEP' => '662004',
        'UPDMAIL' => '662005'
    ];

    protected $_certMailTitle = [
        '662001' => '회원가입 인증메일입니다.',
        '662002' => '아이디찾기 인증메일입니다..',
        '662003' => '비밀번호확인 인증메일입니다.',
        '662004' => '휴면회원해제 인증메일입니다.',
        '662005' => '이메일주소변경 인증메일입니다.'
    ];

    protected $_mailSenderAddress = 'help@willbes.com';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사용자 정보 읽어오기
     * @param boolean $is_count
     * @param array $arr_cond
     * @return int|array
     */
    public function getMember($is_count = false, $arr_cond = [])
    {
        if(empty($arr_cond) === true) {
            return ($is_count === true) ? 0 : [];
        }

        if($is_count === true){
            $column = ' COUNT(*) AS rownums ';

        } else {
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
        }

        $from = "FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx ";

        $where = $this->_conn->makeWhere($arr_cond);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT STRAIGHT_JOIN ' . $column . $from . $where);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }


    /**
     * 로그인을 위해 존재하는 정보인지 읽어오기
     * @param $id
     * @param $pwd
     * @return mixed
     */
    public function getMemberForLogin($id, $pwd, $is_count = true)
    {
        if($is_count === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT Mem.MemIdx, Mem.MemName, Mem.MemId, Mem.IsStatus, Mem.IsDup, fn_dec(Mem.MailEnc) AS Mail, fn_dec(Mem.PhoneEnc) AS Phone ";
        }

        $query .= " FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx
            WHERE Mem.MemId = ? 
            AND Mem.MemPassword = fn_hash(?) 
            AND Mem.IsStatus != 'N'
            AND Mem.MemPassword != ''
            ";

        $rows = $this->_conn->query($query, [$id, $pwd]);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->row_array();
    }


    /**
     * 로그인처리를 하고 로그 기록
     * @param array $data
     * @return bool
     */
    public function storeMemberLogin($data = [])
    {
        if(empty($data) === true) return false;
        if(empty($data['MemIdx']) === true) return false;

        $this->_conn->trans_begin();

        try {
            // 로그인 로그 기록
            if($this->_conn->set([
                    'MemIdx' => $data['MemIdx'],
                    'IsLogin' => 'Y',
                    'LoginIp' => $this->input->ip_address()
                ])->insert($this->_table['loginlog']) === false) {

                throw new \Exception('로그인기록 입력 실패');
            }

            // 마지막 로그인일자 업데이트
            if ($this->_conn->set('LastLoginDatm','NOW()',false)->where('MemIdx', $data['MemIdx'])->update($this->_table['member']) === false) {
                throw new \Exception('마지막 로그인 날짜 업데이트 실패');
            }

            // 세션에 로그인 데이타 입력
            $this->session->set_userdata('mem_idx', $data['MemIdx']);
            $this->session->set_userdata('mem_id', $data['MemId']);
            $this->session->set_userdata('mem_name', $data['MemName']);
            $this->session->set_userdata('mem_mail', $data['Mail']);
            $this->session->set_userdata('mem_phone', $data['Phone']);
            $this->session->set_userdata('is_login', true);

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }

    /**
     * 사용자 정보 수정
     * @param $MemIdx
     * @param array $data
     * @return bool
     */
    public function setMember($MemIdx, $data = [])
    {
        return true;
    }

    /**
     * 새로운 사용자 등록
     * @param array $data
     * @return int
     */
    public function storeMember($data = [])
    {
        return 1234;
    }

    /**
     * 사용자 탈퇴처리
     * @param $MemIdx
     * @return bool
     */
    public function outMember($MemIdx)
    {
        return true;
    }

    /**
     * 사용자 등록된 디바이스 목록
     * @param $MemIdx
     * @param bool $onlyActive
     * @return array
     */
    public function listDevice($MemIdx, $onlyActive = true)
    {
        return [];
    }

    /**
     * 사용자 디바이스 정보
     * @param $MemIdx
     * @param $deviceID
     * @return array
     */
    public function getDevice($MemIdx, $deviceID)
    {
        return [];
    }

    /**
     * 사용자 새로운 디바이스 등록
     * @param $MemIdx
     * @param $deviceType
     * @param $deviceID
     * @return bool
     */
    public function newDevice($MemIdx, $deviceType, $deviceID)
    {
        return true;
    }

    /**
     * 인증메일 정보를 읽어온다.
     * @param $certKey
     * @param $mail
     */
    public function getMailAuth($input = [])
    {
        if(empty($input) == true){
            return [];
        }

        $column = " MemIdx, CertKey, CertMail, MailCertTypeCcd, IsCert, MailSendDatm ";

        $from = " FROM {$this->_table['authmail']} ";

        $where = $this->_conn->makeWhere($input);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where);

        return $rows->row_array();
    }

    /**
     * 인증메일정보 입력
     */
    public function storeMailAuth($input = [])
    {
        $data = [
            'MemIdx' => element('MemIdx', $input),
            'CertKey' => element('CertKey', $input),
            'CertMail' => element('CertMail', $input),
            'MailSendIp' => $this->input->ip_address(),
            'MailCertTypeCcd' => $this->_mailSendTypeCcd[element('MailCertTypeCcd', $input)]
        ];

        $this->_conn->trans_begin();

        try {
            if($this->_conn->set($data)->insert($this->_table['authmail']) === false){
                throw new \Exception('메일전송에 실패했습니다.');
            }

            if($this->_sendMailAuth($data) === false){
                throw new \Exception('메일 전송에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 실제 메일데이타 전송
     * @param array $input
     * @return bool
     */
    private function _sendMailAuth($input = [])
    {
        log_message('debug', $this->_certMailTitle[element('MailCertTypeCcd', $input)]);
        try {
            // 메일타이틀
            $mailtitle = $this->_certMailTitle[element('MailCertTypeCcd', $input)];


            $this->load->library('email', [
                'mail_from_address' => $this->_mailSenderAddress,
                'mailtype' => 'html'
            ]);

            $this->email->to(element('CertMail', $input));
            $this->email->subject($mailtitle);

            $body = $this->load->view('auth/_certMail_template', [
                'CertKey' => rawurlencode(element('CertKey', $input)),
                'CertMail' => rawurlencode(element('CertMail', $input))
            ], true, true);

            $this->email->message($body);
            $this->email->send();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    // 메일 인증 처리후 업데이트
    public function setMailAuth($input = [])
    {



    }

}
