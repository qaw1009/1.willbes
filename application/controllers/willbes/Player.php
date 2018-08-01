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
        if(empty($params[0]) === true || empty($params[1]) === true || empty($params[2]) === true ){
            show_alert('파라미터가 잘못 되었습니다.1', 'close');
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

        $data = $data[0];

        switch($quility){
            case 'WD':
                $url = $data['wWD'];
                break;

            case 'HD':
                $url = $data['wHD'];
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
        $viewType = $params[1];

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

        $url = $profRefer[$viewType];

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
    public function Curriculum($params = [])
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