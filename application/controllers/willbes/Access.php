<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/access/BaseAccess.php';

class Access extends BaseAccess
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 코드 연동 접속 - 일반적 외부 배너 형태
     * @param array $params
     */
    public function gate($params=[])
    {
        $result_msg = '';
        $return_url = '';
        $gwIdx = element('0',$params);

        if(empty($gwIdx)) {
            show_alert('접속코드가 존재하지 않습니다.', '/');
        }

        $result = $this->accessFModel->saveLog('gw',$gwIdx); //echo ($result['ret_msg']);exit;
        $data =  $this->accessFModel->findContents('gw',$gwIdx); //echo ($result['ret_msg']);exit;

        //var_dump($data);

        if($result !== true) { //오류
            $result_msg = $result['ret_msg'];
        } else {
            if(empty($data)) { //오류
                $result_msg = '코드 등록 정보가 존재하지 않습니다.';
            } else {        // 정상  (GwIdx 세션 생성)
                $return_url = $data['ReturnUrl'];
                $this->session->set_userdata('gw_idx', $gwIdx);         // 접속코드 세션 생성
            }
        }

        // TODO 경고창 띄울것인지 여부 필요 ($result_msg 제거시 경고창 없음)
        $this->load->view('access/access_process',[
            'result_msg' => $result_msg,
            'return_url' => empty($return_url) ? '/' : $return_url
        ]);
    }

    /**
     * ASP 를 위한 업체 연동 접속
     * TODO ASP 관련 기획 문서 정리 후 개발 진행
     * @param array $params
     */
    public function asp($params=[])
    {
        $result_msg = '';
        $return_url = '';
        $compIdx = element('0',$params);
    }

}
