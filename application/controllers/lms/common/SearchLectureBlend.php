<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchLectureBlend extends \app\controllers\BaseController
{
    protected $models = array('sys/code','product/on/lecture','product/on/lectureFree','product/off/offLecture','sys/site');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $site_code = $this->_req('site_code');

        $data = $this->siteModel->findSite('*', ['EQ'=>['SiteCode'=>$site_code]]);
        if(empty($data)) {
            show_error('사이트 정보가 존재하지 않습니다.' );
        }
        $learn_pattern_ccd = ($data['IsCampus'] === 'N' ? '615001' : '615006');

        $this->load->view('common/search_lecture_blend',[
            'site_code' => $this->_req('site_code')
            ,'LearnPatternCcd' => $learn_pattern_ccd
            ,'locationid' => $this->_req('locationid')
        ]);
    }

    /**
     * 강좌 목록
     * @return CI_Output
     */
    public function listAjax()
    {
        $LearnPatternCcd = $this->_reqP('LearnPatternCcd');

        $arr_condition = [
            'EQ' => [
                'B.LearnPatternCcd' => $LearnPatternCcd,
                'A.SiteCode' => $this->_reqP('site_code'),
            ]
        ];

        if($this->_reqP('locationid') === 'tar') {      //대상강좌일경우 ... 선수강으로 설정 된 놈만
            $arr_condition = array_merge_recursive($arr_condition,[
                'EQ' => [
                    'B.LecSaleType' => 'B',
                ],
            ]);
        }

        $arr_condition = array_merge($arr_condition,[
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ]);


        if($LearnPatternCcd === '615001') {
            $modelname = "lectureModel";
        } elseif($LearnPatternCcd === '615005') {
            $modelname = "lectureFreeModel";
        } elseif($LearnPatternCcd === '615006') {
            $modelname = "offLectureModel";
        }

        $list = [];
        $count = $this->{$modelname}->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->{$modelname}->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }
}
