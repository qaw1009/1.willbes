<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Range extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/baseRange');
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = key($arr_site_code);

        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->getMockKind(false);
        $arr_base['subject'] = $this->getSubjectArray();

        $data = $this->baseRangeModel->list();
        $moData = $this->_moDataListAll();

        $this->load->view('mocktestNew/base/range/index', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
            'data' => $data,
            'moData' => $moData
        ]);
    }

    /**
     * 문제영역 등록폼
     * @param array $params
     */
    public function create($params = [])
    {
        $data = $chData = $moCate_name = $moCate_isUse = [];
        $arr_site_code = $this->getSiteCode();
        $def_site_code = '';

        if (empty($params[0]) === true) {
            $method = 'POST';
        } else {
            $method = 'PUT';
            $data = $this->baseRangeModel->getMockArea($params[0]);
            $chData = $this->baseRangeModel->getMockAreaList($params[0]);
            list($moCate_name, $moCate_isUse) = $this->baseRangeModel->getMockAreaListForCate($params[0]);

            if (empty($data) === true) {
                $this->json_error('데이터 조회에 실패했습니다.');
                return;
            }
            $def_site_code = $data['SiteCode'];
        }

        $this->load->view('mocktestNew/base/range/create', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'method' => $method,
            'data' => $data,
            'chData' => $chData,
            'moCate_name' => $moCate_name,
            'moCate_isUse' => $moCate_isUse,
            'isCopy' => ( isset($params[1]) && $params[1] == 'copy' ) ? true : false
        ]);
    }

    private function _moDataListAll()
    {
        $column = "
            MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
            CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName,
            IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS BaseIsUse
        ";
        $moCate = $this->mockCommonModel->moCateListAll($column);
        $moList = [];
        foreach ($moCate as $it) {
            $moList[$it['MrsIdx']] = [
                'cate1'   => $it['CateCode1'],
                'cate2'   => $it['CateCode2'],
                'subject' => $it['SubjectIdx'],
                'name'    => $it['CateRouteName'],
                'bIsUse'   => $it['BaseIsUse'],
            ];
        }
        return $moList;
    }
}