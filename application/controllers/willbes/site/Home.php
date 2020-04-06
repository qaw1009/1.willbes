<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('product/productF', 'support/supportBoardF', 'support/supportBoardTwoWayF', 'siteF', 'bannerF', 'dDayF', 'onAirF');
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
        // 모바일 리다이렉트
        $this->_redirectMobile();

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
                if (empty($this->_cate_code) === true) {
                    // 카테고리코드가 없을 경우 디폴트 카테고리 페이지로 리다이렉트
                    redirect(site_url('/home/index/' . config_get('uri_segment_keys.cate') . '/' . config_app('DefCateCode')));
                }

                $_view_path = $this->_site_code . '_' . $cate_code;
            }
        } else {
            // 모바일, APP
            $_view_path = $this->_site_code;
        }

        // get data
        $data = $this->{'_getSite' . $this->_site_code . 'Data'}($cate_code, $arr_campus);

        $this->load->view('site/main_'. $_view_path, [
            'data' => $data,
            'cate_code' => $cate_code,
            'is_site_home' => true
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
        $s_cate_code = '';  // 디바이스별 카테고리 적용 구분

        if (APP_DEVICE == 'pc') {
            $s_cate_code = $cate_code;

            $data['dday'] = $this->_dday();
            $data['best_product'] = $this->_product('on_lecture', 4, $s_cate_code, 'Best');
            $data['new_product'] = $this->_product('on_lecture', 4, $s_cate_code, 'New');
            $data['arr_main_banner'] = array_merge($this->_banner($s_cate_code), $this->_banner('0'));
        }

        $data['notice'] = $this->_boardNotice(4, $s_cate_code);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(4, $s_cate_code);
        $data['exam_news'] = $this->_boardExamNews(4, $s_cate_code);

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
            $data['arr_campus_info'] = $this->_getSiteCampusInfo();
            $data['notice'] = $this->_boardNotice(5, null, ['605999']);
            $data['exam_announcement'] = $this->_boardExamAnnouncement(5);
            $data['exam_news'] = $this->_boardExamNews(5);
            $data['onAir'] = $this->_onAir();
            $data['arr_main_banner'] = $this->_banner('0');
            $data['notice_campus'] = $this->_boardNoticeByCampus(2);
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
        $s_cate_code = '';  // 디바이스별 카테고리 적용 구분

        if (APP_DEVICE == 'pc') {
            $s_cate_code = $cate_code;

            $data['dday'] = $this->_dday();
            $data['best_product'] = $this->_productLectureBySubjectIdx('on_lecture', 2, $s_cate_code, 'Best');  // 과목별 2개씩 베스트 상품 조회
            $data['arr_main_banner'] = $this->_banner($s_cate_code);

            // 특정 카테고리에서만 노출 (9급, 7급, 세무직, 소방직)
            if (in_array($s_cate_code, ['3019', '3020', '3022', '3023']) === true) {
                //특정일 기준 시간차 계산 [3019]
                $target_time = '2011-01-03 00:00:00';
                $data['Interval_time'] = number_format(floor((strtotime(date('Y-m-d H:i:s')) - strtotime($target_time)) / 3600));

                $data['study_comment'] = $this->_boardStudyComment(6, $s_cate_code);
            }
        }

        $data['notice'] = $this->_boardNotice(5, $s_cate_code);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(5, $s_cate_code);
        $data['exam_news'] = $this->_boardExamNews(5, $s_cate_code);

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
            $data['dday'] = $this->_dday();
            $data['arr_campus_info'] = $this->_getSiteCampusInfo();
            $data['gallery'] = $this->_gallery();
            $data['exam_announcement'] = $this->_boardExamAnnouncement(5);
            $data['exam_news'] = $this->_boardExamNews(5);
            $data['arr_main_banner'] = $this->_banner('0');
            $data['notice_campus'] = $this->_boardNoticeByCampus(2);
        }

        return $data;
    }

    /**
     * 고등고시[온라인] 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2005Data($cate_code = '', $arr_campus = [])
    {
        $data = [];
        $s_cate_code = '';  // 디바이스별 카테고리 적용 구분

        if (APP_DEVICE == 'pc') {
            $s_cate_code = $cate_code;
            $data['arr_main_banner'] = $this->_banner($s_cate_code);
        }

        $data['off_notice'] = $this->_boardNotice(5, $s_cate_code, null, 108);
        $data['notice'] = $this->_boardNotice(5, $s_cate_code);
        $data['exam_news'] = $this->_boardExamNews(5, $s_cate_code);

        return $data;
    }

    /**
     * 자격증 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2006Data($cate_code = '', $arr_campus = [])
    {
        $data = [];
        $s_cate_code = '';  // 디바이스별 카테고리 적용 구분

        if (APP_DEVICE == 'pc') {
            $s_cate_code = $cate_code;
            $data['arr_main_banner'] = $this->_banner($s_cate_code);
        }

        $data['off_notice'] = $this->_boardNotice(5, $s_cate_code, null, 108);
        $data['notice'] = $this->_boardNotice(5, $s_cate_code);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(5, $s_cate_code);
        $data['exam_news'] = $this->_boardExamNews(5, $s_cate_code);

        return $data;
    }

    /**
     * 어학 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2007Data($cate_code = '', $arr_campus = [])
    {
        $data = [];
        $s_cate_code = '';  // 디바이스별 카테고리 적용 구분

        if (APP_DEVICE == 'pc') {
            $s_cate_code = $cate_code;
            $data['dday'] = $this->_dday();
            $data['arr_main_banner'] = $this->_banner($s_cate_code);
        }
        $data['notice'] = $this->_boardNotice(5, $s_cate_code);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(5, $s_cate_code);
        $data['exam_news'] = $this->_boardExamNews(5, $s_cate_code);

        return $data;
    }

    /**
     * 경찰간부[온라인] 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2008Data($cate_code = '', $arr_campus = [])
    {
        $data = [];
        $s_cate_code = '';  // 디바이스별 카테고리 적용 구분

        if (APP_DEVICE == 'pc') {
            $s_cate_code = $cate_code;
            $data['arr_main_banner'] = $this->_banner($s_cate_code);
        }

        $data['off_notice'] = $this->_boardNotice(5, $s_cate_code, null, 108);
        $data['notice'] = $this->_boardNotice(5, $s_cate_code);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(5, $s_cate_code);
        $data['exam_news'] = $this->_boardExamNews(5, $s_cate_code);

        return $data;
    }

    /**
     * 취업[온라인] 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2009Data($cate_code = '', $arr_campus = [])
    {
        $data = [];
        $s_cate_code = '';  // 디바이스별 카테고리 적용 구분

        if (APP_DEVICE == 'pc') {
            $s_cate_code = $cate_code;
            $data['arr_main_banner'] = $this->_banner($s_cate_code);
        }

        $data['notice'] = $this->_boardNotice(5, $s_cate_code);
        $data['exam_announcement'] = $this->_boardExamAnnouncement(5, $s_cate_code);
        $data['exam_news'] = $this->_boardExamNews(5, $s_cate_code);

        return $data;
    }


    /**
     * 고등고시[학원] 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2010Data($cate_code = '', $arr_campus = [])
    {
        $data = [];

        if (APP_DEVICE == 'pc') {
            $data['dday'] = $this->_dday();
            $data['arr_campus_info'] = $this->_getSiteCampusInfo();
            $data['gallery'] = $this->_gallery();
            $data['exam_announcement'] = $this->_boardExamAnnouncement(5);
            $data['exam_news'] = $this->_boardExamNews(5);
            $data['arr_main_banner'] = $this->_banner('0');
            $data['notice_campus'] = $this->_boardNoticeByCampus(2);
        }

        return $data;
    }

    /**
     * 자격증[학원] 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2011Data($cate_code = '', $arr_campus = [])
    {
        $data = [];

        if (APP_DEVICE == 'pc') {
            $data['dday'] = $this->_dday();
            $data['arr_campus_info'] = $this->_getSiteCampusInfo();
            $data['gallery'] = $this->_gallery();
            $data['exam_announcement'] = $this->_boardExamAnnouncement(5);
            $data['exam_news'] = $this->_boardExamNews(5);
            $data['arr_main_banner'] = $this->_banner('0');
            $data['notice_campus'] = $this->_boardNoticeByCampus(2);
        }

        return $data;
    }

    /**
     * 경찰간부[학원] 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2013Data($cate_code = '', $arr_campus = [])
    {
        $data = [];

        if (APP_DEVICE == 'pc') {
            $data['dday'] = $this->_dday();
            $data['arr_campus_info'] = $this->_getSiteCampusInfo();
            $data['gallery'] = $this->_gallery();
            $data['exam_announcement'] = $this->_boardExamAnnouncement(5);
            $data['exam_news'] = $this->_boardExamNews(5);
            $data['arr_main_banner'] = $this->_banner('0');
            $data['notice_campus'] = $this->_boardNoticeByCampus(2);
            $data['notice'] = $this->_boardNotice(5, $cate_code);
        }

        return $data;
    }

    /**
     * N잡 데이터 조회
     * @param string $cate_code
     * @param array $arr_campus
     * @return mixed
     */
    private function _getSite2014Data($cate_code = '', $arr_campus = [])
    {
        $data = [];
        $s_cate_code = '';  // 디바이스별 카테고리 적용 구분

        if (APP_DEVICE == 'pc') {
            $s_cate_code = $cate_code;
            $data['arr_main_banner'] = array_merge($this->_banner($s_cate_code), $this->_banner('0'));
        }

        return $data;
    }

    /**
     * 메인 배너
     * @param int $cate_code
     * @return array
     */
    private function _banner($cate_code = 0)
    {
        $banner_disp_group = 'GRP:메인';
        $result = $this->bannerFModel->findBanners($banner_disp_group, $this->_site_code, $cate_code);

        $data = [];
        foreach ($result as $key => $row) {
            $data[$row['DispName']][] = $result[$key];
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
     * 공지사항 조회
     * @param int $limit_cnt [조회건수]
     * @param string $cate_code
     * @param array $arr_campus
     * @param int $bm_idx
     * @return array|int
     */
    private function _boardNotice($limit_cnt = 5, $cate_code = '', $arr_campus = [], $bm_idx = 45)
    {
        $column = 'b.BoardIdx, b.Title, b.IsBest, b.BestOrderNum, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['IsBest' => 'Desc', 'BestOrderNum' => 'Desc', 'BoardIdx' => 'Desc'];
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.SiteCode' => $this->_site_code
            ],
            'IN' => [
                'b.CampusCcd' => $arr_campus
            ]
        ];
        return $this->supportBoardFModel->listBoard(false, $arr_condition, $cate_code, $column, $limit_cnt,0, $order_by);

    }


    /**
     * 캠퍼스별 공지사항 조회
     * @param int $limit_cnt
     * @return array
     */
    private function _boardNoticeByCampus($limit_cnt = 2)
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
        $list = $this->supportBoardFModel->listBoardByCampus($arr_condition, $limit_cnt);
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
        $order_by = ['IsBest'=>'Desc', 'BoardIdx'=>'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 54, 'b.IsUse' => 'Y']];

        return $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $cate_code, $arr_condition, $column, $limit_cnt, 0, $order_by);
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
        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 57, 'b.IsUse' => 'Y']];

        return $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $cate_code, $arr_condition, $column, $limit_cnt, 0, $order_by);
    }

    /**
     * 수강후기 조회
     * @param int $limit_cnt
     * @param string $cate_code
     * @param array $arr_campus
     * @return array|int
     */
    private function _boardStudyComment($limit_cnt = 6, $cate_code = '', $arr_campus = [])
    {
        $column = 'b.BoardIdx, b.Title, b.IsBest, b.SubjectIdx, b.SubjectName, b.ProfIdx, b.ProfName, b.ProdName
            , DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm, fn_professor_refer_value(b.ProfIdx, "lec_list_img") as ProfLecListImg';
        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 85, 'b.SiteCode' => $this->_site_code, 'b.IsUse' => 'Y']];

        return $this->supportBoardTwoWayFModel->listBoard(false, $arr_condition, $cate_code, $column, $limit_cnt, 0, $order_by);
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
        $column = 'b.BoardIdx, b.Title,  b.CampusCcd_Name, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['BoardIdx'=>'Desc'];
        $data = $this->supportBoardFModel->listBoard(false,$arr_condition, '',$column,2,0,$order_by);

        if (empty($data) === false) {
            foreach ($data as $idx => $row) {
                $data[$idx]['AttachData'] = json_decode($row['AttachData'], true);       //첨부파일
            }
        }
        return $data;
    }

    /**
     * 사이트별 캠퍼스 정보 조회 및 데이터 조합
     * @return array
     */
    private function _getSiteCampusInfo()
    {
        // 캠퍼스정보 조회
        $result = $this->siteFModel->getSiteCampusInfo($this->_site_code);

        $data = [];
        foreach ($result as $row) {
            if (isset($data[$row['CampusCcd']]['CampusName']) === false) {
                $data[$row['CampusCcd']]['CampusCcdName'] = $row['CampusCcdName'];
                $data[$row['CampusCcd']]['CampusReName'] = $row['CampusReName'];
            }

            $data[$row['CampusCcd']]['Info'][] = $row;
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

        return $this->dDayFModel->getDDays($arr_condition);
    }

    /**
     * OnAir 조회
     * @return array
     */
    private function _onAir()
    {
        return $this->onAirFModel->getLiveOnAir($this->_site_code, '');
    }
}
