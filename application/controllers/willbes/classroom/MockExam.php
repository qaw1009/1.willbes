<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockExam extends \app\controllers\FrontController
{
    protected $models = array('downloadF', 'mocktest/mockExam','_lms/sys/code');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = 45;
    protected $_default_path = '/classroom/MockExam/';
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

        $column = 'MP.*, A.wAdminName, MR.IsTake AS MrIsStatus, MR.MrIdx,
                   (SELECT SiteGroupName FROM lms_site_group WHERE SiteGroupCode = (SELECT SiteGroupCode FROM lms_site WHERE SiteCode = PD.SiteCode)) AS SiteName,
                   (SELECT RegDatm FROM lms.lms_mock_answerpaper WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
                   PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
                   C1.CateName, C1.IsUse AS IsUseCate
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

        //var_dump($list);

        $this->load->view('/classroom/mock/exam/index', [
            'default_path' => $this->_default_path,
            'arr_input'    => $arr_input,
            'get_params'   => $get_params,
            'list'         => $list,
            'paging'       => $paging,
        ]);
    }

    /**
     * 온라인 모의고사 팝업페이지 1단계
     * @return object|string
     */
    public function winPopupStep1()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode',$arr_input);
        $mridx = element('mridx',$arr_input);

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $_SESSION['mem_idx'],
                'MR.ProdCode' => $prodcode
            ]
        ];

        $subject_list = $this->mockExamModel->subjectCall($arr_condition);
        $productInfo = $this->mockExamModel->productInfo($arr_condition);
        //응시로그 저장
        $sec = $productInfo['TakeTime'] * 60;

        $isTemp = $this->mockExamModel->isExamTemp($prodcode);

        if($isTemp) $sec = $this->mockExamModel->callRemainTime($isTemp);

        $logIdx = $this->mockExamModel->makeExamLog($sec,$mridx);
        // 필수/선택과목 컬럼수 & 이름
        $pCnt = 0;
        $sCnt = 0;

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

        $arr_condition2 = [
            'IN' => [
                'MP.MpIdx' => $tMpIdx
            ]
        ];

        $qtCntList = $this->mockExamModel->questionTempCnt($arr_condition2);
        foreach ($qtCntList as $key => $val) {
            $mpIdx = $val['MpIdx'];
            $qtList[$mpIdx]['CNT'] =  $val['CNT'];
            $qtList[$mpIdx]['TCNT'] =  $val['TCNT'];
        }

        $this->load->view('/classroom/mock/exam/winpopup_step1', [
            'productInfo' => $productInfo,
            'arr_input'   => $arr_input,
            'pCnt'        => $pCnt,
            'sCnt'        => $sCnt,
            'pList'       => $pList,
            'pList2'       => $pList2,
            'sList'       => $sList,
            'sList2'       => $sList2,
            'logidx'      => $logIdx,
            'qtList'   => $qtList,
            'RemainSec' => $sec
        ]);

    }

    /**
     * 온라인 모의고사 팝업페이지 2단계
     * @return object|string
     */
    public function winPopupStep2()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode',$arr_input);
        $s_mpidx = element('s_mpidx',$arr_input);
        $logidx = element('logidx',$arr_input);
        $RemainSec = element('RemainSec',$arr_input);
        $mridx = element('mridx',$arr_input);

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $_SESSION['mem_idx'],
                'MR.ProdCode' => $prodcode
            ]
        ];

        $subject_list = $this->mockExamModel->subjectCall($arr_condition);
        $productInfo = $this->mockExamModel->productInfo($arr_condition);


        if(empty($s_mpidx)==true){
            $s_mpidx = $subject_list[0]['MpIdx'];
        }

        $question_list = $this->mockExamModel->questionCall($s_mpidx,$prodcode);

        //로그에서 남은시간 호출
        $rSec = $this->mockExamModel->callRemainTime($logidx);
        if(empty($RemainSec) === true) $RemainSec = $rSec;

        $logidx = $this->mockExamModel->makeExamLog($RemainSec,$mridx);

        // 필수/선택과목 컬럼수 & 이름
        $pCnt = 0;
        $sCnt = 0;
        foreach ($subject_list as $key => $val){
            if($val['MockType'] == 'E'){
                $pCnt++;
                $pList[] = $val['SubjectName']; //과목명
                $pMpIdx[] = $val['MpIdx'];      //시험지번호
            }
            if($val['MockType'] == 'S'){
                $sCnt++;
                $sList[] = $val['SubjectName']; //과목명
                $sMpIdx[] = $val['MpIdx'];      //시험지번호
            }
            $tMpIdx[] =  $val['MpIdx'];
        }

        $arr_condition2 = [
            'IN' => [
                'MP.MpIdx' => $tMpIdx
            ]
        ];

        $qtCntList = $this->mockExamModel->questionTempCnt($arr_condition2);
        $etcALLYN = "YES";
        foreach ($qtCntList as $key => $val) {
            $mpIdx = $val['MpIdx'];
            $qtList[$mpIdx]['CNT'] =  $val['CNT'];
            $qtList[$mpIdx]['TCNT'] =  $val['TCNT'];

            if($s_mpidx != $mpIdx){
                if($val['CNT'] != $val['TCNT']) $etcALLYN = "NO";
            }
        }

        //문항이미지경로
        $img_path = PUBLICURL."uploads/willbes/mocktest/".$s_mpidx."/question/";
        $total_img_path = PUBLICURL."uploads/willbes/mocktest/".$s_mpidx."/";

        $this->load->view('/classroom/mock/exam/winpopup_step2', [
            'productInfo'    => $productInfo,
            'question_list'  => $question_list,
            'arr_input'      => $arr_input,
            'pCnt'           => $pCnt,
            'sCnt'           => $sCnt,
            'pList'          => $pList,
            'sList'          => $sList,
            'pMpIdx'         => $pMpIdx,
            'sMpIdx'         => $sMpIdx,
            'img_path'       => $img_path,
            's_mpidx'        => $s_mpidx,
            'total_img_path' => $total_img_path,
            'RemainSec'      => $RemainSec,
            'tMpIdx'         => $tMpIdx,
            'MrIdx'          => $subject_list[0]['MrIdx'],
            'qtList'         => $qtList,
            'etcALLYN'       => $etcALLYN
        ]);
    }

    /**
     * 온라인 모의고사 팝업페이지 3단계(정답제출)
     * @return object|string
     */
    public function winPopupStep3()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('ProdCode',$arr_input);
        $logIdx = element('LogIdx',$arr_input);
        $qcnt = element('QCnt',$arr_input);

        for($i = 1; $i <= $qcnt; $i++){
            ${"answer$i"} = element('answer'.$i,$arr_input);
        }

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $_SESSION['mem_idx'],
                'MR.ProdCode' => $prodcode
            ]
        ];

        $subject_list = $this->mockExamModel->subjectCall($arr_condition);
        $productInfo = $this->mockExamModel->productInfo($arr_condition);
        //응시로그 저장
        $sec = $productInfo['TakeTime'] * 60;

        $isTemp = $this->mockExamModel->isExamTemp($prodcode);

        if($isTemp) $sec = $this->mockExamModel->callRemainTime($isTemp);

        // 필수/선택과목 컬럼수 & 이름
        $pCnt = 0;
        $sCnt = 0;

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

        $arr_condition2 = [
            'IN' => [
                'MP.MpIdx' => $tMpIdx
            ]
        ];

        $qtCntList = $this->mockExamModel->questionTempCnt($arr_condition2);
        foreach ($qtCntList as $key => $val) {
            $mpIdx = $val['MpIdx'];
            $qtList[$mpIdx]['CNT'] =  $val['CNT'];
            $qtList[$mpIdx]['TCNT'] =  $val['TCNT'];
        }

        $this->load->view('/classroom/mock/exam/winpopup_step3', [
            'productInfo' => $productInfo,
            'arr_input'   => $arr_input,
            'pCnt'        => $pCnt,
            'sCnt'        => $sCnt,
            'pList'       => $pList,
            'pList2'       => $pList2,
            'sList'       => $sList,
            'sList2'       => $sList2,
            'logidx'      => $logIdx,
            'MrIdx'          => $subject_list[0]['MrIdx'],
            'qtList'   => $qtList,
            'RemainSec' => $sec
        ]);

    }

    /**
     * 정답 임시저장 1개씩
     * @return object|string
     */
    public function answerAjax()
    {
        $result = $this->mockExamModel->answerTempSave($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);

    }

    /**
     * 임시저장 전체
     * @return object|string
     */
    public function tempSaveAjax()
    {
        ////////////////////////////////////////////////
        $result = $this->mockExamModel->answerTempAllSave($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);

    }

    /**
     * 시간저장
     * @return object|string
     */
    public function timeSaveAjax()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $LogIdx = element('LogIdx',$arr_input);
        $RemainSec = element('RemainSec',$arr_input);
        $result = $this->mockExamModel->saveTime($LogIdx, $RemainSec);
        $this->json_result($result, '저장되었습니다.', $result, $result);

    }

    /**
     * 정답제출
     * @return object|string
     */
    public function examSendAjax()
    {
        $result = $this->mockExamModel->examSend($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 시험종료
     * @return object|string
     */
    public function examEndAjax()
    {
        $result = $this->mockExamModel->examEnd($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);

    }



}
