<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 사이트 정보
 */
class Caching_site extends CI_Driver
{
    /**
     * databse connection name
     * @var string
     */
    public $_database = 'lms';

    /**
     * cache key
     * @var string
     */
    public $_key = 'lms@site';

    /**
     * cache life time (second), 0일 경우 자동 소멸없이 데이터 유지됨
     * @var int
     */
    public $_ttl = 0;

    /**
     * get cache save data
     * @return array
     */
    public function _getSaveData()
    {
        $_table = [
            'site' => 'lms_site',
            'site_r_campus' => 'lms_site_r_campus',
            'code' => 'lms_sys_code',
            'tmp_numbers' => 'tmp_numbers'
        ];
        $_ccd = [
            'PayMethod' => '604',
            'Campus' => '605',
            'DeliveryComp' => '606'
        ];

        $column = '
            S.SiteCode, S.SiteGroupCode, S.SiteTypeCcd, S.SiteName, S.SiteUrl, S.UseDomain, S.PgCcd, S.PayMethodCcds
                , S.DeliveryCompCcd, S.DeliveryPrice, S.DeliveryAddPrice, S.DeliveryFreePrice
                , S.Logo, S.Favicon, S.CsTel, S.HeadTitle, S.MetaKeyword, S.MetaDesc, S.FrontCss, S.FooterInfo
                , DCC.CcdName as DeliveryCompName
                , if(IsCampus = "Y", (
                    select GROUP_CONCAT(CONCAT(RC.CampusCcd, ":", C.CcdName) separator ",") 
                    from ' . $_table['site_r_campus'] . ' as RC inner join ' . $_table['code'] . ' as C
                        on RC.CampusCcd = C.Ccd
                    where RC.SiteCode = S.SiteCode and RC.IsStatus = "Y"
                        and C.GroupCcd = "' . $_ccd['Campus'] . '" and C.IsUse = "Y" and C.IsStatus = "Y"
                  ), "N") as CampusCcdArr
                , (
                    select GROUP_CONCAT(CONCAT(substring_index(substring_index(S.PayMethodCcds, ",", TN.num), ",", -1), ":", C.CcdName) separator ",")	
                    from ' . $_table['tmp_numbers'] . ' as TN, ' . $_table['code'] . ' as C
                    where char_length(S.PayMethodCcds) - char_length(replace(S.PayMethodCcds, ",", "")) >= TN.num - 1
                        and substring_index(substring_index(S.PayMethodCcds, ",", TN.num), ",", -1) = C.Ccd
                        and C.GroupCcd = "' . $_ccd['PayMethod'] . '" and C.IsUse = "Y" and C.IsStatus = "Y"
                  ) as PayMethodCcdArr            
        ';
        $from = '
            from ' . $_table['site'] . ' as S 
                left join ' . $_table['code'] . ' as DCC
                    on S.DeliveryCompCcd = DCC.Ccd and DCC.GroupCcd = "' . $_ccd['DeliveryComp'] . '" and DCC.IsUse = "Y" and DCC.IsStatus = "Y"
            where S.IsUse = "Y" and S.IsStatus = "Y"                                
        ';

        // 쿼리 실행
        $result = $this->_db->query('select ' . $column . $from)->result_array();

        $data = [];
        array_map(function($row) use (&$data) {
            $key = str_first_pos_before($row['SiteUrl'], '.');
            starts_with(str_first_pos_after($row['SiteUrl'], '/'), 'pass') === true && $key .= 'pass';
            $data[strtolower($key)] = $row;
        }, $result);

        return $data;
    }
}
