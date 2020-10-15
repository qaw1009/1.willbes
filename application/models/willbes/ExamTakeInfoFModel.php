<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamTakeInfoFModel extends WB_Model
{
    private $_target_year = '';
    private $_table = [
        'sys_code' => 'lms_sys_code',
        'exam_take_info' => 'lms_exam_take_info',
        'exam_take_data' => 'lms_exam_take_data'
    ];

    public function __construct()
    {
        parent::__construct('lms');
        $this->load->model('lms/sys/codeModel');
        $this->_target_year = date('Y') - 1;
    }

    /**
     * 시험정보 과목공통코드
     * @return array
     */
    public function getCcdForSubject()
    {
        return $this->codeModel->getCcd('733');
    }

    /**
     * 시험정보 지역코드
     * @return array
     */
    public function getCcdForArea()
    {
        return $this->codeModel->getCcd('734','CcdEtc');
    }

    /**
     * 시험정보 과목공통코드
     * @return array
     */
    public function getSubjectForList()
    {
        return $this->codeModel->getCcd('733', '', ['RAW' => ['JSON_EXTRACT(CcdEtc,\'$.is_pc\') = ' => '\'Y\'']]);
    }

    /**
     * 과목별 데이터
     * @param $site_code
     * @return array
     */
    public function totalExamInfo($site_code)
    {
        $data = $this->_totalExamInfo($site_code);
        $data_kids = $this->_totalExamInfoForKids($site_code);
        $data = array_replace_recursive($data_kids, $data);
        return $data;
    }

    /**
     * 과목의 지역별 데이터
     */
    public function getSubjectForAreaExamInfo($arr_condition)
    {
        $column = '
            SiteCode, TakeType, SubjectCcd, AreaCcd, YearTarget1, YearTarget2, NoticeNumber1, NoticeNumber2, TakeNumber1, TakeNumber2, PassLine1, PassLine2
            , NoticeNumber, TakeNumber, PassLine, UpDownNoticeNumber, UpDownTakeNumber, UpDownPassLine
        ';
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['exam_take_data']}
        ";
        $group_by = "
            ORDER BY AreaCcd,YearTarget1,TakeType ASC
        ";
        // 쿼리 실행
        $result = $this->_conn->query('select ' . $column . $from . $where . $group_by)->result_array();

        $data = [];
        if ($arr_condition['EQ']['SubjectCcd'] == '733001') {
            foreach ($result as $key => $val) {
                $data[$val['AreaCcd']][$val['YearTarget1']][$val['TakeType']]['NoticeNumber'] = $val['NoticeNumber1'];
                $data[$val['AreaCcd']][$val['YearTarget1']][$val['TakeType']]['TakeNumber'] = $val['TakeNumber1'];
                $data[$val['AreaCcd']][$val['YearTarget1']][$val['TakeType']]['PassLine'] = $val['PassLine1'];
            }
        } else {
            foreach ($result as $key => $row) {
                /*$data[$val['AreaCcd']][$val['YearTarget1']][$val['TakeType']]['NoticeNumber1'] = $val['NoticeNumber1'];
                $data[$val['AreaCcd']][$val['YearTarget1']][$val['TakeType']]['TakeNumber1'] = $val['TakeNumber1'];
                $data[$val['AreaCcd']][$val['YearTarget1']][$val['TakeType']]['PassLine1'] = $val['PassLine1'];*/

                $data[$row['AreaCcd']]['SubjectCcd'] = $row['SubjectCcd'];
                $data[$row['AreaCcd']]['TakeType'] = $row['TakeType'];
                $data[$row['AreaCcd']]['YearTarget1'] = $row['YearTarget1'];
                $data[$row['AreaCcd']]['YearTarget2'] = $row['YearTarget2'];
                $data[$row['AreaCcd']]['NoticeNumber1'] = $row['NoticeNumber1'];
                $data[$row['AreaCcd']]['NoticeNumber2'] = $row['NoticeNumber2'];
                $data[$row['AreaCcd']]['TakeNumber1'] = $row['TakeNumber1'];
                $data[$row['AreaCcd']]['TakeNumber2'] = $row['TakeNumber2'];
                $data[$row['AreaCcd']]['PassLine1'] = $row['PassLine1'];
                $data[$row['AreaCcd']]['PassLine2'] = $row['PassLine2'];
                $data[$row['AreaCcd']]['NoticeNumber'] = $row['NoticeNumber'];
                $data[$row['AreaCcd']]['TakeNumber'] = $row['TakeNumber'];
                $data[$row['AreaCcd']]['PassLine'] = $row['PassLine'];
                $data[$row['AreaCcd']]['UpDownNoticeNumber'] = $row['UpDownNoticeNumber'];
                $data[$row['AreaCcd']]['UpDownTakeNumber'] = $row['UpDownTakeNumber'];
                $data[$row['AreaCcd']]['UpDownPassLine'] = $row['UpDownPassLine'];
            }
        }
        return $data;
    }

    /**
     * @param $site_code
     * @return mixed
     */
    public function getExamGroupYear($site_code)
    {
        $arr_condition = [
            'EQ' => [
                'SiteCode' => $site_code,
                'IsStatus' => 'Y',
                'IsUse' => 'Y'
            ],
            'RAW' => [
                'YearTarget >=' => $this->_target_year
            ]
        ];
        $column = 'YearTarget';
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['exam_take_info']}
        ";
        $group_by = ' GROUP BY YearTarget';
        $order_by = ' ORDER BY YearTarget ASC';
        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by)->result_array();
    }

    /**
     * 과목의 지역별 데이터 (사용처:그래프)
     * @param $arr_condition
     * @return mixed
     */
    public function totalDataForGraph($arr_condition)
    {
        $column = 'SubjectCcd,TakeType,YearTarget,NoticeNumber,TakeNumber,ROUND((TakeNumber - NoticeNumber) / 100,2) AS AvgData';
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM (
                SELECT SubjectCcd,TakeType,YearTarget,NoticeNumber,TakeNumber
                FROM (
                    SELECT
                    SubjectCcd,TakeType,YearTarget,NoticeNumber,TakeNumber
                    FROM {$this->_table['exam_take_info']}
                    {$where}
                    ORDER BY YearTarget ASC , TakeType DESC
                    LIMIT 11
                ) AS a
                GROUP BY a.YearTarget
            ) AS m
        ";
        $order_by = 'ORDER BY m.YearTarget DESC';
        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $order_by)->result_array();
    }

    /**
     * 과목별 데이터
     * 지역전체, 유아과목 제외
     * @param $site_code
     * @return array
     */
    private function _totalExamInfo($site_code)
    {
        $arr_condition = [
            'EQ' => [
                'DataType' => 'total',
                'SiteCode' => $site_code,
                'AreaCcd' => '734001'
            ],
            'NOT' => [
                'SubjectCcd' => '733001'
            ]
        ];
        $column = '
            SiteCode, TakeType, SubjectCcd, AreaCcd, YearTarget1, YearTarget2, NoticeNumber1, NoticeNumber2, TakeNumber1, TakeNumber2, PassLine1, PassLine2
            , NoticeNumber, TakeNumber, PassLine, UpDownNoticeNumber, UpDownTakeNumber, UpDownPassLine
        ';
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['exam_take_data']}
        ";
        // 쿼리 실행
        $result = $this->_conn->query('select ' . $column . $from . $where)->result_array();

        $data = [];
        foreach ($result as $row) {
            $data[$row['SubjectCcd']]['SubjectCcd'] = $row['SubjectCcd'];
            $data[$row['SubjectCcd']]['TakeType'] = $row['TakeType'];
            $data[$row['SubjectCcd']]['YearTarget1'] = $row['YearTarget1'];
            $data[$row['SubjectCcd']]['YearTarget2'] = $row['YearTarget2'];
            $data[$row['SubjectCcd']]['NoticeNumber1'] = $row['NoticeNumber1'];
            $data[$row['SubjectCcd']]['NoticeNumber2'] = $row['NoticeNumber2'];
            $data[$row['SubjectCcd']]['TakeNumber1'] = $row['TakeNumber1'];
            $data[$row['SubjectCcd']]['TakeNumber2'] = $row['TakeNumber2'];
            $data[$row['SubjectCcd']]['NoticeNumber'] = $row['NoticeNumber'];
            $data[$row['SubjectCcd']]['TakeNumber'] = $row['TakeNumber'];
            $data[$row['SubjectCcd']]['UpDownNoticeNumber'] = $row['UpDownNoticeNumber'];
            $data[$row['SubjectCcd']]['UpDownTakeNumber'] = $row['UpDownTakeNumber'];
        }
        return $data;
    }

    /**
     * 과목별 데이터
     * 지역전체, 유아과목
     * @param $site_code
     * @return mixed
     */
    private function _totalExamInfoForKids($site_code)
    {
        $arr_condition = [
            'EQ' => [
                'DataType' => 'total',
                'SiteCode' => $site_code,
                'SubjectCcd' => '733001',
                'AreaCcd' => '734001'
            ]
        ];
        $column = '
            SiteCode, TakeType, SubjectCcd, AreaCcd, YearTarget1, YearTarget2, NoticeNumber1, NoticeNumber2, TakeNumber1, TakeNumber2, PassLine1, PassLine2
            , NoticeNumber, TakeNumber, PassLine, UpDownNoticeNumber, UpDownTakeNumber, UpDownPassLine
        ';
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['exam_take_data']}
        ";
        $group_by = "
            ORDER BY TakeType ASC
        ";

        // 쿼리 실행
        $result = $this->_conn->query('select ' . $column . $from . $where . $group_by)->result_array();
        $data['733001'] = $result;
        return $data;
    }
}