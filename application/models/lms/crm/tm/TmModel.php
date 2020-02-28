<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TmModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }


    /**
     * TM 담당자 추출
     * @param $add_condition
     * @return mixed
     */
    public function listAdmin($add_condition=[])
    {
        $column = 'A.wAdminIdx,A.wAdminId,A.wAdminName,C.RoleName';

        $from = '
            from
                wbs_sys_admin A
                join lms_sys_admin_r_admin_role B on A.wAdminIdx = B.wAdminIdx and B.IsStatus=\'Y\'
                join lms_sys_admin_role C on B.RoleIdx = C.RoleIdx
            where A.wIsStatus=\'Y\' and C.IsStatus=\'Y\'
        ';

        $arr_condition = array_merge_recursive($add_condition,[
            'EQ' => [
                'A.wIsApproval'=>'Y',
                'A.wIsUse'=>'Y'
            ]
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy(['A.wAdminName' =>'ASC'])->getMakeOrderBy();

        $query = $this->_conn->query('select ' .$column .$from .$where. $order_by)->result_array();
        //echo $this->_conn->last_query();
        return $query;
    }

    /**
     * 수동배정을 위한 회원검색 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function searchMemberManual($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'A.MemIdx,A.MemId,A.MemName,fn_dec(PhoneEnc) as Phone,A.JoinDate,B.InterestCode,C.CcdName as Interest_Name,A.IsBlackList,B.SmsRcvStatus';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        lms_member A 
                        join lms.lms_member_otherinfo B on A.MemIdx = B.MemIdx
                        left outer join lms_sys_code C on B.InterestCode = C.Ccd
                    where 
                        A.IsStatus IN (\'Y\',\'D\') 
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by_offset_limit);
        //echo $this->_conn->last_query();
        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }



    /**
     * 조건별 회원검색 시도
     * @param array $input
     */
    public function searchMember($input=[])
    {
        $interest_ccd = element('InterestCcd',$input);
        $assign_ccd = element('AssignCcd',$input);
        $search_date = element('SearchDate', $input);
        $search_end_date = element('SearchEndDate', $input);
        $search_type = element('SearchType', $input);

        //echo $assign_ccd .' - '.$search_date.' - '.$search_type;exit;

        if($search_type === 'search') {
            $column = ' straight_join count(*) AS numrows ';
            $limit = '';
        } else {
            $column = 'straight_join A.MemIdx,A.MemId,A.MemName,A.JoinDate';
            $limit = ' limit '. element('MemCnt',$input);
        }

        //기본 테이블
        $from = '
                    from
                        lms_member A
                        join lms_member_otherinfo B on A.MemIdx = B.MemIdx
                    ';

        //기본 조건
        $where = ' where 
                        A.IsStatus=\'Y\' 
                        and A.IsBlackList=\'N\'
                        and B.SmsRcvStatus=\'Y\'
                        and B.InterestCode=\''. $interest_ccd .'\'
                        # btob 회원이 아닌 회원
                        and A.MemIdx not in
                        (
                            select MemIdx from lms_btob_r_member where IsStatus=\'Y\'
                        )
                     ';

        if($assign_ccd === '687001' || $assign_ccd === '687002' || $assign_ccd === '687004' ) {

            $where .= '
                            # 30일이내 배정여부 확인   
                            and A.MemIdx not in
                            (
                                select 
                                ta.MemIdx
                                from
                                    lms_tm t
                                    join lms_tm_assign ta on t.TmIdx = ta.TmIdx
                                where 
                                        t.IsStatus=\'Y\' and ta.IsStatus=\'Y\'
                                        AND DATE_FORMAT(t.regDatm,\'%Y-%m-%d\') 
                                                BETWEEN  DATE_FORMAT(DATE_ADD(NOW(), INTERVAL -30 DAY),\'%Y-%m-%d\') AND DATE_FORMAT(NOW(),\'%Y-%m-%d\') 
                            )';

        } else if($assign_ccd === '687003'){

            $where .= '
                            #재수강의 경우 배정 내역이 없어야 함
                            and A.MemIdx not in
                            (
                                select 
                                ta.MemIdx
                                from
                                    lms_tm t
                                    join lms_tm_assign ta on t.TmIdx = ta.TmIdx
                                where 
                                        t.IsStatus=\'Y\' and ta.IsStatus=\'Y\'
                             )';
        }

        if($assign_ccd === '687001') {      // 신규 (온라인강좌 상품 주문이력이 없고, 장바구니에도 온라인강좌 상품이 없어야 함)
            $where .= ' 
                            #검색일이 가입일
                            and DATE_FORMAT(A.JoinDate,\'%Y-%m-%d\') =\''.$search_date.'\'    
                            
                            #온라인강좌 상품 주문 이력이 없어야 함.
                            and A.MemIdx not in	
                            ( 
                                select 
                                aa.MemIdx
                                from
                                    lms_order aa
                                    join lms_order_product bb on aa.OrderIdx = bb.OrderIdx
                                    join lms_product cc on bb.ProdCode = cc.ProdCode
                                where 
                                        aa.PayRouteCcd in (\'670001\',\'670002\',\'670005\') #온라인결제(PG사), 학원방문결제, 제휴사결제 (0원결제,무료결제 제외)
                                        and bb.SalePatternCcd in (\'694001\',\'694002\',\'694003\')	#일반/재수강/수강연장 인것
                                        #and bb.PayStatusCcd = \'676001\'	#주문이력이 있는 것들은 죄다..
                                        and cc.ProdTypeCcd = \'636001\'	#온라인강좌상품
                                        and bb.RealPayPrice > 0                #0원이상 결제 건 : 2019-04-24 김상구 실장님 요청
                                group by aa.MemIdx
                            )
                            
                            #장바구니에 담긴 온라인강좌 상품이 없어야 함.
                            and A.MemIdx not in 
                            ( 
                                select 
                                aa.MemIdx
                                from
                                    lms_cart aa
                                    join lms_product bb on aa.ProdCode = bb.ProdCode
                                where 
                                    aa.IsDirectPay=\'N\' and aa.IsVisitPay=\'N\' and aa.IsStatus=\'Y\' and isnull(aa.ConnOrderIdx)
                                    and aa.SalePatternCcd in (\'694001\',\'694002\',\'694003\')	#일반/재수강/수강연장 인것
                                    and DATE_FORMAT(aa.ExpireDatm ,\'%Y-%m-%d\') >= DATE_FORMAT(NOW() ,\'%Y-%m-%d\')	#소멸일자는 현재날짜보다 같거나 크고
                                    and bb.IsStatus=\'Y\' and bb.IsUse=\'Y\'
                                    and bb.ProdTypeCcd = \'636001\'	#온라인강좌상품
                            )
                        ';

        } elseif($assign_ccd === '687002') {      // #장바구니에 온라인 상품이 존재해야 함
            $where .= ' 
                            #검색일이 가입일 --> 제거 2019.06.14 김상구 실장님, 최의식 차장님 협의
                            #and DATE_FORMAT(A.JoinDate,\'%Y-%m-%d\') =\''.$search_date.'\'
                            #검색일이 장바구니 등록일.
                            and A.MemIdx in 
                            ( 
                                select 
                                    aa.MemIdx
                                from
                                    lms_cart aa
                                    join lms_product bb on aa.ProdCode = bb.ProdCode
                                where 
                                    aa.IsDirectPay=\'N\' and aa.IsVisitPay=\'N\' and aa.IsStatus=\'Y\' and isnull(aa.ConnOrderIdx)
                                    and aa.SalePatternCcd in (\'694001\',\'694002\',\'694003\')	#일반/재수강/수강연장 인것
                                    and DATE_FORMAT(aa.ExpireDatm ,\'%Y-%m-%d\') >= DATE_FORMAT(NOW() ,\'%Y-%m-%d\')	#소멸일자는 현재날짜보다 같거나 크고
                                    and bb.IsStatus=\'Y\' and bb.IsUse=\'Y\'
                                    and bb.ProdTypeCcd = \'636001\'	#온라인강좌상품
                                    and DATE_FORMAT(aa.RegDatm,\'%Y-%m-%d\') =\''.$search_date.'\'    
                            )
                            ';

        } elseif($assign_ccd === '687003') {      // 재수강 ( ‘검색일-30일 <= 수강종료일 <= 검색일+30일’ 회원 중  ‘검색일-30일 <= 결제완료일 <= 검색일+30일' 결제가 존재하지 않는 회원 )
            $where .= ' 
                            #2018년1월1일 이후 가입자 조건 추가 : 2019.06.14 김상구 실장님 협의
                            and DATE_FORMAT(A.JoinDate,\'%Y-%m-%d\') >= \'2018-01-01\'
            
                            and A.MemIdx in
                            (
                                select
                                aa.MemIdx
                                from
                                    lms_order aa
                                    join lms_order_product bb on aa.OrderIdx = bb.OrderIdx
                                    join lms_product cc on bb.ProdCode = cc.ProdCode
                                    join lms_my_lecture dd on bb.OrderProdIdx =  dd.OrderProdIdx
                                where 
                                    aa.PayRouteCcd in (\'670001\',\'670002\',\'670005\') #온라인결제(PG사), 학원방문결제, 제휴사결제
                                    and bb.PayStatusCcd = \'676001\'	#결제완료
                                    and bb.SalePatternCcd in (\'694001\',\'694002\',\'694003\')	#일반/재수강/수강연장 인것
                                    and bb.RealPayPrice > 0                 #0원이상 결제 건 : 2019-04-24 김상구 실장님 요청
                                    and cc.ProdTypeCcd = \'636001\'	#온라인강좌상품
                                    #and (dd.RealLecEndDate between DATE_ADD(\''.$search_date.'\', INTERVAL -30 DAY) and DATE_ADD(\''.$search_date.'\', INTERVAL +30 DAY) ) #검색일 기준 -30 +30 사이의 수강죵료면서 -> 주석 2019-06-17 최의식 차장님 요청
                                    and dd.RealLecEndDate = DATE_ADD(\''.$search_date.'\', INTERVAL -30 DAY)  #2019-06-17 최의식 차장님 요청 -> 검색일 기준 -30일이 수강종료일이며
                                    and aa.MemIdx not in
                                        (	# 검색일 기준 -30 +30 사이 결제가 있는 사람 추출 후 제외 -> 변경 :  2019-06-17 최의식 차장님 요청 검색일 기준 -30 부터 검색일 사이 유료결제가 있는 사람 추출 후 제외
                                            select 
                                                o.MemIdx
                                            from
                                                lms_order o
                                                join lms_order_product op on o.OrderIdx = op.OrderIdx
                                                join lms_product p on op.ProdCode = p.ProdCode
                                            where 
                                                    o.PayRouteCcd in (\'670001\',\'670002\',\'670005\') #온라인결제(PG사), 학원방문결제, 제휴사결제
                                                    and op.PayStatusCcd = \'676001\'	#결제완료
                                                    and op.SalePatternCcd in (\'694001\',\'694002\',\'694003\')	#일반/재수강/수강연장 인것
                                                    and op.RealPayPrice > 0             #0원이상 결제 건 : 2019-04-24 김상구 실장님 요청
                                                    and p.ProdTypeCcd = \'636001\'	#온라인강좌상품
                                                    #and DATE_FORMAT(o.OrderDatm ,\'%Y-%m-%d\') between DATE_ADD(\''.$search_date.'\', INTERVAL -30 DAY) and DATE_ADD(\''.$search_date.'\', INTERVAL +30 DAY) #검색일 기준 -30 +30 사이의 결제가 있는사람
                                                    and DATE_FORMAT(o.OrderDatm ,\'%Y-%m-%d\') between DATE_ADD(\''.$search_date.'\', INTERVAL -30 DAY) and \''.$search_date.'\' #검색일 기준 -30 + 검색일 사이의 결제가 있는사람
                                        )
                            )';
        } elseif($assign_ccd === '687004') {      // 회수(부재중) ( 상담분류값이 부재중으로 등록된 회원 )
            /* 기존 쿼리 조건
                $where .= '
                            ///* 검색기간내 부재중으로 등록된 회원
                            and A.MemIdx in
                            (
                                select
                                tta.MemIdx
                                from
                                    lms_tm tt
                                    join lms_tm_assign tta on tt.TmIdx = tta.TmIdx
                                    join lms_tm_consult ttc on tta.TaIdx = ttc.TaIdx
                                where
                                    tt.IsStatus=\'Y\' and tta.IsStatus=\'Y\' and ttc.IsStatus=\'Y\'
                                    and ttc.TmClassCcd = \'689003\'
                                    and DATE_FORMAT(ttc.RegDatm,\'%Y-%m-%d\') between \''.$search_date.'\' and \''.$search_end_date.'\'
                            )';
            */

            /*
             * 조건 수정 : 2020.01.17 최의식 차장님 요청건ㅁㅇㄹ
             * 수정 내용 : 부재중으로 검색된 데이터에서 이후 통화기록이 없는 회원을 대상으로 함
             *               2건이상의 통화이력이 존재할경우 최초 통화일 기준으로 이후 데이터 존재여부로 판단함.
             * 예 : 회원아이디 aaaa, 부재중으로 등록, 2020.01.01
             *       회원아이디 aaaa, 부재중으로 등록, 2020.01.03
             *       결과 - 2건 모두 부재중 조건으로 추출되면 안됨. (검색기간 2020.01.01 ~ 2020.01.03 또는 2020.01.03 ~ 2020.01.03 모두)
             * */
                $where .= '
                    and A.MemIdx in
                    (
                        select top_mm.MemIdx
                        from 
                        (
                            select 
                                *
                                ,
                                (
                                    select 
                                        count(*) 
                                    from 
                                        lms_tm_assign sa
                                        join lms_tm_consult sb on sa.TaIdx = sb.TaIdx
                                    where sa.IsStatus=\'Y\' and sb.IsStatus=\'Y\'
                                        and sa.MemIdx = mm.MemIdx and sb.RegDatm > mm.first_regdatm
                                ) as over_cnt
                            from
                                (
                                    select 
                                        tta.taIdx,tta.MemIdx,ttc.TcIdx,ttc.RegDatm
                                        ,(
                                            select 
                                                b.RegDatm
                                            from 
                                                lms_tm_consult b 
                                            where tta.TaIdx = b.TaIdx and b.IsStatus=\'Y\' order by b.RegDatm asc limit 1
                                        ) as first_regdatm
                                    from 
                                        lms_tm tt	
                                        join lms_tm_assign tta on tt.TmIdx = tta.TmIdx
                                        join lms_tm_consult ttc on tta.TaIdx = ttc.TaIdx
                                    where
                                        tt.IsStatus=\'Y\' and tta.IsStatus=\'Y\' and ttc.IsStatus=\'Y\'
                                        and ttc.TmClassCcd = \'689003\'
                                        and DATE_FORMAT(ttc.RegDatm,\'%Y-%m-%d\') between \''.$search_date.'\' and \''.$search_end_date.'\'
                                ) mm
                        ) top_mm 
                        join lms_member m on top_mm.MemIdx = m.MemIdx
                        where over_cnt=0
                    )
                ';


        } else {
            $where .= ' 1=2 ';
        }

        $order_by = ' Order by rand() ';

        $query = $this->_conn->query('select ' .$column .$from .$where. $order_by. $limit);
        //echo $this->_conn->last_query();
        return ($search_type === 'search') ? $query->row(0)->numrows : $query->result_array();
    }


    /**
     * 회원 수동 배정 처리
     * @param array $input
     * @return array|bool
     */
    public function assignMemberManual($input=[])
    {
        $this->_conn->trans_begin();

        try {

            $MemIdx = element('MemIdx',$input);

            if (empty($MemIdx)) {
                throw new \Exception('배정할 회원이 존재하지 않습니다.');
            }

            //tm 배정 테이블
            $tm_data = [
                'InterestCcd' => element('_InterestCcd',$input),
                'AssignCcd' => element('_AssignCcd',$input),
                'SearchDate' => date("Y-m-d"),
                'SearchEndDate' => element('SearchEndDate',$input,null),
                //'MemCnt' => count($MemIdx),
                'MemCnt' => '1',
                'AssignType' => '수동',
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($tm_data)->insert('lms_tm') === false) {
                throw new \Exception('TM 배정 등록에 실패했습니다.');
            }

            $TmIdx = $this->_conn->insert_id();

            $input_data = [
                'TmIdx' => $TmIdx,
                'AssignAdminIdx' => element('_wAdminIdx',$input),
                'MemIdx' => $MemIdx
            ];

            if($this->_conn->set($input_data)->insert('lms_tm_assign') === false) {
                throw new \Exception("회원 배정시 오류가 발생되었습니다.");
            }

            //$this->_conn->trans_rollback();
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $TmIdx];
    }

    /**
     * 회원배정 처리
     * @param array $input
     * @return array|bool
     */
    public function assignMember($input=[])
    {
        $this->_conn->trans_begin();

        try {
            $memList = $this->searchMember($input);

            if (empty($memList)) {
                throw new \Exception('배정할 회원이 존재하지 않습니다.');
            }

            $MemCnt = element('MemCnt',$input,0);
            $wAdminIdx = element('wAdminIdx',$input);
            $eachCnt = element('eachCnt',$input);

            //tm 배정 테이블
            $tm_data = [
                'InterestCcd' => element('InterestCcd',$input),
                'AssignCcd' => element('AssignCcd',$input),
                'SearchDate' => element('SearchDate',$input),
                'SearchEndDate' => element('SearchEndDate',$input,null),
                'MemCnt' => $MemCnt,
                //'AssignInfo' => element('AssignCcd',$input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($tm_data)->insert('lms_tm') === false) {
                throw new \Exception('TM 배정 등록에 실패했습니다.');
            }

            $TmIdx = $this->_conn->insert_id();

            //echo var_dump($memList);exit;

            $total_cnt = $MemCnt;
            $start_cnt = 0;

            for($i=0;$i<count($wAdminIdx);++$i){

                $input_data = [
                    'TmIdx' => $TmIdx,
                    'AssignAdminIdx' => $wAdminIdx[$i],
                ];

                $start_cnt = $MemCnt - $total_cnt;
                $end_cnt = $start_cnt + $eachCnt[$i];

                for($k=$start_cnt;$k<$end_cnt;$k++) {
                    $input_data = array_merge($input_data,[
                        'MemIdx' => $memList[$k]['MemIdx']
                    ]);

                    if($this->_conn->set($input_data)->insert('lms_tm_assign') === false) {
                        throw new \Exception("회원 배정시 오류가 발생되었습니다.");
                    }
                    $total_cnt -= 1;
                    //echo $this->_conn->last_query().'\n\n';
                }
            }

            //$this->_conn->trans_rollback();
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $TmIdx];
    }

    /**
     * Tm 배정 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listTm($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'A.*, Date_format(A.RegDatm,\'%Y-%m-%d\') as RegDate
                            ,IFNULL(A.SearchDate, A.SearchDate+\'~\'+A.SearchEndDate) as SearchPeriod
                            ,B.CcdName as AssignCcd_Name,C.wAdminName,D.CcdName As InterestCcd_Name
                            ,(select count(*) from lms_tm_assign where TmIdx = A.TmIdx) as AssignCnt
                            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from 
                        lms_tm A
                        left outer join lms_sys_code B on A.AssignCcd = B.Ccd
                        join wbs_sys_admin C on A.RegAdminIdx = C.wAdminIdx
                        left outer join lms_sys_code D on A.InterestCcd = D.Ccd
                    where A.IsStatus=\'Y\'
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by_offset_limit);
        //var_dump($result);exit;
        //echo $this->_conn->last_query();
        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 배정 정보 추출
     * @param $tm_idx
     * @return mixed
     */
    public function findTm($tm_idx)
    {
        $arr_condition = [
            'EQ' => [
                'A.TmIdx'=>$tm_idx
            ]
        ];

        $query = $this->listTm(false,$arr_condition, $limit = null, $offset = null, $order_by = []);

        if(empty($query) == false) {
            return $query[0];
        } else {
            return $query;
        }
    }

    /**
     * 배정회원 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAssignMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = ' straight_join  
                            A.TmIdx,A.RegDatm,Date_format(A.RegDatm,\'%Y-%m-%d\') as RegDate, B.TaIdx,AssignAdminIdx
                            ,B.MemIdx,C.CcdName as AssignCcd_Name,D.MemId,D.MemName
                            #,fn_dec(D.PhoneEnc) as Phone
                            ,concat(D.Phone1,\'****\',D.Phone3) as Phone
                            ,E.wAdminName
                            #,(select RegDatm from lms_tm_consult aa where aa.taIdx = B.TaIdx  And aa.IsStatus=\'Y\' order by aa.RegDatm desc LIMIT 0, 1 ) as LastCousultDate
                            ,(select RegDatm from lms_tm_consult aa where aa.taIdx = B.TaIdx And aa.IsStatus=\'Y\' order by aa.TaIdx desc LIMIT 1 ) as LastCousultDate
                            ,F.CcdName As InterestCcd_Name
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from lms_tm A
                            join lms_tm_assign B on A.TmIdx = B.TmIdx
                            join lms_sys_code C on A.AssignCcd = C.Ccd
                            join lms_member D on B.MemIdx = D.MemIdx
                            join wbs_sys_admin E on B.AssignAdminIdx = E.wAdminIdx
                            left outer join lms_sys_code F on A.InterestCcd = F.Ccd
                    where A.IsStatus=\'Y\' and B.IsStatus=\'Y\' ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by_offset_limit);
        //var_dump($result);exit;
        //echo $this->_conn->last_query();
        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 상담목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listConsult($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = ' straight_join 
                A.TmIdx,A.RegDatm,Date_format(A.RegDatm,\'%Y-%m-%d\') as RegDate,A.AssignCcd
                 ,B.MemIdx
                 ,C.CcdName as AssignCcd_Name
                 ,D.TmContent,D.RegDatm as writeDate
                 ,E.CcdName as ConsultCcd_Name
                 ,F.CcdName as TmClassCcd_Name
                 ,G.wAdminName as RegAdminName
                 ,H.CcdName as AssignCcd_Name ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from
                lms_tm A
                join lms_tm_assign B on A.TmIdx = B.TmIdx
                join lms_sys_code C on A.AssignCcd = C.Ccd
                join lms_tm_consult D on B.TaIdx = D.TaIdx
                join lms_sys_code E on D.ConsultCcd = E.Ccd
                join lms_sys_code F on D.TmClassCcd = F.Ccd
                join wbs_sys_admin G on D.RegAdminIdx = G.wAdminIdx
                join lms_sys_code H on A.AssignCcd = H.Ccd
            where A.IsStatus=\'Y\' and B.IsStatus=\'Y\' and C.IsStatus=\'Y\' ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by_offset_limit);
        //var_dump($result);exit;
        //echo $this->_conn->last_query();
        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }


    /**
     * 상담등록
     * @param array $input
     * @return array|bool
     */
    public function addConsult($input=[])
    {
        try {
            //통화로 등록시 해당 회원이 21일이내 '통화' 이력 있는지 확인
            if(element('_reg_TmClassCcd',$input) === '689001') {

                $memidx = element('MemIdx', $input);

                $from = ' from vw_tm_consult where Now() <= DATE_ADD(ConsultDatm, INTERVAL 21 day) '; //21일내 '통화' 내역 존재 여부
                $where = $this->_conn->makeWhere(['EQ' => ['MemIdx' => $memidx]])->getMakeWhere(true);

                $checkCount = $this->_conn->query('select count(*) as chechcount ' . $from . $where)->row_array();

                if ($checkCount['chechcount'] > 0) {
                    throw new \Exception("21일전에 '통화' 로 등록된 상담 내역이 존재합니다. \n\n22일 이후부터 '통화' 로 등록 가능합니다.");
                }
            }
            $input_data = [
                'TaIdx' => element('TaIdx',$input),
                'ConsultCcd' => element('_reg_ConsultCcd',$input),
                'TmClassCcd' => element('_reg_TmClassCcd',$input),
                'TmContent' => element('_reg_TmContent',$input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($input_data)->insert('lms_tm_consult') === false) {
                throw new \Exception('상담 등록에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 결제내역
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listOrder($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows, ifnull(sum(op.RealPayPrice),0) as sum_price';
            $order_by_offset_limit = '';
        } else {
            $column = '  
                            o.OrderIdx,o.OrderNo,o.CompleteDatm
                            ,op.OrderProdIdx,op.ProdCode,op.RealPayPrice,op.PayStatusCcd
                            ,s.SiteName
                            ,sc1.CcdName as PayStatusCcd_Name
                            ,p.ProdName
                            ,pl.LearnPatternCcd
                            ,sc2.CcdName as LearnPatternCcd_Name
                            ,m.MemIdx,m.MemId,m.MemName
                            #,fn_dec(m.PhoneEnc) as Phone
                            ,concat(m.Phone1,\'****\',m.Phone3) as Phone
                            ,mo.SmsRcvStatus
                            ,ifnull(ps.SalePrice,0) as SalePrice, ifnull(ps.SaleRate,0) as SaleRate, ifnull(ps.RealSalePrice,0) as RealSalePrice
                            ,tc1.* ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from
                lms_order o
                join lms_order_product op on o.OrderIdx = op.OrderIdx
                join lms_site s on o.SiteCode = s.SiteCode
                join lms_sys_code sc1 on op.PayStatusCcd = sc1.Ccd
                join lms_product p on op.ProdCode = p.ProdCode
                join lms_product_lecture pl on p.ProdCode = pl.ProdCode
                join lms_sys_code sc2 on pl.LearnPatternCcd = sc2.Ccd 
                join lms_member m on op.MemIdx = m.MemIdx
                join lms_member_otherinfo mo on m.MemIdx = mo.MemIdx
                left join lms_product_sale ps on op.ProdCode = ps.ProdCode and ps.SaleTypeCcd=\'613001\' and ps.IsStatus=\'Y\'
                
                left join vw_tm_consult tc1 
                on tc1.TcIdx = 
                    (
                        select tc.TcIdx from vw_tm_consult tc 
                        where m.MemIdx = tc.MemIdx and o.CompleteDatm between tc.ConsultDatm and DATE_ADD(tc.ConsultDatm, INTERVAL 21 day) 
                        order by TcIdx desc limit 1
                    )  
            where 
                    o.CompleteDatm is not null 
                    and tc1.TmIdx is not null
                    and ('. $this->_getCommonCondition() .')
                ';
                /*
                    and ((p.sitecode = '2001' AND pl.LearnPatternCcd = '615001') OR (p.sitecode IN ('2003','2005','2006','2007','2008','2009') AND pl.LearnPatternCcd IN ('615001','615002','615003','615004')))
                */

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $result = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo $this->_conn->last_query();exit;
        //return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
        return ($is_count === true) ? $result->row_array() : $result->result_array();
    }

    /**
     * 결제내역 - 엑셀
     * @param array $arr_condition
     * @param array $order_by
     * @return mixed
     */
    public function listOrderExcel($arr_condition = [], $order_by = [])
    {

        $out_column = '@SEQ := @SEQ+1 as NO, MemName, MemId, OrderNo, SiteName, CompleteDatm
                        ,sc2.CcdName as LearnPatternCcd_Name, ProdName, ifnull(ps.RealSalePrice,0) RealSalePrice, RealPayPrice, PayStatusCcd_Name, ConsultAdmin_Name, AssignDatm, ConsultDatm';

        $column = '  
                        m.MemName, m.MemId, o.OrderNo, s.SiteName, o.CompleteDatm
                        ,sc2.CcdName as LearnPatternCcd_Name, p.ProdName, ifnull(ps.RealSalePrice,0) RealSalePrice, op.RealPayPrice, sc1.CcdName AS PayStatusCcd_Name, ConsultAdmin_Name, AssignDatm, ConsultDatm';

        $from = '
            from
                lms_order o
                join lms_order_product op on o.OrderIdx = op.OrderIdx
                join lms_site s on o.SiteCode = s.SiteCode
                join lms_sys_code sc1 on op.PayStatusCcd = sc1.Ccd
                join lms_product p on op.ProdCode = p.ProdCode
                join lms_product_lecture pl on p.ProdCode = pl.ProdCode
                join lms_sys_code sc2 on pl.LearnPatternCcd = sc2.Ccd 
                join lms_member m on op.MemIdx = m.MemIdx
                join lms_member_otherinfo mo on m.MemIdx = mo.MemIdx
                left join lms_product_sale ps on op.ProdCode = ps.ProdCode and ps.SaleTypeCcd=\'613001\' and ps.IsStatus=\'Y\'
                
                left join vw_tm_consult tc1 
                on tc1.TcIdx = 
                    (
                        select tc.TcIdx from vw_tm_consult tc 
                        where m.MemIdx = tc.MemIdx and o.CompleteDatm between tc.ConsultDatm and DATE_ADD(tc.ConsultDatm, INTERVAL 21 day) 
                        order by TcIdx desc limit 1
                    )  
            where 
                    o.CompleteDatm is not null 
                    and tc1.TmIdx is not null 
                    and ('. $this->_getCommonCondition() .')
                ';
                //and ( (p.sitecode = '2001' AND pl.LearnPatternCcd = '615001') OR (p.sitecode = '2003' AND pl.LearnPatternCcd IN ('615001','615002','615003','615004') ))

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $sql  = ' select ' . $column . $from . $where . $order_by_offset_limit ;

        $result = $this->_conn->query($sql);
        return $result->result_array();
    }


    /**
     * 환불내역
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listRefundOrder($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows, ifnull(sum(op.RealPayPrice),0) as sum_price, ifnull(sum(op.RealPayPrice),0) as sum_refund_price';   // ifnull(sum(opr.RefundPrice),0) as sum_refund_price
            $order_by_offset_limit = '';
        } else {
            $column = ' 
                            o.OrderIdx,o.OrderNo,o.CompleteDatm
                            ,op.OrderProdIdx,op.ProdCode,op.RealPayPrice,op.PayStatusCcd
                            ,opr.RefundPrice,opr.RefundDatm
                            ,s.SiteName
                            ,sc1.CcdName as PayStatusCcd_Name
                            ,p.ProdName
                            ,pl.LearnPatternCcd
                            ,sc2.CcdName as LearnPatternCcd_Name
                            ,m.MemIdx,m.MemId,m.MemName
                            #,fn_dec(m.PhoneEnc) as Phone
                            ,concat(m.Phone1,\'****\',m.Phone3) as Phone
                            ,mo.SmsRcvStatus
                            ,tc1.* ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from
                lms_order o
                join lms_order_product op on o.OrderIdx = op.OrderIdx
                join lms_order_product_refund opr on opr.OrderProdIdx = op.OrderProdIdx
                join lms_site s on o.SiteCode = s.SiteCode
                join lms_sys_code sc1 on op.PayStatusCcd = sc1.Ccd
                join lms_product p on op.ProdCode = p.ProdCode
                join lms_product_lecture pl on p.ProdCode = pl.ProdCode
                join lms_sys_code sc2 on pl.LearnPatternCcd = sc2.Ccd 
                join lms_member m on op.MemIdx = m.MemIdx
                join lms_member_otherinfo mo on m.MemIdx = mo.MemIdx
                
                left join vw_tm_consult tc1 
                on tc1.TcIdx = 
                    (
                        select tc.TcIdx from vw_tm_consult tc 
                        where m.MemIdx = tc.MemIdx and opr.RefundDatm between tc.ConsultDatm and DATE_ADD(tc.ConsultDatm, INTERVAL 30 day) 
                        order by TcIdx desc limit 1
                    )  
            where 
                    o.CompleteDatm is not null 
                    and tc1.TmIdx is not null
                    and ('. $this->_getCommonCondition() .')             
                ';
                //and ( (p.sitecode = '2001' AND pl.LearnPatternCcd = '615001') OR (p.sitecode = '2003' AND pl.LearnPatternCcd IN ('615001','615002','615003','615004') ))
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $result = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $result->row_array() : $result->result_array();
    }


    /**
     * 환불내역 - 엑셀
     * @param array $arr_condition
     * @param array $order_by
     * @return mixed
     */
    public function listOrderRefundExcel($arr_condition = [], $order_by = [])
    {
        $column = '  
                        m.MemName, m.MemId, o.OrderNo, s.SiteName, o.CompleteDatm
                        ,sc2.CcdName as LearnPatternCcd_Name, p.ProdName, op.RealPayPrice
                        , CONCAT(\'-\',op.RealPayPrice) AS RefundPrice , opr.RefundDatm, ConsultAdmin_Name, AssignDatm, ConsultDatm';

        $from = '
            from
                lms_order o
                join lms_order_product op on o.OrderIdx = op.OrderIdx
                join lms_order_product_refund opr on opr.OrderProdIdx = op.OrderProdIdx
                join lms_site s on o.SiteCode = s.SiteCode
                join lms_sys_code sc1 on op.PayStatusCcd = sc1.Ccd
                join lms_product p on op.ProdCode = p.ProdCode
                join lms_product_lecture pl on p.ProdCode = pl.ProdCode
                join lms_sys_code sc2 on pl.LearnPatternCcd = sc2.Ccd 
                join lms_member m on op.MemIdx = m.MemIdx
                join lms_member_otherinfo mo on m.MemIdx = mo.MemIdx
                
                left join vw_tm_consult tc1 
                on tc1.TcIdx = 
                    (
                        select tc.TcIdx from vw_tm_consult tc 
                        where m.MemIdx = tc.MemIdx and opr.RefundDatm between tc.ConsultDatm and DATE_ADD(tc.ConsultDatm, INTERVAL 30 day) 
                        order by TcIdx desc limit 1
                    )  
            where 
                    o.CompleteDatm is not null 
                    and tc1.TmIdx is not null
                    and ('. $this->_getCommonCondition() .')
                ';
                //and ( (p.sitecode = '2001' AND pl.LearnPatternCcd = '615001') OR (p.sitecode = '2003' AND pl.LearnPatternCcd IN ('615001','615002','615003','615004') ))

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $sql  = ' select ' . $column . $from . $where . $order_by_offset_limit ;

        $result = $this->_conn->query($sql);
        return $result->result_array();
    }

    private function _getCommonCondition()
    {
        return '(p.sitecode = \'2001\' AND pl.LearnPatternCcd = \'615001\') 
                  OR 
                  (p.sitecode IN (\'2003\',\'2005\',\'2006\',\'2007\',\'2008\',\'2009\') AND pl.LearnPatternCcd IN (\'615001\',\'615002\',\'615003\',\'615004\'))';
    }
}