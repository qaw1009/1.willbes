<?php
/**
 * ======================================================================
 * 모의고사등록 > 과목별 문제등록
 * ======================================================================
 *
 * 보기형식 - S:객관식(단일정답), M:객관식(복수정답), J:주관식
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class StatisticsPrivate extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'product/base/subject', 'common/searchProfessor', 'mocktest/mockCommon', 'mocktest/regGrade');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메인
     */
    public function index()
    {
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();

        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $arrtab = array();

        $this->load->view('mocktest/statistics/private/index', [
            'siteCodeDef' => '2002', //$this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),
            'professor' => $this->searchProfessorModel->professorList('', '', '', false),
            'upImgUrl' => $this->config->item('upload_url_mock', 'mock'),
            'arrsite' => $arrsite,
            'arrtab' => $arrtab
        ]);
    }


    /**
     * 리스트
     */
    public function list($params = [])
    {
        if(empty($params) == false) {
            $excel = $params[0];
        } else {
            $excel = '';
        }

        $rules = [
            ['field' => 'search_site_code', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_cateD1', 'label' => '카테고리', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_cateD2', 'label' => '직렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_TakeFormsCcd', 'label' => '응시형태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_AcceptStatus', 'label' => '접수상태', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_use', 'label' => '사용여부', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'PD.SiteCode' => $this->input->post('search_site_code'),
                'PC.CateCode' => $this->input->post('search_cateD1'),
                'MP.MockYear' => $this->input->post('search_year'),
                'MP.MockRotationNo' => $this->input->post('search_round'),
                'RP.SubjectIdx' => $this->input->post('search_subject'),
                'MO.ProfIdx' => $this->input->post('search_professor'),
                'MP.AcceptStatusCcd' => $this->input->post('search_AcceptStatus'),
                'MP.TakeType' => $this->input->post('search_TakeType'),
                'PD.IsUse' => $this->input->post('search_use'),
            ],
            'LKB' => [
                'MR.TakeMockPart' => $this->input->post('search_cateD2'),
                'MR.TakeForm' => $this->input->post('search_TakeFormsCcd'),
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $this->input->post('search_fi', true),
                    'A.wAdminName' => $this->input->post('search_fi', true),
                    'PD.SaleStartDatm' => $this->input->post('search_fi', true),
                    'PD.SaleEndDatm' => $this->input->post('search_fi', true),
                    'PS.RealSalePrice' => $this->input->post('search_fi', true),
                ]
            ],
        ];

        if($excel === 'Y') {
            set_time_limit(0);
            ini_set('memory_limit', $this->_memory_limit_size);

            $data  = $this->regGradeModel->privateListExcel($condition);
            // export excel
            $file_name = '개인별성적통계_'.date('Ymd');

            $headers = ['회원명', '연락처', '응시번호', '응시형태', '연도', '회차', '모의고사명', '카테고리', '직렬', '과목', '응시지역', '총점', '등록일'];

            $this->load->library('excel');
            if ($this->excel->exportHugeExcel($file_name, $data, $headers) !== true) {
                show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
            }
        } else {
            list($data, $count) = $this->regGradeModel->privateList($condition, $this->input->post('length'), $this->input->post('start'));

            return $this->response([
                'recordsTotal' => $count,
                'recordsFiltered' => $count,
                'data' => $data,
            ]);
        }
    }

    /**
     * 모의고사정보
     */
    public function statSubject($param = [])
    {
        $prodcode = $param[0];
        $mridx = $param[1];

        $privateExamInfo = $this->regGradeModel->privateExamInfo($prodcode, $mridx);

        $listArr = $this->regGradeModel->subjectDetailPrivate($prodcode, $mridx);
        //전체과목평균
        $sumRank = $this->regGradeModel->subjectAllAvg($prodcode, $mridx);
        $arrSumRank = explode("/",$sumRank);

        $MpIdxSet = $listArr['MpIdxSet'];
        $list = $listArr['rdata'];
        $CNT = $listArr['CNT'];
        $per = round(100 - ((($arrSumRank[0]) / $CNT) * 100 - (100 / $CNT)), 2);

        $this->load->view('mocktest/statistics/private/stat_subject', [
            'privateExamInfo' => $privateExamInfo,
            'list' => $list,
            'MpIdxSet' => $MpIdxSet,
            'prodcode' => $prodcode,
            'mridx' => $mridx,
            'sumRank' => $sumRank,
            'per' => $per
        ]);
    }

    /**
     * 온라인 모의고사 팝업
     * @return object|string
     */
    public function winStatTotal()
    {
        $prodcode = $this->input->get('prodcode');
        $mridx = $this->input->get('mridx');

        $arr_condition = [
            'EQ' => [
                'MR.MrIdx' => $mridx,
                'MR.ProdCode' => $prodcode
            ]
        ];

        $subject_list = $this->regGradeModel->subjectCall($arr_condition);
        $productInfo = $this->regGradeModel->productInfoV2($arr_condition);
        //종합분석
        $dataOrg    = $this->regGradeModel->gradeCall($prodcode, 'org', $mridx);
        $dataAdjust = $this->regGradeModel->gradeCall($prodcode, 'adjust', $mridx);
        $dataDetail = $this->regGradeModel->gradeDetailCall($prodcode, $mridx);

        foreach($dataDetail as $key => $val){
            $mpidx = $val['MpIdx'];

            $dataDetailV[$mpidx]['grade'] = $val['OrgPoint'];
            $dataDetailV[$mpidx]['gradeA'] = $val['AdjustPoint'];
            $dataDetailV[$mpidx]['avg'] = $val['ORGSUM'] ? round($val['ORGSUM'] / $val['COUNT'],2) : 0;
            $dataDetailV[$mpidx]['avgA'] = $val['ADSUM'] ? round($val['ADSUM'] / $val['COUNT'],2) : 0;
            $dataDetailV[$mpidx]['max'] = round($val['ORGMAX'],2);
            $dataDetailV[$mpidx]['maxA'] = round($val['ADMAX'],2);
            $dataDetailV[$mpidx]['orank'] = $val['Rank']."/".$val['COUNT'];
            $dataDetailV[$mpidx]['arank'] = $val['Rank']."/".$val['COUNT'];
        }

        if($dataOrg){
            $Point = round($dataOrg['ORG'] / $dataOrg['KCNT'] , 2);
            $OrgRank = $dataOrg['OrgRank'];
            $arrOrgRank = explode('/',$OrgRank);
            $dataOrg['grade'] = $dataOrg['ORG'];
            $dataOrg['avg'] = $Point;
            $dataOrg['rank'] = $OrgRank;
            $dataOrg['tpct'] = round(100 - (( $arrOrgRank[0] / $dataOrg['COUNT']) * 100 - (100 / $dataOrg['COUNT'])),2);
            $dataOrg['tavg'] = $dataOrg['tavg'];
            $dataOrg['tsum'] = $dataOrg['tsum'];
        }

        $ADRank = $dataAdjust['ADRank'];
        $arrADRank = explode('/',$ADRank);

        $dataAdjust['grade'] = round($dataAdjust['AD'],2);
        $dataAdjust['avg'] = round($dataAdjust['AD'] / $dataAdjust['KCNT'] , 2);
        $dataAdjust['rank'] =  $ADRank;
        $dataAdjust['rankS'] = $arrADRank[0];
        $dataAdjust['tavg'] = $dataAdjust['tavg'];
        $dataAdjust['tsum'] = $dataAdjust['tsum'];
        $dataAdjust['tpct'] = round(100 - (($arrADRank[0] / $dataAdjust['COUNT']) * 100 - (100 / $dataAdjust['COUNT'])),2);
        $dataAdjust['admax'] = $dataAdjust['ADMAX'];

        //응시자 평균점수 분포표용
        $dataGraph = $this->regGradeModel->adjustPointData($prodcode);

        foreach ($dataGraph as $key => $val){
            $dataSet[] = $val['AVG'];
        }

        //종합분석(끝)

        // 필수/선택과목 컬럼수 & 이름
        $pCnt = 0;
        $sCnt = 0;
        $sList = array();
        $sList2 = array();
        $pList = array();
        $pList2 = array();
        $tMpIdx = array();

        foreach ($subject_list as $key => $val){
            if($val['MockType'] == 'E'){
                $pCnt++;
                $pList[] = $val['SubjectName'];
                $pList2[$val['MpIdx']] = $val['SubjectName'];
            }
            if($val['MockType'] == 'S'){
                $sCnt++;
                $sList[] = $val['SubjectName'];
                $sList2[$val['MpIdx']] = $val['SubjectName'];
            }

            $tMpIdx[] =  $val['MpIdx'];
        }

        $this->load->view('mocktest/statistics/private/winpopup_total', [
            'productInfo' => $productInfo,
            'dataOrgAll'     => $dataOrg,
            'dataOrg'     => $dataOrg,
            'dataAdjust' => $dataAdjust,
            'pList' => $pList,
            'sList' => $sList,
            'pList2' => $pList2,
            'sList2' => $sList2,
            'pCnt' => $pCnt,
            'sCnt' => $sCnt,
            'dataDetail' => $dataDetailV,
            'prodcode' => $prodcode,
            'mridx' => $mridx,
            'dataSet' => $dataSet
        ]);
    }

    /**
     * 과목별 문항분석
     * @return object|string
     */
    public function winStatSubject()
    {
        $prodcode = $this->input->get('prodcode');
        $mridx = $this->input->get('mridx');

        $arr_condition = [
            'EQ' => [
                'MR.MrIdx' => $mridx,
                'MR.ProdCode' => $prodcode
            ]
        ];

        $subject_list = $this->regGradeModel->subjectCall($arr_condition);
        $productInfo = $this->regGradeModel->productInfoV2($arr_condition);

        //과목별 문항분석 쿼리(mode = 1) , 영역 및 학습요소(mode = 2)
        $dataSubject = $this->regGradeModel->gradeSubjectDetailCall($prodcode, $mridx, 1);
        $dataSubject2 = $this->regGradeModel->gradeSubjectDetailCall($prodcode, $mridx, 2);

        // 문항별분석
        foreach($dataSubject as $key => $val){
            $mpidx = $val['MpIdx'];
            $dataSubjectV[$mpidx]['RightAnswer'][] = $val['RightAnswer'];
            $dataSubjectV[$mpidx]['Answer'][] = $val['Answer'];
            $dataSubjectV[$mpidx]['IsWrong'][] = $val['IsWrong'];
            $dataSubjectV[$mpidx]['QAVR'][] = $val['QAVR'];
            $dataSubjectV[$mpidx]['Difficulty'][] = $val['Difficulty'];
        }

        foreach ($subject_list as $key => $val){
            $pList[$val['MpIdx']] = $val['SubjectName'];
            $pIsList[] = $val['MpIdx'];
        }
        // 영역 및 학습요소
        foreach($dataSubject2 as $key => $val){
            $mpidx = $val['MpIdx'];
            $malidx = $val['MpIdx'].$val['MalIdx'];
            //선택과목에 안본시험은 나올필요가 없기때문에 처리
            if (in_array($mpidx, $pIsList)) {
                $dataSubjectV2[$malidx]['areaName'] = $val['areaName'];
                if ($val['IsWrong'] == 'N') $dataSubjectV2[$malidx]['XCNT'][] = $val['QuestionNO'];
                else                       $dataSubjectV2[$malidx]['OCNT'][] = $val['QuestionNO'];
                $dataSubjectV2[$malidx]['ALL'][] = $val['QuestionNO'];
                $dataSubjectV2[$malidx]['AVR'] = $val['AVR'];
                $dataSubjectV2[$malidx]['QuestionNO'][] = $val['QuestionNO'];
                $dataSubjectV2[$malidx]['MP'] = $pList[$mpidx];
            }
        }

        $this->load->view('/mocktest/statistics/private/winpopup_stat', [
            'productInfo' => $productInfo,
            'dataSubject' => $dataSubjectV,
            'dataSubjectV2' => $dataSubjectV2,
            'pList' => $pList,
            'prodcode' => $prodcode,
            'mridx' => $mridx
        ]);
    }

}
