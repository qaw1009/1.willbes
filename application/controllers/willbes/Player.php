<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends \app\controllers\FrontController
{
    protected $models = array('playerF', 'product/productF', 'product/professorF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_profReferDataName = [
        'OT' => 'ot_url',
        'WS' => 'wsample_url',
        'S1' => 'sample_url1',
        'S2' => 'sample_url2',
        'S3' => 'sample_url3'
    ];

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 일반 강좌 수강 플레이어
     */
    public function index()
    {
        $orderIdx = $this->_req('o');
        $prodCode = $this->_req('p');
        $subProdCode = $this->_req('sp');
        $unitItx = $this->_req('u');
        $quility = $this->_req('q');

        $this->load->view('/player/normal', [

        ]);
    }




    /**
     * 샘플강의 보기
     * @param array $params
     */
    public function Sample($params = [])
    {
        if(empty($params[0]) === true || empty($params[1]) === true || empty($params[2]) === true ){
            show_alert('파라미터가 잘못 되었습니다.1', 'close');
        }

        $prodCode = $params[0];
        $unitIdx = $params[1];
        $quility = $params[2];

        if($this->session->get_userdata('is_login') === true){
            $MemId = $this->session->userdata('mem_id');
        } else {
            $MemId = "ANOMYNOUS";
        }

        if(empty($quility) === true){
            $quility = 'WD';
        }

        $data = $this->playerFModel->getLectureSample($prodCode, $unitIdx);

        if(empty($data) === true){
            show_alert('샘플강좌가 없습니다.', 'close');
        }

        switch($quility){
            case 'WD':
                $filename = $data['wWD'];
                $ratio = 21; // 초 와이드는 고정
                break;

            case 'HD':
                $filename = $data['wHD'];
                $ratio = $data['wRatio']; // 고화질은 설정한 비율
                break;

            case 'SD':
                $filename = $data['wSD'];
                $ratio = $data['wRatio']; // 저화질도 설정한 비율
                break;

            default:
                $filename = $data['wWD'];
                $ratio = 21; // 초 와이드는 고정
                break;
        }

        // 동영상 경로가 없을때 다른 경로로 재생
        if(empty($filename) === true){
            $filename = $data['wWD'];
            $ratio = 21;
        }
        if(empty($filename) === true){
            $filename = $data['wHD'];
            $ratio = $data['wRatio'];
        }
        if(empty($filename) === true){
            $filename = $data['wSD'];
            $ratio = $data['wRatio'];
        }

        // 모든 경로가 존재 없을때
        if(empty($filename) === true){
            show_alert('샘플파일이 없습니다.', 'close');
        }

        $url = $this->clearUrl($data['wMediaUrl'].'/'.$filename);

        $this->load->view('/player/sample', [
            'data' => [
                'isIntro' => false,
                'ratio' => $ratio,
                'startPosition' => 0,
                'url' => $url,
                'memid' => $MemId
            ]
        ]);
    }




    /**
     * 강사 샘플보기
     * @param array $params
     */
    public function Professor($params = [])
    {
        if(empty($params[0]) === true || empty($params[1]) === true){
            show_alert('파라미터가 잘못 되었습니다.', 'close');
        }

        $profIdx = $params[0];
        $viewType = $params[1];

        if($this->session->get_userdata('is_login') === true){
            $MemId = $this->session->userdata('mem_id');
        } else {
            $MemId = "ANOMYNOUS";
        }

        if(empty($this->_profReferDataName[$viewType]) === true){
            show_alert('파라미터가 잘못되었습니다.','close');
        }

        $viewType = $this->_profReferDataName[$viewType];

        $data = $this->professorFModel->findProfessorByProfIdx($profIdx, true);
        if(empty($data) === true){
            show_alert('해당 강사를 찾을수 없습니다.', 'close');
        }

        $profRefer = $data['ProfReferData'] == 'N' ? [] : json_decode($data['ProfReferData'], true);
        if(empty($profRefer) === true){
            show_alert('맛보기 강좌가 없습니다.', 'close');
        }

        if(empty($profRefer[$viewType]) === true){
            show_alert('맛보기 강좌가 없습니다.', 'close');
        }

        $url = $this->clearUrl($profRefer[$viewType]);

        if(empty($url) === true){
            show_alert('샘플강의가 없습니다.', 'close');
        }

        $this->load->view('/player/professor', [
            'data' => [
                'isIntro' => false,
                'ratio' => 12,
                'startPosition' => 0,
                'url' => $url,
                'memid' => $MemId
            ]
        ]);
    }




    /**
     * 플레이어 우측 회차 목록 보기
     */
    public function Curriculum($params = [])
    {

    }

    /**
     * 플레이어 우측 북마크
     */
    public function listBookmark($params = [])
    {

    }

    public function storeBookmark()
    {

    }

    public function deleteBookmark()
    {

    }

    /** URL 에서 // 를 제거하기 위해서
     * @param $str
     * @return string
     */
    private function clearUrl($str)
    {
        $protocol_arr = ['mms://', 'http://', 'https://'];
        $protocol = '';
        $i = 0;

        // 앞에 protocol 제거 하고 저장
        foreach($protocol_arr as $key){
            $str = str_replace($key, '', $str, $i);
            if($i > 0){
                $protocol = $key;
                break;
            }
        }

        // 프로코톨이 겁색이 안되었을경우 기본 http로 설정
        if($protocol == ""){
            $protocol = 'http://';
        }

        // 공백제거
        $str = str_replace(' ', '', $str, $i);

        do {
            $str = str_replace('//', '/', $str, $i);
        } while($i > 0);

        return $protocol.$str;
    }

}