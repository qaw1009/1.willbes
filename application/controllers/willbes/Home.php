<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('dDayF', 'support/supportBoardF', 'memberF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메인 페이지
     * @return mixed
     */
    public function index()
    {
        // 모바일 리다이렉트
        $this->_redirectMobile();

        $data = [];

        // APP 토큰 체크
        if($this->_is_app === true){
            $this->_checkAppToken();
        }

        if (APP_DEVICE == 'pc') {
            // 시험일정 조회 (디데이)
            $data['dday'] = $this->dDayFModel->getDDays();
            
            // NOW 윌비스
            $column = 'b.BoardIdx, b.Title, b.IsBest, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
            $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
            $arr_condition = ['EQ' => ['b.BmIdx' => 45, 'b.SiteCode' => $this->_site_code, 'b.IsUse' => 'Y']];
            $data['notice'] = $this->supportBoardFModel->listBoard(false, $arr_condition, '', $column, 6, 0, $order_by);
        }

        return $this->load->view('main', [
            'data' => $data,
            'is_site_home' => true
        ]);
    }

    /**
     * APP 토큰 체크
     */
    private function _checkAppToken()
    {
        $token = $this->_req('token');

        if(empty($token) == false){
            // 토큰이 있으면
            $this->load->library('Jwt');

            if($this->jwt->verify($token) == true){
                // 토큰이 정상일때
                $tokenArr = $this->jwt->getClaims($token);

                if($this->session->userdata('is_login') == true && $this->session->userdata('mem_idx') == $tokenArr['USER_IDX']){
                    // 이미 로그인중이고 토큰데이타와 동일하면 그냥 내강의실로
                    //logger('이미 로그인중이고 토큰데이타와 동일하면 그냥 내강의실로');
                    redirect(front_url('/classroom/on/list/ongoing'));
                }
                //logger('token:'.$token);
                //logger('토큰로그인준비');
                $data = $this->memberFModel->getMember(false, [ 'EQ' => ['Mem.MemIdx' => $tokenArr['USER_IDX'] ]]);
                //logger('사용자정보구해옴');

                // 넘어온 토큰데이타로 로그인처리
                if($this->memberFModel->storeMemberLogin($data, 'TOKEN') == true){
                    // 로그인성공
                    //logger('토큰로그인 성공');
                    redirect(front_url('/classroom/on/list/ongoing'));
                } else {
                    // 로그인 실패시 세션 파괴
                    //logger('로그인 실패 세션 파괴');
                    $this->session->sess_destroy();
                }
            } else {
                // 토큰값이 정상이 아닐때 세션 파괴
                //logger('토큰 정상아님 세션 파괴');
                $this->session->sess_destroy();
            }
        } else {
            // 토큰이 없으면 세션 파괴
            //logger('토큰값이 안넘어 왔기 때문에 세션 파괴');
            $this->session->sess_destroy();
        }

        // 기본 내강의실로 이동
        redirect(front_url('/classroom/on/list/ongoing'));
    }

    /**
     * 뷰 페이지 확인
     */
    public function html()
    {
        $view_file = explode('/', uri_string(), 3)[2];
        $view_file = 'html/' . $view_file;

        $this->load->view($view_file, [], false);
    }
}
