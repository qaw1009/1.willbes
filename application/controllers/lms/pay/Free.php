<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class Free extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'member/manageMember', 'service/point', 'sys/category', 'product/base/subject', 'product/base/professor', 'sys/code');
    protected $helpers = array();
    private $_list_add_join = array('category', 'subject', 'professor');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 무료강좌신청현황 인덱스
     */
    public function index()
    {
        $arr_category = $this->categoryModel->getCategoryArray('', '', '', 1);  // 1차 카테고리 조회
        $arr_subject = $this->subjectModel->getSubjectArray();
        $arr_professor = $this->professorModel->getProfessorArray();

        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PayChannel', 'PayStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제상태 공통코드에서 무료강좌용 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], array_filter_keys($this->orderListModel->_pay_status_ccd, ['apply', 'cancel']));

        $this->load->view('pay/free/index', [
            'arr_pay_channel_ccd' => $codes[$this->_group_ccd['PayChannel']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'arr_category' => $arr_category,
            'arr_subject' => $arr_subject,
            'arr_professor' => $arr_professor,
            '_pay_status_ccd' => $this->orderListModel->_pay_status_ccd
        ]);
    }

    /**
     * 무료강좌신청현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->orderListModel->listAllOrder(true, $arr_condition, null, null, [], $this->_list_add_join);

        if ($count > 0) {
            $list = $this->orderListModel->listAllOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy(), $this->_list_add_join);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 무료강좌신청현황 조회 조건 리턴 
     * @return array
     */
    private function _getListConditions()
    {
        // 기본조건
        $arr_condition = [
            'EQ' => [
                'P.ProdTypeCcd' => $this->orderListModel->_prod_type_ccd['on_lecture'],
                'PL.LearnPatternCcd' => $this->orderListModel->_learn_pattern_ccd['on_free_lecture'],
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'O.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                'PL.SubjectIdx' => $this->_reqP('search_subject_idx'),
            ],
            'LKR' => [
                'PC.CateCode' => $this->_reqP('search_cate_code')
            ],
            'LKB' => [
                'PPC.ProfIdx_String' => $this->_reqP('search_prof_idx')
            ],
            'IN' => [
                'O.SiteCode' => get_auth_site_codes()   //사이트 권한 추가
            ],
            'ORG1' => [
                'LKR' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value'),
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'O.OrderIdx' => $this->_reqP('search_prod_value'),
                    'O.OrderNo' => $this->_reqP('search_prod_value'),
                    'P.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ],
            ],
        ];

        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));

        switch ($this->_reqP('search_date_type')) {
            case 'cancel' :
                $arr_condition['EQ']['OP.PayStatusCcd'] = $this->orderListModel->_pay_status_ccd['cancel'];
                $arr_condition['BDT'] = ['OP.UpdDatm' => [$search_start_date, $search_end_date]];
                break;
            default :
                $arr_condition['BDT'] = ['O.OrderDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        return $arr_condition;
    }

    /**
     * 무료강좌신청현황 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '직종', '과목', '교수', '무료강좌명', '신청상태', '취소일', '신청일'];

        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, PayChannelCcdName, LgCateName, SubjectName, wProfName_String, OnlyProdName, PayStatusCcdName
            , UpdDatm, OrderDatm';

        $arr_condition = $this->_getListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);
        $last_query = $this->orderListModel->getLastQuery();

        // export excel
        $this->_makeExcel('무료강좌신청현황리스트', $list, $headers, true, $last_query);
    }
}
