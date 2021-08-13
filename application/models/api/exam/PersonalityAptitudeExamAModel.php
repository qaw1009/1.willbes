<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalityAptitudeExamAModel extends WB_Model
{
    public $return_info = [
        'success' => [
            'code' => '0000'
            ,'msg' => '성공'
        ]
        ,'error' => [
            'code' => '1001'
            ,'msg' => '내부오류'
        ]
        ,'error_params' => [
            'code' => '9998'
            ,'msg' => '파라미터오류'
        ]
        ,'error_data' => [
            'code' => '9999'
            ,'msg' => '조회실패'
        ]
    ];

    private $_table = [
        'order' => 'lms_order'
        ,'order_product' => 'lms_order_product'
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
     * 인적성검사 조회
     * @param array $form_data
     * @param string $type
     * @return mixed
     */
    public function findPersonalityAptitudeExam($form_data = [], $type = 'validate')
    {
        $arr_condition = [
            'EQ' => [
                'mstp.ProdTypeCcd' => '636001'
                ,'mstpl.ExternalCorpCcd' => '696001'
                ,'op.PayStatusCcd' => '676001'
            ],
            'RAW' => [
                'pae.PaeIdx' => (empty(element('pae_idx', $form_data)) === true) ? 'null' : element('pae_idx', $form_data)
                ,'pae.OrderProdIdx' => (empty(element('order_number', $form_data)) === true) ? 'null' : element('order_number', $form_data)
            ]
        ];

        if ($type == 'validate') {
            $arr_condition['RAW'] = array_merge($arr_condition['RAW'], [
                'm.MemId' => (empty(element('id', $form_data)) === true) ? 'null' : "'" . element('id', $form_data) . "'"
            ]);
        }

        $column = '
            o.OrderIdx,op.OrderProdIdx,mstpl.ExternalCorpCcd,mstp.ProdName,subp.ProdName AS subProdName,o.CompleteDatm,mstpl.ExternalLinkCode
            ,m.MemIdx,m.MemId,m.MemName
            ,pae.IsAgree,pae.BmtUid,pae.ExamState,pae.ExamStartDatm,pae.ExamFinishDatm,pae.ExamEndDatm,DATE_FORMAT(pae.ExamEndDatm,"%Y%m%d") AS ExamEndDay
            ';

        $from = "
            FROM {$this->_table['personality_aptitude_exam']} AS pae
            INNER JOIN {$this->_table['order_product']} AS op ON pae.OrderIdx = op.OrderIdx AND pae.OrderProdIdx = op.OrderProdIdx
            INNER JOIN {$this->_table['order']} AS o ON op.OrderIdx = o.OrderIdx
            INNER JOIN {$this->_table['product']} AS mstp ON op.ProdCode = mstp.ProdCode
            INNER JOIN {$this->_table['product_lecture']} AS mstpl ON mstp.ProdCode = mstpl.ProdCode
            INNER JOIN {$this->_table['my_lecture']} AS ml ON o.OrderIdx = ml.OrderIdx AND op.OrderProdIdx = ml.OrderProdIdx AND op.ProdCode = ml.ProdCode
            INNER JOIN {$this->_table['product']} AS subp ON ml.ProdCodeSub = subp.ProdCode
            INNER JOIN {$this->_table['member']} AS m ON o.MemIdx = m.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 인적성 데이터 유효성 검사
     * @param array $form_data
     * @return array|bool
     */
    public function validateForData($form_data = [])
    {
        try {
            $result = 'success';
            $data = $this->findPersonalityAptitudeExam($form_data,'validate');
            if (empty($data) === true) {
                $result = 'error_data';
            }

            //로그저장
            $this->addPersonalityAptitudeExamForLog(
                json_encode($form_data,JSON_UNESCAPED_UNICODE)
                ,element('pae_idx', $form_data)
                ,'exam_validate'
                , $this->return_info[$result]['code']
            );

            if ($result != 'success') {
                $msg = (empty($this->return_info[$result]) === true) ? '유효성검사실패' : $this->return_info[$result]['msg'];
                throw new \Exception($msg);
            }
        } catch(\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 인적성 검사 상태 업데이트
     * @param array $form_data
     * @return array|bool
     */
    public function updateState($form_data = [])
    {
        try {
            $result = 'success';
            $data = $this->findPersonalityAptitudeExam($form_data, 'state');
            if (empty($data) === true) {
                $result = 'error_data';
            }

            //상태업데이트
            if ($this->_updateState($form_data) !== true) {
                $result = 'error';
            }

            //로그저장
            $this->addPersonalityAptitudeExamForLog(
                json_encode($form_data,JSON_UNESCAPED_UNICODE)
                ,element('pae_idx', $form_data)
                ,'exam_state'
                , $this->return_info[$result]['code']
            );

            if ($result != 'success') {
                $msg = (empty($this->return_info[$result]) === true) ? '유효성검사실패' : $this->return_info[$result]['msg'];
                throw new \Exception($msg);
            }
        } catch(\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 상태업데이트
     * @param array $form_data
     * @return bool
     */
    private function _updateState($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $update_data = [
                'IsAgree' => 'Y'
                ,'ExamState' => element('exam_state',$form_data)
                ,'UpdIp' => $this->input->ip_address()
            ];

            if (element('exam_state',$form_data) == 1) {
                $update_data['BmtUid'] = element('bmt_uid',$form_data);
                $update_data['ExamStartDatm'] = date('Y-m-d H:i:s',(int)element('exam_startdt',$form_data));
                $update_data['ExamEndDatm'] = date("Y-m-d H:i:s", strtotime("+6 day", (int)element('exam_startdt',$form_data)));
            }

            if (element('exam_state',$form_data) == 3 || element('exam_state',$form_data) == 9) {
                $update_data['ExamFinishDatm'] = date('Y-m-d H:i:s',(int)element('exam_enddt',$form_data));
            }

            $this->_conn->set($update_data)->where('PaeIdx',element('pae_idx',$form_data));
            if ($this->_conn->update($this->_table['personality_aptitude_exam']) === false) {
                throw new \Exception('false');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }
        return true;
    }


    /**
     * 로그저장
     * @param string $params
     * @param string $pae_idx
     * @param string $type
     * @param string $result_code
     * @return array|bool
     */
    public function addPersonalityAptitudeExamForLog($params = '', $pae_idx = '', $type = '', $result_code = '0000')
    {
        $this->_conn->trans_begin();
        try {
            $log_data = [
                'PaeIdx' => $pae_idx
                ,'Params' => $params
                ,'Type' => $type
                ,'ResultCode' => $result_code
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