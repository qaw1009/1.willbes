<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends \app\controllers\BaseController
{
    protected $models = array('sys/code');
    protected $helpers = array();

    protected $_site = '';

    public function __construct()
    {
        parent::__construct();

        // 클래스 구분
        $this->_site = ucfirst(get_var($this->uri->rsegment(3), 'code'));

        // load class
        $this->load->library('../controllers/lms/sys/Site' . $this->_site, null,'site');
    }

    /**
     * 사이트 정보관리 하위 메뉴별 인덱스
     */
    public function index()
    {
        $this->site->index();
    }

    /**
     * 사이트 정보관리 하위 메뉴별 목록 조회
     */    
    public function listAjax()
    {
        $this->site->listAjax();
    }

    /**
     * 사이트 정보관리 하위 메뉴별 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->site->create($params);
    }

    /**
     * 사이트 정보관리 하위 메뉴별 등록/수정
     */
    public function store()
    {
        $this->site->store();
    }

    /**
     * 사이트 정보관리 하위 메뉴별 정렬변경
     */
    public function reorder()
    {
        $this->site->reorder();
    }    

    /**
     * 사이트 정보관리 하위 메뉴별 이미지 삭제
     */
    public function destroyImg()
    {
        $this->site->destroyImg();
    }
}