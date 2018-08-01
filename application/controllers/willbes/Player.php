<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends \app\controllers\FrontController
{
    protected $models = array('playerF', 'product/productF', 'product/professorF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 기본페이지?
     */
    public function index()
    {
        $this->load->view('/player/normal', [

        ]);
    }

    /**
     * 샘플강의 보기
     * @param array $params
     */
    public function Sample($params = [])
    {
        if(empty($params[0]) === true || empty($params[1] === true)){
            show_alert('파라미터가 잘못 되었습니다.');
        }

        $prodCode = $params[0];
        $unitIdx = $params[1];
        $quility = $params[2];

        if(empty($quility) === true){
            $quility = 'WD';
        }

        $data = $this->playerFModel->getLectureSample($prodCode, $unitIdx);

        if(empty($data) === true){
            show_alert('샘플강좌가 없습니다.', 'close');
        }

        switch($quility){
            case 'WD':
                $url = $data['wWD'];
                break;

            case 'HD':
                $url = $data['wSD'];
                break;

            case 'SD':
                $url = $data['wSD'];
                break;

            default:
                $url = $data['wWD'];
                break;
        }

        if(empty($url) === true){
            $url = $data['wWD'];
        }
        if(empty($url) === true){
            $url = $data['wHD'];
        }
        if(empty($url) === true){
            $url = $data['wSD'];
        }

        $url = 'http://hd.willbes.gscdn.com/Noryangjin/2018_06/bubwon/leehyunna_korean_dk/lhn44_11_0726_korean_dk_1.mp4';

        if(empty($url) === true){
            show_alert('샘플파일이 없습니다.', 'close');
        }

        $this->load->view('/player/sample', [
            'data' => [
                'isIntro' => false,
                'url' => $url
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
        $sampleType = $params[1];

        $data = $this->professorFModel->findProfessorByProfIdx($profIdx, true);
        if(empty($data) === true){
            show_alert('해당 교수를 찾을수 없습니다.', 'close');
        }

        $url = $data['wSampleUrl'];

        if(empty($url) === true){
            show_alert('샘플강의가 없습니다.', 'close');
        }

        $this->load->view('/player/sample', [
            'data' => [
                'isIntro' => false,
                'url' => $url
            ]
        ]);
    }

    /**
     * 무료강의 보기
     * @param array $params
     */
    public function free($params = [])
    {
        $this->load->view('/player/free', [

        ]);
    }

    /**
     * 강좌 상세목록
     */
    public function listCurriculum($params = [])
    {
        
    }

    /**
     * 북마크
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

}