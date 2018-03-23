<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseBoard extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site');
    protected $helpers = array();
    protected $boardDefaultParams = [];      //게시판 필수 기본 정보

    public function __construct()
    {
        parent::__construct();
    }

    protected function setDefaultBoardParam()
    {
        $this->boardDefaultParams = [
            'bmIdx' => $this->_req('bm_idx'),
            'subMenu' => $this->_req('sub_menu')
        ];
    }

    protected function getDefaultBoardParam()
    {
        return $this->boardDefaultParams;
    }

    /**
     * 권한유형별 사이트
     * 경찰, 공무원, 임용
     */
    protected function _getBaseSiteArray()
    {
        return $list = [
            '1' => '경찰',
            '2' => '공무원',
            '3' => '임용'
        ];
    }

    /**
     * 권한유형별 캠퍼스 목록 조회
     */
    protected function _getCampusArray()
    {
        return $list = [
            '1' => '노량진',
            '2' => '신림',
        ];
    }

    /**
     * 권한유형별 운영사이트 목록 조회
     * @return array
     */
    protected function _getSiteArray()
    {
        return $this->siteModel->getSiteArray();
    }
}