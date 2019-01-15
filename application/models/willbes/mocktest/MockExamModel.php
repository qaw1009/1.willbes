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
        'mockLog' => 'lms_mock_log'

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

        $from = "
            FROM {$this->_table['mockProduct']} AS MP
                JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
                JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
                JOIN {$this->_table['mockRegister']} AS MR ON MP.ProdCode = MR.ProdCode
                LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        //echo "<pre>".'select ' . $column . $from . $where . $order_by_offset_limit."</pre>";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();

    }

    /**
     * 과목정보호출(시험지코드포함)
     * @param array $arr_condition
     * @return mixed
     */
    public function subjectCall($arr_condition=[]){

        $column = "
            (SELECT SubjectName FROM {$this->_table['subject']} WHERE SubjectIdx = RP.SubjectIdx) AS SubjectName,
            MpIdx, MockType, OrderNum, MR.MrIdx
        ";

        $from = "
            FROM
                {$this->_table['mockProduct']} AS PM
                JOIN {$this->_table['mockRegister']} AS MR ON PM.ProdCode = MR.ProdCode 
                JOIN {$this->_table['mockRegisterR']} AS RP ON PM.ProdCode = RP.ProdCode AND MR.MrIdx = RP.MrIdx
                JOIN {$this->_table['mockProductExam']} AS MP ON RP.PmrpIdx = MP.PmrpIdx
        ";

        $obder_by = " ORDER BY MockType, OrderNum";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
       //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
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
                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y'
                LEFT OUTER JOIN lms_mock_answertemp AS MT ON MQ.MqIdx = MT.MqIdx AND MT.MemIdx = ".$this->session->userdata('mem_idx')." AND ProdCode = ".$ProdCode."
        ";

        $obder_by = " ORDER BY QuestionNO ";

        $where = "WHERE MP.MpIdx = ".$MpIdx;
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
            MP.*, A.wAdminName, MR.IsStatus AS MrIsStatus,
                   (SELECT RegDatm FROM lms.lms_mock_answerpaper WHERE MemIdx = MR.MemIdx AND MrIdx = MR.MrIdx ORDER BY RegDatm DESC LIMIT 1) AS IsDate,
                   PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,          
                   C1.CateName, C1.IsUse AS IsUseCate
        ";

        $from = "
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode AND PD.IsStatus = 'Y'
            JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['mockRegister']} AS MR ON MP.ProdCode = MR.ProdCode
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
        ";

        $obder_by = " ORDER BY `MP`.`ProdCode` DESC";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        return $query->row_array();
    }


    /**
     * 로그생성 시험시간 업데이트
     * @param array $LogIdx $sec $logtype
     * @return mixed
     * @시험시간 저장은 과목 넘어갈때 문항클릭시 저장됨 
     */
    public function makeExamLog($LogIdx,$sec){
        try {
            if(empty($LogIdx) === false){
                // 데이터 수정
                $log_data = [
                    'LogType'=> 'S',
                    'RegIp'=> $this->input->ip_address(),
                    'RemainSec' => $sec
                ];

                $this->_conn->set($log_data)->set('RegDatm', 'NOW()', false)->where('LogIdx',$LogIdx)->update($this->_table['mockLog']);

                if(!$this->_conn->affected_rows()) {
                    throw new Exception('시험 로그변경에 실패했습니다.');
                }
                return $LogIdx;
            }else{
                // 데이터 등록
                $log_data = [
                    'LogType'=> 'S',
                    'RegIp'=> $this->input->ip_address(),
                    'RemainSec' => $sec
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
                JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y'
            
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
                    JOIN {$this->_table['mockExamQuestion']} AS MQ ON MA.MqIdx = MQ.MqIdx
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
                'IsStatus' => 'Y'
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


}
