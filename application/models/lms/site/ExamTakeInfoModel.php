<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamTakeInfoModel extends WB_Model
{
    private $_table = [
        'exam_take' => 'lms_exam_take_info',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
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
}