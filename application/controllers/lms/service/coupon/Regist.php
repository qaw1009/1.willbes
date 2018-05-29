<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/category', 'product/base/course', 'product/base/subject', 'product/base/professor', 'service/couponRegist');
    protected $helpers = array();
    private $_ccd = [
        'CouponType' => '644',
        'ApplyType' => '645',
        'LecType' => '646',
        'IssueType' => '647'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 쿠폰등록/발급 인덱스
     */
    public function index()
    {
        // 카테고리 조회
        $category_data = $this->categoryModel->getCategoryArray('', '', '', 1);

        // 쿠폰유형, 쿠폰적용구분, 쿠폰상세적용구분 코드 조회
        $codes = $this->_getCodes([$this->_ccd['ApplyType'], $this->_ccd['LecType']]);

        $this->load->view('service/coupon/index', [
            'arr_cate_code' => $category_data,
            'arr_apply_type_ccd' => $codes[$this->_ccd['ApplyType']],
            'arr_lec_type_ccd' => $codes[$this->_ccd['LecType']]
        ]);
    }

    /**
     * 쿠폰등록/발급 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_reqP('search_site_code'),
                'DeployType' => $this->_reqP('search_deploy_type'),
                'ApplyTypeCcd' => $this->_reqP('search_apply_type_ccd'),
                'LecTypeCcd' => $this->_reqP('search_lec_type_ccd'),
                'ApplyRangeType' => $this->_reqP('search_apply_range_type'),
                'IsIssue' => $this->_reqP('search_is_issue'),
                'IssueValid' => $this->_reqP('search_issue_valid'),
            ],
            'LKB' => [
                'CateCodes' => $this->_reqP('search_cate_code')
            ],
            'ORG1' => [
                'LKB' => [
                    'CouponIdx' => $this->_reqP('search_value'),
                    'CouponName' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'I') {
            // 유효기간 검색
            $arr_condition['ORG2']['BET'] = [
                'IssueStartDate' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                'IssueEndDate' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
            ];
        } elseif ($this->_reqP('search_date_type') == 'R') {
            // 등록일 기간 검색
            $arr_condition['BDT'] = ['RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        $list = [];
        $count = $this->couponRegistModel->listAllCoupon(true, $arr_condition);

        if ($count > 0) {
            $list = $this->couponRegistModel->listAllCoupon(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CouponIdx' => 'desc']);

            // 쿠폰유형, 쿠폰적용구분, 쿠폰상세적용구분 코드 조회
            $codes = $this->_getCodes([$this->_ccd['ApplyType'], $this->_ccd['LecType']]);

            $list = array_map(function ($row) use ($codes) {
                // 적용구분
                $row['ApplyTypeName'] = $codes[$this->_ccd['ApplyType']][$row['ApplyTypeCcd']][0];

                // 적용상세구분
                $row['LecTypeNames'] = '';
                foreach (explode(',', $row['LecTypeCcds']) as $lec_type_ccd) {
                    $row['LecTypeNames'] .= ',' . $codes[$this->_ccd['LecType']][$lec_type_ccd][0];
                }
                $row['LecTypeNames'] = substr($row['LecTypeNames'], 1);

                return $row;
            }, $list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 쿠폰 등록/수정폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->couponRegistModel->findCouponForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 쿠폰상세적용구분
            $data['LecTypeCcds'] = explode(',', $data['LecTypeCcds']);

            // 카테고리 연결 데이터 조회
            $data['CateNames'] = implode(', ', $this->couponRegistModel->listCouponCategory($idx));
        }

        // 쿠폰유형, 쿠폰적용구분, 쿠폰상세적용구분 코드 조회
        $codes = $this->_getCodes([$this->_ccd['CouponType'], $this->_ccd['ApplyType'], $this->_ccd['LecType']]);

        // 과정, 과목, 교수 조회
        $arr_course = $this->courseModel->getCourseArray();
        $arr_subject = $this->subjectModel->getSubjectArray();
        $arr_professor = $this->professorModel->getProfessorArray();

        $this->load->view('service/coupon/create', [
            'idx' => $idx,
            'method' => $method,
            'data' => $data,
            'arr_coupon_type_ccd' => $codes[$this->_ccd['CouponType']],
            'arr_apply_type_ccd' => $codes[$this->_ccd['ApplyType']],
            'arr_lec_type_ccd' => $codes[$this->_ccd['LecType']],
            'arr_course' => $arr_course,
            'arr_subject' => $arr_subject,
            'arr_professor' => $arr_professor,
        ]);
    }

    /**
     * 쿠폰 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'coupon_name', 'label' => '쿠폰명', 'rules' => 'trim|required'],
            ['field' => 'issue_start_date', 'label' => '유효시작일자', 'rules' => 'trim|required'],
            ['field' => 'issue_end_date', 'label' => '유효종료일자', 'rules' => 'trim|required'],
            ['field' => 'valid_day', 'label' => '사용기간', 'rules' => 'trim|required|integer'],
            ['field' => 'is_issue', 'label' => '발급여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
                ['field' => 'cate_code[]', 'label' => '카테고리 선택', 'rules' => 'trim|required'],
                ['field' => 'deploy_type', 'label' => '쿠폰배포루트', 'rules' => 'trim|required|in_list[N,F]'],
                ['field' => 'coupon_type_ccd', 'label' => '쿠폰유형', 'rules' => 'trim|required'],
                ['field' => 'pin_type', 'label' => '쿠폰핀번호유형', 'rules' => 'trim|required|in_list[S,R]'],
                ['field' => 'issue_cnt', 'label' => '발급개수', 'rules' => 'trim|required|integer'],
                ['field' => 'apply_type_ccd', 'label' => '쿠폰적용구분', 'rules' => 'trim|required'],
                ['field' => 'lec_type_ccd[]', 'label' => '쿠폰상세구분', 'rules' => 'callback_validateRequiredIf[apply_type_ccd,645001,645002,645003,645004]'],
                ['field' => 'apply_school_year', 'label' => '대비학년도', 'rules' => 'callback_validateRequiredIf[apply_range_type,I]|integer'],
                ['field' => 'prod_code', 'label' => '상품선택', 'rules' => 'callback_validateRequiredIf[apply_range_type,P]|integer'],
                ['field' => 'mock_exam_idx', 'label' => '모의고사선택', 'rules' => 'callback_validateRequiredIf[apply_type_ccd,645007]|integer'],
                ['field' => 'disc_rate', 'label' => '할인율', 'rules' => 'trim|required|integer'],
                ['field' => 'disc_type', 'label' => '할인구분', 'rules' => 'trim|required|in_list[R,P]'],
                ['field' => 'disc_allow_price', 'label' => '할인허용가능금액', 'rules' => 'trim|required|integer'],
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->couponRegistModel->{$method . 'Coupon'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 사용하는 코드 정제 후 리턴
     * @param array $group_ccds
     * @return array
     */
    private function _getCodes($group_ccds = [])
    {
        $codes = $this->codeModel->getCcdInArray($group_ccds, 'CcdEtc');
        $_codes = [];
        foreach ($codes as $group_code => $arr_code) {
            foreach ($arr_code as $key => $val) {
                switch ($group_code) {
                    case $this->_ccd['ApplyType'] :
                    case $this->_ccd['LecType'] :
                        $_codes[$group_code][$key] = [str_first_pos_before($val, ':'), str_first_pos_after($val, ':')];
                        break;
                    default :
                        $_codes[$group_code][$key] = str_first_pos_before($val, ':');
                        break;
                }
            }
        }
        
        return $_codes;
    }
}
