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

        $this->load->view('site/supporters/calendar', [
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
            if($i < 10){
                $day = '0'. $i;
            }else{
                $day = $i;
            }
            if(empty($data[$target_month.$day]) === false){
                $temp_css = 'attend';
            }
            $temp_html = '<span class="'.$temp_css.'"></span>';
            $month_data[$i] = $temp_html;
        }
        return $month_data;
    }
}