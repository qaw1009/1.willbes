<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseMocktest extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/category', 'product/base/subject', 'mocktestNew/mockCommon');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    protected function getSiteCode()
    {
        $arr_site_code = get_auth_on_off_site_codes('Y', true, false);
        return $arr_site_code;
    }

    /**
     * 카테고리 코드 목록 조회
     * @param string $site_code
     * @return array
     */
    protected function getCategoryArray($site_code = '')
    {
        return $this->categoryModel->getCategoryArray($site_code, '', '', 1);
    }

    /**
     * 카테고리에 매핑된 직렬 로딩 - SELECT MENU
     * @param bool $isUseChk
     * @return mixed
     */
    protected function getMockKind($isUseChk = true)
    {
        return $this->mockCommonModel->getMockKind($isUseChk);
    }

    /**
     * 과목 코드 목록 조회
     * @param string $site_code
     * @return array
     */
    protected function getSubjectArray($site_code = '')
    {
        return $this->subjectModel->getSubjectArray($site_code);
    }
}