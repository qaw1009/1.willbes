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
     * 조건별 회원검색 시도
     * @param array $input
     */
    public function searchMember($input=[])
    {
        $assign_ccd = element('AssignCcd',$input);
        $search_date = element('SearchDate', $input);
        $search_end_date = element('SearchEndDate', $input);
        $search_type = element('SearchType', $input);

        //echo $assign_ccd .' - '.$search_date.' - '.$search_type;exit;

        if($search_type === 'search') {
            $column = ' count(*) AS numrows ';
            $limit = '';
        } else {
            $column = 'A.MemIdx,A.MemId,A.MemName,A.JoinDate';
            $limit = ' limit '. element('MemCnt',$input);
        }

        //기본 테이블
        $from = '
                    from
                        lms_member A
                        join lms_member_otherinfo B on A.MemIdx = B.MemIdx';

        //기본 조건
        $where = ' where 
                        A.IsStatus=\'Y\' And A.IsBlackList=\'N\' 
                        and B.SmsRcvStatus=\'Y\'
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
                            #검색일이 가입일
                            and DATE_FORMAT(A.JoinDate,\'%Y-%m-%d\') =\''.$search_date.'\'    
            
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
                            )';

        } elseif($assign_ccd === '687003') {      // 재수강 ( ‘검색일-30일 <= 수강종료일 <= 검색일+30일’ 회원 중  ‘검색일-30일 <= 결제완료일 <= 검색일+30일' 결제가 존재하지 않는 회원 )
            $where .= ' 
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
                                    and cc.ProdTypeCcd = \'636001\'	#온라인강좌상품
                                    and (dd.RealLecEndDate between DATE_ADD(\''.$search_date.'\', INTERVAL -30 DAY) and DATE_ADD(\''.$search_date.'\', INTERVAL +30 DAY) ) #검색일 기준 -30 +30 사이의 수강죵료면서
                                    and aa.MemIdx not in
                                        (	# 검색일 기준 -30 +30 사이 결제가 있는 사람 추출 후 제외
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
                                                    and p.ProdTypeCcd = \'636001\'	#온라인강좌상품
                                                    and DATE_FORMAT(o.OrderDatm ,\'%Y-%m-%d\') between DATE_ADD(\''.$search_date.'\', INTERVAL -30 DAY) and DATE_ADD(\''.$search_date.'\', INTERVAL +30 DAY) #검색일 기준 -30 +30 사이의 결제가 있는사람
                                        )
                            )';
        } elseif($assign_ccd === '687004') {      // 회수(부재중) ( 상담분류값이 부재중으로 등록된 회원 )

            $where .= ' 
                            /* 검색기간내 부재중으로 등록된 회원 */
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

        } else {
            $where .= ' 1=2 ';
        }

        //$order_by = $this->_conn->makeOrderBy(['A.JoinDate' =>'ASC'])->getMakeOrderBy();
        $order_by = ' Order by rand() ';

        $query = $this->_conn->query('select ' .$column .$from .$where. $order_by. $limit);
        echo $this->_conn->last_query();
        return ($search_type === 'search') ? $query->row(0)->numrows : $query->result_array();
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


            $tm_data = [
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
                            ,B.CcdName as AssignCcd_Name,C.wAdminName';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from 
                        lms_tm A
                        left outer join lms_sys_code B on A.AssignCcd = B.Ccd
                        join wbs_sys_admin C on A.RegAdminIdx = C.wAdminIdx
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
                            ,fn_dec(D.PhoneEnc) as Phone,E.wAdminName
                            ,(select RegDatm from lms_tm_consult aa where aa.taIdx = B.TaIdx order by aa.RegDatm LIMIT 0, 1 ) as LastCousultDate
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
            $column = ' straight_join 
                            o.OrderIdx,o.OrderNo,o.CompleteDatm
                            ,op.OrderProdIdx,op.ProdCode,op.RealPayPrice,op.PayStatusCcd
                            ,s.SiteName
                            ,sc1.CcdName as PayStatusCcd_Name
                            ,p.ProdName
                            ,pl.LearnPatternCcd
                            ,sc2.CcdName as LearnPatternCcd_Name
                            ,m.MemIdx,m.MemId,m.MemName,fn_dec(m.PhoneEnc) as Phone
                            ,mo.SmsRcvStatus
                            ,ps.SalePrice, ps.SaleRate, ps.RealSalePrice
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
                join lms_product_sale ps on op.ProdCode = ps.ProdCode and ps.SaleTypeCcd=\'613001\' and ps.IsStatus=\'Y\'
                
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
                ';

            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
            $result = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
            //echo $this->_conn->last_query();
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
                        , ProdName, RealSalePrice, RealPayPrice, PayStatusCcd_Name, ConsultAdmin_Name, AssignDatm, ConsultDatm';

        $column = ' straight_join 
                        m.MemName, m.MemId, o.OrderNo, s.SiteName, o.CompleteDatm
                        , p.ProdName, ps.RealSalePrice, op.RealPayPrice, sc1.CcdName AS PayStatusCcd_Name, ConsultAdmin_Name, AssignDatm, ConsultDatm';

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
                join lms_product_sale ps on op.ProdCode = ps.ProdCode and ps.SaleTypeCcd=\'613001\' and ps.IsStatus=\'Y\'
                
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
                ';

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        //$sql  = ' select '.$out_column.' from (SELECT @SEQ := 0) A, ( select ' . $column . $from . $where . $order_by_offset_limit .') mm Order by @SEQ DESC';
        $sql  = ' select ' . $column . $from . $where . $order_by_offset_limit ;

        $result = $this->_conn->query($sql);
        //echo $this->_conn->last_query();exit;
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
            $column = ' straight_join
                            o.OrderIdx,o.OrderNo,o.CompleteDatm
                            ,op.OrderProdIdx,op.ProdCode,op.RealPayPrice,op.PayStatusCcd
                            ,opr.RefundPrice,opr.RefundDatm
                            ,s.SiteName
                            ,sc1.CcdName as PayStatusCcd_Name
                            ,p.ProdName
                            ,pl.LearnPatternCcd
                            ,sc2.CcdName as LearnPatternCcd_Name
                            ,m.MemIdx,m.MemId,m.MemName,fn_dec(m.PhoneEnc) as Phone
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
                ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $result = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo $this->_conn->last_query();
        //return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
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

        $out_column = '@SEQ := @SEQ+1 as NO, MemName, MemId, OrderNo, SiteName, CompleteDatm
                        , ProdName, RealPayPrice, RefundPrice, RefundDatm, ConsultAdmin_Name, AssignDatm, ConsultDatm';

        $column = ' straight_join 
                        m.MemName, m.MemId, o.OrderNo, s.SiteName, o.CompleteDatm
                        , p.ProdName, op.RealPayPrice, sc1.CcdName AS PayStatusCcd_Name
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
                        where m.MemIdx = tc.MemIdx and o.CompleteDatm between tc.ConsultDatm and DATE_ADD(tc.ConsultDatm, INTERVAL 21 day) 
                        order by TcIdx desc limit 1
                    )  
            where 
                    o.CompleteDatm is not null 
                    and tc1.TmIdx is not null 
                ';

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $sql  = ' select '.$out_column.' from (SELECT @SEQ := 0) A, ( select ' . $column . $from . $where . $order_by_offset_limit .') mm Order by @SEQ DESC';

        $result = $this->_conn->query($sql);
        //echo $this->_conn->last_query();exit;
        return $result->result_array();
    }

}

