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

        $arr_base['depth'] = 1;
        $arr_base['comment'] = $this->_depth_comment($arr_base['depth']);
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
        $data = $this->_getScheduleDataForMonth($this->_site_code, $s_campus, $year.'-'.$month);

        $this->load->library('calendar');
        $this->calendar->next_prev_url = front_url('/consultManagement/showCalendar/');

        $calendar = $this->calendar->generate($year, $month, $data);

        $this->load->view('common/calendar', [
            'calendar' => $calendar
        ]);
    }

    /**
     * 일자별, 시간별 데이터 조회
     */
    public function showSchedule()
    {
        $arr_input = $this->_reqG(null, true);
        $cs_idx = (int)element('cs_idx',$arr_input);
        $arr_condition = ([
            'RAW' => [
                'A.CsIdx = ' => (empty($cs_idx) === true) ? '\'\'' : '\''.$cs_idx.'\'',
            ],
            'EQ'=>[
                'A.IsStatus' => 'Y'
            ]
        ]);
        $base_data = $this->consultFModel->findConsultSchedule($arr_condition);
        $arr_schedule_list = $this->consultFModel->findConsultScheduleTime($arr_condition);
        $base_data = json_encode($base_data);
        $arr_schedule_list = json_encode($arr_schedule_list);

        $this->load->view('site/consult_management/show_schedule', [
            'base_data' => $base_data,
            'arr_schedule_list' => $arr_schedule_list,
            'yoil' => $this->consultFModel->yoil
        ]);
    }

    /**
     * 상담예약 입력 폼
     */
    public function create()
    {
        $arr_input = array_merge($this->_reqP(null));
        if (empty(element('s_campus', $arr_input)) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        if (empty(element('cst_idx', $arr_input)) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $arr_base['depth'] = 2;
        $arr_base['comment'] = $this->_depth_comment($arr_base['depth']);
        $arr_base['site_code'] = $this->_site_code;
        $get_data_campus = element('s_campus', $arr_input);

        // 캠퍼스 조회
        $arr_campus = array_map(function($var) {
            $tmp_arr = explode(':', $var);
            return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
        }, explode(',', config_app('CampusCcdArr')));
        $arr_campus = array_pluck($arr_campus, 'CampusCcdName', 'CampusCcd');

        if (empty($arr_campus[$get_data_campus]) === true) {
            show_alert('캠퍼스 정보가 올바르지 않습니다. 다시 시도해 주세요.', 'back');
        }

        $arr_base['campus'] = [
            'ccd' => $get_data_campus,
            'name' => $arr_campus[$get_data_campus]
        ];

        $this->load->view('site/consult_management/create', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 일자별 데이터 현황 조회
     * @param $site_code
     * @param $campus_code
     * @param $target_month
     * @return array
     */
    private function _getScheduleDataForMonth($site_code, $campus_code, $target_month)
    {
        $month_data = [];

        $data = $this->consultFModel->getScheduleDataForMonth($site_code, $campus_code, $target_month);

        //조회된 데이터 가공처리
        foreach ($data as $row) {
            $str_ConsultDay = str_replace('-','',$row['ConsultDate']);
            if ($str_ConsultDay < date('Ymd')) {
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

    private function _depth_comment($depth = 1) {
        switch ($depth) {
            case "1" :
                $comment = '
                · 상담은 월 ~ 토요일 오전 10시부터 오후 5시까지 진행됩니다.<br/>
                · 원하시는 상담일자를 선택하여 예약가능 버튼을 클릭해 주세요.<br/>
                · 예약이 마감된 경우 또는 상담시간 이외 시간대는 예약신청이 불가능 합니다. (예약취소 발생시 ‘ 예약가능 ’ 버튼 재활성화)<br/>
                · 예약하기를 신청하신후 반드시 사전정보 입력을 해 주셔야 상담신청이 완료됩니다.<br/>
                ';
                break;
            case "2" :
                $comment = '
                · 원활한 상담 예약을 위해 사전정보 사항을 정확히 입력해 주세요. (<span class="tx-red">(*)</span>필수항목)<br/>
                · <span class="tx-blue">상세정보의 시험별, 과목별 점수를 기입해 주시면 수 년 간의 통계 및 패턴분석을 통한 심층 상담을 받으실 수 있습니다.</span><br/>
                · 시험 미응시자인 경우에는 시험 점수 대신 궁금하신 사항을 구체적으로 기입해 주세요.<br/>
                ';
                break;
            case "3" :
                $comment = '
                · 상담 예약이 완료되었습니다. 예약사항을 다시 한 번 확인해 주세요.<br/>
                · <span class="tx-blue">상담예약일시를 변경하시려면 예약 취소를 하시고 1단계 상담일자/시간선택 부터 다시 신청하셔야 합니다</span>.<br/>
                · 예약하신 날짜 및 시간에 도착하지 않으실 경우 상담이 취소될 수 있습니다.<br/>
                ';
                break;
        }

        return $comment;
    }
}