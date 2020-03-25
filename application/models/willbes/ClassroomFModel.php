<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassroomFModel extends WB_Model
{
    protected $_table = [
        'mylec' => 'lms_my_lecture',
        'lec_unit' => 'vw_unit_mylecture',
        'mylecture' => 'vw_on_mylecture',
        'myofflecture' => 'vw_off_mylecture',
        'mylecture_pkg' => 'vw_pkg_mylecture',
        'myofflecture_pkg' => 'vw_offpkg_mylecture',
        'start_log' => 'lms_my_lecture_history',
        'admin' => 'wbs_sys_admin',
        'pause_log' => 'lms_lecture_pause_history',
        'extend' => 'lms_lecture_extend',
        'down_log' => 'lms_lecture_data_download_log',
        'order_product' => 'lms_order_product',
        'booklist' => 'vw_product_salebook',
        'on_lecture' => 'vw_product_on_lecture',
        'device' => 'lms_member_device',
        'bookmark' => 'lms_my_lecture_bookmark',
        'code' => 'lms_sys_code',
        'order' => 'lms_order',
        'order_product_refund' => 'lms_order_product_refund',
        'order_unpaid_info' => 'lms_order_unpaid_info',
        'order_unpaid_hist' => 'lms_order_unpaid_hist',
        'order_sub_product' => 'lms_order_sub_product',
        'order_product_activity_log' => 'lms_order_product_activity_log',
        'product_r_sublecture' => 'lms_product_r_sublecture',
        'my_lecture' => 'lms_my_lecture',
        'product_r_lectureroom' => 'lms_product_r_lectureroom',
        'lectureroom' => 'lms_lectureroom',
        'lectureroom_r_unit' => 'lms_lectureroom_r_unit',
        'lectureroom_seat_register' => 'lms_lectureroom_seat_register',
        'lectureroom_r_unit_r_seat' => 'lms_lectureroom_r_unit_r_seat',
        'lectureroom_log' => 'lms_lectureroom_log',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'member' => 'lms_member',
        'member_otherinfo' => 'lms_member_otherinfo',
        'sys_code' => 'lms_sys_code'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     *  강의리스트에서 셀렉트를 위해서
     * @param $columns
     * @param $cond
     * @return array
     */
    private function getSelectList($columns, $cond, $isoff = false)
    {
        $query = "SELECT STRAIGHT_JOIN DISTINCT ".$columns;
        if($isoff == true){
            $query .= " FROM {$this->_table['myofflecture']}"; // WHERE LearnPatternCcd IN ('615001','615002','615003','615005') ";
        } else {
            $query .= " FROM {$this->_table['mylecture']}"; // WHERE LearnPatternCcd IN ('615001','615002','615003','615005') ";
        }

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $result = $this->_conn->query($query);

        return empty($result) === true ? [] : $result->result_array();
    }


    /**
     * 사이트리스트
     * @return array
     */
    public function getSiteList($cond = [], $isoff = false)
    {
        $columns = " SiteCode, SiteName ";
        return $this->getSelectList($columns, $cond, $isoff);
    }


    /**
     * 사이트그룹리스트
     * @return array
     */
    public function getSiteGroupList($cond = [], $isoff = false)
    {
        $columns = " SiteGroupCode, SiteGroupName ";
        return $this->getSelectList($columns, $cond, $isoff);
    }


    /**
     * 과정리스트
     * @return array
     */
    public function getCourseList($cond = [], $isoff = false)
    {
        $columns = " CourseIdx, CourseName ";
        return $this->getSelectList($columns, $cond, $isoff);
    }


    /** 과목리스트
     * @return array
     */
    public function getSubjectList($cond = [], $isoff = false)
    {
        $columns = " SubjectIdx, SubjectName ";
        return $this->getSelectList($columns, $cond, $isoff);

    }


    /** 강사리스트
     * @return array
     */
    public function getProfList($cond = [], $isoff = false)
    {
        $columns = " wProfIdx, wProfName ";
        return $this->getSelectList($columns, $cond, $isoff);
    }


    /** 단과강의리스트
     * @param array $cond_arr
     * @return array
     */
    public function getLecture($cond = [], $order = [], $isCount = false, $isoff = false, $limit = null, $offset = null)
    {
        if($isCount == true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) AS rownums ";
            $order_by_offset_limit = '';

        } else {
            $query = "SELECT STRAIGHT_JOIN *, TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        if($isoff == true){
            if($isCount == false) {
                $query = "SELECT * ";
            }
            $query .= " FROM {$this->_table['myofflecture']} ";
        } else {
            $query .= " FROM {$this->_table['mylecture']} ";
        }


        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $result = $this->_conn->query($query.$order_by_offset_limit);
        return ($isCount == true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 패키지 강좌 리스트
     */
    public function getPackage($cond = [], $order = [], $isCount = false, $isoff = false)
    {
        if($isCount == true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) AS rownums  ";
        } else {
            $query = "SELECT STRAIGHT_JOIN *, TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
        }

        if($isoff == true){
            if($isCount == false) {
                $query = "SELECT * ";
            }
            $query .= " FROM {$this->_table['myofflecture_pkg']} ";
        } else {
            $query .= " FROM {$this->_table['mylecture_pkg']} ";
        }


        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= $this->_conn->makeOrderBy($order)->getMakeOrderBy();
        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 학원강좌 분납 정보 가져오기
     * @param $prod_code
     * @param $mem_idx
     * @param null $unpaid_idx
     * @param null $limit
     * @return mixed
     */
    public function getUnPaidInfo($prod_code, $mem_idx, $unpaid_idx = null, $limit = null)
    {
        $column = 'OUI.UnPaidIdx, OUI.MemIdx, OUI.ProdCode, OUI.OrgOrderPrice, OUI.OrgPayPrice, OUI.DiscPrice
            , OUI.DiscRate, OUI.DiscType, OUI.DiscReason
            , OUH.OrderIdx, OUH.UnPaidPrice, OUH.UnPaidUnitNum, OUH.UnPaidMemo
	        , O.OrderNo, O.SiteCode, O.CompleteDatm, OP.PayStatusCcd, OP.RealPayPrice 
	        , IFNULL(OPR.RefundPrice, 0) AS RefundPrice
	        , (OUH.UnPaidPrice + IFNULL(OPR.RefundPrice, 0)) AS RealUnPaidPrice ';

        $from = "
            FROM " . $this->_table['order_unpaid_info'] . " as OUI
                INNER JOIN " . $this->_table['order_unpaid_hist'] . " AS OUH ON OUI.UnPaidIdx = OUH.UnPaidIdx
                INNER JOIN " . $this->_table['order'] . " AS O ON OUH.OrderIdx = O.OrderIdx
                INNER JOIN " . $this->_table['order_product'] . " AS OP ON O.OrderIdx = OP.OrderIdx                   
                LEFT JOIN " . $this->_table['order_product_refund'] . " AS OPR ON O.OrderIdx = OPR.OrderIdx AND OP.OrderProdIdx = OPR.OrderProdIdx
            WHERE OUI.ProdCode = ?
                AND OUI.MemIdx = ?
                AND OP.PayStatusCcd IN ('676001','676006')
	    ";

        $arr_condition = [
            'EQ' => [
                'OUI.UnPaidIdx' => $unpaid_idx
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by = ['OUH.UpHistIdx' => 'DESC'];
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, 0)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit, [$prod_code, $mem_idx]);

        return $limit == 1 ? $query->row_array() : $query->result_array();

    }


    /**
     * 학원강좌 선택형 패키지 강좌 선택 목록
     * @param $prodcode
     * @param $orderidx
     * @param $orderprodidx
     * @return mixed
     */
    public function getOffPackageSubLectgure($arr_condition)
    {
        $column = 'PS.ProdCode, PS.IsEssential
            , VP.ProdCode as ProdCodeSub, VP.ProdName as ProdNameSub, VP.CourseIdx, VP.CourseName, VP.SubjectIdx, VP.SubjectName
            , VP.ProfIdx, VP.wProfName, VP.StudyStartDate, VP.StudyEndDate 
            , IFNULL(datediff(VP.StudyEndDate, VP.StudyStartDate) + 1, 0) AS StudyPeriod
            , VP.WeekArrayName, VP.Amount, VP.ProfChoiceStartDate, VP.ProfChoiceEndDate
        ';
        $from = '
            FROM ' . $this->_table['product_r_sublecture'] . ' AS PS
                INNER JOIN vw_product_off_lecture AS VP ON PS.ProdCodeSub = VP.ProdCode
            WHERE PS.IsStatus = "Y"
            AND VP.ProfChoiceStartDate IS NOT NULL
            AND VP.ProfChoiceEndDate IS NOT NULL
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . ' ORDER BY VP.OrderNumCourse, VP.OrderNumSubject ASC, VP.ProfIdx ASC');

        return $query->result_array();
    }


    public function storeOffLectureSub($MemIdx, $OrderIdx, $OrderProdIdx, $ProdCode, $ProdCodeSub)
    {
        $today = date("Y-m-d", time());

        $this->_conn->trans_begin();
        try {
            
            if(empty($ProdCode) == true || empty($OrderIdx) == true || empty($OrderProdIdx) == true || empty($ProdCodeSub) == true ){
                throw new \Exception('정보가 올바르지 않습니다.');
            }

            // 강의 신청정보 읽어오기
            $pkginfo = $this->getPackage([
                'EQ' => [
                    'MemIdx' => $MemIdx,
                    'OrderIdx' => $OrderIdx,
                    'OrderProdIdx' => $OrderProdIdx
                ]
            ], [], false, true);
            if (count($pkginfo) != 1) {
                throw new \Exception('강좌신청정보가 없습니다.');
            }
            $UnPaidIdx = $pkginfo[0]['UnPaidIdx'];

            if (empty($UnPaidIdx) === false) {
                // 미수금주문일 경우 연관된 주문정보 조회
                $arr_order_prod = $this->_conn->getJoinListResult($this->_table['order_unpaid_hist'] . ' AS OUH'
                    ,'INNER'
                    ,$this->_table['order_product'] . ' as OP'
                    ,'OUH.OrderIdx = OP.OrderIdx'
                    ,'OP.OrderIdx, OP.OrderProdIdx'
                    , [
                        'EQ' => [
                            'OUH.UnPaidIdx' => $UnPaidIdx,
                            'OP.ProdCode' => $ProdCode,
                            'OP.MemIdx' => $MemIdx
                        ]
                    ]);

            } else {
                // 미수금번호가 없으면 일반 신청
                $arr_order_prod[0] = [
                    'OrderIdx' => $OrderIdx,
                    'OrderProdIdx' => $OrderProdIdx
                ];
            }

            // 선택한 강좌 정보 읽어오기
            // 현재 선택가능한 서브 강좌 읽어오기
            $arr_sel_sub_lec = $this->getOffPackageSubLectgure([
                'EQ' => [
                    'PS.ProdCode' => $ProdCode,
                ],
                'LTE' => [
                    'ProfChoiceStartDate' => $today
                ],
                'GTE' => [
                    'ProfChoiceEndDate' => $today
                ],
                'IN' => [
                    'ProdCodeSub' => $ProdCodeSub
                ]
            ]);
            if (empty($arr_sel_sub_lec) == true) {
                throw new \Exception('선택가능한 강좌가 없습니다.');
            }

            // 현재 선택가능한 서브 강좌 읽어오기
            $arr_sub_lec = $this->getOffPackageSubLectgure([
                'EQ' => [
                    'PS.ProdCode' => $ProdCode,
                ],
                'LTE' => [
                    'ProfChoiceStartDate' => $today
                ],
                'GTE' => [
                    'ProfChoiceEndDate' => $today
                ]
            ]);
            if (empty($arr_sub_lec) == true) {
                throw new \Exception('선택가능한 강좌가 없습니다.');
            }
            $arr_prodcodesub = array_pluck($arr_sub_lec, 'ProdCodeSub');

            // 주문 번호별로 강사 배정
            foreach($arr_order_prod as $order_row) {
                $order_idx = $order_row['OrderIdx'];
                $orderprod_idx = $order_row['OrderProdIdx'];

                // 주문상품서브 데이터 삭제
                $is_del_sub_product = $this->_conn
                    ->where('OrderProdIdx', $orderprod_idx)
                    ->where_in('ProdCodeSub', array_values($arr_prodcodesub))
                    ->delete($this->_table['order_sub_product']);
                if ($is_del_sub_product === false) {
                    throw new \Exception('강의 배정에 실패했습니다.[001]');
                }

                // 나의 강좌수정정보 데이터 삭제
                $is_del_my_lecture = $this->_conn
                    ->where('OrderIdx', $order_idx)
                    ->where('OrderProdIdx', $orderprod_idx)
                    ->where('ProdCode', $ProdCode)
                    ->where_in('ProdCodeSub', array_values($arr_prodcodesub))
                    ->delete($this->_table['my_lecture']);
                if ($is_del_my_lecture === false) {
                    throw new \Exception('강의 배정에 실패했습니다.[002]');
                }

                // 선택한강좌 추가
                foreach ($arr_sel_sub_lec as $insert_prod_code_sub) {
                    // 주문상품서브 등록
                    $is_add_sub_product = $this->_conn->set([
                        'OrderProdIdx' => $orderprod_idx,
                        'ProdCodeSub' => $insert_prod_code_sub['ProdCodeSub'],
                        'RealPayPrice' => 0
                    ])->insert($this->_table['order_sub_product']);

                    if ($is_add_sub_product === false) {
                        throw new \Exception('강의 배정에 실패했습니다.[003]');
                    }

                    // 내강의실정보
                    $data = [
                        'OrderIdx' => $order_idx,
                        'OrderProdIdx' => $orderprod_idx,
                        'ProdCode' => $ProdCode,
                        'ProdCodeSub' => $insert_prod_code_sub['ProdCodeSub'],
                        'LecStartDate' => $insert_prod_code_sub['StudyStartDate'],
                        'LecEndDate' => $insert_prod_code_sub['StudyEndDate'],
                        'RealLecEndDate' => $insert_prod_code_sub['StudyEndDate'],
                        'LecExpireTime' => 0,
                        'RealLecExpireTime' => 0,
                        'LecExpireDay' => $insert_prod_code_sub['StudyPeriod'],
                        'RealLecExpireDay' => $insert_prod_code_sub['StudyPeriod']
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['my_lecture']) === false) {
                        throw new \Exception('강의 배정에 실패했습니다.[004]');
                    }
                }
            }

            // 활동로그 저장
            $is_first_act = 'Y';
            $act_type = 'ProfAssign';
            $arr_condition = [
                'EQ' => [
                    'ActType' => $act_type,
                    'OrderIdx' => $OrderIdx,
                    'OrderProdIdx' => $OrderProdIdx
                ]
            ];
            $log_cnt = $this->_conn->getFindResult($this->_table['order_product_activity_log'], true, $arr_condition);
            if ($log_cnt > 0) {
                $is_first_act = 'N';
            }

            $data = [
                'ActType' => $act_type,
                'OrderIdx' => $OrderIdx,
                'OrderProdIdx' => $OrderProdIdx,
                'ProdCodeSub' => null,
                'ActContent' => implode(',', $ProdCodeSub),
                'IsFirstAct' => $is_first_act,
                'RegMemIdx' => $MemIdx,
                'RegIp' => $this->input->ip_address()
            ];

            $is_add = $this->_conn->set($data)->insert($this->_table['order_product_activity_log']);
            if ($is_add !== true) {
                throw new \Exception('강의 배정에 실패했습니다.[005]');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }


    /**
     *  강의 커리뮬럼
     * @param $wLecIdx
     * @param bool $isCount
     * @return mixed
     */
    public function getCurriculum($cond = [], $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT STRAIGHT_JOIN COUNT(*) AS rownums ";
        } else {
            $query = "SELECT STRAIGHT_JOIN * ";
        }

        $query .= " FROM {$this->_table['lec_unit']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY wOrderNum ASC ";

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }

    /** 단과강의리스트
     * @param array $cond_arr
     * @return array
     */
    public function getLectureBookmark($cond = [], $order = [])
    {
        $query = "SELECT MST.* FROM ( 
            SELECT L.*
            , TO_DAYS(L.RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            , (SELECT COUNT(*) FROM {$this->_table['bookmark']} AS B WHERE B.MemIdx = L.MemIdx AND B.ProdCode = L.ProdCode AND B.ProdCodeSub = L.ProdCodeSub ) AS bookmark 
            ";

        $query .= " FROM {$this->_table['mylecture']} AS L ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= $this->_conn->makeOrderBy($order)->getMakeOrderBy();
        $query .= " ) AS MST WHERE MST.bookmark > 0 ";
        $result = $this->_conn->query($query);

        return $result->result_array();
    }


    /**
     * 패키지 강좌 리스트
     */
    public function getPackageBookmark($cond = [], $order = [])
    {
        $query = "SELECT MST.* FROM (
            SELECT L.*
            , TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            , (SELECT COUNT(*) FROM {$this->_table['bookmark']} AS B WHERE B.MemIdx = L.MemIdx AND B.ProdCode = L.ProdCode) AS bookmark
            ";

        $query .= " FROM {$this->_table['mylecture_pkg']} AS L ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= $this->_conn->makeOrderBy($order)->getMakeOrderBy();
        $query .= " ) AS MST WHERE MST.bookmark > 0 ";
        $result = $this->_conn->query($query);

        return empty($result) === true ? [] : $result->result_array();
    }


    /**
     *  강의 커리뮬럼
     * @param $wLecIdx
     * @param bool $isCount
     * @return mixed
     */
    public function getCurriculumBookmark($cond = [])
    {
        $query = "SELECT STRAIGHT_JOIN * ";

        $query .= " FROM {$this->_table['lec_unit']} AS U
         JOIN {$this->_table['bookmark']} AS B ON U.ProdCode = B.ProdCode AND  U.ProdCodeSub = B.ProdCodeSub AND U.wLecIdx = B.wLecIdx AND U.wUnitIdx = B.wUnitIdx
         ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY U.wOrderNum ASC, B.RegDatm ASC ";

        $result = $this->_conn->query($query);

        return $result->result_array();
    }


    /**
     * 북마크 삭제
     * @param $cond
     * @return bool
     */
    public function deleteBookmark($cond)
    {
        if($this->_conn->
            makeWhere($cond)->
            delete($this->_table['bookmark']) == false){
            return false;
        }
        return true;        
    }


    /**
     * 북마크 내용 업데이트
     * @param $cond
     * @param $data
     * @return bool
     */
    public function updateBookmark($cond, $data)
    {
        if($this->_conn->
            set('Title', element('memo', $data))->
            makeWhere($cond)->
            update($this->_table['bookmark']) == false){
            return false;
        }
        
        return true;
    }


    /**
     * 수강시작일 변경 레이어팝업
     * @param array $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getStartDateLog($cond = [], $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * , ifnull(UpdAdminIdx, '') AS Name 
              ";
        }

        $query .= " FROM {$this->_table['start_log']}  
         ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY MlhIdx ASC ";

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 수강시작일 변경
     * @param $cond
     * @param $startdate
     * @return array|bool
     */
    public function setStartDate($cond, $startdate)
    {

        $where = $this->_conn->makeWhere([
            'EQ' => [
                'OrderIdx' => element('OrderIdx', $cond),
                'ProdCode' => element('ProdCode', $cond),
                'ProdCodeSub' => element('ProdCodeSub', $cond)
            ]
        ]);
        $where = $where->getMakeWhere(false);

        $query = "SELECT LecStartDate, LecExpireDay, LecEndDate, RealLecExpireDay, RealLecEndDate FROM {$this->_table['mylec']} " . $where . " LIMIT 1 ";

        $result = $this->_conn->query($query);

        if(empty($result) === true){
            return false;
        }

        $result = $result->row(0);

        $ori_startdate = $result->LecStartDate;
        $ori_expday = $result->LecExpireDay -1;
        $ori_enddate = $result->LecEndDate;
        $ori_realexpday = $result->RealLecExpireDay -1;
        $ori_realenddate = $result->RealLecEndDate;

        $this->_conn->trans_begin();

        try {

            if(empty(element('ProdCodeSub', $cond)) === true){
                if($this->_conn->
                    set('LecStartDate', $startdate)->
                    set('LecEndDate', date("Y-m-d", strtotime($startdate.'+'.$ori_expday.'day')))->
                    set('RealLecEndDate', date("Y-m-d", strtotime($startdate.'+'.$ori_realexpday.'day')))->
                    where('OrderIdx', element('OrderIdx', $cond))->
                    where('ProdCode', element('ProdCode', $cond))->
                    where('OrderProdIdx', element('OrderProdIdx', $cond))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }

            } else {
                if($this->_conn->
                    set('LecStartDate', $startdate)->
                    set('LecEndDate', date("Y-m-d", strtotime($startdate.'+'.$ori_expday.'day')))->
                    set('RealLecEndDate', date("Y-m-d", strtotime($startdate.'+'.$ori_realexpday.'day')))->
                    where('OrderIdx', element('OrderIdx', $cond))->
                    where('ProdCode', element('ProdCode', $cond))->
                    where('ProdCodeSub', element('ProdCodeSub', $cond))->
                    where('OrderProdIdx', element('OrderProdIdx', $cond))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }
            }


            $input = [
                'MemIdx' => element('MemIdx', $cond),
                'OrderIdx' => element('OrderIdx', $cond),
                'OrderProdIdx' => element('OrderProdIdx', $cond),
                'ProdCode' => element('ProdCode', $cond),
                'ProdCodeSub' => element('ProdCodeSub', $cond),
                'BeforeStartDate' => $ori_startdate,
                'BeforeEndDate' => $ori_realenddate,
                'UpdStudyStartDate' => $startdate,
                'UpdStudyEndDate' => date("Y-m-d", strtotime($startdate.'+'.$ori_realexpday.'day')),
                'UpdIp' => $this->input->ip_address(),
                'Memo' => '사용자가 시작일 변경'
            ];

            if($this->_conn->set($input)->insert($this->_table['start_log']) === false){
                throw new \Exception('로그기록에 실패했습니다.');
            }
            
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }


    /**
     * 일시중지 로그
     * @param array $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getPauseLog($cond = [], $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * , ifnull(PauseAdminIdx, '') AS Name 
              ";
        }

        $query .= " FROM {$this->_table['pause_log']}  
         ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY LphIdx DESC ";

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 일시중지 처리
     * @param $input
     * @return array|bool
     */
    public function setPause($input)
    {
        $lecstartdate = element('lecstartdate', $input);
        $realecexpireday = element('realecexpireday', $input);

        $this->_conn->trans_begin();

        try{
            if(empty(element('ProdCodeSub', $input)) === true){
                if($this->_conn->
                    set('RealLecExpireDay', $realecexpireday)->
                    set('RealLecEndDate', date("Y-m-d", strtotime($lecstartdate.'+'.($realecexpireday-1).'day')))->
                    where('OrderIdx', element('OrderIdx', $input))->
                    where('ProdCode', element('ProdCode', $input))->
                    where('OrderProdIdx', element('OrderProdIdx', $input))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }

            } else {
                if($this->_conn->
                    set('RealLecExpireDay', $realecexpireday)->
                    set('RealLecEndDate', date("Y-m-d", strtotime($lecstartdate.'+'.($realecexpireday-1).'day')))->
                    where('OrderIdx', element('OrderIdx', $input))->
                    where('ProdCode', element('ProdCode', $input))->
                    where('ProdCodeSub', element('ProdCodeSub', $input))->
                    where('OrderProdIdx', element('OrderProdIdx', $input))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }
            }


            $input = [
                'MemIdx' => element('MemIdx', $input),
                'OrderIdx' => element('OrderIdx', $input),
                'OrderProdIdx' => element('OrderProdIdx', $input),
                'ProdCode' => element('ProdCode', $input),
                'ProdCodeSub' => element('ProdCodeSub', $input),
                'PauseStartDate' => element('pausestartdate', $input),
                'PauseEndDate' => element('pauseenddate', $input),
                'PauseDays' => element('pauseday', $input),
                'PauseRegIp' => $this->input->ip_address(),
                'Memo' => '사용자가 일시중지 등록'
            ];

            if($this->_conn->set($input)->insert($this->_table['pause_log']) === false){
                throw new \Exception('로그기록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }


    /**
     * 일시중지 강의 재시작 설정
     * @param $input
     * @return array|bool
     */
    public function setRestartPause($input)
    {
        $lecstartdate = element('lecstartdate', $input);
        $realecexpireday = element('realecexpireday', $input);

        $today = date("Y-m-d", time());
        $enddate = date("Y-m-d", strtotime($today.'-1day'));

        // 해당 주문 강의의 일시정지 번호를 읽어온다.
        $query = "SELECT * ";
        $query .= " FROM {$this->_table['pause_log']} ";

        $cond = [
            'EQ' => [
                'MemIdx' => element('MemIdx', $input),
                'OrderIdx' => element('OrderIdx', $input),
                'ProdCode' => element('ProdCode', $input),
                'ProdCodeSub' => element('ProdCodeSub', $input),
                'OrderProdIdx' => element('OrderProdIdx', $input),
                'IsDel' => 'N'
            ]
        ];

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY LphIdx DESC LIMIT 1";

        $result = $this->_conn->query($query);
        $result = $result->result_array();;

        if(empty($result) == true){
            return false;
        }

        $row = $result[0];

        if($row['PauseEndDate'] < $today){
            return false;
        }

        $this->_conn->trans_begin();

        try {
            // 일시정지 정보 삭제
            if( $this->_conn->set('IsDel', 'Y')
                ->set('DelIp', $this->input->ip_address())
                ->set('DelDate', 'NOW()', false)
                ->set('Memo', $row['Memo'].' / 사용자가 일시정지 해제')
                ->where('LphIdx', $row['LphIdx'])
                ->update($this->_table['pause_log']) == false){
                throw new \Exception('업데이트 실패했습니다.');
            }

            // 일시정지 날짜가 오늘이면 새로운 정보를 입력하지 않는다.
            if($row['PauseStartDate'] < $today){
                // 날짜 계산
                $PauseDay = intval((strtotime($enddate)-strtotime($row['PauseStartDate']))/86400) +1;

                // 일시정지 날짜가 오늘 이전이면 새로운 일시정지 정보를 입력한다.
                $input = [
                    'MemIdx' => element('MemIdx', $input),
                    'OrderIdx' => element('OrderIdx', $input),
                    'OrderProdIdx' => element('OrderProdIdx', $input),
                    'ProdCode' => element('ProdCode', $input),
                    'ProdCodeSub' => element('ProdCodeSub', $input),
                    'PauseStartDate' => $row['PauseStartDate'],
                    'PauseEndDate' => $enddate,
                    'PauseDays' => $PauseDay,
                    'PauseRegIp' => $this->input->ip_address(),
                    'Memo' => '사용자가 일시중지 해제로 인해 재등록'
                ];

                if($this->_conn->set($input)->insert($this->_table['pause_log']) === false){
                    throw new \Exception('로그기록에 실패했습니다.');
                }
            } else {
                $PauseDay = 0;
            }

            // 실제 수강일은 이전 수강일 - 취소한 일시정지일 + 일시 정지일
            $realecexpireday = $realecexpireday - $row['PauseDays'] + $PauseDay;
            
            // 강의 수강기간을 업데이트한다.
            if(empty(element('ProdCodeSub', $input)) === true){
                if($this->_conn->
                    set('RealLecExpireDay', $realecexpireday)->
                    set('RealLecEndDate', date("Y-m-d", strtotime($lecstartdate.'+'.($realecexpireday-1).'day')))->
                    where('OrderIdx', element('OrderIdx', $input))->
                    where('ProdCode', element('ProdCode', $input))->
                    where('OrderProdIdx', element('OrderProdIdx', $input))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }

            } else {
                if($this->_conn->
                    set('RealLecExpireDay', $realecexpireday)->
                    set('RealLecEndDate', date("Y-m-d", strtotime($lecstartdate.'+'.($realecexpireday-1).'day')))->
                    where('OrderIdx', element('OrderIdx', $input))->
                    where('ProdCode', element('ProdCode', $input))->
                    where('ProdCodeSub', element('ProdCodeSub', $input))->
                    where('OrderProdIdx', element('OrderProdIdx', $input))->
                    update($this->_table['mylec']) === false) {
                    throw new \Exception('업데이트 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }

    /**
     * 강의 연장 기록 로그 읽어오기
     * @param $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getExtendLog($cond, $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * , ifnull(RegAdminIdx, '') AS Name 
              ";
        }

        $query .= " FROM {$this->_table['extend']}  
         ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY MlIdx DESC ";

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }

    /**
     * 재구매 목록
     * @param $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getRebuyLog($cond, $isCount = false)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * ";
        }

        $query .= " FROM {$this->_table['mylecture']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $query .= " ORDER BY OrderDate DESC ";

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }

    /**
     * 강의자료 다운로드 로그 기록
     * @param $input
     */
    public function storeDownloadLog($input)
    {
        $input = [
            'MemIdx' => element('MemIdx', $input),
            'OrderIdx' => element('OrderIdx', $input),
            'ProdCode' => element('ProdCode', $input),
            'ProdCodeSub' => element('ProdCodeSub', $input),
            'wLecIdx' => element('wLecIdx', $input),
            'wUnitIdx' => element('wUnitIdx', $input),
            'DownloadType' => element('DownloadType', $input),
            'DownloadIp' => $this->input->ip_address()
        ];

        $this->_conn->set($input)->insert($this->_table['down_log']);
    }


    /**
     * 기간제패키지 강좌추가
     * @param $input
     * @return bool
     */
    public function addPassLecture($input)
    {
        try {
            if($this->_conn->set($input)->insert($this->_table['mylec']) == false){
                throw new \Exception('강좌추가에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * 기간제패키지 즐겨찾기/숨기기
     * @param $input
     * @param $cond
     * @return bool
     */
    public function setLikeHide($input, $cond)
    {
        $this->_conn->trans_begin();
        try{
            $data = [
                'OrderIdx' => $cond['OrderIdx'],
                'OrderProdIdx' => $cond['OrderProdIdx'],
                'ProdCode' => $cond['ProdCode']
            ];

            foreach($cond['ProdCodeSub'] as $key => $value){
                if(empty($value) == false){
                    if($this->_conn->set($input)->where(array_merge($data, [
                            'ProdCodeSub' => $value
                        ]))->update($this->_table['mylec']) == false){
                        throw new \Exception('업데이트 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return false;
        }

        return true;
    }


    /**
     * 해당강의 교재 리스트 읽어오기
     * @param $cond
     * @return mixed
     */
    public function getBooklist($cond)
    {
        $query = "SELECT * FROM {$this->_table['booklist']} ";
        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= " ORDER BY BookProvisionCcd ASC ";

        $result = $this->_conn->query($query);
        return $result->result_array();
    }


    /**
     * 기잔제패키지 들을수 있는 강좌리스트
     * @param $arr_condition
     * @param string $col
     * @return mixed
     */
    public function getPassSubLecture($arr_condition, $col = '', $subarr, $notake = false)
    {
        if(empty($arr_condition) == true){
            return [];
        }

        if(empty($col) == true){
            $column =  "A.ProdCode As Parent_ProdCode, B.IsEssential, B.SubGroupName, B.OrderNum, C.* , 
                 if(D.ProdCode is null, 'N', 'Y') AS IsTake 
            ";
        } else {
            $column = $col;
        }

        $subwhere = $this->_conn->makeWhere($subarr)->getMakeWhere(true);

        $from = " 
            FROM
                vw_product_periodpack_lecture A
                JOIN lms_product_r_sublecture B on A.ProdCode = B.ProdCode AND B.IsStatus = 'Y'
                JOIN {$this->_table['on_lecture']} C on B.ProdCodeSub = C.ProdCode AND C.wIsUse = 'Y'
                LEFT JOIN {$this->_table['mylec']} D ON A.ProdCode = D.ProdCode AND C.ProdCode = D.ProdCodeSub ".$subwhere ;

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        if($notake){
            $where = $where . " AND D.ProdCode IS NULL ";
        }

        $orderby = " ORDER BY B.PsIdx DESC ";

        return $this->_conn->query('SELECT straight_join '. $column. $from. $where. $orderby)->result_array();
    }

    /**
     *  등록된 디바이스 목록
     * @param $cond
     * @param bool $isCount
     * @return mixed
     */
    public function getMyDevice($isCount, $cond, $limit = 5, $offset = 0)
    {
        if($isCount === true){
            $query = "SELECT COUNT(*) AS rownums ";
            $limitoffset = '';

        } else {
            $query = "SELECT * , ifnull(DelAdminIdx, '') AS DelName ";
            $limitoffset = $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $query .= " FROM {$this->_table['device']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        $query .= " ORDER BY MdIdx DESC ";
        $query .= $limitoffset;

        $result = $this->_conn->query($query);

        return ($isCount === true) ? $result->row(0)->rownums : $result->result_array();
    }

    /**
     *  등록된 디바이스 사용자 삭제
     * @param $mdidx
     * @param $memidx
     * @return bool
     */
    public function delMyDevice($mdidx, $memidx)
    {
        try {
            if($this->_conn->
                set('IsUse', 'N')->
                set('DelDatm', 'NOW()', false)->
                where('MdIdx', $mdidx)->
                where('MemIdx', $memidx)->
                update($this->_table['device']) == false){
                throw new \Exception('업데이트 실패했습니다.');
            }

        } catch (\Exception $e) {
            return false;
        }

        return true;
    }


    /**
     * 강좌 첨부파일 다운로드 횟수 읽어오기
     * @param $cond
     * @param bool $iscount
     * @return mixed
     */
    public function getDownLog($cond, $iscount = true)
    {
        if($iscount === true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT * ";
        }

        $query .= " FROM {$this->_table['down_log']} ";

        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);

        $result = $this->_conn->query($query);

        return ($iscount === true) ? $result->row(0)->rownums : $result->result_array();
    }


    /**
     * 오늘이 휴일로 등록되어있는지 갯수를 돌려줌
     * @return mixed
     */
    public function getHoliday()
    {
        $query = "SELECT COUNT(*) AS rownums FROM lms_holiday WHERE IsUse = 'Y' AND hDate = CURDATE()";
        $result = $this->_conn->query($query);

        return $result->row(0)->rownums;
    }


    /**
     * 강의실 좌석 정보조회
     * @param null $mem_idx
     * @param null $order_idx
     * @param array $arr_order_prod_idx
     * @param null $prod_code_master
     * @param array $arr_prod_code_sub
     * @return mixed
     */
    public function getLectureRoom($mem_idx = null, $order_idx = null, $arr_order_prod_idx = [], $prod_code_master = null, $arr_prod_code_sub = [])
    {
        $column = "
            ml.ProdCode AS ProdCodeMaster, prlr.ProdCode AS ProdCodeSub, o.OrderIdx, op.OrderProdIdx,
            prlr.LrCode, prlr.LrUnitCode, lr.LectureRoomName, lu.UnitName, lu.SeatChoiceStartDate, lu.SeatChoiceEndDate, lrsr.LrrursIdx, lrurs.SeatNo AS MemSeatNo
        ";
        $from = "
            FROM {$this->_table['order']} AS o
            INNER JOIN {$this->_table['order_product']} AS op ON o.OrderIdx = op.OrderIdx
            INNER JOIN {$this->_table['my_lecture']} AS ml ON o.OrderIdx = ml.OrderIdx AND op.OrderProdIdx = ml.OrderProdIdx AND op.ProdCode = ml.ProdCode
            INNER JOIN {$this->_table['product_r_sublecture']} AS prs ON ml.ProdCode = prs.ProdCode AND ml.ProdCodeSub = prs.ProdCodeSub AND prs.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_r_lectureroom']} AS prlr ON prs.ProdCodeSub = prlr.ProdCode
            INNER JOIN {$this->_table['lectureroom_r_unit']} AS lu ON prlr.LrCode = lu.LrCode AND prlr.LrUnitCode = lu.LrUnitCode AND lu.IsStatus = 'Y' AND lu.IsUse = 'Y'
            INNER JOIN {$this->_table['lectureroom']} AS lr ON lu.LrCode = lr.LrCode AND lr.IsStatus = 'Y' AND lr.IsUse = 'Y'
            LEFT JOIN {$this->_table['lectureroom_seat_register']} AS lrsr ON
                o.OrderIdx = lrsr.OrderIdx AND
                op.OrderProdIdx = lrsr.OrderProdIdx AND
                prlr.ProdCode = lrsr.ProdCodeSub AND
                lrsr.MemIdx = op.MemIdx AND
                lrsr.LrCode = lr.LrCode AND
                lrsr.LrUnitCode = lu.LrUnitCode AND
                lrsr.SeatStatusCcd IN ('728001', '728002') AND 
                lrsr.IsStatus = 'Y'
            LEFT JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrurs ON lrsr.LrrursIdx = lrurs.LrrursIdx AND lrurs.SeatStatusCcd = '727002' AND lrurs.IsStatus = 'Y'
        ";
        $arr_condition = [
            'EQ' => [
                'o.OrderIdx' => $order_idx,
                'op.ProdCode' => $prod_code_master,
                'op.MemIdx' => $mem_idx,
                'prlr.IsStatus' => 'Y',
                'prlr.IsUse' => 'Y'
            ],
            'IN' => [
                'op.OrderProdIdx' => $arr_order_prod_idx,
                'prlr.ProdCode' => $arr_prod_code_sub,
                'op.PayStatusCcd' => ['676001','676007']
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $orderby = " ORDER BY prlr.ProdCode ASC";
        return $this->_conn->query('SELECT straight_join '. $column. $from. $where. $orderby)->result_array();
    }

    /**
     * 강의실좌석 배정 > 좌석/상품 정보
     * @param array $form_data
     * @return mixed
     */
    public function getLectureRoomForProduct($form_data = [])
    {
        $arr_condition = [
            'EQ' => [
                'o.OrderIdx' => element('orderidx', $form_data),
                'op.OrderProdIdx' => element('orderprodidx', $form_data),
                'ml.ProdCode' => element('prod_code', $form_data),
                'ml.ProdCodeSub' => element('prod_code_sub', $form_data),
                'o.MemIdx' => $this->session->userdata('mem_idx'),
                'plSub.LearnPatternCcd' => '615006'    //단과
            ],
            'IN' => [
                'op.PayStatusCcd' => ['676001','676007']    //결제완료, 신청완료
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = "
            o.OrderNo, o.OrderIdx, op.OrderProdIdx,
            op.ProdCode,
            mem.MemId, mem.MemName, memInfo.Tel1, fn_dec(memInfo.Tel2Enc) AS Tel2, memInfo.Tel3,
            p.ProdName, pSub.ProdName AS ProdNameSub, op.RealPayPrice, o.CompleteDatm, sc.CcdName AS PayStatusName,
            prlr.LrCode, prlr.LrUnitCode, lr.LectureRoomName, lu.UnitName, lu.TransverseNum, lu.SeatChoiceStartDate, lu.SeatChoiceEndDate, lrsr.LrsrIdx, lrsr.LrrursIdx, lrurs.SeatNo AS MemSeatNo,
            lu.SeatMapFileRoute, lu.SeatMapFileName,
            fn_order_sub_product_data(op.OrderProdIdx) AS OrderSubProdData,
            ( SELECT GROUP_CONCAT(LrsrIdx) AS LrsrIdxData FROM {$this->_table['lectureroom_seat_register']} AS a
                WHERE o.OrderIdx = a.OrderIdx AND op.OrderProdIdx = a.OrderProdIdx AND a.MemIdx = op.MemIdx 
                AND a.LrCode = lr.LrCode AND a.LrUnitCode = lu.LrUnitCode AND a.SeatStatusCcd IN ('728001', '728002') AND a.IsStatus = 'Y'
            ) AS LrsrIdxData
        ";
        $from = "
            FROM {$this->_table['order']} AS o
            INNER JOIN {$this->_table['order_product']} AS op ON o.OrderIdx = op.OrderIdx
            INNER JOIN {$this->_table['product']} AS p ON op.ProdCode = p.ProdCode AND p.ProdTypeCcd = '636002'
            INNER JOIN {$this->_table['product_lecture']} AS pl ON p.ProdCode = pl.ProdCode
            INNER JOIN {$this->_table['member']} AS mem ON o.MemIdx = mem.MemIdx
            INNER JOIN {$this->_table['member_otherinfo']} AS memInfo ON mem.MemIdx = memInfo.MemIdx
            INNER JOIN {$this->_table['sys_code']} AS sc ON op.PayStatusCcd = sc.Ccd
            INNER JOIN {$this->_table['my_lecture']} AS ml ON o.OrderIdx = ml.OrderIdx AND op.OrderProdIdx = ml.OrderProdIdx AND op.ProdCode = ml.ProdCode
            INNER JOIN {$this->_table['product']} AS pSub ON ml.ProdCodeSub = pSub.ProdCode
            INNER JOIN {$this->_table['product_lecture']} AS plSub ON pSub.ProdCode = plSub.ProdCode
            INNER JOIN {$this->_table['product_r_sublecture']} AS prs ON ml.ProdCode = prs.ProdCode AND ml.ProdCodeSub = prs.ProdCodeSub AND prs.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_r_lectureroom']} AS prlr ON prs.ProdCodeSub = prlr.ProdCode
            INNER JOIN {$this->_table['lectureroom_r_unit']} AS lu ON prlr.LrCode = lu.LrCode AND prlr.LrUnitCode = lu.LrUnitCode AND lu.IsStatus = 'Y' AND lu.IsUse = 'Y'
            INNER JOIN {$this->_table['lectureroom']} AS lr ON lu.LrCode = lr.LrCode AND lr.IsStatus = 'Y' AND lr.IsUse = 'Y'
            LEFT JOIN {$this->_table['lectureroom_seat_register']} AS lrsr ON
                o.OrderIdx = lrsr.OrderIdx AND
                op.OrderProdIdx = lrsr.OrderProdIdx AND
                ml.ProdCodeSub = lrsr.ProdCodeSub AND
                lrsr.MemIdx = op.MemIdx AND
                lrsr.LrCode = lr.LrCode AND
                lrsr.LrUnitCode = lu.LrUnitCode AND
                lrsr.SeatStatusCcd IN ('728001', '728002') AND 
                lrsr.IsStatus = 'Y'
            LEFT JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrurs ON lrsr.LrrursIdx = lrurs.LrrursIdx AND lrurs.SeatStatusCcd = '727002' AND lrurs.IsStatus = 'Y'
        ";
        return $this->_conn->query('SELECT ' . $column . $from . $where)->row_array();
    }

    /**
     * 강의실 좌석 정보
     * @param array $form_data
     * @return mixed
     */
    public function getLectureRoomSeat($form_data = [])
    {
        $arr_condition = [
            'EQ' => [
                'prl.ProdCode' => element('prod_code_sub', $form_data),
                'prl.LrCode' => element('lr_code', $form_data),
                'prl.LrUnitCode' => element('lr_unit_code', $form_data),
                'prl.IsStatus' => 'Y',
                'prl.IsUse' => 'Y'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $arr_condition_sub = [
            'EQ' => [
                'LrCode' => element('lr_code', $form_data),
                'LrUnitCode' => element('lr_unit_code', $form_data),
                'IsStatus' => 'Y',
            ],
            'IN' => [
                'SeatStatusCcd' => ['728001','728002']
            ]
        ];
        $where_sub = $this->_conn->makeWhere($arr_condition_sub);
        $where_sub = $where_sub->getMakeWhere(false);

        $column = "lrurs.LrrursIdx, lrurs.SeatNo, lrurs.SeatStatusCcd, sc.CcdName AS SeatStatusName, lrsr.MemLrrursIdx, lrsr.MemIdx, lrsr.MemName";
        $from = "
            FROM {$this->_table['product_r_lectureroom']} AS prl
            INNER JOIN {$this->_table['lectureroom']} AS lr ON prl.LrCode = lr.LrCode AND lr.IsStatus = 'Y' AND lr.IsUse = 'Y'
            INNER JOIN {$this->_table['lectureroom_r_unit']} AS lu ON lr.LrCode = lu.LrCode AND prl.LrUnitCode = lu.LrUnitCode AND lu.IsStatus = 'Y' AND lu.IsUse = 'Y'
            INNER JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrurs ON lu.LrUnitCode = lrurs.LrUnitCode AND lrurs.IsStatus = 'Y'
            INNER JOIN {$this->_table['sys_code']} AS sc ON lrurs.SeatStatusCcd = sc.Ccd
            LEFT JOIN (
                SELECT a.LrrursIdx as MemLrrursIdx, a.MemIdx, a.OrderProdIdx, c.MemName
                FROM (
                    SELECT LrrursIdx, MemIdx, OrderProdIdx
                    FROM {$this->_table['lectureroom_seat_register']}
                    {$where_sub} GROUP BY LrrursIdx
                ) AS a
                INNER JOIN {$this->_table['order_product']} AS b ON a.OrderProdIdx = b.OrderProdIdx AND b.PayStatusCcd = '676001'
                INNER JOIN {$this->_table['member']} AS c ON a.MemIdx = c.MemIdx
            ) AS lrsr ON lrurs.LrrursIdx = lrsr.MemLrrursIdx
        ";
        $order_by = $this->_conn->makeOrderBy(['lrurs.LrrursIdx' =>'ASC'])->getMakeOrderBy();
        /*echo '<pre>'.'SELECT ' . $column . $from . $where . $order_by.'</pre>';
        exit;*/
        return $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 회원좌석정보 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function getLectureRoomSeatRegister($arr_condition)
    {
        $column = 'lrsr.LrsrIdx, lrsr.LrrursIdx, lrrurs.SeatNo, lrsr.ProdCodeSub';
        $from = "
            FROM {$this->_table['lectureroom_seat_register']} AS lrsr
            INNER JOIN {$this->_table['lectureroom_r_unit_r_seat']} AS lrrurs ON lrsr.LrrursIdx = lrrurs.LrrursIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['lrsr.LrsrIdx' =>'ASC'])->getMakeOrderBy();
        return $this->_conn->query('SELECT ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 강의실좌석 등록
     * @param array $form_data
     * @return array|bool
     */
    public function addLectureRoomSeatRegister($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $chk_register_data = $this->_findLectureRoomSeatRegister(element('lr_rurs_idx', $form_data));
            if (empty($chk_register_data) === false) {
                throw new \Exception('이미 등록된 좌석입니다. 다른 좌석을 선택해 주세요.');
            }

            $chk_lecture_room_unit = $this->_getLectureRoomUnitForValidate(element('lr_code', $form_data), element('lr_unit_code', $form_data));
            if ($chk_lecture_room_unit['ret_cd'] !== true) {
                throw new \Exception($chk_lecture_room_unit['ret_msg']);
            }

            switch (element('pkg_yn',$form_data)) {
                case 'N' :
                    if ($this->_addLectureRoomSeatRegister($form_data) !== true) {
                        throw new \Exception('단과반 강의실 좌석 배정에 실패했습니다.');
                    }
                    break;
                case "Y" :
                    if ($this->_addLectureRoomSeatRegisterPkg($form_data) !== true) {
                        throw new \Exception('종합반 강의실 좌석 배정에 실패했습니다.');
                    }
                    break;
                default :
                    throw new \Exception('정보가 올바르지 않습니다.');
            }

            //강의실회차좌석정보 상태 업데이트
            if ($this->_modifyLectureRoomUnitSeatForAdd(element('lr_rurs_idx', $form_data), '727002', 'add') !== true) {
                throw new \Exception('강의실 좌석 상태 수정에 실패했습니다.');
            }

            if ($this->_sendKakao($chk_lecture_room_unit) !== true) {
                throw new \Exception('SMS 발송에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 강의실좌석 변경
     * @param array $form_data
     * @return array|bool
     */
    public function modifyLectureRoomSeatRegister($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $old_register_data = $this->_findLectureRoomSeatRegisterForOld(element('old_arr_lrsr_idx', $form_data));
            if (empty($old_register_data) === true) {
                throw new \Exception('기존 좌석 조회에 실패했습니다.');
            }

            $chk_lecture_room_unit = $this->_getLectureRoomUnitForValidate(element('lr_code', $form_data), element('lr_unit_code', $form_data));
            if ($chk_lecture_room_unit['ret_cd'] !== true) {
                throw new \Exception($chk_lecture_room_unit['ret_msg']);
            }

            $chk_register_data = $this->_findLectureRoomSeatRegister(element('lr_rurs_idx', $form_data));
            if (empty($chk_register_data) === false) {
                throw new \Exception('이미 등록된 좌석입니다. 다른 좌석을 선택해 주세요.');
            }

            if ($this->_modifyLectureRoomSeatForMove($form_data, $old_register_data) !== true) {
                throw new \Exception('좌석이동에 실패했습니다.');
            }

            if ($this->_sendKakao($chk_lecture_room_unit) !== true) {
                throw new \Exception('SMS 발송에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 강의실 회차 정보 유효성 검사
     * 좌석선택기간 체크, 좌석수 체크
     * @param $lr_code
     * @param $lr_unit_code
     * @return array|string
     */
    private function _getLectureRoomUnitForValidate($lr_code, $lr_unit_code)
    {
        try {
            $arr_condition = [
                'EQ' => [
                    'lrru.LrCode' => $lr_code,
                    'lrru.LrUnitCode' => $lr_unit_code,
                    'lrru.IsStatus' => 'Y',
                    'lrru.IsUse' => 'Y',
                ]
            ];

            $arr_condition_sub = [
                'EQ' => [
                    'LrUnitCode' => $lr_unit_code,
                    'IsStatus' => 'Y',
                ],
                'IN' => [
                    'SeatStatusCcd' => ['728001', '728002']
                ]
            ];

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(false);

            $where_sub = $this->_conn->makeWhere($arr_condition_sub);
            $where_sub = $where_sub->getMakeWhere(false);

            $column = 'lrru.UseQty, lrru.SeatChoiceStartDate, lrru.SeatChoiceEndDate, lrru.IsSmsUse, lrru.SmsContent, lrru.SendTel, IFNULL(lrrurs.useSeatCnt,0) AS useSeatCnt';
            $from = "
                FROM {$this->_table['lectureroom_r_unit']} AS lrru
                LEFT JOIN (
                    SELECT LrUnitCode, COUNT(*) AS useSeatCnt
                    FROM {$this->_table['lectureroom_r_unit_r_seat']}
                    {$where_sub}
                ) AS lrrurs ON lrrurs.LrUnitCode = lrru.LrUnitCode
            ";
            $result = $this->_conn->query('SELECT ' . $column . $from . $where . ' limit 1')->row_array();
            if (empty($result) === true) {
                throw new \Exception('조회된 강의실 정보가 없습니다.');
            }

            $now = date('Y-m-d');
            if ($result['SeatChoiceStartDate'] > $now || $result['SeatChoiceEndDate'] < $now) {
                throw new \Exception('좌석 선택 기간이 아닙니다.');
            }

            if ($result['UseQty'] <= $result['useSeatCnt']) {
                throw new \Exception('정원 초과 입니다.');
            }

        } catch (\Exception $e) {
            return [
                'ret_cd' => false,
                'ret_msg' => $e->getMessage()
            ];
        }
        return [
            'ret_cd' => true,
            'data' => $result
        ];
    }

    /**
     * 사용중인 좌석 조회
     * @param $lr_rurs_idx
     * @return array
     */
    private function _findLectureRoomSeatRegister($lr_rurs_idx)
    {
        $arr_condition = [
            'EQ' => [
                'lrsr.LrrursIdx' => $lr_rurs_idx,
                'lrsr.IsStatus' => 'Y',
                'lrrurs.IsStatus' => 'Y'
            ],
            'IN' => [
                'lrsr.SeatStatusCcd' => ['728001','728002']
            ]
        ];
        return $this->getLectureRoomSeatRegister($arr_condition);
    }

    /**
     * 회원기준 사용중인 좌석 조회
     * @param $old_arr_lrsr_idx
     * @return array
     */
    private function _findLectureRoomSeatRegisterForOld($old_arr_lrsr_idx)
    {
        $arr_condition = [
            'EQ' => [
                'lrsr.MemIdx' => $this->session->userdata('mem_idx'),
                'lrrurs.SeatStatusCcd' => '727002',
                'lrrurs.IsStatus' => 'Y',
                'lrsr.IsStatus' => 'Y'
            ],
            'IN' => ['lrsr.LrsrIdx' => explode(',',$old_arr_lrsr_idx)]
        ];
        return $this->getLectureRoomSeatRegister($arr_condition);
    }

    /**
     * 단과반 강의실 좌석 배정
     * @param array $form_data
     * @return array|bool
     */
    private function _addLectureRoomSeatRegister($form_data = [])
    {
        try {
            $input_data = [
                'ProdCode' => element('prod_code', $form_data),
                'ProdCodeSub' => element('prod_code_sub', $form_data),
                'LrCode' => element('lr_code', $form_data),
                'LrUnitCode' => element('lr_unit_code', $form_data),
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => element('order_idx', $form_data),
                'OrderProdIdx' => element('order_prod_idx', $form_data),
                'LrrursIdx' => element('lr_rurs_idx', $form_data),
                'SeatStatusCcd' => '728001',
                'OrderNum' => 1,
                'IsStatus' => 'Y',
                'RegMemDatm' => date('Y-m-d H:i:s'),
                'RegMemIp' => $this->input->ip_address(),
            ];

            if($this->_conn->set($input_data)->insert($this->_table['lectureroom_seat_register']) === false) {
                throw new \Exception('fail');
            }

            $lrsr_idx = $this->_conn->insert_id();
            $log_data = [
                'LrCode' => element('lr_code', $form_data),
                'LrUnitCode' => element('lr_unit_code', $form_data),
                'SeatStatusCcd' => '728001',
                'LrrursIdx' => element('lr_rurs_idx', $form_data),
                'LrsrIdx' => $lrsr_idx,
                'OrderProdIdx' => element('order_prod_idx', $form_data),
                'MemIdx' => $this->session->userdata('mem_idx'),
                'BeforeSeatNo' => element('seat_num', $form_data)
            ];

            if($this->_conn->set($log_data)->insert($this->_table['lectureroom_log']) === false) {
                throw new \Exception('log fail');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 종합반 강의실 좌석 배정
     * @param array $form_data
     * @return array|bool
     */
    private function _addLectureRoomSeatRegisterPkg($form_data = [])
    {
        try {
            $arr_prod_code_sub = element('arr_prod_code_sub', $form_data);
            if (empty($arr_prod_code_sub) === true) {
                throw new \Exception('fail');
            }

            $_arr_prod_code_sub = explode(',',$arr_prod_code_sub);

            $input_data = [];
            $order_num = 1;
            foreach ($_arr_prod_code_sub as $key => $val) {
                $input_data[] = [
                    'ProdCode' => element('prod_code', $form_data),
                    'ProdCodeSub' => $val,
                    'LrCode' => element('lr_code', $form_data),
                    'LrUnitCode' => element('lr_unit_code', $form_data),
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'OrderIdx' => element('order_idx', $form_data),
                    'OrderProdIdx' => element('order_prod_idx', $form_data),
                    'LrrursIdx' => element('lr_rurs_idx', $form_data),
                    'SeatStatusCcd' => '728001',
                    'OrderNum' => $order_num,
                    'IsStatus' => 'Y',
                    'RegMemDatm' => date('Y-m-d H:i:s'),
                    'RegMemIp' => $this->input->ip_address(),
                ];
                $order_num++;
            }

            foreach ($input_data as $key => $data) {
                if($this->_conn->set($data)->insert($this->_table['lectureroom_seat_register']) === false) {
                    throw new \Exception('fail');
                }

                $lrsr_idx = $this->_conn->insert_id();
                $log_data = [
                    'LrCode' => element('lr_code', $form_data),
                    'LrUnitCode' => element('lr_unit_code', $form_data),
                    'SeatStatusCcd' => '728001',
                    'LrrursIdx' => element('lr_rurs_idx', $form_data),
                    'LrsrIdx' => $lrsr_idx,
                    'OrderProdIdx' => element('order_prod_idx', $form_data),
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'BeforeSeatNo' => element('seat_num', $form_data)
                ];

                if($this->_conn->set($log_data)->insert($this->_table['lectureroom_log']) === false) {
                    throw new \Exception('log fail');
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 강의실 좌석 상태 수정 (신규등록)
     * @param $lr_rurs_idx
     * @param $status_ccd
     * @param $mode
     * @return array|bool
     */
    private function _modifyLectureRoomUnitSeatForAdd($lr_rurs_idx, $status_ccd, $mode)
    {
        try {
            $input_data = [
                'SeatStatusCcd' => $status_ccd
            ];
            if ($mode == 'add') {
                $input_data = array_merge($input_data, [
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'RegMemDatm' => date('Y-m-d H:i:s')
                ]);
            } else {
                $input_data = array_merge($input_data, [
                    'MemIdx' => '',
                    'RegMemDatm' => ''
                ]);
            }
            $this->_conn->set($input_data)->where('LrrursIdx', $lr_rurs_idx);
            if($this->_conn->update($this->_table['lectureroom_r_unit_r_seat'])=== false) {
                throw new \Exception('강의실회차 좌석상태 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 자리이동
     * 기존회원좌석상태 퇴실 -> 기존 좌석상태 미사용 -> 신규등록 -> 로그저장
     * @param array $form_data
     * @param array $old_register_data
     * @return array|bool
     */
    private function _modifyLectureRoomSeatForMove($form_data = [], $old_register_data = [])
    {
        try {
            //기존 좌석식별자 취득
            $old_lrrurs_idx = $old_register_data[0]['LrrursIdx'];

            //좌석정보 수정 (미사용)
            if ($this->_modifyLectureRoomUnitSeatForAdd($old_lrrurs_idx, '727001', 'del') !== true) {
                throw new \Exception('강의실 좌석 상태 수정에 실패했습니다.');
            }

            //좌석정보 수정 (사용)
            if ($this->_modifyLectureRoomUnitSeatForAdd(element('lr_rurs_idx', $form_data), '727002', 'add') !== true) {
                throw new \Exception('강의실 좌석 상태 수정에 실패했습니다.');
            }

            //등록
            if ($this->_modifyLectureRoomSeatRegister($form_data) !== true) {
                throw new \Exception('강의실 좌석 이동에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }
    /*private function _modifyLectureRoomSeatForMove($form_data = [], $old_register_data = [])
    {
        try {
            //기존 회원 좌석 상태 수정 (퇴실)
            $mod_data = [];
            $now_lrrurs_idx = [];
            foreach ($old_register_data as $key => $row) {
                $mod_data[] = array(
                    'LrsrIdx' => $row['LrsrIdx'],
                    'SeatStatusCcd' => '728003',
                    'IsStatus' => 'N',
                    'UpdMemDatm' => date("Y-m-d H:i:s")
                );

                $now_lrrurs_idx[$row['LrrursIdx']] = $row['LrrursIdx'];
            }
            if($mod_data) $this->_conn->update_batch($this->_table['lectureroom_seat_register'], $mod_data, 'LrsrIdx');
            if ($this->_conn->trans_status() === false) {
                throw new Exception('기존좌석 퇴실 처리에 실패했습니다.');
            }

            //기존 좌석 상태 수정 (미사용)
            $mod_data = [
                'SeatStatusCcd' => '727001',
                'UpdMemIdx' => $this->session->userdata('mem_idx'),
                'UpdMemDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($mod_data)->where_in('LrrursIdx', array_values($now_lrrurs_idx))->where('SeatStatusCcd','727002');
            if($this->_conn->update($this->_table['lectureroom_r_unit_r_seat'])=== false) {
                throw new \Exception('강의실회차 좌석상태 수정에 실패했습니다.');
            }

            //등록
            if ($this->_modifyLectureRoomSeatRegister($form_data, $old_register_data) !== true) {
                throw new \Exception('강의실 좌석 이동에 실패했습니다.');
            }

            //강의실회차좌석정보 상태 업데이트
            if ($this->_modifyLectureRoomUnitSeatForAdd(element('lr_rurs_idx', $form_data)) !== true) {
                throw new \Exception('강의실 좌석 상태 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }*/

    /**
     * 좌석이동 / 로그저장
     * @param array $form_data
     * @return array|bool
     */
    private function _modifyLectureRoomSeatRegister($form_data = [])
    {
        try {
            switch (element('pkg_yn',$form_data)) {
                case 'N' :
                    $arr_lrsr_idx = element('old_lrsr_idx', $form_data);
                    break;
                case "Y" :
                    $arr_lrsr_idx = element('old_arr_lrsr_idx', $form_data);
                    break;
                default :
                    throw new \Exception('정보가 올바르지 않습니다.');
            }

            if (empty($arr_lrsr_idx) === true) {
                throw new \Exception('fail');
            }
            $_arr_lrsr_idx = explode(',',$arr_lrsr_idx);

            $mod_data = [
                'LrCode' => element('lr_code', $form_data),
                'LrUnitCode' => element('lr_unit_code', $form_data),
                'LrrursIdx' => element('lr_rurs_idx', $form_data),
                'UpdMemIdx' => $this->session->userdata('mem_idx'),
                'UpdMemDatm' => date('Y-m-d H:i:s')
            ];
            $this->_conn->set($mod_data)->where_in('LrsrIdx', $_arr_lrsr_idx);
            if($this->_conn->update($this->_table['lectureroom_seat_register'])=== false) {
                throw new \Exception('강의실회차 좌석 수정에 실패했습니다.');
            }

            $log_data = [];
            foreach ($_arr_lrsr_idx as $key => $val) {
                $log_data[] = [
                    'LrCode' => element('lr_code', $form_data),
                    'LrUnitCode' => element('lr_unit_code', $form_data),
                    'SeatStatusCcd' => '728002',
                    'LrrursIdx' => element('lr_rurs_idx', $form_data),
                    'LrsrIdx' => $val,
                    'OrderProdIdx' => element('order_prod_idx', $form_data),
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'BeforeSeatNo' => element('old_seat_no', $form_data),
                    'AfterSeatNo' => element('seat_num', $form_data)
                ];
            }
            if($log_data) $this->_conn->insert_batch($this->_table['lectureroom_log'], $log_data);

            if ($this->_conn->trans_status() === false) {
                throw new Exception('로그저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 친구톡,문자 발송
     * @param $unit_data
     * @return bool
     */
    private function _sendKakao($unit_data)
    {
        try {
            //문자발송
            if($unit_data['data']['IsSmsUse'] == 'Y' && empty($unit_data['data']['SendTel']) === false ) { // 문자발송
                $this->load->loadModels(['crm/smsF']);
                if($this->smsFModel->addKakaoMsg($this->session->userdata('mem_phone')
                        , $unit_data['data']['SmsContent']
                        , $unit_data['data']['SendTel']
                        , null
                        , 'KFT'
                        , null
                        , null) === false) {
                    throw new \Exception('sms fail');
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }
}