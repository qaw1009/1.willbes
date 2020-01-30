<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegGradeModel extends WB_Model
{
    private $_table = [
        'mock_paper' => 'lms_mock_paper_new',
        'mock_product' => 'lms_product_mock',
        'mock_questions' => 'lms_mock_questions',
        'mock_answerpaper' => 'lms_mock_answerpaper',
        'mock_register' => 'lms_mock_register',
        'mock_answertemp' => 'lms_mock_answertemp',
        'mock_grades' => 'lms_mock_grades',
        'mock_grades_log' => 'lms_mock_grades_log',
        'mock_log' => 'lms_mock_log',
        'product_mock_r_paper' => 'lms_product_mock_r_paper',
        'product' => 'lms_product',
        'product_cate' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'vw_product_mocktest' => 'vw_product_mocktest',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'sys_category' => 'lms_sys_category',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function mainList($is_count = false, $add_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $arr_order_by = ['MP.ProdCode' => 'DESC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

            $column = "
                MP.*, CONCAT(A.wAdminName,'\<br\>(', MP.RegDatm,')') AS wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, 
                PD.IsUse, PS.SalePrice, PS.RealSalePrice, CONCAT(TakeStartDatm,'~',TakeEndDatm) AS SETIME, CONCAT(TakeTime,' 분') AS TakeStr,
                (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND IsTake = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = {$this->mockCommonModel->_ccd['applyType_on']}) AS OnlineCnt,
                (SELECT COUNT(MemIdx) FROM {$this->_table['mock_register']} WHERE IsStatus = 'Y' AND ProdCode = MP.ProdCode AND TakeForm = {$this->mockCommonModel->_ccd['applyType_off']}) AS OfflineCnt,
                (SELECT COUNT(*) FROM {$this->_table['mock_grades']} WHERE ProdCode = PD.ProdCode) AS GradeCNT,  
                fn_ccd_name(MP.AcceptStatusCcd) AS AcceptStatusCcd,
                C1.CateName, C1.IsUse AS IsUseCate, SC1.CcdName As AcceptStatusCcd_Name
            ";
        }

        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mock_product']} AS MP
            JOIN {$this->_table['product']} AS PD ON MP.ProdCode = PD.ProdCode 
            JOIN {$this->_table['product_cate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_table['sys_category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['product_sale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT OUTER JOIN {$this->_table['sys_code']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 모의고사 정보 조회
     * @param $prod_code
     * @return mixed
     */
    public function productInfo($prod_code)
    {
        $column = "PD.*, S.SiteName, GL.*, IFNULL(ANT.cnt,0) AS USERCNT";
        $where = $this->_conn->makeWhere(['EQ' => ['PD.ProdCode' => $prod_code]])->getMakeWhere(false);
        $from = "
            FROM {$this->_table['vw_product_mocktest']} AS PD
            JOIN {$this->_table['site']} AS S ON PD.SiteCode = S.SiteCode AND S.IsStatus = 'Y'
            LEFT JOIN (
                SELECT gLog.ProdCode, admin.wAdminName AS writer, gLog.RegDatm AS wdate
                FROM (
                    SELECT ProdCode, MemId, RegDatm
                    FROM {$this->_table['mock_grades_log']}
                    WHERE ProdCode = '{$prod_code}'
                    ORDER BY RegDatm DESC LIMIT 1
                ) AS gLog
                INNER JOIN {$this->_table['admin']} AS admin ON gLog.MemId = admin.wAdminId
            ) AS GL ON PD.ProdCode = GL.ProdCode
            
            LEFT JOIN (
                SELECT COUNT(*) AS cnt, ProdCode
                FROM {$this->_table['mock_answertemp']}
                WHERE ProdCode = '{$prod_code}'
                GROUP BY MrIdx
            ) AS ANT ON ANT.ProdCode = PD.ProdCode
        ";
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row_array();
    }

    /**
     * 시험지데이터 조회
     * @param string $prod_code
     * @param string $column
     * @return mixed
     */
    /*public function findProductMockPaper($prod_code = '', $column = '')
    {
        $arr_condition = [
            'EQ' => [
                'PM.ProdCode' => $prod_code,
                'MP.IsStatus' => 'Y'
            ]
        ];
        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mock_product']}  AS PM
            JOIN {$this->_table['product_mock_r_paper']} AS MP ON PM.Prodcode = MP.ProdCode
        ";
        $order_by = " GROUP BY MpIdx ORDER BY MockType, OrderNum ";
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }*/

    /**
     * 조정점수반영
     * @param $prod_code
     * @param $mode
     * @return array|bool
     */
    public function scoreMake($prod_code, $mode)
    {
        $this->_conn->trans_begin();
        try {
            if ($this->_countAnswerPaper($prod_code) <= 0) {
                throw new \Exception('등록된 답안이 없습니다.');
            }

            $result = $this->_addMockGradesLog($prod_code, $mode);
            if ($result != true) {
                throw new \Exception($result['ret_msg']);
            }

            //조정점수 데이터 셋팅
            $arr_adjust_data = $this->_getAdjustData($prod_code);

            //저장데이터 셋팅
            $input_data = $this->_setInputData($arr_adjust_data);

            //저장
            if ($this->_conn->insert_batch($this->_table['mock_grades'], $input_data) === false) {
                throw new \Exception('조정점수 반영에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * @param string $prod_code
     * @return mixed
     */
    private function _countAnswerPaper($prod_code = '')
    {
        $column = 'count(*) AS numrows';
        $arr_condition = [
            'EQ' => [
                'ProdCode' => $prod_code
            ]
        ];
        $where = $this->_conn->makewhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = " FROM {$this->_table['mock_answerpaper']}";
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row(0)->numrows;
    }

    /**
     * 조정점수 데이터 셋팅
     * @param string $prod_code
     * @return array
     */
    private function _getAdjustData($prod_code = '')
    {
        $arr_user_point = $this->_getUserPoint($prod_code);         //유저별, 과목별 점수 (가산점포함)
        $arr_user_avg_data = $this->_getUserAvgPoint($prod_code);   //유저별, 과목별 평균점수 (가산점포함)
        $arr_set_rank = $this->_arrSetRank($arr_user_point);

        //표준편차
        $arr_sum = null;
        $sum = 0;
        $arr_standard_deviation = [];
        foreach ($arr_user_point as $row) {
            if (empty($arr_user_avg_data[$row['MpIdx']]) === false) {
                $sum = pow($row['SumOrgPoint'] - $arr_user_avg_data[$row['MpIdx']]['AvgOrgPoint'], 2);
            }
            $arr_sum[$row['MpIdx']] = (empty($arr_sum[$row['MpIdx']]) === true ? 0 : $arr_sum[$row['MpIdx']]) + $sum;
        }
        foreach ($arr_user_avg_data as $key => $val) {
            $subject_cnt = $val['userTotalCnt'] - 1;
            $arr_standard_deviation[$key] = (empty($arr_sum[$key]) === true || $arr_sum[$key] <= 0) ? '0' : round(sqrt($arr_sum[$key] / $subject_cnt), 2);
        }

        //조정점수
        foreach ($arr_user_point as $key => $val) {
            if ($val['MockType'] == 'E') {
                $arr_user_point[$key]['AdjustPoint'] = $val['SumOrgPoint'];
                $arr_user_point[$key]['StandardDeviation'] = 0;
            } else {
                if (isset($arr_standard_deviation[$val['MpIdx']])) {
                    if ($arr_standard_deviation[$val['MpIdx']] == 0) {
                        $arr_user_point[$key]['AdjustPoint'] = ( 0 * 10 ) + 50;
                        $arr_user_point[$key]['StandardDeviation'] = $arr_standard_deviation[$val['MpIdx']];
                    } else {
                        $avg_data = $arr_user_avg_data[$val['MpIdx']]['AvgOrgPoint'];
                        $arr_user_point[$key]['AdjustPoint'] = round((($val['SumOrgPoint'] - $avg_data) / $arr_standard_deviation[$val['MpIdx']] * 10) + 50, 2);
                        $arr_user_point[$key]['StandardDeviation'] = $arr_standard_deviation[$val['MpIdx']];
                    }
                } else {
                    $arr_user_point[$key]['AdjustPoint'] = 0;
                    $arr_user_point[$key]['StandardDeviation'] = 0;
                }
            }

            if (empty($arr_set_rank[$val['MpIdx']]) === false) {
                $arr_user_point[$key]['Rank'] = $arr_set_rank[$val['MpIdx']][$val['SumOrgPoint']] + 1;
            }
        }
        return $arr_user_point;
    }

    /**
     * 저장데이터 셋팅
     * @param array $arr_data
     * @return array
     */
    private function _setInputData($arr_data = [])
    {
        $return_data = [];
        foreach ($arr_data as $key => $val) {
            $return_data[$key]['MemIdx'] = $val['MemIdx'];
            $return_data[$key]['MrIdx'] = $val['MrIdx'];
            $return_data[$key]['ProdCode'] = $val['ProdCode'];
            $return_data[$key]['MpIdx'] = $val['MpIdx'];
            $return_data[$key]['UseTime'] = $val['Rsec'];
            $return_data[$key]['OrgPoint'] = $val['SumOrgPoint'];
            $return_data[$key]['AdjustPoint'] = $val['AdjustPoint'];
            $return_data[$key]['Rank'] = $val['Rank'];
            $return_data[$key]['StandardDeviation'] = $val['StandardDeviation'];
        }
        return $return_data;
    }

    /**
     * 응시자별 과목별 점수
     * @param string $prod_code
     * @return mixed
     */
    private function _getUserPoint($prod_code = '')
    {
        $column = "
            MR.MrIdx, M.MpIdx, M.MockType, MR.MemIdx, MR.AddPoint, MA.ProdCode,
            SUM(IF(MA.IsWrong = 'Y', M.Scoring, '0')) + M.TotalScore * (MR.AddPoint * 0.01) AS SumOrgPoint,
            (SELECT RemainSec FROM {$this->_table['mock_log']} WHERE LogIdx = MA.LogIdx) AS Rsec
        ";

        $from = "
            FROM
            (
                SELECT a1.ProdCode, a1.MockType, b1.MpIdx, b1.TotalScore, c1.Scoring, c1.MqIdx
                FROM (
                    SELECT a.ProdCode, b.MpIdx, b.MockType
                    FROM {$this->_table['mock_product']} AS a
                    INNER JOIN {$this->_table['product_mock_r_paper']} AS b ON a.ProdCode = b.ProdCode
                    WHERE a.ProdCode = '{$prod_code}'
                ) AS a1
                INNER JOIN {$this->_table['mock_paper']} AS b1 ON a1.MpIdx = b1.MpIdx AND b1.IsUse = 'Y' AND b1.IsStatus = 'Y'
                INNER JOIN {$this->_table['mock_questions']} AS c1 ON b1.MpIdx = c1.MpIdx AND c1.IsStatus = 'Y'
            ) AS M
            INNER JOIN {$this->_table['mock_answerpaper']} AS MA ON M.MqIdx = MA.MqIdx AND MA.ProdCode = '{$prod_code}' 
            INNER JOIN {$this->_table['mock_register']} AS MR ON MA.MrIdx = MR.MrIdx AND MR.IsStatus = 'Y' AND MR.IsTake = 'Y'
        ";
        $group_by = ' GROUP BY MA.MrIdx, MA.MpIdx';
        $order_by = ' ORDER BY M.MpIdx, SumOrgPoint DESC';
        /*echo '<pre>'.'select ' . $column . $from . $group_by . $order_by.'</pre>';*/
        return $this->_conn->query('select ' . $column . $from . $group_by . $order_by)->result_array();
    }

    /**
     * 과목평균/응시자 수
     * @param string $prod_code
     * @return array
     */
    private function _getUserAvgPoint($prod_code = '')
    {
        $column = "
            M2.MpIdx, ROUND(AVG(M2.SumOrgPoint)) AS AvgOrgPoint, COUNT(*) AS cnt
        ";

        $from = "
            FROM (
                SELECT M.MpIdx, M.MockType, MR.AddPoint, MA.ProdCode
                ,SUM(IF(MA.IsWrong = 'Y', M.Scoring, '0')) + M.TotalScore * (MR.AddPoint * 0.01) AS SumOrgPoint
                FROM
                (
                    SELECT a1.ProdCode, a1.MockType, b1.MpIdx, b1.TotalScore, c1.Scoring, c1.MqIdx
                    FROM (
                        SELECT a.ProdCode, b.MpIdx, b.MockType
                        FROM {$this->_table['mock_product']} AS a
                        INNER JOIN {$this->_table['product_mock_r_paper']} AS b ON a.ProdCode = b.ProdCode
                        WHERE a.ProdCode = '{$prod_code}'
                    ) AS a1
                    INNER JOIN {$this->_table['mock_paper']} AS b1 ON a1.MpIdx = b1.MpIdx AND b1.IsUse = 'Y' AND b1.IsStatus = 'Y'
                    INNER JOIN {$this->_table['mock_questions']} AS c1 ON b1.MpIdx = c1.MpIdx AND c1.IsStatus = 'Y'
                ) AS M
                INNER JOIN {$this->_table['mock_answerpaper']} AS MA ON M.MqIdx = MA.MqIdx AND MA.ProdCode = '{$prod_code}' 
                INNER JOIN {$this->_table['mock_register']} AS MR ON MA.MrIdx = MR.MrIdx AND MR.IsStatus = 'Y' AND MR.IsTake = 'Y'
                GROUP BY MA.MrIdx, MA.MpIdx
            ) AS M2
        ";
        $group_by = ' GROUP BY M2.MpIdx';
        $data = $this->_conn->query('select ' . $column . $from . $group_by)->result_array();

        $result = [];
        foreach ($data as $key => $row) {
            $result[$row['MpIdx']]['AvgOrgPoint'] = $row['AvgOrgPoint'];
            $result[$row['MpIdx']]['userTotalCnt'] = $row['cnt'];
        }
        return $result;
    }

    /**
     * 등록된 과목별 총점 등수 셋팅
     * @param $user_list
     * @return array
     */
    private function _arrSetRank($user_list)
    {
        $arr_set_rank = [];
        $set_rank = [];

        foreach ($user_list as $key => $val) {
            $tmp_mapping_data = $val['MpIdx'];
            $arr_set_rank[$tmp_mapping_data][] = $val['SumOrgPoint'];

            rsort($arr_set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_unique($arr_set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_flip($set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_keys($set_rank[$tmp_mapping_data]);
            $set_rank[$tmp_mapping_data] = array_flip($set_rank[$tmp_mapping_data]);
        }
        return $set_rank;
    }

    /**
     * 조정점수반영 로그
     * @param $prod_code
     * @param $mode
     * @return array|bool
     */
    private function _addMockGradesLog($prod_code, $mode)
    {
        try {
            $this->_conn->where(['ProdCode' => $prod_code]);
            if ($this->_conn->delete($this->_table['mock_grades']) === false) {
                throw new \Exception('성적 삭제에 실패했습니다.');
            }

            // 데이터 입력
            if ($mode == 'web') {
                $data = [
                    'MemId' => $this->session->userdata('admin_id'),
                    'ProdCode' => $prod_code
                ];
            } else {
                $data = [
                    'MemId' => 'systemcron',
                    'ProdCode' => $prod_code
                ];
            }

            $is_insert = $this->_conn->set($data)->set('RegDatm', 'NOW()', false)->insert($this->_table['mock_grades_log']);
            if ($is_insert === false) {
                throw new \Exception('로그생성실패.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }
}