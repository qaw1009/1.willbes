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
     * 합격예측 기본 직렬/과목 코드
     * @param array $arr_condition
     * @return mixed
     */
    public function listAllCode($arr_condition = [])
    {
        $column = ' S.*,A.*,case A.IsUse when "Y" then "사용"  when "N" then "미사용"else "" end as IsUseView,B.wAdminName ';
        $from = "From (Select Ccd As ParentCcd, CcdName As ParentName, OrderNum As ParentOrder
            From {$this->_table['predict_code']} Where GroupCcd='0') S
            LEFT OUTER JOIN {$this->_table['predict_code']} A ON A.GroupCcd = S.ParentCcd
            LEFT OUTER JOIN {$this->_table['wbs_sys_admin']} B ON A.RegAdminIdx = B.wAdminIdx and B.wIsStatus='Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['S.ParentOrder'=>'Asc','A.OrderNum'=>'Asc'])->getMakeOrderBy();
        return $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();
    }

    /**
     * 합격예측별 직렬/과목 코드
     * @param $predict_idx
     * @param $arr_take_mock_part
     * @return mixed
     */
    public function listAllCodeForPredict($predict_idx, $arr_take_mock_part)
    {
        $arr_condition = [
            'IN' => [
                'Ccd' => $arr_take_mock_part
            ]
        ];
        $from_where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $column = 's.ParentCcd, s.ParentName, s.ParentOrder, a.Ccd, a.CcdName AS SubjectCcdName, a.Type, b.PrsIdx, b.GroupBy, b.OrderNum, b.RegDatm, c.wAdminName';
        $from = "
            FROM (
                SELECT Ccd AS ParentCcd, CcdName AS ParentName, OrderNum AS ParentOrder
                FROM {$this->_table['predict_code']} {$from_where}
            ) s
            INNER JOIN {$this->_table['predict_code']} AS a ON a.GroupCcd = s.ParentCcd
            LEFT JOIN {$this->_table['predict_code_r_subject']} AS b ON b.PredictIdx = ? AND a.Ccd = b.SubjectCode AND b.IsUse = 'Y'
            LEFT JOIN {$this->_table['wbs_sys_admin']} c ON b.RegAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
            WHERE a.IsUse = 'Y'
        ";
        $order_by = $this->_conn->makeOrderBy(['s.ParentOrder'=>'ASC','a.OrderNum'=>'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' .$column .$from . $order_by, [$predict_idx])->result_array();
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
                    LEFT OUTER JOIN '.$this->_table['wbs_sys_admin'].' C ON A.RegAdminIdx = C.wAdminIdx And C.wIsStatus="Y"
                    LEFT OUTER JOIN '.$this->_table['wbs_sys_admin'].' D ON A.UpdAdminIdx = D.wAdminIdx And D.wIsStatus="Y"';
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
            a.PrsIdx, a.PredictIdx, a.TakeMockPart, a.SubjectCode, a.GroupBy, a.RegDatm, a.OrderNum, b.CcdName, b.Type, IF(b.Type='P','필수','선택') AS TypeName
            ,c.wAdminName AS RegAdminName
            ,CONCAT(s.CcdName,' [',s.Ccd,']') AS TakeMockPartName
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
            ,'s.OrderNum' => 'ASC'
            ,'a.OrderNum' => 'ASC'
        ];
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $from = "
            FROM {$this->_table['predict_code_r_subject']} AS a
            INNER JOIN {$this->_table['predict_code']} AS s ON a.TakeMockPart = s.Ccd
            INNER JOIN {$this->_table['predict_code']} AS b ON a.TakeMockPart = b.GroupCcd AND a.SubjectCode = b.Ccd
            INNER JOIN {$this->_table['wbs_sys_admin']} AS c ON a.RegAdminIdx = c.wAdminIdx
        ";
        return $this->_conn->query("select ". $column . $from . $where . $order_by)->result_array();
    }

    public function storeSubjectCode($form_data = [])
    {
        try {
            $this->_conn->trans_begin();
            $arr_take_mock_part = element('take_mock_part', $form_data);
            $add_form = element('add_subject_code', $form_data);
            $del_form = element('del_subject_code', $form_data);

            $add_data = [];
            if (empty($add_form) === false) {
                foreach ($add_form as $key => $val) {
                    $add_data[] = [
                        'PredictIdx' => element('predict_idx', $form_data)
                        ,'TakeMockPart' => $arr_take_mock_part[$key]
                        ,'SubjectCode' => $val
                        /*,'GroupBy' => ''*/
                        ,'OrderNum' => '1'
                        ,'IsUse' => 'Y'
                        ,'RegAdminIdx' => $this->session->userdata('admin_idx')
                    ];
                }
            }

            $del_data = [];
            if (empty($del_form) === false) {
                foreach ($del_form as $key => $val) {
                    $del_data[] = [
                        'PrsIdx' => $val
                        ,'IsUse' => 'N'
                        ,'UpdAdminIdx' => $this->session->userdata('admin_idx')
                    ];
                }
            }

            if($add_data) $this->_conn->insert_batch($this->_table['predict_code_r_subject'], $add_data);
            if($del_data) $this->_conn->update_batch($this->_table['predict_code_r_subject'], $del_data, 'PrsIdx');

            if ($this->_conn->trans_status() === false) {
                throw new Exception('합격예측 과목 설정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 합격예측의 과목 미사용 처리
     * @param array $form_data
     * @return array|bool
     */
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

    /**
     * 과목그룹 / 정렬순서 변경
     * @param array $form_data
     * @param string $target
     * @return array|bool
     */
    public function updateParams($form_data = [], $target = '')
    {
        $this->_conn->trans_begin();

        try {
            $predict_idx = element('predict_idx', $form_data);
            $params = json_decode(element('params', $form_data), true);

            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $field = ($target == 'group_by') ? 'GroupBy' : 'OrderNum';
            foreach ($params as $idx => $val) {
                if(empty($idx) === true) throw new \Exception('필수 파라미터 오류입니다.');

                $data = [
                    $field => $val,
                    'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ];
                $this->_conn->set($data)->where('PrsIdx', $idx)->where('PredictIdx', $predict_idx);

                if ($this->_conn->update($this->_table['predict_code_r_subject']) === false) {
                    throw new \Exception('수정에 실패했습니다.');
                }
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}