<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DownloadFModel extends WB_Model
{
    protected $_table = [
        'board_attach' => 'lms_board_attach',
        'event_file' => 'lms_event_file',
        'crm_send' => 'lms_crm_send',
        'lms_board_download_log' => 'lms_board_download_log',
        'lms_event_download_log' => 'lms_event_download_log'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 다운로드 파일 조회
     * @param string $content_idx [게시물 식별자]
     * @param string $file_idx [첨부파일 연관 테이블 식별자]
     * @param string $type [다운로드 타입 : board,event]
     * @return null
     */
    public function getFileData($content_idx = '', $file_idx = '', $type = 'board')
    {
        switch ($type) {
            case "board":
                $column = 'AttachFilePath AS FilePath, AttachFileName AS FileName, AttachRealFileName AS RealFileName';
                $table = $this->_table['board_attach'];
                $arr_condition = [
                    'RAW' => [
                        'BoardFileIdx = ' => (empty($file_idx) === true) ? '\'\'' : $file_idx,
                        'BoardIdx = ' => (empty($content_idx) === true) ? '\'\'' : $content_idx
                    ],
                    'EQ' => ['IsStatus' => 'Y']
                ];
                break;
            case "board_assignment":
                $column = 'AttachFilePath AS FilePath, AttachFileName AS FileName, AttachRealFileName AS RealFileName';
                $table = $this->_table['board_attach'];
                $arr_condition = [
                    'RAW' => [
                        'BoardFileIdx = ' => (empty($file_idx) === true) ? '\'\'' : $file_idx,
                    ],
                    'EQ' => ['IsStatus' => 'Y']
                ];
                break;
            case "event":
                $column = 'FileFullPath AS FilePath, FileName AS FileName, FileRealName AS RealFileName';
                $table = $this->_table['event_file'];
                $arr_condition = [
                    'RAW' => [
                        'EfIdx = ' => (empty($file_idx) === true) ? '\'\'' : $file_idx,
                        'ElIdx = ' => (empty($content_idx) === true) ? '\'\'' : $content_idx
                    ],
                    'EQ' => ['IsUse' => 'Y']
                ];
                break;
            case "crm_message":
                $column = 'SendAttachFilePath AS FilePath, SendAttachFileName AS FileName, SendAttachRealFileName AS RealFileName';
                $table = $this->_table['crm_send'];
                $arr_condition = [
                    'RAW' => [
                        'SendIdx = ' => (empty($content_idx) === true) ? '\'\'' : $content_idx
                    ],
                    'EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']
                ];
                break;
            case "prof_reference":
                $column = 'b.wAttachPath AS FilePath, a.wUnitAttachFile AS FileName, a.wUnitAttachFileReal AS RealFileName';
                $table = "
                wbs_cms_lecture_unit AS a
                INNER JOIN wbs_cms_lecture AS b ON a.wLecIdx = b.wLecIdx
                ";
                $arr_condition = [
                    'RAW' => [
                        'a.wUnitIdx = ' => (empty($file_idx) === true) ? '\'\'' : $file_idx
                    ],
                    'EQ' => [
                        'a.wIsUse' => 'Y', 'a.wIsStatus' => 'Y',
                        'b.wIsUse' => 'Y', 'b.wIsStatus' => 'Y'
                    ]
                ];
                break;
            default:
                return null;
                break;
        }

        $from = " FROM {$table} ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeLimitOffset(1, 0)->getMakeLimitOffset();

        return $this->_conn->query('select '.$column .$from .$where . $order_by_offset_limit)->row_array();
    }

    public function saveLog($idx=null, $attach_type = 0)
    {
        try {
            if (empty($idx) === false) {
                $refer_info = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null ;
                $refer_domain = parse_url($refer_info, PHP_URL_HOST);
                $this->__userAgent($agent_short, $agent, $platform);
                $input_data = [
                    'BoardIdx' => $idx,
                    'MemIdx' => (empty($this->session->userdata('mem_idx')) ? null : $this->session->userdata('mem_idx')),
                    'AttachType' => $attach_type,
                    'ReferDomain' => (empty($refer_domain) ? null : $refer_domain),
                    'ReferPath' => (empty($refer_info) ? null : $refer_info),
                    'ReferQuery' => urldecode($_SERVER['QUERY_STRING']),
                    'UserPlatform' => $platform,
                    'UserAgent' => substr($agent, 0, 199),
                    'RegIp' => $this->input->ip_address()
                ];

                if ($this->_conn->set($input_data)->insert($this->_table['lms_board_download_log']) === false) {
                    //echo $this->_conn->last_query();
                    throw new \Exception('저장에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 이벤트 첨부 파일 다운로드 로그
     * @param null $idx
     * @return array|bool
     */
    public function saveLogEvent($idx=null)
    {
        $refer_info = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null ;
        $refer_domain = parse_url($refer_info, PHP_URL_HOST);
        $this->__userAgent($agent_short, $agent, $platform);

        $input_data = [
            'ElIdx' => $idx,
            'MemIdx' => (empty($this->session->userdata('mem_idx')) ? null : $this->session->userdata('mem_idx')),
            'ReferDomain' => (empty($refer_domain) ? null : $refer_domain ),
            'ReferPath' => (empty($refer_info) ? null : $refer_info ),
            'ReferQuery' => urldecode($_SERVER['QUERY_STRING']),
            'UserPlatform' =>$platform,
            'UserAgent' =>substr($agent,0,199),
            'RegIp' =>$this->input->ip_address()
        ];

        try {
            if ($this->_conn->set($input_data)->insert($this->_table['lms_event_download_log']) === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
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
}