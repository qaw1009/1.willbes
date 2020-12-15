<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamTakeInfoFModel extends WB_Model
{
    private $_table = [
        'sys_code' => 'lms_sys_code',
        'exam_take_info' => 'lms_exam_take_info',
        'exam_take_data' => 'lms_exam_take_data'
    ];

    public function __construct()
    {
        parent::__construct('lms');
        $this->load->model('lms/sys/codeModel');
    }

    /**
     * 시험정보 과목공통코드
     * @return array
     */
    public function getCcdForSubject($add_condition = [])
    {
        $add_condition = array_merge($add_condition, [
            'EQ' => ['GroupCcd' => '733','IsUse' => 'Y','IsStatus' => 'Y']
        ]);
        $data = $this->codeModel->listAllCode($add_condition);
        foreach ($data as $key => $row) {
            $result[$row['Ccd']]['subject_name'] = $row['CcdName'];
            $result[$row['Ccd']]['retake_type'] = $row['CcdDesc'];
        }
        return $result;
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
     * 과목별 데이터
     * @param $site_code
     * @return array
     */
    public function totalExamInfo($site_code)
    {
        $data = $this->_totalExamInfo($site_code);
        $data_kids = $this->_totalExamInfoForReTake($site_code);
        $data = array_replace_recursive($data_kids, $data);
        return $data;
    }

    /**
     * 과목의 지역별 데이터
     */
    public function getSubjectForAreaExamInfo($arr_condition, $retake_type)
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
        if ($retake_type == 'retake') {
            foreach ($result as $key => $val) {
                $data[$val['AreaCcd']][$val['YearTarget1']][$val['TakeType']]['NoticeNumber'] = $val['NoticeNumber1'];
                $data[$val['AreaCcd']][$val['YearTarget1']][$val['TakeType']]['TakeNumber'] = $val['TakeNumber1'];
                $data[$val['AreaCcd']][$val['YearTarget1']][$val['TakeType']]['PassLine'] = $val['PassLine1'];
            }
        } else {
            foreach ($result as $key => $row) {
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
        //기준년도조회(공통코드)
        $data = $this->codeModel->getCcd('735');
        $target_year_ccd = key($data);

        $arr_condition = [
            'EQ' => [
                'SiteCode' => $site_code,
                'IsStatus' => 'Y',
                'IsUse' => 'Y'
            ],
            'RAW' => [
                'YearTarget >= ' => $target_year_ccd
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
        $column = 'SubjectCcd,TakeType,YearTarget,NoticeNumber,TakeNumber,ROUND((TakeNumber / NoticeNumber),2) AS AvgData';
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
                    ORDER BY SubjectCcd, YearTarget ASC, TakeType DESC
                    LIMIT 10000
                ) AS a
                GROUP BY a.SubjectCcd, a.YearTarget
            ) AS m
        ";
        $order_by = 'ORDER BY m.SubjectCcd, m.YearTarget DESC';
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
                'a.DataType' => 'total',
                'a.SiteCode' => $site_code,
                'a.AreaCcd' => '734001'
            ],
            'NOT' => [
                'b.CcdDesc' => 'retake'
            ]
        ];
        $column = '
            a.SiteCode, a.TakeType, a.SubjectCcd, a.AreaCcd, a.YearTarget1, a.YearTarget2, a.NoticeNumber1, a.NoticeNumber2, a.TakeNumber1, a.TakeNumber2, a.PassLine1, a.PassLine2
            , a.NoticeNumber, a.TakeNumber, a.PassLine, a.UpDownNoticeNumber, a.UpDownTakeNumber, a.UpDownPassLine
        ';
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['exam_take_data']} as a
            INNER JOIN {$this->_table['sys_code']} as b on a.SubjectCcd = b.Ccd
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
    private function _totalExamInfoForReTake($site_code)
    {
        $arr_condition = [
            'EQ' => [
                'a.DataType' => 'total',
                'a.SiteCode' => $site_code,
                'a.AreaCcd' => '734001',
                'b.CcdDesc' => 'retake'
            ]
        ];
        $column = '
            a.SiteCode, a.TakeType, a.SubjectCcd, a.AreaCcd, a.YearTarget1, a.YearTarget2, a.NoticeNumber1, a.NoticeNumber2, a.TakeNumber1, a.TakeNumber2, a.PassLine1, a.PassLine2
            , a.NoticeNumber, a.TakeNumber, a.PassLine, a.UpDownNoticeNumber, a.UpDownTakeNumber, a.UpDownPassLine
        ';
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['exam_take_data']} as a
            INNER JOIN {$this->_table['sys_code']} as b on a.SubjectCcd = b.Ccd
        ";
        $order_by = "
            ORDER BY a.YearTarget1, a.TakeType ASC
        ";

        // 쿼리 실행
        $result = $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();

        $data = [];
        foreach ($result as $key => $row) {
            $data[$row['SubjectCcd']][$key]['SubjectCcd'] = $row['SubjectCcd'];
            $data[$row['SubjectCcd']][$key]['TakeType'] = $row['TakeType'];
            $data[$row['SubjectCcd']][$key]['YearTarget1'] = $row['YearTarget1'];
            $data[$row['SubjectCcd']][$key]['YearTarget2'] = $row['YearTarget2'];
            $data[$row['SubjectCcd']][$key]['NoticeNumber1'] = $row['NoticeNumber1'];
            $data[$row['SubjectCcd']][$key]['NoticeNumber2'] = $row['NoticeNumber2'];
            $data[$row['SubjectCcd']][$key]['TakeNumber1'] = $row['TakeNumber1'];
            $data[$row['SubjectCcd']][$key]['TakeNumber2'] = $row['TakeNumber2'];
            $data[$row['SubjectCcd']][$key]['NoticeNumber'] = $row['NoticeNumber'];
            $data[$row['SubjectCcd']][$key]['TakeNumber'] = $row['TakeNumber'];
            $data[$row['SubjectCcd']][$key]['UpDownNoticeNumber'] = $row['UpDownNoticeNumber'];
            $data[$row['SubjectCcd']][$key]['UpDownTakeNumber'] = $row['UpDownTakeNumber'];
        }
        return $data;
    }
}