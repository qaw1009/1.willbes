<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('onAirF','support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 사이트 메인
     */
    public function index()
    {
        $cate_code = get_var($this->_cate_code, config_app('DefCateCode'));
        $arr_campus = [];

        // view file name
        if ($this->_is_mobile === true || $this->_is_app === true) {
            // 모바일, APP
            $_view_path = $this->_site_code;
        } else {
            // PC
            if ($this->_is_pass_site === true) {
                $_view_path = $this->_site_code;

                // 캠퍼스 코드
                if (config_app('CampusCcdArr') != 'N') {
                    $arr_campus = array_map(function($var) {
                        $tmp_arr = explode(':', $var);
                        return ['CampusCcd' => $tmp_arr[0], 'CampusCcdName' => $tmp_arr[1]];
                    }, explode(',', config_app('CampusCcdArr')));
                }
            } else {
                $_view_path = $this->_site_code . '_' . $cate_code;
            }
        }

        // get data
        $data = $this->{'_getSite' . $this->_site_code . 'Data'}($cate_code, $arr_campus);

        $this->load->view('site/main_'. $_view_path, [
            'data' => $data
        ]);
    }

    /**
     * 온라인경찰 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2001Data($cate_code = '', $arr_campus = [])
    {
        $data['notice'] = $this->_boardNotice(4);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(4);
        $data['exam_news'] = $this->_boardExamNews(4);

        return $data;
    }

    private function _getSite2002Data($cate_code = '', $arr_campus = [])
    {
        $data['notice'] = $this->_boardNotice(5);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(5);
        $data['onAir'] = $this->_onAir();

        return $data;
    }

    private function _getSite2003Data($cate_code = '', $arr_campus = [])
    {

    }

    private function _getSite2004Data($cate_code = '', $arr_campus = [])
    {

    }

    /**
     * OnAir 조회
     * @return array
     */
    private function _onAir()
    {
        return $this->onAirFModel->getLiveOnAir($this->_site_code, '');
    }

    /**
     * 공지사항 조회
     * @param int $limit_cnt [조회건수]
     * @param string $cate_code
     * @param array $arr_campus
     * @return array|int
     */
    private function _boardNotice($limit_cnt = 5, $cate_code = '', $arr_campus = [])
    {
        $column = 'b.BoardIdx, b.Title, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['b.IsBest' => 'Desc', 'b.BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 45, 'b.SiteCode' => $this->_site_code, 'b.IsUse' => 'Y']];

        return $this->supportBoardFModel->listBoard(false, $arr_condition, $column, $limit_cnt, 0, $order_by);
    }

    /**
     * 시험공고 조회
     * @param int $limit_cnt [조회건수]
     * @param string $cate_code
     * @param array $arr_campus
     * @return array|int
     */
    private function _boardExamAnnouncement($limit_cnt = 5, $cate_code = '', $arr_campus = [])
    {
        $column = 'b.BoardIdx, b.Title, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['b.IsBest' => 'Desc', 'b.BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 54, 'b.IsUse' => 'Y']];

        return $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $arr_condition, $column, $limit_cnt, 0, $order_by);
    }

    /**
     * 수험뉴스 조회
     * @param int $limit_cnt [조회건수]
     * @param string $cate_code
     * @param array $arr_campus
     * @return array|int
     */
    private function _boardExamNews($limit_cnt = 5, $cate_code = '', $arr_campus = [])
    {
        $column = 'b.BoardIdx, b.Title, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['b.IsBest' => 'Desc', 'b.BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 57, 'b.IsUse' => 'Y']];

        return $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $arr_condition, $column, $limit_cnt, 0, $order_by);
    }
}
