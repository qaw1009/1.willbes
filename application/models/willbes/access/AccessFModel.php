<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessFModel extends WB_Model
{
    protected $_table = [
        'gw' => 'lms_gateway',
        'btob' => 'lms_btob',
        'banner' => 'lms_banner',
        'visitor' => 'lms_visitor',
        'visitor_sum' => 'lms_visitor_sum'
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
        $this->__userAgent($agent_type, $agent_short, $agent, $platform);

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
     * @param array $input
     * @return bool|string
     */
    public function saveVisitor($input = [])
    {
        $access_url = get_var($this->input->server('HTTP_REFERER'), null);
        $access_domain = get_var(parse_url($access_url, PHP_URL_HOST), null);
        $refer_info = element('refer_info', $input);
        $refer_domain = get_var(parse_url($refer_info, PHP_URL_HOST), null);
        $this->__userAgent($agent_type, $agent_short, $agent, $platform);

        try {
            $sess_sess_id = $this->session->userdata('make_sessionid');
            $sess_mem_idx = get_var($this->session->userdata('mem_idx'), null);
            $access_timestamp = time();
            $access_device = strtoupper(substr(APP_DEVICE, 0, 1));
            $site_code = config_app('SiteCode');
            $reg_ip = $this->input->ip_address();

            // 세션아이디가 없을 경우 방문자 정보 저장 안함
            if (empty($sess_sess_id) === true) {
                return true;
            }
            
            // 기등록여부 확인
            $row = $this->_conn->getFindResult($this->_table['visitor'], 'SessId', ['EQ' => ['SessId' => $sess_sess_id]]);
            
            if (empty($row) === false) {
                // 방문자 정보 수정
                $data = [
                    'MemIdx' => $sess_mem_idx,
                    'AccessTms' => $access_timestamp
                ];

                $is_update = $this->_conn->set($data)->set('PageView', 'PageView + 1', false)
                    ->where('SessId', $sess_sess_id)
                    ->update($this->_table['visitor']);
                if ($is_update === false) {
                    throw new \Exception('방문자 정보 수정에 실패했습니다.');
                }
            } else {
                // 방문자 정보 등록
                $data = [
                    'SessId' => $sess_sess_id,
                    'SiteCode' => $site_code,
                    'MemIdx' => $sess_mem_idx,
                    'AccessTms' => $access_timestamp,
                    'AccessDomain' => $access_domain,
                    'AccessUrl' => substr($access_url, 0, 199),
                    'AccessDevice' => $access_device,
                    'UserPlatform' => $platform,
                    'UserAgentType' => $agent_type,
                    'UserAgentShort' => substr($agent_short, 0, 99),
                    'UserAgent' => substr($agent, 0, 199),
                    'ReferDomain' => $refer_domain,
                    'ReferInfo' => substr($refer_info, 0, 199),
                    'PageView' => '1',
                    'RegIp' => $reg_ip
                ];
                
                $is_insert = $this->_conn->set($data)->insert($this->_table['visitor']);
                if ($is_insert === false) {
                    throw new \Exception('방문자 정보 등록에 실패했습니다.');
                }

                // 방문자 합계 등록
                $query = /** @lang text */ 'insert into ' . $this->_table['visitor_sum'] . ' (VisitDate, SiteCode, VisitCnt) values 
                (?, ?, 1) ON DUPLICATE KEY UPDATE VisitCnt = VisitCnt + 1';

                $is_replace = $this->_conn->query($query, [date('Ymd'), $site_code]);
                if ($is_replace === false) {
                    throw new \Exception('방문자 합계 저장에 실패했습니다.');
                }
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
     * @param $agent_type -> P : PC (브라우저), M : 모바일, R : 로봇, E : 기타
     * @param $agent_short -> Internet Explorer 11.0
     * @param $agent -> Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko
     * @param $platform -> Windows 7
     */
    public function __userAgent(&$agent_type, &$agent_short, &$agent, &$platform)
    {
        $this->load->library('user_agent');

        if ($this->agent->is_browser()) {
            $agent_type = 'P';
            $agent_short = $this->agent->browser().' '.$this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent_type = 'R';
            $agent_short = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent_type = 'M';
            $agent_short = $this->agent->mobile();
        } else {
            $agent_type = 'E';
            $agent_short = 'Unidentified User Agent';
        }

        $agent = $this->agent->agent_string();
        $platform = $this->agent->platform();
    }
}
