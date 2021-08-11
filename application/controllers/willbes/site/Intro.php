<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intro extends \app\controllers\FrontController
{
    protected $models = array('support/supportBoardF', 'support/supportBoardTwoWayF', 'bannerF', 'dDayF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 사이트 인트로
     */
    public function index()
    {
        $_view_path = $this->_site_code;
        $_data_method = '_getSite' . $this->_site_code . 'Data';
        $data = [];

        // get data
        if (method_exists($this, $_data_method) === true) {
            $data = $this->{$_data_method}();
        } else {
            show_404(strtolower(get_class($this)) . '/' . $_data_method);
        }

        $this->load->view('site/intro/intro_'. $_view_path, [
            'data' => $data
        ]);
    }

    /**
     * 온라인공무원 데이터 조회
     * @return mixed
     */
    private function _getSite2003Data()
    {
        $data['banner'] = $this->_banner();
        $data['notice'] = $this->_board('notice', 5);
        $data['exam_announcement'] = $this->_boardForSiteGroup('exam_announcement', 5);
        $data['exam_news'] = $this->_boardForSiteGroup('exam_news', 5);
        $data['dday'] = array_data_pluck($this->_dday(), ['DayTitle', 'DayDatm', 'DDay'], 'DIdx');  // 중복제거

        return $data;
    }

    /**
     * 인트로 배너 조회
     * @param int $cate_code
     * @return array
     */
    private function _banner($cate_code = 0)
    {
        $first_name = $this->_is_mobile === true ? 'M_' : '';
        $banner_disp_group = 'GRP:'.$first_name.'게이트';
        $result = $this->bannerFModel->findBanners($banner_disp_group, $this->_site_code, $cate_code);

        $data = [];
        foreach ($result as $key => $row) {
            $data[$row['DispName']][] = $result[$key];
        }

        return $data;
    }

    /**
     * 시험일정 조회 (디데이)
     * @return mixed
     */
    private function _dday()
    {
        $arr_condition = ['EQ' => ['a.SiteCode' => $this->_site_code]];

        return $this->dDayFModel->getDDays($arr_condition);
    }

    /**
     * 일반게시판 조회
     * @param string $bm_type [게시판구분]
     * @param int $limit_cnt [조회건수]
     * @return array|mixed
     */
    private function _board($bm_type, $limit_cnt = 5)
    {
        $arr_bm_type = ['notice' => 45];    // 공지사항
        $bm_idx = array_get($arr_bm_type, $bm_type);

        if (empty($bm_idx) === true) {
            return [];
        }

        // 게시글 조회
        $column = 'b.BoardIdx, b.Title, b.IsBest, b.BestOrderNum, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['IsBest' => 'desc', 'BestOrderNum' => 'desc', 'BoardIdx' => 'desc'];
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $bm_idx, 'b.SiteCode' => $this->_site_code, 'b.IsUse' => 'Y'
            ],
        ];

        return $this->supportBoardFModel->listBoard(false, $arr_condition, null, $column, $limit_cnt,0, $order_by);
    }

    /**
     * 사이트그룹 게시판 조회
     * @param string $bm_type [게시판구분]
     * @param int $limit_cnt [조회건수]
     * @return array|mixed
     */
    private function _boardForSiteGroup($bm_type, $limit_cnt = 5)
    {
        $arr_bm_type = ['exam_announcement' => 54, 'exam_news' => 57];  // 시험공고, 수험뉴스
        $bm_idx = array_get($arr_bm_type, $bm_type);

        if (empty($bm_idx) === true) {
            return [];
        }

        // 게시글 조회
        $column = 'b.BoardIdx, b.Title, b.IsBest, b.AreaCcd_Name, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['IsBest' => 'desc', 'BoardIdx' => 'desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => $bm_idx, 'b.IsUse' => 'Y']];

        return $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, null, $arr_condition, $column, $limit_cnt, 0, $order_by);
    }

    public function indexTest(){
        $_view_path = $this->_site_code;
        $_data_method = '_getSite' . $this->_site_code . 'Data';
        $data = [];

        // get data
        if (method_exists($this, $_data_method) === true) {
            $data = $this->{$_data_method}();
        } else {
            show_404(strtolower(get_class($this)) . '/' . $_data_method);
        }

        $this->load->view('site/_viewTest/intro_'. $_view_path, [
            'data' => $data
        ]);
    }
}
