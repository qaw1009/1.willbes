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
        // 학원 사이트 구분값
        $this->_CI->config->load('front_config');
        $pass_site_prefix = $this->_CI->config->item('pass_site_prefix');

        $_table = [
            'site' => 'lms_site',
            'site_group' => 'lms_site_group',
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
            S.SiteCode, S.SiteName, S.SiteGroupCode, SG.SiteGroupName, S.SiteTypeCcd, S.SiteUrl, S.UseDomain, S.PgCcd, S.PgMid, S.PgBookMid, S.PayMethodCcds
                , S.DeliveryCompCcd, S.DeliveryPrice, S.DeliveryAddPrice, S.DeliveryFreePrice
                , S.Logo, S.Favicon, S.CsTel, S.HeadTitle, S.MetaKeyword, S.MetaDesc, S.FrontCss, S.FooterInfo
                , DCC.CcdName as DeliveryCompName
                , lower(concat(substring_index(S.SiteUrl, ".", 1), if(instr(substring_index(S.SiteUrl, "/", 2), "/' . $pass_site_prefix . '") > 0, "' . $pass_site_prefix . '", ""))) as SiteId
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
                inner join ' . $_table['site_group'] . ' as SG
                    on S.SiteGroupCode = SG.SiteGroupCode
                left join ' . $_table['code'] . ' as DCC
                    on S.DeliveryCompCcd = DCC.Ccd and DCC.GroupCcd = "' . $_ccd['DeliveryComp'] . '" and DCC.IsUse = "Y" and DCC.IsStatus = "Y"
            where S.IsUse = "Y" and S.IsStatus = "Y" and SG.IsUse = "Y" and SG.IsStatus = "Y"
        ';

        // 쿼리 실행
        $result = $this->_db->query('select ' . $column . $from)->result_array();

        $data = [];
        array_map(function($row) use (&$data) {
            $key = $row['SiteId'];
            unset($row['SiteId']);
            $data[$key] = $row;
        }, $result);

        return $data;
    }
}
