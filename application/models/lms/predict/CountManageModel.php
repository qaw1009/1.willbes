<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class CountManageModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    public function findCountManage($PredictIdx)
    {
        $column = '
            * , (RegistCnt+ScoreCnt+SurveyCnt+PageViewCnt1+PageViewCnt2+CommentCnt1+CommentCnt2) as view_real
        ';

        $from = '
                    From 
                    (
                    select 
                        pc.*
                        ,pp.ProdName
                        ,sa.wAdminName as RegAdminName
                        ,(SELECT COUNT(*) FROM lms_predict_register WHERE IsStatus=\'Y\' and ApplyType=\'합격예측\' and PredictIdx = pc.PredictIdx) AS RegistCnt -- 인증신청자
                        ,(SELECT COUNT(*) from lms_predict_grades_origin WHERE PredictIdx = pc.PredictIdx) AS ScoreCnt -- 채점자
                        ,(SELECT COUNT(*) FROM lms_survey_answer_info WHERE SpIdx = pp.SpIdx ) AS SurveyCnt -- 설문
                    
                        ,ifnull((SELECT ReadCnt FROM lms_event_lecture WHERE PromotionCode = pc.PageView1 ),0) AS PageViewCnt1
                        ,ifnull((SELECT ReadCnt FROM lms_event_lecture WHERE PromotionCode = pc.PageView2 ),0) AS PageViewCnt2
                    
                        ,(SELECT count(*) FROM lms_event_lecture el join lms_event_comment ec on el.ElIdx = ec.ElIdx where ec.IsStatus=\'Y\' and el.PromotionCode=pc.Comment1) as CommentCnt1
                        ,(SELECT count(*) FROM lms_event_lecture el join lms_event_comment ec on el.ElIdx = ec.ElIdx where ec.IsStatus=\'Y\' and el.PromotionCode=pc.Comment2) as CommentCnt2
                     from
                        lms_predict_count pc
                        join lms_product_predict pp on pc.PredictIdx = pp.PredictIdx	
                        join wbs_sys_admin sa on pc.RegAdminIdx = sa.wAdminIdx
                    where pc.IsStatus=\'Y\' And pc.PredictIdx = ?
                ) mm
        ';

        $binds = [$PredictIdx];
        $query = $this->_conn->query('select ' . $column . $from, $binds);
        return $query->row_array();
    }

    public function addCountManage($input=[])
    {

        try{

            $PredictIdx = element('PredictIdx',$input);

            $del_data = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $this->_conn->set($del_data)->where('PredictIdx',$PredictIdx)->where('IsStatus','Y');
            if($this->_conn->update('lms_predict_count') === false) {
              throw new \Exception('카운트 삭제에 실패했습니다.');
            }

            $input_data = array_merge($this->_inputCommon($input),[
                'PredictIdx'=>$PredictIdx,
                'RegAdminIdx'=>$this->session->userdata('admin_idx')
            ]);
            if($this->_conn->set($input_data)->insert('lms_predict_count') === false) {
                throw new \Exception('카운트 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        }catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    protected function _inputCommon($input=[])
    {
        $input_data = [
            'MakeCount' => element('MakeCount',$input)
            ,'PageView1'  => element('PageView1',$input)
            ,'PageView2'  => element('PageView2',$input)
            ,'Comment1'  => element('Comment1',$input)
            ,'Comment2'  => element('Comment2',$input)
        ];

        return $input_data;
    }
}