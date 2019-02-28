<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('product/productF', 'onAirF', 'support/supportBoardF', 'bannerF');
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
        if (APP_DEVICE == 'pc') {
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
        } else {
            // 모바일, APP
            $_view_path = $this->_site_code;
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
        if (APP_DEVICE == 'pc') {
            $data['best_product'] = $this->_product('on_lecture', 4, $cate_code, 'Best');
            $data['new_product'] = $this->_product('on_lecture', 4, $cate_code, 'New');
        }

        $data['notice'] = $this->_boardNotice(4);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(4);
        $data['exam_news'] = $this->_boardExamNews(4);
        $data['main_quick'] = $this->_banner();

        return $data;
    }

    /**
     * 학원경찰 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2002Data($cate_code = '', $arr_campus = [])
    {
        $data = [];

        if (APP_DEVICE == 'pc') {
            $arr_campus = array_replace_recursive($arr_campus, $this->_getCampusInfo());
            $data['arr_campus'] = $arr_campus;
            $data['notice'] = $this->_boardNotice(5);
            $data['exam_news'] = $this->_boardExamNews(5);
            $data['onAir'] = $this->_onAir();
            foreach ($arr_campus as $row) {
                $data['notice_campus'][$row['CampusCcd']] = $this->_boardNotice(2, '', [$row['CampusCcd']]);
            }
        }

        return $data;
    }

    /**
     * 온라인공무원 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2003Data($cate_code = '', $arr_campus = [])
    {
        if (APP_DEVICE == 'pc') {
            $data['best_product'] = $this->_product('on_lecture', 2, $cate_code, 'Best');
            $data['new_product'] = $this->_product('on_lecture', 2, $cate_code, 'New');
        }

        $data['notice'] = $this->_boardNotice(4);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(4);
        $data['exam_news'] = $this->_boardExamNews(4);

        return $data;
    }

    /**
     * 학원공무원 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2004Data($cate_code = '', $arr_campus = [])
    {
        $data = [];

        if (APP_DEVICE == 'pc') {
            $data['notice'] = $this->_boardNotice(5);
            $data['exam_announcement'] = $this->_boardExamAnnouncement(5);
            $data['exam_news'] = $this->_boardExamNews(5);
        }

        return $data;
    }

    /**
     * 상품 조회
     * @param $learn_pattern
     * @param int $limit_cnt
     * @param string $cate_code
     * @param string $is_best_new
     * @return array|int
     */
    private function _product($learn_pattern, $limit_cnt = 5, $cate_code = '', $is_best_new = '')
    {
        $add_column = '';
        $arr_condition = [
            'EQ' => ['SiteCode' => $this->_site_code],
            'LKR' => ['CateCode' => $cate_code]
        ];

        if (empty($is_best_new) === false) {
            $arr_condition['EQ']['Is' . ucfirst($is_best_new)] = 'Y';
        }

        if ($learn_pattern == 'on_lecture') {
            $add_column = ', ifnull(JSON_VALUE(ProfReferData, "$.lec_list_img"), "") as ProfLecListImg';
        }

        return $this->productFModel->listSalesProduct($learn_pattern, false, $arr_condition, $limit_cnt, 0, ['ProdCode' => 'desc'], $add_column);
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
        $column = 'b.BoardIdx, b.Title, b.IsBest, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['b.IsBest' => 'Desc', 'b.BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 45, 'b.SiteCode' => $this->_site_code, 'b.IsUse' => 'Y'], 'IN' => ['b.CampusCcd' => $arr_campus]];

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
        $column = 'b.BoardIdx, b.Title, b.IsBest, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['b.IsBest' => 'Desc', 'b.BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 57, 'b.IsUse' => 'Y']];

        return $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $arr_condition, $column, $limit_cnt, 0, $order_by);
    }

    /**
     * 캠퍼스별 기타 정보 설정
     * 캠퍼스 배열에 맞게 배열 셋팅
     * @return array
     */
    private function _getCampusInfo()
    {
        switch ($this->_site_code) {
            case "2002":
                $temp_campus = [
                    '0' => ['MapPath' => img_url('cop_acad/map/map_cop_origin.jpg'),'Addr' => '서울시동작구만양로105 2층<br/>(서울시동작구노량진동116-2 2층)','Tel' => '1544-0336'],
                    '1' => ['MapPath' => img_url('cop_acad/map/map_cop_sl.jpg'),'Addr' => '서울 관악구 신림로 23길 16 4층','Tel' => '1544-4006'],
                    '2' => ['MapPath' => img_url('cop_acad/map/map_cop_bs.jpg'),'Addr' => '부산 진구 부정동 223-8','Tel' => '1522-8112'],
                    '3' => ['MapPath' => img_url('cop_acad/map/map_cop_dg.jpg'),'Addr' => '대구 중구 중앙대로 412(남일동) CGV 2층','Tel' => '1522-6112'],
                    '4' => ['MapPath' => img_url('cop_acad/map/map_cop_ic.jpg'),'Addr' => '인천 부평구 부평동 534-28 중보빌딩 10층','Tel' => '1544-1661'],
                    '5' => ['MapPath' => img_url('cop_acad/map/map_cop_kj.jpg'),'Addr' => '광주 북구 호동로 6-11','Tel' => '062-722-8140'],
                    '6' => ['MapPath' => img_url('cop_acad/map/map_cop_jbjj.jpg'),'Addr' => '','Tel' => ''],
                    '7' => ['MapPath' => img_url('cop_acad/map/map_cop_jinj.jpg'),'Addr' => '경남 진주시 칠암동 490-8 엠코아빌딩 4층','Tel' => '055-755-7771'],
                    '8' => ['MapPath' => img_url('cop_acad/map/map_cop_jj.jpg'),'Addr' => '제주도 제주시 동광로 56 3층','Tel' => '064-722-8140']
                ];
                break;
            default:
                $temp_campus = [];
        }

        return $temp_campus;
    }

    /**
     * 메인 우측 퀵배너
     * @return array
     */
    private function _banner()
    {
        $arr_disp = ['메인_우측퀵_01','메인_우측퀵_02','메인_우측퀵_03'];
        $result = $this->bannerFModel->findBannersInArray($arr_disp, $this->_site_code, 0);

        $data = [];
        foreach ($result as $key => $row) {
            $data[$row['DispName']][] = $result[$key];
        }
        return $data;
    }
}
