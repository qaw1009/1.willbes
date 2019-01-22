<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('dDayF', 'memberF');
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
        // 앱일경우 토큰을 얻어서
        if($this->_is_app === true){
            $token = $this->_req('token');

            if(empty($token) == false){
                // 토큰이 있으면
                $this->load->library('Jwt');

                if($this->jwt->verify($token) == true){
                    // 토큰이 정상일때
                    $tokenArr = $this->jwt->getClaims($token);

                    $data = [
                        'MemIdx' => $tokenArr['USER_IDX']
                    ];
                    
                    if($this->session->userdata('is_login') == true && $this->session->userdata('mem_idx') == $tokenArr['USER_IDX']){
                        // 이미 로그인중이고 토큰데이타와 동일하면 그냥 내강의실로
                        logger('이미 로그인중이고 토큰데이타와 동일하면 그냥 내강의실로');
                        redirect(front_url('/classroom/on/list/ongoing'));
                    }

                    $data = $this->memberFModel->getMember(false, ['MemIdx' => $data['MemIdx']]);

                    // 넘어온 토큰데이타로 로그인처리
                    if($this->memberFModel->storeMemberLogin($data, 'TOKEN') == true){
                        // 로그인성공
                        logger('토큰로그인 성공');
                        redirect(front_url('/classroom/on/list/ongoing'));
                    } else {
                        // 로그인 실패시 세션 파괴
                        logger('로그인 실패 세션 파괴');
                        $this->session->sess_destroy();
                    }
                    
                } else {
                    // 토큰값이 정상이 아닐때 세션 파괴
                    logger('토큰 정상아님 세션 파괴');
                    $this->session->sess_destroy();
                }
                
            } else {
                // 토큰이 없으면 세션 파괴
                logger('토큰값이 안넘어 왔기 때문에 세션 파괴');
                $this->session->sess_destroy();
            }

            // 기본 내강의실로 이동
            redirect(front_url('/classroom/on/list/ongoing'));
        }

        // 시험일정 조회 (디데이)
        $data['dday'] = $this->dDayFModel->getDDays();

        return $this->load->view('main', [
            'data' => $data
        ]);
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
