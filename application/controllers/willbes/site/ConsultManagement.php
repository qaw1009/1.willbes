<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultManagement extends \app\controllers\FrontController
{
    protected $models = array('consultF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = array_merge($this->_reqG(null));

        $arr_base['site_code'] = $this->_site_code;
        // 캠퍼스 조회
        $arr_base['campus'] = array_map(function($var) {
            $tmp_arr = explode(':', $var);
            return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
        }, explode(',', config_app('CampusCcdArr')));

        $this->load->view('site/consult_management/index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 달력생성, 예약 데이터 조회
     */
    public function showCalendar()
    {
        $year = empty((int)$this->uri->segment(4) == true) ? date('Y') : $this->uri->segment(4);
        $month = empty((int)$this->uri->segment(5) == true) ? date('m') : $this->uri->segment(5);

        $arr_input = $this->_reqG(null, true);
        $s_campus = (int)element('s_campus',$arr_input);

        //일자별 데이터 조회
        $data = $this->getScheduleDataForMonth($this->_site_code, $s_campus, $year.'-'.$month);

        $this->load->library('calendar');
        $this->calendar->next_prev_url = front_url('/consultManagement/showCalendar/');

        $calendar = $this->calendar->generate($year, $month, $data);

        $this->load->view('common/calendar', [
            'calendar' => $calendar
        ]);
    }

    public function showSchedule()
    {
        $arr_input = $this->_reqG(null, true);
        $cs_idx = (int)element('cs_idx',$arr_input);



        $this->load->view('site/consult_management/show_schedule', [

        ]);
    }

    /**
     * 일자별 데이터 현황 조회
     * @param $site_code
     * @param $campus_code
     * @param $target_month
     * @return array
     */
    private function getScheduleDataForMonth($site_code, $campus_code, $target_month)
    {
        $month_data = [];

        $data = $this->consultFModel->getScheduleDataForMonth($site_code, $campus_code, $target_month);

        //조회된 데이터 가공처리
        foreach ($data as $row) {
            if ($row['ConsultDay'] < date('d')) {
                $temp_css = 'btn_end';
                $temp_style = '';
                $temp_title = '예약마감';
            } else {
                if ($row['DayCount'] <= $row['MemberDayCount']) {
                    $temp_css = 'btn_end';
                    $temp_style = '';
                    $temp_title = '예약마감';
                } else {
                    $temp_css = 'btn_ing';
                    $temp_style = 'style="cursor: pointer"';
                    $temp_title = '예약가능';
                }
            }

            if ($row['ConsultDay'] == date('d')) {
                $today_css = 'highlight';
            } else {
                $today_css = '';
            }

            $month_data[$row['ConsultDay']] = '<span class="calendar_btn '.$temp_css.' '.$today_css.'" '.$temp_style.' data-cs_idx="'.$row['CsIdx'].'">'.$temp_title.'</span>';
        }

        return $month_data;

    }
}