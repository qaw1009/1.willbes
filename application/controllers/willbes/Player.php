<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends \app\controllers\FrontController
{
    protected $models = array('classroomF', 'playerF', 'product/productF', 'product/professorF', '_lms/sys/code', 'memberF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('index');

    private $_groupCcd = [
        'consult_ccd' => '702',   //유형 그룹 코드 = 상담유형
    ];

    protected $_profReferDataName = [
        'OT' => 'ot_url',
        'WS' => 'wsample_url',
        'S1' => 'sample_url1',
        'S2' => 'sample_url2',
        'S3' => 'sample_url3'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 정상강좌 수강
     * @return object|string
     */
    public function index()
    {
        $orderidx = $this->_req('o');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('sp');
        $unitidx = $this->_req('u');
        $quility = $this->_req('q');
        $time = $this->_req('t');

        $today = date("Y-m-d", time());
        $ispause = 'N';
        $isstart = 'Y';
        $timeover = 'N';

        if($this->session->userdata('is_login') === true){
            $MemId = $this->session->userdata('mem_id');
        } else {
            show_alert("로그인해야 수강이 가능합니다.", 'close');
        }

        // 사용자 가 BtoB 회원인지 체크
        $btob = $this->memberFModel->getBtobMember($this->session->userdata('mem_idx'));
        if(empty($btob['BtobIdx']) == false) {
            // BtoB 회원 수강가능한 아이피인지 체크
            $btob_ip = $this->memberFModel->btobIpCheck($btob['BtobIdx']);

            if (empty($btob_ip['ApprovalIp']) == true) {
                // 아이피 목록 없음
                show_alert("수강이 불가능한 장소입니다.", 'close');
            } elseif ($btob_ip['ApprovalIp'] != $this->input->ip_address()) {
                // 아이피가 있을때 다시 한번 아이피 확인 불일치
                show_alert("수강이 불가능한 장소입니다.", 'close');
            }
        }

        if(empty($orderidx) === true || empty($prodcode) === true || empty($prodcodesub) === true){
            show_alert('강좌정보가 없습니다.', 'close');
        }

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            show_alert('강좌정보가 없습니다.', 'close');
        }

        $lec = $lec[0];

        // 종합반이면 종합반으로 부터 일시중지 등 정보 얻어오기
        if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004'){
            $pkg = $this->classroomFModel->getPackage([
                'EQ' => [
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'OrderIdx' => $orderidx,
                    'ProdCode' => $prodcode
                ],
                'GTE' => [
                    'RealLecEndDate' => $today
                ]
            ]);

            $pkg = $pkg[0];

            $lec['lastPauseEndDate'] = $pkg['lastPauseEndDate'];
            $lec['lastPauseStartDate'] = $pkg['lastPauseStartDate'];
            $lec['PauseSum'] = $pkg['PauseSum'];
            $lec['PauseCount'] = $pkg['PauseCount'];
            $lec['ExtenSum'] = $pkg['ExtenSum'];
            $lec['ExtenCount'] = $pkg['ExtenCount'];
        }

        if($lec['LecStartDate'] > $today){
            $isstart = 'N';
        } else if ( $lec['lastPauseStartDate'] <= $today && $lec['lastPauseEndDate'] >= $today) {
            $isstart = 'N';
            $ispause = 'Y';
        } else {
            $isstart = 'Y';
        }

        if($isstart == 'N'){
            show_alert('아직 수강시작 전인 강의입니다.');
        }

        if($ispause == 'Y'){
            show_alert('일시중지 중인 강의입니다.');
        }

        // 회차 열어준경우 IN 생성
        if(empty($lec['wUnitIdxs']) == true){
            $wUnitIdxs = [];
        } else {
            $wUnitIdxs = explode(',', $lec['wUnitIdxs']);
        }

        // 커리큘럼 읽어오기
        $data = $this->classroomFModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lec['wLecIdx'],
                'wUnitIdx' => $unitidx
            ],
            'IN' => [
                'wUnitIdx' => $wUnitIdxs
            ]
        ]);

        if(empty($data) == true){
            show_alert('강의 정보가 없습니다.', 'close');
        }

        $data = $data[0];

        if(empty($lec['MultipleApply']) == true){
            // 무제한
            $timeover = 'N';
        }
        else if($lec['MultipleApply'] == '1'){
            // 무제한
            $timeover = 'N';

        } elseif($lec['MultipleTypeCcd'] == '612001') {
            // 회차별 수강시간 체크

            // 수강시간은 초
            $studytime = intval($data['RealStudyTime']);
            // 제한시간 분 -> 초
            //$limittime = intval($data['RealExpireTime']) * 60;
            // 제한시간 분 -> 초
            if($data['RealExpireTime'] == 0){
                $limittime = intval($data['wRuntime']) * intval($lec['MultipleApply']) * 60;
            } else {
                $limittime = intval($data['RealExpireTime']) * 60;
            }

            if($studytime > $limittime){
                $timeover = 'Y';
            } else {
                $timeover = 'N';
            }

        } elseif($lec['MultipleTypeCcd'] == '612002') {
            // 패키치 수강시간 체크

            // 수강시간은 초
            $studytime = intval($lec['StudyTimeSum']);

            // 제한시간 분 -> 초
            $limittime = intval($lec['RealExpireTime']) * 60;

            if($studytime > $limittime){
                $timeover = 'Y';
            } else {
                $timeover = 'N';
            }
        }

        if($timeover == 'Y'){
            show_alert('수강가능시간이 초과되었습니다.');
        }

        switch($quility){
            case 'WD':
                $filename = $data['wWD'];
                $ratio = 21; // 초 와이드는 고정
                break;

            case 'HD':
                $filename = $data['wHD'];
                $ratio = $data['wRatio']; // 고화질은 설정한 비율
                break;

            case 'SD':
                $filename = $data['wSD'];
                $ratio = $data['wRatio']; // 저화질도 설정한 비율
                break;

            default:
                $filename = $data['wWD'];
                $ratio = 21; // 초 와이드는 고정
                $quility = 'WD';
                break;
        }

        // 동영상 경로가 없을때 다른 경로로 재생
        if(empty($filename) === true){
            $filename = $data['wWD'];
            $ratio = 21;
            $quility = 'WD';
        }
        if(empty($filename) === true){
            $filename = $data['wHD'];
            $ratio = $data['wRatio'];
            $quility = 'HD';
        }
        if(empty($filename) === true){
            $filename = $data['wSD'];
            $ratio = $data['wRatio'];
            $quility = 'SD';
        }

        // 모든 경로없을때
        if(empty($filename) === true){
            show_alert('수강가능한 파일이 없습니다.', 'close');
        }

        $url = $this->clearUrl($data['wMediaUrl'].'/'.$filename);


        $RealExpireTime = intval($data['wRuntime']) * intval($lec['MultipleApply']);

        // 수강히스토리 기록생성
        $logidx = $this->playerFModel->storeStudyLog([
            'MemIdx' => $this->session->userdata('mem_idx'),
            'OrderIdx' => $orderidx,
            'OrderProdIdx' => $lec['OrderProdIdx'],
            'ProdCode' => $prodcode,
            'ProdCodeSub' => $prodcodesub,
            'wLecIdx' => $lec['wLecIdx'],
            'wUnitIdx' => $unitidx,
            'RealExpireTime' => $RealExpireTime,
            'PlayType' => 'S',
            'StudyType' => 'O'
        ]);

        if($logidx == 0){
            show_alert('DB접속에 실패했습니다. 다시 시도해주십시요.\n계속 동일 증상이 발생할경우 고객센터로 문의해 주십시요.', 'close');
        }

        if(empty($data['StudyTime']) == true || $data['StudyTime'] == 0) {
            $isintro = true;
        } else {
            $isintro = false;
        }

        $isintro = false;

        $startposition = (empty($time) == false) ? $time : $data['LastPosition'];

        return $this->load->view('/player/normal', [
            'data' => [
                'orderidx' => $orderidx,
                'prodcode' => $prodcode,
                'prodcodesub' => $prodcodesub,
                'orderprodidx' => $lec['OrderProdIdx'],
                'lecidx' => $lec['wLecIdx'],
                'unitidx' => $unitidx,
                'quility' => $quility,
                'isIntro' => $isintro,
                'ratio' => $ratio,
                'startPosition' => $startposition,
                'pretitle' => $data['wUnitNum'].'회 '.$data['wUnitLectureNum'].'강',
                'title' => $data['wUnitName'],
                'url' => $url,
                'memid' => $MemId,
                'memidx' => $this->session->userdata('mem_idx'),
                'logidx' => $logidx,
                'ip' => $this->input->ip_address()
            ]
        ]);
    }


    /**
     * 샘플강의 보기
     * @param array $params
     */
    public function Sample($params = [])
    {
        if(empty($params[0]) === true || empty($params[1]) === true || empty($params[2]) === true ){
            show_alert('파라미터가 잘못 되었습니다.1', 'close');
        }

        $prodcode = $params[0];
        $unitidx = $params[1];
        $quility = $params[2];

        if($this->session->userdata('is_login') === true){
            $MemId = $this->session->userdata('mem_id');
        } else {
            $MemId = "ANONYMOUS";
        }

        if(empty($quility) === true){
            $quility = 'WD';
        }

        $data = $this->playerFModel->getLectureSample($prodcode, $unitidx);

        if(empty($data) === true){
            show_alert('샘플강좌가 없습니다.', 'close');
        }

        switch($quility){
            case 'WD':
                $filename = $data['wWD'];
                $ratio = 21; // 초 와이드는 고정
                break;

            case 'HD':
                $filename = $data['wHD'];
                $ratio = $data['wRatio']; // 고화질은 설정한 비율
                break;

            case 'SD':
                $filename = $data['wSD'];
                $ratio = $data['wRatio']; // 저화질도 설정한 비율
                break;

            default:
                $filename = $data['wWD'];
                $ratio = 21; // 초 와이드는 고정
                $quility = 'WD';
                break;
        }

        // 동영상 경로가 없을때 다른 경로로 재생
        if(empty($filename) === true){
            $filename = $data['wWD'];
            $ratio = 21;
            $quility = 'WD';
        }
        if(empty($filename) === true){
            $filename = $data['wHD'];
            $ratio = $data['wRatio'];
            $quility = 'HD';
        }
        if(empty($filename) === true){
            $filename = $data['wSD'];
            $ratio = $data['wRatio'];
            $quility = 'SD';
        }

        // 모든 경로가 존재 없을때
        if(empty($filename) === true){
            show_alert('샘플파일이 없습니다.', 'close');
        }

        $url = $this->clearUrl($data['wMediaUrl'].'/'.$filename);

        // 샘플강의 수강로그 저장
        if($this->playerFModel->storeSampleLog([
            'ProdCode' => $prodcode,
            'UnitIdx' => $unitidx,
            'Url' => $url,
            'MemIdx' => $this->session->userdata('mem_idx'),
            'Quility' => $quility
        ]) == false){
            show_alert('오류가 발생했습니다. 다시 시도해주십시요.', 'close');
        };

        $this->load->view('/player/sample', [
            'data' => [
                'pretitle' => $data['wUnitNum'].'회 '.$data['wUnitLectureNum'].'강',
                'title' => $data['wUnitName'],
                'quility' => $quility,
                'startPosition' => 0,
                'ratio' => 21,
                'isIntro' => false,
                'ratio' => $ratio,
                'startPosition' => 0,
                'url' => $url,
                'memid' => $MemId,
                'ip' => $this->input->ip_address()
            ]
        ]);
    }

    /**
     * 샘플강의 보기
     * @param array $params
     */
    public function Free($params = [])
    {
        if(empty($params[0]) === true || empty($params[1]) === true || empty($params[2]) === true ){
            show_alert('파라미터가 잘못 되었습니다.1', 'close');
        }

        $prodcode = $params[0];
        $unitidx = $params[1];
        $quility = $params[2];

        if($this->session->userdata('is_login') !== true){
            show_alert('로그인해야 이용이 가능합니다.','close');
        }

        $MemId = $this->session->userdata('mem_id');

        if(empty($quility) === true){
            $quility = 'WD';
        }

        $data = $this->playerFModel->getLectureFree($prodcode, $unitidx);

        if(empty($data) === true){
            show_alert('샘플강좌가 없습니다.', 'close');
        }

        switch($quility){
            case 'WD':
                $filename = $data['wWD'];
                $ratio = 21; // 초 와이드는 고정
                break;

            case 'HD':
                $filename = $data['wHD'];
                $ratio = $data['wRatio']; // 고화질은 설정한 비율
                break;

            case 'SD':
                $filename = $data['wSD'];
                $ratio = $data['wRatio']; // 저화질도 설정한 비율
                break;

            default:
                $filename = $data['wWD'];
                $ratio = 21; // 초 와이드는 고정
                $quility = 'WD';
                break;
        }

        // 동영상 경로가 없을때 다른 경로로 재생
        if(empty($filename) === true){
            $filename = $data['wWD'];
            $ratio = 21;
            $quility = 'WD';
        }
        if(empty($filename) === true){
            $filename = $data['wHD'];
            $ratio = $data['wRatio'];
            $quility = 'HD';
        }
        if(empty($filename) === true){
            $filename = $data['wSD'];
            $ratio = $data['wRatio'];
            $quility = 'SD';
        }

        // 모든 경로가 존재 없을때
        if(empty($filename) === true){
            show_alert('샘플파일이 없습니다.', 'close');
        }

        $url = $this->clearUrl($data['wMediaUrl'].'/'.$filename);

        $this->load->view('/player/sample', [
            'data' => [
                'pretitle' => $data['wUnitNum'].'회 '.$data['wUnitLectureNum'].'강',
                'title' => $data['wUnitName'],
                'quility' => $quility,
                'startPosition' => 0,
                'ratio' => 21,
                'isIntro' => false,
                'ratio' => $ratio,
                'startPosition' => 0,
                'url' => $url,
                'memid' => $MemId,
                'ip' => $this->input->ip_address()
            ]
        ]);
    }


    /**
     * 강사 샘플보기
     * @param array $params
     */
    public function Professor($params = [])
    {
        if(empty($params[0]) === true || empty($params[1]) === true){
            show_alert('파라미터가 잘못 되었습니다.', 'close');
        }

        $profIdx = $params[0];
        $viewType = $params[1];

        if($this->session->userdata('is_login') === true){
            $MemId = $this->session->userdata('mem_id');
        } else {
            $MemId = "ANONYMOUS";
        }

        if(empty($this->_profReferDataName[$viewType]) === true){
            show_alert('파라미터가 잘못되었습니다.','close');
        }

        $viewType = $this->_profReferDataName[$viewType];

        $data = $this->professorFModel->findProfessorByProfIdx($profIdx, true);
        if(empty($data) === true){
            show_alert('해당 강사를 찾을수 없습니다.', 'close');
        }

        $profRefer = $data['ProfReferData'] == 'N' ? [] : json_decode($data['ProfReferData'], true);
        if(empty($profRefer) === true){
            show_alert('맛보기 강좌가 없습니다.', 'close');
        }

        if(empty($profRefer[$viewType]) === true){
            show_alert('맛보기 강좌가 없습니다.', 'close');
        }

        $url = $this->clearUrl($profRefer[$viewType]);

        if(empty($url) === true){
            show_alert('샘플강의가 없습니다.', 'close');
        }

        $this->load->view('/player/professor', [
            'data' => [
                'title' => '맛보기강의 입니다.',
                'pretitle' => $data['wProfName'].'교수님',
                'quility' => 'WD',
                'startPosition' => 0,
                'ratio' => 21,
                'isIntro' => false,
                'startPosition' => 0,
                'url' => $url,
                'memid' => $MemId,
                'ip' => $this->input->ip_address()
            ]
        ]);
    }


    /**
     * 플레이어 우측 회차 목록 보기
     */
    public function Curriculum($params = [])
    {
        $input = $this->_reqG(null);

        $today = date("Y-m-d", time());
        $ispause = 'N';
        $isstart = 'Y';

        // 강좌정보 읽어오기
        $orderidx = $this->_req('o');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('sp');

        if(empty($orderidx) === true || empty($prodcode) === true || empty($prodcodesub) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $lec[0];

        if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004'){
            $pkg = $this->classroomFModel->getPackage([
                'EQ' => [
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'OrderIdx' => $orderidx,
                    'ProdCode' => $prodcode
                ],
                'GTE' => [
                    'RealLecEndDate' => $today
                ]
            ]);

            $pkg = $pkg[0];

            $lec['lastPauseEndDate'] = $pkg['lastPauseEndDate'];
            $lec['lastPauseStartDate'] = $pkg['lastPauseStartDate'];
            $lec['PauseSum'] = $pkg['PauseSum'];
            $lec['PauseCount'] = $pkg['PauseCount'];
            $lec['ExtenSum'] = $pkg['ExtenSum'];
            $lec['ExtenCount'] = $pkg['ExtenCount'];
        }

        if($lec['LecStartDate'] > $today){
            $isstart = 'N';
        } else if ( $lec['lastPauseStartDate'] <= $today && $lec['lastPauseEndDate'] >= $today) {
            $isstart = 'N';
            $ispause = 'Y';
        } else {
            $isstart = 'Y';
        }

        // 감사정보 디코딩
        $lec['ProfReferData'] = json_decode($lec['ProfReferData'], true);
        $lec['isstart'] = $isstart;
        $lec['ispause'] = $ispause;

        // 회차 열어준경우 IN 생성
        if(empty($lec['wUnitIdxs']) == true){
            $wUnitIdxs = [];
        } else {
            $wUnitIdxs = explode(',', $lec['wUnitIdxs']);
        }

        // 커리큘럼 읽어오기
        $curriculum = $this->classroomFModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lec['wLecIdx']
            ],
            'IN' => [
                'wUnitIdx' => $wUnitIdxs
            ]
        ]);

        // 회차별 수강시간 체크
        foreach($curriculum AS $idx => $row){
            $curriculum[$idx]['isstart'] = $isstart;
            $curriculum[$idx]['ispause'] = $ispause;

            if(empty($lec['MultipleApply']) == true){
                // 무제한
                $curriculum[$idx]['timeover'] = 'N';
                $curriculum[$idx]['limittime'] = '무제한';
                $curriculum[$idx]['remaintime'] = '무제한';
            }
            else if($lec['MultipleApply'] == '1'){
                // 무제한
                $curriculum[$idx]['timeover'] = 'N';
                $curriculum[$idx]['limittime'] = '무제한';
                $curriculum[$idx]['remaintime'] = '무제한';

            } elseif($lec['MultipleTypeCcd'] == '612001') {
                // 회차별 수강시간 체크

                // 수강시간은 초
                $studytime = intval($row['RealStudyTime']);

                // 제한시간 분 -> 초
                if($row['RealExpireTime'] == 0){
                    $limittime = intval($row['wRuntime']) * intval($lec['MultipleApply']) * 60;
                } else {
                    $limittime = intval($row['RealExpireTime']) * 60;
                }

                if($studytime > $limittime){
                    // 제한시간 초과
                    $curriculum[$idx]['timeover'] = 'Y';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = '0분';

                } else {
                    $curriculum[$idx]['timeover'] = 'N';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = round(($limittime - $studytime)/60).'분';
                }

            } elseif($lec['MultipleTypeCcd'] == '612002') {
                // 패키치 수강시간 체크

                // 수강시간은 초
                $studytime = intval($lec['StudyTimeSum']);

                // 제한시간 분 -> 초
                $limittime = intval($lec['AllLecTime']) * 60;

                if($studytime > $limittime){
                    // 제한시간 초과
                    $curriculum[$idx]['timeover'] = 'Y';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = '0분';

                } else {
                    $curriculum[$idx]['timeover'] = 'N';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = round(($limittime - $studytime)/60).'분';
                }
            }
        }

        $this->load->view('/player/list', [
            'input' => $input,
            'lec' => $lec,
            'curriculum' => $curriculum
        ]);
    }

    function info()
    {
        $input = $this->_reqG(null);

        $today = date("Y-m-d", time());
        $ispause = 'N';
        $isstart = 'Y';

        // 강좌정보 읽어오기
        $orderidx = $this->_req('o');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('sp');

        if(empty($orderidx) === true || empty($prodcode) === true || empty($prodcodesub) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $lec[0];

        $this->load->view('/player/info', [
            'input' => $input,
            'lec' => $lec
        ]);
    }

    function qna()
    {
        $input = $this->_reqG(null);

        $today = date("Y-m-d", time());
        $ispause = 'N';
        $isstart = 'Y';

        // 강좌정보 읽어오기
        $orderidx = $this->_req('o');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('sp');

        if(empty($orderidx) === true || empty($prodcode) === true || empty($prodcodesub) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $lec[0];

        //상담유형
        $arr_base['consult_type'] = $this->codeModel->getCcd($this->_groupCcd['consult_ccd']);

        $this->load->view('/player/qna',[
            'input' => $input,
            'lec' => $lec,
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 북마크 리스트
     */
    public function listBookmark()
    {
        $input = $this->_reqG(null);

        $today = date("Y-m-d", time());
        $ispause = 'N';
        $isstart = 'Y';

        // 강좌정보 읽어오기
        $orderidx = $this->_req('o');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('sp');

        if(empty($orderidx) === true || empty($prodcode) === true || empty($prodcodesub) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $lec[0];

        $data = $this->playerFModel->getBookmark($input);

        if(empty($data) == false) {
            foreach ($data AS $idx => $row) {
                $data[$idx]['ConvertTime'] = gmdate('H:i:s', $row['Time']);
            }
        }

        $this->load->view('/player/bookmark',[
            'input' => $input,
            'data' => $data,
            'lec' => $lec
        ]);
    }

    /**
     * 북마크저장
     */
    public function storeBookmark()
    {
        $input = $this->_reqG(null);
        if($this->playerFModel->storeBookmark($input) == false){
            $this->json_error('북마크 저장에 실패했습니다. 다시 시도해주십시요.');
        }

        $this->json_result(true, "북마크를 저장했습니다.");
    }

    /**
     * 북마크삭제
     */
    public function deleteBookmark()
    {
        $input = $this->_reqG(null);
        if($this->playerFModel->deleteBookmark($input) == false){
            $this->json_error('북마크 삭제에 실패했습니다. 다시 시도해주십시요.');
        }

        $this->json_result(true, "북마크를 삭제했습니다.");
    }

    /**
     * 강의수강 로그기록
     */
    public function log()
    {
        $orderidx = $this->_req('o');
        $prodcode = $this->_req('p');
        $orderprodidx = $this->_req('op');
        $prodcodesub = $this->_req('sp');
        $lecidx = $this->_req('w');
        $unitidx = $this->_req('u');
        $logidx = $this->_req('l');
        $memidx = $this->_req('m');
        $studytime = $this->_req('st');
        $realstudytime = $this->_req('rst');
        $position = $this->_req('pos');
        $deviceinfo = $this->_req('di');

        if( empty($orderidx) == true
            || empty($prodcode) == true
            || empty($orderprodidx) == true
            || empty($prodcodesub) == true
            || empty($lecidx) == true
            || empty($unitidx) == true
            || empty($logidx) == true
            || empty($memidx) == true ) {
            echo 'ERROR';
            return;
        }

        if($memidx != $this->session->userdata('mem_idx')){
            echo 'ERROR';
            return;
        }

        $cond = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'OrderProdIdx' => $orderprodidx,
                'wLecIdx' => $lecidx,
                'wUnitIdx' => $unitidx
            ]
        ];

        $data = $this->playerFModel->getStudyLog($cond);
        if(empty($data) == true){
            echo "ERROR";
            return;
        }

        $input = [
            'MemIdx' => $this->session->userdata('mem_idx'),
            'OrderIdx' => $orderidx,
            'ProdCode' => $prodcode,
            'ProdCodeSub' => $prodcodesub,
            'OrderProdIdx' => $orderprodidx,
            'wLecIdx' => $lecidx,
            'wUnitIdx' => $unitidx,
            'LshIdx' => $logidx,
            'StudyTime' => $studytime,
            'RealStudyTime' => $realstudytime,
            'LastPosition' => $position,
            'DeviceInfo' => $deviceinfo
        ];

        $input = array_merge($input, $data);

        if($this->playerFModel->updateStudyLog($input) == true){
            echo 'OK';
        } else {
            echo 'ERROR';
        }
    }


    /**
     * PC에서 디바이스 체크
     */
    public function checkDevicePC()
    {
        $MemIdx = $this->_req('m');
        $OrderIdx = $this->_req('o');
        $ProdCode = $this->_req('p');
        $OrderProdIdx = $this->_req('op');
        $ProdCodeSub = $this->_req('sp');
        $device_id = $this->_req('di');

        $device_model = '';
        $os_version = '';
        $app_version = '';

        $today = date("Y-m-d", time());

        // 해당강의가 기기제한 강의인지 체크
        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $MemIdx,
                'OrderIdx' => $OrderIdx,
                'ProdCode' => $ProdCode,
                'ProdCodeSub' => $ProdCodeSub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            return $this->json_error('강좌 정보가 없습니다.');
        }

        $lec = $lec[0];

        // 기간제 패키지 이면 기기체크하기
        if($lec['LearnPatternCcd'] == '615004'){
            // 등록된 디바이스 인지 체크
            $count = $this->playerFModel->getDevice([ 'EQ' => [
                'MemIdx' => $MemIdx,
                'DeviceId' => $device_id,
                'IsUse' => 'Y'
            ]]);

            if($count == 1){
                // 이미 등록된 디바이스
                return $this->json_result(true,'이미등록된 디바이스');
            }

            // 총 등록된 디바이스 갯수
            $count = $this->playerFModel->getDevice([ 'EQ' => [
                'MemIdx' => $MemIdx,
                'IsUse' => 'Y'
            ]]);

            // 등록기기댓수 초과
            if($count >= $lec['DeviceLimitCount']){
                return $this->json_error('수강가능한 등록기기 댓수가 초과 되었습니다.');
            }

            // 기기등록 시도
            if($this->playerFModel->storeDevice([
                    'DeviceType' => 'P',
                    'MemIdx' => $MemIdx,
                    'DeviceModel' => $device_model,
                    'DeviceId' => $device_id,
                    'Os' => $os_version,
                    'App' => $app_version
                ]) == false){
                // 기기등록 실패
                return $this->json_error('수강기기 등록에 실패했습니다.');
            }
        }

        return $this->json_result(true, '재생이 가능합니다.');
    }


    /**
     * 모바일 컨텐츠 아이디 생성
     */
    public function getMobile()
    {
        $this->load->library('Crypto', ['license' => config_item('starplayer_license')]);

        $MemIdx = $this->_req("m");
        $MemId = $this->_req("id");
        $OrderIdx = $this->_req("o");
        $ProdCode = $this->_req("p");
        $ProdCodeSub = $this->_req("sp");
        $wUnitIdx = $this->_req("u");
        $Quility = $this->_req("q");
        $type = $this->_req("st");

        $ispause = 'N';
        $isstart = 'Y';
        $timeover = 'N';

        $today = date("Y-m-d", time());

        if($type == "D"){
            $type = "download";
            $PlayType = 'D';
        } else {
            $type = "streaming";
            $PlayType = 'S';
        }

        if(empty($wUnitIdx) == true){
            return $this->StarplayerResult(true, '수강할 회차 정보가 없습니다.');
        }

        // 수강가능인지 체크
        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $MemIdx,
                'OrderIdx' => $OrderIdx,
                'ProdCode' => $ProdCode,
                'ProdCodeSub' => $ProdCodeSub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            return $this->StarplayerResult(true, '강좌정보가 없습니다.');
        }

        $lec = $lec[0];

        // 종합반이면 종합반으로 부터 일시중지 등 정보 얻어오기
        if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004'){
            $pkg = $this->classroomFModel->getPackage([
                'EQ' => [
                    'MemIdx' => $MemIdx,
                    'OrderIdx' => $OrderIdx,
                    'ProdCode' => $ProdCode
                ],
                'GTE' => [
                    'RealLecEndDate' => $today
                ]
            ]);

            $pkg = $pkg[0];

            $lec['lastPauseEndDate'] = $pkg['lastPauseEndDate'];
            $lec['lastPauseStartDate'] = $pkg['lastPauseStartDate'];
            $lec['PauseSum'] = $pkg['PauseSum'];
            $lec['PauseCount'] = $pkg['PauseCount'];
            $lec['ExtenSum'] = $pkg['ExtenSum'];
            $lec['ExtenCount'] = $pkg['ExtenCount'];
        }

        if($lec['LecStartDate'] > $today){
            $isstart = 'N';
        } else if ( $lec['lastPauseStartDate'] <= $today && $lec['lastPauseEndDate'] >= $today) {
            $isstart = 'N';
            $ispause = 'Y';
        } else {
            $isstart = 'Y';
        }

        if($isstart == 'N'){
            return $this->StarplayerResult(true,'아직 수강시작 전인 강의입니다.');
        }

        if($ispause == 'Y'){
            return $this->StarplayerResult(true, '일시중지 중인 강의입니다.');
        }

        // 회차 열어준경우 IN 생성
        if(empty($lec['wUnitIdxs']) == true){
            $wUnitIdxs = [];
        } else {
            $wUnitIdxs = explode(',', $lec['wUnitIdxs']);
        }

        if(is_array($wUnitIdx) == true){
            $cond_arr = [
                'EQ' => [
                    'MemIdx' => $MemIdx,
                    'OrderIdx' => $OrderIdx,
                    'ProdCode' => $ProdCode,
                    'ProdCodeSub' => $ProdCodeSub,
                    'wLecIdx' => $lec['wLecIdx']
                ],
                'IN' => [
                    'wUnitIdx' => $wUnitIdx
                ]
            ];
        } else {
            $cond_arr = [
                'EQ' => [
                    'MemIdx' => $MemIdx,
                    'OrderIdx' => $OrderIdx,
                    'ProdCode' => $ProdCode,
                    'ProdCodeSub' => $ProdCodeSub,
                    'wLecIdx' => $lec['wLecIdx'],
                    'wUnitIdx' => $wUnitIdx
                ],
                'IN' => [
                    'wUnitIdx' => $wUnitIdxs
                ]
            ];
        }

        // 커리큘럼 읽어오기
        $data = $this->classroomFModel->getCurriculum($cond_arr);

        if(empty($data) == true){
            return $this->StarplayerResult(true,'강의 정보가 없습니다.');
        }

        $XMLString  = "<?xml version='1.0' encoding='UTF-8' ?>";
        $XMLString .= "<axis-app>";
        $XMLString .= "<security>true</security>"; // 보안설정
        $XMLString .= "<action-type>".$type."</action-type>"; // 스트리밍/다운로드
        $XMLString .= "<user-id><![CDATA[".$MemId."]]></user-id>"; // 회원 아이디

        foreach($data as $key => $row){
            // 배수체크
            if(empty($lec['MultipleApply']) == true){
                // 무제한
                $timeover = 'N';
            }
            else if($lec['MultipleApply'] == '1'){
                // 무제한
                $timeover = 'N';

            } elseif($lec['MultipleTypeCcd'] == '612001') {
                // 회차별 수강시간 체크

                // 수강시간은 초
                $studytime = intval($row['RealStudyTime']);
                // 제한시간 분 -> 초
                // $limittime = intval($row['RealExpireTime']) * 60;
                if($row['RealExpireTime'] == 0){
                    $limittime = intval($row['wRuntime']) * intval($lec['MultipleApply']) * 60;
                } else {
                    $limittime = intval($row['RealExpireTime']) * 60;
                }


                if($studytime > $limittime){
                    $timeover = 'Y';
                } else {
                    $timeover = 'N';
                }

            } elseif($lec['MultipleTypeCcd'] == '612002') {
                // 패키치 수강시간 체크

                // 수강시간은 초
                $studytime = intval($lec['StudyTimeSum']);

                // 제한시간 분 -> 초
                $limittime = intval($lec['RealExpireTime']) * 60;

                if($studytime > $limittime){
                    $timeover = 'Y';
                } else {
                    $timeover = 'N';
                }
            }

            if($timeover == 'Y'){
                continue;
            }

            // 화질에 따른 동영상 경로 읽어오기
            switch($Quility){
                case 'WD':
                    $filename = $row['wWD'];
                    break;

                case 'HD':
                    $filename = $row['wHD'];
                    break;

                case 'SD':
                    $filename = $row['wSD'];
                    break;

                default:
                    $filename = $row['wWD'];
                    break;
            }

            // 동영상 경로가 없을때 다른 경로로 재생
            if(empty($filename) === true){
                $filename = $row['wWD'];
            }
            if(empty($filename) === true){
                $filename = $row['wHD'];
            }
            if(empty($filename) === true){
                $filename = $row['wSD'];
            }

            // 모든 경로없을때
            if(empty($filename) === true){
                continue;
            }

            $RealExpireTime = intval($row['wRuntime']) * intval($lec['MultipleApply']);

            // 수강히스토리 기록생성
            $logidx = $this->playerFModel->storeStudyLog([
                'MemIdx' => $MemIdx,
                'OrderIdx' => $OrderIdx,
                'OrderProdIdx' => $lec['OrderProdIdx'],
                'ProdCode' => $ProdCode,
                'ProdCodeSub' => $ProdCodeSub,
                'wLecIdx' => $lec['wLecIdx'],
                'wUnitIdx' => $row['wUnitIdx'],
                'RealExpireTime' => $RealExpireTime,
                'PlayType' => $PlayType,
                'StudyType' => 'M'
            ]);

            if(empty($logidx) == true){
                continue;
            }

            $url = $this->clearUrl($row['wMediaUrl'].'/'.$filename);
            $title = $row['wUnitNum'].'회 '.$row['wUnitLectureNum'].'강 '.$row['wUnitName'];
            $id = "^{$MemId}^{$MemIdx}^{$OrderIdx}^{$lec['OrderProdIdx']}^{$ProdCode}^{$ProdCodeSub}^{$row['wUnitIdx']}^{$logidx}^";
            // $category = $lec['SubjectName'].'/'.$lec['CourseName'];
            $enddate = $lec['RealLecEndDate'];

            $XMLString .= "<content>";
            $XMLString .= "<id><![CDATA[".$id."]]></id>";
            $XMLString .= "<url><![CDATA[".$url."]]></url>";
            $XMLString .= "<title><![CDATA[".clean_string($title)."]]></title>";
            $XMLString .= "<category><![CDATA[".clean_string($lec['subProdName'])."]]></category>";
            if($type == 'download'){
                $XMLString .= "<limit-date><![CDATA[".str_replace('-', '', $enddate)."235959]]></limit-date>";
            } else {
                $XMLString .= "<position>" . ((is_numeric($row['LastPosition']) == true) ? $row['LastPosition'] : 0) . "</position>";
            }
            $XMLString .= "</content>";
        }
        $XMLString .= "</axis-app>";

        echo $this->crypto->encrypt($XMLString);
        exit(0);
    }


    /**
     * 하이브리드앱 플레이 정보 읽어오기
     * @return CI_Output
     */
    function getApp()
    {
        $MemIdx = $this->_req("m");
        $MemId = $this->_req("id");
        $OrderIdx = $this->_req("o");
        $ProdCode = $this->_req("p");
        $ProdCodeSub = $this->_req("sp");
        $wUnitIdx = $this->_req("u");
        $Quility = $this->_req("q");
        $type = $this->_req("st");

        $ispause = 'N';
        $isstart = 'Y';
        $timeover = 'N';

        $today = date("Y-m-d", time());

        if($type == "D"){
            $type = "download";
            $PlayType = 'D';
        } else {
            $type = "streaming";
            $PlayType = 'S';
        }

        // 수강가능인지 체크
        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $MemIdx,
                'OrderIdx' => $OrderIdx,
                'ProdCode' => $ProdCode,
                'ProdCodeSub' => $ProdCodeSub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            return $this->json_error('강좌정보가 없습니다.');
        }

        $lec = $lec[0];

        // 종합반이면 종합반으로 부터 일시중지 등 정보 얻어오기
        if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004'){
            $pkg = $this->classroomFModel->getPackage([
                'EQ' => [
                    'MemIdx' => $MemIdx,
                    'OrderIdx' => $OrderIdx,
                    'ProdCode' => $ProdCode
                ],
                'GTE' => [
                    'RealLecEndDate' => $today
                ]
            ]);

            $pkg = $pkg[0];

            $lec['lastPauseEndDate'] = $pkg['lastPauseEndDate'];
            $lec['lastPauseStartDate'] = $pkg['lastPauseStartDate'];
            $lec['PauseSum'] = $pkg['PauseSum'];
            $lec['PauseCount'] = $pkg['PauseCount'];
            $lec['ExtenSum'] = $pkg['ExtenSum'];
            $lec['ExtenCount'] = $pkg['ExtenCount'];
        }

        if($lec['LecStartDate'] > $today){
            $isstart = 'N';
        } else if ( $lec['lastPauseStartDate'] <= $today && $lec['lastPauseEndDate'] >= $today) {
            $isstart = 'N';
            $ispause = 'Y';
        } else {
            $isstart = 'Y';
        }

        if($isstart == 'N'){
            return $this->json_error('아직 수강시작 전인 강의입니다.');
        }

        if($ispause == 'Y'){
            return $this->json_error('일시중지 중인 강의입니다.');
        }

        // 회차 열어준경우 IN 생성
        if(empty($lec['wUnitIdxs']) == true){
            $wUnitIdxs = [];
        } else {
            $wUnitIdxs = explode(',', $lec['wUnitIdxs']);
        }

        if(is_array($wUnitIdx) == true){
            $cond_arr = [
                'EQ' => [
                    'MemIdx' => $MemIdx,
                    'OrderIdx' => $OrderIdx,
                    'ProdCode' => $ProdCode,
                    'ProdCodeSub' => $ProdCodeSub,
                    'wLecIdx' => $lec['wLecIdx']
                ],
                'IN' => [
                    'wUnitIdx' => $wUnitIdx
                ]
            ];
        } else {
            $cond_arr = [
                'EQ' => [
                    'MemIdx' => $MemIdx,
                    'OrderIdx' => $OrderIdx,
                    'ProdCode' => $ProdCode,
                    'ProdCodeSub' => $ProdCodeSub,
                    'wLecIdx' => $lec['wLecIdx'],
                    'wUnitIdx' => $wUnitIdx
                ],
                'IN' => [
                    'wUnitIdx' => $wUnitIdxs
                ]
            ];
        }

        // 커리큘럼 읽어오기
        $data = $this->classroomFModel->getCurriculum($cond_arr);

        if(empty($data) == true){
            return $this->json_error('강의 정보가 없습니다.');
        }

        $rtnData = [];

        foreach($data as $key => $row){
            // 배수체크
            if(empty($lec['MultipleApply']) == true){
                // 무제한
                $timeover = 'N';
            }
            else if($lec['MultipleApply'] == '1'){
                // 무제한
                $timeover = 'N';

            } elseif($lec['MultipleTypeCcd'] == '612001') {
                // 회차별 수강시간 체크

                // 수강시간은 초
                $studytime = intval($row['RealStudyTime']);

                // 제한시간 분 -> 초
                if($row['RealExpireTime'] == 0){
                    $limittime = intval($row['wRuntime']) * intval($lec['MultipleApply']) * 60;
                } else {
                    $limittime = intval($row['RealExpireTime']) * 60;
                }

                if($studytime > $limittime){
                    $timeover = 'Y';
                } else {
                    $timeover = 'N';
                }

            } elseif($lec['MultipleTypeCcd'] == '612002') {
                // 패키치 수강시간 체크

                // 수강시간은 초
                $studytime = intval($lec['StudyTimeSum']);

                // 제한시간 분 -> 초
                $limittime = intval($lec['RealExpireTime']) * 60;

                if($studytime > $limittime){
                    $timeover = 'Y';
                } else {
                    $timeover = 'N';
                }
            }

            if($timeover == 'Y'){
                continue;
            }

            // 화질에 따른 동영상 경로 읽어오기
            switch($Quility){
                case 'WD':
                    $filename = $row['wWD'];
                    break;

                case 'HD':
                    $filename = $row['wHD'];
                    break;

                case 'SD':
                    $filename = $row['wSD'];
                    break;

                default:
                    $filename = $row['wWD'];
                    break;
            }

            // 동영상 경로가 없을때 다른 경로로 재생
            if(empty($filename) === true){
                $filename = $row['wWD'];
            }
            if(empty($filename) === true){
                $filename = $row['wHD'];
            }
            if(empty($filename) === true){
                $filename = $row['wSD'];
            }

            // 모든 경로없을때
            if(empty($filename) === true){
                continue;
            }

            $RealExpireTime = intval($row['wRuntime']) * intval($lec['MultipleApply']);

            // 수강히스토리 기록생성
            $logidx = $this->playerFModel->storeStudyLog([
                'MemIdx' => $MemIdx,
                'OrderIdx' => $OrderIdx,
                'OrderProdIdx' => $lec['OrderProdIdx'],
                'ProdCode' => $ProdCode,
                'ProdCodeSub' => $ProdCodeSub,
                'wLecIdx' => $lec['wLecIdx'],
                'wUnitIdx' => $row['wUnitIdx'],
                'RealExpireTime' => $RealExpireTime,
                'PlayType' => $PlayType,
                'StudyType' => 'A'
            ]);

            if(empty($logidx) == true){
                continue;
            }

            $url = $this->clearUrl($row['wMediaUrl'].'/'.$filename);
            $title = clean_string($row['wUnitNum'].'회 '.$row['wUnitLectureNum'].'강 '.$row['wUnitName']);
            $id = "^{$MemId}^{$MemIdx}^{$OrderIdx}^{$lec['OrderProdIdx']}^{$ProdCode}^{$ProdCodeSub}^{$row['wUnitIdx']}^{$logidx}^";
            $category = clean_string($lec['subProdName']); //$lec['SubjectName'].'/'.$lec['CourseName'];
            $enddate = $lec['RealLecEndDate'];

            if($type == 'download'){
                $rtnData = array_merge($rtnData, [
                    $key => [
                        'category' => base64_encode(rawurlencode($category)),
                        'thumbnail' => '',
                        'url' => $url,
                        'cc' => '',
                        'title' => base64_encode(rawurlencode($title)),
                        'desc' => base64_encode(rawurlencode('')),
                        'teacher' => base64_encode(rawurlencode($lec['wProfName'])),
                        'expiry_date' => $enddate,
                        'content_id' => $id
                    ]
                ]);

            } else {
                $rtnData = [
                    'url' => $url,
                    'cc' => '',
                    'position' => ((is_numeric($row['LastPosition']) == true) ? $row['LastPosition'] : 0),
                    'tracker' => '',
                    'title' => base64_encode(rawurlencode($title)),
                    'subpage' => '',
                    'content_id' => $id
                ];
            }
        }

        return $this->json_result(true,'성공',null, $rtnData);
    }


    /**
     * 모바일 스타플레이어 이벤트 API
     */
    public function StarplayerAPI()
    {
        $input = array_merge($this->_reqP(null), $this->_reqG(null));

        $event = element('event', $input); // 이벤트코드
        $user_id = element('user_id', $input); // 아이디
        $device_id = element('device_id', $input); // 기기고유번호
        $device_model = element('device_model', $input); // 기기종류
        $os_version = element('os_version', $input); // OS종류
        $app_version = element('app_version', $input); // 엡버전
        $state = element('state', $input); // 기기상태
        $date = element('date', $input); // 시간
        $online = element('online', $input); // online 시 yes offlien 시 no
        
        $play_type = element('play_time', $input); // streaming / download
        $content_id = element('content_id', $input); // $id = "^{$MemId}^{$MemIdx}^{$OrderIdx}^{$lec['OrderProdIdx']}^{$ProdCode}^{$ProdCodeSub}^{$row['wUnitIdx']}^{$logidx}^";
        $content_url = element('content_url', $input); // 강의 URL
        
        $play_time = element('play_time', $input); // 동영상 재생 누적시간 (초)
        $play_time2 = element('play_time2', $input); // 동영상 재생 누적시간 ms
        $latest_playtime = element('latest_playtime', $input); // 이벤트사이의 누적시간 (초)
        $latest_playtime2 = element('latest_playtime2', $input); // 이벤트사이의 누적시간 ms
        $latest_ratio_playtime = element('latest_ratio_playtime', $input); // 배속을 이용한 값을 적용한 시간 (초)
        $loopback_playtime = element('loopback_playtime', $input); // 구간반복 유무에 관게없이 누적 (초)
        $content_duration = element('content_duration', $input); // 강의 사간
        $content_position = element('current_position', $input); // 현재 동영상 위치
        $play_ratio = element('play_ratio', $input); // 현재 배속정보

        $sum_latest_playtime = element('sum_latest_playtime', $input); // latest_playtime 합계 (초)
        $sum_latest_playtime2 = element('sum_latest_playtime2', $input); // latest_playtime 합계 ms

        $begin_content_date = element('begin_content_date', $input); // 앱 실행시 날짜 값

        // API 접근 로그남기기
        $params = '';
        foreach($input as $key => $value){
            $params .= $key.'='.$value.'&';
        }


        switch($event){
            case 'begin_app':
                // 앱 실행
                $this->checkState($state); // 기기상태 체크
                return $this->StarplayerResult(false,'앱실행');
                break;

            case 'begin_content':
                // 동영상을 시작할때
                $this->checkState($state); // 기기상태 체크

            case 'download_begin_content':
                // 다운로드 시작할때 + 동영상시작할때

                // 재생가능한 강좌인지 체크
                $lec = $this->checkOrderProduct($content_id, false);

                // 기간제 패키지 이면 기기체크하기
                if($lec['LearnPatternCcd'] == '615004'){
                    $this->checkDeviceMobile([
                        'DeviceType' => 'M',
                        'MemIdx' => $lec['MemIdx'],
                        'DeviceModel' => $device_model,
                        'DeviceId' => $device_id,
                        'Os' => $os_version,
                        'App' => $app_version
                    ], $lec['DeviceLimitCount'], false);
                }

                $this->updateMobileDevice([
                    'content_id' => $content_id,
                    'DeviceModel' => $device_model,
                    'OS' => $os_version,
                    'APP' => $app_version,
                    'DeviceId' => $device_id
                ]);

                return $this->StarplayerResult(false,'재생권한확인완료');
                break;

            case 'playing_content':
            case 'end_content':
                // 수강 기록 업데이트
                // 수강 기록은 무조건 업데이트 한다.
                $this->mobileLog([
                    'content_id' => $content_id,
                    'playtype' => $play_type,
                    'st' => $latest_ratio_playtime,
                    'rst' => $latest_playtime,
                    'pos' => $content_position,
                    'di' => $device_id
                ]);

                return $this->StarplayerResult(false,'수강기록업데이트완료');
                break;


            case 'download_content':
                // 다운로드 완료 기록을 남길것인가

                return $this->StarplayerResult(false,'다운로드완료');
                break;

            case 'playing_ratio_status':
            case 'delete_content':
            case 'register_device_id':
            case 'unregister_device_id':
                // 나머지는 모두 그냥 정상 처리
                return $this->StarplayerResult(false,'정상처리');
                break;
                
            default;
                // 알수없는 이벤트는 에러
                return $this->StarplayerResult(true,'알수없는 이벤트입니다.');

        }
    }


    /**
     * 스타플레이어 E 하이브리드 앱 수강기록 업데이트
     */
    function StarplayerEntAPI()
    {
        $input = array_merge($this->_reqP(null), $this->_reqG(null));

        $event = $this->_req('event');
        $user_id = $this->_req('user_id');
        $os = $this->_req('os');
        $os_version = $this->_req('os_version');
        $device_id = $this->_req('device_id');
        $device_model = $this->_req('device_model');
        $content_url = $this->_req('content_url');
        $content_id = $this->_req('content_id');
        $actual_playback_duration = $this->_req('actual_playback_duration'); // 1분
        $playback_duration = $this->_req('playback_duration'); // 2분
        $current_position = $this->_req('current_position');
        $begin_date = $this->_req('begin_date');
        $end_date = $this->_req('end_date');
        $tracker = $this->_req('tracker');
        $rating = $this->_req('rating');
        $token = $this->_req('token');
        $play_type = $this->_req('play_type');
        $app_version = $this->_req('app_version');

        // API 접근 로그남기기
        $params = '';
        foreach($input as $key => $value){
            $params .= $key.'='.$value.'&';
        }
        //logger($params);
        switch($event){
            case 'downloaded':
                // 다운로드 완료
                break;

            case 'begin_content':
                // 스트리밍 재생 시작
            case 'openingDownloadedContent':
                // 다운로드강의 재생 시작할때

                // 재생가능한 강좌인지 체크
                $lec = $this->checkOrderProduct($content_id,  true);

                // 기간제 패키지 이면 기기체크하기
                if($lec['LearnPatternCcd'] == '615004'){
                    $this->checkDeviceMobile([
                        'DeviceType' => 'A',
                        'MemIdx' => $lec['MemIdx'],
                        'DeviceModel' => $device_model,
                        'DeviceId' => $device_id,
                        'Os' => $os.' '.$os_version,
                        'App' => $app_version
                    ], $lec['DeviceLimitCount'], true);
                }

                $this->updateMobileDevice([
                    'content_id' => $content_id,
                    'DeviceModel' => $device_model,
                    'OS' => $os_version,
                    'APP' => $app_version,
                    'DeviceId' => $device_id
                ]);

                return $this->StarplayerResult(false, '', '',true);
                break;

            case 'learninghistory':
                // 수강 기록 업데이트
                // 수강 기록은 무조건 업데이트 한다.
                $this->mobileLog([
                    'content_id' => $content_id,
                    'playtype' => $play_type,
                    'st' => $playback_duration,
                    'rst' => $actual_playback_duration,
                    'pos' => $current_position,
                    'di' => $device_id
                ]);

                return $this->StarplayerResult(false, '', '',true);
                break;

            default;
                // 알수없는 이벤트는 에러
                return $this->StarplayerResult(true, '알수없는정보입니다', '',true);
        }
    }


    /**
     * 기기상태체크
     * @param string $state
     * @return CI_Output
     */
    private function checkState($state = '')
    {
        if($state != 'normal'){
            // 기기상태가 normal 이 아니면 재생 불가
            return $this->StarplayerResult(true, '루팅 혹은 탈옥 기기는 수강이 불가능합니다.', '', false);
        }
    }


    /**
     * 수강가능한 상태인지 체크
     * @param $input
     * @return mixed
     */
    private function checkOrderProduct($input, $isApp = false)
    {
        //     1          2          3                   4              5             6                 7
        // ^{$MemId}^{$MemIdx}^{$OrderIdx}^{$lec['OrderProdIdx']}^{$ProdCode}^{$ProdCodeSub}^{$row['wUnitIdx']}^
        @$input_arr = explode('^', $input);

        $memid = $input_arr[1];
        $memidx = $input_arr[2];
        $orderidx = $input_arr[3];
        $orderprodidx = $input_arr[4];
        $prodcode = $input_arr[5];
        $prodcodesub = $input_arr[6];
        $unitidx = $input_arr[7];
        $logidx = $input_arr[8];

        $today = date("Y-m-d", time());
        $ispause = 'N';
        $isstart = 'Y';
        $timeover = 'N';

        if(    empty($memidx) == true
            || empty($orderidx) === true
            || empty($orderprodidx) === true
            || empty($prodcode) === true
            || empty($prodcodesub) === true
            || empty($unitidx) === true ){
            return $this->StarplayerResult(true, '정보가 정확하지 않습니다.', '', $isApp);
        }

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            return $this->StarplayerResult(true, '수강신청정보가 없습니다.', '', $isApp);
        }

        $lec = $lec[0];

        // 종합반이면 종합반으로 부터 일시중지 등 정보 얻어오기
        if($lec['LearnPatternCcd'] == '615003' || $lec['LearnPatternCcd'] == '615004'){
            $pkg = $this->classroomFModel->getPackage([
                'EQ' => [
                    'MemIdx' => $memidx,
                    'OrderIdx' => $orderidx,
                    'ProdCode' => $prodcode
                ],
                'GTE' => [
                    'RealLecEndDate' => $today
                ]
            ]);

            $pkg = $pkg[0];

            $lec['lastPauseEndDate'] = $pkg['lastPauseEndDate'];
            $lec['lastPauseStartDate'] = $pkg['lastPauseStartDate'];
            $lec['PauseSum'] = $pkg['PauseSum'];
            $lec['PauseCount'] = $pkg['PauseCount'];
            $lec['ExtenSum'] = $pkg['ExtenSum'];
            $lec['ExtenCount'] = $pkg['ExtenCount'];
        }

        if($lec['LecStartDate'] > $today){
            $isstart = 'N';
        } else if ( $lec['lastPauseStartDate'] <= $today && $lec['lastPauseEndDate'] >= $today) {
            $isstart = 'N';
            $ispause = 'Y';
        } else {
            $isstart = 'Y';
        }

        if($ispause == 'Y'){
            return $this->StarplayerResult(true, '수강 정지 된 강의입니다.','', $isApp);
        }

        if($isstart == 'N'){
            return $this->StarplayerResult(true, '수강시작 전인 강의입니다.','', $isApp);
        }

        // 회차 열어준경우 IN 생성
        if(empty($lec['wUnitIdxs']) == true){
            $wUnitIdxs = [];
        } else {
            $wUnitIdxs = explode(',', $lec['wUnitIdxs']);
        }

        // 커리큘럼 읽어오기
        $data = $this->classroomFModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lec['wLecIdx'],
                'wUnitIdx' => $unitidx
            ],
            'IN' => [
                'wUnitIdx' => $wUnitIdxs
            ]
        ]);

        if(empty($data) == true){
            return $this->StarplayerResult(true, '강의정보가 없습니다.','', $isApp);
        }

        $data = $data[0];

        if(empty($lec['MultipleApply']) == true){
            // 무제한
            $timeover = 'N';
        }
        else if($lec['MultipleApply'] == '1'){
            // 무제한
            $timeover = 'N';

        } elseif($lec['MultipleTypeCcd'] == '612001') {
            // 회차별 수강시간 체크

            // 수강시간은 초
            $studytime = intval($data['RealStudyTime']);
            // 제한시간 분 -> 초
            //$limittime = intval($data['RealExpireTime']) * 60;
            if($data['RealExpireTime'] == 0){
                $limittime = intval($data['wRuntime']) * intval($lec['MultipleApply']) * 60;
            } else {
                $limittime = intval($data['RealExpireTime']) * 60;
            }

            if($studytime > $limittime){
                $timeover = 'Y';
            } else {
                $timeover = 'N';
            }

        } elseif($lec['MultipleTypeCcd'] == '612002') {
            // 패키치 수강시간 체크

            // 수강시간은 초
            $studytime = intval($lec['StudyTimeSum']);

            // 제한시간 분 -> 초
            $limittime = intval($lec['RealExpireTime']) * 60;

            if($studytime > $limittime){
                $timeover = 'Y';
            } else {
                $timeover = 'N';
            }
        }

        if($timeover == 'Y'){
            return $this->StarplayerResult(true, '수강가능시간이 초과되었습니다.','', $isApp);
        }

        return $lec;
    }

    /**
     * 수강기기 제한 강좌일때 기기등록하고 체크
     * @param $input
     * @param int $limit
     * @param bool $isApp
     * @return CI_Output|void
     */
    private function checkDeviceMobile($input, $limit = 2, $isApp = false)
    {
        // 등록된 디바이스 인지 체크
        $count = $this->playerFModel->getDevice([ 'EQ' => [
                'MemIdx' => element('MemIdx', $input),
                'DeviceId' => element('DeviceId', $input),
                'IsUse' => 'Y'
        ]]);

        if($count == 1){
            // 이미 등록된 디바이스
            return;
        }

        // 총 등록된 디바이스 갯수
        $count = $this->playerFModel->getDevice([ 'EQ' => [
            'MemIdx' => element('MemIdx', $input),
            'IsUse' => 'Y'
        ]]);

        // 등록기기댓수 초과
        if($count >= $limit){
            return $this->StarplayerResult(true, '등록기기 댓수를 초과하였습니다.','', $isApp);
        }

        // 기기등록 시도
        if($this->playerFModel->storeDevice($input) == false){
            // 기기등록 실패
            return $this->StarplayerResult(true, '기기등록에 실패했습니다.','', $isApp);
        }
    }


    /**
     * 모바일 수강기록 업데이트
     * @param $data
     */
    private function mobileLog($input)
    {
        $content_id = element('content_id', $input);
        //     1          2          3                   4              5             6                 7            8
        // ^{$MemId}^{$MemIdx}^{$OrderIdx}^{$lec['OrderProdIdx']}^{$ProdCode}^{$ProdCodeSub}^{$row['wUnitIdx']}^{$logidx}^";
        @$input_arr = explode('^', $content_id);

        $memid = $input_arr[1];
        $memidx = $input_arr[2];
        $orderidx = $input_arr[3];
        $orderprodidx = $input_arr[4];
        $prodcode = $input_arr[5];
        $prodcodesub = $input_arr[6];
        $unitidx = $input_arr[7];
        $logidx = $input_arr[8];

        $PlayType = element('playtype', $input);
        if($PlayType == 'download'){
            $PlayType = 'D';
        } else {
            $PlayType = 'S';
        }

        $studytime = element('st', $input);
        $realstudytime = element('rst', $input);
        $position = element('pos', $input);
        $deviceinfo = element('di', $input);

        if( empty($orderidx) == true
            || empty($prodcode) == true
            || empty($orderprodidx) == true
            || empty($prodcodesub) == true
            || empty($unitidx) == true
            || empty($memidx) == true ) {
            return;
        }

        // 강의정보 구하기
        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ]);

        // 정보없음
        if(empty($lec) === true){
            return;
        }

        $lec = $lec[0];

        $cond = [
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'OrderProdIdx' => $orderprodidx,
                'wLecIdx' => $lec['wLecIdx'],
                'wUnitIdx' => $unitidx
            ]
        ];

        $data = $this->playerFModel->getStudyLog($cond);
        if(empty($data) == true){
            return;
        }

        $input = [
            'MemIdx' => $memidx,
            'OrderIdx' => $orderidx,
            'ProdCode' => $prodcode,
            'ProdCodeSub' => $prodcodesub,
            'OrderProdIdx' => $orderprodidx,
            'wLecIdx' => $lec['wLecIdx'],
            'wUnitIdx' => $unitidx,
            'LshIdx' => $logidx,
            'StudyTime' => $studytime,
            'RealStudyTime' => $realstudytime,
            'LastPosition' => $position,
            'DeviceInfo' => $deviceinfo
        ];

        $input = array_merge($input, $data);

        $this->playerFModel->updateStudyLog($input);
    }

    /**
     * 동영상이 실행될때 해당 기기 정보 업데이트
     * @param $data
     */
    private function updateMobileDevice($data)
    {
        $input = element('content_id', $data);

        //     1          2          3                   4              5             6                 7
        // ^{$MemId}^{$MemIdx}^{$OrderIdx}^{$lec['OrderProdIdx']}^{$ProdCode}^{$ProdCodeSub}^{$row['wUnitIdx']}^
        @$input_arr = explode('^', $input);

        $memid = $input_arr[1];
        $memidx = $input_arr[2];
        $orderidx = $input_arr[3];
        $orderprodidx = $input_arr[4];
        $prodcode = $input_arr[5];
        $prodcodesub = $input_arr[6];
        $unitidx = $input_arr[7];
        $logidx = $input_arr[8];

        $data = array_merge($data, [
           'LshIdx' => $logidx
        ]);

        $this->playerFModel->storeDeviceLog($data);
    }


    /**
     * 모바일 리턴 코드 만들기
     * @param $error
     * @param string $msg
     * @param string $debug
     * @param bool $isApp
     * @return CI_Output
     */
    private function StarplayerResult($error, $msg ='', $debug = '', $isApp = false)
    {
        if($isApp == true){
            if($error == true){
                echo '{';
                echo '"result":"error",';
                echo '"message":"'.$msg.'"';
                echo '}';
            } else {
                echo '{';
                echo '"result":"success",';
                echo '"message":"'.$msg.'"';
                echo '}';
            }

        } else {
            if($error == true){
                $error = 1;
            } else if($error == false){
                $error = 0;
            }

            echo("<axis-app>");
            echo("<error>".$error."</error>");
            echo("<message>".$msg."</message>");
            echo("<debug>".$debug."</debug>");
            echo("</axis-app>");
        }

        exit ;
    }


    /** URL 에서 // 를 제거하기 위해서
     * @param $str
     * @return string
     */
    private function clearUrl($str)
    {
        $protocol_arr = ['mms://', 'http://', 'https://'];
        $protocol = '';
        $i = 0;

        // 앞에 protocol 제거 하고 저장
        foreach($protocol_arr as $key){
            $str = str_replace($key, '', $str, $i);
            if($i > 0){
                $protocol = $key;
                break;
            }
        }

        // 프로코톨이 겁색이 안되었을경우 기본 http로 설정
        if($protocol == ""){
            $protocol = 'http://';
        }

        // 공백제거
        $str = str_replace(' ', '', $str, $i);

        do {
            $str = str_replace('//', '/', $str, $i);
        } while($i > 0);

        return $protocol.$str;
    }
}