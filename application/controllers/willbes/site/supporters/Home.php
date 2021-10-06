<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code','supportersF', 'support/supportBoardF', 'classroomF','product/packageF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();
    protected $_LearnPatternCcd_pass = ['615004'];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $today = date("Y-m-d", time());

        $arr_base = [];
        $arr_base['supporters_menu'] = $this->codeModel->getCcd('746');

        $column = 'a.SupportersIdx, a.SupportersTypeCcd, a.Title AS SupportersTitle, a.SupportersYear, a.SupportersNumber, a.MenuInfo, a.StartDate, a.EndDate';
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
        if (empty($data) === true) show_alert('서포터즈 회원이 아닙니다.', 'back');
        if ($data['SupportersTypeCcd'] == '736002' && empty($data['MenuInfo']) === true) {
            show_alert('온라인 관리반 기본정보 조회 실패입니다. 관리자에게 문의해 주세요.', 'back');
        }

        //서포터즈 상품정보 조회
        $arr_base['product_list'] = $this->supportersFModel->listProduct($data['SupportersIdx']);

        //공지사항조회
        $arr_noti_condition = [
            'EQ' => [
                'BmIdx' => $this->supportersFModel->_arr_bm_idx['notice'],
                'SupportersIdx' => $data['SupportersIdx'],
                'IsStatus' => 'Y',
                'IsUse' => 'Y'
            ]
        ];
        $arr_base['notice_list'] = $this->supportBoardFModel->listBoard(false, $arr_noti_condition,'','BoardIdx, SupportersIdx, IsBest, Title, DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm', 4, 0, ['IsBest'=>'Desc','BoardIdx'=>'Desc']);

        // 수강중 강좌 읽기
        $lec_arr = array_data_pluck($arr_base['product_list'], 'ProdCode');
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass, // 학습방식 : 기간제패키지
                'ProdCode' => $lec_arr
            ]
        ];

        // 수강중 강좌정보 읽어오기
        $passlist = $this->classroomFModel->getPackage($cond_arr, ['OrderDate' => 'DESC']);
        if(empty($passlist) == false){
            // 가장 최근 주분데이타
            $passinfo = $passlist[0];

            $passinfo['TakeLecNum'] = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode']
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ]
            ],'',true);

            $passinfo['LecNum'] = count($this->packageFModel->subListProduct('periodpack_lecture', $passinfo['ProdCode']));

            // load chart data
            // 전체기록
            $chart_all = $this->supportersFModel->getChartData([
                'EQ' => [
                    'o.MemIdx' => $passinfo['MemIdx'],
                    'o.OrderIdx' => $passinfo['OrderIdx'],
                    'op.ProdCode' => $passinfo['ProdCode']
                ]
            ]);
            $chart_data['all'] = array_data_pluck($chart_all, 'Cnt','Name');
            // 오늘
            $chart_today = $this->supportersFModel->getChartData([
                'EQ' => [
                    'o.MemIdx' => $passinfo['MemIdx'],
                    'o.OrderIdx' => $passinfo['OrderIdx'],
                    'op.ProdCode' => $passinfo['ProdCode']
                ],
                'LKB' => [
                    'lsh.FIrstStudyDate' => $today
                ]
            ]);
            $chart_data['today'] = [
                'Cnt' => 0,
                'TimeSum' => 0,
                'ProdCnt' => 0
            ];
            foreach ($chart_today as $row) {
                $chart_data['today']['Cnt'] += $row['Cnt'];
                $chart_data['today']['TimeSum'] += $row['TimeSum'];
                $chart_data['today']['ProdCnt'] += $row['ProdCnt'];
            }

            // 월별기록
            $date = $data['StartDate'];
            while(strtotime($date) <= strtotime($data['EndDate'])){
                $getmonth = date("Y-m", strtotime($date));
                $month_data = $this->supportersFModel->getChartData([
                    'EQ' => [
                        'o.MemIdx' => $passinfo['MemIdx'],
                        'o.OrderIdx' => $passinfo['OrderIdx'],
                        'op.ProdCode' => $passinfo['ProdCode']
                    ],
                    'LKB' => [
                        'lsh.FIrstStudyDate' => $getmonth . '-'
                    ]
                ]);
                $chart_data['month'][str_replace('-', '.', $getmonth)] = array_data_pluck($month_data, 'Cnt','Name');

                // 다음달 1일로 설정
                $date = date("Y-m-01", strtotime("+1 month", strtotime($date)));

                if($getmonth == substr($today, 0, 7)){
                    $chart_data['month_sum'] = [
                        'Cnt' => 0,
                        'TimeSum' => 0,
                        'ProdCnt' => 0
                    ];
                    foreach ($month_data as $row) {
                        $chart_data['month_sum']['Cnt'] += $row['Cnt'];
                        $chart_data['month_sum']['TimeSum'] += $row['TimeSum'];
                        $chart_data['month_sum']['ProdCnt'] += $row['ProdCnt'];
                    }
                    $chart_data['month_sum']['h'] = gmdate('H', $chart_data['month_sum']['TimeSum']);
                    $chart_data['month_sum']['m'] = gmdate('i', $chart_data['month_sum']['TimeSum']);
                }
            }
        } else {
            $passlist = [];
        }

        return $this->load->view('site/supporters/home', [
            'data' => $data,
            'passinfo' => $passinfo,
            'chartdata' => $chart_data,
            'arr_base' => $arr_base
        ]);
    }
}