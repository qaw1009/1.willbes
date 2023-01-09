<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseConsult extends \app\controllers\FrontController
{
    protected $models = array('consultF', 'memberF', '_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('create', 'store', 'success', 'cancel');
    protected $_consult_name;
    protected $_consult_type;
    protected $_consult_status;
    protected $_default_path;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = array_merge($this->_reqG(null));
        $arr_base['depth'] = 1;
        $arr_base['comment'] = $this->_depth_comment($arr_base['depth'], $arr_input);
        $arr_base['site_code'] = $this->_site_code;
        $consult_name = ($this->_site_code == '2011' && $this->_consult_type == 'T') ? '상담' : $this->_consult_name;
        /*$arr_base['title'] = ($this->_site_code == '2011' && $this->_consult_type == 'T') ? 'ㆍ신현표 노무사의 공부고민 및 내용의문사항 상담 예약' : '· 심층 ' . $consult_name . ' 예약';*/

        if ($this->_site_code == '2011' && $this->_consult_type == 'T') {
            if (element('s_campus', $arr_input, '') == '605011') {
                $arr_base['title'] = 'ㆍGS1순환 이수진 노동법 평일반 [합격생 1:1 멘토링 프로그램] ';
            } else {
                $arr_base['title'] = 'ㆍ신현표 노무사의 공부고민 및 내용의문사항 상담 예약';
            }
        } else {
            $arr_base['title'] = '· 심층 ' . $consult_name . ' 예약';
        }

            // 캠퍼스 조회
        $arr_base['campus'] = [];
        if (config_app('CampusCcdArr') != 'N') {
            $arr_base['campus'] = array_map(function ($var) {
                $tmp_arr = explode(':', $var);
                return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
            }, explode(',', config_app('CampusCcdArr')));
        }

        $this->load->view('site/consult/index', [
            'default_path' => $this->_default_path,
            'consult_name' => $consult_name,
            'arr_input' => $arr_input,
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 달력생성, 예약 데이터 조회
     */
    public function showCalendar()
    {
        $year = empty((int)$this->uri->segment(5) == true) ? date('Y') : $this->uri->segment(5);
        $month = empty((int)$this->uri->segment(6) == true) ? date('m') : $this->uri->segment(6);

        $arr_input = $this->_reqG(null, true);
        $s_campus = (int)element('s_campus', $arr_input);

        //일자별 데이터 조회
        $data = $this->_getScheduleDataForMonth($this->_site_code, $s_campus, $year.'-'.$month);

        $this->load->library('calendar');
        $this->calendar->next_prev_url = front_url($this->_default_path . '/showCalendar/');

        $calendar = $this->calendar->generate($year, $month, $data);

        $this->load->view('common/calendar', [
            'default_path' => $this->_default_path,
            'consult_name' => $this->_consult_name,
            'calendar' => $calendar
        ]);
    }

    /**
     * 일자별, 시간별 데이터 조회
     */
    public function showSchedule()
    {
        $arr_input = $this->_reqG(null, true);
        $cs_idx = (int)element('cs_idx', $arr_input);
        $arr_condition = ([
            'RAW' => [
                'A.CsIdx = ' => (empty($cs_idx) === true) ? '\'\'' : '\''.$cs_idx.'\'',
            ],
            'EQ' => [
                'A.ConsultType' => $this->_consult_type,
                'A.IsStatus' => 'Y'
            ]
        ]);
        $base_data = $this->consultFModel->findConsultSchedule($arr_condition);

        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['B.IsStatus' => 'Y']]);
        $arr_schedule_list = $this->consultFModel->findConsultScheduleTime($arr_condition);

        $base_data = json_encode($base_data);
        $arr_schedule_list = json_encode($arr_schedule_list);

        $this->load->view('site/consult/show_schedule', [
            'default_path' => $this->_default_path,
            'consult_name' => ($this->_site_code == '2011' && $this->_consult_type == 'T') ? '상담' : $this->_consult_name,
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
        if (empty(element('s_campus', $arr_input)) === true || empty(element('cst_idx', $arr_input)) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 상담예약 정보
        $arr_input = array_merge_recursive($arr_input, ['consult_type' => $this->_consult_type]);
        $data = $this->_findConsultScheduleTimeForOnly($arr_input);
        if (empty($data) === true) {
            show_alert('조회된 데이터가 없습니다. 다시 시도해 주세요.', 'back');
        }

        if ($data['consultType'] != 'Y' || $data['ConsultPersonCount'] <= $data['memCnt']) {
            show_alert('예약할 수 있는 정원이 초과된 상태입니다. 다른 시간대를 선택해 주세요.', 'back');
        }

        $member_data = $this->consultFModel->getScheduleDataForMemberIsConsult($this->_site_code, element('s_campus', $arr_input), $this->_consult_type);
        $isCount_cnt = $member_data['cnt'];
        if ($isCount_cnt > 0) {
            show_alert('등록된 상담예약건이 존재합니다. 취소 후 다시 예약해 주세요.', 'back');
        }

        // 회원정보 조회
        $arr_base['member_info'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $this->session->userdata('mem_idx')]]);

        //공통코드 조회
        $codes = $this->codeModel->getCcdInArray($this->consultFModel->_ccds);
        $serial_ccd = null;
        if(config_app('SiteGroupCode') == '1002') {
            $serial_ccd = $codes['614'];    //공무원 온라인, 공무원 학원
        } else if($this->_site_code == '2013') {
            $serial_ccd = $codes['729'];    //경찰간부 학원
        } else if($this->_site_code == '2011') {
            $serial_ccd = $codes['749'];    //자격증
        } else {
            $serial_ccd = $codes['666'];    //경찰 학원
        }

        $arr_base['mail_domain_ccd'] = $codes['661'];
        $arr_base['serial_ccd'] = $serial_ccd;
        $arr_base['candidate_area_ccd'] = $codes['631'];
        $arr_base['exam_period_ccd'] = $codes['667'];
        $arr_base['study_ccd'] = $codes['668'];

        $arr_base['data'] = $data;
        $arr_base['depth'] = 2;
        $arr_base['comment'] = $this->_depth_comment($arr_base['depth']);
        $arr_base['memo'] =  ($this->_site_code == '2013' || $this->_site_code == '2011') ? '' : $this->_default_memo();

        $arr_base['site_code'] = $this->_site_code;
        $consult_name = ($this->_site_code == '2011' && $this->_consult_type == 'T') ? '상담' : $this->_consult_name;
        $arr_base['title'] = ($this->_site_code == '2011' && $this->_consult_type == 'T') ? '· GS0순환 이수진 노동법 1:1 대면상담 예약' : '· 심층 ' . $consult_name . ' 예약';

        $arr_base['campus'] = [];
        if (config_app('CampusCcdArr') != 'N') {
            $arr_base['campus'] = array_map(function ($var) {
                $tmp_arr = explode(':', $var);
                return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
            }, explode(',', config_app('CampusCcdArr')));
        }

        $this->load->view('site/consult/create', [
            'default_path' => $this->_default_path,
            'consult_name' => $consult_name,
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'yoil' => $this->consultFModel->yoil
        ]);
    }

    public function store()
    {
        $rules = [
            ['field' => 'cst_idx', 'label' => '상담예약식별자', 'rules' => 'trim|required|integer'],
            ['field' => 's_campus', 'label' => '캠퍼스코드', 'rules' => 'trim|required|integer'],
            ['field' => 'phone', 'label' => '연락처', 'rules' => 'trim|required|integer'],
            ['field' => 'mail_id', 'label' => '이메일', 'rules' => 'trim|required|max_length[30]'],
            ['field' => 'mail_domain', 'label' => '이메일', 'rules' => 'trim|required|max_length[30]'],
            ['field' => 'serial_ccd[]', 'label' => '응시직렬', 'rules' => 'trim|required'],
            ['field' => 'candidate_area_ccd', 'label' => '응시지역', 'rules' => 'trim|required|integer|integer'],
            ['field' => 'exam_period_ccd', 'label' => '수험기간', 'rules' => 'trim|required|integer'],
            ['field' => 'subject_name', 'label' => '취약과목', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'study_ccd[]', 'label' => '수강여부', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->consultFModel->addConsultSchedule($this->_reqP(null, false), $this->_site_code, $this->_consult_type);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function success()
    {
        $arr_base['depth'] = 3;
        $arr_base['comment'] = $this->_depth_comment($arr_base['depth']);
        $consult_name = ($this->_site_code == '2011' && $this->_consult_type == 'T') ? '상담' : $this->_consult_name;
        $arr_base['title'] = ($this->_site_code == '2011' && $this->_consult_type == 'T') ? '· GS0순환 이수진 노동법 1:1 대면상담 예약' : '· 심층 ' . $consult_name . ' 예약';

        $arr_input = $this->_reqP(null);
        $arr_input['s_campus'] = $this->_reqG('s_campus');

        // 캠퍼스 조회
        $arr_base['campus'] = [];
        if (config_app('CampusCcdArr') != 'N') {
            $arr_base['campus'] = array_map(function ($var) {
                $tmp_arr = explode(':', $var);
                return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
            }, explode(',', config_app('CampusCcdArr')));
        }

        if (empty(element('s_campus', $arr_input)) === true || empty(element('cst_idx', $arr_input)) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 회원정보 조회
        $arr_base['member_info'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $this->session->userdata('mem_idx')]]);

        // 상담예약 정보
        $arr_base['data'] = $this->consultFModel->findConsultScheduleForMember(element('csm_idx', $arr_input));
        $serial_data = $this->consultFModel->findConsultScheduleDetailForMember_R_Ccd(element('csm_idx', $arr_input), '666');
        if (empty($serial_data) === true) {
            $serial_data = $this->consultFModel->findConsultScheduleDetailForMember_R_Ccd(element('csm_idx', $arr_input), '614');
        }
        $study_data = $this->consultFModel->findConsultScheduleDetailForMember_R_Ccd(element('csm_idx', $arr_input), '668');

        $arr_base['data']['SerialName'] = implode(', ', array_values($serial_data));
        $arr_base['data']['StudyName'] = implode(', ', array_values($study_data));

        $this->load->view('site/consult/success', [
            'default_path' => $this->_default_path,
            'consult_name' => $consult_name,
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'yoil' => $this->consultFModel->yoil
        ]);
    }

    /**
     * 방문예약취소
     */
    public function cancel()
    {
        $rules = [
            ['field' => 'csm_idx', 'label' => '상담예약식별자', 'rules' => 'trim|required|integer'],
            ['field' => 's_campus', 'label' => '캠퍼스코드', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->consultFModel->cancelConsultSchedule($this->_reqP(null, false));
        $this->json_result($result, '상담 예약이 취소되었습니다.', $result);
    }

    /**
     * 회원예약현황 목록팝업
     */
    public function showMySchedule()
    {
        $arr_input = $this->_reqG(null, false);
        $arr_base['list'] = $this->consultFModel->listConsultScheduleForMember($this->_site_code, element('s_campus', $arr_input), $this->_consult_type);
        $consult_name = ($this->_site_code == '2011' && $this->_consult_type == 'T') ? '상담' : $this->_consult_name;

        $this->load->view('site/consult/popup_show_my_schedule', [
            'default_path' => $this->_default_path,
            'consult_type' => $this->_consult_type,
            'consult_name' => $consult_name,
            'consult_status' => $this->_consult_status,
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'yoil' => $this->consultFModel->yoil
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

        //월별예약현황
        $data = $this->consultFModel->getScheduleDataForMonth($site_code, $campus_code, $target_month, $this->_consult_type);
        $member_data = $this->consultFModel->getScheduleDataForMemberIsConsult($site_code, $campus_code, $this->_consult_type);
        $isCount_cnt = $member_data['cnt'];

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
                    if ($isCount_cnt > 0) {
                        $temp_css = 'btn_end';
                        $temp_style = 'style="color: red"';
                        $temp_title = '예약불가';
                    } else {
                        $temp_css = 'btn_ing';
                        $temp_style = 'style="cursor: pointer"';
                        $temp_title = '예약가능';
                    }
                }
            }

            if ($row['ConsultDay'] == date('d')) {
                $today_css = 'highlight';
            } else {
                $today_css = '';
            }

            $month_data[(int)$row['ConsultDay']] = '<span class="calendar_btn '.$temp_css.' '.$today_css.'" '.$temp_style.' data-cs_idx="'.$row['CsIdx'].'">'.$temp_title.'</span>';
        }
        return $month_data;
    }

    // 상담 문구
    private function _depth_comment($depth = 1, $arr_input = []) {
        switch ($depth) {
            case "1" :
                // 자격증 & 전화상담인 경우
                if ($this->_site_code == '2011' && $this->_consult_type == 'T') {
                    if (element('s_campus', $arr_input, '') == '605011') {
                        $comment = '<p style="color: red; margin-bottom: 10px;">※ 1/10(화) 오전 10시부터 예약 가능합니다. (아이디 로그인 후 가능)</p>
                                ㆍ참여대상 : GS1순환 이수진 노동법 평일반 수강생(실강반/실영상반/온라인첨삭반/온라인수강생 해당)<br/>
                                ㆍ1/12(목) 오전 10:00까지 예약 가능하며, 선착순으로 예약 마감됩니다.<br/>
                                ㆍ진행일정<br/>
                                <span class="ml20"></span>- 1/16(월)~1/20(금), 1/25(수)~1/31(화) 매주 월~금 진행<br/>
                                <span class="ml20"></span>- 저녁 18:30~21:00 (마지막 타임 20:30~21:00)<br/>
                                <span class="ml20"></span>- 개인별 상담시간: 30분<br/>
                                ㆍ예약 완료 이후에는 변경이 불가하오니, 신중히 선택해주시기 바랍니다.<br/>
                                ㆍ진행 강의실 및 안내사항은 추후 문자공지드립니다.<br/>
                                ㆍ불가피 참석이 어려우신 경우, 다른 대기자분들의 상담을 위해 학원(1544-1881 ARS1, 3)으로 연락 주시기 바랍니다.<br/>';
                    } else {
                        $comment = '<p style="color: red; margin-bottom: 10px;">※ 12/22(목) 오후 2시부터 예약 가능합니다.  (아이디 로그인 후 가능)</p>
                                ㆍ수강대상 : 제31회 공인노무사 2차 시험 응시자<br/>
                                ㆍ12/25(일) 오후 12:00까지 예약 가능하며, 선착순으로 예약 마감됩니다.<br/>
                                ㆍ상담 일시 <span class="ml5"></span>(※ 개인별 상담시간 : 1시간)<br/>
                                <span class="ml20"></span>1회 - 12/26(월) 오후 17:00~22:00 (마지막 타임 21:00~22:00)<br/>
                                <span class="ml20"></span>2회 - 12/27(화) 오후 17:00~22:00 (마지막 타임 21:00~22:00)<br/>
                                ㆍ예약 완료 이후에는 변경이 불가하오니, 신중히 선택해주시기 바랍니다.<br/>
                                ㆍ진행 강의실 및 안내사항은 추후 문자공지드립니다.<br/>
                                ㆍ불가피 참석이 어려우신 경우, 다른 대기자분들의 상담을 위해 학원(1544-1881 ARS1, 3)으로 연락 주시기 바랍니다.<br/>';
                    }
                } else {
                    switch ($this->_consult_type) {
                        case 'V' :
                            $time_comment = '· 상담은 월~토요일 오전 9시부터 오후 6시까지 진행됩니다.<br/>'; // 방문 상담
                            break;
                        case 'T' :
                            $time_comment = '· 상담은 월~일요일 오전 10시부터 오후 5시까지 진행됩니다.<br/>'; // 전화 상담
                            break;
                        default :
                            $time_comment = '';
                    }
                    $comment = $time_comment . '
                        · 원하시는 상담일자를 선택하여 예약가능 버튼을 클릭해 주세요.<br/>
                        · 예약이 마감된 경우 또는 상담시간 이외 시간대는 예약신청이 불가능 합니다. (예약취소 발생시 ‘ 예약가능 ’ 버튼 재활성화)<br/>
                        · 예약하기를 신청하신후 반드시 사전정보 입력을 해 주셔야 상담신청이 완료됩니다.<br/>
                    ';
                }
                break;
            case "2" :
                $comment = '
                    · 원활한 상담 예약을 위해 사전정보 사항을 정확히 입력해 주세요. (<span class="tx-red">(*)</span>필수항목)<br/>
                    · <span class="tx-blue">상세정보의 시험별, 과목별 점수를 기입해 주시면 수 년 간의 통계 및 패턴분석을 통한 심층 상담을 받으실 수 있습니다.</span><br/>
                    · 시험 미응시자인 경우에는 시험 점수 대신 궁금하신 사항을 구체적으로 기입해 주세요.<br/>
                ';
                break;
            case "3" :
                // 상담취소 안내 문구
                switch ($this->_consult_type) {
                    case 'V' :
                        $cancel_comment = '· 예약하신 날짜 및 시간에 도착하지 않으실 경우 상담이 취소될 수 있습니다.<br/>'; // 방문 상담
                        break;
                    case 'T' :
                        $cancel_comment = '· 예약하신 날짜 및 시간에 부재중이실 경우 상담이 취소될 수 있습니다.<br/>'; // 전화 상담
                        break;
                    default : $cancel_comment = '';
                }
                $comment = '
                    · 상담 예약이 완료되었습니다. 예약사항을 다시 한 번 확인해 주세요.<br/>
                    · <span class="tx-blue">상담예약일시를 변경하시려면 예약 취소를 하시고 1단계 상담일자/시간선택 부터 다시 신청하셔야 합니다</span>.<br/>
                ' . $cancel_comment;
                break;
            default : $comment = '';
        }
        return $comment;
    }

    /**
     * 상세정보 기본값 셋팅
     * @return string
     */
    private function _default_memo()
    {
        return "[모의고사명] (예:[2016 1차])
필수과목________( ), ________( )
선택과목________( ), ________( ). ________( ). 총점( )
[모의고사명] (예:[2016 2차])
필수과목________( ), ________( )
선택과목________( ), ________( ). ________( ). 총점( )
[모의고사명] (예:[모의고사])
필수과목________( ), ________( )
선택과목________( ), ________( ). ________( ). 총점( )
* 기타상담사항: 처음준비합니다. 자세한상담이필요합니다.";
    }

    /**
     * 특정시간대 기준 데이터 조회
     * @param $arr_input
     * @return mixed
     */
    private function _findConsultScheduleTimeForOnly($arr_input)
    {
        $cst_idx = (int)element('cst_idx', $arr_input);
        $s_campus = (int)element('s_campus', $arr_input);
        $consult_type = element('consult_type', $arr_input);

        $column = '
            STRAIGHT_JOIN a.CstIdx, b.CsIdx, b.ConsultDate, a.TimeValue, a.ConsultTargetType, a.ConsultPersonCount, IFNULL(c.memCnt, 2) AS memCnt
            , IF (a.ConsultPersonCount <= IFNULL(c.memCnt, 0), \'N\', \'Y\') AS consultType
        ';

        $arr_condition = ([
            'RAW' => [
                'a.CstIdx = ' => (empty($cst_idx) === true) ? '\'\'' : '\''.$cst_idx.'\'',
                'b.CampusCcd =' => (empty($s_campus) === true) ? '\'\'' : '\''.$s_campus.'\'',
            ],
            'EQ' => [
                'b.ConsultType' => $consult_type,
                'b.SiteCode' => $this->_site_code,
                'a.IsUse' => 'Y',
                'a.IsStatus' => 'Y'
            ]
        ]);
        $arr_sub_condition = ([
            'RAW' => [
                'a.CstIdx = ' => (empty($cst_idx) === true) ? '\'\'' : '\''.$cst_idx.'\''
            ],
            'EQ' => [
                'b.IsReg' => 'Y'
            ]
        ]);

        $data = $this->consultFModel->findConsultScheduleTimeForOnly($arr_condition, $arr_sub_condition, $column);
        return $data;
    }
}