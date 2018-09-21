<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 공통코드관리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCode extends \app\controllers\BaseController
{
    protected $models = array('sys/category', 'product/base/subject', 'mocktest/baseCode');
    protected $helpers = array();


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메인리스트
     * @param array $params
     */
    public function index()
    {
//        $cateList = $this->categoryModel->getCategoryArray();
//
//        $cateD1 = $cateD2 = array();
//        foreach ($cateList as $it) {
//            $cateD1[$it['BCateCode']] = $it;
//            if(!empty($it['MCateCode'])) $cateD2[] = $it;
//        }

        $cateList = $this->categoryModel->listAllCategory(); // IsUse = N 포함

        $cateD1 = $cateD2 = array();
        foreach ($cateList as $it) {
            if($it['LastIsUse'] == 'N') continue;

            $cateD1[$it['BCateCode']] = array(
                'SiteCode' => $it['SiteCode'],
                'CateCode' => $it['BCateCode'],
                'CateName' => $it['BCateName']
            );

            if(!empty($it['MCateCode'])) {
                $cateD2[] = array(
                    'ParentCateCode' => $it['BCateCode'],
                    'CateCode'       => $it['MCateCode'],
                    'CateName'       => $it['MCateName']
                );
            }
        }

        $list = $this->baseCodeModel->list();

        $this->load->view('mocktest/base/code/index', [
            'siteCodeDef' => get_auth_site_codes()[0],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),

            'cateList' => array_filter($cateList, function ($v) { return $v['LastIsUse'] == 'Y'; }),
            'list' => $list,
        ]);
    }


    /**
     * 사용/미사용 토글
     * @param array $params
     */
    public function useToggle()
    {
//        $rules = [
//            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
//            ['field' => 'params', 'label' => '정렬순서', 'rules' => 'trim|required']
//        ];
//
//        if ($this->validate($rules) === false) {
//            return;
//        }

        $result = true;//$this->subjectModel->modifySubjectsReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '변경되었습니다.', $result);
    }


    /**
     * 과목 등록폼
     * @param array $params
     */
    public function createSubject()
    {
        $this->load->view('mocktest/base/code/create_subject', [
            'data' => array(),
        ]);
    }


    /**
     * 과목 등록
     * @param array $params
     */
    public function storeSubject()
    {

    }


    /**
     * 수정
     * @param array $params
     */
    public function update()
    {

    }

}
