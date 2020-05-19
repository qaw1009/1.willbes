<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessFModel extends WB_Model
{
    protected $_table = [
        'gw' => 'lms_gateway',
        'btob' => 'lms_btob',
        'banner' => 'lms_banner',
        'active_visitor' => 'lms_active_visitor'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 외부접속 로그 저장 (광고 / 제휴사 연동 정보 저장)
     * @param $strType
     * @param null $idx
     * @return array|bool
     */
    public function saveLog($strType, $idx=null, $etcMsg=null)
    {
        $refer_info = get_var($this->input->server('HTTP_REFERER'), null);
        $refer_domain = parse_url($refer_info, PHP_URL_HOST);
        $this->__userAgent($agent_short, $agent, $platform);

        $input_data = [
            'SiteCode' => config_app('SiteCode'),
            'ReferDomain' => (empty($refer_domain) ? null : $refer_domain),
            'ReferInfo' => (empty($refer_info) ? null : $refer_info),
            'UserAgent' =>substr($agent,0,199),
            'RegIp' =>$this->input->ip_address()
        ];

        /* 테이블 분리 */
        if ($strType == 'gw') {
            $input_data = array_merge($input_data,[
                'GwIdx' => $idx,
                'UserPlatform' =>$platform,
                'UserAgentShort' =>substr($agent_short,0,99),
                'SessId' => $this->session->userdata('make_sessionid'),
                'Memo' => $etcMsg
            ]);
        } elseif ($strType == 'btob') {
            $input_data = array_merge($input_data,[
                'BtobIdx' => $idx,
                'MemIdx' => $this->session->userdata('mem_idx')
            ]);
        } elseif ($strType == 'banner') {
            $input_data = array_merge($input_data,[
                'BIdx' => $idx,
                'MemIdx' => $this->session->userdata('mem_idx'),
                'UserPlatform' =>$platform,
                'UserAgentShort' =>substr($agent_short,0,99)
            ]);
        }

        try {
            if ($this->_conn->set($input_data)->insert($this->_table[$strType].'_access_log') === false) {
                throw new \Exception('접속 정보 저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 실시간 방문자 정보 저장
     * @return bool|string
     */
    public function saveVisitor()
    {
        $refer_info = get_var($this->input->server('HTTP_REFERER'), null);
        $refer_domain = get_var(parse_url($refer_info, PHP_URL_HOST), null);
        $this->__userAgent($agent_short, $agent, $platform);

        try {
            $sess_sess_id = $this->session->userdata('make_sessionid');
            $sess_mem_idx = get_var($this->session->userdata('mem_idx'), null);
            $access_timestamp = time();
            $reg_ip = $this->input->ip_address();

            // 세션아이디가 없을 경우 방문자 정보 저장 안함
            if (empty($sess_sess_id) === true) {
                return true;
            }

            $query = /** @lang text */ 'insert into ' . $this->_table['active_visitor'] . '
                (SessId, SiteCode, MemIdx, AccessTms, AccessDomain, AccessUrl, UserPlatform, UserAgentShort, UserAgent, PageView, RegIp) values 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?)
                ON DUPLICATE KEY UPDATE MemIdx = ?, AccessTms = ?, PageView = PageView + 1
            ';

            $is_replace = $this->_conn->query($query, [
                $sess_sess_id, config_app('SiteCode'), $sess_mem_idx, $access_timestamp, $refer_domain, substr($refer_info,0,199),
                $platform, substr($agent_short,0,99), substr($agent,0,199), $reg_ip,
                $sess_mem_idx, $access_timestamp
            ]);

            if ($is_replace === false) {
                throw new \Exception('방문자 정보 저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 접속 정보 추출 : 접속 코드 또는 ASP 접속을 위한 리턴유알엘 정보 추출
     * @param $strType
     * @param null $idx
     * @return array|bool|int
     */
    public function findContents($strType, $idx=null)
    {
        $arr_condition = [];

        if ($strType == 'gw') {
            $arr_condition = [
                'EQ' => ['GwIdx' => $idx]
            ];
        } elseif ($strType == 'btob') {
            $arr_condition = [
                'EQ' => ['BtobIdx' => $idx]
            ];
        }

        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['IsStatus' => 'Y']]);

        $result = $this->_conn->getListResult($this->_table[$strType],'*',$arr_condition,null,null,[]);
        return element('0', $result, []);
    }

    /**
     * 사용자 접속 정보 추출
     * @param $agent_short -> Internet Explorer 11.0
     * @param $agent -> Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko
     * @param $platform -> Windows 7
     */
    public function __userAgent(&$agent_short, &$agent, &$platform)
    {
        $this->load->library('user_agent');

        if ($this->agent->is_browser()) {
            $agent_short = $this->agent->browser().' '.$this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent_short = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent_short = $this->agent->mobile();
        } else {
            $agent_short = 'Unidentified User Agent';
        }

        $agent = $this->agent->agent_string();
        $platform = $this->agent->platform();
    }
}
