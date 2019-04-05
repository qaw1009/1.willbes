<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseAccess extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $models = array('access/accessF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    /**
     * TODO 접속 확인용 메소드 : 2019.4.5 특정IP의 서버 접속 오류 확인을 위한 메소드
     */
    public function conn_check()
    {
        $info = '<p><b><font size="4">'.$_SERVER["HTTP_HOST"].'</font></b></p>';
        $info .= '<P>'. $_SERVER["SERVER_ADDR"].'</p>';
        $info .= '<p>'. $_SERVER["REMOTE_ADDR"].'</p>';
        echo $info;
    }

    /**
     * 외부 배너 연동 접속 - 일반적 외부 배너 형태
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
            'conn_type' => 'gw',
            'result_msg' => $result_msg,
            'return_url' => empty($return_url) ? '/' : $return_url
        ]);
    }

    /**
     * Btob 제휴사 연동 접속
     * TODO Btob 관련 기획 문서 정리 후 개발 진행
     * @param array $params
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

        $result = $this->accessFModel->saveLog('btob',$btobIdx); //echo ($result['ret_msg']);exit;
        $data =  $this->accessFModel->findContents('btob',$btobIdx); //echo ($result['ret_msg']);exit;

        //var_dump($data);

        //echo var_dump($this->session->userdata(null));exit;
        //echo var_dump(config_app(null));exit;

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

        //echo var_dump($this->session->userdata(null));

        $this->load->view('access/access_process',[
            'conn_type' => 'btob',
            'result_msg' => $result_msg,
            'return_url' => empty($return_url) ? '/' : $return_url
        ]);

    }

}