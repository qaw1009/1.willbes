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
        'authmail' => 'lms_member_certifiedmail',
        'btob' => 'lms_btob',
        'btob_ip' => 'lms_btob_ip',
        'btob_log' => 'lms_btob_access_log',
        'btob_member' => 'lms_btob_r_member',
        'draw' => 'lms_member_out_log',
        'welcomepack' => 'lms_welcomepack'
    ];

    protected $_mailSendTypeCcd = [
        'JOIN' => '662001',
        'FINDID' => '662002',
        'FINDPWD' => '662003',
        'UNSLEEP' => '662004',
        'UPDMAIL' => '662005',
        'COMBINE' =>  '662006'
    ];

    protected $_certMailTitle = [
        '662001' => '회원가입 인증메일입니다.',
        '662002' => '아이디찾기 인증메일입니다..',
        '662003' => '비밀번호확인 인증메일입니다.',
        '662004' => '휴면회원해제 인증메일입니다.',
        '662005' => '이메일주소변경 인증메일입니다.',
        '662006' => '통합회원전환 인증메일입니다.'
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
            $column = " Mem.MemIdx, Mem.MemName, Mem.MemId, Mem.BirthDay, Mem.Sex, 
            fn_dec(Mem.PhoneEnc) AS Phone, Mem.Phone1, fn_dec(Mem.Phone2Enc) AS Phone2, Mem.Phone3, 
            fn_dec(Info.TelEnc) AS Tel, Info.Tel1, fn_dec(Info.Tel2Enc) AS Tel2, Info.Tel3,
            Info.SmsRcvStatus,
            fn_dec(Mem.MailEnc) AS Mail, Mem.MailId, Mem.MailDomain, Info.MailRcvStatus,
            Info.ZipCode, Info.Addr1, fn_dec(Info.Addr2Enc) as Addr2,
            IFNULL(Mem.IsStatus, '') AS IsStatus,
            IFNULL(Mem.IsDup, '') AS IsDup,
            IFNULL(Mem.JoinDate, '') AS JoinDate, 
            IFNULL(Mem.IsChange, '') AS IsChange,
            IFNULL(Mem.ChangeDatm, '') AS ChangeDate,
            IFNULL(Mem.LastLoginDatm, '') AS LoginDate, 
            IFNULL(Mem.LastInfoModyDatm, '') AS InfoUpdDate, 
            IFNULL(Mem.LastPassModyDatm, '') AS PwdUpdDate,
            IFNULL((SELECT outDatm FROM {$this->_table['outlog']} WHERE MemIdx = Mem.MemIdx ORDER BY outDatm DESC LIMIT 1), '') AS OutDate,
            IFNULL(Mem.IsBlackList, '') AS IsBlackList, 
            (SELECT COUNT(*) FROM {$this->_table['device']} WHERE MemIDX = Mem.MemIdx AND DeviceType = 'P' AND IsUse='Y' ) AS PcCount,
            (SELECT COUNT(*) FROM {$this->_table['device']} WHERE MemIDX = Mem.MemIdx AND DeviceType = 'M' AND IsUse='Y' ) AS MobileCount             
            ";
        }

        $from = "FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx ";

        $where = $this->_conn->makeWhere($arr_cond);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->row_array();
    }


    /**
     * BtoB 회원인지 확인
     * @param $MemIdx
     * @return array
     */
    public function getBtobMember($MemIdx)
    {
        /* btob 값에 수강제어가 걸려있을때만 */
        $query = " SELECT M.MemIdx, B.BtobIdx, B.IpControlTypeCcds ";
        $query .= " FROM {$this->_table['member']} AS M
            LEFT JOIN {$this->_table['btob_member']} AS BM ON M.MemIdx = BM.MemIdx AND BM.IsStatus = 'Y' 
            LEFT JOIN {$this->_table['btob']} AS B ON BM.BtobIdx = B.BtobIdx AND B.IsStatus = 'Y' AND B.IsUse = 'Y'
            WHERE M.MemIdx='{$MemIdx}' AND B.IpControlTypeCcds LIKE '%699001%'
            ";

        $rows = $this->_conn->query($query);

        return ($rows == false) ? [] : $rows->row_array();
    }


    /**
     * 해당 BtroB 에서 허용한 IP 인지 확인
     * @param $btobidx
     * @return array
     */
    public function btobIpCheck($btobidx)
    {
        $ip = $this->input->ip_address();

        $query = " SELECT B.BtobIdx, IP.ApprovalIp ";
        $query .= " FROM {$this->_table['btob']} AS B
            LEFT JOIN {$this->_table['btob_ip']} AS IP ON B.BtobIdx = IP.BtobIdx AND IP.IsStatus = 'Y' AND IP.ApprovalIp='{$ip}' 
            WHERE B.IsStatus = 'Y' AND B.IsUse = 'Y' AND B.BtobIdx='{$btobidx}'
            ";

        $rows = $this->_conn->query($query);

        return ($rows == false) ? [] : $rows->row_array();
    }


    /**
     * 로그인이 가능한 데이타인지 확인하기 위함
     * @param $id
     * @param $pwd
     * @return mixed
     */
    public function getMemberForLogin($id, $pwd, $is_count = true)
    {
        if($is_count === true){ // 회원 수 검색
            $query = "SELECT COUNT(*) AS rownums ";

        } else { // 데이터 검색
            $query = "SELECT  
            Mem.MemIdx, Mem.MemName, Mem.MemId, 
            Mem.IsStatus, Mem.IsDup, Mem.IsChange,
            fn_dec(Mem.MailEnc) AS Mail, fn_dec(Mem.PhoneEnc) AS Phone ";
        }

        $query .= " FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx
            WHERE Mem.MemId = ? 
            AND Mem.MemPassword = fn_hash(?) 
            AND Mem.IsStatus != 'N'
            AND Mem.MemPassword != ''
            ";
        // 로그인 가능한 회원인지 검색은 아이디와 암호가 동일하고 회원 상태가 탈퇴가 아니어야 한다.

        $rows = $this->_conn->query($query, [$id, $pwd]);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->row_array();
    }



    /**
     * 실제로 로그인 처리를 하고 로그 기록
     * @param array $data
     * @return bool
     */
    public function storeMemberLogin($data = [], $loginType = 'NORMAL')
    {
        // 데이타에 문제가 있을경우 오류
        if(empty($data) === true) return false;
        if(empty($data['MemIdx']) === true) return false;

        $this->_conn->trans_begin();

        try {
            // 로그인 로그 기록
            if($this->_conn->set([
                    'MemIdx' => $data['MemIdx'],
                    'IsLogin' => 'Y',
                    'LoginIp' => $this->input->ip_address(),
                    'LoginType' => $loginType
                ])->insert($this->_table['loginlog']) === false) {

                throw new \Exception('로그인기록 입력 실패');
            }

            $loginKey = $this->_conn->insert_id();

            // 마지막 로그인일자 업데이트
            if ($this->_conn->set('LastLoginDatm','NOW()',false)->
                where('MemIdx', $data['MemIdx'])->update($this->_table['member']) === false) {

                throw new \Exception('마지막 로그인 날짜 업데이트 실패');
            }

            // 세션에 로그인 데이타 입력
            $this->session->set_userdata('mem_idx', $data['MemIdx']);
            $this->session->set_userdata('mem_id', $data['MemId']);
            $this->session->set_userdata('mem_name', $data['MemName']);
            $this->session->set_userdata('mem_mail', $data['Mail']);
            $this->session->set_userdata('mem_phone', $data['Phone']);
            $this->session->set_userdata('login_key', $loginKey);
            $this->session->set_userdata('is_login', true);

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }

    /**
     * 로그아웃시에 로그아웃 데이타 업데이트
     * @param $login_key
     * @return bool
     */
    public function setMemberLogout($login_key)
    {
        if(empty($login_key)){
            return false;
        }

        $this->_conn->set('LogoutDatm','NOW()',false)->
        set('LogoutIp', $this->input->ip_address(), true)->
        where('Lidx', $login_key)->update($this->_table['loginlog']);

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
        if(empty($MemIdx) == true){
            return false;
        }

        $updateColumnText = '';
        $oriData = $this->getMember(false, [ 'EQ' => ['Mem.MemIdx' => $MemIdx]]);

        $this->_conn->trans_begin();
        try {
            if(empty($oriData) == true){
                throw new \Exception('사용자 데이타 조회에 실패했습니다.');
            }
            
            if($oriData['ZipCode'] != $data['ZipCode'] || $oriData['Addr1'] != $data['Addr1'] || $oriData['Addr2'] != $data['Addr2']){
                $updateColumnText .= '주소 ';
            }

            if($oriData['Tel1'] != $data['Tel1'] || $oriData['Tel2'] != $data['Tel2'] || $oriData['Tel3'] != $data['Tel3']){
                $updateColumnText .= '전화번호';
            }

            // 추가정보변경
            $input = [
                'ZipCode' => element('ZipCode', $data),
                'Addr1' => element('Addr1', $data),
                'Tel1' => element('Tel1', $data),
                'Tel3' => element('Tel3', $data)
            ];
            if($this->_conn->set($input)->
                set('SmsRcvStatus', element('SmsRcvStatus', $data))->
                set('MailRcvStatus', element('MailRcvStatus', $data))->
                set('MailRcvDatm', 'NOW()', false)->
                set('SmsRcvDatm', 'NOW()', false)->
                set('TelEnc',"fn_enc('".element('Tel', $data)."')",false)->
                set('Tel2Enc',"fn_enc('".element('Tel2', $data)."')",false)->
                set('Addr2Enc',"fn_enc('".element('Addr2', $data)."')",false)->
                where('MemIdx', $MemIdx)->update($this->_table['info']) === false){
                throw new \Exception('회원정보 변경에 실패했습니다.');
            }

            // 정보변경날짜 업데이트
            if($this->_conn->
                set('LastInfoModyDatm', 'NOW()', false)->
                where('MemIdx', $MemIdx)->update($this->_table['member']) === false){
                throw new \Exception('회원정보 변경에 실패했습니다.');
            }
            
            // 업데이트 로그데이타
            $input = [
                'MemIdx' => $MemIdx,
                'UpdTypeCcd' => '656004',
                'UpdData' => $updateColumnText,
                'UpdIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($input)->insert($this->_table['infolog']) === false){
                throw new \Exception('변경로그 기록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }


    /**
     * 핸드폰번호 변경
     * @param $MemIdx
     * @param array $data
     * @return bool
     */
    public function setMemberPhone($MemIdx, $data = [])
    {
        if(empty($MemIdx) == true){
            return false;
        }

        $updateColumnText = '';

        $this->_conn->trans_begin();
        try {
            $oriData = $this->getMember(false, [ 'EQ' => ['Mem.MemIdx' => $MemIdx]]);
            if(empty($oriData) == true){
                throw new \Exception('사용자 데이타 조회에 실패했습니다.');
            }
            
            $updateColumnText .= '핸드폰번호';
            
            // 추가정보변경
            $input = [
                'Phone1' => element('Phone1', $data),
                'Phone3' => element('Phone3', $data)
            ];

            // 정보변경날짜 업데이트
            if($this->_conn->
                set($input)->
                set('PhoneEnc',"fn_enc('".element('Phone', $data)."')",false)->
                set('Phone2Enc',"fn_enc('".element('Phone2', $data)."')",false)->
                set('LastInfoModyDatm', 'NOW()', false)->
                where('MemIdx', $MemIdx)->update($this->_table['member']) === false){
                throw new \Exception('회원정보 변경에 실패했습니다.');
            }

            // 업데이트 로그데이타
            $input = [
                'MemIdx' => $MemIdx,
                'UpdTypeCcd' => '656004',
                'UpdData' => $updateColumnText,
                'UpdIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($input)->insert($this->_table['infolog']) === false){
                throw new \Exception('변경로그 기록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }


    public function setMemberMail($MemIdx, $data = [])
    {
        if(empty($MemIdx) == true || empty($data) == true){
            return false;
        }

        $updateColumnText = '';

        $this->_conn->trans_begin();
        try {
            $oriData = $this->getMember(false, [ 'EQ' => ['Mem.MemIdx' => $MemIdx]]);
            if(empty($oriData) == true){
                throw new \Exception('사용자 데이타 조회에 실패했습니다.');
            }

            $updateColumnText .= '이메일주소';

            // 추가정보변경
            $input = [
                'MailDomain' => element('MailDomain', $data),
                'MailId' => element('MailId', $data)
            ];

            // 정보변경날짜 업데이트
            if($this->_conn->
                set($input)->
                set('MailEnc',"fn_enc('".element('Mail', $data)."')",false)->
                set('LastInfoModyDatm', 'NOW()', false)->
                where('MemIdx', $MemIdx)->update($this->_table['member']) === false){
                throw new \Exception('회원정보 변경에 실패했습니다.');
            }

            // 업데이트 로그데이타
            $input = [
                'MemIdx' => $MemIdx,
                'UpdTypeCcd' => '656004',
                'UpdData' => $updateColumnText,
                'UpdIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($input)->insert($this->_table['infolog']) === false){
                throw new \Exception('변경로그 기록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }


    /**
     * 휴면회원 활성화처리
     * @param $MemIdx
     * @return bool
     */
    public function ActivateSleepMember($MemIdx)
    {
        // 정보없음
        if(empty($MemIdx)){
            return false;
        }

        // 업데이트 로그
        $updateColumnText = '휴면해제';

        $this->_conn->trans_begin();
        try {
            // 회원상태 / 마지막변경일 업데이트
            if($this->_conn->set('IsStatus', "Y", true)
                    ->set('LastInfoModyDatm', 'NOW()', false)
                    ->where('MemIdx', $MemIdx)->update($this->_table['member']) === false){
                throw new \Exception('휴면회원 해제에 실패했습니다.');
            }

            // 로그데이타
            $data = [
                'MemIdx' => $MemIdx,
                'UpdTypeCcd' => '656004',
                'UpdData' => $updateColumnText,
                'UpdIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($data)->insert($this->_table['infolog']) === false){
                throw new \Exception('변경로그 기록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }


    /**
     * 비밀번호 확인
     * @param $Password
     * @param $arr_cond
     * @return bool
     */
    public function checkMemberPassword($MemIdx, $Password)
    {
        if(empty($Password) === true || empty($MemIdx) === true){
            return false;
        }

        $query = " SELECT COUNT(*) AS rownums
            FROM {$this->_table['member']} AS Mem 
            INNER JOIN {$this->_table['info']} AS Info ON Info.MemIdx = Mem.MemIdx
            WHERE Mem.MemIdx = ? 
            AND Mem.MemPassword = fn_hash(?) 
            AND Mem.MemPassword != ''
           ";

        $rows = $this->_conn->query($query, [$MemIdx, $Password]);

        return ($rows->row(0)->rownums == 1) ? true : false ;
    }
    

    /**
     * 사용자 암호변경
     * @param $data
     * @return bool
     */
    public function setMemberPassword($data)
    {
        
        // 데이타 확인
        if(empty($data)){
            return false;
        }

        if(empty($data['MemIdx']) === true || empty($data['MemPassword']) === true ){
            return false;
        }

        // 로그데이타
        $updateColumnText = '비밀번호';

        $this->_conn->trans_begin();
        try {
            // 사용자데이타 조회
            $oriData = $this->getMember(false, [ 'EQ' => ['Mem.MemIdx' => $data['MemIdx']]]);
            
            if(empty($oriData) == true){
                throw new \Exception('사용자 데이타 조회에 실패했습니다.');
            }

            // 비밀번호 / 비밀번호변경일 업데이트
            if($this->_conn->set('MemPassword', "fn_hash('".$data['MemPassword']."')", false)
                    ->set('LastPassModyDatm', 'NOW()', false)
                    ->where('MemIdx', $data['MemIdx'])->update($this->_table['member']) === false){
                throw new \Exception('비밀번호 변경에 실패했습니다.');
            }

            // 업데이트 로그데이타
            $data = [
                'MemIdx' => $data['MemIdx'],
                'UpdTypeCcd' =>$data['UpdTypeCcd'],
                'UpdData' => $updateColumnText,
                'UpdIp' => $this->input->ip_address()
            ];

            // 비밀번호 변경 로그
            if($this->_conn->set($data)->insert($this->_table['infolog']) === false){
                throw new \Exception('변경로그 기록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }



    /**
     * 새로운 사용자 등록
     * @param array $data
     * @return int
     */
    public function storeMember($input = [])
    {
        if(empty($input) === true) return false;

        $this->_conn->trans_begin();

        try {
            // 아이디 중복 검색
            $count = $this->memberFModel->getMember(true, [ 'EQ' => [ 'Mem.MemId' => $input['MemId'] ] ]);
            if($count > 0) {
                throw new \Exception('사용할수없는 아이디입니다.');
            }

            // 회원 정보 입력
            $data = [
                'SiteCode' => element('SiteCode', $input),
                'MemId' => strtolower(element('MemId', $input)),
                'MemName' => element('MemName', $input),
                'BirthDay' => element('BirthDay', $input),
                'Sex' => element('Sex', $input),
                'Phone1' => element('Phone1', $input),
                'Phone3' => element('Phone3', $input),
                'MailId' => element('MailId', $input),
                'MailDomain' => element('MailDomain', $input),
                'JoinIp' => $this->input->ip_address(),
                'CertifiedInfoTypeCcd' => element('CertifiedInfoTypeCcd', $input),
                'IsChange' => 'Y'
            ];

            // lms_member 저장
            if($this->_conn->set($data)->
                set('ChangeDatm', 'NOW()', false)->
                set('PhoneEnc',"fn_enc('".element('Phone', $input)."')",false)->
                set('Phone2Enc',"fn_enc('".element('Phone2', $input)."')",false)->
                set('MailEnc',"fn_enc('".element('Mail', $input)."')",false)->
                set('MemPassword',"fn_hash('".element('MemPassword', $input)."')",false)->
                insert($this->_table['member']) === false){
                throw new \Exception('회원가입에 실패했습니다.');
            }

            // 입력된 회원 번호 읽어오기
            $MemIdx = $this->_conn->insert_id();
            if(empty($MemIdx)){
                throw new \Exception('회원가입된 정보 검색에 실패했습니다.');
            }

            // 개인정보 위탁동의
            $TrustStatus = element('agree4', $input);
            if($TrustStatus != 'Y'){
                $TrustStatus = 'N';
            }
            // 추가정보 입력                     
            $data = [
                'MemIdx' => $MemIdx,
                'MailRcvStatus' => (element('MailRcvStatus', $input) == 'Y' ? 'Y' : 'N'),
                'SmsRcvStatus' => (element('SmsRcvStatus', $input) == 'Y' ? 'Y' : 'N'),
                'ZipCode' => element('ZipCode', $input),
                'Addr1' => element('Addr1', $input),
                'TrustStatus' => $TrustStatus,
                'InterestCode' => element('InterestCode', $input),
                'GwIdx' => $this->session->userdata('gw_idx')

            ];

            // lms_member_otherinfo 저장
            if($this->_conn->set($data)->
                set('TrustStatusDatm', 'NOW()', false)->
                set('MailRcvDatm', 'NOW()', false)->
                set('SmsRcvDatm', 'NOW()', false)->
                set('Addr2Enc',"fn_enc('".element('Addr2', $input)."')",false)->
                insert($this->_table['info']) === false){
                throw new \Exception('부가정보 입력에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }


    /** 
     * 회원 통합처리
     * @param $MemIdx
     * @param array $data
     * @param bool $changeId
     * @return bool
     */    
    public function setCombineMember($MemIdx , $data = [], $changeId = false)
    {
        // 회우너 번호 체크
        if(empty($MemIdx) === true) {
            return false;
        }

        // 로그데이타
        $logdata = [
            'MemIdx' => $MemIdx,
            'UpdTypeCcd' => '656004',
            'UpdIp' => $this->input->ip_address()
        ];

        $this->_conn->trans_begin();

        try {
            if($changeId === true){
                // 아이디변경일경우
                // 아이디/암호/통합여부/통합날짜 업데이트
                if($this->_conn->
                    set('MemId', strtolower($data['MemId']), true)->
                    set('MemPassword', "fn_hash('".$data['MemPassword']."')", false)->
                    set('IsChange', 'Y', true)->
                    set('ChangeDatm', 'NOW()', false)->
                    where('MemIdx', $MemIdx)->update($this->_table['member']) === false){
                    throw new \Exception('업데이트 실패했습니다.');
                }
                
                // 로그데이타
                $logdata = array_merge($logdata, ['UpdData' => '통합회원전환(아이디변경)']);

            } else {
                // 아이디변경이 아닐경우
                
                // 통합여부/통합날짜 업데이트
                if($this->_conn->set('IsChange', 'Y', true)->
                    set('ChangeDatm', 'NOW()', false)->
                    where('MemIdx', $MemIdx)->update($this->_table['member']) === false){
                    throw new \Exception('업데이트 실패했습니다.');
                }
                
                // 로그데이타
                $logdata = array_merge($logdata, ['UpdData' => '통합회원전환']);
            }

            // 선택 동의여부 저장
            // 선택동의여부 / 통의여부 변경날짜
            if($this->_conn->set('TrustStatus', $data['TrustStatus'], true)->
                set('TrustStatusDatm', 'NOW()', false)->
                where('MemIdx', $MemIdx)->update($this->_table['info']) === false){
                throw new \Exception('업데이트 실패했습니다.');
            }

            // 변경 기록
            if($this->_conn->set($logdata)->insert($this->_table['infolog']) === false){
                throw new \Exception('변경로그 기록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }


    /**
     * 사용자 탈퇴처리
     * @param $MemIdx
     * @return bool

    public function outMember($MemIdx)
    {
        return true;
    }


    /**
     * 사용자 등록된 디바이스 목록
     * @param $MemIdx
     * @param bool $onlyActive
     * @return array

    public function listDevice($MemIdx, $onlyActive = true)
    {
        return [];
    }


    /**
     * 사용자 디바이스 정보
     * @param $MemIdx
     * @param $deviceID
     * @return array

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

    public function newDevice($MemIdx, $deviceType, $deviceID)
    {
        return true;
    }
     */

    /**
     * 인증메일 정보를 읽어온다
     * @param array $input
     * @return array
     */
    public function getMailAuth($input = [])
    {
        // 데이타체크
        if(empty($input) == true){
            return [];
        }

        // 회원번호 / 인증키 / 인증메일주소 / 인증타입 / 인사용여부 / 전송날짜
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
    public function storeMailAuth($input)
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
     * 메일인증 완료후 업데이트
     */
    public function updateMailAuth($certkey)
    {
        // 데데이트할 데이타
        $data = [
            'IsCert' => 'Y',
            'CertIp' => $this->input->ip_address()
        ];

        $this->_conn->trans_begin();

        try {
            if($this->_conn->set($data)->set('CertDatm', 'NOW()', false)->
                    where('CertKey', $certkey)->update($this->_table['authmail']) === false){
                throw new \Exception('업데이트 실패했습니다.');
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
        try {
            // 메일타이틀
            $mailtitle = $this->_certMailTitle[element('MailCertTypeCcd', $input)];

            // 이메일 라입 로드
            $this->load->library('email', [
                'mail_from_address' => $this->_mailSenderAddress,
                'mailtype' => 'html'
            ]);

            // 메일주소설정
            $this->email->to(element('CertMail', $input));
            // 제목설정
            $this->email->subject($mailtitle);

            // 본문 읽어오기
            $body = $this->load->view('auth/_certMail_template', [
                'CertKey' => rawurlencode(element('CertKey', $input)),
                'CertMail' => rawurlencode(element('CertMail', $input))
            ], true, true);

            // 본문 설정
            $this->email->message($body);

            // 전송
            $this->email->send();

        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function drawMember($data)
    {
        $this->_conn->trans_begin();
        try {
            // 탈퇴처리
            if($this->_conn
                    ->set('IsStatus', 'N')
                    ->where('MemIdx', element('MemIdx', $data))
                    ->update($this->_table['member']) === false){
                throw new \Exception('탈퇴처리에 실패했습니다.');
            }

            // 로그데이타
            if($this->_conn
                    ->set([
                        'MemIdx' => element('MemIdx', $data),
                        'OutIp' => $this->input->ip_address(),
                        'OutReason' => element('reason', $data),
                        'OutOpinion' => element('opinion', $data)
                    ])
                    ->insert($this->_table['draw']) === false){
                throw new \Exception('탈퇴 로그데이타 입력에 실패했습니다.');
            }

            $this->_conn->trans_commit();
            $this->session->sess_destroy();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }

    /**
     * 선택한 관심분야에 등록된 상품 가져오기
     * @param $interestCode
     * @return mixed
     */
    public function getWelcomepack($interestCode)
    {
        $column = " w.wType, w.wCode ";

        $from = "
            FROM {$this->_table['welcomepack']} AS w 
            WHERE 1=1
        ";

        $where = $this->_conn->makeWhere([
            'EQ' => [
                'IsStatus' => 'Y',
                'wInterestCode' => $interestCode
            ]
        ]);

        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where);

        return $query->result_array();
    }

    /**
     * 가입일기준 회원 조회
     * @param $mem_idx
     * @param $start_day
     * @param $end_day
     * @return mixed
     */
    public function getMemberForJoinDate($mem_idx, $start_day, $end_day)
    {
        $column = 'MemIdx';
        $arr_condition = [
            'EQ' => [
                'MemIdx' => $mem_idx,
                'IsChange' => 'Y',
                'IsStatus' => 'Y'
            ],
            'RAW' => [
                'Date_format(JoinDate,\'%Y-%m-%d\')  between' => '\''. $start_day .'\' and \'' . $end_day .'\''
            ]
        ];

        $from = "
            FROM {$this->_table['member']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('SELECT ' . $column . $from . $where)->row_array();
    }
}
