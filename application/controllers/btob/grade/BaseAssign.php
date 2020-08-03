<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseAssign extends \app\controllers\BaseController
{
    protected $models = array('correct/btobOffLecture','correct/btobCorrect','correct/btobAssign');
    protected $helpers = array('download');
    private $_sess_btob_idx = null;
    private $_sess_btob_site_code = null;
    public $_sess_btob_role_idx = null;
    private $_is_authority = true;

    public function __construct()
    {
        parent::__construct();
        $this->_sess_btob_idx = $this->session->userdata('btob.btob_idx');   // 제휴사식별자
        $this->_sess_btob_site_code = $this->session->userdata('btob.site_code'); // 제휴사메핑 사이트코드
        $this->_sess_btob_role_idx = $this->session->userdata('btob.admin_auth_data')['Role']['RoleIdx'];
        if ($this->_sess_btob_role_idx == '6005') {
            $this->_is_authority = false;
        }
    }

    protected function getLectureData($is_authority = true)
    {
        $is_authority = ($this->_is_authority === true) ? $is_authority = true : $is_authority;
        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => $this->_sess_btob_site_code,
                'A.IsStatus' => 'Y',
                'A.ProdTypeCcd' => $this->btobOffLectureModel->_ccd['prod_type'],
                'B.LearnPatternCcd' => $this->btobOffLectureModel->_ccd['learn_pattern'],
                'A.IsUse' => 'Y',
            ],
            'LKB' => [
                'E.ProfIdx_String' => $this->_reqP('search_prof_idx'),
                'A.ProdCode' => $this->_reqP('search_value'),
                'A.ProdName' => $this->_reqP('search_value'),
            ],
        ];

        $data = $this->btobOffLectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc'], $is_authority);
        return array_pluck($data,'ProdName', 'ProdCode');
    }

    /**
     * 채점자 리스트
     * @param bool $is_authority
     * @return mixed
     */
    protected function getAssignAdmin($is_authority = true)
    {
        $is_authority = ($this->_is_authority === true) ? $is_authority = true : $is_authority;
        return $this->btobAssignModel->listAssignAdmin($is_authority);
    }
}