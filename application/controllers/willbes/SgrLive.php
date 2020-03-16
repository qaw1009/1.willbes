<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SgrLive extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
//    protected $auth_controller = false;
//    protected $auth_methods = array('memberAuth');

    private $_sgr_client_id = '6200947261b84a6ebbf340d88f4840f6';   //유출 주의
    private $_sgr_api_domain = '//api.sgrsoft.com';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('restClient');
        //$this->restclient->ssl(false);
    }

    public function index()
    {
    }

    /**
     * 라이브 상태 확인 및 플레이어 정보 받아오기
     * @return mixed
     */
    public function lecPlayer()
    {
        $prod_code = $this->_req('prod_code');
        if(empty($prod_code) === true) {
            return $this->json_error('상품코드가 없습니다.');
        }
        // TODO 라이브 상품코드로 라이브 lec_no 조회
        $lec_no = '15';

        $req_param = [
            'client_id' => $this->_sgr_client_id,
            'type' => 'live',
            'lec_no' => $lec_no
        ];
        $data = $this->restclient->get($this->_sgr_api_domain.'/v1/post/list/lec_players', $req_param, 'json', false);

        //$this->restclient->debug();
        return $this->response($data);
    }

    /**
     * 사이트 회원번호와 아이디를 이용하여 시청자 권한 부여
     * @return mixed
     */
    public function authMember()
    {
        if ($this->isLogin() !== true) {
            return $this->json_error('로그인 후 이용 가능합니다.');
        }

        $prod_code = $this->_req('prod_code');
        if(empty($prod_code) === true) {
            return $this->json_error('상품코드가 없습니다.');
        }

        // TODO 해당 라이브 상품 구매여부 체크
        $product_buy = true;
        if($product_buy === false) {
            return $this->json_error('라이브방송 상품 구매 후 이용 가능합니다.');
        }

        $req_param = [
            'client_id' => $this->_sgr_client_id,
            'member_no' => $this->session->userdata('mem_idx'),
            'nickname' => '수강생',         // TODO
            'userid' => $this->session->userdata('mem_id'),
            'order_code' => 'test001',      // TODO
        ];
        $data = $this->restclient->get($this->_sgr_api_domain.'/v1/member/auth', $req_param, 'json', false);

        //$this->restclient->debug();
        return $this->response($data);
    }
}
