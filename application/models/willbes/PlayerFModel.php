<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlayerFModel extends WB_Model
{
    private $_table = [
        'sample' => 'lms_product_lecture_sample',
        'lecture' => 'lms_product_lecture',
        'mstlec' => 'wbs_cms_lecture',
        'unit' => 'wbs_cms_lecture_unit_combine',
        'wbs_code' => 'wbs_sys_code',
        'bookmark' => 'lms_my_lecture_bookmark',
        'study_log' => 'lms_lecture_studyinfo',
        'study_history' => 'lms_lecture_study_history',
        'lec_unit' => 'vw_unit_mylecture',
        'mylec' => 'lms_my_lecture',
        'device' => 'lms_member_device',
        'device_log' => 'lms_lecture_study_mobile_log',
        'sample_log' => 'lms_lecture_sample_log'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 강좌코드와 유닛코드로 샘플강좌 데이타 읽어오기
     * @param $ProdCode
     * @param $UnitIdx
     * @return array|int
     */
    public function getLectureSample($ProdCode, $UnitIdx)
    {
        if (empty($ProdCode) === true || empty($UnitIdx) === true) {
            return [];
        }

        $column = '
            ML.wMediaUrl,
            U.wSD, U.wHD, U.wWD, U.wUnitNum, U.wUnitLectureNum, U.wUnitName,
            IFNULL(C.wCcdValue, 16) AS wRatio
            ';

        $cond = [
            'EQ' => [
                'S.IsStatus' => 'Y',
                'S.ProdCode' => $ProdCode,
                'S.wUnitIdx' => $UnitIdx
            ]
        ];

        $from = " FROM
            {$this->_table['lecture']} AS L
            INNER JOIN {$this->_table['mstlec']} AS ML ON L.wLecIdx = ML.wLecIdx
            INNER JOIN {$this->_table['sample']} AS S ON L.ProdCode = S.ProdCode 
            INNER JOIN {$this->_table['unit']} AS U ON S.wUnitIdx = U.wUnitIdx
            LEFT JOIN {$this->_table['wbs_code']} AS C ON U.wContentSizeCcd = C.wCcd 
        ";

        $where = $this->_conn->makeWhere($cond);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where);
        return empty($rows) === true ? [] : $rows->row_array();
    }


    /**
     * 무료 보강
     * @param $ProdCode
     * @param $UnitIdx
     * @return array
     */
    public function getLectureFree($ProdCode, $UnitIdx)
    {
        if (empty($ProdCode) === true || empty($UnitIdx) === true) {
            return [];
        }

        $column = '
            ML.wMediaUrl,
            U.wSD, U.wHD, U.wWD, U.wUnitNum, U.wUnitLectureNum, U.wUnitName,
            IFNULL(C.wCcdValue, 16) AS wRatio
            ';

        $cond = [
            'EQ' => [
                'L.ProdCode' => $ProdCode,
                'L.FreeLecTypeCcd' => '652002',
                'U.wUnitIdx' => $UnitIdx
            ]
        ];

        $from = " FROM
            {$this->_table['lecture']} AS L
            INNER JOIN {$this->_table['mstlec']} AS ML ON L.wLecIdx = ML.wLecIdx
            INNER JOIN {$this->_table['unit']} AS U ON ML.wLecIdx = U.wLecIdx
            LEFT JOIN {$this->_table['wbs_code']} AS C ON U.wContentSizeCcd = C.wCcd 
        ";

        $where = $this->_conn->makeWhere($cond);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where);
        return empty($rows) === true ? [] : $rows->row_array();
    }



    /**
     * 북마크관리
     */
    public function getBookmark($input)
    {
        $query = "SELECT * FROM {$this->_table['bookmark']} ";
        $cond = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'ProdCode' => element('p', $input),
                'ProdCodeSub' => element('sp', $input),
                'wLecIdx' =>  element('l', $input),
                'wUnitIdx' =>  element('u', $input)
            ]
        ];

        $where = $this->_conn->makeWhere($cond);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query($query . $where . ' ORDER BY bmIdx DESC');

        return empty($rows) === true ? [] : $rows->result_array();

    }

    public function storeBookmark($input)
    {
        $input = [
            'MemIdx' => $this->session->userdata('mem_idx'),
            'ProdCode' => element('p', $input),
            'ProdCodeSub' => element('sp', $input),
            'wLecIdx' => element('l', $input),
            'wUnitIdx' => element('u', $input),
            'Time' => element('bmtime', $input),
            'Title' => element('bmtitle', $input)
        ];
        try {
            if($this->_conn->set($input)->insert($this->_table['bookmark']) === false){
                throw new \Exception('북마크저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    public function deleteBookmark($input)
    {
        $where = [
            'MemIdx' => $this->session->userdata('mem_idx'),
            'bmIdx' => element('bmidx', $input)
        ];

        try {
            if($this->_conn->delete($this->_table['bookmark'], $where) === false){
                throw new \Exception('북마크삭제에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 수강시작시 로그생성
     * @param $input
     * @return array|bool
     */
    public function storeStudyLog($input)
    {
        // 이미 로그기록 있는지 체크
        $query = "SELECT COUNT(*) as rownums FROM {$this->_table['study_log']} ";
        $where = [
            'EQ' => [
                'MemIdx' => element('MemIdx', $input),
                'OrderIdx' => element('OrderIdx', $input),
                'OrderProdIdx' => element('OrderProdIdx', $input),
                'ProdCode' => element('ProdCode', $input),
                'ProdCodeSub' => element('ProdCodeSub', $input),
                'wLecIdx' => element('wLecIdx', $input),
                'wUnitIdx' => element('wUnitIdx', $input)
            ]
        ];

        $where = $this->_conn->makeWhere($where);
        $where = $where->getMakeWhere(false);
        $result = $this->_conn->query($query.$where);

        $insert_data = [
            'MemIdx' => element('MemIdx', $input),
            'OrderIdx' => element('OrderIdx', $input),
            'OrderProdIdx' => element('OrderProdIdx', $input),
            'ProdCode' => element('ProdCode', $input),
            'ProdCodeSub' => element('ProdCodeSub', $input),
            'wLecIdx' => element('wLecIdx', $input),
            'wUnitIdx' => element('wUnitIdx', $input)
        ];

        // 기록없으면 study info insert
        if($result->row(0)->rownums == 0){
            try {
                if($this->_conn->set(array_merge($insert_data, [
                        'RealExpireTime' => element('RealExpireTime', $input)
                    ]))->insert($this->_table['study_log']) === false){
                    throw new \Exception('수강기록 초기화에 실패');
                }
            } catch (\Exception $e) {
                return 0;
            }
        }

        // 원타임 로그 : study history insert
        try {
            if($this->_conn->set(array_merge($insert_data, [
                    'AccessIp' => $this->input->ip_address(),
                    'DeviceInfo' => '',
                    'PlayType' => element('PlayType', $input),
                    'StudyType' => element('StudyType', $input),
                ]))->insert($this->_table['study_history']) === false){
                throw new \Exception('수강기록 초기화에 실패');
            }
        } catch (\Exception $e) {
            return 0;
        }

        return $this->_conn->insert_id();
    }

    /**
     * 수강로그 업데이트
     * @param $input
     * @return bool
     */
    public function updateStudyLog($input)
    {
        $OrderIdx = element('OrderIdx', $input);
        $ProdCode = element('ProdCode', $input);
        $ProdCodeSub = element('ProdCodeSub', $input);
        $OrderProdIdx = element('OrderProdIdx', $input);
        $wLecIdx = element('wLecIdx', $input);
        $wUnitIdx = element('wUnitIdx', $input);
        $LshIdx = element('LshIdx', $input);
        $MemIdx = element('MemIdx', $input);

        $LastPosition = element('LastPosition', $input);
        $DeviceInfo = element('DeviceInfo', $input);


        // 수강시간
        $StudyTime = (int)element('StudyTime', $input);
        $RealStudyTime = (int)element('RealStudyTime', $input);

        $UnitTime = (int)element('UnitTime', $input);
        $UnitStudyTime = (int)element('UnitStudyTime', $input);
        $UnitRealStudyTime =(int) element('UnitRealStudyTime', $input);

        $LecTime = (int)element('LecTime', $input);
        $LecStudyTime = (int)element('LecStudyTime', $input);
        $LecRealStudyTime = (int)element('LecRealStudyTime', $input);

        if($UnitTime == 0 ){
            $UnitRate = 0;
        } else {
            $UnitRate = floor((($UnitStudyTime + $StudyTime) / $UnitTime) * 100);
        }

        if($LecTime == 0 ){
            $LecRate = 0;
        } else {
            $LecRate = floor((($LecStudyTime + $StudyTime) / $LecTime) * 100);
        }

        if($UnitRate > 100) { $UnitRate = 100; }
        if($LecRate > 100) { $LecRate = 100; }

        $this->_conn->trans_begin();
        try{
            // 회차 업데이트
            if($this->_conn->
                set('StudyTime', $UnitStudyTime + $StudyTime)->
                set('RealStudyTime', $UnitRealStudyTime + $RealStudyTime)->
                set('LastPosition', $LastPosition)->
                set('LastStudyDate', 'NOW()', false)->
                set('StudyRate', $UnitRate)->
                where('MemIdx', $MemIdx)->
                where('OrderIdx', $OrderIdx)->
                where('ProdCode', $ProdCode)->
                where('ProdCodeSub', $ProdCodeSub)->
                where('OrderProdIdx', $OrderProdIdx)->
                where('wLecIdx', $wLecIdx)->
                where('wUnitIdx', $wUnitIdx)->
                update($this->_table['study_log'])
                == false){
                throw new \Exception('수강기록 업데이트 실패');
            }

            // 회차기록업데이트
            if($this->_conn->
                set('StudyTime', 'StudyTime + '.$StudyTime, false)->
                set('RealStudyTime', 'RealStudyTime + '.$RealStudyTime, false)->
                set('LastPosition', $LastPosition)->
                set('LastStudyDate', 'NOW()', false)->
                set('DeviceInfo', $DeviceInfo)->
                where('MemIdx', $MemIdx)->
                where('LshIdx', $LshIdx)->
                update($this->_table['study_history'])
                == false){
                throw new \Exception('수강기록 업데이트 실패');
            }

            // 내강의 업데이트
            if($this->_conn->
                set('StudyRate', $LecRate)->
                where('OrderIdx', $OrderIdx)->
                where('ProdCode', $ProdCode)->
                where('ProdCodeSub', $ProdCodeSub)->
                where('OrderProdIdx', $OrderProdIdx)->
                update($this->_table['mylec'])
                == false){
                throw new \Exception('수강기록 업데이트 실패');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }


    /**
     * @param $cond
     * @return array
     */
    function getStudyLog($cond)
    {
        // 회차 시간을 구한다.
        $query = "SELECT * ";
        $query .= " FROM {$this->_table['lec_unit']} ";
        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $result = $this->_conn->query($query);
        $result = $result->row_array();

        $UnitTime = (int)$result['wRuntime'] * 60;
        $UnitStudyTime = (int)$result['StudyTime'];
        $UnitRealStudyTime = (int)$result['RealStudyTime'];

        // uunitidx 를 없애서 해당 강의의 모든 시간합을 구한다.
        $cond['EQ']['wUnitIdx'] = '';
        $query = "SELECT SUM(wRuntime) AS LecTime, SUM(StudyTime) AS LecStudyTime, SUM(RealStudyTime) AS LecRealStudyTime ";
        $query .= " FROM {$this->_table['lec_unit']} ";
        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $result = $this->_conn->query($query);
        $result = $result->row_array();
        $LecTime = (int)$result['LecTime'] * 60;
        $LecStudyTime = (int)$result['LecStudyTime'];
        $LecRealStudyTime = (int)$result['LecRealStudyTime'];

        return [
            'UnitTime' => $UnitTime,
            'UnitStudyTime' => $UnitStudyTime,
            'UnitRealStudyTime' => $UnitRealStudyTime,
            'LecTime' => $LecTime,
            'LecStudyTime' => $LecStudyTime,
            'LecRealStudyTime' => $LecRealStudyTime
        ];
    }


    /**
     * 강의 시작할때 디바이스 로그를 저장
     * @param $input
     */
    function storeDeviceLog($input)
    {
        $input = [
            'LshIdx' => element('LshIdx', $input),
            'OS' => element('OS', $input),
            'APP' => element('APP', $input),
            'DeviceModel' => element('DeviceModel', $input),
            'DeviceId' => element('DeviceId', $input)
        ];

        $where = $this->_conn->makeWhere([ 'EQ' => ['LshIdx' => element('LshIdx', $input)]]);
        $where = $where->getMakeWhere(false);
        $result = $this->_conn->query("SELECT COUNT(*) AS rownums FROM {$this->_table['device_log']} ".$where);

        // 이미 로그가 있으면 패스
        if($result->row(0)->rownums > 0){
            return;
        }

        try{
            $this->_conn->set($input)->insert($this->_table['device_log']);
        } catch (\Exception $e) {}
    }


    /**
     * 등록된 디바이스 구하기
     * @param $cond
     * @return mixed
     */
    function getDevice($cond)
    {
        $query = "SELECT COUNT(*) AS rownums FROM {$this->_table['device']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $result = $this->_conn->query($query);

        return $result->row(0)->rownums;
    }

    /**
     * 디바이스등록
     * @param $input
     * @return bool
     */
    function storeDevice($input)
    {
        try{
            if($this->_conn->set($input)->insert($this->_table['device']) === false) {
                throw new \Exception('기기등록에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return false;
        }

        return true;
    }


    /**
     * 샘플강의 수강로그 기록
     * @param $input
     * @return bool
     */
    function storeSampleLog($input)
    {
        try{
            if($this->_conn->set($input)
                ->set('RegDatm', 'NOW()', false)
                ->set('RegIp', $this->input->ip_address())
                ->insert($this->_table['sample_log']) == false) {
                throw new \Exception('로그등록실패');
            }
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

}





























































