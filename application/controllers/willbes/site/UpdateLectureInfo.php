<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateLectureInfo extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'product/professorF', 'updatelectureinfo/updateLectureInfoF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    private $_page_per_rows = 20;
    private $_show_page_num = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params=[])
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_input = array_unset($arr_input, 'page');

        $query_string = http_build_query($arr_input);

        $arr_base['search_subject'] = '';
        $arr_base['search_prof'] = '';
        $arr_base['search_value'] = '';
        if (empty(element('search_text', $arr_input)) === false) {
            $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 3);
            $arr_base['search_subject'] = element('0', $arr_search_text);
            $arr_base['search_prof'] = element('1', $arr_search_text);
            $arr_base['search_value'] = element('2', $arr_search_text);
        }
        // 과목 조회
        $arr_base['subject'] = $this->baseProductFModel->listSubject($this->_site_code, null);
        //교수 조회
        $arr_base['professor'] = $this->professorFModel->listProfessor(false, ['EQ' => ['PF.SiteCode' => $this->_site_code]],null,null,['PF.ProfNickName' => 'ASC']);

        $arr_condition = [
            'EQ' => [
                'p.SiteCode' => $this->_site_code,
                'p.ProdTypeCcd' => '636001',
                'pl.LearnPatternCcd' => '615001',
                'pf.ProfIdx' => $arr_base['search_prof'],
                'pl.SubjectIdx' => $arr_base['search_subject'],
            ],
            'LKB' => [
                'p.ProdName' => $arr_base['search_value']
            ]
        ];

        $arr_order_by = ['lu.wRegDatm' => 'desc', 'p.ProdCode' => 'desc'];

        $list = [];
        $count = $this->updateLectureInfoFModel->listUpdateInfo(true, $arr_condition);

        $paging_url = '/' . ltrim($this->getFinalUriString(), APP_DEVICE . '/') . (empty($query_string) === false ? '?' . $query_string : '');
        $paging = $this->pagination($paging_url, $count, $this->_page_per_rows, $this->_show_page_num, true);

        if($count > 0) {
            $list = $this->updateLectureInfoFModel->listUpdateInfo(false, $arr_condition, $paging['limit'], $paging['offset'], $arr_order_by);
        }

        $this->load->view('site/updatelectureinfo/index',[
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'query_string' => $query_string,
            'paging' => $paging,
            'count' => $count,
            'data' => $list
        ]);
    }


}
