<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamTakeInfoModel extends WB_Model
{
    private $_target_year = '';
    private $_table = [
        'exam_take' => 'lms_exam_take_info',
        'exam_take_data' => 'lms_exam_take_data',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
        $this->_target_year = date('Y') - 1;
    }

    public function listExamTakeInfo($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if($is_count === true) {
            $column = 'count(*) as numrows';
            $order_by_offset_limit = '';
        } else {
            $column ='A.*, B.SiteName, C.wAdminName as RegAdminName, D.CcdName as SubjectCcd_Name, E.CcdName as AreaCcd_Name';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            from 
                ". $this->_table['exam_take'] ." A
                join ". $this->_table['site'] ." B on A.SiteCode = B.SiteCode and B.IsStatus='Y'
                left outer join ". $this->_table['admin'] ." C on A.RegAdminIdx = C.wAdminIdx and C.wIsStatus='Y'
                join ". $this->_table['sys_code'] ." D on A.SubjectCcd = D.Ccd and D.IsStatus='Y'
	            join ". $this->_table['sys_code'] ." E on A.AreaCcd = E.Ccd and E.IsStatus='Y'
            where A.IsStatus='Y'
        ";

        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'A.SiteCode' => get_auth_site_codes(false,true,false)
            ]
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query('select '. $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function findExamTakeInfo($arr_condition)
    {
        $column ='A.*, B.SiteName, C.wAdminName as RegAdminName, D.CcdName as SubjectCcd_Name, E.CcdName as AreaCcd_Name, F.wAdminName As UpdAdminName';
        $from = "
            from 
                ". $this->_table['exam_take'] ." A
                join ". $this->_table['site'] ." B on A.SiteCode = B.SiteCode and B.IsStatus='Y'
                left outer join ". $this->_table['admin'] ." C on A.RegAdminIdx = C.wAdminIdx and C.wIsStatus='Y'
                join ". $this->_table['sys_code'] ." D on A.SubjectCcd = D.Ccd and D.IsStatus='Y'
	            join ". $this->_table['sys_code'] ." E on A.AreaCcd = E.Ccd and E.IsStatus='Y'
	            left outer join ". $this->_table['admin'] ." F on A.UpdAdminIdx = F.wAdminIdx and F.wIsStatus='Y'
            where A.IsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        return $this->_conn->query('select '. $column . $from . $where)->row_array();
    }

    /**
     * 시험응시정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addExamTakeInfo($input = [])
    {
        $this->_conn->trans_begin();
        try {

            $arr_condition = [
              'EQ' => [
                  'A.SiteCode' => element('SiteCode',$input),
                  'A.YearTarget' => element('YearTarget',$input),
                  'A.TakeType' => element('TakeType',$input),
                  'A.SubjectCcd' => element('SubjectCcd',$input),
                  'A.AreaCcd' => element('AreaCcd',$input),
              ]
            ];

            if(!empty($this->findExamTakeInfo($arr_condition))) {
                throw new \Exception('이미 존재하는 응시데이터입니다.');
            }

            $data = array_merge($this->_inputCommon($input),[
                'SiteCode'=>element('SiteCode',$input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            ]);

            if($this->_conn->set($data)->insert($this->_table['exam_take']) === false) {
                throw new \Exception('응시데이터 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 시험응시정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyExamTakeInfo($input = [])
    {
        $this->_conn->trans_begin();
        try {

            $EtiIdx = element('idx', $input);

            $arr_condition = [
                'EQ' => [
                    'A.SiteCode' => element('SiteCode',$input),
                    'A.YearTarget' => element('YearTarget',$input),
                    'A.TakeType' => element('TakeType',$input),
                    'A.SubjectCcd' => element('SubjectCcd',$input),
                    'A.AreaCcd' => element('AreaCcd',$input),
                ],
                'NOT' => [
                    'A.EtiIdx' => $EtiIdx
                ]
            ];

            if(!empty($this->findExamTakeInfo($arr_condition))) {
                throw new \Exception('이미 존재하는 응시데이터입니다.');
            }

            $data = array_merge($this->_inputCommon($input),[
                'SiteCode'=>element('SiteCode',$input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ]);

            if($this->_conn->set($data)->where('EtiIdx', $EtiIdx)->update($this->_table['exam_take']) === false){
                throw new \Exception('응시데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {

            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    public function _inputCommon($input = [])
    {
        $input_data = [
            'YearTarget' => element('YearTarget',$input),
            'TakeType' => element('TakeType',$input),
            'SubjectCcd' => element('SubjectCcd',$input),
            'AreaCcd' => element('AreaCcd',$input),
            'NoticeNumber' => element('NoticeNumber',$input),
            'TakeNumber' => element('TakeNumber',$input),
            'PassLine' => element('PassLine',$input),
            'IsUse' => element('IsUse',$input)
        ];

        return $input_data;
    }

    public function addExamTakeData($site_code)
    {
        $this->_conn->trans_begin();
        try {
            $subject_datas = $this->codeModel->getCcd('733', '', ['NOT' => ['Ccd' => '733001']]);

            $where = ['SiteCode' => $site_code];
            if($this->_conn->delete($this->_table['exam_take_data'], $where) === false){
                throw new \Exception('기존 데이터 실패했습니다.');
            }

            //전체,상세 유아 데이터 조회
            $total_kids = $this->_totalDataKids($site_code);
            $total = $this->_totalDataNotKids($site_code);
            $detail_kids = $this->_detailDataKids($site_code);

            if($total_kids) $this->_conn->insert_batch($this->_table['exam_take_data'], $total_kids);
            if($total) $this->_conn->insert_batch($this->_table['exam_take_data'], $total);
            if($detail_kids) $this->_conn->insert_batch($this->_table['exam_take_data'], $detail_kids);
            foreach ($subject_datas as $subject_ccd => $val) {
                $detail = $this->_detailDataNotKids($site_code, $subject_ccd);
                if($detail) $this->_conn->insert_batch($this->_table['exam_take_data'], $detail);
            }

            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {

            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 전체데이터조회 : 유아
     * @param $site_code
     * @return mixed
     */
    private function _totalDataKids($site_code)
    {
        $query_string = "
            'total' AS DataType,SiteCode,TakeType,SubjectCcd,AreaCcd,YearTarget AS YearTarget1,NoticeNumber AS NoticeNumber1,TakeNumber AS TakeNumber1
            FROM {$this->_table['exam_take']}
            WHERE SiteCode = '{$site_code}'
            AND YearTarget >= {$this->_target_year}
            AND SubjectCcd = '733001'
            AND AreaCcd = '734001'
            AND IsStatus = 'Y'
            AND IsUse = 'Y'
            ORDER BY YearTarget, TakeType ASC
        ";
        return $this->_conn->query('select '. $query_string)->result_array();
    }

    /**
     * 전체데이터조회 : 유아제외
     * @param $site_code
     * @return mixed
     */
    private function _totalDataNotKids($site_code)
    {
        $query_string = "
            'total' AS DataType,m.SiteCode,m.TakeType,m.SubjectCcd,m.AreaCcd
            ,m.YearTarget1,m.YearTarget2,m.NoticeNumber1,m.NoticeNumber2,m.TakeNumber1,m.TakeNumber2
            ,REPLACE(m.NoticeNumber,'-','') AS NoticeNumber,REPLACE(m.TakeNumber,'-','') AS TakeNumber
            ,IF(m.NoticeNumber = 0, '-', IF(m.NoticeNumber > 0, 'up', 'down')) AS UpDownNoticeNumber
            ,IF(m.TakeNumber = 0, '-', IF(m.TakeNumber > 0, 'up', 'down')) AS UpDownTakeNumber
            FROM (
                SELECT
                c.SiteCode,c.TakeType,c.SubjectCcd,c.AreaCcd,c.YearTarget1,c.YearTarget2,c.NoticeNumber1,c.NoticeNumber2,c.TakeNumber1,c.TakeNumber2
                ,CASE c.TakeType
                WHEN 1 THEN c.NoticeNumber2 - c.NoticeNumber1
                ELSE c.NoticeNumber1
                END AS NoticeNumber
                ,CASE c.TakeType
                WHEN 1 THEN c.TakeNumber2 - c.TakeNumber1
                ELSE c.TakeNumber1
                END AS TakeNumber
                FROM (
                    SELECT
                    b.SiteCode,b.TakeType,b.SubjectCcd,b.AreaCcd
                    ,SUBSTRING_INDEX(b.YearTarget,',',1) AS YearTarget1
                    ,SUBSTRING_INDEX(b.YearTarget,',',-1) AS YearTarget2
                    ,SUBSTRING_INDEX(b.NoticeNumber,',',1) AS NoticeNumber1
                    ,SUBSTRING_INDEX(b.NoticeNumber,',',-1) AS NoticeNumber2
                    ,SUBSTRING_INDEX(b.TakeNumber,',',1) AS TakeNumber1
                    ,SUBSTRING_INDEX(b.TakeNumber,',',-1) AS TakeNumber2
                    FROM (
                        SELECT
                        a.SiteCode,a.TakeType,a.SubjectCcd,a.AreaCcd
                        ,GROUP_CONCAT(a.YearTarget ORDER BY a.SubjectCcd,a.YearTarget) AS YearTarget
                        ,GROUP_CONCAT(a.NoticeNumber ORDER BY a.SubjectCcd,a.YearTarget) AS NoticeNumber
                        ,GROUP_CONCAT(a.TakeNumber ORDER BY a.SubjectCcd,a.YearTarget) AS TakeNumber
                        FROM (
                            SELECT
                            SiteCode,TakeType,SubjectCcd,AreaCcd,YearTarget,NoticeNumber,TakeNumber
                            FROM {$this->_table['exam_take']}
                            WHERE SiteCode = '{$site_code}'
                            AND YearTarget >= {$this->_target_year}
                            AND AreaCcd = '734001'
                            AND IsStatus = 'Y'
                            AND IsUse = 'Y'
                            AND SubjectCcd != '733001'
                        ) AS a
                        GROUP BY a.SubjectCcd
                    ) AS b
                ) AS c
            ) AS m
        ";
        return $this->_conn->query('select '. $query_string)->result_array();
    }

    /**
     * 상세데이터 : 유아 : 지역별 데이터
     * @param $site_code
     * @return mixed
     */
    private function _detailDataKids($site_code)
    {
        $query_string = "
            'detail' AS DataType,SiteCode,TakeType,SubjectCcd,AreaCcd,YearTarget AS YearTarget1,NoticeNumber AS NoticeNumber1,TakeNumber AS TakeNumber1,PassLine AS PassLine1
            FROM {$this->_table['exam_take']}
            WHERE SiteCode = '{$site_code}'
            AND YearTarget >= {$this->_target_year}
            AND SubjectCcd = '733001'
            AND IsStatus = 'Y'
            AND IsUse = 'Y'
            ORDER BY AreaCcd,YearTarget,TakeType ASC
        ";
        return $this->_conn->query('select '. $query_string)->result_array();
    }

    /**
     * 상세데이터 유아제외 : 지역별 데이터
     * @param $site_code
     * @param $subject_ccd
     * @return mixed
     */
    private function _detailDataNotKids($site_code, $subject_ccd)
    {
        $query_string = "
            'detail' AS DataType,m.SiteCode,m.TakeType,m.SubjectCcd,m.AreaCcd
            ,m.YearTarget1,m.YearTarget2,m.NoticeNumber1,m.NoticeNumber2,m.TakeNumber1,m.TakeNumber2,m.PassLine1,m.PassLine2
            ,REPLACE(m.NoticeNumber,'-','') AS NoticeNumber
            ,REPLACE(m.TakeNumber,'-','') AS TakeNumber
            ,REPLACE(m.PassLine,'-','') AS PassLine
            ,IF(m.NoticeNumber = 0, '-', IF(m.NoticeNumber > 0, 'up', 'down')) AS UpDownNoticeNumber
            ,IF(m.TakeNumber = 0, '-', IF(m.TakeNumber > 0, 'up', 'down')) AS UpDownTakeNumber
            ,IF(m.PassLine = 0, '-', IF(m.PassLine > 0, 'up', 'down')) AS UpDownPassLine
            FROM (
                SELECT
                c.SiteCode,c.TakeType,c.SubjectCcd,c.AreaCcd,c.YearTarget1,c.YearTarget2,c.NoticeNumber1,c.NoticeNumber2,c.TakeNumber1,c.TakeNumber2,c.PassLine1,c.PassLine2
                ,(c.NoticeNumber2 - c.NoticeNumber1) AS NoticeNumber
                ,(c.TakeNumber2 - c.TakeNumber1) AS TakeNumber
                ,ROUND((c.PassLine2 - c.PassLine1),2) AS PassLine
                FROM (
                    SELECT
                    b.SiteCode,b.TakeType,b.SubjectCcd,b.AreaCcd
                    ,SUBSTRING_INDEX(b.YearTarget,',',1) AS YearTarget1
                    ,SUBSTRING_INDEX(b.YearTarget,',',-1) AS YearTarget2
                    ,SUBSTRING_INDEX(b.NoticeNumber,',',1) AS NoticeNumber1
                    ,SUBSTRING_INDEX(b.NoticeNumber,',',-1) AS NoticeNumber2
                    ,SUBSTRING_INDEX(b.TakeNumber,',',1) AS TakeNumber1
                    ,SUBSTRING_INDEX(b.TakeNumber,',',-1) AS TakeNumber2
                    ,SUBSTRING_INDEX(b.PassLine,',',1) AS PassLine1
                    ,SUBSTRING_INDEX(b.PassLine,',',-1) AS PassLine2
                    FROM (
                        SELECT
                        a.SiteCode,a.TakeType,a.SubjectCcd,a.AreaCcd
                        ,GROUP_CONCAT(a.YearTarget ORDER BY a.AreaCcd,a.YearTarget,a.TakeType) AS YearTarget
                        ,GROUP_CONCAT(a.NoticeNumber ORDER BY a.AreaCcd,a.YearTarget,a.TakeType) AS NoticeNumber
                        ,GROUP_CONCAT(a.TakeNumber ORDER BY a.AreaCcd,a.YearTarget,a.TakeType) AS TakeNumber
                        ,GROUP_CONCAT(a.PassLine ORDER BY a.AreaCcd,a.YearTarget,a.TakeType) AS PassLine
                        FROM (
                            SELECT
                            SiteCode,TakeType,SubjectCcd,AreaCcd,YearTarget,NoticeNumber,TakeNumber,PassLine
                            FROM {$this->_table['exam_take']}
                            WHERE SiteCode = '{$site_code}'
                            AND YearTarget >= {$this->_target_year}
                            AND SubjectCcd = '{$subject_ccd}'
                            AND IsStatus = 'Y'
                            AND IsUse = 'Y'
                            ORDER BY AreaCcd,YearTarget,TakeType
                        ) AS a
                        GROUP BY a.AreaCcd
                    ) AS b
                ) AS c
            ) AS m
        ";
        return $this->_conn->query('select '. $query_string)->result_array();
    }
}