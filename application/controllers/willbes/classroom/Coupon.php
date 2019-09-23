<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends \app\controllers\FrontController
{
    protected $models = array('couponF', '_lms/sys/siteGroup');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        // 탭
        $coupon_type = element('tab', $arr_input, 'coupon');
        $valid_type = element('stab', $arr_input, 'available');

        // 디폴트 주문일자
        if (isset($arr_input['search_start_date']) === false) {
            $arr_input['search_end_date'] = date('Y-m-d');
            $arr_input['search_start_date'] = date('Y-m-d', strtotime($arr_input['search_end_date'] . ' -1 month'));
        }

        // 사이트그룹 코드 조회
        $arr_site_group = $this->siteGroupModel->getSiteGroupArray(false);

        // 조회 조건, 정렬 설정 조회
        $arr_condition_orderby = $this->_getConditionOrderBy($arr_input, $coupon_type, $valid_type);

        // 목록 조회
        $list = [];
        $count = $this->couponFModel->listMemberCoupon(true, $arr_condition_orderby['condition'], null, null, [], true);
        $paging = $this->pagination('/classroom/coupon/index?' . http_build_query($arr_input), $count, 10, 10,true);

        if ($count > 0) {
            $list = $this->couponFModel->listMemberCoupon(false, $arr_condition_orderby['condition'], $paging['limit'], $paging['offset'], $arr_condition_orderby['orderby'], true);
        }

        $available_coupon_cnt = $expiring_coupon_cnt = 0;
        if ($coupon_type == 'coupon') {
            // 사용가능한 쿠폰
            $arr_condition_orderby = $this->_getConditionOrderBy([], 'coupon', 'available');
            $available_coupon_cnt = $this->couponFModel->listMemberCoupon(true, $arr_condition_orderby['condition']);

            // 당월소멸예정 쿠폰
            $arr_condition_orderby = $this->_getConditionOrderBy([], 'coupon', 'expiring');
            $expiring_coupon_cnt = $this->couponFModel->listMemberCoupon(true, $arr_condition_orderby['condition']);
        }

        $this->load->view('/classroom/coupon/index', [
            'tab' => $coupon_type,
            'stab' => $valid_type,
            'arr_input' => $arr_input,
            'arr_site_group' => $arr_site_group,
            'available_coupon_cnt' => $available_coupon_cnt,
            'expiring_coupon_cnt' => $expiring_coupon_cnt,
            'paging' => $paging,
            'data' => $list
        ]);
    }

    /**
     * 쿠폰 조회 조건 리턴
     * @param array $arr_input [입력 값]
     * @param string $coupon_type [쿠폰유형, 할인권 : coupon, 수강권 : voucher]
     * @param string|null $valid_type [쿠폰구분, 보유쿠폰 : available, 사용/만료쿠폰 : used, 소멸예정 : expiring)
     * @return array
     */
    private function _getConditionOrderBy($arr_input, $coupon_type, $valid_type = null)
    {
        $date_column = ['issue' => 'CD.IssueDatm', 'expire' => 'CD.ExpireDatm'];
        $date_orderby = ['issue' => ['CD.CdIdx' => 'desc'], 'expire' => ['CD.ExpireDatm' => 'asc']];
        $search_date_type = element('search_date_type', $arr_input, 'issue');
        $order_date_type = element('order_date_type', $arr_input, 'issue');
        $valid_status = element('valid_status', $arr_input);

        // 기본 조건
        $arr_condition = [
            'EQ' => [
                'C.CouponTypeCcd' => $this->couponFModel->_coupon_type_ccd[$coupon_type],
                'S.SiteGroupCode' => element('site_group', $arr_input)
            ],
            'BDT' => [
                $date_column[$search_date_type] => [element('search_start_date', $arr_input), element('search_end_date', $arr_input)]
            ]
        ];
        
        if ($coupon_type == 'coupon' && $valid_type == 'used') {
            // 사용/만료 쿠폰
            $arr_condition = array_merge_recursive($arr_condition, [
                'RAW' => ['(CD.IsUse = ' => '"Y" or (NOW() > CD.ExpireDatm and CD.ValidStatus = "Y" and CD.IsUse = "N") or CD.ValidStatus != "Y")']
            ]);

            // 쿠폰상태
            if ($valid_status == 'expire') {
                $arr_condition = array_merge_recursive($arr_condition, ['RAW' => ['NOW() > ' => 'CD.ExpireDatm and CD.ValidStatus = "Y" and CD.IsUse = "N"']]);
            } elseif ($valid_status == 'used') {
                $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['CD.IsUse' => 'Y']]);
            }
        } else {
            $arr_condition = array_merge_recursive($arr_condition, [
                'EQ' => [
                    'CD.ValidStatus' => 'Y',
                    'CD.IsUse' => ($coupon_type == 'coupon' ? 'N' : 'Y')    // 수강권일 경우 등록과 동시에 사용처리됨
                ],
                'RAW' => [
                    'NOW() between ' => 'CD.IssueDatm and CD.ExpireDatm'
                ]
            ]);

            // 당월 소멸예정 쿠폰
            if ($coupon_type == 'coupon' && $valid_type == 'expiring') {
                $arr_condition = array_merge_recursive($arr_condition, [
                    'BDT' => ['CD.ExpireDatm' => [date('Y-m-01'), date('Y-m-t')]]
                ]);
            }
        }

        return [
            'condition' => $arr_condition,
            'orderby' => $date_orderby[$order_date_type]
        ];
    }

    /**
     * 쿠폰 등록
     * @param array $params
     */
    public function store($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'coupon_type', 'label' => '쿠폰타입', 'rules' => 'trim|required|in_list[coupon,voucher]'],
            ['field' => 'coupon_no', 'label' => '쿠폰번호', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->couponFModel->addMemberCouponByPin($this->_reqP('coupon_type'), $this->_reqP('coupon_no'));

        $this->json_result($result, '쿠폰이 등록되었습니다.', $result);
    }
}
