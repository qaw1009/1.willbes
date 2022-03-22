<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class PredictCodeModel extends WB_Model
{
    private $_table = [
        'predict_code' => 'lms_predict_code',
        'predict_code_r_subject' => 'lms_predict_code_r_subject',
        'wbs_sys_admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 합격예측별 직렬
     * @return mixed
     */
    public function getPredictForTakeMockPart()
    {
        $column = "a.PredictIdx, a.TakeMockPart, b.CcdName";
        $arr_condition = [
            'EQ' => [
                'IsStatus' => 'Y'
                ]
        ];
        $sub_where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $arr_condition = [
            'EQ' => [
                'b.IsUse' => 'Y',
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $order_by = ['b.OrderNum' => 'ASC'];
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $from = "
            FROM (
                SELECT PredictIdx, TakeMockPart
                FROM {$this->_table['predict_code_r_subject']} {$sub_where}
                GROUP BY PredictIdx, TakeMockPart
            ) AS a
            INNER JOIN {$this->_table['predict_code']} AS b ON a.TakeMockPart = b.Ccd
        ";
        return $this->_conn->query("select ". $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 합격예측별 직렬별 과목 전체 리스트
     */
    public function getPredictForSubjectAll($predict_idx = null)
    {
        $column = "
            a.PrsIdx, a.PredictIdx, a.TakeMockPart, a.SubjectCode, a.RegDatm, a.OrderNum, b.CcdName, b.Type, IF(b.Type='P','필수','선택') AS TypeName
            ,c.wAdminName AS RegAdminName
            ,(SELECT CcdName FROM {$this->_table['predict_code']} AS s1 WHERE s1.Ccd = a.TakeMockPart) AS TakeMockPartName
        ";

        $arr_condition = [
            'EQ' => [
                'a.PredictIdx' => $predict_idx,
                'a.IsStatus' => 'Y',
                ]
        ];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $order_by = [
            'a.PredictIdx' => 'DESC'
            ,'a.TakeMockPart' => 'ASC'
            ,'a.OrderNum' => 'ASC'
        ];
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $from = "
            FROM {$this->_table['predict_code_r_subject']} AS a
            INNER JOIN {$this->_table['predict_code']} AS b ON a.TakeMockPart = b.GroupCcd AND a.SubjectCode = b.Ccd
            INNER JOIN {$this->_table['wbs_sys_admin']} AS c ON a.RegAdminIdx = c.wAdminIdx
        ";
        return $this->_conn->query("select ". $column . $from . $where . $order_by)->result_array();
    }

    public function deleteSubjectCode($form_data = [])
    {
        try {
            $this->_conn->trans_begin();

            $update_data = [
                'IsStatus' => 'N',
                'UpdDatm' => date('Y-m-d H:i:s'),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $this->_conn->set($update_data)->where('PrsIdx', element('prs_idx', $form_data));
            if ($this->_conn->update($this->_table['predict_code_r_subject']) === false) {
                throw new \Exception('과목삭제 실패입니다.');
            }

            $this->_conn->trans_commit();
        } catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}