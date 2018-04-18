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
     * 운영사이트에 따른 카테고리(구분), 캠퍼스 정보 리턴
     * @param array $params
     * @return mixed
     */
    protected function _getSiteCategoryInfo($params = [])
    {
        $resultSiteArray = $this->_listSite('SiteCode,SiteName,IsCampus', $params[0]);
        $get_site_array = [];
        foreach ($resultSiteArray as $keys => $vals) {
            foreach ($vals as $key => $val) {
                $get_site_array[$vals['SiteCode']] = array(
                    'SiteName' => $vals['SiteName'],
                    'IsCampus' => $vals['IsCampus']
                );
            }
        }

        //사이트카테고리
        $result['category'] = $this->_getCategoryArray($params[0]);
        //캠퍼스
        $result['campus'] = $this->_getCampusArray($params[0]);

        //캠퍼스 사용 유무
        $result['isCampus'] = $get_site_array[$params[0]]['IsCampus'];

        return $result;
    }

    /**
     * 캠퍼스 정보 리턴
     * @param array $params
     * @return mixed
     */
    protected function _getCampusInfo($params = [])
    {
        $result_site_array = $this->_listSite('SiteCode,SiteName,IsCampus', $params[0]);
        $get_site_array = [];
        foreach ($result_site_array as $keys => $vals) {
            foreach ($vals as $key => $val) {
                $get_site_array[$vals['SiteCode']] = array(
                    'SiteName' => $vals['SiteName'],
                    'IsCampus' => $vals['IsCampus']
                );
            }
        }

        $result['campus'] = $this->_getCampusArray($params[0]);
        //캠퍼스 사용 유무
        $result['isCampus'] = $get_site_array[$params[0]]['IsCampus'];

        return $result;
    }

    /**
     * GroupCcd 조회
     * @param $arr_groupCcd : 그룹 코드 배열
     * @return array
     */
    protected function _getFaqGroupInfo($arr_groupCcd)
    {
        return $this->codeModel->getGroupCcdInArray($arr_groupCcd);
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
     * 그룹공통코드에 해당하는 공통코드 조회
     * @param $group_ccd
     * @return array
     */
    protected function _getCcdArray($group_ccd)
    {
        return $this->codeModel->getCcd($group_ccd);
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

    /**
     *
     * @param $arr_condition
     */
    protected function _getUnAnserArray($arr_condition)
    {
        return $this->boardModel->getUnAnserArray($arr_condition);
    }
}