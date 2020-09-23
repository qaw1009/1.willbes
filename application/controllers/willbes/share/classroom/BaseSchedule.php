<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSchedule extends \app\controllers\FrontController
{
    protected $models = array('support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;
    protected $_default_path;
    private $_on_off_swich = [
        '82' => [                         // bm_idx 학원게시판 -> 강의실배정표
            'site_code' => ['2018'],     // 적용 사이트 [임용학원]
        ],
    ];

    public function __construct()
    {
        parent::__construct();
        $arr_swich = element($this->_bm_idx,$this->_on_off_swich);
        if(!(empty($arr_swich) === false && in_array($this->_site_code,$arr_swich['site_code']) === true)){
            show_alert('잘못된 접근 입니다.', 'back');
        }
    }

    public function index($params=[])
    {
        $arr_input = array_merge($this->_reqG(null));
        $arr_base['depth'] = 1;
        $arr_base['site_code'] = $this->_site_code;
        if (config_app('CampusCcdArr') != 'N') {
            $arr_base['campus'] = array_map(function ($var) {
                $tmp_arr = explode(':', $var);
                return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
            }, explode(',', config_app('CampusCcdArr')));
        }

        $this->load->view('site/classroom/index', [
            'default_path' => $this->_default_path,
            'arr_input' => $arr_input,
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 달력생성, 강의실 배정표 조회
     */
    public function showCalendar()
    {
        $year = empty((int)$this->uri->segment(5) == true) ? date('Y') : $this->uri->segment(5);
        $month = empty((int)$this->uri->segment(6) == true) ? date('m') : $this->uri->segment(6);

        //일자별 데이터 조회
        $data = $this->_getScheduleDataForMonth($this->_site_code, $year.$month);
        $this->load->library('calendar');
        $this->calendar->next_prev_url = front_url($this->_default_path . '/showCalendar/');
        $calendar = $this->calendar->generate($year, $month, $data);

        $this->load->view('site/classroom/calendar', [
            'calendar' => $calendar
        ]);
    }

    /**
     * 일자별 데이터 조회
     */
    public function showSchedule()
    {
        $base_data = null;
        $arr_input = $this->_reqG(null);
        $year_month = element('year_month', $arr_input);
        $board_idx = element('board_idx', $arr_input);
        $sel_day = element('sel_day', $arr_input);

        if(empty($sel_day) === true){
            show_alert('잘못된 접근 입니다.', 'back');
        }

        if(empty($year_month) === true){
            $year_month = date('Ym');
        }

        $format_date = $this->_getFormatDate($year_month,$sel_day);

        if(empty($board_idx) === false){
            $arr_condition = ([
                'EQ' => [
                    'b.BoardIdx' => $board_idx,
                    'b.IsStatus' => 'Y',
                    'b.IsUse' => 'Y'
                ]
            ]);
        }else{
            $arr_condition = ([
                'EQ' => [
                    'b.SiteCode' => $this->_site_code,
                    'b.Title' => date("Ymd"),
                    'b.IsStatus' => 'Y',
                    'b.IsUse' => 'Y'
                ]
            ]);
        }

        $base_data = $this->supportBoardFModel->findBoardForDaySchedule($arr_condition);

        $this->load->view('site/classroom/show_schedule', [
            'base_data' => $base_data,
            'format_date' => $format_date,
        ]);
    }

    /**
     * 월별 강의실 배정표 데이터 조회
     * @param $site_code
     * @param $target_month
     * @return array
     */
    private function _getScheduleDataForMonth($site_code, $target_month)
    {
        $month_data = [];

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.IsStatus' => 'Y'
                ,'b.SiteCode' => $site_code
            ],
            'RAW' => [
                'b.Title between ' => ' CONCAT(\''.$target_month.'\',\'01\') and REPLACE(LAST_DAY(CONCAT(\''.$target_month.'\',\'01\')),"-","")'
            ],
        ];

        $data = $this->supportBoardFModel->listBoardForSchedule($arr_condition);
        $last_day = date('t', strtotime($target_month . '01'));

        for($i=1; $i<=$last_day; $i++){
            $temp_css = '';
            $board_idx = '';
            $temp_date = $target_month . $i;

            if(empty($data[$i]) === false){
                $temp_css = 'roomTable';
                $board_idx = $data[$i]['BoardIdx'];
            }

            $temp_html = '<span class="btn_day '.$temp_css.'" data-board-idx="'.$board_idx.'" data-year-month="'.$target_month.'" data-sel-day="'.$i.'" title="배정표"></span>';

            if($temp_date == date('Ymd')){
                $month_data[$i] ='<a href="#noe" class="viewSchedule today">&nbsp;</a>'.$temp_html;
            }else{
                $month_data[$i] = $temp_html;
            }

        }

        return $month_data;
    }

    /**
     * 날짜 형식 포맷
     * @param integer $year_month
     * @param integer $sel_day
     * @return string
     */
    private function _getFormatDate($year_month=null,$sel_day=null)
    {
        $week_w = array('일','월','화','수','목','금','토');
        $sel_day = $sel_day < 10 ? '0'.$sel_day : $sel_day;
        $temp_date = $year_month . $sel_day;
        $d_week = $week_w[date("w",strtotime($temp_date))];

        return date("Y년 m월 d일", strtotime($temp_date)) . ' (' . $d_week . ')';
    }

}