<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegGoodsModel extends WB_Model
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

        'memo' => 'lms_Product_Memo',
        'autocoupon' => 'lms_Product_R_AutoCoupon',

        'mockProduct' => 'lms_Product_Mock',
        'mockProductExam' => 'lms_Product_Mock_R_Paper',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_Product_R_Category',
        'ProductSale' => 'lms_Product_Sale',
        'ProductSMS' => 'lms_Product_Sms',
        'ProductJson' => 'lms_product_json_data',

        'mockRegister' => 'lms_mock_register',
        'mockRegisterR' => 'lms_mock_register_r_paper',

        'mockAnswerTemp' => 'lms_mock_answertemp',
        'mockAnswerPaper' => 'lms_mock_answerpaper',
        'mockLog' => 'lms_mock_log',
        'order_product' => 'lms_order_product',
        'order' => 'lms_order',

        'copylog' => 'lms_product_copy_log'
    ];

    public $_groupCcd = [
        'option' => '660',
        'SerialCcd' => '666',
        'CandidateAreaCcd' => '631',
        'SmsSendCallBackNum' => '706'   //SMS 발송번호
    ];


    public function __construct()
    {
        parent::__construct('lms');
    }

    /***********
     * 테스트용 랜덤성적입력
     * @param $condition
     * @throws Exception
     */
    function saveFake($condition){
        var_dump($condition);
        //exit;

        $arrMPSet = array();

        $idx = $condition['idx'];
        $TakeFormsCcd = $condition['TakeFormsCcd'];
        $MpIdx = $condition['MpIdx'];

        $MpIdx[] = $condition['SMpIdx1'];
        $MpIdx[] = $condition['SMpIdx2'];

        $AddPointCcds = $condition['AddPointCcds'];
        $people = $condition['people'];
        $cate = $condition['cate'];

        $MpIdx = array_unique ($MpIdx);

        for($i =0; $i < COUNT($MpIdx); $i++){
            $cuMP = $MpIdx[$i];
            $column = "
                MpIdx, SubjectIdx
            ";

            $from = "
                FROM 
                lms_Mock_Paper AS MP 
                JOIN lms_Mock_R_Category AS MR ON MP.MrcIdx = MR.MrcIdx
                JOIN lms_mock_r_subject AS MS ON MR.MrsIdx = MS.MrsIdx
            ";

            $obder_by = " ";

            $where = " WHERE MpIdx = ".$cuMP;

            $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
            $data = $query->row_array();
            $arrMPSet[$cuMP] = $data['SubjectIdx'];
        }

        $column = "
            MemId, MemIdx
        ";

        $from = "
            FROM lms_member    
        ";

        $obder_by = " ORDER BY RAND() LIMIT ".$people;

        $where = " ";
        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
        $res = $query->result_array();

        $mMemIdx = $res[0]['MemIdx'];
        $mMrIdx = '';
        $mProdIdx = $idx;

        //var_dump($arrMPSet);

        foreach($res AS $key => $val){
            // 데이터 입력

            $MemIdx = $val['MemIdx'];
            $data1 = [
                'ProdCode' => $idx,
                'MemIdx'  => $MemIdx,
                'OrderProdIdx'=> '1',
                'TakeNumber' => '1000000'+$key,
                'TakeMockPart' => $cate,
                'TakeForm' => $TakeFormsCcd,
                'TakeArea' => '999',
                'AddPoint' => $AddPointCcds,
                'IsStatus' => 'Y',
                'IsTicketPrint' => 'N',
                'IsDisplay' => 'Y',
                'IsTake' => 'Y'
            ];
            //var_dump($data1);

            if ($this->_conn->set($data1)->insert($this->_table['mockRegister']) === false) {
                throw new \Exception('임시저장에 실패했습니다.');
            }

            $MrIdx = $this->_conn->insert_id();
            $mMrIdx = $MrIdx;

            foreach($arrMPSet AS $key2 => $val2){

                $data2 = [
                    'MrIdx' => $MrIdx,
                    'ProdCode'=> $idx,
                    'MpIdx' => $key2,
                    'SubjectIdx' => $val2,
                ];

                //var_dump($data2);

                if ($this->_conn->set($data2)->insert($this->_table['mockRegisterR']) === false) {
                    throw new \Exception('임시저장에 실패했습니다.');
                }

                $data22 = [
                    'LogType' => 'S',
                    'RegIp'  => '000',
                    'RemainSec'=> '99999',
                    'MrIdx' => $MrIdx,
                ];

                if ($this->_conn->set($data22)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockLog']) === false) {
                    throw new \Exception('임시저장에 실패했습니다.');
                }

                $LogIdx = $this->_conn->insert_id();

                $column = "
                    MQ.MqIdx, 
                    QuestionNO,
                    RightAnswer
                ";

                $from = "
                    FROM
                        {$this->_table['mockExamBase']} AS MP
                        JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                ";

                $obder_by = " ORDER BY QuestionNO ";

                $where = "WHERE MP.MpIdx = ".$key2;
                //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";
                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
                $res2 = $query->result_array();
                foreach ($res2 AS $key3 => $val3){
                    $Answer =rand(1,5);
                    if($val3['RightAnswer'] == $Answer){
                        $IsWrong = 'Y';
                    }else{
                        $IsWrong = 'N';
                    }

                    $data3 = [
                        'MemIdx' => $MemIdx,
                        'MrIdx'  => $MrIdx,
                        'ProdCode'=> $idx,
                        'MpIdx' => $key2,
                        'MqIdx' => $val3['MqIdx'],
                        'LogIdx' => $LogIdx,
                        'Answer' => $Answer,
                        'IsWrong' => $IsWrong
                    ];
                    //var_dump($data3);

                    if ($this->_conn->set($data3)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockAnswerPaper']) === false) {
                        throw new \Exception('임시저장에 실패했습니다.');
                    }

                }

            }



        }


        echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!정상입력되었습니다.!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";


    }


    /***********
     * 테스트용 랜덤성적입력
     * @param $condition
     * @throws Exception
     */
    function saveFake2($idx,$TakeFormsCcd,$MpIdx1,$MpIdx2,$SMpIdx1,$SMpIdx2,$AddPointCcds,$people,$cate,$mode){
        $retry=0;
        $notdone=TRUE;
        while( $notdone && $retry < 3 ) {
            try {
                $this->_conn->trans_begin();
                $arrMPSet = array();

                $idx = $idx;
                $TakeFormsCcd = $TakeFormsCcd;
                $AddPointCcds = $AddPointCcds;
                $cate = $cate;
                $mode = $mode;
                $MpIdx[] = $MpIdx1;
                $MpIdx[] = $MpIdx2;
                $MpIdx[] = $SMpIdx1;
                $MpIdx[] = $SMpIdx2;
                $people = $people;
                $mProdIdx = $idx;

                $MpIdx = array_unique($MpIdx);


                for ($i = 0; $i < COUNT($MpIdx); $i++) {
                    $cuMP = $MpIdx[$i];
                    $column = "
                    MpIdx, SubjectIdx
                ";

                    $from = "
                    FROM 
                    lms_Mock_Paper AS MP 
                    JOIN lms_Mock_R_Category AS MR ON MP.MrcIdx = MR.MrcIdx
                    JOIN lms_mock_r_subject AS MS ON MR.MrsIdx = MS.MrsIdx
                ";

                    $obder_by = " ";

                    $where = " WHERE MpIdx = " . $cuMP;

                    $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);


                    $data = $query->row_array();
                    $arrMPSet[$cuMP] = $data['SubjectIdx'];
                }

                $column = "
                MemId, MemIdx
            ";

                $from = "
                FROM lms_member    
            ";

                $obder_by = " ORDER BY RAND() LIMIT " . $people;

                $where = " ";
                $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);


                $res = $query->result_array();

                $mMemIdx = $res[0]['MemIdx'];
                $mMrIdx = '';

                foreach ($res AS $key => $val) {
                    // 데이터 입력

                    $MemIdx = $val['MemIdx'];
                    $data1 = [
                        'ProdCode' => $idx,
                        'MemIdx' => $MemIdx,
                        'OrderProdIdx' => '1',
                        'TakeNumber' => '1000000' + $key,
                        'TakeMockPart' => $cate,
                        'TakeForm' => $TakeFormsCcd,
                        'TakeArea' => '999',
                        'AddPoint' => $AddPointCcds,
                        'IsStatus' => 'Y',
                        'IsTicketPrint' => 'N',
                        'IsDisplay' => 'Y',
                        'IsTake' => 'Y'
                    ];
                    //var_dump($data1);

                    if ($this->_conn->set($data1)->insert($this->_table['mockRegister']) === false) {
                        throw new \Exception('임시저장에 실패했습니다.');
                    }

                    $MrIdx = $this->_conn->insert_id();
                    $mMrIdx = $MrIdx;

                    foreach ($arrMPSet AS $key2 => $val2) {

                        $data2 = [
                            'MrIdx' => $MrIdx,
                            'ProdCode' => $idx,
                            'MpIdx' => $key2,
                            'SubjectIdx' => $val2,
                        ];

                        //var_dump($data2);

                        if ($this->_conn->set($data2)->insert($this->_table['mockRegisterR']) === false) {
                            throw new \Exception('임시저장에 실패했습니다.');
                        }


                        $data22 = [
                            'LogType' => 'S',
                            'RegIp' => '000',
                            'RemainSec' => '99999',
                            'MrIdx' => $MrIdx,
                        ];

                        if ($this->_conn->set($data22)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockLog']) === false) {
                            throw new \Exception('임시저장에 실패했습니다.');
                        }


                        $LogIdx = $this->_conn->insert_id();

                        $column = "
                        MQ.MqIdx, 
                        QuestionNO,
                        RightAnswer
                    ";

                        $from = "
                        FROM
                            {$this->_table['mockExamBase']} AS MP
                            JOIN {$this->_table['mockExamQuestion']} AS MQ ON MQ.MpIdx = MP.MpIdx AND MP.IsUse = 'Y' AND MQ.IsStatus = 'Y'
                    ";

                        $obder_by = " ORDER BY QuestionNO ";

                        $where = "WHERE MP.MpIdx = " . $key2;
                        //echo "<pre>".'select ' . $column . $from . $where . $obder_by."</pre>";

                        $query = $this->_conn->query('select ' . $column . $from . $where . $obder_by);
                        $res2 = $query->result_array();
                        foreach ($res2 AS $key3 => $val3) {
                            $Answer = rand(1, 5);
                            if ($val3['RightAnswer'] == $Answer) {
                                $IsWrong = 'Y';
                            } else {
                                $IsWrong = 'N';
                            }


                            $data3 = [
                                'MemIdx' => $MemIdx,
                                'MrIdx' => $MrIdx,
                                'ProdCode' => $idx,
                                'MpIdx' => $key2,
                                'MqIdx' => $val3['MqIdx'],
                                'LogIdx' => $LogIdx,
                                'Answer' => $Answer
                            ];

                            if ($this->_conn->set($data3)->set('RegDatm', 'NOW()', false)->insert($this->_table['mockAnswerTemp']) === false) {
                                throw new \Exception('임시저장에 실패했습니다.');
                            }


                        }

                    }

                }

                $this->examSend($mProdIdx, $mMrIdx, $mMemIdx);
                $notdone=FALSE;
                $this->_conn->trans_commit();
            } catch (\Exception $e) {
                $this->_conn->trans_rollback();
                $retry++;
                //return error_result($e);
            }
        }

        if( $retry == 3) {
            throw new Exception("Try later, sorry, too much guys other there, or it's not your day.");
        }

    }

    /**
     * 정답제출
     * @param array $formData
     * @return mixed
     */
    public function examSend($ProdCode, $MrIdx, $MemIdx)
    {
        $retry=0;
        $notdone=TRUE;
        while( $notdone && $retry < 3 ) {
            try {
                $this->_conn->trans_begin();

                //$ProdCode = element('ProdCode', $formData);
                //$MrIdx = element('MrIdx', $formData);

                //삭제후 입력
                $where = ['MemIdx' => $MemIdx, 'ProdCode' => $ProdCode, 'MrIdx' => $MrIdx];

                try {
                    if ($this->_conn->delete($this->_table['mockAnswerPaper'], $where) === false) {
                        throw new \Exception('삭제에 실패했습니다.');
                    }
                } catch (\Exception $e) {
                    return error_result($e);
                }

                $insert_column = "
                MemIdx, MrIdx, ProdCode, MpIdx, MqIdx, LogIdx, Answer, IsWrong, RegDatm
            ";
                $select_column = "
                '" . $MemIdx . "', '" . $MrIdx . "', '" . $ProdCode . "', MA.MpIdx, MQ.MqIdx, LogIdx, Answer, if(Answer = RightAnswer, 'Y', 'N') AS IsWrong, MA.RegDatm
            ";
                $query = "
                INSERT INTO {$this->_table['mockAnswerPaper']} ({$insert_column})
                SELECT 
                    {$select_column} 
                FROM 
                    {$this->_table['mockAnswerTemp']} AS MA
                    JOIN {$this->_table['mockExamQuestion']} AS MQ ON MA.MqIdx = MQ.MqIdx AND MQ.IsStatus = 'Y' AND MQ.IsStatus = 'Y'
                WHERE 
                    MemIdx = " . $MemIdx . "
                    AND ProdCode = " . $ProdCode . "
                    AND MrIdx = " . $MrIdx . " ORDER BY MpIdx
            ";
                $this->_conn->query($query);
                $notdone=FALSE;
                $this->_conn->trans_commit();
            } catch (\Exception $e) {
                $this->_conn->trans_rollback();
                $retry++;
                //return error_result($e);
            }
        }

        if($retry == 3) {
            throw new Exception("Try later, sorry, too much guys other there, or it's not your day.");
        }

        echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!정상입력되었습니다2.!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
        return true;

    }

    /**
     * 메인리스트
     */
    public function mainList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";
        $select = "
            SELECT MP.*, A.wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsUse, PD.IsCoupon, PS.SalePrice, PS.RealSalePrice,          
            C1.CateName, C1.IsUse AS IsUseCate
            ,SC1.CcdName As AcceptStatusCcd_Name,
            (
            	SELECT COUNT(mr1.MemIdx) 
            	FROM 
            		{$this->_table['mockRegister']} mr1
            		join {$this->_table['order_product']} op1 on mr1.OrderProdIdx = op1.OrderProdIdx
            		join {$this->_table['order']} o1 on op1.OrderIdx = o1.OrderIdx
            		join {$this->_table['sysCode']} sc1 on mr1.TakeForm = sc1.Ccd
            	WHERE mr1.IsStatus = 'Y' AND mr1.IsTake = 'Y' AND mr1.ProdCode = MP.ProdCode AND mr1.TakeForm = '690001' and op1.PayStatusCcd='676001'
            ) AS OnlineCnt,
	        (
	        	SELECT COUNT(mr2.MemIdx) 
	        	FROM 
	        		{$this->_table['mockRegister']} mr2
            		join {$this->_table['order_product']} op2 on mr2.OrderProdIdx = op2.OrderProdIdx
            		join {$this->_table['order']} o2 on op2.OrderIdx = o2.OrderIdx 
            		join {$this->_table['sysCode']} sc2 on mr2.TakeForm = sc2.Ccd
            	WHERE mr2.IsStatus = 'Y' AND mr2.IsTake = 'Y' AND mr2.ProdCode = MP.ProdCode AND mr2.TakeForm = '690002' and op2.PayStatusCcd='676001'
			) AS OfflineCnt,
			(
            	SELECT COUNT(mr3.MemIdx) 
            	FROM 
            		{$this->_table['mockRegister']} mr3
            		join {$this->_table['order_product']} op3 on mr3.OrderProdIdx = op3.OrderProdIdx
            		join {$this->_table['order']} o3 on op3.OrderIdx = o3.OrderIdx
            		join {$this->_table['sysCode']} sc3 on mr3.TakeForm = sc3.Ccd
            	WHERE mr3.IsStatus = 'Y' AND mr3.ProdCode = MP.ProdCode AND mr3.TakeForm = '690001' and op3.PayStatusCcd='676001'
            ) AS OnlineRegCnt,
	        (
	        	SELECT COUNT(mr4.MemIdx) 
	        	FROM 
	        		{$this->_table['mockRegister']} mr4
            		join {$this->_table['order_product']} op4 on mr4.OrderProdIdx = op4.OrderProdIdx
            		join {$this->_table['order']} o4 on op4.OrderIdx = o4.OrderIdx 
            		join {$this->_table['sysCode']} sc4 on mr4.TakeForm = sc4.Ccd
            	WHERE mr4.IsStatus = 'Y' AND mr4.ProdCode = MP.ProdCode AND mr4.TakeForm = '690002' and op4.PayStatusCcd='676001'
			) AS OfflineRegCnt
			
        ";

        $from = "
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode 
            JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y' and PS.SaleTypeCcd='613001'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT OUTER JOIN {$this->_table['sysCode']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE PD.IsStatus = 'Y' ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MP.ProdCode DESC\n";
        //echo "<pre>". $select . $from . $where . $order . $offset_limit . "</pre>";
        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;



        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);


        // 데이터정리
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        foreach ($data as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
            $it['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
            $it['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';

            if($it['SaleStartDatm'] > date('Y-m-d H:i:s')){
                $dres = "접수대기";
            } else if($it['SaleStartDatm'] < date('Y-m-d H:i:s') && $it['SaleEndDatm'] > date('Y-m-d H:i:s')) {
                $dres = "접수중";
            } else {
                $dres = "접수마감";
            }

            $it['AcceptStatusCcd_Name'] = $dres;
            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if( !empty($codes[$mockKindCode][$mp]) ) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return array($data, $count);
    }


    /**
     * 데이터 복사
     */
    public function copyData($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $RegIp = $this->input->ip_address();
        $RegAdminIdx = $this->session->userdata('admin_idx');
        $RegDatm = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_start();

            // 신규 상품코드 조회
            $prodcode = $this->_conn->getFindResult($this->_table['Product'], 'IFNULL(MAX(ProdCode) + 1, 200001) as ProdCode');
            $prodcode = $prodcode['ProdCode'];


            // lms_Product 복사
            $sql = "
                INSERT INTO {$this->_table['Product']}
                    (ProdCode, SiteCode, ProdName, ProdTypeCcd, SaleStartDatm, SaleEndDatm, SaleStatusCcd, PointApplyCcd, IsSms, IsUse, IsCoupon, IsCart,
                     RegIp, RegAdminIdx, RegDatm)
                SELECT ?, SiteCode, CONCAT(ProdName), ProdTypeCcd, SaleStartDatm, SaleEndDatm, SaleStatusCcd, PointApplyCcd, IsSms, 'N', IsCoupon, IsCart, ?, ?, ?
                FROM {$this->_table['Product']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));
            //echo $this->_conn->last_query().'<BR><BR><BR>';exit;


            // lms_Product_R_Category 복사
            $sql = "
                INSERT INTO {$this->_table['ProductCate']}
                    (ProdCode, CateCode, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, CateCode, ?, ?, ?
                FROM {$this->_table['ProductCate']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));
            //echo $this->_conn->last_query().'<BR><BR><BR>';

            // lms_Product_Sale 복사
            $sql = "
                INSERT INTO {$this->_table['ProductSale']}
                    (ProdCode, SaleTypeCcd, SalePrice, SaleRate, SaleDiscType, RealSalePrice, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, SaleTypeCcd, SalePrice, SaleRate, SaleDiscType, RealSalePrice, ?, ?, ?
                FROM {$this->_table['ProductSale']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));
            //echo $this->_conn->last_query().'<BR><BR><BR>';

            // lms_Product_Sms 복사
            $sql = "
                INSERT INTO {$this->_table['ProductSMS']}
                    (ProdCode, SendTel, Memo, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, SendTel, Memo, ?, ?, ?
                FROM {$this->_table['ProductSMS']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));
            //echo $this->_conn->last_query().'<BR><BR><BR>';

            // lms_Product_Mock 복사
            $sql = "
                INSERT INTO {$this->_table['mockProduct']}
                    (ProdCode, TakePart, MockPart, TakeFormsCcd, TakeAreas1CCds, TakeAreas2Ccds, AddPointCcds, MockYear, MockRotationNo,
                     ClosingPerson, AcceptStatusCcd, TakeStartDatm, TakeEndDatm, TakeTime, 
                     RegIp, RegAdminIdx, RegDatm)
                SELECT ?, TakePart, MockPart, TakeFormsCcd, TakeAreas1CCds, TakeAreas2Ccds, AddPointCcds, MockYear, MockRotationNo,
                       ClosingPerson, AcceptStatusCcd, TakeStartDatm, TakeEndDatm, TakeTime, ?, ?, ?
                FROM {$this->_table['mockProduct']}
                WHERE ProdCode = ? ";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));
            //echo $this->_conn->last_query().'<BR><BR><BR>';

            // lms_Product_Mock_R_Paper 복사
            $sql = "
                INSERT INTO {$this->_table['mockProductExam']}
                    (ProdCode, MpIdx, MockType, OrderNum, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, MpIdx, MockType, OrderNum, ?, ?, ?
                FROM {$this->_table['mockProductExam']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegIp, $RegAdminIdx, $RegDatm, $idx));
            //echo $this->_conn->last_query().'<BR><BR><BR>';

            // lms_product_r_autocoupon 복사
            $sql = "
                INSERT INTO {$this->_table['autocoupon']}
                    (ProdCode, AutoCouponIdx, IsStatus, RegDatm, RegAdminIdx,RegIp)
                SELECT ?, AutoCouponIdx, IsStatus, ?, ?, ?
                FROM {$this->_table['autocoupon']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegDatm, $RegAdminIdx, $RegIp, $idx));
            //echo $this->_conn->last_query().'<BR><BR><BR>';

            // lms_product_memo 복사
            $sql = "
                INSERT INTO {$this->_table['memo']}
                    (ProdCode, MemoTypeCcd, Memo, IsOutput, IsStatus, RegDatm, RegAdminIdx, RegIp)
                SELECT ?, MemoTypeCcd, Memo, IsOutput, IsStatus, ?, ?, ?
                FROM {$this->_table['memo']}
                WHERE ProdCode = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($prodcode, $RegDatm, $RegAdminIdx, $RegIp, $idx));
            //echo $this->_conn->last_query().'<BR><BR><BR>';

            // json 데이터 복사
            $sql = "
                INSERT INTO {$this->_table['ProductJson']}
                    (ProdCode, ProdPriceData, ProdBookData, LectureSampleData)
                SELECT ?, ProdPriceData, ProdBookData, LectureSampleData
                FROM {$this->_table['ProductJson']}
                WHERE ProdCode = ? ";
            $this->_conn->query($sql, array($prodcode, $idx));
            //echo $this->_conn->last_query().'<BR><BR><BR>';

            //복사 로그 저장
            $copy_data = [
                'ProdCode' => $prodcode
                ,'ProdCode_Original' => $idx
                ,'RegAdminIdx' =>$RegAdminIdx
            ];
            if($this->_conn->set($copy_data)->insert($this->_table['copylog']) === false) {
                throw new \Exception('복사 이력 저장에 실패했습니다.');
            }

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('복사에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $prodcode]];
    }


    /**
 * 등록 (lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms)
 *
 * lms_Product > SaleStatusCcd 판매가능으로 상태고정
 * lms_Product_Mock > IsRegister 접수상태값으로 상태구분
 */
    public function store($SaleStartDatm, $SaleEndDatm, $TakeStartDatm, $TakeEndDatm)
    {
        $date = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_start();

            // 신규 상품코드 조회
            $prodcode = $this->_conn->getFindResult($this->_table['Product'], 'IFNULL(MAX(ProdCode) + 1, 200001) as ProdCode');
            $prodcode = $prodcode['ProdCode'];


            // lms_Product 저장
            $data = array(
                'ProdCode'      => $prodcode,
                'SiteCode'      => $this->input->post('siteCode'),
                'ProdName'      => $this->input->post('ProdName', true),
                'ProdTypeCcd'   => $this->config->item('sysCode_ProdTypeCcd', 'mock'),
                'SaleStartDatm' => $SaleStartDatm,
                'SaleEndDatm'   => $SaleEndDatm,
                'SaleStatusCcd' => $this->config->item('sysCode_SaleStatusCcd', 'mock'),
                'IsPoint'=>'N',
                'PointApplyCcd'=> '635002',
                'PointSavePrice'=> '0',
                'PointSaveType'=> 'R',
                'IsSms'         => $this->input->post('IsSms'),
                'IsUse'         => $this->input->post('IsUse'),
                'IsCoupon'       => $this->input->post('IsCoupon'),
                'IsCart'         => 'N',
                'RegIp'         => $this->input->ip_address(),
                'RegDatm'       => $date,
                'RegAdminIdx'   => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['Product'], $data);

            // lms_Product_R_Category 저장
            $data = array(
                'ProdCode'    => $prodcode,
                'CateCode'    => $this->input->post('cateD1'),
                'RegIp'       => $this->input->ip_address(),
                'RegDatm'     => $date,
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['ProductCate'], $data);

            // lms_Product_Sale 저장
            $data = array(
                'ProdCode'      => $prodcode,
                'SaleTypeCcd'   => $this->config->item('sysCode_SaleTypeCcd', 'mock'),
                'SalePrice'     => $this->input->post('SalePrice'),
                'SaleRate'      => $this->input->post('SaleRate'),
                'SaleDiscType'  => $this->input->post('SaleDiscType'),
                'RealSalePrice' => $this->input->post('RealSalePrice'),
                'RegIp'         => $this->input->ip_address(),
                'RegDatm'       => $date,
                'RegAdminIdx'   => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['ProductSale'], $data);

            // lms_Product_Sms 저장
            $data = array(
                'ProdCode'    => $prodcode,
                'SendTel'     => $this->input->post('SendTel'),
                'Memo'        => $this->input->post('Memo', true),
                'RegIp'       => $this->input->ip_address(),
                'RegDatm'     => $date,
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['ProductSMS'], $data);


            // lms_Product_Mock 저장
            $data = array(
                'ProdCode'       => $prodcode,
                'TakePart'       => $this->input->post('TakePart'),
                'MockPart'       => implode(',', $this->input->post('cateD2')),
                //'TakeFormsCcd'  => implode(',', $this->input->post('TakeFormsCcd')),
                'TakeFormsCcd'  =>  $this->input->post('TakeFormsCcd'),
                'TakeAreas1CCds' => empty($this->input->post('TakeAreas1CCds')) ? '': implode(',', $this->input->post('TakeAreas1CCds')),
                'TakeAreas2Ccds'  => empty($this->input->post('TakeAreas2Ccds')) ? '' : implode(',', $this->input->post('TakeAreas2Ccds')),
                'AddPointCcds'   => implode(',', $this->input->post('AddPointCcds')),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                'ClosingPerson'  => empty($this->input->post('ClosingPerson')) ? '' : $this->input->post('ClosingPerson'),
                'AcceptStatusCcd' => $this->input->post('AcceptStatusCcd'),
                //'IsRegister'     => $this->input->post('IsRegister'), // 접수상태
                //'TakeType'       => $this->input->post('TakeType'),
                'TakeStartDatm'  => ($this->input->post('TakeType') == 'A') ? null : $TakeStartDatm,
                'TakeEndDatm'    => ($this->input->post('TakeType') == 'A') ? null : $TakeEndDatm,
                'TakeTime'       => $this->input->post('TakeTime'), // 분
                //'IsUse'          => $this->input->post('IsUse'),
                'RegIp'          => $this->input->ip_address(),
                'RegDatm'        => $date,
                'RegAdminIdx'    => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['mockProduct'], $data);

            // lms_Product_Mock_R_Paper 저장
            if( $this->input->post('MpIdx') ) {
                $dataSubject = array();
                foreach ($this->input->post('MpIdx') as $k => $v) {
                    $dataSubject[] = array(
                        'ProdCode'    => $prodcode,
                        'MpIdx'       => $_POST['MpIdx'][$k],
                        'MockType'    => $_POST['MockType'][$k],
                        'OrderNum'    => $_POST['OrderNum'][$k],
                        'RegIp'       => $this->input->ip_address(),
                        'RegDatm'     => $date,
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                }
                if($dataSubject) $this->_conn->insert_batch($this->_table['mockProductExam'], $dataSubject);
            }

            $arrMemo['Memo'] = $this->input->post('CMemo');
            $arrMemo['MemoTypeCcd'] = $this->input->post('MemoTypeCcd');
            $arrMemo['IsOutPut'] = $this->input->post('IsOutPut');

            /*----------------          메모등록        ---------------*/
            if($this->_setMemo($arrMemo,$prodcode) !== true) {
                throw new \Exception('메모 등록에 실패했습니다.');
            }

            $CouponIdx['CouponIdx'] = $this->input->post('CouponIdx');
            /*----------------          자동지급쿠폰 등록        ---------------*/
            if($this->_setAutoCoupon($CouponIdx,$prodcode) !== true) {
                throw new \Exception('자동지급쿠폰 등록에 실패했습니다.');
            }

            // 상품연관 데이터 json 형태로 테이블 저장
            $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$prodcode]);
            $result = $query->row(0)->ReturnMsg;

            if ($result != 'Success') {
                throw new \Exception('JSON 데이터 등록에 실패했습니다.');
            }

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $prodcode]];
    }


    /**
     * 수정
     */
    public function update($SaleStartDatm, $SaleEndDatm, $TakeStartDatm, $TakeEndDatm)
    {
        $date = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_start();

            // lms_Product 저장
            $data = array(
                'ProdName'      => $this->input->post('ProdName', true),
                'SaleStartDatm' => $SaleStartDatm,
                'SaleEndDatm'   => $SaleEndDatm,
                'IsSms'         => $this->input->post('IsSms'), // 문자사용여부
                'IsUse'         => $this->input->post('IsUse'),
                'IsCoupon'         => $this->input->post('IsCoupon'),
                'UpdDatm'       => $date,
                'UpdAdminIdx'   => $this->session->userdata('admin_idx'),
            );
            $where = array('ProdCode' => $this->input->post('idx'));
            $this->_conn->update($this->_table['Product'], $data, $where);

            // lms_Product_R_Category 저장
            $data = array(
                'UpdDatm'     => $date,
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = array('ProdCode' => $this->input->post('idx'));
            $this->_conn->update($this->_table['ProductCate'], $data, $where);

            // lms_Product_Sale 저장
            $data = array(
                'SalePrice'     => $this->input->post('SalePrice'),
                'SaleRate'      => $this->input->post('SaleRate'),
                'SaleDiscType'  => $this->input->post('SaleDiscType'),
                'RealSalePrice' => $this->input->post('RealSalePrice'),
                'UpdDatm'       => $date,
                'UpdAdminIdx'   => $this->session->userdata('admin_idx'),
            );
            $where = array('ProdCode' => $this->input->post('idx'));
            $this->_conn->update($this->_table['ProductSale'], $data, $where);

            // lms_Product_Sms 저장
            $data = array(
                'SendTel'     => $this->input->post('SendTel'),
                'Memo'        => $this->input->post('Memo', true),
                'UpdDatm'     => $date,
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $ProdCode = $this->input->post('idx');
            $where = array('ProdCode' => $ProdCode);
            $this->_conn->update($this->_table['ProductSMS'], $data, $where);

            // lms_Product_Mock 저장
            $data = array(
                //'TakeFormsCcd'  => implode(',', $this->input->post('TakeFormsCcd')),
                'TakeFormsCcd'  =>  $this->input->post('TakeFormsCcd'),
                'TakeAreas1CCds' => empty($this->input->post('TakeAreas1CCds')) ? '': implode(',', $this->input->post('TakeAreas1CCds')),
                'TakeAreas2Ccds'  => empty($this->input->post('TakeAreas2Ccds')) ? '' : implode(',', $this->input->post('TakeAreas2Ccds')),
                'AddPointCcds'   => implode(',', $this->input->post('AddPointCcds')),
                'MockYear'       => $this->input->post('MockYear'),
                'MockRotationNo' => $this->input->post('MockRotationNo'),
                'ClosingPerson'  => empty($this->input->post('ClosingPerson')) ? '' : $this->input->post('ClosingPerson'),
                'AcceptStatusCcd' => $this->input->post('AcceptStatusCcd'),
                //'IsRegister'     => $this->input->post('IsRegister'),
                //'TakeType'       => $this->input->post('TakeType'),
                'TakeStartDatm'  => ($this->input->post('TakeType') == 'A') ? null : $TakeStartDatm,
                'TakeEndDatm'    => ($this->input->post('TakeType') == 'A') ? null : $TakeEndDatm,
                'TakeTime'       => $this->input->post('TakeTime'), // 분
                //'IsUse'          => $this->input->post('IsUse'),
                'UpdDatm'        => $date,
                'UpdAdminIdx'    => $this->session->userdata('admin_idx'),
            );
            $where = array('ProdCode' => $this->input->post('idx'));
            $this->_conn->update($this->_table['mockProduct'], $data, $where);

            // lms_Product_Mock_R_Paper 저장
            $this->updateSubject($date);

            $arrMemo['Memo'] = $this->input->post('CMemo');
            $arrMemo['MemoTypeCcd'] = $this->input->post('MemoTypeCcd');
            $arrMemo['IsOutPut'] = $this->input->post('IsOutPut');
            /*----------------          메모등록        ---------------*/
            if($this->_setMemo($arrMemo,$ProdCode) !== true) {
                throw new \Exception('메모 등록에 실패했습니다.');
            }

            $CouponIdx['CouponIdx'] = $this->input->post('CouponIdx');

            /*----------------          자동지급쿠폰 등록        ---------------*/
            if($this->_setAutoCoupon($CouponIdx,$ProdCode) !== true) {
                throw new \Exception('자동지급쿠폰 등록에 실패했습니다.');
            }

            // 상품연관 데이터 json 형태로 테이블 저장
            $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$this->input->post('idx')]);
            $result = $query->row(0)->ReturnMsg;

            if ($result != 'Success') {
                throw new \Exception('JSON 데이터 등록에 실패했습니다.');
            }


            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $this->input->post('idx')]];
    }


    /**
     * 수정 - 과목부문 (삭제는 바로 처리)
     *
     */
    public function updateSubject($date)
    {
        $dataReg = $dataMod = $dataDel = array();

        if( !empty($this->input->post('chapterTotal')) ) {
            foreach ($this->input->post('chapterTotal') as $k => $v) {
                if ( empty($this->input->post('chapterExist')) || !in_array($v, $this->input->post('chapterExist')) ) { // 신규등록 데이터
                    $dataReg[] = array(
                        'ProdCode'    => $this->input->post('idx'),
                        'MpIdx'       => $_POST['MpIdx'][$k],
                        'MockType'    => $_POST['MockType'][$k],
                        'OrderNum'    => $_POST['OrderNum'][$k],
                        'RegIp'       => $this->input->ip_address(),
                        'RegDatm'     => $date,
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                } else { // 수정 데이터
                    $dataMod[] = array(
                        'PmrpIdx' => $v,
                        'MpIdx'       => $_POST['MpIdx'][$k],
                        'MockType'    => $_POST['MockType'][$k],
                        'OrderNum'    => $_POST['OrderNum'][$k],
                        'UpdDatm' => $date,
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                }
            }
        }

        // 삭제 데이터 (IsStatus Update)
        if( !empty($this->input->post('chapterDel')) ) {
            foreach ($this->input->post('chapterDel') as $k => $v) {
                $dataDel[] = array(
                    'PmrpIdx' => $v,
                    'IsStatus' => 'N',
                    'UpdDatm' => date("Y-m-d H:i:s"),
                    'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                );
            }
        }

        if($dataReg) $this->_conn->insert_batch($this->_table['mockProductExam'], $dataReg);
        if($dataMod) $this->_conn->update_batch($this->_table['mockProductExam'], $dataMod, 'PmrpIdx');
        if($dataDel) $this->_conn->update_batch($this->_table['mockProductExam'], $dataDel, 'PmrpIdx');
    }


    /**
     * 등록정보 조회(1건)
     */
    public function getGoods($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        // 기본정보
        $sql = "
            SELECT MP.*,
                   PD.SiteCode, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsSms, PD.IsUse, PC.CateCode,PD.IsCoupon, 
                   PS.SalePrice, PS.SaleRate, PS.SaleDiscType, PS.RealSalePrice,
                   SMS.SendTel, SMS.Memo
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode  
            JOIN {$this->_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            JOIN {$this->_table['ProductSMS']} AS SMS ON MP.ProdCode = SMS.ProdCode AND SMS.IsStatus = 'Y'
            WHERE PD.IsStatus = 'Y' AND MP.ProdCode = '$idx'";

        $data = $this->_conn->query($sql)->row_array();

        $data['MockPart'] = explode(',', $data['MockPart']);
        $data['TakeFormsCcd'] = explode(',', $data['TakeFormsCcd']);
        $data['TakeAreas1CCds'] = explode(',', $data['TakeAreas1CCds']);
        $data['TakeAreas2Ccds'] = explode(',', $data['TakeAreas2Ccds']);
        $data['AddPointCcds'] = explode(',', $data['AddPointCcds']);


        // 과목정보
        $sql = "
            SELECT MPE.*, EB.Year, EB.RotationNo, EB.PapaerName, SJ.SubjectName, PMS.wProfName
            FROM {$this->_table['mockProduct']} AS MP
            JOIN {$this->_table['mockProductExam']} AS MPE ON MP.ProdCode = MPE.ProdCode AND MPE.IsStatus = 'Y'
            JOIN {$this->_table['mockExamBase']} AS EB ON MPE.MpIdx = EB.MpIdx AND EB.IsStatus = 'Y'
            JOIN {$this->_table['mockAreaCate']} AS MC ON EB.MrcIdx = MC.MrcIdx AND MC.IsStatus = 'Y'
            JOIN {$this->_table['mockSubject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y'
            JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
            JOIN {$this->_table['professor']} AS P ON EB.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y'
            WHERE MP.ProdCode = '$idx'
            ORDER BY MPE.OrderNum ASC";

        $sData = $this->_conn->query($sql)->result_array();

        return array($data, $sData);
    }

    //메모등록
    public function _setMemo($input=[],$prodcode)
    {
        try {
            /*각종 메모*/
            $MemoTypeCcd = element('MemoTypeCcd',$input,'');
            $IsOutPut = element('IsOutPut',$input,'Y');
            $Memo = element('Memo',$input);

            /*  기존 메모 정보 상태값 변경 : 강사료 정산 메모의 경우는 보존*/
            if($this->_setDataDelete($prodcode,$this->_table['memo'],'메모','where_not_in','MemoTypeCcd','634001') !== true) {
                throw new \Exception('메모 수정에 실패했습니다.');
            }
            //echo $this->_conn->last_query();

            if(empty($MemoTypeCcd) === false) {

                for($i=0;$i<count($MemoTypeCcd);$i++) {

                    if(empty($Memo[$i]) === false) {
                        $data = [
                            'ProdCode' => $prodcode
                            , 'MemoTypeCcd' => $MemoTypeCcd[$i]
                            , 'Memo' => $Memo[$i]
                            , 'IsOutput' => $IsOutPut[$i]
                            , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                            , 'RegIp' => $this->input->ip_address()
                        ];

                        if($this->_conn->set($data)->insert($this->_table['memo']) === false) {
                            throw new \Exception('메모 등록에 실패했습니다.');
                        }
                        //echo $this->_conn->last_query().';';
                    }

                }

            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //자동지급쿠폰
    public function _setAutoCoupon($input=[],$prodcode)
    {
        try {

            /*  기존 쿠폰 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['autocoupon'],'쿠폰') !== true) {
                throw new \Exception('쿠폰 수정에 실패했습니다.');
            }

            $CouponIdx = element('CouponIdx',$input);

            if(empty($CouponIdx) === false) {
                for($i=0;$i<count($CouponIdx);$i++) {
                    $data = [
                        'ProdCode' => $prodcode
                        ,'AutoCouponIdx' => $CouponIdx[$i]
                        , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                        , 'RegIp' => $this->input->ip_address()
                    ];

                    if($this->_conn->set($data)->insert($this->_table['autocoupon']) === false) {
                        //echo $this->_conn->last_query();
                        throw new \Exception('쿠폰 등록에 실패했습니다.');
                    }

                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 기존데이터 상태값 변경
     * @param $prodcode
     * @param $tablename
     * @param $msg
     * @throws Exception
     */
    public function _setDataDelete($prodcode,$tablename,$msg,$whereType=null,$whereKey=null,$whereVal=null)
    {
        try {
            /*  기존 정보 상태값 변경 */
            $del_data = [
                'IsStatus' => 'N'
                , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($del_data)->where('ProdCode', $prodcode)->where('IsStatus', 'Y');

            if(empty($whereType) === false) {
                $this->_conn->{$whereType}($whereKey, $whereVal);
            }

            if ($this->_conn->update($tablename) === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('이전 ' . $msg . ' 정보 수정에 실패했습니다.');
            }

            /*  기존 정보 상태값 변경 */
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }


    /**
     * 과목검색 팝업리스트
     */
    public function searchExamList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['EB.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT EB.*, MB.CateCode, MB.Ccd,
                   CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName) AS CateRouteName, SJ.SubjectName, PMS.wProfName,
                   (SELECT COUNT(*) FROM {$this->_table['mockExamQuestion']} AS EQ WHERE EB.MpIdx = EQ.MpIdx AND EQ.IsStatus = 'Y') AS ListCnt
        ";
        $from = "
            FROM {$this->_table['mockExamBase']} AS EB            
            JOIN {$this->_table['site']} AS S ON EB.SiteCode = S.SiteCode
            JOIN {$this->_table['mockAreaCate']} AS MC ON EB.MrcIdx = MC.MrcIdx AND MC.IsStatus = 'Y'
            JOIN {$this->_table['mockSubject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y' AND MS.IsUse = 'Y'
            JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y' AND SJ.IsUse = 'Y'
            JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y' AND MB.IsUse = 'Y'
            JOIN {$this->_table['category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y' AND C1.IsUse = 'Y'
            JOIN {$this->_table['sysCode']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y' AND SC.IsUse = 'Y'
            JOIN {$this->_table['professor']} AS P ON EB.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y' AND P.IsUse = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y' AND PMS.wIsUse = 'Y'
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE EB.IsStatus = 'Y' AND EB.IsUse = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY EB.MpIdx DESC\n";

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        return array($data, $count);
    }


    /**
     * 과목검색 정렬변경
     */
    public function searchExamSort($sorting)
    {
        $data = [];
        foreach ($sorting as $k => $v) {
            $data[] = array(
                'PmrpIdx' => $k,
                'OrderNum' => $v,
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
        }

        try {
            $this->_conn->trans_start();

            if($data) $this->_conn->update_batch($this->_table['mockProductExam'], $data, 'PmrpIdx');

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('정렬변경에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return true;
    }
}
