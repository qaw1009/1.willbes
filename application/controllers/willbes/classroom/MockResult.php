<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockResult extends \app\controllers\FrontController
{
    protected $models = array('downloadF', 'mocktest/mockExam','_lms/sys/code');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = 45;
    protected $_default_path = '/classroom/MockResult/';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 온라인 모의고사 리스트페이지
     * @return object|string
     */
    public function index()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_IsStatus = element('s_IsStatus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        $get_page_params = 's_IsStatus='.$s_IsStatus;
        $get_page_params .= 's_keyword='.$s_keyword;

        $arr_condition = [
            'EQ' => [
                //'MP.IsStatus' => 'Y',
                'MR.MemIdx'   => $_SESSION['mem_idx'],
                'MR.IsStatus' => $s_IsStatus
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $s_keyword
                ]
            ]
        ];

        $column = 'MR.MemIdx, MP.*, A.wAdminName, MR.IsTake AS MrIsStatus, MR.MrIdx,
                   (SELECT SiteGroupName FROM lms_site_group WHERE SiteGroupCode = (SELECT SiteGroupCode FROM lms_site WHERE SiteCode = PD.SiteCode)) AS SiteName,
                   (SELECT RegDatm FROM lms.lms_mock_answerpaper WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
                   (SELECT 
                        SUM(IF(MA.IsWrong = \'Y\', Scoring, \'0\')) AS Res 
                   FROM
                        lms_mock_paper AS MP
                        JOIN lms_mock_questions AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = \'Y\'
                        JOIN lms_mock_answerpaper AS MA ON MQ.MqIdx = MA.MqIdx 
                        JOIN lms_mock_register AS MMR ON MMR.MrIdx = MA.MrIdx
                   WHERE 
                        MA.MemIdx = MR.MemIdx AND MMR.ProdCode = MR.ProdCode
                   ) AS TCNT,
                   (SELECT COUNT(*) FROM lms_mock_register_r_paper WHERE MrIdx = MR.MrIdx AND ProdCode = MR.ProdCode) AS KCNT,
                   (SELECT RegDatm FROM lms_mock_answerpaper WHERE MemIdx = MR.MemIdx AND ProdCode = MR.ProdCode ORDER BY RegDatm DESC LIMIT 1) Wdate,
                   PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
                   C1.CateName, C1.IsUse AS IsUseCate, IsDisplay
                       ';
        $order_by = ['MP.ProdCode'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->mockExamModel->listBoard(true, $arr_condition);
        $paging = $this->pagination($this->_default_path.'?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {

            $list = $this->mockExamModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);

        }

        $total_img_path = PUBLICURL."uploads/willbes/mocktest/";

        $this->load->view('/classroom/mock/result/index', [
            'default_path' => $this->_default_path,
            'arr_input'    => $arr_input,
            'get_params'   => $get_params,
            'total_img_path' => $total_img_path,
            'list'         =>$list,
            'paging'       => $paging,
        ]);
    }

    /**
     * 온라인 모의고사 리스트페이지
     * @return object|string
     */
    public function winStatTotal()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode',$arr_input);

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $_SESSION['mem_idx'],
                'MR.ProdCode' => $prodcode
            ]
        ];

        $subject_list = $this->mockExamModel->subjectCall($arr_condition);
        $productInfo = $this->mockExamModel->productInfo($arr_condition);
        //종합분석
        $dataOrg    = $this->mockExamModel->gradeCall($prodcode, 'org');
        $dataAdjust = $this->mockExamModel->gradeCall($prodcode, 'adjust');
        $dataDetail = $this->mockExamModel->gradeDetailCall($prodcode);

        $tempnum = 1;
        $tempMpIdx = 0;
        foreach($dataDetail as $key => $val){
            $memidx = $val['MemIdx'];
            $mpidx = $val['MpIdx'];
            if($tempMpIdx != $mpidx) $tempnum = 1;
            $dataDetail[$memidx][$mpidx]['grade'] = $val['OrgPoint'];
            $dataDetail[$memidx][$mpidx]['gradeA'] = $val['AdjustPoint'];
            $dataDetail[$memidx][$mpidx]['avg'] = $val['ORGSUM'] / $val['COUNT'];
            $dataDetail[$memidx][$mpidx]['avgA'] = $val['ADSUM'] / $val['COUNT'];
            $dataDetail[$memidx][$mpidx]['max'] = $val['ORGMAX'];
            $dataDetail[$memidx][$mpidx]['maxA'] = $val['ADMAX'];
            $dataDetail[$memidx][$mpidx]['orank'] = $tempnum."/".$val['COUNT'];
            $dataDetail[$memidx][$mpidx]['arank'] = $val['Rank']."/".$val['COUNT'];
            $tempMpIdx = $val['MpIdx'];
            $tempnum++;
        }
        //var_dump($dataDetail);

        $orgTotal = 0;
        $orgtnum = 0;
        foreach($dataOrg as $key => $val){
            $memidx = $val['MemIdx'];
            $dataOrg[$memidx]['grade'] = $val['ORG'];
            $dataOrg[$memidx]['avg'] = round($val['ORG'] / $val['KCNT'] , 2);
            $orgTotal = $orgTotal + $val['ORG'];
            $orgtnum = $val['COUNT'] * $val['KCNT'];
            $dataOrg[$memidx]['rank'] = ($key+1).'/'.$val['COUNT'];
            $dataOrg[$memidx]['tpct'] = 100 - ((($key+1) / $val['COUNT']) * 100 - (100 / $val['COUNT']));
        }
        $dataOrg['tavg'] = round($orgTotal / $orgtnum, 2);


        $adTotal = 0;
        $tcnt = 0;
        foreach($dataAdjust as $key => $val){
            $memidx = $val['MemIdx'];
            $tcnt   = $val['COUNT'];
            $dataAdjust[$memidx]['grade'] = $val['AD'];
            $dataAdjust[$memidx]['avg'] = round($val['AD'] / $val['KCNT'] , 2);
            $adTotal = $adTotal + $val['AD'];
            $dataAdjust[$memidx]['rank'] = ($key+1).'/'.$val['COUNT'];
            $dataAdjust[$memidx]['rankS'] = ($key+1);
            $dataAdjust[$memidx]['tpct'] = 100 - ((($key+1) / $val['COUNT']) * 100 - (100 / $val['COUNT']));
            $dataAdjust[$memidx]['admax'] = $val['ADMAX'];
            //응시멤버
            $memArr[] = $memidx;
        }
        $dataAdjust['tavg'] = round($adTotal / $orgtnum, 2);
        $dataAdjust['tsum'] = round($adTotal / $tcnt, 2);
        //var_dump($dataOrg);
        //var_dump($dataAdjust);

        //종합분석(끝)

        // 필수/선택과목 컬럼수 & 이름
        $pCnt = 0;
        $sCnt = 0;
        //var_dump($subject_list);
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

        $this->load->view('/classroom/mock/result/stat_total', [
            'productInfo' => $productInfo,
            'dataOrgAll'     => $dataOrg,
            'dataOrg'     => $dataOrg[$_SESSION['mem_idx']],
            'dataAdjustAll' => $dataAdjust,
            'dataAdjust' => $dataAdjust[$_SESSION['mem_idx']],
            'memName'  => $_SESSION['mem_name'],
            'pList' => $pList,
            'sList' => $sList,
            'pList2' => $pList2,
            'sList2' => $sList2,
            'pCnt' => $pCnt,
            'sCnt' => $sCnt,
            'dataDetail' => $dataDetail[$_SESSION['mem_idx']],
            'memArr' => $memArr,
            'prodcode' => $prodcode
        ]);
    }

    /**
     * 과목별 문항분석
     * @return object|string
     */
    public function winStatSubject()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode',$arr_input);

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $_SESSION['mem_idx'],
                'MR.ProdCode' => $prodcode
            ]
        ];

        $subject_list = $this->mockExamModel->subjectCall($arr_condition);
        $productInfo = $this->mockExamModel->productInfo($arr_condition);

        //과목별 문항분석 쿼리(mode = 1) , 영역 및 학습요소(mode = 2)
        $dataSubject = $this->mockExamModel->gradeSubjectDetailCall($prodcode, 1);
        $dataSubject2 = $this->mockExamModel->gradeSubjectDetailCall($prodcode, 2);

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

        $this->load->view('/classroom/mock/result/stat_subject', [
            'productInfo' => $productInfo,
            'arr_input' => $arr_input,
            'dataSubject' => $dataSubject,
            'dataSubjectV2' => $dataSubjectV2,
            'memName'  => $_SESSION['mem_name'],
            'pList' => $pList,
            'prodcode' => $prodcode
        ]);
    }

    /**
     * 오답노트
     * @return object|string
     */
    public function winAnswerNote()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode',$arr_input);
        $mpidx = element('mpidx',$arr_input);
        $MalIdx = element('MalIdx',$arr_input);

        $MalArr = array();
        if(empty($MalIdx) === false){
            $MalCnt = COUNT($MalIdx);
            for($i = 0; $i<$MalCnt; $i++){
                $MalArr[] = $MalIdx[$i];
            }
        }

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $_SESSION['mem_idx'],
                'MR.ProdCode' => $prodcode
            ]
        ];

        //print_r($_POST);

        $subject_list = $this->mockExamModel->subjectCall($arr_condition);
        $productInfo = $this->mockExamModel->productInfo($arr_condition);

        foreach ($subject_list as $key => $val){
            if(empty($mpidx) === true) $mpidx = $val['MpIdx'];
            $pList[$val['MpIdx']] = $val['SubjectName'];
        }

        //과목별 문항분석 쿼리(mode = 1) , 영역 및 학습요소(mode = 2)
        $MalIdxSet = '';
        if($MalIdx){
            foreach ($MalIdx as $key => $val){
                if($key == 0) $MalIdxSet = $val;
                else          $MalIdxSet .= ','.$val;
            }
        }

        echo $MalIdxSet;

        $answerNote = $this->mockExamModel->answerNoteCall($prodcode, $mpidx, $MalIdxSet);

        //문항이미지경로
        $img_path = PUBLICURL."uploads/willbes/mocktest/".$mpidx."/question/";

        $this->load->view('/classroom/mock/result/wrong_answer_note', [
            'productInfo' => $productInfo,
            'arr_input' => $arr_input,
            'pList' => $pList,
            'prodcode' => $prodcode,
            'img_path' => $img_path,
            'answerNote' => $answerNote,
            'MalArr' => $MalArr
        ]);
    }

    /**
     * 영역선택 ajax
     * @return object|string
     */
    public function selAreaAjax()
    {
        ////////////////////////////////////////////////
        /// $orderidx = $this->_req("OrderIdx");
        //        $prodcode = $this->_req("ProdCode");

        $prodcode = $this->_req("prodcode");
        $mpidx = $this->_req("mpidx");

        $list = $this->mockExamModel->selArea($prodcode, $mpidx);

        return $this->response([
            'data' => $list
        ]);

    }

    /**
     * 오답노트 저장
     * @return object|string
     */
    public function noteAddAjax()
    {
        ////////////////////////////////////////////////
        $result = $this->mockExamModel->noteAdd($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);

    }

    /**
     * 오답노트 삭제
     * @return object|string
     */
    public function noteDeleteAjax()
    {
        ////////////////////////////////////////////////
        $result = $this->mockExamModel->noteDelete($this->_reqP(null, false));
        $this->json_result($result, '삭제되었습니다.', $result, $result);

    }

    /**
     * 문제해설
     * @return object|string
     */
    public function qaFileAjax()
    {
        ////////////////////////////////////////////////
        $result = $this->mockExamModel->qaFile($this->_reqP(null, false));
        $this->json_result($result, '삭제되었습니다.', $result, $result);
    }

    /**
     * 문제/해설 ajax
     * @return object|string
     */
    public function selQaFileAjax()
    {

        $prodcode = $this->_req("prodcode");

        $list = $this->mockExamModel->selQaFile($prodcode);

        return $this->response([
            'data' => $list
        ]);

    }



}
