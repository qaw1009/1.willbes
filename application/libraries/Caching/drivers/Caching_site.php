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
        $pass_site_prefix = config_item('app_pass_site_prefix');

        $_table = [
            'site' => 'lms_site',
            'site_group' => 'lms_site_group',
            'site_r_campus' => 'lms_site_r_campus',
            'category' => 'lms_sys_category',
            'code' => 'lms_sys_code'
        ];
        $_group_ccd = [
            'Pg' => '603',
            'PayMethod' => '604',
            'Campus' => '605',
            'DeliveryComp' => '606'
        ];

        $column = '
            S.SiteCode, S.SiteName, S.SiteGroupCode, SG.SiteGroupName, S.SiteTypeCcd, S.SiteUrl, S.UseDomain, S.PgCcd, S.PgMid, S.PgBookMid, S.PayMethodCcds
                , S.DeliveryCompCcd, S.DeliveryPrice, S.DeliveryAddPrice, S.DeliveryFreePrice
                , S.Logo, S.Favicon, S.CsTel, S.HeadTitle, S.MetaKeyword, S.MetaDesc, S.HeaderInfo, S.FooterInfo, S.CommPcScript, S.CommMobileScript, S.CommAppScript
                , (select CateCode from ' . $_table['category'] . ' where SiteCode = S.SiteCode and CateDepth = 1 and IsUse = "Y" and IsStatus = "Y" order by OrderNum asc limit 1) as DefCateCode
                , DCC.CcdName as DeliveryCompName
                , PGC.CcdEtc as PgDriver
                , if(IsCampus = "Y", (
                    select GROUP_CONCAT(CONCAT(RC.CampusCcd, ":", C.CcdName) separator ",") 
                    from ' . $_table['site_r_campus'] . ' as RC inner join ' . $_table['code'] . ' as C
                        on RC.CampusCcd = C.Ccd
                    where RC.SiteCode = S.SiteCode and RC.IsStatus = "Y"
                        and C.GroupCcd = "' . $_group_ccd['Campus'] . '" and C.IsUse = "Y" and C.IsStatus = "Y"
                  ), "N") as CampusCcdArr
                , substring_index(SiteUrl, ".", 1) as SiteGroupId
                , substring(replace(substring_index(SiteUrl, "/", 2), substring_index(SiteUrl, "/", 1), ""), 2) as SiteId                                                           
        ';
        $from = '
            from ' . $_table['site'] . ' as S 
                inner join ' . $_table['site_group'] . ' as SG
                    on S.SiteGroupCode = SG.SiteGroupCode
                left join ' . $_table['code'] . ' as DCC
                    on S.DeliveryCompCcd = DCC.Ccd and DCC.GroupCcd = "' . $_group_ccd['DeliveryComp'] . '" and DCC.IsStatus = "Y"
                left join ' . $_table['code'] . ' as PGC
                    on S.PgCcd = PGC.Ccd and PGC.GroupCcd = "' . $_group_ccd['Pg'] . '" and PGC.IsStatus = "Y"                    
            where S.IsUse = "Y" and S.IsStatus = "Y" and SG.IsUse = "Y" and SG.IsStatus = "Y"
        ';

        // 쿼리 실행
        $result = $this->_db->query('select ' . $column . $from)->result_array();

        $data = [];
        array_map(function($row) use (&$data, $pass_site_prefix) {
            $row['SiteId'] = $row['SiteGroupId'] . (($row['SiteId'] == $pass_site_prefix) ? $pass_site_prefix : "");
            $key = $row['SiteGroupId'] . '>' . $row['SiteId'];
            $row['SiteKey'] = $key;

            $data[$key] = $row;
        }, $result);

        // add site key array
        $data['SiteKeys'] = array_pluck($data, 'SiteKey', 'SiteCode');

        return $data;
    }
}
