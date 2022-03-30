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
     * 과목코드 노출순서 추출
     * @param $groupCcd
     * @return mixed
     */
    public function getCcdOrderNum($groupCcd)
    {
        return $this->_conn->getFindResult($this->_table['predict_code'],'ifNull(Max(OrderNum),0)+1 as NextOrderNum',[
            'EQ' => ['GroupCcd' => $groupCcd],
            'LT' => ['OrderNum' => '999']
        ])['NextOrderNum'];
    }

    /**
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllCode($arr_condition = [])
    {
        $column = ' S.*,A.*,case A.IsUse when "Y" then "사용"  when "N" then "미사용"else "" end as IsUseView,B.wAdminName ';
        $from = "From (Select Ccd As ParentCcd, CcdName As ParentName, OrderNum As ParentOrder
            From {$this->_table['predict_code']} Where GroupCcd='0') S
            LEFT OUTER JOIN {$this->_table['predict_code']} A ON A.GroupCcd = S.ParentCcd
            LEFT OUTER JOIN wbs_sys_admin B ON A.RegAdminIdx = B.wAdminIdx and B.wIsStatus='Y'
                    ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['S.ParentOrder'=>'Asc','A.OrderNum'=>'Asc'])->getMakeOrderBy();
        return $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();
    }

    /**
     * 그룹유형코드 정보 및 세부코드 노출순서 추출 (하위코드 등록을 윈한 정보 조회)
     * @param $group_ccd
     * @return array
     */
    public function findParentCcd($group_ccd)
    {
        $column = 'CcdName, (Select ifNull(Max(OrderNum),0)+1 From '.$this->_table['predict_code'].' Where GroupCcd='.$group_ccd.' and OrderNum < 999 ) As NextOrderNum';
        return  $this->_conn->getFindResult($this->_table['predict_code'], $column, [
            'EQ'=>['Ccd'=>$group_ccd]
        ]);
    }

    /**
     * 코드정보 저장
     * @param array $input
     * @return array|bool
     */
    public function addCcd($input=[])
    {
        $this->_conn->trans_begin();

        $query = 'insert into lms_predict_code (Ccd,GroupCcd,CcdName,CcdValue,Type,OrderNum,IsUse,RegAdminIdx) ';
        $query .= 'select ifNull(max(Ccd)+1,?) ,? ,? ,ifNull(?,null), ?, ifNull(?,Max(OrderNum)+1), ifNull(?,"Y"), ? From lms_predict_code Where 1=1 ';

        $ccd = "101";  //그룹코드생성 기본값

        try {
            if (element('makeType',$input) === "group") {
                $query .= ' And GroupCcd = "0" ';
                $ordernum = NULL;
            } else if (element('makeType', $input) === "sub") {
                $query .= ' And GroupCcd = "'.element('groupCcd', $input).'" And Ccd not like "%999"';
                $ccd = element('groupCcd', $input)."001";
                $ordernum = empty(element("OrderNum", $input) === true) ? $this->getCcdOrderNum(element("groupCcd",$input)) : element("OrderNum", $input);
            }

            $result = $this->_conn->query($query, [
                $ccd
                ,element('groupCcd', $input)
                ,element('CcdName', $input)
                ,element('CcdValue', $input)
                ,element('subject_type', $input)
                ,$ordernum
                ,element('is_use', $input)
                ,$this->session->userdata('admin_idx')
            ]);

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 코드정보수정
     * @param array $input
     * @return array|bool
     */
    public function modifyCcd($input=[])
    {
        $this->_conn->trans_begin();

        try {
            $maketype = element('makeType',$input);
            $ccd = element('Ccd', $input);
            $ccdname = element('CcdName', $input);
            $ccdvalue = element('CcdValue', $input);
            $ordernum = (empty(element("OrderNum", $input)) === true) ? $this->getCcdOrderNum(element("groupCcd",$input)) : element("OrderNum", $input);
            $is_use = element('is_use', $input);
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'CcdName'=>$ccdname
                ,'UpdAdminIdx'=>$admin_idx
            ];

            if($maketype == "sub") {
                $data = array_merge($data,[
                    'CcdValue' => $ccdvalue
                    ,'Type' => element('subject_type', $input)
                    ,'OrderNum' => $ordernum
                    ,'IsUse' => $is_use
                ]);
            }

            $this->_conn->set($data)->where('Ccd',$ccd);
            if($this->_conn->update($this->_table['predict_code']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 코드수정을 위한 정보 추출
     * @param $ccd
     * @return mixed
     */
    public function findCcdForModify($ccd)
    {
        $column = ' ifNull(ParentCode,"") as ParentCode, ifNull(ParentName,"") as ParentName, ifNull(ParentOrder,0) as ParentOrder ';
        $column .= ' ,A.*, C.wAdminName, D.wAdminName As wUpdAdminName ';
        $from = 'From '.$this->_table['predict_code'].' A
                    LEFT OUTER JOIN (Select Ccd As ParentCode, CcdName As ParentName, OrderNum As ParentOrder From '.$this->_table['predict_code'].') B ON A.GroupCcd = B.ParentCode
                    LEFT OUTER JOIN wbs_sys_admin C ON A.RegAdminIdx = C.wAdminIdx And C.wIsStatus="Y"
                    LEFT OUTER JOIN wbs_sys_admin D ON A.UpdAdminIdx = D.wAdminIdx And D.wIsStatus="Y"';
        $where = $this->_conn->makeWhere([
            'EQ'=>['A.Ccd'=>$ccd]
        ]);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 합격예측별 직렬
     * @param null $predict_idx
     * @return mixed
     */
    public function getPredictForTakeMockPart($predict_idx = null)
    {
        $column = "a.PredictIdx, a.TakeMockPart, b.CcdName";
        $arr_condition = [
            'EQ' => [
                'PredictIdx' => $predict_idx,
                'IsUse' => 'Y'
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
     * @param null $predict_idx
     * @param null $take_mock_part
     * @return mixed
     */
    public function getPredictForSubjectAll($predict_idx = null, $take_mock_part = null)
    {
        $column = "
            a.PrsIdx, a.PredictIdx, a.TakeMockPart, a.SubjectCode, a.RegDatm, a.OrderNum, b.CcdName, b.Type, IF(b.Type='P','필수','선택') AS TypeName
            ,c.wAdminName AS RegAdminName
            ,(SELECT CcdName FROM {$this->_table['predict_code']} AS s1 WHERE s1.Ccd = a.TakeMockPart) AS TakeMockPartName
        ";

        $arr_condition = [
            'EQ' => [
                'a.PredictIdx' => $predict_idx,
                'a.TakeMockPart' => $take_mock_part,
                'a.IsUse' => 'Y',
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
                'IsUse' => 'N',
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