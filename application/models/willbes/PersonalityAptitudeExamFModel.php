<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalityAptitudeExamFModel extends WB_Model
{
    public $prodTypeCcd = '636001'; //온라인강좌
    public $payStatusCcd = ['676001', '676006', '676007']; //결제완료,환불완료,신청완료
    public $externalCorpCcd = '696001'; //외부수강업체(한국인재개발진흥원)

    private $_table = [
        'order' => 'lms_order'
        ,'order_product' => 'lms_order_product'
        ,'order_product_refund' => 'lms_order_product_refund'
        ,'product' => 'lms_product'
        ,'product_lecture' => 'lms_product_lecture'
        ,'my_lecture' => 'lms_my_lecture'
        ,'member' => 'lms_member'
        ,'personality_aptitude_exam' => 'lms_personality_aptitude_exam'
        ,'personality_aptitude_exam_log' => 'lms_personality_aptitude_exam_log'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 인적성검사 상품 구매 리스트
     * @param array $arr_condition
     * @param array $order_by
     * @param null $limit
     * @param string $exam_join_type
     * @return mixed
     */
    public function listProduct($arr_condition = [], $order_by = [], $limit = null, $exam_join_type = 'LEFT')
    {
        $column = '
            pae.PaeIdx,o.OrderIdx,o.CompleteDatm,op.OrderProdIdx,op.PayStatusCcd
            ,mstpl.ExternalCorpCcd,mstp.ProdName,subp.ProdName AS subProdName,mstpl.ExternalLinkCode
            ,opr.RefundDatm,DATE_FORMAT(opr.RefundDatm,"%Y-%m-%d") AS RefundDay
            ,m.MemIdx,m.MemId,m.MemName
            ,pae.IsAgree,pae.BmtUid,pae.ExamState
            ,pae.ExamStartDatm,pae.ExamFinishDatm,pae.ExamEndDatm
            ,DATE_FORMAT(pae.ExamStartDatm,"%Y-%m-%d") AS ExamStartDay
            ,DATE_FORMAT(pae.ExamEndDatm,"%Y-%m-%d") AS ExamEndDay
            ,DATE_FORMAT(pae.ExamEndDatm,"%Y%m%d") AS ExamEndDayForNumber
            ';

        $from = "
            FROM {$this->_table['order']} AS o
            INNER JOIN {$this->_table['order_product']} AS op ON o.OrderIdx = op.OrderIdx
            INNER JOIN {$this->_table['product']} AS mstp ON op.ProdCode = mstp.ProdCode
            INNER JOIN {$this->_table['product_lecture']} AS mstpl ON mstp.ProdCode = mstpl.ProdCode
            INNER JOIN {$this->_table['my_lecture']} AS ml ON o.OrderIdx = ml.OrderIdx AND op.OrderProdIdx = ml.OrderProdIdx AND op.ProdCode = ml.ProdCode
            INNER JOIN {$this->_table['product']} AS subp ON ml.ProdCodeSub = subp.ProdCode
            INNER JOIN {$this->_table['member']} AS m ON o.MemIdx = m.MemIdx
            {$exam_join_type} JOIN {$this->_table['personality_aptitude_exam']} AS pae ON o.OrderIdx = pae.OrderIdx AND op.OrderProdIdx = pae.OrderProdIdx
            LEFT JOIN {$this->_table['order_product_refund']} AS opr ON op.OrderIdx = opr.OrderIdx AND op.OrderProdIdx = opr.OrderProdIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= (empty($limit) === false) ? $this->_conn->makeLimitOffset($limit, null)->getMakeLimitOffset() : '';
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit)->result_array();
    }

    public function findPersonalityAptitudeExam($arr_condition = [])
    {
        $column = 'PaeIdx,OrderProdIdx,OrderIdx,MemIdx,IsAgree,BmtUid,ExamState,ExamStartDatm,ExamFinishDatm,ExamEndDatm';
        $from = " FROM {$this->_table['personality_aptitude_exam']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 인적성검사/로그 데이터 저장
     * @param array $data
     * @return array|bool
     */
    public function addPersonalityAptitudeExam($data = [])
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'OrderProdIdx' => $data['OrderProdIdx']
                    ,'OrderIdx' => $data['OrderIdx']
                    ,'MemIdx' => $this->session->userdata('mem_idx')
                ]
            ];
            $result = $this->findPersonalityAptitudeExam($arr_condition);

            if (empty($result) === true) {
                //ins
                $input_data = [
                    'OrderProdIdx' => $data['OrderProdIdx']
                    ,'OrderIdx' => $data['OrderIdx']
                    ,'MemIdx' => $this->session->userdata('mem_idx')
                    ,'IsAgree' => 'N'
                    ,'RegIp' => $this->input->ip_address()
                ];
                if ($this->_conn->set($input_data)->insert($this->_table['personality_aptitude_exam']) === false) {
                    throw new \Exception('인적성 검사 데이터 등록 실패했습니다.');
                }
                $pae_idx = $this->_conn->insert_id();
            } else {
                $pae_idx = $result['PaeIdx'];
            }

            $this->_conn->trans_commit();
        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return [
            'ret_cd' => true,
            'ret_msg' => $pae_idx
        ];
    }

    /**
     * 로그저장
     * @param string $params
     * @param string $pae_idx
     * @param string $type  exam:인적성검사[호출], exam_validate:인적성검사[유효성검사], exam_state:상태api호출, report:레포트[호출]
     * @return array|bool
     */
    public function addPersonalityAptitudeExamForLog($params = '', $pae_idx = '', $type = '')
    {
        $this->_conn->trans_begin();
        try {
            $log_data = [
                'PaeIdx' => $pae_idx
                ,'Params' => $params
                ,'Type' => $type
                ,'RegIp' => $this->input->ip_address()
            ];
            if ($this->_conn->set($log_data)->insert($this->_table['personality_aptitude_exam_log']) === false) {
                throw new \Exception('인적성 검사 데이터 등록 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}