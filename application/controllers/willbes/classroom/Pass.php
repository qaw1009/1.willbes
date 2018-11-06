<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pass extends \app\controllers\FrontController
{
    protected $models = array('classroomF', 'product/packageF');
    protected $helpers = array('download','file');
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 기간제 강의실
     */
    public function index($params = [])
    {
        $passidx = $this->_req("prodcode");
        $sitecode = $this->_req("sitecode");

        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'LearnPatternCcd' => '615004', // 학습방식 : 기간제패키지
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ]
        ];

        $sitelist = $this->classroomFModel->getSiteList($cond_arr);
        $sitelist = ['0' => ['SiteCode' => '2001']];
        foreach($sitelist AS $idx => $row){
            $sitelist[$idx]['SiteName'] = $this->getSiteCacheItem($row['SiteCode'], 'SiteGroupName');
        }

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'LearnPatternCcd' => '615004', // 학습방식 : 기간제패키지
                'SiteCode' => $sitecode // 해당사이트의 강좌만
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ]
        ];

        $orderby = element('orderby', $input_arr);
        $orderby = (empty($orderby) == true) ? 'lastStudyDate^DESC' : $orderby;


        // 학습형태 : 기간제패키지
        $passlist = $this->classroomFModel->getPackage($cond_arr, $orderby);

        // 선택된 패키지번호가 없다면 그냥 첫번째것으로
        if(empty($passidx) == true && empty($passlist) == false){
            $passidx = $passlist[0]['ProdCode'];
        }

        // 선택된 기간제패키지
        $passinfo = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'ProdCode' => [$passidx]
            ]
        ]), $orderby);

        // 해당패키지의 서브강좌
        if(empty($passinfo) == false ){
            $passinfo = $passinfo[0];

            $passinfo['CanViewLec'] =
            // 셀렉트박스 구해오기
            $cond_arr = [
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode']
                ]
            ];

            // 셀렉트박스용 데이타
            $course_arr = $this->classroomFModel->getCourseList($cond_arr);
            $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
            $prof_arr = $this->classroomFModel->getProfList($cond_arr);

            // 즐겨찾기 이고 수강률이 100이 안된 강좌
            $leclist_like = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                    'IsDisp' => 'Y', // 숨기지않고
                    'IsLiked' => 'Y' // 즐겨찾기
                ],
                'LT' => [
                    'StudyRate' => 100 // 수강율이 100%
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ]
            ], $orderby);

            // 수강중인 모든 강좌
            $leclist_ing = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                    'IsDisp' => 'N' // 숨지지않음
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ],
                'LKB' => [
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ], $orderby);

            // 수강종료 강좌 는 수강율이 100 인 강좌
            $leclist_end = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode']
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ],
                'GTE' => [
                    'StudyRate' => 100 // 수강율이 100%
                ],
                'LKB' => [
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ], $orderby);

            // 숨김강좌 이고 수강률이 100이 안된 강좌
            $leclist_nodisp = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                    'IsDisp' => 'N' // 숨긴강좌
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ],
                'LT' => [
                    'StudyRate' => 100 // 수강율이 100%
                ],
                'LKB' => [
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ], $orderby);

            $passinfo['TakeLecNum'] = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ]
            ],'',true);

            $passinfo['LecNum'] = count($this->packageFModel->subListProduct('periodpack_lecture', $passinfo['ProdCode']));

        } else {
            $leclist_like = [];
            $leclist_ing = [];
            $leclist_end = [];
            $leclist_nodisp = [];

            $course_arr = [];
            $subject_arr = [];
            $prof_arr = [];
        }

        return $this->load->view('/classroom/pass/index', [
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'sitelist' => $sitelist,
            'passlist' => $passlist,
            'passinfo' => $passinfo,
            'leclist_like' => $leclist_like,
            'leclist_ing' => $leclist_ing,
            'leclist_end' => $leclist_end,
            'leclist_nodisp' => $leclist_nodisp
        ]);

    }


    public function layerMoreLec()
    {
        $prodcode = $this->_req('ProdCode');
        $orderidx = $this->_req('OrderIdx');

        $today = date("Y-m-d", time());

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'LearnPatternCcd' => '615004', // 학습방식 : 기간제패키지
                'ProdCode' => $prodcode,
                'OrderIdx' => $orderidx
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
        ];

        // 학습형태 : 기간제패키지
        $passinfo = $this->classroomFModel->getPackage($cond_arr);

        if(empty($passinfo) == true){
            $this->json_error('신청한 강좌정보가 없습니다.');
        }

        $passinfo = $passinfo[0];

        $leclist = $this->packageFModel->subListProduct('periodpack_lecture', $passinfo['ProdCode']);

        return $this->load->view('/classroom/pass/layer/morelec', [
            'leclist' => $leclist
        ]);
    }

    public function ajaxLecInfo()
    {
        $prodcode = $this->_req("ProdCode");

        $lecinfo =

        return $this->load->view('/classroom/pass/layer/lecinfo', [
            'lecinfo' => $lecinfo
        ]);
    }

    public function layerMoreBook()
    {
        return $this->load->view('/classroom/pass/layer/morebook', []);
    }

    public function layerMyDevice()
    {
        return $this->load->view('/classroom/pass/layer/mydevice', []);
    }
}
