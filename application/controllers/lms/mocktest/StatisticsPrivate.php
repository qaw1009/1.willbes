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

        $this->load->view('mocktest/statistics/private/index', [
            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),
            'professor' => $this->searchProfessorModel->professorList('', '', '', false),
            'upImgUrl' => $this->config->item('upload_url_mock', 'mock'),
        ]);
    }


    /**
     * 리스트
     */
    public function list()
    {

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
                'MP.AcceptStatusCcd' => $this->input->post('search_AcceptStatus'),
                'MP.TakeType' => $this->input->post('search_TakeType'),
                'PD.IsUse' => $this->input->post('search_use'),
            ],
            'LKB' => [
                'MP.MockPart' => $this->input->post('search_cateD2'),
                'MP.TakeFormsCcd' => $this->input->post('search_TakeFormsCcd'),
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


        list($data, $count) = $this->regGradeModel->privateList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }




    /**
     * 모의고사정보
     */
    public function statSubject($param = [])
    {
        $prodcode = $param[0];
        $memidx = $param[1];

        $productInfo = $this->regGradeModel->productInfo($prodcode);

        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값

        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        $SiteCode = $productInfo['SiteCode'];
        if(empty($productInfo)===false){
            $productInfo['SiteName'] = $_SESSION['admin_auth_data']['Site'][$SiteCode]['SiteName'];

            $mockPart = explode(',', $productInfo['MockPart']);
            foreach ($mockPart as $mp) {
                if( !empty($codes[$mockKindCode][$mp]) ){
                    $productInfo['MockPartName'][] = $codes[$mockKindCode][$mp];
                }
            }
        }

        $listArr = $this->regGradeModel->subjectDetailPrivate($prodcode, $memidx);

        $MpIdxSet = $listArr['MpIdxSet'];
        $list = $listArr['rdata'];

        $this->load->view('mocktest/statistics/private/stat_subject', [
            'productInfo' => $productInfo,
            'list' => $list,
            'MpIdxSet' => $MpIdxSet,
            'prodcode' => $prodcode,
            'memidx' => $memidx
        ]);
    }


    /**
     * 온라인 모의고사 팝업
     * @return object|string
     */
    public function winStatTotal()
    {
        $prodcode = $this->input->get('prodcode');
        $memidx = $this->input->get('memidx');

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $memidx,
                'MR.ProdCode' => $prodcode
            ]
        ];

        $subject_list = $this->regGradeModel->subjectCall($arr_condition);
        $productInfo = $this->regGradeModel->productInfoV2($arr_condition);
        //종합분석
        $dataOrg    = $this->regGradeModel->gradeCall($prodcode, 'org');
        $dataAdjust = $this->regGradeModel->gradeCall($prodcode, 'adjust');
        $dataDetail = $this->regGradeModel->gradeDetailCall($prodcode);

        $tempnum = 1;
        $tempMpIdx = 0;
        foreach($dataDetail as $key => $val){
            $MemIdx = $val['MemIdx'];
            $mpidx = $val['MpIdx'];
            if($tempMpIdx != $mpidx) $tempnum = 1;
            $dataDetail[$MemIdx][$mpidx]['grade'] = $val['OrgPoint'];
            $dataDetail[$MemIdx][$mpidx]['gradeA'] = $val['AdjustPoint'];
            $dataDetail[$MemIdx][$mpidx]['avg'] = $val['ORGSUM'] ? round($val['ORGSUM'] / $val['COUNT'],2) : 0;
            $dataDetail[$MemIdx][$mpidx]['avgA'] = $val['ORGSUM'] ? round($val['ADSUM'] / $val['COUNT'],2) : 0;
            $dataDetail[$MemIdx][$mpidx]['max'] = $val['ORGMAX'];
            $dataDetail[$MemIdx][$mpidx]['maxA'] = $val['ADMAX'];
            $dataDetail[$MemIdx][$mpidx]['orank'] = $tempnum."/".$val['COUNT'];
            $dataDetail[$MemIdx][$mpidx]['arank'] = $val['Rank']."/".$val['COUNT'];
            $tempMpIdx = $val['MpIdx'];
            $tempnum++;
        }

        //var_dump($dataDetail);

        $orgTotal = 0;
        $orgtnum = 0;
        if($dataOrg){
            foreach($dataOrg as $key => $val){
                $MemIdx = $val['MemIdx'];
                $dataOrg[$MemIdx]['grade'] = $val['ORG'];
                $dataOrg[$MemIdx]['avg'] = round($val['ORG'] / $val['KCNT'] , 2);
                $orgTotal = $orgTotal + $val['ORG'];
                $orgtnum = $val['COUNT'] * $val['KCNT'];
                $dataOrg[$MemIdx]['rank'] = ($key+1).'/'.$val['COUNT'];
                $dataOrg[$MemIdx]['tpct'] = round(100 - ((($key+1) / $val['COUNT']) * 100 - (100 / $val['COUNT'])),2);
            }
        }


        if($orgTotal) $dataOrg['tavg'] = $orgTotal ? round($orgTotal / $orgtnum, 2) : 0;

        $adTotal = 0;
        $tcnt = 0;
        $memArr = array();
        foreach($dataAdjust as $key => $val){
            $MemIdx = $val['MemIdx'];
            $tcnt   = $val['COUNT'];
            $dataAdjust[$MemIdx]['grade'] = $val['AD'];
            $dataAdjust[$MemIdx]['avg'] = round($val['AD'] / $val['KCNT'] , 2);
            $adTotal = $adTotal + $val['AD'];
            $dataAdjust[$MemIdx]['rank'] = ($key+1).'/'.$val['COUNT'];
            $dataAdjust[$MemIdx]['rankS'] = ($key+1);
            $dataAdjust[$MemIdx]['tpct'] = round(100 - ((($key+1) / $val['COUNT']) * 100 - (100 / $val['COUNT'])),2);
            $dataAdjust[$MemIdx]['admax'] = $val['ADMAX'];
            //응시멤버
            $memArr[] = $MemIdx;
        }
        if($adTotal) $dataAdjust['tavg'] = $adTotal ? round($adTotal / $orgtnum, 2) : 0;
        if($adTotal) $dataAdjust['tsum'] = $adTotal ? round($adTotal / $tcnt, 2) : 0;
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
            'dataAdjustAll' => $dataAdjust,
            'dataAdjust' => $dataAdjust,
            'memName'  => $_SESSION['mem_name'],
            'pList' => $pList,
            'sList' => $sList,
            'pList2' => $pList2,
            'sList2' => $sList2,
            'pCnt' => $pCnt,
            'sCnt' => $sCnt,
            'dataDetail' => $dataDetail,
            'memArr' => $memArr,
            'prodcode' => $prodcode,
            'mem_idx' => $memidx
        ]);
    }

    /**
     * 과목별 문항분석
     * @return object|string
     */
    public function winStatSubject()
    {
        $prodcode = $this->input->get('prodcode');
        $memidx = $this->input->get('memidx');

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $memidx,
                'MR.ProdCode' => $prodcode
            ]
        ];

        $subject_list = $this->regGradeModel->subjectCall($arr_condition);
        $productInfo = $this->regGradeModel->productInfoV2($arr_condition);

        //과목별 문항분석 쿼리(mode = 1) , 영역 및 학습요소(mode = 2)
        $dataSubject = $this->regGradeModel->gradeSubjectDetailCall($prodcode, 1);
        $dataSubject2 = $this->regGradeModel->gradeSubjectDetailCall($prodcode, 2);

        // 문항별분석
        foreach($dataSubject as $key => $val){
            $mpidx = $val['MpIdx'];
            $dataSubject[$mpidx]['RightAnswer'][] = $val['RightAnswer'];
            $dataSubject[$mpidx]['Answer'][] = $val['Answer'];
            $dataSubject[$mpidx]['IsWrong'][] = $val['IsWrong'];
            $dataSubject[$mpidx]['QAVR'][] = $val['QAVR'];
            $dataSubject[$mpidx]['Difficulty'][] = $val['Difficulty'];
        }

        foreach ($subject_list as $key => $val){
            $pList[$val['MpIdx']] = $val['SubjectName'];
        }

        // 영역 및 학습요소
        foreach($dataSubject2 as $key => $val){
            $mpidx = $val['MpIdx'];
            $malidx = $val['MpIdx'].$val['MalIdx'];
            $dataSubjectV2[$malidx]['areaName'] = $val['areaName'];
            if($val['IsWrong'] == 'N') $dataSubjectV2[$malidx]['XCNT'][] = $val['QuestionNO'];
            else                       $dataSubjectV2[$malidx]['OCNT'][] = $val['QuestionNO'];
            $dataSubjectV2[$malidx]['ALL'][] = $val['QuestionNO'];
            $dataSubjectV2[$malidx]['AVR'] = $val['AVR'];
            $dataSubjectV2[$malidx]['QuestionNO'][] = $val['QuestionNO'];
            $dataSubjectV2[$malidx]['MP'] = $pList[$mpidx];
        }

        $this->load->view('/mocktest/statistics/private/winpopup_stat', [
            'productInfo' => $productInfo,
            'dataSubject' => $dataSubject,
            'dataSubjectV2' => $dataSubjectV2,
            'memName'  => $_SESSION['mem_name'],
            'pList' => $pList,
            'prodcode' => $prodcode,
            'mem_idx' => $memidx
        ]);
    }

}
