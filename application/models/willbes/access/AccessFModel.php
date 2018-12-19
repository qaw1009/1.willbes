<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessFModel extends WB_Model
{
    protected $_table = [
        'gw' => 'lms_gateway',
        'asp' => 'lms_btob_company',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 외부접속 로그 저장 (광고 / ASP 연동 정보 저장)
     * @param $strType
     * @param null $idx
     * @return array|bool
     */
    public function saveLog($strType, $idx=null)
    {
        $refer_info = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null ;
        $refer_domain = parse_url($refer_info, PHP_URL_HOST);
        $this->__userAgent($agent_short, $agent, $platform);
        /*
        echo ( $refer_info ).'<BR>';
        echo ( $refer_domain ).'<BR>';
        echo ( $agent ).'<BR>';
        echo ( $agent_full ).'<BR>';
        echo ( $platform ).'<BR>';
        */

        $input_data = [
            'ReferDomain' => (empty($refer_domain) ? null : $refer_domain ),
            'ReferInfo' => (empty($refer_info) ? null : $refer_info ),
            'UserPlatform' =>$platform,
            'UserAgentShort' =>substr($agent_short,0,99),
            'UserAgent' =>substr($agent,0,199),
            'RegIp' =>$this->input->ip_address()
        ];


        /* 확장성을 고려해 테이블 분리 */
        if($strType == 'gw') {

            $input_data = array_merge($input_data,[
                'GwIdx' => $idx
            ]);

        } else if($strType == 'asp') {

            $input_data = array_merge($input_data,[

            ]);

        }

        try {
            if ($this->_conn->set($input_data)->insert($this->_table[$strType].'_access_log') === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('접속 정보 저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
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
        if ($strType == 'gw') {
            $arr_condition = [
                'EQ' => ['GwIdx' => $idx]
            ];
        } else if ($strType == 'asp') {
            $arr_condition = [
            ];
        }
        $result = $this->_conn->getListResult($this->_table[$strType],'*',$arr_condition,null,null,[]);
        return element('0', $result, []);
    }


    /**
     * 사용자 접속 정보 추출
     * @param $agent -> Internet Explorer 11.0
     * @param $agent_full -> Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko
     * @param $platform -> Windows 7
     */
    public function __userAgent(&$agent_short, &$agent, &$platform)
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

}