<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubPage extends \app\controllers\FrontController
{
    protected $models = array('dDayF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 서브페이지 공용 메서드
     * @return mixed
     */
    public function index()
    {
        $data = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_method = element('method',$arr_input);

        if(empty($arr_method) === false){
            foreach ($arr_method as $method){
                if(method_exists('SubPage', '_' . $method) === true){
                    $data[$method] = $this->{'_' . $method}();
                }
            }
        }

        return $this->json_result(true, '',[], $data);
    }

    /**
     * 시험일정 조회 (디데이)
     * @return mixed
     */
    private function _dday()
    {
        $arr_condition = [
            'EQ' => [
                'a.SiteCode' => $this->_site_code,
                'b.CateCode' => $this->_cate_code
            ]
        ];

        return $this->dDayFModel->getDDays($arr_condition);
    }

}