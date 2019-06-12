<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseProfSales extends \app\controllers\BaseController
{
    protected $models = array('pay/profSales', 'product/base/course', 'product/base/subject', 'product/base/professor', 'sys/site', 'sys/category', 'sys/code');
    protected $helpers = array();
    protected $_sales_type = '';
    protected $_sales_name = '';
    protected $_search_column = [];
    protected $_group_ccd = ['campus_ccd' => '605', 'pack_type_ccd' => '648'];
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값
    protected $_is_off_site = 'N';
    protected $_is_package = false;
    protected $_is_tzone = false;
    protected $_sess_tzone_prof_idxs = null;
    protected $_limit_start_date = '2019-03-25';    // 검색제한일자

    public function __construct($sales_type, $sales_name, $search_column)
    {
        parent::__construct();

        $this->_sales_type = $sales_type;
        $this->_sales_name = $sales_name;
        $this->_search_column = $search_column;
        $this->_is_off_site = starts_with($this->_sales_type, 'off') === true ? 'Y' : 'N';
        $this->_is_package = strpos(strtolower($this->_sales_type), 'package') === false ? false : true;
        $this->_is_tzone = SUB_DOMAIN == 'tzone' ? true : false;
        $this->_sess_tzone_prof_idxs = $this->session->userdata('admin_prof_idxs');

        if ($this->_is_tzone === true && empty($this->_sess_tzone_prof_idxs) === true) {
            show_alert('연결된 교수정보가 없습니다.', 'back');
        }
    }

    /**
     * 강사매출 인덱스
     */
    protected function index()
    {
        $arr_code = [];
        $arr_code['arr_site_code'] = get_auth_on_off_site_codes($this->_is_off_site, true);
        $def_site_code = key($arr_code['arr_site_code']);

        // 1차 카테고리 조회
        if (in_array('cate_code', $this->_search_column) === true) {
            $arr_code['arr_category'] = $this->categoryModel->getCategoryArray('', '', '', 1);
        }
        // 캠퍼스
        if (in_array('campus_ccd', $this->_search_column) === true) {
            $arr_code['arr_campus'] = $this->siteModel->getSiteCampusArray('');
        }
        // 과정
        if (in_array('course_idx', $this->_search_column) === true) {
            $arr_code['arr_course'] = $this->courseModel->getCourseArray();
        }
        // 과목
        if (in_array('subject_idx', $this->_search_column) === true) {
            $arr_code['arr_subject'] = $this->subjectModel->getSubjectArray();
        }
        // 교수
        if (in_array('prof_idx', $this->_search_column) === true && $this->_is_tzone === false) {
            $arr_code['arr_professor'] = $this->professorModel->getProfessorArray('', '', ['WP.wProfName' => 'asc']);
        }

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, $this->_search_column);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        foreach ($arr_target_group_ccd as $key => $group_ccd) {
            $arr_code['arr_' . $key] = $codes[$group_ccd];
        }

        $this->load->view('profsales/index', array_merge([
            'sales_type' => $this->_sales_type,
            'sales_name' => $this->_sales_name,
            'search_column' => $this->_search_column,
            'def_site_code' => $def_site_code,
            'is_off_site' => $this->_is_off_site,
            'is_package' => $this->_is_package,
            'is_tzone' => $this->_is_tzone,
            'tzone_admin_id' => $this->_getTzoneAdminId(),
            'limit_start_date' => $this->_limit_start_date
        ], $arr_code));
    }

    /**
     * 강사매출 목록 조회
     * @return CI_Output
     */
    protected function listAjax()
    {
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $search_prof_idx = $this->_getProfIdx();
        $count = 0;
        $list = [];
        $sum_data = null;

        if (empty($search_start_date) === false && empty($search_end_date) === false) {
            // tzone > 온라인강좌일 경우 통합 이후 주문내역만 조회 가능
            if ($this->_is_tzone === true && $this->_is_off_site == 'N' && $search_start_date < $this->_limit_start_date) {
                // do nothing
            } else {
                $arr_search_date = [$search_start_date, $search_end_date];
                if ($this->_is_off_site == 'Y') {
                    $arr_search_date[] = $this->_reqP('search_study_date_type');
                }

                $arr_condition = $this->_getListConditions();
                $list = $this->profSalesModel->listProfSales($this->_sales_type, $arr_search_date, $search_prof_idx, false, $arr_condition);

                if (empty($list) === false) {
                    $count = count($list);
                    $list = array_slice($list, $this->_reqP('start'), $this->_reqP('length'));  // 페이지 번호에 맞게 결과배열 추출

                    // 합계 (단강좌/단과반일 경우만 조회)
                    if ($this->_is_package === false) {
                        $sum_data = element('0', $this->profSalesModel->listProfSales($this->_sales_type, $arr_search_date, $search_prof_idx, 'sum', $arr_condition));
                    }
                }
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data
        ]);
    }

    /**
     * 강사매출 목록 엑셀다운로드
     * @param array $headers
     */
    protected function _excel($headers)
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $search_prof_idx = $this->_getProfIdx();

        if (empty($search_start_date) === true || empty($search_end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $arr_search_date = [$search_start_date, $search_end_date];
        if ($this->_is_off_site == 'Y') {
            $arr_search_date[] = $this->_reqP('search_study_date_type');
        }

        $arr_condition = $this->_getListConditions();
        $list = $this->profSalesModel->listProfSales($this->_sales_type, $arr_search_date, $search_prof_idx, 'excel', $arr_condition);
        $file_name = $this->_sales_name . '_강사매출리스트_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $list, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 강사식별자 리턴 (tzone일 경우 로그인 세션 값 리턴)
     * @return mixed
     */
    private function _getProfIdx()
    {
        return $this->_is_tzone === true ? $this->_sess_tzone_prof_idxs : $this->_reqP('search_prof_idx');
    }

    /**
     * 이전 사이트 자동로그인 전용 관리자 아이디 리턴
     * @return string
     */
    private function _getTzoneAdminId()
    {
        if ($this->_is_tzone === true) {
            $this->load->library('Crypto', ['license' => 'Willbes_Tzone']);
            return $this->crypto->encrypt($this->session->userdata('admin_id'));
        }

        return '';
    }

    /**
     * 강사매출 조회 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        if ($this->_is_off_site == 'Y') {
            // 학원 사이트
            $arr_condition = [
                'EQ' => [
                    'TA.SiteCode' => $this->_reqP('search_site_code'),
                    'TA.ProdCode' => $this->_reqP('prod_code'),
                    'TA.CampusCcd' => $this->_reqP('search_campus_ccd'),
                    'TA.CourseIdx' => $this->_reqP('search_course_idx'),
                    'TA.SubjectIdx' => $this->_reqP('search_subject_idx'),
                    'TA.PackTypeCcd' => $this->_reqP('search_pack_type_ccd')
                ],
                'LKR' => [
                    'PC.CateCode' => $this->_reqP('search_cate_code')
                ],
                'IN' => [
                    'TA.SiteCode' => get_auth_site_codes(),  // 사이트 권한 추가
                ],
                'ORG1' => [
                    'EQ' => [
                        'TA.ProdCode' => $this->_reqP('search_prod_value')
                    ],
                    'LKB' => [
                        'TA.ProdName' => $this->_reqP('search_prod_value')
                    ]
                ]
            ];
        } else {
            // 온라인 사이트
            $arr_condition = [
                'EQ' => [
                    'O.SiteCode' => $this->_reqP('search_site_code'),
                    'OP.ProdCode' => $this->_reqP('prod_code'),
                    'PL.CourseIdx' => $this->_reqP('search_course_idx'),
                    'PL.SubjectIdx' => $this->_reqP('search_subject_idx'),
                    'PL.PackTypeCcd' => $this->_reqP('search_pack_type_ccd')
                ],
                'LKR' => [
                    'PC.CateCode' => $this->_reqP('search_cate_code')
                ],
                'IN' => [
                    'O.SiteCode' => get_auth_site_codes(),  // 사이트 권한 추가
                ],
                'ORG1' => [
                    'EQ' => [
                        'OP.ProdCode' => $this->_reqP('search_prod_value')
                    ],
                    'LKB' => [
                        'P.ProdName' => $this->_reqP('search_prod_value')
                    ]
                ]
            ];
        }

        return $arr_condition;
    }

    /**
     * 강사매출 상세보기
     * @param array $params
     */
    protected function show($params = [])
    {
        $site_code = $params[0];
        $prof_idx = $params[1];
        $prod_code = $params[2];
        $pay_status_ccd = element($params[3], $this->profSalesModel->_pay_status_ccd, '');
        $start_date = $params[4];
        $end_date = $params[5];
        $study_date_type = element('6', $params);

        if (empty($prof_idx) === true || empty($prod_code) === true || empty($site_code) === true || empty($start_date) === true || empty($end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // tzone일 경우 세션 교수식별자가 있을 경우만 접근 가능
        if ($this->_is_tzone === true && in_array($prof_idx, $this->_sess_tzone_prof_idxs) === false) {
            show_alert('잘못된 접근입니다.', 'back');
        }

        // tzone > 온라인강좌일 경우 통합 이후 주문내역만 조회 가능
        if ($this->_is_tzone === true && $this->_is_off_site == 'N' && $start_date < $this->_limit_start_date) {
            show_alert($this->_limit_start_date . ' 이전 매출은 조회하실 수 없습니다.', 'back');
        }

        // 상품코드별 매출현황 파라미터 셋팅
        $arr_input = [
            'prof_idx' => $prof_idx,
            'prod_code' => $prod_code,
            'site_code' => $site_code,
            'pay_status_ccd' => $pay_status_ccd,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'study_date_type' => $study_date_type
        ];

        // 상품코드별 매출통계 조회
        $arr_search_date = [$start_date, $end_date];
        if ($this->_is_off_site == 'Y') {
            $arr_search_date[] = $study_date_type;
            $arr_condition = ['EQ' => ['TA.SiteCode' => $site_code, 'TA.ProdCode' => $prod_code]];
        } else {
            $arr_condition = ['EQ' => ['O.SiteCode' => $site_code, 'OP.ProdCode' => $prod_code]];
        }

        $data = element('0', $this->profSalesModel->listProfSales($this->_sales_type, $arr_search_date, $prof_idx, false, $arr_condition));
        if (empty($data) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }

        // 운영사이트 추가
        $data['SiteName'] = element($site_code, get_auth_site_codes(true));

        // 사용하는 코드값 조회
        $group_ccd = $this->profSalesModel->_group_ccd;
        $arr_target_group_ccd = array_filter_keys($group_ccd, ['PayChannel', 'PayRoute', 'PayMethod', 'PayStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제루트 공통코드에서 PG사결제, 학원방문결제, 0원결제, 제휴사결제, 온라인0원결제, 관리자유료결제 코드만 필터링
        $arr_pay_route_ccd = array_filter_keys($codes[$group_ccd['PayRoute']], array_filter_keys($this->profSalesModel->_pay_route_ccd, ['pg', 'visit', 'zero', 'alliance', 'on_zero', 'admin_pay', 'on_zero']));

        // 결제상태 공통코드에서 결제완료, 환불완료 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$group_ccd['PayStatus']], array_filter_keys($this->profSalesModel->_pay_status_ccd, ['paid', 'refund']));

        $this->load->view('profsales/show', [
            'sales_type' => $this->_sales_type,
            'sales_name' => $this->_sales_name,
            'arr_pay_channel_ccd' => $codes[$group_ccd['PayChannel']],
            'arr_pay_route_ccd' => $arr_pay_route_ccd,
            'arr_pay_method_ccd' => $codes[$group_ccd['PayMethod']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'arr_input' => $arr_input,
            'is_off_site' => $this->_is_off_site,
            'is_package' => $this->_is_package,
            'is_tzone' => $this->_is_tzone,
            'data' => $data
        ]);
    }

    /**
     * 강사매출 상세보기 매출목록 조회
     * @return CI_Output
     */
    protected function orderListAjax()
    {
        $site_code = $this->_reqP('site_code');
        $prof_idx = $this->_reqP('prof_idx');
        $prod_code = $this->_reqP('prod_code');

        if ($this->_is_off_site == 'Y') {
            $start_date = $this->_reqP('start_date');
            $end_date = $this->_reqP('end_date');
            $study_date_type = $this->_reqP('study_date_type');
            $arr_search_date = [$start_date, $end_date, $study_date_type];
        } else {
            $start_date = $this->_reqP('search_start_date');
            $end_date = $this->_reqP('search_end_date');
            $arr_search_date = [$start_date, $end_date];
        }

        $list = [];
        $sum_data = null;

        if (empty($prof_idx) === true || empty($prod_code) === true || empty($site_code) === true || empty($start_date) === true || empty($end_date) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $arr_condition = $this->_getOrderListConditions();

        $count = $this->profSalesModel->listProfOrder($this->_sales_type, $arr_search_date, $prof_idx, true, $arr_condition);

        if ($count > 0) {
            $list = $this->profSalesModel->listProfOrder($this->_sales_type, $arr_search_date, $prof_idx, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getOrderListOrderBy());

            // 합계 (단강좌/단과반일 경우만 조회)
            if ($this->_is_package === false) {
                $sum_data = element('0', $this->profSalesModel->listProfOrder($this->_sales_type, $arr_search_date, $prof_idx, 'sum', $arr_condition));
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'sum_data' => $sum_data
        ]);
    }

    /**
     * 강사매출 상세보기 매출목록 엑셀다운로드
     */
    protected function orderListExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $site_code = $this->_reqP('site_code');
        $prof_idx = $this->_reqP('prof_idx');
        $prod_code = $this->_reqP('prod_code');

        if ($this->_is_off_site == 'Y') {
            $start_date = $this->_reqP('start_date');
            $end_date = $this->_reqP('end_date');
            $study_date_type = $this->_reqP('study_date_type');
            $arr_search_date = [$start_date, $end_date, $study_date_type];
        } else {
            $start_date = $this->_reqP('search_start_date');
            $end_date = $this->_reqP('search_end_date');
            $arr_search_date = [$start_date, $end_date];
        }

        if (empty($prof_idx) === true || empty($prod_code) === true || empty($site_code) === true || empty($start_date) === true || empty($end_date) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $headers = ['주문번호', '회원명', '회원아이디', '결제채널', '결제루트', '결제수단', '결제금액', '결제완료일', '환불금액', '환불완료일', '결제상태'];
        $numerics = ['RealPayPrice', 'RefundPrice'];    // 숫자형 변환 대상 컬럼

        $arr_condition = $this->_getOrderListConditions();
        $list = $this->profSalesModel->listProfOrder($this->_sales_type, $arr_search_date, $prof_idx, 'excel', $arr_condition, null, null, $this->_getOrderListOrderBy());
        $last_query = $this->profSalesModel->getLastQuery();
        $file_name = $this->_sales_name . '_강사매출상세_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($list)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers, $numerics) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 강사매출 상세보기 매출목록 조회 조건 리턴
     * @return array
     */
    private function _getOrderListConditions()
    {
        // 공통조건
        $arr_condition = [
            'EQ' => [
                'RR.SiteCode' => $this->_reqP('site_code'),
                'RR.ProdCode' => $this->_reqP('prod_code'),
                'RR.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'RR.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'RR.PayMethodCcd' => $this->_reqP('search_pay_method_ccd')
            ],
            'ORG1' => [
                'LKR' => [
                    'RR.MemIdx' => $this->_reqP('search_member_value'),
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value')
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'RR.OrderIdx' => $this->_reqP('search_prod_value'),
                    'RR.OrderNo' => $this->_reqP('search_prod_value')
                ]
            ]
        ];

        if ($this->_is_off_site == 'Y') {
            // 학원 사이트
            // 결제상태
            $arr_condition['EQ']['RR.PayStatusCcd'] = $this->_reqP('search_pay_status_ccd');

            // 결제일/환불일
            if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
                switch ($this->_reqP('search_date_type')) {
                    case 'paid' :
                        $arr_condition['BDT'] = ['RR.CompleteDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
                        break;
                    case 'refund' :
                        $arr_condition['BDT'] = ['RR.RefundDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
                        break;
                }
            }
        } else {
            // 온라인 사이트
            // 결제상태
            if (empty($this->_reqP('search_pay_status_ccd')) === false) {
                if ($this->_reqP('search_pay_status_ccd') == $this->profSalesModel->_pay_status_ccd['paid']) {
                    $arr_condition['RAW']['RR.RefundPrice is'] = ' null';   // 결제완료
                } else {
                    $arr_condition['RAW']['RR.RefundPrice is'] = ' not null';   // 환불완료
                }
            }
        }

        return $arr_condition;
    }

    /**
     * 강사매출 상세보기 매출목록 정렬조건 리턴
     * @return array
     */
    private function _getOrderListOrderBy()
    {
        return ['OrderIdx' => 'desc', 'OrderProdIdx' => 'asc'];
    }
}
