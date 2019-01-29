<?php
/**
 * ======================================================================
 * 모의고사관리 > 온라인모의고사응시
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MockExamModel extends WB_Model
{
    private $_table = [
        'admin' => 'wbs_sys_admin',
        'mockExamBase' => 'lms_mock_paper',
        'mockExamQuestion' => 'lms_mock_questions',
        'mockSubject' => 'lms_mock_r_subject',
        'mockAreaCate' => 'lms_Mock_R_Category',
        'mockArea' => 'lms_mock_area',
        'mockAreaList' => 'lms_mock_area_list',
        'mockBase' => 'lms_mock',
        'category' => 'lms_sys_category',
        'sysCode' => 'lms_sys_code',
        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'site' => 'lms_site',

        'mockProduct' => 'lms_product_mock',
        'mockProductExam' => 'lms_product_mock_r_paper',
        'mockRegisterR' => 'lms_mock_register_r_paper',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_product_r_category',
        'ProductSale' => 'lms_Product_Sale',
        'ProductSMS' => 'lms_Product_Sms',
        'mockRegister' => 'lms_mock_register',

        'mockAnswerTemp' => 'lms_mock_answertemp',
        'mockAnswerPaper' => 'lms_mock_answerpaper',
        'mockLog' => 'lms_mock_log',
        'mockGrades' => 'lms_mock_grades',
        'answerNote' => 'lms_mock_wronganswernote',
        'mockGroupRProduct' => 'lms_mock_group_r_product',
        'mockGroup' => 'lms_mock_group'

    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 온라인모의고사 응시목록
     * @param array $is_count $arr_condition $column $limit $offset $order_by
     * @return mixed
     */
    public function listBoard($is_count, $arr_condition=[], $column = null, $limit = null, $offset = null, $order_by = [])
    {

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        // 온라인응시자만 나오게
        $from = "
            FROM {$this->_table['mockProduct']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['mockRegister']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' AND TakeFormsCcd = '690001' -- 온라인응시자
                LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN {$this->_table['mockGroupRProduct']} AS GR ON MP.ProdCode = GR.ProdCode AND GR.IsStatus = 'Y'
                LEFT JOIN {$this->_table['mockGroup']} AS MG ON GR.MgIdx = MG.MgIdx AND MG.IsStatus = 'Y' AND MG.IsUse = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        //echo "<pre>".'select ' . $column . $from . $where . $order_by_offset_limit."</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();

    }

    /**
     * 온라인모의고사 성적결과
     * @param array $is_count $arr_condition $column $limit $offset $order_by
     * @return mixed
     */
    public function listBoardGrade($is_count, $arr_condition=[], $column = null, $limit = null, $offset = null, $order_by = [])
    {

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        // 온라인응시자만 나오게
        $from = "
            FROM {$this->_table['mockProduct']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['mockRegister']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
                LEFT JOIN {$this->_table['mockGroupRProduct']} AS GR ON MP.ProdCode = GR.ProdCode AND GR.IsStatus = 'Y'
                LEFT JOIN {$this->_table['mockGroup']} AS MG ON GR.MgIdx = MG.MgIdx AND MG.IsStatus = 'Y' AND MG.IsUse = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        //echo "<pre>".'select ' . $column . $from . $where . $order_by_offset_limit."</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();

    }

    /**
     * 과목정보호출
     * @param array $arr_condition
     * @return mixed
     */
    public function subjectCall($arr_condition=[]){

        $column = "
            (SELECT SubjectName FROM {$this->_table['subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
            MP.MpIdx, MockType, OrderNum, MR.MrIdx
        ";

        $from = "
            FROM
                {$this->_table['mockProduct']} AS PM
                JOIN {$this->_table['mockRegister']} AS MR ON PM.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                JOIN {$this->_table['mockRegisterR']} AS RP ON PM.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                JOIN {$this->_table['mockProductExam']} AS MP ON RP.MpIdx = MP.MpIdx AND RP.ProdCode = MP.ProdCode AND MP.IsStatus = 'Y'
        ";

        $obder_by = " ORDER BY MockType, OrderNum";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 시험지과목파일정보호출
     * @param array $arr_condition
     * @return mixed
     */
    public function selQaFile($prodcode){

        $column = "
            (SELECT SubjectName FROM {$this->_table['subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
            MP.RealQuestionFile AS fileQ,
            MP.RealExplanFile AS fileA,
            MP.MpIdx  
        ";

        $from = "
            FROM
                {$this->_table['mockRegister']} AS MR    
                JOIN {$this->_table['mockRegisterR']} AS RP ON MR.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                LEFT OUTER JOIN {$this->_table['mockExamBase']} AS MP ON RP.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MP.IsStatus = 'Y'
        ";

        $obder_by = " ORDER BY SubjectIdx";

        $where = " WHERE MR.MemIdx = ".$this->session->userdata('mem_idx')." AND MR.ProdCode = ".$prodcode. " AND MR.IsStatus = 'Y'";
        //return 'select ' . $column . $from . $where . $obder_by;
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 문항정보호출(시험지코드포함)
     * @param array $MpIdx $ProdCode
     * @return mixed
     */
    public function questionCall($MpIdx, $ProdCode){

        $column = "
            MQ.MqIdx,
            AnswerNum, 
            QuestionNO, 
            MP.RealQuestionFile AS filetotal,
            MQ.RealQuestionFile AS file,
            MT.Answer
        ";

        $from = "
            FROM
                {$this->_table['mockExamBase']} AS MP
                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                LEFT OUTER JOIN {$this->_table['mockAnswerTemp']} AS MT ON MQ.MqIdx = MT.MqIdx AND MT.MemIdx = ".$this->session->userdata('mem_idx')." AND ProdCode = ".$ProdCode."
        ";

        $obder_by = " ORDER BY QuestionNO ";

        $where = "WHERE MP.MpIdx = ".$MpIdx;
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 문항정보호출(시험지코드포함)
     * @param array $MpIdx $ProdCode
     * @return mixed
     */
    public function questionResultCall($ProdCode){

        $column = "
            MQ.MqIdx,
            AnswerNum, 
            QuestionNO, 
            MP.RealQuestionFile AS filetotal,
            MQ.RealQuestionFile AS file,
            MT.Answer
        ";

        $from = "
            FROM
                {$this->_table['mockExamBase']} AS MP
                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                LEFT OUTER JOIN {$this->_table['mockAnswerTemp']} AS MT ON MQ.MqIdx = MT.MqIdx AND MT.MemIdx = ".$this->session->userdata('mem_idx')." AND ProdCode = ".$ProdCode."
        ";

        $obder_by = " ORDER BY QuestionNO ";

        $where = "";
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 상품정보
     * @param array $arr_condition
     * @return mixed
     */
    public function productInfo($arr_condition=[]){

        $column = "
            MP.*, A.wAdminName, MR.IsTake AS MrIsStatus,
                   (SELECT RegDatm FROM {$this->_table['mockAnswerPaper']} WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
                   PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
                   C1.CateName, C1.IsUse AS IsUseCate, MR.OrderProdIdx, MR.MrIdx, MR.TakeNumber
        ";

        $from = "
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['mockRegister']} AS MR ON MP.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
        ";

        $obder_by = " ORDER BY `MP`.`ProdCode` DESC";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $data = $query->row_array();

        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값

        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        $mockPart = explode(',', $data['MockPart']);
        foreach ($mockPart as $mp) {
            if( !empty($codes[$mockKindCode][$mp]) ){
                $data['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return $data;
    }


    /**
     * 로그생성 시험시간 업데이트
     * @param array $LogIdx $sec $logtype
     * @return mixed
     * @시험시간 저장은 과목 넘어갈때 문항클릭시 저장됨 
     */
    public function makeExamLog($sec,$MrIdx){
        try {

            $column = "
                LogIdx
            ";

            $from = "
                FROM {$this->_table['mockLog']}
            ";

            $obder_by = " ORDER BY RegDatm DESC LIMIT 1";

            $where = " WHERE MrIdx = ".$MrIdx;

            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
            $data = $query->row_array();

            if($data['LogIdx']){
                // 데이터 수정
                $log_data = [
                    'LogType'=> 'S',
                    'RegIp'=> $this->input->ip_address(),
                    'RemainSec' => $sec,
                    'MrIdx' => $MrIdx
                ];

                $this->_conn->set($log_data)->set('RegDatm', 'NOW()', false)->where('MrIdx',$MrIdx)->update($this->_table['mockLog']);

                if(!$this->_conn->affected_rows()) {
                    throw new Exception('시험 로그변경에 실패했습니다.');
                }
                return $data['LogIdx'];
            }else{
                // 데이터 등록
                $log_data = [
                    'LogType'=> 'S',
                    'RegIp'=> $this->input->ip_address(),
                    'RemainSec' => $sec,
                    'MrIdx'=> $MrIdx
                ];

                if ($this->_conn->set($log_data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockLog']) === false) {
                    throw new \Exception('시험 로그등록에 실패했습니다.');
                }
                // 등록된 게시판 식별자
                return $this->_conn->insert_id();
            }
        } catch (\Exception $e) {
            //return error_result($e);
        }

    }

    /**
     * 남은시간호출
     * @param array $logIdx
     * @return mixed
     */
    public function callRemainTime($logIdx){

        $column = "
            RemainSec
        ";

        $from = "
            FROM
                {$this->_table['mockLog']}
        ";

        $obder_by = "";

        $where = " WHERE LogIdx = ".$logIdx;
        //echo "<pre>".'select '. $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->row_array()['RemainSec'];


    }

    /**
     * 문항별 임시저장
     * @param array $formData
     * @return mixed
     */
    public function answerTempSave($formData = [])
    {
        try {
            $this->_conn->trans_begin();

            $MrIdx = element('MrIdx', $formData);
            $ProdCode = element('ProdCode', $formData);
            $LogIdx = element('LogIdx', $formData);
            $MpIdx = element('MpIdx', $formData);
            $MqIdx = element('MqIdx', $formData);
            $Answer = element('Answer', $formData);
            $RemainSec = element('RemainSec', $formData);

            $column = "
                MatIdx
            ";

            $from = "
                FROM
                    {$this->_table['mockAnswerTemp']}
            ";

            $arr_condition = [
                'EQ' => [
                    'MemIdx'   => $this->session->userdata('mem_idx'),
                    'ProdCode' => $ProdCode,
                    'MrIdx' => $MrIdx,
                    'MpIdx' => $MpIdx,
                    'MqIdx' => $MqIdx,
                ]
            ];

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $obder_by = "";

            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

            $result = $query->row_array();

            if($result['MatIdx']){
                // 데이터 수정
                $data = [
                    'Answer' => $Answer,
                ];
                $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['MemIdx' => $this->session->userdata('mem_idx'), 'ProdCode' => $ProdCode, 'MrIdx' => $MrIdx, 'MpIdx' => $MpIdx, 'MqIdx' => $MqIdx]);

                if ($this->_conn->update($this->_table['mockAnswerTemp']) === false) {
                    throw new \Exception('임시저장에 수정에 실패했습니다.');
                }

            }else{
                // 데이터 입력
                $data = [
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'MrIdx'  => $MrIdx,
                    'ProdCode'=> $ProdCode,
                    'LogIdx' => $LogIdx,
                    'MpIdx' => $MpIdx,
                    'LogIdx' => $LogIdx,
                    'MqIdx' => $MqIdx,
                    'Answer' => $Answer,
                ];

                if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockAnswerTemp']) === false) {
                    throw new \Exception('임시저장에 실패했습니다.');
                }

            }

            $this->saveTime($LogIdx, $RemainSec);

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 임시저장 전문항
     * @param array $formData
     * @return mixed
     */
    public function answerTempAllSave($formData = [])
    {

        try {
            $this->_conn->trans_begin();

            $MrIdx = element('MrIdx', $formData);
            $ProdCode = element('ProdCode', $formData);
            $LogIdx = element('LogIdx', $formData);
            $MpIdx = element('MpIdx', $formData);
            $RemainSec = element('RemainSec', $formData);

            $qcnt = element('QCnt',$formData);

            for($i = 1; $i <= $qcnt; $i++){
                ${"answer$i"} = element('answer'.$i,$formData);
                ${"MqIdx$i"}  = element('MqIdx'.$i,$formData);

                $column = "
                    MatIdx
                ";

                $from = "
                    FROM
                        {$this->_table['mockAnswerTemp']}
                ";

                $arr_condition = [
                    'EQ' => [
                        'MemIdx'   => $this->session->userdata('mem_idx'),
                        'ProdCode' => $ProdCode,
                        'MrIdx' => $MrIdx,
                        'MpIdx' => $MpIdx,
                        'MqIdx' => ${"MqIdx$i"},
                    ]
                ];

                $where = $this->_conn->makeWhere($arr_condition);
                $where = $where->getMakeWhere(false);
                $obder_by = "";

                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);



                $result = $query->row_array();



                if($result['MatIdx']){
                    // 데이터 수정
                    $data = [
                        'Answer' => ${"answer$i"}
                    ];

                    $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['MemIdx' => $this->session->userdata('mem_idx'), 'ProdCode' => $ProdCode, 'MrIdx' => $MrIdx, 'MpIdx' => $MpIdx, 'MqIdx' => ${"MqIdx$i"}]);

                    if ($this->_conn->update($this->_table['mockAnswerTemp']) === false) {
                        throw new \Exception('임시저장에 수정에 실패했습니다.');
                    }

                }else{
                    // 데이터 입력
                    $data = [
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'MrIdx'  => $MrIdx,
                        'ProdCode'=> $ProdCode,
                        'LogIdx' => $LogIdx,
                        'MpIdx' => $MpIdx,
                        'LogIdx' => $LogIdx,
                        'MqIdx' => ${"MqIdx$i"},
                        'Answer' => ${"answer$i"},
                    ];

                    if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockAnswerTemp']) === false) {
                        throw new \Exception('임시저장에 실패했습니다.');
                    }

                }

            }

            $this->saveTime($LogIdx, $RemainSec);

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;

    }


    /**
     * 남은시간 저장
     * @param $LogIdx $RemainSec
     * @return mixed
     */
    function saveTime($LogIdx, $RemainSec){
        // 남은시간 저장
        $data = [
            'RemainSec' => $RemainSec
        ];

        $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['LogIdx' => $LogIdx]);

        if ($this->_conn->update($this->_table['mockLog']) === false) {
            throw new \Exception('시간저장에 실패했습니다.');
        }
        return true;
    }

    /**
     * 시험참여 여부확인
     * @param array $arr_condition
     * @return mixed
     */
    function isExamTemp($ProdCode){
        $column = "
            LogIdx
        ";

        $from = "
            FROM {$this->_table['mockAnswerTemp']}
        ";

        $obder_by = "";
        $arr_condition = [
            'EQ' => [
                'MemIdx'   => $this->session->userdata('mem_idx'),
                'ProdCode' => $ProdCode,
            ]
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $limit = " limit 1";

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by. $limit);
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by. $limit."</pre>";
        $rowArr = $query->row_array();

        if($rowArr['LogIdx']) return $rowArr['LogIdx'];
        else                  return false;
    }

    /**
     * 임시저장 갯수(전체문항/임시저장문항)
     * @param array $arr_condition
     * @return mixed
     */
    public function questionTempCnt($arr_condition=[]){

        $column = "
            MP.MpIdx,
            COUNT(*) AS TCNT,
            (SELECT COUNT(*) FROM {$this->_table['mockAnswerTemp']} WHERE MpIdx = Mp.MpIdx AND Answer != '0'  AND MemIdx = '".$this->session->userdata('mem_idx')."') AS CNT
        ";

        $from = "
            FROM
                {$this->_table['mockExamBase']} AS MP
                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
            
        ";

        $obder_by = " GROUP BY MP.MpIdx ORDER BY MP.MpIdx";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

        return $query->result_array();
    }

    /**
     * 정답제출
     * @param array $formData
     * @return mixed
     */
    public function examSend($formData = [])
    {
        try {
            $this->_conn->trans_begin();

            $ProdCode = element('ProdCode', $formData);
            $LogIdx = element('LogIdx', $formData);
            $MrIdx = element('MrIdx', $formData);

            $column = "
                MA.MpIdx, QuestionNO, Answer, RightAnswer, MrIdx, LogIdx, MQ.MqIdx
            ";

            $from = "
                FROM 
                    {$this->_table['mockAnswerTemp']} AS MA
                    JOIN {$this->_table['mockExamQuestion']} AS MQ ON MA.MqIdx = MQ.MqIdx AND MQ.IsStatus = 'Y' AND MQ.IsStatus = 'Y'
            ";

            $arr_condition = [
                'EQ' => [
                    'MemIdx'   => $this->session->userdata('mem_idx'),
                    'ProdCode' => $ProdCode,
                    'LogIdx' => $LogIdx
                ]
            ];

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $obder_by = " ORDER BY MpIdx";

            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
            //입력문항과 정답문항
            $result = $query->result_array();

            foreach ($result as $key => $val){
                //정답제출문항중 답이 있는지 체크
                $column = "
                    MqIdx
                ";

                $from = "
                    FROM {$this->_table['mockAnswerPaper']}
                ";

                $obder_by = "";
                $arr_condition = [
                    'EQ' => [
                        'MemIdx'   => $this->session->userdata('mem_idx'),
                        'ProdCode' => $ProdCode,
                        'MrIdx' => $MrIdx,
                        'MpIdx'    => $val['MpIdx'],
                        'MqIdx'    => $val['MqIdx']
                    ]
                ];

                $where = $this->_conn->makeWhere($arr_condition);
                $where = $where->getMakeWhere(false);

                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
                $rowArr = $query->row_array();

                if($rowArr['MqIdx']){
                    if($val['Answer'] == $val['RightAnswer']) $IsWrong = 'Y';
                    else                                      $IsWrong = 'N';
                    // 데이터 수정
                    $data = [
                        'Answer' => $val['Answer'],
                        'IsWrong' => $IsWrong
                    ];
                    $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['MemIdx' => $this->session->userdata('mem_idx'), 'ProdCode' => $ProdCode, 'MrIdx' => $MrIdx, 'MpIdx' => $val['MpIdx'], 'MqIdx' => $val['MqIdx']]);

                    if ($this->_conn->update($this->_table['mockAnswerPaper']) === false) {
                        throw new \Exception('정답저장 수정에 실패했습니다.');
                    }

                }else{
                    if($val['Answer'] == $val['RightAnswer']) $IsWrong = 'Y';
                    else                                      $IsWrong = 'N';
                        // 데이터 입력
                    $data = [
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'MrIdx'  => $MrIdx,
                        'ProdCode'=> $ProdCode,
                        'LogIdx' => $val['LogIdx'],
                        'MpIdx' => $val['MpIdx'],
                        'MqIdx' => $val['MqIdx'],
                        'Answer' => $val['Answer'],
                        'IsWrong' => $IsWrong
                    ];

                    if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockAnswerPaper']) === false) {
                        throw new \Exception('정답저장에 실패했습니다.');
                    }
                }

            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;

    }

    /**
     * 시험종료
     * @param array $formData
     * @return mixed
     */
    public function examEnd($formData = [])
    {

        try {
            $this->_conn->trans_begin();

            $ProdCode = element('ProdCode', $formData);
            $LogIdx = element('LogIdx', $formData);
            $MrIdx = element('MrIdx', $formData);

            // 데이터 수정
            $data = [
                'IsTake' => 'Y'
            ];

            $this->_conn->set($data)->where(['MemIdx' => $this->session->userdata('mem_idx'), 'ProdCode' => $ProdCode, 'MrIdx' => $MrIdx]);

            if ($this->_conn->update($this->_table['mockRegister']) === false) {
                throw new \Exception('상태수정에 실패했습니다.');
            }

            // 데이터 수정
            $data = [
                'LogType' => 'E'
            ];
            $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['LogIdx' => $LogIdx]);

            if ($this->_conn->update($this->_table['mockLog']) === false) {
                throw new \Exception('상태수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;

    }



    /**
     * 종합분석 성적데이터 호출
     * @param array $MpIdx $ProdCode
     * @return mixed
     */
    public function gradeCall($ProdCode, $mode){

        if($mode == 'org'){
            $column = "
                MemIdx, SUM(OrgPoint) AS ORG,
                (
                    SELECT COUNT(*) FROM (
                        SELECT ProdCode, COUNT(*) FROM {$this->_table['mockGrades']} WHERE ProdCode = ".$ProdCode." GROUP BY MemIdx
                    ) AS A
                ) AS COUNT,
                (
                    SELECT COUNT(*) FROM lms_mock_grades WHERE ProdCode = ".$ProdCode." GROUP BY MemIdx LIMIT 1
                ) AS KCNT
            ";

            $from = "
                FROM
                    lms_mock_grades AS MG
            ";

            $obder_by = " GROUP BY MemIdx 
		                  ORDER BY ORG DESC ";

            $where = " WHERE ProdCode = ".$ProdCode;
        }else{
            $column = "
                MemIdx, SUM(AdjustPoint) AS AD,
                (
                    SELECT COUNT(*) FROM (
                        SELECT ProdCode, COUNT(*) FROM {$this->_table['mockGrades']} WHERE ProdCode = ".$ProdCode." GROUP BY MemIdx
                    ) AS A
                ) AS COUNT,
                (
                    SELECT COUNT(*) FROM {$this->_table['mockGrades']} WHERE ProdCode = ".$ProdCode." GROUP BY MemIdx LIMIT 1
                ) AS KCNT,
                (
                    SELECT MAX(ad) FROM(
                        SELECT SUM(AdjustPoint) AS ad FROM {$this->_table['mockGrades']} WHERE ProdCode = ".$ProdCode." GROUP BY MemIdx
                    ) AS A
                ) AS ADMAX
            ";

            $from = "
                FROM
                    {$this->_table['mockGrades']} AS MG
            ";

            $obder_by = " GROUP BY MemIdx 
		                  ORDER BY AD DESC ";

            $where = " WHERE ProdCode = ".$ProdCode;
        }


        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 종합분석 성적데이터 호출
     * @param array $MpIdx $ProdCode
     * @return mixed
     */
    public function gradeDetailCall($ProdCode){

        $column = "
            MR.MemIdx,
            (
                SELECT COUNT(*) FROM (
                    SELECT ProdCode, COUNT(*) FROM {$this->_table['mockGrades']} GROUP BY MemIdx
                ) AS A
                WHERE ProdCode = MR.ProdCode	
            ) AS COUNT,
            (SELECT MAX(OrgPoint) FROM {$this->_table['mockGrades']} WHERE ProdCode = MR.ProdCode AND MpIdx = MG.MpIdx GROUP BY MpIdx) AS ORGMAX,
	        (SELECT MAX(AdjustPoint) FROM {$this->_table['mockGrades']} WHERE ProdCode = MR.ProdCode AND MpIdx = MG.MpIdx GROUP BY MpIdx) AS ADMAX,
	        (SELECT SUM(OrgPoint) FROM {$this->_table['mockGrades']} WHERE ProdCode = MR.ProdCode AND MpIdx = MG.MpIdx GROUP BY MpIdx) AS ORGSUM,
	        (SELECT SUM(AdjustPoint) FROM {$this->_table['mockGrades']} WHERE ProdCode = MR.ProdCode AND MpIdx = MG.MpIdx GROUP BY MpIdx) AS ADSUM,
            (SELECT SubjectName FROM {$this->_table['subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
            MP.MpIdx, MockType, OrderNum, MR.MrIdx, MG.*
        ";

        $from = "
            FROM
                {$this->_table['mockProduct']} AS PM
                JOIN {$this->_table['mockRegister']} AS MR ON PM.ProdCode = MR.ProdCode AND MR.IsStatus = 'Y' 
                JOIN {$this->_table['mockRegisterR']} AS RP ON PM.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx 
                JOIN {$this->_table['mockProductExam']} AS MP ON RP.MpIdx = MP.MpIdx AND RP.ProdCode = MP.ProdCode AND MP.IsStatus = 'Y'
                JOIN {$this->_table['mockGrades']} AS MG ON MR.MemIdx = MG.MemIdx AND RP.MpIdx = MG.MpIdx
        ";

        $obder_by = " ORDER BY MockType, OrderNum ";

        $where = " WHERE MR.ProdCode = ".$ProdCode;

        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 과목별 문항분석 쿼리(mode = 1) , 영역 및 학습요소(mode = 2)
     * @param array $MpIdx $ProdCode
     * @return mixed
     */
    public function gradeSubjectDetailCall($ProdCode, $mode){

        $column = "
            PM.MockType,
            PM.OrderNum,
            MP.MpIdx,
            MQ.MqIdx,
            MQ.MalIdx,
            RightAnswer,
            (
                SELECT ROUND(ycnt / (ycnt + ncnt) * 100) FROM (
                    SELECT 
                     (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND IsWrong = 'Y') AS ycnt,
                     (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND IsWrong = 'N') AS ncnt,
                     MP.MpIdx
                    FROM
                    {$this->_table['mockExamBase']} AS MP
                    JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                    JOIN {$this->_table['mockProductExam']} AS PM ON Mp.MpIdx = PM.MpIdx AND PM.ProdCode = ".$ProdCode." AND PM.IsStatus = 'Y'  
                    LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS AP ON MQ.MqIdx = AP.MqIdx  AND AP.ProdCode = ".$ProdCode."
                    GROUP BY MP.MpIdx
                ) AS AA
                WHERE
                AA.MpIdx = AP.MpIdx	
            ) AS AVR,
            (
                SELECT ROUND(ycnt / (ycnt + ncnt) * 100) FROM (
                    SELECT 
                     (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND MqIdx = AP.MqIdx AND IsWrong = 'Y') AS ycnt,
                     (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND MqIdx = AP.MqIdx AND IsWrong = 'N') AS ncnt,
                     MP.MpIdx,AP.MqIdx
                    FROM
                    {$this->_table['mockExamBase']} AS MP
                    JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y' 
                    JOIN {$this->_table['mockProductExam']} AS PM ON Mp.MpIdx = PM.MpIdx AND PM.ProdCode = ".$ProdCode." AND PM.IsStatus = 'Y' 
                    LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS AP ON MQ.MqIdx = AP.MqIdx  AND AP.ProdCode = ".$ProdCode."
                    GROUP BY MQ.MqIdx
                ) AS AA
                WHERE
                AA.MpIdx = AP.MpIdx AND AA.MqIdx = AP.MqIdx	
            ) AS QAVR,
                if(MQ.Difficulty='T','상',(if(MQ.Difficulty='M','중','하')))AS Difficulty,
            AnswerNum, 
            QuestionNO, 
            Answer, IsWrong,
            (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND MemIdx = Ap.MemIdx AND IsWrong = 'Y') AS ycnt,
            (SELECT COUNT(IsWrong) FROM {$this->_table['mockAnswerPaper']} WHERE ProdCode = AP.ProdCode AND MpIdx = Ap.MpIdx AND MemIdx = Ap.MemIdx AND IsWrong = 'N') AS ncnt,
            (SELECT AreaName FROM {$this->_table['mockAreaList']} WHERE MalIdx = MQ.MalIdx AND IsStatus = 'Y') AS areaName
        ";

        $from = "
            FROM
                {$this->_table['mockExamBase']} AS MP
                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                JOIN {$this->_table['mockProductExam']} AS PM ON Mp.MpIdx = PM.MpIdx AND PM.ProdCode = ".$ProdCode." AND PM.IsStatus = 'Y'
                LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS AP ON MQ.MqIdx = AP.MqIdx AND AP.ProdCode = ".$ProdCode." AND AP.MemIdx = ".$this->session->userdata('mem_idx')."
                
        ";

        if($mode == 1){
            $obder_by = " ORDER BY PM.MockType, PM.OrderNum, MP.MpIdx, QuestionNO ";
        }else{
            $obder_by = " ORDER BY PM.MockType, MQ.MalIdx, PM.OrderNum, MP.MpIdx, QuestionNO ";
        }


        $where = "";

        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }

    /**
     * 종합분석 성적데이터 호출
     * @param array $MpIdx $ProdCode
     * @return mixed
     */
    public function answerNoteCall($ProdCode, $MpIdx, $MalIdxSet){

        $column = "
            MP.MpIdx,
            MQ.MqIdx,
            MP.RealQuestionFile AS filetotal,
            MQ.RealQuestionFile AS file,
            MQ.RealExplanFile,
            MQ.MalIdx,
            AP.IsWrong,
            (SELECT SubjectName FROM lms_product_subject WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
            WN.MqIdx AS myMq,
            MwaIdx,
            Memo
        ";

        $from = "
            FROM
                {$this->_table['mockExamBase']} MP
                JOIN {$this->_table['mockExamQuestion']} AS MQ  ON MP.MpIdx = MQ.MpIdx AND MP.IsUse = 'Y' AND MP.IsStatus = 'Y' AND MQ.IsStatus = 'Y'
                JOIN {$this->_table['mockAreaList']} AS MA ON MQ.MalIdx = MA.MalIdx AND MA.IsStatus = 'Y'
                LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS AP ON MQ.MqIdx = AP.MqIdx AND AP.ProdCode = ".$ProdCode." AND AP.MemIdx = ".$this->session->userdata('mem_idx')."
                LEFT OUTER JOIN {$this->_table['answerNote']} AS WN ON AP.MqIdx = WN.MqIdx
                JOIN {$this->_table['mockRegisterR']} AS RP ON MP.MpIdx = RP.MpIdx AND AP.MrIdx = RP.MrIdx
        ";

        $obder_by = " ORDER BY QuestionNO ";

        $where = "WHERE AP.MpIdx = ".$MpIdx;

        if($MalIdxSet) $where .= " AND MQ.MalIdx in (".$MalIdxSet.")";

        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->result_array();

    }


    /**
     * 영역선택 ajax
     * @param array $formData
     * @return mixed
     */
    public function selArea($prodcode, $mpidx)
    {

        $column = "
            MQ.MalIdx,
            MA.AreaName
        ";

        $from = "
            FROM 
                {$this->_table['mockExamBase']} MP
                JOIN {$this->_table['mockExamQuestion']} AS MQ  ON MP.MpIdx = MQ.MpIdx AND MP.IsUse = 'Y' AND MP.IsStatus = 'Y' AND MQ.IsStatus = 'Y'
                JOIN {$this->_table['mockAreaList']} AS MA ON MQ.MalIdx = MA.MalIdx AND MA.IsStatus = 'Y'
                LEFT OUTER JOIN {$this->_table['mockAnswerPaper']} AS AP ON MQ.MqIdx = AP.MqIdx AND AP.ProdCode = ".$prodcode ." AND AP.MemIdx = ".$this->session->userdata('mem_idx')."
                LEFT OUTER JOIN {$this->_table['answerNote']} AS WN ON AP.MqIdx = WN.MqIdx
                JOIN {$this->_table['mockRegisterR']} AS RP ON MP.MpIdx = RP.MpIdx AND AP.MrIdx = RP.MrIdx
        ";

        $where = " WHERE AP.MpIdx = ".$mpidx;
        $obder_by = " GROUP BY MQ.MalIdx
                      ORDER BY MQ.MalIdx";

        $rows = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

        return $rows->result_array();

    }

    /**
     * 오답노트 추가
     * @param array $formData
     * @return mixed
     */
    public function noteAdd($formData = [])
    {

        try {
            $this->_conn->trans_begin();

            $MrIdx = element('MrIdx', $formData);
            $ProdCode = element('ProdCode', $formData);
            $MpIdx = element('MpIdx', $formData);
            $MqIdx = element('MqIdx', $formData);
            $Memo = element('Memo', $formData);

            $column = "
                MwaIdx
            ";

            $from = "
                FROM
                    {$this->_table['answerNote']}
            ";

            $arr_condition = [
                'EQ' => [
                    'MemIdx'   => $this->session->userdata('mem_idx'),
                    'ProdCode' => $ProdCode,
                    'MrIdx' => $MrIdx,
                    'MpIdx' => $MpIdx,
                    'MqIdx' => $MqIdx
                ]
            ];

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);
            $obder_by = "";
            //return "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);

            $result = $query->row_array();

            if($result['MwaIdx']){
                // 데이터 수정
                $data = [
                    'Memo' => $Memo
                ];

                $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->where(['MemIdx' => $this->session->userdata('mem_idx'), 'ProdCode' => $ProdCode, 'MrIdx' => $MrIdx, 'MpIdx' => $MpIdx, 'MqIdx' => $MqIdx ]);

                if ($this->_conn->update($this->_table['answerNote']) === false) {
                    throw new \Exception('오답노트 수정에 실패했습니다.');
                }

            }else{
                // 데이터 입력
                $data = [
                    'MemIdx'   => $this->session->userdata('mem_idx'),
                    'ProdCode' => $ProdCode,
                    'MrIdx' => $MrIdx,
                    'MpIdx' => $MpIdx,
                    'MqIdx' => $MqIdx,
                    'Memo' => $Memo
                ];

                if ($this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['answerNote']) === false) {
                    throw new \Exception('오답노트 저장에 실패했습니다.');
                }

            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 오답노트 삭제
     * @param array $formData
     * @return mixed
     */
    public function noteDelete($formData = [])
    {
        $MrIdx = element('MrIdx', $formData);
        $ProdCode = element('ProdCode', $formData);
        $MpIdx = element('MpIdx', $formData);
        $MqIdx = element('MqIdx', $formData);

        $where = ['MemIdx' => $this->session->userdata('mem_idx'), 'ProdCode' => $ProdCode, 'MrIdx' => $MrIdx, 'MpIdx' => $MpIdx, 'MqIdx' => $MqIdx ];

        try {
            if($this->_conn->delete($this->_table['answerNote'], $where) === false){
                throw new \Exception('오답노트삭제에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }
}
