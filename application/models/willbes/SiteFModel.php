<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteFModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'site_r_campus' => 'lms_site_r_campus',
        'code' => 'lms_sys_code',
    ];

    private $_ccd = [
        'Campus' => '605',
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

    /**
     * 사이트 코드별 캠퍼스 코드 목록 조회
     * @param $site_code
     * @return array
     */
    public function getSiteCampusArray($site_code)
    {
        $column = "SC.SiteCode, SC.CampusCcd, C.CcdName as CampusName";
        $from = "
            FROM {$this->_table['site_r_campus']} AS SC
            INNER JOIN {$this->_table['code']} AS C ON SC.CampusCcd = C.Ccd
        ";

        $arr_condition = [
            'EQ' => [
                'SC.IsStatus' => 'Y',
                'C.GroupCcd' => $this->_ccd['Campus'],
                'C.IsUse' => 'Y',
                'C.IsStatus' => 'Y'
            ]
        ];
        $arr_condition['EQ']['SC.SiteCode'] = $site_code;

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . ' ORDER BY SC.SiteCode ASC, SC.CampusCcd ASC');
        $data = $query->result_array();
        return (empty($site_code) === false) ? array_pluck($data, 'CampusName', 'CampusCcd') : $data;
    }
}
