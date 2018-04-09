<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseBoard extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'sys/category');
    protected $helpers = array();
    protected $boardDefaultParams = [];      //게시판 필수 기본 정보

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * bm_id, site_code 기본 셋팅
     */
    protected function setDefaultBoardParam()
    {
        $this->boardDefaultParams = [
            'bm_idx' => $this->_req('bm_idx'),
            'site_code' => $this->_req('site_code')
        ];
    }

    /**
     * @return array
     */
    protected function getDefaultBoardParam()
    {
        return $this->boardDefaultParams;
    }

    /**
     * 권한유형별 캠퍼스 목록 조회
     * @param $site_code
     * @return array
     */
    protected function _getCampusArray($site_code)
    {
        return $this->siteModel->getSiteCampusArray($site_code);
    }

    /**
     * 권한유형별 운영사이트 목록 조회
     * @return array
     */
    protected function _getSiteArray()
    {
        return $this->siteModel->getSiteArray();
    }

    /**
     * 사이트 목록 조회
     * @param $column
     * @param $param
     * @return array|int
     */
    protected function _listSite($column, $param)
    {
        $arr_condition['EQ']['SiteCode'] = $param;
        return $this->siteModel->listSite($column, $arr_condition);
    }

    /**
     * 카테고리 조회
     * @param $site_code
     * @param int $parent_cate_code
     * @return array
     */
    protected function _getCategoryArray($site_code, $parent_cate_code = 0)
    {
        return $this->categoryModel->getCategoryArray($site_code, $parent_cate_code);
    }

    /**
     * 게시판 등록
     * @param $method
     * @param $inputData
     * @return mixed
     */
    protected function _addBoard($method, $inputData, $idx = '')
    {
        return $this->boardModel->{$method . 'Board'}($inputData);
    }

    /**
     * 게시판 수정
     * @param $method
     * @param $inputData
     * @param string $idx
     * @return mixed
     */
    protected function _modifyBoard($method, $inputData, $idx = '')
    {
        return $this->boardModel->{$method . 'Board'}($inputData, $idx);
    }

    /**
     * 게시판 삭제
     * @param $idx
     * @return bool
     */
    protected function _delete($idx)
    {
        return $this->boardModel->boardDelete($idx);
    }

    /**
     * 게시판 복제
     * @param $board_idx
     * @return array|bool
     */
    protected function _boardCopy($board_idx)
    {
        return $this->boardModel->boardCopy($board_idx);
    }

    /**
     * 게시판 Best 적용
     * @param array $params
     * @param array $dis_params
     * @return array|bool
     */
    protected function _boardIsBest($params = [], $dis_params = [])
    {
        return $this->boardModel->boardIsBest($params, $dis_params);
    }

    /**
     * 파일 삭제
     * @param $attach_idx
     * @return array|bool
     */
    protected function _removeFile($attach_idx)
    {
        return $this->boardModel->removeFile($attach_idx);
    }
}