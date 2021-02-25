<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthGive extends \app\controllers\FrontController
{
    protected $models = array('authgive/authGiveF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('apply');

    public function index($params = [])
    {
        if(empty($params) || empty($params['code'])) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $cate_code = $params['cate'];
        $ag_code = $params['code'];

        $arr_condition = [
            'EQ' => ['A.IsUse' => 'Y'],
            'LKB' => $cate_code
        ];

        //강좌인증설정정보
        $data = $this->authGiveFModel->findAuthGive($ag_code, null, $arr_condition);

        if(empty($data)) {
            show_alert('존재하지 않는 인증페이지입니다.', 'back');
        }

        //강좌인증 상품목록
        $data_product = $this->authGiveFModel->listAuthGiveProductByIdx($data['AgIdx']);

        $subject_group = [];
        $subject_prof_group = [];
        $prof_refers = [];
        $product_list = [];
        $is_ess_group = [];     //필수선택그룹

        if(empty($data_product) === false) {

            //결과내 과목 정보
            $subject_group = array_pluck($data_product, 'SubjectName', 'SubjectIdx');

            //결과내 과목별 교수 정보
            $subject_prof_group = array_data_pluck($data_product, ['ProfNickNameAppellation', 'ProfSlogan'], ['SubjectIdx', 'ProfIdx']);

            //결과내 교수별 리퍼 정보
            $prof_refers = array_map(function ($val) {
                return json_decode($val, true);
            }, array_pluck($data_product, 'ProfReferData', 'ProfIdx'));

            foreach ($data_product as $idx => $row) {
                $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
                $product_list[$row['SubjectIdx']][$row['ProfIdx']][] = $row;
                if($row['IsEssential'] === 'Y') {   //필수그룹
                    $is_ess_group[] = $row['GroupNum'];
                }
            }
        }

        //개인신청정보 추출
        $apply_data = null;
        if($this->session->userdata('is_login')) {
            $apply_data = $this->authGiveFModel->findAuthApplyInfo();
        }

        $is_apply = 'Y';    //신청가능여부 - Y : 가능
        $is_apply_msg = '';
        if( (strtotime(date("Y-m-d")) >=  strtotime($data['AuthStartDate']) && strtotime(date("Y-m-d")) <= strtotime($data['AuthEndDate'])) === false) {    //설정일 이내
            $is_apply = 'N';
            $is_apply_msg = '신청기간이 아닙니다.';
        } else {
            if(empty($apply_data) === false) {
                switch ($apply_data['ApplyStatusCcd']) {
                    case '741001' :   //미승인
                        $is_apply = 'N';
                        $is_apply_msg = "신청이 완료되어 승인중인 신청건입니다.";
                        break;
                    case '741002' :   //승인
                        $is_apply = 'N';
                        $is_apply_msg = "이미 승인 완료된 신청건입니다.";
                        break;
                }
            }
        }

        $this->load->view('site/auth_give/' . $data['SiteCode'] .'/'. $ag_code, [
            'data' => $data,
            'data_product' => [
                'subject' => $subject_group,
                'prof_name' => $subject_prof_group,
                'prof_refer' => $prof_refers,
                'product_list' => $product_list,
                'ess_group' => array_values(array_unique($is_ess_group)),
            ],
            'is_apply' => $is_apply,
            'is_apply_msg' => $is_apply_msg,
        ]);
    }

    /**
     * 신청처리
     */
    public function apply()
    {
        $rules = [
            ['field'=>'ag_idx', 'label' => '인증코드', 'rules' => 'trim|required'],
            ['field'=>'phone', 'label' => '연락처', 'rules' => 'trim|required'],
            ['field'=>'affiliation', 'label' => '대학교/학부', 'rules' => 'trim|required'],
            ['field'=>'app_prod_code[]', 'label' => '강좌 선택', 'rules' => 'trim|required'],
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->authGiveFModel->addAuthApply($this->_reqP(null));
        $this->json_result($result['ret_cd'], $result['ret_msg'], $result);
    }

}