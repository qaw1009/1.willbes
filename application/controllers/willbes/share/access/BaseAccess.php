<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseAccess extends \app\controllers\FrontController
{
    protected $models = array('access/accessF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 외부 접속
     * @param array $params
     */
    public function gate($params=[])
    {
        $gwIdx = element('0',$params);
        if(empty($gwIdx)) {
            header('Location: /');exit();
        }
        $this->load->view('access/access_process',[
            'gwIdx' => $gwIdx,
        ]);
    }

    /**
     * 외부 접속 로그 저장
     * @param array $params
     * @return CI_Output
     */
    public function gateSave($params = [])
    {
        $result_msg = null;
        $move_url = '/';

        $arr_input = $this->_reqG(null);
        $gwIdx = element('gwIdx', $arr_input);

        $data =  $this->accessFModel->findContents('gw', $gwIdx);

        if(empty($data)) {
            $result_msg = '접속코드 등록 정보가 존재하지 않습니다.';
        } else {
            $move_url = $data['MoveUrl'];
            $this->session->set_userdata('gw_idx', $gwIdx);         // 접속코드 세션 생성
        }

        $result = $this->accessFModel->saveLog('gw', $gwIdx, $result_msg, $arr_input);

        if($result !== true) {
            $result_msg = $result['ret_msg'];
        }
        return $this->json_result(true, $result_msg, [], $move_url);
    }

    /**
     * Btob 제휴사 연동 접속
     * TODO : Btob 관련 기획 문서 정리 후 개발 진행
     * @param array $params
     * @return object|string
     */
    public function btob($params=[])
    {
        $result_msg = '';
        $return_url = '';
        $btobIdx = element('0',$params);

        /* 제휴사 코드가  없을경우*/
        if(empty($btobIdx)) {
            return $this->load->view('access/access_process',[
                'conn_type' => 'btob',
                'result_msg' => '',
                'return_url' =>  '/'
            ]);
        }

        $result = $this->accessFModel->saveLog('btob',$btobIdx);
        $data =  $this->accessFModel->findContents('btob',$btobIdx);

        if($result !== true) { //오류
            $result_msg = $result['ret_msg'];
        } else {
            if(empty($data)) { //오류
                $result_msg = '제휴사 정보가 존재하지 않습니다.';
            } else {        // 정상  (BtobIdx 세션 생성)
                $btob_arr = [
                    'btob_idx' => $btobIdx                                  // 제휴사코드 세션 생성
                    ,'btob_ctrl' => $data['IpControlTypeCcds']       // 제휴사 제어코드 세션 생성
                ];

                $return_url = $data['ReturnUrl'];
                $this->session->set_userdata('btob',$btob_arr);
            }
        }

        return $this->load->view('access/access_process',[
            'conn_type' => 'btob',
            'result_msg' => $result_msg,
            'return_url' => empty($return_url) ? '/' : $return_url
        ]);
    }

    /**
     * 실시간 방문자 접속
     * @param array $params
     * @return CI_Output
     */
    public function visitor($params = [])
    {
        $arr_input = $this->_reqG(null);
        $sess_sess_id = $this->session->userdata('make_sessionid');
        $referer = $this->input->server('HTTP_REFERER');
        $ck_tms_name = 'visitor_tms';
        $ck_tms_ttl = 600;  // 10분

        // 필수 파라미터 체크
        if (empty($sess_sess_id) === true) {
            return $this->json_error('잘못된 접근입니다.[1]');
        }
        if (empty($referer) === true || strpos($referer, config_item('base_domain')) === false) {
            return $this->json_error('잘못된 접근입니다.[2]');     // 외부부정접근방지
        }

        // 방문자 접근시간 쿠키 체크 (방문자 접근시간이 ttl값(10분) 이상 경과했을 경우만 정보 저장)
        $ck_tms_val = get_cookie($ck_tms_name);
        if (empty($ck_tms_val) === false && (time() - $ck_tms_val) < $ck_tms_ttl) {
            return $this->json_result(true);
        }

        // 방문자 정보 저장
        $result = $this->accessFModel->saveVisitor($arr_input);
        if ($result !== true) {
            return $this->json_error($result['ret_msg']);
        }

        // 방문자 접근시간 쿠키 생성
        set_cookie($ck_tms_name, time(), $ck_tms_ttl);

        return $this->json_result(true);
    }
}
