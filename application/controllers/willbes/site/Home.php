<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('product/productF', 'onAirF', 'support/supportBoardF', 'bannerF', 'dDayF');
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
        $arr_disp = ['메인_우측퀵_01','메인_우측퀵_02','메인_우측퀵_03'];

        if (APP_DEVICE == 'pc') {
            $data['dday'] = $this->_dday();
            $data['best_product'] = $this->_product('on_lecture', 4, $cate_code, 'Best');
            $data['new_product'] = $this->_product('on_lecture', 4, $cate_code, 'New');
        }

        $data['notice'] = $this->_boardNotice(4);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(4);
        $data['exam_news'] = $this->_boardExamNews(4);
        $data['main_quick'] = $this->_banner($arr_disp);

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
            $data['notice_campus'] = $this->_boardNoticeByCampus();
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
            // 과목별 2개씩 베스트 상품 조회
            $data['best_product'] = $this->_productLectureBySubjectIdx('on_lecture', 2, $cate_code, 'Best');
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
        $arr_disp = ['메인_빅배너','메인_서브1','메인_서브2','메인_서브3','메인_띠배너','메인_미들1','메인_미들2','메인_미들3','메인_미들4','메인_미들5','메인_이벤트','메인_대표교수','메인_포커스'];

        if (APP_DEVICE == 'pc') {
            $arr_campus = array_replace_recursive($arr_campus, $this->_getCampusInfo());
            $data['arr_campus'] = $arr_campus;
            $data['gallery'] = $this->_gallery();
            $data['exam_announcement'] = $this->_boardExamAnnouncement(5);
            $data['exam_news'] = $this->_boardExamNews(5);
            $data['arr_main_banner'] = $this->_banner($arr_disp);
            $data['notice_campus'] = $this->_boardNoticeByCampus();
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
     * 과목별 {N}개씩 상품 조회 (온라인단강좌, 무료강좌, 학원단과만 해당)
     * @param $learn_pattern
     * @param int $limit_cnt
     * @param string $cate_code
     * @param string $is_best_new
     * @return mixed
     */
    private function _productLectureBySubjectIdx($learn_pattern, $limit_cnt = 2, $cate_code = '', $is_best_new = '')
    {
        $arr_condition = [
            'EQ' => ['SiteCode' => $this->_site_code],
            'LKR' => ['CateCode' => $cate_code]
        ];

        if (empty($is_best_new) === false) {
            $arr_condition['EQ']['Is' . ucfirst($is_best_new)] = 'Y';
        }

        // 상품 조회
        $list = $this->productFModel->listSalesProductLimitBySubjectIdx($learn_pattern, $arr_condition, $limit_cnt);

        // 상품조회 결과 배열 초기화
        $selected_subjects = [];
        $selected_list = [];

        if (empty($list) === false) {
            // 상품조회 결과에 존재하는 과목 정보
            $selected_subjects = array_pluck($list, 'SubjectName', 'SubjectIdx');

            // 상품 조회결과 재정의
            foreach ($list as $idx => $row) {
                $selected_list[$row['SubjectIdx']][] = $row;
            }
        }

        return [
            'subjects' => $selected_subjects,
            'list' => $selected_list
        ];
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
        $arr_condition = ['EQ' => ['b.BmIdx' => 45, 'b.IsUse' => 'Y'], 'IN' => ['b.CampusCcd' => $arr_campus]];

        return $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $arr_condition, $column, $limit_cnt, 0, $order_by);
    }

    private function _boardNoticeByCampus()
    {
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => '45',
                'b.SiteCode' => $this->_site_code,
                'b.IsUse' => 'Y'
            ],
            'RAW' => [
                'b.CampusCcd IS' => ' NOT NULL',
                'b.CampusCcd NOT' => ' LIKE \'%999\'',
            ]
        ];

        $selected_list = [];
        $list = $this->supportBoardFModel->listBoardByCampus($arr_condition);
        if (empty($list) === false) {
            foreach ($list as $row) {
                $selected_list[$row['CampusCcd']][] = $row;
            }
        }

        return $selected_list;
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
        $column = 'b.BoardIdx, b.IsBest, b.AreaCcd_Name, b.Title, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
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
            case "2004":
                $temp_campus = [
                    '0' => ['MapPath' => img_url('gosi_acad/map/mapSeoul.jpg'),'Addr' => '서울시동작구만양로105 2층<br/>(서울시동작구노량진동116-2 2층)','Tel' => '1544-0336'],
                    '1' => ['MapPath' => img_url('gosi_acad/map/mapIC.jpg'),'Addr' => '인천 부평구 부평동 534-28 중보빌딩 10층','Tel' => '1544-1661'],
                    '2' => ['MapPath' => img_url('gosi_acad/map/mapDG.jpg'),'Addr' => '대구 중구 중앙대로 412(남일동) CGV 2층','Tel' => '1522-6112'],
                    '3' => ['MapPath' => img_url('gosi_acad/map/mapBS.jpg'),'Addr' => '부산 진구 부정동 223-8','Tel' => '1522-8112'],
                    '4' => ['MapPath' => img_url('gosi_acad/map/mapKJ.jpg'),'Addr' => '광주 북구 호동로 6-11','Tel' => '062-514-4560']
                ];
                break;
            default:
                $temp_campus = [];
        }

        return $temp_campus;
    }

    /**
     * 메인 우측 퀵배너
     * @param array $arr_disp
     * @return array
     */
    private function _banner($arr_disp = [])
    {
        $result = $this->bannerFModel->findBannersInArray($arr_disp, $this->_site_code, 0);

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
        $arr_condition = [
            'EQ' => [
                'a.SiteCode' => $this->_site_code,
                'b.CateCode' => $this->_cate_code
            ]
        ];

        $data = $this->dDayFModel->getDDays($arr_condition, '1');
        return $data;
    }

    /**
     * 갤러리 게시판 데이터 조회
     * @return array|int
     */
    private function _gallery()
    {
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => '90'
                ,'b.IsUse' => 'Y'
                ,'b.SiteCode' => $this->_site_code
            ]
        ];
        $column = 'b.BoardIdx, b.Title, b.AttachData, b.CampusCcd_Name, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['b.BoardIdx'=>'Desc'];
        $data = $this->supportBoardFModel->listBoard(false,$arr_condition,$column,2,0,$order_by);

        if (empty($data) === false) {
            foreach ($data as $idx => $row) {
                $data[$idx]['AttachData'] = json_decode($row['AttachData'], true);       //첨부파일
            }
        }
        return $data;
    }
}
