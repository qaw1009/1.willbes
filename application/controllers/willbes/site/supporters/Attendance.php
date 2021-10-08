<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends \app\controllers\FrontController
{
    protected $models = array('supportersF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function showCalendar($params = [])
    {
        $supporters_idx = $this->_reqG('supporters_idx');

        if (empty($params) === true) {
            $year = date('Y');
            $month = date('m');
        } else {
            $year = key($params);
            $month = array_value_first($params);
        }

        //일자별 데이터 조회
        $data = $this->_getScheduleDataForMonth($supporters_idx, $year.$month);
        $this->load->library('calendar');
        $this->calendar->next_prev_url = front_url('/supporters/attendance/showCalendar/');
        $calendar = $this->calendar->generate($year, $month, $data);

        //월 회원 출석 통계
        $member_average = $this->_getAttendanceMemberAverage($supporters_idx, $year.$month.'01');

        $this->load->view('site/supporters/calendar', [
            'member_average' => $member_average,
            'calendar' => $calendar
        ]);
    }

    public function storeAttendance()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'supporters_idx', 'label' => '서포터즈 코드', 'rules' => 'trim|required|integer']
        ];
        if ($this->validate($rules) === false) {
            return $this->json_error("정보가 올바르지 않습니다.");
        }

        $column = 'a.SupportersIdx, a.SupportersTypeCcd, a.MenuInfo, a.StartDate, a.EndDate';
        $arr_condition_1 = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
                'IsUse' => 'Y'
            ],
            'LTE' => ['StartDate' => date('Y-m-d')],
            'GTE' => ['EndDate' => date('Y-m-d')]
        ];

        $arr_condition_2 = [
            'EQ' => [
                'b.MemIdx' => $this->session->userdata('mem_idx'),
                'b.SiteCode' => $this->_site_code,
                'b.SupportersStatusCcd' => '720001',
                'b.IsStatus' => 'Y'
            ]
        ];
        $data = $this->supportersFModel->findSupporters($arr_condition_1, $arr_condition_2, $column);
        if (empty($data) === true) return $this->json_error('서포터즈 회원이 아닙니다.');
        if ($data['SupportersTypeCcd'] == '736002' && empty($data['MenuInfo']) === true) {
            return $this->json_error('온라인 관리반 기본정보 조회 실패입니다. 관리자에게 문의해 주세요.');
        }

        $result = $this->supportersFModel->storeSupportersAttendance($this->_reqP(null, false));
        $this->json_result($result, '출석 처리 되었습니다.', $result);
    }

    /**
     * 일자별 데이터 조회
     * @param string $supporters_idx
     * @param string $target_month
     * @return array
     */
    private function _getScheduleDataForMonth($supporters_idx = '', $target_month = '')
    {
        $month_data = [];
        $arr_condition = [
            'EQ' => [
                'SupportersIdx' => $supporters_idx
                ,'MemIdx' => $this->session->userdata('mem_idx')
                ,'IsStatus' => 'Y'
            ]
        ];

        $data = $this->supportersFModel->getSupportersAttendanceMember($arr_condition);
        $last_day = date('t', strtotime($target_month . '01'));

        for ($i=1; $i<=$last_day; $i++) {
            $temp_css = '';
            $temp_txt = '';
            if($i < 10){
                $day = '0'. $i;
            }else{
                $day = $i;
            }
            if(empty($data[$target_month.$day]) === false){
                $temp_css = 'attend';
                $temp_txt = $data[$target_month.$day];
            }
            $temp_html = '<span class="'.$temp_css.'">'.$temp_txt.'</span>';
            $month_data[$i] = $temp_html;
        }
        return $month_data;
    }

    /**
     * 출석 통계
     * @param string $supporters_idx
     * @param string $target_day
     * @return mixed
     */
    private function _getAttendanceMemberAverage($supporters_idx = '', $target_day = '')
    {
        $arr_condition = [
            'EQ' => [
                'SupportersIdx' => $supporters_idx
                ,'MemIdx' => $this->session->userdata('mem_idx')
                ,'IsStatus' => 'Y'
            ],
            'RAW' => [
                'AttendanceDay BETWEEN ' => 'LAST_DAY('.$target_day.' - INTERVAL 1 MONTH) + INTERVAL 1 DAY AND DATE_FORMAT(LAST_DAY('.$target_day.'), "%Y%m%d")'
            ]
        ];
        return $this->supportersFModel->getSupportersAttendanceMemberAverage($arr_condition, $target_day);
    }
}