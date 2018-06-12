<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 사이트 메뉴 정보
 */
class Caching_site_subject_professor extends CI_Driver
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
    public $_key = 'lms@site_subject_professor';

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
            'category' => 'lms_sys_category',
            'subject' => 'lms_product_subject',
            'professor' => 'lms_professor',
            'pms_professor' => 'wbs_pms_professor',
            'professor_r_subject_r_category' => 'lms_professor_r_subject_r_category'
        ];

        $column = 'P.SiteCode, PSC.CateCode, PSC.SubjectIdx, PS.SubjectName, P.ProfIdx, P.wProfIdx, WP.wProfName as ProfName, P.ProfNickName';
        $from = '
            from ' . $_table['professor_r_subject_r_category'] . ' as PSC
                inner join ' . $_table['professor'] . ' as P
                    on PSC.ProfIdx = P.ProfIdx
                inner join ' . $_table['pms_professor'] . ' as WP
                    on P.wProfIdx = WP.wProfIdx
                inner join ' . $_table['site'] . ' as S
                    on P.SiteCode = S.SiteCode
                inner join ' . $_table['category'] . ' as SC
                    on PSC.CateCode = SC.CateCode
                inner join ' . $_table['subject'] . ' as PS
                    on PSC.SubjectIdx = PS.SubjectIdx
            where P.IsUse = "Y" and P.IsStatus = "Y"
                and WP.wIsUse = "Y" and WP.wIsStatus = "Y"
                and PSC.IsStatus = "Y"
                and S.IsUse = "Y" and S.IsStatus = "Y"
                and SC.IsUse = "Y" and SC.IsStatus = "Y"
                and PS.IsUse = "Y" and PS.IsStatus = "Y"                          
        ';
        $order_by = ' order by SC.OrderNum asc, PS.OrderNum asc, PSC.PcIdx asc';

        // 쿼리 실행
        $result = $this->_db->query('select ' . $column . $from . $order_by)->result_array();

        $data = [];
        foreach ($result as $idx => $row) {
            $arr_prof = [
                'wProfIdx' => $row['wProfIdx'],
                'ProfName' => $row['ProfName'],
                'ProfNickName' => $row['ProfNickName']
            ];

            $base_key = $row['SiteCode'] . '.' . $row['CateCode'] . '.' . $row['SubjectIdx'];
            $subject_key = $base_key . '.' . 'SubjectName';
            $prof_key = $base_key . '.' . 'Professors.' . $row['ProfIdx'];

            // 과목명 설정
            if (array_has($data, $subject_key) === false) {
                array_set($data, $subject_key , $row['SubjectName']);
            }

            // 교수정보 추가
            array_set($data, $prof_key , $arr_prof);
        }

        return $data;
    }
}
