<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class MisStatsOrderModel extends BaseOrderModel
{
    private $_gathering_table = [
        'mis_stats_order' => 'gathering.mis_stats_order'
    ];
    private $_app_name = [
        'WILL' => '통합',
        'NJOB' => 'N잡',
        'OLLA' => '경찰공제회&OLLA',
    ];
    private $_app_order = [
        'WILL' => '1',
        'NJOB' => '2',
        'OLLA' => '3',
    ];
    public $_lg_group_name = [
        'A1' => '학원운영1팀',
        'WC' => 'WCA팀',
        'A2' => '학원운영2팀',
        'MI' => '경영정보팀',
    ];
    private $_lg_group_order = [
        'A1' => '1',
        'WC' => '2',
        'A2' => '3',
        'MI' => '4',
    ];
    private $_olla_cate_name = '경찰승진';
    private $_etc_name = '미분류';

    /**
     * 경영정보 매출통계 조회
     * @param string $lg_group_code [대분류코드 (all, A1, A2, WC, MI)]
     * @param string $start_date [조회시작일자]
     * @param string $end_date [조회종료일자]
     * @param string $column
     * @param array $arr_condition
     * @return mixed
     */
    public function listDeptStats($lg_group_code, $start_date, $end_date, $column = '*', $arr_condition = [])
    {
        $start_datm = $start_date . ' 00:00:00';
        $end_datm = $end_date . ' 23:59:59';
        $add_column = '';
        $add_in_column = '';
        $add_order_by = '';

        if ($lg_group_code == 'all') {
            $add_group_by = ' with rollup';
        } else {
            $arr_condition['EQ']['TA.LgGroupCode'] = $lg_group_code;
            $add_column = ', substring(TU.SmGroupOrdName, 3) as SmGroupName';
            $add_in_column = ', TA.SmGroupCode, max(TA.SmGroupOrdName) as SmGroupOrdName';
            $add_group_by = ', TA.SmGroupCode';
            $add_order_by = ', SmGroupOrdName';
        }

        $from = '
            from (
        	    select TU.*
		            , substring(TU.LgGroupOrdName, 3) as LgGroupName
		            , substring(TU.MdGroupOrdName, 3) as MdGroupName
                    ' . $add_column . '		            
                from (
                    select ifnull(TA.LgGroupCode, "_LGT") as LgGroupCode
                        , ifnull(TA.MdGroupCode, "_MDT") as MdGroupCode
                        , sum(TA.RealPayPrice) as RealPayPrice
                        , sum(TA.RefundPrice) as RefundPrice	
                        , sum(TA.RealPayPrice - TA.RefundPrice) as RemainPrice
                        , if(TA.LgGroupCode is null, "9:합계", max(TA.LgGroupOrdName)) as LgGroupOrdName
                        , if(TA.LgGroupCode is null, "", if(TA.MdGroupCode is null, "9:소계", max(TA.MdGroupOrdName))) as MdGroupOrdName
                        ' . $add_in_column . '			        
                    from (
                        ' . $this->_getListFrom() . '
                    ) as TA
                    ' . $this->_conn->makeWhere($arr_condition)->getMakeWhere(false) . '
                    group by TA.LgGroupCode, TA.MdGroupCode' . $add_group_by . '
                ) as TU
            ) as U	
            order by LgGroupOrdName, MdGroupOrdName' . $add_order_by . '                
        ';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from, [$start_datm, $end_datm])->result_array();
    }

    /**
     * 경영정보 매출통계 조회 from절 리턴
     * @return string
     */
    private function _getListFrom()
    {
        // 학원운영1팀 공무원 카테고리 (7급PSAT, 7급전문(공무원), 법원, 경찰, 소방, 미분류)
        // 공무원온라인
        $a1_pass_on_cate_code = '3103, 3020, 3035, 3148, 3023, 999999';

        // 공무원학원
        if (in_array(ENVIRONMENT, ['local', 'development']) === true) {
            $a1_pass_off_cate_code = '3144, 3044, 3059, 3149, 3050, 999999';
        } else {
            $a1_pass_off_cate_code = '3143, 3044, 3059, 3149, 3050, 999999';
        }

        return '
            select BO.*
                , (case BO.LgGroupCode
                    when "A1" then "' . $this->_lg_group_order['A1'] . ':' . $this->_lg_group_name['A1'] . '"
                    when "A2" then "' . $this->_lg_group_order['A2'] . ':' . $this->_lg_group_name['A2'] . '"
                    when "WC" then "' . $this->_lg_group_order['WC'] . ':' . $this->_lg_group_name['WC'] . '"
                    when "MI" then "' . $this->_lg_group_order['MI'] . ':' . $this->_lg_group_name['MI'] . '"
                    else "5:' . $this->_etc_name . '"
                  end) as LgGroupOrdName	
                , (case BO.LgGroupCode                        
                    when "A1" then if(BO.AppName = "OLLA", BO.AppName, BO.SiteCode)
                    when "A2" then BO.SiteCode
                    when "WC" then if(BO.AppName = "NJOB", BO.AppName, BO.SiteCode)
                    when "MI" then BO.AppName                        
                    else "NO"
                  end) as MdGroupCode	  
                , (case BO.LgGroupCode
                    when "A1" then if(BO.AppName = "OLLA", "2:' . $this->_app_name['OLLA'] . '", concat("1:' . $this->_app_name['WILL'] . ' ", S.SiteName))
                    when "A2" then concat("1:' . $this->_app_name['WILL'] . ' ", S.SiteName)
                    when "WC" then if(BO.AppName = "NJOB", "2:' . $this->_app_name['NJOB'] . '", concat("1:' . $this->_app_name['WILL'] . ' ", S.SiteName))
                    when "MI" then concat(
                        (case BO.AppName
                            when "WILL" then "' . $this->_app_order['WILL'] . ':' . $this->_app_name['WILL'] . '"
                            when "NJOB" then "' . $this->_app_order['NJOB'] . ':' . $this->_app_name['NJOB'] . '"
                            when "OLLA" then "' . $this->_app_order['OLLA'] . ':' . $this->_app_name['OLLA'] . '"
                            else "4:' . $this->_etc_name . '"
                        end), " 교재")                                                
                    else "1:' . $this->_etc_name . '"
                  end) as MdGroupOrdName
                , (case BO.LgGroupCode                        
                    when "A1" then if(BO.AppName = "OLLA", BO.AppName, BO.CateCode)
                    when "A2" then BO.CateCode
                    when "WC" then if(BO.AppName = "NJOB", BO.AppName, BO.CateCode)
                    when "MI" then BO.SiteCode                        
                    else "NO"
                  end) as SmGroupCode  
                , ifnull(concat("1:", 
                    (case BO.LgGroupCode                            
                        when "A1" then if(BO.AppName = "OLLA", "' . $this->_olla_cate_name . '", SC.CateName)
                        when "A2" then SC.CateName
                        when "WC" then if(BO.AppName = "NJOB", "' . $this->_app_name['NJOB'] . '", SC.CateName)
                        when "MI" then S.SiteName                            
                    end)
                  ), "2:' . $this->_etc_name . '") as SmGroupOrdName		  
            from (
                select AppName, BaseDate, SiteCode, CateCode, ProdTypeCcd, ProdType, RealPayCnt, RealPayPrice, RefundCnt, RefundPrice
                    , (case 
                        when ProdType = "book" then "MI"
                        when AppName = "WILL" and SiteCode in ("2017", "2018") then "A2"
                        when AppName = "WILL" and SiteCode = "2003" and CateCode not in (' . $a1_pass_on_cate_code . ') then "WC"
                        when AppName = "WILL" and SiteCode = "2004" and CateCode not in (' . $a1_pass_off_cate_code . ') then "WC"
                        when AppName = "NJOB" then if(ProdType = "thing", "NO", "WC")
                        else "A1"
                      end) as LgGroupCode		
                from ' . $this->_gathering_table['mis_stats_order'] . '
                where BaseDate between ? and ?
            ) as BO
                left join ' . $this->_table['site'] . ' as S
                    on S.SiteCode = BO.SiteCode and BO.AppName = "WILL"
                left join ' . $this->_table['category'] . ' as SC
                    on SC.CateCode = BO.CateCode and BO.AppName = "WILL"
            where BO.LgGroupCode != "NO"
        ';
    }
}
