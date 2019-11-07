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

    /**
     * 카테고리 코드 목록 조회
     * @return array
     */
    protected function getCategoryArray()
    {
        return $this->categoryModel->getCategoryArray('', '', '', 1);
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