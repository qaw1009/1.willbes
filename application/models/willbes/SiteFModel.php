<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteFModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사이트 그룹코드에 속한 사이트 코드를 on/off 로 구분하여 리턴
     * @param int $site_group_code [사이트 그룹코드]
     * @return array
     */
    public function getSiteCodeByGroupCode($site_group_code)
    {
        $column = 'S.SiteCode, S.IsCampus, if(S.IsCampus = "Y", "off", "on") as SiteOnOff';
        $arr_condition = [
            'EQ' => [
                'S.SiteGroupCode' => $site_group_code,
                'S.IsUse' => 'Y', 'S.IsStatus' => 'Y',
                'SG.IsUse' => 'Y', 'SG.IsStatus' => 'Y'
            ]
        ];

        $data = $this->_conn->getJoinListResult($this->_table['site'] . ' as S', 'inner', $this->_table['site_group'] . ' as SG'
            , 'S.SiteGroupCode = SG.SiteGroupCode', $column, $arr_condition);

        return array_pluck($data, 'SiteCode', 'SiteOnOff');
    }
}
