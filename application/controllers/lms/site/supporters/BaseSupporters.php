<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSupporters extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'site/supportersRegist', 'site/supportersMember');
    protected $_ccd = [
        'coupon' => '685',
        'serial' => '666',  //응시직렬
        'supporters_status' => '720',    //서포터즈활동상태
        'year' => '721',    //학년
        'is_school' => '722',  //재학여부
        'exam_period' => '723',  //시험준비기간
    ];
    protected $_used_ccd = ['685002' => '', '685003' => ''];

    public function __construct()
    {
        parent::__construct();
    }

    protected function _listSite()
    {
        $column = 'SiteCode, SiteName';
        $arr_condition = [
            'EQ' => [
                'IsCampus' => 'N',
                'IsUse' => 'Y',
                'IsStatus' => 'Y'
            ]
        ];
        $result = $this->siteModel->listSite($column,$arr_condition);
        $data = array_pluck($result, 'SiteName', 'SiteCode');

        //통합사이트, 자격증 온라인 사이트코드 제거
        unset($data[config_item('app_intg_site_code')], $data['2006']);
        return $data;
    }

    /**
     * 서포터즈 간편 조회
     * @return mixed
     */
    protected function _getSupportersData()
    {
        $arr_condition = [
            'EQ' => [
                'a.IsUse' => 'Y'
            ]
        ];
        return $this->supportersRegistModel->getSupportersData($arr_condition);
    }

    /**
     * 쿠폰발급상태 공통코드
     * 서포터즈에서 사용하는 공통코드 가공처리
     * @return array
     */
    protected function _couponIssueCcd()
    {
        $data = $this->codeModel->getCcd($this->_ccd['coupon']);
        return array_intersect_key($data, $this->_used_ccd);
    }

    /**
     * 공통코드 조회
     * @param $group_ccd
     * @return array
     */
    protected function _getCcdData($group_ccd)
    {
        return $this->codeModel->getCcd($group_ccd);
    }

    /**
     * 공통코드 조회
     * @param $group_ccds
     * @return array
     */
    protected function _getCcdArrayData($group_ccds)
    {
        return $this->codeModel->getCcdInArray($group_ccds);
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
     * 첨부파일 다운로드
     */
    protected function _download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
    }
}